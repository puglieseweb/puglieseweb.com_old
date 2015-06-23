<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<div id="content">
<h2>Class loader</h2>
<p>A class loader is an object that is responsible for loading classes.</p>
<p>Class loader are <b>hirarchcal</b> and use <b>delegation model</b>
to load a class.</p>
<p>The <b>Bootstrap</b> class, the one embedded within the JVM have <b>no
visiblility
</b>it the class it loades <br>
</p>
<p>Every <b>Class object</b> contains a reference to the <b>ClassLoader</b>
that defined it:</p>
<h4>Exceptions:</h4>
<ul>
  <li>Class&nbsp;objects for <b>array classes </b>are <b>not created
by class loaders</b></li>
  <li>if the element type is a primitive type, then the array class has
no class loader</li>
</ul>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>