<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<div id="content">


<h1>Cron </h1>
<p class="resources">References:<a
 href="http://www.cyberciti.biz/faq/how-do-i-add-jobs-to-cron-under-linux-or-unix-oses/">http://www.cyberciti.biz/faq/how-do-i-add-jobs-to-cron-under-linux-or-unix-oses/</a>
<br>
</p>
<p class="references">Cron is one of the most useful tool in Linux or
UNIX like operating systems. The cron service (daemon) runs in the
background and constantly checks:</p>
<ul class="code">
  <li>/etc/crontab (file)</li>
  <li>/etc/cron.*/ (directories)</li>
  <li>/var/spool/cron/ (directory)</li>
</ul>
There are two different types of configuration files:<br>
<ol>
  <li>Linux system crontab</li>
  <li>The user crontabs</li>
</ol>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>