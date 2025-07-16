<?php
class Conexion{

    static public function conectar(){
        try {
            $conn = new PDO("mysql:host=localhost:3306;dbname=db2025v2","root","123456",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
}


