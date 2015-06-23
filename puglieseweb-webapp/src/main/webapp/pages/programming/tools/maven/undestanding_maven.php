<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<article>

	<aside>
		<p>Resources :</p>
		<ul>
			<li><a
				href="http://maven.apache.org/plugins/maven-install-plugin/">maven
					install plugin</a></li>
			<li><a
				href="http://maven.apache.org/plugins/maven-deploy-plugin/">maven
					deploy plugin</a></li>
			<li><a
				href="http://maven.apache.org/guides/introduction/introduction-to-the-lifecycle.html">introduction
					to the build lifecycle</a></li>
			<li><a
				href="http://maven.apache.org/plugins/maven-release-plugin/">the
					maven release plugin</a></li>
		</ul>
	</aside>
	<header>
		<h1>Understanding Maven</h1>
	</header>
	<section>

		<h3>What is Maven?</h3>
		<p>Maiven is a:</p>
		<ul>
			<li>build tool</li>
			<li>project management tool</li>
		</ul>
		<p>
			Maven was started as a way to simplify the build process in the
			jakarta turbine project and has evolved to be a <strong>software
				project management tool</strong> which is based on a <strong>project
				object model</strong> (<acronym title="Project Object Model">pom</acronym>).





		
		<p>
		<ul>
			<li>build</li>
			<li>test</li>
			<li>deploy</li>
		</ul>
		<p>
			The <strong>pom document</strong> (xml file) describes all
		</p>
		<ul>
			<li>dependencies <pre>
				<xmp>
				<dependencies></xmp> </pre></li>
			<li>plug-ins <pre>
	<xmp>
<build>
	<plugins>
		...
	</xmp>
	</pre></li>
			<li>svn</li>
			<li>repositories</li>

			<li>properties <pre>
	<xmp>
<properties>
	<spring.version>3.0.5.RELEASE</spring.version>
	<spring-security.version>3.0.2.RELEASE</spring-security.version>
	...
