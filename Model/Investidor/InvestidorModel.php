<?php
include_once("Model/BaseModel.php");
include_once("Dao/Investidor/InvestidorDao.php");
class InvestidorModel extends BaseModel
{
    public function InvestidorModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarInvestidor($Json=true) {
        $dao = new InvestidorDao();
        $lista = $dao->ListarInvestidor();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertInvestidor() {
        $dao = new InvestidorDao();     
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codPerfilW = 2;
        $result = $dao->InsertInvestidor($this->objRequest);
        return json_encode($result);        
    }

    Public Function UpdateInvestidor() {
        $dao = new InvestidorDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codPerfilW = 2;        
        $result = $dao->UpdateInvestidor($this->objRequest);
        return json_encode($result);
    }	
    
}

