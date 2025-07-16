<?php

require_once "conexion.php";

class CategoriasModelo{

    static public function mdlListarCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  	id_perfil  , descripcion
                                                FROM perfiles 
                                                where estado=1
                                            order BY descripcion asc");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;
    }
}