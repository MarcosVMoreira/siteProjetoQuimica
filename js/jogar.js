$(document).ready(function() {
    
    //console.log("valor do background: "+$("#elementoHidrogenio").css("background-color"));

    console.log("carreguei a pagina dnv");
    
    $("#elementoHidrogenio").css("background-color", "red");

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
                    console.log("iterando na key: "+data[key]);
                    $("#elemento"+data[key]).css("background-color", "green");
                }

            }
            else
            {
                // Tratar erros

                alert(data.error);
                //console.log("retornou erro: "+data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Tratar erros
            console.log('ERRORS: ' + textStatus);
        }
    });
    
});
