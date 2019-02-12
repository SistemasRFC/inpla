<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>INPLA - Saque</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/SaqueView.js?rdm=<?php echo time(); ?>"></script>
        <style>
            .grid-container {
                display: inline-grid;
                grid-template-columns: auto auto;
                grid-gap: 12px;
                margin-top: 10px;
            }
            
            .alert {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
                padding: 14px 10px;
                margin: 10px;
                background-color: #ff9800;
                border-radius: 5px;
                color: white;
                text-align: center;
                font-size: 22px;
                font-family: 'arial black';
                font-weight: bold;
                width: 350;
                height: 60;
            }
        </style>
    </head>
    <body>
        <input type="hidden" id="codSaque" name="codSaque" value="0" class="persist">
        <input type="hidden" id="vlrSaldo" name="vlrSaldo" value="0" class="persist">
        <div class="grid-container">
            <div class="alert">Valor mínimo para saque<br>R$ 35,00</div>
            <div class="card" style="max-width: 590px;margin: 0px;">
                <div class="cabecalho">Saques</div>
                
                <div class="titulo">
                    <div id="divInfoSaque"></div>
                </div>
                
                <label for="vlrSaque" class="titulo sacar">Valor</label>
                <input type="text" name="vlrPlano" id="vlrSaque" size="20" class="persist input sacar" Style="width:280px;">
                
                <div class="titulo sacar" style="text-align: right;padding-bottom: 30px;">
                    <input type="button" id="btnSacar" value="Sacar" class="button" style="width: 100px;">
                    <input type="button" id="btnReinvestir" value="Reinvestir" class="button-novo" style="width: 120px;">
                </div>
                
                
                <div style="text-align: center;">
                    <label class="titulo" style="font-size: 18px;margin-bottom: 5px;"><b>Listagem de saques</b></label>
                    <div id="listaSaques"></div>
                </div>
            </div>
        </div>
        <div id="ReinvestirModal">
            <?php include_once "ReinvestirView.php";?>
        </div>
    </body>
