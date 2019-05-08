// funcoes js


function validar(valida_registro) {
        
    var senha = valida_registro.senha.value;
    var confirmaSenha = valida_registro.confirmaSenha.value;

    if (senha != confirmaSenha) {
        alert('Senhas diferentes.');
        valida_registro.senha.focus();
        return false;
    } if (senha.length < 6) {
        alert('Senha precisa ter no mínimo 6 caracteres.');
        valida_registro.senha.focus();
        return false;
    }
}

function verificaResposta(form) {
        
    var campoElemento = form.elemento.value;

    console.log("adicionando o grupoElemento ".grupoElemento);

    $.ajax({
        url: 'preencheSessionJaRespondidas.php?valor='+grupoElemento,
        type: 'GET',
        processData: false, 
        contentType: false,
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Sucesso
                console.log("Adicionado a session jaRespondidas "+idUsuario);
            }
            else
            {
                // Tratar erros

                alert("Erro ao adicionar a session jaRespondidas: "+data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Tratar erros
            console.log('ERRORS: ' + textStatus);
            console.log('ERRORS: ' + jqXHR);
            console.log('ERRORS: ' + errorThrown);
        }
    });   

    if (campoElemento == elemento) {
        
        $.ajax({
            url: 'adicionaPontuacao.php?idUsuario='+idUsuario,
            type: 'GET',
            processData: false, 
            contentType: false,
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Sucesso
                    console.log("Adicionado um ponto ao usuario "+idUsuario);
                }
                else
                {
                    // Tratar erros
    
                    alert("Erro ao adicionar pontos: "+data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Tratar erros
                console.log('ERRORS: ' + textStatus);
                console.log('ERRORS: ' + jqXHR);
                console.log('ERRORS: ' + errorThrown);
            }
        });    
        alert("Resposta certa. (melhorar esta mensagem)");
        //location.href="jogar.php";
        return true;
    } else {
        alert("Resposta errada. (melhorar esta mensagem)");
        form.elemento.focus();
        //location.href="jogar.php";
        return false;
    }

    
}

