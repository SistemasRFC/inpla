$(function () {
    $("#btnEnviar").click(function () {
        enviarComprovante();
    });
});

function enviarComprovante() {
    $('#method').val('UpdateInvestimento');
    var parametros = retornaParametros();
    ExecutaDispatch('Investimento', $('#method').val(), parametros, retornaEnvio, 'Aguarde, Enviando Comprovante', 'Comprovante enviado com sucesso!!');
}

function retornaEnvio() {
    carrregaInvestimentos();
    $("#ComprovanteForm").jqxWindow("close");
}