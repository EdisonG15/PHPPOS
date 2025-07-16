<?php
require_once "../Controllers/empresa.controllers.php";
require_once "../Models/empresa.models.php";
class ajaxEmpresa{
   public function mostrarEmpresas(){

	$respuesta = Controllers::ctrListarEmpresas();

		echo json_encode($respuesta);
	}
	public function registrar(){
         // Recopila todos los datos POST, incluida la información del archivo
        $data_to_save = $_POST; // Esto contendrá todos los campos de texto
        $file_to_upload = null;

        // Verifica si se cargó un archivo
        if (isset($_FILES['logo_file']) && $_FILES['logo_file']['error'] === UPLOAD_ERR_OK) {
            $file_to_upload = $_FILES['logo_file'];
        }

        // Pasa tanto los datos como la información del archivo al controlador
        $respuesta = Controllers::ctrRegistrarEmpresa($data_to_save, $file_to_upload);

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

	
		}

    public function ajaxEliminar($data){

		$table = "empresa";
		$id = $_POST["Id_Empresa"];
		$nameId = "id_empresa";
    
        $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
    
        echo json_encode($respuesta);
        }

    }

    // Controlador de acciones AJAX
if (isset($_POST['accion'])) {
    $ajax = new ajaxEmpresa();

    switch ($_POST['accion']) {
        case 1: // Listar
            $ajax->mostrarEmpresas();
            break;

        case 2: // Guardar
            $ajax->registrar();
            break;

        case 3: // Eliminar
        $data = array(
			"estado" => $_POST["estado"],
		   
		);
            $ajax->ajaxEliminar($data);
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
}
