<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?><article>
	<header>
		<time class="updated" datetime="2011-10-28 11:11:03-0400" pubdate>28-10-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<hgroup>
			<h2>
				<abbr title="Java persistence API">Jpa</abbr>
			</h2>
		</hgroup>
		<p>Object Relational Mapping defines a mapping strategy to relate
			Java objects to relational tables.
		<p>ORM API vendor originally approached the configuration and the
			mapping programming interfaces differently. In a landscape of
			competing frameworks, the Java community defined the Java Persistence
			API specification.</p>
		<p>JPA is a replacement for both vendors specific ORM API and
			heavy-weight Enterprise JavaBeans (EJB.)</p>
	</header>
	<section>
		<h3>Components</h3>
		<p>JPA defines the following components:</p>
		<dl id="addAbbr">
			<dt>JPA Entity</dt>
			<dd>A Java class that is mapped to a database table, either
				using annotations or XML.</dd>
			<dt>Persistence Context</dt>
			<dd>
				<p>A storage area assigned to an individual session or thread.</p>
				<p>This is the workspace that keeps track of changes to
					relational data.</p>
			</dd>
			<dt>
				<strong>javax.persistence.*</strong> annotations
			</dt>
			<dd>Define mapping elements such as tables, relationships,
				primary key generation techniques, and query mapping.</dd>
			<dt>Entity Manager API</dt>
			<dd>Provides access to a persistence context.</dd>
			<dt>JPA Configuration File</dt>
			<dd>
				All JPA-compliant ORMs can be configured using the special file, <strong>META-INF/persistence.xml</strong>,
				which defines the persistence units.
			</dd>
		</dl>
	</section>
	<section>
		<h3>Relationships</h3>
		<section>
			<h4>
				<code>@OneToMany</code>
			</h4>
			<p>Relate a row in a parent table to zero or more rows in a child
				table.</p>
			<p>The relationship can either be defined as bi-directional or
				uni-directional.</p>
		</section>
		<section>
			<h4>
				<code>@ManyToOne</code>
			</h4>
			A reference from a child entity back to its parent.
		</section>
		<section>
			<h4>
				<code>@ManyToMany</code>
			</h4>
			Many-to-Many - rows from each table are related to rows in another
			table. For example, tracking the authors for a series of books, where
			books can be authored by more than one author, and an author can
			write any number of books.
		</section>
		<section>
			<h4>
				<code>@OneToOne</code>
			</h4>
			A single row in one table is related to a single row in another
			table. Often database tables are partitioned into multiple smaller
			tables for performance or security reasons, and if that is warranted
			the One-to-One relationship can manage this for you.
		</section>
	</section>
	<section>
		<h4>Inheritance</h4>
		<p>JPA supports object-based inheritance and provides several
			physical models to map this onto a database.</p>
	</section>
	<section>
		<p>Commands to relate entities to each other:</p>
		<ul>
			<li><command>field reference</command></li>
			<li><command>field set</command></li>
		</ul>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>