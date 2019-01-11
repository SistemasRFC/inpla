<?php 
include_once("Model/BaseModel.php");
include_once("Dao/Usuario/UsuarioDao.php");
include_once("Resources/php/FuncoesArray.php");
class UsuarioModel extends BaseModel
{
    function UsuarioModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    function ListarUsuario(){
        $dao = new UsuarioDao();
        $lista = $dao->ListarUsuario();    
        if ($lista[0]){
            if ($lista[1]!=null){
                $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
            }
        }
        return json_encode($lista);
    }

    function ListaDadosUsuario(){
        $dao = new UsuarioDao();
        $lista = $dao->ListaDadosUsuario($_SESSION['cod_perfil']);    
        return json_encode($lista);
    }
    
    function AddUsuario(){
        $dao = new UsuarioDao();
        return json_encode($dao->AddUsuario());
    }

    function UpdateUsuario(){
        $dao = new UsuarioDao();
        return json_encode($dao->UpdateUsuario());
    }

    function DeleteUsuario(){
        $dao = new UsuarioDao();
        return $dao->DeleteUsuario();
    }
    
    function AddLogin(){
        $dao = new UsuarioDao();
        $result = $dao->AddLogin();
        return $result;
    }

    Public Function ReiniciarSenha(){
        $dao = new UsuarioDao();
        return json_encode($dao->ReiniciarSenha());
    }

    Public Function ResetaSenha(){
        $dao = new UsuarioDao();
        return json_encode($dao->ResetaSenha());
    }  
}
?>
