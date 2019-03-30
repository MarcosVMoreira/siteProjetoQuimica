<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados
  
	if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
	(isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != ""))) {
	   ?>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaCadastrar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<h3>Entre com sua conta para cadastrar novas perguntas</h3>
			<div class="row align-items-center">
				Para cadastrar novas perguntas, você deve criar sua conta e/ou entrar.
			</div>
		</form>
	</div>
</div>

<?php
	} else {

?>

<div class="container-fluid">
	<div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
		<form action="validaCadastrar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<div class="card mt-5">
				<div class="card-header">
					Cadastrar pergunta
				</div>
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Elemento:</label>
								<input type="text" class="form-control" name="elemento" id="elemento" placeholder="Insira o elemento" autofocus/>
							</div>
						</div>
					</div>

					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 1:</label>
								<input type="text" class="form-control" name="dica1" id="dica1" placeholder="Insira a dica"/>
							</div>
						</div>

						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 2:</label>
								<input type="text" class="form-control" name="dica2" id="dica2" placeholder="Insira a dica"/>
							</div>
						</div>
					</div>

					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 3:</label>
								<input type="text" class="form-control" name="dica3" id="dica3" placeholder="Insira a dica"/>
							</div>
						</div>

						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 4:</label>
								<input type="text" class="form-control" name="dica4" id="dica4" placeholder="Insira a dica"/>
							</div>
						</div>
					</div>

					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 5:</label>
								<input type="text" class="form-control" name="dica5" id="dica5" placeholder="Insira a dica"/>
							</div>
						</div>

						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 6:</label>
								<input type="text" class="form-control" name="dica6" id="dica6" placeholder="Insira a dica"/>
							</div>
						</div>
					</div>


					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 7:</label>
								<input type="text" class="form-control" name="dica7" id="dica7" placeholder="Insira a dica"/>
							</div>
						</div>

						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 8:</label>
								<input type="text" class="form-control" name="dica8" id="dica8" placeholder="Insira a dica"/>
							</div>
						</div>
					</div>



					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 9:</label>
								<input type="text" class="form-control" name="dica9" id="dica9" placeholder="Insira a dica"/>
							</div>
						</div>

						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 10:</label>
								<input type="text" class="form-control" name="dica10" id="dica10" placeholder="Insira a dica"/>
							</div>
						</div>
					</div>

					<div class="row align-items-center">
						<div class="col-md-2">
							<button type="submit" class="btn btn-success mt-2 btn-block">Cadastrar</button>
						</div>
						<div class="col-md-2">
							<label class="btn btn-primary mt-2 btn-block" for='selecao-arquivo' id="fileLabel">Importar dados</label>
							<input id='selecao-arquivo' type='file'>
						</div>
					</div>
					
				</div>
			</div>
		</form>
	</div>
</div>

<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
}
?>

