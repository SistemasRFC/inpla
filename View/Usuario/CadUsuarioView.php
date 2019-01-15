<script src="js/CadUsuarioView.js?rdm=<?php echo time();?>"></script>
<form name="UsuarioForm" method="post" action="Controller/Usuario/UsuarioController.php">
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
            <td><input type="text" id="nmeUsuario" name="nmeUsuario" size="35" class="persist"></td>
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
            <td class="style3">Perfil</td>
            <td class="styleTD1" id="tdcodPerfilW">
                <div id="codPerfil"></div>
            </td>
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
            <td>
                <input type="button" id="btnReiniciarSenha" value="Reiniciar Senha">
            </td>            
        </tr>
    </table>
</form>