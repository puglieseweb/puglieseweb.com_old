/**
 * This file Copyright (c) 2011-2015 Magnolia International
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
package com.puglieseweb.app.web.setup;

import info.magnolia.context.MgnlContext;
import info.magnolia.link.LinkException;
import info.magnolia.link.LinkUtil;
import info.magnolia.module.blossom.view.UuidRedirectViewResolver;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import javax.jcr.Node;
import javax.jcr.RepositoryException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.BeansException;
import org.springframework.context.ApplicationContext;
import org.springframework.web.util.UrlPathHelper;
import org.springframework.webflow.context.servlet.DefaultFlowUrlHandler;
import org.springframework.webflow.context.servlet.ServletExternalContext;
import org.springframework.webflow.core.FlowException;
import org.springframework.webflow.core.collection.AttributeMap;
import org.springframework.webflow.core.collection.MutableAttributeMap;
import org.springframework.webflow.execution.FlowExecutionOutcome;
import org.springframework.webflow.mvc.servlet.AbstractFlowHandler;
import org.springframework.webflow.mvc.servlet.FlowController;
import org.springframework.webflow.mvc.servlet.FlowHandlerAdapter;

/**
 * Abstract base class for controllers serving a single WebFlow. Subclasses must set the FlowExecutor and when using
 * &#64;MVC should override <code>handleRequest</code> and add &#64;RequestMapping to it.
 * <p/>
 * Default behaviour:
 * <ul>
 * <li>when a NoSuchFlowExecutionException is thrown a redirect will be made to the original request uri</li>
 * <li>on other exceptions the exceptions bubbles out to the DispatcherServlet exception handling</li>
 * <li>when the flow completes and no view is set a redirect will be made to the original request uri</li>
 * </ul>
 *
 * @see FlowController
 * @see FlowHandlerAdapter
 * @see org.springframework.webflow.mvc.servlet.FlowHandler
 */
public abstract class AbstractSingleFlowController extends FlowController {

    /**
     * Copied from DefaultFlowUrlHandler since it's private there.
     */
    private static final String DEFAULT_FLOW_EXECUTION_KEY_PARAMETER = "execution";

    private String flowExecutionKeyParameter = DEFAULT_FLOW_EXECUTION_KEY_PARAMETER;
    private UrlPathHelper urlPathHelper = new UrlPathHelper();
    private CustomFlowUrlHandler flowUrlHandler;
    private String flowId;

    protected AbstractSingleFlowController(String flowId) {
        this.flowId = flowId;
        this.flowUrlHandler = new CustomFlowUrlHandler();
        CustomFlowHandlerAdapter flowHandlerAdapter = new CustomFlowHandlerAdapter();
        flowHandlerAdapter.setFlowUrlHandler(flowUrlHandler);
        super.setFlowHandlerAdapter(flowHandlerAdapter);
        super.registerFlowHandler(new CustomFlowHandler());
    }

    /**
     * Extension point for customizing the default behaviour in FlowUrlHandler.
     *
     * @see org.springframework.webflow.context.servlet.FlowUrlHandler#getFlowId(javax.servlet.http.HttpServletRequest)
     */
    public String getFlowId(HttpServletRequest request) {
        return flowId;
    }

    /**
     * Extension point for customizing the default behaviour in FlowUrlHandler.
     *
     * @see org.springframework.webflow.context.servlet.FlowUrlHandler#getFlowExecutionKey(javax.servlet.http.HttpServletRequest)
     */
    public String getFlowExecutionKey(HttpServletRequest request) {
        return request.getParameter(getFlowExecutionKeyParameter());
    }

    /**
     * Extension point for customizing the default behaviour in FlowUrlHandler. Uses the originating URI to create a URI
     * for resuming the flow.
     *
     * @see org.springframework.webflow.context.servlet.FlowUrlHandler#createFlowExecutionUrl(String, String, javax.servlet.http.HttpServletRequest)
     */
    public String createFlowExecutionUrl(String flowId, String flowExecutionKey, HttpServletRequest request) {
        StringBuilder url = new StringBuilder();
        url.append(urlPathHelper.getOriginatingRequestUri(request));
        url.append('?');
        HashMap<String, String> parameters = new HashMap<String, String>();
        parameters.put(getFlowExecutionKeyParameter(), flowExecutionKey);
        this.flowUrlHandler.appendQueryParameters(url, parameters, this.flowUrlHandler.getEncodingScheme(request));
        return url.toString();
    }

