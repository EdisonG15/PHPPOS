<?php 

require_once "conexion.php";

class Models{
    // mostrar categorias
  
	static public function mdlMostrar(){
	 
        $stmt = Conexion::conectar()-> prepare('call usp_ListarArqueoCaja');
	  $stmt -> execute();
	  return $stmt -> fetchAll();
      $stmt = null; 
	}

    static public function mdlCargarCombo( $estado){
      
      $stmt = Conexion::conectar()->prepare("SELECT  	id_categoria , nombre_categoria
                                             FROM categorias c 
                                             order BY nombre_categoria asc");
	  $stmt -> execute();
	  return $stmt -> fetchAll();
      $stmt = null;     
	}
    
	static public function mdlRegistrar($id_caja,$id_usuario,$monto_inicial, $estado){        
        
        try{ //try can
            date_default_timezone_set('America/Guayaquil'); 
            $fecha = date('Y-m-d h:i:s ', time());
            $stmt = Conexion::conectar()->prepare("INSERT INTO arqueo_caja(id_caja,
                                                                             id_usuario,
                                                                             monto_inicial,                                                                        
                                                                             fecha_inicio,
																			estado
                                                                           ) 
                                                VALUES (:id_caja,
                                                        :id_usuario, 
                                                        :monto_inicial,                                                      
                                                        :fecha_apertura,
                                                        :activo)");      
                                                        
            $stmt -> bindParam(":id_caja", $id_caja , PDO::PARAM_STR);
            $stmt -> bindParam(":id_usuario", $id_usuario , PDO::PARAM_STR);
            $stmt -> bindParam(":monto_inicial", $monto_inicial , PDO::PARAM_STR);
            $stmt -> bindParam(":fecha_apertura", $fecha , PDO::PARAM_STR);
            $stmt -> bindParam(":activo", $estado , PDO::PARAM_STR);   
            if($stmt -> execute()){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }  
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }  
        return $resultado;
        $stmt = null; //para que no quede abierta ninguna conexion
    }
    
    static public function mdlActualizarInformacion($table, $data, $id, $nameId){
       
        $set = "";
        foreach ($data as $key => $value) {     
            $set .= $key." = :".$key.",";
         // es igualar codigo_producto=:codigo_producto
        }
        $set = substr($set, 0, -1); // para quitar la ultima coma
        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
        foreach ($data as $key => $value) {       
            $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);       
        }		
        $stmt->bindParam(":".$nameId, $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return Conexion::conectar()->errorInfo();
        
        }
        $stmt = null;
    }

    static public function mdlCerrarCajar($id_caja,$id_usuario){       
       
        $stmt = Conexion::conectar()->prepare('call usp_CierreCaja (:p_IdUsuario,:p_IdCaja);');
        $stmt -> bindParam(":p_IdUsuario",$id_usuario,PDO::PARAM_STR);
        $stmt -> bindParam(":p_IdCaja",$id_caja,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }


    static public function mdlRegistrarArqueoCaja($txt_id_arqueo_caja,$txt_id_caja,$txt_id_usuario,$inpuBillete100,$inpuBillete50,$inpuBillete20,
      $inpuBillete10,$inpuBillete5,$inpuBillete2,$inpuBillete1,$inputMoneda1,
    	$inputMoneda50,$inputMoneda25,$inputMoneda10,$inputMoneda5,$inputMoneda001,$total_efectivo, $inpuTotalMoneda,$inpuTotalBilletes,$txt_Comentario){ 
        
            try{ //try
        $stmt = Conexion::conectar()->prepare('call usp_RealizarArqueoCaja (
        :p_id_arqueo_caja,:p_IdCaja,:p_IdUsuario,:p_inpuBillete100,:p_inpuBillete50,
        :p_inpuBillete20,:p_inpuBillete10,:p_inpuBillete5,:p_inpuBillete2,:p_inpuBillete1,:p_inputMoneda1,
        :p_inputMoneda50,:p_inputMoneda25,:p_inputMoneda10,
        :p_inputMoneda5,:p_inputMoneda001,:p_total_efectivo, 
        :p_inpuTotalMoneda,:p_inpuTotalBilletes,
        :p_Comentario);');
        $stmt -> bindParam(":p_id_arqueo_caja",$txt_id_arqueo_caja,PDO::PARAM_STR);
        $stmt -> bindParam(":p_IdCaja",$txt_id_caja,PDO::PARAM_STR);
        $stmt -> bindParam(":p_IdUsuario",$txt_id_usuario,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete100",$inpuBillete100,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete50",$inpuBillete50,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete20",$inpuBillete20,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete10",$inpuBillete10,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete5",$inpuBillete5,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete2",$inpuBillete2,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuBillete1",$inpuBillete1,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda1",$inputMoneda1,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda50",$inputMoneda50,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda25",$inputMoneda25,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda10",$inputMoneda10,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda5",$inputMoneda5,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inputMoneda001",$inputMoneda001,PDO::PARAM_STR);
        $stmt -> bindParam(":p_total_efectivo",$total_efectivo,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuTotalMoneda",$inpuTotalMoneda,PDO::PARAM_STR);
        $stmt -> bindParam(":p_inpuTotalBilletes",$inpuTotalBilletes,PDO::PARAM_STR);
        $stmt -> bindParam(":p_Comentario",$txt_Comentario,PDO::PARAM_STR);
        if($stmt -> execute()){
            $resultado = "ok";
        }else{
            $resultado = "error";
        }  
        $stmt = null;
    }catch (Exception $e) {
        $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
    }
    return $resultado;
    echo json_encode("lo que tare el resuslatdo",$resultado);
    $stmt = null; //para que no quede abierta ninguna conexion
    }

     
  static public function mdlMostrar_valor_de_caja($Id_caja,$Id_usuario){

    $stmt = Conexion::conectar()->prepare('call usp_RecuperarValorCaja(:p_id_usuario,:p_id_caja)');
    $stmt -> bindParam(":p_id_usuario",$Id_usuario, PDO::PARAM_STR);
    $stmt -> bindParam(":p_id_caja",$Id_caja , PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt = null; 
  }



}