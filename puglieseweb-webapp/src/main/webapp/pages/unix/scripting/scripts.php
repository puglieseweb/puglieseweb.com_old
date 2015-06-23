<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<article>
	<header>
		<h2>Bash Scripting</h2>
	</header>
	<aside>
		<p>Resources:</p>
		<ul>
			<li><a
				href="http://www.justlinux.com/nhf/Programming/Introduction_to_bash_Shell_Scripting.html">Bash
					Shell Scripting</a></li>
			<li><a href="http://en.wikipedia.org/wiki/Shebang_(Unix)">What's
					a shebang</a>
		</ul>
	</aside>
	<section>
		<h3>Running a Script</h3>
		<p>To run a non-executable sh script, use:</p>
		<code>sh myscript</code>
		<p>To make a script executable, give it the necessary permission:</p>
		<pre>
		<code>
		chmod +x myscript 
		./myscript </code>
		</pre>
		<section>
			<h4>How Unix run a script</h4>
			<p>When a file is executable, the kernel is responsible for
				figuring out how to execute it.</p>
			<p>For non-binaries, this is done by looking at the first line of
				the file.</p>
			<p>It should contain a hashbang:</p>
			<code> #! /usr/bin/env bash </code>
			<dl>
				<dt>shebang</dt>
				<dd>
					<p>In computing, a shebang (also called a hashbang) is the
						character sequence consisting of the characters number sign and
						exclamation point (#!), when it occurs as the first two characters
						on the first line of a text file.</p>
					<p>
						In this case, the program loader in Unix-like operating systems
						parses the rest of the first line as an <strong>interpreter
							directive</strong> and invokes the program specified after the character
						sequence with any command line options specified as parameters.
					</p>
					<p>The name of the file being executed is passed as the final
						argument</p>
				</dd>
			</dl>
			<p>
				The <strong>hashbang</strong> tells the kernel what program to run
				(in this case the command /usr/bin/env is ran with the argument
				bash).
			</p>
			<p>Then, the script is passed to the program (as second argument)
				along with all the arguments you gave the script as subsequent
				arguments.</p>
			<p>
				That means <strong>every script that is executable should
					have a hashbang</strong>.
			</p>
			<p>If it doesn't, you're not telling the kernel what it is, and
				therefore the kernel doesn't know what program to use to interprete
				it. It could be bash, perl, python, sh, or something else. (In
				reality, the kernel will often use the user's default shell to
				interprete the file, which is very dangerous because it might not be
				the right interpreter at all or it might be able to parse some of it
				but with subtle behavioural differences such as is the case between
				sh and bash.)</p>

		</section>



	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>