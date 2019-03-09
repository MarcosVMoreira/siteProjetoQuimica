<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados
	


	if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
	(isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != ""))) {
?>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaPergunta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
            <h3>Entre com sua conta para jogar</h3>
            
			<div class="row">
				Para utilizar o sistema, você deve criar sua conta e/ou entrar.
			</div>
		
		</form>
	</div>
</div>

<?php
	} else {

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
	

?>

<script type="text/javascript">
	var dica1 = "<?php echo $dica1 ?>";
	var dica2 = "<?php echo $dica2 ?>";
	var dica3 = "<?php echo $dica3 ?>";
	var dica4 = "<?php echo $dica4 ?>";
	var dica5 = "<?php echo $dica5 ?>";
	var dica6 = "<?php echo $dica6 ?>";
	var dica7 = "<?php echo $dica7 ?>";
	var dica8 = "<?php echo $dica8 ?>";
	var dica9 = "<?php echo $dica9 ?>";
	var dica10 = "<?php echo $dica10 ?>";
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaPergunta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
            <h3>Jogar</h3>

			<div class="card-body">
				<ul class="list-group" id="listaDicas">
				</ul>
            </div>
            
			<div class="row align-items-center">
				<div class="col-md-1">
					<label for="pergunta" class="control-label">Resposta:</label>
				</div>
				<div class="input-group col-md-6">
					<input type="text" class="form-control" name="elemento" id="elemento" placeholder="Insira o elemento resposta" required autofocus/>
					<button type="submit" id="btnResponder" class="btn btn-success">Responder</button>				
				</div>
				<div class="col-md-5">
					<button type="button" class="btn btn-primary" id="dica">Pedir nova dica</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
}
?>

