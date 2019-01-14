<?php
include_once("Model/BaseModel.php");
include_once("Dao/Plano/PlanoDao.php");
include_once("Resources/php/FuncoesArray.php");
include_once("Resources/php/FuncoesMoeda.php");
class PlanoModel extends BaseModel
{
    public function PlanoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarPlano($Json=true) {
        $dao = new PlanoDao();
        $lista = $dao->ListarPlano();
        if($lista[0]){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'VLR_PLANO');
        }
        return json_encode($lista);
    }
    
    Public Function InsertPlano() {
        $dao = new PlanoDao();        
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        if (!isset($this->objRequest->dscPlano) ||
            !isset($this->objRequest->vlrPlano)){
            $result[0] = false;
            $result[1] .= "Preencha os campos 'Descrição' e 'Valor'";
        } else {
            $result = $dao->InsertPlano($this->objRequest);
        }
        return json_encode($result);        
    }

    Public Function UpdatePlano() {
        $dao = new PlanoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdatePlano($this->objRequest);
        return json_encode($result);
    }	
    
}

