<?php 

class Controllers{

static public function ctrMostrar_Arqueo($fecha_inicio,$fecha_fin){
		
    $respuesta = Models::mdlMostrar_Arqueo($fecha_inicio,$fecha_fin);

    return $respuesta;

}

static public function ctrMostrar_MovimientoCaja(){
		
    $respuesta = Models::mdlMostrar_MovimientoCaja();

    return $respuesta;

}

static public function ctrMostrar_Ingresos(){
		
    $respuesta = Models::mdlMostrar_Ingresos();

    return $respuesta;

}


static public function ctrMostrar_Devoluciones($opcion){
		
    $respuesta = Models::mdlMostrar_Devoluciones($opcion);

    return $respuesta;

}

static public function ctrMostrar_Gastos(){
		
    $respuesta = Models::mdlMostrar_Gastos();

    return $respuesta;

}

	static public function ctrRegistrarArqueoCaja( $txt_id_arqueo_caja,$inpuBillete100,$inpuBillete50,$inpuBillete20,
      $inpuBillete10,$inpuBillete5,$inpuBillete1,$inputMoneda1,$inputMoneda50,$inputMoneda25,$inputMoneda10,
      $inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario
){
	
		$respuesta = Models::mdlRegistrarArqueoCaja( $txt_id_arqueo_caja,$inpuBillete100,$inpuBillete50,$inpuBillete20,
      $inpuBillete10,$inpuBillete5,$inpuBillete1,$inputMoneda1,$inputMoneda50,$inputMoneda25,$inputMoneda10,
      $inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario
 );
	
		return $respuesta;
	}


    static public function ctrAbriCaja($monto_inicial,$observacion){
		
    $respuesta = Models::mdlAbriCaja($monto_inicial,$observacion);

    return $respuesta;

}

    static public function ctrRegistrarActualizarMovimiento($id,$tipo_movimientos,$tipo_movimiento,$monto,$concepto){
		
    $respuesta = Models::mdlRegistrarActualizarMovimiento($id,$tipo_movimientos,$tipo_movimiento,$monto,$concepto);

    return $respuesta;

}

    static public function ctrEliminarMovimiento($id,$opcion){
		
    $respuesta = Models::mdlEliminarMovimiento($id,$opcion);

    return $respuesta;

}




    }




