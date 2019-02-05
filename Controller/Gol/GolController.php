<?php
include_once("Controller/BaseController.php");
include_once("Model/Gol/GolModel.php");
class GolController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Gol
     */

    Public Function ListarGol() {
        $GolModel = new GolModel();
        echo $GolModel->ListarGol();
    }
    
    Public Function InsertGol() {
        $GolModel = new GolModel();
        echo $GolModel->InsertGol();
    }

    Public Function UpdateGol() {
        $GolModel = new GolModel();
        echo $GolModel->UpdateGol();
    }
}