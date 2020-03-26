<?php

    ini_set('default_charset', 'UTF-8');

    include_once("conexao.php");

    session_start();
    
    if($_GET['elementoModal'] != "") {

        $dica1 = $_GET['dica1Modal'];
        $dica2 = $_GET['dica2Modal'];
        $dica3 = $_GET['dica3Modal'];
        $dica4 = $_GET['dica4Modal'];
        $dica5 = $_GET['dica5Modal'];
        $dica6 = $_GET['dica6Modal'];
        $dica7 = $_GET['dica7Modal'];
        $dica8 = $_GET['dica8Modal'];
        $dica9 = $_GET['dica9Modal'];
        $dica10 = $_GET['dica10Modal'];
        $elemento = $_GET['elementoModal'];
        $grupo = $_GET['grupoPerguntas'];
        $referenciaModal = $_GET['referenciaModal'];

        $data = array();

        $query = "SELECT * FROM perguntas WHERE grupo_perguntas = ".$grupo."";

        $i = 0;

        if ($result = $conexao->query($query)) {
            $referencia = "";
            while ($resultado = $result->fetch_assoc()) {

                $i++;
                switch ($i) {
                    case 1:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica1."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 2:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica2."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 3:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica3."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 4:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica4."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 5:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica5."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 6:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica6."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 7:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica7."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 8:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica8."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 9:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica9."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                    case 10:
                        $queryUpdate = "UPDATE perguntas SET dica_perguntas='".$dica10."' WHERE id_perguntas=".$resultado['id_perguntas']."";
                        break;
                }

                $conexao->query($queryUpdate);

            }
        }   

        $referencia = array();

        $query = "DELETE from referencias_perguntas where grupo_perguntas=".$grupo.";";

        $conexao->query($query);

        $explodedRef = $referenciaModal;

        $referencia = explode("#", $explodedRef);

        foreach ($referencia as $value) {
            if (!(strcmp($value, "") == 0) && !(strcmp($value, " ") == 0)) {
                
                $refQuery = "INSERT INTO referencias_perguntas (grupo_perguntas,referencia) VALUES(".$grupo.",'".$value."')";
    
                $result = $conexao->query($refQuery); 

            }
        }

        $data = array_merge($data, array("dica1"=>$dica1, "dica2"=>$dica2, "dica3"=>$dica3, "dica4"=>$dica4, "dica5"=>$dica5, "dica6"=>$dica6, "dica7"=>$dica7, 
        "dica8"=>$dica8, "dica9"=>$dica9, "dica10"=>$dica10, "elemento"=>$elemento, "grupo"=>$grupo, "referenciaModal"=>$referenciaModal)); 

        echo json_encode($data, JSON_UNESCAPED_UNICODE);

    } else {
        //header("Location: index.php");      
        echo "Erro ao conectar com banco de dados.";  
    }
?>

