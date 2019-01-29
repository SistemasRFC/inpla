<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Cadastro de Planos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/PlanoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="codPlano" name="codPlano" value="0" class="persist">    
        <input type="hidden" id="method" name="method" class="persist">
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
                    Cadastro de Planos
                </td>
            </tr>
        </table>
        <form name="planoForm" enctype="multpart/form-data" id="cadastroPlanoForm" method="post" action="../../Controller/Plano/PLanoController.php">
            <table width="50%">
                <tr>
                    <td class="style2">
                        <input type="button" id="btnNovo" value="Novo Plano">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td class="style2">
                        Descrição<br>
                        <input type="text" name="dscPlano" id="dscPlano" size="20" class="persist">
                    </td>
                    <td class="style2">
                        Valor<br>
                        <input type="text" name="vlrPlano" id="vlrPlano" size="20" class="persist">
                    </td>
                    <td class="style2">
                        <input type="checkbox" name="indAtivo" id="indAtivo" class="persist">Ativo
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right" class="style2">
                        <input type="button" id="btnSalvar" value="Salvar">
                    </td>
                </tr>
            </table>
        </form>
        <table width="100%">
            <tr>
                <td>
                    <div id="listaPlanos" />
                </td>
            </tr>
        </table>
    </body>
