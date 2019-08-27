$(document).ready(function() {
    
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
    
});
