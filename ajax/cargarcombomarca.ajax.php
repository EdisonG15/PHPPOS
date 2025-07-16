
<?php

require_once "../Controllers/cargarcombomarca.controllers.php";
require_once "../Models/cargarcombomarca.models.php";

class AjaxCombo{


public function ajaxListar(){
    
    $cargar = ComboControllers::ctrListar();

    echo json_encode($cargar, JSON_UNESCAPED_UNICODE);
}
}




     
    $cargar = new AjaxCombo();
    $cargar -> ajaxListar();
