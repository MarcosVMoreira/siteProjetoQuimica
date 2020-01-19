<?php

    include_once("conexao.php");

    session_start();

    $elementosJaRespondidos = array();

    $anterior = -1;
    $query1 = "SELECT e.elemento_nome FROM elementos_usuario eu LEFT JOIN usuario u ON eu.id_usuario = u.id_usuario LEFT JOIN elementos e ON e.numero_atomico = eu.numero_atomico WHERE u.login_usuario = '" . $_SESSION['login_usuario'] . "'";
    if($result = $conexao->query($query1)){
        while ($linha = $result->fetch_assoc()) {
            array_push($elementosJaRespondidos, $linha['elemento_nome']);
        }
    }
    echo json_encode($elementosJaRespondidos, JSON_UNESCAPED_UNICODE)
?>