<?php 

require_once "../Controllers/kardex.controllers.php";
require_once "../Models/kardex.models.php";
class ajax{


    public function ajaxKardexPromedioPonderado($fechaDesde, $fechaHasta,  $codigo_barra){

        $ventas = Controllers::ctrKardexPromedioPonderados($fechaDesde, $fechaHasta,$codigo_barra);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }
    

}


if(isset($_POST["accion"]) && $_POST["accion"] == 1){ // LISTADO DE VENTAS POR RANGO DE FECHAS
    //     echo json_encode($_POST["fechaDesde"]);
    //  echo json_encode($_POST["fechaHasta"]);
        $ventas = new ajax();
        
    
        $ventas -> ajaxKardexPromedioPonderado($_POST["fechaDesde"],$_POST["fechaHasta"],$_POST["codigo_barra"] );
    
}