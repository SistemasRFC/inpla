$(function () {
    $("#indAtivo").jqxCheckBox({ width: 120, height: 25, theme: theme });

    $("#CadPerfil").jqxWindow({
        autoOpen: false,
        height: 200,
        width: 400,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        isModal: true,
        title: 'Cadastro de Perfil'
    });

    $("#listaPerfil").jqxTooltip({
        content: 'D&ecirc; um duplo clique para editar',
        position: 'mouse',
        name: 'movieTooltip',
        theme: theme
    });

    $("#btnNovo").click(function () {
        $("#codPerfil").val('');
        $("#dscPerfil").val('');
        $("#indAtivo").jqxCheckBox('uncheck');
        $("#CadPerfil").jqxWindow("open");
    });

    $("#btnSalvar").click(function () {
        if ($("#indAtivo").jqxCheckBox('val')) {
            indAtivo = 'S';
        } else {
            indAtivo = 'N';
        }
        if ($("#codPerfil").val() != '') {
            alterarPerfil(indAtivo);
        } else {
            addPerfil(indAtivo);
        }
    });
});

function carregaGridPerfil() {
    swal({
        title: "Aguarde, carregando lista de perfis",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false,
        timer: 2000
    });
    ExecutaDispatch('Perfil', 'ListarPerfil', undefined, retornoGridPerfil);
}

function retornoGridPerfil(retorno) {
    if (retorno[0] == true) {
        $("#codPerfil").val(0);
        montaTabelaPerfil(retorno[1]);
    } else {
        $(".jquery-waiting-base-container").fadeOut({ modo: "fast" });
        swal({
            title: "Erro!",
            text: 'N&atilde;o foi poss&iacute;vel executar a consulta!<br>' + retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}

function montaTabelaPerfil(listaPerfil) {
    var nomeGrid = 'listaPerfil';
    var source =
    {
        localdata: listaPerfil,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_PERFIL_W', type: 'string' },
                { name: 'DSC_PERFIL_W', type: 'string' },
                { name: 'IND_ATIVO', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 685,
            source: dataAdapter,
            theme: theme,
            selectionmode: 'singlerow',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            columns: [
                { text: 'C&oacute;digo', columntype: 'textbox', datafield: 'COD_PERFIL_W', width: 80 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_PERFIL_W', columntype: 'textbox', width: 280 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 67 }
            ]
        });
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    // events
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;
        $("#codPerfil").val($('#listaPerfil').jqxGrid('getrowdatabyid', rowID).COD_PERFIL_W);
        $("#dscPerfil").val($('#listaPerfil').jqxGrid('getrowdatabyid', rowID).DSC_PERFIL_W);
        if ($('#listaPerfil').jqxGrid('getrowdatabyid', rowID).IND_ATIVO == 'S') {
            $("#indAtivo").jqxCheckBox('check');
        } else {
            $("#indAtivo").jqxCheckBox('uncheck');
        }
        $("#CadPerfil").jqxWindow("open");
    });
}

function addPerfil(indAtivo) {
    swal({
        title: "Aguarde, salvando Perfil",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false,
        timer: 2000
    });
    ExecutaDispatch('Perfil', 'AddPerfil', 'dscPerfil;' + $("#dscPerfil").val() + '|' + 'indAtivo;' + indAtivo + '|', retornoAddPerfil);
}

function retornoAddPerfil(retorno) {
    if (retorno[0] == true) {
        $("#codPerfil").val('');
        $("#CadPerfil").jqxWindow("close");
        carregaGridPerfil();
    } else {
        $(".jquery-waiting-base-container").fadeOut({ modo: "fast" });
        swal({
            title: "Erro!",
            text: retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}

function alterarPerfil(indAtivo) {
    swal({
        title: "Aguarde, salvando Perfil",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false,
        timer: 2000
    });
    ExecutaDispatch('Perfil', 'UpdatePerfil', 'codPerfil;' + $("#codPerfil").val() + '|' + 'dscPerfil;' + $("#dscPerfil").val() + '|' + 'indAtivo;' + indAtivo + '|', retornoAlterarPerfil);
}

function retornoAlterarPerfil(retorno) {
    if (retorno[0] == true) {
        $("#codPerfil").val('');
        $("#CadPerfil").jqxWindow("close");
        carregaGridPerfil();
    } else {
        $(".jquery-waiting-base-container").fadeOut({ modo: "fast" });
        swal({
            title: "Erro!",
            text: retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}


$(document).ready(function () {
    carregaGridPerfil();
});

