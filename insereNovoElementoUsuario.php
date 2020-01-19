<?php

    include_once("conexao.php");

    session_start();

    $anterior = -1;
    $query0 = "SELECT numero_atomico FROM elementos WHERE elemento_nome = '" . $_GET['nome_elemento'] . "'";
    $result = $conexao->query($query0);
    $result = $result->fetch_assoc();
    $numero_atomico = $result['numero_atomico'];
    $query1 = "INSERT INTO elementos_usuario VALUES(" . $_GET['id_usuario'] . "," . $numero_atomico . ")";
    if($result = $conexao->query($query1)){
        echo "Ok";
    }else{
        echo "Error: " . $result;
    }
?>