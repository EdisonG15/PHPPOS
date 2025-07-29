<?php 

class Controllers{
static public function ctrMostrar_reportes_ganacias($opcion, $fechaInicio, $fechaFin) {
     
		$respuesta = Models::mdlMostrar_reportes_ganacias($opcion, $fechaInicio, $fechaFin);
			return $respuesta;
    }
 static public function ctrMostrar_reportes_ventas_hoy($opcion){
		
		$respuesta = Models::mdlMostrar_producto_poco_stock($opcion);

		return $respuesta;
	
	}

	 static public function ctrMostrar_producto_poco_stock($opcion){
		
		$respuesta = Models::mdlMostrar_producto_poco_stock($opcion);

		return $respuesta;
	
	}

    static public function ctrMostrar_producto_mas_vendido($opcion, $fechaInicio, $fechaFin){
		
	 $respuesta = Models::mdlMostrar_producto_mas_vendido($opcion, $fechaInicio, $fechaFin);

		return $respuesta;
	
	}

	  static public function ctrLotes_proximos_a_vencer($numeroDias){
		
	 $respuesta = Models::mdlLotes_proximos_a_vencer($numeroDias);

		return $respuesta;
	
	}
	 


	
    
   
}