package com.puglieseweb.client.managed.activity;

import com.google.gwt.activity.shared.Activity;
import com.google.gwt.event.shared.EventBus;
import com.google.gwt.place.shared.Place;
import com.google.gwt.requestfactory.shared.EntityProxyId;
import com.google.gwt.requestfactory.shared.Receiver;
import com.google.gwt.user.client.ui.AcceptsOneWidget;
import com.puglieseweb.client.managed.activity.FeedbackEditActivityWrapper.View;
import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.scaffold.activity.IsScaffoldMobileActivity;
import com.puglieseweb.client.scaffold.place.ProxyEditView;
import com.puglieseweb.client.scaffold.place.ProxyListPlace;
import com.puglieseweb.client.scaffold.place.ProxyPlace;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.Collections;
import java.util.List;

public class FeedbackEditActivityWrapper extends FeedbackEditActivityWrapper_Roo_Gwt {

    private final EntityProxyId<FeedbackProxy> proxyId;

    public FeedbackEditActivityWrapper(ApplicationRequestFactory requests, View<?> view, Activity activity, EntityProxyId<com.puglieseweb.client.managed.request.FeedbackProxy> proxyId) {
        this.requests = requests;
        this.view = view;
        this.wrapped = activity;
        this.proxyId = proxyId;
    }

    public Place getBackButtonPlace() {
        return (proxyId == null) ? new ProxyListPlace(FeedbackProxy.class) : new ProxyPlace(proxyId, ProxyPlace.Operation.DETAILS);
    }

    public String getBackButtonText() {
        return "Cancel";
    }

    public Place getEditButtonPlace() {
        return null;
    }

    public String getTitleText() {
        return (proxyId == null) ? "New Feedback" : "Edit Feedback";
    }

    public boolean hasEditButton() {
        return false;
    }

    @Override
    public String mayStop() {
        return wrapped.mayStop();
    }

    @Override
    public void onCancel() {
        wrapped.onCancel();
    }

    @Override
    public void onStop() {
        wrapped.onStop();
    }

    public interface View<V extends com.puglieseweb.client.scaffold.place.ProxyEditView<com.puglieseweb.client.managed.request.FeedbackProxy, V>> extends View_Roo_Gwt<V> {
    }
}
