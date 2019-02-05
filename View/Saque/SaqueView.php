<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>INPLA - Saque</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/SaqueView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codSaque" name="codSaque" value="0" class="persist">
        <input type="hidden" id="vlrSaldo" name="vlrSaldo" value="0" class="persist">
        <div class="card" style="max-width: 590px;">
            <div class="cabecalho">Saques</div>
            
            <div class="titulo">
                <div id="divInfoSaque"></div>
            </div>
            
            <label for="vlrSaque" class="titulo sacar">Valor</label>
            <input type="text" name="vlrPlano" id="vlrSaque" size="20" class="persist sacar">
            
            <div class="titulo sacar" style="text-align: right;padding-bottom: 30px;">
                <input type="button" id="btnSacar" value="Sacar" class="button" style="width: 100px;">
                <input type="button" id="btnReinvestir" value="Reinvestir" class="button" style="width: 120px; background-color: darkgreen;">
            </div>
            
            <div style="text-align: center;">
                <label class="titulo" style="font-size: 18px;"><b>Listagem de saques</b></label>
                <div id="listaSaques"></div>
            </div>
        </div>
        <div id="ReinvestirModal">
            <?php include_once "ReinvestirView.php";?>
        </div>
    </body>
