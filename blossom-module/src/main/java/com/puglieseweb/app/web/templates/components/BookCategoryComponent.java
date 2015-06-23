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

import java.util.Collection;

import com.puglieseweb.app.web.service.SalesApplicationWebService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;

import info.magnolia.module.blossom.annotation.TabFactory;
import info.magnolia.module.blossom.annotation.Template;
import info.magnolia.module.blossom.annotation.TemplateDescription;
import info.magnolia.ui.form.config.TabBuilder;
import info.magnolia.ui.framework.config.UiConfig;

import javax.jcr.Node;
import javax.jcr.RepositoryException;

/**
 * Component that renders a list of the books in a configurable category. The available categories
 * are fetched from the SalesApplicationWebService and the editor can then select which one should be
 * displayed.
 */
@Template(title = "Book category", id = "blossomPugliesewebModule:components/bookCategory")
@TemplateDescription("A list of the books for a certain category.")
@Controller
@Promo
public class BookCategoryComponent {

    @Autowired
    private SalesApplicationWebService salesApplicationWebService;

    @RequestMapping("/bookcategory")
    public String render(ModelMap model, Node content) throws RepositoryException {
        String category = content.getProperty("category").getString();
        model.put("books", salesApplicationWebService.getBooksInCategory(category));
        return "components/bookCategory.jsp";
    }

    @TabFactory("Content")
    public void contentTab(UiConfig cfg, TabBuilder tab) {
        Collection<String> categories = salesApplicationWebService.getBookCategories();
        tab.fields(
                cfg.fields.select("category").label("Category").options(categories)
        );
    }
}
