<?php

require_once "conexion.php";
session_start();
class Models
{

    static public function mdlMostrar()
    {
        $stmt = Conexion::conectar()->prepare('call usp_ListarVentasCredito');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlMostrarFinalizado()
    {
        $stmt = Conexion::conectar()->prepare('call usp_ListarVentasCreditoFinalizado');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlObtenerCredito($p_id_cliente)
    {
        $stmt = Conexion::conectar()->prepare('call usp_VentasCreditoAbonar(:p_id_Cliente)');
        $stmt->bindParam(":p_id_Cliente", $p_id_cliente, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlMostrarCredito($filtro, $filtro_estado, $fecha_inicio, $fecha_fin)
    {

        $stmt = Conexion::conectar()->prepare('call usp_ListarVentasCreditoFiltrado(:p_filtro,
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


    static public function mdlRegistrar($id_caja, $IdCliente, $id_venta_credito, $abono, $observacion, $metodo_pago, $tipoAbono)
    {
        $id_usuario = $_SESSION["usuario"]->id_usuario;

        try {
            if ($tipoAbono == 1) {
                // Abono individual
                $stmt = Conexion::conectar()->prepare("CALL usp_RegistrarAbonoVentaCredito(
                :p_IdUsuario, :p_IdCaja, :p_IdVentaCredito, :p_Abono, :p_Observacion, :p_MetodoPago)");

                $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
                $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_INT);
                $stmt->bindParam(":p_IdVentaCredito", $id_venta_credito, PDO::PARAM_INT);
                $stmt->bindParam(":p_Abono", $abono, PDO::PARAM_STR);
                $stmt->bindParam(":p_Observacion", $observacion, PDO::PARAM_STR);
                $stmt->bindParam(":p_MetodoPago", $metodo_pago, PDO::PARAM_STR);
            } else if ($tipoAbono == 2) {
                // Abono múltiple
                $stmt = Conexion::conectar()->prepare("CALL usp_RegistrarAbonoMultipleVentaCredito(
                :p_IdUsuario, :p_IdCaja, :p_IdCliente, :p_MontoAbonado,:p_Observacion, :p_MetodoPago)");

                $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
                $stmt->bindParam(":p_IdCaja", $id_caja, PDO::PARAM_INT);
                $stmt->bindParam(":p_IdCliente", $IdCliente, PDO::PARAM_INT);
                $stmt->bindParam(":p_MontoAbonado", $abono, PDO::PARAM_STR);
                $stmt->bindParam(":p_Observacion", $observacion, PDO::PARAM_STR);
                $stmt->bindParam(":p_MetodoPago", $metodo_pago, PDO::PARAM_STR);
                
            } else {
                return "Tipo de abono inválido.";
            }

            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
                $resultado = $respuesta['resultado'] ?? 'Operación completada.';
            } else {
                $resultado = "Error al ejecutar la acción.";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }

        $stmt = null;
        return $resultado;
    }

static public function mdlHistorialAbonoCredito($id_credito)
{

    $stmt = Conexion::conectar()->prepare('CALL ups_ListarHistorialAbonoCreditoCliente(:p_id_credito)');
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

            $stmt = Conexion::conectar()->prepare("CALL ups_EliminarAbonoCreditoVenta(:p_idUsuario, 
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
