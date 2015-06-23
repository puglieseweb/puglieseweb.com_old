<?php // ------------------- FUNZIONI LDAP ------------------- //
/*     
*   Elenco funzioni presenti:
* 	-	$connessione connection_ldap( void )
* 	-	$bind binding_ldap( $conn, $core_id, $password )
*	-	$valore_attributo user_attributes_ldap($conn, $core_id, $find_attribute)
* 			-->	Restituisce il VALORE dell'attributo passanto al terzo parametro
* 	-	$entry search_ldap($conn, $core_id)
* 
*   Author: Emanuele PUGLIESE
*/

// $connessione connection_ldap( void )
function connection_ldap(){
	// LDAP variables
	$host = "ldap://ids.mot.com";
	$port = "389";
	// Connecting  to LDAP
	$connessione = @ldap_connect($host, $port) or die ("Impossibile connettersi a $host <br />");
	return $connessione;
}

// $bind binding_ldap( $conn, $core_id, $password ) 
function binding_ldap( $conn, $core_id, $password ){
	// LDAP variables
	$path = "ou=people,ou=intranet,dc=motorola,dc=com";
	$dn = "motguid= $core_id, $path";

	//Binding to ldap server
	$bind = @ldap_bind($conn, $dn, $password);

	return $bind;
}

// Restituisce il VALORE dell'attributo passanto al terzo parametro
// $valore_attributo user_attributes_ldap($conn, $core_id, $find_attribute)
function get_user_attribute_ldap($conn, $core_id, $find_attribute){
		$filter = "(uid=$core_id)";
		$path = "ou=people,ou=intranet,dc=motorola,dc=com";
		$search = @ldap_search($conn, $path, $filter);
		if($search){
			$entry = ldap_first_entry($conn, $search);
			$attrs = @ldap_get_attributes($conn, $entry);
			return $attrs[$find_attribute][0];
		}
		return false;
}

function search_ldap($conn, $core_id){
	$filter = "(uid=$core_id)";

	$path = "ou=people,ou=intranet,dc=motorola,dc=com";
	$dn = "motguid= $core_id, $path";

	//Search to ldap server
	$search = @ldap_search($conn, $dn, $filter);
	$entry = @ldap_first_entry($conn, $search);
	//echo "$search $core_id<br />";
	return $entry;
}

/*
$time_start = getmicrotime();
$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "Did nothing in $time seconds";
*/
?>