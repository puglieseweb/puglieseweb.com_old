<%--@elvariable id="tour" type="com.puglieseweb.app.web.service.Tour"--%>
<%@ include file="../includes/taglibs.jsp"%>

<h2>${tour.name}</h2>

${tour.description}

<br/><br/><br/>

<form action="?">
    <blossom:pecid-input />
    Quantity: <input type="hidden" name="action" value="add" />
    <input type="text" name="quantity" size="4" />
    <input type="submit" value="Add to cart" />
</form>
<br/><br/>
