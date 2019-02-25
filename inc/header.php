<?php
    session_start();

?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <title>Site</title>

        <link href="css/carousel.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Site Quimica</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">

                    <?php
                        // Pega o nome da página atual
                        $pagina = basename($_SERVER['PHP_SELF'],'.php');
                        // Adiciona o arquivo css de acordo
                        if($pagina == "index"){
                            echo '<li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>'.
                            ' <li class="nav-item">
                            <a class="nav-link" href="jogar.php">Jogar</a>
                            </li>'.
                            '<li class="nav-item">
                            <a class="nav-link" href="cadastrar.php">Cadastrar pergunta</a>
                            </li>';
                        }else if($pagina == "jogar"){
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                            </li>'.
                            ' <li class="nav-item active">
                            <a class="nav-link" href="#">Jogar <span class="sr-only">(current)</span></a>
                            </li>'.
                            '<li class="nav-item">
                            <a class="nav-link" href="cadastrar.php">Cadastrar pergunta</a>
                            </li>';
                        } else if ($pagina == "cadastrar") {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                            </li>'.
                            ' <li class="nav-item">
                            <a class="nav-link" href="jogar.php">Jogar </a>
                            </li>'.
                            '<li class="nav-item active">
                            <a class="nav-link" href="#">Cadastrar pergunta<span class="sr-only">(current)</span></a>
                            </li>';
                        } else if ($pagina == "criarConta") {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                            </li>'.
                            ' <li class="nav-item">
                            <a class="nav-link" href="jogar.php">Jogar </a>
                            </li>'.
                            '<li class="nav-item">
                            <a class="nav-link" href="cadastrar.php">Cadastrar pergunta<span class="sr-only">(current)</span></a>
                            </li>';
                        }
                    ?>

                    </ul>
                    
                    <?php
                        if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
                        (isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != ""))) {
                            echo '<form class="form-inline mt-2 mt-md-0">
                            <a id="btnCriarConta" class="btn btn-outline-primary my-2 my-sm-0" href="criarConta.php">Criar conta</a> 
                        </form>';    
                        }                                                                              
                    ?>
                    <form class="form-inline mt-2 mt-md-0">
                        <?php
                            if ((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
                            (isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != "")) {
                                echo '<a class="btn btn-outline-danger my-2 my-sm-0" href="validaLogout.php">Sair</a>';    
                            } else {
                                echo '<a class="btn btn-outline-success my-2 my-sm-0" href="login.php">Entrar</a>';                               
                            }                                                                                  
                        ?>
                    </form>
                </div>
            </nav>
        </header>
        