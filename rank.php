<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
    include_once("conexao.php");	// Conecta com o banco de dados
    
?>

<link href="css/rank.css" rel="stylesheet">

<div class="container-fluid">
	<div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
		<form action="validaCadastrar.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="">
			<div class="card mt-5">
				<div class="card-header">
					Rank
				</div>
				<div class="card-body">
                    <?php 
                        $contador = 1;
                        $query = "SELECT nome_usuario, pontuacao_usuario, perfil_usuario FROM usuario ORDER BY pontuacao_usuario DESC"; 

                        if ($result = $conexao->query($query)) { 
                            
                            echo ' 
                            <table class="table table-striped table-bordered table-hover"> 
                                <thead class="thead-dark"> 
                                    <tr> 
                                        <th scope="col">Posição</th>
                                        <th scope="col">Nome do aluno</th>
                                        <th scope="col">Pontuação</th>
                                    </tr> 
                                </thead> 
                            <tbody class="labeltexto">'; 
                            while ($linha = $result->fetch_assoc()) { 
                                if ($linha['perfil_usuario'] == "Aluno") { 
                                    echo '<tr scope="row">'; 
                                    echo '<td>'.$contador++.'</td> '; 
                                    echo '<td>'.$linha['nome_usuario'].'</td>'; 
                                    echo'<td>'.$linha['pontuacao_usuario'].'</td>';
                                    echo '</tr>'; 
                                }
                            }                              
                            echo ' 
                            </tbody> 
                            </table>'; 
                            
                        } 
                    ?> 
					
				</div>
			</div> 
		</form>
	</div>
</div>

<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página
?>

