<?php 

class Controllers{

	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}
	static public function ctrRegistrar($id_marca,$nombre){

		$respuesta = Models::mdlRegistrar($id_marca,$nombre);
	
		return $respuesta;
	}


	static public function ctrEliminar($table, $data, $id, $nameId){
		
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
		return $respuesta;
	}

}