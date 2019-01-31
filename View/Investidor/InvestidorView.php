<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="View/Investidor/js/InvestidorView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <div id="CadInvestidor" class="modal">
            <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
            <div class="card" style="margin-top: 0px; padding-top: 2px; max-width: 500px;">
                <span id="fechaModal" class="close" style="margin-top: 8px;">&times;</span>
                <h4>Preencha todos os campos</h4>

                <label for="nmeUsuarioCompleto" class="titulo">Nome Completo *</label>
                <input required type="text" id="nmeUsuarioCompleto" name="nmeUsuarioCompleto"
                    class="persist input" placeholder="Não utilize abreviações" style="text-transform:uppercase;">

                <label for="nmeUsuarioInvestidor" class="titulo">Login *</label>
                <input required type="text" id="nmeUsuarioInvestidor" name="nmeUsuarioInvestidor" class="input">

                <label for="nroCpf" class="titulo">CPF *</label>
                <input type="text" id="nroCpf" name="nroCpf" class="persist input">

                <label for="txtEmail" class="titulo">Email *</label>
                <input required type="text" id="txtEmail" name="txtEmail" class="persist input">
                
                <div class="titulo">
                    <input type="button" id="btnSalvar" value="Salvar" class="button">
                </div>
            </div>
        </div>
    </body>
</html>