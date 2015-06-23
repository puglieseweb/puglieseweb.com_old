<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/keywords.inc.php';
$title = "Glassfish vs Tomcat";
$description = "Differences between Glassfish and Tomcat";
$keywords = "$java_keywords,glassfish vs tomcat,glassfish tomcat";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<article>
    <h2>GlassFish Server</h2>
    <aside>
	<a href="http://download.oracle.com/docs/cd/E18930_01/html/821-2432/docinfo.html#scrolltoc">Quick start
	    guide</a>
    </aside>
    <section>
	<h3>GlassFish Commands</h3>
	<dl>
	    <dt><command>wsgen</command></dt>
	    <dd><p>Tool to generate WSDL files from a Java "endpoint implementation class."
		</p>
		<p><b>Note:</b> A WSDL file is automatically created by the server container at deploy time.</p>
	    </dd>
	    <dt><command>wsimport</command></dt>
	    <dd>generate the proxies for the client consumers.</dd>
	</dl>
    </section>
</article>

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>