$(function () {
    $("#btnLancar").click(function () {
        LancaGol();
    });

    $("#fechaModal").click(function () {
        $("#codJogo").val('');
        $("#LancaGol").hide("fade");
    });

});

function LancaGol() {
    var parametros = retornaParametros();
    ExecutaDispatch('Jogo', LancarGol , parametros, carregaGridJogo, 'Aguarde, Salvando!', 'Gol Registrado com Sucesso!');
}

function montaRadioTimes(dados) {
    $("#codTime").html('');
    var html = "<input type='radio' name='codTime1' value='"+dados[1]['codTime1']+"'>'"+dados[1]['dscTime1']+"'";
    html += "<input type='radio' name='codTime1' value='"+dados[1]['codTime2']+"'>'"+dados[1]['dscTime2']+"'";
    $("#codTime").html(html);
}

function carregaGridJogo() {
    LimparCampos();
    ExecutaDispatch('Jogo', 'ListarJogo', undefined, montaTabelaJogo);
}

$(document).ready(function(){
    ExecutaDispatch('Jogo', 'CarregaTimesJogo', 'codJogo;'+$("#codJogo").val()+'|', montaRadioTimes);
});