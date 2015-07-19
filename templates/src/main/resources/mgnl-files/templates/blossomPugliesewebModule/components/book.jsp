<%--@elvariable id="book" type="com.puglieseweb.app.web.service.Book"--%>
<%@ include file="../includes/taglibs.jsp"%>

<h2>${book.title}</h2>

by ${book.author}<br/>

${book.description}

<br/><br/><br/>

<form action="?">
    <blossom:pecid-input />
    Quantity: <input type="hidden" name="action" value="add" />
    <input type="text" name="quantity" size="4" />
    <input type="submit" value="Add to cart" />
</form>
<br/><br/>
