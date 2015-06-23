<?php
$title = "Special parameters";
$description = "List of Bash scripting special parameters";
$keywords = "bash,unix,special,parameters,shell";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>
<article>

	<h2>Special parameters</h2>

	<p>The shell treats several parameters specially. These parameters may only be referenced; assignment to them is not
		allowed.
	</p>

	<h3>

		Character Definition
	</h3>

	<dl>
		<dt>
			$*
		</dt>
		<dd>Expands to the positional parameters, starting from one. When the expansion occurs within double quotes, it
			expands to a single word with the value of each parameter separated by the first character of the IFS
			special
			variable.

		</dd>
		<dt>
			$@
		</dt>
		<dd>Expands to the positional parameters, starting from one. When the expansion occurs within double quotes,
			each
			parameter expands to a separate word.
		</dd>
		<dt>
			$#
		</dt>
		<dd>Expands to the number of positional parameters in decimal.
		</dd>
		<dt>$?</dt>
		<dd>Expands to the exit status of the most recently executed foreground pipeline.
		</dd>
		<dt>$-</dt>
		<dd>A hyphen expands to the current option flags as specified upon invocation, by the set built-in command, or
			those
			set by the shell itself (such as the -i).
		</dd>
		<dt>$$</dt>
		<dd>Expands to the process ID of the shell.
		</dd>
		<dt>$!</dt>
		<dd>Expands to the process ID of the most recently executed background (asynchronous) command.
		</dd>
		<dt>$0</dt>
		<dd>Expands to the name of the shell or shell script.
		</dd>
		<dt>$_</dt>
		<dd>The underscore variable is set at shell startup and contains the absolute file name of the shell or script
			being
			executed as passed in the argument list. Subsequently, it expands to the last argument to the previous
			command,
			after expansion. It is also set to the full pathname of each command executed and placed in the environment
			exported to that command. When checking mail, this parameter holds the name of the mail file.
		</dd>
		<dt>$* vs. $@</dt>
		<dd>

			The implementation of "$*" has always been a problem and realistically should have been replaced with the
			behavior of "$@". In almost every case where coders use "$*", they mean "$@". "$*" Can cause bugs and even
			security holes in your software.
	</dl>

</article>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp';
?>

