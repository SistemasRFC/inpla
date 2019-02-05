<html>
    <head>
        <script src="js/LancaGolView.js?rdm=<?php echo Time();?>"></script>
    </head>
    <body>
        <div id="LancaGol" class="modal" style="padding-top: 100px;">
            <input type="hidden" id="codGol" name="codGol" class="persist">
            <div class="card" style="margin-top: 0px;max-width: 500px;padding: 0px 0px;">
                <div class="modal-header">
                    <span id="fechaModal" class="close" style="margin-top: 8px;color: #f2f2f2;">&times;</span>
                    <h4>Lançar Gols</h4>
                </div>
                <table width="100%">
                    <tr>
                        <td colspan="2" class="titulo">
                            <div id="codTimeRadio" style="padding: 10px 20px;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo">
                            <label for="nroMinutos" class="titulo" style="padding-left: 20px;">Minutos</label>
                            <input type="text" id="nroMinutos" name="nroMinutos" class="persist input" style="width: 120px;">
                        </td>
                        <td class="titulo">
                            <div id="nroTempoRadio"></div>
                        </td>
                    </tr>
                </table>
                <div class="titulo">
                    <input type="button" id="btnLancar" value="Salvar" class="button">
                </div>
            </div>
        </div>
    </body>
</html>
