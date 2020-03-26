<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados
  
	if (!((isset($_SESSION['login_usuario']) && $_SESSION['login_usuario'] != "") &&  
	(isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] != ""))) {
	   ?>

<link href="css/cadastro.css" rel="stylesheet">

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
	} else if($_SESSION['perfil_usuario'] != "Professor") {
?>
<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
		<form action="validaCadastrar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<h3>Desculpe :( Somente professores podem cadastrar novas perguntas</h3>
		</form>
	</div>
</div>
<?php
	} else {

?>
<link href="css/cadastro.css" rel="stylesheet">

<div class="container-fluid">
	<div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
		<form action="validaCadastrar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<div class="card mt-5">
				<div class="card-header">
					Cadastrar dicas
				</div>
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-md-2">
							<!-- <label class="btn btn-primary mt-2 btn-block" for='selecao-arquivo' id="fileLabel">Importar dados</label>
							<input id='selecao-arquivo' type='file'> -->
							<button type="button" id="btnUpload" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalUpload">Importar dados</button>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Elemento:</label>
								<input type="text" class="form-control" name="elemento" id="elemento" placeholder="Insira o elemento"/>
							</div>
						</div>
					</div>

					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Dica 1:</label>
								<input type="text" class="form-control" name="dica1" id="dica1" placeholder="Insira a dica" autofocus/>
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
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label for="dica" class="control-label">Referência bibliográfica:</label>
								<div class="input-group" id="linhaReferencia">
									<input type="text" class="form-control" name="referencia" id="referencia" placeholder="Insira a referência"/>
									<button type="button" id="adicionaReferencia" class="btn btn-success">+</button>
									<button type="button" id="removeReferencia" class="btn btn-danger">-</button>
                            	</div>
								<small id="descReferecias" class="form-text text-muted">
                                        Caso tenha mais de uma referência bibliográfica, clique no botão + para adicionar novas referências e no - para remover.
								</small>
							</div>
						</div>
					</div>
					
					<div id="novaReferenciaBibliografica">

					</div>

					<div class="row align-items-center">
						<div class="col-md-2 offset-10">
							<button type="submit" class="btn btn-success mt-2 btn-block">Salvar</button>
						</div>
					</div>
					
				</div>
			</div>

			<?php 
				$query = "SELECT * FROM perguntas GROUP BY grupo_perguntas"; 

				if ($result = $conexao->query($query)) { 
					echo ' 
					<div class="card mt-5">
					<div class="card-header">
					Perguntas cadastradas
					</div>
					<div class="card-body">
					<table class="table table-striped table-bordered table-hover"> 
						<thead class="thead-dark"> 
							<tr> 
								<th scope="col">Código da pergunta</th>
								<th scope="col">Elemento resposta</th>
								<th scope="col">Editar</th>
							</tr> 
						</thead> 
					<tbody class="labeltexto">'; 
					while ($linha = $result->fetch_assoc()) { 
						echo '<tr scope="row" id="linhaTabela' . $linha['grupo_perguntas'] . '">'; 
						echo '<td>'.$linha['grupo_perguntas'].'</td> '; 
						echo '<td>'.$linha['resposta_perguntas'].'</td>'; 
						echo'<td><a href="" data-toggle="modal" data-target="#exampleModal" 
						onClick="populaModalperguntas('.$linha['grupo_perguntas'].');">
						<i class="fas fa-edit"></i></a></td>';
						echo '</tr>'; 
					}                              
					echo ' 
					</tbody> 
					</table>
					</div>
					</div>'; 
				} 
			?> 


			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->

			<div class="modal fade centered-modal" id="exampleModal" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Alterar pergunta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="text" id="grupoPerguntas" style="display:none;">
						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Elemento:</label>
									<input type="text" class="form-control" name="elementoModal" id="elementoModal" placeholder="Insira o elemento" disabled/>
								</div>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 1:</label>
									<input type="text" class="form-control" name="dica1Modal" id="dica1Modal" placeholder="Insira a dica"/>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 2:</label>
									<input type="text" class="form-control" name="dica2Modal" id="dica2Modal" placeholder="Insira a dica"/>
								</div>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 3:</label>
									<input type="text" class="form-control" name="dica3Modal" id="dica3Modal" placeholder="Insira a dica"/>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 4:</label>
									<input type="text" class="form-control" name="dica4Modal" id="dica4Modal" placeholder="Insira a dica"/>
								</div>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 5:</label>
									<input type="text" class="form-control" name="dica5Modal" id="dica5Modal" placeholder="Insira a dica"/>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 6:</label>
									<input type="text" class="form-control" name="dica6Modal" id="dica6Modal" placeholder="Insira a dica"/>
								</div>
							</div>
						</div>


						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 7:</label>
									<input type="text" class="form-control" name="dica7Modal" id="dica7Modal" placeholder="Insira a dica"/>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 8:</label>
									<input type="text" class="form-control" name="dica8Modal" id="dica8Modal" placeholder="Insira a dica"/>
								</div>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 9:</label>
									<input type="text" class="form-control" name="dica9Modal" id="dica9Modal" placeholder="Insira a dica"/>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Dica 10:</label>
									<input type="text" class="form-control" name="dica10Modal" id="dica10Modal" placeholder="Insira a dica"/>
								</div>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="dica" class="control-label">Referência bibliográfica:</label>
									<input type="text" class="form-control" name="referenciaModal" id="referenciaModal" placeholder="Insira a referência"/>
								</div>
							</div>
						</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="salvaAlteracoesModal(this);">Salvar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="apagarCadastro();">Apagar cadastro</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->

			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- COMEÇO DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->

			<div class="modal fade centered-modal" id="modalUpload" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Importação de arquivos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
						<div class="row align-items-center">
							<div class="col-12">
								&emsp;Para realizar a importação de dados, você deve enviar um arquivo no modelo em excel exigido pelo sistema. 
								Tal arquivo deve ser no formato ".csv". 
								<br>
								&emsp;Para criar um arquivo ".csv" partindo de um arquivo excel, abra sua tabela, vá em Arquivo>Salvar como>Procurar. 
								Em "Tipo", selecione a opção "CSV UTF-8 (Delimitado por vígulas) (*.csv)" e clique em "Salvar".
							</div>
						</div>

						<div class="row align-items-center pt-4 pb-3">
							<div class="col-3">
								<a href="excel/modelo.xls"><button type="button" class="btn btn-primary btn-block" id="baixarModelo">Baixar modelo</button></a>
							</div>
							<div class="col-5">
								<label class="btn btn-primary mt-2 btn-block" for='selecao-arquivo' id="fileLabel">Importar meu arquivo .csv</label>
								<input id='selecao-arquivo' type='file'>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Finalizar importação</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->
			<!-- FIM DA INSERÇÃO DE CAMPOS DENTRO DO MODAL -->



		</form>
	</div>
</div>

<?php
}
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
?>

