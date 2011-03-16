package com.puglieseweb.client.managed.ui;

import com.google.gwt.requestfactory.ui.client.ProxyRenderer;
import com.puglieseweb.client.managed.request.FeedbackProxy;

public class FeedbackProxyRenderer extends ProxyRenderer<FeedbackProxy> {

    private static com.puglieseweb.client.managed.ui.FeedbackProxyRenderer INSTANCE;

    protected FeedbackProxyRenderer() {
        super(new String[] { "feedback" });
    }

    public static com.puglieseweb.client.managed.ui.FeedbackProxyRenderer instance() {
        if (INSTANCE == null) {
            INSTANCE = new FeedbackProxyRenderer();
        }
        return INSTANCE;
    }

    public String render(FeedbackProxy object) {
        if (object == null) {
            return "";
        }
        return object.getFeedback() + " (" + object.getId() + ")";
    }
}
