<?php
	include_once("conexao.php");

	$row = 1;
	if (($handle = fopen("excel/teste.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
			$num = count($data);
			$row++;
			for ($c=0; $c < $num; $c++) {
				if ($row < 14) {
					echo "<p> $num fields in line $row: <br /></p>\n";
					echo $data[$c] . "<br />\n";
					//pego os dados e salvo no banco
				}
			}
			
		}
		fclose($handle);
	}
?>
