<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>
	<header>
		<time class="updated" datetime="2011-11-02 11:11:03-0400" pubdate>02-11-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<hgroup>
			<h2>Reading large data</h2>
		</hgroup>
	</header>
	<aside>
		<section>
			<h3>What a WAR?</h3>
			<a href="http://java.sun.com/j2ee/tutorial/1_3-fcs/doc/WCC3.html">Web
				Application Archives (WAR)</a>
			<p>
				<strong>Document Root</strong> contains:
			</p>
			<ul>
				<li>JSP pages</li>
				<li>client-side classes</li>
				<li>archives</li>
				<li>static Web resources</li>
			</ul>

			<p>The file structure of a WAR archive is:</p>
			<ul>
				<li>Document Root
					<ul>
						<li>

							<p>WEB-INF</p>
							<dl>

								<dt>web.xml</dt>
								<dd>The Web application deployment descriptor</dd>
								<dt>Tag library descriptor files (see Tag Library
									Descriptors)</dt>
								<dt>classes</dt>
								<dd>A directory that contains server-side classes:
									servlets, utility classes, and JavaBeans components</dd>
								<dt>lib</dt>
								<dd>A directory that contains JAR archives of libraries
									(tag libraries and any utility libraries called by server-side
									classes).</dd>
							</dl>
						</li>
						<li>You can also create application-specific subdirectories
							(that is, package directories) in either the document root or the
							WEB-INF/classes directory.</li>
					</ul>
			</ul>
		</section>
	</aside>
	<section>
		<h3>App Engine</h3>
		<ul>
			<li>use the Java Servlet standard</li>
			<li>the application's files structure follows the WAR standard
				layout</li>
		</ul>


	</section>
</article>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>