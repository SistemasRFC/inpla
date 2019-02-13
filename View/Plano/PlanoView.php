<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
include_once PATH . "View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>INPLA - Cadastro de Planos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/PlanoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codPlano" name="codPlano" value="0" class="persist">    
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 510px;">
            <div class="cabecalho">Cadastro de Planos</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Novo Plano" class="button-novo">
            </div>
            
            <label for="dscPlano" class="titulo">Descrição</label>
            <input type="text" id="dscPlano" name="dscPlano" class="persist input">

            <label for="vlrPlano" class="titulo">Valor</label>
            <input type="text" id="vlrPlano" name="vlrPlano" class="persist input">

            <input type="checkbox" id="indAtivo" name="indAtivo" class="persist input" style="width: 3%;">
            <label for="indAtivo" class="titulo">Ativo</label>
            
            <div class="titulo" style="text-align: right;">
                <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 100px;">
            </div>
            
            <div class="titulo">
                <div id="listaPlanos"></div>
            </div>
        </div>
    </body>
