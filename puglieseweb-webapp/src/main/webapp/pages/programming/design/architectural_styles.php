<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>

<article>
	<header>
		<time class="updated" datetime="2011-10-31 11:11:03-0400" pubdate>31-10-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<h2>Architectural Styles</h2>
		<p>SOAP and REST are two important Software architectures and
			Richardson Maturity Model helps to identify them.</p>
	</header>
	<section>
		<header>
			<h3>Richardson maturity model</h3>
			<p>This is a measurement of how closely a system embrace
				different pieces of Web Technology:</p>
			<ul>
				<li>
					<p>Information resources,</p>
				</li>
				<li>
					<p>HTTP as an application protocol,</p>
				</li>
				<li>
					<p>Hypermedia as the medium of control.</p>
				</li>
			</ul>
		</header>
		<section>
			<h4>Levels</h4>
			<p>There are 4 levels:</p>
			<dl>
				<dt>Level 0</dt>
				<dd>
					<p>This is basically where SOAP is.</p>
					<ul>
						<li>There are no information resources</li>
						<li>HTTP is treated like a transport protocol instead of an
							application protocol</li>
						<li>There is no concept of hypermedia.</li>
					</ul>
				</dd>
				<dt>Level 1</dt>
				<dd>
					<ul>
						<li>URLs are used, but not always as appropriate information
							resources and everything is usually a GET request (including
							requests that update server state)</li>
						<li>There is no concept of hypermedia.</li>
					</ul>
				</dd>
				<dt>Level 2</dt>
				<dd>
					<p>This is where most Internet-facing REST web services are
						because they only support non-hypermedia formats.</p>
					<ul>
						<li>URLs are used to represent information resources</li>
						<li>HTTP is respected as an application protocol sometimes
							including content negotiation</li>
						<li>There is no concept of hypermedia.</li>
					</ul>

				</dd>
				<dt>Lever 3</dt>
				<dd>
					<ul>
						<li>URLs are used to represent information resources.</li>
						<li>HTTP is respected as an application protocol including
							content negotiation.</li>
						<li>Hypermedia drivers the interactions for clients.</li>
					</ul>
				</dd>
			</dl>
			<aside>
				<p>Key words: Application protocol VS Transport protocol;</p>
			</aside>
		</section>
	</section>
	<section>

		<h3>SOAP</h3>
		<p>Originally defined as a Simple Object Access Protocol, it is a
			protocol specification for exchanging structured information in the
			implementation of Web Services in computer networks.</p>
		<p>SOAP is best leveraged when the lifecycle of a request cannot
			be maintained in the scope of a single transaction because of
			technological, organizational or procedural complications.</p>
		<p>It relies on XML for its message format, and usually relies on
			other Application Layer protocols, most notably RPC and HTTP, for
			message negotiation and transmission.</p>
		<p>SOAP can form the foundation layer of a web services protocol
			stack, providing a basic messaging framework upon which web services
			can be built. This XML based protocol consists of three parts:</p>
		<ul>
			<li>an envelope, which defines what is in the message and how to
				process it</li>
			<li>a set of encoding rules for expressing instances of
				application-defined datatypes</li>
			<li>and a convention for representing procedure calls and
				responses.</li>
		</ul>
		<p class="western c10" lang="en-GB">
			<br> <br>
		</p>
	</section>
	<section>
		<h3>RESTful service</h3>
		<p>REST stand for Representational State Transfer, and it is an
			architectural style. It helps to create well-designed scalable
			distributed application resilient to change.</p>
		<p>REST uses:</p>
		<ul>
			<li>identification of resources</li>
			<li>manipulation of resources through representations</li>
			<li>self-descriptive messages</li>
			<li>hypermedia as the engine of application state.</li>
		</ul>

		<p>Conforming to the REST constraints is referred to as being
			RESTful.</p>
		<p>REST is not limited to the HTTP protocol. RESTful architectures
			can be based on other Application Layer protocols if they already
			provide a rich and uniform vocabulary for application based on the
			transfer of meaningful representational state.</p>
		<p>RESTful applications maximize the use of the pre-existing,
			well-defined interfaces. In HTTP REST utilizes these existing
			features of the HTTP protocol to allows caching and security
			enforcement.</p>

		<p>
			<b>MORE_ABOUT</b> Application Layer (see <a
				href="http://homepages.uel.ac.uk/u0110988/page2.htm">http://homepages.uel.ac.uk/u0110988/page2.htm</a>)
		</p>

		<p class="western c10" lang="en-GB">Rest defines how pieces of the
			Web Technology should be used.</p>
		<p>In specific we have:</p>
		<ul>
			<li><p>URL should be used to represent name of resources of
					information. For instance resolving the URL we can obtain</p>
				<ul>
					<li>the actual resource</li>
					<li>a reference to information about a particular resource</li>
					<li>the result of a servlet computation.</li>
				</ul>

				<dl>
					<dt>Content negotiation</dt>
					<dd>
						<p>
							It is a HTTP ability by which you can ask for information in
							different forms (e.g.
							<code>curl -H "Accept:application/json"
								http://puglieseweb.com</code>
							.)
						</p>
						<p>Note that there is a separation of the name of the name
							representing the resource and its form the information is
							returned.</p>
					</dd>
				</dl></li>

			<li>HTTP should be used as an application protocol instead of a
				general transport protocol</li>
			<li>non-hypermedia or hypermedia formats used as the medium of
				control.</li>
		</ul>
		<dl>
			<dt>Information resources are manipulated by four 4 HTTP verbs
				(or methods)</dt>
			<dd>
				This four HTTP methods act on the represented named resources and
				REST defines explicitly and clearly their specific behaviours.

				<p>This allows the clients to be self-empowered to make
					decisions in the face of network interruptions and failure (e.g. If
					a client is interrupted while it is making a GET request, it should
					be empowered to issue it again.)</p>
			</dd>
			<dt>Each request contains enough state to answer the request</dt>
			<dd>This is an important aspect of RESTful request that allows
				for the conditions of visibility and statelessness on the server.</dd>
		</dl>

		<p>REST approach clearly distinguish between:</p>

		<dl>
			<dt>GET</dt>
			<dd>
				<p>Actions which make no change and thus may be cached or
					repeated (GET).</p>
				<p class="western c16" lang="en-GB">
					<span class="c15">That implies that GET should be a (1)</span> <span
						class="c18"><strong>Saferequest</strong></span><span class="c15">==&gt;
						do not modify anything on the server side. GET request transfers
						representations of named resources</span> <span class="c18"><strong>from
							a server to a client</strong></span><span class="c15">. The client gets
						back a bytestream tagged with metadata that indicates how the
						client should interpret it. GET are also intended to be (2)</span> <span
						class="c18"><strong>idempotent</strong></span><span class="c15">:
						issuing a request more than once will have no consequences.</span>
				</p>

				<p class="western c20" lang="en-GB">
					<span class="c15">actions which</span> <span class="c18"><strong>make
							a change but may be casually repeated</strong></span> <span class="c15">without
						problems</span> <span class="c15">(PUT, DELETE)</span>
				</p>
			</dd>
			<dt>PUT</dt>
			<dd>
				<p>PUT is not supported by HTML forms. PUT is idempotent. It is
					used when the client has a URL reference to an existing resource
					and wishes to update it changing the state of the application.</p>
			</dd>
			<dd>
				<p>PUT can be used to create a resource if the client is able to
					predict the resource's identity. This happen in the case the client
					is in control of the server side information spaces. Publishing
					into a user's weblog space is a typical example of PUTing to a
					user-specified name.</p>
			</dd>
			<dt>DELETE</dt>
			<dd>
				<p>DELETE verb is typically used for information spaces we
					control. PUT is intended to be idempotent. We should build requests
					by failing silently and returning a 200 even if it has already been
					deleted.</p>
			</dd>
			<dt>POST</dt>
			<dd>
				actions which should neither be repeated nor cached.
				<p>
					We have a a <strong>side effect</strong> each time POST is
					executed.
				</p>
				<p>POST is neither safe nor idempotent.</p>
				<p>POST is used when the client cannot predict the identity of
					the resource it is requesting (for example if we want to create a
					new resource). So we POST a representation of the resource to
					handle (e.g. selvlet)</p>
			</dd>
			<dd>
				<p class="western c10" lang="en-GB">
					When we POST a new resource, upon successful processing, from the
					server we should return a 201 HTTP response code with a <strong>Location
						header</strong> indication the location of the newly created resource (not)
					the short 200 HTTP response and the body of the created resource).
					It can avoid a second request, but it conflates GET and SET and
					complicate the caching of the resource.
				</p>
			</dd>
			<dd>
				<p>POST can be used to append (a partial update) new item in an
					order or a cart</p>
			</dd>
			<dd>
				<p>POST can be used to submit queries either as a representation
					of a query or URL-encoded form values. In this case it is usually
					fair to return results directly from this kind of a POST since
					there is no identity association with the query.</p>
			</dd>
		</dl>
		<p>This in turn enables intermediate software (be it in the form
			of libraries, reusable components, or entirely separate systems)to
			implement sensible optimisation and error-handling strategies without
			needing knowledge of the contentor relationships of the resources</p>
		<section>

			<p>REST is best used to manage systems by decoupling the
				information that is produced and consumed from the technologies that
				do so.</p>
			<p>It is possible to achieve the architectural properties of:</p>
			<dl>
				<dt>Statelessness</dt>
				<dd>
					<ul>
						<li>Every request is totally isolated from other requests</li>
						<li>The server does not know about the client previous
							operations</li>
						<li>The application state is stored on the client.</li>
					</ul>
					<p>This in turn enables intermediate software (be it in the
						form of libraries, reusable components, or entirely separate
						systems) to implement sensible optimisation and error-handling
						strategies without needing knowledge of the content or
						relationships of the resources.</p>
				</dd>

				<dt>Addressability</dt>
				<dd>
					<p>Every interesting aspect of the application dataset is
						exposed by URI.</p>
					<p>Addressability can also help in caching for better
						performance.</p>

					<a href="http://www.google.com/search?q=java">
						http://www.google.com/search?q=java</a>
				</dd>
			</dl>
		</section>
	</section>
