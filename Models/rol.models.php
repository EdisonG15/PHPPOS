<?php

require_once "conexion.php";
// use PhpOffice\PhpSpreadsheet\IOFactory;


class RolModelo{
    public $resultado;// para retornar el mesaje si 
 /*=======================================================================================================================
    OBTENER LISTADO TOTAL DE PRODUCTOS PARA EL DATATABLE
    ====================================================================================================================*/
    static public function mdlListarRol(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarPerfiles');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
        $stmt = null;
    }




    
    /*===================================================================
    REGISTRAR PRODUCTOS UNO A UNO DESDE EL FORMULARIO DEL INVENTARIO
    ====================================================================*/
    static public function mdlRegistrarRol($Descripcion, $Estado){        
        // echo json_encode($Descripcion);
        // echo json_encode($Estado);
        try{ //try can

            
            date_default_timezone_set('America/Guayaquil'); 
            $fecha = date('Y-m-d h:i:s ', time());

            $stmt = Conexion::conectar()->prepare('call usp_RegistroRol( :p_descripcion  )');      
                                                        	
            $stmt -> bindParam(":Descripcion", $Descripcion , PDO::PARAM_STR);
            // $stmt -> bindParam(":Activo", $Estado , PDO::PARAM_STR);
      
        
            if($stmt -> execute()){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }  
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        
        return $resultado;
        echo json_encode("lo que tare el resuslatdo",$resultado);
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


}