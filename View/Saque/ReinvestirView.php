<html>
    <script src="js/ReinvestirView.js?rdm=<?php echo time(); ?>"></script>
    <body>
        <div id="modalReinvestir" class="modal" style="padding-top: 100px;">
            <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
            <input type="hidden" id="codStatus" name="codStatus" value="0" class="persist">
            <input type="hidden" id="indAtivo" name="indAtivo" value="0" class="persist">
            <div class="card" style="margin-top: 0px;max-width: 500px;padding: 0px 0px;">
                <div class="modal-header">
                    <span id="fechaModal" class="close" style="margin-top: 8px;color: #f2f2f2;">&times;</span>
                    <h4>Reinvestir</h4>
                </div>

                <div class="titulo" style="padding-left: 30px">
                    <label for="tdcodPlano" class="titulo">Plano</label>
                    <div id="tdcodPlano"></div>
                </div>

                <div class="titulo">
                    <input type="button" id="btnSalvar" value="Investir" class="button">
                </div>
            </div>
        </div>
    </body>
</html>