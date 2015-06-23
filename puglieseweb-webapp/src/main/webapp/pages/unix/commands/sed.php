<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<div id="content">


    <h1>sed command</h1>
    The flags can be any of the following: <br>
    <dl>
      <dt>g</dt>
      <dd>replace all matches</dd>
      <dd><!--TITLE==sed--><!--HEADER--><!--HEADFILE==head-->Example: <code>echo
          "aaaaa" | sed -e 's/a/b/g' ==&gt; bbbb<br>
        </code>&nbsp;<br>
      </dd>
      <dt>n</dt>
      <dd>replace nth instance of <em>pattern</em> with replacement</dd>
      <dt>p</dt>
      <dd>write pattern space to STDOUT if a successful substitution
        takes place<em></em></dd>
      <dt>w file</dt>
      <dd>Write the pattern space to <em>file</em> if a successful
        substitution takes place&nbsp;</dd>
    </dl>
    Example_ Capitalize the first letter <br>
    <blockquote>
      <p><b>&#8217;s/./\u&amp;/g&#8217;</b></p>
    </blockquote>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>