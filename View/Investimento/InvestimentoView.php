<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
include_once PATH . "View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>RADI - Cadastro de Investimentos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/InvestimentoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codInvestimento" name="codInvestimento" value="0" class="persist">
        <input type="hidden" id="codStatus" name="codStatus" value="0" class="persist">
        <input type="hidden" id="indAtivo" name="indAtivo" value="0" class="persist">
        <input type="hidden" id="method" name="method">
        <div class="card" style="max-width: 870px;">
            <div class="cabecalho" style="padding-bottom: 10px;">Cadastro de Investimentos</div>
            <table width="60%">
                <tr>
                    <td><label for="tdcodPlano" class="titulo">Plano</label></td>
                    <td><label for="tdcodBanco" class="titulo">Banco para depósito</label></td>
                </tr>
                <tr>
                    <td>
                        <div id="tdcodPlano" class="persist"></div>
                    </td>
                    <td>
                        <div id="tdcodBanco" class="persist"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;
                    </td>
                    <td class="titulo">
                        <div id="tdDadosBanco"></div>
                    </td>
                </tr>
            </table>
            <div class="titulo" style="text-align: center;">
                <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 200px;">
            </div>
            
            <div class="titulo">
                <div id="listaInvestimentos"></div>
            </div>
        </div>
        <div id="ModalComprovante">
            <?php include_once "ComprovanteView.php";?>
        </div>
    </body>
</html>