<?php
session_start();
require_once "conexion.php";

class VentasModelo
{


    static public function mdlObtenerNroBoleta()
    {
        $stmt = Conexion::conectar()->prepare("call usp_obtenerNroBoleta()");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }
// usp_EditarVentaCreditos

    static public function mdlRegistrarVenta(
        $datos,
        $Id_caja,
        $IdCliente,
        $nro_boleta,
        $tipo_pago,
        $TipoDocumento,
        $descripcion_venta,
        $CantidadProducto,
        $CantidadTotal,
        $iva,
        $subtotal,
        $total_venta,
        $ImporteRecibido,
        $ImporteCambio,
        $nro_credito_venta,
        $fechaVencimiento
    ) {

        try {
            $fechaVencimiento = trim($fechaVencimiento);
            $fechaVencimiento = ($fechaVencimiento === "") ? null : $fechaVencimiento;

            $id_usuario = $_SESSION["usuario"]->id_usuario;
            $conn = Conexion::conectar();
            $productos_json = json_encode(array_map('json_decode', $datos));

            $procedimiento = $tipo_pago == 1 ? "CALL usp_GuardarVentaEfectivo" : "CALL usp_GuardarVentaCreditos";
            $tipo_pagos = $tipo_pago == 1 ? 'EFECTIVO' : 'CREDITO';

            $stmt = $conn->prepare("$procedimiento(
                  :p_IdUsuario, :p_IdCaja, :p_IdCliente, :p_nro_boleta, :p_tipo_pago, 
                  :p_TipoDocumento, :p_CantidadTotal, :p_iva, :p_subtotal, :p_total_venta, 
                  :p_ImporteRecibido, :p_ImporteCambio, :p_nro_credito_venta, :p_fechaVence,:p_detalle)");

            $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCaja", $Id_caja, PDO::PARAM_INT);
            $stmt->bindParam(":p_IdCliente", $IdCliente, PDO::PARAM_INT);
            $stmt->bindParam(":p_nro_boleta", $nro_boleta, PDO::PARAM_STR);
            $stmt->bindParam(":p_tipo_pago", $tipo_pagos, PDO::PARAM_STR);
            $stmt->bindParam(":p_TipoDocumento", $TipoDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":p_CantidadTotal", $CantidadTotal, PDO::PARAM_STR);
            $stmt->bindParam(":p_iva", $iva, PDO::PARAM_STR);
            $stmt->bindParam(":p_subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":p_total_venta", $total_venta, PDO::PARAM_STR);
            $stmt->bindParam(":p_ImporteRecibido", $ImporteRecibido, PDO::PARAM_STR);
            $stmt->bindParam(":p_ImporteCambio", $ImporteCambio, PDO::PARAM_STR);
            $stmt->bindParam(":p_nro_credito_venta", $nro_credito_venta, PDO::PARAM_STR);
            $stmt->bindValue(":p_fechaVence", $fechaVencimiento, is_null($fechaVencimiento) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt->bindParam(":p_detalle", $productos_json, PDO::PARAM_STR);

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


    static public function mdlListarVentas($fechaDesde, $fechaHasta)
    {

        try {
            $stmt = Conexion::conectar()->prepare("SELECT Concat('Boleta Nro: ',v.nro_boleta,' - Total Venta: $./ ',Round(vc.total_venta,2)) as nro_boleta,
                                                            v.codigo_barra,
                                                            c.nombre_categoria,
                                                            p.descripcion_producto,
                                                           -- case when c.aplica_peso = 1 then concat(v.cantidad,' Kg(s)')
                                                            -- else concat(v.cantidad,' Und(s)') end as cantidad,
                                                            concat(v.cantidad, ' ', m.nombre_corto) as cantidad,
                                                            concat('$./ ',round(v.total_venta,2)) as total_venta,
                                                            v.fecha_venta
                                                            -- v.nro_boleta
                                                            FROM det_venta v inner join producto p on v.codigo_barra = p.codigo_barra
                                                                                inner join venta_cabecera vc on vc.nro_boleta  = v.nro_boleta
                                                                                -- inner join venta_cabecera vc on cast(vc.nro_boleta as integer) = cast(v.nro_boleta as integer)
                                                                                and vc.Activo = 1 and v.Activo=1 
                                                                                inner join categorias c on c.id_categoria = p.id_categoria_producto 
                                                                                inner join medidas m on m.id=p.id_unidades
                                                    where DATE(v.fecha_venta) >= date(:fechaDesde) and DATE(v.fecha_venta) <= date(:fechaHasta)
                                                    order by v.nro_boleta desc
                                                    -- order by v.nro_boleta asc
                                                    
                                                    ");

            $stmt->bindParam(":fechaDesde", $fechaDesde, PDO::PARAM_STR);
            $stmt->bindParam(":fechaHasta", $fechaHasta, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        $stmt = null;
    }



    static public function mdlObtenerDetalleVenta($nro_boleta)
    {
        try {
            $stmt = Conexion::conectar()->prepare("
              select
	                     concat('B001-', v.nro_boleta) as nro_boleta,
	                     concat(u.nombre_usuario, '', u.apellido_usuario)as nombre_cajero,
	                     v.Id_caja,
	                    ca.numero_caja,
	                    c.nombre as nombre_cliente,
	                    c.numeroDocumento as documento_cliente,
	                    c.telefono as telefono_cliente,
	                    c.direccion as direccion_cliente,
	                    dv.codigo_barra,
	                    p.descripcion_producto,
	                    dv.cantidad,
	                    dv.PrecioUnidad,
	                    dv.total_venta as total_ventas_producto,
	                    v.iva as iva_Cab,
	                    v.subtotal as subtotal_Cab,
	                    v.total_venta as total_ventas_cab,
	                    v.ImporteRecibido,
	                    v.ImporteCambio,
	                    v.abono_credito,
	            v.tipo_pago,
	              date(v.fecha_registro) as fechaVentas
               from
	                  ventas v 
            inner join det_venta dv  on
	                   v.nro_boleta = dv.nro_boleta
	                   and dv.estado = 1
                    inner join usuarios u on
	                  u.id_usuario = v.id_usuario_creacion
	              and u.id_caja = v.Id_caja
                   inner join cliente c on
	            v.IdCliente = c.id_cliente
                      inner join cajas ca on
	                         v.Id_caja = ca.id_caja join producto p on p.id_producto =dv.IdProducto
               where
	                dv.nro_boleta = :nro_boleta
	                and dv.estado = 1  ");

            $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        } catch (Exception $e) {
            return 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }
    }

    static public function mdlObtenerDatosDelaEmpresa()
    {

        try {

            $stmt = Conexion::conectar()->prepare("SELECT  id_Empresa, razon_social,  concat('RUC: ',ruc) as 
            ruc , mensaje,
            concat('Direccion: ',direccion_sucursal) as direccion , marca, serie_boleta,  concat('IVA(',pi2.porcentaje,'%)') as  iva,
             nro_correlativo_ventas, nro_credito_ventas, 
            nro_correlativo_compras, nro_credito_compras, concat('Email: ',email) as  email,
            concat('Telefono: ',telefono) as telefono, fecha_registro, 
            fecha_actualizacion FROM  empresa  join porcentaje_iva pi2  on pi2.codigo=codigo_iva  where id_Empresa =1");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        } catch (Exception $e) {
            return 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }
    }


    static public function mdlEliminarVentas($nroBoleta, $id_usuario)
    {


        $concepto = "Eliminar o Anulacion ventas Realizada Nº: " . $nroBoleta;
        $stmt = Conexion::conectar()->prepare("call usp_EliminarVenta(:p_nroBoleta,:p_concepto,:p_IdUsuario)");
        $stmt->bindParam(":p_nroBoleta", $nroBoleta, PDO::PARAM_STR);
        $stmt->bindParam(":p_concepto", $concepto, PDO::PARAM_STR);
        $stmt->bindParam(":p_IdUsuario", $id_usuario, PDO::PARAM_STR);
        $stmt->execute();
        return  $stmt->fetch();
        $stmt = null;
    }
}
