
<?php

require_once "../Controllers/cargarcombocaja.controllers.php";
require_once "../Models/cargarcombocaja.models.php";

class AjaxCombo{


    public function ajaxListar(){
        
        $cargar = ComboControllers::ctrListar();
    
        echo json_encode($cargar, JSON_UNESCAPED_UNICODE);
    }
    }
    
    
    
    
         
        $cargar = new AjaxCombo();
        $cargar -> ajaxListar();
    