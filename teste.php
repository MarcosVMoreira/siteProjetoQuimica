<?php
	include_once("conexao.php");
	session_start();
    $encontrado = 0;


    // busca quantas linhas existem na tabela perguntas

    $query = "SELECT COUNT(*) as total FROM perguntas;";

    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        if (empty($resultado)) {
            $totalLinhas = 0;
            
        } else {
            $totalLinhas = $resultado['total'];;
        }
    }

    // busca o número maximo do grupo de perguntas

    $query = "SELECT MAX(grupo_perguntas) AS max FROM perguntas;";

    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        if (empty($resultado)) {
            header("Location: index.php");
        }
    }

    $max = $resultado["max"];

    echo "max".$max;

    //busca se realmente a pergunta com grupo gerado no random existe no banco. Se existir, eu pego as dicas dessa pergunta
    //e insiro nas variáveis de dicas
    

    while ($encontrado == 0) {

        $aleatorio = rand(0, $max);

        $perguntaJaRespondida = false;

        // se ja achei anteriormente esse valor aleatorio gerado,
        //gero novamente ate encontrar um valor que nao gerei ainda
        //utilizar lista para armazenar os dados

        for($indice = 0; $indice < sizeof($_SESSION['jaRespondidas']); $indice++) {
            echo "valor da lista ".$_SESSION['jaRespondidas'][$indice]." fim valor lista";
            if ($_SESSION['jaRespondidas'][$indice] == $aleatorio) {
                $perguntaJaRespondida = true;
            }
        }

        
        if (!$perguntaJaRespondida) {
            
            $query1 = "SELECT * FROM perguntas WHERE grupo_perguntas = ".$aleatorio."";

            if ($result = $conexao->query($query1)) {
                $i = 0;
                while ($resultado = $result->fetch_assoc()) {

                    if ($resultado["grupo_perguntas"] == 0) {
                        echo "<br>nao tem essa linha com valor ".$aleatorio;
                    } else {
                        echo "encontrei o elemento ".$resultado["resposta_perguntas"];
                        switch ($i) {
                            case 1:
                                $dica1 = $resultado["dica_perguntas"];
                                break;
                            case 2:
                                $dica2 = $resultado["dica_perguntas"];
                                break;
                            case 3:
                                $dica3 = $resultado["dica_perguntas"];
                                break;
                            case 4:
                                $dica4 = $resultado["dica_perguntas"];
                                break;
                            case 5:
                                $dica5 = $resultado["dica_perguntas"];
                                break;
                            case 6:
                                $dica6 = $resultado["dica_perguntas"];
                                break;
                            case 7:
                                $dica7 = $resultado["dica_perguntas"];
                                break;
                            case 8:
                                $dica8 = $resultado["dica_perguntas"];
                                break;
                            case 9:
                                $dica9 = $resultado["dica_perguntas"];
                                break;
                            case 10:
                                $dica10 = $resultado["dica_perguntas"];
                                break;
                        }
                        $elemento = $resultado["resposta_perguntas"];
                        $encontrado = 1;
                    }
                    
                } 
            }
        }

        if (sizeof($_SESSION['jaRespondidas']) == ($max+1)) {
            $encontrado = 1;
        }

    }

?>
