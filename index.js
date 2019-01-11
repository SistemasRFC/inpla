$(function () {
    $("#nmeLogin").jqxInput({ height: 30, width: 200 });
    $("#txtSenha").jqxInput({ height: 30, width: 200 });
    valor = '{x:' + $(window).width / 2 + ', y:' + $(window).heigth / 2 + '}';
    $("#CadInvestidor").jqxWindow({
        autoOpen: false,
        height: 350,
        width: 370,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        title: 'Cadastro',
        isModal: true
    });
    $(".login").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#btnLogin").click();
        }
    });
    $("#btnCadastrar").click(function () {
        $("#CadInvestidor").jqxWindow("open");
    });
    $("#btnLogin").jqxButton({ width: '208', height: 30, theme: "energyblue" });
    $("#btnLogin").click(function () {
        logar();
    });

});

function logar() {
    swal({
        title: "Aguarde, efetuando login",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false,
        timer: 2000
    });
    $.post('Dispatch.php',
        {
            method: 'Logar',
            controller: 'Login',
            verificaPermissao: 'N',
            nmeUsuario: $("#nmeLogin").val(),
            txtSenha: $("#txtSenha").val()
        },
        function (logar) {
            logar = eval('(' + logar + ')');
            if (logar[0] == true) {
                $(location).attr('href', 'Dispatch.php?controller=' + logar[1][0]['DSC_PAGINA'] + '&method=' + logar[1][0]['NME_METHOD']);
            } else {
                swal({
                    title: "Erro!",
                    text: "Usuário ou senha inválido!",
                    confirmButtontext: "Fechar",
                    type: "error"
                });
            }
        }
    );
}

$(document).ready(function () {
    $("#nmeLogin").focus();
    $("#nmeLogin").val('adm');
});