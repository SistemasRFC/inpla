$(function () {
    $("#btnDeletar").click(function () {
        DeleteMenu();
    });
    $("#btnSalvar").click(function () {
        if ($("#arquivo").val() != "") {
            var formData = new FormData($('form')[0]);
            ExecutaDispatchUpload('Menu', 'uploadArquivo', formData, salvarMenu);
        } else {
            salvarMenu();
        }
    });
    $("#btnListarController").click(function () {
        ListarController(undefined);
        $("#ListaController").jqxWindow('open');
    });
    $("#btnListarMetodos").click(function () {
        ListarMetodos($("#nmeClasse").val());
    });
    $("#indAtivo").click(function (event) {
        if (this.checked) {
            $('#indAtivo1').val('S');
        } else {
            $('#indAtivo1').val('N');
        }
    });

    $("#indVisible").click(function (event) {
        if (this.checked) {
            $('#indVisible1').val('S');
        } else {
            $('#indVisible1').val('N');
        }
    });
});

function salvarMenu(data) {
    swal({
        title: "Aguarde, salvando Menu",
        showConfirmButton: false,
        imageUrl: "../../Resources/images/preload.gif",
        timer: 2000
    });
    if ($('#codMenu').val() == 0) {
        $("#method").val('AddMenu');
    } else {
        $("#method").val('UpdateMenu');
    }
    if (data != undefined) {
        $("#dscCaminhoImagem").val(data.msg);
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Menu', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro() {
    swal({
        title: "Registro salvo com sucesso!",
        showConfirmButton: false,
        type: "success",
        timer: 2000
    });
    $("#CadMenus").jqxWindow("close");
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
}

function MontaComboMenu(arrDados) {
    CriarComboDispatch('codMenuPai', arrDados, 0);
}

function DeleteMenu() {
    swal({
        title: "Aguarde, removendo menu",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false,
        timer: 2000
    });
    ExecutaDispatch('Menu', 'DeleteMenu', 'codMenu;' + $("#codMenu").val() + '|', retornoDeleteMenu);
}

function retornoDeleteMenu(retorno) {
    if (retorno[0] == true) {
        swal({
            title: "Menu removido com sucesso!",
            showConfirmButton: false,
            type: "success",
            timer: 2000
        });
        $("#CadMenus").jqxWindow("close");
        CarregaGridMenu();
    } else {
        swal({
            title: "Erro!",
            text: retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}