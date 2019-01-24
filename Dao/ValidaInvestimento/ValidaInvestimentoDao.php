<?php
include_once("Dao/BaseDao.php");
class ValidaInvestimentoDao extends BaseDao
{
    Protected $tableName = "EN_INVESTIMENTO";
    
    Protected $columns = array ("dtaCadastro"   => array("column" =>"DTA_CADASTRO", "typeColumn" =>"D"),
                                "dtaInicio"   => array("column" =>"DTA_INICIO", "typeColumn" =>"D"),
                                "codPlano"   => array("column" =>"COD_PLANO", "typeColumn" =>"I"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "codStatus"   => array("column" =>"COD_STATUS", "typeColumn" =>"I"),
                                "lnkComprovantes"   => array("column" =>"LNK_COMPROVANTES", "typeColumn" =>"S"),
                                "codBanco"   => array("column" =>"COD_BANCO", "typeColumn" =>"I"));
    
    Protected $columnKey = array("codInvestimento"=> array("column" =>"COD_INVESTIMENTO", "typeColumn" => "I"));
    
    Public Function ValidaInvestimentoDao() {
        $this->conect();
    }

    Public Function ListarInvestimentoInativos() {
        $sql = "SELECT I.COD_INVESTIMENTO,
                       I.COD_STATUS,
                       I.LNK_COMPROVANTES AS COMPROVANTE,
                       P.DSC_PLANO,
                       P.VLR_PLANO,
                       B.DSC_BANCO,
                       B.NRO_AGENCIA AS AGENCIA,
                       B.NRO_CONTA AS CONTA
                  FROM EN_INVESTIMENTO I
                 INNER JOIN EN_PLANO P
                    ON I.COD_PLANO = P.COD_PLANO
                 INNER JOIN EN_BANCO B
                    ON I.COD_BANCO = B.COD_BANCO
                WHERE I.COD_STATUS = 3
                ORDER BY I.COD_INVESTIMENTO";
        return $this->selectDB($sql, false);
    }

    Public Function UpdateValidaInvestimento(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertValidaInvestimento(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}