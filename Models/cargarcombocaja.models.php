<?php

require_once "conexion.php";

class ComboModels{
  
    static public function mdlListar(){

        $stmt = Conexion::conectar()->prepare("SELECT  		id_caja   , nombre_caja
                                                FROM cajas where 	estado=1
                                            order BY nombre_caja asc");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}