$(function () {
    valor = '{x:' + $(window).width / 2 + ', y:' + $(window).heigth / 2 + '}';
    $("#ReiniciaSenhaForm").jqxWindow({
        autoOpen: true,
        height: 150,
        width: 450,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        position: { x: 400, y: 300 },
        title: 'Esqueci Minha Senha'
    });
    $("#nroCpf").mask('999.999.999-99');
    $("#btnResetar").jqxButton({ width: '150', theme: theme });
    $("#btnResetar").click(function () {
        swal({
            title: "Aguarde, resetando senha",
            imageUrl: "../../Resources/images/preload.gif",
            showConfirmButton: false,
            timer: 2000
        });
        ExecutaDispatch('Usuario', 'ResetaSenha', 'nroCpf;' + $("#nroCpf").val() + '|', retornoResetaSenha);
    });

});

function retornoResetaSenha(retorno) {
    if (retorno[0]) {
        window.location.href = '../../index.php';
    } else {
        swal({
            title: "Erro!",
            text: retono[1],
            confirmButtonText: "Fechar",
            type: "error"
        });
    }
}

$(document).ready(function () {
    $("#nmeLogin").focus();
});