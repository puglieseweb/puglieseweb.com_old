<?php
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-head.inc.php';
?>
<articla>
	<h2>Web services</h2>
	<seciotn>
		<h3>Definitions</h3>
		<dl>
			<dt>WSDL (Web Service Description Language)</dt>
			<dd><b>Def n.1:</b>

				<p>(W3C definition) "An XML format for describing network services as a set of endpoints [...]." </p>
			</dd>
			<dd>
				<b>Def n.2:</b>

				<p> An XML document that details the call semantic for a Web service</p>

				<p>A service user retrieving the WSDL in order to find out:</p>
				<ul>
					<li>location of the service</li>
					<li>function calls</li>
					<li>how to access the function calls</li>
				</ul>
			</dd>
			<dt>UDDI (Universal Description, Discovery and Integration) repository</dt>
			<dd><p>At develop time a Web service is registered to the UDDI service.</p>

				<p>The registry information from UDDI is used to locate a WSDL</p></dd>
			<dt>Abstract endpoint (services)</dt>
			<dd>Combine related endpoints</dd>
		</dl>
	</seciotn>
	<section>
		<h3>WSDL</h3>
		<ol>
			<li>
				Once we have developed a Web service, we publish
				<ul><li>its description</li><li>a link to it</li></ul>
				in a UDDI repository.
			</li>
			<li>
				When someone want to use the service, they request the WSDL file in order to find out
				<ul><li>the location of the service</li><li>the function calls</li><li> and how to access them. </li>
				</ul>
			</li>
			<li>
				The information in the WSDL file are used to form a SOAP request to the server. </li>
		</ol>
		<p>
			<img src="../../../resources/img/wsdl/overview_wsdl_fig1.gif" alt="Overview of WSDL"/></p>

		<p><img src="../../../resources/img/wsdl/wsdl-with-links.png" alt="WSDL Structure description"/> <img
				src="../../../resources/img/wsdl/WSDL_11vs20.png" alt="WSDL v1.1 VS WSDL v2.0"/>
		</p>

		<p>Example of WSDL for the "StockQuote" service:</p>
		<code>
		<pre>
&lt;?xml version="1.0"?&gt;
<strong>&lt;definitions name="StockQuote"</strong>
  targetNamespace="http://example.com/stockquote.wsdl"
  xmlns:tns="http://example.com/stockquote.wsdl"
  xmlns:xsd1="http://example.com/stockquote.xsd"
  xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
  xmlns="http://schemas.xmlsoap.org/wsdl/"&gt;
</pre>
		</code>
		<!-- ====================== types element ====================== -->
		<p><code>types</code> and <code>message</code> XML elements are used for the description and format of the
			message</p>
		<code>
<pre>
	<strong>&lt;types&gt;</strong>
	   &lt;schema targetNamespace=
		 http://example.com/stockquote.xsd
		 xmlns="http://www.w3.org/2000/10/XMLSchema"&gt;
		  &lt;element name="TradePriceRequest"&gt;
			&lt;complexType&gt;
			   &lt;all&gt;
				 &lt;element name="tickerSymbol"
				   type="string"/&gt;
			   &lt;/all&gt;
			&lt;/complexType&gt;
		  &lt;/element&gt;
		  &lt;element name="TradePrice"&gt;
			&lt;complexType&gt;
			  &lt;all&gt;
				&lt;element name="price" type="float"/&gt;
			  &lt;/all&gt;
			&lt;/complexType&gt;
		  &lt;/element&gt;
	   &lt;/schema&gt;
	&lt;/types&gt;
</pre>
		</code>
		<!-- ====================== message element ====================== -->
		<code>
<pre>
	<strong>&lt;message </strong>name="GetLastTradePriceInput"&gt;
		&lt;part name="body" element="xsd1:TradePriceRequest"/&gt;
	&lt;/message&gt;

	<strong>&lt;message</strong> name="GetLastTradePriceOutput"&gt;
		&lt;part name="body" element="xsd1:TradePrice"/&gt;
	&lt;/message&gt;
</pre>
		</code>
		<!-- ====================== portType element ====================== -->
		<p>A port define the connection point to a web service. Can be compared to a function library, or a module, or a
			class</p>

		<p><code>portType</code> XML element is the most important one and defines:</p>
		<ul>
			<li>a web service</li>
			<li>the operations</li>
			<li>messages involved</li>
		</ul>
		<dt><code>Operation</code></dt>
		<dd>Can be compared to a function in a traditional program language
			<p>There are different operation types:</p>
			<dl>
				<dt>one-way</dt>
				<dd>The operation can receive a message but will not return a response</dd>
				<dt>request-response</dt>
				<dd>The operation
					<ul>
						<li>can receive a request</li>
						<li>will return a response</li>
					</ul>
				</dd>
				<dt>solicit-response</dt>
				<dd>The operation
					<ul>
						<li>can send a request</li>
						<li>will wait for a response</li>
					</ul>
				</dd>
				<dt>notification</dt>
				<dd>The operation
					<ul>
						<li>can send a message</li>
						<li>will wait for a response</li>
					</ul>
				</dd>
			</dl>
		</dd>
		<code>
<pre>
	<strong>&lt;portType</strong> name="StockQuotePortType"&gt;
		&lt;operation name="GetLastTradePrice"&gt;
			&lt;input message="tns:GetLastTradePriceInput"/&gt;
			&lt;output message="tns:GetLastTradePriceOutput"/&gt;
		&lt;/operation&gt;
	&lt;/portType&gt;
</pre>
		</code>
		<!-- ====================== binding element ====================== -->
		<p>By the <code>binding</code> element we specified encoding (over a specified transport such as HTTP, HTTPS, or
			SMTP</p>
		<code>
<pre>
	<strong>&lt;binding</strong> name="StockQuoteSoapBinding" type="tns:StockQuotePortType"&gt;
		&lt;soap:binding
			style="document"
			transport= "http://schemas.xmlsoap.org/soap/http"/&gt;
		&lt;operation name="GetLastTradePrice"&gt;
		&lt;soap:operation soapAction="http://example.com/GetLastTradePrice"/&gt;
			&lt;input&gt;
				&lt;soap:body use="literal"/&gt;
			&lt;/input&gt;
			&lt;output&gt;
				&lt;soap:body use="literal"/&gt;
			&lt;/output&gt;
		&lt;/operation&gt;
	&lt;/binding&gt;
</pre>
		</code>
		<!-- ====================== service element ====================== -->
		<p>By the <code>service</code> element we define the endpoint</p>
		<code>
<pre>
	<strong>&lt;service</strong> name="StockQuoteService"&gt;
		&lt;documentation&gt;My first service&lt;/documentation&gt;
		&lt;port name="StockQuotePort" binding="tns:StockQuoteBinding"&gt;
			&lt;soap:address location="http://example.com/stockquote"/&gt;
		&lt;/port&gt;
	&lt;/service&gt;
&lt;/definitions&gt;
</pre>
		</code>
	</section>
</articla>
<?php
   include $_SERVER["DOCUMENT_ROOT"] . '/includes/master-foot.inc.jsp';
?>
 
