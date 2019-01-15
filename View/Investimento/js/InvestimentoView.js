$(function () {
    $("#btnSalvar").click(function () {
        salvarInvestimento();
    });
    $("#btnNovo").click(function () {
        LimparCampos();
    });
});

function salvarInvestimento() {
    $('#method').val('InsertInvestimento');
    var parametros = retornaParametros();
    ExecutaDispatch('Plano', $('#method').val(), parametros, carrregaInvestimentos, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
}

function carrregaInvestimentos() {
    LimparCampos();
    ExecutaDispatch('Investimento', 'ListarInvestimento', undefined, montaTabelaInvestimento);
}

function montaTabelaInvestimento(ListaInvestimentos) {
    var listaInvestimentos = ListaInvestimentos[1];
    var nomeGrid = 'listaInvestimentos';
    var source =
            {
                localdata: listaInvestimentos,
                datatype: "json",
                updaterow: function (rowid, rowdata, commit) {
                    commit(true);
                },
                datafields:
                        [
                            {name: 'COD_INVESTIMENTO', type: 'string'},
                            {name: 'DSC_PLANO', type: 'string'},
                            {name: 'DTA_INICIO', type: 'string'},
                            {name: 'VLR_PLANO', type: 'string'},
                            {name: 'VLR_TOTAL_SAQUES', type: 'string'},
                            {name: 'VLR_RESTANTE', type: 'string'},
                            {name: 'VLR_SALDO', type: 'string'},
                            {name: 'COD_STATUS', type: 'string'}
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
                    {text: 'Nro.', columntype: 'textbox', datafield: 'COD_INVESTIMENTO', width: 30},
                    {text: 'Plano', datafield: 'DSC_PLANO', columntype: 'textbox', width: 80},
                    {text: 'Data Inicio', datafield: 'DTA_INICIO', columntype: 'textbox', width: 90},
                    {text: 'Valor Investido', datafield: 'VLR_PLANO', columntype: 'textbox', width: 80},
                    {text: 'Valor Sacado', datafield: 'VLR_TOTAL_SAQUES', columntype: 'textbox', width: 80},
                    {text: 'Valor Restante', datafield: 'VLR_RESTANTE', columntype: 'textbox', width: 80},
                    {text: 'Saldo', datafield: 'VLR_SALDO', columntype: 'textbox', width: 80}
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        /** SE O STATUS FOR "Aguardando pagamento", ABRIR POP UP PARA ENVIO DO COMPROVANTE
         * salvar: COD_INVESTIMENTO, LNK_COMPROVANTE, DTA_INICIO(Data atual), IND_ATIVO('S')
         * muda o status pra "rendendo"
         * 
         */
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaInvestimentos[rowID]);
    });
}

$(document).ready(function () {
    carrregaInvestimentos();
    $("input[type='button']").jqxButton({theme: theme});
});