$(function () {
    $("#btnEnviar").click(function () {
        enviarComprovante();
    });
});

function enviarComprovante() {
    /**
     * Aviso: O arquivo ainda não está sendo enviado
     */
    $('#method').val('UpdateInvestimento');
    var parametros = 'codInvestimento;'+$('#codInvestimento').val()+'|lnkComprovante;'+$('#lnkComprovante').val()+'|';
    ExecutaDispatch('Investimento', $('#method').val(), parametros, retornaEnvio, 'Aguarde, Enviando Comprovante', 'Comprovante enviado com sucesso!!');
}

function retornaEnvio() {
    carrregaInvestimentos();
    $("#ComprovanteForm").jqxWindow("close");
}