<?php 
include_once getenv("CONSTANTES");
include_once PATH."/View/MenuPrincipal/Cabecalho.php";?>
<HTML>
    <HEAD>
    <title>Permissão de Menus</title>
    <script src="js/PermissaoMenuView.js?rdm=<?php echo time();?>"></script>
    </HEAD>
    <BODY>
        <form name="PermissaoForm" id="PermissaoForm" method="post" action="Controller/PermissaoMenu/PermissaoMenuController.php">
            <input type="hidden" value="" name="method" id="method">
            <input type="hidden" value="" name="codMenu" id="codMenu">
            <input type="hidden" value="" name="indAtivo" id="indAtivo">
            <table width="100%">
                <tr>
                    <td width="100%"
                        style="text-align:left;
                         height:10%;
                         font-size:16px;
                         color:#0150D3;
                         vertical-align:middle;
                         font-family: arial, helvetica, serif;
                          border-bottom: 1px solid #0150D3;">
                        Permissões de Menu
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="30%" border="0" align="left">
                            <tr>
                                <td class="style3">Perfil</td>
                                <td class="styleTD1" id="tdcodPerfil">
                                    <div id="codPerfil"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="MenusExistentes">
                        <table width="100%" border="0" align="center">
                            <tr>
                                <td>Menus Existentes</td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="ListaMenus">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id='jqxWidget' style='font-family: Verdana Arial; font-size: 12px; width: 100%; border: 1px solid #000000;'>
                                        <table width="100%" id="checkboxes">
                                        
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="MenusExistentes">
                        <input type="button" id="btnSalvar" value="Salvar">
                    </td>
                </tr>
            </table>
        </form>
    </BODY>
</HTML>
