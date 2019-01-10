$(function () {
    $("#nroCpf").mask('999.999.999-99');
    $("#indAtivo").jqxCheckBox({ width: 120, height: 25, theme: theme });
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

function CarregaComboPerfil() {
    $("#dialogInformacao").jqxWindow('setContent', "<h4 style='text-align:center;'>Aguarde, carregando Combo!<br><img src='../../Resources/images/carregando.gif' width='200' height='30'></h4>");
    $("#dialogInformacao").jqxWindow("open");
    $.post('../../Controller/Perfil/PerfilController.php',
        {
            method: 'ListarPerfilRestrito'
        },
        function (listaPefil) {
            listaPefil = eval('(' + listaPefil + ')');
            if (listaPefil[0] == true) {
                MontaComboPerfil(listaPefil[1]);
                $("#dialogInformacao").jqxWindow('close');
            } else {
                $("#dialogInformacao").jqxWindow('setContent', 'N&atilde;o foi poss&iacute;vel executar a consulta!<br>' + listaAssunto[1]);
                $("#dialogInformacao").jqxWindow('open');
            }
        }
    );
}
function MontaComboPerfil(listaPefil) {
    var source =
    {
        localdata: listaPefil,
        datatype: "json",
        datafields:
            [
                { name: 'COD_PERFIL_W', type: 'string' },
                { name: 'DSC_PERFIL_W', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#codPerfil").jqxDropDownList(
        {
            source: dataAdapter,
            theme: theme,
            width: 200,
            height: 25,
            selectedIndex: 0,
            displayMember: 'DSC_PERFIL_W',
            valueMember: 'COD_PERFIL_W'
        });
}

function CarregaLojas(codCliente, codLoja) {
    $.post('../../Controller/Loja/LojaController.php',
        {
            method: 'ListarLojaAtiva',
            codCliente: codCliente
        },
        function (listaLoja) {
            listaLoja = eval('(' + listaLoja + ')');
            if (listaLoja[0]) {
                MontaComboLojas(listaLoja[1], codLoja);
            } else {
                $("#dialogInformacao").jqxWindow('setContent', "<h4 style='text-align:center;'>Erro ao listar Imobili&aacute;rias! <br> " + listaUsuario[1] + "</h4>");
            }
        }
    );
}
function MontaComboLojas(listaLoja, codLoja) {
    var source =
    {
        localdata: listaLoja,
        datatype: "json",
        datafields:
            [
                { name: 'COD_LOJA', type: 'string' },
                { name: 'DSC_LOJA', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#codLoja").jqxDropDownList(
        {
            source: dataAdapter,
            theme: theme,
            width: 200,
            height: 25,
            selectedIndex: 0,
            displayMember: 'DSC_LOJA',
            valueMember: 'COD_LOJA'
        });
    $("#codLoja").val(codLoja);
}
//
//function valCpf(c){ 
//    var Soma; 
//    var Resto; 
//    Soma = 0; 
//    var strCPF;
//    strCPF = c.replace(".","");
//    strCPF = strCPF.replace(".","");
//    cpf = strCPF.replace("-","");
//    var numeros, digitos, soma, i, resultado, digitos_iguais;
//    digitos_iguais = 1;
//    if (cpf.length < 11){
//        return false;
//    }
//    for (i = 0; i < cpf.length - 1; i++){
//        if (cpf.charAt(i) != cpf.charAt(i + 1)){
//            digitos_iguais = 0;
//            break;
//        }
//    }
//    if (!digitos_iguais){
//        numeros = cpf.substring(0,9);
//        digitos = cpf.substring(9);
//        soma = 0;
//        for (i = 10; i > 1; i--)
//              soma += numeros.charAt(10 - i) * i;
//        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
//        if (resultado != digitos.charAt(0))
//              return false;
//        numeros = cpf.substring(0,10);
//        soma = 0;
//        for (i = 11; i > 1; i--)
//              soma += numeros.charAt(11 - i) * i;
//        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
//        if (resultado != digitos.charAt(1))
//              return false;
//        return true;
//    }else{
//        return false;
//    }
//}

function CarregaCliente() {
    $.post('../../Controller/Usuario/UsuarioController.php',
        {
            method: 'ListaDadosUsuario'
        },
        function (ListaDadosUsuario) {
            ListaDadosUsuario = eval('(' + ListaDadosUsuario + ')');
            if (ListaDadosUsuario[0]) {
                MontaComboDadosUsuario(ListaDadosUsuario[1]);
            } else {
                $("#dialogInformacao").jqxWindow('setContent', "<h4 style='text-align:center;'>Erro ao listar Imobili&aacute;rias! <br> " + ListaDadosUsuario[1] + "</h4>");
            }
        }
    );
}

function MontaComboDadosUsuario(ListaDadosUsuario) {
    var source =
    {
        localdata: ListaDadosUsuario,
        datatype: "json",
        datafields:
            [
                { name: 'COD_CLIENTE', type: 'string' },
                { name: 'NME_CLIENTE', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#codCliente").jqxDropDownList(
        {
            source: dataAdapter,
            theme: theme,
            width: 200,
            height: 25,
            selectedIndex: -1,
            displayMember: 'NME_CLIENTE',
            valueMember: 'COD_CLIENTE'
        });
    if (ListaDadosUsuario[0].COD_PERFIL == 1) {
        $(".tdDadosCliente").show();
    } else {
        $(".tdDadosCliente").hide();
        $("#codCliente").val(1);
    }
}
$(document).ready(function () {
    CarregaCliente();
});