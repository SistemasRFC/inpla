<?php
include_once("Controller/BaseController.php"); 
include_once("Model/Investimento/InvestimentoModel.php");
class InvestimentoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Investimento
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->ListarInvestimento();
    }
    
    Public Function InsertInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->InsertInvestimento();
    }

    Public Function UpdateInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->UpdateInvestimento();
    }	

    Public Function InsertReinvestir() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->InsertReinvestir();
    }
    
    Public Function UploadComprovante(){
        $arquivo = $_FILES['arquivo'];
        $tipos = array('jpg', 'png', 'gif', 'psd', 'bmp', 'jpeg');
        $enviar = $this->uploadFile($arquivo, PATH_COMPROVANTES, $tipos);
        echo json_encode($enviar);
    }
    
    Private Function uploadFile($arquivo, $pasta, $tipos, $nome = null){
        $nomeOriginal='';
        if(isset($arquivo)){
            $infos = explode(".", $arquivo["name"]);

            if(!$nome){
                for($i = 0; $i < count($infos) - 1; $i++){
                    $nomeOriginal = $nomeOriginal . $infos[$i] . ".";
                }
            }else{
                $nomeOriginal = $nome . ".";
            }
            $tipoArquivo = $infos[count($infos) - 1];

            $tipoPermitido = false;
            foreach($tipos as $tipo){
                if(strtolower($tipoArquivo) == strtolower($tipo)){
                    $tipoPermitido = true;
                }
            }            
            if(!$tipoPermitido){
                $retorno[0] = false;
                $retorno[1] = "Tipo não permitido";
            }else{
                if(move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeOriginal . $tipoArquivo)){
                    $retorno[0] = true;
                    $retorno[1] = $pasta . $nomeOriginal . $tipoArquivo;
                }
                else{
                    $retorno[0] = false;
                    $retorno[1] = "Erro ao fazer upload";
                }
            }
        }
        else{
            $retorno[0] = false;
            $retorno[1] = "Arquivo nao setado";
        }
        return $retorno;
    }      
    
    Public Function UpdateComprovanteInvestimento() {
        $InvestimentoModel = new InvestimentoModel();
        echo $InvestimentoModel->UpdateComprovanteInvestimento();
    }	  
}