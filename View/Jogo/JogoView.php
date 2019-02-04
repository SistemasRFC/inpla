<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
<html>
    <head>
        <title>Jogos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/JogoView.js?rdm=<?php echo Time();?>"></script>
    </head>
    <body>
        <input type="hidden" id="method" name="method" value="">
        <input type="hidden" id="codJogo" name="codJogo" class="persist">
        <div class="card" style="max-width: 650px;">
            <div>
                <div class="cabecalho">Jogos</div>
                
                <div class="titulo" style="margin-bottom: 20px;">
                    <input type="button" id="btnNovo" value="Novo Jogo" class="button" style="width: 150px;background-color: darkslategrey;">
                </div>
                    
                <label for="codTime1" class="titulo"><b>Time 1</b></label>
                <div id="tdcodTime1" class="input" style="margin-bottom: 10px;width: 30%;"></div>
                
                <label for="codTime2" class="titulo"><b>Time 2</b></label>
                <div id="tdcodTime2" class="input" style="margin-bottom: 10px;width: 30%;"></div>

                <label for="codEstadio" class="titulo">Estádio</label>
                <div id="tdcodEstadio" class="input" style="width: 50%;"></div>

                <label for="dtaJogo" class="titulo">Data</label>
                <input type="date" id="dtaJogo" name="dtaJogo" class="persist input" style="width: 30%;">
                
                <label for="hraJogo" class="titulo">Horário</label>
                <input type="time" id="hraJogo" name="hraJogo" class="persist input" style="width: 30%;">
                
                <div class="titulo" style="text-align: right;margin-bottom: 30px;">
                    <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 100px;">
                </div>
            </div>
            <div>
                <div id="listaJogo"></div>
            </div>
        </div>
    </body>
</html>
