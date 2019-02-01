<?php
include_once("Dao/BaseDao.php");
class TimeDao extends BaseDao
{
    Protected $tableName = "EN_TIME";

    Protected $columns = array ("dscTime"   => array("column" =>"DSC_TIME", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codTime"=> array("column" =>"COD_TIME", "typeColumn" => "I"));

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