</article>

<article>
	<header>
		<h3>Create RESTful URLs</h3>
		<section>

			<p>General principles for good URI design:</p>

			<ul>
				<li><strong>Don't</strong> use query parameters to alter state</li>
				<li><strong>Don't</strong> use mixed-case paths if you can help
					it; lowercase is best</li>
				<li><strong>Don't</strong> use implementation-specific
					extensions in your URIs (.php, .py, .pl, etc.)</li>
				<li><strong>Don't</strong> fall into RPC with your URIs</li>
				<li><strong>Do</strong> limit your URI space as much as
					possible</li>
				<li><strong>Do</strong> keep path segments short</li>
				<li><strong>Do</strong> prefer either <code>/resource</code> or
					<code>/resource/</code>; create 301 redirects from the one you
					don't use</li>
				<li><strong>Do</strong> use query parameters for sub-selection
					of a resource; i.e. pagination, search queries</li>
				<li><strong>Do</strong> move stuff out of the URI that should
					be in an HTTP header or a body</li>
			</ul>

			<p>(Note: I did not say "RESTful URI design"; URIs are
				essentially opaque in REST.)</p>

			<p>General principles for HTTP method choice:</p>

			<ul>
				<li><strong>Don't</strong> ever use GET to alter state; this is
					a great way to have the Googlebot ruin your day</li>
				<li><strong>Don't</strong> use PUT unless you are updating an
					entire resource</li>
				<li><strong>Don't</strong> use PUT unless you can also
					legitimately do a GET on the same URI</li>
				<li><strong>Don't</strong> use POST to retrieve information
					that is long-lived or that might be reasonable to cache</li>
				<li><strong>Don't</strong> perform an operation that is not
					idempotent with PUT</li>
				<li><strong>Do</strong> use GET for as much as possible</li>
				<li><strong>Do</strong> use POST in preference to PUT when in
					doubt</li>
				<li><strong>Do</strong> use POST whenever you have to do
					something that feels RPC-like</li>
				<li><strong>Do</strong> use PUT for classes of resources that
					are larger or hierarchical</li>
				<li><strong>Do</strong> use DELETE in preference to POST to
					remove resources</li>
				<li><strong>Do</strong> use GET for things like calculations,
					unless your input is large, in which case use POST</li>
			</ul>

			<p>General principles of web service design with HTTP:</p>

			<ul>
				<li><strong>Don't</strong> put metadata in the body of a
					response that should be in a header</li>
				<li><strong>Don't</strong> put metadata in a separate resource
					unless including it would create significant overhead</li>
				<li><strong>Do</strong> use the appropriate status code
					<ul>
						<li><code>201 Created</code> after creating a resource;
							resource <strong>must</strong> exist at the time the response is
							sent</li>
						<li><code>202 Accepted</code> after performing an operation
							successfully or creating a resource asynchronously</li>
						<li><code>400 Bad Request</code> when someone does an
							operation on data that's clearly bogus; for your application this
							could be a validation error; generally reserve 500 for uncaught
							exceptions</li>
						<li><code>403 Forbidden</code> when someone accesses your API
							in a way that might be malicious or if they aren't authorized</li>
						<li><code>405 Method Not Allowed</code> when someone uses
							POST when they should have used PUT, etc</li>
						<li><code>413 Request Entity Too Large</code> when someone
							does something like ask for your entire database</li>
						<li><code>418 I'm a teapot</code> <a
							href="http://tools.ietf.org/html/rfc2324#section-2.3.2"
							rel="nofollow">when attempting to brew coffee with a teapot</a></li>
					</ul></li>
				<li><strong>Do</strong> use caching headers whenever you can
					<ul>
						<li><code>ETag</code> headers are good when you can easily
							reduce a resource to a hash value</li>
						<li><code>Last-Modified</code> should indicate to you that
							keeping around a timestamp of when resources are updated is a
							good idea</li>
						<li><code>Cache-Control</code> and <code>Expires</code>
							should be given sensible values</li>
					</ul></li>
				<li><strong>Do</strong> everything you can to honor caching
					headers in a request (<code>If-None-Modified</code>, <code>If-Modified-Since</code>)</li>
				<li><strong>Do</strong> use redirects when they make sense, but
					these should be rare for a web service</li>
			</ul>

			<p>
				With regard to your specific question, POST should be used for #4
				and #5. These operations fall under the "RPC-like" guideline above.
				For #5, remember that POST does not necessarily have to use
				<code>Content-Type: application/x-www-form-urlencoded</code>
				. This could just as easily be a JSON or CSV payload.
			</p>

		</section>
	</header>



