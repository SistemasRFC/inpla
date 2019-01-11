<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Investidor/InvestidorModel.php");
class InvestidorController extends BaseController
{
    function InvestidorController() {
        eval("\$this->".BaseController::getMethod()."();");
    }

    /**
     * Redireciona para a Tela de  de Investidor
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->ListarInvestidor();
    }
    
    Public Function InsertInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->InsertInvestidor();
    }

    Public Function UpdateInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->UpdateInvestidor();
    }	
}