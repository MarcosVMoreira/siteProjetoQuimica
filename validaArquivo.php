<?php

    $data = array();

    if(isset($_GET['files']))
    {  
        $error = false;
        $files = array();

        $uploaddir = 'excel/';
        foreach($_FILES as $file)
        {
                $exp = explode('.', $file['name']);
                $extensao = strtolower(end($exp));

                if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])) && ($extensao == "csv"))
                {
                        $files[] = $uploaddir .$file['name'];
                }
                else
                {
                        $error = true;
                }
        }
        
        $data = ($error) ? array('error' => 'Houve um erro ao fazer upload de seus arquivos: utilize apenas arquivo com extensão .csv.') : array('files' => $files);

        if (!$error) {
                $row = 1;
                if (($handle = fopen("excel/teste.csv", "r")) !== FALSE) {
                while (($dadosArquivo = fgetcsv($handle, 1000, "\n")) !== FALSE) {
                        $num = count($data);
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                        if ($row < 14) {
                                switch($row) {
                                case 2: $dica1 = $dadosArquivo[$c];
                                        break;
                                case 3: $dica2 = $dadosArquivo[$c];
                                        break;
                                case 4: $dica3 = $dadosArquivo[$c];
                                        break;
                                case 5: $dica4 = $dadosArquivo[$c];
                                        break;
                                case 6: $dica5 = $dadosArquivo[$c];
                                        break;
                                case 7: $dica6 = $dadosArquivo[$c];
                                        break;
                                case 8: $dica7 = $dadosArquivo[$c];
                                        break;
                                case 9: $dica8 = $dadosArquivo[$c];
                                        break;
                                case 10: $dica9 = $dadosArquivo[$c];
                                        break;
                                case 11: $dica10 = $dadosArquivo[$c];
                                        break;
                                case 12: $elemento = $dadosArquivo[$c];
                                        break;
                                case 13: $bibiografia = $dadosArquivo[$c];
                                        break;
                                default:
                                        break;
                                }
                        }
                        }
                }
                $data = array_merge($data, array("dica1"=>$dica1, "dica2"=>$dica2, "dica3"=>$dica3, "dica4"=>$dica4, "dica5"=>$dica5, "dica6"=>$dica6, "dica7"=>$dica7, 
                                                        "dica8"=>$dica8, "dica9"=>$dica9, "dica10"=>$dica10, "elemento"=>$elemento, "bibiografia"=>$bibiografia));
                fclose($handle);
        }
        
        }
    }
    else
    {
        $data = array('error' => 'Não foi possível realizar o upload do arquivo.');
    }

    echo json_encode($data);

?>

