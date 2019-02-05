<?php
include_once("Dao/BaseDao.php");
class JogoDao extends BaseDao
{
    Protected $tableName = "RE_JOGO";

    Protected $columns = array ("codTime1"   => array("column" =>"COD_TIME_1", "typeColumn" =>"I"),
                                "codTime2"   => array("column" =>"COD_TIME_2", "typeColumn" =>"I"),
                                "codEstadio"   => array("column" =>"COD_ESTADIO", "typeColumn" =>"I"),
                                "dtaJogo"   => array("column" =>"DTA_JOGO", "typeColumn" =>"S"),
                                "hraJogo"   => array("column" =>"HRA_JOGO", "typeColumn" =>"S"));

    Protected $columnKey = array("codJogo"=> array("column" =>"COD_JOGO", "typeColumn" => "I"));

    Public Function JogoDao() {
        $this->conect();
    }

    Public Function ListarJogo() {
        $sql = "SELECT J.COD_JOGO,
                       CONCAT('<a href=\"javascript:lancarGol(',J.COD_JOGO,')\"><img src=\"../../Resources/images/gol.png\" title=\"Registrar Gol\" width=\"20\" height=\"\"></a>') AS ACAO,
                       J.COD_TIME_1,
                       J.COD_TIME_2,
                       CONCAT(T.DSC_TIME,' ',
                              (SELECT COALESCE(COUNT(G.COD_GOL), 0)
                                 FROM EN_GOL G 
                                INNER JOIN RE_JOGO J1
                                   ON G.COD_JOGO = J1.COD_JOGO
                                  AND G.COD_TIME = J1.COD_TIME_1
                                WHERE J1.COD_JOGO = J.COD_JOGO),
                              ' X ',
                              (SELECT COALESCE(COUNT(G.COD_GOL), 0)
                                 FROM EN_GOL G 
                                INNER JOIN RE_JOGO J1
                                   ON G.COD_JOGO = J1.COD_JOGO
                                  AND G.COD_TIME = J1.COD_TIME_2
                                WHERE J1.COD_JOGO = J.COD_JOGO),' ',
                              T1.DSC_TIME) AS DSC_JOGO,
                       J.COD_ESTADIO,
                       E.DSC_ESTADIO,
                       DTA_JOGO AS DTA_JOGO_W,
                       DTA_JOGO,
                       HRA_JOGO
                  FROM RE_JOGO J
                 INNER JOIN EN_TIME T
                    ON J.COD_TIME_1 = T.COD_TIME
                 INNER JOIN EN_TIME T1
                    ON J.COD_TIME_2 = T1.COD_TIME
                 INNER JOIN EN_ESTADIO E
                    ON J.COD_ESTADIO = E.COD_ESTADIO
                 GROUP BY J.COD_JOGO
                 ORDER BY DTA_JOGO, HRA_JOGO";
        return $this->selectDB($sql, false);
    }

    Public Function UpdateJogo(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertJogo(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function CarregaTimesJogo() {
        $sql = "SELECT J.COD_TIME_1,
                       J.COD_TIME_2,
                       T.DSC_TIME AS DSC_TIME_1,
                       T1.DSC_TIME AS DSC_TIME_2
                  FROM RE_JOGO J
                 INNER JOIN EN_TIME T
                    ON J.COD_TIME_1 = T.COD_TIME
                 INNER JOIN EN_TIME T1
                    ON J.COD_TIME_2 = T1.COD_TIME
                 WHERE J.COD_JOGO =".filter_input(INPUT_POST, 'codJogo', FILTER_SANITIZE_NUMBER_INT);
        return $this->selectDB($sql, false);
    }
}