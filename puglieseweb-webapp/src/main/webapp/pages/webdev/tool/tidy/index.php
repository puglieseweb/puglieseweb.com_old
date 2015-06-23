<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<h1>Tidy</h1>
<p>this program is used to clean up and validate html pages</p>

<h2>Useful commands</h2>
<p class="command">tidy -f errr.txt -lmu junit.html</p>
<p class="command">tidy -f errr.txt junit.html</p>
<p class="command">tidy -config ~/development/tools/web/tidy.conf -m *.html</p>
<p class="command">vi ~/development/tools/web/tidy.conf</p>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>