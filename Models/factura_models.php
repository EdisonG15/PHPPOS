<?php

require_once "conexion.php";
session_start();
class ModelsFactura{

	static public function mdlObtenerCabecera($id_venta){

	    $stmt = Conexion::conectar()->prepare('call usp_obtener_factura_electronica_cabecera(:p_Id_Venta)');
        $stmt -> bindParam(":p_Id_Venta",$id_venta,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt = null;

	}

   static public function mdlObtenerDetalles($id_venta){

	    $stmt = Conexion::conectar()->prepare('call usp_obtener_factura_electronica_detalle(:p_Id_Venta)');
        $stmt -> bindParam(":p_Id_Venta",$id_venta,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt = null;

	}

}