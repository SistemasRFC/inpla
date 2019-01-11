<?php 
session_start();
session_unset();
include_once getenv("CONSTANTES");
?>
<html>
    <head>
        <title>Plataforma de Investimentos</title>
        <script src="Resources/JavaScript.js"></script>
        <link href="Resources/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="Resources/jqx/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="Resources/jqx/jqwidgets/styles/jqx.bootstrap.css" type="media" />
        <link rel="stylesheet" href="Resources/jqx/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
        <script src="Resources/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
        <script src="Resources/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxinput.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/globalization/globalize.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="Resources/jqx/jqwidgets/jqxwindow.js"></script>
        <script type="text/javascript" src="Resources/jqx/scripts/gettheme.js"></script>
        <script src="Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Resources/swal/dist/sweetalert.css"> 
        <script src="index.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=IBM850; ISO-8859-1">
        <style>
            a:link, a:visited {
                text-decoration: none;
                color: black;
            }
            #btnCadastrar{
                padding-right: 20px;
            }
            #btnCadastrar:hover {
                text-decoration: underline; 
                color: blue;
            }
            #btnEsqueciSenha{
                padding-left: 20px;
            }
            #btnEsqueciSenha:hover {
                text-decoration: underline; 
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
                background-color: #A9D0F5;
                width: 350px;
                height: 300px;
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
                <tr>
                    <td>INPLA - Investimentos</td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:left; padding-left:70;">
                            Login<br>
                        </div>
                        <div>
                            <input type="text" id="nmeLogin" name="nmeLogin" class='login' placeholder="Login">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:left; padding-left:70;">
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
            </table>
            <table align="center">
                    <tr>
                        <td>
                            <a href="javascript:return" id=btnCadastrar>Cadastre-se</a>
                        </td>
                        <td>
                            <a href="javascript:return" id=btnEsqueciSenha>Esqueci a senha</a>                                    
                        </td>
                    </tr>

            </table>
        </form>
        <div id="CadInvestidor">
            <div id="windowHeader">
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once PATH."/View/Investidor/InvestidorView.php";?>
            </div>
        </div>
    </body>
</html>
