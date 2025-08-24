<?php
require_once "../Controllers/administrar_creditos.controllers.php";
require_once "../Models/administrar_creditos.models.php";

class Ajax {
  
    public function MostrarCredito(){

        echo json_encode(Controllers::ctrMostrarCredito( $_POST["filtro"], $_POST["filtroEstado"], 
                                                         $_POST["fechaInicio"], $_POST["fechaFin"]));
    }

    public function mostrar() {
        echo json_encode(Controllers::ctrMostrar());
    }

    public function mostrarFinalizado() {
        echo json_encode(Controllers::ctrMostrarFinalizado());
    }

    public function ObtenerCredito() {
        echo json_encode(Controllers::ctrObtenerCredito($_POST["id_cliente"]));
    }

    public function registrar() {
        $respuesta = Controllers::ctrRegistrar(
              $_POST["id_caja"] ?? null,
              $_POST["IdCliente"] ?? null,
              $_POST["id_venta_credito"] ?? null,
              $_POST["abono"] ?? null,
              $_POST["observacion"] ?? null,
              $_POST["metodo_pago"] ?? null,
              $_POST["tipoAbono"] ?? null      
        );
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

      public function HistorialAbonoCredito() {
        $respuesta = Controllers::ctrHistorialAbonoCredito(
              $_POST["id_credito"] ?? null
                
        );
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function EliminarAbono(){

    $respuesta = Controllers::ctrEliminarAbono($_POST['id_abono'] );
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }
}

// Verificación principal
if (isset($_POST['accion'])) {
    $ajax = new Ajax();

    switch ($_POST['accion']) {
        case 1:
            $ajax->MostrarCredito();
            break;

        case 2:
            $ajax->registrar();
            break;
        case 3:
            $ajax->ObtenerCredito();
            break;
        case 4:
            $ajax->HistorialAbonoCredito();
            break;
        case 5:
            $ajax->EliminarAbono();
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
    }
}

