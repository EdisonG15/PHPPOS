<?php

class Controllers {


    static public function ctrKardexPromedioPonderados($fechaDesde, $fechaHasta, $codigo_barra){

        $respuesta = Models::mdlKardexPromedioPonderado($fechaDesde,$fechaHasta, $codigo_barra);

        return $respuesta;
    }


}