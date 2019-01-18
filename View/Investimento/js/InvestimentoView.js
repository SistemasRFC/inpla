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
    if ($("#codBanco").val() == 2) {
        pagarComSaldo();
    } else {
        var parametros = retornaParametros() + 'codBanco;' + $("#codBanco").val() + '|';
        ExecutaDispatch('Investimento', 'InsertInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
    }
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
                            {name: 'DSC_ACAO', type: 'string'},
                            {name: 'DSC_PLANO', type: 'string'},
                            {name: 'DTA_INICIO', type: 'string'},
                            {name: 'VLR_PLANO', type: 'string'},
                            {name: 'VLR_TOTAL_SAQUES', type: 'string'},
                            {name: 'VLR_RESTANTE', type: 'string'},
                            {name: 'COD_STATUS', type: 'string'},
                            {name: 'DSC_STATUS', type: 'string'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 850,
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
                    {text: 'Valor Investido', datafield: 'VLR_PLANO', columntype: 'textbox', width: 120, cellsalign: 'right'},
                    {text: 'Valor Sacado', datafield: 'VLR_TOTAL_SAQUES', columntype: 'textbox', width: 110, cellsalign: 'right'},
                    {text: 'Valor Restante', datafield: 'VLR_RESTANTE', columntype: 'textbox', width: 120, cellsalign: 'right'},
                    {text: 'Status', datafield: 'DSC_STATUS', columntype: 'textbox', width: 170},
                    {text: 'Ações', datafield: 'DSC_ACAO', columntype: 'textbox', width: 100, cellsalign: 'center', align: 'center'}
                ]
            });
}

function comprovanteForm(cod) {
    $("#codInvestimento").val(cod);
    $("#ComprovanteForm").jqxWindow("open");
}

function pagarComSaldo() {
    if ($("#codPlano").val() == 0 || $("#codBanco").val() == 0) {
        swal({
            title: "Aviso",
            text: "Selecione um Plano e um Banco para depósito!!",
            confirmButtontext: "Fechar",
            type: "alert"
        });
    } else {
        swal({
            title: 'Saldo Disponível: R$ 00,00',
            text: 'Deseja pagar esse investimento com o saldo disponível?',
            type: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }, function (isConfirm) {
            if (isConfirm) {
                $("#codStatus").val('2');
                $("#indAtivo").val('S');
                var parametros = retornaParametros() + 'codBanco;' + $("#codBanco").val() + '|';
                ExecutaDispatch('Investimento', 'InsertInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
            }
        });
    }
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
            $("#codInvestimento").val(cod);
            $("#codStatus").val('4');
            var parametros = retornaParametros();
            ExecutaDispatch('Investimento', 'UpdateInvestimento', parametros, carrregaInvestimentos, 'Aguarde, Cancelando Investimento', 'Investimento cancelado!');
        }
    });
}

function CarregaComboPlano(arrDados) {
    CriarComboDispatch('codPlano', arrDados, 0);
}

function CarregaComboBanco(arrDados) {
    CriarComboDispatch('codBanco', arrDados, 0);
}

$(document).ready(function () {
    ExecutaDispatch('Plano', 'ListarPlanoAtivo', undefined, CarregaComboPlano);
    ExecutaDispatch('Banco', 'ListarBancoAtivo', undefined, CarregaComboBanco);
    carrregaInvestimentos();
    $("input[type='button']").jqxButton({theme: theme});
});