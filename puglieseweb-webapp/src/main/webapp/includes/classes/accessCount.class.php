<?php
/*
*   A cosa serve:
*		Permette di conteggiare il numero di visite del portale.
*		Memorizza l'indirizzo ip e il core_id di chi si connette
*
*	Come si usa:
*		$nomeFile = "accessi.txt";
*		$pntCount=new UserCount($nomeFile);
*		$pntCount->getAccess();
*
*   Author: Emanuele PUGLIESE
*/

class UserCount{
	//dichiarazione delle propietà
	var $fileName;
	function UserCount($inValue){
		$this->fileName= $inValue;
	}

	//metodo che scrive nel file l'accesso
	function setAccess(){
        $tmpFile=@fopen($this->fileName,'a+');
	if($tmpFile){
		$infoUser=  $_SERVER['REMOTE_ADDR'] . " - " .
			$_SESSION['core_id'] . " - " .
			date( "F d Y H:i:s", time()) . "\n";
		fwrite($tmpFile,$infoUser);
		fclose($tmpFile);
		return true;
	}
	else{
		echo "<p span='error'>Il file \"" . $this->fileName . "\" non &#232; stato scritto!</p>";
		return false;
	}
    }

	//metodo che conta quanti accessi ci sono stati
	function getAccess(){
		if(is_file($this->fileName))
			echo '<br />Number of accesses in the last month: '.count(file($this->fileName));
	}
}
?>