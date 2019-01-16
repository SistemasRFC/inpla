<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Cadastro de Bancos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/BancoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codBanco" name="codBanco" value="0" class="persist">    
        <input type="hidden" id="method" name="method" class="persist">
        <table width="100%">
            <tr>
                <td width="100%"
                    style="text-align:left;
                    height:10%;
                    font-size:14px;
                    color:#0150D3;
                    vertical-align:middle;
                    font-family: arial, helvetica, serif;">
                    Cadastro de Bancos
                </td>
            </tr>
        </table>
        <form name="bancoForm" enctype="multpart/form-data" id="cadastroBancoForm" method="post" action="../../Controller/Banco/BancoController.php">
            <table width="50%">
                <tr>
                    <td>
                        <input type="button" id="btnNovo" value="Novo Banco">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <b>Banco</b><br>
                        <input type="text" name="dscBanco" id="dscBanco" size="15" class="persist">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Agência</b><br>
                        <input type="text" name="nroAgencia" id="nroAgencia" size="10" class="persist">
                    </td>
                    <td>
                        <b>Conta</b><br>
                        <input type="text" name="nroConta" id="nroConta" size="10" class="persist">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Titular</b><br>
                        <input type="text" name="dscTitular" id="dscTitular" size="20" class="persist">
                    </td>
                    <td>
                        <b>CPF</b><br>
                        <input type="text" name="nroCpf" id="nroCpf" size="15" class="persist">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="indAtivo" id="indAtivo" class="persist"><b>Ativo</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="button" id="btnSalvar" value="Salvar">
                    </td>
                </tr>
            </table>
        </form>
        <table width="100%">
            <tr>
                <td>
                    <div id="listaBancos" />
                </td>
            </tr>
        </table>
    </body>
