<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
<html>
  <head>
      <title>Cadastro de Perfil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="js/PerfilView.js?rdm=<?php echo time();?>"></script>

  </head>
  <body>
      <input type="hidden" id="method" name="method" value="">
      <table width="100%" id="CadastroPerfil">
          <tr>
              <td style="text-align:left;
                    height:10%;
                    font-size:16px;
                    color:#0150D3;
                    vertical-align:middle;
                    font-family: arial, helvetica, serif;
                    border-bottom: 1px solid #0150D3;">
                  Cadastro de Perfil
              </td>
          </tr>
          <tr>
              <td>
                  <input type="button" id="btnNovo" value="Novo Perfil">
              </td>
          </tr>
          <tr>
              <td id='tdListaPerfil'>
                  <div id="listaPerfil"></div>
              </td>
          </tr>
      </table>
      <div id="CadPerfil">
            <div id="windowHeader">
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadPerfilView.php";?>
            </div>
      </div>
  </body>
</html>
