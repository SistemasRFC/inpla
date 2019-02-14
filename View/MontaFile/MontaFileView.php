<?php
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RADI - Monta File</title>
        <script src="../MontaFile/JavaScript/MontaFileView.js?rdm=<?php echo time();?>"></script>        
    </head>
    <body>
        <input type="hidden" id="method">
        <input type="hidden" id="codUsuario">
        <div class="card" style="max-width: 510px;">
            <div class="cabecalho">Monta File</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="Refresh" value="Atualiza" onclick="javascript:MontaListaTabelas();" class="button-novo">
            </div>
            
            <div class="titulo">
                <div id="listaTabelas"></div>
            </div>
        </div>
    </body>
</html>
