
<?php


class ProductosControlador
{

    static public function ctrListarProductos()
    {

        $productos = ProductosModelo::mdlListarProductos();

        return $productos;
    }
    static public function ctrListaPrecioProductos($id_producto)
    {

        $productos = ProductosModelo::mdlListaPrecioProductos($id_producto);

        return $productos;
    }


    static public function ctrGuardar($data, $file = null) {
          // Define el directorio de destino para las imágenes cargadas
        // __DIR__ se refiere al directorio del archivo actual (controllers.php)
        // Por lo tanto, "../Views/assets/imagenes/logo/" es la ruta relativa desde aquí.
        $upload_dir = __DIR__ . "/../Views/assets/imagenes/productos/";

        // Asegúrate de que el directorio de carga exista
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Crea el directorio si no existe (con permisos 0755)
        }

        $logo_path_for_db = ''; // Ruta del logo para la base de datos (por defecto vacía)

        // Si se subió un archivo y tiene nombre
        if ($file && $file['name']) {
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            // Genera un nombre de archivo único para evitar sobreescrituras
            $new_file_name = uniqid('logo_') . '.' . $file_extension;
            $target_file = $upload_dir . $new_file_name;

            // Mueve el archivo cargado del directorio temporal a tu destino
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                // Guarda la ruta relativa en la base de datos
                // Esta ruta es la que tu servidor web usará para mostrar la imagen
                $logo_path_for_db = "Views/assets/imagenes/productos/" . $new_file_name;
            } else {
                return ["status" => "error", "message" => "Error al mover el archivo de logo."];
            }
        } else {
            // No se subió un nuevo archivo. Usar la ruta existente o vacía.
            // Asegúrate de que 'logo_path_current' sea el nombre que envías desde el frontend
            if (isset($data['logo_path_current']) && !empty($data['logo_path_current'])) {
                $logo_path_for_db = $data['logo_path_current'];
            } else {
                $logo_path_for_db = ''; // No hay logo existente y no se subió uno nuevo
            }
        }
   // 1. Obtener el valor del checkbox 'chkPerecedero'
        // Es crucial que 'chkPerecedero' llegue correctamente del frontend (0 o 1, o true/false)
         $idProducto = empty($data["idProducto"]) ? null : (int)$data["idProducto"];
        $isPerecedero = isset($data["chkPerecedero"]) && ($data["chkPerecedero"] == 1 || $data["chkPerecedero"] === true);

        // 2. Determinar el valor de iptFechaVencimiento para la base de datos
        $fechaVencimientoParaDB = null; // Por defecto, será NULL
        if ($isPerecedero) {
            // Si es perecedero, toma el valor enviado desde el formulario
            // Asegúrate de que el formato de fecha sea correcto para tu base de datos (YYYY-MM-DD)
            $fechaVencimientoParaDB = !empty($data["iptFechaVencimiento"]) ? $data["iptFechaVencimiento"] : null;
        } 
        if( $idProducto > 0){

          $iptStockReg=  0;
          $iptPrecioCompraReg=   0;
          $iptCodigoReg=0;

        }else{

            $iptStockReg=  $data["iptStockReg"];
          $iptPrecioCompraReg=   $data["iptPrecioCompraReg"];
          $iptCodigoReg=$data["iptCodigoReg"];
        }
        // Prepara los datos para el modelo, incluyendo la ruta del logo
        // Asegúrate de que las claves aquí coincidan con tus columnas de base de datos y parámetros del SP
       
        // 2. Preparar los datos para el modelo, incluyendo el ID de empresa y la ruta final del logo
        $producto_data = [
            "id_producto"         => empty($data["idProducto"]) ? null : (int)$data["idProducto"], // Importante: null para INSERT, int para UPDATE
            "iptCodigoReg"       =>  $iptCodigoReg,
            "selMedidasReg"           => (int)$data["selMedidasReg"],
            "selMarcaReg"           => (int)$data["selMarcaReg"],
            "selCategoriaReg"           => (int)$data["selCategoriaReg"],
            "iptDescripcionReg"   => $data["iptDescripcionReg"],
            "iptPrecioCompraReg"                => $iptPrecioCompraReg,
            "iptPrecioVentaReg"              => $data["iptPrecioVentaReg"],
            "iptStockReg"   =>  $iptStockReg,
            "iptMinimoStockReg" => $data["iptMinimoStockReg"],
            "iptPrecio1"              => $data["iptPrecio1"],
            "iptPrecio2"           => $data["iptPrecio2"],
            "chkIva"            => $data["chkIva"],
            "chkPerecedero" => $data["chkPerecedero"],
            "iptFechaVencimiento" => $fechaVencimientoParaDB,
            "logo_path"          => $logo_path_for_db
        ];
      

        $registroProducto = ProductosModelo::mdlGuardar($producto_data);

        return $registroProducto;
    }

    static public function ctrEliminar($Idpoducto)
    {

        $respuesta = ProductosModelo::mdlEliminar($Idpoducto);

        return $respuesta;
    }


    static public function ctrAumentarStock(
        $id_producto,
        $codigo_producto,
        $comentario,
        $nuevo_stock,
        $cantidad,
        $precio_compra,
        $tipo_operacion,
        $fechaVencimientoAun
    ) {

        $respuesta = ProductosModelo::mdlAumentarStock(
            $id_producto,
            $codigo_producto,
            $comentario,
            $nuevo_stock,
            $cantidad,
            $precio_compra,
            $tipo_operacion,
            $fechaVencimientoAun
        );

        return $respuesta;
    }

    static public function ctrDisminuirStock(
        $id_producto,
        $codigo_producto,
        $comentario,
        $nuevo_stock,
        $cantidad,
        $precio_compra,
        $tipo_operacion,
        $fechaVencimientoAun,
        $nuevaFechaVencimientoAun,
        $precioCosto
    ) {

        $respuesta = ProductosModelo::mdlDisminuirStock(
            $id_producto,
            $codigo_producto,
            $comentario,
            $nuevo_stock,
            $cantidad,
            $precio_compra,
            $tipo_operacion,
            $fechaVencimientoAun,
            $nuevaFechaVencimientoAun,
            $precioCosto
        );

        return $respuesta;
    }

    static public function ctrActualizarProducto($table, $data, $id, $nameId)
    {

        $respuesta = ProductosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);

        return $respuesta;
    }



    static public function ctrActualizarStock($table, $data, $id, $nameId)
    {

        $respuesta = ProductosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);

        return $respuesta;
    }

    static public function ctrListarNombreProductos($opcion, $busqueda)
    {

        $producto = ProductosModelo::mdlListarNombreProductos($opcion, $busqueda);

        return $producto;
    }

    static public function ctrGetDatosProducto($codigo_producto)
    {

        $productos = ProductosModelo::mdlGetDatosProducto($codigo_producto);
        // echo json_encode($productos);
        return $productos;
    }

    static public function ctrGetDatosProductoCompras($codigo_producto)
    {
        $productos = ProductosModelo::mdlGetDatosProductoCompras($codigo_producto);
        // echo json_encode($productos);
        return $productos;
    }

    static public function ctrVerificaStockProducto($codigo_producto, $cantidad)
    {

        $respuesta = ProductosModelo::mdlVerificaStockProducto($codigo_producto, $cantidad);

        return $respuesta;
    }

    static public function ctrListarConsultarProducto()
    {

        $Producto = ProductosModelo::mdlListarConsultarProducto();

        return $Producto;
    }
}
