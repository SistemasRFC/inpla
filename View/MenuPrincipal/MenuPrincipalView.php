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
        'left main right'
        'left main right';
        grid-gap: 10px;
        background-color: #f2f2f2;
    }

    .item1 { grid-area: header; }
    .item2 { grid-area: left; }
    .item3 { grid-area: main; }
    .item4 { grid-area: right; }
    .item5 { grid-area: footer; }

    .grid-container > div {
    text-align: center;
    font-size: 30px;
    }
</style>
</head>
<body>
    <div class="card" style="max-width: 100%;">
        <div class="grid-container">
            <div class="item2">
                <div class="card" style="max-width: 100%;background-color: #D8C7C7">
                    <div class="info">Teste</div>
                    <img src="">
                </div>
            </div>
            <div class="item3">
                <div class="card" style="max-width: 100%;background-color: #D8C7C7">
                <div class="info">Teste 2</div>
                    <img src="">
                </div>
            </div>
            <div class="item4">
                <div class="card" style="max-width: 100%;background-color: #D8C7C7">
                <div class="info">Teste 3</div>
                    <img src="">
                </div>
            </div>
        </div>
    </div>
</body>