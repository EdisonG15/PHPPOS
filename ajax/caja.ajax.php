<?php
require_once "../Controllers/caja.controllers.php";
require_once "../Models/caja.models.php";


class ajax{

    //esta variable son para almasenal lo que envia
  public $id;
  public $numerocaja;
  public $nombre;
  public $folio;
  public $estado;


 // Mostar categoria 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function Mostrar(){

  $respuesta = Controllers::ctrMostrar();

      echo json_encode($respuesta);
  }
  public function registrar(){
      
      $respuesta = Controllers::ctrRegistrar($this->numerocaja,$this->nombre,$this->folio);
  
      echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
      }


  public function ajaxActualizar($data){


  $table = "cajas";
  $id = $_POST["id"];
  $nameId = "id_caja";

  $respuesta = Controllers::ctrActualizar($table, $data, $id, $nameId);

  echo json_encode($respuesta);
  }
  public function ajaxEliminar($data){


      $table = "cajas";
      $id = $_POST["id"];
      $nameId = "id_caja";
  
      $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
  
      echo json_encode($respuesta);
      }
    

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

      $respuesta = new ajax();
       $respuesta -> Mostrar();
      
      
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

  
  
          $insertar = new ajax();
          $insertar->numerocaja = $_POST["numerocaja"];
          $insertar->nombre = $_POST["nombre"];
          $insertar->folio = $_POST["folio"];
          $insertar->registrar();
          

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL


      $actualizar = new ajax();
   
  
      $data = array(
        "numero_caja" => $_POST["numerocaja"],
          "nombre_caja" => $_POST["nombre"],
          "folio" => $_POST["folio"],    
      );
      $actualizar -> ajaxActualizar($data);
   
      
  }else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ELIMINAR UN ROL

    date_default_timezone_set('America/Guayaquil'); 
    $fecha = date('Y-m-d h:i:s ', time());

      $eliminar = new ajax();
      $data = array(
          "fecha_eliminacion" => $fecha ,
          "estado" => 0 ,
         
      );
      $eliminar -> ajaxEliminar($data);


  }