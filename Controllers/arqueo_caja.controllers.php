<?php 

class Controllers{
//	Motrarcategoria
////////////////////////////////////////////////////////////////////////////////////////////////////
	static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}

	static public function ctrCargarCombo($estado){
		
		$respuesta = Models::mdlCargarCombo($estado);

		return $respuesta;
	
	}




	
	static public function ctrRegistrar($id_caja,$id_usuario,$monto_inicial, $estado){

		$respuesta = Models::mdlRegistrar($id_caja,$id_usuario,$monto_inicial, $estado);
	
		return $respuesta;
	}


	static public function ctrActualizar($table, $data, $id, $nameId){
           
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
    }

	static public function ctrCerrarCaja($id_caja,$id_usuario){

		$respuesta = Models::mdlCerrarCajar($id_caja,$id_usuario);
	
		return $respuesta;
	}



	static public function ctrRegistrarArqueoCaja( $txt_id_arqueo_caja,$txt_id_caja,$txt_id_usuario,$inpuBillete100,$inpuBillete50,$inpuBillete20,$inpuBillete10,$inpuBillete5,$inpuBillete2,$inpuBillete1,$inputMoneda1,
	$inputMoneda50,$inputMoneda25,$inputMoneda10,$inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario
){
	
		$respuesta = Models::mdlRegistrarArqueoCaja( $txt_id_arqueo_caja,$txt_id_caja,$txt_id_usuario,$inpuBillete100,$inpuBillete50,$inpuBillete20,$inpuBillete10,$inpuBillete5,$inpuBillete2,$inpuBillete1,$inputMoneda1,
		$inputMoneda50,$inputMoneda25,$inputMoneda10,$inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario
 );
	
		return $respuesta;
	}


	static public function ctrMostrar_valor_de_caja($Id_caja,$Id_usuario){
		
		$respuesta = Models::mdlMostrar_valor_de_caja($Id_caja,$Id_usuario);
	
		return $respuesta;
	
	}
	
}