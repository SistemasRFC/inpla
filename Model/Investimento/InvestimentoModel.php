<?php
include_once("Model/BaseModel.php");
include_once("Dao/Investimento/InvestimentoDao.php");
include_once("Resources/php/FuncoesMoeda.php");
class InvestimentoModel extends BaseModel
{
    public function InvestimentoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarInvestimento($Json=true) {
        $dao = new InvestimentoDao();
        $lista = $dao->ListarInvestimento($_SESSION['cod_usuario']);
        if($lista[0]){
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_PLANO');
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_TOTAL_SAQUES');
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_RESTANTE');
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_SALDO');
        }
        return json_encode($lista);
    }
    
    Public Function InsertInvestimento() {
        $dao = new InvestimentoDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        if(!isset($this->objRequest->codPlano)){
            $result[0] = false;
            $result[1] = "Nenhum plano foi selecionado!";
        } else {
            $this->objRequest->dtaCadastro = date('d/m/Y');
            $this->objRequest->indAtivo = 'N';
            $this->objRequest->codUsuario = $_SESSION['cod_usuario'];
            $this->objRequest->codStatus = 1;
            $result = $dao->InsertInvestimento($this->objRequest);
        }
        return json_encode($result);        
    }

    Public Function UpdateInvestimento() {
        $dao = new InvestimentoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->dtaInicio = date('d/m/Y');
        $this->objRequest->indAtivo = 'S';
        $this->objRequest->codStatus = 2;
        $result = $dao->UpdateInvestimento($this->objRequest);
        return json_encode($result);
    }	
    
}

