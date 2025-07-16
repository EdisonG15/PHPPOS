<?php

require_once "conexion.php";

class ComboModels{
  
    static public function mdlListarCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  	id_categoria , nombre_categoria
                                                FROM categorias c 
                                                where estado=1
                                            order BY nombre_categoria asc");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}