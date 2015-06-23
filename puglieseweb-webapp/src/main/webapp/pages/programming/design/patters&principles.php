<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>

<h1>Patterns &amp; principles</h1>
<p>Pattern are useful only in a certain context.</p>
<p>Patterns always have two parts:</p>
<ul>
	<li>the how: how to implement them</li>
	<li>the when: when to use them and when to leave them alone.</li>
</ul>
<h2 class="western c7" lang="en-GB">GoodPractices &amp;
	ThinkingAbout &amp; UseCases</h2>
<br>
<h3 class="western c11" lang="en-GB">Good Practices</h3>
<br>
<p class="western c20" lang="en-GB">
	<span class="c15">Using</span> <span class="c18"><strong>IoC</strong></span>
	<span class="c15">and</span> <span class="c18"><strong>programming
			to interfaces</strong></span> <span class="c15">we can keep</span> <span class="c18"><strong>decouple
			our code between the four layers architecture and still access data
			between two layers</strong></span><span class="c15">. For example I can access
		a DTO, defined on the Service Layer, from the Presentation Layer.</span>
</p>
<p class="western c20" lang="en-GB">
	<span class="c15">using</span> <span class="c18"><strong>composition</strong></span>
	<span class="c15">(of an interface) and</span> <span class="c18"><strong>delegating</strong></span>
	<span class="c15">interchangeable concrete classes, which
		implement the interface, we can:</span>
</p>
<p class="western c20" lang="en-GB">
	<span class="c18"><strong>substitute conditional code</strong></span>
</p>
<p class="western c26" lang="en-GB">
	<strong>change behaviours at runtime</strong>
</p>
<br>
<br>
<p class="western c17" lang="en-GB">If you need the same object
	graph between calls to the server, you have to save the server state
	somewhere, which is the subject of the section on saving server state</p>
<p class="western c20" lang="en-GB">
	<span class="c15">Randy's advice is "start with a locally
		invocable</span> <span class="c18"><strong>Service Layer</strong></span> <span
		class="c15">whose method signatures deal in</span> <span class="c18"><strong>domain</strong></span>
	<span class="c15">objects. Add remotability when you need it (if
		ever) by putting</span> <span class="c18"><strong>Remote
			Facades</strong></span> <span class="c15">/f&Eacute;&#8482;'s&Eacute;&#8216;&Euml;d/
		on our Service Layer or having your Service Layer objects implement
		remote interfaces.&acirc;&#8364;</span>
</p>
<h3 class="western c21" lang="en-GB">
	<span class="c18"><strong>Thinking Abouts</strong></span>
</h3>
<br>
<p class="western c17" lang="en-GB">HFDP p.417</p>
<br>
<h3 class="western c11" lang="en-GB">
	<strong>Use Cases</strong>
</h3>
<br>
A
<p class="western c20" lang="en-GB">
	<span class="c15">n Object A</span> <span class="c18"><strong>delegates
			other Object(s)</strong></span> <span class="c15">X to implement
		functionalities. If I want to different clone of Object A I may want
		to</span> <span class="c18"><strong>move</strong></span> <span class="c15">the
		Ogject(s) X</span> <span class="c18"><strong>instance into
			static instance variables and share them.</strong></span>
</p>
<h2 class="western c7" lang="en-GB">
	<strong>Design Patterns</strong>
</h2>
<br>
<h3 class="western c11" lang="en-GB">
	<strong>I</strong>
</h3>
<br>
<h3 class="western c11" lang="en-GB">
	<strong>oC</strong>
</h3>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Principle used</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Definition</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>When to use</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>H</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>ow it is implemented</strong></em>
</h4>
<br>
<span class="c15">Spring Framework is an</span>
<span class="c18"><strong>Inversion Control container</strong></span>
<span class="c15">.</span>
<br>
<span class="c15">Instead of explicitly requesting an object, a</span>
<span class="c18"><strong>requesting code can make use
		of Inversion of Control containers</strong></span>
<span class="c15">which</span>
<span class="c18"><strong>provide instantiated objects
		as needed</strong></span>
<span class="c15">which inject them into the requesting code
	resolving the object dependencies.</span>
<br>
<span class="c15">Using IoC containers you</span>
<span class="c18"><strong>don&acirc;&#8364;&#8482;t care
		how services are created and how to get references</strong></span>
<span class="c15">to the ones you need.</span>
<br>
In IoC:
<p class="western c20" lang="en-GB">
	<span class="c18"><strong>clients declare</strong></span> <span
		class="c15">their</span> <span class="c18"><strong>dependency</strong></span>
	<span class="c15">on servicing objects though a</span> <span
		class="c18"><strong>configuration file</strong></span> <span
		class="c15">(like spring-conf.xml) and</span>
</p>
<p class="western c20" lang="en-GB">
	<span class="c18"><strong>IoC</strong></span><span class="c15">,
		the Spring Framework,</span> <span class="c18"><strong>locate
			and instantiate these serving components</strong></span><span class="c15">.</span>
