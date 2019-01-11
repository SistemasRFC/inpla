<?php
include_once("Dao/BaseDao.php");
class InvestidorDao extends BaseDao
{
    Protected $tableName = "SE_USUARIO";
    
    Protected $columns = array ("nmeUsuario"   => array("column" =>"NME_USUARIO", "typeColumn" =>"S"),
                                "nmeUsuarioCompleto"   => array("column" =>"NME_USUARIO_COMPLETO", "typeColumn" =>"S"),
                                "txtSenhaW"   => array("column" =>"TXT_SENHA_W", "typeColumn" =>"S"),
                                "nroTelCelular"   => array("column" =>"NRO_TEL_CELULAR", "typeColumn" =>"S"),
                                "txtEmail"   => array("column" =>"TXT_EMAIL", "typeColumn" =>"S"),
                                "dtaInativo"   => array("column" =>"DTA_INATIVO", "typeColumn" =>"D"),
                                "codPerfilW"   => array("column" =>"COD_PERFIL_W", "typeColumn" =>"I"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"),
                                "nroCpf"   => array("column" =>"NRO_CPF", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codUsuario"=> array("column" =>"COD_USUARIO", "typeColumn" => "I"));
    
    Public Function InvestidorDao() {
        $this->conect();
    }

    Public Function ListarInvestidor() {    
        return $this->MontarSelect();
    }

    Public Function UpdateInvestidor(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertInvestidor(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
    
    Public function VerificaLoginExiste($nmeUsuario) {
        $sql = "SELECT COUNT(COD_USUARIO) AS COD_USUARIO
                  FROM SE_USUARIO 
                 WHERE NME_USUARIO ='".$nmeUsuario."'";
        return $this->selectDB($sql, false);
    }
}