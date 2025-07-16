<?php 

class Controllers{

	static public function ctrMostrar(){

		$respuesta = Models::mdlMostrar();
		return $respuesta;
	
	}
	
	static public function ctrGuardar($id_medidas,$nombre,$nombre_corto ){

		$respuesta = Models::mdlGuardar($id_medidas,$nombre, $nombre_corto );
	
		return $respuesta;
	}

	static public function ctrEliminar($id_medida){
		
		$respuesta = Models::mdlEliminar($id_medida);
		
		return $respuesta;
	}

}