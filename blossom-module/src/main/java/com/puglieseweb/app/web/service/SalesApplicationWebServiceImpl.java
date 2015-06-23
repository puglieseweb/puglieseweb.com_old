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
package com.puglieseweb.app.web.service;


import java.util.ArrayList;
import java.util.Collection;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

/**
 * Mock implementation of SalesApplicationWebService that keeps a static set of products.
 */
public class SalesApplicationWebServiceImpl implements SalesApplicationWebService {

    private List<Book> books = new ArrayList<Book>();
    private List<Tour> tours = new ArrayList<Tour>();
    private Map<String, String> bookCategories = new LinkedHashMap<String, String>();

    public SalesApplicationWebServiceImpl() {
        Book book = new Book();
        book.setArticleCode("B001");
        book.setTitle("Monuments in Gothenburg");
        book.setAuthor("Brian Smith");
        book.setDescription("Lorem ipsum");
        book.setPrice(125);
        books.add(book);

        Book book2 = new Book();
        book2.setArticleCode("B002");
        book2.setTitle("Swedish Landmarks");
        book2.setAuthor("Gordon Bale");
        book2.setDescription("A colorful walkthrough of the most enticing landmarks in Sweden.");
        book2.setPrice(95);
        books.add(book2);

        bookCategories.put("Top Sellers", "B001");
        bookCategories.put("Featured", "B002");

        Tour tour = new Tour();
        tour.setArticleCode("T001");
        tour.setName("Famous statues walking tour");
        tour.setDescription("On this tour through central Gothenburg you'll see the most famous statues and hear their remarkable stories told by an expert guide from the regional tourist office.");
        tour.setPrice(50);

        tours.add(tour);
    }

    @Override
    public Book getBook(String articleCode) {
        for (Book book : books) {
            if (book.getArticleCode().equals(articleCode)) {
                return book;
            }
        }
        return null;
    }

    @Override
    public List<Book> getAllBooks() {
        return books;
    }

    @Override
    public Collection<String> getBookCategories() {
        return bookCategories.keySet();
    }

    @Override
    public List<Book> getBooksInCategory(String category) {
        String bookArticleCodes = bookCategories.get(category);
        if (bookArticleCodes != null) {
            List<Book> booksInCategory = new ArrayList<Book>();
            for (String articleCode : bookArticleCodes.split(",")) {
                for (Book book : books) {
                    if (book.getArticleCode().equals(articleCode)) {
                        booksInCategory.add(book);
                    }
                }
            }
            return booksInCategory;
        }
        return null;
    }

    @Override
    public Tour getTour(String articleCode) {
        for (Tour tour : tours) {
            if (tour.getArticleCode().equals(articleCode)) {
                return tour;
            }
        }
        return null;
    }

    @Override
    public List<Tour> getAllTours() {
        return tours;
    }

    @Override
    public void placeOrder(Order order) {
        System.out.println("Order placed by customer (" + order.getCustomer().getFirstName() + " " + order.getCustomer().getLastName() + ")");
        System.out.println("  for articles:");
        for (OrderRow row : order.getRows()) {
            System.out.println("    " + row.getArticleCode() + "\t " + row.getQuantity() + " unit(s).");
        }
    }
}
