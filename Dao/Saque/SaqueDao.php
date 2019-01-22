<?php
include_once("Dao/BaseDao.php");
class SaqueDao extends BaseDao
{
    Protected $tableName = "EN_SAQUE";
    
    Protected $columns = array ("vlrSaque"   => array("column" =>"VLR_SAQUE", "typeColumn" =>"F"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"));
    
    Protected $columnKey = array("codSaque"=> array("column" =>"COD_SAQUE", "typeColumn" => "I"));
    
    Public Function SaqueDao() {
        $this->conect();
    }

    Public Function ListarSaque() {    
        return $this->MontarSelect();
    }

    Public Function CarregaSaldo() {
        $sql = "";
        return $this->selectDB($sql, false);
    }

    Public Function InsertSaque(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}