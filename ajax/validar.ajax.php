<?php
require_once "../Controllers/validar.controllers.php";
require_once "../Models/validar.models.php";
class ajax{


    public function ajaxVerificaSiExiste(){

        $respuesta = Controllers::ctrVerificaSiExiste($this->txt_id_caja,$this-> txt_id_usuario);
    
       echo json_encode($respuesta);
       
    }
  

}


if(isset($_POST["opcion"]) && $_POST["opcion"] == 1){ // VERIFICAR si exixtes

    $verificaSiExiste = new ajax(); 

    $verificaSiExiste -> txt_id_caja = $_POST["txt_id_caja"];
    $verificaSiExiste -> txt_id_usuario = $_POST["txt_id_usuario"];
  
    $verificaSiExiste -> ajaxVerificaSiExiste();

}