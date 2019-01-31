$(function () {
    $("#btnNovo").click(function () {
        LimparCampos();
        $("#CadTime").show('fade');
    });

    $("#btnSalvar").click(function () {
        SalvarTime();
    });

    $("#fechaModal").click(function () {
        $('#CadTime').hide('fade');
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
    ExecutaDispatch('Time', method, parametros, retornoSalvarTime, 'Aguarde, Salvando Time!', 'Time Salvo com Sucesso!');
}

function retornoSalvarTime() {
    $("#codTime").val('');
    $("#CadTime").hide('fade');
    carregaGridTime();
}

function carregaGridTime() {
    ExecutaDispatch('Time', 'ListarTime', undefined, montaTabelaTime);
}

function montaTabelaTime(listaTime) {
    $("#codTime").val(0);
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
            theme: theme,
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_TIME', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_TIME', columntype: 'textbox', width: 280 },
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
        preencheCamposForm(listaTime[rowID],'indAtivo;B|');
        $("#CadTime").show('fade');
    });
}

$(document).ready(function () {
    carregaGridTime();
});

