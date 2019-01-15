<?php
include_once("Dao/BaseDao.php");
class PlanoDao extends BaseDao
{
    Protected $tableName = "EN_PLANO";
    
    Protected $columns = array ("dscPlano"   => array("column" =>"DSC_PLANO", "typeColumn" =>"S"),
                                "vlrPlano"   => array("column" =>"VLR_PLANO", "typeColumn" =>"F"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codPlano"=> array("column" =>"COD_PLANO", "typeColumn" => "I"));
    
    Public Function PlanoDao() {
        $this->conect();
    }

    Public Function ListarPlano() {    
        return $this->MontarSelect();
    }
    
    Public Function ListarPlanoAtivo() {
        $sql = " SELECT COD_PLANO as ID,
                        DSC_PLANO as DSC
                   FROM EN_PLANO 
                  WHERE IND_ATIVO='S'
                 UNION
                 SELECT 0 as ID,
                        '(Selecione)' as DSC";
        return $this->selectDB($sql, false);
    }

    Public Function UpdatePlano(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertPlano(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}