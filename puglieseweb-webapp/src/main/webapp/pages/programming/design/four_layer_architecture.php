<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>
<aside>
	<b>Aside:</b>
	<ul><li><a href="http://blog.8thlight.com/uncle-bob/2011/11/22/Clean-Architecture.html">Clean-Architecture - Uncle Bob</a></li></ul>
</aside>

<article>
	<header>
		<h2>Four layers architecture</h2>
		<p>Architectural Decisions are all about trade-off referring to a
			specific context.</p>
		<p>A Four Layers architecture address the connection of the domain
			to the outside world(i.e., object persistency mechanisms, network
			protocol, etc).</p>
		<p>We factor our application classes into:</p>
		<ol>
			<li>The Presentation layer. Where the physical windows and
				widgets live. Any new user interface widgets are put in this layer.
				For example, the GWT Views live on this layer.</li>
			<li>The Application or Service layer. <em>Mediate between</em>
				the various <em>user interface components</em> an <em>translate
					the messages</em> into messages understood by the objects in the <strong>Domain
					Model.</strong>
			</li>
			<li>The Domain Model layer. Here reside all objects found in an
				<em>OO analysis</em> and design. These are the appropriate objects
				that solve our problem domain (domain objectare potentially
				available for reuse.)&nbsp;
			</li>
			<li>The Infrastructure layer. Objects that represent connections
				to entities outside the application. For example the Persistence
				layer connect to an underlining DBMS.</li>
		</ol>
	</header>
	<section>
		<h3>Service Layers</h3>
		<p>Service Layer defines an application&#39;s boundary with a
			layer of services that establishes a set of available operations and
			coordinates the application&#39;s response in each operation.</p>
		<p>A Service Layer defines an application&#39;s boundary [Cockburn
			PloP] and its set of available operations from the perspective of
			interfacing client layers.
		<p>
			It encapsulates the <strong>application&#39;s business logic</strong>,















		<ul>
			<li>controlling <strong>transactions</strong> and
			</li>
			<li>coordinating responses in the implementation of its
				operations.</li>
		</ul>
		</p>
		<img src="../../../resources/img/Interview2010_html_49981708.png"
			name="graphics4" id="graphics4" alt="image need to be commented "
			height="338" width="475" border="0" />
		</p>
		<p>
			Service Layer is a pattern for organizing business logic. Many
			designers like to divide <strong>business logic</strong> into two
			kinds:
		</p>
		<ul>
			<li>domain logic. Having to do purely with the problem domain
				(such as strategies for calculating revenue recognition on a
				contract), and&nbsp;</li>
			<li>application logic. Having to do with application
				responsibilities. Application logic is sometimes referred to as <em>workflow
					logic</em>.
			</li>
		</ul>
		<p>Service Layer can be implemented in different way:</p>
		<h4>Implementation Variations</h4>
		<p>
			The two basic implementation variations are the <strong>domain
				facade approach</strong> and the <strong>operation script approach</strong>.
			<br />
		</p>
		<p>
			In the <strong>domain facade approach</strong> a Service Layer is
			implemented as a set of thin facades over a Domain Model (116). The
			classes implementing the facades don&#39;t implement any business
			logic. Rather, the Domain Model (116) implements all of the busi-ness
			logic. The thin facades establish a boundary and set of operations
			through which client layers interact with the application, exhibiting
			the defining characteristics of Service Layer.
		</p>
		<p>
			In the <strong>operation script approach</strong> a Service Layer is
			implemented as a set of thicker classes that directly implement <strong>application
				logic</strong> but delegate to encapsulated domain object classes for domain
			logic. The operations available to clients of a Service Layer are
			implemented as scripts, organized several to a class defining a
			subject area of related logic. Each such class forms an application
			â€œser-
		</p>
		<p>vice,â€ and itâ€™s common for service type names to end with
			â€œService.â€ A Service</p>
		<p>Layer is comprised of these application service classes, which
			should extend a</p>
		<p>Layer Supertype (475), abstracting their responsibilities and
			common behaviors.</p>
		<p>To Remote or Not to Remote The interface of a Service Layer
			class is coarse</p>
		<p>grained almost by definition, since it declares a set of
			application operations</p>
		<p>available to interfacing client layers. Therefore, Service
			Layer classes are well</p>
		<p>suited to remote invocation from an interface granularity
			perspective.</p>
		<p>However, remote invocation comes at the cost of dealing with
			object distri-</p>
		<p>bution. It likely entails a lot of extra work to make your
			Service Layer method</p>
		<p>signatures deal in Data Transfer Objects (401). Donâ€™t
			underestimate the cost of</p>
		<p>this work, especially if you have a complex Domain Model (116)
			and rich edit-</p>
		<p>ing UIs for complex update use cases! Itâ€™s significant, and
			itâ€™s painfulâ€”perhaps</p>
		<p>second only to the cost and pain of object-relational mapping.
			Remember the</p>
		<p>First Law of Distributed Object Design (page 89).</p>
		<p>My advice is to start with a locally invocable Service Layer
			whose method</p>
		<p>signatures deal in domain objects. Add remotability when you
			need it (if ever)</p>
		<p>by putting Remote Facades (388) on your Service Layer or having
			your Service</p>
		<p>Layer objects implement remote interfaces. If your application
			has a Web-based</p>
		<p>UI or a Web-services-based integration gateway, thereâ€™s no
			law that says your</p>
		<p>business logic has to run in a separate process from your
			server pages and Web</p>
		<p>services. In fact, you can save yourself some development
			effort and runtime</p>
		<p>response time, without sacrificing scalability, by starting out
			with a colocated</p>
		<p>approach.</p>
		<p>Identifying Services and Operations Identifying the operations
			needed on a Ser-</p>
		<p>vice Layer boundary is pretty straightforward. Theyâ€™re
			determined by the needs</p>
		<p>of Service Layer clients, the most significant (and first) of
			which is typically a</p>
		<p>user interface. Since a user interface is designed to support
			the use cases that</p>
		<p>actors want to perform with an application, the starting point
			for identifying</p>
		<p>Service Layer operations is the use case model and the user
			interface design for</p>
		<p>the application.</p>
		<p>Disappointing as it is, many of the use cases in an enterprise
			application</p>
		<p>are fairly boring â€œCRUDâ€ (create, read, update, delete) use
			cases on domain</p>
		<p>objectsâ€”create one of these, read a collection of those,
			update this other thing. My experience is that thereâ€™s almost
			always a one-to-one correspon-</p>
		<p>dence between CRUD use cases and Service Layer operations.</p>
		<p>The applicationâ€™s responsibilities in carrying out these use
			cases, however,</p>
		<p>may be anything but boring. Validation aside, the creation,
			update, or deletion</p>
		<p>of a domain object in an application increasingly requires
			notification of other</p>
		<p>people and other integrated applications. These responses must
			be coordinated,</p>
		<p>and transacted atomically, by Service Layer operations.</p>
		<p>If only it were as straightforward to identify Service Layer
			abstractions to</p>
		<p>group related operations. There are no hard-and-fast
			prescriptions in this area;</p>
		<p>only vague heuristics. For a sufficiently small application, it
			may suffice to have</p>
		<p>but one abstraction, named after the application itself. In my
			experience larger</p>
		<p>applications are partitioned into several â€œsubsystems,â€ each
			of which includes a</p>
		<p>complete vertical slice through the stack of architecture
			layers. In this case I prefer</p>
		<p>one abstraction per subsystem, named after the subsystem. Other
			possibilities</p>
		<p>include abstractions reflecting major partitions in a domain
			model, if these are</p>
		<p>different from the subsystem partitions (e.g.,
			ContractsService, ProductsService), and</p>
		<p>abstractions named after thematic application behaviors (e.g.,
			RecognitionService).</p>
		<p>Java Implementation</p>
		<p>In both the domain facade approach and the operation script
			approach, a</p>
		<p>Service Layer class can be implemented as either a POJO (plain
			old Java</p>
		<p>object) or a stateless session bean. The trade-off pits ease of
			testing against</p>
		<p>ease of transaction control. POJOs might be easier to test,
			since they donâ€™t</p>
		<p>have to be deployed in an EJB container to run, but itâ€™s
			harder for a POJO</p>
		<p>Service Layer to hook into distributed container-managed
			transaction ser-</p>
		<p>vices, especially in interservice invocations. EJBs, on the
			other hand, come</p>
		<p>with the potential for container-managed distributed
			transactions but have</p>
		<p>to be deployed in a container before they can be tested and
			run. Choose</p>
		<p>your poison.</p>
		<p>My preferred way of applying a Service Layer in J2EE is with
			EJB 2.0</p>
		<p>stateless session beans, using local interfaces, and the
			operation script</p>
		<p>approach, delegating to POJO domain object classes. Itâ€™s just
			so darned con-</p>
		<p>venient to implement a Service Layer using stateless session
			bean, because of</p>
		<p>the distributed container-managed transactions provided by EJB.
			Also, with</p>
		<p>the local interfaces introduced in EJB 2.0, a Service Layer can
			exploit the</p>
		<p>valuable transaction services while avoiding the thorny object
			distribution</p>
		<p>issues.</p>
		<p>On a related Java-specific note, let me differentiate Service
			Layer from</p>
		<p>the Session Facade pattern documented in the J2EE patterns
			literature</p>
		<p>[Alur et al.] and [Marinescu]. Session Facade was motivated by
			the desire to avoid the performance penalty of too many remote
			invocations on entity</p>
		<p>beans; it therefore prescribes facading entity beans with
			session beans. Ser-</p>
		<p>vice Layer is motivated instead by factoring responsibility to
			avoid duplica-</p>
		<p>tion and promote reusability; itâ€™s an architecture pattern
			that transcends</p>
		<p>technology. In fact, the application boundary pattern [Cockburn
			PloP] that</p>
		<p>inspired Service Layer predates EJB by three years. Session
			Facade may be</p>
		<p>in the spirit of Service Layer but, as currently named, scoped,
			and presented,</p>
		<p>is not the same.</p>
		<p>When to Use It</p>
		<p>The benefit of Service Layer is that it defines a common set of
			application oper-</p>
		<p>ations available to many kinds of clients and it coordinates an
			applicationâ€™s</p>
		<p>response in each operation. The response may involve
			application logic that</p>
		<p>needs to be transacted atomically across multiple transactional
			resources. Thus,</p>
		<p>in an application with more than one kind of client of its
			business logic, and</p>
		<p>complex responses in its use cases involving multiple
			transactional resources, it</p>
		<p>makes a lot of sense to include a Service Layer with
			container-managed transac-</p>
		<p>tions, even in an undistributed architecture.</p>
		<p>The easier question to answer is probably when not to use it.
			You probably</p>
		<p>donâ€™t need a Service Layer if your applicationâ€™s business
			logic will only have one</p>
		<p>kind of clientâ€”say, a user interfaceâ€”and its use case
			responses donâ€™t involve</p>
		<p>multiple transactional resources. In this case your Page
			Controllers can manu-</p>
		<p>ally control transactions and coordinate whatever response is
			required, perhaps</p>
		<p>delegating directly to the Data Source layer.</p>
		<p>But as soon as you envision a second kind of client, or a
			second transactional</p>
		<p>resource in use case responses, it pays to design in a Service
			Layer from the</p>
		<p>beginning.</p>
	</section>
	<section>
		<h3>DTO: Data transfer object or Value Object</h3>
		<p>References: http://martinfowler.com/bliki/LocalDTO.html</p>
		<p>DTO is a design pattern used to transfer data.</p>
		<p>
			DTOs have only behaviour (accessors and mutators) <strong>for
				storage and retrieval of its own data</strong>.
		</p>
	</section>
	<section>
		<p>
			DTOs are used to encapsulate the data between the <strong>Service
				Layer</strong>and the <strong>Presentation Layer</strong>
		</p>
		<p>
			<strong>Different uses:</strong>
		</p>
		<ul>
			<li>
				<p>
					A good use of (Remote) DTOs is to <strong>transfer data</strong> in
					expensive <strong>remote calls</strong>. They are part of
					implementing a <strong>coarse grained interface</strong> which a
					remote interface needs for performance.
				</p>
			</li>
		</ul>
		<ul>
			<li>
				<p>
					A potentially bad use of (Local) DTOs is to use them <strong>as
						part of a Service Layer API</strong> although this ensure that service
					layer clients aren&#39;t dependent upon an underlying Domain Model.
					As matter of fact there is a painful <strong>cost of data
						mapping</strong> perhaps second only to the cost of ORM. In this use case a
					proxy is created when you add a new Controller (or service!)
					reference will contain all of the DTO types. Presentation Layer can
					take DTOs and map them to very specific DTO&#39;s for each
					Page/Control concern.
				</p>
			</li>
		</ul>
		<p>
			We <strong>do you not need them in a local context</strong> (to
			transfer data between software application subsystems) because they
			are actually harmful:
		</p>
		<ul>
			<li>
				<p>a coarse-grained API is more difficult to use</p>
			</li>
			<li>
				<p>you have to do all the work moving data from your domain or
					data source layer into the DTOs</p>
			</li>
			<li>
				<p>
					A good use of (Local) DTOs is where it is when you have a <strong>significant
						mismatch between</strong> the <strong>model in your</strong> <strong>presentation
						layer</strong> and the underlying <strong>domain model</strong>. In this
					case i<strong>t makes sense to make presentation specific
						facade/gateway that maps from the domain</strong> model and presents an
					interface that&#39;s convenient for the presentation. It fits in
					nicely with <a
						href="http://martinfowler.com/eaaDev/PresentationModel.html">
						Presentation</a> <a
						href="http://martinfowler.com/eaaDev/PresentationModel.html">
						Model</a>.
				</p>
			</li>
			<li>
				<p>
					A !!!! use of (Local) DTOs as part of the <strong>presentation
						layer</strong> if they are view-specific. It should really be the
					controller&#39;s job to ensure that the View only gets from the
					Model what it needs â€“ for example, a value-object with just the
					fields needed by the view.
				</p>
			</li>
			<li>
				<p>
					A good use of (Local) DTOs is to <strong>communicate
						between isolates in multi-threaded applications</strong>. A good way to
					handle multi-threading is to partition your application into
					isolated areas where each area has only one thread running over it.
					This eliminates the needs for concurrency controls within that
					area. If you need to communicate between these isolated areas, then
					use a message queue with DTOs as messages to transfer the
					information.
				</p>
			</li>
		</ul>
		<p>In DDD approach it is best to have your infrastructure projects
			(such as a web-platform-specific UI) referencing your domain objects
			than vice versa.</p>
		<p>With this approach our web project have a direct dependency on
			the project, having our rich domain objects depending on your web
			project.</p>
		<p>
			<br /> <br />
		</p>
		<p>DTOs in conjunction with DAOs are often used to retrieve data
			from a database.</p>
		<p>In a traditional EJB architecture, DTOs serve dual purposes:</p>
		<ul>
			<li>
				<p>
					<strong>DTO are serializable</strong>;
				</p>
			</li>
			<li>
				<p>
					<a name="id.f4a385a2fde5" id="id.f4a385a2fde5"></a> <strong>implicitly
						define an assembly phase</strong> where all data to be used by the view are
					fetched and marshalled into the DTOs before returning control to
					the presentation tier.&nbsp;
				</p>
			</li>
		</ul>
		<br />
	</section>
	<section>
		<h3>Domain Model Layer</h3>
		<p>A domain model in problem solving and software engineering can
			be thought of as a conceptual model of a domain of interest (often
			referred to as a problem domain) which describes the various
			entities, their attributes and relationships, plus the constraints
			that govern the integrity of the model elements comprising that
			problem domain.</p>
		<p>The domain model is created in order to represent the
			vocabulary and key concepts of the problem domain. The domain model
			also identifies the relationships among all the entities within the
			scope of the problem domain, and commonly identifies their
			attributes. A domain model that encapsulates methods within the
			entities is more properly associated with&nbsp;object oriented
			models. The domain model provides a structural view of the domain
			that can be complemented by other dynamic views, such as&nbsp;Use
			Case&nbsp;models.</p>
		<p>
			An important advantage of a domain model is that it describes and
			constrains the scope of the problem domain. The domain model can be
			effectively used to verify and validate the understanding of the
			problem domain among various stakeholders. It is especially helpful
			as a communication tool and a focusing point both amongst the
			different members of the business team as well as between the
			technical and business teams. <br />
		</p>
	</section>
	<section>
		<h3>Business object</h3>
		<p>
			A<strong>business object</strong>is a type of an intelligible
			entitybeing an actorinside the <strong>business layer</strong>.
		</p>
		<p>A business object usually does nothing itself but holds:</p>
		<ul>
			<li>
				<p>attributes: set of instance variables or properties</p>
			</li>
			<li>
				<p>
					associations with other business objects, weaving a map of objects
					representing the <strong>business relationships</strong>
				</p>
			</li>
		</ul>
		<p>Business The DAO pattern and the ActiveRecord pattern are quite
			distinct patterns for data access. The ActiveRecord pattern is
			characterized by a domain model that &quot;knows&quot; it is
			persistent - each entity class has a Save() method on it. In
			contrast, the entire point of the DAO pattern is that the entities do
			not know that they are persistent objects. This maintains a stricter
			separation of concerns. Each pattern has its advantages and
			disadvantages, but to merge the two articles, and lose the
			distinction between the two patterns, makes no sense. Compare Martin
			Fowler&#39;s articles on ActiveRecord[1] and DataMapper[2] (his name
			for DAO)objects separate state from behavior because they are
			communicated across the tiers in a multi-tiered system</p>
		<p>
			Sometimes a <strong>relational entity</strong>can be mapped by a <strong>business
				object</strong> but this is not a rule.
		</p>
		<p>
			Although a <strong>business object</strong>represents an entity, it
			should not be confused with <strong>relational model
				entities (Object relational .</strong> Take as example a relational entity
			like &quot;Customer&quot; which has a &quot;Kind&quot; attribute in
			order to distinguish &quot;Country customers&quot; from &quot;Abroad
			customers&quot;. Because of design needs, maybe this relational
			entity will end in two business objects: &quot;CountryCustomer&quot;
			and &quot;AbroadCustomer&quot;, since everyone will not hold same
			associations. First will be holding fiscal associations while second
			will be associated with taxes and its related duty.
		</p>
		<p>
			An example of Business object would be a concept like
			&quot;Process&quot; having &quot;Identifier&quot;, &quot;Name&quot;,
			&quot;Start date&quot;, &quot;End date&quot; and &quot;Kind&quot;
			attributes and holding an association with the &quot;Employee&quot; (<em>the
				responsible</em>) that started it.
		</p>

		<p>A Domain Model creates a web of interconnected objects, where
			each object represents some meaningful individual, whether as large
			as a corporation or as small as a single line on an order form.</p>

		<p>objects that model the business area youâ€™re working in . A
			Domain Model mingles data and process,</p>
		<p>Basically, there are two styles of Domain Model in the field.</p>

		<p>
			A <strong>simple Domain Model</strong> looks very much like the
			database design with mostly one domain object for each database
			table.
		</p>

		<p>
			A simple Domain Model can use <strong>Active Record</strong>.
		</p>
		<p>Entity beans canâ€™t be re-entrant. That is, if you call out
			from one entity bean into another object, that other object (or any
			object it calls) canâ€™t call back into the first entity bean.</p>
		<p>
			In my application I have pretty modest domain logic and than I used <strong>entity
				beans</strong>to develop a domain model. The entity beans are not re-entrant
			and implement the Active Record pattern.
		</p>

		<p>
			A <strong>rich Domain Model</strong> can look different from the
			data- base design, with inheritance, strategies, and other [Gang of
			Four] patterns, and complex webs of small interconnected objects.
		</p>

		<p>A rich Domain Model is better for more complex logic, but is
			harder to map to the database.</p>
		<p>
			A rich Domain Model requires <strong>Data Mapper</strong>. This will
			help keep your Domain Model independent from the database and is the
			best approach to handle cases where the Domain Model and database
			schema diverge.
		</p>
		<p>A rich Domain often uses re-entrancy.</p>
		<p>
			<br /> <br />
		</p>
		<p>A POJO domain model is easy to put together, is quick to build,
			can run and test out side an EJB container, and is independent of EJB
			.</p>
		<p>
			A common concern with domain logic is <strong>bloated domain
				objects</strong>. For example as you build a screen to manipulate orders
			youâ€™ll notice that some of the order behaviour is only neededonly
			for it. The problem with <strong>separating usage-specific
				behavior</strong>is that it can lead to duplication. Behavior thatâ€™s
			separated from the order is harder to find, so people tend to not see
			it and duplicate it instead . The advice is not to separate
			usage-specific behavior. Put it all in the object thatâ€™s the
			natural fit. Fix the bloating when, and if, it becomes a problem.
			Spring AOP comes in our help.
		</p>
		<p>
			An object model of the domain that incorporates both <strong>behaviour</strong>and
			<strong>data</strong>.
		</p>

		<h3>Business Object implemented as a Anemic Domain Model</h3>

		<p>
			A domain model where business objects <strong>do not have
				behaviour</strong>is called an <strong>Anemic Domain Model</strong>.
		</p>
		<p>
			The <strong>Anemic Domain Model</strong>is a term used to describe
			the use of a software domain model where the <strong>business
				logic</strong>is implemented outside the <strong>domain objects</strong>.
		</p>
		<p>
			<strong>Transaction scripts</strong>, the separated classes where the
			domain logic is implemented, <strong>transform the state of
				the domain objects</strong>.
		</p>
		<p>
			This pattern is encouraged by technologies such as early versions of
			<strong>EJB&#39;s Entity Beans.</strong>
		</p>

		<h3>Domain Model or Transaction Script?</h3>

		<p>
			It all comes down to the complexity of the behaviour in your system.
			If you have complicated and everchanging business rules involving <strong>validation</strong>,
			<strong>calculations</strong>, and <strong>derivations</strong>,
			chances are that youâ€™ll want an object model to handle them.
		</p>
		<p>On the other hand, if you have simple not-null checks and a
			couple of sums to calculate, a Transaction Script is a better bet</p>

		<h3>Domain Model or Table Model?</h3>

		<p>The primary distinction with Domain Model (116) is that, if you
			have many orders, a Domain Model (116) will have one order object per
			order while a Table Module will have one object to handle all orders.</p>
		<p>The key difference is that it has no notion of an identity for
			the objects itâ€™s working with. Thus, if you want to obtain the
			address of an employee, you use a method like an
			EmployeeModule.getAddress(long employeeID). Every time you want to do
			some- thing to a particular employee you have to pass in some kind of
			identity reference.</p>
		<p>
			Domain Models (116) are preferable to Transaction Scripts (110) for
			avoid- ing domain logic duplication and for managing complexity using
			classical design patterns. <br />
		</p>
		<h2>
			Persisting Layer <br />
		</h2>
	</section>
	<section>
		<h3>DAO: Data access object or Data Mapper (Relational Entity)</h3>
		<p>
			It is an ORM entity. Sometimes is useful to implement a Relational
			entity using an <strong>Active Record Pattern</strong>which simplify
			and make easy the use of <strong>CRUD operations</strong> into a
			Datastore
		</p>
		<div>
			<ol start="2">
				<li>
					<h3>
						<strong>Active Record Pattern (Relational entity)</strong>
					</h3>
				</li>
			</ol>
		</div>
		<p>
			Active Record pattern implemented in a full-featured <strong>DAO
				object make it simple to write and read.</strong>
		</p>
		<p>Active Record allows to make a number of configuration
			assumptions, which simplifyconfiguration files and mapping details.</p>
		<p>
			<strong>Active Record Is Primarily Used for CRUD</strong>
		</p>
		<p>
			<strong>Database Transactions. Active Record was</strong>
			specifically designed to make CRUD operations easy to write and
			understand.
		</p>
		<div>
			<ol start="3">
				<li>
					<h3>
						<strong>DAO VS Active Record Pattern</strong>
					</h3>
				</li>
			</ol>
		</div>
		<p>References</p>
		<p>
			<a name="id.5dc2679bba3f" id="id.5dc2679bba3f"></a><a
				name="id.727e4ff654d3" id="id.727e4ff654d3"></a> Compare Martin
			Fowler&#39;s articles on ActiveRecord<a
				href="http://en.wikipedia.org/wiki/Talk:Data_access_object#cite_note-0">[1]</a>&nbsp;and
			DataMapper<a
				href="http://en.wikipedia.org/wiki/Talk:Data_access_object#cite_note-1">[2]</a>&nbsp;(his
			name for DAO)
		</p>

		<p>
			Both patterns <strong>relational entities</strong>that are used for
			data access.
		</p>
		<p>
			The <strong>ActiveRecord</strong>pattern is characterized by a <strong>domain
				model</strong> that <strong>&quot;knows&quot; it is persistent</strong>- each
			entity class has a Save() method on it.
		</p>
		<p>
			In contrast, the entire point of the <strong>DAO</strong>pattern is
			that the <strong>entities do not know that they are
				persistent objects</strong>.
		</p>

		<h3>CRUD</h3>

		<p>
			<strong>CRUD is a description of some generic operations on
				stored data</strong>, with no particular intention of serving as a
			distribution protocol, and thus little or no planning for the
			mitigation of problems such as accidental duplicates, time-outs or
			lost requests.
		</p>
		<p>The following</p>
		<p>examples display the four basic CRUD operations as you would
			see them in most Active Record</p>
		<p>programs:</p>

		<p>newacc = new Account(...);</p>
		<p>newacc.save();</p>
		<p>temp = Account.find(1)//Select the record associated with id of
			1</p>
		<p>temp.username = â€œKevinâ€;</p>
		<p>temp.save();</p>
		<p>
			<strong>Account.destroy_all(1);</strong>
		</p>

		<h3>ORM</h3>

		<p>
			ORM stands for Object-relational mapping. It is a <strong>programming
				technique</strong>for converting data between <strong>mapping
				objects</strong> and <strong>database records.</strong>
		</p>
		<p>
			In ORM <strong>relational databases</strong> <strong>records
				are represented in</strong> <strong>object-based code</strong><strong>by
				simply thinking of:</strong>
		</p>

		<ul>
			<li>

					<strong>database</strong> tables as <strong>classes</strong>,

			</li>
			<li>

					<strong>table</strong> rows as <strong>objects</strong>,

			</li>
			<li>

					<strong>table fields</strong> as object <strong>attributes</strong>.

			</li>
		</ul>

		<p>
			ORM tools provide <strong>data access layer</strong> following the
			active record model. <strong>ORM/active-record model</strong>is a
			popular with web frameworks.
		</p>
		<p>
			ORM has <strong>support for most of all modern database
				systems</strong>, is <strong>platform independent</strong>, we can<strong>learn
				just one API</strong> instead of dealing with various database
		</p>
		<p>implementations.</p>

		<p>Anything you can do with Java objects, such</p>
		<p>as inheritance, overriding of methods also can be done with</p>
		<p>ORM objects.</p>
		<p>
			There are two separate things: <strong>Java objects</strong> and <strong>database
				records</strong>. As such, you sometimes have your <strong>database
				record</strong>in a different <strong>state</strong>or with a different value
			than
		</p>
		<p>
			its corresponding <strong>DAO</strong>and its attributes. This is
			probably most obvious when
		</p>
		<p>you are dealing with data validations. When a data validation
			fails during an attempt to save,</p>
		<p>your DAO object attribute will still have the value assigned by
			your application (which</p>
		<p>fails validation), but your database record will not have been
			updated</p>
		<p>
			<br /> <br />
		</p>
		<p>.</p>
		<div>
			<ol>
				<li>
					<h4>
						<em><strong>Saving</strong></em> <em>new records,</em> <em><strong>updating</strong></em>
						<em>existing ones, or</em>
					</h4>
				</li>
				<li>
					<h4>
						<em>simply</em> <em><strong>accessing data</strong></em>
					</h4>
				</li>
			</ol>
		</div>
		<p>There are three general steps to follow:</p>
		<p>
			<br />
		</p>
		<ol>
			<li>
				<p>
					<strong>Create a mapping object</strong> (either an Active Record
					or an DAO object)
				</p>
			</li>
		</ol>
		<p>
			<br />
		</p>
		<ol start="2">
			<li>
				<p>
					<strong>Manipulate</strong> or <strong>access</strong> the
					attributes of the object.
				</p>
			</li>
		</ol>
		<p>
			<br />
		</p>
		<ol start="3">
			<li>
				<p>
					<strong>Save</strong> the attributes <strong>as a record
						in the database</strong>.
				</p>
			</li>
		</ol>
		<p>
			<br />
		</p>
		<p>
			<br />
		</p>
		<p>
			<strong>Updating data</strong> can be done using the previous steps
			or with
		</p>
		<p>a special update call shown in the following example:</p>
		<p>
			<br /> <br />
		</p>
		<p>Account.update(1, &quot;Username = Kevin&quot;)</p>
		<p>
			<br /> <br />
		</p>
		<p>Itâ€™s important to remember that your changes are not
			reflected</p>
		<p>
			within your database until you make a call to the <strong>save
				method</strong>.
		</p>
		<h4>Creating a mapping Object</h4>
		<p>with a call to the create or new method</p>
		<p>use one of the various find</p>
		<p>
			<strong>methods</strong>
		</p>
		<p>(passing the primary key of the record)</p>
		<h4>Manipulating or Accessing the Attributes of mapping Objects</h4>
		<p>
			<strong>set or get</strong> all of its attributes of the mapping
			object.
		</p>
		<p>
			<a name="id.08f89bb64718" id="id.08f89bb64718"></a> <br /> <br />
		</p>
		<h4>DEF: transparent persistence</h4>
		<ul>
			<li>
				<p>
					Persistence is said to be &quot;orthogonal&quot; or
					&quot;transparent&quot; <strong>when it is implemented as
						an intrinsic property of the execution environment</strong> of a program.
					An orthogonal persistence environment <strong>does not
						require any specific actions by programs running in it to retrieve
						or save their</strong> <strong>state</strong>. The advantage of orthogonal
					persistence environments is <strong>simpler</strong> and <strong>less
						error-prone programs</strong>.
				</p>
			</li>
			<li>
				<p>
					<strong>Non-orthogonal persistence</strong> requires data to be
					written and read to and from storage <strong>using
						specific instructions in a program</strong>, resulting in the use of
					persist as a transitive verb: On completion, the program persists
					the data.
				</p>
			</li>
		</ul>
		<h4>JDO (Java Data Object)</h4>
		<p>
			JDO is a specification of <strong>Java object persistence</strong>.
			One of its features is a transparency of the persistent services to
			the domain model.
		</p>
		<p>JDO are ordinary POJOs which work within a Java SE environment.</p>
		<p>(see â€œJDO &amp; JPAâ€)</p>
		<h4>JPA (Java Persistence API)</h4>
		<p>JPA covers three areas:</p>
		<ul>
			<li>
				<p>the API itself, defined in the javax.persistence package</p>
			</li>
			<li>
				<p>the Java Persistence Query Language (JPQL)</p>
			</li>
			<li>
				<p>object/relational metadata</p>
			</li>
		</ul>
		<p>To compete with JDO the JPA has been &quot;broken out&quot; of
			&quot;EJB3 Core&quot; as new persistent standard.</p>
		<p>
			JPA uses the javax.persistence package. Significantly,
			javax.persistence<strong>will not require an EJB container</strong>,
			and thus will work within a Java SE environment as well, as JDO
			always has.
		</p>
		<p>(see â€œJDO &amp; JPAâ€)</p>
		<p>
			<br /> <br />
		</p>
		<div>
			<h4>JPA &amp; JDO</h4>
		</div>
		<p>
			Object persistence is defined in the external XML metafiles, which
			may have vendor-specific extensions. Vendors provide developers with
			<strong>enhancers</strong>, which modify compiled Java class files so
			they can be transparently persisted.
		</p>
		<p>JPA, however, is an Object-relational mapping standard, while
			JDO is both an Object-relational mapping standard and a transparent
			object persistence standard.</p>
		<p>JDO, from an API point of view, is agnostic to the technology
			of the underlying datastore, whereas JPA is targeted to RDBMS
			datastores (although there are several JPA providers that support
			access to non-relational datastores through the JPA API, such as
			EclipseLink, DataNucleus and ObjectDB).</p>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>