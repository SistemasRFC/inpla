<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Cadastro de Investimentos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/InvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
        <input type="hidden" id="codStatus" name="codStatus" value="0" class="persist">
        <input type="hidden" id="indAtivo" name="indAtivo" value="0" class="persist">
        <input type="hidden" id="method" name="method">
        <table width="100%">
            <tr>
                <td width="100%"
                    style="text-align:left;
                    height:10%;
                    font-size:16px;
                    color:#0150D3;
                    vertical-align:middle;
                    font-family: arial, helvetica, serif;
                    border-bottom: 1px solid #0150D3;">
                    Cadastro de Investimentos
                </td>
            </tr>
        </table>
        <form name="InvestimentoForm" enctype="multpart/form-data" id="cadastroInvestimentoForm" method="post" action="../../Controller/Investimento/InvestimentoController.php">
            <table width="45%">
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>Plano</td>
                    <td class="tdBanco">Banco para depósito</td>
                </tr>
                <tr>
                    <td>
                        <div id="tdcodPlano"></div>
                    </td>
                    <td class="tdBanco">
                        <div id="tdcodBanco"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;
                    </td>
                    <td  class="tdBanco">
                        <div id="tdDadosBanco"></div>
                    </td>
                    <td align="right">
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
        <div id="ComprovanteForm">
              <div id="windowHeader">
              </div>
              <div style="overflow: hidden;" id="windowContent">
                  <?php include_once "ComprovanteView.php";?>
              </div>
        </div>
    </body>
</html>