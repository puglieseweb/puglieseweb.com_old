<%--@elvariable id="content" type="info.magnolia.jcr.util.ContentMap"--%>
<%--@elvariable id="navigation" type="java.util.Map<java.lang.String, java.lang.String>"--%>
<%@ include file="../includes/taglibs.jsp" %>
<%@ include file="../includes/master-head.inc.jsp" %>
    <div id="menu">
        <ul>
            <c:forEach items="${navigation}" var="navigationEntry">
                <li><a href="${pageContext.request.contextPath}${navigationEntry.key}.html">${navigationEntry.value}</a>
                </li>
            </c:forEach>
        </ul>
    </div>
    <h1> Working in progress... </h1>
    <p> Hi! I am building my personal blog which will host tutorials about the technology I about web site </p>
        <cms:area name="main"/>

        <cms:area name="promos"/>

<%@ include file="../includes/master-foot.inc.jsp" %>

