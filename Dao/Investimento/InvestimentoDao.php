<?php
include_once("Dao/BaseDao.php");
class InvestimentoDao extends BaseDao
{
    Protected $tableName = "EN_INVESTIMENTO";
    
    Protected $columns = array ("dtaCadastro"   => array("column" =>"DTA_CADASTRO", "typeColumn" =>"D"),
                                "dtaInicio"   => array("column" =>"DTA_INICIO", "typeColumn" =>"D"),
                                "codPlano"   => array("column" =>"COD_PLANO", "typeColumn" =>"I"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "codStatus"   => array("column" =>"COD_STATUS", "typeColumn" =>"I"),
                                "lnkComprovantes"   => array("column" =>"LNK_COMPROVANTES", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codInvestimento1"=> array("column" =>"COD_INVESTIMENTO1", "typeColumn" => "I"));
    
    Public Function InvestimentoDao() {
        $this->conect();
    }

    Public Function ListarInvestimento() {    
        return $this->MontarSelect();
    }

    Public Function UpdateInvestimento(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertInvestimento(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}