/**
 * This file Copyright (c) 2010-2015 Magnolia International
 * Ltd.  (http://www.magnolia-cms.com). All rights reserved.
 *
 *
 * This file is dual-licensed under both the Magnolia
 * Network Agreement and the GNU General Public License.
 * You may elect to use one or the other of these licenses.
 *
 * This file is distributed in the hope that it will be
 * useful, but AS-IS and WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE, TITLE, or NONINFRINGEMENT.
 * Redistribution, except as permitted by whichever of the GPL
 * or MNA you select, is prohibited.
 *
 * 1. For the GPL license (GPL), you can redistribute and/or
 * modify this file under the terms of the GNU General
 * Public License, Version 3, as published by the Free Software
 * Foundation.  You should have received a copy of the GNU
 * General Public License, Version 3 along with this program;
 * if not, write to the Free Software Foundation, Inc., 51
 * Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * 2. For the Magnolia Network Agreement (MNA), this file
 * and the accompanying materials are made available under the
 * terms of the MNA which accompanies this distribution, and
 * is available at http://www.magnolia-cms.com/mna.html
 *
 * Any modifications to this file must keep this entire header
 * intact.
 *
 */
package com.puglieseweb.app.web.templates.components;

import java.util.List;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;

import com.puglieseweb.app.web.service.SalesApplicationWebService;
import com.puglieseweb.app.web.service.Tour;
import info.magnolia.cms.core.Content;
import info.magnolia.module.blossom.annotation.TabFactory;
import info.magnolia.module.blossom.annotation.Template;
import info.magnolia.module.blossom.annotation.TemplateDescription;
import info.magnolia.ui.form.config.OptionBuilder;
import info.magnolia.ui.form.config.SelectFieldBuilder;
import info.magnolia.ui.form.config.TabBuilder;
import info.magnolia.ui.framework.config.UiConfig;

/**
 * Component that displays a description of a tour. The tour is selectable by the editor in a dialog.
 */
@Template(title = "Tour", id = "blossomPugliesewebModule:components/tour")
@TemplateDescription("Description of a tour")
@Controller
public class TourComponent {

    @Autowired
    private SalesApplicationWebService salesApplicationWebService;

    @RequestMapping("/tour")
    public String render(ModelMap model, HttpSession session, HttpServletRequest request, Content content) {

        String articleCode = content.getNodeData("articleCode").getString();

        Tour tour = salesApplicationWebService.getTour(articleCode);

        if ("add".equals(request.getParameter("action"))) {

            ShoppingCart shoppingCart = ShoppingCart.getShoppingCart(session);

            shoppingCart.addItem(tour, Integer.parseInt(request.getParameter("quantity")));

            return "redirect:" + request.getRequestURL();
        }

        model.put("tour", tour);

        return "components/tour.jsp";
    }

    @TabFactory("Content")
    public void contentTab(UiConfig cfg, TabBuilder tab) {
        List<Tour> tours = salesApplicationWebService.getAllTours();
        SelectFieldBuilder field = cfg.fields.select("articleCode").label("Tour");
        for (Tour tour : tours) {
            field.options(new OptionBuilder().label(tour.getName()).value(tour.getArticleCode()));
        }
        tab.fields(field);
    }
}
