<?php
require_once "../Controllers/clientes.controllers.php";
require_once "../Models/clientes.models.php";

class AjaxClientes {

    public $IdCliente;
    public $tipo_identificacion;
    public $NumeroDocumento;
    public $Nombre;
    public $Apellido;
    public $Direccion;
    public $Telefono;
    public $Email;
    public $Activo;
    public $VerificaExiste;

    public function listarClientes() {
        $clientes = ClientesControllers::ctrListarClientes();     
        echo json_encode($clientes);
    }

    public function guardar() {
        $clientes = ClientesControllers::ctrGuardar(
            $this->IdCliente,
            $this->tipo_identificacion,
            $this->NumeroDocumento,
            $this->Nombre, 
            $this->Apellido,
            $this->Direccion,
            $this->Telefono,
            $this->Email
        );
        echo json_encode($clientes);
    }

    public function eliminarCliente() {
        $respuesta = ClientesControllers::ctrEliminar($this->IdCliente);
        echo json_encode($respuesta);
    }

    public function listarNombreClientes() {
        $clientes = ClientesControllers::ctrListarNombreClientes($_POST['busqueda']);
        echo json_encode($clientes);
    }

    public function obtenerDatosCliente() {
        $cliente = ClientesControllers::ctrGetDatosClientes($this->NumeroDocumento);
        echo json_encode($cliente);
    }

}

// Controlador AJAX centralizado
if (isset($_POST['accion'])) {
    $ajax = new AjaxClientes();
    
    switch ($_POST['accion']) {
        case 1: // Listar clientes
            $ajax->listarClientes();
            break;

        case 2: // Guardar cliente
            $ajax->IdCliente           = $_POST["IdCliente"] ?? null;
            $ajax->tipo_identificacion = $_POST["tipoIdentificacion"] ?? '';
            $ajax->NumeroDocumento     = $_POST["NumeroDocumento"] ?? '';
            $ajax->Nombre              = $_POST["Nombre"] ?? '';
            $ajax->Apellido            = $_POST["Apellido"] ?? '';
            $ajax->Direccion           = $_POST["Direccion"] ?? '';
            $ajax->Telefono            = $_POST["Telefono"] ?? '';
            $ajax->Email               = $_POST["Email"] ?? '';
            $ajax->guardar();
            break;

        case 3: // Eliminar cliente
            $ajax->IdCliente = $_POST["IdCliente"] ?? null;
            $ajax->eliminarCliente();
            break;

        case 5: // Listar nombres para autocomplete
            $ajax->listarNombreClientes();
            break;

        case 6: // Obtener datos por documento
            $ajax->NumeroDocumento = $_POST["cedula_cliente"] ?? '';
            $ajax->obtenerDatosCliente();
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
}
