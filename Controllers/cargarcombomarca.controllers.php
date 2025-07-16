<?php

class ComboControllers{
  
    static public function ctrListar(){
       
        $cargar =  ComboModels::mdlListar();

        return $cargar;

    }
}