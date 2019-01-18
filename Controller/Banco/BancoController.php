<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Banco/BancoModel.php");
class BancoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Banco
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarBanco() {
        $BancoModel = new BancoModel();
        echo $BancoModel->ListarBanco();
    }

    Public Function ListarBancoAtivo() {
        $BancoModel = new BancoModel();
        echo $BancoModel->ListarBancoAtivo();
    }
    
    Public Function InsertBanco() {
        $BancoModel = new BancoModel();
        echo $BancoModel->InsertBanco();
    }

    Public Function UpdateBanco() {
        $BancoModel = new BancoModel();
        echo $BancoModel->UpdateBanco();
    }	
}