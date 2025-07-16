<?php 

class ControllersCategorias{

	static public function ctrMostrarCategorias(){
		
		$respuesta = ModelsCategorias::mdlMostrarCategorias();

		return $respuesta;
	
	}

    static public function ctrGuardar($id_categoria,$categoria, $estado){

	      $respuesta = ModelsCategorias::mdlGuardar($id_categoria,$categoria, $estado);

	      return $respuesta;
    }

    static public function ctrEliminar($id){

	     $respuesta = ModelsCategorias::mdlEliminar($id );

	     return $respuesta;
}


}