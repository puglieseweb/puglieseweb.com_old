package com.puglieseweb.client.scaffold.place;

import com.google.gwt.activity.shared.Activity;
import com.google.gwt.event.shared.EventBus;
import com.google.gwt.event.shared.HandlerRegistration;
import com.google.gwt.place.shared.Place;
import com.google.gwt.place.shared.PlaceChangeEvent;
import com.google.gwt.place.shared.PlaceController;
import com.google.gwt.requestfactory.shared.*;
import com.google.gwt.user.cellview.client.AbstractHasData;
import com.google.gwt.user.client.ui.AcceptsOneWidget;
import com.google.gwt.view.client.*;

import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * Abstract activity for displaying a list of {@link EntityProxy}. These
 * activities are not re-usable. Once they are stopped, they cannot be
 * restarted.
 * <p/>
 * Subclasses must:
 * <p/>
 * <ul>
 * <li>provide a {@link ProxyListView}
 * <li>implement method to request a full count
 * <li>implement method to find a range of entities
 * <li>respond to "show details" commands
 * </ul>
 * <p/>
 * Only the properties required by the view will be requested.
 *
 * @param <P> the type of {@link EntityProxy} listed
 */
public abstract class AbstractProxyListActivity<P extends EntityProxy>
		implements Activity, ProxyListView.Delegate<P> {

	/**
	 * This mapping allows us to update individual rows as records change.
	 */
	private final Map<EntityProxyId<P>, Integer> idToRow = new HashMap<EntityProxyId<P>, Integer>();
	private final Map<EntityProxyId<P>, P> idToProxy = new HashMap<EntityProxyId<P>, P>();

	private final PlaceController placeController;
	private final SingleSelectionModel<P> selectionModel;
	private final Class<P> proxyClass;

	private HandlerRegistration rangeChangeHandler;
	private ProxyListView<P> view;
	private AcceptsOneWidget display;
	private EntityProxyId<P> pendingSelection;

	public AbstractProxyListActivity(PlaceController placeController,
	                                 ProxyListView<P> view, Class<P> proxyType) {
		this.view = view;
		this.placeController = placeController;
		this.proxyClass = proxyType;
		view.setDelegate(this);

		final HasData<P> hasData = view.asHasData();
		rangeChangeHandler = hasData.addRangeChangeHandler(new RangeChangeEvent.Handler() {
			public void onRangeChange(RangeChangeEvent event) {
				AbstractProxyListActivity.this.onRangeChanged(hasData);
			}
		});

		// Inherit the view's key provider
		ProvidesKey<P> keyProvider = ((AbstractHasData<P>) hasData).getKeyProvider();
		selectionModel = new SingleSelectionModel<P>(keyProvider);
		hasData.setSelectionModel(selectionModel);

		selectionModel.addSelectionChangeHandler(new SelectionChangeEvent.Handler() {
			public void onSelectionChange(SelectionChangeEvent event) {
				P selectedObject = selectionModel.getSelectedObject();
				if (selectedObject != null) {
					showDetails(selectedObject);
				}
			}
		});
	}

	public void createClicked() {
		placeController.goTo(new ProxyPlace(proxyClass));
	}

	public ProxyListView<P> getView() {
		return view;
	}

	public String mayStop() {
		return null;
	}

	public void onCancel() {
		onStop();
	}

	/**
	 * Called by the table as it needs data.
	 */
	public void onRangeChanged(HasData<P> listView) {
		final Range range = listView.getVisibleRange();

		final Receiver<List<P>> callback = new Receiver<List<P>>() {
			@Override
			public void onSuccess(List<P> values) {
				if (view == null) {
					// This activity is dead
					return;
				}
				idToRow.clear();
				idToProxy.clear();
				for (int i = 0, row = range.getStart(); i < values.size(); i++, row++) {
					P proxy = values.get(i);
					@SuppressWarnings("unchecked")
					// Why is this cast needed?
					EntityProxyId<P> proxyId = (EntityProxyId<P>) proxy.stableId();
					idToRow.put(proxyId, row);
					idToProxy.put(proxyId, proxy);
				}
				getView().asHasData().setRowData(range.getStart(), values);
				finishPendingSelection();
				if (display != null) {
					display.setWidget(getView());
				}
			}
		};

		fireRangeRequest(range, callback);
	}

	public void onStop() {
		view.setDelegate(null);
		view = null;
		rangeChangeHandler.removeHandler();
		rangeChangeHandler = null;
	}

	/**
	 * Select the given record, or clear the selection if called with null or an
	 * id we don't know.
	 */
	public void select(EntityProxyId<P> proxyId) {
		/*
		 * The selectionModel will not flash if we put it back to the same state it
		 * is already in, so we can keep this code simple.
		 */

		// Clear the selection
		P selected = selectionModel.getSelectedObject();
		if (selected != null) {
			selectionModel.setSelected(selected, false);
		}

		// Select the new proxy, if it's relevant
		if (proxyId != null) {
			P selectMe = idToProxy.get(proxyId);

			if (selectMe != null) {
				pendingSelection = null;
				selectionModel.setSelected(selectMe, true);
			} else {
				/*
				 * It may be that an async request is about to fetch it.
				 * Make note to select it when it arrives (see
				 * finishPendingSelection()).
				 */
				pendingSelection = proxyId;
			}
		}
	}

	public void start(AcceptsOneWidget display, EventBus eventBus) {
		view.setDelegate(this);
		EntityProxyChange.registerForProxyType(eventBus, proxyClass,
				new EntityProxyChange.Handler<P>() {
					public void onProxyChange(EntityProxyChange<P> event) {
						update(event.getWriteOperation(), event.getProxyId());
					}
				});
		eventBus.addHandler(PlaceChangeEvent.TYPE, new PlaceChangeEvent.Handler() {
			public void onPlaceChange(PlaceChangeEvent event) {
				updateSelection(event.getNewPlace());
			}
		});
		this.display = display;
		init();
		updateSelection(placeController.getWhere());
	}

	public void update(WriteOperation writeOperation, EntityProxyId<P> proxyId) {
		switch (writeOperation) {
			case UPDATE:
				update(proxyId);
				break;

			case DELETE:
				init();
				break;

			case PERSIST:
				/*
				 * On create, we presume the new record is at the end of the list, so
				 * fetch the last page of items.
				 */
				getLastPage();
				break;
		}
	}

	protected abstract Request<List<P>> createRangeRequest(Range range);

	protected abstract void fireCountRequest(Receiver<Long> callback);

	/**
	 * Called when the user chooses a record to view. This default implementation
	 * sends the {@link PlaceController} to an appropriate {@link ProxyPlace}.
	 *
	 * @param record the chosen record
	 */
	protected void showDetails(P record) {
		placeController.goTo(new ProxyPlace(record.stableId(), ProxyPlace.Operation.DETAILS));
	}

	@SuppressWarnings("unchecked")
	private EntityProxyId<P> cast(ProxyPlace proxyPlace) {
		return (EntityProxyId<P>) proxyPlace.getProxyId();
	}

	/**
	 * Finish selecting a proxy that hadn't yet arrived when
	 * {@link #select(EntityProxyId)} was called.
	 */
	private void finishPendingSelection() {
		if (pendingSelection != null) {
			P selectMe = idToProxy.get(pendingSelection);
			pendingSelection = null;
			if (selectMe != null) {
				selectionModel.setSelected(selectMe, true);
			}
		}
	}

	private void fireRangeRequest(final Range range,
	                              final Receiver<List<P>> callback) {
		createRangeRequest(range).with(getView().getPaths()).fire(callback);
	}

	private void getLastPage() {
		fireCountRequest(new Receiver<Long>() {
			@Override
			public void onSuccess(Long response) {
				if (view == null) {
					// This activity is dead
					return;
				}
				HasData<P> table = getView().asHasData();
				int rows = response.intValue();
				table.setRowCount(rows, true);
				if (rows > 0) {
					int pageSize = table.getVisibleRange().getLength();
					int remnant = rows % pageSize;
					if (remnant == 0) {
						table.setVisibleRange(rows - pageSize, pageSize);
					} else {
						table.setVisibleRange(rows - remnant, pageSize);
					}
				}
				onRangeChanged(table);
			}
		});
	}

	private void init() {
		fireCountRequest(new Receiver<Long>() {
			@Override
			public void onSuccess(Long response) {
				if (view == null) {
					// This activity is dead
					return;
				}
				getView().asHasData().setRowCount(response.intValue(), true);
				onRangeChanged(view.asHasData());
			}
		});
	}

	private void update(EntityProxyId<P> proxyId) {
		final Integer row = idToRow.get(proxyId);
		if (row == null) {
			return;
		}
		fireRangeRequest(new Range(row, 1), new Receiver<List<P>>() {
			@Override
			public void onSuccess(List<P> response) {
				getView().asHasData().setRowData(row,
						Collections.singletonList(response.get(0)));
			}
		});
	}

	private void updateSelection(Place newPlace) {
		if (newPlace instanceof ProxyPlace) {
			ProxyPlace proxyPlace = (ProxyPlace) newPlace;
			if (proxyPlace.getOperation() != ProxyPlace.Operation.CREATE
					&& proxyPlace.getProxyClass().equals(proxyClass)) {
				select(cast(proxyPlace));
				return;
			}
		}

		select(null);
	}
}
