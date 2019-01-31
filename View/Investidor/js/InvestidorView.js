$(function () {
    $("#nroCpf").mask('999.999.999-99');

    $("#nroCpf").blur(function () {
        if ((!valCpf($("#nroCpf").val())) && ($("#nroCpf").val() != '')) {
            swal({
                title: "Aviso",
                text: "CPF Inválido!",
                confirmButtontext: "Fechar",
                type: "alert"
            });
            $("#nroCpf").focus();
        }
    });

    $("#btnSalvar").click(function () {
        var parametros = retornaParametros();
        parametros += 'verificaPermissao;N|nmeUsuario;'+$("#nmeUsuarioInvestidor").val(),
        ExecutaDispatch('Investidor', 'InsertInvestidor', parametros, retornaSalvar, "Aguarde, Salvando Cadastro");
    });

    $("#fechaModal").click(function () {
        $('#CadInvestidor').hide('fade');
    });
});

function retornaSalvar(){
    swal({
        title: "Cadastro realizado",
        text: "Acesse seu e-mail para confirmar seu cadastro",
        confirmButtontext: "OK",
        type: "success"
    });
}