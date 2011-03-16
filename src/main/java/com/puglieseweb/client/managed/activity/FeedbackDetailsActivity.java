package com.puglieseweb.client.managed.activity;

import com.google.gwt.activity.shared.AbstractActivity;
import com.google.gwt.event.shared.EventBus;
import com.google.gwt.place.shared.Place;
import com.google.gwt.place.shared.PlaceController;
import com.google.gwt.requestfactory.shared.EntityProxy;
import com.google.gwt.requestfactory.shared.EntityProxyId;
import com.google.gwt.requestfactory.shared.Receiver;
import com.google.gwt.requestfactory.shared.Request;
import com.google.gwt.user.client.ui.AcceptsOneWidget;
import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.scaffold.activity.IsScaffoldMobileActivity;
import com.puglieseweb.client.scaffold.place.ProxyDetailsView;
import com.puglieseweb.client.scaffold.place.ProxyListPlace;
import com.puglieseweb.client.scaffold.place.ProxyPlace;
import com.puglieseweb.client.scaffold.place.ProxyPlace.Operation;
import java.util.Set;

public class FeedbackDetailsActivity extends FeedbackDetailsActivity_Roo_Gwt {

    private final PlaceController placeController;

    private final ProxyDetailsView<FeedbackProxy> view;

    private AcceptsOneWidget display;

    public FeedbackDetailsActivity(EntityProxyId<com.puglieseweb.client.managed.request.FeedbackProxy> proxyId, ApplicationRequestFactory requests, PlaceController placeController, ProxyDetailsView<com.puglieseweb.client.managed.request.FeedbackProxy> view) {
        this.placeController = placeController;
        this.proxyId = proxyId;
        this.requests = requests;
        view.setDelegate(this);
        this.view = view;
    }

    public void deleteClicked() {
        if (!view.confirm("Really delete this entry? You cannot undo this change.")) {
            return;
        }
        requests.feedbackRequest().remove().using(view.getValue()).fire(new Receiver<Void>() {

            public void onSuccess(Void ignore) {
                if (display == null) {
                    return;
                }
                placeController.goTo(getBackButtonPlace());
            }
        });
    }

    public void editClicked() {
        placeController.goTo(getEditButtonPlace());
    }

    public Place getBackButtonPlace() {
        return new ProxyListPlace(FeedbackProxy.class);
    }

    public String getBackButtonText() {
        return "Back";
    }

    public Place getEditButtonPlace() {
        return new ProxyPlace(view.getValue().stableId(), Operation.EDIT);
    }

    public String getTitleText() {
        return "View Feedback";
    }

    public boolean hasEditButton() {
        return true;
    }

    public void onCancel() {
        onStop();
    }

    public void onStop() {
        display = null;
    }

    public void start(AcceptsOneWidget displayIn, EventBus eventBus) {
        this.display = displayIn;
        Receiver<EntityProxy> callback = new Receiver<EntityProxy>() {

            public void onSuccess(EntityProxy proxy) {
                if (proxy == null) {
                    placeController.goTo(getBackButtonPlace());
                    return;
                }
                if (display == null) {
                    return;
                }
                view.setValue((FeedbackProxy) proxy);
                display.setWidget(view);
            }
        };
        find(callback);
    }
}
