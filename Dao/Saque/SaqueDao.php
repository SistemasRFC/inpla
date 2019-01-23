<?php
include_once("Dao/BaseDao.php");
class SaqueDao extends BaseDao
{
    Protected $tableName = "EN_SAQUE";
    
    Protected $columns = array ("vlrSaque"   => array("column" =>"VLR_SAQUE", "typeColumn" =>"F"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "dtaSaque"   => array("column" =>"DTA_SAQUE", "typeColumn" =>"D"),
                                "dscObservacao"   => array("column" =>"DSC_OBSERVACAO", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codSaque"=> array("column" =>"COD_SAQUE", "typeColumn" => "I"));
    
    Public Function SaqueDao() {
        $this->conect();
    }

    Public Function ListarSaque() {    
        return $this->MontarSelect();
    }

    Public Function CarregaSaldo() {
        $sql = "SELECT SUM((30-DAY(I.DTA_INICIO))*((25/100)/30*P.VLR_PLANO)) AS SALDO
                  FROM EN_INVESTIMENTO I
                 INNER JOIN EN_PLANO P
                    ON I.COD_PLANO = P.COD_PLANO
                 WHERE I.COD_USUARIO =".$_SESSION['cod_usuario']."
                   AND I.IND_ATIVO = 'S'
                   AND COD_STATUS = '2'
                   AND MONTH(NOW()) = CASE WHEN MONTH(I.DTA_INICIO)+1>12 THEN 1 ELSE MONTH(I.DTA_INICIO)+1 END
                   AND DAY(NOW()) >= 10";
        return $this->selectDB($sql, false);
    }

    Public Function InsertSaque(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function InsertSaqueReinvestido($codPlano, $codInvestimento, $codUsuario) {
        $vlrPlano = "SELECT VLR_PLANO FROM EN_PLANO WHERE COD_PLANO". $codPlano;
        $sql = "INSERT INTO EN_SAQUE
                            (VLR_SAQUE,
                            COD_USUARIO,
                            DTA_SAQUE,
                            DSC_OBSERVACAO)
                     VALUES ('$vlrPlano',
                            $codUsuario,
                            NOW(),
                            $codInvestimento)";
        return $this->insertDB($sql);
    }
}