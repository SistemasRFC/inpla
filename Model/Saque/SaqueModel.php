<?php

include_once("Model/BaseModel.php");
include_once("Dao/Saque/SaqueDao.php");
include_once("Resources/php/FuncoesMoeda.php");

class SaqueModel extends BaseModel {

    public function SaqueModel() {
        If (!isset($_SESSION)) {
            ob_start();
            session_start();
        }
    }

    Public Function ListarSaque($Json = true) {
        $dao = new SaqueDao();
        $lista = $dao->ListarSaque();
        return json_encode($lista);
    }

    Public Function InsertSaque() {
        $dao = new SaqueDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->dtaSaque = date('d/m/Y');
        $this->objRequest->codUsuario = $_SESSION['cod_usuario'];
        $result = $dao->InsertSaque($this->objRequest);
        return json_encode($result);
    }

    Public Function CarregaSaldo($Json = true) {
        $dao = new SaqueDao();
        $lista = $dao->CarregaSaldo();
        if($lista[0]){
            $lista = FuncoesMoeda::FormataMoedaInArray($lista, 'SALDO');
        }
        return json_encode($lista);
    }

    Public Function InsertSaqueReinvestido($codPlano, $codInvestimento) {
        $dao = new SaqueDao();
        $lista = $dao->InsertSaqueReinvestido($codPlano, $codInvestimento, $_SESSION['cod_usuario']);
        return json_encode($lista);
    }

}
