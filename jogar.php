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
            <h3>Entre com sua conta para jogar</h3>
            
			<div class="row">
				Para utilizar o sistema, você deve criar sua conta e/ou entrar.
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
            <h3>Jogar</h3>
            
			<div class="row align-items-center">
				<div class="col-md-1">
					<label for="pergunta" class="control-label">Resposta:</label>
				</div>
				<div class="input-group col-md-4">
					<input type="text" class="form-control" name="pergunta" id="pergunta" placeholder="Insira a resposta" required/>
					<button type="submit" id="btnResponder" class="btn btn-success">Responder</button>				
				</div>
				<div class="col-md-4">
					<button class="btn btn-primary">Pedir nova dica</button>
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

