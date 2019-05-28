<?php

    include_once("conexao.php");

    session_start();

    $elementosJaRespondidos = array();

    $anterior = -1;
    for ($i = 0; $i < sizeof($_SESSION['jaRespondidas']); $i++) {

        $query1 = "SELECT resposta_perguntas, grupo_perguntas FROM perguntas WHERE 
        grupo_perguntas = ".$_SESSION['jaRespondidas'][$i]."";
        
        if ($result = $conexao->query($query1)) {
            while ($resultado = $result->fetch_assoc()) {
                $atual = $resultado["grupo_perguntas"];
                if ($resultado["grupo_perguntas"] == 0) {
                    //throw no erro
                } else if ($anterior != $atual) {

                    $elementosJaRespondidos[] = $resultado["resposta_perguntas"];

                    $anterior = $atual;
                            
                }
            } 
        }
    }

    echo json_encode($elementosJaRespondidos, JSON_UNESCAPED_UNICODE);
?>