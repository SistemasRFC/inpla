<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Investimento/InvestimentoModel.php");
class InvestimentoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Investimento
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->ListarInvestimento();
    }
    
    Public Function InsertInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->InsertInvestimento();
    }

    Public Function UpdateInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->UpdateInvestimento();
    }	
}