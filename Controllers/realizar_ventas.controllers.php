<?php

class VentasControlador{

    static public function ctrObtenerNroBoleta(){
        
        $nroBoleta = VentasModelo::mdlObtenerNroBoleta();

        return $nroBoleta;

    }

    static public function ctrRegistrarVenta($datos,$Id_caja,$IdCliente,$nro_boleta,$tipo_pago,
    $TipoDocumento, $descripcion_venta, $CantidadProducto,$CantidadTotal, $iva,
    $subtotal,$total_venta,$ImporteRecibido,$ImporteCambio,$nro_credito_venta,$fechaVencimiento){
        
        $productos = VentasModelo::mdlRegistrarVenta($datos,$Id_caja,$IdCliente,$nro_boleta,$tipo_pago,
        $TipoDocumento, $descripcion_venta, $CantidadProducto,$CantidadTotal, $iva,
        $subtotal,$total_venta,$ImporteRecibido,$ImporteCambio,$nro_credito_venta,$fechaVencimiento);

        return $productos;

    }
    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = VentasModelo::mdlListarVentas($fechaDesde,$fechaHasta);

        return $ventas;
    }

    static public function ctrObtenerDetalleVenta($nro_boleta)
    {
        $detalle_venta = VentasModelo::mdlObtenerDetalleVenta($nro_boleta);

        return $detalle_venta;
    }

    static public function ctrObtenerDetalleFacturaVentas($nro_boleta,$opcion)
    {
        $detalle_factrura_venta = VentasModelo:: mdlObtenerDetalleFacturaVentas($nro_boleta,$opcion);

        return $detalle_factrura_venta;
    }

   

    static public function ctrObtenerDatosDelaEmpresa()
    {
        $empresa = VentasModelo::mdlObtenerDatosDelaEmpresa();

        return $empresa;
    }
    
    static public function ctrEliminarVentas($nroBoleta,$id_usuario)
    {
        $respuesta = VentasModelo::mdlEliminarVentas($nroBoleta,$id_usuario);

        return $respuesta;
    }
    
}
