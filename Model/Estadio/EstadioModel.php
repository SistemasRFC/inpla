<?php
include_once("Model/BaseModel.php");
include_once("Dao/Estadio/EstadioDao.php");
include_once("Resources/php/FuncoesArray.php");
class EstadioModel extends BaseModel
{
    public function EstadioModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarEstadio($Json=true) {
        $dao = new EstadioDao();
        $lista = $dao->ListarEstadio();
        if ($lista[0]){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        return json_encode($lista);
    }

    Public Function InsertEstadio() {
        $dao = new EstadioDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertEstadio($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateEstadio() {
        $dao = new EstadioDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateEstadio($this->objRequest);
        return json_encode($result);
    }
    
}

