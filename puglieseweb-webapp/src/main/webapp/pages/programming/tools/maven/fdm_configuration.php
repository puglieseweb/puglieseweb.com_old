<?php include '../../../../includes/master-head.inc.php'; ?>
<div id="content">
<h1>Maven FDM configurations<br>
</h1>
<p class="resources">Resources:<br>
<a href="http://java.fdmgroup.com:8080/archiva/repository/internal/">FDM
Repository</a>
</p>
<h2>Configure maven installation with the <a
 href="http://java.fdmgroup.com:8080/archiva/repository/internal/">FDM
Repository</a></h2>
<p class="command">C:\apache-maven-2.2.1\conf\settings.xml</p>
<pre class="code">&nbsp;  <br>  &lt;mirrors&gt;<br>    ...<br>    &lt;mirror&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;id&gt;mirrorId&lt;/id&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;mirrorOf&gt;*&lt;/mirrorOf&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	&lt;name&gt;Human Readable Name for this Mirror.&lt;/name&gt;<br>	&lt;url&gt;http://java.fdmgroup.com:8080/archiva/repository/internal&lt;/url&gt;<br>&nbsp;&nbsp;&nbsp; &lt;/mirror&gt;<br>&nbsp; &lt;/mirrors&gt;<br><br></pre>
<h2>Junit pon.xml [ok]<br>
</h2>
<pre class="code">		&lt;dependency&gt;<br>			&lt;groupId&gt;junit&lt;/groupId&gt;<br>			&lt;artifactId&gt;junit&lt;/artifactId&gt;<br>			&lt;version&gt;4.8.2&lt;/version&gt;<br>		&lt;/dependency&gt;<br><br></pre>
<h2>Log4j pon.xml [ok]<br>
</h2>
<pre class="code">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;dependency&gt;<br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;groupId&gt;org.slf4j&lt;/groupId&gt;<br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;artifactId&gt;slf4j-api&lt;/artifactId&gt;<br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;version&gt;1.6.1&lt;/version&gt;<br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;/dependency&gt;<br><br></pre>
<h3>Troubleshot [not solved]<br>
</h3>
For some reason the Maven compiler plug-in defaults to Java 1.3. When
compiling Java code with annotations, you get the following error: <br>
<pre>annotations are not supported in -source 1.3<br>(use -source 5 or higher to enable annotations)<br><br></pre>
<h4>step1 <br>
</h4>
&nbsp;I tried to add the following section to the <code>pom.xml</code>
fixes the problem, but the plugin is not available in the <a
 href="http://java.fdmgroup.com:8080/archiva/repository/internal/">Fdm
repository</a>: <br>
<div class="syntax">
<pre>&lt;build&gt;  <br>    &lt;plugins&gt;  <br>      &lt;plugin&gt;  <br>        &lt;artifactId&gt;maven-compiler-plugin&lt;/artifactId&gt;  <br>        &lt;configuration&gt;  <br>          &lt;source&gt;1.6&lt;/source&gt;  <br>          &lt;target&gt;1.6&lt;/target&gt;  <br>        &lt;/configuration&gt;  <br>      &lt;/plugin&gt;  <br>    &lt;/plugins&gt;  <br>&lt;/build&gt;<br><span
 style="font-weight: bold;"><br></span></pre>
</div>
<h3>pom.xml [<a href="pom.xml">Download file</a>]</h3>
<xmp class="code">
<project xmlns="http://maven.apache.org/POM/4.0.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd">
	<modelVersion>4.0.0</modelVersion>

	<groupId>com.puglieseweb</groupId>
	<artifactId>Project Name</artifactId>
	<version>0.0.1-SNAPSHOT</version>
	<packaging>jar</packaging>

	<name>ProjectName</name>
	<url>http://maven.apache.org</url>

	<properties>
		<project.build.sourceEncoding>UTF-8</project.build.sourceEncoding>
	</properties>

	<build>

		<finalName>ProjectName</finalName>

		<plugins>
			<!-- Why this plugin:  http://maven.apache.org/plugins/maven-compiler-plugin/ -->
			<plugin>
				<groupId>org.apache.maven.plugins</groupId>
				<artifactId>maven-compiler-plugin</artifactId>
				<configuration>
					<source>1.6</source>
					<target>1.6</target>
				</configuration>
			</plugin>
		</plugins>
	</build>

	<dependencies>
		<dependency>
			<groupId>junit</groupId>
			<artifactId>junit</artifactId>
			<version>4.8.2</version>
		</dependency>

		<dependency>
			<groupId>log4j</groupId>
			<artifactId>log4j</artifactId>
			<version>1.2.16</version>
		</dependency>

		<dependency>
			<groupId>javax.servlet</groupId>
			<artifactId>servlet-api</artifactId>
			<version>2.4</version>
			<scope>provided</scope>
			<!-- To add the javadoc:  http://stackoverflow.com/questions/4379375/how-to-get-eclipsemaven-to-find-and-use-servlet-api-source-code-or-javadoc -->
			<classifier>sources</classifier>
		</dependency>
	</dependencies>
</project>
</xmp>

<h3>Change context root in a web app using eclipse</h3>
<a href="http://puretech.paawak.com/2010/08/28/how-to-convert-a-maven-project-to-eclipse-web-project/">Convert a Maven Project to Eclipse Web Project</a>
<a href="http://stackoverflow.com/questions/2437465/java-how-to-change-context-root-of-a-dynamic-web-project-in-eclipse">How to change context root of a dynamic web project in eclipse</a>
</div>
<?php include '../../../../includes/master-foot.inc.php'; ?>
