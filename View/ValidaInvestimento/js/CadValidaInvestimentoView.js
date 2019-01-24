$(function () {
    $("#btnValidar").click(function () {
        validarInvestimento();
    });
});

function validarInvestimento() {
    $("#codStatus").val(2);
    var parametros = retornaParametros();
    ExecutaDispatch('Investimento', 'UpdateInvestimento', parametros, retornoValidacao, 'Aguarde, Validando Investimento', 'Investimento validado com sucesso!!');
}

function retornoValidacao() {
    carrregaInvestimentosInativos();
    $("#ValidaInvestimentoForm").jqxWindow('close');
}


function montaDadosInvestimento(dadosInvestimento) {
    $("#dadosInvestimento").html('');
    var html = '<table width="100%">';
        html += '<tr><td>';
        html += '<b>Valor:</b> '+dadosInvestimento['VLR_PLANO']+'<br>';
        html += '<b>'+dadosInvestimento['DSC_BANCO']+' - </b>';
        html += 'Agência: <b>'+dadosInvestimento['AGENCIA']+'</b> Conta: <b>'+dadosInvestimento['CONTA']+'</b>';
        html += '</td></tr>';
        html += '<tr><td align="center">';
        html += '<a href="'+dadosInvestimento['COMPROVANTE']+'">Vizualizar Comprovante</a>';
        html += '</td></tr>';
    $("#dadosInvestimento").html(html);
}
