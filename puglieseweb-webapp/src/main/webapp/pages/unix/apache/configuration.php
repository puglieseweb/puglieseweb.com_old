<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">


    <p>
    </p>
    <h1>
       Apache configuration
      <br>
    </h1>
     http://library.linode.com/web-servers/apache/installation/fedora-14 http://library.linode.com/lamp-guides/fedora-14#sph_configure-name-based-virtual-hosts First check the syntax of your httpd.conf with apachectl configtest and then restart with apachectl graceful
    <p>
    </p>
    <h3>
       configure VirtualHost
    </h3>
    <a
 href="http://library.linode.com/lamp-guides/fedora-14#sph_configure-name-based-virtual-hosts">http://library.linode.com/lamp-guides/fedora-14#sph_configure-name-based-virtual-hosts</a>
    <br>
    <a
 href="http://www.geeksengine.com/article/apache-multiple-local-websites.html">http://www.geeksengine.com/article/apache-multiple-local-websites.html</a>
    <br>
    <br>
    <span style="font-weight: bold;" class="command"># mkdir stable beta beta1</span>
    <br>
    <br>
    <br>
    <span style="font-weight: bold;" class="command"># vim /etc/httpd/conf.d/vhost.conf</span>
    <br>
    <br>
    <code>&lt;VirtualHost 127.0.0.1&gt;<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerAdmin webmaster@puglieseweb.com<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerName stable<br> #&nbsp;&nbsp;&nbsp; ServerAlias www.stable.com<br> &nbsp;&nbsp;&nbsp;&nbsp; DocumentRoot /home/pweb/development/prjs/websites/puglieseweb.com/stable/<br> &nbsp;
		<p>Resources:</p>
		<a href='/programming/tools/maven/video/vosao-read-only/kernel/src/main/resources/org/vosao/resources/html'>html</a><br />&nbsp;&nbsp;&nbsp; ErrorLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/stable_error.log<br> &nbsp;&nbsp;&nbsp;&nbsp; CustomLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/stable_access.log combined<br> &lt;/VirtualHost&gt;<br><br> &lt;VirtualHost 127.0.0.2&gt;<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerAdmin webmaster@puglieseweb.com<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerName beta<br> &nbsp;#&nbsp;&nbsp; ServerAlias www.beta.com<br> &nbsp;&nbsp;&nbsp;&nbsp; DocumentRoot /home/pweb/development/prjs/websites/puglieseweb.com/beta<br> &nbsp;&nbsp;&nbsp;&nbsp; ErrorLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/beta_error.log<br> &nbsp;&nbsp;&nbsp;&nbsp; CustomLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/beta_access.log combined<br> &lt;/VirtualHost&gt;<br><br> &lt;VirtualHost 127.0.0.3&gt;<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerAdmin webmaster@beta1<br> &nbsp;&nbsp;&nbsp;&nbsp; ServerName beta1<br> &nbsp;#&nbsp;&nbsp; ServerAlias www.beta.com<br> &nbsp;&nbsp;&nbsp;&nbsp; DocumentRoot /home/pweb/development/prjs/websites/puglieseweb.com/beta1<br> &nbsp;&nbsp;&nbsp;&nbsp; ErrorLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/beta1_error.log<br> &nbsp;&nbsp;&nbsp;&nbsp; CustomLog /home/pweb/development/prjs/websites/puglieseweb.com/logs/beta1_access.log combined<br> &lt;/VirtualHost&gt; </code>

    <span style="font-weight: bold;" class="command"># vim /etc/hosts</span>
    <br>
    <code>127.0.0.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost.localdomain localhost stable<br> ::1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost6.localdomain6 localhost6<br><br> 127.0.0.2 beta<br> 127.0.0.3 beta1 </code>

    <span style="font-weight: bold;" code="command"># service httpd restart</span>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>