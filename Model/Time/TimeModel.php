<?php
include_once("Model/BaseModel.php");
include_once("Dao/Time/TimeDao.php");
include_once("Resources/php/FuncoesArray.php");
class TimeModel extends BaseModel
{
    public function TimeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarTime($Json=true) {
        $dao = new TimeDao();
        $lista = $dao->ListarTime();
        if ($lista[0]){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        return json_encode($lista);
    }

    Public Function InsertTime() {
        $dao = new TimeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        if (!isset($this->objRequest->dscTime)){
            $result[0] = false;
            $result[1] = "Nenhum Time foi informado";
        } else {
            $result = $dao->InsertTime($this->objRequest);
        }
        return json_encode($result);
    }

    Public Function UpdateTime() {
        $dao = new TimeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateTime($this->objRequest);
        return json_encode($result);
    }

    Public Function ListarTimesAtivos() {
        $dao = new TimeDao();
        $lista = $dao->ListarTimesAtivos();
        return json_encode($lista);
    }
    
}

