<?php
//busca perguntas com base no grupo de perguntas recebido por parametro
ini_set('default_charset', 'UTF-8');

include_once("conexao.php");

if(isset($_GET['idUsuario']))
{  

    $query = "UPDATE usuario SET pontuacao_usuario = pontuacao_usuario + 1 WHERE id_usuario = ".$_GET['idUsuario'].";";

    if ($result = $conexao->query($query)) {
        echo "true";
    } else {
        echo "false";
    }
} 

?>