<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>
	<header>
		<hgroup>
			<h2>How to install java jdk on fedora</h2>
			<h6>How to install java jdk on fedora core? here i provide few
				steps to demonstrate how it’s work.</h6>
		</hgroup>
	</header>

	<section>
		<h3>Installation Setup</h3>
		<ol>
			<li><p>Please visit sun java website to download any java
					jdk version you like.</p> <a
				href="http://java.sun.com/javase/downloads/index.jsp">http://java.sun.com/javase/downloads/index.jsp</a>
			<li>#
			<li>Click download, select Linux platform, language and accept
				license and continue.</li>
			<li>Select “Linux RPM in self-extracting file” and download
				jdk_filename-rpm.bin file (jdk-6u6-linux-i586-rpm.bin).</li>
			<li>After downloaded, changed to the directory where you saved
				the file.</li>
			<li>Login to root user or su to root or sudo, and issue ‘chmod
				+x jdk_filename.-rpm.bin’ to make it executable. <pre>
<code>
chmod +x jdk_filename.bin
</code>
</pre>
			</li>
			<li>
				<p>Execute it</p> <pre>
<code>
./jdk_filename-rpm.bin
</code>
</pre>
			</li>
			<li>Press space bar , repeat until system prompt to enter yes or
				no, type y and enter to continue.</li>
			<li>This will output a .rpm file in same directory</li>
			<li>Issue ‘rpm -i jdk_filename.rpm’, this will install all jdk
				files on linux system /usr/java/jdk-version/ <pre>
<code>
rpm -i jdk_filename.rpm
</code>
</pre>
			</li>
			<li><p>Create symbol links to make it execute anywhere</p>
<pre><code>ln -s /usr/java/jdk1.6.0/bin/java /usr/bin/java
ln -s /usr/java/jdk1.6.0/bin/javac /usr/bin/javac</code></pre>
			</li>
			<li>type java -version, DONE !!</li>
		</ol>
	</section>
	<section>
		<h3>Post-Installation Setup</h3>

		<p>Set JAVA_HOME into environment variable</p>
		<p>Copy following statement and append to /etc/profile or .bashrc
			file, make system set JAVA_HOME into system environment variable.</p>
		<pre>
<code>
export JAVA_HOME="/usr/java/jdk1.6.0;"
</code>
</pre>
		<p>P.S Please visit How to install JDK on Ubuntu, if you want to
			know how to install java jdk with apt-get.
		<p>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>