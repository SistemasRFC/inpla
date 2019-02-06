<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
<html>
    <head>
        <title>Cadastro de Times</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/TimeView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" value="">
        <input type="hidden" id="codTime" name="codTime" class="persist">
        <div class="card" style="max-width: 620px;">
            <div class="cabecalho">Cadastro de Times</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Novo Time" class="button-novo">
            </div>
            
            <label for="dscTime" class="titulo">Nome do Time</label>
            <input type="text" id="dscTime" name="dscTime" class="persist input" style="width: 50%;">

            <input type="checkbox" id="indAtivo" name="indAtivo" class="persist input" style="width: 3%;">
            <label for="indAtivo" class="titulo">Ativo</label>
            
            <div class="titulo" style="text-align: right;">
                <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 100px;">
            </div>
            
            <div class="titulo">
                <div id="listaTime"></div>
            </div>
        </div>
    </body>
</html>
