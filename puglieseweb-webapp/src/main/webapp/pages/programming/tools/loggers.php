<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<div id="content">
<h1>Logger</h1>
<p>Log4j has three main components:</p>
      <span class="c18"><strong>loggers</strong></span><span class=
      "c15">,</span> <span class=
      "c18"><strong>appenders</strong></span><span class=
      "c15">and</span> <span class=
      "c18"><strong>layouts</strong></span><span class="c15">.
      These three types of components work together to enable
      developers to log messages according to message type and
      level, and to control at runtime how these messages are
      formatted and where they are reported.</span>
    </p>
    <p class="western c16"
       lang="en-GB"
       xml:lang="en-GB">
      <span class="c15">The first and foremost advantage of any
      logging API over plain</span> <span class=
      "c15">System.out.println</span><span class="c15">resides in
      its</span> <span class="c18"><strong>ability to disable
      certain log statements</strong></span><span class="c15">while
      allowing others to print unhindered</span>
    </p>
    <p class="western c16"
       lang="en-GB"
       xml:lang="en-GB">
      <span class="c15">Loggers</span> <span class=
      "c18"><strong>may</strong></span><span class="c15">be
      assigned levels. The set of possible levels, that is:
      <br />
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#TRACE">
      <span class="c15">TRACE</span></a></span><span class="c15">,
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#DEBUG">
      <span class="c15">DEBUG</span></a></span><span class="c15">,
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#INFO">
      <span class="c15">INFO</span></a></span><span class="c15">,
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#WARN">
      <span class="c15">WARN</span></a></span><span class="c15">,
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#ERROR">
      <span class="c15">ERROR</span></a></span><span class=
      "c15">and
      <br /></span> <span class="c33"
         lang="zxx"
         xml:lang="zxx"><a href=
         "http://logging.apache.org/log4j/1.2/apidocs/org/apache/log4j/Level.html#FATAL">
      <span class="c15">FATAL</span></a></span>
    </p>
    <p>
      <br />
    </p>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>