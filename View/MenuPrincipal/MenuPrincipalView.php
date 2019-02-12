<?php 
include_once getenv("CONSTANTES");
include_once "Cabecalho.php";
?>
<head>
    <title>Início - INPLA</title>
    <script src="../../View/MenuPrincipal/js/MenuPrincipalView.js"></script>
<style>
    .grid-container {
        display: grid;
        grid-template-areas:
        'header header header'
        'main main main';
        grid-gap: 10px;
        background-color: #f2f2f2;
    }

    .item1 { grid-area: header; }
    .item2 { grid-area: left; }
    .item3 { grid-area: main; margin: auto}
    .item4 { grid-area: right; }
    .item5 { grid-area: footer; }

    .grid-container > div {
        text-align: center;
        font-size: 24px;
    }
    
    .card-principal {
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.3);
        max-width: 100%;
        padding: 10px 20px;
        background-color: teal;
        border-radius: 8px;
        color: white;
        font-family: arial;
    }
    
    .info {
        font-size: 60px;
        font-weight: bolder;
        color: #00CED1;
        width: 100%;
        text-align: center;
    }
    
    .info-topo {
        font-family: 'arial black';
        font-size: 30px;
        text-align: left;
        font-weight: bolder;
        padding: 5px;
        padding-top: 10px;
    }
    /*Gráfico Knob*/
    #knobContainer {
        position: relative;
    }
    .inputField {
        left: 100px;
        top: 180px;
        width: 200px;
        height: 40px;
        color: black;
        font-size: 26px;
        position: absolute;
        background: transparent;
        text-align: center;
        border: none;
    }
    .inputField2 {
        left: 60px;
        top: 60px;
        width: 180px;
        height: 50px;
        color: black;
        font-size: 20px;
        position: absolute;
        background: transparent;
        text-align: center;
        border: none;
    }
    .inputField3 {
        left: 60px;
        top: 190px;
        width: 180px;
        height: 50px;
        color: black;
        font-size: 20px;
        position: absolute;
        background: transparent;
        text-align: center;
        border: none;
    }
    text.jqx-knob-label {
        font-weight: bold;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 20px;
    }
    .inputField .jqx-input-content {
        background: transparent;
        font-size: 30px;
        color: black;
    }
    #knob2 {
        position: absolute !important;
        top: 50px;
        left: 50px;
    }
    #knob3 {
        position: absolute !important;
        top: 0;
        left: 0;
    }
</style>
</head>
<body>
    <div class="card" style="max-width: 100%;">
        <div class="grid-container">
            <div class="item1" style="text-align: left;">
                <div class="card-principal">
                    Acompanhe seu rendimento
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="item3">
                    <div style="width: 100%; margin: 0 auto;">
                        <div id="DadosInvestimentoKnob"></div>
                    </div>
            </div>
        </div>
    </div>
</body>