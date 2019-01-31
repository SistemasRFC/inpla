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
        <div class="card" style="max-width: 600px;">
            <div class="titulo">
                <input type="button" id="btnNovo" value="Novo Time" class="button" style="width: 150px;background-color: darkslategrey;">
            </div>
            
            <div class="titulo">
                <div id="listaTime"></div>
            </div>
        </div>
        <div id="ModalTime">
            <?php include_once "CadTimeView.php";?>
        </div>
    </body>
</html>
