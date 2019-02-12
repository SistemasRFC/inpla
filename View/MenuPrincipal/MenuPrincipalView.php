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
        'left main right';
        grid-gap: 5px;
        background-color: #f2f2f2;
    }

    .item1 { grid-area: header; }
    .item2 { grid-area: left; }
    .item3 { grid-area: main; margin: auto}
    .item4 { grid-area: right; }
    .item5 { grid-area: footer; }
    
    .card-principal {
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.3);
        max-width: 100%;
        padding: 10px 20px;
        background-color: teal;
        border-radius: 8px;
        color: white;
        font-family: 'Times New Roman';
        font-size: 22px;
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
            <div class="item4">
                    <div style="width: 100%; margin: 0 auto;">
                        Número de investimentos
                    </div>
            </div>
        </div>
    </div>
</body>