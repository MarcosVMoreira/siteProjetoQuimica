<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados

?>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaCriarConta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="return validar(this)">
			<h3>Criar conta</h3>
			<div class="row align-items-center">
                <label for="nome" class="control-label col-md-1">Nome:</label>
                <div class="col-md-4 mt-2">
				    <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira seu nome" required autofocus/>
                </div>                
            </div>

            <div class="row align-items-center">
                <label for="email" class="control-label col-md-1">Email:</label>
                <div class="col-md-4 mt-2">
    				<input type="text" class="form-control" name="email" id="email" placeholder="Insira seu email" required autofocus/>
                </div>                
			</div>

			<div class="row align-items-center">
                <label for="login" class="control-label col-md-1">Login:</label>
                <div class="col-md-4 mt-2">
    				<input type="text" class="form-control" name="login" id="login" placeholder="Insira seu login" required autofocus/>
                </div>
            </div>

            <div class="row align-items-center">
				<label for="senha" class="control-label col-md-1">Senha:</label>
                <div class="col-md-3 mt-2">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua senha" required autofocus/>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Sua senha deve ter 6 ou mais caracteres.
                    </small>
                </div>   
            </div>

            <div class="row align-items-center">
                <label for="nome" class="control-label col-md-1">Confirmar senha:</label>
                <div class="col-md-3 mt-2">
				    <input type="password" class="form-control align-middle" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme sua senha" required autofocus/>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    </small>                    
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
?>

