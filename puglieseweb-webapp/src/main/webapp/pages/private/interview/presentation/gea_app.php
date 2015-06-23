<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

This application use the traditional 3 layers Spring
MVC Architecture:
<ol>
  <li>
    <p class="P1 c6"> 1)View + Controller ==&gt; GWT MVP2.1Â&nbsp; </p>
  </li>
</ol>
<p class="Standard"> (client + shared RequestFacory code) </p>
<ol>
  <li>
    <p class="P1 c6"> 2)Services ==&gt; business functionalities
defined into the domain or in Locator classesÂ&nbsp; </p>
  </li>
</ol>
<p class="Standard"> (server + shared RequestFacory code) </p>
<ol>
  <li>
    <p class="P1 c6"> 3)DAO ==&gt; JPA+DataNucleas implementation
communicating with Google Datastore Â&nbsp; </p>
  </li>
</ol>
<p class="Standard"> (server code) </p>
<p class="Standard"> Entity classes can be directly manipulated, then
updated and finally autonatically persisted by JPA. Entities are
transferred between the 3 layers. </p>
<p class="Standard"> Â&nbsp; </p>
<p class="P2"> Whach out </p>
<p class="P2"> Spring Beans VS Entity Beans </p>
<ul>
  <li>
    <p class="P3 c6"> ïƒ±.An entity bean represents a business object
in a persistent storage mechanismÂ&nbsp; </p>
  </li>
</ul>
<p class="P4"> Â&nbsp; </p>
<p class="P8"> Â&nbsp; </p>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
