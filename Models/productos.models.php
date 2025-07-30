<?php

require_once "conexion.php";
// use PhpOffice\PhpSpreadsheet\IOFactory;
session_start();

class ProductosModelo
{

    static public function mdlBuscarIdCategoria($nombreCategoria)
    {
        $nombreCategoria = trim($nombreCategoria);
        $stmt = Conexion::conectar()->prepare("select id_categoria from categoria where nombre_categoria = :Descripcion");
        $stmt->bindParam(":Descripcion", $nombreCategoria, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }

    static public function   mdlListarConsultarProducto()
    {

        $stmt = Conexion::conectar()->prepare('call usp_ConsultarProducto');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlListarProductos()
    {

        $stmt = Conexion::conectar()->prepare('call usp_ListarProductos');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlListaPrecioProductos($id_producto)
    {

        $stmt = Conexion::conectar()->prepare('   SELECT lp.id_lote AS id,
              lp.costo_unitario AS precioCompra,
              lp.fecha_vencimiento AS fechaVencimiento
             FROM lote_producto lp
               JOIN (
                     SELECT MIN(id_lote) AS id_lote_unico
                        FROM lote_producto
                         WHERE id_producto = :p_id_producto
                         AND estado = 1
                         GROUP BY costo_unitario
                    ) AS unicos ON lp.id_lote = unicos.id_lote_unico  ');
        $stmt->bindParam(":p_id_producto", $id_producto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlGuardar( $data) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
              $id_producto = $data["id_producto"];
        try {

            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarProducto( :p_id_producto,
                                                            :p_codigo_barra ,
                                                            :p_id_categoria_producto ,
                                                            :p_id_marca_producto,
                                                            :p_id_unidades ,
                                                            :p_descripcion_producto ,
                                                            :p_img_producto ,
                                                            :p_precio_compra_producto ,
                                                            :p_precio_venta_producto ,
                                                            :p_precio_1_producto ,
                                                            :p_precio_2_producto ,
                                                            :p_lleva_iva_producto ,
                                                            :p_stock_producto,
                                                            :p_minimo_stock_producto,    
                                                            :p_perecedero_producto,
                                                            :p_id_usuario,
                                                            :p_fecha_vencimiento )");
            $stmt->bindParam(":p_id_producto",   $id_producto, PDO::PARAM_STR);
            $stmt->bindParam(":p_codigo_barra",   $data["iptCodigoReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_categoria_producto",   $data["selCategoriaReg"], PDO::PARAM_STR);
             $stmt->bindParam(":p_id_marca_producto",   $data["selMarcaReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_unidades",   $data["selMedidasReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_descripcion_producto", $data["iptDescripcionReg"], PDO::PARAM_STR);
            // $stmt->bindParam(":p_img_producto",  $data["logo_path"], PDO::PARAM_STR);
            $img_producto = !empty($data["logo_path"]) ? $data["logo_path"] : "Views/assets/imagenes/productos/img_por_defecto.png";
            $stmt->bindParam(":p_img_producto", $img_producto, PDO::PARAM_STR);

            $stmt->bindParam(":p_precio_compra_producto",   $data["iptPrecioCompraReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_venta_producto", $data["iptPrecioVentaReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_1_producto",  $data["iptPrecio1"], PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_2_producto",  $data["iptPrecio2"], PDO::PARAM_STR);
            $stmt->bindParam(":p_lleva_iva_producto", $data["chkIva"], PDO::PARAM_STR);
            $stmt->bindParam(":p_stock_producto", $data["iptStockReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_minimo_stock_producto",  $data["iptMinimoStockReg"], PDO::PARAM_STR);
            $stmt->bindParam(":p_perecedero_producto",  $data["chkPerecedero"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_usuario",   $id_usuario, PDO::PARAM_STR);
            //  $stmt->bindParam(":p_fecha_vencimiento", $fecha_vencimiento, PDO::PARAM_STR);
            // Para fecha vencimiento: null si no es perecedero
            if ( $data["chkPerecedero"] == 0 || empty( $data["iptFechaVencimiento"])) {
                $stmt->bindValue(":p_fecha_vencimiento", null, PDO::PARAM_NULL);
            } else {
                if($id_producto>0){
                 $stmt->bindValue(":p_fecha_vencimiento", null, PDO::PARAM_NULL);
                }else {
                $stmt->bindValue(":p_fecha_vencimiento", $data["iptFechaVencimiento"], PDO::PARAM_STR);
                }
                
            }
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

    static public function mdlEliminar($Idpoducto)
    {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try { //try can

            $stmt = Conexion::conectar()->prepare("CALL usp_EliminarProducto( :p_id_poducto,
                                                            :p_id_usuario
                                                            )");

            $stmt->bindParam(":p_id_poducto", $Idpoducto, PDO::PARAM_STR);
            $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
        return $resultado;

        $stmt = null; //para que no quede abierta ninguna conexion
    }



    static public function mdlAumentarStock(
        $id_producto,
        $codigo_producto,
        $comentario,
        $nuevo_stock,
        $cantidad,
        $precio_compra,
        $tipo_operacion,
        $fechaVencimientoAun
    ) {
        $fechaVencimientoAun = trim($fechaVencimientoAun);
        $fechaVencimientoAun = ($fechaVencimientoAun === "") ? null : $fechaVencimientoAun;
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try { //try can
            $stmt = Conexion::conectar()->prepare("call usp_registrarIngresoKardex( :p_id_producto,
                                                                              :p_codigo_producto,
                                                                              :p_concepto,
                                                                              :p_nuevo_stock,
                                                                              :p_cantidad,
                                                                              :p_precio_compra,
                                                                              :p_tipo_ingreso,
                                                                              :p_fecha_vencimiento,
                                                                              :p_id_usuario);");
            $stmt->bindParam(":p_id_producto", $id_producto, PDO::PARAM_STR);
            $stmt->bindParam(":p_codigo_producto", $codigo_producto, PDO::PARAM_STR);
            $stmt->bindParam(":p_concepto", $comentario, PDO::PARAM_STR);
            $stmt->bindParam(":p_nuevo_stock", $nuevo_stock, PDO::PARAM_STR);
            $stmt->bindParam(":p_cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindParam(":p_precio_compra", $precio_compra, PDO::PARAM_STR);
            $stmt->bindParam(":p_tipo_ingreso", $tipo_operacion, PDO::PARAM_STR);
            $stmt->bindValue(":p_fecha_vencimiento", $fechaVencimientoAun, is_null($fechaVencimientoAun) ? PDO::PARAM_NULL : PDO::PARAM_STR);

            // $stmt -> bindParam(":p_fecha_vencimiento", $fechaVencimientoAun, PDO::PARAM_STR);   
            $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
        return $resultado;

        $stmt = null; //para que no quede abierta ninguna conexion
    }
    static public function mdlDisminuirStock($id_producto, $codigo_producto, $comentario, $nuevo_stock, $cantidad, $precio_compra, $tipo_operacion, $fechaVencimientoAun,$nuevaFechaVencimientoAun,$precioCosto)
    {
        $fechaVencimientoAun = trim($fechaVencimientoAun);
         $nuevaFechaVencimientoAun = trim($nuevaFechaVencimientoAun);
        $fechaVencimientoAun = ($fechaVencimientoAun === "") ? null : $fechaVencimientoAun;

         $nuevaFechaVencimientoAun = ($nuevaFechaVencimientoAun === "") ? null : $nuevaFechaVencimientoAun;


        
        $precio_compra = (trim($precio_compra) === "") ? null : $precio_compra;
   $precioCosto= (trim($precioCosto) === "") ? null : $precioCosto;
        $id_usuario = $_SESSION["usuario"]->id_usuario;

        try {
            $stmt = Conexion::conectar()->prepare("CALL usp_ajustar_stock_disminuir(
            :p_id_producto,
            :p_codigo_producto,
            :p_observacion,
            :p_nuevo_stock,
            :p_cantidad,
            :p_precio_compra,
            :p_tipo_ajuste,
            :p_fecha_vencimiento,
            :p_Nuevafecha_vencimiento,
            :p_precioCosto,
            :p_id_usuario
        );");

            $stmt->bindParam(":p_id_producto", $id_producto, PDO::PARAM_STR);
            $stmt->bindParam(":p_codigo_producto", $codigo_producto, PDO::PARAM_STR);
            $stmt->bindParam(":p_observacion", $comentario, PDO::PARAM_STR);
            $stmt->bindParam(":p_nuevo_stock", $nuevo_stock, PDO::PARAM_STR);
            $stmt->bindParam(":p_cantidad", $cantidad, PDO::PARAM_STR);

            // Manejar null correctamente
            if (is_null($precio_compra)) {
                $stmt->bindValue(":p_precio_compra", null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(":p_precio_compra", $precio_compra, PDO::PARAM_STR);
            }

            $stmt->bindParam(":p_tipo_ajuste", $tipo_operacion, PDO::PARAM_STR);

            $stmt->bindValue(":p_fecha_vencimiento", $fechaVencimientoAun, is_null($fechaVencimientoAun) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt->bindValue(":p_Nuevafecha_vencimiento", $nuevaFechaVencimientoAun, is_null($nuevaFechaVencimientoAun) ? PDO::PARAM_NULL : PDO::PARAM_STR);
           
            
              if (is_null($precioCosto)) {
                $stmt->bindValue(":p_precioCosto", null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(":p_precioCosto", $precioCosto, PDO::PARAM_STR);
            }
            $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
                $resultado = $respuesta['resultado'];
            } else {
                $resultado = "Error al ejecutar la acción.";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }

        $stmt = null; // Liberar la conexión
        return $resultado;
    }



    static public function mdlActualizarInformacion($table, $data, $id, $nameId)
    {

        $set = "";

        foreach ($data as $key => $value) {

            $set .= $key . " = :" . $key . ",";
            // es igualar codigo_producto=:codigo_producto
        }

        $set = substr($set, 0, -1); // para quitar la ultima coma

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {

            $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
        }

        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "Ok";
        } else {

            return Conexion::conectar()->errorInfo();
        }
        $stmt = null;
    }


    static public function mdlEliminarInformacion($table, $id, $nameId)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");

        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";;
        } else {

            return Conexion::conectar()->errorInfo();
        }
        $stmt = null;
    }

    static public function mdlListarNombreProductos($opcion, $busqueda)
    {
          
               // Eliminas espacios al inicio y final solo una vez aquí
            $busqueda = trim($busqueda);
            $busqueda = "%$busqueda%";
        if ($opcion == 1) {
             $stmt = Conexion::conectar()->prepare("SELECT
    p.img_producto,
    p.codigo_barra, -- Asegúrate de que este campo se devuelva en tu respuesta AJAX
    CONCAT(
        codigo_barra,
        ' | ',
        c.nombre_categoria,
        ' => ',
        descripcion_producto,
        ' | Precio: $/.', -- Moneda de Ecuador es USD $, ajusta si es necesario
        p.precio_venta_producto,
        ' | Stock: ',
        p.stock_producto
    ) AS descripcion_completa,
    p.stock_producto
FROM
    producto p
INNER JOIN
    categorias c ON p.id_categoria_producto = c.id_categoria
INNER JOIN
    medidas u ON u.id_medida = p.id_unidades
WHERE
    p.estado = 1  AND p.stock_producto > 0
    AND (
        codigo_barra LIKE :busqueda
        OR descripcion_producto LIKE :busqueda
        OR c.nombre_categoria LIKE :busqueda
    )
LIMIT 5  ");
            $stmt->bindParam(":busqueda", $busqueda, PDO::PARAM_STR);
   
        }
        if ($opcion == 2) {
            $stmt = Conexion::conectar()->prepare("SELECT
    p.img_producto,
    p.codigo_barra, -- Asegúrate de que este campo se devuelva en tu respuesta AJAX
    CONCAT(
        codigo_barra,
        ' | ',
        c.nombre_categoria,
        ' => ',
        descripcion_producto,
        ' | Precio: $/.', -- Moneda de Ecuador es USD $, ajusta si es necesario
        p.precio_compra_producto,
        ' | Stock: ',
        p.stock_producto
    ) AS descripcion_completa,
    p.stock_producto
FROM
    producto p
INNER JOIN
    categorias c ON p.id_categoria_producto = c.id_categoria
INNER JOIN
    medidas u ON u.id_medida = p.id_unidades
WHERE
    p.estado = 1
    AND (
        codigo_barra LIKE :busqueda
        OR descripcion_producto LIKE :busqueda
        OR c.nombre_categoria LIKE :busqueda
    )
LIMIT 5  ");
            $stmt->bindParam(":busqueda", $busqueda, PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlGetDatosProducto($codigoProducto)
    {
        $stmt = Conexion::conectar()->prepare("call usp_GetDatosProducto(:p_codigo_producto)");
        $stmt->bindParam(":p_codigo_producto", $codigoProducto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlGetDatosProductoCompras($codigoProducto)
    {
        $stmt = Conexion::conectar()->prepare("call usp_GetDatosProductoCompras(:p_codigo_producto)");
        $stmt->bindParam(":p_codigo_producto", $codigoProducto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

    static public function mdlVerificaStockProducto($codigo_producto, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("call usp_VerificaStockProducto(:p_codigo_producto,:p_cantidad_a_vender)");

        $stmt->bindParam(":p_codigo_producto", $codigo_producto, PDO::PARAM_STR);
        $stmt->bindParam(":p_cantidad_a_vender", $cantidad, PDO::PARAM_STR);


        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

}
