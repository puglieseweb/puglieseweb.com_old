<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><div id="content">
<br>
<span class="Apple-style-span"
 style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; font-size: medium;">
<blockquote>
  <table
 summary="This table defines levels of access conferred by a modifier"
 border="1">
    <caption id="accesscontrol-levels"><b>Access Levels</b></caption><tbody>
      <tr>
        <th id="modifier">Modifier</th>
        <th id="class">Class</th>
        <th id="package">Package</th>
        <th id="subclass">Subclass</th>
        <th id="world">World</th>
      </tr>
      <tr>
        <td headers="modifier"><code>public</code></td>
        <td headers="class">Y</td>
        <td headers="package">Y</td>
        <td headers="subclass">Y</td>
        <td headers="world">Y</td>
      </tr>
      <tr>
        <td headers="modifier"><code>protected</code></td>
        <td headers="class">Y</td>
        <td headers="package">Y</td>
        <td headers="subclass">Y</td>
        <td headers="world">N</td>
      </tr>
      <tr>
        <td headers="modifier"><i>no modifier</i></td>
        <td headers="class">Y</td>
        <td headers="package">Y</td>
        <td headers="subclass">N</td>
        <td headers="world">N</td>
      </tr>
      <tr>
        <td headers="modifier"><code>private</code></td>
        <td headers="class">Y</td>
        <td headers="package">N</td>
        <td headers="subclass">N</td>
        <td headers="world">N</td>
      </tr>
    </tbody>
  </table>
</blockquote>
</span><br class="Apple-interchange-newline">
<br>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
