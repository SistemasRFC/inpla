<?php
include_once("Controller/BaseController.php");
include_once("Model/Estadio/EstadioModel.php");
class EstadioController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Estadio
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarEstadio() {
        $EstadioModel = new EstadioModel();
        echo $EstadioModel->ListarEstadio();
    }
    
    Public Function InsertEstadio() {
        $EstadioModel = new EstadioModel();
        echo $EstadioModel->InsertEstadio();
    }

    Public Function UpdateEstadio() {
        $EstadioModel = new EstadioModel();
        echo $EstadioModel->UpdateEstadio();
    }
}