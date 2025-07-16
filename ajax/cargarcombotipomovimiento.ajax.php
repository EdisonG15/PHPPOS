
<?php
require_once "../Controllers/cargarcombotipomovimiento.controllers.php";
require_once "../Models/cargarcombotipomovimiento.models.php";

class AjaxCombo{
public $estado;
  
public function ajaxListarCategorias(  ){
    
    $categorias = ComboControllers::ctrListarCategorias( );

    echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
}
}


     
    $categorias = new AjaxCombo();


  
    $categorias -> ajaxListarCategorias( );