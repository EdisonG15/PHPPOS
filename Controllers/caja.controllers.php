<?php 

class Controllers{
//	Motrarcategoria
////////////////////////////////////////////////////////////////////////////////////////////////////
	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}
	static public function ctrRegistrar($numerocaja,$nombre,$folio){

		$respuesta = Models::mdlRegistrar($numerocaja,$nombre,$folio);
	
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