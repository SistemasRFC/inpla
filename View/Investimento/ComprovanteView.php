<html>
    <head>
        <script src="js/ComprovanteView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <form id="ComprovanteForm" name="ComprovanteForm" method="post" action="Controller/Investimento/InvestimentoController.php" enctype="multpart/form-data">
            <input type="hidden" id="lnkComprovantes" name="lnkComprovantes" class="persist">
            <table width="30%">
                <tr>
                    <td>
                        Selecione o arquivo:<br>
                        <input type="file" name="arquivo" id="lnkComprovante" size="45" class="persist"/>
                        <br />
                        <progress value="0" max="100"></progress>
                        <span id="porcentagem">0%</span>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td align="right" class="style2">
                        <input type="button" id="btnEnviar" value="Enviar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>