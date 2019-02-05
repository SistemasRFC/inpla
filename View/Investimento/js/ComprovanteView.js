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
        var formData = new FormData(document.ComprovanteForm);
        ExecutaDispatchUpload('Investimento', 'UploadComprovante', formData, retornaEnvio, 'Aguarde, Enviando Comprovante', 'Comprovante enviado com sucesso!!');
    } else {
        swal({
            title: 'AVISO',
            text: 'Nenhum arquivo foi selecionado',
            confirmButtonText: 'OK',
            type: 'warning'
        });
    }
}

function retornaEnvio(dado) {
    $("#lnkComprovantes").val(dado[1]);
    var parametros = retornaParametros();
    ExecutaDispatch('Investimento', 'UpdateComprovanteInvestimento', parametros, carrregaInvestimentos);    
    $("#modalComprovante").hide("fade");
}