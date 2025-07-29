<?php

require_once "../Controllers/productos.controllers.php";
require_once "../Models/productos.models.php";
class AjaxProductos{

    public function ajaxListarProductos(){
    
        $productos = ProductosControlador::ctrListarProductos();
    
        echo json_encode($productos);
    
    }
    
    public function Guardar(){
    
          // Recopila todos los datos POST, incluida la información del archivo
        $data_to_save = $_POST; // Esto contendrá todos los campos de texto
        $file_to_upload = null;

        // Verifica si se cargó un archivo
        if (isset($_FILES['logo_file']) && $_FILES['logo_file']['error'] === UPLOAD_ERR_OK) {
            $file_to_upload = $_FILES['logo_file'];
        }

        $respuesta = ProductosControlador::ctrGuardar($data_to_save, $file_to_upload);
           echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                   
    }
    
    public function ajaxEliminarProducto(){

            $respuesta = ProductosControlador::ctrEliminar($_POST["id_producto"]);
            echo json_encode($respuesta);
        
    }

    public function ajaxAumentarStock(){

        $respuesta = ProductosControlador::ctrAumentarStock($_POST["id_producto"], $_POST["codigo_producto"],$_POST["comentario"],
        $_POST["nuevo_stock"],$_POST["cantidad"],$_POST["precio_compra"],$_POST["tipo_operacion"],$_POST["fechaVencimientoAun"]);

        echo json_encode($respuesta);

    }

    public function ajaxDisminuirStock(){

        $respuesta = ProductosControlador::ctrDisminuirStock($_POST["id_producto"], $_POST["codigo_producto"],$_POST["comentario"],
        $_POST["nuevo_stock"],$_POST["cantidad"],$_POST["precio_compra"],$_POST["tipo_operacion"],$_POST["fechaVencimientoAun"]
        ,$_POST["nuevaFechaVencimientoAun"],$_POST["precioCosto"]);

        echo json_encode($respuesta);
    }

    public function ajaxListarNombreProductos(){
 
        $NombreProductos = ProductosControlador::ctrListarNombreProductos($_POST["opcion"], $_POST["busqueda"]);

        echo json_encode($NombreProductos);
    }

    public function ajaxGetDatosProducto(){
        
        $producto = ProductosControlador::ctrGetDatosProducto( $_POST["codigo_producto"]);

       echo json_encode($producto);
    }

    public function ajaxGetDatosProductoCompras(){
        
        $producto = ProductosControlador::ctrGetDatosProductoCompras( $_POST["codigo_producto"]);

       echo json_encode($producto);
    }
   
    public function ajaxVerificaStockProducto(){

        $respuesta = ProductosControlador::ctrVerificaStockProducto( $_POST["codigo_producto"],$_POST["cantidad"]);
   
       echo json_encode($respuesta);
   }
   
    public function ajaxListarConsulatarProducto(){
    
          $respuesta = ProductosControlador::ctrListarConsultarProducto();

           echo json_encode($respuesta);

    }

    
    public function ajaxListaPrecioProductos(){
    
        $productos = ProductosControlador::ctrListaPrecioProductos($_POST["id_producto"]);
    
        echo json_encode($productos);
    
    }

}
$accion = isset($_POST['accion']) ? (int)$_POST['accion'] : 0;

if ($accion <= 0) {
    exit('Acción inválida');
}

$ajax = new AjaxProductos();

switch ($accion) {

    case 1: // Listar productos
        $ajax->ajaxListarProductos();
        break;

    case 2: // Registrar producto
        

        $ajax->Guardar();
        break;

    case 3: // Actualizar stock
        $_POST['tipo_movimiento'] == 1
            ? $ajax->ajaxAumentarStock()
            : $ajax->ajaxDisminuirStock();
        break;

    case 5: // Eliminar producto
        $ajax->ajaxEliminarProducto();
        break;

    case 6: // Autocomplete productos
   
        $ajax->ajaxListarNombreProductos();
        break;

    case 7: // Obtener producto por código
       
        $ajax->ajaxGetDatosProducto();
        break;

    case 8: // Verificar stock producto
       
        $ajax->ajaxVerificaStockProducto();
        break;
    case 9: // Verificar stock producto
    
        $ajax->ajaxListaPrecioProductos();
        break;
    case 10: // Listar consulta productos
        $ajax->ajaxListarConsulatarProducto();
        break;

    case 11: // Obtener producto para compras
     
        $ajax->ajaxGetDatosProductoCompras();
        break;

    default:
        exit('Acción no reconocida');
}



