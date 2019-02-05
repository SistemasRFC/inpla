<?php
include_once("Dao/BaseDao.php");
class GolDao extends BaseDao
{
    Protected $tableName = "EN_GOL";

    Protected $columns = array ("codJogo"   => array("column" =>"COD_JOGO", "typeColumn" =>"I"),
                                "codTime"   => array("column" =>"COD_TIME", "typeColumn" =>"I"),
                                "nroMinutos"   => array("column" =>"NRO_MINUTOS", "typeColumn" =>"S"),
                                "nroTempo"   => array("column" =>"NRO_TEMPO", "typeColumn" =>"S"));

    Protected $columnKey = array("codGol"=> array("column" =>"COD_GOL", "typeColumn" => "I"));

    Public Function GolDao() {
        $this->conect();
    }

    Public Function ListarGol() {
        return $this->MontarSelect();
    }

    Public Function UpdateGol(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertGol(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}