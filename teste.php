



<?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados

?>

<div class="container" id="padding-top-30">
	<div class="panel panel-default" id="painel-cadastro">
    <form action="validaPergunta.php" method="POST" id="registration-form" class="form-horizontal" onsubmit="" enctype="multipart/form-data">
    éé
    <?php
	require_once 'config.php'; // Inclui o arquivo de configurações do site
	include(HEADER_TEMPLATE);  // Inclui o header da página
	include_once("conexao.php");	// Conecta com o banco de dados

$sql = mysqli_query($conexao, "SELECT elemento_nome FROM elementos");
						while ($row = $sql->fetch_assoc()){
							echo "&quot" . $row['elemento_nome'] . "&quot,<br>";
            }
            

            ?>



		</form>
	</div>
</div>





<?php
	include(FOOTER_TEMPLATE); // Inclui o rodapé da página

?>

