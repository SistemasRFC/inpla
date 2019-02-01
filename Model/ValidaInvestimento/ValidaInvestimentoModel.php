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
            for($i=0;$i<count($lista[1]);$i++){
                $arrArquivo = explode('\\', $lista[1][$i]['COMPROVANTE']);
                $lista[1][$i]['URL_COMPROVANTE'] = URL_COMPROVANTES.$arrArquivo[count($arrArquivo)-1];
            }
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

