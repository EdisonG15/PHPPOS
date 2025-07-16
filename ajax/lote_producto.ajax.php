<?php
require_once "../Controllers/lote_producto.controller.php";
require_once "../Models/lote_producto.model.php";

class AjaxLote {

    public function listarLote() {
        $lote = LoteController::ctrListarLote($_POST['CodigoBarra'],$_POST['EstadoLote'],$_POST['VisualizacionLote'],
        $_POST['fechaDesde'],$_POST['fechaHasta']);     
        echo json_encode($lote);
    }

}

if (isset($_POST['accion'])) {
    $ajax = new AjaxLote();
    
    switch ($_POST['accion']) {
        case 1: 
            $ajax->listarLote();
            break;

    

        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
}
