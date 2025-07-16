<?php 

class Controllers{

	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}
	static public function ctrRegistrar($nombre, $estado){

		$respuesta = Models::mdlRegistrar($nombre, $estado);
	
		return $respuesta;
	}


	static public function ctrActualizar($table, $data, $id, $nameId){
           
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
		return $respuesta;
	}

	static public function ctrEliminar($table, $data, $id, $nameId){
		
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
		return $respuesta;
	}

}