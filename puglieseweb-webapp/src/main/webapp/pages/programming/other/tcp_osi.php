<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>

<article>
	<section>
		<h2>Networking</h2>
		<section>
			<h3>Acronyms</h3>
			<dl>
				<dt>TCP</dt>
				<dd>Transmission control protocol</dd>
				<dt>IP</dt>
				<dd>Internet Protocol</dd>
				<dt>OSI</dt>
				<dd>Open Systems Interconnection</dd>
			</dl>
		</section>
		<section>
			<h3>TCP 3 way handshake</h3>
			<a href="http://www.inetdaemon.com/tutorials/internet/tcp/3-way_handshake.shtml">TCP 3 way handshake</a>
		</section>
		<section>
			<hgroup>
				<h3>TCP / IP Model or OSI Model?</h3>
				<h5>
					OSI Model and TCP/IP Model are two layering networking model thought to help to standardise
					networking. </h5><h5>
				Due to the nature of the industry it is necessary to become familiar with both. </h5>
			</hgroup>
			<p>
				The TCP/IPmodel has the following four layers:

			<p>
			<ul>
				<li>Application layer</li>
				<li>
					Transport layer </li>
				<li>
					Internet layer </li>
				<li>Network access layer</li>
			</ul>
			<p>
				Although some of the layers in the TCP/IP model have the same name as layers in the OSI model, the
				layers of the two models do not correspond exactly.<br/> Most notably, the application layer has
				different functions in each model. The designers of TCP/IP felt that the application layer should
				include the OSI session and presentation layer details. They created an application layer that handles
				issues of representation, encoding, and dialog control. </p>

			<p>
				The transport layerdeals with the quality of service issues of reliability, flow control, and error
				correction. One of its protocols, the transmission control protocol (TCP), provides excellent and
				flexible ways to create reliable, well-flowing, low-error network communications. </p>

			<p>
				TCP is a connection-oriented protocol. It maintains a dialogue between source and destination while
				packaging application layer information into units called segments. Connection-oriented does not mean
				that a circuit exists between the communicating computers. It does mean that Layer 4 segments travel
				back and forth between two hosts to acknowledge the connection exists logically for some period. </p>

			<p>The purpose of the Internet layer is to divide TCP segments into packets and send them from any
				network. </p>

			<p>The packets arrive at the destination network independent of the path they took to get there. The
				specific protocol that governs this layer is called the Internet Protocol (IP). Best path determination
				and packet switching occur at this layer. The relationship between IP and TCP is an important one. IPcan
				be thought to point the way for the packets, while TCP provides a reliable transport. </p>

			<p>The Network Access layeris concerned with all of the components, both physical and logical, that are
				required to make a physical link. It includes the networking technology details, including all the
				details in the OSI physical and data link layers.</p>

			<p>A comparison of the OSI model and the TCP/IP models will point out some similarities and differences.</p>

			<p>Similarities include: </p>
			<ul>
				<li>
					Both have layers </li>
				<li>
					Both have application layers, though they include very different services. </li>
				<li>
					Both have comparable transport and network layers. </li>
				<li>
					Both models need to be known by networking professionals. </li>
				<li>
					Both assume packets are switched. This means that individual packets may take different paths to
					reach the same destination. This is contrasted with circuit-switched networks where all the packets
					take the same path. </li>
			</ul>
			<p>Differences include:</p>
			<ul>
				<li>
					TCP/IP combines the presentation and session layer issues into its application layer. </li>
				<li>
					TCP/IP combines the OSI data link and physical layers into the network access layer. </li>
				<li>
					TCP/IP appears simpler because it has fewer layers. </li>
				<li>
					TCP/IP protocols are the standards around which the Internet developed, so the TCP/IP model gains
					credibility just because of its protocols. In contrast, networks are not usually built on the OSI
					protocol, even though the OSI model is used as a guide. </li>
			</ul>
		</section>
	</section>
	<aside>
		<b> References: </b>
		<ul>
			<li>
				<a href="http://library.thinkquest.org/04oct/01910/tcpip.htm">http://library.thinkquest.org/04oct/01910/tcpip.htm</a>
			</li>
			<li>
				<a href="http://www.youtube.com/watch?v=DqOvu-wAAM0">http://www.youtube.com/watch?v=DqOvu-wAAM0 </a>
			</li>
			<li>OSI (Open Systems Interconnection) model: <a href="http://en.wikipedia.org/wiki/OSI_model">
				http://en.wikipedia.org/wiki/OSI_model</a>
			</li>
		</ul>
	</aside>
</article>
<?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp'; ?>
