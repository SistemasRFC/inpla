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
});

function salvarMenu(data) {
    if ($('#codMenuW').val() == '') {
        $("#method").val('AddMenu');
    } else {
        $("#method").val('UpdateMenu');
    }
    if (data != undefined) {
        $("#dscCaminhoImagem").val(data.msg);
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Menu', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando Menu!', 'Registro salvo com sucesso!');
}

function fecharTelaCadastro() {
    $("#CadMenus").jqxWindow("close");
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
}

function MontaComboMenu(arrDados) {
    CriarComboDispatch('codMenuPaiW', arrDados, 0);
}

function DeleteMenu() {
    ExecutaDispatch('Menu', 'DeleteMenu', 'codMenuW;' + $("#codMenuW").val() + '|', retornoDeleteMenu, "Aguarde, removendo menu", "Menu removido com sucesso!");
}

function retornoDeleteMenu(retorno) {
    $("#CadMenus").jqxWindow("close");
    CarregaGridMenu();
}