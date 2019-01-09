<script src="js/CadMenuView.js?rdm=<?php echo time();?>"></script>
<<<<<<< HEAD
<form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/CadastroMenuController.php">
    <input type="hidden" id="indAtivo1" name="indAtivo1" class="persist">
    <input type="hidden" id="codMenu" name="codMenu" value="0" class="persist">    
    <input type="hidden" id="dscCaminhoImagem" name="dscCaminhoImagem" class="persist">
=======
<form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/MenuController.php">
    <input type="hidden" id="indAtivo1" name="indAtivo1">
    <input type="hidden" id="codMenu" name="codMenu" value="0">    
    <input type="hidden" id="dscCaminhoImagem" name="dscCaminhoImagem">
>>>>>>> d3189162ba88ea71eeaed1eec345c8d5209e93d2
    <table width="100%">
    <tr>
        <td>
            <table width="70%" align="left">
                <tr>
                    <td class="style2">Menu</td>
                </tr>
                <tr>
                    <td class="styleTD1">
                        <input name="dscMenu" id="dscMenu" size="30" class="persist">
                    </td>
                </tr>
                <tr>
                    <td class="style2">Controller</td>
                </tr>
                <tr>
                    <td class="styleTD1">
                        <input name="nmeController" id="nmeController" size="50" class="persist">
                        <input type="hidden" name="nmeClasse" id="nmeClasse" size="50" class="persist">
                    </td>
                    <td>
                        <input type="button" id="btnListarController" value="Listar Controllers">
                    </td>
                </tr>
                <tr>
                    <td class="style2">Method</td>
                </tr>
                <tr>
                    <td class="styleTD1">
                        <input name="nmeMethod" id="nmeMethod" size="50" class="persist">
                    </td>
                    <td>
                        <input type="button" id="btnListarMetodos" value="Listar Métodos">
                    </td>
                </tr>
                <tr>
                    <td class="style2">
                        <input type="checkbox" name="indAtalho" id="indAtalho" class="persist">Atalho
                    </td>
                </tr>
                <tr>
                    <td class="style2">
                        <input type="checkbox" name="indAtivo" id="indAtivo" class="persist">Ativo
                    </td>
                </tr>
                <tr>
                    <td class="style2">Menu Pai</td>
                </tr>
                <tr>
                    <td class="styleTD1" id="tdcodMenuPai">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </table>    
    Selecione o arquivo:<br>
    <input type="file" name="arquivo" id="arquivo" size="45" class="persist"/>
    <br />
    <progress value="0" max="100"></progress>
    <span id="porcentagem">0%</span>
    <br />
</form>
<table>
    <tr>
        <td>
            <input type="button" id="btnSalvar" value="Salvar">
        </td>
        <td>
            <input type="button" id="btnDeletar" value="Deletar">
        </td>
    </tr>
</table>
