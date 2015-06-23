<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>
<h1>WebAccessibility</h1>
<h1>Overiview</h1>
<strong>Web accessibility means that people with disabilities can use
the Web</strong>. More specifically, Web accessibility means that
people with disabilities can perceive, understand, navigate, and
interact with the Web, and that they can contribute to the Web. Web
accessibility also benefits others, including <a shape="rect">older
people</a> with changing abilities due to aging.<br>
<br>
<h3> Disability Discrimination Act (<acronym title="DDA">DDA</acronym>)</h3>
The <acronym>DDT </acronym>ensures that websites are accessible to
blind and disabled users.<br>
<br>
<a title="Timeline of the Act"
 href="http://www.drc-gb.org/open4all/law/code.asp">Section III of the
DDA</a>, which refers to accessible websites, came into force on <strong>1st
October 1999</strong> and the <a
 href="http://www.hmso.gov.uk/si/si2002/20020720.htm"> Code of Practice</a>
for this section of the DDA <strong>was published on 27th May 2002</strong>.
This means that the majority of websites have been <strong>in breach
of the law since then<br>
</strong>
<hr style="width: 100%; height: 2px;"> <strong> <br>
</strong>
<p> The relevant quotes from the 175-page Code of Practice are:</p>
<li>2.2 (p7): �&#8364;&#339;The Disability Discrimination Act makes it unlawful
for a <strong>service </strong>provider to discriminate against a
disabled person by refusing to provide any service which it provides to
members of the public.�&#8364;&#157;</li>
<li>4.7 (p39): �&#8364;&#339;<strong>From 1st October 1999</strong> a service
provider has to<strong> take reasonable</strong> steps to change a
practice which makes it unreasonably difficult for disabled people to
make use of its services.�&#8364;&#157;</li>
<li>2.13 - 2.17 (p11-13): �&#8364;&#339;What services are affected by the
Disability Discrimination Act? An airline company provides a flight
reservation and booking service to the public on its website. This is a
  <strong>provision of a service </strong>and is subject to the act.�&#8364;&#157;</li>
<li>5.23 (p71): �&#8364;&#339;For people with <strong>visual impairments</strong>,
the range of auxiliary aids or services which it <em>might be
reasonable</em> to provide to ensure that services are accessible might
include ... <strong>accessible websites</strong>.�&#8364;&#157;</li>
5.26 (p68): �&#8364;&#339;For people with <strong>hearing disabilities</strong>,
the range of auxiliary aids or services which it might be reasonable to
provide to ensure that services are accessible might include ... <strong>accessible
websites</strong>.�&#8364;&#157;
<hr style="width: 100%; height: 2px;">
<p> A provider <strong>can be sued </strong>for being in breach of
the DDA.</p>
<p> The <acronym title="Disability Rights Commission">DRC</acronym>
launched a formal investigation into 1000 websites, of which over 80%
were next to impossible for disabled people to use. They issued a stern
warning that organisations will face legal action under the <acronym
 title="Disability
              Discrimination Act">DDA</acronym> and
the threat of unlimited compensation payments if they fail to make
websites accessible for people with disabilities.</p>
<hr style="width: 100%; height: 2px;"> <br>
<p> It's widely believed that if, or perhaps more appropriately <em>when</em>,
a case makes it to court that the <strong><acronym
 title="Worldwide Web Consortium">W3C</acronym> accessibility guidelines</strong>
will be used to assess a website's accessibility and ultimately decide
the outcome of the case. <br>
</p>
<p> To further complicate matters, the <acronym
 title="Worldwide Web Consortium">W3C</acronym> offers three different
