$(function () {
    $("#vlrSaque").maskMoney({symbol: "R$ ", decimal: ",", thousands: "."});
    $("#btnSacar").click(function () {
        sacarSaldo();
    });
    $("#btnReinvestir").click(function () {
        reinvestirSaldo();
    });
});

function sacarSaldo() {
    if ($('#vlrSaque').val() <= $('#vlrSaldo').val()) {
        $('#method').val('InsertPlano');
        var parametros = retornaParametros();
        ExecutaDispatch('Saque', $('#method').val(), parametros, carrregaSaques, 'Aguarde, Solicitando saque', 'Saque realizado com sucesso!!');
    } else {
        swal({
           title: 'Aviso!',
           text: 'Valor solicitado maior que o valor disponível',
           type: 'warning',
           confirmButtonText: "OK"
        });
    }
}

function carrregaSaques() {
    LimparCampos();
    ExecutaDispatch('Saque', 'ListarSaque', undefined, montaTabelaSaques);
}

function montaTabelaSaques(ListaSaques) {
    var listaSaques = ListaSaques[1];
    var html = '<h2 style="color:red;font-size:25px;">Saldo Indisponível</h2>';
    $("#divInfoSaque").html(html); 
    var nomeGrid = 'listaSaques';
    var source =
            {
                localdata: listaSaques,
                datatype: "json",
                updaterow: function (rowid, rowdata, commit) {
                    commit(true);
                },
                datafields:
                        [
                            {name: 'COD_SAQUE', type: 'string'},
                            {name: 'VLR_SAQUE', type: 'string'},
                            {name: 'IND_ATIVO', type: 'string'},
                            {name: 'ATIVO', type: 'boolean'}
                        ]
            };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
            {
                width: 250,
                source: dataAdapter,
                theme: theme,
                sortable: true,
                filterable: true,
                pageable: true,
                columnsresize: true,
                selectionmode: 'singlerow',
                columns: [
                    {text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_PLANO', width: 70},
                    {text: 'Valor', datafield: 'VLR_PLANO', columntype: 'textbox', width: 180}
                ]
            });
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaSaques[rowID], 'indAtivo;B|');
        $("#method").val("UpdatePlano");
    });
}

function carregaInformacoes(dadosSaque){
   $("#divInfoSaque").html('');
    var dadosSaque = dadosSaque[1];
    var html = '<h2 style="color:blue;font-size:25px;"><b>Saldo:</b>R$ '+dadosSaque[0]['SALDO']+'</h2><br>';
    $("#divInfoSaque").html(html); 
}

$(document).ready(function () {
//    ExecutaDispatch('Saque', 'CarregaSaldo', undefined, carregaInformacoes);
    carrregaSaques();
    $("input[type='button']").jqxButton({theme: theme});
});