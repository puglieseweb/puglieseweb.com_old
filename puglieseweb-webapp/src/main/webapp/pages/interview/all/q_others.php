<?php include '../../../includes/master-head.inc.php'; ?>

<dl>
	<p></p>
	<h2>Altre</h2>
	<h3 class="western c39" lang="en-GB">Come lavori su un progetto
		(che tipo di documentazione di aspetti)</h3>
	<h3 class="western c39" lang="en-GB">Come ottimizzare
		un'applicazione Web</h3>
	<h3 class="western c39" lang="en-GB">quali sono le interfacce Java
		utilizzate per comparare oggetti,</h3>
	<h3 class="western c11" lang="en-GB">Quali method usi per
		comparare oggetti in java?</h3>
	Equal,Comparator
	<br>
	<h3 class="western c40" lang="en-GB">descrivi come funziona un
		HashMap</h3>
	<br>
	<h3 class="western c21" lang="en-GB">
		In una applicazione web cosa faresti? <br>
	</h3>
	<ul>
		<li>check that the scalability is good.</li>
		<li>verificare che le cominicazioni tra
			l&acirc;&#8364;&#8482;interfaccia utente e il server non siano ne
			troppo piccole ne troppo grosse</li>
		<li>che non ci sia un eccessivo occupazione della bandwith</li>
		<li>verificare che non ci sia un eccessivo utilizzo del database.
			Verificare che l&acirc;&#8364;&#8482;informazioni possano venire
			chashata</li>
		<li>verificare che la sessione sia mantenuta leggera/ no cluster/
			la sessione deve essere distribuita tra i vari elementi.</li>
		<li>Verificare che non ci siano strani loop o operazini troppo
			lenti sul database</li>
		<li>Database/Comunicazione/Navigazione</li>
	</ul>
	<dt>Parla di un progetto che ti e piaciuto paricolarmente</dt>
	<dd>
		<p>tite-deadliness</p>
		<p>The challenge was that everything had to be defined, even the
			protocal. As well as there was the need to manage different kind of
			resources.</p>
		<p>In my case I used a comma-separated protocol (command followed
			by parameters). The intention was to migrate to an XML file, but I
			used a comma-separated protocol becouse It was more quicker.</p>
	</dd>
	<h3 class="western c41" lang="en-GB">Quali sono i tre difetti/tre
		peggi.</h3>
	<h3 class="western c41" lang="en-GB">Una situazione difficile che
		ho vissuto?</h3>
	<p class="western c3" lang="en-GB">In Motorola le requirements were
		not very clear, a lot of people were not aware how to build the
		interfaces. Then I have done a little of investigation and tests
		directly on the machines and on protocols</p>
	<h3 class="western c41" lang="en-GB">Se io ti do da fare un task e
		tu pensi lo potresti fare meglio cosa fai?</h3>
	<p class="western c10" lang="en-GB">Io scrivo i vantaggi e gli
		svantaggi della mia idea, la sottopongo al capo. If the boss likes it,
		it's ok, otherwise I'll follow his advices&nbsp;</p>
	<h3 class="western c41" lang="en-GB">In Monomoto, hai usato
		Concurrency nello scrivere i files txt?</h3>
	<p class="western c10" lang="en-GB">No non ce ne stato stato
		bisogno:</p>
	<ul>
		<li>il tutto passa attraveso una sola classe che <strong>serializza
				gli accessi</strong>. Il problema e' che non potevo fare diverse istanze di
			questo sistema. Era una soluzione temporanea. Quasta era una
			soluzione temporanea che poi doveva essere passata sul database.
		</li>
		<li>Ogni thread si gestiva i propri pezzettini e di tanto <br></li>
		<li>Per evitare questo problema c'erano diversi file che venivano
			gestiti che poi sono riassemblati la sera. Un altro <strong>thread
				accorpava</strong> i singoli pezzi. Il thread ricorda il nome dei file e le
			linee lette e mantiene i singoli pezzi in un file consolidato.
		</li>
	</ul>
	<p>I did not need to use concurrency.</p>
	<ul>
		<li>every thing passed throw a class ....<br></li>
	</ul>
	<h3>
		<br>
	</h3>
	<p class="important" lang="en-GB">
		Allinterno di un' applicatione server non posso lanciare i tread di
		una applicazione perche' si va contro la filosofia dell' <span
			style="font-weight: bold;" class="gergon">application server</span>.
		Infatti il <span style="font-weight: bold;" class="gergon">container</span>
		perderebbe il controllo di quello che fa.
	</p>
	<p class="western c10" lang="en-GB">Pubblicare dei messaggi. Ricevo
		il Java Beans di graphy. Ogni sottografo lo pubblico in un messaggio.
		Il messaggio mi viene restituito a me in diverse EJB ==&gt;
		programmazione parallela utilizzanodo solo implicitamente i threads.</p>
	<p></p>
</dl>
<?php include '../../../includes/master-foot.inc.php'; ?>
