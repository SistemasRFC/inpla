$(function () {
    $("#btnNovo").click(function () {
        LimparCampos();
    });

    $("#btnSalvar").click(function () {
        SalvarEstadio();
    });
});

function SalvarEstadio(method){
    var method='';
    if ($("#codEstadio").val() != '') {
        method = "UpdateEstadio";
    } else {
        method = "InsertEstadio";
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Estadio', method, parametros, carregaGridEstadio, 'Aguarde, Salvando Estádio!', 'Estádio Salvo com Sucesso!');
}

function carregaGridEstadio() {
    LimparCampos();
    ExecutaDispatch('Estadio', 'ListarEstadio', undefined, montaTabelaEstadio);
}

function montaTabelaEstadio(listaEstadio) {
    listaEstadio = listaEstadio[1];
    var nomeGrid = 'listaEstadio';
    var source =
    {
        localdata: listaEstadio,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_ESTADIO', type: 'string' },
                { name: 'DSC_ESTADIO', type: 'string' },
                { name: 'IND_ATIVO', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 600,
            source: dataAdapter,
            theme: theme,
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_ESTADIO', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ESTADIO', columntype: 'textbox', width: 280 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67, align: 'center' }
            ]
        });
    // events
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;
        preencheCamposForm(listaEstadio[rowID],'indAtivo;B|');
    });
}

$(document).ready(function () {
    carregaGridEstadio();
});