levels of compliance. <br>
<strong>Priority 1 guidelines</strong>, (which <em>must</em> be
satisfied according to the <acronym
 title="Worldwide Web
              Consortium">W3C</acronym>) will
almost certainly have to be adhered to.<br>
<!-- Changed by: Ian B. Jacobs,  7-Dec-1998 --> </p>
<h2> Priority 1</h2>
<h3> In general</h3>
<ul>
  <li>1.1 <strong>Provide a text equivalent for every non-text element
    </strong>(e.g., via "alt", "longdesc", or in element content). This
includes: images, graphical representations of text (including
symbols), image map regions, animations (e.g., animated GIFs), applets
and programmatic objects, ascii art, frames, scripts, images used as
list bullets, spacers, graphical buttons, sounds (played with or
without user interaction), stand-alone audio files, audio tracks of
video, and video.&nbsp; <br>
  </li>
  <li>2.1 Ensure that all information conveyed with color is also <strong>available
without color</strong>, for example from context or markup.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>4.1 Clearly <strong>identify changes in the natural language</strong>
of a document's text and any text equivalents (e.g., captions).
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>6.1 Organize documents so they may be read without style sheets.
For example, when an HTML document is rendered without associated style
sheets, it must still be possible to read the document.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>6.2 Ensure that equivalents for dynamic content are updated when
the dynamic content changes. &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>7.1 Until user agents allow users to control flickering, <strong>avoid
causing the screen to flicker</strong>. &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li>14.1 Use the <strong>clearest </strong>and simplest language
appropriate for a site's content. &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>
  </li>
</ul>
<h3> If you use images and image maps <br>
</h3>
<ul>
  <li>1.2 Provide redundant text links for each active region of a
server-side image map. &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</li>
  <li>9.1 Provide client-side image maps instead of server-side image
maps except where the regions cannot be defined with an available
geometric shape. &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;</li>
</ul>
<h3> And if you use tables</h3>
<ul>
  <li>5.1 For data tables, <strong>identify row and column headers</strong>.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;</li>
  <li>5.2 For data tables that have two or more logical levels of row
or column headers, use markup to associate data cells and header cells.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;</li>
</ul>
<h3> And if you use frames</h3>
<ul>
  <li>12.1 Title each frame to facilitate frame identification and
navigation. &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;</li>
</ul>
<h3> And if you use applets and scripts</h3>
<ul>
  <li>6.3 Ensure that pages are usable when scripts, applets, or other
programmatic objects are turned off or not supported. If this is not
possible, provide equivalent information on an alternative accessible
page. &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;</li>
</ul>
<h3> And if you use multimedia<br>
</h3>
<ul>
  <li>1.3 Until user agents can automatically read aloud the text
equivalent of a visual track, provide an auditory description of the
important information of the visual track of a multimedia presentation.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;</li>
  <li>1.4 For any time-based multimedia presentation (e.g., a movie or
animation), synchronize equivalent alternatives (e.g., captions or
auditory descriptions of the visual track) with the presentation.
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;</li>
</ul>
<h3> And if all else fails</h3>
<ul>
  <li>11.4 If, after best efforts, you cannot create an accessible
page, provide a link to an alternative page that uses W3C technologies,
is accessible, has equivalent information (or functionality), and is
updated as often as the inaccessible (original) page. </li>
</ul>
<br>
<h2> Priority 2<br>
</h2>
<p> &nbsp;<br>
Priority 2 guidelines (which <em>should</em> be satisfied and are the <a
 href="http://www.disabilityworld.org/09-10_02/access/internetaccess.shtml">
<acronym title="European Union">EU</acronym> recommended</a><sup
 class="printOnly">3</sup> level of compliance), or some part of, will
probably need to be adhered to too.</p>
<p> The courts will also no doubt take guidance from the outcome of an
Australian case in 2000, when a blind man successfully <a
 title="Case summary" href="http://www.contenu.nu/socog.html"> sued the
Sydney Olympics</a><sup class="printOnly">4</sup> organising committee
over their inaccessible website. (The Australian Disability
Discrimination Act quite closely resembles that of the UK's.) UK courts
may also take into account the New York <a
 href="http://www.out-law.com/page-4823">case against Ramada.com and
Priceline.com</a><sup class="printOnly">5</sup>, who were also
successfully sued over the accessibility of their websites.</p>
<br>
<hr style="width: 100%; height: 2px;">
<h1> W3C Guidlines</h1>
<h2> Input rules</h2>
<p> Input should be always used with labels:<br>
</p>
<ol>
  <li><code>select </code><code>dropdowns </code>and <code>textareas
    </code><span class="underline"> should precede the input</span>, </li>
  <li><code>radio buttons</code> and <code>checkboxes </code><span
 class="underline">should follow the input</span>, as follows:</li>
</ol>
<h2> Form rules</h2>
<p> Related form elements should be grouped together inside <code>&lt;fieldset&gt;&lt;/fieldset&gt;</code>
tags and have a <code>&lt;legend&gt;</code> just inside them to
describe what the fieldset contains.<br>
</p>
<h3> Highlighting the current field</h3>
<p> It's useful to use colour to highlight the current field so users
can easily see their current location within the form (click into the
below field to see this in action):</p>
<p> We can assign the <code>input:focus</code> pseudo class as most
browsers now understand this (Firefox, Chrome, Safari and IE8):</p>
<p> <code>input:focus {<br>
<span class="ten">background: #edf8fa;</span> <span class="ten">border:
2px solid #666;</span> }<br>
<br>
</code> </p>
<h2> Highlighting required fields</h2>
<p> If a field is required, it's good practice to highlight that field
with an icon. The most recognisable symbol, the asterisk (*), should be
clearly placed before the required field.</p>
<h2> Utilising sticky form fields</h2>
<p> Sticky forms refers to the practice of re-posting form data back
into the fields if the form has failed to submit. This is especially
important for large forms (e.g. job and finance applications) because
there are likely to be some errors due to the sheer length and
complexity of it.<br>
</p>
<h2> Avoiding reset buttons</h2>
<p> Reset buttons shouldn't be used (unless absolutely necessary -
there's usually a better way) because of users inadvertently clicking
on them, and losing all the data they just input - usually frustrating
them enough that they'll simply leave your site or not complete your
form. This is especially important in the case of bigger forms, though
can be equally frustrating if users are in a rush to fill out the form.</p>
<br>
The term "disability" is used very generally in this document. Some
people with conditions described below would not consider themselves to
have disabilities. They may, however, have limitations of sensory,
physical or cognitive functioning which can affect access to the Web.
These may include injury-related and aging-related conditions, and can
be temporary or chronic.<br>
<br>
<br>
<a href="http://www.w3schools.com/html5/html5_ref_globalattributes.asp">Html5
- Supported Global attributes</a><br>
<a href="http://www.w3.org/WAI/EO/Drafts/PWD-Use-Web/#diff">
http://www.w3.org/WAI/EO/Drafts/PWD-Use-Web/#diff</a><br>
<a href="http://www.w3.org/WAI/EO/Drafts/PWD-Use-Web/#usage">http://www.w3.org/WAI/EO/Drafts/PWD-Use-Web/#usage</a><br>
<a href="http://www.w3.org/WAI/intro/accessibility.php">http://www.w3.org/WAI/intro/accessibility.php</a><br>
<p> A range of Accessibility aids, including:</p>
<ul>
  <li>Ability to adjust the text size</li>
  <li>Access Keys</li>
  <li>Tabindexing</li>
</ul>
<br>
<h1><acronym title="Asynchronous JavaScript and XML">AJAX</acronym>
accessibility for websites</h1>
<h2>Good Points</h2>
<br>
<ul>
  <li>Auto-suggest dropdowns can help both users with reading
difficulties and motor impairments. e.g. City and airport suggestions
are offered as users enter text</li>
  <li>Drag &amp; drop sliders can help users with reading difficulties
due to their illustrative nature e.g. A click-and-drag slider is used
to filter search criteria </li>
</ul>
<h2>Insues caused by Ajax<br>
</h2>
<br>
<p><acronym title="Asynchronous JavaScript and XML">AJAX</acronym> and
JavaScript are usually used to update page content. When this happens <strong>screen
readers</strong> respond in a variety of different ways, depending on
both the screen reader and the browser:</p>
<ul>
  <li>Screen readers aren't aware of the changes so will read out the
unmodified version of the page. This means screen reader users don't
get the updated content of the page.</li>
  <li><strong>Screen readers</strong> are aware of the changes but will
only read the modified content when they naturally reach it. This is
fine unless the modified content precedes users' current location. If
this happens, they're unlikely to hear this content.</li>
  <li><strong>Screen readers</strong> start reading the modified page
but from the very top. This means that users have to essentially listen
to all of the page content again. It can be difficult for these users
to know which content has been updated and where in the page this
content is. </li>
  <li><strong>Screen readers </strong>are<span
 style="font-weight: bold;" class="underline"> automatically taken to
the modified content</span> so users instantly know that page content
has been updated - this can however severely <span
 style="font-weight: bold;" class="underline">disorientate users</span>.</li>
</ul>
<p><strong>Screen magnifier</strong> users might not notice changes
that have occurred outside the areas they're interacting with. They can
therefore miss out on important information <span
 style="font-weight: bold;" class="underline">especially if the changed
content takes place above their current location on the page</span>.</p>
<p>Finally, <acronym title="Asynchronous JavaScript and XML">AJAX</acronym>
requires <strong>JavaScript</strong> to be enabled. Although assistive
technologies can now handle many uses of JavaScript they don't all
provide complete support.</p>
<br>
<h2>Recommendations for <acronym
 title="Asynchronous
              JavaScript and XML">AJAX</acronym>
and accessibility</h2>
<p>There's one key question to consider when planning the development
of a website and the use of <acronym
 title="Asynchronous JavaScript and XML">AJAX</acronym>: Is there a
real need to use <acronym
 title="Asynchronous
              JavaScript and XML">AJAX</acronym>?.
If the answer is yes, then ensure the following is true to ensure <acronym
 style="font-weight: bold;"
 title="Asynchronous JavaScript
              and XML">AJAX</acronym><span
 style="font-weight: bold;" class="strong"> accessibility is optimised</span>:</p>
<dl class="li">
  <dt style="font-weight: bold;">Inform users early in the page that
dynamic updates will occur</dt>
  <dd>Not all users are familiar with <acronym
 title="Asynchronous JavaScript and XML">AJAX</acronym> interfaces. <span
 style="font-weight: bold;" class="important">Let them know that
changes may take place so they can expect and look for these changes</span>.
This is particularly important for screen reader and magnifier users as
they may be unaware that changes have taken place.</dd>
  <dt>Highlight the areas that have been updated</dt>
  <dd>Using subtle changes to highlight areas that have changed, for
just a short period of time, can be most helpful. It will inform users,
in particular those with reading difficulties that updates have taken
place.</dd>
  <dt>Don't change the focus</dt>
  <dd>Do not move the focus of the page to where the change has taken
place. Changing the focus can be disrupting for screen reader and
magnifier users especially if there are no mechanisms to return to the
previous position.</dd>
  <dt>Offer the option to disable automatic updates</dt>
  <dd>Allow users to manually request page updates, for example by
providing links and/or form buttons to refresh the page on-demand.
Screen reader and magnifier users may be unaware of on-the-page
changes. It can also be difficult for users with reading difficulties
to keep up with automatic updates. If possible, store users'
preferences for requesting page updates for future visits to the site.</dd>
  <dt>Ensure the site works if JavaScript isn't enabled</dt>
  <dd>Build a standard application then overlay it with <acronym
 title="Asynchronous JavaScript and XML">AJAX</acronym> to improve its
functionality. If JavaScript is disabled or not available then users
will still be able to use the site.</dd>
</dl>
<p>In case of an <strong>advanced <acronym
 title="Asynchronous JavaScript and XML">AJAX</acronym> application</strong>,
consider providing an <acronym title="Hypertext Markup Language">HTML</acronym>
alternative. If the <acronym
 title="Asynchronous JavaScript
              and XML">AJAX</acronym>
application is impossible to use by group of users (e.g. if it relies
on the use of a mouse, such as the drag &amp; drop sliders) then a link
to an <acronym title="Hypertext Markup Language">HTML</acronym>
alternative is a must.<br>
</p>
<h1>HTML 5 </h1>
<span style="text-decoration: underline;"><em>HTML5</em></span> is what
will define the web and would love to see more developers adopt it
instead of Flash.
<h1>Glossary</h1>
<dl>
  <dt><acronym>W3C</acronym></dt>
  <dd>
    <p> This is the Internet governing body and its <a
 href="http://www.w3.org/TR/WAI-WEBCONTENT/full-checklist.html"> web
accessibility guidelines</a><sup class="printOnly">2</sup> can be found
on its website.</p>
  </dd>
  <dt>Milk</dt>
  <dd> - white cold drink</dd>
</dl>
<br>
<br>
<br>
Screen readers and other assistive technology rely on having
access to a Document Object Model to make sense of a docu
ment. No DOM, no access. <br>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
