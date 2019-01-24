$(function () {
    $("#btnEnviar").click(function () {
        enviarComprovante();
    });
});

function enviarComprovante() {
    /**
     * OBSERVAÇÃO: O arquivo ainda não está sendo enviado
     */
    if($('#lnkComprovante').val() != '') {
        $('#method').val('UpdateInvestimento');
        var parametros = 'codInvestimento;'+$('#codInvestimento').val()+'|lnkComprovante;'+$('#lnkComprovante').val()+'|';
        ExecutaDispatch('Investimento', $('#method').val(), parametros, retornaEnvio, 'Aguarde, Enviando Comprovante', 'Comprovante enviado com sucesso!!');
    } else {
        swal({
            title: 'AVISO',
            text: 'Nenhum arquivo foi selecionado',
            confirmButtonText: 'OK',
            type: 'warning'
        });
    }
}

function retornaEnvio() {
    carrregaInvestimentos();
    $("#ComprovanteForm").jqxWindow("close");
}