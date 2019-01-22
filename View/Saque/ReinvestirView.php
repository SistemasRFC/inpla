<html>
    <script src="js/ReinvestirView.js?rdm=<?php echo time(); ?>"></script>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
        <input type="hidden" id="codStatus" name="codStatus" value="0" class="persist">
        <input type="hidden" id="indAtivo" name="indAtivo" value="0" class="persist">
        <form name="ReinvestirForm" enctype="multpart/form-data" id="ReinvestirForm" method="post" action="../../Controller/Investimento/InvestimentoController.php">
            <table width="45%">
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>Plano</td>
                </tr>
                <tr>
                    <td>
                        <div id="tdcodPlano"></div>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <input type="button" id="btnSalvar" value="Investir">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>