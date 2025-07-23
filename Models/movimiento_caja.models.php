<?php 

require_once "conexion.php";
session_start();
class Models{
  static public function mdlMostrar_Arqueo($fecha_inicio,$fecha_fin){

    $stmt = Conexion::conectar()-> prepare('call usp_ListarArqueoCaja(:p_fecha_inicio,:p_fecha_fin)');
    $stmt -> bindParam(":p_fecha_inicio", $fecha_inicio, PDO::PARAM_STR);
    $stmt -> bindParam(":p_fecha_fin", $fecha_fin, PDO::PARAM_STR);
	  $stmt -> execute();
	  return $stmt -> fetchAll();
      $stmt = null; 
	}

  static public function mdlMostrar_MovimientoCaja(){
	 
          $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
         
     $stmt = Conexion::conectar()-> prepare('call usp_MovimientosCaja(:p_id_usuario,:p_id_caja)');
     $stmt -> bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_STR);
     $stmt -> bindParam(":p_id_caja", $id_caja, PDO::PARAM_STR);
     $stmt -> execute();
     return $stmt -> fetchAll();
      $stmt = null;
     	
	}

  static public function mdlMostrar_Ingresos(){
		     $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
    $stmt = Conexion::conectar()-> prepare('call usp_ListarIngresos(:p_IdUsuario,:p_IdCaja)');
    $stmt -> bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_STR);
    $stmt -> bindParam(":p_IdCaja", $id_caja, PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt = null;
 }

 static public function mdlMostrar_Devoluciones($opcion){
        $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
  $stmt = Conexion::conectar()-> prepare('call usp_ListarDevoluciones(:p_IdUsuario,:p_IdCaja,:p_tipo_devolucion)');
  $stmt -> bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_STR);
  $stmt -> bindParam(":p_IdCaja", $id_caja, PDO::PARAM_STR);
  $stmt -> bindParam(":p_tipo_devolucion", $opcion, PDO::PARAM_STR);
  $stmt -> execute();
  return $stmt -> fetchAll();
  $stmt = null;
     	
}

static public function mdlMostrar_Gastos(){
         $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
  $stmt = Conexion::conectar()-> prepare('call usp_ListarGastos(:p_IdUsuario,:p_IdCaja)');
  $stmt -> bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_STR);
  $stmt -> bindParam(":p_IdCaja", $id_caja, PDO::PARAM_STR);
  $stmt -> execute();
  return $stmt -> fetchAll();
  $stmt = null;

}

//  static public function mdlRegistrarArqueoCaja($txt_id_arqueo_caja,$inpuBillete100,$inpuBillete50,$inpuBillete20,
//       $inpuBillete10,$inpuBillete5,$inpuBillete1,$inputMoneda1,$inputMoneda50,$inputMoneda25,$inputMoneda10,
//       $inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario){ 
//          $id_usuario = $_SESSION["usuario"]->id_usuario;
//          $id_caja = $_SESSION["usuario"]->id_caja;
//             try{ //try
//         $stmt = Conexion::conectar()->prepare('call usp_cerrar_caja (
//         :p_id_usuario,:p_id_caja,:p_id_arqueo_caja,:p_inpuBillete100,:p_inpuBillete50,
//         :p_inpuBillete20,:p_inpuBillete10,:p_inpuBillete5,:p_inpuBillete1,:p_inputMoneda1,
//         :p_inputMoneda50,:p_inputMoneda25,:p_inputMoneda10,
//         :p_inputMoneda5,:p_inputMoneda001,:p_total_efectivo, 
//         :p_inpuTotalMoneda,:p_inpuTotalBilletes,
//         :p_Comentario);');
//         $stmt -> bindParam(":p_id_usuario",$id_usuario,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_id_caja",$id_caja,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_id_arqueo_caja",$txt_id_arqueo_caja,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete100",$inpuBillete100,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete50",$inpuBillete50,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete20",$inpuBillete20,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete10",$inpuBillete10,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete5",$inpuBillete5,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuBillete1",$inpuBillete1,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda1",$inputMoneda1,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda50",$inputMoneda50,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda25",$inputMoneda25,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda10",$inputMoneda10,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda5",$inputMoneda5,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inputMoneda001",$inputMoneda001,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_total_efectivo",$total_efectivo,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuTotalMoneda",$inpuTotalMoneda,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_inpuTotalBilletes",$inpuTotalBilletes,PDO::PARAM_STR);
//         $stmt -> bindParam(":p_Comentario",$txt_Comentario,PDO::PARAM_STR);
//          if ($stmt->execute()) {
//                 $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
//                 $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
//             } else {
//                 $resultado = "Error al ejecutar la accion.";
//             }
    
