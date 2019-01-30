<?php
include_once("Model/BaseModel.php");
include_once("Dao/Investidor/InvestidorDao.php");
include_once("Resources/php/FuncoesString.php");
class InvestidorModel extends BaseModel
{
    public function InvestidorModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDadosInvestidor($Json=true) {
        $dao = new InvestidorDao();
        $lista = $dao->listarDadosInvestidor();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertInvestidor() {
        $dao = new InvestidorDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $this->VerificaCamposVazios();
        if ($result[0]){
            $this->objRequest->txtSenhaW = md5("123459");
            $this->objRequest->codPerfilW = 2;
            $this->objRequest->indAtivo = 'N';
            $result = $dao->InsertInvestidor($this->objRequest);
        }
        return json_encode($result);        
    }

    Public Function UpdateInvestidor() {
        $dao = new InvestidorDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codPerfilW = 2;        
        $result = $dao->UpdateInvestidor($this->objRequest);
        return json_encode($result);
    }	
 
    Public Function VerificaCamposVazios(){
        $result=array(true, '');
        if (!isset($this->objRequest->nmeUsuarioCompleto)){
            $result[0] = false;
            $result[1] .= "Preencha o campo 'Nome Completo'\n";
        }else{
            if (trim($this->objRequest->nmeUsuarioCompleto)==''){
                $result[0] = false;
                $result[1] .= "Preencha o campo 'Nome Completo'\n";
            }
        }
        if (!isset($this->objRequest->nmeUsuario)){
            $result[0] = false;
            $result[1] .= "Preencha o campo 'Login'\n";
        } else if (trim($this->objRequest->nmeUsuario)==''){
                $result[0] = false;
                $result[1] .= "Preencha o campo 'Login'\n";
        } else {
            $dao = new InvestidorDao();
            $retorno = $dao->VerificaLoginExiste($this->objRequest->nmeUsuario);
            if($retorno[1][0]['COD_USUARIO'] > 0){
                $result[0] = false;
                $result[1] .= "Esse Login já está sendo usado!\n";
            }
        }
        if (!FuncoesString::validaCPF($this->objRequest->nroCpf)){
            $result[0] = false;
            $result[1] .= "CPF inválido\n";
        }
        if(!filter_var($this->objRequest->txtEmail, FILTER_VALIDATE_EMAIL)) {
            $result[0] = false;
            $result[1] .= "Email inválido'\n";
        }
        if(isset($this->objRequest->nroTelCelular)) {
            if(!FuncoesString::validaCelular($this->objRequest->nroTelCelular)) {
                $result[0] = false;
                $result[1] .= "Némero de Celular inválido'\n";
            }
        }
        return $result;
    }

    Public Function AtualizaDadosInvestidor() {
        $dao = new InvestidorDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $this->VerificaCamposVazios();
        if($result[0]){
            $result = $dao->AtualizaDadosInvestidor($this->objRequest);
        }
        return json_encode($result);
    }
}

