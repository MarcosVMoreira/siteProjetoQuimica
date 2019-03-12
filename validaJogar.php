<?php

    ini_set('default_charset', 'UTF-8');

    include_once("conexao.php");

    session_start();
    
    if($_POST['elemento'] != "") {

        $query = "SELECT MAX(grupo_perguntas) AS max FROM perguntas;";
		
        if ($result = $conexao->query($query)) {
            $resultado = $result->fetch_assoc();
            if (empty($resultado)) {
                header("Location: index.php");
            } else {
                $ultimoGrupo = $resultado["max"];
            }
        }


        $resposta = $_POST['elemento'];

        echo $resposta;



            if (!$conexao->query($query) === TRUE) {
                echo "Error: " . $query . "<br>" . $conexao->error;
            }
        }

        header("Location: cadastrar.php");     

    } else {
        header("Location: index.php");        
    }
?>
