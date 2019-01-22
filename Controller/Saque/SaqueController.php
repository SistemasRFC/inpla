<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Saque/SaqueModel.php");
class SaqueController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Saque
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarSaque() {
        $SaqueModel = new SaqueModel();
        echo $SaqueModel->ListarSaque();
    }
    
    Public Function InsertSaque() {
        $SaqueModel = new SaqueModel();
        echo $SaqueModel->InsertSaque();
    }

    Public Function CarregaSaldo() {
        $SaqueModel = new SaqueModel();
        echo $SaqueModel->CarregaSaldo();
    }	
}