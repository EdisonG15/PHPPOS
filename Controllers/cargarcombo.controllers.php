<?php

class ComboControllers{
  
    static public function ctrListarCategorias(){
       
        $categorias =  ComboModels::mdlListarCategorias();

        return $categorias;

    }
}