<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>
<article>

	<section>
		<h2>Basic Vi (Vim) Commands</h2>
		<section>
			<h3>Curson movement</h3>
			<dl>
				<dt>:12</dt>
				<dd>move to line 12</dd>
				<dt>^</dt>
				<dd>first non-blank character of line</dd>
				<dt>$</dt>
				<dd>end of line</dd>
				<dt>w</dt>
				<dd>jump by start of words (punctuation considered words)</dd>
				<dt>W</dt>
				<dd>jump by words (spaces separate words)</dd>
				<dt>e</dt>
				<dd>jump to end of words (punctuation considered words)</dd>
				<dt>E</dt>
				<dd>jump to end of words (no punctuation)</dd>
				<dt>b</dt>
				<dd>jump backward by words (punctuation considered words)</dd>
				<dt>B</dt>
				<dd>jump backward by words (no punctuation)</dd>
				<dt>0</dt>
				<dd>(zero) start of line</dd>
			</dl>
		</section>
		<section>
			<h3>Copy and Paste</h3>
			<dl>
				<dt>yy (yank)</dt>
				<dd>copy line</dd>
				<dt>2yy</dt>
				<dd>copy 2 lines</dd>
				<dt>dd</dt>
				<dd>delete (cut) line</dd>
				<dt>2dd</dt>
				<dd>delete (cut) next current and next lines</dd>
				<dt>p</dt>
				<dd>paste after the cursor</dd>
				<dt>P</dt>
				<dd>paste before the cursor</dd>
				<dt>dw</dt>
				<dd>delete (cut) the current word</dd>
				<dt>x</dt>
				<dd>delete (cut) the current character</dd>
				<dt>j</dt>
				<dd>join lines</dd>
			</dl>
		</section>

		<section>
			<h3>Undo and Repeat</h3>
			<dl>
				<dt>u</dt>
				<dd>undu</dd>
				<dt>.</dt>
				<dd>repaet last opertation</dd>
				<dt>x</dt>
				<dd>delete backwards</dd>
				<dt>A</dt>
				<dd>inserte at the end of the line</dd>
			</dl>
		</section>
		<section>
			<h3>search</h3>
			<b>Example of search and substitution</b>
			<section>
				<code>:1,$/something/SOMETHINGelsegi</code>
				<dl>
					<dt>:</dt>
					<dd>search</dd>
					<dt>1,$</dt>
					<dd>from line 1 to the end</dd>
					<dt>/something</dt>
					<dd>search for the word "something"
					<dt>/SOMETHINGelse</dt>
					<dd>repalece with the word "SOMETNINGeslse"</dd>
					<dt>g</dt>
					<dd>global option</dd>
					<dt>i</dt>
					<dd>case insensitive option</dd>
				</dl>
			</section>
			<section>
				<h4>Search forwards</h4>
				<ul>
					<li>Enter the normal mode</li>
					<li>Press <code>/</code></li>
					<li>Type your search pattern</li>
				</ul>
				<dl>
					<dt>
						<command label="Esc">Esc</command>
					</dt>
					<dd>to cancel</dd>
					<dt>
						<command label="Enter">Enter</command>
					</dt>
					<dd>to perform the search.</dd>
				</dl>
			</section>
			<section>
				<h4>Search backwards</h4>
				<ul>
					<li>Enter the normal mode</li>
					<li>Press <code>?</code></li>
					<li>Type your search pattern</li>
				</ul>
				<dl>
					<dt>n</dt>
					<dd>Next occurrence. Search forwards for the next occurrence</dd>
					<dt>N</dt>
					<dd>search backwards.</dd>
					<dt>ggn</dt>
					<dd>jump to the first match</dd>
					<dt>GN</dt>
					<dd>jump to the last.</dd>
					<dt>??</dt>
					<dd>reverse occurrence</dd>
					<dt>cw</dt>
					<dd>change word</dd>
				</dl>

			</section>
			<section>
				<h4>Search for the current word</h4>
				<ul>
					<li>Enter the normal mode</li>
					<li>Move the cursor to any word</li>
				</ul>
				<dl>
					<dt>*</dt>
					<dd>search forwards for the next occurrence of that word</dd>
					<dt>#</dt>
					<dd>to search backwards</dd>
					<dt>* or # searches</dt>
					<dd>Search for the exact word at the cursor (searching for
						rain would not find rainbow).
					</dd>
					<dt>g* or g#</dt>
					<dd>if you don't want to search for the exact word.</dd>
				</dl>

			</section>
			<section>
				<h4>SearchingEdit</h4>

				<p>This needs a GUI version of Vim (gvim), or a console Vim that
					accepts a mouse.</p>

				<p>You may need to comfigure the vimrc file to enable mouse
					searches...</p>
			</section>

		</section>
	</section>
	<aside>
		<b>Read more:</b>
		<ul>
			<li><a href="http://www.worldtimzone.com/res/vi.html">http://www.worldtimzone.com/res/vi.html</a></li>
			<li><a href="http://vim.wikia.com/wiki/Searching">href="http://vim.wikia.com/wiki/Searching"</a></li>
		</ul>
	</aside>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp'; ?>