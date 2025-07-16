<?php

require_once "conexion.php";
session_start();
class ModelsCategorias{

	static public function mdlMostrarCategorias(){

	    $stmt = Conexion::conectar()-> prepare('call usp_ListarCategorias');
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt = null;

	}

	static public function mdlGuardar($id_categoria, $categoria, $estado) {
        $id_usuario = $_SESSION["usuario"]->id_usuario;
    
        try {
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarCategoria(
                                                    :p_id_categoria,
                                                    :p_nombre,
                                                    :p_id_usuario,
                                                    :p_estado)");
            $stmt->bindParam(":p_id_categoria", $id_categoria, PDO::PARAM_INT);
            $stmt->bindParam(":p_nombre", $categoria, PDO::PARAM_STR);
            $stmt->bindParam(":p_id_usuario", $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":p_estado", $estado, PDO::PARAM_STR);
    
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
    
    static public function mdlEliminar($id ){
	
	        $id_usuario = $_SESSION["usuario"]->id_usuario;
	    try{ 
		
		    $stmt = Conexion::conectar()->prepare("CALL usp_EliminarCategoria( :p_id_categoria,
														:p_id_usuario 
														)");      
													
		    $stmt -> bindParam(":p_id_categoria",$id, PDO::PARAM_STR);
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