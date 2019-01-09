$(function() {
    $("#btnDeletar").click(function(){
        DeleteMenu(); 
    }); 
    $("#btnSalvar").click(function(){
        $( "#dialogInformacao" ).jqxWindow('setContent', "Aguarde, salvando departamento!");
        $( "#dialogInformacao" ).jqxWindow("open");
        if ($("#imagem").val()!=""){
            var formData = new FormData($('form')[0]);
            ExecutaDispatchUpload('Menu', 'uploadArquivo', formData, salvarMenu);
        }else{
            salvarMenu();
        }
    });
    
    $( "#indAtivo" ).click(function( event ) {
        if (this.checked){
            $('#indAtivo1').val('S');
        }else{
            $('#indAtivo1').val('N');
        }
    });
    $( "#indPai" ).click(function( event ) {
        if (this.checked){
            $('#indPai1').val('S');
            $('#codMenu').val('0');
        }else{
            $('#indPai1').val('N');
        }
    });
});

function salvarMenu(data){
    if ($('#codMenu').val()==0){
        $("#method").val('AddMenu');
    }else{
        $("#method").val('UpdateMenu');
    }    
    if (data!=undefined){
        $("#dscCaminhoImagem").val(data.msg);
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Menu', method, parametros,fecharTelaCadastro);
}

function fecharTelaCadastro(){
    $( "#CadMenus" ).jqxWindow("close");
    $( "#dialogInformacao" ).jqxWindow('setContent', "Registro salvo com sucesso!");
    $( "#dialogInformacao" ).jqxWindow('open');
    setTimeout(function(){
        $( "#dialogInformacao" ).jqxWindow("close");
    },"2000");
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
}

function MontaComboMenu(arrDados){    
    CriarComboDispatch('codMenuPai', arrDados, 0);
}

function MontaTabelaArquivoMenu(codMenu){
    var theme = 'energyblue';
    var nomeGrid = 'listaArquivoMenu';    
    var source =
    {
        datatype: "json",
        type: "post",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
        [
            { name: 'COD_ARQUIVO', type: 'string' },
            { name: 'DSC_ARQUIVO', type: 'string' },
            { name: 'NRO_PRIORIDADE', type: 'string' }
        ],
        url: '../../Controller/Menu/CadastroMenuController.php',
        data:{
            method: 'ListaArquivoMenuGrid',
            codMenu: codMenu
        }
        
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#"+nomeGrid).jqxGrid(
    {
        width: 400,
        height: 150,
        source: dataAdapter,
        theme: theme,
        sortable: true,
        filterable: true,
        pageable: true,
        columnsresize: true,
        selectionmode: 'singlerow',
        columns: [
          { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ARQUIVO', columntype: 'textbox', width: 280}
        ]
    });
    // events
    $('#'+nomeGrid).on('rowdoubleclick', function (event)
    {
        var args = event.args;
        $("#codArquivo").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_ARQUIVO);
        $("#dscArquivo").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).DSC_ARQUIVO);
        $("#nroPrioridade").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).NRO_PRIORIDADE);
        $("#methodArquivo").val("UpdateArquivo");        
        $("#CadArquivoMenus").jqxWindow("open");
    });
    $("#dialogInformacao" ).jqxWindow("close");  
}

function DeleteMenu(){    
    $("#dialogInformacao").jqxWindow('setContent', "<h4 style='text-align:center;'>Aguarde, removendo menu<br><img src='../../Resources/images/carregando.gif' width='200' height='30'></h4>");
    $("#dialogInformacao" ).jqxWindow("open");    
    $.post('../../Controller/Menu/CadastroMenuController.php',
        {method: 'DeleteMenu',
        codMenu: $("#codMenu").val()}, function(result){                            
        result = eval('('+result+')');
        if (result[0]==true){              
            CarregaGridMenu();
            $( "#CadMenus" ).jqxWindow("close");
        }else{                                
            $( "#dialogInformacao" ).jqxWindow('setContent', 'Erro ao deletar Menu!'+result[1]);
        }
    });
}