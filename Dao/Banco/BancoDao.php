<?php
include_once("Dao/BaseDao.php");
class BancoDao extends BaseDao
{
    Protected $tableName = "EN_BANCO";
    
    Protected $columns = array ("dscBanco"   => array("column" =>"DSC_BANCO", "typeColumn" =>"S"),
                                "nroAgencia"   => array("column" =>"NRO_AGENCIA", "typeColumn" =>"I"),
                                "nroConta"   => array("column" =>"NRO_CONTA", "typeColumn" =>"S"),
                                "nroCpf"   => array("column" =>"NRO_CPF", "typeColumn" =>"S"),
                                "dscTitular"   => array("column" =>"DSC_TITULAR", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codBanco"=> array("column" =>"COD_BANCO", "typeColumn" => "I"));
    
    Public Function BancoDao() {
        $this->conect();
    }

    Public Function ListarBanco() {
        return $this->MontarSelect();
    }

    Public Function ListarBancoAtivo() {
        $sql = " SELECT COD_BANCO AS ID,
                        DSC_BANCO AS DSC
                   FROM EN_BANCO
                  WHERE IND_ATIVO = 'S'
                 UNION
                 SELECT 0 AS ID,
                        '(Selecione)' AS DSC";
        return $this->selectDB($sql, false);
    }

    Public Function UpdateBanco(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertBanco(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}