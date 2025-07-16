<?php

require_once "../Controllers/realizar_compras.controllers.php";
require_once "../Models/realizar_compras.models.php";


class AjaxRealizarCompras{
public $codigo_producto;
 
    public function ajaxGetDatosProductoCompras(){
        
        $productoss = RealizarComprasControlador::ctrGetDatosProductoCompras($this->codigo_producto);

        // echo json_encode($productoss);
    }

    
    public function ajaxRegistrarCompras($datos,$id_caja,$afectarCaja,$abono,$restante,$TipoDocumento, $fechaCompra,$fechaVencimiento,$NumeroFactura,
         $IdProveedor,$Tipo_pago, $iva,$subtotalcosto,$TotalCosto,$Nro_compras,$Nro_credito_compras){

        $registroCompras = RealizarComprasControlador::ctrRegistrarCompras($datos,$id_caja,$afectarCaja,$abono,$restante,$TipoDocumento, 
        $fechaCompra,$fechaVencimiento,$NumeroFactura,$IdProveedor,$Tipo_pago, $iva,$subtotalcosto,$TotalCosto,$Nro_compras,$Nro_credito_compras);
       echo json_encode($registroCompras,JSON_UNESCAPED_UNICODE);

    }

    public function ajaxListarCompras($fechaDesde, $fechaHasta){

      $resultado = RealizarComprasControlador::ctrListarCompras($fechaDesde, $fechaHasta);  

      echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
    }

    public function ajaxValidarProductoParaEliminar($nroBoleta){

      $resvalidar = RealizarComprasControlador::ctrValidarProductoParaEliminar($nroBoleta);
       echo json_encode($resvalidar,JSON_UNESCAPED_UNICODE);

    }

    public function ajaxValidarProductoParaEliminarVentas($nroBoleta,$p_opcion,$id_usuario){

       $resvalidar = RealizarComprasControlador::ctrValidarProductoParaEliminarVentas($nroBoleta,$p_opcion,$id_usuario);
      echo json_encode($resvalidar,JSON_UNESCAPED_UNICODE);

    }


    public function ajaxEliminarCompras($idEliminar){
       $respuesta = RealizarComprasControlador::ctrEliminarCompras($idEliminar);  

       echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

     }

    public function ajaxValidarClienteTieneAbono($nroBoleta){
        $respuesta = RealizarComprasControlador::ctrValidarClienteTieneAbono($nroBoleta);  

        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

    }

}

if (isset($_POST['accion'])) {
  $ajax = new AjaxRealizarCompras();

  switch ($_POST['accion']) {
      case 1: // OBTENER DATOS DE UN PRODUCTO POR SU CÓDIGO
          $ajax->codigo_producto = $_POST['codigo_barra'];
          $ajax->ajaxGetDatosProductoCompras();
          break;

      case 2: // LISTADO DE COMPRAS POR RANGO DE FECHAS
          $ajax->ajaxListarCompras($_POST['fechaDesde'], $_POST['fechaHasta']);
          break;

      case 3: // ELIMINAR COMPRA
          $ajax->ajaxEliminarCompras($_POST['idEliminar']);
          break;

      case 4: // VALIDAR PRODUCTO PARA ELIMINAR
          $ajax->ajaxValidarProductoParaEliminar($_POST['nroBoleta']);
          break;

      case 5: // VALIDAR PRODUCTO PARA ELIMINAR EN VENTAS
          $ajax->ajaxValidarProductoParaEliminarVentas(
              $_POST['nroBoleta'], 
              $_POST['p_opcion'], 
              $_POST['id_usuario']
          );
          break;

      case 6: // VALIDAR SI CLIENTE TIENE ABONO
          $ajax->ajaxValidarClienteTieneAbono($_POST['nroBoleta']);
          break;
  }
} elseif (isset($_POST['arr'])) {
  $registrar = new AjaxRealizarCompras();
  $registrar->ajaxRegistrarCompras(
      $_POST['arr'],
      $_POST['id_caja'],
      $_POST['afectarCaja'],
      $_POST['abono'],
      $_POST['restante'],
      $_POST['TipoDocumento'],
      $_POST['fechaCompra'],
      $_POST['fechaVencimiento'],
      $_POST['NumeroFactura'],
      $_POST['IdProveedor'],
      $_POST['Tipo_pago'],
      $_POST['iva'],
      $_POST['subtotalcosto'],
      $_POST['TotalCosto'],
      $_POST['Nro_compras'],
      $_POST['Nro_credito_compras']
  );
}


