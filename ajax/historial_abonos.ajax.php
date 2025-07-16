<?php
require_once "../Controllers/historial_abonos.controllers.php";
require_once "../Models/historial_abonos.models.php";


class ajax{

    //esta variable son para almasenal lo que envia
  


 // Mostar categoria 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function Mostrar(){

  $respuesta = Controllers::ctrMostrar();

      echo json_encode($respuesta);
  }
  public function MostrarProveedor(){

    $respuesta = Controllers::ctrMostrarProveedor();
  
        echo json_encode($respuesta);
    }

    public function ajaxListarHistorialClientes($fechaDesde, $fechaHasta,  $id_cliente){

        $ventas = Controllers::ctrListarHistorialClientes($fechaDesde, $fechaHasta,$id_cliente);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

    

    public function ajaxExiteCreditoVigente( $id_cliente){

        $ventas = Controllers::ctrExiteCreditoVigente($id_cliente);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }
    
    public function ajaxListarHistorialProveedor($fechaDesde, $fechaHasta,  $id_proveedor){

        $ventas = Controllers::ctrListarHistorialProveedor($fechaDesde, $fechaHasta, $id_proveedor);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

    $respuesta = new ajax();
     $respuesta -> Mostrar();
    
    
}if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para listar ROL

    $respuesta = new ajax();
     $respuesta -> MostrarProveedor();
    
    
}else if(isset($_POST["accion"]) && $_POST["accion"] == 3 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
    //     echo json_encode($_POST["fechaDesde"]);
    //  echo json_encode($_POST["fechaHasta"]);
        $ventas = new ajax();
        $ventas -> ajaxListarHistorialClientes($_POST["fechaDesde"],$_POST["fechaHasta"],$_POST["id_cliente"] );
    
}else if(isset($_POST["accion"]) && $_POST["accion"] == 4 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
        //     echo json_encode($_POST["fechaDesde"]);
        //  echo json_encode($_POST["fechaHasta"]);
            $ventas = new ajax();
            $ventas -> ajaxListarHistorialProveedor($_POST["fechaDesde"],$_POST["fechaHasta"],$_POST["id_proveedor"] );
        
 }else if(isset($_POST["accion"]) && $_POST["accion"] == 5 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
            //     echo json_encode($_POST["fechaDesde"]);
            //  echo json_encode($_POST["fechaHasta"]);
                $ventas = new ajax();
                $ventas -> ajaxExiteCreditoVigente($_POST["id_cliente"] );

 }