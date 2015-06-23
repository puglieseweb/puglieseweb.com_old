<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?>
<div id="content">


<p> </p>
<ol start="17">
  <li>
    <h1 class="western c6" lang="en-GB"> <a name="id.64a656107394"
 id="id.64a656107394"></a> <strong>DBMS</strong> </h1>
    <div class="c8">
    <ol>
      <li>
        <h3 class="western c11" lang="en-GB"> <strong>What
is
an
SQL
INNER JOIN?</strong> </h3>
      </li>
    </ol>
    </div>
  </li>
</ol>
<p class="western c10" lang="en-GB"> The INNER JOIN
keyword return rows when there is at least one match in both tables. If
there are rows in "Persons" that do not have matches in "Orders", those
rows will NOT be listed. </p>
<p class="western c16" lang="en-GB"> <span class="c18"><strong>SELECT</strong></span><span
 class="c15">column_name(s) <br>
</span> <span class="c18"><strong>FROM</strong></span><span class="c15">table_name1
<br>
</span> <span class="c18"><strong>INNER JOIN</strong></span><span
 class="c15">table_name2 <br>
</span> <span class="c18"><strong>ON</strong></span><span class="c15">table_name1.column_name</span><span
 class="c18"><strong>=</strong></span><span class="c15">table_name2.column_name</span>
</p>
<div class="c12">
<ol start="3">
  <li>
    <h3 class="western c21" lang="en-GB"> <span class="c18"><strong>What
is an SQL OUTER JOIN?</strong></span> </h3>
  </li>
</ol>
</div>
<p class="western c10" lang="en-GB"> OUTER JOIN lets
you see both matched rows and unmatched ones, </p>
<p class="western c10" lang="en-GB"> It's great for
finding out: </p>
<ul>
  <li>
    <p class="western c20" lang="en-GB"> <span class="c15">which, if
any,</span> <span class="c18"><strong>rows</strong></span> <span
 class="c15">in one table do</span> <span class="c18"><strong>not
have
a
matching
related row</strong></span> <span class="c15">in
another table.</span> </p>
  </li>
  <li>
    <p class="western c20" lang="en-GB"> <span class="c15">It also
helps you find</span> <span class="c18"><strong>rows</strong></span> <span
 class="c15">that</span> <span class="c18"><strong>have
matches on a few rows but not on all</strong></span><span class="c15">.</span>
    </p>
  </li>
  <li>
    <p class="western c20" lang="en-GB"> <span class="c15">In
addition, it's useful for</span> <span class="c18"><strong>creating
input
to
a
report</strong></span> <span class="c15">where you want to
show all categories (regardless of whether matching rows exist in other
tables) or all customers (regardless of whether a customer has placed
an order).</span> </p>
  </li>
</ul>
<p class="western c69" lang="en-GB"> Following is a
small sample of the kinds of requests you can solve with an OUTER JOIN.
</p>
<p class="western c63" lang="en-GB"> <span class="c18"><strong>Find
Missing
Values</strong></span> </p>
<p class="western c56" lang="en-GB"> Sometimes you
just want to find what's missing. You do so by using an OUTER JOIN with
a test for Null. Here are some "missing value" problems you can solve. </p>
<p class="western c63" lang="en-GB"> <span class="c24"><em><span
 class="c23">"What products have never been ordered?" <br>
"Show me customers who have never ordered a helmet." <br>
"List entertainers who have never been booked." <br>
"Display agents who haven't booked an entertainer." <br>
"Show me tournaments that haven't been played yet." <br>
"List the faculty members not teaching a class." <br>
"Display students who have never withdrawn from a class." <br>
"Show me classes that have no students enrolled." <br>
"List ingredients not used in any recipe yet." <br>
"Display missing types of recipes."</span></em></span> </p>
<p class="western c63" lang="en-GB"> <span class="c18"><strong>Find
Partially
Matched
Information</strong></span> </p>
<p class="western c63" lang="en-GB"> <span class="c15">Particularly</span>
<span class="c18"><strong>for reports</strong></span><span class="c15">,

it's
useful
to
be
able to</span> <span class="c18"><strong>list all
the rows from one or more tables along with any matching rows from
related tables</strong></span><span class="c15">. Here's a sample of
"partially matched" problems you can solve with an OUTER JOIN.</span> </p>
<p class="western c63" lang="en-GB"> <span class="c24"><em><span
 class="c23">"List all products and the dates for any orders." <br>
"Display all customers and any orders for bicycles." <br>
"Show me all entertainment styles and the customers who prefer those
styles." <br>
"List all entertainers and any engagements they have booked." <br>
"List all bowlers and any games they bowled over 160." <br>
"Display all tournaments and any matches that have been played." <br>
"Show me all subject categories and any classes for all subjects." <br>
"List all students and the classes for which they are currently
enrolled." <br>
"Display all faculty and the classes they are scheduled to teach." <br>
"List all recipe types, all recipes, and any ingredients involved." <br>
"Show me all ingredients and any recipes they're used in."</span></em></span>
</p>
<p class="western c10" lang="en-GB"> <br>
<br>
</p>
<div class="c12">
<ol start="4">
  <li>
    <h3 class="western c21" lang="en-GB"> <span class="c18"><strong>What
is a UNION JOIN?</strong></span> </h3>
  </li>
</ol>
</div>
<p class="western c10" lang="en-GB"> A UNION JOIN is a
FULL OUTER JOIN with the matching rows removed </p>
<p class="western c10" lang="en-GB"> As you might
expect, not many commercial implementations support a UNION JOIN. Quite
frankly, we're hard pressed to think of a good reason why you would
want to do a UNION JOIN. </p>
<div class="c12">
<ol start="5">
  <li>
    <h3 class="western c21" lang="en-GB"> <span class="c18"><strong>What
is a JDBC driver?</strong></span> </h3>
  </li>
</ol>
</div>
<p class="western c10" lang="en-GB"> A JDBC driver </p>
<ol>
  <li>
    <p class="western c17" lang="en-GB"> allows a Java
application/client to communicate with a SQL database </p>
  </li>
  <li>
    <p class="western c20" lang="en-GB"> <span class="c15">is a</span>
    <span class="c18"><strong>Java class</strong></span> <span
 class="c15">that implements the JDBC's</span> <span class="c18"><strong>java.sql.Driver</strong></span>
    <span class="c18"><strong>interface</strong></span><span class="c15">.</span>
    </p>
  </li>
  <li>
    <p class="western c20" lang="en-GB"> <span class="c18"><strong>Converts
program SQL requests</strong></span> <span class="c15">for a
particular database.</span> </p>
  </li>
</ol>
<p class="western c16" lang="en-GB"> <a name="id.7c8ed9264fa8"
 id="id.7c8ed9264fa8"></a><a name="id.48cc0a06cd39" id="id.48cc0a06cd39"></a>
<span class="c15">Why
can</span><span class="c18"><strong>load a JDBC Driver</strong></span><span
 class="c15">by using</span> <span class="c18"><strong>Class.forName()</strong></span>
</p>
<p> </p>
<p> <a href="http://validator.w3.org/check?uri=referer"><br>
</a> </p>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>