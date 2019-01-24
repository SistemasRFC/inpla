<html>
    <head>
        <script src="js/CadValidaInvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <form name="ValidaInvestimentoForm" method="post" action="Controller/Investimento/InvestimentoController.php">
            <input type="hidden" id="method" name="method">
            <table width="100%" align="center">
                <tr>
                    <td>
                        <div id="dadosInvestimento"></div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="button" id="btnValidar" value="Validar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>