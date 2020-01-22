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


        $ultimoGrupo = $ultimoGrupo+1;

        $dica1 = $_POST['dica1'];
        $dica2 = $_POST['dica2'];
        $dica3 = $_POST['dica3'];
        $dica4 = $_POST['dica4'];
        $dica5 = $_POST['dica5'];
        $dica6 = $_POST['dica6'];
        $dica7 = $_POST['dica7'];
        $dica8 = $_POST['dica8'];
        $dica9 = $_POST['dica9'];
        $dica10 = $_POST['dica10'];

        $resposta = $_POST['elemento'];

        echo $resposta;
        
        for ($i = 0; $i < 11; $i++) {
            switch ($i) {
                case 0:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica1', '$resposta', '$ultimoGrupo')";
                    break;
                case 1:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas)
                    VALUES ('$dica2', '$resposta', '$ultimoGrupo')";
                    break;
                case 2:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas)
                    VALUES ('$dica3', '$resposta', '$ultimoGrupo')";
                    break;
                case 3:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica4', '$resposta', '$ultimoGrupo')";
                    break;
                case 4:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica5', '$resposta', '$ultimoGrupo')";
                    break;
                case 5:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica6', '$resposta', '$ultimoGrupo')";
                    break;
                case 6:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica7', '$resposta', '$ultimoGrupo')";
                    break;
                case 7:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica8', '$resposta', '$ultimoGrupo')";
                    break;
                case 8:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica9', '$resposta', '$ultimoGrupo')";
                    break;
                case 9:
                    $query = "INSERT INTO perguntas(dica_perguntas, resposta_perguntas, grupo_perguntas) 
                    VALUES ('$dica10', '$resposta', '$ultimoGrupo')";
                    break;
                case 10:
                    $referencia1 = $_POST["referencia"];
                    $query = "INSERT INTO referencias_perguntas(grupo_perguntas, referencia) 
                    VALUES ('$ultimoGrupo', '$referencia1')";
                    break;
            }

            if (!$conexao->query($query) === TRUE) {
                echo "Error: " . $query . "<br>" . $conexao->error;
            }
        }

        $contadorReferencias = 0;
        while(isset($_POST['referencia' . strval($contadorReferencias)])){
            $referenciaAtual = $_POST['referencia' . strval($contadorReferencias)];
            $query = "INSERT INTO referencias_perguntas(grupo_perguntas, referencia) 
            VALUES ('$ultimoGrupo', '$referenciaAtual')";

            if (!$conexao->query($query) === TRUE) {
                echo "Error: " . $query . "<br>" . $conexao->error;
            }

            $contadorReferencias++;
        }

        header("Location: cadastrar.php");     

    } else {
        header("Location: index.php");        
    }
?>
