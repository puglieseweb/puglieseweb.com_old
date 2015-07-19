<%--@elvariable id="content" type="info.magnolia.jcr.util.ContentMap"--%>
<%@ include file="../includes/taglibs.jsp"%>

<div style="padding:5px;border: 1px solid lightgray;-moz-border-radius:4px;margin-bottom:10px;">
    <span style="display:block;font-size:20px;border-bottom:1px solid;margin-bottom:3px;">${content.category}</span>
    <table width="100%">
        <tr> 
            <th align="left">Title</th>
            <th align="left">Price</th>
        </tr>
        <c:forEach items="${books}" var="book">
            <tr>
                <td>${book.title}</td>
                <td align="right"><nobr>&euro; ${book.price}.00</nobr></td>
            </tr>
        </c:forEach>
    </table>
</div>
