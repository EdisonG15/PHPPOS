<?php

require_once "../Controllers/movimiento_cajas.controllers.php";
require_once "../Models/movimiento_caja.models.php";


class AjaxMovimientoCaja {

 public function mostrar_Arqueo() {
        $respuesta = Controllers::ctrMostrar_Arqueo($_POST['fechaInicio'],$_POST['fechaFin']);
        echo json_encode($respuesta);
    }
    

     public function mostrar_MovimientoCaja() {
        $respuesta = Controllers::ctrMostrar_MovimientoCaja();
        echo json_encode($respuesta);
    }
   public function mostrar_Ingresos() {
        $respuesta = Controllers::ctrMostrar_Ingresos();
        echo json_encode($respuesta);
    }

    public function mostrar_Devoluciones() {
        $respuesta = Controllers::ctrMostrar_Devoluciones($_POST["opcion"]);
        echo json_encode($respuesta);
    }

  public function mostrar_Gastos() {
        $respuesta = Controllers::ctrMostrar_Gastos();
        echo json_encode($respuesta);
    }

    public function registrar_ArqueoCaja(
               ){
            $respuesta = Controllers::ctrRegistrarArqueoCaja($_POST['txt_id_arqueo_caja'],$_POST['inpuBillete100'],$_POST['inpuBillete50']
            ,$_POST['inpuBillete20'],$_POST['inpuBillete10'],$_POST['inpuBillete5'],$_POST['inpuBillete1'],$_POST['inputMoneda1']
            ,$_POST['inputMoneda50'],$_POST['inputMoneda25'],$_POST['inputMoneda10'],$_POST['inputMoneda5'],$_POST['inputMoneda001']
        ,$_POST['total_efectivo'],$_POST['inpuTotalMoneda'],$_POST['inpuTotalBilletes'],$_POST['txt_Comentario']);
            echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
      
    }

     public function abriCaja() {
        $respuesta = Controllers::ctrAbriCaja($_POST["montoInicial"],$_POST["observacion"]);
        echo json_encode($respuesta);
    }
     public function registrarActualizarMovimiento() {
        $respuesta = Controllers::ctrRegistrarActualizarMovimiento($_POST["id"],$_POST["tipo_movimientos"]
        ,$_POST["tipo_movimiento"],$_POST["monto"],$_POST["concepto"]);
        echo json_encode($respuesta);    
    }

  public function eliminarMovimiento() {
        $respuesta = Controllers::ctrEliminarMovimiento($_POST["id"],$_POST["opcion"]);
        echo json_encode($respuesta);
          
    }

    
    
  }

  // Controlador de acciones AJAX
if (isset($_POST['accion'])) {
    $ajax = new AjaxMovimientoCaja();

    switch ($_POST['accion']) {
      
        case 1: 
            $ajax->mostrar_Arqueo();
            break;
        case 2: 
            $ajax->mostrar_MovimientoCaja();
            break;
        case 3: 
            $ajax->mostrar_Ingresos();
            break;
         
        case 4: 
            $ajax->mostrar_Devoluciones();
            break;
        case 5: 
            $ajax->mostrar_Gastos();
            break;
        case 6: 
            $ajax->registrarActualizarMovimiento();
            break;
        case 7: 
            $ajax->eliminarMovimiento();
            break;
        case 8: 
            $ajax->registrar_ArqueoCaja();
            break;
        case 9: 
            $ajax->abriCaja();
            break; 

        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
}



	
