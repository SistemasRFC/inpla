<?php
include_once("Dao/BaseDao.php");
class UsuarioDao extends BaseDao {
    Protected $tableName = "SE_USUARIO";

    Protected $columns = array ("nmeUsuario"            => array("column" =>"NME_USUARIO", "typeColumn" =>"S"),
                                "nmeUsuarioCompleto"    => array("column" =>"NME_USUARIO_COMPLETO", "typeColumn" =>"S"),
                                "txtSenhaW"             => array("column" =>"TXT_SENHA_W", "typeColumn" =>"S"),
                                "nroTelCelular"         => array("column" =>"NRO_TEL_CELULAR", "typeColumn" =>"S"),
                                "txtEmail"              => array("column" =>"TXT_EMAIL", "typeColumn" =>"S"),
                                "dtaInativo"            => array("column" =>"DTA_INATIVO", "typeColumn" =>"D"),
                                "codPerfilW"            => array("column" =>"COD_PERFIL_W", "typeColumn" =>"I"),
                                "indAtivo"              => array("column" =>"IND_ATIVO", "typeColumn" =>"S"),
                                "nroCpf"                => array("column" =>"NRO_CPF", "typeColumn" =>"S"),
                                "dscBanco"              => array("column" =>"DSC_BANCO", "typeColumn" =>"S"),
                                "nroAgencia"            => array("column" =>"NRO_AGENCIA", "typeColumn" =>"S"),
                                "nroConta"              => array("column" =>"NRO_CONTA", "typeColumn" =>"S"),
                                "nroOperacao"           => array("column" =>"NRO_OPERACAO", "typeColumn" =>"S"),
                                "tpoConta"              => array("column" =>"TPO_CONTA", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codUsuario"          => array("column" => "COD_USUARIO", "typeColumn" => "I"));

    function UsuarioDao() {
        $this->conect();
    }

    function ListarUsuario() {
        $sql = " SELECT DISTINCT U.COD_USUARIO,
                        NME_USUARIO_COMPLETO,
                        NME_USUARIO,
                        NRO_CPF,
                        TXT_EMAIL,
                        U.COD_PERFIL_W,
                        P.DSC_PERFIL_W,
                        U.IND_ATIVO
                   FROM SE_USUARIO U
                  INNER JOIN SE_PERFIL P
                     ON U.COD_PERFIL_W = P.COD_PERFIL_W";
        return $this->selectDB("$sql", false);
    }

    function ListaDadosUsuario($codPerfil) {
        $sql = " SELECT $codPerfil AS COD_PERFIL,
                        COD_CLIENTE,
                        NME_CLIENTE
                   FROM EN_CLIENTE
                  WHERE IND_ATIVO = 'S'";
        return $this->selectDB("$sql", false);
    }

    function AddUsuario() {
        $codUsuario = $this->CatchUltimoCodigo('SE_USUARIO', 'COD_USUARIO');
        $txtSenha = '123459';
        $senha = base64_encode($txtSenha);
        $sql_lista = " INSERT INTO SE_USUARIO (
                              COD_USUARIO,
                              NME_USUARIO,
                              NME_USUARIO_COMPLETO,
                              TXT_SENHA_W,
                              COD_PERFIL_W,
                              IND_ATIVO,
                              TXT_EMAIL,
                              NRO_CPF)
                       VALUES (
                              $codUsuario,
                              '" . filter_input(INPUT_POST, 'nmeUsuario', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              '" . filter_input(INPUT_POST, 'nmeUsuarioCompleto', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              '" . $senha . "',
                              '" . filter_input(INPUT_POST, 'codPerfilW', FILTER_SANITIZE_NUMBER_INT) . "',
                              '" . filter_input(INPUT_POST, 'indAtivo', FILTER_SANITIZE_STRING) . "',
                              '" . filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_STRING) . "',
                              '" . filter_input(INPUT_POST, 'nroCpf', FILTER_SANITIZE_STRING) . "')";
        $result = $this->insertDB("$sql_lista");
        if ($result[0]) {
            $result[1] = $codUsuario;
        }
        return $result;
    }

    function UpdateUsuario() {
        $nroCpf = str_replace('-', '', str_replace('.', '', filter_input(INPUT_POST, 'nroCpf', FILTER_SANITIZE_NUMBER_INT)));
        $sql_lista = " UPDATE SE_USUARIO
                          SET NME_USUARIO          = '" . filter_input(INPUT_POST, 'nmeUsuario', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              NME_USUARIO_COMPLETO = '" . filter_input(INPUT_POST, 'nmeUsuarioCompleto', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              TXT_EMAIL            = '" . filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_MAGIC_QUOTES) . "',
                              COD_PERFIL_W         = '" . filter_input(INPUT_POST, 'codPerfilW', FILTER_SANITIZE_NUMBER_INT) . "',
                              IND_ATIVO            = '" . filter_input(INPUT_POST, 'indAtivo', FILTER_SANITIZE_STRING) . "'
                        WHERE COD_USUARIO = " . filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_NUMBER_INT);
        $result = $this->insertDB("$sql_lista");
        if ($result[0]) {
            $result[1] = filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_NUMBER_INT);
        }
        return $result;

    }

    function DeleteUsuario() {
        $sql_lista = " DELETE FROM SE_USUARIO
                        WHERE COD_USUARIO = " . filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_NUMBER_INT);
        $result = $this->insertDB("$sql_lista");
        return $result;
    }

    function ReiniciarSenha() {
        $senha = base64_encode("123459");
        $sql_lista = " UPDATE SE_USUARIO
                          SET TXT_SENHA_W = '" . $senha . "'
                        WHERE COD_USUARIO = " . filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_NUMBER_INT);
        return $this->insertDB("$sql_lista");
    }

    public function ResetaSenha() {
        $nroCpf = str_replace('-', '', str_replace('.', '', filter_input(INPUT_POST, 'nroCpf', FILTER_SANITIZE_NUMBER_INT)));
        $sql = " SELECT COD_USUARIO FROM SE_USUARIO WHERE NRO_CPF = '" . $nroCpf . "'";
        $rs = $this->selectDB($sql, false);
        if ($rs[0]) {
            if ($rs[1][0]['COD_USUARIO'] > 0) {
                $senha = base64_encode("123459");
                $sql_lista = " UPDATE SE_USUARIO
                                  SET TXT_SENHA_W = '" . $senha . "'
                                WHERE COD_USUARIO = " . $rs[1][0]['COD_USUARIO'];
                $rs = $this->insertDB("$sql_lista");
            } else {
                $rs[0] = false;
                $rs[1] = 'CPF n&atilde;o encontrado na base de dados!';
            }
        }
        return $rs;
    }

    public function VerificaUsuario($nroCpf) {
        $sql = " SELECT COD_USUARIO
                   FROM SE_USUARIO
                  WHERE NRO_CPF ='" . $nroCpf . "'";
        return $this->selectDB($sql, false);
    }

    public function RecuperarSenha($codUsuario, $novaSenha) {
        $sql = " UPDATE SE_USUARIO
                    SET TXT_SENHA_W = '" . $novaSenha . "'
                  WHERE COD_USUARIO = " . $codUsuario;
        return $this->insertDB($sql);
    }
}
?>
