<?php

require_once "views/MenuView.php";
require_once "models/MenuModel.php";

//Controller
class MenuController {
    
    // Metodo para mostrar el menu de la dashboard
    function validateMenu(){

        //Crear una conexion
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);

        $user = $MenuModel->listUser($_SESSION["cod_user"]);
        $num_register = $MenuModel->numRegister()[0]->count;
        
        $MenuView=new MenuView();  
        $MenuView->showMenu($user,$num_register);
        
    }

    
    function validateHome(){
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);
        $MenuView = new MenuView();
    }
    
}
