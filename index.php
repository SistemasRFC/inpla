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
                padding-right: 20px;
            }
            #btnCadastrar:hover {
                color: blue;
            }
            #btnEsqueciSenha{
                padding-left: 20px;
            }
            #btnEsqueciSenha:hover {
                color: red;
            }
            a:active {
                text-decoration: none
            }
            #table_form div{
                text-align: center;
            }
            #table_form tr{
                padding-bottom: 2px;
            }
            #table_form{
                margin-top: 150; 
                background-color: silver;
                width: 320px;
                height: 350px;
                color: preto;
            }
</style>
    </head>
    <body>
        <form name="CadastroForm" method="post" accept-charset="UTF-8" action="Controller/Login/LoginController.php">
            <input type="hidden" id="method" name="method">
            <input type="hidden" id="pagina" name="pagina">
            <input type="hidden" id="paginaError" name="paginaError">
            <table align=center id="table_form">
                <tr align="center">
                    <td style="font-family:Times New Roman; font-size:30; color:darkcyan;"><b>INPLA - Investimentos</b></td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:left; padding-left:55;">
                            Login<br>
                        </div>
                        <div>
                            <input type="text" id="nmeLogin" name="nmeLogin" class='login' placeholder="Login">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:left; padding-left:55;">
                            Senha<br>
                        </div>
                        <div>                            
                            <input type="password" id="txtSenha" name="txtSenha" class='login' placeholder="Senha">
                        </div>                            
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="button" id="btnLogin" value="Login">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="javascript:return false" id=btnCadastrar>Cadastre-se</a>
                        <a href="javascript:return false" id=btnEsqueciSenha>Esqueci a senha</a>
                    </td>
                </tr>
            </table>
        </form>
        <div id="CadInvestidor">
            <div id="windowHeader">
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once PATH . "/View/Investidor/InvestidorView.php"; ?>
            </div>
        </div>
    </body>
</html>
