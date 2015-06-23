<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>
	<header>
		<time class="updated" datetime="2011-10-28 11:11:03-0400" pubdate>28-10-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<hgroup>
			<h2>Reading large data</h2>
		</hgroup>
	</header>
	<section>
		<h3>Data access must be fast</h3>
		<figure>
			<img src="" />
			<figcaption>Figure description</figcaption>
		</figure>

		<p>
			The best way to get started with this topic is to look at an example.
			Let's assume that you must read a<em> large sum of data</em> from a <strong>binary
				file</strong> and <em>store it in an array </em>for further processing. <br>
		</p>
		<p>
			Java I/O is based on streams that represent a sequence of bytes.
			First, you must choose a stream type. We are working with <strong>binary
				data</strong>, so the&nbsp;<span style="font-weight: bold;" class="code">FileInputStream</span>&nbsp;class
			is the correct choice. <br>
		</p>
		<p>
			You should consider using the&nbsp;<span style="font-weight: bold;"
				class="code">FileReaderclass</span> when working with character data
			streams. <br>
		</p>
		<p>
			We can open a connection to an actual file like this: <br> <span
				style="font-weight: bold;" class="code">InputStream in = new
				FileInputStream (fileName); </span><br>
		</p>
	</section>
	<aside>
		Resources:
		<ul>
			<li>Resource1</li>
			<li>Resource2</li>
		</ul>
	</aside>
</article>
<p>
	Effective approach for reading large data when <em>time</em> and <em>memory</em>
	allocation have to be considered to improve overall system performance.
</p>
<h3>
	Keeping <span style="font-weight: bold;" class="good">performance
		issues in mind</span>
</h3>
<p>
	At this point, it is possible to read data from the file, but let's
	take a closer look at other classes from the&nbsp;<strong>java.io&nbsp;package</strong>.
	The&nbsp;<span style="font-weight: bold;" class="code">BufferedInputStream</span>
	class is a wrapper for<span style="font-weight: bold;" class="gergon">
		input streams</span>, allowing <em>buffering</em> of its input and improving
	the reading process. You can connect to a file like this:
</p>
<p>
	<span style="font-weight: bold;" class="code">InputStream is =
		new BufferedInputStream (new FileInputStream (fileName));</span><br>
</p>
<h3>
	Reading the file<br>
</h3>
<p>When you've connected to the file, you can start reading from it.
	The&nbsp;InputStream&nbsp;class has two main methods for reading data:</p>
<ul class="code">
	<li>int read() <br>
	</li>
	<li>int read(byte[] b,int off,int len). <br>
	</li>
</ul>
<p>
	The first method reads only one byte of data at a time, whereas the
	second one reads up to&nbsp;<strong>len&nbsp;bytes of data</strong>
	from the stream into an <strong>array of bytes</strong>. <br>
</p>
<h2>
	Example 1<br>
</h2>
<p>
	Obviously, <span style="font-weight: bold;" class="good">the
		second method gains in performance</span>, so we'll use it as presented
	in&nbsp;<a
		href="http://www.techrepublic.com/article/handling-large-data-files-efficiently-with-java/1046714#"
		class="c2">Listing A</a>.<br>
</p>
<p>
	This listing has several interesting aspects. First, because the file
	is big, <em>we allocate a rather big buffer</em> (20 Mb) when calling
	the&nbsp;<strong>read&nbsp;method</strong>. <span
		style="font-weight: bold;" class="good">The bigger the buffer,
		the faster all data is read</span>. Actually, it is sometimes possible to
	know in advance the number of bytes that can be read from an input
	stream without blocking and &nbsp;allocate a buffer of the same size.
	This is accomplished by calling the&nbsp;available&nbsp;method. <br>
	<br>
</p>
<ul>
	<li>Unfortunately, <span style="font-weight: bold;" class="bad">this
			method does not always return correct results and can throw an
			exception</span>. This is the case while reading <span
		style="font-weight: bold;" class="gergon">database</span> data as a
		long or <span style="font-weight: bold;" class="gergon">BLOB</span> <em>via
			a stream</em>. <br>
	</li>
	<li>Second, all <span style="font-weight: bold;" class="good">arrays
			are initialized outside of the&nbsp;while&nbsp;loop,
			meaning&nbsp;out, buf, and&nbsp;tmp&nbsp;arrays are reused, so less
			objects are to be garbage-collected</span>. <br>
	</li>
	<li>Third, when the <span style="font-weight: bold;"
		class="underline">buffer is filled with part of the data</span>, it is
		<span style="font-weight: bold;" class="underline">copied into
			a growing array</span> by calling the <a
		href="http://download.oracle.com/javase/6/docs/api/java/lang/System.html#arraycompy">System.arraycopy</a>
		method. <br>
	</li>
</ul>
<p>
	Although this algorithm is quite efficient, <em>every&nbsp;read&nbsp;loop
		creates a temporal array and performs two array copies</em>. <br>
</p>
<h2>
	Example 2<br>
</h2>
<p>
	You can <span style="font-weight: bold;" class="good">reduce
		data copying and array allocation</span> by modifying
	the&nbsp;while&nbsp;loop as shown in<a
		href="http://www.techrepublic.com/article/handling-large-data-files-efficiently-with-java/1046714#"
		class="c2">Listing B</a>. <br> <br>
</p>
<p>Here, instead of storing intermediate data in a big array and
	extending it every time data is retrieved,</p>
<ol>
	<li>it is <strong>maintained in a list</strong>, where<span
		style="font-weight: bold;" class="underline"> each element
			contains only a piece of data</span>. <br>
	</li>
	<li>When the end of the stream is reached, the <span
		style="font-weight: bold;" class="underline">data can be taken
			from the list and merged into a single array</span>. This allows you to <span
		style="font-weight: bold;" class="good">save one array
			allocation and one copy operation</span>. If you don't immediately need a
		whole data as an array, you can return the list itself and thus save
		some more time and resources. <span style="font-weight: bold;"
		class="good">Reading data using this algorithm can be
			significantly faster than using the first one (Listing A). The
			difference in speed depends on the buffer array size that is used
			by&nbsp;read&nbsp;method</span>.
	</li>
</ol>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>