<?php

require_once "conexion.php";

class ComboModels{
  
    static public function mdlListarCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  	id, concepto 
                                                FROM tipo_movimiento 
                                            ");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}