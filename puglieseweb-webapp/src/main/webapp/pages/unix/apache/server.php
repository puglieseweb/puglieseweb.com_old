<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><article>
	<header>
		<h2>Change DocumentRoot Apache</h2>
	</header>
	<section>
		<b> action: </b>
		<pre>
# DocumentRoot: The directory out of which you will serve your
# documents. By default, all requests are taken from this directory, but
# symbolic links and aliases may be used to point to other locations.
#
DocumentRoot "/var/www/html"
# This should be changed to whatever you set DocumentRoot to.
<xmp>
<Directory"/var/www/html">
</xmp>
</pre>
		<b> problem: </b>
		<pre>
<command label="service">service httpd start</command>
Starting httpd (via systemctl):  Job failed. See system logs and 'systemctl status' for details.
                                                           [FAILED]

</pre>
		<b> step: </b>
		<pre>
su
systemctl enable httpd.service
systemctl restart httpd.service
</pre>
		<b> result: </b>
		<pre>
  [root@localhost www]# systemctl enable httpd.service
httpd.service is not a native service, redirecting to /sbin/chkconfig.
Executing /sbin/chkconfig httpd on
[root@localhost www]# systemctl restart httpd.service
Job failed. See system logs and 'systemctl status' for details.
</pre>



		<b> step: </b>
		<pre>
  cat /var/log/messages | grep httpd
</pre>
		<b> resoult: </b>
		<pre>
  SELinux is preventing /usr/sbin/httpd from getattr access on the directory /var/www/html. For complete SELinux messages. run sealert -l 14582266-6a67-49f5-96a7-790b495c2cd6
</pre>

		<b> step: </b>
		<h3>Q: How do I enable/disable SELinux protection on specific
			daemons under the targeted policy?</h3>
		<p>A: Use system-config-selinux, also known as the SELinux</p>
		<p>Administration graphical tool, to control the Boolean values of
			specific daemons. For example, if you need to disable SELinux for
			Apache to run correctly in your environment, you can disable the
			value in system-config-selinux. This change disables the transition
			to the policy defined in apache.te, allowing httpd to remain under
			regular Linux DAC security.</p>
		<p>
			The
			<command label="getsebool">getsebool</command>
			and
			<command label="setsebool">setsebool</command>
			commands can also be used, including on systems that do not have the
			system-config-selinux tool.
		</p>

		<pre>
  # setsebool -P httpd_read_user_content 1
</pre>
		<b> result [Solved]: </b>
		<pre>
service httpd start
Starting httpd (via systemctl):                            [  OK  ]
</pre>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>