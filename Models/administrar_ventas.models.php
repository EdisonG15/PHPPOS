
<?php
session_start();
require_once "conexion.php";

class Models{

    static public function mdlListarVentas($fechaDesde,$fechaHasta){
            
        try {
            
            $stmt = Conexion::conectar()->prepare('call usp_ListarVentas(:p_fechaDesde,:p_fechaHasta)');
            $stmt -> bindParam(":p_fechaDesde",$fechaDesde,PDO::PARAM_STR);
            $stmt -> bindParam(":p_fechaHasta",$fechaHasta,PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll();
          
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        
        $stmt = null;
    }
    
    static public function mdlEliminarVenta($idEliminar){
       $id_usuario = $_SESSION["usuario"]->id_usuario;
      try {
        $stmt = Conexion::conectar()->prepare("CALL usp_ValidarEliminacionVenta(:p_IdVenta, :p_id_usuario)");
        $stmt->bindParam(":p_IdVenta", $idEliminar, PDO::PARAM_INT);
        $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultado = $respuesta['resultado'];
        $stmt->closeCursor(); // cerrar para poder hacer otro CALL

        if ($resultado === "OK") {
            // Llamar al SP que realmente anula la venta
            $stmt2 = Conexion::conectar()->prepare("CALL usp_AnularVenta(:p_IdVenta, :p_id_usuario)");
            $stmt2->bindParam(":p_IdVenta", $idEliminar, PDO::PARAM_INT);
            $stmt2->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_INT);
            // if ($stmt2->execute()) {
            //     $resultado = "Venta eliminada correctamente.";
            // } else {
            //     $resultado = "Error al eliminar la venta.";
            // }
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

    // static public function mdlEliminarVenta($idEliminar){
    //     $id_usuario = $_SESSION["usuario"]->id_usuario;
    //     try{ //try can
            
    //         $stmt = Conexion::conectar()->prepare("CALL usp_EliminarVenta( :p_IdVenta,
    //                                                         :p_id_usuario
    //                                                         )");      
                                                        
    //         $stmt -> bindParam(":p_IdVenta",$idEliminar, PDO::PARAM_STR);
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

    

    }