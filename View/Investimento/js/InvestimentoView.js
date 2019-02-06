$(function () {
    $("#btnSalvar").click(function () {
        salvarInvestimento();
    });
});

function salvarInvestimento() {
    var parametros = retornaParametros();
    ExecutaDispatch('Investimento', 'InsertInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
}

function carrregaInvestimentos() {
    $("#tdDadosBanco").hide();
    $("#codBanco").val(-1);
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
                            {name: 'DSC_ACAO', type: 'string'},
                            {name: 'DSC_PLANO', type: 'string'},
                            {name: 'DTA_INICIO', type: 'string'},
                            {name: 'VLR_PLANO', type: 'string'},
                            {name: 'VLR_TOTAL_SAQUES', type: 'string'},
                            {name: 'VLR_RESTANTE', type: 'string'},
                            {name: 'COD_STATUS', type: 'string'},
                            {name: 'DSC_BANCO', type: 'string'},
                            {name: 'DSC_STATUS', type: 'string'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 860,
                source: dataAdapter,
                theme: 'darkcyan',
                sortable: true,
                filterable: true,
                pageable: true,
                columnsresize: true,
                selectionmode: 'singlerow',
                columns: [
                    {text: 'Nro.', columntype: 'textbox', datafield: 'COD_INVESTIMENTO', width: 50},
                    {text: 'Plano', datafield: 'DSC_PLANO', columntype: 'textbox', width: 65},
                    {text: 'Data Inicio', datafield: 'DTA_INICIO', columntype: 'textbox', width: 90},
                    {text: 'Valor Investido', datafield: 'VLR_PLANO', columntype: 'textbox', width: 105, cellsalign: 'right'},
                    {text: 'Valor Sacado', datafield: 'VLR_TOTAL_SAQUES', columntype: 'textbox', width: 95, cellsalign: 'right'},
                    {text: 'Valor Restante', datafield: 'VLR_RESTANTE', columntype: 'textbox', width: 105, cellsalign: 'right'},
                    {text: 'Status', datafield: 'DSC_STATUS', columntype: 'textbox', width: 170},
                    {text: 'Banco', datafield: 'DSC_BANCO', columntype: 'textbox', width: 110},
                    {text: 'Ações', datafield: 'DSC_ACAO', columntype: 'textbox', width: 70, cellsalign: 'center', align: 'center'}
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaInvestimentos[rowID]);
    });
}

function comprovanteForm(cod) {
    $("#codInvestimento").val(cod);
    $("#modalComprovante").show("fade");
}

function cancelarInvestimento(cod) {
    swal({
        title: 'Deseja realmente cancelar esse investimento?',
        type: 'info',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }, function (isConfirm) {
        if (isConfirm) {
            var parametros = 'codInvestimento;'+cod+'|codStatus;4';
            ExecutaDispatch('Investimento', 'UpdateInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Cancelando Investimento', 'Investimento cancelado!');
        }
    });
}

function CarregaComboPlano(arrDados) {
    CriarComboDispatch('codPlano', arrDados, 0);
}

function CarregaComboBanco(arrDados) {
    CriarComboDispatch('codBanco', arrDados, -1);
}

function retornoDadosBanco(dadosBanco) {
    $("#tdDadosBanco").html('');
    var dadosBanco = dadosBanco[1];
    var html = 'Agência: <b>'+dadosBanco[0]['AGENCIA']+'</b><br>';
        html += 'Conta: <b>'+dadosBanco[0]['CONTA']+'</b><br>';
        html += 'Titular: <b>'+dadosBanco[0]['TITULAR']+'</b><br>';
        html += 'Cpf: <b>'+dadosBanco[0]['CPF']+'</b>';
    $("#tdDadosBanco").html(html);
    $("#tdDadosBanco").show();
}

$(document).ready(function () {
    ExecutaDispatch('Plano', 'ListarPlanoAtivo', undefined, CarregaComboPlano);
    ExecutaDispatch('Banco', 'ListarBancoAtivo', undefined, CarregaComboBanco);
    carrregaInvestimentos();

    $("#tdcodBanco").change(function () {
        ExecutaDispatch('Banco', 'ListaDadosBanco', 'codBanco;'+$("#codBanco").val()+'|', retornoDadosBanco);
    });
});