</p>
<span class="c15">Dependencies can be</span>
<span class="c18"><strong>wired</strong></span>
<span class="c15">by either</span>
<span class="c15">/'a</span>
<span class="c15">&Eacute;&ordf;</span>
<span class="c15">&Atilde;&deg;&Eacute;&#8482;r</span>
<span class="c18"><strong>using annotations</strong></span>
<span class="c15">or using</span>
<span class="c18"><strong>XML configuration files</strong></span>
<span class="c15">.</span>
<br>
IoC containers support eager instantiation, for starting services when
the server starts, and lazy loading of services, for services rarely
used.
<br>
<span class="c15">You can easily add additional services by</span>
<span class="c18"><strong>adding a new constructor</strong></span>
<span class="c15">or</span>
<span class="c18"><strong>setter method</strong></span>
<span class="c15">with little or no extra configuration.</span>
<br>
<span class="c15">Dependency injection is an elegant way to</span>
<span class="c18"><strong>decouple client and services</strong></span>
<span class="c15">.</span>
<br>
<a name="id.2fdc29776aa4" id="id.2fdc29776aa4"></a>
It can be a substitute of the factory classes, singleton classes that
make use of static methods and field variables precluding the use of
inheritance. Factory design pattern is more intrusive because components
or services need to be requested explicitly
<h3 class="western c11" lang="en-GB">
	<strong>JEE Service Locator pattern</strong>
</h3>
<br>
To reduce the lookup complexity of our objects we can use this pattern.
<h3 class="western c11" lang="en-GB">
	<strong>MVC</strong>
</h3>
<br>
MVC promote reuse by factoring out the UI widgetry from the domain
objects. But this still does not address the connection of the domain to
the outside world.
<h4 class="western c13" lang="en-GB">
	<em><strong>Principle used</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Definition</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>When to use</strong></em>
</h4>
<br>
<h4 class="western c58" lang="en-GB">How it is implemented</h4>
<br>
<h3 class="western c11" lang="en-GB">
	<strong>State (linked to Strategy)</strong>
</h3>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Principle used</strong></em>
</h4>
<br>
<span class="c18"><strong>composition</strong></span>
<span class="c15">and</span>
<span class="c18"><strong>delegation</strong></span>
<h4 class="western c13" lang="en-GB">
	<em><strong>Definition</strong></em>
</h4>
<br>
<span class="c18"><strong>Encapsulates</strong></span>
<span class="c15">state-based behaviours and</span>
<span class="c18"><strong>uses delegation</strong></span>
<span class="c15">to switch between the different behaviours in
	different states. This allows an object to alter its behaviour when its
	internal state changes. The object appear to change its class by
	delegating a different State object which reimplement the all
	state-based behaviours.</span>
<h4 class="western c13" lang="en-GB">
	<em><strong>When to use</strong></em>
</h4>
<br>
It is used in State Machine and substitute conditional code.
<h4 class="western c13" lang="en-GB">
	<em><strong>How it is implemented</strong></em>
</h4>
<br>
<strong>Concrete Context:</strong>
<p class="western c20" lang="en-GB">
	<span class="c15">has a number of</span> <span class="c24"><em><span
			class="c23">internal states behaviours</span></em></span><span class="c15">.</span>
</p>
<p class="western c20" lang="en-GB">
	<span class="c15">The implementation of the internal states
		behaviours is delegated to the</span> <span class="c18"><strong>State
			interface</strong></span>
</p>
<p class="western c20" lang="en-GB">
	<span class="c15">an instance variable keep track of the</span> <span
		class="c24"><em class="c34"><span class="c23">context&acirc;&#8364;&#8482;s
				current state</span></em></span>
</p>
<strong>State interface:</strong>
<p class="western c17" lang="en-GB">Define the set of internal
	states behaviours</p>
<p class="western c20" lang="en-GB">
	<span class="c15">is implemented by all the</span> <span class="c18"><strong>concrete
			states</strong></span>
</p>
<strong>Concrete States:</strong>
<p class="western c20" lang="en-GB">
	<span class="c15">each concrete state appropriately implements
		the</span> <span class="c18"><strong>State interface</strong></span><span
		class="c15">&acirc;&#8364;&#8482;s behaviours</span>
</p>
<p class="western c20" lang="en-GB">
	<a name="id.f8f587b5fafa" id="id.f8f587b5fafa"></a> <span class="c15">use
		the</span> <span class="c18"><strong>concrete Context</strong></span> <span
		class="c15">to set the</span> <span class="c24"><em class="c34"><span
			class="c23">context&acirc;&#8364;&#8482;s current state</span></em></span> <span
		class="c15">with a reference to the next sibling concrete State</span>
</p>
<h3 class="western c11" lang="en-GB">
	<strong>Strategy (linked to State)</strong>
</h3>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Principle used</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>Definition</strong></em>
</h4>
<br>
<h4 class="western c13" lang="en-GB">
	<em><strong>When to use</strong></em>
</h4>
<br>
Instead of inheriting behaviours
<br>
<em><strong>How it is implemented</strong></em>

<aside>
	<p>Resouces:</p>
	<ul>
		<li><a href="http://www.oodesign.com/">oodesign.com/</a></li>
		<li><a href="http://www.dofactory.com/Patterns/Patterns.aspx">dofactory.com</a></li>
		<li><a href="http://googletesting.blogspot.com/2008/07/breaking-law-of-demeter-is-like-looking.html">Breaking the Law of Demeter is Like Looking for a Needle in the Haystack</a></li>
	</ul>
</aside>


<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
