<?php
require_once "../Controllers/perecederos.controllers.php";
require_once "../Models/perecederos.models.php";


class ajax{

  public $id;
  public $nombre;
  public $estado;

    public function Mostrar(){

        $respuesta = Controllers::ctrMostrar();

          echo json_encode($respuesta);
    }

    public function registrar(){
      
         $respuesta = Controllers::ctrRegistrar($this->nombre, $this->estado);
  
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }

    public function ajaxActualizar($data){

  $table = "marca";
  $id = $_POST["id"];
  $nameId = "id_marca";

  $respuesta = Controllers::ctrActualizar($table, $data, $id, $nameId);

  echo json_encode($respuesta);
  }
  public function ajaxEliminar($data){


      $table = "marca";
      $id = $_POST["id"];
      $nameId = "id_marca";
  
      $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
  
      echo json_encode($respuesta);
      }
    

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

      $respuesta = new ajax();
       $respuesta -> Mostrar();
      
      
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

  
  
          $insertar = new ajax();
          $insertar->nombre = $_POST["nombre"];
      
          $insertar->estado = $_POST["estado"];
  
          $insertar->registrar();
          

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL

  date_default_timezone_set('America/Guayaquil'); 
  $fecha = date('Y-m-d h:i:s a', time());
      $actualizar = new ajax();
   
  
      $data = array(
      
          "nombre" => $_POST["nombre"],
          "fecha_actualizacion" => $fecha ,
          "activo" => $_POST["estado"],
          
      
         
      );
      $actualizar -> ajaxActualizar($data);
   
      
  }else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ELIMINAR UN ROL

 
      $eliminar = new ajax();
   
  
      $data = array(
          "activo" => $_POST["estado"],
         
      );
      $eliminar -> ajaxEliminar($data);


  }