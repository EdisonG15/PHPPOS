<?php
require_once "../Controllers/administrar_creditos_compra.controllers.php";
require_once "../Models/administrar_creditos_compra.models.php";


class ajax{

    public function MostrarCredito(){

        echo json_encode(Controllers::ctrMostrarCredito( $_POST["filtro"], $_POST["filtroEstado"], 
                                                         $_POST["fechaInicio"], $_POST["fechaFin"]));
    }
  public function RegistrarAbono(){

    $registroAbono = Controllers::ctrRegistrarAbono($_POST['id_caja'],$_POST['id_Compra'],$_POST['id_compra_credito'],
                         $_POST['abonado'],$_POST['observacion'],$_POST['metodo_pago'] );
        echo json_encode($registroAbono,JSON_UNESCAPED_UNICODE);
    }

    public function HistorialAbonoCredito(){

    $registroAbono = Controllers::ctrHistorialAbonoCredito($_POST['id_credito'] );
        echo json_encode($registroAbono,JSON_UNESCAPED_UNICODE);
    }
   
    
}

// Verificación principal
if (isset($_POST['accion'])) {
    $ajax = new Ajax();

    switch ($_POST['accion']) {
        case 1:
            $ajax->MostrarCredito();
            break;

        case 2:
            $ajax->RegistrarAbono();
            break;
           case 3:
            $ajax->HistorialAbonoCredito();
            break;
        default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
    }
}


  