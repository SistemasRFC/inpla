<?php
include_once("Model/BaseModel.php");
include_once("Dao/Investimento/InvestimentoDao.php");
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
        $lista = $dao->ListarInvestimento();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertInvestimento() {
        $dao = new InvestimentoDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertInvestimento($this->objRequest);
        return json_encode($result);        
    }

    Public Function UpdateInvestimento() {
        $dao = new InvestimentoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateInvestimento($this->objRequest);
        return json_encode($result);
    }	
    
}

