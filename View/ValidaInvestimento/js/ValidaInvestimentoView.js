$(function () {
    $("#ValidaInvestimentoForm").jqxWindow({
        autoOpen: false,
        height: 700,
        width: 600,
        theme: 'darkcyan',
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        title: 'Validar Comprovante',
        isModal: true
    });
});

function carrregaInvestimentosInativos() {
    LimparCampos();
    ExecutaDispatch('ValidaInvestimento', 'ListarInvestimentoInativos', undefined, montaTabelaInvestimento);
}

function montaTabelaInvestimento(ListaInvestimentos) {
    var listaInvestimentos = ListaInvestimentos[1];
    var nomeGrid = 'listaInvestimentosInativos';
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
                            {name: 'VLR_PLANO', type: 'string'},
                            {name: 'DSC_BANCO', type: 'string'},
                            {name: 'AGENCIA', type: 'string'},
                            {name: 'CONTA', type: 'string'},
                            {name: 'USUARIO', type: 'string'},
                            {name: 'COMPROVANTE', type: 'string'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 450,
                source: dataAdapter,
                theme: 'darkcyan',
                sortable: true,
                filterable: true,
                pageable: true,
                columnsresize: true,
                selectionmode: 'singlerow',
                columns: [
                    {text: 'Nro.', columntype: 'textbox', datafield: 'COD_INVESTIMENTO', width: 50},
                    {text: 'Investidor', datafield: 'USUARIO', columntype: 'textbox', width: 190},
                    {text: 'Plano', datafield: 'DSC_PLANO', columntype: 'textbox', width: 90, cellsalign: 'center', align: 'center'},
                    {text: 'Valor Investido', datafield: 'VLR_PLANO', columntype: 'textbox', width: 120, cellsalign: 'right'},
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaInvestimentos[rowID]);
        montaDadosInvestimento(listaInvestimentos[rowID]);
        $("#ValidaInvestimentoForm").jqxWindow("open");
    });
}

$(document).ready(function () {
    carrregaInvestimentosInativos();
});