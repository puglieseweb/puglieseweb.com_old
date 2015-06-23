<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>
	<header>
		<time class="updated" datetime="2011-11-03 11:11:03-0400" pubdate>03-11-2011</time>
		<?php require '../../../../includes/profile_box.inc.php'; ?>
		<hgroup>
			<h2>Spring</h2>
		</hgroup>
	</header>
	<section>
		<h3>What's Spring?</h3>
		<p>Spring is a modular POJO framework that provides hundred of
			packages for supporting Web and enterprise application development.</p>
		<p>At its core, Spring is a container that can manage the entire
			life cycle of an application.</p>
		<p>The container implements the IoC pattern that allows us to keep
			the dependences between different objects dynamic.</p>
		<b>Q: What's a dynamic dependence?</b>
		<p>A: For example, an object can have a reference to another
			object or to external resource like mail server.</p>
	</section>
	<section>
		<h3>IoC container</h3>
		<p>The Spring IoC container supports two types of DI:</p>

		<ul>
			<li>constructor injection</li>
			<li>setter injection</li>
		</ul>
		<p>To manage all the dependencies between objects the IoC uses:
		<ul>
			<li>external XML configuration file</li>
			<li>annotations</li>
		</ul>
		<section>

			<b>What's a ...</b>
			<dl>
				<dt>Spring Bean?</dt>
				<dd>It is any kind of object managed by the Spring container,
					it is called bean.</dd>
				<dt>Java Bean (JB)?</dt>
				<dd>An JB is a reusable general-purpose Java software
					component. It is a simple POJO Java Object that is serializable,
					has a nullary constructor, and allows access to properties using
					getter and setter methods. JBs can be visually manipulated in a
					builder tool.</dd>
				<dd>Java Beans are used to encapsulate many objects into a
					single object (the bean), so that they can be passed around as a
					single bean object instead of as multiple individual objects.</dd>
				<dd>A Java Bean is little more than a bag of data, containing
					state but not behaviour.</dd>
				<dt>Enterprise Java Beans (EJB)?</dt>
				<dd>An EJB is a reusable server-side enterprise software
					component which need to execute in an EJB container.</dd>
			</dl>
			<aside>
				<b>Resources</b>
				<p>Java: Article</p>
				<a href="http://java.sys-con.com/node/36515"> JavaBeans vs
					Enterprise JavaBeans</a>
			</aside>
		</section>
	</section>
	<section>
		<h3>How to start a spring project</h3>
		<ul>
			<li>
				<p>In Maven POM.xml import the sprign-context.jar module</p>
				<p>Maven will download the spring-context.jar library and its
					dependencies.</p>
			</li>
			<li>
				<p>Add Spring Project Nature to tell the Eclipse IDE to let us
					use some of the IDE functionalities provided by the Eclipse
					plug-ins.</p>
			</li>
		</ul>
	</section>
	<section>
		<h3>Spring Architecture</h3>
		<p>The Spring architecture is divided into different modules.</p>
		<p>Upper modules dependent on the lower modules</p>

		<img src="../../../resources/img/Interview2010_html_17bab21b.png"
			alt="spring modular architecture">

		<h3>Spring Modules and Maven Dependences</h3>

		<dl>
			<dt>Spring Core</dt>
			<dd>The basic IoC container for the objects (beans);</dd>
			<dd>

				<code>
					<pre>
				<xmp> 
<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-core</artifactId>
	<version>2.5.6</version>
</dependency>

<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-agent</artifactId>
	<version>2.5.6</version>
</dependency>
</xmp>
				</pre>
				</code>

			</dd>
			<dt>AOP</dt>
			<dd>provide apect Oriented Programming functionalities. Spring
				is integrated with the AspectJ framework. It helps in removing many
				scalability problems and modularizes the application</dd>
			<dd>
				<code>
					<pre>
				<xmp> 
<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-aop</artifactId>
	<version>${spring.version}</version>
</dependency>

<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-aspects</artifactId>
	<version>${spring.version}</version>
</dependency>
				</xmp>
				</pre>
				</code>
			</dd>
			<dt>Context</dt>
			<dd>Extends the core module. It provides the ApplicationContex:
				an advanced implementation of the bean factory of the IoC container.
			</dd>
			<dd>
				<code>
					<pre>
				<xmp> 
<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-context</artifactId>
	<version>${spring.version}</version>
</dependency>
				</xmp>
				</pre>
				</code>
			</dd>
			<dt>TX</dt>
			<dd>Transaction management services for the Java objects. They
				improve the efficiency of the connection, and thus reduce the risk
				of losing updates or of partial failures.</dd>
			<dd>
				<code>
					<pre>
				<xmp> 
