<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<article>
	<header>
		<h2>
			Unix maintenance<br>
		</h2>
	</header>

	<section>
		<h3>process</h3>
		<dl>
			<dt>ps -ef | grep javav</dt>
			<dd>
				<dl>
					<dt>-e (BSD-style: A)</dt>
					<dd>Select all processes</dd>
					<dt>-f</dt>
					<dd>Do full-format listing. To add additional columns.</dd>
				</dl>
			</dd>
		</dl>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>