<?php
include_once("Controller/BaseController.php");
include_once("Model/Jogo/JogoModel.php");
class JogoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Jogo
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarJogo() {
        $JogoModel = new JogoModel();
        echo $JogoModel->ListarJogo();
    }
    
    Public Function InsertJogo() {
        $JogoModel = new JogoModel();
        echo $JogoModel->InsertJogo();
    }

    Public Function UpdateJogo() {
        $JogoModel = new JogoModel();
        echo $JogoModel->UpdateJogo();
    }

    Public Function CarregaTimesJogo() {
        $JogoModel = new JogoModel();
        echo $JogoModel->CarregaTimesJogo();
    }
}