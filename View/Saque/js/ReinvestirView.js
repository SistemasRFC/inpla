$(function () {
    $("#btnSalvar").click(function () {
        salvarInvestimento();
    });
});

function salvarInvestimento() {
    if ($("#codPlano").val() == 0) {
        swal({
            title: 'Aviso',
            text: 'Selecione um Plano!!',
            confirmButtontext: 'Fechar',
            type: 'warning'
        });
    } else {
        $("#codStatus").val('2');
        $("#indAtivo").val('S');
        $("#codBanco").val('0');
        var parametros = retornaParametros();
        ExecutaDispatch('Investimento', 'InsertReinvestir', parametros, carrregaListaSaque, 'Aguarde, Salvando Investimento', 'Investimento criado com sucesso!!');
    }
}

function carrregaListaSaque() {
    LimparCampos();
    $('#ReinvestirForm').jqxWindow('close');
    ExecutaDispatch('Saque', 'ListarSaque', undefined, montaTabelaSaques);
}

function CarregaComboPlano(arrDados) {
    CriarComboDispatch('codPlano', arrDados, 0);
}

$(document).ready(function () {
    ExecutaDispatch('Plano', 'ListarPlanoAtivo', undefined, CarregaComboPlano);
});