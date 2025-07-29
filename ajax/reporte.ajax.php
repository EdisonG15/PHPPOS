<?php

require_once "../Controllers/reporte.controllers.php";
require_once "../Models/reportes.models.php";
class ajax{

public function Mostrar_reportes_ganacias(){
                                                            
  $respuesta = Controllers::ctrMostrar_reportes_ganacias($_POST["accion"],$_POST["fechaInicio"],$_POST["fechaFin"]);

    echo json_encode($respuesta);
}

    
}


// 1. Se comprueba una sola vez si el parámetro 'accion' existe.
if (isset($_POST['accion'])) {

    $respuesta = null;
    $accion = $_POST['accion'];
    switch ($accion) {
        case 1: 
            $respuesta = Controllers::ctrMostrar_producto_poco_stock($accion);
            break;

        case 2: // Registrar producto más vendido por fecha
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFin = $_POST["fechaFin"];
            $respuesta = Controllers::ctrMostrar_producto_mas_vendido($accion, $fechaInicio, $fechaFin);
            break;

        case 3: // Mostrar reportes de ganancias por fecha
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFin = $_POST["fechaFin"];
            $respuesta = Controllers::ctrMostrar_reportes_ganacias($accion, $fechaInicio, $fechaFin);
            break;

        case 4: // Mostrar reportes de ventas de hoy
            $respuesta = Controllers::ctrMostrar_reportes_ventas_hoy($accion);
            break;
            
        // 3. SE CORRIGIÓ EL ERROR: El código original tenía dos 'accion == 4'. Se asumió que el siguiente era 5.
        case 5: // Listar lotes próximos a vencer
            $numeroDias = $_POST["numeroDias"];
            $respuesta = Controllers::ctrLotes_proximos_a_vencer($numeroDias);
            break;

        default:
            // 4. Se añade un caso por defecto para manejar acciones no válidas.
            $respuesta = ['error' => 'La acción solicitada no es válida.'];
            http_response_code(400); // Bad Request
            break;
    }

    // 5. La respuesta se codifica y se imprime una sola vez al final.
    header('Content-Type: application/json');
    echo json_encode($respuesta);

} else {
    // 6. Se maneja el caso en que no se envíe el parámetro 'accion'.
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'El parámetro "accion" es requerido.']);
}




// if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

//     $respuesta = new ajax();
//        $opcion = $_POST["accion"];
//       $respuesta = Controllers::ctrMostrar_producto_poco_stock($opcion);
//       echo json_encode($respuesta);

    
// }else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

//     $respuesta = new ajax();
//     $opcion = $_POST["accion"];
//     $fechaInicio = $_POST["fechaInicio"];
//     $fechaFin = $_POST["fechaFin"];
//      $respuesta = Controllers::ctrMostrar_producto_mas_vendido($opcion, $fechaInicio, $fechaFin);  
//       echo json_encode($respuesta);

// }else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL

//     $respuesta = new ajax();
//     $opcion = $_POST["accion"];
//     $fechaInicio = $_POST["fechaInicio"];
//     $fechaFin = $_POST["fechaFin"];

//     $respuesta = Controllers::ctrMostrar_reportes_ganacias($opcion, $fechaInicio, $fechaFin);
//     echo json_encode($respuesta);
// }
// else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL

//     $respuesta = new ajax();
//       $opcion = $_POST["accion"];
//       $respuesta = Controllers::ctrMostrar_reportes_ventas_hoy($opcion);
//       echo json_encode($respuesta);

// }else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL

//     $respuesta = new ajax();
//       $opcion = $_POST["accion"];
//       $numeroDias=$_POST["numeroDias"];
//       $respuesta = Controllers::ctrLotes_proximos_a_vencer($numeroDias);
//       echo json_encode($respuesta);

// }

