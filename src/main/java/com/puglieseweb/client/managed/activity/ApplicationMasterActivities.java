package com.puglieseweb.client.managed.activity;

import com.google.gwt.activity.shared.Activity;
import com.google.gwt.activity.shared.ActivityMapper;
import com.google.gwt.place.shared.Place;
import com.google.gwt.place.shared.PlaceController;
import com.google.inject.Inject;
import com.puglieseweb.client.managed.request.ApplicationEntityTypesProcessor;
import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.managed.ui.FeedbackListView;
import com.puglieseweb.client.managed.ui.FeedbackMobileListView;
import com.puglieseweb.client.scaffold.ScaffoldApp;
import com.puglieseweb.client.scaffold.place.ProxyListPlace;

public final class ApplicationMasterActivities extends ApplicationMasterActivities_Roo_Gwt {

    @Inject
    public ApplicationMasterActivities(ApplicationRequestFactory requests, PlaceController placeController) {
        this.requests = requests;
        this.placeController = placeController;
    }
}
