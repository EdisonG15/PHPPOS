<?php 

require_once "conexion.php";

class Models{
	static public function mdlMostrar_reportes_ganacias($opcion, $fechaInicio, $fechaFin) {
       
        try {
            $stmt = Conexion::conectar()->prepare('call usp_reportes(:p_opcion, :p_fechaDesde, :p_fechaHasta)');
            $stmt->bindParam(":p_opcion", $opcion, PDO::PARAM_INT);
            $stmt->bindParam(":p_fechaDesde", $fechaInicio, PDO::PARAM_STR);
            $stmt->bindParam(":p_fechaHasta", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Usar FETCH_ASSOC para un array asociativo
            $stmt = null; // Cerrar la declaración
            return $result;
        } catch (PDOException $e) {
            error_log("Database error in mdlMostrar_reportes_ganacias: " . $e->getMessage());
            return []; // Devolver un array vacío en caso de error
        }
    }


	static public function mdlMostrar_producto_mas_vendido($opcion, $fechaInicio, $fechaFin){
	
	   $stmt = Conexion::conectar()-> prepare('call usp_reportes(:p_opcion,:p_fechaDesde,:p_fechaHasta)');
	   $stmt -> bindParam(":p_opcion", $opcion , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaDesde", $fechaInicio , PDO::PARAM_STR);
	   $stmt -> bindParam(":p_fechaHasta",  $fechaFin , PDO::PARAM_STR);
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