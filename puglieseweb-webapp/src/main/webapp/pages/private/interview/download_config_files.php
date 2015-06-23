<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>
<article>
	<h2>Fedora Configuration files</h2>
	<section>
		<h3>
			Monitor setup - Dual Head monitor configuration
		</h3>

		<p>

			There are two methods to setup an Dual Head monitor:
		</p>
		<ul>
			<li>
				<p>
					dynamically by using xrandr tool.
				</p>
				In my case I need to run the commands:
<pre>
xrandr --newmode "1280x1024_74.00"  136.57  1280 1368 1504 1728  1024 1025 1028 1068  -HSync +Vsync
xrandr --addmode VGA1 1280x1024_74.00
xrandr --output VGA1 --mode 1280x1024_74.00
</pre>
				<p>Download script:</p>
				<a href="/">monitor.sh</a>
			</li>
			<li><p>
				statically by setting in xorg.conf.
			</p>

				<p>In Fedora the typical location of <strong>xorg.conf</strong> is in <strong>/etc/X11/<strong></p>
			</li>
		</ul>

		<aside>
			<b>Read more:</b>
			<ul>
				<li>
					<a href="http://intellinuxgraphics.org/dualhead.html">Dual Head</a>
				</li>
				<li>
					<a href="http://www.x.org/archive/current/doc/">X.Org Foundation - Documentation</a>
				</li>
			</ul>
		</aside>
	</section>


</article>
<?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp'; ?>