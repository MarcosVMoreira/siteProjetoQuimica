// nesse link fala como trabalhar com import de arquivo com ajax: https://abandon.ie/notebook/simple-file-uploads-using-jquery-ajax
// https://www.devmedia.com.br/criando-um-cadastro-com-php-ajax-e-jquery/28046

$(document).ready(function() {

    $('#btnImportar').on('click', function() {

        var dados = "dados do js";

        console.log("chamei a funcao");
 
        var request = $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: "html"
        });
        
        request.done(function(msg) {
            alert("Produto cadastrado com Sucesso!");
            frm.trigger("reset");
        });
        
        request.fail(function(jqXHR, textStatus) {
            alert("Falha ao cadastrar produto: " + textStatus);
        });
    
        return false;

    });

    $("#btnImportar").click();

});