</properties>
    </xmp>
	</pre></li>
		</ul>
		<p>of the project.</p>

		<section>
			</pre>
			<p>Common Activities:</p>
			<ul>
				<li>
					<p>
						creating the project structure (<span style="font-weight: bold;"
							class="command">mvn archetype:generate</span>)<br>
					</p>
				</li>
				<li>
					<p>building, publishing and deploying</p>
				</li>
				<li>
					<p>multiple jars&nbsp;</p>
				</li>
				<li>
					<p>dependencies and versions</p>
				</li>
			</ul>
		</section>
		<section>
			<h2>Plug-ins execution framework</h2>
			<p>Maven can also be thought of as a plug-in execution framework
				that coordinates the execution of plug-ins in a well-defined way.</p>
			<p>Basically everything accomplished in maven is the result of a
				plug-in executing. For example using the tomcat application
				container to test a web application maven provides a plug-in for
				this container, so we don't have to bother to install it.</p>
			<p>To ran the tomcat plug-in:</p>
			<p class="command">mvn tomcat:run</p>
			<p>
				(stopped by <span style="font-weight: bold;" class="command">&lt;ctrl-c&gt;</span>
				or <span style="font-weight: bold;" class="command">mvn
					tomcat:stop</span>)
			</p>
			<p>
				There are <em>plug-in</em> for:
			</p>
			<ul>
				<li>
					<p style="margin-bottom: 0in;">compiling the source code,</p>
				</li>
				<li>
					<p style="margin-bottom: 0in;">for running tests,</p>
				</li>
				<li>
					<p style="margin-bottom: 0in;">for creating jars,</p>
				</li>
				<li>
					<p style="margin-bottom: 0in;">for creating javadocs,</p>
				</li>
				<li>
					<p style="margin-bottom: 0in;">for running an application
						container</p>
				</li>
				<li>
					<p>etc.</p>
				</li>
			</ul>
		</section>
	</section>
	<section>
		<h2>Dependencies management system</h2>
		<p>
			It allows us to include all of our libraries automatically in our
			project, without having to manage them. to import dependencies we
			need to add xml tags to our <abbr title="Project Object Model">
				pom</abbr> xml file, specifying the groupid, artifactid, and the version of
			the dependency itself.
		</p>
		<h2 class="western">Nomenclature</h2>

		<ul>
			<li>
				<p style="margin-bottom: 0in;">
					<span style="font-weight: bold;" class="gergon">artifactid</span>
					==&gt; the name of the project (e.g. myproject_app)
				</p>
			</li>
			<li>
				<p>
					<span style="font-weight: bold;" class="gernon">groupid</span>
					==&gt; the path were the project (e.g jar or war files) will be
					saved once deployed or installed locally, which follows the package
					name structure (e.g. com.puglieseweb.myproject)
				</p>
			</li>
			<li>
				<p>
					<span style="font-weight: bold;" class="gergon">(artifact)
						repositories </span>==&gt; maven tries to promote the notion of a <span
						style="font-weight: bold;" class="underline">user local
						repository</span> where <span style="font-weight: bold;"
						class="underline">jars, or any project artifacts, can be
						stored and used for any number of builds. </span>
				</p>
			</li>
		</ul>
		<p>if we don&acirc;&#8364;&#8482;t configure any repository into
			our pom file, maven will use the default repositories set in the
			{maven home}/setting.xml file.</p>
		<p>maven repositories:</p>
		<ul>
			<li>
				<p>hold build artifacts and dependencies of varying types.</p>
			</li>
		</ul>
		<ul>
			<li>
				<p>there are only two types of repositories: local and remote.</p>
			</li>
			<li>
				<p>the local repository: refers to a copy on your own
					installation that is a cache of the remote downloads, and also
					contains the temporary build artifacts that you have not yet
					released.</p>
			</li>
			<li>
				<p>remote repositories refer to any other type of repository,
					accessed by a variety of protocols such as file:// and http://.</p>
			</li>
		</ul>
		<p>maven first looks for the dependencies in a local repository,
			then in remote repositories. otherwise we have either to find the
			right repository or install it manually.</p>
		<p>we can always download the dependency/library and install it
			locally on our machine.</p>
		<ol>
			<ol>
				<ol>
					<li>
						<h3 class="western">maven archetype</h3>
					</li>
				</ol>
			</ol>
		</ol>
		<ul>
			<li>
				<p>archetype ==&gt; a template for our project that is reusable
					for similar projects. they are downloaded and installed local
					repository. for example there are archetypes to create java
					spring-hibernate, velocity, gwt projects and more.</p>
			</li>
		</ul>
		<p>you can either create an archetype based on an exisistin
			project,:</p>
		<p>mvn archetype:create-from-project</p>
		<p>or manually create an archetype from scratch.</p>
		<ol>
			<li>
				<p>the archetype descriptor (in meta-inf/maven/archetype.xml):
					decribe how to construct a new project form the archetype-resources
					provided.</p>
			</li>
			<li>
				<p>the template project in archetype-resources: the jar that is
					built is composed only of resources, so everything else is
					contained under src/main/resources</p>
			</li>
		</ol>
		<h3 class="western">deployment</h3>
		<p>
			the&nbsp;clean,&nbsp;install&nbsp;and&nbsp;deploy&nbsp;phases&nbsp;are
			valid&nbsp;<a
				href="http://maven.apache.org/guides/introduction/introduction-to-the-lifecycle.html">lifecycle</a><a
				href="http://maven.apache.org/guides/introduction/introduction-to-the-lifecycle.html">phases</a>&nbsp;and
			invoking them will trigger all the phases preceding them, and the
			goals bound to these phases.
		</p>
		<p>mvn clean install</p>
		<p>this command invokes the&nbsp;clean&nbsp;phase and then
			the&nbsp;install&nbsp;phase sequentially:</p>
		<ol>

			<li>
				<h4 class="western">mvn clean install</h4>
			</li>
		</ol>

		<p>tells maven to build all the modules and to install them into
			the local repository.</p>
		<ol start="2">

			<li>
				<h4 class="western">mvn clean</h4>
			</li>

		</ol>
		<p>removes files generated at build-time in a project's
			directory&nbsp;(target&nbsp;by default)</p>
		<p>
			<br> <br>
		</p>
		<h4 class="western">mvn install</h4>
		<p>put our packaged maven project into a local repository, for
			local application using this project as a dependency.</p>
		<h4 class="western">mvn release</h4>
		<p>basically put the current code in a tag on our scm (source
			control management system), change the version in your projects.</p>
		<ol start="5">

			<li>
				<h4 class="western">mvn deploy</h4>
			</li>
		</ol>

		<p>put your packaged maven project into a remote repository for
			sharing with other developers.</p>
		<ol start="8">

			<li>
				<h3 class="western">deployment (release plug-in)</h3>
			</li>
		</ol>

		<p>relasing software is often a difficult and tedious exercise
			(you have to include dependencies, database, view, ans so forth)</p>
		<p>maven provide a release plug-in that provides the basic
			functions of a standard release process.</p>
		<ol>

			<li>
				<h4 class="western">mvn prepare &amp; mvn perform (maven
					release plug-in)</h4>
			</li>
		</ol>

		<p>
			this command are not a valid phase of maven. but if refers to the <a
				href="http://maven.apache.org/plugins/maven-release-plugin/">maven</a><a
				href="http://maven.apache.org/plugins/maven-release-plugin/">release</a><a
				href="http://maven.apache.org/plugins/maven-release-plugin/">plugin</a>
			that is used to automate and simplify release management.
		</p>
		<p>releasing a project is done in two steps: prepare and perform.</p>
		<p>preparing a release goes through the following release phases:</p>
		<ul>
			<li>
				<p>check that there are no uncommitted changes in the sources</p>
			</li>
			<li>
				<p>check that there are no snapshot dependencies</p>
			</li>
			<li>
				<p>change the version in the poms from x-snapshot to a new
					version (you will be prompted for the versions to use)</p>
			</li>
			<li>
				<p>transform the scm information in the pom to include the final
					destination of the tag</p>
			</li>
			<li>
				<p>run the project tests against the modified poms to confirm
					everything is in working order</p>
			</li>
			<li>
				<p>commit the modified poms</p>
			</li>
			<li>
				<p>tag the code in the scm with a version name (this will be
					prompted for)</p>
			</li>
			<li>
				<p>bump the version in the poms to a new value y-snapshot (these
					values will also be prompted for)</p>
			</li>
			<li>
				<p>commit the modified poms</p>
			</li>
		</ul>
		<p>and then: mvn perform</p>
		<p>performing a release runs the following release phases:</p>
		<ul>
			<li>
				<p>checkout from an scm url with optional tag</p>
			</li>
			<li>
				<p>run the predefined maven goals to release the project (by
					default, deploy site-deploy</p>
			</li>
		</ul>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
