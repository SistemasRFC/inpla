<html>
    <head>
        <script src="js/CadValidaInvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <form name="ValidaInvestimentoForm" method="post" action="Controller/Investimento/InvestimentoController.php">
            <input type="hidden" id="method" name="method">
            <table width="100%">
                <tr>
                    <td>
                        <div id="dadosInvestimento"></div>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top:15px;">
                        <input type="button" id="btnValidar" value="Validar" class="button-novo" style="background-color: blue;">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>