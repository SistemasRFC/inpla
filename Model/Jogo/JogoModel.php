<?php
include_once("Model/BaseModel.php");
include_once("Dao/Jogo/JogoDao.php");
include_once("Resources/php/FuncoesData.php");
class JogoModel extends BaseModel
{
    public function JogoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarJogo($Json=true) {
        $dao = new JogoDao();
        $lista = $dao->ListarJogo();
        if ($lista[0]){
            $lista = FuncoesData::AtualizaDataInArray($lista, 'DTA_JOGO');
        }
        return json_encode($lista);
    }

    Public Function InsertJogo() {
        $dao = new JogoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $this->VerificaCampos();
        if ($result[0]){
            $result = $dao->InsertJogo($this->objRequest);
        }
        return json_encode($result);
    }

    Public Function UpdateJogo() {
        $dao = new JogoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateJogo($this->objRequest);
        return json_encode($result);
    }
    
    Public Function VerificaCampos() {
        $result=array(true, '');
        if (!isset($this->objRequest->codTime1)){
            $result[0] = false;
            $result[1] .= "Selecione o Primeiro Time!\n";
        }
        if (!isset($this->objRequest->codTime2)){
            $result[0] = false;
            $result[1] .= "Selecione o Segundo Time!\n";
        }
        if (!isset($this->objRequest->codEstadio)){
            $result[0] = false;
            $result[1] .= "Selecione um Estádio!\n";
        }
        if (!isset($this->objRequest->dtaJogo)){
            $result[0] = false;
            $result[1] .= "Informe a Data do Jogo!\n";
        }
        if (!isset($this->objRequest->hraJogo)){
            $result[0] = false;
            $result[1] .= "Informe o Horário do Jogo!\n";
        }
        return $result;
    }
}

