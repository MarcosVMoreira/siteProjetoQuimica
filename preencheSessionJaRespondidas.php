<?php

    ini_set('default_charset', 'UTF-8');
    session_start();
    include_once("conexao.php");

    //Salva as perguntas uqe ja foram respondidas na sessao

    if(isset($_GET['valor'])) {

        $_SESSION['jaRespondidas'][] = $_GET['valor'];
        
    }
?>