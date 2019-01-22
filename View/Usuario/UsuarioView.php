<?php
include_once getenv("CONSTANTES");
include_once PATH . "View/MenuPrincipal/Cabecalho.php";
?>
<html>
    <head>
        <title>Cadastro de Usuários</title>
        <script src="js/UsuarioView.js?rdm=<?php echo time(); ?>"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
    </head>
    <body>
        <table width="100%" id="CadastroUsuarios">
            <tr>
                <td width="100%"
                    style="text-align:left;
                    height:10%;
                    font-size:16px;
                    color:#0150D3;
                    vertical-align:middle;
                    font-family: arial, helvetica, serif;
                    border-bottom: 1px solid #0150D3;">
                    Usu&aacute;rios
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" id="btnNovo" value="Novo Usu&aacute;rio">
                </td>
            </tr>          
            <tr>
                <td id="tdGrid">
                    <div id="listaUsuarios">
                    </div>
                </td>
            </tr>
        </table>
        <div id="CadUsuarios">
            <div id="windowHeader"></div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadUsuarioView.php"; ?>
            </div>
        </div>
    </body>
</html>