package com.puglieseweb.client.managed.ui;

import com.google.gwt.core.client.GWT;
import com.google.gwt.dom.client.Element;
import com.google.gwt.event.dom.client.ClickEvent;
import com.google.gwt.event.dom.client.HasClickHandlers;
import com.google.gwt.i18n.client.DateTimeFormat;
import com.google.gwt.uibinder.client.UiBinder;
import com.google.gwt.uibinder.client.UiField;
import com.google.gwt.uibinder.client.UiHandler;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.HTMLPanel;
import com.google.gwt.user.client.ui.Widget;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.managed.ui.FeedbackMobileDetailsView.Binder;
import com.puglieseweb.client.scaffold.place.ProxyDetailsView;

public class FeedbackMobileDetailsView extends FeedbackMobileDetailsView_Roo_Gwt {

    private static final Binder BINDER = GWT.create(Binder.class);

    private static com.puglieseweb.client.managed.ui.FeedbackMobileDetailsView instance;

    @UiField
    HasClickHandlers delete;

    private Delegate delegate;

    public FeedbackMobileDetailsView() {
        initWidget(BINDER.createAndBindUi(this));
    }

    public static com.puglieseweb.client.managed.ui.FeedbackMobileDetailsView instance() {
        if (instance == null) {
            instance = new FeedbackMobileDetailsView();
        }
        return instance;
    }

    public Widget asWidget() {
        return this;
    }

    public boolean confirm(String msg) {
        return Window.confirm(msg);
    }

    public FeedbackProxy getValue() {
        return proxy;
    }

    @UiHandler("delete")
    public void onDeleteClicked(ClickEvent e) {
        delegate.deleteClicked();
    }

    public void setDelegate(Delegate delegate) {
        this.delegate = delegate;
    }

    interface Binder extends UiBinder<HTMLPanel, FeedbackMobileDetailsView> {
    }
}
