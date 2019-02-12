<?php
include_once("Dao/BaseDao.php");
class MenuDao extends BaseDao
{
    function MenuDao() {
        $this->conect();
    }

    /**
     * Retorna uma lista de menus
     * @return array
     */
    function ListaMenus() {
        try {
            $sql_lista = " SELECT COD_MENU_W,
                                  COD_MENU_W AS ID,
                                  DSC_MENU_W,
                                  DSC_MENU_W AS DSC
                             FROM SE_MENU
                            WHERE COD_MENU_PAI_W > -1 
                              AND IND_VISIBLE = 'S'
                            UNION
                           SELECT '0' AS COD_MENU_W,
                                  '0' AS ID,
                                  'Sem Pai' AS DSC_MENU_W,
                                  'Sem Pai' AS DSC
                            ORDER BY DSC_MENU_W";
            $lista = $this->selectDB("$sql_lista", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $lista;
    }

    function ListarMenusAutoComplete($parametro) {
        try {
            $sql_lista = " SELECT COD_MENU_W,
                                  DSC_MENU_W,
                                  NME_CONTROLLER,
                                  NME_METHOD,
                                  IND_MENU_ATIVO_W,
                                  COD_MENU_PAI_W,
                                  COALESCE(IND_ATALHO,'N') AS IND_ATALHO,
                                  COALESCE(DSC_CAMINHO_IMAGEM, '') AS DSC_CAMINHO_IMAGEM,
                                  (SELECT COUNT(*)
                                     FROM SE_MENU
                                    WHERE COD_MENU_W > 0
                                      AND COD_MENU_PAI_W = M.COD_MENU_W) AS QTD
                              FROM SE_MENU M
                             WHERE COD_MENU_PAI_W >= 0
                               AND DSC_MENU_W LIKE '$parametro%'";
            $lista = $this->selectDB("$sql_lista", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $lista;
    }

    public function ListarMenusGrid() {
        try {
            $sql_lista = " SELECT M.COD_MENU_W,
                                  M.COD_MENU_W AS ID,
                                  M.DSC_MENU_W,
                                  M.DSC_MENU_W AS DSC,
                                  M.NME_CONTROLLER,
                                  M.NME_METHOD,
                                  M.IND_MENU_ATIVO_W,
                                  M.IND_VISIBLE,
                                  M.COD_MENU_PAI_W,
                                  COALESCE(M1.DSC_MENU_W, '- - - - - - -') AS DSC_MENU_PAI,
                                  COALESCE(M.IND_ATALHO,'N') AS IND_ATALHO,
                                  COALESCE(M.DSC_CAMINHO_IMAGEM, '') AS DSC_CAMINHO_IMAGEM,
                                  (SELECT COUNT(*)
                                     FROM SE_MENU
                                    WHERE COD_MENU_W > 0
                                      AND COD_MENU_PAI_W = M.COD_MENU_W) AS QTD
                             FROM SE_MENU M
                             LEFT JOIN SE_MENU M1
                               ON M.COD_MENU_PAI_W = M1.COD_MENU_W
                            WHERE M.COD_MENU_PAI_W >= 0";
            $lista = $this->selectDB("$sql_lista", false);
        } catch (Exception $e) {
            echo "erro" . $e;
        }
        return $lista;
    }

    function AddMenu() {
        $sql_lista = " INSERT INTO SE_MENU (
                              COD_MENU_W, DSC_MENU_W,
                              NME_CONTROLLER, IND_MENU_ATIVO_W,
                              COD_MENU_PAI_W, NME_METHOD,
                              DSC_CAMINHO_IMAGEM, IND_ATALHO, IND_VISIBLE) 
                       VALUES (
                              " .$this->CatchUltimoCodigo('SE_MENU', 'COD_MENU_W'). ", "
                              . "'" .filter_input(INPUT_POST, 'dscMenuW', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . "'" .filter_input(INPUT_POST, 'nmeController', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . "'" .filter_input(INPUT_POST, 'indMenuAtivoW', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . filter_input(INPUT_POST, 'codMenuPaiW', FILTER_SANITIZE_NUMBER_INT). ", "
                              . "'" .filter_input(INPUT_POST, 'nmeMethod', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . "'" .filter_input(INPUT_POST, 'dscCaminhoImagem', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . "'" .filter_input(INPUT_POST, 'indAtalho', FILTER_SANITIZE_MAGIC_QUOTES). "', "
                              . "'" .filter_input(INPUT_POST, 'indVisible', FILTER_SANITIZE_MAGIC_QUOTES). "') ";
        $result = $this->insertDB("$sql_lista");
        $result[2] = $sql_lista;
        return $result;

    }

    function UpdateMenu() {
        $sql_lista = " UPDATE SE_MENU 
                          SET DSC_MENU_W = '" . filter_input(INPUT_POST, 'dscMenuW', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              NME_CONTROLLER = '" . filter_input(INPUT_POST, 'nmeController', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              IND_MENU_ATIVO_W = '" . filter_input(INPUT_POST, 'indMenuAtivoW', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              COD_MENU_PAI_W = " . filter_input(INPUT_POST, 'codMenuPaiW', FILTER_SANITIZE_NUMBER_INT) . ",
                              NME_METHOD = '" . filter_input(INPUT_POST, 'nmeMethod', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              DSC_CAMINHO_IMAGEM = '" . filter_input(INPUT_POST, 'dscCaminhoImagem', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              IND_ATALHO = '" . filter_input(INPUT_POST, 'indAtalho', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              IND_VISIBLE = '" . filter_input(INPUT_POST, 'indVisible', FILTER_SANITIZE_MAGIC_QUOTES) . "'
                        WHERE COD_MENU_W = " . filter_input(INPUT_POST, 'codMenuW', FILTER_SANITIZE_NUMBER_INT);
        $result = $this->insertDB("$sql_lista", false);
        return $result;

    }

    function DeleteMenu() {
        $sql_lista = " DELETE FROM SE_MENU
                        WHERE COD_MENU_W = " . filter_input(INPUT_POST, 'codMenu', FILTER_SANITIZE_NUMBER_INT);
        $result = $this->insertDB("$sql_lista", false);
        return $result;

    }

}
?>
