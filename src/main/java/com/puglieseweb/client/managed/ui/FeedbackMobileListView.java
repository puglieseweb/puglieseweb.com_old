package com.puglieseweb.client.managed.ui;

import com.google.gwt.i18n.client.DateTimeFormat;
import com.google.gwt.safehtml.shared.SafeHtml;
import com.google.gwt.safehtml.shared.SafeHtmlBuilder;
import com.google.gwt.safehtml.shared.SafeHtmlUtils;
import com.google.gwt.text.client.DateTimeFormatRenderer;
import com.google.gwt.text.shared.AbstractRenderer;
import com.google.gwt.text.shared.AbstractSafeHtmlRenderer;
import com.google.gwt.text.shared.Renderer;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.scaffold.ScaffoldMobileApp;
import com.puglieseweb.client.scaffold.ui.MobileProxyListView;
import java.util.HashSet;
import java.util.Set;

public class FeedbackMobileListView extends FeedbackMobileListView_Roo_Gwt {

    private static com.puglieseweb.client.managed.ui.FeedbackMobileListView instance;

    public FeedbackMobileListView() {
        super("New Feedback", new CellRenderer());
        init();
    }

    public static com.puglieseweb.client.managed.ui.FeedbackMobileListView instance() {
        if (instance == null) {
            instance = new FeedbackMobileListView();
        }
        return instance;
    }

    public String[] getPaths() {
        return paths.toArray(new String[paths.size()]);
    }

    private static class CellRenderer extends AbstractSafeHtmlRenderer<FeedbackProxy> {

        private final String dateStyle = ScaffoldMobileApp.getMobileListResources().cellListStyle().dateProp();

        private final String secondaryStyle = ScaffoldMobileApp.getMobileListResources().cellListStyle().secondaryProp();

        private final Renderer<String> primaryRenderer = new AbstractRenderer<String>() {

            public String render(java.lang.String obj) {
                return obj == null ? "" : String.valueOf(obj);
            }
        };

        private final Renderer<String> secondaryRenderer = new AbstractRenderer<String>() {

            public String render(java.lang.String obj) {
                return obj == null ? "" : String.valueOf(obj);
            }
        };

        @Override
        public SafeHtml render(FeedbackProxy value) {
            if (value == null) {
                return SafeHtmlUtils.EMPTY_SAFE_HTML;
            }
            SafeHtmlBuilder sb = new SafeHtmlBuilder();
            if (value.getFeedback() != null) {
                sb.appendEscaped(primaryRenderer.render(value.getFeedback()));
            }
            sb.appendHtmlConstant("<div style=\"position:relative;\">");
            sb.appendHtmlConstant("<div class=\"" + secondaryStyle + "\">");
            if (value.getName() != null) {
                sb.appendEscaped(secondaryRenderer.render(value.getName()));
            }
            sb.appendHtmlConstant("</div>");
            sb.appendHtmlConstant("<div class=\"" + dateStyle + "\">");
            sb.appendHtmlConstant("</div>");
            sb.appendHtmlConstant("</div>");
            return sb.toSafeHtml();
        }
    }
}
