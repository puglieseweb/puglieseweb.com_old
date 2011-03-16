package com.puglieseweb.client.scaffold.place;

import com.google.gwt.editor.client.HasEditorErrors;
import com.google.gwt.requestfactory.client.RequestFactoryEditorDriver;
import com.google.gwt.requestfactory.shared.EntityProxy;
import com.google.gwt.user.client.ui.IsWidget;

/**
 * Implemented by views that edit {@link EntityProxy}s.
 *
 * @param <P> the type of the proxy
 * @param <V> the type of this ProxyEditView, required to allow
 *            {@link #createEditorDriver()} to be correctly typed
 */
public interface ProxyEditView<P extends EntityProxy, V extends ProxyEditView<P, V>>
		extends IsWidget, HasEditorErrors<P> {

	/**
	 * @return a new {@link RequestFactoryEditorDriver} initialized to run this
	 *         editor
	 */
	RequestFactoryEditorDriver<P, V> createEditorDriver();

	/**
	 * Implemented by the owner of the view.
	 */
	interface Delegate {
		void cancelClicked();

		void saveClicked();
	}

	void setDelegate(Delegate delegate);

	void setEnabled(boolean b);
}
