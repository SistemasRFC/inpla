<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Cadastro de Investimentos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="View/Investimento/js/InvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
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
                    Cadastro de Investimentos
                </td>
            </tr>
        </table>
        <form name="InvestimentoForm" enctype="multpart/form-data" id="cadastroInvestimentoForm" method="post" action="../../Controller/Investimento/InvestimentoController.php">
            <table width="50%">
                <tr>
                    <td class="style2">
                        <input type="button" id="btnNovo" value="Novo Investimento">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td class="style2">
                        Plano<br>
                        <input name="codPlano" id="codPlano" size="20" class="persist">
                    </td>
                </tr>
                <tr>
                    <td align="right" class="style2">
                        <input type="button" id="btnSalvar" value="Salvar">
                    </td>
                </tr>
            </table>
        </form>
        <table width="100%">
            <tr>
                <td>
                    <div id="listaInvestimentos" />
                </td>
            </tr>
        </table>
    </body>
</html>