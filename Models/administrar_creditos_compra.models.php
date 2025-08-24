<?php
require_once "conexion.php";
session_start();
class Models
{

    static public function mdlMostrarCredito($filtro, $filtro_estado, $fecha_inicio, $fecha_fin)
    {

        $stmt = Conexion::conectar()->prepare('call usp_ListarComprasCreditoFiltrado(:p_filtro,
                                                                                 :p_filtro_estado,
                                                                                 :p_fecha_inicio,
                                                                                 :p_fecha_fin)');
        $stmt->bindParam(":p_filtro", $filtro, PDO::PARAM_STR);
        $stmt->bindParam(":p_filtro_estado", $filtro_estado, PDO::PARAM_STR);
        if (empty($fecha_inicio)) {
            $stmt->bindValue(":p_fecha_inicio", null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(":p_fecha_inicio", $fecha_inicio, PDO::PARAM_STR);
        }
        if (empty($fecha_fin)) {
            $stmt->bindValue(":p_fecha_fin", null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(":p_fecha_fin", $fecha_fin, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlRegistrarAbono(
        $id_caja,$id_Compra,$id_compra_credito,$abonado,$observacion, 
	                                          $metodo_pago
    ) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try {

            $stmt = Conexion::conectar()->prepare("CALL usp_RegistrarAbonoCompraCredito(:p_IdUsuario, :p_IdCaja,:p_IdCompra,
            :p_IdCompraCredito, :p_MontoAbonado,:p_Observacion,:p_MetodoPago)");
            $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCompra", $id_Compra, PDO::PARAM_STR);
            $stmt->bindParam(":p_IdCompraCredito", $id_compra_credito, PDO::PARAM_STR);
            $stmt->bindParam(":p_MontoAbonado", $abonado, PDO::PARAM_STR);
            $stmt->bindParam(":p_Observacion", $observacion, PDO::PARAM_STR);
            $stmt->bindParam(":p_MetodoPago",  $metodo_pago, PDO::PARAM_STR);
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

    static public function mdlHistorialAbonoCredito($id_credito)
{

    $stmt = Conexion::conectar()->prepare('CALL ups_ListarHistorialAbonoCreditoCompras(:p_id_credito)');
    $stmt->bindParam(':p_id_credito', $id_credito, PDO::PARAM_INT);    
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null; // liberar memoria
    return $resultado;
}


static public function mdlEliminarAbono($id_idAbono
          ) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try {

            $stmt = Conexion::conectar()->prepare("CALL ups_EliminarAbonoCreditoCompras(:p_idUsuario, 
                                                                         :p_idAbono)");
            $stmt->bindParam(":p_idUsuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_idAbono", $id_idAbono, PDO::PARAM_INT);
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
