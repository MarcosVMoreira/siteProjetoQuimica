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
			<h3>Entre com sua conta para cadastrar novas perguntas</h3>
			<div class="row align-items-center">
				Para cadastrar novas perguntas, você deve criar sua conta e/ou entrar.
			</div>
		</form>
	</div>
</div>

<?php
	} else {

		$query = "SELECT MAX(grupo_perguntas) AS max FROM perguntas;";
		
		if ($result = $conexao->query($query)) {
			$resultado = $result->fetch_assoc();
			if (empty($resultado)) {
				header("Location: index.php");
			} else {
				echo $resultado["max"];
			}
		}

?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaPergunta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<h3>Cadastrar dicas</h3>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Elemento resposta:</label>
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" name="elemento" id="elemento" placeholder="Insira o elemento" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 1:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica1" id="dica1" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 2:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica2" id="dica2" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 3:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 4:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 5:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 6:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 7:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 8:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 9:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row align-items-center pt-1">
				<div class="col-md-1">
					<label for="dica" class="control-label">Dica 10:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica" required autofocus/>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
}
?>

