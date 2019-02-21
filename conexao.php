<?php 
$host="localhost"; // endereço do servidor
$user="root"; // nome de usuario
$pass=""; //senha de acesso 
$db="tabelaperiodica"; // nome do banco de dados 
$conexao = mysqli_connect($host,$user,$pass) or die('Não foi possivel conectar: '.mysqli_error());
$selecao = mysqli_select_db($conexao,$db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
