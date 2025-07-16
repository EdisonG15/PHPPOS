<?php

require_once "../Controllers/medidas.controllers.php";
require_once "../Models/medidas.models.php";

class AjaxMedidas {

    public $id;
    public $idMedidas;
    public $nombre;
    public $nombre_corto;
    public $estado;
    public $verificaExiste;

    public function mostrar() {
        $respuesta = Controllers::ctrMostrar();
        echo json_encode($respuesta);
    }

    public function guardar() {
        $respuesta = Controllers::ctrGuardar($this->idMedidas, $this->nombre, $this->nombre_corto);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminar() {
        $respuesta = Controllers::ctrEliminar($this->idMedidas);
        echo json_encode($respuesta);
    }

}

// Controlador de acciones AJAX
if (isset($_POST['accion'])) {
    $ajax = new AjaxMedidas();

    switch ($_POST['accion']) {
        case 1: // Listar
            $ajax->mostrar();
            break;

        case 2: // Guardar
            $ajax->idMedidas = $_POST["idMedidas"] ?? null;
            $ajax->nombre = $_POST["nombre"] ?? '';
            $ajax->nombre_corto = $_POST["nombrecorto"] ?? '';
            $ajax->guardar();
            break;

        case 3: // Eliminar
            $ajax->idMedidas = $_POST["idMedidas"] ?? null;
            $ajax->eliminar();
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
}
