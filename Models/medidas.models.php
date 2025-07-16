<?php 

require_once "conexion.php";
session_start();
class Models{
	static public function mdlMostrar(){

	    $stmt = Conexion::conectar()-> prepare('call usp_ListarUnidades');
		$stmt -> execute();
		return $stmt -> fetchAll();
        $stmt = null;	
	}

	static public function mdlGuardar($id_medidas,$nombre,$nombre_corto){        
        $id_usuario = $_SESSION["usuario"]->id_usuario;

        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarMedidas( :p_id_medidas,
                                                            :p_nombre ,
                                                            :p_nombre_corto,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_medidas",$id_medidas, PDO::PARAM_STR);
            $stmt -> bindParam(":p_nombre", $nombre , PDO::PARAM_STR);
			$stmt -> bindParam(":p_nombre_corto", $nombre_corto , PDO::PARAM_STR);
            $stmt -> bindParam(":p_id_usuario", $id_usuario , PDO::PARAM_STR);
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

    static public function mdlEliminar($id_medida){
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_EliminarMedida( :p_id_medidas,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_medidas",$id_medida, PDO::PARAM_STR);
            $stmt -> bindParam(":p_id_usuario", $id_usuario , PDO::PARAM_STR);
            if ($stmt->execute()) {
                $respuesta = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el mensaje desde el SELECT
                $resultado = $respuesta['resultado']; // "Categoría registrada con éxito", etc.
            } else {
                $resultado = "Error al ejecutar la accion.";
            }
    
        } catch (Exception $e) {
            $resultado = 'Excepción: ' . $e->getMessage();
        }
	      return $resultado;

	       $stmt = null; //para que no quede abierta ninguna conexion
    }

}