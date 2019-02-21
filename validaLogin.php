<?php
    session_start();

    $login = $_POST['email'];
    $senha = $_POST['password'];
    include_once("conexao.php");
    $query = "SELECT * FROM usuario WHERE login_usuario='$login' AND senha_usuario= MD5('$senha')";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        
        if (empty($resultado)) {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
            header("Location: login.php");
        } else {
            $_SESSION['login_usuario'] = $resultado["login_usuario"];
            $_SESSION['perfil_usuario'] =  $resultado["perfil_usuario"];
            header("Location: index.php");
        }
    }
    /* close connection */
    $conexao->close();
?>