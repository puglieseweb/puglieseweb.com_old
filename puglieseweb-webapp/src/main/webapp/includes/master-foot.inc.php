




<!-- **************************    FOOTER     **************************** -->


<?php
/*
*	How to use: this file should be included after the webpage content as the last
*	element of the page.
*
* 	To be used in combination with the "master-head.inc.php" file.
*
*  	Author: Emanuele Pugliese
*/
?>

<?php
/* Insert here new links to be displayed on the footer of the website */
/* The format is: array("url", "link name", "link description") */
$general_links = array(
	array("http://stackoverflow.com/", "Stackoverflow", ""),
	array("https://github.com/", "GitHub", ""),
	array("http://grooveshark.com/", "Listen music for free",""),
	array("http://www.192.com/", "Search for People, Businesses & Places in the UK","")
);
$java_links = array(
	array("http://www.vaannila.com/", "VaanNila", ""),
	array("http://download.oracle.com/javase/", "Java 7", ""),
	array("http://download.oracle.com/javaee/", "Javaee", ""),
	array("http://www.theserverside.com/", "TheServerSide")
);
$webdev_links = array(
	array("http://www.w3schools.com/html5/html5_reference.asp", "HTML5 Tag Reference", ""),
	array("http://accessibility.psu.edu/accessibility/checklist", "Accessibility", ""),
	array("http://php.net/manual/en/", "PHP reference")
);
?>


</section>
</div>
<!-- end "main" -->
</div>
<!-- end "column-2" -->
</div>
<!-- end "corpo" -->

<div id=clear-both></div>

<!-- ************    FOOTER    ************ -->
<footer id="pie-di-pagina">

	<!-- ================    LINKS SECTION   ================ -->

	<ul class="navigazione">
		<li>General:</li>
		<?php
foreach ($general_links as $row){
	echo "<li><a class=\"rodape\" href=\"$row[0]\">$row[1]</a></li>\n";
}
?>
	</ul>



	<!-- ================    LINKS SECTION   ================ -->

	<ul class="navigazione">
		<li>Java:</li>
		<?php
foreach ($java_links as $row){
	echo "<li><a class=\"rodape\" href=\"$row[0]\">$row[1]</a></li>\n";
}
?>
	</ul>



	<!-- ================    LINKS SECTION   ================ -->

	<ul class="navigazione">
		<li>Web dev:</li>
		<?php
foreach ($webdev_links as $row){
	echo "<li><a class=\"rodape\" href=\"$row[0]\">$row[1]</a></li>\n";
}
?>
	</ul>
	<p>&copy; Copyright 2011 Puglieseweb.com. All Rights reserved.</p>
</footer>
<!-- end footer-->
</div>
<!-- end "content-page"-->
</div>
<!-- end helper -->

<!-- GRAPHICS -->
<div id="angolo1"></div>
<!-- GRAFICA -->
<div id="angolo2"></div>
</div>
<!-- end page -->

<div id="footinfo">

	<!-- GRAPHICS -->
	<div id="angolo3"></div>
	<div id="angolo4"></div>

</div>
<!-- end footinfo -->
</div>
<!--! end of #container -->
<!-- end content -->



<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->

<script>
	var _gaq = [ [ '_setAccount', 'UA-XXXXX-X' ], [ '_trackPageview' ] ]; // Change UA-XXXXX-X to be your site's ID
	(function(d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.async = 1;
		g.src = ('https:' == location.protocol ? '//ssl' : '//www')
				+ '.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s)
	}(document, 'script'));
</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>