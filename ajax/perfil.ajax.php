<?php

require_once "../Controllers/perfil.controlador.php";
require_once "../Models/perfil.modelo.php";

class AjaxPerfiles{

    public $IdRol;
    public $Descripcion;
    public $Estado;

    public function ajaxListarRol(){
        
        $rol = PerfilControlador::ctrListarRol();
    
        echo json_encode($rol);
    
    }
    public function ajaxRegistrarRol(){
        
        $rol = PerfilControlador::ctrRegistrarRol($this->Descripcion, $this->Estado);

        echo json_encode($rol);
    }

    public function ajaxActualizarRol($data){


    $table = "rol";
    $id = $_POST["IdRol"];
    $nameId = "IdRol";

    $respuesta = PerfilControlador::ctrActualizarRol($table, $data, $id, $nameId);

    echo json_encode($respuesta);
    }
    public function ajaxEliminarRol($data){


        $table = "rol";
        $id = $_POST["IdRol"];
        $nameId = "IdRol";
    
        $respuesta = PerfilControlador::ctrEliminarRol($table, $data, $id, $nameId);
    
        echo json_encode($respuesta);
        }
   
/*  INICIO */ 

    public function ajaxObtenerPerfiles(){

        $perfiles = PerfilControlador::ctrObtenerPerfiles();

        echo json_encode($perfiles);
    }
   
    /* FIN */
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){

    $perfiles = new AjaxPerfiles;    
    $perfiles->ajaxObtenerPerfiles();

}


if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para listar ROL

    $rol = new ajaxRol();
    $rol -> ajaxListarRol();
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // parametro para registrar ROL

    $registrarRol = new ajaxRol();
    $registrarRol -> Descripcion = $_POST["Descripcion"];
    $registrarRol -> Estado = $_POST["Estado"];

    $registrarRol -> ajaxRegistrarRol();
 
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL
 
   
    $actualizarRol = new ajaxRol();
    date_default_timezone_set('America/Guayaquil'); 
    $fecha = date('Y-m-d h:i:s a', time());

    $data = array(
        "descripcion" => $_POST["Descripcion"],
        "fecha_actualizacion" =>  $fecha,
        "activo" => $_POST["Estado"],
        
       
    );
    $actualizarRol -> ajaxActualizarRol($data);
 
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 5){ // ACCION PARA ELIMINAR UN ROL
 
   
    $eliminarRol = new ajaxRol();
 

    $data = array(
        "Activo" => $_POST["Estado"],
       
    );
    $eliminarRol -> ajaxEliminarRol($data);
 
    
}
