$(function () {
    valor = '{x:' + $(window).width / 2 + ', y:' + $(window).heigth / 2 + '}';
    // $("#CadInvestidor").jqxWindow({
    //     autoOpen: false,
    //     height: 420,
    //     width: 370,
    //     theme: theme,
    //     animationType: 'fade',
    //     showAnimationDuration: 500,
    //     closeAnimationDuration: 500,
    //     title: 'Cadastro',
    //     isModal: true
    // });
    $(".login").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#btnLogin").click();
        }
    });
    $("#btnCadastrar").click(function () {
        var modal = document.getElementById('CadInvestidor');
        $("#CadInvestidor").show('fade');
        // $("#CadInvestidor").jqxWindow("open");
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