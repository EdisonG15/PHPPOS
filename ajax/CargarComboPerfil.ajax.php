<?php

require_once "../Controllers/CargarComboPerfil.controllers.php";
require_once "../Models/CargarComboPerfil.models.php";

class AjaxCategorias{


public function ajaxListarCategorias(){

    $categorias = CategoriasControlador::ctrListarCategorias();

    echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
}
}


    $categorias = new AjaxCategorias();
    $categorias -> ajaxListarCategorias();