<?php

class RealizarComprasControlador{
   static public function ctrGetDatosProductoCompras($codigo_producto){
    
       $productos = RealizarComprasModelo::mdlGetDatosProductoCompras($codigo_producto);
       echo json_encode($productos);
       return $productos;

   }

    static public function ctrRegistrarCompras($datos,$id_caja,$afectarCaja,$abono,$restante,$TipoDocumento, 
       $fechaCompra,$fechaVencimiento,$NumeroFactura,
       $IdProveedor,$Tipo_pago, $iva,$subtotalcosto,$TotalCosto,$Nro_compras,$Nro_credito_compras){
        
        $productos = RealizarComprasModelo::mdlRegistrarCompras($datos,$id_caja,$afectarCaja,$abono,$restante,$TipoDocumento, 
         $fechaCompra,$fechaVencimiento,$NumeroFactura,
        $IdProveedor,$Tipo_pago, $iva,$subtotalcosto,$TotalCosto,$Nro_compras,$Nro_credito_compras);
 
         return $productos;
    }

    static public function ctrListarCompras($fechaDesde, $fechaHasta){

         $resultado = RealizarComprasModelo::mdlListarCompras($fechaDesde,$fechaHasta);

          return $resultado;
    }

    static public function ctrValidarProductoParaEliminar($nroBoleta){

         $resultado = RealizarComprasModelo::mdlValidarProductoParaEliminar($nroBoleta);

        return $resultado;
    }

    static public function ctrValidarProductoParaEliminarVentas($nroBoleta,$p_opcion,$id_usuario){

        $resultado = RealizarComprasModelo::mdlValidarProductoParaEliminarVentas($nroBoleta,$p_opcion,$id_usuario);

        return $resultado;
    }

    static public function ctrValidarClienteTieneAbono($nroBoleta){

       $resultado = RealizarComprasModelo::mdlValidarClienteTieneAbono($nroBoleta);

        return $resultado;
   }

    static public function ctrEliminarCompras($idEliminar)
      {
       $detalle_compras = RealizarComprasModelo::mdlEliminarCompras($idEliminar);

       return $detalle_compras;
    }
   
}

