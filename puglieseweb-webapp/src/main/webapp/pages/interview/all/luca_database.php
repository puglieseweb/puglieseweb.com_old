<?php include '../../../includes/master-head.inc.php'; ?>

<h1>Domande Luca</h1>
<h2>
	Persistence<br>
</h2>
<h3 class="western c39" lang="en-GB">SQL JOINS, INNER JOINS, OUTER
	JOINS</h3>
<h3 class="western c39" lang="en-GB">Come disegnare un db</h3>
<h3 class="western c11" lang="en-GB">Inner join/ outer join?</h3>
<h3 class="western c11" lang="en-GB">Foring key primary key?</h3>
<h3 class="western c11" lang="en-GB">
	Che esperienza hai fatto con i database? Come hai fatto?<br>
</h3>
<p class="western c11" lang="en-GB">
	Ne abbiamo disegnato uno in Motorola. Ora ne sto dignando uno nella mia
	applicazione:<br>
</p>
<ol>
	<li>creao un <span style="font-weight: bold;" class="gergon">object
			model</span> che segue la <span style="font-weight: bold;" class="gergon">business
			logic</span>,
	</li>
	<li>si fa la <em>review</em> e ulteriori dettagli.&nbsp;
	</li>
	<li><br></li>
</ol>
<li>definisco le <span style="font-weight: bold;" class="gergon">tabelle</span>
	e le <span style="font-weight: bold;" class="gergon">relazioni.</span>&nbsp;&nbsp;<br>
		<br> <strong>Whatch out! </strong></li>
<p class="important">
	Quando ho<span style="font-weight: bold;"> relazioni tra classi</span>
	la <span style="font-weight: bold;" class="gergon">primary key </span>di
	una tabella diventa la <span style="font-weight: bold;" class="gergon">foring
		key</span> di un'altra babella.
</p>
<p>
	Per esempio, se ho un user e un address, in OO un <em>utente
		contiene la lista degli indirizzi</em> (l'utente ha i <span
		style="font-weight: bold;" class="gergon">riferimenti</span>) quando
	la trasformo sul database <em>la primari key dell'utente diventa
		la forign key dell'addresses</em>&nbsp;<span class="c15"></span>
</p>
<li>Fatto questo controllo sulle operazioni piu' frequenti
	introduco delle <span class="gergon">ridondanze calcolate</span> al
	posto delgli <span style="font-weight: bold;" class="gergon">attributi</span>&nbsp;
</li>
<ol>
	<li>Ricuco le <span style="font-weight: bold;" class="gergon">join</span>
		e le <span style="font-weight: bold;" class="gergon">query</span></li>
	<li>copio gli attributi in altre classi per ridurre</li>
</ol>
<h3 class="western c11" lang="en-GB">Come migliorare il database?</h3>
<ul>
	<li>Controllo che gli <span style="font-weight: bold;"
		class="gergon">indici</span> siano tutti ben definiti
	</li>
	<li>le <span style="font-weight: bold;" class="gergon">tabelle</span>
		non siano troppo grandi
	</li>
	<li>che non ci siano troppi <span style="font-weight: bold;"
		class="gergon">jons</span>
	</li>
	<li>etc.</li>
</ul>
<h3 class="western c11" lang="en-GB">Come ottimizzare un database?
</h3>
<p class="western c10" lang="en-GB">
	Alcune volte occorre avere <em>piu' tabelle con meno attributi</em>
	altre volte <em>il contrario</em>.
</p>
<strong> IPORTATENTE: </strong>
<ol>
	<li>verificare che tutti gli <em>indici</em> sono apposto
	</li>
	<li>verificare che il database non vada in <em>infinito scan</em>
	</li>
	<li>verificare che non ci siano strani lock dovuti a operazioni
		fatti in ordine sbagliato</li>
	<li>....</li>
</ol>

<aside>
	<dl>
		<dt>deadlock in a database</dt>
		<dd>
			A deadlock is a situation where in two or more competing actions are
			each waiting for the other to finish, and thus neither ever does. It
			is often seen in a paradox like the "chicken or the egg".
			<p>
				<b>Example:</b> an example of a deadlock which may occur in
				database products is the following. Client applications using the
				database may require exclusive access to a table, and in order to
				gain exclusive access they ask for a lock. If one client application
				holds a lock on a table and attempts to obtain the lock on a second
				table that is already held by a second client application, this may
				lead to deadlock if the second application then attempts to obtain
				the lock that is held by the first application. (This particular
				type of deadlock could be prevented, by using an all-or-none
				resource allocation algorithm.)
			</p>
		</dd>
	</dl>
</aside>



<h3 class="western c10" lang="en-GB">Come "verificare il database"
	attraverso il codice java</h3>
Verificare che:
<br>
<ol>
	<li>il codice segue lo <em>stile java</em>
	</li>
	<li>le classi non hanno troppi metodi o attributi</li>
	<li>non ci sia eccessivo allocazione e deallocazione della
		memoria.. per salvaguardare il <span class="gergon">garbage
			collector</span>.
	</li>
	<li>tutti i mome dei metodi attributi abbiano un significato&nbsp;</li>
	<li>le <span style="font-weight: bold;" class="gergon">eccezioni</span>
		non vengano <span class="gergon">silently absorbed:</span> devono
		essere rimandate indietro o gestite nel punto in cui c'e l'infomazione
		necessaria per gestirle.&nbsp;
	</li>
	<li>sia un buon <span style="font-weight: bold;" class="gergon">logging</span>
		di quello che avviene
	</li>
	<li>non ci sia un <span style="font-weight: bold;">utilizzo
			eccessivo del database</span>: fare <em>liste di letture</em> e non
	</li>
	<li>ci siano i diversi livelli dell'architettura che ci si
		aspetta: <br>
	</li>
	<ol>
		<li>livello di <span style="font-weight: bold;" class="gergon">presentazione,
				<br>
		</span></li>
		<li>livello <span style="font-weight: bold;" class="gergon">business,



		</span><br>
		</li>
		<li>livello di <span style="font-weight: bold;" class="gergon">gestione
				degli oggetti</span></li>
	</ol>
	<li>Verificare di non reinventing la weel, such as <span
		style="font-weight: bold;" class="bad">cache fatte su misura</span>
		etc.
	</li>
</ol>
<?php include '../../../includes/master-foot.inc.php'; ?>