//           } catch (Exception $e) {
//                $resultado = 'Excepción: ' . $e->getMessage();
//            }
    
//            $stmt = null; // cerrar conexión
//            return $resultado;
//  }

static public function mdlRegistrarArqueoCaja($txt_id_arqueo_caja, $inpuBillete100, $inpuBillete50, $inpuBillete20,
    $inpuBillete10, $inpuBillete5, $inpuBillete1, $inputMoneda1, $inputMoneda50, $inputMoneda25, $inputMoneda10,
    $inputMoneda5, $inputMoneda001, $total_efectivo, $inpuTotalMoneda, $inpuTotalBilletes, $txt_Comentario) 
{
    $id_usuario = $_SESSION["usuario"]->id_usuario;
    $id_caja = $_SESSION["usuario"]->id_caja;

    // Función interna para convertir null o vacío a 0
    $toZeroIfEmpty = function($valor) {
        return (is_null($valor) || $valor === "") ? 0 : $valor;
    };

    // Convertir todos los valores vacíos o null a 0
    $inpuBillete100    = $toZeroIfEmpty($inpuBillete100);
    $inpuBillete50     = $toZeroIfEmpty($inpuBillete50);
    $inpuBillete20     = $toZeroIfEmpty($inpuBillete20);
    $inpuBillete10     = $toZeroIfEmpty($inpuBillete10);
    $inpuBillete5      = $toZeroIfEmpty($inpuBillete5);
    $inpuBillete1      = $toZeroIfEmpty($inpuBillete1);
    $inputMoneda1      = $toZeroIfEmpty($inputMoneda1);
    $inputMoneda50     = $toZeroIfEmpty($inputMoneda50);
    $inputMoneda25     = $toZeroIfEmpty($inputMoneda25);
    $inputMoneda10     = $toZeroIfEmpty($inputMoneda10);
    $inputMoneda5      = $toZeroIfEmpty($inputMoneda5);
    $inputMoneda001    = $toZeroIfEmpty($inputMoneda001);
    $total_efectivo    = $toZeroIfEmpty($total_efectivo);
    $inpuTotalMoneda   = $toZeroIfEmpty($inpuTotalMoneda);
    $inpuTotalBilletes = $toZeroIfEmpty($inpuTotalBilletes);

    try {
        $stmt = Conexion::conectar()->prepare('CALL usp_cerrar_caja (
            :p_id_usuario, :p_id_caja, :p_id_arqueo_caja, :p_inpuBillete100, :p_inpuBillete50,
            :p_inpuBillete20, :p_inpuBillete10, :p_inpuBillete5, :p_inpuBillete1, :p_inputMoneda1,
            :p_inputMoneda50, :p_inputMoneda25, :p_inputMoneda10, :p_inputMoneda5, :p_inputMoneda001,
            :p_total_efectivo, :p_inpuTotalMoneda, :p_inpuTotalBilletes, :p_Comentario
        );');

        $stmt->bindParam(":p_id_usuario",        $id_usuario,        PDO::PARAM_STR);
        $stmt->bindParam(":p_id_caja",           $id_caja,           PDO::PARAM_STR);
        $stmt->bindParam(":p_id_arqueo_caja",    $txt_id_arqueo_caja,PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete100",    $inpuBillete100,    PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete50",     $inpuBillete50,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete20",     $inpuBillete20,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete10",     $inpuBillete10,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete5",      $inpuBillete5,      PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuBillete1",      $inpuBillete1,      PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda1",      $inputMoneda1,      PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda50",     $inputMoneda50,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda25",     $inputMoneda25,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda10",     $inputMoneda10,     PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda5",      $inputMoneda5,      PDO::PARAM_STR);
        $stmt->bindParam(":p_inputMoneda001",    $inputMoneda001,    PDO::PARAM_STR);
        $stmt->bindParam(":p_total_efectivo",    $total_efectivo,    PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuTotalMoneda",   $inpuTotalMoneda,   PDO::PARAM_STR);
        $stmt->bindParam(":p_inpuTotalBilletes", $inpuTotalBilletes, PDO::PARAM_STR);
        $stmt->bindParam(":p_Comentario",        $txt_Comentario,    PDO::PARAM_STR);

        if ($stmt->execute()) {
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            $resultado = $respuesta['resultado'] ?? "Acción ejecutada sin mensaje.";
        } else {
            $resultado = "Error al ejecutar la acción.";
        }
    } catch (Exception $e) {
        $resultado = 'Excepción: ' . $e->getMessage();
    }

    $stmt = null;
    return $resultado;
}

 
	static public function mdlAbriCaja($monto_inicial,$observacion) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
    
        try {
            $stmt = Conexion::conectar()->prepare("CALL ups_AbrirCaja(
                                                    :p_IdUsuario,
                                                    :p_IdCaja,
                                                    :p_montoInicial,
                                                    :p_observacion
                                                    )");
            $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_STR);
            $stmt->bindParam(":p_montoInicial", $monto_inicial, PDO::PARAM_INT);
            $stmt->bindParam(":p_observacion", $observacion, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
    
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
    
        $stmt = null; // cerrar conexión
        return $resultado;
    }

static public function mdlRegistrarActualizarMovimiento($id, $tipo_movimientos, $tipo_movimiento, $monto, $concepto) {
    $id_usuario = $_SESSION["usuario"]->id_usuario;
    $id_caja = $_SESSION["usuario"]->id_caja;

    try {
        switch ($tipo_movimientos) {
            case 1:
                $procedure = 'usp_GuardarMovimientoEntrada';
                break;
            case 2:
                $procedure = 'usp_GuardarMovimientoSalida';
                break;
            default:
                throw new Exception("Tipo de movimiento no válido.");
        }

        $stmt = Conexion::conectar()->prepare("CALL $procedure(:p_id, :p_IdUsuario, :p_IdCaja, :p_tipo_pago, :p_Monto, :p_descripcion)");

        $stmt->bindParam(":p_id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_INT);
        $stmt->bindParam(":p_tipo_pago", $tipo_movimiento, PDO::PARAM_STR);
        $stmt->bindParam(":p_Monto", $monto, PDO::PARAM_STR);
        $stmt->bindParam(":p_descripcion", $concepto, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            $resultado = $respuesta['resultado'] ?? 'Operación realizada.';
        } else {
            $resultado = "Error al ejecutar la acción.";
        }
    } catch (Exception $e) {
        $resultado = 'Excepción: ' . $e->getMessage();
    } finally {
        $stmt = null;
    }

    return $resultado;
}




	static public function mdlEliminarMovimiento($id,$opcion) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
         $id_caja = $_SESSION["usuario"]->id_caja;
    
        try {
            switch ($opcion) {
            case 1:
                $procedure = 'usp_EliminarDetalleIngreso';
                break;
            case 2:
                $procedure = 'usp_EliminarDetalleGasto';
                break;
            default:
                throw new Exception("Tipo de movimiento no válido.");
        }
             $stmt = Conexion::conectar()->prepare("CALL $procedure(:p_id)");
        
             $stmt->bindParam(":p_id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
    
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
    
        $stmt = null; // cerrar conexión
        return $resultado;
    }
}

 