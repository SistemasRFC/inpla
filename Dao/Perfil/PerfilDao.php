<?php
include_once("Dao/BaseDao.php");
class PerfilDao extends BaseDao
{
    function PerfilDao() {
        $this->conect();
    }

    function ListarPerfilAtivo() {
        $sql = " SELECT COD_PERFIL_W as ID,
                        DSC_PERFIL_W as DSC
                   FROM SE_PERFIL 
                  WHERE IND_ATIVO='S'
                 UNION
                 SELECT 0 as ID,
                        '(Selecione)' as DSC";        
        return $this->selectDB("$sql", false);
    }

    /**
     * Retorna uma Lista de perfis
     * Utilizado no PerfilModel
     * @return Array
     */
    function ListarPerfil() {
        $sql = " SELECT COD_PERFIL_W, 
                        DSC_PERFIL_W,
                        IND_ATIVO
                   FROM SE_PERFIL";
        return $this->selectDB("$sql", false);
    }

    /**
     * Insere um perfil no banco de dados
     * Utilizado no PerfilModel
     * @return int
     */
    Public Function AddPerfil() {        
        $codPerfil = $this->CatchUltimoCodigo('SE_PERFIL', 'COD_PERFIL_W');
        $sql = " INSERT INTO SE_PERFIL (
                        COD_PERFIL_W,
                        DSC_PERFIL_W,
                        IND_ATIVO)
                 VALUES (
                        $codPerfil,
                        '" .filter_input(INPUT_POST, 'dscPerfilW', FILTER_SANITIZE_MAGIC_QUOTES). "',
                        '" .filter_input(INPUT_POST, 'indAtivo', FILTER_SANITIZE_MAGIC_QUOTES). "')";
        return $this->insertDB($sql);
    }

    /**
     * Atualiza um perfil no banco de dados
     * Utilizado no PerfilModel
     * @return int
     */
    Public Function UpdatePerfil() {
        $sql = " UPDATE SE_PERFIL
                    SET DSC_PERFIL_W = '" .filter_input(INPUT_POST, 'dscPerfilW', FILTER_SANITIZE_STRING). "',
                        IND_ATIVO    = '" .filter_input(INPUT_POST, 'indAtivo', FILTER_SANITIZE_MAGIC_QUOTES). "'
                  WHERE COD_PERFIL_W = " .filter_input(INPUT_POST, 'codPerfilW', FILTER_SANITIZE_NUMBER_INT);
        return $this->insertDB($sql);
    }
    
    Public Function RetornaPerfilUsuarioLogado( $codUsuario ) {
        $sql = " SELECT COD_PERFIL_W
                   FROM SE_USUARIO 
                  WHERE COD_USUARIO = $codUsuario";
        return $this->selectDB("$sql", false);        
    }

}
?>
