// nesse link fala como trabalhar com import de arquivo com ajax: https://abandon.ie/notebook/simple-file-uploads-using-jquery-ajax
// https://www.devmedia.com.br/criando-um-cadastro-com-php-ajax-e-jquery/28046

/*$('#btnImportar').on('click', function() {

    var request = $.ajax({
        url: "validaArquivo.php",
        cache: false
    });

    request.done(function(msg) {
        console.log(msg); 
    });

    request.fail(function(jqXHR, textStatus) {
        console.log("texto: "+jqXHR);
        alert("Falha ao cadastrar produto: " + textStatus);
    });
});*/

// AJAX PARA SUBMETER O ARQUIVO INSERIDO NO INPUT PARA O PHP

var files;

$('#selecao-arquivo').on('change', prepareUpload);

function prepareUpload(event)
{
    files = event.target.files;

    event.stopPropagation();
    event.preventDefault();

    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });

    $.ajax({
        url: 'validaArquivo.php?files',
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Sucesso

                $("#dica1").val(data.dica1);
                $("#dica2").val(data.dica2);
                $("#dica3").val(data.dica3);
                $("#dica4").val(data.dica4);
                $("#dica5").val(data.dica5);
                $("#dica6").val(data.dica6);
                $("#dica7").val(data.dica7);
                $("#dica8").val(data.dica8);
                $("#dica9").val(data.dica9);
                $("#dica10").val(data.dica10);
                $("#elemento").val(data.elemento);

                console.log("retornou "+data.dica2);
            }
            else
            {
                // Tratar erros
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Tratar erros
            console.log('ERRORS: ' + textStatus);
        }
    });
    
}
