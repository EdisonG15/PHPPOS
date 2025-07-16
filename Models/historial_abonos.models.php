<?php 

require_once "conexion.php";

class Models{
    // mostrar categorias



   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	static public function mdlMostrar(){
		// printf("SI INGRESAS");
	//	$stmt = Conexion::conectar()-> prepare("SELECT id,categoria,ruta,fecha,estado,'X' as acciones FROM categorias");
	$stmt = Conexion::conectar()-> prepare('call usp_ListarHistorialCredito');
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt = null;
	
	}

	

	static public function mdlMostrarProveedor(){
	$stmt = Conexion::conectar()-> prepare('call sp_ListarHistorialCreditoEmpresa');
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt = null;
	}

	static public function mdlExiteCreditoVigente($id_cliente){
		$stmt = Conexion::conectar()-> prepare('call usp_ExisteCreditoVigente(:p_id_cliente)');
		$stmt -> bindParam(":p_id_cliente", $id_cliente , PDO::PARAM_STR);
			$stmt -> execute();
	
			return $stmt -> fetchAll();
			$stmt = null;
	
		}

	static public function mdlListarHistorialClientes($fechaDesde, $fechaHasta, $id_cliente){
		try {
            $id_cliente=0;
		$stmt = Conexion::conectar()-> prepare('call usp_FlitradoListadoHistorialClientes(:p_fechaDesde,
		                                                                                  :p_fechaHasta,
		                                                                                  :p_id_cliente)');

		$stmt -> bindParam(":p_fechaDesde", $fechaDesde , PDO::PARAM_STR);
		$stmt -> bindParam(":p_fechaHasta", $fechaHasta , PDO::PARAM_STR);
		$stmt -> bindParam(":p_id_cliente", $id_cliente , PDO::PARAM_STR);
			$stmt -> execute();
	 
			return $stmt -> fetchAll();
			$stmt = null;
			
			
		} catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
	
	
		}

		static public function mdlListarHistorialProveedor($fechaDesde, $fechaHasta, $id_proveedor){

			try {
				$id_cliente=0;
			$stmt = Conexion::conectar()-> prepare('call sp_flitrado_listado_Historial_proveedor(:fecha_desde,
			:fecha_hasta,
			:id_Proveedor)');
	
			$stmt -> bindParam(":fecha_desde", $fechaDesde , PDO::PARAM_STR);
			$stmt -> bindParam(":fecha_hasta", $fechaHasta , PDO::PARAM_STR);
			$stmt -> bindParam(":id_Proveedor", $id_cliente , PDO::PARAM_STR);
				$stmt -> execute();
		
				return $stmt -> fetchAll();
				$stmt = null;
				
			} catch (Exception $e) {
				return 'Excepción capturada: '.  $e->getMessage(). "\n";
			}
		
			
		
			}
	




}