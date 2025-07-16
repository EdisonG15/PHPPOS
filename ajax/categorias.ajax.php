<?php 

require_once "../Controllers/categorias.controllers.php";
require_once "../Models/categorias.models.php";

class AjaxCategorias {

    public $id;
    public $categoria;
    public $estado;
    public $id_categoria;
    public $verificaExiste;

    public function mostrarCategorias() {
        $respuesta = ControllersCategorias::ctrMostrarCategorias();
        echo json_encode($respuesta);
    }

    public function guardar() {
        $respuesta = ControllersCategorias::ctrGuardar($this->id_categoria, $this->categoria, $this->estado);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminar() {
        $respuesta = ControllersCategorias::ctrEliminar($this->id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

}

// ==================== LÓGICA DE RUTEO SEGÚN "accion" ====================

if (isset($_POST['accion'])) {
    
    $accion = intval($_POST['accion']);
    $ajax = new AjaxCategorias();

    switch ($accion) {

        case 1: // Mostrar categorías
            $ajax->mostrarCategorias();
            break;

        case 2: // Guardar nueva categoría
            $ajax->id_categoria = $_POST["idCategoria"] ?? null;
            $ajax->categoria = $_POST["categoria"] ?? null;
            $ajax->estado = $_POST["estado"] ?? null;
            $ajax->guardar();
            break;

        case 3: // Eliminar categoría
            $ajax->id = $_POST["id"] ?? null;
            $ajax->eliminar();
            break;


        default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
    }
}
