<?php

    ini_set('default_charset', 'UTF-8');
    session_start();
    include_once("conexao.php");

    if(isset($_GET['valor']) && isset($_SESSION['jaRespondidas'])) {
        if ($_SESSION['jaRespondidas'] == "") {
			$_SESSION['jaRespondidas'] = $_GET['valor'];
		} else {
            $_SESSION['jaRespondidas'] = $_SESSION['jaRespondidas'].",".$_GET['valor'];
        }
    }

?>