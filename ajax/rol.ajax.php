<?php
require_once "../Controllers/rol.controllers.php";
require_once "../Models/rol.models.php";
class ajaxRol{
    public $IdRol;
    public $Descripcion;
    public $Estado;

    public function ajaxListarRol(){
    
        $rol = RolControlador::ctrListarRol();
    
        echo json_encode($rol);
    
    }
    public function ajaxRegistrarRol(){
        
        $rol = RolControlador::ctrRegistrarRol($this->Descripcion, $this->Estado);

        echo json_encode($rol);
    }

    public function ajaxActualizarRol($data){


    $table = "perfiles";
    $id = $_POST["IdRol"];
    $nameId = "id_perfil";

    $respuesta = RolControlador::ctrActualizarRol($table, $data, $id, $nameId);

    echo json_encode($respuesta);
    }
    public function ajaxEliminarRol($data){


        $table = "perfiles";
        $id = $_POST["IdRol"];
        $nameId = "id_perfil";
    
        $respuesta = RolControlador::ctrEliminarRol($table, $data, $id, $nameId);
    
        echo json_encode($respuesta);
        }
   
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

    $rol = new ajaxRol();
    $rol -> ajaxListarRol();
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

    $registrarRol = new ajaxRol();
    $registrarRol -> Descripcion = $_POST["Descripcion"];
    $registrarRol -> Estado = $_POST["Estado"];

    $registrarRol -> ajaxRegistrarRol();
 
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL
 
   
    $actualizarRol = new ajaxRol();
    date_default_timezone_set('America/Guayaquil'); 
    $fecha = date('Y-m-d h:i:s ', time());

    $data = array(
        "descripcion" => $_POST["Descripcion"],
        "fecha_actualizacion" =>  $fecha,
        "estado" => $_POST["Estado"],
        
       
    );
    $actualizarRol -> ajaxActualizarRol($data);
 
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ELIMINAR UN ROL
 
   
    $eliminarRol = new ajaxRol();
 

    $data = array(
        "estado" => $_POST["Estado"],
       
    );
    $eliminarRol -> ajaxEliminarRol($data);
 
    
}






// else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL
 
   
//     $actualizarRol = new ajaxRol();
//     $actualizarRol->IdRol  = $_POST["IdRol"];
//     $actualizarRol->Descripcion = $_POST["Descripcion"];
//     $actualizarRol->Estado = $_POST["Estado"];
//     $actualizarRol -> ajaxActualizarRol();
 
    
// }