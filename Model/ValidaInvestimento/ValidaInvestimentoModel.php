<?php
include_once("Model/BaseModel.php");
include_once("Dao/ValidaInvestimento/ValidaInvestimentoDao.php");
include_once("Resources/php/FuncoesMoeda.php");
class ValidaInvestimentoModel extends BaseModel
{
    public function ValidaInvestimentoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarInvestimentoInativos($Json=true) {
        $dao = new ValidaInvestimentoDao();
        $lista = $dao->ListarInvestimentoInativos();
        if ($lista[0]) {
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_PLANO');
        }
        return json_encode($lista);
    }
    
    Public Function InsertValidaInvestimento() {
        $dao = new ValidaInvestimentoDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertValidaInvestimento($this->objRequest);
        return json_encode($result);        
    }

    Public Function UpdateValidaInvestimento() {
        $dao = new ValidaInvestimentoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateValidaInvestimento($this->objRequest);
        return json_encode($result);
    }	
    
}

