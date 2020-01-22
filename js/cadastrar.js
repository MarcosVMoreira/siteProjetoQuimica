// nesse link fala como trabalhar com import de arquivo com ajax: https://abandon.ie/notebook/simple-file-uploads-using-jquery-ajax
// https://www.devmedia.com.br/criando-um-cadastro-com-php-ajax-e-jquery/28046

// AJAX PARA SUBMETER O ARQUIVO INSERIDO NO INPUT PARA O PHP

var files;

$('#selecao-arquivo').on('change', prepareUpload);

function prepareUpload(event)
{
    event.stopPropagation();
    event.preventDefault();
    files = event.target.files;
    let reader = new FileReader();
    let split = files[0].name.split(".");

    reader.readAsText(files[0]);

    if(split[split.length-1] != 'csv'){
        alert("Houve um erro ao fazer upload de seus arquivos: utilize apenas arquivo com extensão .csv");
        return;
    }

    reader.onload = function() {
        let linhas = reader.result.replace(" ", "");
        linhas = linhas.split("\n");
        linhas = linhas.filter(Boolean)

        if(linhas.length != 12){
            alert("Arquivo não está no formato correto! Atualmente contém apenas " + linhas.length + " linhas (Deve ter 12)");
            return;
        }

        $("#dica1").val(linhas[0]);
        $("#dica2").val(linhas[1]);
        $("#dica3").val(linhas[2]);
        $("#dica4").val(linhas[3]);
        $("#dica5").val(linhas[4]);
        $("#dica6").val(linhas[5]);
        $("#dica7").val(linhas[6]);
        $("#dica8").val(linhas[7]);
        $("#dica9").val(linhas[8]);
        $("#dica10").val(linhas[9]);
        $("#elemento").val(linhas[10]);

        let referencias = linhas[11].split("#");

        $('#referencia').val(referencias[0]);

        if(referencias.length > 1){
            for(let i = 1; i < referencias.length; i++){
                $('#adicionaReferencia').trigger('click');
                $('#referencia' + (i - 1).toString()).val(referencias[i]);
            }
        }
    };
        
    
}
