<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
<html>
    <head>
        <title>INPLA - Jogos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/JogoView.js?rdm=<?php echo Time();?>"></script>
    </head>
    <body>
        <input type="hidden" id="method" name="method" value="">
        <input type="hidden" id="codJogo" name="codJogo" class="persist">
        <div class="card" style="max-width: 650px;">
            <div class="cabecalho">Jogos</div>
            <table width="95%">
                <tr class="titulo">
                    <td>
                        <input type="button" id="btnNovo" value="Novo Jogo" class="button" style="width: 150px;background-color: darkslategrey;margin-bottom: 15px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="codTime1" class="titulo"><b>Time 1</b></label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <label for="codTime2" class="titulo"><b>Time 2</b></label>
                    </td>
                </tr>
                <tr style="margin-bottom: 20px;">
                    <td width="160px">
                        <div id="tdcodTime1" class="input"></div>
                    </td>
                    <td style="font-size: 24px">
                        &nbsp;&nbsp;<b>X</b>
                    </td>
                    <td>
                        <div id="tdcodTime2" class="input"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="codEstadio" class="titulo"><b>Estádio</b></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="tdcodEstadio" class="input"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dtaJogo" class="titulo"><b>Data</b></label>
                    </td>
                    <td colspan="2">
                        <label for="hraJogo" class="titulo"><b>Horário</b></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" id="dtaJogo" name="dtaJogo" class="persist input" style="width: 80%;">
                    </td>
                    <td colspan="2">
                        <input type="time" id="hraJogo" name="hraJogo" class="persist input" style="width: 45%;">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">
                        <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 100px;margin-bottom: 15px;">
                    </td>
                </tr>
            </table>
            <div>
                <div id="listaJogo"></div>
            </div>
        </div>
        <div id="ModalLancaGol">
            <?php include_once "LancaGolView.php"; ?>
        </div>
    </body>
</html>
