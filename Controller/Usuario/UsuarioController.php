<?php 
include_once("Controller/BaseController.php");
include_once("Model/Usuario/UsuarioModel.php");
class UsuarioController extends BaseController
{

    Public function ChamaView(){
        $params = array();        
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));  
    }

    Public function ListarUsuario(){
        $model = new UsuarioModel();
        echo $model->ListarUsuario();
    }
    
    Public Function ListaDadosUsuario(){
        $model = new UsuarioModel();
        echo $model->ListaDadosUsuario();        
    }
    Public function AddUsuario(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->AddUsuario();
    }
    Public function UpdateUsuario(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->UpdateUsuario();  
    }

    Public function DeleteUsuario(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->UpdateUsuario();
    }

    Public function AddLogin(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->AddLogin();
    }

    Public Function ReiniciarSenha(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->ReiniciarSenha();
    }

    Public Function ResetaSenha(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->ResetaSenha();
    }

    Public Function RecuperarSenha(){
        $UsuarioModel = new UsuarioModel();
        echo $UsuarioModel->RecuperarSenha();
    }
}
?>