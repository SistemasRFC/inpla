<form name="menuForm" enctype="multpart/form-data" id="CadPerfilForm" method="post" action="../../Controller/Menu/MenuController.php">    
    <input type="hidden" id="method" name="method">    
    <input type="hidden" id="codPerfil" name="codPerfil">
    <table>
        <tr>
            <td>Descri&ccedil;&atilde;o</td>
        </tr>
        <tr>
            <td><input type="text" id="dscPerfil"></td>
        </tr>
        <tr>
            <td><div id="indAtivo"> Perfil Ativo</div></td>
        </tr>        
        <tr>
            <td>
                <input type="button" id="btnSalvar" name="btnSalvar" value="Salvar">
            </td>
        </tr>
    </table>
</form>
