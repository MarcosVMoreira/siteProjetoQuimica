



<?php
	include_once("conexao.php");

	$encontrado = 0;

	$query = "SELECT MAX(grupo_perguntas) AS max FROM perguntas;";

	if ($result = $conexao->query($query)) {
		$resultado = $result->fetch_assoc();
		if (empty($resultado)) {
			header("Location: index.php");
		}
	}

	$max = $resultado["max"];

	//busca se realmente a pergunta com grupo gerado no random existe no banco. Se existir, eu pego as dicas dessa pergunta
	//e insiro nas variáveis de dicas

	$encontrado = 0;

	$query = "SELECT MAX(grupo_perguntas) AS max FROM perguntas;";

	if ($result = $conexao->query($query)) {
		$resultado = $result->fetch_assoc();
		if (empty($resultado)) {
			header("Location: index.php");
		}
	}

	$max = $resultado["max"];

	//busca se realmente a pergunta com grupo gerado no random existe no banco. Se existir, eu pego as dicas dessa pergunta
	//e insiro nas variáveis de dicas

	while ($encontrado == 0) {
		$aleatorio = rand(0, $max);

		$query1 = "SELECT * FROM perguntas WHERE grupo_perguntas = ".$aleatorio."";

		if ($result = $conexao->query($query1)) {
			$i = 0;
			while ($resultado = $result->fetch_assoc()) {
				$i++;
				if ($resultado["grupo_perguntas"] == 0) {
					echo "<br>nao tem essa linha com valor ".$aleatorio;
				} else {
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
					
					$encontrado = 1;
				}
			} 
		} 
	}

	echo "Dica 1: ".$dica1;
	echo "Dica 2: ".$dica2;
	echo "Dica 3: ".$dica3;
	echo "Dica 4: ".$dica4;
	echo "Dica 5: ".$dica5;
	echo "Dica 6: ".$dica6;
	echo "Dica 7: ".$dica7;



?>
