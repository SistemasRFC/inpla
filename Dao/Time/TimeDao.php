<?php
include_once("Dao/BaseDao.php");
class TimeDao extends BaseDao
{
    Protected $tableName = "EN_TIME";

    Protected $columns = array ("dscTime"   => array("column" =>"dsc_time", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"ind_ativo", "typeColumn" =>"S"));

    Protected $columnKey = array("codTime"=> array("column" =>"cod_time", "typeColumn" => "I"));

    Public Function TimeDao() {
        $this->conect();
    }

    Public Function ListarTime() {
        return $this->MontarSelect();
    }

    Public Function UpdateTime(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertTime(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}