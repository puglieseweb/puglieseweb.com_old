<?php
$title = "Unix commands";
$description = "my most common used unix commands";
$keywords = "unix, bash, commands";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<article>
<header>
	<h2>
		Commands
	</h2>
</header>
<section>
	<h3>switch user</h3>
	<code>su - root</code>

	<p>
		Switch to the root user. If you enter the
		password correctly, your prompt will change from a dollar sign to a pound sign
	</p>
	<h4>minus sign</h4>

	<p>Without the minus sign the login profile for the new user is not executed -- so this user environment
		variables and aliases would not change. As a result the new user personal setup commands (PATH and so on)
		would not run.
	</p>

	<p class="good">Use the minus sign when you <em>temporarily</em> become another user.
	</p>

	<code>
		exit
	</code>

	<p>
		To return to your previous identity.
	</p>

	<code>
		su - emanuele
	</code>

	<p>
		Switch to emanuele user.
	</p>
</section>


<section>

	<h3>Open a Gnome window from shell</h3>
	<h4><code>gnome-open .</code></h4>
</section>


<section>

	<h3>Reload the shell</h3>
	<h4><code>source</code></h4>

	<p>Once you have edited your .bashrc file, open a terminal and
		execute the command to make the bash shell to re-read the contents of
		the .bashrc file as follows:</p>
	<pre><code> $ source ~/.bashrc </code></pre>
	<p>To reload the .bash_profile without re-login or restart</p>
	<pre><code> $ source .bash_profile</code></pre>
</section>


<section>
	<h3>Unzip files</h3>
	<code>tar</code>

<pre><code>$ tar -zxvf filename.tgz
	$ tar -zxvf filename.tar.gz
	$ tar -jxvf filename.tar.bz2</code></pre>
	<p>referece:</p>
	<a href="http://www.cyberciti.biz/faq/decompress-tgz-targz-files/">UNIX
		/ Linux Decompress tgz / tar.gz Files</a>
</section>
<section>
	<h3>Search files</h3>
	<code>find</code>
	<h4>Copy all files found to a director</h4>

	<p class="resources">
		resources: <a
			href="http://www.linuxquestions.org/questions/linux-newbie-8/how-to-tell-bash-to-move-files-to-another-folder-288830/">
		http://www.linuxquestions.org/questions/linux-newbie-8/how-to-tell-bash-to-move-files-to-another-folder-288830/</a>
	</p>

	<p>
		The <strong>curly braces</strong> indicate to <span class="code c1">exec</span>
		to <span class="underline">use the result of the find
				operation</span>.
	</p>

	<p class="code">
		find <strong>.</strong><strong>-name</strong> "*.txt" <strong>-exec</strong>
		cp '{}' /destination \;
	</p>

	<p>
		Please note that if /mydir is part of the searchpath of find, you
		will get error messages (or warnings) from cp (and probably mv) that
		source and destination are the same file.
	</p>

	<h4>
		How to search and list absolute path
	</h4>

	<p class="resources">
		<a
				href="http://stackoverflow.com/questions/246215/how-can-i-list-files-with-their-absolute-path-in-linux">http://stackoverflow.com/questions/246215/how-can-i-list-files-with-their-absolute-path-in-linux</a>
	</p>
	<code>find `pwd` -name .htaccess</code>


	<h4>How to do a search and replace over multiple files</h4>
	<a
			href="http://www.liamdelahunty.com/tips/linux_search_and_replace_multiple_files.php">http://www.liamdelahunty.com/tips/linux_search_and_replace_multiple_files.php</a>
		  <span style="font-weight: bold;" class="bad">(does
			not work!)</span>  <span style="font-weight: bold;" class="code">find
			`pwd` -name "*.html" -exec `perl -pi -w -e
			's/\.\.\/\.\.\/css\/stylesheet\.css/\.\.\/\.\.\/\.\.\/css\/stylesheet\.css/g;'`
			'{}';</span>
</section>
<section>
	<h3>Create multiple directory</h3>
	<code>mkdir</code>
		<span class="code">for((i=1; i&lt;10; i++)); do mkdir dir$i;
			done</span>  <span class="Apple-style-span"
							   style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;">PS:&nbsp;<b>`command`</b>&nbsp;is
			the same as&nbsp;<b>$(command)</b>----those are "backtics", not
			single<span class="Apple-converted-space">&nbsp;</span>quotes.
		</span>

</section>
<section>
	<!-- Killing commands -->
	<h3>Kill processes VS kill background jobs</h3>
	<code>kill</code>
	<ul class="references">
		<li><a
				href="http://www.linuxquestions.org/questions/linux-newbie-8/kill-all-background-jobs-227978/">http://www.linuxquestions.org/questions/linux-newbie-8/kill-all-background-jobs-227978/</a>
		</li>
		<li><a
				href="http://www.thegeekstuff.com/2010/05/unix-background-job/">http://www.thegeekstuff.com/2010/05/unix-background-job/</a>
		</li>
		<li><a
				href="http://www.thegeekstuff.com/2009/12/4-ways-to-kill-a-process-kill-killall-pkill-xkill/">http://www.thegeekstuff.com/2009/12/4-ways-to-kill-a-process-kill-killall-pkill-xkill/</a>
		</li>
	</ul>
	<dl>
		<dt class="command">kill -9 $(jobs -p)</dt>
		<dd>
			kill all background <strong>jobs</strong>
		</dd>
		<dd>
			<a href="http://scofaq.aplawrence.com/FAQ_scotec6killminus9.html">kill
				-9 vs kill -15</a>
			<ul>
				<li>
					<p>
						<span class="command">kill - 9</span> force the process to die
					</p>
				</li>
				<li>
					<p>
						<span class="command">kill - 15</span> ask the process to day
						(and it can be ignored!)
					</p>
				</li>
			</ul>

		</dd>
	</dl>
</section>
<section>
	<h3>Global Variable</h3>
	<dl>
		<dt class="command">env</dt>
		<dd>
			<a href="http://www.computerhope.com/unix/uenv.htm">http://www.computerhope.com/unix/uenv.htm</a>
		</dd>
		<dt class="command">export</dt>
		<dd>
			<a href="http://www.cyberciti.biz/faq/unix-linux-adding-path/">Adding
				a path</a>
		</dd>
		<dd>
			<a
					href="http://www.dba-oracle.com/t_linux_43_variables_scripts_global.htm">Adding
				a global variable</a>
		</dd>
	</dl>
</section>
<section>
	<h3>Printer commands</h3>
	<dl>
		<dt class="command">lsq lsrm</dt>
		<dd>
			<span class="command">su lprm -</span>

			<p>remove all the printing queues</p>
		</dd>
		<dd>
			<a
					href="http://manpages.ubuntu.com/manpages/intrepid/man1/lprm.1.html">ubuntu.com
				- lprm manpage</a>
		</dd>
		<dd>
			<a href="http://www.ahinc.com/linux101/printing.htm">ahinc.com -
				Linux Printing</a>
		</dd>
	</dl>
</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp'; ?>