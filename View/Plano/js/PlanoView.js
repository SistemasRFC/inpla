$(function () {
    $("#vlrPlano").maskMoney({symbol: "R$ ", decimal: ",", thousands: "."});
    $("#btnSalvar").click(function () {
        salvarPlano();
    });
    $("#btnNovo").click(function () {
        LimparCampos();
    });
});

function salvarPlano() {
    if ($('#codPlano').val() == '') {
        $('#method').val('InsertPlano');
    } else {
        $('#method').val('UpdatePlano');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Plano', $('#method').val(), parametros, carrregaPlanos, 'Aguarde, Salvando Plano', 'Plano salvo com sucesso!!');
}

function carrregaPlanos() {
    LimparCampos();
    ExecutaDispatch('Plano', 'ListarPlano', undefined, montaTabelaPlanos);
}

function montaTabelaPlanos(ListaPlanos) {
    var listaPlanos = ListaPlanos[1];
    var nomeGrid = 'listaPlanos';
    var source =
            {
                localdata: listaPlanos,
                datatype: "json",
                updaterow: function (rowid, rowdata, commit) {
                    commit(true);
                },
                datafields:
                        [
                            {name: 'COD_PLANO', type: 'string'},
                            {name: 'DSC_PLANO', type: 'string'},
                            {name: 'VLR_PLANO', type: 'string'},
                            {name: 'IND_ATIVO', type: 'string'},
                            {name: 'ATIVO', type: 'boolean'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 500,
                source: dataAdapter,
                theme: theme,
                sortable: true,
                filterable: true,
                pageable: true,
                columnsresize: true,
                selectionmode: 'singlerow',
                columns: [
                    {text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_PLANO', width: 80},
                    {text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_PLANO', columntype: 'textbox', width: 180},
                    {text: 'Valor', datafield: 'VLR_PLANO', columntype: 'textbox', width: 150},
                    {text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67}
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaPlanos[rowID], 'indAtivo;B|');
        $("#method").val("UpdatePlano");
    });
}

$(document).ready(function () {
    carrregaPlanos();
});