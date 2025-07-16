<?php
require_once "../Controllers/usuario.controllers.php";
require_once "../Models/usuario.models.php";
class Ajax{
public function Mostrar(){

	$respuesta = Controllers::ctrMostrar();

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
        $respuesta = Controllers::ctrRegistrar($data_to_save, $file_to_upload);

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		
		// $respuesta = Controllers::ctrRegistrar($_POST["Idmarca"],$_POST["nombre"]);
	
		// echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
		}

    public function ajaxEliminar($data){

		$table = "usuarios";
		$id = $_POST["IdUsuario"];
		$nameId = "id_usuario";
    
        $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
    
        echo json_encode($respuesta);
        }

}
    // Controlador de acciones AJAX
if (isset($_POST['accion'])) {
    $ajax = new Ajax();

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

//     public $IdUsuario;
    
//     public $Cedula;
//     public $Nombres;
//     public $Apellidos;
//     public $Direccion;
//     public $Correo;
//     public $Usuario;
//     public $Clave;
//     public $IdRol;
//     public $IdCaja;
//     public $Telefono;
//     public $Activo;


//     public function ajaxListarUsuarios(){
    
//         $usuarios = UsuariosControlador::ctrListarUsuarios();
    
//         echo json_encode($usuarios);
    
//     }
//     public function ajaxRegistrarUsuarios(){
        
//         $usuarios = UsuariosControlador::ctrRegistrarUsuarios($this->Cedula ,$this->Nombres, $this->Apellidos, $this-> Telefono,$this->Direccion, $this->Correo, $this->Usuario, $this-> Clave,$this->IdRol, $this->IdCaja,$this->Activo);

//         echo json_encode($usuarios);
//     }

//     public function ajaxActualizarUsuarios($data){


//     $table = "usuarios";
//     $id = $_POST["IdUsuario"];
//     $nameId = "id_usuario";

//     $respuesta = UsuariosControlador::ctrActualizarUsuarios($table, $data, $id, $nameId);

//     echo json_encode($respuesta);
//     }
//     public function ajaxEliminarUsuarios($data){


//         $table = "usuarios";
//         $id = $_POST["IdUsuario"];
//         $nameId = "id_usuario";
        
//         $respuesta = UsuariosControlador::ctrEliminarUsuarios($table, $data, $id, $nameId);
    
//         echo json_encode($respuesta);
//         }
//         public function ajaxVerificaSiExiste(){

// 			$respuesta = UsuariosControlador::ctrVerificaSiExiste($this->VerificaExiste,$this->VerificaExiste1);
            
// 			// $respuesta = UsuariosControlador::ctrVerificaSiExiste($this->VerificaExiste);
		
// 		   echo json_encode($respuesta);
// 		}



    
// }


// if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar Usuarios

//     $usuarios = new ajaxUsuarios();
//     $usuarios -> ajaxListarUsuarios();
    
// }else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL
//      $contrasena=$_POST["Clave"];
//      $contrasena=hash('sha512',$contrasena);
//     $registrarUsuarios = new ajaxUsuarios();
//     $registrarUsuarios -> Cedula = $_POST["Cedula"];
//     $registrarUsuarios -> Nombres = $_POST["Nombre"];
//     $registrarUsuarios -> Apellidos = $_POST["Apellido"];
//     $registrarUsuarios -> Telefono = $_POST["Telefono"];
    
//     $registrarUsuarios -> Direccion = $_POST["Direccion"];
//     $registrarUsuarios -> Correo = $_POST["Correo"];
//     $registrarUsuarios -> Usuario = $_POST["Usuario"];
//     $registrarUsuarios -> Clave = $contrasena;
//     $registrarUsuarios -> IdRol = $_POST["IdRol"];
//     $registrarUsuarios -> IdCaja = $_POST["IdCaja"];
    
//     $registrarUsuarios -> Activo = $_POST["Estado"];

  
//     $registrarUsuarios -> ajaxRegistrarUsuarios();
 
    
// }else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL
//     $contrasena=$_POST["Clave"];
//     $contrasena=hash('sha512',$contrasena);
   
//     $actualizarUsuarios = new ajaxUsuarios();
 

//     $data = array(
    
//         "cedula" => $_POST["Cedula"],
//         "nombre_usuario" => $_POST["Nombre"],
//         "apellido_usuario" =>$_POST["Apellido"],
//         "telefono" => $_POST["Telefono"],
//         "direccion" => $_POST["Direccion"],
//         "email" => $_POST["Correo"],
//         "usuario" => $_POST["Usuario"],
//         "clave" => $contrasena,
//         "id_perfil_usuario" => $_POST["IdRol"],
//         "id_caja" => $_POST["IdCaja"],
        
//         "estado" => $_POST["Estado"],
       
//     );
//     $actualizarUsuarios -> ajaxActualizarUsuarios($data);
   
    
// }else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ELIMINAR UN ROL
 
   
//     $eliminarUsuarios = new ajaxUsuarios();
 

//     $data = array(
//         "estado" => $_POST["Estado"],
       
//     );
//     $eliminarUsuarios -> ajaxEliminarUsuarios($data);
 
    
// }else if(isset($_POST["accion"]) && $_POST["accion"] == 5){ // VERIFICAR si exixtes

//     $verificaSiExiste = new ajaxUsuarios();

//     $verificaSiExiste -> VerificaExiste = $_POST["VerificaExiste"];
//     $verificaSiExiste -> VerificaExiste1 = $_POST["VerificaExiste1"];
    
//     $verificaSiExiste -> ajaxVerificaSiExiste();







// }
