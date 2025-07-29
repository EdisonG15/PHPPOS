<?php
require_once "conexion.php";
session_start();

class CargaMasivaModelo
{
    static public function mdlGuardarCargaMasiva($data) {
        $id_usuario = $_SESSION["usuario"]->id_usuario ?? 0;

        try {
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarProductoLote(
                                                        :p_id_producto,
                                                        :p_codigo_barra,
                                                        :p_id_categoria_producto,
                                                        :p_id_marca_producto,
                                                        :p_id_unidades,
                                                        :p_descripcion_producto,
                                                        :p_img_producto,
                                                        :p_precio_compra_producto,
                                                        :p_precio_venta_producto,
                                                        :p_precio_1_producto,
                                                        :p_precio_2_producto,
                                                        :p_lleva_iva_producto,
                                                        :p_stock_producto,
                                                        :p_minimo_stock_producto,
                                                        :p_perecedero_producto,
                                                        :p_id_usuario,
                                                        :p_fecha_vencimiento
                                                    )");

            // Bindeo de parámetros (mantener igual que lo tenías)
            $stmt->bindParam(":p_id_producto",             $data["id_producto"],             PDO::PARAM_INT);
            $stmt->bindParam(":p_codigo_barra",            $data["iptCodigoReg"],            PDO::PARAM_STR);
            $stmt->bindParam(":p_id_categoria_producto",   $data["selCategoriaReg"],         PDO::PARAM_INT);
            $stmt->bindParam(":p_id_marca_producto",       $data["selMarcaReg"],             PDO::PARAM_INT);
            $stmt->bindParam(":p_id_unidades",             $data["selMedidasReg"],           PDO::PARAM_INT);
            $stmt->bindParam(":p_descripcion_producto",    $data["iptDescripcionReg"],       PDO::PARAM_STR);
            $stmt->bindParam(":p_img_producto",            $data["logo_path"],               PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_compra_producto",  $data["iptPrecioCompraReg"],      PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_venta_producto",   $data["iptPrecioVentaReg"],       PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_1_producto",       $data["iptPrecio1"],              PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_2_producto",       $data["iptPrecio2"],              PDO::PARAM_STR);
            $stmt->bindParam(":p_lleva_iva_producto",      $data["chkIva"],                  PDO::PARAM_INT);
            $stmt->bindParam(":p_stock_producto",          $data["iptStockReg"],             PDO::PARAM_STR);
            $stmt->bindParam(":p_minimo_stock_producto",   $data["iptMinimoStockReg"],       PDO::PARAM_STR);
            $stmt->bindParam(":p_perecedero_producto",     $data["chkPerecedero"],           PDO::PARAM_INT);
            $stmt->bindParam(":p_id_usuario",              $id_usuario,                      PDO::PARAM_INT);

            if ($data["chkPerecedero"] == 0 || empty($data["iptFechaVencimiento"])) {
                $stmt->bindValue(":p_fecha_vencimiento", null, PDO::PARAM_NULL);
            } else {
                if ($data["id_producto"] > 0) { // Si es una edición, no cambiar fecha de vencimiento
                    $stmt->bindValue(":p_fecha_vencimiento", null, PDO::PARAM_NULL);
                } else {
                    $stmt->bindValue(":p_fecha_vencimiento", $data["iptFechaVencimiento"], PDO::PARAM_STR);
                }
            }

            if ($stmt->execute()) {
                // Obtener el resultado. Esto podría ser null si el SP no devuelve filas.
                $response = $stmt->fetch(PDO::FETCH_ASSOC);

                // **Cambio crucial aquí:** Verificar si $response no es null Y si la clave 'resultado' existe
                if ($response && isset($response['resultado'])) {
                    $result = json_decode($response['resultado'], true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $result;
                    } else {
                        // Error al decodificar el JSON devuelto por el SP
                        return ['status' => 'error', 'mensaje' => 'Error al decodificar la respuesta JSON del SP: ' . json_last_error_msg()];
                    }
                } else {
                    // El SP no devolvió una respuesta válida (por ejemplo, no hay SELECT en el SP)
                    return ['status' => 'error', 'mensaje' => 'La base de datos no retornó una respuesta válida para esta operación.'];
                }
            } else {
                // Fallo en la ejecución de la consulta PDO
                $errorInfo = $stmt->errorInfo();
                return ['status' => 'error', 'mensaje' => 'Error al ejecutar la acción en la base de datos: ' . ($errorInfo[2] ?? 'Error desconocido de PDO.')];
            }
        } catch (PDOException $e) {
            // Capturar excepciones de PDO (errores de conexión, sintaxis SQL, etc.)
            return ['status' => 'error', 'mensaje' => 'Excepción de base de datos: ' . $e->getMessage()];
        } catch (Exception $e) {
            // Capturar cualquier otra excepción inesperada
            return ['status' => 'error', 'mensaje' => 'Excepción inesperada en el modelo: ' . $e->getMessage()];
        } finally {
            // Cerrar el statement
            $stmt = null;
        }
    }
}