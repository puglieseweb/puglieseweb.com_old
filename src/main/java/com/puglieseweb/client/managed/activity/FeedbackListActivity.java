package com.puglieseweb.client.managed.activity;

import com.google.gwt.place.shared.Place;
import com.google.gwt.place.shared.PlaceController;
import com.google.gwt.requestfactory.shared.Receiver;
import com.google.gwt.requestfactory.shared.Request;
import com.google.gwt.view.client.Range;
import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.scaffold.ScaffoldMobileApp;
import com.puglieseweb.client.scaffold.activity.IsScaffoldMobileActivity;
import com.puglieseweb.client.scaffold.place.AbstractProxyListActivity;
import com.puglieseweb.client.scaffold.place.ProxyListView;
import java.util.List;

public class FeedbackListActivity extends AbstractProxyListActivity<FeedbackProxy> implements IsScaffoldMobileActivity {

    private final ApplicationRequestFactory requests;

    public FeedbackListActivity(ApplicationRequestFactory requests, ProxyListView<com.puglieseweb.client.managed.request.FeedbackProxy> view, PlaceController placeController) {
        super(placeController, view, FeedbackProxy.class);
        this.requests = requests;
    }

    public Place getBackButtonPlace() {
        return ScaffoldMobileApp.ROOT_PLACE;
    }

    public String getBackButtonText() {
        return "Entities";
    }

    public Place getEditButtonPlace() {
        return null;
    }

    public String getTitleText() {
        return "Feedbacks";
    }

    public boolean hasEditButton() {
        return false;
    }

    protected Request<java.util.List<com.puglieseweb.client.managed.request.FeedbackProxy>> createRangeRequest(Range range) {
        return requests.feedbackRequest().findFeedbackEntries(range.getStart(), range.getLength());
    }

    protected void fireCountRequest(Receiver<Long> callback) {
        requests.feedbackRequest().countFeedbacks().fire(callback);
    }
}
