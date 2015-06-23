<%--@elvariable id="content" type="info.magnolia.jcr.util.ContentMap"--%>
<%--@elvariable id="shoppingCart" type="com.puglieseweb.app.web.templates.components.ShoppingCart"--%>
<%@ include file="../includes/taglibs.jsp"%>

<div style="padding:5px;border: 1px solid lightgray;-moz-border-radius:4px;margin-bottom:10px;">
    <span style="display:block;font-size:20px;border-bottom:1px solid;margin-bottom:3px;">Shopping Cart</span>
    <c:if test="${shoppingCart.numberOfItems eq 0}">
        <p>The shopping cart is empty</p>
    </c:if>
    <c:if test="${shoppingCart.numberOfItems > 0}">
        <table width="100%">
            <tr>
                <td>${shoppingCart.numberOfItems} item(s)</td>
                <td align="right">&euro; ${shoppingCart.totalPrice}.00</td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <br/>
                    <a href="${cmsfn:linkForWorkspace("website", content.checkoutLink)}">Checkout &raquo;</a>
                </td>
            </tr>
        </table>
    </c:if>
</div>
