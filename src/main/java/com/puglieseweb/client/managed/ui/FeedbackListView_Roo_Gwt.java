// WARNING: DO NOT EDIT THIS FILE. THIS FILE IS MANAGED BY SPRING ROO.

package com.puglieseweb.client.managed.ui;

import com.google.gwt.core.client.GWT;
import com.google.gwt.i18n.client.DateTimeFormat;
import com.google.gwt.text.client.DateTimeFormatRenderer;
import com.google.gwt.text.shared.AbstractRenderer;
import com.google.gwt.text.shared.Renderer;
import com.google.gwt.uibinder.client.UiBinder;
import com.google.gwt.uibinder.client.UiField;
import com.google.gwt.user.cellview.client.CellTable;
import com.google.gwt.user.cellview.client.HasKeyboardSelectionPolicy.KeyboardSelectionPolicy;
import com.google.gwt.user.cellview.client.TextColumn;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.HTMLPanel;
import com.puglieseweb.client.managed.request.FeedbackProxy;
import com.puglieseweb.client.scaffold.place.AbstractProxyListView;
import java.util.HashSet;
import java.util.Set;

public abstract class FeedbackListView_Roo_Gwt extends AbstractProxyListView<FeedbackProxy> {

    @UiField
    CellTable<FeedbackProxy> table;

    protected Set<String> paths = new HashSet<String>();

    public void init() {
        paths.add("id");
        table.addColumn(new TextColumn<FeedbackProxy>() {

            Renderer<java.lang.Long> renderer = new AbstractRenderer<java.lang.Long>() {

                public String render(java.lang.Long obj) {
                    return obj == null ? "" : String.valueOf(obj);
                }
            };

            @Override
            public String getValue(FeedbackProxy object) {
                return renderer.render(object.getId());
            }
        }, "Id");
        paths.add("version");
        table.addColumn(new TextColumn<FeedbackProxy>() {

            Renderer<java.lang.Integer> renderer = new AbstractRenderer<java.lang.Integer>() {

                public String render(java.lang.Integer obj) {
                    return obj == null ? "" : String.valueOf(obj);
                }
            };

            @Override
            public String getValue(FeedbackProxy object) {
                return renderer.render(object.getVersion());
            }
        }, "Version");
        paths.add("feedback");
        table.addColumn(new TextColumn<FeedbackProxy>() {

            Renderer<java.lang.String> renderer = new AbstractRenderer<java.lang.String>() {

                public String render(java.lang.String obj) {
                    return obj == null ? "" : String.valueOf(obj);
                }
            };

            @Override
            public String getValue(FeedbackProxy object) {
                return renderer.render(object.getFeedback());
            }
        }, "Feedback");
        paths.add("name");
        table.addColumn(new TextColumn<FeedbackProxy>() {

            Renderer<java.lang.String> renderer = new AbstractRenderer<java.lang.String>() {

                public String render(java.lang.String obj) {
                    return obj == null ? "" : String.valueOf(obj);
                }
            };

            @Override
            public String getValue(FeedbackProxy object) {
                return renderer.render(object.getName());
            }
        }, "Name");
        paths.add("email");
        table.addColumn(new TextColumn<FeedbackProxy>() {

            Renderer<java.lang.String> renderer = new AbstractRenderer<java.lang.String>() {

                public String render(java.lang.String obj) {
                    return obj == null ? "" : String.valueOf(obj);
                }
            };

            @Override
            public String getValue(FeedbackProxy object) {
                return renderer.render(object.getEmail());
            }
        }, "Email");
    }
}
