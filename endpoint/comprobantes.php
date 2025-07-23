<?php
require_once "../Models/comprobate_models.php";

class Comprobate {
    public function ListarComprobante() {
        $fechaInicio = $_POST["fechaInicio"] ?? null;
        $fechaFin = $_POST["fechaFin"] ?? null;

        echo json_encode(Models::mdlListarComprobante($fechaInicio, $fechaFin));
    }
}

// Verificación principal
if (isset($_POST['accion'])) {
    $ajax = new Comprobate();

    switch ($_POST['accion']) {
        case 1:
            $ajax->ListarComprobante();
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
    }
}


  