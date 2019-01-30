<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Investidor/InvestidorModel.php");
class InvestidorController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Investidor
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }
    
    Public Function ChamaDadosPessoaisView(){
        $params = array();
        echo ($this->gen_redirect_and_form('View/Investidor/DadosPessoaisView.php', $params));
    }

    Public Function ListarDadosInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->ListarDadosInvestidor();
    }
    
    Public Function InsertInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->InsertInvestidor();
    }

    Public Function UpdateInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->UpdateInvestidor();
    }

    Public Function AtualizaDadosInvestidor() {
        $InvestidorModel = new InvestidorModel();
        echo $InvestidorModel->AtualizaDadosInvestidor();
    }
}