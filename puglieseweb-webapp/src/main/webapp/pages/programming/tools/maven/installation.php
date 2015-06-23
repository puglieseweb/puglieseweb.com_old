<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>
<article>
	<section>
		<h2>
QuickTip : annotations are not supported in -source 1.3
		</h2>
<p>
If you are using Maven 2 and you see this issue when you are building your applications then easy way out is to add the following snippet to your pom.xml
</p>
<textarea>
		<pre>
<code>

<build>
    <plugins>
      <plugin>
        <artifactId>maven-compiler-plugin</artifactId>
        <configuration>
          <source>1.5</source>
          <target>1.5</target>
        </configuration>
      </plugin>
    </plugins>
  </build>

  </code>
		</pre>

</textarea>
	</section>



<h1 class="western">installation</h1>
<ol>
  <li>download maven from the apache project website</li>
  <li>create the maven enviroment variable</li>
  <ul class="command">
    <li>export m2_home=/home/pweb/usr/springsource/maven</li>
    <li>env</li>
  </ul>
  <li>add maven to the path</li>
  <ul class="command">
    <li>export path=/home/pweb/usr/springsource/maven/bin:${path}</li>
  </ul>
  <li>test maven</li>
  <ul>
    <li>mvn --version
    </li>
  </ul>
</ol>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>