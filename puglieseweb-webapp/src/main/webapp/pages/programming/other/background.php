<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<h1>Background knowledge</h1>

<h2>TCP / IP Model or OSI Model?</h2>

<p class="western c17" lang="en-GB"> <br>
</p>
<p class="western c17" lang="en-GB"> <br>
</p>
<p class="western c10" lang="en-GB"> TCP (transmission
control protocol) </p>
<p class="western c10" lang="en-GB"> IP (Internet
Protocol) </p>
<p class="western c10" lang="en-GB"> OSI (Open Systems
Interconnection) </p>
<p class="western c16" lang="en-GB"> <span class="c15">OSI
Model
and
TCP/IP
Model are two layering networking model thought to
help to standardise networking.</span> <span class="c15">Due to the
nature of the industry it is necessary to become familiar with both.</span>
</p>
<p class="western c16" lang="en-GB"> <span class="c15">The</span>
<span class="c18"><strong>TCP/IP</strong></span><span class="c15">model
has the following four layers: <br>
&#226;&#8364;&#162; Application layer <br>
&#226;&#8364;&#162; Transport layer <br>
&#226;&#8364;&#162; Internet layer <br>
&#226;&#8364;&#162; Network access layer</span> </p>
<p class="western c10" lang="en-GB"> Although some of
the layers in the TCP/IP model have the same name as layers in the OSI
model, the layers of the two models do not correspond exactly. Most
notably, the application layer has different functions in each model. <br>
The designers of TCP/IP felt that the application layer should include
the OSI session and presentation layer details. They created an
application layer that handles issues of representation, encoding, and
dialog control. <br>
<br>
<br>
</p>
<p class="western c16" lang="en-GB"> <span class="c15">The</span>
<span class="c18"><strong>transport layer</strong></span><span
 class="c15">deals with the quality of service issues of reliability,
flow control, and error correction. One of its protocols, the
transmission control protocol (TCP), provides excellent and flexible
ways to create reliable, well-flowing, low-error network
communications. <br>
</span> <span class="c18"><strong>TCP is a connection-oriented protocol</strong></span><span
 class="c15">. It maintains a dialogue between source and destination
while packaging application layer information into units called</span> <span
 class="c18"><strong>segments</strong></span><span class="c15">.
Connection-oriented does not mean that a circuit exists between the
communicating computers. It does mean that Layer 4 segments travel back
and forth between two hosts to acknowledge the connection exists
logically for some period. <br>
</span> <br>
<br>
</p>
<p class="western c16" lang="en-GB"> <span class="c15">The
purpose
of
the</span> <span class="c18"><strong>Internet layer</strong></span>
<span class="c15">is to divide TCP segments into packets and send them
from any network.</span> </p>
<p class="western c16" lang="en-GB"> <span class="c15">The
packets
arrive
at
the destination network independent of the path they
took to get there. The specific protocol that governs this layer is
called the Internet Protocol (</span><span class="c18"><strong>IP</strong></span><span
 class="c15">). Best path determination and packet switching occur at
this layer.&nbsp; <br>
The relationship between IP and TCP is an important one.</span> <span
 class="c18"><strong>IP</strong></span><span class="c15">can be thought
to</span> <span class="c18"><strong>point the way for the packets</strong></span><span
 class="c15">, while</span> <span class="c18"><strong>TCP provides a
reliable transport</strong></span><span class="c15">. <br>
</span> <br>
<br>
</p>
<p class="western c16" lang="en-GB"> <span class="c15">The</span>
<span class="c18"><strong>Network Access layer</strong></span><span
 class="c15">is concerned with all of the components, both physical and
logical, that are required to make a physical link. It includes the
networking technology details, including all the details in the OSI
physical and data link layers.</span> </p>
<p class="western c10" lang="en-GB"> <br>
<br>
</p>
<p class="western c63" lang="en-GB"> <span class="c15">A
comparison
of
the
OSI model and the TCP/IP models will point out some
similarities and differences. <br>
Similarities include: <br>
&#226;&#8364;&#162; Both have layers <br>
&#226;&#8364;&#162; Both have application layers, though they include very
different services. <br>
&#226;&#8364;&#162; Both have comparable transport and network layers. <br>
&#226;&#8364;&#162; Both models need to be known by networking
professionals. <br>
&#226;&#8364;&#162; Both assume packets are switched. This means that
individual packets may take different paths to reach the same
destination. This is contrasted with circuit-switched networks where
all the packets take the same path. <br>
<br>
Differences include: <br>
&#226;&#8364;&#162;</span> <span class="c18"><strong>TCP/IP combines the
presentation and session layer issues into its application layer</strong></span><span
 class="c15">. <br>
&#226;&#8364;&#162; TCP/IP combines the OSI data link and physical layers
into the network access layer. <br>
&#226;&#8364;&#162; TCP/IP appears simpler because it has fewer layers. <br>
&#226;&#8364;&#162; TCP/IP protocols are the standards around which the
Internet developed, so the TCP/IP model gains credibility just because
of its protocols. In contrast, networks are not usually built on the
OSI protocol, even though the</span> <span class="c18"><strong>OSI
model is used as a guide</strong></span><span class="c15">.</span> </p>
<p class="western c71" lang="en-GB"> <span class="c15">82</span><span
 class="c15">INTERVIEW PREPARATION</span> </p>


 <span class="resources">
References:
<ul><li>
<a href="http://library.thinkquest.org/04oct/01910/tcpip.htm">http://library.thinkquest.org/04oct/01910/tcpip.htm</a>
</li><li>
<a href="http://www.youtube.com/watch?v=DqOvu-wAAM0">http://www.youtube.com/watch?v=DqOvu-wAAM0
</a></li>
<li>OSI (Open Systems Interconnection) model: <a href="http://en.wikipedia.org/wiki/OSI_model"> http://en.wikipedia.org/wiki/OSI_model</a>
</li></ul>
</span>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
