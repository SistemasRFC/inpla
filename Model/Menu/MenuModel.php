<?php
include_once("Model/BaseModel.php");
include_once("Dao/Menu/MenuDao.php");
include_once("Resources/php/FuncoesArray.php");
class MenuModel extends BaseModel
{
    /**
     * Carrega Lista de menus
     * @param type $nmeLogin
     * @param type $txtSenha
     * @return type
     */
    function ListaMenus(){
        $dao = new MenuDao();
        return json_encode($dao->ListaMenus());
    }

    function AddMenu(){
        $dao = new MenuDao();
        return json_encode($dao->AddMenu());
    }

    function UpdateMenu(){
        $dao = new MenuDao();
        return json_encode($dao->UpdateMenu());
    }

    function DeleteMenu(){
        $dao = new MenuDao();
        return json_encode($dao->DeleteMenu());
    }

    function ListarMenusAutoComplete($parametro){
        $dao = new MenuDao();
        $lista = $dao->ListarMenusAutoComplete($parametro);
        $total = count($lista);
        $i=0;
        $data = array();
        while($i<$total ) {
            $data[] = array(
                'value' => $lista[$i]['DSC_MENU_W'],
                'label' => $lista[$i]['DSC_MENU_W'],
                'id' => $lista[$i]['COD_MENU_W'],
                'nmeController' => $lista[$i]['NME_CONTROLLER'],
                'nmeMethod' => $lista[$i]['NME_METHOD'],
                'indAtivo' => $lista[$i]['IND_MENU_ATIVO_W'],
                'codMenuPai' => $lista[$i]['COD_MENU_PAI_W'],
                'indAtalho' => $lista[$i]['IND_ATALHO'],
                'dscCaminhoImagem' => $lista[$i]['DSC_CAMINHO_IMAGEM']
            );
            $i++;
        }
        if (empty($data)){
            $data[] = array(
                'value' => '',
                'label' => 'Sem dados para a pesquisa',
                'id' => 0
            );
        }
        return json_encode($data);
    }

    function ListarMenusGrid(){
        $dao = new MenuDao();
        $lista = $dao->ListarMenusGrid();
        if ($lista[0]){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_MENU_ATIVO_W', 'ATIVO');
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATALHO', 'ATALHO');
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_VISIBLE', 'VISIBLE');
        }
        return json_encode($lista);
    }
}
?>
