package com.puglieseweb.client.managed.activity;

import com.google.gwt.activity.shared.Activity;
import com.google.gwt.place.shared.PlaceController;
import com.google.gwt.requestfactory.shared.EntityProxyId;
import com.google.gwt.requestfactory.shared.RequestContext;
import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.managed.request.FeedbackRequest;
import com.puglieseweb.client.managed.ui.FeedbackDetailsView;
import com.puglieseweb.client.managed.ui.FeedbackEditView;
import com.puglieseweb.client.managed.ui.FeedbackListView;
import com.puglieseweb.client.managed.ui.FeedbackMobileDetailsView;
import com.puglieseweb.client.managed.ui.FeedbackMobileEditView;
import com.puglieseweb.client.scaffold.ScaffoldApp;
import com.puglieseweb.client.scaffold.place.CreateAndEditProxy;
import com.puglieseweb.client.scaffold.place.FindAndEditProxy;
import com.puglieseweb.client.scaffold.place.ProxyPlace;

public class FeedbackActivitiesMapper {

    private final ApplicationRequestFactory requests;

    private final PlaceController placeController;

    public FeedbackActivitiesMapper(ApplicationRequestFactory requests, PlaceController placeController) {
        this.requests = requests;
        this.placeController = placeController;
    }

    public Activity getActivity(ProxyPlace place) {
        switch(place.getOperation()) {
            case DETAILS:
                return new FeedbackDetailsActivity((EntityProxyId<FeedbackProxy>) place.getProxyId(), requests, placeController, ScaffoldApp.isMobile() ? FeedbackMobileDetailsView.instance() : FeedbackDetailsView.instance());
            case EDIT:
                return makeEditActivity(place);
            case CREATE:
                return makeCreateActivity();
        }
        throw new IllegalArgumentException("Unknown operation " + place.getOperation());
    }

    @SuppressWarnings("unchecked")
    private EntityProxyId<com.puglieseweb.client.managed.request.FeedbackProxy> coerceId(ProxyPlace place) {
        return (EntityProxyId<FeedbackProxy>) place.getProxyId();
    }

    private Activity makeCreateActivity() {
        FeedbackEditView.instance().setCreating(true);
        final FeedbackRequest request = requests.feedbackRequest();
        Activity activity = new CreateAndEditProxy<FeedbackProxy>(FeedbackProxy.class, request, ScaffoldApp.isMobile() ? FeedbackMobileEditView.instance() : FeedbackEditView.instance(), placeController) {

            @Override
            protected RequestContext createSaveRequest(FeedbackProxy proxy) {
                request.persist().using(proxy);
                return request;
            }
        };
        return new FeedbackEditActivityWrapper(requests, ScaffoldApp.isMobile() ? FeedbackMobileEditView.instance() : FeedbackEditView.instance(), activity, null);
    }

    private Activity makeEditActivity(ProxyPlace place) {
        FeedbackEditView.instance().setCreating(false);
        EntityProxyId<FeedbackProxy> proxyId = coerceId(place);
        Activity activity = new FindAndEditProxy<FeedbackProxy>(proxyId, requests, ScaffoldApp.isMobile() ? FeedbackMobileEditView.instance() : FeedbackEditView.instance(), placeController) {

            @Override
            protected RequestContext createSaveRequest(FeedbackProxy proxy) {
                FeedbackRequest request = requests.feedbackRequest();
                request.persist().using(proxy);
                return request;
            }
        };
        return new FeedbackEditActivityWrapper(requests, ScaffoldApp.isMobile() ? FeedbackMobileEditView.instance() : FeedbackEditView.instance(), activity, proxyId);
    }
}
