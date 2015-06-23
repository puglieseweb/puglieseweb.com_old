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
import java.util.Calendar;
import java.util.Collection;
import java.util.List;
import javax.jcr.RepositoryException;
import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import info.magnolia.cms.beans.config.ContentRepository;
import info.magnolia.cms.core.Content;
import info.magnolia.cms.core.HierarchyManager;
import info.magnolia.cms.core.Path;
import info.magnolia.context.MgnlContext;
import info.magnolia.module.blossom.annotation.Template;

/**
 * A comment component for letting visitors leave feedback.
 * <p/>
 * Please note that this style of persistence is not recommended. If you have multiple public instances the submitted
 * comments will only be stored on one instance. The instances will become inconsistent. The recommended strategy
 * is to persist comments either in a database or in a clustered JCR repository.
 */
@Controller
@Template(title = "Comments", id = "blossomPugliesewebModule:components/comments")
public class CommentsComponent {

    @RequestMapping("/comments")
    public String render(ModelMap model, HttpServletRequest request, @RequestParam(value = "action", required = false) String action, Content content) throws RepositoryException {

        if ("add".equals(action)) {
            writeComment(request, content);
            return "redirect:" + request.getRequestURL();
        }
        if ("delete".equals(action)) {
            deleteComment(request, content);
            return "redirect:" + request.getRequestURL();
        }

        model.addAttribute("comments", readComments(content));
        return "components/comments.jsp";
    }

    private List<Comment> readComments(Content websiteNode) throws RepositoryException {

        List<Comment> list = new ArrayList<Comment>();

        if (websiteNode.hasContent("comments")) {
            Content commentsNode = websiteNode.getContent("comments");
            Collection<Content> children = commentsNode.getChildren();
            for (Content commentNode : children) {
                Comment comment = new Comment();
                comment.setName(commentNode.getNodeData("name").getString());
                comment.setEmail(commentNode.getNodeData("email").getString());
                comment.setText(commentNode.getNodeData("text").getString());
                comment.setCreated(commentNode.getNodeData("created").getDate().getTime());
                comment.setId(commentNode.getName());
                list.add(comment);
            }
        }

        return list;
    }

    private void writeComment(HttpServletRequest request, Content websiteNode) throws RepositoryException {

        Content commentsNode;
        if (websiteNode.hasContent("comments")) {
            commentsNode = websiteNode.getContent("comments");
        } else {
            commentsNode = websiteNode.createContent("comments");
        }

        HierarchyManager hierarchyManager = MgnlContext.getHierarchyManager(ContentRepository.WEBSITE);
        String label = Path.getUniqueLabel(hierarchyManager, commentsNode.getHandle(), "comment");

        Content commentNode = commentsNode.createContent(label);
        commentNode.setNodeData("name", request.getParameter("name"));
        commentNode.setNodeData("email", request.getParameter("email"));
        commentNode.setNodeData("text", request.getParameter("text"));
        commentNode.setNodeData("created", Calendar.getInstance());

        websiteNode.save();
    }

    private void deleteComment(HttpServletRequest request, Content websiteNode) throws RepositoryException {

        if (websiteNode.hasContent("comments")) {
            Content commentsNode = websiteNode.getContent("comments");
            commentsNode.delete(request.getParameter("id"));
            websiteNode.save();
        }
    }
}
