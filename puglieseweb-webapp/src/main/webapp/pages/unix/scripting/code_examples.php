<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>

	<section>

		<h2>My scripts</h2>
		<ul>
			<li><a
				href="https://github.com/puglieseweb/bash_scripting/blob/master/website_index_generator/generateHtmlIndex.sh">Html
					Index generator<br>
			</a></li>
		</ul>

		<section>
			<h3>Passing parameers to a funciotn:</h3>
			<ul>
				<li><code>findHtmls $root\/$node </code></li>
				<li><code>findHtmls "$root/$node"</code></li>
			</ul>
		</section>

		<section>
			<h3>yes/no</h3>
			<code class="code">
				for node in `ls -1 $root`; do if [ -d $node ]; then <br>
				&nbsp;&nbsp;&nbsp; findHtmls "$root/$node" for iFile in `ls -1` do <br>
				&nbsp;&nbsp;&nbsp; echo "File = $iFile. Delete (y/n)?" <br>
				&nbsp;&nbsp;&nbsp; read ANSWER echo "Answer is $ANSWER" <br>
				done<br> <br>
			</code>
		</section>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>