<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">


<h1 class="western c6" lang="en-GB"> UNIX </h1>
<h3 class="western c11" lang="en-GB"> Why Linux? </h3>
<p>Because of its networking and multiuser features </p>
<h3 class="western c11" lang="en-GB"> Why in so common using Unix and
Java? </h3>
<h2><a
 href="http://administratosphere.wordpress.com/2007/07/19/the-wheel-group/">The

wheel
Group</a></h2>
<p>The wheel group is a group which limits the number of people who are
able to su to root. <br>
</p>
<p>The basic set up, as it was in the beginning, was to do the
following: </p>
<ol style="margin: 0px; padding: 0px 0px 15px;">
  <li style="margin: 0px 0px 0px 20px; padding: 0px;">Create a &#8220;wheel&#8221;
group in /etc/groups</li>
  <li style="margin: 0px 0px 0px 20px; padding: 0px;">Change the
permissions of the &#8220;su&#8221; command so that only those in the &#8220;wheel&#8221; group
may run it.</li>
</ol>
<br>
<h2>Software location</h2>
Usually we can have 2 optins: <br>
<ul>
  <li><b>/usr/bin</b> is where <span style="font-weight: bold;"
 class="underline">launchers</span> are kept.</li>
  <li><b>/usr/lib/chromium-browser</b> is where all the<span
 style="font-weight: bold;" class="underline"> binaries and data
required for use by a program is kept</span> -- that can essentially be
considered where a program is really installed.</li>
  <li><b>/usr/share</b>&nbsp;is where the <span
 style="font-weight: bold;" class="underline">Application entry, and
where the `man' entries are kept</span> for a program.</li>
</ul>
<br>
or<br>
<br>
<ul>
  <li><i>some</i>&nbsp;installations is installed in <b>/opt</b>&nbsp;instead,
rather than in the various directories in /usr</li>
</ul>
For example, Chrome is installed in /opt/google/google-chrome<br>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>