<?php
require_once "../Controllers/proveedor.controllers.php";
require_once "../Models/proveedor.models.php";

class AjaxProveedor {
    public $IdProveedor;
    public $Ruc;
    public $Nombre;
    public $RazonSocial;
    public $Telefono;
    public $Correo;
    public $Direccion;
    public $Activo;
    public $NumeroDocumento;
 

    // Cargar datos del POST
    public function fromPost($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function ajaxListarProveedor() {
        echo json_encode(ProveedorControllers::ctrListarProveedor());
    }

    public function guardar() {
        $respuesta = ProveedorControllers::ctrGuardar(
            $this->IdProveedor,
            $this->Ruc,
            $this->Nombre,
            $this->RazonSocial,
            $this->Telefono,
            $this->Correo,
            $this->Direccion
        );
        echo json_encode($respuesta);
    }

    public function eliminar() {
        $respuesta = ProveedorControllers::ctrEliminar($this->IdProveedor);
        echo json_encode($respuesta);
    }

    public function ajaxListarNombreProveedor() {
        echo json_encode(ProveedorControllers::ctrListarNombreProveedor($_POST['busqueda']));
    }

    public function ajaxGetDatosProveedor() {
     
        echo json_encode(ProveedorControllers::ctrGetDatosProveedor($this->NumeroDocumento));
    }

 
}

// Validar que se envió 'accion'
if (isset($_POST['accion'])) {
    $accion = intval($_POST['accion']);
    $ajax = new AjaxProveedor();
    $ajax->fromPost($_POST);

    switch ($accion) {
        case 1: // Listar proveedores
            $ajax->ajaxListarProveedor();
            break;

        case 2: // Guardar proveedor
            $ajax->guardar();
            break;

        case 3: // Eliminar proveedor
            $ajax->eliminar();
            break;

        case 4: // Listar nombres para autocomplete
            $ajax->ajaxListarNombreProveedor();
            break;

        case 5: // Obtener datos por documento
            $ajax->ajaxGetDatosProveedor();
            break;

        default:
            echo json_encode(['error' => 'Acción no válida']);
            break;
    }
} else {
    echo json_encode(['error' => 'Acción no especificada']);
}
