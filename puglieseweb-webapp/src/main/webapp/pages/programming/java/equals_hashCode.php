<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">
<h3>equals</h3>
<pre>public boolean equals(<a
 href="http://download.oracle.com/javase/1.4.2/docs/api/java/lang/Object.html"
 title="class in java.lang">Object</a>&nbsp;obj)</pre>
<p>Indicates whether some other object is "equal to" this one. </p>
<p>The&nbsp;equals&nbsp;method implements an equivalence relation
on non-null object references:</p>
<ul>
  <li>It is&nbsp;reflexive: for any non-null reference
value&nbsp;x,&nbsp;x.equals(x)&nbsp;should
return&nbsp;true.</li>
  <li>It is&nbsp;symmetric: for any non-null reference
values&nbsp;x&nbsp;and&nbsp;y,&nbsp;x.equals(y)&nbsp;should
return&nbsp;true&nbsp;if and only
if&nbsp;y.equals(x)&nbsp;returns&nbsp;true.</li>
  <li>It is&nbsp;transitive: for any non-null reference
values&nbsp;x,&nbsp;y,
and&nbsp;z,
if&nbsp;x.equals(y)&nbsp;returns&nbsp;true&nbsp;andy.equals(z)&nbsp;returns&nbsp;true,
then&nbsp;x.equals(z)&nbsp;should
return&nbsp;true.</li>
  <li>It is&nbsp;consistent: for any non-null reference
values&nbsp;x&nbsp;and&nbsp;y,
multiple invocations of&nbsp;x.equals(y)consistently
return&nbsp;true&nbsp;or
consistently return&nbsp;false, provided no information used
in&nbsp;equalscomparisons
on the objects is modified.</li>
  <li>For any non-null reference
value&nbsp;x,&nbsp;x.equals(null)&nbsp;should
return&nbsp;false.</li>
</ul>
<p><span style="font-weight: bold;" class="underline">The&nbsp;equals&nbsp;method
for
class&nbsp;Object&nbsp;implements the most discriminating possible
equivalence relation on objects</span>; that is, for any non-null
reference values&nbsp;x&nbsp;and&nbsp;y, this method returns<span
 style="font-weight: bold;" class="underline">&nbsp;true&nbsp;if and
only if&nbsp;x and&nbsp;y&nbsp;refer to the same objec</span>t (x ==
y&nbsp;has
the value&nbsp;true).</p>
<p>Note that it is <strong>generally necessary to override
the&nbsp;hashCode</strong>
method whenever this method is overridden, so as to maintain the
general contract for the&nbsp;hashCode&nbsp;method, which states that
equal objects must have equal hash codes.</p>
<h3>hashCode</h3>
<pre>public int hashCode()</pre>
<p>Returns a hash code value for the object. This method is supported
for the benefit of hashtables such as those provided
by&nbsp;java.util.Hashtable.</p>
<p>The general contract of&nbsp;hashCode&nbsp;is:</p>
<ul>
  <li>Whenever it is invoked on the same object more than once during
an execution of a Java application, the&nbsp;hashCode&nbsp;method must
consistently return the same integer, provided no information used in&nbsp;equals&nbsp;comparisons
on the object is modified. This integer need not remain consistent from
one execution of an application to another execution of the same
application.</li>
  <li>If two objects are equal according to the&nbsp;equals(Object)&nbsp;method,
then calling the&nbsp;hashCodemethod on each of the two objects must
produce the same integer result.</li>
  <li>It is&nbsp;not&nbsp;required that if two objects are unequal
according to the&nbsp;<a
 href="http://download.oracle.com/javase/1.3/docs/api/java/lang/Object.html#equals%28java.lang.Object%29">equals(java.lang.Object)</a>method,
then calling the&nbsp;hashCode&nbsp;method on each of the two objects
must produce distinct integer results. However, the programmer should
be aware that producing distinct integer results for unequal objects
may improve the performance of hashtables.</li>
</ul>
<p>As much as is reasonably practical, the hashCode method defined by
class&nbsp;Object&nbsp;does return distinct integers for distinct
objects. (This is typically implemented by converting the internal
address of the object into an integer, but this implementation
technique is not required by the JavaTM&nbsp;programming language.)</p>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>