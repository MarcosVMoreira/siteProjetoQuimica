<?php

   session_start();
   
   include_once("conexao.php");

   $nome = $_POST["nome"];
   $email = $_POST["email"];
   $login = $_POST["login"];
   $senha = $_POST["senha"];
   $perfil = "Aluno";
   
   $query = "INSERT INTO usuario(nome_usuario, login_usuario, senha_usuario, 
   perfil_usuario, email_usuario, pontuacao_usuario) VALUES 
   ('$nome', '$login', MD5('$senha'), '$perfil', '$email', '0')";


   if ($conexao->query($query) === TRUE) {
      header ("Location: index.php");
   } else {
      echo "Error: " . $query . "<br>" . $conexao->error;
   }
      
?>
