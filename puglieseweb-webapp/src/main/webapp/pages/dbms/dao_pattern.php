<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?>
<article>
	<aside>
		<b>Resources:</b> <a
			href="http://www.hiberbook.com/HiberBookWeb/learn.jsp?tutorial=21advanceddaos">Coding
			Advanced DAOs with Hibernate and JPA Annotations - The Pattern</a>
	</aside>

	<header>
		<h2>DAO (Data Access Object)</h2>
		<p>The DAO patter:</p>
		<ul>
			<li>Makes the process of persisting data easier</li>
			<li>Provides a very abstract interface that hides both the
				underlying database implementation and the mechanism or framework
				that is being used to persist data to the database.</li>
		</ul>
	</header>
	<section>
		<h3>DAO Blocks</h3>
		<p>There are four fundamental blocks.</p>
		<section>
		<p>Two blocks are business specific:</p>
		<dl>
			<dt>GenericDao</dt>
			<dd>
				<code>interface</code>
				<p>This is the most generic interface. Here we define the CRUD
					operations</p>
			</dd>
			<dt>AccountDao</dt>
			<dd>
				<code>interface</code>
				<p>This defines extra entity-related operations</p>
			</dd>
		</dl>
		</section>
		<section>
			<p>And two blocks are DBMS specific objects:</p>
			<dl>
				<dt>JdbcDao</dt>
				<dd>
					<code> Abstract class </code>
					<p>Provide the abstraction to connect to different data sources
						(for instance JDBC)</p>
				</dd>
				<dt>JdbcAccountDao</dt>
				<dd>
					<code>concrete class</code>
					<p>Implements the connection and the operation</p>
				</dd>
			</dl>
		</section>
	</section>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>