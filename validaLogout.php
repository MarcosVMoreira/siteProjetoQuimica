<?php
    session_start();
    session_unset();
    session_destroy();

    /*unset($_SESSION['login_usuario'],
    $_SESSION['perfil_usuario']);  */

    header("Location: login.php");
?>