<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>INPLA - Cadastro de Bancos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/BancoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codBanco" name="codBanco" value="0" class="persist">    
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 610px;">
            <div class="cabecalho">Cadastro de Bancos</div>

            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Novo Banco" class="button-novo">
            </div>
            <table width="100%">
                <tr>
                    <td>
                        <label for="dscBanco" class="titulo">Banco</label>
                        <input type="text" id="dscBanco" name="dscBanco" class="persist input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nroAgencia" class="titulo">Agência</label>
                        <input type="text" id="nroAgencia" name="nroAgencia" class="persist input">
                    </td>
                    <td>
                        <label for="nroConta" class="titulo">Conta</label>
                        <input type="text" id="nroConta" name="nroConta" class="persist input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dscTitular" class="titulo">Titular</label>
                        <input type="text" id="dscTitular" name="dscTitular" class="persist input">
                    </td>
                    <td>
                        <label for="nroCpf" class="titulo">CPF</label>
                        <input type="text" id="nroCpf" name="nroCpf" class="persist input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="indAtivo" name="indAtivo" class="persist input" style="width: 3%;">
                        <label for="indAtivo" class="titulo">Ativo</label>
                    </td>
                </tr>
            </table>

            <div class="titulo" style="text-align: right;">
                <input type="button" id="btnSalvar" value="Salvar" class="button" style="width: 100px;">
            </div>
            
            <div class="titulo">
                <div id="listaBancos"></div>
            </div>
        </div>
    </body>
