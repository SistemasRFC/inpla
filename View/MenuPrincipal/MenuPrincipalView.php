<?php 
include_once getenv("CONSTANTES");
include_once "Cabecalho.php";
include_once "Rodape.php";
?>
<head>
    <title>Início - RADI</title>
    <script src="../../View/MenuPrincipal/js/MenuPrincipalView.js"></script>
<style>
    /*Grid*/
    .grid-container {
        display: grid;
        grid-template-areas:
        'header header header'
        'left main right';
        grid-gap: 20px;
        background-color: #f2f2f2;
    }
    .item1 { grid-area: header; }
    .item2 { grid-area: left; }
    .item3 { grid-area: main; margin: auto }
    .item4 { grid-area: right;}

    /*Card*/
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
    
    .alert {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 14px 10px;
        margin: 10px;
        background-color: #1E90FF;
        border-radius: 5px;
        color: white;
        font-size: 20px;
        font-family: 'Courier New';
        font-weight: bold;
        width: 380;
        height: auto;
    }

    /*Quadro de avisos*/
    .topo-avisos {
        padding: 12px 0px;
        margin: 0px;
        background-color: #CD6600;
        color: white;
        text-align: center;
        font-size: 22px;
        font-family: 'times new roman';
        width: auto;
        height: 20;
    }

    /*chip -- recados do quadro de avisos*/
    .chip {
        display: inline-block;
        padding: 0 10px;
        margin: 8px 10px;
        width: 460px;
        height: auto;
        font-size: 18px;
        line-height: 50px;
        border-radius: 10px;
        background-color: #E8E8E8;
    }
    .closebtn {
        padding-left: 10px;
        color: #888;
        font-weight: bold;
        float: right;
        font-size: 20px;
        cursor: pointer;
    }
    .closebtn:hover {
        color: #000;
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
            <div class="item2" style="width: 500px;">
                    <div class="alert">
                        <div class="topo-avisos" style="background-color: #0000FF;color: white;border-radius: 5px;margin-bottom: 5px;">Investimentos</div>
                        Todos: <?php echo $_SESSION['dadosInvestidor']["NRO_INVESTIMENTOS"]; ?><br>
                        &nbsp;&nbsp;&nbsp;&raquo; Ativos: <?php echo $_SESSION['dadosInvestidor']["NRO_INVESTIMENTOS_ATIVOS"]; ?><br>
                        &nbsp;&nbsp;&nbsp;&raquo; Pendentes: <?php echo $_SESSION['dadosInvestidor']["NRO_INVESTIMENTOS_PENDENTES"]; ?>
                    </div>
            </div>
            <div class="item3" style="width: 450px;">
                    <div>
                        <div id="DadosInvestimentoKnob"></div>
                    </div>
            </div>
            <div class="item4" style="width: 500px;">
                    <div class="card" style="background-color: #FF7F00;height: 350px; padding: 0px 0px;">
                        <div class="topo-avisos">Quadro de Avisos</div>
                        <div class="chip">
                            <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
                            Bem Vindo ao RADI!! :)
                        </div>
                        <div class="chip">
                            <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
                            Saldo disponível para saque!
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>