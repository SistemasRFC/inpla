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
    var html = '<table width="100%" style="border-bottom:1px solid;">';
        html += '<tr class="titulo">';
        html += '<td><b>'+dadosInvestimento['DSC_BANCO']+'</b></td>';
        html += '<td>Agência: <b>'+dadosInvestimento['AGENCIA']+'</b></td>';
        html += '<td>Conta: <b>'+dadosInvestimento['CONTA']+'</b></td>';
        html += '</tr>';
        html += '<tr class="titulo">';
        html += '<td><b>Investidor:</b> '+dadosInvestimento['USUARIO']+'</td>';
        html += '<td><b>Valor Investido:</b> '+dadosInvestimento['VLR_PLANO']+'<br></td>';
        html += '</tr>';
        html += '</table>';
        html += '<table width="100%">';
        html += '<tr><td align="center" style="padding-top:10px">';
        html += '<a href=\"'+dadosInvestimento['URL_COMPROVANTE']+'\" target="_blank">';
        html += '<img src=\"'+dadosInvestimento['URL_COMPROVANTE']+'\" title=\"Comprovante\" width=\"200\" height=\"\"></a>';
        html += '</td></tr>';
        html += '</table>';
    $("#dadosInvestimento").html(html);
}
