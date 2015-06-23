<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<article>
	<aside>
		<b>Resources:</b> <a
			href="http://www.avajava.com/tutorials/lessons/how-do-i-use-a-jdbc-realm-with-tomcat-and-mysql.html">http://www.avajava.com/tutorials/lessons/how-do-i-use-a-jdbc-realm-with-tomcat-and-mysql.html</a>
	</aside>

	<h2>Realm</h2>
	<p>Authentication can be controlled by a web application or by the
		container (such as TomcatSW) that the web application runs in.</p>
	<p>Tomcat's container-managed security is based on realms. A realm
		contains the names of users, their passwords, and roles.</p>
	<h3>UserDatabase realm</h3>
	<p>
		The Tomcat (version 5.5.20) comes configured with a <strong>UserDatabase</strong>
		realm as an active realm. The UserDatabase realm uses the
		tomcat-users.xml file in Tomcat's conf directory as the location for
		the name, password, and role data. Data from this file gets loaded
		when Tomcat starts up and not at other times. Typically you need to
		modify this file manually to update it, so it's probably most useful
		during development but not in an actual production system.
	</p>
	<h3>JDBCW realm</h3>
	<p>Benefits of a JDBC realm over a UserDatabase realm include being
		able to dynamically update the JDBC realm data at runtime rather than
		only at startup.</p>
	<p>By default, in Tomcat's server.xml file, the UserDatabase realm
		is uncommented while a sample JDBC realm for MySQLW is commented out.</p>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>