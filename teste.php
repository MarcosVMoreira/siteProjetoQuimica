<?php
	include_once("conexao.php");
	session_start();
	
	echo "session : ".$_SESSION['jaRespondidas'];



	$elementos = explode(",", $_SESSION['jaRespondidas']);


	echo sizeof($elementos);

	for($i = 0; $i < sizeof($elementos); $i++) {
		
	}

?>
