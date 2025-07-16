<?php 

class ControllersFactura{

	static public function ctrObtenerCabecera($id_venta){
		
		$respuesta = ModelsFactura::mdlObtenerCabecera($id_venta);

		return $respuesta;
	
	}

    static public function ctrObtenerDetalles($id_venta){
		
		$respuesta = ModelsFactura::mdlObtenerDetalles($id_venta);

		return $respuesta;
	
	}

}