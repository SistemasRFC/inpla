<?php
include_once("Controller/BaseController.php"); 
include_once("Model/ValidaInvestimento/ValidaInvestimentoModel.php");
class ValidaInvestimentoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ValidaInvestimento
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarInvestimentoInativos() {
        $ValidaInvestimentoModel = new ValidaInvestimentoModel();
        echo $ValidaInvestimentoModel->ListarInvestimentoInativos();
    }
    
    Public Function InsertValidaInvestimento() {
        $ValidaInvestimentoModel = new ValidaInvestimentoModel();
        echo $ValidaInvestimentoModel->InsertValidaInvestimento();
    }

    Public Function UpdateValidaInvestimento() {
        $ValidaInvestimentoModel = new ValidaInvestimentoModel();
        echo $ValidaInvestimentoModel->UpdateValidaInvestimento();
    }	
}