<?php 

class Controllers{
    static public function ctrMostrarCredito($filtro, $filtro_estado,$fecha_inicio,$fecha_fin){

		$respuesta = Models::mdlMostrarCredito($filtro, $filtro_estado,$fecha_inicio,$fecha_fin);

		return $respuesta ;
	}

	static public function ctrRegistrarAbono( $id_caja,$id_Compra,$id_compra_credito,$abonado,$observacion, 
	                                          $metodo_pago){
		
		$respuesta = Models::mdlRegistrarAbono( $id_caja,$id_Compra,$id_compra_credito,$abonado,$observacion, 
	                                          $metodo_pago);

		return $respuesta;
	
	}

	static public function ctrHistorialAbonoCredito( $id_credito){
		
		$respuesta = Models::mdlHistorialAbonoCredito( $id_credito);

		return $respuesta;
	
	}

	


}