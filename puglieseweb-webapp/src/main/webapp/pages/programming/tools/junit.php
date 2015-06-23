<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>


<aside>
	<ul><li><a href="http://docs.mockito.googlecode.com/hg/latest/org/mockito/Mockito.html">Mockito doc</a></li></ul>
</aside>
<h1>JUnit</h1>
<p class="important"> You use a Runner to invoke unit tests and test
suites
</p>
<h3 class="western"> Composing a <strong>suite of test classes</strong>
</h3>
<p class="c1"> The Suite is a container used to gather tests </p>
<p class="important"> JUnit designed the Suite to run one or more test
cases. <br>
</p>
<p class="c1"> The test runner launches the Suite; which test case to
run is up to the Suite. The <strong>test runner</strong> automatically
creates a <strong>Suite</strong> if you don't provide one of your own.
</p>
<p class="c1"> The <strong>Suite object</strong> is a <strong>Runner</strong>
that executes all of the <strong>@Test</strong> annotated methods <br>
in the test class </p>
<pre class="code"><strong>@RunWith</strong>(value=org.junit.runners.<strong>Suite.class</strong>)<br><strong>@SuiteClasses</strong>(   value={FolderConfigurationTest.class,<br>               FileConfigurationTest.class})<br>public class FileSystemConfigurationTestSuite {<br>}<br>
</pre>
<p> You use a test suite to group related test classes together,
allowing you to invokethem as a group. You can even group suites
together in higher-level suites.&nbsp; </p>
<p> <br>
</p>
<h3> @Before and @After </h3>
<p> NOTES: </p>
<ul>
  <li>the annotated methods must be <strong>public</strong> <br>
  </li>
  <li> <span class="bad c1">if you have more than one of the
@Before/@After methods, the order of their execution is not defined.</span>
  </li>
</ul>
<h3> &nbsp;@BeforeClass and @AfterClass <br>
</h3>
<p> To annotate your methods in that class. The <span
 class="underline c1">methods that you annotate will get executed, only
once, before/after all of your @Test methods</span>. </p>
<p> NOTES: <br>
</p>
<ul>
  <li>The annotated methods must be <strong>public</strong> and <strong>static</strong>
    <br>
  </li>
  <li> <span class="bad c1">if you have more than one of the
@BeforeClass/@AfterClass methods, the order of their execution is not
defined.</span>&nbsp;</li>
</ul>
<br>
<h3>Domain object</h3>
<p>In the context of unit testing, the term domain object is used to
contrast and compare the objects you use in your application with the
objects that you use to test your application (test objects). Any
object under test is considered a domain object.</p>
<br>
<h3>test fixture</h3>
<p>It is the pretest state. We set up a test by placing the environment
in a known state (create objects, acquire resources).</p>
<p>All test methods can share the code, put it into the fixture without
combining test methods.<br>
</p>
<br>
<h2>Examples</h2>
NOTE<br>
<ul>
  <li>Before assertEqual/assertSame is a good practice to&nbsp; verify
an object isn’t null. We use the assertNotNull(String, Object)
signature so that if the test fails, the error displayed is meaningful
and easy to understand</li>
</ul>
<code>&nbsp;&nbsp;&nbsp; @Test<br>
&nbsp;&nbsp;&nbsp; public void testProcessRequest() {<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Response response =
controller.processRequest(request);<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; assertNotNull("Must not return a
null response", response);<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <strong>assertEquals("", new
SampleResponse(), response);</strong><br>
&nbsp;&nbsp;&nbsp; }
</code><br>
<br>
<code>&nbsp;&nbsp;&nbsp; @Test<br>
&nbsp;&nbsp;&nbsp; public void testProcessRequestAnswersErrorResponse()
{<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; SampleRequest request = new
SampleRequest("testError");<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; SampleExceptionHandler handler =
new SampleExceptionHandler();<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; controller.addHandler(request,
handler);<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Response response =
controller.processRequest(request);<br>
<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; assertNotNull("Must not return a
null response", response);<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <strong>assertEquals(ErrorResponse.class,
response.getClass());</strong><br>
&nbsp;&nbsp;&nbsp; }
</code>


<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>