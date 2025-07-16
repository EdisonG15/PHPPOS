<?php
require_once "../Controllers/arqueo_caja.controllers.php";
require_once "../Models/arqueo_caja.models.php";


class ajax{

    //esta variable son para almasenal lo que envia
  public $id;
  public $id_caja;
  public $id_usuario;
  public $monto_inicial;
  public $estado;


 // Mostar categoria 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function Mostrar(){

  $respuesta = Controllers::ctrMostrar();

      echo json_encode($respuesta);
  }
  public function registrar(){
      
      $respuesta = Controllers::ctrRegistrar($this->id_caja,$this->id_usuario,$this->monto_inicial, $this->estado);
  
      echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
      }

      public function CargarCombo(){
        print(" cambo carga ");

        // $respuesta = Controllers::ctrCargarCombo($this->estado);
        $respuesta = Controllers::ctrCargarCombo();
      
            echo json_encode($respuesta);
        }

    
  public function ajaxActualizar($data){


  $table = "arqueo_caja";
  $id = $_POST["id"];
  $nameId = "id_arqueo_caja";

  $respuesta = Controllers::ctrActualizar($table, $data, $id, $nameId);

  echo json_encode($respuesta);
  }


   public function ajaxRealizarArqueo($data){


  $table = "arqueo_caja";
  $id = $_POST["id"];
  $nameId = "id_caja";

  $respuesta = Controllers::ctrActualizar($table, $data, $id, $nameId);

  echo json_encode($respuesta);
  }
  public function ajaxEliminar($data){


      $table = "arqueo_caja";
      $id = $_POST["id"];
      $nameId = "id_caja";
  
      $respuesta = Controllers::ctrEliminar($table, $data, $id, $nameId);
  
      echo json_encode($respuesta);
      }

      public function ajaxCerrarCaja(){
      
        $respuesta = Controllers::ctrCerrarCaja($this->id_caja,$this->id_usuario);
    
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
        }
  

        public function ajaxRegistrarArqueoCaja(
            $txt_id_arqueo_caja,$txt_id_caja,$txt_id_usuario,$inpuBillete100,$inpuBillete50,$inpuBillete20,$inpuBillete10,$inpuBillete5,$inpuBillete2,$inpuBillete1,$inputMoneda1,
            $inputMoneda50,$inputMoneda25,$inputMoneda10,$inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario
        ){

            $respuesta = Controllers::ctrRegistrarArqueoCaja($txt_id_arqueo_caja,$txt_id_caja,$txt_id_usuario,$inpuBillete100,$inpuBillete50,$inpuBillete20,$inpuBillete10,$inpuBillete5,$inpuBillete2,$inpuBillete1,$inputMoneda1,
            $inputMoneda50,$inputMoneda25,$inputMoneda10,$inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario);
            echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
      
         }

         public function Mostrar_valor_de_caja(){

            $respuesta = Controllers::ctrMostrar_valor_de_caja($this->Id_caja,$this->Id_usuario);
          
                echo json_encode($respuesta);
            }
          
      
    

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar ROL

      $respuesta = new ajax();
       $respuesta -> Mostrar();
      
      
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar ROL

  
  
          $insertar = new ajax();
          $insertar->id_caja = $_POST["id_caja"];
          $insertar->id_usuario = $_POST["id_usuario"];
          $insertar->monto_inicial = $_POST["monto_inicial"];
      
          $insertar->estado = $_POST["estado"];

          
        

  
          $insertar->registrar();

      

}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // ACCION PARA ACTUALIZAR UN ROL

  date_default_timezone_set('America/Guayaquil'); 
  $fecha = date('Y-m-d h:i:s ', time());
      $actualizar = new ajax();
   
  
      $data = array(
        "numero_caja" => $_POST["numerocaja"],
          "nombre" => $_POST["nombre"],
          "folio" => $_POST["folio"],
          "fecha_actualizacion" => $fecha ,
          "activo" => $_POST["estado"],
          
      
         
      );
      $actualizar -> ajaxActualizar($data);
   
      
  }else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN ROL

    date_default_timezone_set('America/Guayaquil'); 
  
        $cerrar_caja = new ajax();
     
    
        $insertar = new ajax();
        $insertar->id_caja = $_POST["id_caja"];
         $insertar->id_usuario = $_POST["id_usuario"];
        $cerrar_caja -> ajaxCerrarCaja();
     
        
    }
    else if(isset($_POST['accion']) && $_POST['accion'] == 5){ // ACCION PARA ACTUALIZAR UN ROL

        date_default_timezone_set('America/Guayaquil'); 
      
            $cerrar_caja = new ajax();
         
        
            $insertar = new ajax();
            $insertar->id_caja = $_POST["id_caja"];
             $insertar->id_usuario = $_POST["id_usuario"];
            $cerrar_caja -> ajaxCerrarCaja();
         
            
        }  if(isset($_POST['accion']) && $_POST['accion'] == 6){ // ACCION PARA ACTUALIZAR UN ROL

            date_default_timezone_set('America/Guayaquil'); 
            $fecha = date('Y-m-d h:i:s ', time());
                $arqueo_caja = new ajax();
             
            
                $data = array(
                 
                    "ingresos" => $_POST["ingresos"],
                    "sobrante_caja"  => $_POST["sobrante_caja"],
                    "faltantes_caja" => $_POST["faltantes_caja"],
                    "egresos_totales"  => $_POST["egresos_totales"],
                    "segun_sistema" => $_POST["segun_sistema"],
                    "usuario"  => $_POST["usuario"],
                    "numero_ventas" => $_POST["numero_ventas"],
                    "total_ingresos_usuario"  => $_POST["total_usuario_Ingresos"],
                    "total_egresos_usuario"  => $_POST["total_usuario_Egresos"],
                    "concepto" => $_POST["Comentario"],
                    "estado"  => $_POST["estado"],
                
                   
                );
                $arqueo_caja -> ajaxRealizarArqueo($data);
             
                
            }if(isset($_POST['accion']) && $_POST['accion'] == 7){ // parametro para listar ROL
                    print("estoy en el aja ");
                $respuesta = new ajax();
                // $respuesta-> estado = $_POST["estado"];
                 $respuesta -> CargarCombo();
                
                
          }
        else if(isset($_POST['accion']) && $_POST['accion'] == 8){ // ACCION PARA ACTUALIZAR UN ROL
         
  $realizar_arque_caja = new ajax();
  $realizar_arque_caja -> ajaxRegistrarArqueoCaja(
   $_POST['txt_id_arqueo_caja'],$_POST['txt_id_caja'],$_POST['txt_id_usuario'],$_POST['inpuBillete100'],$_POST['inpuBillete50']
   ,$_POST['inpuBillete20'],$_POST['inpuBillete10'],$_POST['inpuBillete5'],$_POST['inpuBillete2'],$_POST['inpuBillete1'],$_POST['inputMoneda1'],
   $_POST['inputMoneda50'],$_POST['inputMoneda25'],$_POST['inputMoneda10'],$_POST['inputMoneda5'],$_POST['inputMoneda001'],$_POST['total_efectivo'],
   $_POST['inpuTotalMoneda'],$_POST['inpuTotalBilletes'],$_POST['txt_Comentario']);


        } if(isset($_POST['accion']) && $_POST['accion'] == 9){ // parametro para listar ROL

            $respuesta = new ajax();
            $respuesta->Id_caja = $_POST["Id_caja"];
            $respuesta->Id_usuario = $_POST["Id_usuario"];
             $respuesta -> Mostrar_valor_de_caja();
            
            
          }