function updateTabelaPeriodica(){
    $.ajax({
        url: 'buscaSessionJaRespondidas.php',
        type: 'GET',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Sucesso
                for (const key of Object.keys(data)) {

                    $("#elemento"+data[key]).css("background-color", "rgba(44, 204, 0, 0.7)");
                }
                let numElementos = data.length;
                let newWidthProgressPar = (numElementos/103)*100;
                $('.progress-bar').text(numElementos.toString() + "/103 elementos");
                $('.progress-bar').css('width', newWidthProgressPar.toString() + "%");

            }
            else
            {
                // Tratar erros
                alert(data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Tratar erros
            console.log('ERRORS: ' + textStatus);
        }
    });
}

function insertTabelaPeriodica(id_usuario, nome_elemento){
    $url = "insereNovoElementoUsuario.php?id_usuario=" + id_usuario.toString() + "&nome_elemento=" + nome_elemento.toString();
    $.ajax({
        url: $url,
        type: 'GET',
        processData: false, 
        contentType: false,
        success: function(data){
            updateTabelaPeriodica();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log('ERRORS: ' + textStatus);
        }
    });
}

$(document).ready(function() {
    updateTabelaPeriodica();
});