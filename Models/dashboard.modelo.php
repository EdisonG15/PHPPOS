<?php

require_once "conexion.php";

class DashboardModelo{

    static public function mdlGetDatosDashboard(){

        $stmt = Conexion::conectar()->prepare('call usp_ObtenerDatosDashboard()');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;

       
    }

    static public function mdlGetVentasMesActual(){

        $stmt = Conexion::conectar()->prepare('call usp_ObtenerVentasMesActual()');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlProductosMasVendidos(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarProductosMasVendidos()');
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlProductosPocoStock(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarProductosPocoStock');
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlVentasPorCategoria(){
    
        $stmt = Conexion::conectar()->prepare('call usp_TopVentasCategorias');
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
    }

}