<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-tx</artifactId>
	<version>${spring.version}</version>
</dependency>
				</xmp>
				</pre>
				</code>
			</dd>
			<dt>Web (Web MVC, Portlet MVC, Web Framework)</dt>
			<dd>built on top of the Web Module to provide the capabilities
				to use the standard MVC design pattern in the Web application view,
				as well as the service to implement other frameworks such as GWT</dd>

			<dt>Enterprise framework integration:</dt>
			<dd>not just an IoC container but a JEE application framework as
				well. It includes support for popular enterprise Java frameworks
				such as JMS, E-MAIL, and EJB.</dd>

			<dt>JDB:</dt>
			<dd>built on top of the native Java JDBC APIs, improving
				exception handling, query execution, and configuration, while still
				providing full access to the native JDBC.</dd>
			<dt>ORM</dt>
			<dd>provide integration support for the most popular Java ORM
				frameworks.</dd>
			<dd>
				<code>
					<pre>
				<xmp> 
<dependency>
	<groupId>com.google.appengine.orm</groupId>
	<artifactId>datanucleus-appengine</artifactId>
	<version>1.0.7.final</version>
</dependency>
<dependency>
	<groupId>com.google.appengine</groupId>
	<artifactId>appengine-api-1.0-sdk</artifactId>
	<version>${gae.version}</version>
</dependency>
<dependency>
	<groupId>com.google.appengine</groupId>
	<artifactId>appengine-testing</artifactId>
	<version>${gae-test.version}</version>
	<scope>test</scope>
</dependency>
<dependency>
	<groupId>com.google.appengine</groupId>
	<artifactId>appengine-api-stubs</artifactId>
	<version>${gae-test.version}</version>
	<scope>test</scope>
</dependency>
<dependency>
	<groupId>com.google.appengine</groupId>
	<artifactId>appengine-api-labs</artifactId>
	<version>${gae-test.version}</version>
	<scope>test</scope>
</dependency>
<dependency>
	<groupId>javax.persistence</groupId>
	<artifactId>persistence-api</artifactId>
	<version>1.0</version>
</dependency>
<dependency>
	<groupId>org.datanucleus</groupId>
	<artifactId>datanucleus-core</artifactId>
	<version>${datanucleus.version}</version>
	<scope>runtime</scope>
<exclusions>
<exclusion>
	<groupId>javax.transaction</groupId>
	<artifactId>transaction-api</artifactId>
</exclusion>
</exclusions>
	</dependency>
	<dependency>
<groupId>org.datanucleus</groupId>
	<artifactId>datanucleus-jpa</artifactId>
	<version>1.1.5</version>
</dependency>
<dependency>
	<groupId>org.datanucleus</groupId>
	<artifactId>datanucleus-rdbms</artifactId>
	<version>${datanucleus.version}</version>
</dependency>
<dependency>
	<groupId>org.datanucleus</groupId>
	<artifactId>datanucleus-enhancer</artifactId>
	<version>1.1.4</version>
</dependency>
<dependency>
	<groupId>javax.jdo</groupId>
	<artifactId>jdo2-api</artifactId>
	<version>2.3-ec</version>
	<exclusions>
		<exclusion>
			<groupId>javax.transaction</groupId>
			<artifactId>transaction-api</artifactId>
		</exclusion>
	</exclusions>
</dependency>
<dependency>
	<groupId>org.hibernate</groupId>
	<artifactId>hibernate-validator</artifactId>
	<version>4.1.0.Final</version>
	<exclusions>
		<exclusion>
			<groupId>javax.xml.bind</groupId>
			<artifactId>jaxb-api</artifactId>
		</exclusion>
		<exclusion>
			<groupId>com.sun.xml.bind</groupId>
			<artifactId>jaxb-impl</artifactId>
		</exclusion>
	</exclusions>
</dependency>
				</xmp>
				</pre>
				</code>
			</dd>
			<dt>TESTING</dt>
			<dd>Crating unit and integration tests.</dd>
			<dd>
				<code>
					<pre>
		<xmp>
<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-mock</artifactId>
	<version>2.0-rc3</version>
</dependency>

<dependency>
	<groupId>org.springframework</groupId>
	<artifactId>spring-test</artifactId>
	<version>2.5.6</version>
</dependency>

<dependency>
	<groupId>junit</groupId>
	<artifactId>junit</artifactId>
	<version>4.8.1</version>
	<scope>test</scope>
</dependency>

<dependency>
	<groupId>log4j</groupId>
	<artifactId>log4j</artifactId>
	<version>1.2.16</version>
</dependency>		
		</xmp>
		</pre>
				</code>
			</dd>

		</dl>
	</section>
</article>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>