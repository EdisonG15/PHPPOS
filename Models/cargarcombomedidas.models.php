<?php

require_once "conexion.php";

class ComboModels{
  
    static public function mdlListar(){

        $stmt = Conexion::conectar()->prepare("SELECT  	id_medida , nombre_corto
                                                FROM medidas  where estado=1
                                            order BY nombre_corto asc");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}