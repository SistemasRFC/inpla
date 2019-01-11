$(function () {
    $("#nroCpf").mask('999.999.999-99');
    $("#indAtivo").jqxCheckBox({width: 120, height: 25, theme: theme});
    $("#btnReiniciarSenha").click(function () {
        swal({
            title: "Aguarde",
            imageUrl: "../../Resources/images/preload.gif",
            showConfirmButton: false,
            timer: 2000
        });
        ExecutaDispatch('Usuario', 'ReiniciarSenha', 'codUsuario;' + $("#codUsuario").val() + '|', retornoReiniciaSenha);
        $('#method').val('ReiniciarSenha');
    });
    $("#nroCpf").blur(function () {
        if ((!valCpf($("#nroCpf").val())) && ($("#nroCpf").val() != '')) {
            swal({
                title: "Aviso",
                text: "CPF Inválido!",
                confirmButtontext: "Fechar",
                type: "alert",
            });
            $("#nroCpf").focus();
        }
    });
    $("#btnSalvar").click(function () {
        swal({
            title: "Aguarde",
            imageUrl: "../../Resources/images/preload.gif",
            showConfirmButton: false,
            timer: 2000
        });
        if ($('#codUsuario').val() == 0) {
            $('#method').val('AddUsuario');
        } else {
            $('#method').val('UpdateUsuario');
        }
        if ($("#indAtivo").jqxCheckBox('val')) {
            ativo = 'S';
        } else {
            ativo = 'N';
        }
        ExecutaDispatch('Usuario',
                $('#method').val(),
                'nmeUsuarioCompleto;' + $("#nmeUsuarioCompleto").val() + '|' +
                'codUsuario;' + $("#codUsuario").val() + '|' +
                'nmeLogin;' + $("#nmeLogin").val() + '|' +
                'codPerfil;' + $("#codPerfil").val() + '|' +
                'nroCpf;' + $("#nroCpf").val() + '|' +
                'indAtivo;' + ativo + '|' +
                'txtEmail;' + $("#txtEmail").val() + '|',
                retornoSalvarUsuario);
    });
    $("#codCliente").change(function () {
        CarregaLojas($(this).val(), -1);
    });
});

function retornoReiniciaSenha(retorno) {
    if (retorno[0]) {
        swal({
            title: "Sucesso!",
            text: "Senha reiniciada",
            showConfirmButton: false,
            type: "success",
            timer: 2000
        });
        $("#CadUsuarios").jqxWindow("close");
    } else {
        swal({
            title: "Erro!",
            text: retorno[1],
            confirmButtontext: "Fechar",
            type: "error"
        });
    }
}

function retornoSalvarUsuario(retorno) {
    if (retorno[0]) {
        if (retorno[1] != $("#codUsuario").val()) {
            swal({
                title: "Usuario salvo com sucesso!",
                text: "A Senha para acesso é 123459.",
                confirmButtonText: "OK",
                type: "success",
            });
        } else {
            swal({
                title: "Usuario salvo com sucesso!",
                showConfirmButton: false,
                type: "success",
                timer: 2000
            });
        }
        $("#codUsuario").val(retorno[1]);
        CarregaGridUsuario();
    } else {
        swal({
            title: "Erro!",
            text: retorno[1],
            confirmButtontext: "Fechar",
            type: "error"
        });
    }
}

//function CarregaComboPerfil() {
//    swal({
//        title: "Aguarde, carregando combo",
//        imageUrl: "../../Resources/images/preload.gif",
//        showConfirmButton: false,
//        timer: 2000
//    });
//    ExecutaDispatch('Perfil', 'ListarPerfilRestrito', undefined, MontaComboPerfil);
//}
//
//function MontaComboPerfil(listaPerfil) {
//    if (listaPerfil[0]) {
//        var source =
//                {
//                    localdata: listaPerfil,
//                    datatype: "json",
//                    datafields:
//                            [
//                                {name: 'COD_PERFIL_W', type: 'string'},
//                                {name: 'DSC_PERFIL_W', type: 'string'}
//                            ]
//                };
//        var dataAdapter = new $.jqx.dataAdapter(source);
//        $("#codPerfil").jqxDropDownList({
//            source: dataAdapter,
//            theme: theme,
//            width: 200,
//            height: 25,
//            selectedIndex: 0,
//            displayMember: 'DSC_PERFIL_W',
//            valueMember: 'COD_PERFIL_W'
//        });
//    } else {
//        swal({
//            title: "Erro!",
//            text: listaPerfil[1],
//            confirmButtonText: "Fechar",
//            type: "error"
//        });
//    }
//}

//function CarregaCliente() {
//    ExecutaDispatch('Usuario', 'ListaDadosUsuario', undefined, MontaComboDadosUsuario);
//}
//
//function MontaComboDadosUsuario(ListaDadosUsuario) {
//    if (ListaDadosUsuario[0]) {
//        var source =
//                {
//                    localdata: ListaDadosUsuario,
//                    datatype: "json",
//                    datafields:
//                            [
//                                {name: 'COD_CLIENTE', type: 'string'},
//                                {name: 'NME_CLIENTE', type: 'string'}
//                            ]
//                };
//        var dataAdapter = new $.jqx.dataAdapter(source);
//        $("#codCliente").jqxDropDownList(
//                {
//                    source: dataAdapter,
//                    theme: theme,
//                    width: 200,
//                    height: 25,
//                    selectedIndex: -1,
//                    displayMember: 'NME_CLIENTE',
//                    valueMember: 'COD_CLIENTE'
//                });
//    } else {
//        swal({
//            title: "Erro!",
//            text: ListaDadosUsuario[1],
//            confirmButtonText: "Fechar",
//            type: "error"
//        });
//    }
//}

$(document).ready(function () {
//    CarregaCliente();
});