<html>
    <head>
        <script src="js/LancaGolView.js?rdm=<?php echo Time();?>"></script>
    </head>
    <body>
        <div id="LancaGol" class="modal" style="padding-top: 100px;">
            <input type="hidden" id="codJogo" name="codJogo" class="persist">
            <input type="hidden" id="codGol" name="codGol" class="persist">
            <div class="card" style="margin-top: 0px; padding-top: 2px; max-width: 500px;">
                <span id="fechaModal" class="close" style="margin-top: 8px;">&times;</span>
                <h4>Lançar Gols</h4>

                <div id="codTime" class="persist">

                <label for="nroMinutos" class="titulo">Minutos</label>
                <input type="text" id="nroMinutos" name="nroMinutos" class="input" style="width: 120px">

                <input type="radio" name="nroTempo" value="1" class="persist"> 1&ordm; Tempo
                <input type="radio" name="nroTempo" value="2" class="persist"> 2&ordm; Tempo
                
                <div class="titulo">
                    <input type="button" id="btnLancar" value="Salvar" class="button">
                </div>
            </div>
        </div>
    </body>
</html>
