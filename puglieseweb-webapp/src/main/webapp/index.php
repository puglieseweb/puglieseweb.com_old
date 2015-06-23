<?php include 'includes/master-head.inc.php'; ?>

<!-- ================== Section ================== -->

<h1>Authors Dashboard</h1>


<!-- ================== Section ================== -->
<h2>Example of profile image</h2>
<br />

<?php article_link(); ?>

<br /><br />
<?php

$developer = array(
	"<a href=\"about/profile/emanuele/\">Emanuele</a>",
	"<a href=\"about/profile/albert/\">Albert</a>",
	"<a href=\"about/profile/olga/\">Olga</a>"
);


$tasks = array(
	/* 'Developer', 'Task','Due date', 'Tasks' */
	array("$developer[0]", "CSS/HTML5 - Profiles pages", "40% done", "", ),
	array("$developer[1]", "Bash/PHP5 - Web site navitation", "", "",),
	array("$developer[2]", "PHP5 - Web site Log in", "", ""),
	array("", "JavaScript - preload for the site graphic", "", ""),
	array("", "JavaScript - rollover to show our pictures when passing over our names","",""),
	array("", "Ajax - asynchronous callback to retrive the content page (with access to the browser history!", "", ""),
	array("", "Articles and reviews!!!", "",""),
	array("", "Swing - Java Swing UI to easily insert web content", "", ""),
	array("", "MySQL - Store users in the database", "", ""),
	array("", "Search field: Search by author & search articles & search author notes", "", ""),
	array("", "Allow dinamic interaction to this table, using the MySQL database", "", ""),
	array("$developer[2]", "check how to use <a href=\"http://aloha-editor.org/\">aloha editor</a> text editor", "", ""),
	array("$developer[1]", "check how to use <a href=\"http://www.mediawiki.org/wiki/MediaWiki\">Mediawiki</a>", "", "")
);



$j = 0;
foreach($tasks as $task){
	if($j==0){
		echo "<h2>To do</h2>";
		print_table_header('Developer', 'Task description','% done', 'Tasks');
	}
	if($j%2==0){
		// void function print_table_row(string, string, string , css_class);
		print_table_row($task[0], $task[1],$task[2], '');
	}
	else
		print_table_row($task[0], $task[1],$task[2], "class='odd'");
	$j++;
}

print_table_footer();

?>


<!-- ================== Section ================== -->
<br /><br />
<h2>Shared css rules</h2>
<pre class="code">
/* pweb vocabulary */
.code, code{ font-family: monospace; background-color: #EDECEB; font-size:1.3em;}
.command{ font-family: monospace; color: blue;}
.gergon { font-style: italic; font-weight: bold;}
.good { color: green;}
.bad { color: red;}
.strong{ font-family: monospace;}
.important{ color: #4291C9; display: block; background-color: #ECF4FA;}
.underline{text-decoration: underline;}
.resources{font-size: 70%; color: gray;}
.english{color: aqua;}

/* Others */
blockquote p
    {
    padding: 0px 15px 0px 0px;
    font-size: 1em;
    float: left;
    background: url("images/quote-down.jpg") bottom right no-repeat;
}

blockquote
   {
    padding: 20px;
    font-size: 1em;
    background: url("images/quote-up.jpg") top left no-repeat;
}

cite
    {
    font-size: 1.2em;
    float: right;
}

div.images{
    float:left;
    width: 100%;


}

img{
    float: left;
    width: 40%;
    border: 1px Red;
}
</pre>

<?php include 'includes/master-foot.inc.php'; ?>



<?php
/* ----------------------- FUNCTIONS ----------------------- */

function article_link(){
echo '<div class="highlight" style="float:left; width:100%; position:relative; ">';
require 'includes/profile_box.inc.php';
echo '<p class="phead">NEW Article! ';
echo '<a href="/programming/tools/maven/undestanding_maven.php" class="l noline"><em>Understanding Maven</em> </a> &nbsp;&nbsp;&nbsp;&nbsp;(<em>This is just a test for the profile image</em>) </p>';
echo '<span>This article describes how to use Maven... </span>';
echo '</div>';
echo '<br /><br /><br />';
}


// void print_table_header($col1, $col2, $col3, $caption);
function print_table_header($col0, $col1, $col2, $caption){
$header=<<<TABLE
	<table summary=$caption>
		<caption>$caption</caption>
		<thead><tr><td>$col0</td><td>$col1</td><td>$col2</td></tr></thead>
		<tbody>
TABLE;
echo $header;
}

// void function print_table_row($disk, $usage, $quota, $css_class);
function print_table_row($col0, $col1, $col2, $css_class){
$row=<<<TABLE
		<tr $css_class>
			<td>$col0</td>
			<td>$col1</td>
			<td>$col2</td>
		</tr>
TABLE;
echo $row;
}

// void print_table_footer(void);
function print_table_footer(){
$footer=<<<TABLE
		</tbody>
	</table>
TABLE;
echo $footer;
}

?>
