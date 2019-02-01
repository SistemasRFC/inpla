$(function () {
    $("#nroCpf").mask('999.999.999-99');
    $("#nroTelCelular").mask('(99)99999-9999');

    $("#btnSalvar").click(function () {
        var parametros = retornaParametros();
        ExecutaDispatch('Investidor', 'AtualizaDadosInvestidor', parametros, undefined, "Aguarde, Atualizando Cadastro", "Cadastro atualizado");
    });
});


function preencheCampos(dadosInvestidor) {
    var dadosInvestidor = dadosInvestidor[1];
    preencheCamposForm(dadosInvestidor[0]);
}

$(document).ready(function () {
    ExecutaDispatch('Investidor', 'ListarDadosInvestidor', undefined, preencheCampos);
});