<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php';
?>

<article>
	<header>
		<time class="updated" datetime="2011-10-28 11:11:03-0400" pubdate>28-10-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<hgroup>
			<h2>Scalable System Design</h2>
		</hgroup>
		<p>Building scalable system is becoming a hotter and hotter topic.
			Mainly because more and more people are using computer these days and
			both the transaction volume and their performance expectation has
			grown tremendously.</p>
	</header>
	<section>
		<section>
			<h3>General Principles</h3>
			<section>
				<h4>Scalability</h4>
				<p>Scalability is not equivalent to "Raw Performance."</p>
				<p>Scalability is about reducing the adverse impact due to
					growth on performance, cost, maintainability and many other
					aspects.</p>
				<b>Example:</b>
				<p>Running every components in one box will have higher
					performance when the load is small. But it is not scalable because
					performance drops drastically when the load is increased beyond the
					machine's capacity.</p>
				<aside>
					<p>Key words: load</p>
				</aside>
			</section>
			<section>
				<h4>Dimensionig a system</h4>
				<p>To dimension growth rate of a system we need to understand
					the environmental workload conditions that the system is design for</p>
				<ul>
					<li>Number of users</li>
					<li>Transaction volume</li>
					<li>Data volume Measurement and their target:
						<ul>
							<li>response time</li>
							<li>throughput understand, who is your priority customers</li>
							<li>rank the importance of traffic so you know what to
								sacrifice in case you cannot handle all of them</li>
							<li>scale out and not scale up,</li>
							<li>scale the system horizontally (adding more cheap
								machine), but not vertically (upgrade to a more powerful
								machine)</li>
							<li>etc.</li>
						</ul>
					</li>

					<li>keep your code modular and simple</li>

					<li>The ability to swap out old code and replace with new code
						without worries of breaking other parts of the system allows you
						to experiment different ways of optimization quickly</li>
					<li>Never sacrifice code modularity for any (including
						performance-related) reasons</li>
					<li>Don't guess the bottleneck, measure it.<br /> Bottlenecks
						are slow code which are frequently executed.
					<li>Don't optimize slow code if they are rarely executed</li>
					<li>Write performance unit test so you can collect fine grain
						performance data at the component level</li>
					<li>Setup a performance lab so you can conduct end-to-end
						performance improvement measurement easily</li>
					<li><p>Plan for growth.</p>
						<p>Do regular capacity planning.</p>
						<p>Collect usage statistics, predict the growth rate.</p></li>
				</ul>
			</section>

			<h4>Common Techniques</h4>
			<section>
				<h5>Server Farm (real time access)</h5>

				<p>If there is a large number of independent (potentially
					concurrent) request, then you can use a server farm which is
					basically a set of identically configured machine, frontend by a
					load balancer.</p>
				<p>The application itself need to be stateless so the request
					can be dispatched purely based on load conditions and not other
					factors.</p>
				<p>Incoming requests will be dispatched by the load balancer to
					different machines and hence the workload is spread and shared
					across the servers in the farm.</p>
				<p>The architecture allows horizontal growth so when the
					workload increases, you can just add more server instances into the
					farm.</p>
				<p>This strategy is even more effective when combining with
					Cloud computing as adding more VM instances into the farm is just
					an API call.</p>
			</section>

			<p class="western c64" lang="en-GB">
				<strong>Data Partitioning</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">Spread your data into</span> <span class="c18"><strong>multiple
								DB</strong></span> <span class="c15">so that data access workload can be
							distributed across multiple servers</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c18"><strong>By nature, data is
								stateful</strong></span><span class="c15">. So there must be a
							deterministic mechanism to dispatch data request to the server
							that host the data</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">Data partitioning mechanism also need to
							take into considerations the</span> <span class="c18"><strong>data
								access pattern</strong></span><span class="c15">.</span> <span class="c15">Data
							that need to be accessed together should be staying in the same
							server</span><span class="c15">. A more sophisticated approach
							can migrate data continuously according to data access pattern
							shift.</span>
					</p>
				</li>
				<li>
					<p class="western c17" lang="en-GB">Most distributed key/value
						store do this</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Map / Reduce (Batch Parallel Processing)</strong>
			</p>
			<ul>
				<li>
					<p class="western c17" lang="en-GB">The algorithm itself need
						to be parallelizable. This usually mean the steps of execution
						should be relatively independent of each other.</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">Google's</span> <span class="c19" lang="zxx"><a
							href="http://labs.google.com/papers/mapreduce.html">Map</a><a
							href="http://labs.google.com/papers/mapreduce.html">/</a><a
							href="http://labs.google.com/papers/mapreduce.html">Reduce</a></span> <span
							class="c15">is a good framework for this model. There is
							also an open source Java framework</span> <span class="c33" lang="zxx"><a
							href="http://hadoop.apache.org/core/"><span class="c15">Hadoop</span></a></span>
						<span class="c15">as well.</span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Content Delivery Network (Static Cache)</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">This is common for static media content.
							The idea is to</span> <span class="c18"><strong>create
								many copies of contents</strong></span> <span class="c15">that are</span> <span
							class="c18"><strong>distributed geographically
								across servers</strong></span><span class="c15">.</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">User r</span><span class="c15">equest
							will be routed to the</span> <span class="c18"><strong>server
								replica</strong></span> <span class="c15">with close proxmity</span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Cache Engine (Dynamic Cache)</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">This is a time vs space tradeoff.</span> <span
							class="c18"><strong>Some executions may use the
								same set of input</strong></span> <span class="c15">parameters over and
							over again. Therefore,</span> <span class="c18"><strong>instead
								of redo the same execution for same input parameters, we can
								remember the previous execution's result</strong></span><span class="c15">.</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">This is typically implemented as a</span> <span
							class="c18"><strong>lookup cache</strong></span><span class="c15">.</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c33" lang="zxx"><a
							href="http://www.danga.com/memcached/"><span class="c15">Memcached</span></a></span>
						<span class="c15">and</span> <span class="c33" lang="zxx"><a
							href="http://ehcache.sourceforge.net/"><span class="c15">EHCache</span></a></span>
						<span class="c15">are some of the popular caching packages</span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Resources Pool</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c18"><strong>DBSession</strong></span> <span
							class="c15">and TCP connection are expensive to create, so</span>
						<span class="c18"><strong>reuse them across
								multiple requests</strong></span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Calculate an approximate result</strong>
			</p>
			<ul>
				<li>
					<p class="western c17" lang="en-GB">Instead of calculate an
						accurate answer, see if you can tradeoff some accuracy for speed.</p>
				</li>
				<li>
					<p class="western c17" lang="en-GB">If real life, usually some
						degree of inaccuracy is tolerable</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Filtering at the source</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c18"><strong>Try to do more
								processing upstream</strong></span> <span class="c15">(where data get
							generated) than downstream because it reduce the amount of data
							being propagated</span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Asynchronous Processing (for service calls)</strong>
			</p>
			<ul>
				<li>
					<p class="western c17" lang="en-GB">You make a call which
						returns a result. But you don't need to use the result until at a
						much later stage of your process. Therefore, you don't need to
						wait immediately after making the call., instead you can proceed
						to do other things until you reach the point where you need to use
						the result.</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">In additional,</span> <span class="c15">the</span>
						<span class="c18"><strong>waiting thread is idle
								but consume system resources</strong></span><span class="c15">. For high
							transaction volume, the number of idle threads is (arrival_rate *
							processing_time) which</span> <span class="c18"><strong>can
								be a very big number if the arrival_rate is high</strong></span><span
							class="c15">. The system is running under a very
							ineffective mode</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">The service call in this example is
							better handled using an</span> <span class="c18"><strong>asynchronous
								processing model</strong></span><span class="c15">. This is typically
							done in 2 ways: Callback and Polling</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">In</span> <span class="c18"><strong>callback</strong></span>
						<span class="c15">mode, the caller need to provide a
							response handler when making the call.</span> <span class="c18"><strong>The
								call itself will return immediately</strong></span> <span class="c15">before
							the actually work is done at the server side. When the work is
							done later,</span> <span class="c18"><strong>response
								will be coming back as a separate thread</strong></span> <span class="c15">which
							will</span> <span class="c18"><strong>execute the
								previous registered response handler</strong></span><span class="c15">.
							Some kind of co-ordination may be required between the calling
							thread and the callback thread.</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">In</span> <span class="c18"><strong>polling</strong></span>
						<span class="c15">mode, the call itself will return a
							"future" handle immediately.</span> <span class="c18"><strong>The
								caller can go off doing other things and later poll the "future"
								handle to see if the response if ready</strong></span><span class="c15">.
							In this model, there is</span> <span class="c18"><strong>no
								extra thread being created</strong></span> <span class="c15">so no extra
							thread co-ordination is needed.</span>
					</p>
				</li>
			</ul>
			<p class="western c64" lang="en-GB">
				<strong>Implementation design considerations</strong>
			</p>
			<ul>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">Use efficient algorithms and data
							structure. Analyze the time (CPU) and space (memory) complexity
							for logic that are execute frequently (ie: hot spots). For
							example,</span> <span class="c18"><strong>carefully
								decide if hash table or binary tree should be use for lookup.</strong></span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c15">Analyze your concurrent access scenarios
							when multiple threads accessing shared data. Carefully analyze
							the synchronization scenario and make sure the locking is
							fine-grain enough. Also watch for any possibility of deadlock
							situation and how you detect or prevent them. A wrong concurrent
							access model can have huge impact in your system's scalability.
							Also consider using</span> <span class="c18"><strong>Lock-Free
								data structure</strong></span> <span class="c15">(e.g. Java's Concurrent
							Package have a couple of them)</span>
					</p>
				</li>
				<li>
					<p class="western c20" lang="en-GB">
						<span class="c18"><strong>Analyze the memory usage
								patterns in your logic</strong></span><span class="c15">. Determine where
							new objects are created and where they are eligible for garbage
							collection. Be aware of the creation of a lot of</span> <span
							class="c18"><strong>short-lived temporary objects
								as they will put a high load on the Garbage Collector</strong></span><span
							class="c15">.</span>
					</p>
				</li>
				<li>
					<p class="western c17" lang="en-GB">However, never trade off
						code readability for performance. (e.g. Don't try to bundle too
						much logic into a single method). Let the VM handle this execution
						for you.</p>
				</li>
			</ul>
			<p class="western c10" lang="en-GB">
				<br> <br>
			</p>
		</section>
		<section>
			<h3>Web Site Scalability</h3>
			<p>A classical large scale web site typically have multiple data
				centers in geographically distributed locations.</p>
			<p>Each data center will typically have the following tiers in
				its architecture:</p>
			<dl>
				<dt>Web tier</dt>
				<dd>Serving static contents (static pages, photos, videos)</dd>

				<dt>App tier</dt>
				<dd>Serving dynamic contents and execute the application logic
					(dynamic pages, order processing, transaction processing)</dd>
				<dt>Data tier</dt>
				<dd>Storing persistent states (Databases, Filesystems)</dd>
			</dl>
		</section>
		<section>
			<h3>Web Content</h3>
			<section>
				<h4>Dynamic Content</h4>
				<p>
					Most of the content display is dynamic content.<br />
				<p>
					Some application logic will be executed at the <strong>web
						server which generate an HTML</strong> for the client browser.
				</p>
				<p>The efficiency of application logic will have a huge impact
					on the overall site's scalability.</p>
				<p>
					Sometimes it is possible to <strong>pre-generate dynamic
						content</strong> and store it as static content. When the real request
					comes in, instead of re-running the application logic to generate
					the page, we just need to lookup the pre-generated page, which can
					be much faster.
				</p>
			</section>
			<section>
				<h4>Static Content</h4>
				<p>Static content are typically the images, videos embedded
					inside the dynamic pages.</p>
				<p>A typical HTML pages typically contains many static contents
					where the browser will make additional HTTP network round trips to
					fetch. So fetching static content efficiency also has a big impact
					to the overall response of dynamic page</p>
				<p>
					<strong>Content Delivery Network</strong> is an effective solution
					for delivering static contents. CDN provider will cache the static
					content in their network and will return the cached copy for
					subsequent HTTP fetch request. This reduce the overall hits to your
					web site as well as improving the user's response time (because
					their cache is in closer proximity to the user)
				</p>
			</section>
		</section>
		<section>
			<h3>Request dispatching and Load balancing</h3>
			<p>The Client who is making an HTTP request has two layers of
				dispatching to reach the application server:</p>
			<ol>
				<li>
					<h4>DNS Resolution based on user proximity</h4>
					<p>Depends on the location of the client (derived from the IP
						address), the DNS server can return an ordered list of sites
						according to the proximity measurement. Therefore client request
						will be routed to the data center closest to him/her.</p>
					<p>After that, the client browser will cache the server IP.</p>
				</li>
				<li>
					<h4>Load balancer</h4>
					<p>Load balancer (hardware-based or software-based) will be
						sitting in front of a pool of homogeneous servers which provide
						same application services. The load balancer's job is to decide
						which member of the pool should handle the request.</p>
					<p>The decision can be based on various strategy, simple one
						include round robin or random, more sophisticated one involves
						tracking the workload of each member (e.g. by measuring their
						response time) and dispatch request to the least busy one.</p>
					<p>Members of the pool can also monitor its own workload and
						mark itself down (by not responding to the ping request of the
						load balancer.)</p>
				</li>
			</ol>
		</section>
		<section>
			<h3>Client communication</h3>
			<p>This is concerned about designing an effective mechanism to
				communicate with the client, which is typically the browser making
				some HTTP call (and maybe AJAX as well.)</p>

			<section>
				<h4>Designing the granularity of service call</h4>
				<ul>
					<li>Reduce the number of round trips by using a coarse grain
						API model so your client is making one call rather than many small
						calls</li>
					<li>Don't send back more data than your client needs</li>
					<li>Consider using an <strong>incremental processing
							model</strong>. Just send back sufficient result for the first page. Use a
						<strong>cursor model</strong> to compute more result for
						subsequent pages in case the client needs it. But it is good to
						calculate an estimation of the total matched result to return to
						the client.
					</li>
				</ul>
			</section>
			<section>
				<h4>Designing message format</h4>
				<p>If you have control on the client side (e.g. I provide the
					JavaScript library which is making the request), then you can
					choose a more compact encoding scheme and not worry about
					compatibility</p>
				<p>
					If not, you have to use a <strong>standard encoding
						mechanism</strong> such as XML. You also need to publish the XML schema of
					the message (the contract is the message format.)
				</p>
			</section>
			<section>
				<h4>Consider data compression</h4>
				<p>If the message size is big, then we can apply compression
					technique (e.g. gzip) to the message before sending it</p>
				<p>You are trading off CPU for bandwidth savings, better to
					measure whether this is a gain first.</p>
			</section>
			<section>
				<h4>Asynchronous communication</h4>
				<p>AJAX fits very well here. An user can proceed to do other
					things while the server is working on the request.</p>
				<p>Consider not sending the result at all. Rather than sending
					the final order status to the client who is sending an order
					placement request, consider sending an email acknowledgment.</p>
			</section>
		</section>
		<section>
			<h4>Session state handling</h4>

			<p>Typical web transaction involves multiple steps. Session state
				need to be maintained across multiple interactions.</p>
			<section>
				<h5>Memory-based session state with Load balancer affinity</h5>
				<p>One way is to store the state in the App Server's local
					memory. But we need to make sure subsequent request land on the
					same App Server instance otherwise it cannot access the previous
					stored session state.</p>
				<p>Load balancer affinity need to be turned on. Typically
					request with the same cookie will be routed to the same app server.</p>
			</section>

			<section>
				<h5>Memory replication session state across App servers</h5>
				<p>Another way to have the App server sharing a global session
					state by replicating its changes to each other</p>
				<p>Double check the latency of replication so we can make sure
					there is enough time for the replication to complete before
					subsequent request is made.</p>
			</section>
			<section>
				<h5>Persist session state to a DB</h5>
				<p>Store the session state into a DB which can be accessed by
					any App Server inside the pool</p>
				<aside>
					<p>key words: pool of App Server</p>
				</aside>
			</section>
			<section>
				<h5>On-demand session state migration</h5>
				<p>Under this model, the cookie will be used to store the IP
					address of the last app server who process the client request</p>
				<p>When the next request comes in, the dispatcher is free to
					forward to any members of the pool. The app server which receive
					this request will examine the IP address of the last server and
					pull over the session state from there.</p>
			</section>
			<section>
				<h5>Embed session state inside cookies</h5>
				<p>If the session state is small, you don't need to store at the
					server side at all. You can just embed all information inside a
					cookie and send back to the client.</p>
				<p>You need to digitally sign the cookie so that modification
					cannot happen</p>
			</section>
			<section>
				<h5>Caching</h5>

				Remember the previous result can reuse them for future request can
				drastically reduce the workload of the system. But don't cache
				request which modifies the backend state
			</section>
			<aside>
				<p>Key words: workload of a system</p>
			</aside>
		</section>
		<section>
			<h3>Database Scalability</h3>
			<p>Database is typically the last piece of the puzzle of the
				scalability problem. There are some common techniques to scale the
				DB tire.</p>
			<dl>
				<dt>Indexing</dt>
				<dd>
					<p>Make sure appropriate indexesis built for fast access.</p>
					<p>Analyze the frequently-used queries and examine the query
						plan when it is executed (e.g. use "explain" for MySQL).</p>
					<p>Check whether appropriate index exist and being used.</p>
					<p>(NOTE Indexis slow down the inserting operation.)</p>
				</dd>
				<dt>Data De-normalization</dt>
				<dd>
					<p>Table joinis an expensive operation and should be reduced as
						much as possible.</p>
					<p>One technique is to de-normalize the data such that certain
						information is repeated in different tables.</p>
				</dd>
				<dt>DB Replication</dt>
				<dd>
					<p>For typical web applicationwhere the read/write ratio is
						high.</p>
					<p>It will be useful to maintain multiple read-only replicas so
						that read access workload can be spread across.</p>
					<b> Example: </b>
					<p>In a 1 master/N slaves case, all update goes to master DB
						which send a change log to the replicas. However, there will be a
						time lag for replication.
				</dd>
				<dt>Table Partitionin</dt>
				<dd>
					You can partition vertically or horizontally:
					<dl>
						<dt>Vertical partitioning</dt>
						<dd>It is about putting different DB tables into different
							machines or moving some columns(rarely access attributes) to a
							different table. Of course, for query performance reason, tables
							that are joined together inside a query need to reside in the
							same DB.</dd>
						<dt>Horizontally partitioning</dt>
						<dd>
							<p>It is about moving different rows within a table into a
								separated DB.</p>
							<b>Example:</b>
							<p>we can partition the rows according to user id.</p>
							<p>
								<strong>Locality</strong> of reference is very important, and we
								should put the rows (from different tables) of the same user
								together in the same machine if these information will be access
								together.
							</p>
						</dd>
					</dl>
				</dd>
			</dl>


			<section>
				<h5>Transaction Processing</h5>
				<p>Avoid mixing OLAP (query intensive) and OLTP (update
					intensive) operations within the same DB.</p>
				<p>In the OLTP system, avoid using long running database
					transaction and choose the isolation level appropriately.</p>
				<p>
					A typical technique is to use <strong>optimistic business
						transaction</strong>. Under this scheme, a long running business
					transactionis executed outside a database transaction. Data
					containing a version stamp is read outside the database
					transaction.When the user commits the business transaction, a
					database transaction is started at that time, the lastest version
					stamp of the corresponding records is re-read from the DB to make
					sure it is the same as the previous read (which means the data is
					not modified since the last read). If so, the changes is pushed to
					the DB and transaction is commited (with the version stamp
					advanced).
				</p>
				<p>In case the version stamp is mismatched, the DB transaction
					as well as the business transaction is aborted.</p>
				<aside>
					<p>Key words: business transaction, DB transaction</p>
				</aside>
			</section>
			<section>
				<h5>Object / Relational Mapping</h5>
				<p>Although O/R mapping layer is useful to simplify persistent
					logic, it is usually not friendly to scalability. Consider the
					performance overhead carefully when deciding to use O/R mapping.</p>
				<p>There are many tuning parameters in O/R mapping. Consider
					these:</p>
				<ul>
					<li>When an object is dereferenced, how deep the object will
						be retrieved</li>
					<li>If a collection is dereferenced, does the O/R mapper
						retrieve all the object contained in the collection?</li>
					<li>When an object is expanded, choose carefully between
						multiple "single-join" queries and single "multiple join" query.</li>
				</ul>

			</section>
		</section>
			<aside>
		<p>Resouces:</p>
		<ul>
			<li><a
				href="http://horicky.blogspot.com/2008/03/database-scalability.html">
					DB scalability</a></li>
			<li><a
				href="http://horicky.blogspot.com/2008/03/web-site-scalability.html">
					Web site scalability</a></li>
		</ul>
	</aside>
</article>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>