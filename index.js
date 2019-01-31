$(function () {
    valor = '{x:' + $(window).width / 2 + ', y:' + $(window).heigth / 2 + '}';
    $(".login").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#btnLogin").click();
        }
    });
    $("#btnCadastrar").click(function () {
        $("#CadInvestidor").show('fade');
    });
    $("#btnLogin").click(function () {
        logar();
    });

});

function logar() {
    var parametros = retornaParametros();
    ExecutaDispatch('Login','Logar', parametros, posLogin, "Aguarde, efetuando login!");
}

function posLogin(logar){
    $(location).attr('href', 'Dispatch.php?controller=' + logar[1][0]['DSC_PAGINA'] + '&method=' + logar[1][0]['NME_METHOD']+'&verificaPermissao=N');
}

$(document).ready(function () {
    $("#nmeLogin").focus();
    $("#nmeLogin").val('adm');
});