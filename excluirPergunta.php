<?php

   session_start();
   
   include_once("conexao.php");

   $grupo = $_GET["grupo"];
   
   $query = "DELETE FROM perguntas WHERE grupo_perguntas = " . $grupo;

   if ($conexao->query($query) === TRUE) {
      echo "Ok1";
   } else {
      echo "Error: " . $query . "<br>" . $conexao->error;
   }

   $query = "DELETE FROM referencias_perguntas WHERE grupo_perguntas = " . $grupo;

    if ($conexao->query($query) === TRUE) {
        echo "Ok2";
    } else {
        echo "Error: " . $query . "<br>" . $conexao->error;
    }
      
?>
