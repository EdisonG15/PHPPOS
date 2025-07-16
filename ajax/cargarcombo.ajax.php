
<?php

require_once "../Controllers/cargarcombo.controllers.php";
require_once "../Models/cargarcombo.models.php";

class AjaxCombo{


public function ajaxListarCategorias(){
    
    $categorias = ComboControllers::ctrListarCategorias();

    echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
}
}




     
    $categorias = new AjaxCombo();
    $categorias -> ajaxListarCategorias();


