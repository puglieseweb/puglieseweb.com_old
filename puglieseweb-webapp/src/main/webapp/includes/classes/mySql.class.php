<?PHP
class mysql {
	//connessione al DBMS
	function Connect($data){
		$connessione = @mysql_connect('localhost', 'root') or die(mysql_error());
		//selezione del database
		@mysql_select_db("$data", $connessione) or die(mysql_error());
	}

	//query sulla tabella
	function Query($sql){
		$sql = @mysql_query($sql) or die (mysql_error());
		return $sql;
	}

	//estrazione di un record
	function FetchRow($sql){
		$rows = @mysql_fetch_row($sql);
		return $rows;
	}

	//conteggio dei records
	function FetchNum($sql){
		$num = @mysql_num_rows($sql);
		return $num;
	}

	//estrazione dei records
	function FetchArray($sql){
		$array = @mysql_fetch_array($sql);
		return $array;
	}

	//chiusura della connessione
	function Close(){
		@mysql_close();
	}
}
?>