    /**
     * Extension point for customizing the default behaviour in FlowUrlHandler. uses the originating URI to create a URI
     * for starting the flow.
     *
     * @see org.springframework.webflow.context.servlet.FlowUrlHandler#createFlowDefinitionUrl(String, org.springframework.webflow.core.collection.AttributeMap, javax.servlet.http.HttpServletRequest)
     */
    public String createFlowDefinitionUrl(String flowId, AttributeMap input, HttpServletRequest request) {
        StringBuilder url = new StringBuilder();
        url.append(urlPathHelper.getOriginatingRequestUri(request));
        if (input != null && !input.isEmpty()) {
            url.append('?');
            this.flowUrlHandler.appendQueryParameters(url, input.asMap(), this.flowUrlHandler.getEncodingScheme(request));
        }
        return url.toString();
    }

    /**
     * Extension point for customizing the default behaviour in FlowUrlHandler.
     *
     * @see org.springframework.webflow.context.servlet.DefaultFlowUrlHandler#setEncodingScheme(String)
     */
    public void setUrlEncodingScheme(String encodingScheme) {
        flowUrlHandler.setEncodingScheme(encodingScheme);
    }

    public String getFlowExecutionKeyParameter() {
        return this.flowExecutionKeyParameter;
    }

    public void setFlowExecutionKeyParameter(String flowExecutionKeyParameter) {
        this.flowExecutionKeyParameter = flowExecutionKeyParameter;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandler.
     *
     * @see org.springframework.webflow.mvc.servlet.FlowHandler#createExecutionInputMap(javax.servlet.http.HttpServletRequest)
     */
    public MutableAttributeMap<Object> createExecutionInputMap(HttpServletRequest request) {
        return null;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandlerAdapter.
     *
     * @return null to fall back to default implementation
     * @see FlowHandlerAdapter#defaultCreateFlowExecutionInputMap(javax.servlet.http.HttpServletRequest)
     */
    protected MutableAttributeMap<Object> defaultCreateFlowExecutionInputMap(HttpServletRequest request) {
        return null;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandler.
     *
     * @see org.springframework.webflow.mvc.servlet.FlowHandler#handleExecutionOutcome(org.springframework.webflow.execution.FlowExecutionOutcome, javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
     */
    public String handleExecutionOutcome(FlowExecutionOutcome outcome, HttpServletRequest request, HttpServletResponse response) {
        return null;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandlerAdapter.
     *
     * @return false to fall back to default implementation
     * @see FlowHandlerAdapter#defaultHandleExecutionOutcome(String, org.springframework.webflow.execution.FlowExecutionOutcome, org.springframework.webflow.context.servlet.ServletExternalContext, javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
     */
    protected boolean defaultHandleExecutionOutcome(String flowId, FlowExecutionOutcome outcome, ServletExternalContext context, HttpServletRequest request, HttpServletResponse response) throws IOException {
        return false;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandler.
     *
     * @see org.springframework.webflow.mvc.servlet.FlowHandler#handleException(org.springframework.webflow.core.FlowException, javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
     */
    public String handleException(FlowException e, HttpServletRequest request, HttpServletResponse response) {
        return null;
    }

    /**
     * Extension point for customizing the default behaviour in FlowHandlerAdapter.
     *
     * @return false to fall back to default implementation
     * @see FlowHandlerAdapter#defaultHandleException(String, org.springframework.webflow.core.FlowException, javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
     */
    protected boolean defaultHandleException(String flowId, FlowException e, HttpServletRequest request, HttpServletResponse response) throws IOException {
        return false;
    }

    /**
     * Allows for rewriting url prior to redirection.
     *
     * Implements support for redirecting to the currently rendered page using a placeholder. I.e:
     * <code>
     * view="externalRedirect:magnolia-redirect:main-content"
     * </code>
     *
     * @param url the url Spring WebFlow intends to redirect to
     * @return the rewritten url or if no change was made returns the passed in url unchanged
     */
    protected String rewriteRedirectUrl(String url) throws IOException {
        try {
            if (url.equals("/" + UuidRedirectViewResolver.REDIRECT_MAIN_CONTENT_PLACEHOLDER)) {
                Node node = MgnlContext.getAggregationState().getMainContentNode();
                String workspaceName = node.getSession().getWorkspace().getName();
                String identifier = node.getIdentifier();
                url = LinkUtil.convertUUIDtoURI(identifier, workspaceName);
            }
            return url;
        } catch (RepositoryException e) {
            throw new IOException("Could not convert placeholder to link", e);
        } catch (LinkException e) {
            throw new IOException("Could not convert placeholder to link", e);
        }
    }

    @Override
    public void setApplicationContext(ApplicationContext applicationContext) throws BeansException {
        super.setApplicationContext(applicationContext);
        super.getFlowHandlerAdapter().setApplicationContext(applicationContext);
    }

    @Override
    public void afterPropertiesSet() throws Exception {
        super.afterPropertiesSet();
        super.getFlowHandlerAdapter().afterPropertiesSet();
    }

    /**
     * Custom FlowUrlHandler that allows subclasses of AbstractSingleFlowController to customize behaviour.
     */
    protected class CustomFlowUrlHandler extends DefaultFlowUrlHandler {

        public String getFlowId(HttpServletRequest request) {
            return AbstractSingleFlowController.this.getFlowId(request);
        }

        @Override
        public String getFlowExecutionKey(HttpServletRequest request) {
            return AbstractSingleFlowController.this.getFlowExecutionKey(request);
        }

        @Override
        public String createFlowExecutionUrl(String flowId, String flowExecutionKey, HttpServletRequest request) {
            return AbstractSingleFlowController.this.createFlowExecutionUrl(flowId, flowExecutionKey, request);
        }

        @Override
        public String createFlowDefinitionUrl(String flowId, AttributeMap input, HttpServletRequest request) {
            return AbstractSingleFlowController.this.createFlowDefinitionUrl(flowId, input, request);
        }

        /**
         * Overridden to allow access.
         */
        @Override
        public <T> void appendQueryParameters(StringBuilder url, Map<java.lang.String, T> parameters, String encodingScheme) {
            super.appendQueryParameters(url, parameters, encodingScheme);
        }

        /**
         * Overridden to allow access.
         */
        @Override
        public String getEncodingScheme(HttpServletRequest request) {
            return super.getEncodingScheme(request);
        }
    }

    /**
     * Custom FlowHandler that handles our single flow. Allows subclasses of AbstractSingleFlowController to customize
     * behaviour.
     */
    protected class CustomFlowHandler extends AbstractFlowHandler {

        public String getFlowId() {
            return flowId;
        }

        @Override
        public MutableAttributeMap<Object> createExecutionInputMap(HttpServletRequest request) {
            return AbstractSingleFlowController.this.createExecutionInputMap(request);
        }

        @Override
        public String handleExecutionOutcome(FlowExecutionOutcome outcome, HttpServletRequest request, HttpServletResponse response) {
            return AbstractSingleFlowController.this.handleExecutionOutcome(outcome, request, response);
        }

        @Override
        public String handleException(FlowException e, HttpServletRequest request, HttpServletResponse response) {
            return AbstractSingleFlowController.this.handleException(e, request, response);
        }
    }

    /**
     * Custom FlowHandlerAdapter that allows subclasses of AbstractSingleFlowController to customize default behaviour.
     */
    protected class CustomFlowHandlerAdapter extends FlowHandlerAdapter {

        @Override
        protected MutableAttributeMap<Object> defaultCreateFlowExecutionInputMap(HttpServletRequest request) {
            MutableAttributeMap<Object> map = AbstractSingleFlowController.this.defaultCreateFlowExecutionInputMap(request);
            return map != null ? map : super.defaultCreateFlowExecutionInputMap(request);
        }

        @Override
        protected void defaultHandleExecutionOutcome(String flowId, FlowExecutionOutcome outcome, ServletExternalContext context, HttpServletRequest request, HttpServletResponse response) throws IOException {
            if (!AbstractSingleFlowController.this.defaultHandleExecutionOutcome(flowId, outcome, context, request, response)) {
                super.defaultHandleExecutionOutcome(flowId, outcome, context, request, response);
            }
        }

        @Override
        protected void defaultHandleException(String flowId, FlowException e, HttpServletRequest request, HttpServletResponse response) throws IOException {
            if (!AbstractSingleFlowController.this.defaultHandleException(flowId, e, request, response)) {
                super.defaultHandleException(flowId, e, request, response);
            }
        }

        @Override
        protected void sendRedirect(String url, HttpServletRequest request, HttpServletResponse response) throws IOException {
            url = rewriteRedirectUrl(url);
            super.sendRedirect(url, request, response);
        }
    }
}
