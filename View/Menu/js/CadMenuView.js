$(function() {
    $("#btnDeletar").click(function(){
        DeleteMenu(); 
    }); 
    $("#btnSalvar").click(function(){
        $( "#dialogInformacao" ).jqxWindow('setContent', "Aguarde, salvando departamento!");
        $( "#dialogInformacao" ).jqxWindow("open");
        if ($("#arquivo").val()!=""){
            var formData = new FormData($('form')[0]);
            ExecutaDispatchUpload('Menu', 'uploadArquivo', formData, salvarMenu);
        }else{
            salvarMenu();
        }
    });
    $("#btnListarController").click(function(){
        ListarController(undefined); 
        $("#ListaController").jqxWindow('open');
    });
    $("#btnListarMetodos").click(function(){
        ListarMetodos($("#nmeClasse").val()); 
    });    
    $( "#indAtivo" ).click(function( event ) {
        if (this.checked){
            $('#indAtivo1').val('S');
        }else{
            $('#indAtivo1').val('N');
        }
    });

    $( "#indVisible" ).click(function( event ) {
        if (this.checked){
            $('#indVisible1').val('S');
        }else{
            $('#indVisible1').val('N');
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
    ExecutaDispatch('Menu', $("#method").val(), parametros,fecharTelaCadastro);
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


function DeleteMenu(){    
    $("#dialogInformacao").jqxWindow('setContent', "<h4 style='text-align:center;'>Aguarde, removendo menu<br><img src='../../Resources/images/carregando.gif' width='200' height='30'></h4>");
    $("#dialogInformacao" ).jqxWindow("open");    
    $.post('../../Controller/Menu/MenuController.php',
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