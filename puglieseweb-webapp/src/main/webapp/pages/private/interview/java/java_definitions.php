<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>


<h1>Technical preparation</h1>
<h2>Java</h2>
<h3>Basics</h3>
<a
	href="http://www.cloudsopedia.com/interviewquestions/corejava/java-fundamentals.php">Referece</a>

<dl>
	<!-- ================================================================== -->

	<dt>Why OOPL?</dt>
	<dd>The Object Oriented Programming Languages directly represent the
	real life objects like Car, Jeep, Account, Customer etc. The features
	of the OO programming languages like polymorphism, inheritance and
	encapsulation make it powerful. The key benefits are:
	<ul>
		<li><strong>Re-use </strong>of previous work: using implementation
		inheritance and object composition.</li>
		<li><strong>Real mapping to the problem domain</strong>: Objects map
		to real world and represent vehicles, customers, products etc: with
		encapsulation.</li>
		<li><strong>Modular Architecture</strong>: Objects, systems,
		frameworks etc are the building blocks of larger systems.</li>
		<li>The <strong>increased quality and reduced development time</strong>
		are the by-products of the key benefits discussed above. If 90% of the
		new application consists of proven existing components then only the
		remaining 10% of the code have to be tested from scratch.</li>
	</ul>
	</dd>

	<!-- ================================================================== -->

	<dt>Inheritance</dt>
	<dd>One of the main Object Oriented principles.</dd>
	<dd>
	<p>The term <strong>inheritance</strong> refers to a situation in which
	attributes and/or behaviors are passed on from one object to another.</p>
	</dd>
	<dd>Inheritance is the inclusion of behavior (i.e. methods) and state
	(i.e. variables) of a base class in a derived class so that they are
	accessible in that derived class.</dd>
	<dd>
	<p>There are 2 main types of inheritance:</p>
	<ul>
		<li><strong>Implementation inheritance (class inheritance)</strong>:
		extend an application's functionality by reusing functionality in the
		parent class.</li>
		<li><strong>Interface inheritance</strong>: Interfaces provide a
		mechanism for specifying a relationship between otherwise unrelated
		classes.</li>
	</ul>
	</dd>

	<!-- ================================================================== -->

	<dt>Subclassing (compile-time inheritance)</dt>
	<dd><a
		href="http://searchsoa.techtarget.com/answer/Differences-between-compile-time-and-run-time-inheritance">Resource</a>
	</dd>
	<dd>
	<p>When Inheritance occurs at compile-time, it is usually called <strong>subclassing</strong>
	since one class, the child, is lower than the parent in the inheritance
	hierarchy. The Java programming language reserves the keyword <strong>extends</strong>
	for <strong>compile-time inheritance</strong>.</p>
	</dd>

	<!-- ================================================================== -->

	<dt>Delegation (run-time inheritance)</dt>
	<dd><a href="http://en.wikipedia.org/wiki/Delegation_(programming)">Resource</a></dd>

	<dd>Delegation is the language feature that supports <strong>prototype-based
	programming</strong>.</dd>

	<dd>In its original usage, delegation refers to one object relying upon
	another to provide a specified set of functionalities. In research,
	this is often referred to as consultation or as <strong>aggregation</strong>
	in modeling.</dd>

	<dd>Delegation is dependent upon dynamic binding, as it requires that a
	given method call can invoke different segments of code at runtime.</dd>

	<dd><b>Advantages</b>:
	<p>Delegation has the advantage that it can take place at run-time and
	affect only a subset of entities of some type and can even be removed
	at run-time.</p>

	<p><strong>Inheritance</strong> on the other hand typically targets the
	type rather than the instances and is restricted to compile time. On
	the other hand, inheritance can be statically type-checked while <span
		class="underline">delegation generally cannot without generics </span>.
	</p>
	</dd>

	<dd>
	<p>Delegation can be termed "run-time inheritance for specific
	objects".</p>
	</dd>

	<dd>Delegation is the simple yet powerful concept of handing a task
	over to another part of the program.It describes the situation where
	one object defers a task to another object.</dd>

	<dd>
	<p>In C#, a delegate is a way of telling which method to call when an
	event is triggered. For example, if you click a Button on a form, the
	program would call a specific method. It is this pointer which is a
	delegate. Delegates are good because you can notify several methods
	that an event has occurred, if you so wish</p>
	</dd>
	<!-- ================================================================== -->
	<dt>Polymorphism</dt>

	<dd>One of the main Object Oriented principle is polymorphism.</dd>

	<dd>It is programming language feature where we send a message to an
	object and even though we don't know what specific type which is
	implenented the right thing happens.</dd>

	<dd>It the ability for <strong>subclasses</strong> to respond
	differently than their superclass to a similar method call. That is, <strong>subclasses
	can have a different behaviour</strong>.</dd>
	<dd><b>Example:</b>
	<p>et's assume we have got an ArrayList of Shapes, and Shape being
	superclass of Triangle and Circle objects. <br />
	Now, we randomly bucket our Shape ArrayList with Triangle and Circle
	objects.</p>
	<p>Later we want to know what is the total area of the Geometric
	figures in the array. We just Iterate the ArrayList calling the Shape
	Calc Area method, which is implanted differently in the subclasses and
	the right algorithms are executed.</p>
	</dd>

	<!-- ================================================================== -->


	<dt>Composition</dt>
	<dd>The dynamic binding is used to implement polymorphism by
	programming to an interface (to a superclass)</dd>

	<!-- ================================================================== -->

	<dt>Encapsulation</dt>
	<dd>
	<p>Refers to keeping all the related members (variables and methods)
	together in an object.</p>
	<p>That is encapsulation is important for security and integrity.</p>
	</dd>

	<!-- ================================================================== -->

	<dt>Aliasing</dt>
	<dd>
	<p>Aliasing means that more than one handle (more than instance
	variable refering to the same external object) is tied to the same
	object, as in the above example</p>
	</dd>
	<dd>
	<p><strong>Aliasing</strong> breaks encapsulation by sharing references
	to mutable objects. Accidental aliasing can couple unrelated parts of a
	system so it behaves mysteriously and is inflexible to change.</p>
	<p>To maintain encapsulation:</p>
	<ul>
		<li>define immutable value types</li>
		<li>avoid global variables</li>
		<li>avoid singletons</li>
		<li>copy collection and mutable values when passing them between
		objects and so on.</li>
	</ul>
	</dd>

	<!-- ================================================================== -->

	<dt>Information hiding</dt>
	<dd>In combination with <strong>access control specifiers</strong>
	encapsulation hides the underlying implementation of a class.</dd>
	<dd>One of the main Object Oriented principle. Ensures that the
	behaviour of an object can only be affected through its API (improves
	code modularity). It lets us control how much a change to one object
	will impact other parts of the system by ensuring that there are no
	unexpected dependencies between unrelated components.</dd>

	<dd>Conceals how an object implements its functionality behind the
	abstraction of its API. It lets us work with higher abstractions by
	ignoring lower-level details that are unrelated to the task at hand.</dd>

	<!-- ================================================================== -->


	<dt>Overriding</dt>
	<dd>
	<p>At <strong>compile time</strong>, the compiler looks at reference
	types (the superclasses) to decide whether you can call a particular
	method on that reference.</p>
	<p>At <strong>runtime</strong>, the JVM looks not at the reference type
	(the superclass), but at the actual inherited object on the heap. After
	the compiler has approved a particular method we have to fulfil the
	contract represented by the method defined in the reference type.
	
	</dd>

	<dd>Overriding we override a method from a superclass, and agree to
	fulfill the contract of the superclass. The methods are the contract.
	This implies that:
	<ul>
		<li>arguments must be the same</li>
		<li>return types must be compatible</li>
		<li>The method cannot be less accessible</li>
	</ul>
	</dd>
	<!-- ================================================================== -->

	<dt>Overloading</dt>
	<dd>It is a different method that happens to have the same method name,
	but different signature (argument list. It has nothing to do with
	inheritance and polymorphism. We are free to change the return types as
	long as the argument list are different.</dd>

	<!-- ================================================================== -->

	<dt>Instance variable (non-static fields)</dt>
	<dd>Non-static fields are also known as instance variables because
	their values are unique to each instance of a class (to each object, in
	other words)</dd>
	<dt>Class variables (static fields)</dt>
	<dd>
	<p>Fields that have the static modifier in their declaration. They are
	associated with the class, rather than with andy object.</p>
	<p>Class variable can also be manipulated withouut creating an instance
	of the class.</p>
	<p>Class variable are referenced by the class name itself.</p>
	</dd>

	<!-- ================================================================== -->

	<dt>Class methods</dt>
	<dd>
	<p>The Java programming language supports static methods as well as
	static variables. Static methods, which have the static modifier in
	their declarations, should be invoked with the class name, without the
	need for creating an instance of the class.</p>
	<p>Class methods cannot access instance variables or instance methods
	directly—they must use an object reference. Also, class methods cannot
	use the this keyword as there is no instance for this to refer to.</p>
	</dd>

	<!-- ================================================================== -->
	<dt>Primitive data types</dt>
	<dd>There are eight primitive data types
	<ol>
		<li>boolean (1 bit)</li>
		<li>byte (1 byte)</li>
		<li>short (2 bytes)</li>
		<li>char (2 bytes) (the only unsigned)</li>
		<li>int (4 bytes)</li>
		<li>float (4 bytes)</li>
		<li>long (8 bytes)</li>
		<li>double (8 bytes)</li>
	</ol>
	</dd>

	<!-- ================================================================== -->

	<dt>Object's methods</dt>
	<dd>
	<ol>
		<li>protected Object clone()</li>
		<li>boolean equals(Object obj)</li>
		<li>protected void finalize()</li>
		<li>Class getClass()</li>
		<li>int hashCode()</li>
		<li>void notify()</li>
		<li>void notifyAll()</li>
		<li>String toString()</li>
		<li>void wait()</li>
		<li>void wait(long timeout)</li>
		<li>void wait(long timeout, int nanos)</li>
	</ol>
	</dd>
	<dt>differences between String, StingBuilder and StringBuffer</dt>
	<dd>String objects are immutable. Once constructed they cannot be
	changed anymore.</dd>
	<dd>StringBuffer is syncronized.</dd>
	<dd>StringBuilder is like StringBuffer, but not syncronized.</dd>

	<dt>Marker interface in java</dt>
	<dd>
	<ul>
		<li>Serializable</li>
		<li>RandomAccess
		<p>Marker interface used by List implementations to indicate that they
		support fast (generally constant time) random access. The primary
		purpose of this interface is to allow generic algorithms to alter
		their behavior to provide good performance when applied to either
		random or sequential access lists.</p>
		<p>As a rule of thumb, a List implementation should implement this
		interface if, for typical instances of the class, this loop:</p>

		<pre>
		<code>
		for (int i=0, n=list.size(); i < n; i++)
			list.get(i);
		</code>
		 </pre>
		<p>runs faster than this loop:</p>
		<pre>
		<code>
		for (Iterator i=list.iterator(); i.hasNext(); )
			i.next();
		</code>
	</pre></li>
	</ul>
	</dd>
	<!-- ================================================================== -->
	<dt>Can an Inner Class access to local variables?</dt>
	<dd>Yes. If they are declared final</dd>
	<!-- ================================================================== -->
	<dt>How to declare a constant in Java</dt>
	<dd>By declaring an instance variable as <code>static final</code></dd>

</dl>
<h3>Java Web Applications</h3>
<dl>
	<!-- ================================================================== -->
	<dt>What are WEB-INF and META-INF directories?</dt>
	<dd>
	<p>META-INF is related to .jar files and contains:</p>

	<ul>
		<li>
		<p>the <strong>manifest</strong> (list of contents) of a jar and are
		created when you write a .jar.</p>
		<p>Then when you unpack it, the directory appears.</p>
		</li>
		<li>You should (in theory) be able to safely delete your META-INF
		directory and content from an installed web application.</li>
	</ul>
	</dd>
	<dd>
	<p>The WEB-INF directory is a vital component of your web application,
	which will not run without it!</p>
	<p><strong>WEB-INF</strong>directory contains:</p>
	<ul>
		<li>heirarcy in which you'll find the necessary configuration
		information for your web application and</li>
		<li>all the class files for your servlets and classes that are called
		up by your JSPs (Java Server Pages).</li>
	</ul>
	</dd>
	<dt>What is Metadata?</dt>
	<dd>Metadata describes other data. It provides information about a
	certain item's content.
	<p>For example:</p>
	<ul>
		<li>
		<p class="western c17" lang="en-GB">an image may include metadata that
		describes how large the picture is, the colour, depth, the image
		resolution, when the image was created, and other data.</p>
		</li>
		<li>
		<p class="western c17" lang="en-GB">A text
		document&acirc;&#8364;&#8482;s metadata may contain information about
		how long the document was written, and a short summary of the
		document.</p>
		</li>
		<li>
		<p class="western c20" lang="en-GB"><span class="c15">Web pages often
		include</span> <span class="c18"><strong>metadata</strong></span> <span
			class="c15">in the form of</span> <span class="c18"><strong>meta tags</strong></span><span
			class="c15">. Description and keywords meta tags are commonly used to
		describe the Web page&acirc;&#8364;&#8482;s content. Most search
		engines use this data when adding pages to their search index.</span></p>
		</li>
	</ul>
	</dd>
	<ol start="10">
		<li>
		<h3 class="western c11" lang="en-GB"><strong>What exposure have you
		had to REST and XML for back-end communications?</strong></h3>
		</li>
	</ol>
	</div>
	<p class="western c10" lang="en-GB">//TODO</p>
	<div class="c12">
	<ol start="11">
		<li>
		<h3 class="western c11" lang="en-GB"><strong>Where variables and
		object lives?</strong></h3>
		</li>
	</ol>
	</div>
	<p class="western c16" lang="en-GB"><span class="c15">Variables can be
	(object)</span> <span class="c18"><strong>references variables</strong></span>
	<span class="c15">- non-primitive types - or</span> <span class="c18"><strong>primitive

	variables.</strong></span> <span class="c15">These two type of
	variables can be declared as:</span></p>
	<ul>
		<li>
		<p class="western c20" lang="en-GB"><span class="c18"><strong>instance</strong></span>
		<span class="c18"><strong>variables</strong></span> <span class="c15">(inside
		a</span> <span class="c18"><strong>class</strong></span><span
			class="c15">, outside a method)</span> <span class="c15">:</span></p>
		</li>
		<li>
		<p class="western c17" lang="en-GB">Can be filled with different
		values for each instance of the class</p>
		</li>
		<li>
		<p class="western c20" lang="en-GB"><span class="c18"><strong>live on
		the Heap</strong></span><span class="c15">, inside the object they
		belong to.</span></p>
		</li>
		<li>
		<p class="western c17" lang="en-GB">Java has to make space for all the
		instance variable values (Note that the value of a reference variable
		is the address to the object, not the whole object)</p>
		</li>
		<li>
		<p class="western c20" lang="en-GB"><span class="c18"><strong>local</strong></span>
		<span class="c18"><strong>variables</strong></span> <span class="c15">(inside
		a</span> <span class="c18"><strong>method</strong></span><span
			class="c15">, or inside a</span> <span class="c18"><strong>method
		parameter</strong></span><span class="c15">):</span></p>
		</li>
		<li>
		<p class="western c20" lang="en-GB"><span class="c18"><strong>live on
		the Stack</strong></span><span class="c15">, in the frame
		corresponding to the method where the variables are declared.</span></p>
		</li>
	</ul>
	<p class="western c16" lang="en-GB"><a name="id.422394de16ec"
		id="id.422394de16ec"></a> <span class="c18"><strong>Object reference
	variables</strong></span><span class="c15">works like</span> <span
		class="c18"><strong>primitive variables</strong></span><span
		class="c15">: if the reference is declared as a local variable, it
	goes on the stack;</span></p>
	<div class="c8">

</dl>
<h3>Concurrency</h3>
<dl>

	<!-- ================================================================== -->

	<dt>Difference between wait() and sleep()</dt>
	<dd>
	<ul>
		<li>wait() is an object-specific method</li>
		<li>sleep() is a Thread-specific method</li>
		<li>The wait() method suspends the current thread of execution</li>
	</ul>
	</dd>

	<!-- ================================================================== -->

	<dt>wait()</dt>
	<dd>This method causes the current thread to stop processing until some
	other thread invokes notify() or notifyAll() and it can resume
	processing.</dd>

	<!-- ================================================================== -->

	<dt>Why wait() and notify() are object-specific methods?</dt>
	<dd>
	<p>The main mathod run in a Thread.</p>
	<p>And we can create different Threads of execution.</p>
	<p>But we might want to invoke wait() from a class that extends Thread,
	from a class that implements Runnable, or from a class that does
	neither. So where can the methods wait, notify, and notifyAll go such
	that all three of these cases will have access to them?
	java.lang.Object.</p>
	</dd>

	<!-- ================================================================== -->

	<dt>notify()</dt>
	<dd>notify() tells the JVM to wake up one of the suspended threads
	associated with the object. In Java, there is no standard as to which
	thread gets woken up first, but with most multi-threaded systems the
	object's "thread wait list" or "thread pool" is a FIFO (First In First
	Out). Use notifyAll() to wake up all threads in the object's thread
	wait list pool thing</dd>

	<!-- ================================================================== -->

	<dt>Multitasking OS</dt>
	<dd>Ability to switch the CPU from one process to another.</dd>
	<dd>Each independent task is driven by a <strong>thread of execution</strong>.</dd>

	<!-- ================================================================== -->

	<dt>Process</dt>
	<dd>A self-contained program running within its own address space.</dd>

	<!-- ================================================================== -->

	<dt>Thread</dt>
	<dd>Single sequential flow of control within a process. A thread drives
	a task.</dd>

	<!-- ================================================================== -->

	<dt>Task</dt>
	<dd>A task is described by providing the Runnuble interface. It is
	driven by a thread of execution.</dd>

	<dd>
	<table>
		<thead>
			<tr>
				<td></td>
				<th>Processes</th>
				<th>Threads</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Communication</th>
				<td>Networking</td>
				<td>
				<ul>
					<li>primitives</li>
					<li>sharing remote spaces</li>
				</ul>
				</td>
			</tr>
			<tr>
				<th>Memory Areas</th>
				<td>
				<ul>
					<li>Heap</li>
					<li>Stack</li>
				</ul>
				</td>
				<td>
				<ul>
					<li>No Heap</li>
					<li>Can access the local processor Stack</li>
				</ul>
				</td>
			</tr>
			<tr>
				<th>Typical problems</th>
				<td>
				<p>No particular problems</p>
				</td>
				<td>
				<ul>
					<li>Deadlock</li>
					<li>Starvation</li>
					<li>Livelock</li>
					<li>(race condition)</li>
				</ul>
				</td>
			</tr>
		</tbody>
	</table>
	</dd>
	<!-- ================================================================== -->

	<dt>Concurrent System</dt>
	<dd>Like the one used in Java share resources like memory and I/O. We
	need to coordinate the use of threes resources between different
	thread-driven tasks.</dd>
	<dt>Preemptive</dt>
	<dd>A cheduling mechanism provides time slices for each thread,
	periodically interrupting a thread and context switching to another
	thread so that each one is given a reasonable amount of time to drive
	its task.</dd>
