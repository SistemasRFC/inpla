<?php
include_once("Dao/BaseDao.php");
class EstadioDao extends BaseDao
{
    Protected $tableName = "EN_ESTADIO";

    Protected $columns = array ("dscEstadio"   => array("column" =>"DSC_ESTADIO", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codEstadio"=> array("column" =>"COD_ESTADIO", "typeColumn" => "I"));

    Public Function EstadioDao() {
        $this->conect();
    }

    Public Function ListarEstadio() {
        return $this->MontarSelect();
    }
    
    Public Function UpdateEstadio(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }
    
    Public Function InsertEstadio(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function ListarEstadiosAtivos() {
        $sql = "SELECT COD_ESTADIO AS ID,
                       DSC_ESTADIO AS DSC
                  FROM EN_ESTADIO
                 WHERE IND_ATIVO = 'S'
                UNION
                SELECT 0 AS ID,
                       '(Selecione)' AS DSC";
        return $this->selectDB($sql, false);
    }
}