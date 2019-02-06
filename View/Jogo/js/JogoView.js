$(function () {
    $("#btnNovo").click(function () {
        LimparCampos();
    });

    $("#btnSalvar").click(function () {
        SalvarJogo();
    });
});

function SalvarJogo(method) {
    var method = '';
    if ($("#codJogo").val() != '') {
        method = "UpdateJogo";
    } else {
        method = "InsertJogo";
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Jogo', method, parametros, carregaGridJogo, 'Aguarde, Salvando Jogo!', 'Jogo Salvo com Sucesso!');
}

function carregaGridJogo() {
    LimparCampos();
    ExecutaDispatch('Jogo', 'ListarJogo', undefined, montaTabelaJogo);
}

function montaTabelaJogo(listaJogo) {
    listaJogo = listaJogo[1];
    var nomeGrid = 'listaJogo';
    var source =
    {
        localdata: listaJogo,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_JOGO', type: 'string' },
                { name: 'DSC_JOGO', type: 'string' },
                { name: 'COD_TIME_1', type: 'string' },
                { name: 'COD_TIME_2', type: 'string' },
                { name: 'DSC_ESTADIO', type: 'string' },
                { name: 'COD_ESTADIO', type: 'string' },
                { name: 'DTA_JOGO', type: 'string' },
                { name: 'DTA_JOGO_W', type: 'string' },
                { name: 'HRA_JOGO', type: 'string' },
                { name: 'ACAO', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 620,
            source: dataAdapter,
            theme: 'darkcyan',
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'Times', datafield: 'DSC_JOGO', columntype: 'textbox', width: 260, align: 'center' },
                { text: 'Estádio', datafield: 'DSC_ESTADIO', columntype: 'textbox', width: 160, align: 'center' },
                { text: 'Data', datafield: 'DTA_JOGO_W', columntype: 'textbox', width: 90, cellsalign: 'center', align: 'center' },
                { text: 'Horário', datafield: 'HRA_JOGO', columntype: 'textbox', width: 70, align: 'center' },
                { text: 'Ação', datafield: 'ACAO', columntype: 'textbox', width: 40, cellsalign: 'center', align: 'center' }
            ]
        });
    // events
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;
        preencheCamposForm(listaJogo[rowID]);
    });
}

function lancarGol(codJogo) {
    $("#codJogo").val(codJogo);
    ExecutaDispatch('Jogo', 'CarregaTimesJogo', 'codJogo;'+codJogo+'|', montaRadioTimes);
    $("#LancaGol").show("fade");
}

function CarregaComboTime1(arrDados) {
    CriarComboDispatch('codTime1', arrDados, 0);
}

function CarregaComboTime2(arrDados) {
    CriarComboDispatch('codTime2', arrDados, 0);
}

function CarregaComboEstadio(arrDados) {
    CriarComboDispatch('codEstadio', arrDados, 0);
}

$(document).ready(function () {
    ExecutaDispatch('Time', 'ListarTimesAtivos', undefined, CarregaComboTime1);
    ExecutaDispatch('Estadio', 'ListarEstadiosAtivos', undefined, CarregaComboEstadio);
    ExecutaDispatch('Time', 'ListarTimesAtivos', 'codTime1;' + $("#codTime1").val() + '|', CarregaComboTime2);
    carregaGridJogo();

    $("#tdcodTime1").change(function () {
        ExecutaDispatch('Time', 'ListarTimesAtivos', 'codTime1;' + $("#codTime1").val() + '|', CarregaComboTime2);
    });
});

