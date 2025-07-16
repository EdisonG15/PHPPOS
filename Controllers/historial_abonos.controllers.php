<?php 

class Controllers{
//	Motrarcategoria
////////////////////////////////////////////////////////////////////////////////////////////////////
	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}  



	static public function ctrMostrarProveedor(){
		
		$respuesta = Models::mdlMostrarProveedor();

		return $respuesta;
	
	}

	static public function ctrListarHistorialClientes($fechaDesde, $fechaHasta, $id_cliente){

        $respuesta = Models::mdlListarHistorialClientes($fechaDesde,$fechaHasta, $id_cliente);

        return $respuesta;
    }


	static public function ctrExiteCreditoVigente( $id_cliente){

        $respuesta = Models::mdlExiteCreditoVigente($id_cliente);

        return $respuesta;
    }
	static public function ctrListarHistorialProveedor($fechaDesde, $fechaHasta, $id_proveedor){

        $respuesta = Models::mdlListarHistorialProveedor($fechaDesde,$fechaHasta, $id_proveedor);

        return $respuesta;
    }
}


