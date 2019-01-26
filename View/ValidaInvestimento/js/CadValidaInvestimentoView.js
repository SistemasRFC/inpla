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
        html += '<tr><td style="border-bottom:1px solid;">';
        html += '<b>Investidor:</b> '+dadosInvestimento['USUARIO']+'<br>';
        html += '<b>Valor:</b> '+dadosInvestimento['VLR_PLANO']+'<br>';
        html += '<b>'+dadosInvestimento['DSC_BANCO']+' - </b>';
        html += 'Agência: <b>'+dadosInvestimento['AGENCIA']+'</b> Conta: <b>'+dadosInvestimento['CONTA']+'</b>';
        html += '</td></tr>';
        html += '<tr><td align="center" style="padding-top:10px">';
        html += '<a href=\"'+dadosInvestimento['URL_COMPROVANTE']+'\" target="_blank">';
        html += '<img src=\"'+dadosInvestimento['URL_COMPROVANTE']+'\" title=\"Comprovante\" width=\"200\" height=\"\"></a>';
        html += '</td></tr>';
        html += '</table>';
    $("#dadosInvestimento").html(html);
}
