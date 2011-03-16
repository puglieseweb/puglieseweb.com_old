package com.puglieseweb.client.managed.activity;

import com.google.gwt.activity.shared.Activity;
import com.google.gwt.activity.shared.ActivityMapper;
import com.google.gwt.place.shared.Place;
import com.google.inject.Inject;

public final class ScaffoldMobileActivities implements ActivityMapper {

    private final ApplicationMasterActivities listActivityBuilder;

    private final ApplicationDetailsActivities detailsActivityBuilder;

    private Activity rootActivity;

    @Inject
    public ScaffoldMobileActivities(ApplicationMasterActivities listActivitiesBuilder, ApplicationDetailsActivities detailsActivityBuilder) {
        this.listActivityBuilder = listActivitiesBuilder;
        this.detailsActivityBuilder = detailsActivityBuilder;
    }

    public Activity getActivity(Place place) {
        Activity rtn = listActivityBuilder.getActivity(place);
        if (rtn == null) {
            rtn = detailsActivityBuilder.getActivity(place);
        }
        return rtn == null ? rootActivity : rtn;
    }

    public void setRootActivity(Activity activity) {
        this.rootActivity = activity;
    }
}
