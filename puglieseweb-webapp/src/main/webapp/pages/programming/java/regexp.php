<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<article>
	<aside>
		<b>Resources:</b>
		<ul>
			<li><a
				href="http://stackoverflow.com/questions/4476637/remove-class-id-attributes-of-all-tags-in-given-html-posted">Remove
					class and id attributes from HTML tags</a>
		</ul>
	</aside>
	<header>
		<h2>Regular Expressions</h2>
	</header>
	<section>
		<h3>Remove class and id attributes from HTML tags</h3>
		<pre>
		
<code>class=[',\"]([\w- ])*[',\"]</code>
<code>id=[',\"]([\w- ])*[',\"]</code>
		</pre>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>