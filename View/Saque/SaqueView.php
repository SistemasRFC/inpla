<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Investimentos - Saque</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/SaqueView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codSaque" name="codSaque" value="0" class="persist">
        <input type="hidden" id="vlrSaldo" name="vlrSaldo" value="0" class="persist">
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
                    Saques
                </td>
            </tr>
        </table>
        <form name="saqueForm" enctype="multpart/form-data" id="saqueForm" method="post" action="../../Controller/Saque/SaqueController.php">
            <table width="40%" align="center">
                <tr>
                    <td colspan="2">
                        <div id="divInfoSaque"></div>
                    </td>
                </tr>
                <tr>
                    <td class="sacar">
                        Valor: 
                        <input type="text" name="vlrPlano" id="vlrSaque" size="20" class="persist">
                    </td>
                    <td class="sacar">
                        <input type="button" id="btnSacar" value="Sacar">
                    </td>
                    <td class="sacar">
                        <input type="button" id="btnReinvestir" value="Reinvestir">
                    </td>
                </tr>
            </table>
        </form>
        <table width="40%" align="center">
            <tr>
                <td>
                    <label style="font-size:20px;"><b>Listagem de saques</b></label><br>
                    <div id="listaSaques" />
                </td>
            </tr>
        </table>
        <div id="ReinvestirForm">
              <div id="windowHeader">
              </div>
              <div style="overflow: hidden;" id="windowContent">
                  <?php include_once "ReinvestirView.php";?>
              </div>
        </div>
    </body>
