<?php
//busca perguntas com base no grupo de perguntas recebido por parametro
ini_set('default_charset', 'UTF-8');

include_once("conexao.php");

if(isset($_GET['grupoParam']))
{  

    $data = array();

    $query = "SELECT * FROM perguntas WHERE grupo_perguntas = ".$_GET['grupoParam']."";
    if ($result = $conexao->query($query)) {

        $i = 0;

        while ($resultado = $result->fetch_assoc()) {
            $i++;
                switch ($i) {
                    case 1:
                        $dica1 = $resultado["dica_perguntas"];
                        break;
                    case 2:
                        $dica2 = $resultado["dica_perguntas"];
                        break;
                    case 3:
                        $dica3 = $resultado["dica_perguntas"];
                        break;
                    case 4:
                        $dica4 = $resultado["dica_perguntas"];
                        break;
                    case 5:
                        $dica5 = $resultado["dica_perguntas"];
                        break;
                    case 6:
                        $dica6 = $resultado["dica_perguntas"];
                        break;
                    case 7:
                        $dica7 = $resultado["dica_perguntas"];
                        break;
                    case 8:
                        $dica8 = $resultado["dica_perguntas"];
                        break;
                    case 9:
                        $dica9 = $resultado["dica_perguntas"];
                        break;
                    case 10:
                        $dica10 = $resultado["dica_perguntas"];
                        break;
                }
                $elemento = $resultado["resposta_perguntas"];
                $grupo = $resultado["grupo_perguntas"];
        }
        
        $data = array_merge($data, array("dica1"=>$dica1, "dica2"=>$dica2, "dica3"=>$dica3, "dica4"=>$dica4, "dica5"=>$dica5, "dica6"=>$dica6, "dica7"=>$dica7, 
        "dica8"=>$dica8, "dica9"=>$dica9, "dica10"=>$dica10, "elemento"=>$elemento, "grupo"=>$grupo));   
    }

   echo json_encode($data);
}

?>