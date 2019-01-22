<?php
include_once("Model/BaseModel.php");
include_once("Dao/Banco/BancoDao.php");
include_once("Resources/php/FuncoesArray.php");
class BancoModel extends BaseModel
{
    public function BancoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarBanco($Json=true) {
        $dao = new BancoDao();
        $lista = $dao->ListarBanco();
        if ($lista[0]){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        return json_encode($lista);
    }

    Public Function ListarBancoAtivo($Json=true) {
        $dao = new BancoDao();
        $lista = $dao->ListarBancoAtivo();
        return json_encode($lista);
    }

    Public Function ListaDadosBanco($Json=true) {
        $dao = new BancoDao();
        $lista = $dao->ListaDadosBanco();
        return json_encode($lista);
    }
    
    Public Function InsertBanco() {
        $dao = new BancoDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertBanco($this->objRequest);
        return json_encode($result);        
    }

    Public Function UpdateBanco() {
        $dao = new BancoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateBanco($this->objRequest);
        return json_encode($result);
    }	
    
}

