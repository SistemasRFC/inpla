<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Plano/PlanoModel.php");
class PlanoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Plano
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarPlano() {
        $PlanoModel = new PlanoModel();
        echo $PlanoModel->ListarPlano();
    }
    
    Public Function ListarPlanoAtivo() {
        $PlanoModel = new PlanoModel();
        echo $PlanoModel->ListarPlanoAtivo();
    }
    
    Public Function InsertPlano() {
        $PlanoModel = new PlanoModel();
        echo $PlanoModel->InsertPlano();
    }

    Public Function UpdatePlano() {
        $PlanoModel = new PlanoModel();
        echo $PlanoModel->UpdatePlano();
    }	
}