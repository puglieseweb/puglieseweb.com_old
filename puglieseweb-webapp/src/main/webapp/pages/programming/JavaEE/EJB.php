<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<article>
	<aside>
		<b>Slides:</b>
		<ul>
			<li><a href="http://www.zurich.ibm.com/~thg/Teaching/BDSE2010/">Business-Driven Software Engineering</a>
			</li>
		</ul>
	</aside>
	<section>
		<h3>difference b/w EJB2.1 and EJB3.0</h3>
		<ul>
			<li>
				No need of Home Interface (EJBHome),but it is needed in EJB2.0
			</li>
			<li>
				No more confusions to make an EJB remote or local,it's the client which would decide and cast to
				appropriate.
			</li>
			<li>
				Just write SINGLE simple Java class and annotate it to be
				Stateless/Stateful/Entity/MessageDriven.Container
			</li>
			<li>
				No Deployment Descriptors , MetaData Annotations are explored which is introduced in J2SE5.0
			</li>
			<li>
				Forget all EJB life cycles.For example Entity bean life cycle in 3.0 is new,managed,detached,removed.
			</li>
			<li>
				Ready to develop complex query,inner/outer join with EJB3.0.
			</li>
			<li>
				The inportant change is introduction of JPA. Now you don't have to use Entity bean as remote object. It
				will be just POJO for you. you can use them as a object. For persistency layer different ORM can be used
				like hibernate, toplink are the most perferred ones. You can use them outside the container also. Using
				of annotation made life simple for developers.
			</li>
		</ul>
	</section>

	<section>
		<h3>What are the callback methods in Entity beans?</h3>
		<h4>EJB3</h4>
        	<a href="http://docs.oracle.com/javaee/6/api/javax/ejb/EntityBean.html">EntityBean Interface</a>
		<h4>EJB2</h4>

		<p>
			The bean class defines create methods that match methods in the home interface and business methods that
			match methods in the remote interface. The bean class also implements a set of callback methods that allow
			the container to notify the bean of events in its life cycle. The callback methods are defined in the
			javax.ejb.EntityBean interface that is implemented by all entity beans.The EntityBean interface has the
			following definition. Notice that the bean class implements these methods.
		</p>
		<code>
<pre>
public interface javax.ejb.EntityBean {
 	public void setEntityContext();
	public void unsetEntityContext();
	public void ejbLoad();
	public void ejbStore();
	public void ejbActivate();
	public void ejbPassivate();
	public void ejbRemove();
}
</pre>
		</code>

		<p>
			The setEntityContext() method provides the bean with an interface to the container called the EntityContext.
			The EntityContext interface contains methods for obtaining information about the context under which the
			bean is operating at any particular moment. The EntityContext interface is used to access security
			information about the caller; to determine the status of the current transaction or to force a transaction
			rollback; or to get a reference to the bean itself, its home, or its primary key. The EntityContext is set
			only once in the life of an entity bean instance, so its reference should be put into one of the bean
			instance's fields if it will be needed later.
		</p>

		<p>

			The unsetEntityContext() method is used at the end of the bean's life cycle before the instance is evicted
			from memory to dereference the EntityContext and perform any last-minute clean-up.
		</p>

		<p>

			The ejbLoad() and ejbStore() methods in CMP entities are invoked when the entity bean's state is being
			synchronized with the database. The ejbLoad() is invoked just after the container has refreshed the bean
			container-managed fields with its state from the database. The ejbStore() method is invoked just before the
			container is about to write the bean container-managed fields to the database. These methods are used to
			modify data as it's being synchronized. This is common when the data stored in the database is different
			than the data used in the bean fields.
		</p>

		<p>

			The ejbPassivate() and ejbActivate() methods are invoked on the bean by the container just before the bean
			is passivated and just after the bean is activated, respectively. Passivation in entity beans means that the
			bean instance is disassociated with its remote reference so that the container can evict it from memory or
			reuse it. It's a resource conservation measure the container employs to reduce the number of instances in
			memory. A bean might be passivated if it hasn't been used for a while or as a normal operation performed by
			the container to maximize reuse of resources. Some containers will evict beans from memory, while others
			will reuse instances for other more active remote references. The ejbPassivate() and ejbActivate() methods
			provide the bean with a notification as to when it's about to be passivated (disassociated with the remote
			reference) or activated (associated with a remote reference).
		</p>

	</section>

	<h1>App1licatio Controller and EJB<br>
	</h1>

	<p>Many business applications support several presentation layers. <br>
	</p>

	<p>HTTP
		clients may handle web applications. <br>
	</p>

	<p>Swing clients may handle desktop
		applications. <br>
	</p>

	<p>Behind these presentation tiers, there&#8217;s often an
		<strong>application controller</strong>, or<strong> state machine</strong>.
	</p>

	<p>Programmers implement many
		Enterprise JavaBean (EJB) applications this way. The EJB tier has its
		own controller, which connects to different presentation tiers through
		a business fa&ccedil;ade or delegate.</p>
	<code><br>
	</code>

	<div>
		<h5>Requirement<br>
		</h5>

		<p>Accept requests</p>
		<h5>Resolution</h5>
		<code>public Response processRequest(Request request)</code>
	</div>
	<br>

	<div>
		<h5>Requirement</h5>

		<p>Select handler<br>
		</p>
		<h5>Resolution</h5>
		<code>this.requestHandlers.get(request.getName())</code>
	</div>
	<br>

	<div>
		<h5>Requirement</h5></div>

	<p>Route requests<br>
	</p>
	<h5>Resolution</h5>
	<code>response = getRequestHandler(request).process(request);</code>
	</div>
	<br>

	<div>
		<h5>Requirement</h5>

		<p>Error handling<br>
		</p>
		<h5>Resolution</h5>
		<code>Subclass ErrorResponse</code>
</article>

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>
