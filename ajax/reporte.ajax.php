<?php

require_once "../Controllers/reporte.controllers.php";
require_once "../Models/reportes.models.php";
class ajax{

public function Mostrar_reportes_ganacias($opcion,$fechaDesde, $fechaHasta){

$respuesta = Controllers::ctrMostrar_reportes_ganacias($opcion,$fechaDesde, $fechaHasta);

    echo json_encode($respuesta);
}

public function Mostrar_producto_poco_stock($opcion){

    $respuesta = Controllers::ctrMostrar_producto_poco_stock($opcion);
    
        echo json_encode($respuesta);
    }

    public function Mostrar_producto_mas_vendido($opcion){

        $respuesta = Controllers::ctrMostrar_producto_mas_vendido($opcion);
        
            echo json_encode($respuesta);
        }


        
        public function Mostrar_reportes_ventas_hoy($opcion){

            $respuesta = Controllers::ctrMostrar_reportes_ventas_hoy($opcion);
            
                echo json_encode($respuesta);
            }
    
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

    $respuesta = new ajax();
     $respuesta -> Mostrar_producto_poco_stock($_POST["accion"]);
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

    $respuesta = new ajax();
    $respuesta -> Mostrar_producto_mas_vendido($_POST["accion"]);

       
        

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL

    $respuesta = new ajax();
     $respuesta -> Mostrar_reportes_ganacias($_POST["accion"],$_POST["fechaDesde"],$_POST["fechaHasta"]);
}
else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL

    $respuesta = new ajax();
     $respuesta -> Mostrar_reportes_ventas_hoy($_POST["accion"]);
}