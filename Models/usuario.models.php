<?php

require_once "conexion.php";
// use PhpOffice\PhpSpreadsheet\IOFactory;

session_start();
class Models{
   static public function mdlMostrar(){

	    $stmt = Conexion::conectar()-> prepare('call usp_ListarUsuario');
		$stmt -> execute();
		return $stmt -> fetchAll();
        $stmt = null;
		
	
	}

	static public function mdlRegistrar($data){        
  
         $id_usuario_logeado = $_SESSION["usuario"]->id_usuario;
          $id_usuario = $data["id_usuario"];

        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_guardar_usuario( 
                                                    :p_id_usuario_logeado ,
                                                    :p_id_usuario ,
                                                    :p_cedula ,
                                                    :p_nombre_usuario ,
                                                    :p_apellido_usuario ,
                                                    :p_usuario ,
                                                    :p_clave ,
                                                    :p_id_perfil_usuario ,
                                                    :p_id_caja ,
                                                    :p_email ,
                                                    :p_direccion ,
                                                    :p_telefono ,
                                                    :p_landmarks ,
                                                    :p_img ,
                                                    :p_ciudad
                                                            )");    
            
            $stmt->bindParam(":p_id_usuario_logeado",$id_usuario_logeado);                                          
            $stmt->bindParam(":p_id_usuario",$id_usuario);                                       
            $stmt->bindParam(":p_cedula", $data["cedula"], PDO::PARAM_STR);
            $stmt->bindParam(":p_nombre_usuario", $data["firstName"], PDO::PARAM_STR);
            $stmt->bindParam(":p_apellido_usuario", $data["lastName"], PDO::PARAM_STR);
            $stmt->bindParam(":p_usuario", $data["username"], PDO::PARAM_STR);
            $stmt->bindParam(":p_clave", $data["password"], PDO::PARAM_INT);
            $stmt->bindParam(":p_id_perfil_usuario", $data["selPerfil"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_caja", $data["selCaja"], PDO::PARAM_STR);
            $stmt->bindParam(":p_email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":p_direccion", $data["address"], PDO::PARAM_STR);
            $stmt->bindParam(":p_telefono", $data["mobile"], PDO::PARAM_STR);
            $stmt->bindParam(":p_landmarks", $data["landmark"], PDO::PARAM_STR);
            $stmt->bindParam(":p_img", $data["logo_path"], PDO::PARAM_STR);
            $stmt->bindParam(":p_ciudad", $data["city"], PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
    
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
    
        $stmt = null; // cerrar conexión
        return $resultado;

    }
    static public function mdlActualizarInformacion($table, $data, $id, $nameId){

        $set = "";

        foreach ($data as $key => $value) {
            
            $set .= $key." = :".$key.",";

        }

        $set = substr($set, 0, -1); // para quitar la ultima coma

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {
            
            $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
            
        }		

        $stmt->bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt->execute()){

            // return "Usuario  eliminado con éxito.";
              return "Usuario eliminado con éxito.";

        }else{

            return Conexion::conectar()->errorInfo();
        
        }
        $stmt = null;
    }

}
 
    // static public function mdlListarUsuarios(){
    
    //     $stmt = Conexion::conectar()->prepare('call usp_ListarUsuario');
    
    //     $stmt->execute();
    
    //     return $stmt->fetchAll();
    //     $stmt = null;
    // }

    
 
    // static public function mdlRegistrarUsuarios($Cedula,$Nombres, $Apellidos,$Telefono, $Direccion, $Correo, $Usuario, $Clave, $IdRol,$IdCaja , $Activo){        
    //     // echo json_encode($Direccion);
    //     // echo json_encode($Correo);
    //     try{ //try can

            
    //         date_default_timezone_set('America/Guayaquil'); 
    //         $fecha = date('Y-m-d h:i:s ', time());

    //         $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(cedula,
    //                                                                     nombre_usuario, 
    //                                                                     apellido_usuario,
    //                                                                     telefono, 
    //                                                                     direccion,
    //                                                                     email, 
                                                                       
    //                                                                     usuario, 
    //                                                                     clave, 
    //                                                                     id_perfil_usuario,
    //                                                                     id_caja,
    //                                                                     estado,  
    //                                                                     fecha_registro,
    //                                                                     fecha_actualizacion) 
    //                                             VALUES (:Cedula,
    //                                                     :Nombres, 
    //                                                     :Apellido,
    //                                                     :telefono, 
    //                                                     :Direccion,
    //                                                     :Correo, 
    //                                                     :Usuario, 
    //                                                     :Clave, 
    //                                                     :IdRol, 
    //                                                     :id_caja,
    //                                                     :Activo, 
    //                                                     :FechaRegistro,
    //                                                     :fecha_actualizacion)");      
    //          $stmt -> bindParam(":Cedula", $Cedula , PDO::PARAM_STR);                                            
    //         $stmt -> bindParam(":Nombres", $Nombres , PDO::PARAM_STR);
    //         $stmt -> bindParam(":Apellido", $Apellidos , PDO::PARAM_STR);
    //         $stmt -> bindParam(":telefono", $Telefono , PDO::PARAM_STR);
    //         $stmt -> bindParam(":Direccion", $Direccion , PDO::PARAM_STR);
    //         $stmt -> bindParam(":Correo", $Correo , PDO::PARAM_STR);
    //         $stmt -> bindParam(":Usuario", $Usuario , PDO::PARAM_STR);
    //         $stmt -> bindParam(":Clave", $Clave , PDO::PARAM_STR);
    //         $stmt -> bindParam(":IdRol", $IdRol , PDO::PARAM_STR);
    //         $stmt -> bindParam(":id_caja", $IdCaja , PDO::PARAM_STR);
            
    //         $stmt -> bindParam(":Activo", $Activo , PDO::PARAM_STR);
    //         $stmt -> bindParam(":FechaRegistro", $fecha , PDO::PARAM_STR);
    //         $stmt -> bindParam(":fecha_actualizacion", $fecha , PDO::PARAM_STR);
    //         if($stmt -> execute()){
    //             $resultado = "ok";
    //         }else{
    //             $resultado = "error";
    //         }  
    //     }catch (Exception $e) {
    //         $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
    //     }
        
    //     return $resultado;
    //     echo json_encode("lo que tare el resuslatdo",$resultado);
    //     $stmt = null; //para que no quede abierta ninguna conexion

    // }

    // static public function mdlActualizarInformacion($table, $data, $id, $nameId){

    //     $set = "";

    //     foreach ($data as $key => $value) {
            
    //         $set .= $key." = :".$key.",";
    //      // es igualar codigo_producto=:codigo_producto
    //     }

    //     $set = substr($set, 0, -1); // para quitar la ultima coma

    //     $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

    //     foreach ($data as $key => $value) {
            
    //         $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
            
    //     }		

    //     $stmt->bindParam(":".$nameId, $id, PDO::PARAM_INT);

    //     if($stmt->execute()){

    //         return "ok";

    //     }else{

    //         return Conexion::conectar()->errorInfo();
        
    //     }
    //     $stmt = null;
    // }

    // static public function mdlVerificaSiExiste($VerificaExiste,$VerificaExiste1){
        
    //     // static public function mdlVerificaSiExiste($VerificaExiste){
    //     // printf("SI INGRESAS");
    //     $stmt = Conexion::conectar()->prepare("SELECT   count(*) as existe
    //                                                 FROM usuarios u
    //                                                   WHERE u.cedula  = :VerificaExiste
    //                                                   or u.usuario=:VerificaExiste1
    //                                                  AND u.estado = 1
    //                                              ");

    //     $stmt -> bindParam(":VerificaExiste",$VerificaExiste,PDO::PARAM_STR);
    //     $stmt -> bindParam(":VerificaExiste1",$VerificaExiste1,PDO::PARAM_STR);
    

    //     $stmt -> execute();

    //     return $stmt->fetch(PDO::FETCH_OBJ);
    //     $stmt = null;
    // }


// }