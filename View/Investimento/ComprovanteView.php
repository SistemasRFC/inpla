<html>
    <head>
        <script src="js/ComprovanteView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <form id="ComprovanteForm" name="ComprovanteForm" method="post" action="Controller/Investimento/InvestimentoController.php" enctype="multpart/form-data">
            <div id="modalComprovante" class="modal" style="padding-top: 90px;">
                <input type="hidden" id="lnkComprovantes" name="lnkComprovantes" class="persist">
                <div class="card" style="margin-top: 0px;max-width: 500px;padding: 0px 0px;">
                    <div class="modal-header">
                        <span id="fechaModal" class="close" style="margin-top: 8px;color: #f2f2f2;">&times;</span>
                        <h4>Enviar Comprovante</h4>
                    </div>
                    <table width="100%">
                        <tr>
                            <td class="titulo">
                                Selecione o arquivo:<br>
                                <input type="file" name="arquivo" id="lnkComprovante" size="45" class="persist"/>
                                <br />
                                <progress value="0" max="100"></progress>
                                <span id="porcentagem">0%</span>
                                <br />
                            </td>
                        </tr>
                    </table>
                    <div class="titulo">
                        <input type="button" id="btnEnviar" value="Enviar" class="button">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>