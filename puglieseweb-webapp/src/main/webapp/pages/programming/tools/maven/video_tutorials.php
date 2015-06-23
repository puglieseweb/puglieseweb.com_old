<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<div id="content">
<p>Source:</p>
<a href="http://javabrains.koushik.org/">Java brains</a>
<h1>Maven video tutorials</h1>
<?php
$t2 = "\t\t";
$t3 = "\t\t\t";
$t4 = "\t\t\t\t";


$videos = array(
array("01 Part 1", "Introduction and Setting up
In this tutorial, we'll download and install Maven in our development environment.
"),

array("01 Part 2", "Introduction and Setting up
In this tutorial, we'll have our first look at pom.xml and we'll compile our project.
"),
array("02", "Understanding Archetypes and pom.xml
We'll now understand what happens when we run the archetype:generate command and how that affects the pom.xml.
"),
array("03 ", "Maven Build Phases
We'll now learn what the build process in Maven consists of, the build phases and we'll run commands to execute some phases.
"),
array("04", "Adding a Dependency
In this tutorial we'll learn about dependencies by adding one. We'll write code to use the slf4j logging framework, and we'll modify our pom.xml to specify the dependency to Maven.
"),
array("05", "A Web Application Using Maven
We'll use the web application archetype to create a barebones web application. We'll then package, deploy in Tomcat and access this application.
"),
array("06", "Introduction to Plugins with the Maven Compiler Plugin
In this tutorial, we'll add the Maven compiler plugin configuration to the pom.xml.
"),
array("07", "Using the Jetty Plugin
There are some Maven plugins that are full Servlet containers. We'll look at an example: the Jetty plugin, and we'll see how it makes developing web applications easier.
"),
array("08", "Eclipse Plugin for Maven and Maven Plugin for Eclipse
More plugins! We'll use the Maven's Eclipse plugin to get our Maven project into the Eclipse IDE. We'll also download and install the m2eclipse plugin of Eclipse to bring Maven functionality into the Eclipse GUI.
"),
);

$i=1;
foreach ( $videos as $video){
echo	"$t2<br /><br />";
echo	"$t2<h3>Tutorial n. $i</h3>";
echo	"$t2<p>$video[1]</p>";
echo 	"$t2<video controls webkitEnterFullscreen widthd=\"360\" height=\"240\">\n";
echo		"$t3<source src=\"video/maven$i.flv\" type=\"video/flv\" />\n";
echo 		"$t3<source src=\"video/maven$i.ogv\" type=\"video/ogg\" />\n";
echo 		"$t3<object type=\"application/x-shockwave-flash widthd=\"360\" height=\"240\" data=\"player.swf?file=video/maven$i.flv\">\n";
echo			"$t4<param name=\"movie\" value=\"player.swf?file=video/maven$i.flv\" />\n";
echo			"$t4<a href=\"video/maven$i.flv\">Download the movie</a>\n";
echo		"$t3</object>\n";
echo	"$t2</video>\n";
$i++;
}
?>





<?php

?>








</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>