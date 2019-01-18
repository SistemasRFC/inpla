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
    
    Protected $columnKey = array("codInvestimento"=> array("column" =>"COD_INVESTIMENTO", "typeColumn" => "I"));
    
    Public Function InvestimentoDao() {
        $this->conect();
    }

    Public Function ListarInvestimento($codUsuario) {
        $sql = "SELECT I.COD_INVESTIMENTO,
                       CASE WHEN I.COD_STATUS = 1 
                            THEN CONCAT(
                                    '<a href=\"javascript:comprovanteForm(',I.COD_INVESTIMENTO,')\"><img src=\"../../Resources/images/enviar.png\" title=\"Enviar Comprovante\" width=\"20\" height=\"\"></a>',
                                    '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                                    '<a href=\"javascript:cancelarInvestimento(',I.COD_INVESTIMENTO,')\"><img src=\"../../Resources/images/delete.png\" title=\"Cancelar Investimento\" width=\"20\" height=\"\"></a>')
                            ELSE '' END AS DSC_ACAO,
                       P.DSC_PLANO,
                       I.DTA_INICIO,
                       P.VLR_PLANO,
                       (SELECT COALESCE(SUM(S.VLR_SAQUE),0)
                          FROM EN_SAQUE S
                         WHERE S.COD_INVESTIMENTO = I.COD_INVESTIMENTO) AS VLR_TOTAL_SAQUES,
                       COALESCE(((P.VLR_PLANO*2)-(SELECT COALESCE(SUM(S.VLR_SAQUE),0)
                                                    FROM EN_SAQUE S
                                                   WHERE S.COD_INVESTIMENTO = I.COD_INVESTIMENTO)),0) AS VLR_RESTANTE,
                       I.COD_STATUS,
                       S.DSC_STATUS
                  FROM EN_INVESTIMENTO I
                 INNER JOIN EN_PLANO P
                    ON I.COD_PLANO = P.COD_PLANO
                 INNER JOIN EN_STATUS S
                    ON I.COD_STATUS = S.COD_STATUS
                WHERE I.COD_USUARIO = " . $codUsuario;
        return $this->selectDB($sql, false);
    }

    Public Function UpdateInvestimento(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertInvestimento(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}