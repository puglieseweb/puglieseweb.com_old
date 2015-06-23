<?php include '../../../../includes/master-head.inc.php'; ?>

  <h2>Realm
  <a href="http://www.avajava.com/tutorials/lessons/how-do-i-use-a-jdbc-realm-with-tomcat-and-mysql.html">http://www.avajava.com/tutorials/lessons/how-do-i-use-a-jdbc-realm-with-tomcat-and-mysql.html</a>
      </h1>
<p>
        <br />
        Authentication can be controlled by a web application or by the container (such as TomcatSW) that the web application runs in. Tomcat's container-managed security is based on realms. A realm contains the names of users, their passwords, and roles. </p><p>
My Tomcat (version 5.5.20) comes configured with a UserDatabase realm as an active realm. The UserDatabase realm uses the tomcat-users.xml file in Tomcat's conf directory as the location for the name, password, and role data. Data from this file gets loaded when Tomcat starts up and not at other times. Typically you need to modify this file manually to update it, so it's probably most useful during development but not in an actual production system.
</p><p>
Tomcat can be configured for other more robust realm alternatives. One such alternative is a JDBCW realm. Benefits of a JDBC realm over a UserDatabase realm include being able to dynamically update the JDBC realm data at runtime rather than only at startup. In Tomcat's server.xml file, we can see that the UserDatabase realm is uncommented while a sample JDBC realm for MySQLW is commented out:</p>
<?php include '../../../../includes/master-foot.inc.php'; ?>

