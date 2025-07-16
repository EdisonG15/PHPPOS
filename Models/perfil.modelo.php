<?php

require_once "conexion.php";



class PerfilModelo{
    public $resultado;
    static public function mdlObtenerPerfiles(){

        $stmt = Conexion::conectar()->prepare("select p.id_perfil,
                                                        p.descripcion,
                                                        p.estado,
                                                        date(p.fecha_registro) as fecha_creacion,
                                                        p.fecha_actualizacion,
                                                        ' ' as opciones
                                                from perfiles p
                                                order by p.id_perfil");

        $stmt -> execute();

        return $stmt->fetchAll();
        $stmt = null;

    }

    static public function mdlListarRol(){
    
        $stmt = Conexion::conectar()->prepare('call sp_ListarRol');
    
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
            $fecha = date('Y-m-d h:i:s a', time());

            $stmt = Conexion::conectar()->prepare("INSERT INTO rol(Descripcion, 
                                                                        Activo, 
                                                                        fecha_actualizacion,
                                                                        FechaRegistro) 
                                                VALUES (:Descripcion, 
                                                        :Activo, 
                                                        :fecha_actualizacion,
                                                        :FechaRegistro)");      
                                                        	
            $stmt -> bindParam(":Descripcion", $Descripcion , PDO::PARAM_STR);
            $stmt -> bindParam(":Activo", $Estado , PDO::PARAM_STR);
            $stmt -> bindParam(":fecha_actualizacion", $fecha , PDO::PARAM_STR);
            $stmt -> bindParam(":FechaRegistro", $fecha , PDO::PARAM_STR);
        
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