<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?>

<h1>Collections</h1>
<h3>HashMap vs ArrayList performance am I correct
</h3><p>When you need a structure from which you will be retrieving items randomly - use a HashMap</p>
<p>When you will be retrieving items in order (e.g. using a for loop) - use an ArrayList
</p>

<p>There's also a combined data structure, the LinkedHashMap, which offers fast access to arbitrary elements as well as predictable ordering.
</p>
<p>However, it's worth noting that ArrayList and HashMap are only two implementations of the List and Map interfaces, respectively. There are other implementations of each that might be more suitable for more specific requirements.</p>

<p>LinkedList might provide higher performance than an ArrayList for certain queueing/dequeueing requirements.</p>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>