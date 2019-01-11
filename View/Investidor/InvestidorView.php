<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
    <script src="View/Investidor/js/InvestidorView.js?rdm=<?php echo time();?>"></script>
    <form name="InvestidorForm" method="post" action="Controller/Usuario/UsuarioController.php">
        <input type="hidden" id="method" name="method">
        <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
        <table>
            <tr>
                <td>
                    Nome Completo
                </td>
                <td><input type="text" id="nmeUsuarioCompleto" name="nmeUsuarioCompleto" size="35" class="persist"></td>
            </tr>
            <tr>
                <td>
                    Login
                </td>
                <td><input type="text" id="nmeLogin" name="nmeLogin" size="35" class="persist"></td>
            </tr>
            <tr>
                <td>
                    CPF
                </td>
                <td><input type="text" id="nroCpf" name="nroCpf" size="20" class="persist"></td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td><input type="text" id="txtEmail" name="txtEmail" size="35" class="persist"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="indAtivo" id="indAtivo" class="persist">Ativo</td>
            </tr>         
        </table>
        <table>
            <tr>
                <td>
                    <input type="button" id="btnSalvar" value="Salvar">
                </td>
            </tr>
        </table>
    </form>
</html>