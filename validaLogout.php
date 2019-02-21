<?php
    session_start();

    unset($_SESSION['login_usuario'],
    $_SESSION['perfil_usuario']);  

    header("Location: login.php");
?>