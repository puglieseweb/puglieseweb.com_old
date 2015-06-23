<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/keywords.inc.php';
$title = "Glassfish vs Tomcat";
$description = "Differences between Glassfish and Tomcat";
$keywords = "$java_keywords,glassfish vs tomcat,glassfish tomcat";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>
<article>
	<h3>
		GlassFish vsTomcat difference
	</h3>

	<p>
		Glassfish, JBoss, Websphere, etc. are heavy weight application servers that support the EJB standard and many
		more
		advanced features out of the box, GlassFish is a collection of Java EE containers, one of which is a Web
		container.</p>

	<p>
		Tomcat is just a Web container.
	</p>
	<aside>
		<b>Read more:</b>
		<a href="http://www.asjava.com/tomcat/glassfish-vs-tomcat/">GlassFish and Tomcat</a>
	</aside>
</article>
<?php
  include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>