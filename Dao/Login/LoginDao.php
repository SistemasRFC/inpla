<?php
include_once 'Dao/BaseDao.php';
include_once 'Resources/php/FuncoesArray.php';

class LoginDao extends BaseDao{
    Protected $tableName = "SE_USUARIO";

    Protected $columns = array ("nmeUsuario"           => array("column" => "NME_USUARIO", "typeColumn" => "S"),
                                "nmeUsuarioCompleto"   => array("column" => "NME_USUARIO_Completo", "typeColumn" => "S"),
                                "txtSenha"             => array("column" => "TXT_SENHA_W", "typeColumn" => "P"),
                                "txtEmail"             => array("column" => "TXT_EMAIL", "typeColumn" => "S"),
                                "nroCpf"               => array("column" => "NRO_CPF", "typeColumn" => "S"),
                                "codPerfil"            => array("column" => "COD_PERFIL_W", "typeColumn" => "I"),
                                "indAtivo"             => array("column" => "IND_ATIVO", "typeColumn" => "S"));

    Protected $columnKey = array("codUsuario"          => array("column" => "COD_USUARIO", "typeColumn" => "I"));
    
    Public Function Logar($objRequest){
        $sql = "SELECT COD_USUARIO,
                       COD_PERFIL_W
                  FROM SE_USUARIO
                 WHERE NME_USUARIO = '".$objRequest->nmeUsuario."'
                   AND TXT_SENHA_W   = '".$objRequest->txtSenha."'
                   AND IND_ATIVO = 'S'";
        return $this->selectDB($sql, false);
    }
    
    Public Function VerificaSenhaAtual($objRequest){
        $sql = "SELECT COUNT(COD_USUARIO) AS QTD
                  FROM SE_USUARIO
                 WHERE COD_USUARIO = ".$objRequest->codUsuario."
                   AND TXT_SENHA_W   = '".$objRequest->txtSenhaAtual."'";
        return $this->selectDB($sql, false);
    }
    
    Public Function AlterarSenha($objRequest){
        $sql = "UPDATE ".$this->tableName."
                   SET TXT_SENHA_W = '".$objRequest->txtSenhaNova."'
                 WHERE COD_USUARIO = ".$objRequest->codUsuario;
        return $this->insertDB($sql);
    }
    
    Public Function VerificaUsuario(){
        $sql = "SELECT COALESCE(COUNT(*),0) AS QTD 
                  FROM SE_USUARIO
                 WHERE NME_USUARIO = '".$this->Populate('nmeUsuario')."'";
        return $this->selectDB($sql, false);
    }
    
    Public Function VerificaEmail(){
        $sql = "SELECT COALESCE(COUNT(*),0) AS QTD 
                  FROM SE_USUARIO
                 WHERE TXT_EMAIL = '".$this->Populate('txtEmail')."'";
        return $this->selectDB($sql, false);
    }
    
    Public Function InsereCadastro(){
        $codUsuario = $this->CatchUltimoCodigo($this->tableName, 'COD_USUARIO');
        $sql = "INSERT INTO SE_USUARIO (COD_USUARIO, 
                                        NME_USUARIO,
                                        NME_USUARIO_COMPLETO, 
                                        TXT_SENHA_W, 
                                        NRO_TEL_CELULAR, 
                                        TXT_EMAIL,
                                        COD_PERFIL_W,
                                        IND_ATIVO)
                VALUES(".$codUsuario.",
                       '".$this->Populate('nmeUsuario')."',
                       '".$this->Populate('nmeUsuarioCompleto')."', 
                       '".md5($this->Populate('txtSenhaW'))."', 
                       '".$this->Populate('nroTelCelular')."', 
                       '".$this->Populate('txtEmail')."', 
                       2,
                       'S')";
        return $this->insertDB($sql);
    }

}
?>
