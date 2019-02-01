<?php
include_once("Controller/BaseController.php");
include_once("Model/Time/TimeModel.php");
class TimeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Time
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarTime() {
        $TimeModel = new TimeModel();
        echo $TimeModel->ListarTime();
    }
    
    Public Function InsertTime() {
        $TimeModel = new TimeModel();
        echo $TimeModel->InsertTime();
    }

    Public Function UpdateTime() {
        $TimeModel = new TimeModel();
        echo $TimeModel->UpdateTime();
    }
}