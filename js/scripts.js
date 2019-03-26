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
    /*$( "#elemento" ).autocomplete({
    source: elemento
    });*/
} );


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

    if (campoElemento == elemento) {
        location.href="jogar.php";
        return true;
    } else {
        alert('Resposta errada.');
        form.elemento.focus();
        return false;
    }
}

$(document).ready(function() {
    var qtdDicas = 0;

    $("#dica").click(function() {

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

    });
    $("#dica").click();
});
