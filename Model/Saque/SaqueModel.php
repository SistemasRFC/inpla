<?php
include_once("Model/BaseModel.php");
include_once("Dao/Saque/SaqueDao.php");
class SaqueModel extends BaseModel
{
    public function SaqueModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarSaque($Json=true) {
        $dao = new SaqueDao();
        $lista = $dao->ListarSaque();
        return json_encode($lista);
    }
    
    Public Function InsertSaque() {
        $dao = new SaqueDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertSaque($this->objRequest);
        return json_encode($result);        
    }

    Public Function CarregaSaldo($Json=true) {
        $dao = new SaqueDao();
        $lista = $dao->CarregaSaldo();
        return json_encode($lista);
    }	
    
}

