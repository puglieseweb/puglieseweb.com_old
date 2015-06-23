
<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">


<a id="Bugzilla" href="https://bugzilla.redhat.coc">Bugzilla</a>
<h1>Troubleshoots</h1>
<h2>How to do troubleshooting</h2>
<ul>
  <li> check the log error in /var/log/[directory_program] </li>
  <li> add/remove SELinux rules </li>
  <li> check configuration files in /etc/[directory_program] </li>
</ul>
<!-- ------------------------------------------------------ -->
  <h2>SELinux - Change DocumentRoot Apache</h2>
  action:


  problem:
  # service httpd start
Starting httpd (via systemctl):  Job failed. See system logs and 'systemctl status' for details.
                                                           [FAILED]


  step:
  cat /var/log/messages | grep httpd
  resoult:
  SELinux is preventing /usr/sbin/httpd from getattr access on the directory /var/www/html. For complete SELinux messages. run sealert -l 14582266-6a67-49f5-96a7-790b495c2cd6

  step:
 Q:
        How do I enable/disable SELinux protection on specific daemons
under the targeted policy?
       A:
           Use system-config-selinux, also known as the SELinux
Administration graphical tool, to control the Boolean values of
specific daemons. For example, if you need to disable SELinux for
Apache to run correctly in your environment, you can disable the value
in system-config-selinux. This change disables the transition to the
policy defined in apache.te, allowing httpd to remain under regular
Linux DAC security.
The getsebool and setsebool commands can also be used, including on
systems that do not have the system-config-selinux tool. Please refer
to the manual pages for these commands: getsebool(8) and setsebool(8)
for further details on their operation.

  # setsebool -P httpd_read_user_content 1
  result:
  service httpd start
Starting httpd (via systemctl):                            [  OK  ]

  <!-- ------------------------------------------------------ -->
<h2>SELinux - Chrome do not start</h2>
<h3> problem</h3>
SELinux is preventing /opt/google/chrome/chrome from 'execmod' accesses
on the
file /opt/google/chrome/chrome.
<br>
***** Plugin allow_execmod (91.4 confidence) suggests
**********************
<br>
If you want to allow chrome to have execmod access on the chrome file
Then you need to change the label on '/opt/google/chrome/chrome'
Do
<br>
# semanage fcontext -a -t textrel_shlib_t '/opt/google/chrome/chrome'
<br>
# restorecon -v '/opt/google/chrome/chrome'
<br>
***** Plugin catchall (9.59 confidence) suggests
***************************
<br>
If you believe that chrome should be allowed execmod access on the
chrome file
by default.
Then you should report this as a bug.
You can generate a<span style="font-weight: bold;" class="gergon">
local policy module</span> to allow this access.
Do
allow this access for now by executing:
<br>
# grep chrome /var/log/audit/audit.log | audit2allow -M mypol
# semodule -i mypol.pp <br>
<h3>action </h3>
# grep chrome /var/log/audit/audit.log | audit2allow -M mypol
<br>
******************** IMPORTANT ***********************
<br>
To make this policy package active, execute:
semodule -i mypol.pp
<br>
[root@localhost pweb]# semodule -i mypol.pp <br>
&lt;!-- ------------------------------------------------------ --&gt;
<h2>Forbidden You don't have permission to access / on this server.</h2>
<a href="http://www.maxi-pedia.com/FollowSymLinks">http://www.maxi-pedia.com/FollowSymLinks</a><br>
<br>
<h3>Aim</h3>
<code>#DocumentRoot "/var/www/html"<br>
DocumentRoot
"/home/pweb/development/prjs/websites/sites/puglieseweb.com"
</code><br>
<br>
<br>
<code>#&lt;Directory "/var/www/html"&gt;<br>
&lt;Directory
"/home/pweb/development/prjs/websites/sites/puglieseweb.com"&gt;
</code><br>
<br>
<h3>problem<br>
</h3>
<p>Apache - Forbidden - You don't have permission to access /index.html
on this server.</p>
<h3>action</h3>
<a href="http://www.maxi-pedia.com/FollowSymLinks">http://www.maxi-pedia.com/FollowSymLinks</a><br>
<br>
<h3>problem (SELinux security policy)<br>
</h3>
<p>SELinux prevented httpd reading and writing access to http files. <br>
</p>
<p>Ordinarily httpd is allowed full access to all files labeled with
http file context. <br>
</p>
<p>My machine has a tightened security policy with the httpd_unified
turned off, this requires explicit labeling of all files. If a file is
a cgi script it needs to be labeled with httpd_TYPE_script_exec_t in
order to be executed. If it is read-only content, it needs to be
labeled httpd_TYPE_content_t, it is writable content. it needs to be
labeled httpd_TYPE_script_rw_t or httpd_TYPE_script_ra_t. You can use
the chcon command to change these contexts. Please refer to the man
page "man httpd_selinux" or FAQ "TYPE" refers to one of "sys", "user"
or "staff" or potentially other script types.</p>
<h3>action</h3>
<a
 href="http://publib.boulder.ibm.com/infocenter/lnxinfo/v3r0m0/index.jsp?topic=/liaai/selinux/liaaiselinuxhttpdtypes.htm">http://publib.boulder.ibm.com/infocenter/lnxinfo/v3r0m0/index.jsp?topic=/liaai/selinux/liaaiselinuxhttpdtypes.htm</a><br>
I had the same problem and searching the web I found that it was
because of the security context, with the command&nbsp; you see the
context&nbsp;<br>
<br>
<code>ls -Z /web/directory/</code><br>
and with this another command you change the security context<br>
<code>chcon -R -h -t httpd_sys_content_t /web/directory/</code><br>
<br>
This information is taken from&nbsp;<a
 href="http://www.ecualug.org/2008/03/06/comos/como_evitar_el_error_forbidden_problem_you_dont_have_permission_access_en_apache"
 class="bbc_link" target="_blank"
 style="border-bottom: 1px solid rgb(168, 182, 207); color: rgb(51, 68, 102); text-decoration: none;">http://www.ecualug.org/2008/03/06/comos/como_evitar_el_error_forbidden_problem_you_dont_have_permission_access_en_apache</a><br>
<br>
<h3>solution</h3>
<code>#User apache<br>
#Group apache<br>
User pweb<br>
Group root
</code><br>
<br>
<p><br>
</p>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>