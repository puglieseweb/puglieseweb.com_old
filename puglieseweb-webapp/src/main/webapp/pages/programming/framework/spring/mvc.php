<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<article>
	<header>
		<h2>Spring MVC</h2>
	</header>
	<section>
		<h3>The Spring Container</h3>
		<p>The Spring container can be instantiated in different ways:
		<ul>
			<li>
				<h4>Using Spring Core module</h4>
				<p>
					We have to create an instance of a sub class of the <strong>ApplicationContext</strong>
					interface. We can user the <strong>ClassPathXmlApplicationContext</strong>
					implementation.
				</p>

			</li>
			<li>
				<h4>Using the Spring MVC module</h4>
				<p>
					It is sufficient to load the <strong>ApplicationServlet</strong>
					and provide an XML configuration file. Automatically the Spring
					Container will be instantiated.
				</p>
			</li>
		</ul>
		<aside>
			<dl>
				<dt>Application Servlet</dt>
				<dd>Acts as a bridge between the servlet container and the
					application engine.</dd>
				<dd>
					Reference: <a
						href="http://tapestry.apache.org/tapestry3/doc/DevelopersGuide/engine.servlet.html">Application
						Servlet</a>
				</dd>
				<dt>Web Application</dt>
				<dd>
					<p>A web application is a self-contained subtree of the web
						site. It has a distinct Application object (ServletContext),
						sessions, and servlet mappings.</p>
					<p>
						Web applications are configured with the
						<xbm> <web-app></xbm>
						tag, which can occur in a number of places.
					</p>
					<p>WEB-INF/web.xml contains a top-level web-app element. It is
						the Servlet standard location for defining things like servlet
						mappings and security roles.</p>
				</dd>
				<dd>
					Reference: <a
						href="http://www.caucho.com/resin-3.0/config/webapp.xtp">Web
						Application</a>
				</dd>
			</dl>
		</aside>
	</section>
	<section>
		<h3>The WebApplicationContext</h3>
		<p>
			The <strong>WebApplicationContext</strong> interface is an extension
			to the <strong>ApplicationContext</strong> interface.
		</p>
		<p>It only adds one extra method called getServletContext() and
			declare some constants values.</p>
		<p>The WebApplicationContext initially loads three classes:
		<ul>
			<li>HandlerMapping class(es)</li>
			<li>ViewResolver class(es)</li>
			<li>Controller class(es)</li>
		</ul>
	</section>
	<section>
		<h3>DispatcherServlet</h3>
		<p>
			DispatcherServlet is a plain ordinary Servlet that belongs to the
			Servlet hierarchy: we need to declare the servlet in the <strong>web.xml</strong>.
		</p>
		<p>
			Doing so, we are implicitly telling the Spring Container which
			configuration file to use (that is, <strong>servlet_name-servlet.xml</strong>).
		</p>
		<p>
			Looking at
			<code>org.springframework.web.servlet.DispatcherServlet</code>
			API notice this:
		</p>
		<p>
			<cite> “A web application can define any number of
				DispatcherServlets. Each servlet will operate in its own namespace,
				loading its own application context with mappings, handlers, etc.
				Only the root application context as loaded by
				ContextLoaderListener, if any, will be shared.” </cite>
		</p>
		<p>This brings an interesting point – in a Spring Web App you have
			one root application context which is private, and many dispatcher
			servlet application contexts which are children of the root
			application context.</p>
		<aside>
			<p>
				<b>Key concepts:</b> Each DispatcherServlet load it's own
				Application Context
			</p>
		</aside>
	</section>


</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>