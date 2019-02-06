$(function () {
    $("#btnNovo").click(function () {
        LimparCampos();
    });

    $("#btnSalvar").click(function () {
        SalvarTime();
    });
});

function SalvarTime(method){
    var method='';
    if ($("#codTime").val() != '') {
        method = "UpdateTime";
    } else {
        method = "InsertTime";
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Time', method, parametros, carregaGridTime, 'Aguarde, Salvando Time!', 'Time Salvo com Sucesso!');
}

function carregaGridTime() {
    LimparCampos();
    ExecutaDispatch('Time', 'ListarTime', undefined, montaTabelaTime);
}

function montaTabelaTime(listaTime) {
    listaTime = listaTime[1];
    var nomeGrid = 'listaTime';
    var source =
    {
        localdata: listaTime,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_TIME', type: 'string' },
                { name: 'DSC_TIME', type: 'string' },
                { name: 'IND_ATIVO', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 600,
            source: dataAdapter,
            theme: 'darkcyan',
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_TIME', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_TIME', columntype: 'textbox', width: 280 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67, align: 'center' }
            ]
        });
    // events
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;
        preencheCamposForm(listaTime[rowID],'indAtivo;B|');
    });
}

$(document).ready(function () {
    carregaGridTime();
});

