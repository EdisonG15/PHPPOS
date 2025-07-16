<?php 

require_once "../Controllers/marca.controllers.php";
require_once "../Models/marca.models.php";
class AjaxMarca{

	public function Mostrar(){

	$respuesta = Controllers::ctrMostrar();

		echo json_encode($respuesta);
	}
	public function registrar(){
		
		$respuesta = Controllers::ctrRegistrar($_POST["Idmarca"],$_POST["nombre"]);
	
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
		}

    public function ajaxEliminar($data){

		$table = "marca";
		$id = $_POST["Idmarca"];
		$nameId = "id_marca";
    
        $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
    
        echo json_encode($respuesta);
        }
	  
}

// Controlador de acciones AJAX
if (isset($_POST['accion'])) {
    $ajax = new AjaxMarca();

    switch ($_POST['accion']) {
        case 1: // Listar
            $ajax->mostrar();
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




	