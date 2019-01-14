<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="View/Investidor/js/InvestidorView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <form name="InvestidorForm" method="post" action="Controller/Investidor/InvestidorController.php">
            <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
            <table width="100%">
                <tr>
                    <td style="padding-bottom: 20px;color: darkslategrey;">
                        <b>Preencha todos os campos</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="titulo">
                            Nome Completo *<br>
                        </div>
                        <div>
                            <input required type="text" id="nmeUsuarioCompleto" name="nmeUsuarioCompleto"
                                size="30" class="persist" placeholder="Não utilize abreviações">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="titulo">
                            Login *<br>
                        </div>
                        <div>
                            <input required type="text" id="nmeUsuario" name="nmeUsuario" size="30" class="persist">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="titulo">
                            CPF *<br>
                        </div>
                        <div>
                            <input type="text" id="nroCpf" name="nroCpf" size="20" class="persist">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="titulo">
                            Email *<br>
                        </div>
                        <div>
                            <input required type="text" id="txtEmail" name="txtEmail" size="30" class="persist">
                        </div>
                    </td>
                </tr>        
                <tr align="right">
                    <td style="padding-top: 30;">
                        <input type="button" id="btnSalvar" value="Salvar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>