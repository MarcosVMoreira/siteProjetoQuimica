<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados
  
	if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
	(isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != ""))) {
	   ?>

<div class="container" id="padding-top-10">
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

	
?>


<div class="container" id="padding-top-10">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaPergunta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<h3>Dados da pergunta</h3>
			<div class="row align-items-center">
				<label for="pergunta" class="control-label col-md-1">Pergunta:</label>
				<input type="text" class="form-control col-md-6" name="pergunta" id="pergunta" placeholder="Insira a pergunta" required autofocus/>
			</div>
			<div class="row">
				<label for="elemento" class="control-label col-md-2">Elemento resposta:</label>
				<select name= "elementoSelect" id="elementoSelect">
					<?php 
						$sql = mysqli_query($conexao, "SELECT elemento_simbolo FROM elementos");
						while ($row = $sql->fetch_assoc()){
							echo "<option>" . $row['elemento_simbolo'] . "</option>";
						}
					?>
				</select>
					
			</div>

			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>
</div>



<script>
	/*function displayVals() {
		alert("entrou");
	}
	$( "#elementoSelect" ).change( displayVals );*/

</script>

 


<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
}
?>

