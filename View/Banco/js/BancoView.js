$(function () {
    $("#nroCpf").mask('999.999.999-99');
    $("#btnSalvar").click(function () {
        salvarBanco();
    });
    $("#btnNovo").click(function () {
        LimparCampos();
    });
});

function salvarBanco() {
    if ($('#codBanco').val() == '') {
        $('#method').val('InsertBanco');
    } else {
        $('#method').val('UpdateBanco');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Banco', $('#method').val(), parametros, carrregaBancos, 'Aguarde, Salvando Banco', 'Banco salvo com sucesso!!');
}

function carrregaBancos() {
    LimparCampos();
    ExecutaDispatch('Banco', 'ListarBanco', undefined, montaTabelaBancos);
}

function montaTabelaBancos(ListaBancos) {
    var listaBancos = ListaBancos[1];
    var nomeGrid = 'listaBancos';
    var source =
            {
                localdata: listaBancos,
                datatype: "json",
                updaterow: function (rowid, rowdata, commit) {
                    commit(true);
                },
                datafields:
                        [
                            {name: 'COD_BANCO', type: 'string'},
                            {name: 'DSC_BANCO', type: 'string'},
                            {name: 'NRO_AGENCIA', type: 'string'},
                            {name: 'NRO_CONTA', type: 'string'},
                            {name: 'NRO_CPF', type: 'string'},
                            {name: 'DSC_TITULAR', type: 'string'},
                            {name: 'IND_ATIVO', type: 'string'},
                            {name: 'ATIVO', type: 'boolean'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 695,
                source: dataAdapter,
                theme: theme,
                sortable: true,
                filterable: true,
                pageable: true,
                columnsresize: true,
                selectionmode: 'singlerow',
                columns: [
                    {text: 'Banco', datafield: 'DSC_BANCO', columntype: 'textbox', width: 100},
                    {text: 'Agência', datafield: 'NRO_AGENCIA', columntype: 'textbox', width: 100},
                    {text: 'Conta', datafield: 'NRO_CONTA', columntype: 'textbox', width: 100},
                    {text: 'CPF', datafield: 'NRO_CPF', columntype: 'textbox', width: 150},
                    {text: 'Titular', datafield: 'DSC_TITULAR', columntype: 'textbox', width: 180},
                    {text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 65, align:'center'}
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaBancos[rowID], 'indAtivo;B|');
        $("#method").val("UpdateBanco");
    });
}

$(document).ready(function () {
    carrregaBancos();
    $("input[type='button']").jqxButton({theme: theme});
});