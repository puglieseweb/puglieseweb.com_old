<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<div id="content">

<h1>Applicatio Controller and EJB<br>
</h1>
<p>Many business applications support several presentation layers. <br>
</p>
<p>HTTP
clients may handle web applications. <br>
</p>
<p>Swing clients may handle desktop
applications. <br>
</p>
<p>Behind these presentation tiers, there&#8217;s often an
<strong>application controller</strong>, or<strong> state machine</strong>.
</p>
<p>Programmers implement many
Enterprise JavaBean (EJB) applications this way. The EJB tier has its
own controller, which connects to different presentation tiers through
a business fa&ccedil;ade or delegate.</p>
<code><br>
</code>
<div>
<h5>Requirement<br>
</h5>
<p>Accept requests</p>
<h5>Resolution</h5>
<code>public Response processRequest(Request request)</code>
</div>
<br>
<div>
<h5>Requirement</h5>
<p>Select handler<br>
</p>
<h5>Resolution</h5>
<code>this.requestHandlers.get(request.getName())</code>
</div>
<br>
<div>
<h5>Requirement</h5></div>
<?php require '../
<p>Route requests<br>
</p>
<h5>Resolution</h5>
<code>response = getRequestHandler(request).process(request);</code>
</div>
<br>
<div>
<h5>Requirement</h5>
<p>Error handling<br>
</p>
<h5>Resolution</h5>
<code>Subclass ErrorResponse</code>
</div>
<br>
<br>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.php'; ?>