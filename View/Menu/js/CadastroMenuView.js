$(function () {
    $("#CadMenus").jqxWindow({
        title: 'Cadastro de Menus',
        height: 450,
        width: 700,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: theme,
        isModal: true,
        autoOpen: false
    });
    $("#ListaController").jqxWindow({
        title: 'Lista de Controllers',
        height: 450,
        width: 700,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: theme,
        isModal: true,
        autoOpen: false
    });
    $("#ListaMetodos").jqxWindow({
        title: 'Lista de Metodos',
        height: 450,
        width: 700,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: theme,
        isModal: true,
        autoOpen: false
    });

    $("#btnNovo").click(function () {
        ExecutaDispatch('Menu', 'ListaMenus', '', MontaComboMenu);
        LimparCampos();
        $("#CadMenus").jqxWindow("open");
    });
});

function CarregaGridMenu(listaMenus) {
    MontaTabelaMenu(listaMenus[1]);
}

function MontaTabelaMenu(listaMenus) {
    var nomeGrid = 'listaMenus';
    var contextMenu = $("#jqxMenu").jqxMenu({ width: '120px', autoOpenPopup: false, mode: 'popup', theme: theme });
    var source =
    {
        localdata: listaMenus,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_MENU_W', type: 'string' },
                { name: 'DSC_MENU_W', type: 'string' },
                { name: 'NME_CONTROLLER', type: 'string' },
                { name: 'NME_METHOD', type: 'string' },
                { name: 'DSC_CAMINHO_IMAGEM', type: 'string' },
                { name: 'COD_MENU_PAI_W', type: 'string' },
                { name: 'ATIVO', type: 'boolean' },
                { name: 'ATALHO', type: 'boolean' },
                { name: 'VISIBLE', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 800,
            source: dataAdapter,
            theme: theme,
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            selectionmode: 'singlerow',
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_MENU_W', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_MENU_W', columntype: 'textbox', width: 180 },
                { text: 'Controller', datafield: 'NME_CONTROLLER', columntype: 'textbox', width: 180 },
                { text: 'Method', datafield: 'NME_METHOD', columntype: 'textbox', width: 180 },
                { text: 'Imagem', datafield: 'DSC_CAMINHO_IMAGEM', columntype: 'textbox', width: 180 },
                { text: 'Menu Pai', datafield: 'COD_MENU_PAI_W', columntype: 'textbox', width: 180 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67 },
                { text: 'Atalho', datafield: 'ATALHO', columntype: 'checkbox', width: 67 },
                { text: 'Visível', datafield: 'VISIBLE', columntype: 'checkbox', width: 67 }
            ]
        });
    // events
    $('#' + nomeGrid).on('rowclick', function (event) {
        var args = event.args;
        var row = args.rowindex;

        if (event.args.rightclick) {

            $("#listaMenus").jqxGrid('selectrow', event.args.rowindex);
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
            $("#codMenu").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).COD_MENU_W);
            $("#dscMenu").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).DSC_MENU_W);
            $("#nmeController").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).NME_CONTROLLER);
            $("#nmeMethod").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).NME_METHOD);
            $("#dscCaminhoImagem").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).DSC_CAMINHO_IMAGEM);
            $("#codMenuPai").val($('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).COD_MENU_PAI_W);
            $("#indAtivo").prop("checked", $('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).ATIVO);
            $("#indAtalho").prop("checked", $('#listaMenus').jqxGrid('getrowdatabyid', args.rowindex).ATALHO);
            $("#indVisible").prop("checked", $('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).VISIBLE);
            return false;
        }
    });
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaMenus[rowID], 'indMenuAtivoW;B|indAtalho;B|indVisible;B|');
//        $("#codMenu").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_MENU_W);
//        $("#dscMenu").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).DSC_MENU_W);
//        $("#nmeController").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).NME_CONTROLLER);
//        $("#nmeClasse").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).NME_CONTROLLER);
//        $("#nmeMethod").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).NME_METHOD);
//        $("#dscCaminhoImagem").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).DSC_CAMINHO_IMAGEM);
//        $("#codMenuPai").val($('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_MENU_PAI_W);
//        $("#indAtivo").prop("checked", $('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).ATIVO);
//        $("#indAtalho").prop("checked", $('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).ATALHO);
//        $("#indVisible").prop("checked", $('#' + nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).VISIBLE);
        $("#method").val("UpdateMenu");
        $("#CadMenus").jqxWindow("open");
    });
    $("#jqxMenu").on('itemclick', function (event) {
        var args = event.args;
        var rowindex = $("#listaMenus").jqxGrid('getselectedrowindex');
        if ($.trim($(args).text()) == "Editar") {
            $("#CadMenus").jqxWindow("open");
            //$("#CadMenus").dialog("open");
        } else if ($.trim($(args).text()) == "Novo") {
            LimparCampos();
//            $("#codMenu").val(0);
//            $("#dscMenu").val('');
//            $("#nmeController").val('');
//            $("#nmeMethod").val('');
//            $("#dscCaminhoImagem").val('');
//            $("#codMenuPai").val(0);
//            $("#indAtivo").prop("checked", false);
//            $("#indAtalho").prop("checked", false);
            $("#CadMenus").jqxWindow("open");
        }
    });
}
$(document).ready(function () {
    ExecutaDispatch('Menu', 'ListaMenus', '', MontaComboMenu);
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
    $(document).on('contextmenu', function (e) {
        return false;
    });
    $("input[type='button']").jqxButton({ theme: theme });
});