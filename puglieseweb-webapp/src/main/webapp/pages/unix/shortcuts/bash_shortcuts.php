<?php 
$title = "Bash Shell shortcuts";
$description = "Bash shell shortcuts list";
$keywords = "Shell shortcuts bash unix linux";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>
<article>

	<section>
		<h2>Bash shell shortcuts</h2>
		<dl>
			<dt>
				Ctrl + A
			</dt>
			<dd>
				Go to the beginning of the line you are currently typing on
			</dd>
			<dt>
				Ctrl + E
			</dt>
			<dd>
				Go to the end of the line you are currently typing on
			</dd>
			<dt>

				Ctrl + L
			</dt>
			<dd>
				Clears the Screen, similar to the clear command
			</dd>
			<dt>

				Ctrl + U
			</dt>
			<dd>Clears the line before the cursor position. If you are at the end of the line, clears the entire line.
			</dd>
			<dt>
				Ctrl + H
			</dt>
			<dd>Same as backspace
			</dd>
			<dt>
				Ctrl + R
			</dt>
			<dd>Let’s you search through previously used commands
			</dd>
			<dt>
				Ctrl + C
			</dt>
			<dd>Kill whatever you are running
			</dd>
			<dt>
				Ctrl + D
			</dt>
			<dd>Exit the current shell
			</dd>
			<dt>
				Ctrl + Z
			</dt>
			<dd>Puts whatever you are running into a suspended background process. fg restores it.
			</dd>
			<dt>
				Ctrl + W
			</dt>
			<dd>Delete the word before the cursor
			</dd>
			<dt>
				Ctrl + K
			</dt>
			<dd>Clear the line after the cursor
			</dd>
			<dt>
				Ctrl + T
			</dt>
			<dd>Swap the last two characters before the cursor
			</dd>
			<dt>
				Esc + T
			</dt>
			<dd>Swap the last two words before the cursor
			</dd>
			<dt>
				Alt + F
			</dt>
			<dd>Move cursor forward one word on the current line
			</dd>
			<dt>
				Alt + B
			</dt>
			<dd>Move cursor backward one word on the current line
			</dd>
			<dt>
				Tab
			</dt>
			<dd>Auto-complete files and folder names
		</dl>
	</section>

</article>
<?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp'; ?>