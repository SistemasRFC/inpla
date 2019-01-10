<?php
include_once("Dao/BaseDao.php");
class MenuPrincipalDao extends BaseDao
{
    function MenuPrincipalDao() {
        $this->conect();
    }

    function CarregaMenu( $codUsuario, $codMenuPai, $path ) {
        try {
            $sql_localiza = " SELECT DSC_MENU_W,
                                     m.COD_MENU_W,
                                     CONCAT('" .$path. "','/Controller/',NME_CONTROLLER) AS NME_CONTROLLER,
                                     NME_METHOD,
                                     NME_USUARIO_COMPLETO,
                                     M.COD_MENU_PAI_W,
                                     TXT_SENHA_W
                                FROM SE_MENU M
                               INNER JOIN SE_MENU_PERFIL MP
                                  ON M.COD_MENU_W = MP.COD_MENU_W
                               INNER JOIN SE_USUARIO U
                                  ON MP.COD_PERFIL_W = U.COD_PERFIL_W
                               WHERE COD_USUARIO = $codUsuario
                                 AND IND_MENU_ATIVO_W = 'S'
                                 AND M.COD_MENU_PAI_W = $codMenuPai
                               ORDER BY DSC_MENU_W";
            $rs_localiza = $this->selectDB("$sql_localiza", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaMenuNew($codUsuario, $path) {
        try {
            $sql_localiza = " SELECT DSC_MENU_W,
                                     m.COD_MENU_W,                   
                                     NME_CONTROLLER,
                                     CONCAT('" . $path . "','/Controller/',NME_CONTROLLER) AS NME_PATH,
                                     NME_METHOD,
                                     NME_USUARIO_COMPLETO,
                                     M.COD_MENU_PAI_W,
                                     TXT_SENHA_W,
                                     '250px' AS VLR_TAMANHO_SUBMENU
                                FROM SE_MENU M
                               INNER JOIN SE_MENU_PERFIL MP
                                  ON M.COD_MENU_W = MP.COD_MENU_W
                               INNER JOIN SE_USUARIO U
                                  ON MP.COD_PERFIL_W = U.COD_PERFIL_W
                               WHERE COD_USUARIO = $codUsuario
                                 AND IND_MENU_ATIVO_W = 'S'
                                 AND IND_VISIBLE = 'S'
                               ORDER BY DSC_MENU_W";
            $rs_localiza = $this->selectDB("$sql_localiza", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaController($codMenu, $path) {
        try {
            $sql_localiza = " SELECT NME_CONTROLLER,
                                     NME_METHOD
                                FROM SE_MENU M
                               WHERE M.COD_MENU_W = $codMenu";
            $rs_localiza = $this->selectDB("$sql_localiza");
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    function CarregaAtalhos( $codUsuario, $path ) {
        try {
            $sql_localiza = " SELECT DSC_MENU_W,
                                     m.COD_MENU_W,
                                     CONCAT('" .$path. "','/Dispatch.php?controller=',NME_CONTROLLER,'&method=',NME_METHOD) AS NME_CONTROLLER,
                                     NME_METHOD,
                                     NME_USUARIO_COMPLETO,
                                     M.COD_MENU_PAI_W,
                                     CONCAT('" .$path. "',M.DSC_CAMINHO_IMAGEM) as DSC_CAMINHO_IMAGEM,
                                     TXT_SENHA_W
                                FROM SE_MENU M
                               INNER JOIN SE_MENU_PERFIL MP
                                  ON M.COD_MENU_W = MP.COD_MENU_W
                               INNER JOIN SE_USUARIO U
                                  ON MP.COD_PERFIL_W = U.COD_PERFIL_W
                               WHERE COD_USUARIO = $codUsuario
                                 AND IND_MENU_ATIVO_W = 'S'
                                 AND M.IND_ATALHO = 'S'
                               ORDER BY DSC_MENU_W";
            $rs_localiza = $this->selectDB("$sql_localiza", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $rs_localiza;
    }

    public function CarregaDadosUsuario($codUsuario) {
        $sql = "SELECT COD_USUARIO,
                       NME_USUARIO_COMPLETO
                  FROM SE_USUARIO U
                 WHERE U.COD_USUARIO = $codUsuario";
        return $this->selectDB($sql, false);
    }
}
?>
