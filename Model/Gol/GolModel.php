<?php
include_once("Model/BaseModel.php");
include_once("Dao/Gol/GolDao.php");
class GolModel extends BaseModel
{
    public function GolModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarGol($Json=true) {
        $dao = new GolDao();
        $lista = $dao->ListarGol();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertGol() {
        $dao = new GolDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $this->VerificaCampos();
        if($result[0]){
            $result = $dao->InsertGol($this->objRequest);
        }
        return json_encode($result);
    }

    Public Function UpdateGol() {
        $dao = new GolDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateGol($this->objRequest);
        return json_encode($result);
    }
    
    Public Function VerificaCampos() {
        $result=array(true, '');
        if (!isset($this->objRequest->codTime)){
            $result[0] = false;
            $result[1] .= "Selecione um Time!\n";
        }
        if (!isset($this->objRequest->nroMinutos)){
            $result[0] = false;
            $result[1] .= "Informe o Minuto em que ocorreu o Gol!\n";
        }
        if (!isset($this->objRequest->nroTempo)){
            $result[0] = false;
            $result[1] .= "Informe o Tempo em que ocorreu o Gol!\n";
        }
        return $result;
    }
}

