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
                padding: 5px 5px;
                margin: 4px 0;
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

            .alert {
                padding: 14px;
                margin-bottom: 10px;
                margin-top: 8px;
                background-color: #ff9800;
                color: white;
            }
        </style>
    </head>
    <body>
        <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
        <div class="card">
            <form name="InvestidorForm" method="post" action="Controller/Investidor/InvestidorController.php">
                <div class="cabecalho">Dados Pessoais</div>
                
                <label for="nmeUsuarioCompleto" class="titulo">Nome Completo *</label>
                <input type="text" id="nmeUsuarioCompleto" name="nmeUsuarioCompleto" class="persist input" disabled>
                
                <label for="nroCpf" class="titulo">CPF *</label>
                <input type="text" id="nroCpf" name="nroCpf" class="persist input" disabled>
                
                <div class="cabecalho">Contato</div>
                
                <label for="nroTelCelular" class="titulo">Celular</label>
                <input type="text" id="nroTelCelular" name="nroTelCelular" class="persist input">

                <label for="txtEmail" class="titulo">Email *</label>
                <input required type="text" id="txtEmail" name="txtEmail" placeholder="exemplo@email.com" class="persist input">

                <div class="cabecalho">Dados Bancários</div>
                <div class="alert"><b>Atenção!</b><br>Sua conta bancária deverá estar no nome e cpf cadastrados acima.</div>

                <label for="dscBanco" class="titulo">Banco</label>
                <input type="text" id="dscBanco" name="dscBanco" class="persist input">

                <label for="nroAgencia" class="titulo">Agência</label>
                <input type="text" id="nroAgencia" name="nroAgencia" class="persist input">

                <label for="nroConta" class="titulo">Conta</label>
                <input type="text" id="nroConta" name="nroConta" class="persist input">

                <label for="nroOperacao" class="titulo">Operação</label>
                <input type="text" id="nroOperacao" name="nroOperacao" class="persist input">

                <label for="tpoConta" class="titulo">Tipo de conta</label>
                <input type="text" id="tpoConta" name="tpoConta" class="persist input">
                
                <div class=titulo>
                    <input type="button" id="btnSalvar" value="Salvar" class="button">
                </div>
            </form>
        </div>
    </body>
</html>