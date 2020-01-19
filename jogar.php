<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados
	
	if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
	(isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != "") && 
	(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] != ""))) {
?>


<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form>
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
	
			$perguntaJaRespondida = false;
	
			// se ja achei anteriormente esse valor aleatorio gerado,
			//gero novamente ate encontrar um valor que nao gerei ainda
			//utilizar lista para armazenar os dados

			for($indice = 0; $indice < sizeof($_SESSION['jaRespondidas']); $indice++) {
				if ($_SESSION['jaRespondidas'][$indice] == $aleatorio) {
					$perguntaJaRespondida = true;
				}
			}
	
			if (!$perguntaJaRespondida) {
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
							$elemento = $resultado["resposta_perguntas"];
							$encontrado = 1;
						}
						
					} 
				}
			}
	
			if (sizeof($_SESSION['jaRespondidas']) == $max) {
				$encontrado = 1;
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
	var elemento = "<?php echo $elemento ?>";
	var grupoElemento = "<?php echo $aleatorio ?>";
	var idUsuario = "<?php echo $_SESSION['id_usuario'] ?>";
</script>

<link rel="stylesheet/less" type="text/css" href="styles.less" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
<script src="js/jogar.js" ></script>
<link href="css/jogar.css" rel="stylesheet">

<div class="container-fluid">
	<div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
		<form action="jogar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="return verificaResposta(this)">
			<div class="card mt-5">
				<div class="card-header">
					Jogar
				</div>
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<ul class="list-group" id="listaDicas">
								</ul>
							</div>
						</div>
					</div>
            
                    <div class="row align-items-center">
                        <div class="col-sm-2 col-md-1">
                            <label for="pergunta" class="control-label">Resposta:</label>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" name="elemento" id="elemento" placeholder="Insira o elemento resposta" required autofocus/>
                                <button type="submit" id="btnResponder" class="btn btn-success">Responder</button>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
							<button type="button" class="btn btn-primary btn-block" id="dica" data-toggle="modal" data-target="#rateModal">Pedir nova dica</button>
							
                        </div>

                        <div class="col-12 col-md-3">
                            <button type="button" id="btnConsultar" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Consultar tabela periódica</button>
                        </div>
				    </div>
			     </div>
            </div>    
		</form>
	</div>
</div>


	<!-- MODAL TABELA PERIÓDICA -->
	<!-- MODAL TABELA PERIÓDICA -->
	<!-- MODAL TABELA PERIÓDICA -->
	<!-- MODAL TABELA PERIÓDICA -->


	<div class="modal fade centered-modal" id="exampleModal" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tabela periódica</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					
					<div class="col-10 col-md-10">
					Taxa de progresso:
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20/103 elementos</div>
						</div>
					</div>	
					
					<BR><BR>
					<?php
						include("tabelaPeriodica.html");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM MODAL TABELA PERIÓDICA -->
	<!-- FIM MODAL TABELA PERIÓDICA -->
	<!-- FIM MODAL TABELA PERIÓDICA -->
	<!-- FIM MODAL TABELA PERIÓDICA -->

	<!-- MODAL RATE -->
	<!-- MODAL RATE -->
	<!-- MODAL RATE -->


	<div class="modal fade centered-modal" id="rateModal" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="rateModalLabel">Sua pontuação</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
						//include("rater/index.html");
					?>
					<br><br><br><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM MODAL RATE -->
	<!-- FIM MODAL RATE -->
	<!-- FIM MODAL RATE -->




<?php
}
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
?>

