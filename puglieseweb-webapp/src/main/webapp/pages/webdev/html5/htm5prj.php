<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?>
<article>
	<header>
		<h2>HTML5</h2>
	</header>
	<hgroup>
		<h2>Elements redefinition</h2>
		<h3>Relevant specification for non-visual user agents such as
			screen readers</h3>
	</hgroup>
	<ul>
		<li><abbr>CSS</abbr> is an abbreviation not an acronym!</li>
		<li>&lt;small&gt; is not anymore a visual element It is not
			"render this at a small size." Instead, it has the semantic value,</li>
		<li>&lt;b&gt; is not anymore anymore a visual element Itisused
			for some text "to be stylistically offset from the normal <br>
			prose without conveying any extra importance"&nbsp;&nbsp;
		</li>
		<li>&lt;i&gt; is not anymore a visual element It means the text
			is "in an alternate voice or mood"</li>
		<li>&lt;cite&gt; means "the title of a work" and not the source
			or the author: browsers italicize the text between &lt;cite&gt;
			tags&lt;a&gt; is now considered as a block element:<br>
		</li>
	</ul>
	&nbsp;
	<code class="good">
		&lt;a href="/about"&gt;<br> &lt;h2&gt;About me&lt;/h2&gt;<br>
		&lt;p&gt;Find out what makes me tick.&lt;/p&gt;<br> &lt;/a&gt;
		<!-- code-->
	</code>
	<h2>Rich media elements</h2>
	<p>These are meant to be browser-native rich media elements.</p>
	<p>plug-in content is sandboxed from the rest of the docu ment and
		then, they do not play with the JavaScirpt and CSS</p>
	<h3>Canvas API</h3>
	<p>The html file:</p>
	<code> &lt;canvas id="my-first-canvas" width="360"
		height="240"&gt; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;No canvas
		support? Have an old-fashioned image instead:&lt;/p&gt;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;img src="marocco.JPG" alt="Emanuele
		and Rosalba in Marocco"&gt; &lt;/canvas&gt;</code>

	<p>The javascript file:</p>
	<code>
		var canvas = document.getElementById('my-first-canvas'); // context is
		our canvas API<br> var context = canvas.getContext('2d');<br>
		context.strokeStyle = '#990000';<br>
		context.strokeRect(20,30,100,50);
	</code>
	<br>
	<canvas id="my-first-canvas" width="360" height="240">
<p>No canvas support? Have an old-fashioned image instead:</p>
<img src="marocco.JPG" alt="Emanuele and Rosalba in Marocco"></img> </canvas>
	<br>
	<p>Once an image has been served up to a browser, its contents
		cannot be updated. The canvas element is an environment for creating
		dynamic images.</p>
	<p>
		The canvas element has no DOM. text not accessible<br> Instead of
		using canvas to create content, use it to recycle existing content. <br>
	</p>
	<h3>SVG API</h3>
	&nbsp;Canvas isn't the only API for generating dynamic images. SVG,
	Scalable Vector Graphics, XML format that can describe the same kind of
	shapes as can<br> vas<br>
	<h3>Audio API</h3>
	<code>
		&lt;audio controls preload="auto"&gt;<br> &nbsp;&nbsp;&nbsp;
		&lt;source src="unbeso.ogg" type="audio/ogg"/&gt; &nbsp;&nbsp;&nbsp;
		&lt;source src="unbeso.mp3" type="audio/mpeg"
	</code>

	<code>
		/&gt; <br> &nbsp;&nbsp;&nbsp; &lt;object
		type="application/x-shockwave-flash"
		data="player.swf?soundFile=witchitalineman.mp3"&gt;<br>
		&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;param name="movie"
		value="player.swf?soundFile=witchitalineman.mp3"&gt;<br>
		&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &lt;a
		href="witchitalineman.mp3"&gt;Download the song&lt;/a&gt;<br>
		&nbsp;&nbsp;&nbsp; &lt;/object&gt;<br> &lt;/audio&gt;&nbsp;
	</code>
	<br> <br>
	<code>controls attribute</code>
	allows the user to&nbsp; play and pause the audio, as well as adjust
	the volume.<br>
	<code>preload attribute</code>
	can take three possible values:
	<code>none</code>
	,

	<code>auto</code>
	, and
	<code>metadata</code>
	.<br>
	<audio controls="controls">
		<source src="unbeso.ogg"> <source src="unbeso.mp3">
				<!-- for browsers that don't support audio tag --> <object
					type="application/x-shockwave-flash"
					data="player.swf?soundFile=witchitalineman.mp3"> <param
						name="movie" value="player.swf?soundFile=witchitalineman.mp3"> <a
						href="unbeso.mp3">Download
the song</a> </object> 
	
	
	
	
	
	</audio>
	<br> <br>
	<h3>Video API</h3>
	The video element works just like the audio element. It has the
	optional autoplay, loop, and preload attributes. The video element is
	not only scriptable, it is also styleable. poster attribute:
	representative image for the video you'll need to provide alternate
	encodings and fallback <br> content:<br> <br> <br>
	<video controls="" poster="placeholder.jpg" height="240" width="360">
		<source src="movie.ogv" type="video/ogg"> <source
				src="movie.mp4" type="video/mp4"> <object
					type="application/x-shockwave-flash"
					data="player.swf?file=movie.mp4" height="240" width="360"> <param
						name="movie" value="player.swf?file=movie.mp4"> <a
						href="movie.mp4">Download
the movie</a> </object>

	
	
	</video>

</article>

<aside>
	<b>references:</b>
	<ul>
		<li><a href="http://www.alistapart.com/articles/previewofhtml5">alistapart
				html5 article</a></li>
		<li><a href="http://www.my-html-codes.com/">http://www.my-html-codes.com/</a>
		</li>
		<li><a
			href="http://cssglobe.com/post/9579/styling-full-width-tabs-with-css3">http://cssglobe.com/post/9579/styling-full-width-tabs-with-css3</a>
		</li>
	</ul>
</aside>


<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
