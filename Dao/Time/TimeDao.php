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

    Public Function ListarTimesAtivos() {
        $sql = "SELECT COD_TIME AS ID,
                       DSC_TIME AS DSC
                  FROM EN_TIME 
                 WHERE IND_ATIVO = 'S'";
    if(filter_input(INPUT_POST, 'codTime1', FILTER_SANITIZE_NUMBER_INT) != ''){
        $sql .= "AND COD_TIME <> ".filter_input(INPUT_POST, 'codTime1', FILTER_SANITIZE_NUMBER_INT)." ";
    }
        $sql .= "UNION
                SELECT 0 AS ID,
                       '(Selecione)' AS DSC";
        return $this->selectDB($sql, false);
    }
}