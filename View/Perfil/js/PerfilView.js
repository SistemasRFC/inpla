$(function () {
    $("#CadPerfil").jqxWindow({
        autoOpen: false,
        height: 200,
        width: 400,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        isModal: true,
        title: 'Cadastro de Perfil'
    });

    $("#listaPerfil").jqxTooltip({
        content: 'D&ecirc; um duplo clique para editar',
        position: 'mouse',
        name: 'movieTooltip',
        theme: theme
    });

    $("#btnNovo").click(function () {
        LimparCampos();
        $("#CadPerfil").jqxWindow("open");
    });

    $("#btnSalvar").click(function () {
        SalvarPerfil();
    });
});

function SalvarPerfil(method){
    var method='';
    if ($("#codPerfil").val() != '') {
        method = "UpdatePerfil";
    } else {
        method = "AddPerfil";
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Perfil', method, parametros, retornoSalvarPerfil, 'Aguarde, Salvando Perfil!', 'Perfil Salvo com Sucesso!');
}

function retornoSalvarPerfil() {
    $("#codPerfil").val('');
    $("#CadPerfil").jqxWindow("close");
    carregaGridPerfil();
}

function carregaGridPerfil() {
    ExecutaDispatch('Perfil', 'ListarPerfil', undefined, montaTabelaPerfil);
}

function montaTabelaPerfil(listaPerfil) {
    $("#codPerfil").val(0);
    listaPerfil = listaPerfil[1];
    var nomeGrid = 'listaPerfil';
    var source =
    {
        localdata: listaPerfil,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_PERFIL_W', type: 'string' },
                { name: 'DSC_PERFIL_W', type: 'string' },
                { name: 'IND_ATIVO', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 685,
            source: dataAdapter,
            theme: theme,
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_PERFIL_W', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_PERFIL_W', columntype: 'textbox', width: 280 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67 }
            ]
        });
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    // events
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;
        preencheCamposForm(listaPerfil[rowID],'indAtivo;B|');
        $("#CadPerfil").jqxWindow("open");
    });
}

$(document).ready(function () {
    carregaGridPerfil();
});

