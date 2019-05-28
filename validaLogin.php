<?php
    session_start();

    $loginLembrete = (isset($_POST['email'])) ? $_POST['email'] : '';
    $senhaLembrete = (isset($_POST['password'])) ? $_POST['password'] : '';
    $lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';

    $login = $_POST['email'];
    $senha = $_POST['password'];
    include_once("conexao.php");
    $query = "SELECT * FROM usuario WHERE email_usuario='$login' AND senha_usuario= MD5('$senha')";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        
        if (empty($resultado)) {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
            header("Location: login.php");
        } else {
            $_SESSION['login_usuario'] = $resultado["login_usuario"];
            $_SESSION['perfil_usuario'] =  $resultado["perfil_usuario"];
            $_SESSION['id_usuario'] =  $resultado["id_usuario"];
            $_SESSION['jaRespondidas'] = array();

            if($lembrete == 'remember-me'):
 
                $expira = time() + 60*60*24*30; 
                setCookie('CookieLembrete', base64_encode('remember-me'), $expira);
		        setCookie('CookieLogin', base64_encode($loginLembrete), $expira);
		        setCookie('CookieSenha', base64_encode($senhaLembrete), $expira);
      
             else:
      
                setCookie('CookieLembrete');
                setCookie('CookieLogin');
                setCookie('CookieSenha');
      
             endif;

            header("Location: index.php");
        }
    }
    /* close connection */
    $conexao->close();
?>