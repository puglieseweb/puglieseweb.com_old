<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/keywords.inc.php';
$title = "Glassfish vs Tomcat";
$description = "Differences between Glassfish and Tomcat";
$keywords = "$java_keywords,glassfish vs tomcat,glassfish tomcat";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<article>
    <h2>Tutorials</h2>
    <h3>
	<a href="http://netbeans.org/kb/docs/javaee/ecommerce/entity-session.html">The		NetBeans E-commerce Tutorial - Adding Entity Classes and Session Beans</a>
    </h3>
    <p>A Java EE container contains three essential components:
    <ul>
	<li>a web (i.e., servlet) container</li>
	<li>an EJB container</li>
	<li>a persistence provider</li>
    </ul>

    <h4>Persistence unit</h4>
    <p>A persistence unit refers to a collection of entity classes that exist in an application.</p>

    <h4><code>@Entity</code></h4>
    <p>The EntityManager maps the entity onto a database.</p>

    <h4>Entity Manager</h4>
    <p>In CMEM (Container-Managed Entity Managers) an EnityManager is managed by the container.</p>
    <p>CMEM uses the Java JTA transaction API.</p>

    <h4>@PersistenceContext(unitName="BankService") private EntityManager em;</h4>
    <p>Calls the container created, <code>EntityManagerFactory</code> (we should have one  EntityManagerFactory per Database) to create EntityManager instance and inject this into the local variable.</p>
    <p><strong>Whenever a new transaction start a new persistent context is created.</strong></p>
    <p>This means that for a stateful session bean each method invocation is a separated transaction. In consequence a new persistence context is created! ==> The entity become <strong>detached</strong> a need of a <code>merge</code> operation.</p>

    <!-- Finish this part -->

    <b>TODO</b> Finish this part.

    <h4>persistence.xml</h4>
    <p>It is used by the persistence provicer (e.g. Hibernate or EclipseLink) to specify configuration settings for the persistence unit.</p>

    <p>In Netbeans the "Table Generation Strategy" execute the chosen action each time the project is deployed</p>
    

</p>

</article>

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>