<?php
session_start();

require_once "conexion.php";

class RealizarComprasModelo{

    static public function mdlGetDatosProductoCompras($codigoProducto){

        $stmt = Conexion::conectar()->prepare("SELECT p.id_producto,p.descripcion_producto,p.precio_compra_producto,
                                                p.precio_venta_producto,p.lleva_iva_producto,p.perecedero_producto
                                            FROM producto p inner join categorias c on p.id_categoria_producto = c.id_categoria
                                        inner join medidas u on u.id_medida = p.id_unidades 
                                        where p.estado=1 and
                                        p.codigo_barra  = :codigoProducto");

        $stmt -> bindParam(":codigoProducto",$codigoProducto,PDO::PARAM_STR);

         $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlRegistrarCompras($datos,$id_caja,$afectarCaja,$abono,$restante,$TipoDocumento, $fechaCompra,$fechaVencimiento,$NumeroFactura,
                             $IdProveedor,$Tipo_pago, $iva,$subtotalcosto,$TotalCosto,$Nro_compras,$Nro_credito_compras ){   
         try {

            $fechaVencimiento = trim($fechaVencimiento);
            $fechaVencimiento = ($fechaVencimiento === "") ? null : $fechaVencimiento;
            $id_usuario = $_SESSION["usuario"]->id_usuario;
      
            $conn = Conexion::conectar();
            $conn->beginTransaction();
            $productos_json = json_encode(array_map('json_decode', $datos));
             // Determinar el procedimiento a ejecutar según el tipo de pago
            $procedimiento = $Tipo_pago == 1 ? "CALL usp_GuardarCompraEfectivo" : "CALL usp_GuardarCompraCreditos";
            // Ejecutar el primer procedimiento almacenado
            $stmt = $conn->prepare("$procedimiento(
                   :p_IdUsuario, :p_IdCaja, :p_afectarCaja,:p_IdProveedor, :p_abono, :p_restante, :p_tipo_pago, 
                   :p_TipoDocumento, :p_fechaCompra,:p_fechaVence,:p_NumeroFactura, :p_iva, :p_subtotal, :p_total_compra, 
                   :p_Nro_compras, :p_Nro_credito_compras,  :p_detalle)");

            $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_INT);
            $stmt->bindParam(":p_afectarCaja", $afectarCaja, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdProveedor", $IdProveedor, PDO::PARAM_INT);
            $stmt->bindParam(":p_abono", $abono, PDO::PARAM_STR);
            $stmt->bindParam(":p_restante", $restante, PDO::PARAM_STR);
            $stmt->bindParam(":p_tipo_pago", $Tipo_pago, PDO::PARAM_INT);
            $stmt->bindParam(":p_TipoDocumento", $TipoDocumento, PDO::PARAM_INT);
            $stmt->bindParam(":p_fechaCompra", $fechaCompra, PDO::PARAM_STR);
            $stmt->bindValue(":p_fechaVence", $fechaVencimiento, is_null($fechaVencimiento) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt->bindParam(":p_NumeroFactura", $NumeroFactura, PDO::PARAM_STR);
            $stmt->bindParam(":p_iva", $iva, PDO::PARAM_STR);
            $stmt->bindParam(":p_subtotal", $subtotalcosto, PDO::PARAM_STR);
            $stmt->bindParam(":p_total_compra", $TotalCosto, PDO::PARAM_STR);
            $stmt->bindParam(":p_Nro_compras", $Nro_compras , PDO::PARAM_STR);
            $stmt->bindParam(":p_Nro_credito_compras", $Nro_credito_compras , PDO::PARAM_STR);
            $stmt->bindParam(":p_detalle", $productos_json, PDO::PARAM_STR); // Pasar el JSON como parámetro
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
  
    static public function mdlListarCompras($fechaDesde, $fechaHasta) {
       try {
             $conn = Conexion::conectar();
            $stmt = $conn->prepare("CALL usp_ListarCompras(:fechaDesde, :fechaHasta)");

                // Asegúrate de enviar NULL explícito si no hay fecha
          if ($fechaDesde) {
               $stmt->bindValue(':fechaDesde', $fechaDesde, PDO::PARAM_STR);
          } else {
            $stmt->bindValue(':fechaDesde', null, PDO::PARAM_NULL);
          }

          if ($fechaHasta) {
              $stmt->bindValue(':fechaHasta', $fechaHasta, PDO::PARAM_STR);
          } else {
              $stmt->bindValue(':fechaHasta', null, PDO::PARAM_NULL);
          }

            $stmt->execute();
            return $stmt->fetchAll();
          } catch (Exception $e) {
             return 'Excepción capturada: ' . $e->getMessage();
          }
    }


    // static public function mdlEliminarCompras($idEliminar){
    //     $id_usuario = $_SESSION["usuario"]->id_usuario;
    //     try{ //try can
            
    //         $stmt = Conexion::conectar()->prepare("CALL usp_EliminarCompra( :p_IdCompra,
    //                                                         :p_id_usuario
    //                                                         )");      
                                                        
    //         $stmt -> bindParam(":p_IdCompra",$idEliminar, PDO::PARAM_STR);
    //         $stmt -> bindParam(":p_id_usuario", $id_usuario , PDO::PARAM_STR);

    //         if ($stmt->execute()) {
    //             $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
    //             $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
    //         } else {
    //             $resultado = "Error al ejecutar la accion.";
    //         }
    
    //     } catch (Exception $e) {
    //         $resultado = 'Excepción: ' . $e->getMessage();
    //     }
	//       return $resultado;

	//        $stmt = null; //para que no quede abierta ninguna conexion

	// }

static public function mdlEliminarCompras($idEliminar){
       $id_usuario = $_SESSION["usuario"]->id_usuario;
      try {
        $stmt = Conexion::conectar()->prepare("CALL usp_ValidarEliminacionCompra(:p_IdCompra)");
        $stmt->bindParam(":p_IdCompra", $idEliminar, PDO::PARAM_INT);
        // $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultado = $respuesta['resultado'];
        $stmt->closeCursor(); // cerrar para poder hacer otro CALL

        if ($resultado === "OK") {
            // Llamar al SP que realmente anula la venta
            $stmt2 = Conexion::conectar()->prepare("CALL usp_EliminarCompra(:p_IdCompra, :p_id_usuario)");
             $stmt2 -> bindParam(":p_IdCompra",$idEliminar, PDO::PARAM_STR);
            $stmt2 -> bindParam(":p_id_usuario", $id_usuario , PDO::PARAM_STR);
             if ($stmt2->execute()) {
                $respuesta = $stmt2->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
        }

    } catch (Exception $e) {
        $resultado = 'Excepción: ' . $e->getMessage();
    }

    return $resultado;
}





    static public function mdlValidarProductoParaEliminar($nroBoleta){

        $stmt = Conexion::conectar()->prepare("call sp_validar_producto_eliminacion(:p_nroBoleta)");
        $stmt -> bindParam(":p_nroBoleta", $nroBoleta , PDO::PARAM_STR);
      
          if($stmt -> execute()){
            return $stmt ->fetch(PDO::FETCH_OBJ);
     
            $stmt = null;
        }
    }   

    static public function mdlValidarProductoParaEliminarVentas($nroBoleta, $p_opcion, $id_usuario) {

           $conn = Conexion::conectar();
           $procedimiento = $p_opcion == 1 ? "CALL usp_ValidarEliminarVenta" : "CALL usp_ValidarEliminarCompra";

            $stmt = $conn->prepare("$procedimiento(:p_nroBoleta, :p_IdUsuario)");
            $stmt->bindParam(":p_nroBoleta", $nroBoleta, PDO::PARAM_STR);
            $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);

          if ($stmt->execute()) {
              $res = $stmt->fetch(PDO::FETCH_ASSOC);
               header('Content-Type: application/json');

             if ($res && isset($res['mensaje_error'])) {
                     if ($res['mensaje_error'] !== 'OK') {
                   return json_encode(['error' => $res['mensaje_error']]);
                } else {
                     return json_encode(['success' => true]); // Retornar un valor explícito
             }
           }
        }

        return json_encode(['error' => 'Respuesta inesperada del servidor.']);
    }

    static public function mdlValidarClienteTieneAbono($nroBoleta){
          $stmt = Conexion::conectar()->prepare("call sp_validar_cliente_tiene_abono(:p_nroBoleta)");
          $stmt -> bindParam(":p_nroBoleta", $nroBoleta , PDO::PARAM_STR);  
          if($stmt -> execute()){
             return $stmt ->fetch(PDO::FETCH_OBJ); 
             $stmt = null;
           }
    }

}