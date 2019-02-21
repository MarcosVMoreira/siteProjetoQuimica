<?php
    include_once("conexao.php");

	session_start();

	$pergunta = $_POST['pergunta'];
	$resposta = $_POST['elementoSelect'];

    $query = "INSERT INTO perguntas(pergunta, resposta) VALUES ('$pergunta', '$resposta')";

    if ($conexao->query($query) === TRUE) {
        header ("Location: cadastrar.php");
    } else {
        echo "Error: " . $query . "<br>" . $conexao->error;
    }

?>
