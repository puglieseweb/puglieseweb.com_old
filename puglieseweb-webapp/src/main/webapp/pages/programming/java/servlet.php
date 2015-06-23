<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<h2>Servlets</h2>
<h3>Servlet Hierarchy</h3>
<p>A servlet is an object that extends either the <code>javax.servlet.GenericServlet</code> class or the <code>javax.servlet.http.HttpServlet</code> class.
    <br />The <code>javax.servlet.GenericServlet</code> class defines methods for building generic, protocol-independent servlets.
    <br />The <code>javax.servlet.http.HttpServlet</code> class extends this class to provide HTTP-specific methods.
</p>
<aside>
    <b>Reference:</b>
    <a href="http://www.j2eetutorials.50webs.com/servlet-hierarchy.html">Servlet Hierarchy</a>
</aside>

<h3>
    Maven dependency - Adding the javadoc to the servlet package
</h3>
<p>
    <code>javax.servlet.http</code>
</p>
<p>
    <a href="http://stackoverflow.com/questions/4379375/how-to-get-eclipsemaven-to-find-and-use-servlet-api-source-code-or-javadoc" name="servlet javadoc">http://stackoverflow.com/questions/4379375/how-to-get-eclipsemaven-to-find-and-use-servlet-api-source-code-or-javadoc</a>
</p>
<h3>
    (Web) Application context
</h3>
<p>
    <code>ServletContext context = getServletContext();</code>
</p>
<p>
    There is one context per "web application" per Java Virtual Machine.
</p>
<p>
    A &quot;web application&quot; is a collection of servlets and content installed under a specific subset of the server&#039;s URL namespace such as /catalog and possibly installed via a .war file.
</p>
<p>
    <strong>In distributed environment, the context cannot be used as a <span class="underline">location to share global information</span></strong>.Use an external resource like a database instead.
</p>
<p>
    The <strong>ServletContext</strong> object is contained within the<strong> ServletConfig</strong> object, which the Web server provides the servlet when the servlet is initialized </p>

<h3>RequestDispatcher</h3>
<p>Defines an object that <strong>receives requests from the client</strong> and <strong>sends them to any resource</strong> (such as a servlet, HTML file, or JSP file) on the server.
</p>

<p>The <strong>servlet container</strong> creates the <code>RequestDispatcher</code> object, which is <span style="underline">used as a wrapper around a server resource</span> located at a particular path or given by a particular name.
</p>
<p>
    This interface is intended to wrap servlets, but a servlet container can create RequestDispatcher objects to wrap any type of resource.</p>

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>