</dl>
<h3>My project</h3>
<dl>
	<!-- ================================================================== -->
	Why GWT? According to Google Java is the language that gives us the
	best productivity to build web applications. We can use all the
	ecosystem that revolves around java, Language, IDE. Java has a typed
	language (Static Code Analysis code cannot be overriden ==> if declare
	a variable as a String it will be a string for everybody ==> Fewer
	Bugs, Faster Code) By Ajax web application we can give users the best
	web experience. GWT bridges together the Java Modeland the web platform
	GWT cross browser compiler we can update portionated text. The hart of
	GWT is the compiler: it takes our java code and compile it into
	javascript code. By GWT Deferred Bindingthe user can download just an
	optimized versions of compiled javascript code adapt to his browser.
	GWT is a pluggable Architecture GWT avoid single HTTP round trips DNS
	lookup ==> 1 HTTP round trips (4 ms) ==> whatâ€™s the IP? Setup the
	TCP/IP ==> round trip ==> establishing the connection with the IP make
	a HTTP connectin ==> 3 roud trip ==> ==> reduction of Latency reduce
	the n of HTTP round trips ==> save a huge amount of time. 10 images ==>
	GWT calculate the check-sum of all images and combine it 1 bundled
	image name.cache.png ==> as soon as the check-sum change a new cacheble
	file is create ==> after the first fetching of the resources the
	application is very fast History just works ==> the hacks that AJAX
	discovered is the hash-fragment internationalization, accessibility GWT
	2.0 has to mode: Development Mode (Hosted Mode ==> running the original
	code the plugin provide a webserver and a Code Server, which interact
	with eclipse ) Production Mode (running compiled code ) Test suits;
	Logging Design: EventBus, MVP, embrace asynchrony (sometime the server
	is not over there and our UI should keep be responsive. UiBinder ==>
	Separation MVP ==> the essence of MVP to put almost all the logic on
	the presenter and make the view and the model (a pojo object) extremely
	simple ==> you just create a mock object for the model (setter,getter)
	and a mock object for the view (setter,getter) and test our presenter
	spead and performance are essential differing pice of functionality
	that are not necessary. I started my own project and I need In my app I
	use GWT which is a coponent-based, event driven framework. In this
	architecture there is: well-respected GUI architecture for GUI
	application composed of multiple MVC components no Composition of UI
	Components. That is, one MVC Components will never contain another. For
	example, if two Widgets need to be shown at the same time, they will be
	siblings in the same parent container â€“ at the Application Level.
	This is achieved by adding an extra layer, the Application Layer which
	is implemented as an ApplicationController class. NOTE_ The application
	layer provides the interface to the communications environment which is
	used by the application process. It is responsible for communicating
	application process parameters. An Application Layerprovides
	application related communication capabilities. These capabilities are
	defined by a protocol in a very similar manner to that used to specify
	a service provided by the layer bellow. The protocol may specify direct
	use of presentation layer services and or those provided by other ASEs.
	The grouping of user process ( or application entity), relevant ASEs,
	and interfaces between them is known as an application process. The
	application layer uses a decoupled event-based interfaceto access
	Controllersâ€™ emitted events, and a simple method-invocation interface
	is used when injecting events back into a Controller. Components are
	identified during the UI requirements phase. For example for my
	feedback form.... Components communicate with the outside world only
	through their Controllers Event names and payload data coming from
	Components are converted into Application events, routed to their
	intended destination Component An extra layer - Application layer â€“
	mediates between co-operating components. That is, components are
	decoupled from each other. Application Layer (or Service Layer): It
	does not contain business rules or knowledge, but only coordinates
	tasks and delegates work to collaborations of domain objects in the
	next layer down. It does not have state reflecting the business
	situation, but it can have state that reflects the progress of a task
	for the user or the program Domain Layer (or Model Layer): Responsible
	for representing concepts of the business, information about the
	business situation, and business rules. State that reflects the
	business situation is controlled and used here, even though the
	technical details of storing it are delegated to the infrastructure.
	This layer is the heart of business software. The key point here is
	that the Service Layer is thin - all the key logic lies in the domain
	layer GWTâ€™s RequestFactory component, introduced in GWT 2.1 added the
	following: A service layer, which includes support for non-static
	service objects Value object support Multiple methods calls on a single
	request

	<!-- ================================================================== -->

	<dt>Domain object model</dt>
	<dd>(Martin fowler anti-pattern)
	<ul>
		<li><a href="http://www.martinfowler.com/bliki/AnemicDomainModel.html">Anemic</a></li>
		<li><a href="http://www.martinfowler.com/bliki/AnemicDomainModel.html">object</a></li>
		<li><a href="http://www.martinfowler.com/bliki/AnemicDomainModel.html">model</a></li>
	</ul>
	</dd>
	<dd>Domain object models deprive and object of behaviours.</dd>
	<dd>
	<p>This is a domain-specific representation of the information on which
	the application operates.</p>
	<p>This layer is the heart of business software. These objects are
	connected with the rich relationships and structure that true domain
	models have.</p>
	<p class="western c10" lang="en-GB">design rules that say that you are
	not to put any domain logic in the domain objects. Instead there are a
	set of service objects which capture all the domain logic. These
	services live on top of the domain model and use the domain model for
	data.</p>
	<p class="western c16" lang="en-GB"><span class="c15">using layering to
	separate</span> <span class="c18"><strong>domain logic</strong></span><span
		class="c15">from such things as</span> <span class="c18"><strong>persistence</strong></span><span
		class="c15">and</span> <span class="c18"><strong>presentation</strong></span><span
		class="c15">responsibilities.</span></p>
	<p class="western c16" lang="en-GB"><span class="c15">The logic that
	should be in a domain object is</span> <span class="c18"><strong>domain
	logic - validations, calculations, business rules</strong></span><span
		class="c15">- whatever you like to call it.</span></p>
	</dd>
</dl>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
