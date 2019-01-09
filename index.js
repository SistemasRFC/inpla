$(function() {
    $("#nmeLogin").jqxInput({height: 22, width: 100});
    $("#txtSenha").jqxInput({height: 22, width: 100});    
    valor = '{x:'+$(window).width/2+', y:'+$(window).heigth/2+'}';
    $( "#dialogInformacao" ).jqxWindow({
        autoOpen: false,
        height: 150,
        width: 450,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        title: 'Mensagem',
        isModal: true
    });
    $("#CadastroForm").jqxWindow({
        autoOpen: true,
        height: 150,
        width: 350,
        theme: theme,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        isModal: false,
        title: 'Login - INPLA'
    });
    $(".login").keyup(function(event){
        if (event.keyCode==13){
            $("#btnLogin").click();
        }
    }); 
    $("#btnLogin").jqxButton({ width: '100', theme: theme });
    $("#btnLogin").click(function(){
        logar();
    });

});

function logar(){
    $( "#dialogInformacao" ).jqxWindow('setContent', "Aguarde, efetuando Login!");
    $( "#dialogInformacao" ).jqxWindow("open");            
    $.post('Dispatch.php',
        {
            method: 'Logar',
            controller: 'Login',
            verificaPermissao: 'N',
            nmeUsuario: $("#nmeLogin").val(),
            txtSenha: $("#txtSenha").val()
        },
        function(logar){
             logar = eval ('('+logar+')');
             if (logar[0]==true){
                 $(location).attr('href','Dispatch.php?controller='+logar[1][0]['DSC_PAGINA']+'&method='+logar[1][0]['NME_METHOD']);
             }else{
                 $( "#dialogInformacao" ).jqxWindow('setContent', "Usu&aacute;rio ou senha inv&aacute;lido!");  
             }
        }
    );    
}
$(document).ready(function(){
    $("#nmeLogin").focus();
    $("#nmeLogin").val('adm');
});