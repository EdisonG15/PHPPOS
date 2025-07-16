<?php


class LoteController{
    
    static public function ctrListarLote($CodigoBarra,$EstadoLote,$VisualizacionLote,$fechaDesde,$fechaHasta){
    
        $clientes = LoteModel::mdlListarLote($CodigoBarra,$EstadoLote,$VisualizacionLote,$fechaDesde,$fechaHasta);
      
        return $clientes;

    }

}