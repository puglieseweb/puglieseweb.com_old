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

import java.util.ArrayList;
import java.util.List;
import javax.servlet.http.HttpSession;
import javax.validation.Valid;

import com.puglieseweb.app.web.service.Customer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.puglieseweb.app.web.service.Order;
import com.puglieseweb.app.web.service.OrderRow;
import com.puglieseweb.app.web.service.SalesApplicationWebService;
import info.magnolia.module.blossom.annotation.Template;

/**
 * Displays a from where the visitor can fill in his address and so on to complete his purchase.
 */
@Controller
@Template(title = "Purchase Form", id = "blossomPugliesewebModule:components/purchase")
public class PurchaseFormComponent {

    @Autowired
    private SalesApplicationWebService salesApplicationWebService;

    @RequestMapping(value = "/purchase", method = RequestMethod.GET)
    public String render(@ModelAttribute PurchaseForm form) {
        return "components/purchaseForm.jsp";
    }

    @RequestMapping(value = "/purchase", method = RequestMethod.POST)
    public String handleSubmit(@Valid PurchaseForm form, BindingResult result, HttpSession session) {

        if (result.hasErrors()) {
            return "components/purchaseForm.jsp";
        }

        ShoppingCart shoppingCart = ShoppingCart.getShoppingCart(session);

        List<OrderRow> rows = new ArrayList<OrderRow>();
        for (ShoppingCartItem cartItem : shoppingCart.getItems()) {
            rows.add(new OrderRow(cartItem.getProduct().getArticleCode(), cartItem.getQuantity()));
        }

        Customer customer = new Customer();
        customer.setFirstName(form.getFirstName());
        customer.setLastName(form.getLastName());
        customer.setAddressLine1(form.getAddressLine1());
        customer.setAddressLine2(form.getAddressLine2());
        customer.setPhoneNumber(form.getPhoneNumber());
        customer.setEmail(form.getEmail());

        Order order = new Order(customer, rows);

        salesApplicationWebService.placeOrder(order);

        shoppingCart.clear();

        return "components/purchaseFormSubmitted.jsp";
    }
}
