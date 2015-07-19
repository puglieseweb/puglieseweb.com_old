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

import com.puglieseweb.app.web.service.Book;
import com.puglieseweb.app.web.service.SalesApplicationWebService;
import info.magnolia.cms.core.Content;
import info.magnolia.module.blossom.annotation.TabFactory;
import info.magnolia.module.blossom.annotation.Template;
import info.magnolia.module.blossom.annotation.TemplateDescription;
import info.magnolia.ui.form.config.OptionBuilder;
import info.magnolia.ui.form.config.SelectFieldBuilder;
import info.magnolia.ui.form.config.TabBuilder;
import info.magnolia.ui.framework.config.UiConfig;

/**
 * Component that displays information about a book. The book is selected by the editor in a dialog and
 * read from the SalesApplicationWebService at display time.
 */
@Template(title = "Book", id = "blossomPugliesewebModule:components/book")
@TemplateDescription("Description of a book")
@Controller
public class BookComponent {

    @Autowired
    private SalesApplicationWebService salesApplicationWebService;

    @RequestMapping("/book")
    public String render(ModelMap model, HttpSession session, HttpServletRequest request, Content content) {

        String articleCode = content.getNodeData("articleCode").getString();

        Book book = salesApplicationWebService.getBook(articleCode);

        if ("add".equals(request.getParameter("action"))) {

            ShoppingCart shoppingCart = ShoppingCart.getShoppingCart(session);

            shoppingCart.addItem(book, Integer.parseInt(request.getParameter("quantity")));

            return "redirect:" + request.getRequestURL();
        }

        model.put("book", book);

        return "components/book.jsp";
    }

    @TabFactory("Content")
    public void contentTab(UiConfig cfg, TabBuilder tab) {
        List<Book> books = salesApplicationWebService.getAllBooks();
        SelectFieldBuilder field = cfg.fields.select("articleCode").label("Book");
        for (Book book : books) {
            field.options(new OptionBuilder().label(book.getTitle()).value(book.getArticleCode()));
        }
        tab.fields(field);
    }
}
