<?php 

class Controllers{

	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}

    static public function ctrMostrarCredito($filtro, $filtro_estado,$fecha_inicio,$fecha_fin){

		$respuesta = Models::mdlMostrarCredito($filtro, $filtro_estado,$fecha_inicio,$fecha_fin);

		return $respuesta ;
	}


	static public function ctrMostrarFinalizado(){
		
		$respuesta = Models::mdlMostrarFinalizado();

		return $respuesta;
	
	}

	static public function ctrObtenerCredito($p_id_cliente){
	   $respuesta = Models::mdlObtenerCredito($p_id_cliente);
		return $respuesta;
	}



	
	static public function ctrRegistrar($id_caja,$IdCliente,$id_venta_credito,$abono,$observacion,$metodo_pago,$tipoAbono){

		$respuesta = Models::mdlRegistrar( $id_caja,$IdCliente,$id_venta_credito,$abono,$observacion,$metodo_pago,$tipoAbono);
	
		return $respuesta;
	}

	static public function ctrHistorialAbonoCredito($id_credito){

		$respuesta = Models::mdlHistorialAbonoCredito($id_credito);
	
		return $respuesta;
	}

		static public function ctrEliminarAbono($id_idAbono){
		$respuesta = Models::mdlEliminarAbono($id_idAbono);
		return $respuesta;
	}

}