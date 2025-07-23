<?php

require_once "../Controllers/reporte.controllers.php";
require_once "../Models/reportes.models.php";
class ajax{

public function Mostrar_reportes_ganacias(){
                                                            
  $respuesta = Controllers::ctrMostrar_reportes_ganacias($_POST["accion"],$_POST["fechaInicio"],$_POST["fechaFin"]);

    echo json_encode($respuesta);
}

    
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

    $respuesta = new ajax();
       $opcion = $_POST["accion"];
      $respuesta = Controllers::ctrMostrar_producto_poco_stock($opcion);
      echo json_encode($respuesta);

    
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

    $respuesta = new ajax();
    $opcion = $_POST["accion"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
     $respuesta = Controllers::ctrMostrar_producto_mas_vendido($opcion, $fechaInicio, $fechaFin);  

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL

    $respuesta = new ajax();
    $opcion = $_POST["accion"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

    $respuesta = Controllers::ctrMostrar_reportes_ganacias($opcion, $fechaInicio, $fechaFin);
    echo json_encode($respuesta);
}
else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL

    $respuesta = new ajax();
      $opcion = $_POST["accion"];
      $respuesta = Controllers::ctrMostrar_reportes_ventas_hoy($opcion);
      echo json_encode($respuesta);

}