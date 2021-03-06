<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
<html>
  <head>
    <title>Cadastro de Menus</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="js/CadastroMenuView.js?rdm=<?php echo time();?>"></script>

  </head>
  <body>
      <input type="hidden" id="method" name="method" class="persist">
      <table width="100%" id="CadastroMenus">
          <tr>
              <td width="100%"
                  style="text-align:left;
                   height:10%;
                   font-size:16px;
                   color:#0150D3;
                   vertical-align:middle;
                   font-family: arial, helvetica, serif;
                    border-bottom: 1px solid #0150D3;">
                  Cadastro de Menus
              </td>
          </tr>
          <tr>
              <td>
                  <input type="button" id="btnNovo" value="Novo Menu"> 
              </td>
          </tr>          
          <tr>
              <td id="tdMenus">
                  <div id="listaMenus"></div>
              </td>
          </tr>
      </table>
      <div id="CadMenus">
            <div id="windowHeader">
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadMenuView.php";?>
            </div>            
      </div>
      <div id="ListaController">
            <div id="windowHeader">
            </div>
            <div id="windowContent">
                <?php include_once "ListaControllerView.php";?>
            </div>            
      </div>  
      <div id="ListaMetodos">
            <div id="windowHeader">
            </div>
            <div id="windowContent">
                <?php include_once "ListaMetodosView.php";?>
            </div>            
      </div>     
      <div id='jqxMenu' style="display: none;">
        <ul>
            <li><a href="#">Novo</a></li>
            <li><a href="#">Editar</a></li>            
        </ul>
      </div>
  </body>
</html>