function populaModalperguntas (grupo) {
    $.ajax({
        url: 'buscaPerguntas.php?grupoParam='+grupo,
        type: 'GET',
        dataType: 'json',
        processData: false, 
        contentType: false,
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Sucesso
                console.log("data "+data);
                console.log("dica1 "+data.dica1);

                $("#dica1Modal").val(data.dica1);
                $("#dica2Modal").val(data.dica2);
                $("#dica3Modal").val(data.dica3);
                $("#dica4Modal").val(data.dica4);
                $("#dica5Modal").val(data.dica5);
                $("#dica6Modal").val(data.dica6);
                $("#dica7Modal").val(data.dica7);
                $("#dica8Modal").val(data.dica8);
                $("#dica9Modal").val(data.dica9);
                $("#dica10Modal").val(data.dica10);
                $("#elementoModal").val(data.elemento);

                //console.log("retornou sucesso: "+data);
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

}

//jQuery

$( function() {
    var elemento = [
        "Hidrogênio",
        "Hélio",
        "Lítio",
        "Berílio",
        "Boro",
        "Carbono",
        "Nitrogênio",
        "Oxigênio",
        "Flúor",
        "Neônio",
        "Sódio",
        "Magnésio",
        "Alumínio",
        "Silício",
        "Fósforo",
        "Enxofre",
        "Cloro",
        "Argônio",
        "Potássio",
        "Cálcio",
        "Escândio",
        "Titânio",
        "Vanádio",
        "Cromo",
        "Manganês",
        "Ferro",
        "Cobalto",
        "Níquel",
        "Cobre",
        "Zinco",
        "Gálio",
        "Germânio",
        "Arsênio",
        "Selênio",
        "Bromo",
        "Criptônio",
        "Rubídio",
        "Estrôncio",
        "Ítrio",
        "Zircônio",
        "Nióbio",
        "Molibdênio",
        "Tecnécio",
        "Rutênio",
        "Ródio",
        "Paládio",
        "Prata",
        "Cádmio",
        "Índio",
        "Estanho",
        "Antimônio",
        "Telúrio",
        "Iodo",
        "Xenônio",
        "Césio",
        "Bário",
        "Lantânio",
        "Cério",
        "Praseodímio",
        "Neodímio",
        "Promécio",
        "Samário",
        "Európio",
        "Gadolínio",
        "Térbio",
        "Disprósio",
        "Hólmio",
        "Érbio",
        "Túlio",
        "Itérbio",
        "Lutécio",
        "Háfnio",
        "Tântalo",
        "Tungstênio",
        "Rênio",
        "Ósmio",
        "Iridio",
        "Platina",
        "Ouro",
        "Mercúrio",
        "Tálio",
        "Chumbo",
        "Bismuto",
        "Polônio",
        "Astato",
        "Radônio",
        "Frâncio",
        "Rádio",
        "Actínio",
        "Tório",
        "Protactínio",
        "Urânio",
        "Netúnio",
        "Plutônio",
        "Amerício",
        "Cúrio",
        "Berquélio",
        "Califórnio",
        "Einstêinio",
        "Férmio",
        "Mendelévio",
        "Nobélio",
        "Laurêncio",
        "Rutherfórdio",
        "Dúbnio",
        "Seabórgio",
        "Bóhrio",
        "Hássio",
        "Meitnério",
        "Darmstácio",
        "Roentgênio",
        "Copernício",
        "Niônio",
        "Fleróvio",
        "Moscóvio",
        "Livermório",
        "Tenessínio",
        "Oganessônio"
    ];
    $( "#elemento" ).autocomplete({
    source: elemento
    });

} );

$(document).ready(function() {
    var qtdDicas = 0;

    $("#dica").click(function() {

        if (typeof dica1 != 'undefined' && typeof dica2 != 'undefined' && typeof dica3 != 'undefined' && typeof dica4 != 'undefined'
        && typeof dica10 != 'undefined' && typeof dica5 != 'undefined' && typeof dica6 != 'undefined'
        && typeof dica7 != 'undefined' && typeof dica8 != 'undefined' && typeof dica9 != 'undefined') {
            if(qtdDicas < 10) {
                qtdDicas++;
                switch(qtdDicas) {
                    case 1:
                        var dica = $("<li class=\"list-group-item\">"+dica1+"</li>");
                        break;
                    case 2:
                        var dica = $("<li class=\"list-group-item\">"+dica2+"</li>");
                        break;
                    case 3:
                        var dica = $("<li class=\"list-group-item\">"+dica3+"</li>");
                        break;
                    case 4:
                        var dica = $("<li class=\"list-group-item\">"+dica4+"</li>");
                        break;
                    case 5:
                        var dica = $("<li class=\"list-group-item\">"+dica5+"</li>");
                        break;
                    case 6:
                        var dica = $("<li class=\"list-group-item\">"+dica6+"</li>");
                        break;
                    case 7:
                        var dica = $("<li class=\"list-group-item\">"+dica7+"</li>");
                        break;
                    case 8:
                        var dica = $("<li class=\"list-group-item\">"+dica8+"</li>");
                        break;
                    case 9:
                        var dica = $("<li class=\"list-group-item\">"+dica9+"</li>");
                        break;
                    case 10:
                        var dica = $("<li class=\"list-group-item\">"+dica10+"</li>");
                        break;
                  } 
    
                $("#listaDicas").append(dica);
            } 
        } else {
            $("#listaDicas").append("Todas as perguntas disponíveis já foram respondidas.");
            $("#elemento").prop("disabled", true);
            $("#btnResponder").prop("disabled", true);
            $("#dica").prop("disabled", true);
            $("#btnConsultar").prop("disabled", true);
        }

    });
    $("#dica").click();
});

// when .modal-wide opened, set content-body height based on browser height; 200 is appx height of modal padding, modal title and button bar

$(".modal-wide").on("show.bs.modal", function() {
    var height = $(window).height() - 200;
    $(this).find(".modal-body").css("max-height", height);
  });


$(document).ready(function () {
    var qtdReferencias = 0;

    $("#linhaReferencia").on("click", "#adicionaReferencia", function () {
        if (qtdReferencias < 9) {
            var stringReferencia = $("<div class=\"row align-items-center\" id=\"linhaNovaReferencia" + qtdReferencias + "\">" +
            "<div class=\"col-sm-12 col-md-6\">" +
            "<div class=\"form-group\">" +
            "<div class=\"input-group\">" +
            "<input type=\"text\" class=\"form-control\" name=\"referencia" + qtdReferencias + "\" id=\"id=\"referencia" + qtdReferencias + "\" placeholder=\"Insira a " + (qtdReferencias+2) + "º referência \" required>" +
            "</div>" +
            "</div>" +
            "</div>");

            $("#novaReferenciaBibliografica").append(stringReferencia);

            qtdReferencias++;
        }
    });

    $("#removeReferencia").click(function () {
        qtdReferencias--;
        $("#linhaNovaReferencia" + qtdReferencias).remove();
    });
});