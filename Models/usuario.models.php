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
 
  