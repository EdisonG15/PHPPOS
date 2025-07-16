<?php
require_once "../Controllers/administrar_ventas.controllers.php";
require_once "../Models/administrar_ventas.models.php";
class Ajax{

  
     public function ajaxListarVentas($fechaDesde, $fechaHasta){

      $resultado = controllers::ctrListarVentas($fechaDesde, $fechaHasta);  

      echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
    }

    public function ajaxEliminarVenta($idEliminar){
       $respuesta = controllers::ctrEliminarVenta($idEliminar);  

       echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

    }

}


  if (isset($_POST['accion'])) {
  $ajax = new Ajax();

  switch ($_POST['accion']) {
      case 1: // LISTADO DE Ventas POR RANGO DE FECHAS
          $ajax->ajaxListarVentas($_POST['fechaDesde'], $_POST['fechaHasta']);
          break;
     case 2: // LISTADO DE Ventas POR RANGO DE FECHAS
          $ajax->ajaxEliminarVenta($_POST['idEliminar']);
          break;

       default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
  }
}