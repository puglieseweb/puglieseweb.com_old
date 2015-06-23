<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">


<h1>SELinux</h1>
<a href="http://www.revsys.com/writings/quicktips/turn-off-selinux.html">turning off selinux</a>
<p>To turn it off, you will need to become the root users on your system and execute the following command:

echo 0 > /selinux/enforce
This temporarily turns off SELinux until it is either re-enabled or the system is rebooted. To turn it back on you simply execute this command:

echo 1 > /selinux/enforce
As you can see from these commands what you are doing is setting the file /selinux/enforce to either '1' or '0' to denote 'true' and 'false'.</p>

---------------
SELinux is preventing /usr/sbin/httpd from write access on the directory logs.

Plugin: catchall_boolean
you want to allow httpd to have write access on the logs directoryIf you want to unify HTTPD handling of all content files.
You must tell SELinux about this by enabling the 'httpd_unified' boolean.
setsebool -P httpd_unified 1
---------------
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>