<?php

require_once "conexion.php";

class Models{


    static public function mdlKardexPromedioPonderado($fechaDesde,$fechaHasta, $codigo_barra){
		try {
            $id_cliente=0;
		$stmt = Conexion::conectar()-> prepare('call usp_KardexMetodoPromedioPonderado(:p_fecha_desde,
		:p_fecha_hasta,
		:p_codigo_barra)');
		$stmt -> bindParam(":p_fecha_desde", $fechaDesde , PDO::PARAM_STR);
		$stmt -> bindParam(":p_fecha_hasta", $fechaHasta , PDO::PARAM_STR);
		$stmt -> bindParam(":p_codigo_barra", $codigo_barra , PDO::PARAM_STR);
		$stmt -> execute();
	
			return $stmt -> fetchAll();
			$stmt = null;
			
		} catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
	
	
		}


}