$(function () {
    $("#ComprovanteForm").jqxWindow({
        autoOpen: false,
        height: 200,
        width: 400,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        title: 'Enviar Comprovante',
        isModal: true
    });
    $("#btnSalvar").click(function () {
        salvarInvestimento();
    });
});

function salvarInvestimento() {
    var parametros = retornaParametros();
    ExecutaDispatch('Investimento', 'InsertInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
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
                    {name: 'COD_INVESTIMENTO_A', type: 'string'},
                    {name: 'DSC_PLANO', type: 'string'},
                    {name: 'DTA_INICIO', type: 'string'},
                    {name: 'VLR_PLANO', type: 'string'},
                    {name: 'VLR_TOTAL_SAQUES', type: 'string'},
                    {name: 'VLR_RESTANTE', type: 'string'},
                    {name: 'VLR_SALDO', type: 'string'},
                    {name: 'COD_STATUS', type: 'string'},
                    {name: 'DSC_STATUS', type: 'string'}
                ]
        };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 940,
            source: dataAdapter,
            theme: theme,
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            selectionmode: 'singlerow',         
            columns: [
                {text: 'Nro.', columntype: 'textbox', datafield: 'COD_INVESTIMENTO', width: 50},
                {text: 'Plano', datafield: 'DSC_PLANO', columntype: 'textbox', width: 80},
                {text: 'Data Inicio', datafield: 'DTA_INICIO', columntype: 'textbox', width: 100},
                {text: 'Valor Investido', datafield: 'VLR_PLANO', columntype: 'textbox', width: 120},
                {text: 'Valor Sacado', datafield: 'VLR_TOTAL_SAQUES', columntype: 'textbox', width: 120},
                {text: 'Valor Restante', datafield: 'VLR_RESTANTE', columntype: 'textbox', width: 120},
                {text: 'Saldo', datafield: 'VLR_SALDO', columntype: 'textbox', width: 90},
                {text: 'Status', datafield: 'DSC_STATUS', columntype: 'textbox', width: 170},
                {text: 'Ação', datafield: 'COD_INVESTIMENTO_A', columntype: 'textbox', width: 90}
            ]
        });
}

function CarregaComboPlano(arrDados) {
    CriarComboDispatch('codPlano', arrDados, 0);
}

$(document).ready(function () {
    ExecutaDispatch('Plano', 'ListarPlanoAtivo', undefined, CarregaComboPlano);
    carrregaInvestimentos();
    $("input[type='button']").jqxButton({theme: theme});
});