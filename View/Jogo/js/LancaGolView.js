$(function () {
    $("#btnLancar").click(function () {
        LancaGol();
    });

    $("#fechaModal").click(function () {
        LimparCampos();
        $("#LancaGol").hide("fade");
    });
});

function LancaGol() {
    var parametros = retornaParametros();
    parametros += 'codTime;'+$("input[name='codTimeItem']:checked").val()+'|nroTempo;'+$("input[name='nroTempoItem']:checked").val()+'|';
    ExecutaDispatch('Gol', 'InsertGol' , parametros, carregaGridJogo, 'Aguarde, Salvando!', 'Gol Registrado com Sucesso!');
}

function montaRadioTimes(dados) {
    $("#codTimeRadio").html('');
    var html = "<input type='radio' class='persist' name='codTimeItem' value='"+dados[1][0]['COD_TIME_1']+"'>"+dados[1][0]['DSC_TIME_1']+"&nbsp;&nbsp;&nbsp;&nbsp;";
    html += "<input type='radio' class='persist' name='codTimeItem' value='"+dados[1][0]['COD_TIME_2']+"'>"+dados[1][0]['DSC_TIME_2']+"";
    $("#codTimeRadio").html(html);
}

function montaRadioTempos() {
    $("#nroTempoRadio").html('');
    var html = "<input type='radio' class='persist' name='nroTempoItem' value='1'> 1&ordm; Tempo &nbsp;&nbsp;";
    html += "<input type='radio' class='persist' name='nroTempoItem' value='2'> 2&ordm; Tempo";
    $("#nroTempoRadio").html(html);
}

function carregaGridJogo() {
    LimparCampos();
    ExecutaDispatch('Jogo', 'ListarJogo', undefined, montaTabelaJogo);
    $("#LancaGol").hide("fade");
}

$(document).ready(function() {
    montaRadioTempos();
});