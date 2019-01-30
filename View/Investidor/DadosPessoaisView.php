<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Dados Pessoais</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="js/DadosPessoaisView.js?rdm=<?php echo time(); ?>"></script>
        <style>
            .input {
                width: 100%;
                padding: 6px 5px;
                margin: 4px 0;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);
                max-width: 800px;
                margin: auto;
                margin-top: 15px;
                font-family: arial;
                background-color: #f2f2f2;
                padding: 20px 25px;
            }

            .cabecalho {
                margin-top: 5px;
                font-size: 22px;
                font-weight: bold;
                text-align: center;
            }

            .titulo {
                padding: 5px;
                padding-top: 10px;
                font-size: 16px;
            }

            .button {
                border: none;
                padding: 10px;
                color: white;
                background-color: #2E2EFE;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .button:hover {
                opacity: 0.7;
            }
        </style>
    </head>
    <body>
        <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
        <div class="card">
            <form name="InvestidorForm" method="post" action="Controller/Investidor/InvestidorController.php">
                <div class="cabecalho">Dados Pessoais</div>
                
                <label for="nmeUsuarioCompleto" class="titulo">Nome Completo *</label>
                <input required id="nmeUsuarioCompleto" name="nmeUsuarioCompleto" class="persist input" disabled>
                
                <label for="nroCpf" class="titulo">CPF *</label>
                <input required id="nroCpf" name="nroCpf" class="persist input" disabled>
                
                <div class="cabecalho">Contato</div>
                
                <label for="nroTelCelular" class="titulo">Celular</label>
                <input id="nroTelCelular" name="nroTelCelular" class="persist input">

                <label for="txtEmail" class="titulo">Email *</label>
                <input required id="txtEmail" name="txtEmail" placeholder="exemplo@email.com" class="persist input">

                <div class="cabecalho">Dados Bancários</div>

                <label for="dscBanco" class="titulo">Banco</label>
                <input id="dscBanco" name="dscBanco" class="persist input">

                <label for="nroAgencia" class="titulo">Agência</label>
                <input id="nroAgencia" name="nroAgencia" class="persist input">

                <label for="nroConta" class="titulo">Conta</label>
                <input id="nroConta" name="nroConta" class="persist input">

                <label for="nroOperacao" class="titulo">Operação</label>
                <input id="nroOperacao" name="nroOperacao" class="persist input">

                <label for="tpoConta" class="titulo">Tipo de conta</label>
                <input id="tpoConta" name="tpoConta" class="persist input">
                
                <div class=titulo>
                    <input type="button" id="btnSalvar" value="Salvar" class="button">
                </div>
            </form>
        </div>
    </body>
</html>