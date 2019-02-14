<?php
session_start();
session_unset();
include_once getenv("CONSTANTES");
?>
<html>
    <head>
        <title>Plataforma de Investimentos</title>
        <script src="../../Resources/JavaScript.js"></script>
        <link rel="stylesheet" href="../../Resources/css/style.css?random=<?php echo time(); ?>" type="text/css" />
        <link href="../../Resources/css/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Resources/jqx/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="../../Resources/jqx/jqwidgets/styles/jqx.bootstrap.css" type="media" />
        <script src="../../Resources/js/jquery-1.9.0.js"></script>
        <script src="../../Resources/js/jquery-ui-1.10.0.custom.js"></script>
        <script src="../../Resources/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcore.js"></script>       
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxchart.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxinput.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.edit.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.columnsresize.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.filter.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.grouping.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.export.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.export.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcheckbox.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxradiobutton.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxnumberinput.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/globalization/globalize.js"></script>        
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxwindow.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxtabs.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxtooltip.js"></script>
        <script src="../../Resources/js/jquery.maskMoney.js"></script>
        <script src="../../View/MenuPrincipal/js/FuncoesGerais.js?random=<?php echo time(); ?>"></script>
        <script src="../../Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../Resources/swal/dist/sweetalert.css"> 
        <script src="index.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=IBM850; ISO-8859-1">
        <style>
            a:link, a:visited {
                text-decoration: none;
                color: darkslategrey;
            }
            #btnCadastrar{
                padding-right: 15px;
            }
            #btnCadastrar:hover {
                color: blue;
            }
            #btnEsqueciSenha{
                padding-left: 15px;
            }
            #btnEsqueciSenha:hover {
                color: red;
            }
            a:active {
                text-decoration: none
            }
        </style>
    </head>
    <body>
        <input type="hidden" id="verificaPermissao" name="verificaPermissao" value="N" class="persist">
        <div class="card" style="max-width: 300px;margin-top: 180px;padding-bottom: 20px;">
            <div class="cabecalho" style="padding-left: 10px;padding-bottom: 10px;"><img src="Resources/images/LogoRADI_edit_nb.png" width="300"></div>
            <!-- <div class="cabecalho" style="color: darkcyan;padding-bottom:15px;">INPLA - Investimentos</div> -->
            
            <label for="nmeUsuario" class="titulo">Login</label>
            <input type="text" id="nmeUsuario" name="nmeUsuario" class='login persist input' placeholder="Login">

            <label for="txtSenha" class="titulo">Senha</label>   
            <input type="password" id="txtSenha" name="txtSenha" class='login persist input' placeholder="Senha">

            <div class="titulo">
                <input type="button" id="btnLogin" value="Login" class="button" style="background-color: darkcyan;">
            </div>
            
            <div style="padding-top:20px;text-align:center;">
                <a href="javascript:return false" id=btnCadastrar>Cadastre-se</a>
                <a href="javascript:return false" id=btnEsqueciSenha>Esqueci a senha</a>
            </div>
        </div>
        <div id="ModalInvestidor">
            <?php include_once PATH . "/View/Investidor/InvestidorView.php"; ?>
        </div>
        <div id="ModalRecuperaSenha">
            <?php include_once PATH . "/View/Usuario/RecuperaSenhaView.php"; ?>
        </div>
    </body>
</html>
