<?php 
$title = "Emanuele Pugliese's CV";
$description = "Graduate Engineer with a strong understanding of
			Object Oriented concepts as well as Design Patterns and best
			practice. My IT interests range across different technologies and
			frameworks such as Spring and ORM, GWT and Android Development,
			architectural design such as RESTful systems and Open Source
			software";
$keywords = "Emanuele Pugliese, sofware, developer, engineer, java, spring";
include '../../../includes/master-head.inc.php'; 
?>
<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="/script/appendAbbr.js"></script>

<article class="tabbed">
	<img alt="Emanuele Pugliese" src="/resources/img/profiles/emanuele01.jpg">
	<header>
		<h1>Emanuele Pugliese - Java software engineer</h1>

	</header>
	<nav>
		<ul>
			<li><a href="#tab1">Profile</a></li>
			<li><a href="#tab2">Training</a></li>
			<li><a href="#tab3">Employment</a></li>
			<li><a href="#tab4">Education</a></li>
			<li><a href="#tab5">Interests</a></li>
		</ul>
	</nav>
	<section class="tab" id="tab1">
		<h3>Profile</h3>
		<p>I am a permanent employee of IT solutions
			company FDM Group.</p>
		<p>I have an overall of two and half years' work experience working both as
			a Java/PHP developer at Motorola and as a freelance Web developer.</p>
		<p>Very committed I enjoy working as part of a team
			as well as on my initiative, I am reliable and responsible, pleased
			to listen and understand others’ point of view and help a team work
			towards a common goal.</p>
		<p>Graduate as an Electronic Engineer, I have moved into Web
			development and now I am chasing my ideal job of talented
			professional software engineer.I am a strong understanding of
			Object Oriented concepts as well as Design Patterns and best
			practice. My IT interests range across different technologies and
			frameworks such as Spring and ORM, GWT and Android Development,
			architectural design such as RESTful systems and Open Source
			software.</p>
		<p>I also have a good knowledge of networking, web sites
			accessibility, HTML 5 and cross-browser issues. Organised and a quick
			learner I am  always interested in enhancing and developing my
			knowledge.</p>
	</section>
	<section class="tab" id="tab2">
		<h3>Training</h3>
		<section>
			<hgroup>
				<h4>Java training course</h4>
				<h6>FDM Training centre (course length: 11 weeks)</h6>
			</hgroup>

			<b> Module objectives </b>
			<p>The module covered the following topics:</p>
			<ul>

				<li>Java core</li>
				<li>Design patterns and best practices</li>
				<li>Writing Web Applications with JEE: Servlet, JSP, Tomcat,
					Java Security, JDBC, Connection pool</li>
				<li>Introduction to the Spring Framework: Spring IoC, Spring
					MVC, Spring Security</li>
				<li>JUnit Testing, Mocks, Log4j, Maven.</li>
			</ul>

			<b>Project</b>
			<p>The project involved creating an on-line banking system Web
				application following the standard for enterprise project and
				applying the best practices of good object oriented design as
				defined by Robert C. Martin.</p>
			<p>Test driven development has been applied throughout the
				development phases.</p>

			<em>Three-tier architecture</em>
			<p>The project was implemented using MVC design pattern to
				clearly decouple the three architectural levels.</p>
			<p>The presentation tier was developed using: W3C accessibility
				guideline, Html 5 (and Javascript patches to solve some cross
				browser issue) and CSS1 and CSS2.</p>
			<p>The middle tier uses Servlets and JSPs.</p>
			<p>In the persistence tier the data is committed to an Oracle
				database using a JDBC connection Pool. DAO design pattern and
				generics are used in order to decouple the data source
				implementation from the business logic allowing the maximum
				flexibility of implementation.</p>

			<em>Security</em>
			<p>The application allows authorization based on two types of
				role: user roles and administrators’ roles. After navigating the
				welcome page all users are required to authenticate themselves to
				access the appropriate, protected area.</p>
			<p>Initially, a Java security form-based authentication was used
				to protect different URL patterns within the application. In a later
				version of the project, Spring security has been used in order to
				secure both methods and URL patterns.</p>
			<em>Other features</em>
			<p>The application is a simple Multi-treading application where
				multiple users can have the same account number and different
				accounts can be assigned to the same user. To avoid simultaneous
				accesses to the same DAO, the application synchronizes the service
				methods.</p>

		</section>
		<section class="tab" id="tab6">
			<hgroup>
				<h4>Software Development Methodologies training course</h4>
				<h6>FDM Training centre (course length: 1 week)</h6>
			</hgroup>

			<b>Module objectives:</b>

			<p>The module aims to introduce Software Development Topics. It
				covers the following topics:</p>
			<ul>
				<li>Traditional Development Methodologies: Waterfall, Spiral,
					Prototyping</li>
				<li>Agile Development Methodologies: Scrum, TDD, Extreme
					Programming, Pair Programming</li>
				<li>Object Oriented Concepts: Abstraction, Polymorphism,
					Encapsulation, Inheritance</li>
				<li>UML Modelling: Composition, Aggregation, Use Case,
					Sequence, State and Class Diagrams</li>
				<li>Creational, Behavioural and Structural Design Patterns</li>
				<li>Web Development: HTML, CSS, JavaScript.</li>
			</ul>
		</section>
		<section>
			<hgroup>
				<h4>Oracle training course</h4>
				<h6>FDM Training centre (course length: 2 weeks)</h6>
			</hgroup>

			<b>Module objectives</b>
			<p>The module aims to introduce Oracle. It covers the following
				topics:
			<p>
			<ul>
				<li>Introduction to environment, connection to database,
					schemas, etc.</li>
				<li>Use of Oracle SQL Plus to write scripts</li>
				<li>Tables and column data types</li>
				<li>Creating, deleting and changing tables</li>
				<li>Advanced querying of a database, such as Inner query and
					Correlated sub-queries</li>
				<li>Join types, use of grouping and ordering in a query</li>
				<li>Oracle functions</li>
				<li>Privileges, views, transactions</li>
				<li>Indexes, constraints, triggers.</li>
			</ul>
			<b>Project</b>
			<p>The project involves production of various reports for a given
				car rental scenario for a warehouse using an Oracle database
				containing data regarding its staff, clients, products and all the
				sales that have been made.</p>
			<p>The requirements of the project were set across three phases
				and covered the following:</p>
			<ul>
				<li>Table creation and constraints</li>
				<li>Implementing a bash automated system to migrate the cars
					data from the spreadsheet into two tables, Cars and Rentals</li>
				<li>Cleansing of raw data by applying constraints</li>
				<li>Normalization of some table</li>
				<li>Complex querying including the use of Oracle functions and
					correlated sub-queries</li>
				<li>Use of Update statements with nested queries.</li>
			</ul>
		</section>
		<section>
			<hgroup>
				<h4>Unix training course</h4>
				<h6>FDM Training centre (course length: 1 week)</h6>
			</hgroup>
			<b>Module objective</b>
			<p>The module aims at introducing Unix and Bash Scripting. It
				covers the following topics:</p>
			<ul>
				<li>Unix main components, file system structure</li>
				<li>Shell commands:</li>
				<li>file system command: man, ls, rm, etc.</li>
				<li>file and directory permissions</li>
				<li>the “sort”, “grep”, “find” and “sed” command and the “awk”
					utility</li>
				<li>Use of the VI editor</li>
				<li>Shell operators and commands</li>
				<li>Bash scripting, variables, arithmetic operations,
					conditions, looping and functions.</li>
			</ul>
			<b>Project</b>
			<p>The project involves creating a script that emulates an
				“Employee Appraisal System”, measuring employees against a set of
				metrics stored in a file.</p>
			<p>Requirement specification includes:</p>
			<ul>
				<li>Validating user inputs, informing the user when invalid
					data has been entered</li>
				<li>Measuring employees against a set of metrics stored in a
					configuration file, along with the maximum possible score for each.
					Data validation has been carried out to insure the value is in the
					correct range</li>
				<li>The programme allowed the user to insert, update and delete
					records</li>
				<li>Various colours and formatting styles were used to make the
					output more user-friendly.</li>
			</ul>
			<p>As well as the above points, a number of restrictions were
				added to the project specifying what could not be used in the
				scripts, these included SED, AWK and Arrays.</p>
		</section>
		<section>
			<hgroup>
				<h4>Soft Skills training course</h4>
				<h6>FDM Training centre (course length: 1 week)</h6>
			</hgroup>
			<b> Module objectives </b>
			<p>The module aims at introducing the trainee to the following
				topics:</p>
			<ul>
				<li>Technical and Business Presentations Delivery</li>
				<li>Project Methodologies (Agile, Scrum)</li>
				<li>Effective Communication and Team Work Skills.</li>
			</ul>
		</section>
		<section>
			<hgroup>
				<h4>Java tuitions</h4>
				<h6>Private tuitions (Feb 2010 – June 2010)</h6>
			</hgroup>
			<p>
				<b>Subjects</b>: UML, JUnit 4.6, Mocks, Logo4j, Design Patterns.
			<p>
			<p>
				<b>Project</b>: A website application demonstrating the use of
				Object Orientated design principles including MVP and 4 layer
				architecture. Database connectivity has been implemented using JPA.
			</p>
		</section>
	</section>
	<section class="tab" id="tab3">
		<h3>Employment</h3>
		<section>
			<hgroup>
				<h4>Java Consultant</h4>
				<h6>June 2011 – present: FDM Group, London</h6>
			</hgroup>
			<ul>
				<li>Java, Spring, Oracle and Sql trainings</li>
				<li>HTML, CSS, Web accessibility.</li>
			</ul>
		</section>

		<section>
			<hgroup>
				<h4>Web developer</h4>
				<h6>May 2009 – Jun 2009: Eynsford college Ltd, London</h6>
			</hgroup>
			<ul>
				<li>Translating client requirements into technical
					specification</li>
				<li>Web pages development using Joomla CMS</li>
				<li>XHTML 1.0 transitional markup and CSS style sheets have
					been used.</li>
			</ul>
		</section>

		<section>
			<hgroup>
				<h4>Administrator and IT Maintenance</h4>
				<h6>Feb 2009: MG Eco Engineering Ltd, Italy</h6>
			</hgroup>
			<ul>
				<li>Configured networks in order to control and monitor remote
					electronic heating devices</li>
				<li>Updated the documentation of the existing web application.
				</li>
			</ul>
		</section>

		<section>
			<hgroup>
				<h4>Web e-commerce developer</h4>
				<h6>Jun 2008 – Sep 2008: MG Eco Engineering Ltd, Italy</h6>
			</hgroup>
			<ul>
				<li>Developed web pages for an e-commerce ASP.NET application.
					We used C#, XHTML markup, CSS style sheets and a SQL Server DBMS</li>
				<li>DHTML main menu has been developed by using CSS and
					JavaScript.</li>
			</ul>
		</section>

		<section>
			<hgroup>
				<h4>PHP and JAVA Developer</h4>
				<h6>Apr 2007 – Sep 2007: Motorola Company, Italy</h6>
			</hgroup>
			<p>Worked as part of the ITIS team responsible for the monitoring
				and dimensioning of the network resources of the company.</p>
			<ul>
				<li>Implemented a system monitor prototype multi-threaded
					engine which pings the monitored systems at regular time intervals
					via socket connections. Monitored systems are registered in an XML
					configuration file and they include legacy and newly developed
					systems. The result of each cycle is stored in text file.</li>
				<li>Implemented a PHP web solution using XHTML 1.0 stick, CSS,
					PHP</li>
				<li>Regular expressions have been used to parse data</li>
				<li>Bash scripts have been used in order to work on both
					platforms of UNIX and SOLARIS</li>
				<li>Implemented ClearCase tools aimed at checking for incorrect
					users’ views and sending automatic alert emails, checking space
					usage of users’ home quotes and views</li>
				<li>Implemented monitoring tools aimed at monitoring
					temperature, CPU, memory usage, processes running on different
					servers and available software licenses, as well as tools aimed at
					starting up PCs in specific locations</li>
				<li>Configured a MySQL server tasked with holding analysis data
					manipulated via MRTG</li>
				<li>Configured UNIX AND SOLARIS server in order to communicate
					with the web server</li>
				<li>Configured Apache web server</li>
				<li>Modified and maintained Perl code developed by 3rd parties.
				</li>
			</ul>
		</section>
	</section>
	<section class="tab" id="tab4">
		<h3>Education</h3>
		<section>
			<hgroup>
				<h4>Polytechnic of Turin (Italy) - B.Sc. (1st Class) in
					Electronic Engineering and Computer Science</h4>
				<h6>Sep 2001 – July 2005</h6>
				<h6>Jan 2008 – Mar 2008</h6>
			</hgroup>

			<b>Subjects includes:</b>
			<p>C programming, Computer Networks and Communications,
				Navigation Satellite systems, Legislation and security of networks.
			</p>
		</section>


		<section>
			<hgroup>
				<h4>Vocational Qualification (Mark 44/50) in Web Developing and
					Internet Website Administrating</h4>
				<h6>Sep 2006 – Apr 2007</h6>
			</hgroup>

			<b>Subjects includes:</b>
			<ul>
				<li>Operating systems, local networks and the internet, Object
					Oriented Programming</li>
				<li>ASP.NET 2.0, PHP, DBMS Access and MySQL, stored procedures,
					XHTML, XML, JavaScript</li>
				<li>DHTML, CSS, graphics and animation.</li>
			</ul>
		</section>

		<section>
			<hgroup>
				<h4>GCSE</h4>
				<h6>Sep 2010 – Jun 2011 City Lit, London</h6>
			</hgroup>
			<p>
				<b>Subject</b>: English Literature.
			</p>
		</section>
	</section>


	<section class="tab" id="tab5">
		<h3>Interests and activities</h3>
		<p>I like dancing and keeping fit. I am passionate about my
			career. I read Open Source journals and am involved in Java Meetup
			Groups. I also repair mobiles and PCs as part of my spare time.</p>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>