</article>


<article>
	<h3>REST VS CRUD</h3>
	<div class="c8">
		<ol start="2">
			<li>
				<p>Def: A side effect can be a change in the database</p>
				<div class="c8">
					<ol>
						<li>
							<h4 class="western c35" lang="en-GB">
								<span class="c24"><em><strong>REST put</strong></em></span> <span
									class="c24"><em><strong>VS</strong></em></span> <span
									class="c24"><em><strong>CRUD UPDATE</strong></em></span><span
									class="c15">(implies a side effect)</span>
							</h4>
						</li>
					</ol>
				</div>
			</li>
		</ol>
	</div>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">Put supplies a
			resource to an URI:</span>
	</p>
	<ul>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">invalid</span> <span class="c15">URI</span> <span
					class="c15">==&gt; put fails</span>
			</p>
		</li>
		<li>
			<p class="western c17" lang="en-GB">URI contains no resources
				==&gt; resources is placed there;</p>
		</li>
		<li>
			<p class="western c17" lang="en-GB">URI contains different
				resources ==&gt; resources is replaced.</p>
		</li>
		<li>
			<p class="western c17" lang="en-GB">URI contains the same
				resources ==&gt; no apparent change</p>
		</li>
	</ul>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">UPDATE ==&gt; update</span>
		<span class="c18"><strong>existing</strong></span><span class="c15">records
			in a database</span>
	</p>
	<div class="c14">
		<ol start="2">
			<li>
				<h4 class="western c35" lang="en-GB">
					<span class="c24"><em><strong>REST </strong></em></span><span
						class="c24"><em><strong>post</strong></em></span><span class="c24"><em><strong></strong></em></span>
					<span class="c24"><em><strong>VS</strong></em></span> <span
						class="c24"><em><strong>CRUD </strong></em></span><span
						class="c24"><em><strong>CREATE</strong></em></span><span
						class="c24"><em><strong></strong></em></span><span class="c15">(implies
						a side effect)</span>
				</h4>
			</li>
		</ol>
	</div>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">post: ==&gt;
			resource change or side effect each time it is executed</span>
	</p>
	<p class="western c45" lang="en-GB">
		<span class="c18"><strong>examples:</strong></span><span class="c15">1)
			Sending an email; 2) post implemented by either SQL INSERT or SQL
			UPDATE that modify the value)</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">CREATE:</span>
	</p>
	<ul>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c18"><strong>explicitly</strong></span> <span
					class="c15">creates a</span> <span class="c18"><strong>new</strong></span>
				<span class="c15">resource , and</span>
			</p>
		</li>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">is</span> <span class="c18"><strong>undefined</strong></span>
				<span class="c15">if that resource</span> <span class="c18"><strong>already
						exists</strong></span><span class="c15">.</span>
			</p>
		</li>
	</ul>
	<p class="western c3" lang="en-GB">
		<strong>Right approach rules:</strong>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">The following approach has the big advantage
			that the impact of an</span> <span class="c18"><strong>accidental
				re-post</strong></span><span class="c15">is minimised. In a well designed
			system, the creating of a new URI could be as low-impact as
			incrementing an integer, only requiring</span> <span class="c18"><strong>storage
				of resource data</strong></span><span class="c15">if/when it is later</span> <span
			class="c18"><strong>populated using put</strong></span><span
			class="c15">.</span>
	</p>
	<ol>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c24"><em><span class="c23">a post
							should be simple and quick, leaving the way for future changes
							using put as soon as possible</span></em></span><span class="c15">.</span>
			</p>
		</li>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">For example,</span> <span class="c18"><strong>to
						create and populate a new resource in REST</strong></span> <span class="c15">it
					is typical to</span>
			</p>
		</li>
	</ol>
	<ul>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">call </span><span class="c18"><strong>post</strong></span><span
					class="c15"> on some parent resource</span> <span class="c15">which
					results in the</span>
			</p>
		</li>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">return of, or redirect to, a new (empty)
					URI</span><span class="c15">, and then</span>
			</p>
		</li>
	</ul>
	<ul>
		<li>
			<p class="western c20" lang="en-GB">
				<span class="c15">populate the URI with one or more</span> <span
					class="c15"></span><span class="c18"><strong>put</strong></span><span
					class="c15"> operations</span><span class="c15">.</span>
			</p>
		</li>
	</ul>
	<div class="c14">
		<ol start="3">
			<li>
				<h4 class="western c35" lang="en-GB">
					<span class="c24"><em><strong>REST get</strong></em></span> <span
						class="c24"><em><strong>VS</strong></em></span> <span class="c24"><em><strong>CRUD
								read</strong></em></span>
				</h4>
			</li>
		</ol>
	</div>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">get: fetches a</span> <span
			class="c18"><strong>single</strong></span><span class="c15">resource
			(ex. Loading an image)</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">read: return a set
			of records form a database (SELECT operation)</span>
	</p>
	<div class="c14">
		<ol start="4">
			<li>
				<h4 class="western c35" lang="en-GB">
					<span class="c24"><em><strong>REST delete</strong></em></span> <span
						class="c24"><em><strong>VS</strong></em></span> <span class="c24"><em><strong>CRUD
								DELETE</strong></em></span>
				</h4>
			</li>
		</ol>
	</div>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">delete: simple
			delete of a resource at a</span> <span class="c18"><strong>single</strong></span><span
			class="c15">URI</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c24"></span><span class="c15">DELETE: ability to
			do</span> <span class="c18"><strong>complex</strong></span><span class="c15">deletes
			on a database</span>
	</p>
	<p class="western c10" lang="en-GB">
		<br> <br>
	</p>
	<p class="western c10" lang="en-GB">Resources:</p>
	<p class="western c16" lang="en-GB">
		<span class="c33" lang="zxx"><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">
				<span class="c15">http</span>
		</a></span><span class="c19" lang="zxx"><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">://</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">blog</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">.</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">punchbarrel</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">.</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">com</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">/2008/10/31/</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">rest</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">is</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">not</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">crud</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">and</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">heres</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">-</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">why</a><a
			href="http://blog.punchbarrel.com/2008/10/31/rest-is-not-crud-and-heres-why/">/</a></span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">form</span><span
			class="c15">id</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"quick-search"</span></em></span><span class="c15">method</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"</span></em></span><span class="c24"><em><strong>get</strong></em></span><span
			class="c24"><em><span class="c23">"</span></em></span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">fieldset</span><span
			class="c15">class</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"search"</span></em></span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">label</span><span
			class="c15">for</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"qsearch"</span></em></span><span class="c15">&gt;</span><span
			class="c15">Search:</span><span class="c15">&lt;/</span><span
			class="c15">label</span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">input</span><span
			class="c15">class</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"tbox"</span></em></span><span class="c15">id</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"search"</span></em></span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">type</span><span class="c15">=</span><span
			class="c24"><em><span class="c23">"text"</span></em></span><span
			class="c15">name</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"qsearch"</span></em></span><span class="c15">value</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"Search..."</span></em></span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">title</span><span class="c15">=</span><span
			class="c24"><em><span class="c23">"Start typing
					and hit ENTER"</span></em></span><span class="c15">/&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">button</span><span
			class="c15">type</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"submit"</span></em></span><span class="c15">class</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"btn"</span></em></span><span class="c15">title</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"Submit Search"</span></em></span><span class="c15">&gt;</span><span
			class="c15">Search</span><span class="c15">&lt;/</span><span
			class="c15">button</span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;/</span><span class="c15">fieldset</span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;/</span><span class="c15">form</span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c10" lang="en-GB">
		<br> <br>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">form</span><span
			class="c15">action</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"/_ah/plugin/form/send"</span></em></span><span class="c15">method</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"</span></em></span><span class="c24"><em><strong>POST</strong></em></span><span
			class="c24"><em><span class="c23">"</span></em></span><span
			class="c15">id</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"form-feedback"</span></em></span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">input</span><span
			class="c15">type</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"hidden"</span></em></span><span class="c15">value</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"feedback"</span></em></span><span class="c15">name</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"form-name"</span></em></span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">label</span><span
			class="c15">&gt;</span><span class="c15">Name</span><span class="c15">&lt;/</span><span
			class="c15">label</span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">input</span><span
			class="c15">type</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"text"</span></em></span><span class="c15">size</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"20"</span></em></span><span class="c15">value</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">""</span></em></span><span class="c15">name</span><span class="c15">=</span><span
			class="c24"><em><span class="c23">"name"</span></em></span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">label</span><span
			class="c15">&gt;</span><span class="c15">Email</span><span
			class="c15">&lt;/</span><span class="c15">label</span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">input</span><span
			class="c15">type</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"text"</span></em></span><span class="c15">size</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"20"</span></em></span><span class="c15">value</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">""</span></em></span><span class="c15">name</span><span class="c15">=</span><span
			class="c24"><em><span class="c23">"email"</span></em></span><span
			class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">label</span><span
			class="c15">&gt;</span><span class="c15">Message</span><span
			class="c15">&lt;/</span><span class="c15">label</span><span
			class="c15">&gt;Introduction to the Build Lifecycle</span>
	</p>
	<p class="western c10" lang="en-GB">
		<br> <br>
	</p>
	<p class="western c10" lang="en-GB">The Maven Release Plugin</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">textarea</span><span
			class="c15">cols</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"60"</span></em></span><span class="c15">rows</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"10"</span></em></span><span class="c15">name</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"message"</span></em></span><span class="c15">&gt;&lt;/</span><span
			class="c15">textarea</span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;</span><span class="c15">input</span><span
			class="c15">type</span><span class="c15">=</span><span class="c24"><em><span
				class="c23">"submit"</span></em></span><span class="c15">value</span><span
			class="c15">=</span><span class="c24"><em><span
				class="c23">"Send"</span></em></span><span class="c15">&gt;</span>
	</p>
	<p class="western c16" lang="en-GB">
		<span class="c15">&lt;/</span><span class="c15">form</span><span
			class="c15">&gt;</span>
	</p>

	<article>
		<div class="c8">
			<ol start="3">
				<li>
					<h2 class="western c7" lang="en-GB">
						<strong>REST or RPC?</strong>
					</h2>
				</li>
			</ol>
		</div>
		<p class="western c10" lang="en-GB">
			I was wondering if one choses AutoBean with JSON (instead of
			RequestFactory) to achieve higher loose coupling in a RESTful
			architecture (to completely decouple client and server), what would
			be the downside to this approach ? <br> <br> <br>
			AutoBean/Editor/EntityProxy/ServiceLayer/EntityChangeEvent <br>
			<br> JSON/REST vs EntityProxy/RequestFactory <br> <br>
			and how AutoBean fits into all this. <br> <br> Thank you
			for the hard work.
		</p>
		<p class="western c10" lang="en-GB">
			<br> <br>
		</p>
		<ul>
			<li>
				<p>
					Common Fallacies: <a
						href="http://en.wikipedia.org/wiki/Fallacies_of_Distributed_Computing">
						http://en.wikipedia.org/wiki/Fallacies_of_Distributed_Computing</a>
				</p>
			</li>
		</ul>
	</article>
	<aside>
		<b>Resources:</b>
		<ul>
			<li><a
				href="http://docs.google.com/gview?url=http://puglieseweb.com/resources/pdf/rc129-010d-rest_1.pdf"
				target="_black">REST RefCard (pdf)</a>
			<li><a
				href="http://developers.sun.com/identity/reference/techart/restwebservices.html">Securing
					REST Web Services With OAuth</a></li>
			<li><a
				href="http://stackoverflow.com/questions/1619152/how-to-create-rest-urls-without-verbs">http://stackoverflow.com/questions/1619152/how-to-create-rest-urls-without-verbs</a></li>
		</ul>
	</aside>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>