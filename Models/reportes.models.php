<?php 

require_once "conexion.php";

class Models{

static public function mdlMostrar_reportes_ganacias($opcion,$fechaDesde, $fechaHasta){
	 $resultado;
	$stmt = Conexion::conectar()-> prepare('call usp_reportes(:p_opcion,:p_fechaDesde,:p_fechaHasta)');
    $stmt -> bindParam(":p_opcion", $opcion , PDO::PARAM_STR);
	$stmt -> bindParam(":p_fechaDesde", $fechaDesde , PDO::PARAM_STR);
	$stmt -> bindParam(":p_fechaHasta",  $fechaHasta , PDO::PARAM_STR);
	$stmt -> execute();
	return $stmt -> fetchAll();
    $stmt = null;
		
	}

	static public function mdlMostrar_producto_mas_vendido($opcion){
		$resultado;
	   $stmt = Conexion::conectar()-> prepare('call usp_reportes(:p_opcion,:p_fechaDesde,:p_fechaHasta)');
	   $stmt -> bindParam(":p_opcion", $opcion , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaDesde", $resultado , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaHasta",  $resultado , PDO::PARAM_STR);
	   $stmt -> execute();
	   return $stmt -> fetchAll();
	   $stmt = null;
		   
	   }
   
	   
	   static public function mdlMostrar_producto_poco_stock($opcion){
		$resultado;
	   $stmt = Conexion::conectar()-> prepare('call usp_reportes(:p_opcion,:p_fechaDesde,:p_fechaHasta)');
	   $stmt -> bindParam(":p_opcion", $opcion , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaDesde", $resultado , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaHasta",  $resultado , PDO::PARAM_STR);
	   $stmt -> execute();
	   return $stmt -> fetchAll();
	   $stmt = null;
		   
	   }

}