<?php 

class Controllers{

    static public function ctrMostrar_reportes_ganacias($opcion,$fechaDesde, $fechaHasta){
		if($fechaDesde = " ") {
			$respuesta = Models::mdlMostrar_producto_poco_stock($opcion);
		}else {
			$respuesta = Models::mdlMostrar_reportes_ganacias($opcion,$fechaDesde, $fechaHasta);
		}
		

		return $respuesta;
	
	}
    static public function ctrMostrar_producto_poco_stock($opcion){
		
		$respuesta = Models::mdlMostrar_producto_poco_stock($opcion);

		return $respuesta;
	
	}

    static public function ctrMostrar_producto_mas_vendido($opcion){
		
		$respuesta = Models::mdlMostrar_producto_mas_vendido($opcion);

		return $respuesta;
	
	}

	static public function ctrMostrar_reportes_ventas_hoy($opcion){
		
		$respuesta = Models::mdlMostrar_producto_mas_vendido($opcion);

		return $respuesta;
	
	}

	
    
   
}