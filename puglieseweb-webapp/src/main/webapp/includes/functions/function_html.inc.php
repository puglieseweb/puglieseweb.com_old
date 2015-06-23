<?php // ------------------- FUNZIONI XHTML ------------------- //
/*     
*   Elenco funzioni presenti:
* 	-	void html_form( void )
* 	-	void print_table_header( $col0, $col1, $col2, $col3, $col4, $col5, $caption )
*	-	void function print_table_row($disk, $usage, $quota, $css_class)
* 	-	void print_table_footer( void )
* 
*   Author: Emanuele PUGLIESE
*/

// void html_form( void ) 
function html_form(){
$form=<<<FORM
	<form id="form" action="checkoldview.php" method="post">
		<label for="f-day">Risali al giorno</label>
		<input id="f-day" type="text" name="days"  size="9" maxlength="9"><br />
		<input type="submit" name="submit" value="Search old views">
	</form>
FORM;
echo $form;
}

// void print_table_header( $col0, $col1, $col2, $col3, $col4, $col5, $caption ) 
function print_table_header( $col0, $col1, $col2, $col3, $col4, $col5, $caption ){
$header=<<<TABLE
	<table summary=$caption>
		<caption>$caption</caption>
	
<thead><tr><td>$col0</td><td>$col1</td><td>$col2</td><td>$col3</td><td>$col4</td
><td>$col5</td></tr></thead>
		<tbody>
TABLE;
echo $header;
}

// void function print_table_row($disk, $usage, $quota, $css_class);
function print_table_row($col0, $col1, $col2, $col3, $col4, $col5, $css_class){
$row=<<<TABLE
		<tr $css_class>
			<td>$col0</td>
			<td>$col1</td>
			<td>$col2</td>
			<td>$col3</td>
			<td>$col4</td>
			<td>$col5</td>
		</tr>
TABLE;
echo $row;
}

// void print_table_footer(void);
function print_table_footer(){
$footer=<<<TABLE
		</tbody>
	</table>
TABLE;
echo $footer;
}
?>