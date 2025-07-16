<?php

require_once "conexion.php";

class ComboModels{
  
    static public function mdlListar(){

        $stmt = Conexion::conectar()->prepare("SELECT  	id_marca  , nombre
                                                FROM marca 
                                            order BY nombre asc");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}