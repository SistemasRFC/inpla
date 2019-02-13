<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
include_once PATH . "View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>INPLA - Validação de Investimentos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/ValidaInvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
        <input type="hidden" id="codStatus" name="codStatus" class="persist">
        <div class="card" style="max-width: 460px;">
            <div class="cabecalho">Validação de Investimentos</div>
            
            <div class="titulo">
                <div id="listaInvestimentosInativos"></div>
            </div>
        </div>
        <div id="ValidaInvestimentoForm">
              <div id="windowHeader"></div>
              <div style="overflow: hidden;" id="windowContent">
                  <?php include_once "CadValidaInvestimentoView.php";?>
              </div>
        </div>
    </body>
</html>