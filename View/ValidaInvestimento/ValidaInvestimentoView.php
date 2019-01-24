<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Validação de Investimentos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/ValidaInvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
        <input type="hidden" id="codStatus" name="codStatus" class="persist">
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
                    Validação de Investimentos
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    <div id="listaInvestimentosInativos" />
                </td>
            </tr>
        </table>
        <div id="ValidaInvestimentoForm">
              <div id="windowHeader"></div>
              <div style="overflow: hidden;" id="windowContent">
                  <?php include_once "CadValidaInvestimentoView.php";?>
              </div>
        </div>
    </body>
</html>