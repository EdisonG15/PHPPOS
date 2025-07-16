<?php

class controllers{

    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = Models::mdlListarVentas($fechaDesde,$fechaHasta);

        return $ventas;
    }
    
     static public function ctrEliminarVenta($idEliminar)
      {
       $resultado = Models::mdlEliminarVenta($idEliminar);

       return $resultado;
    }
}