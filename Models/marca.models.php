<?php 

require_once "conexion.php";
session_start();
class Models{
   static public function mdlMostrar(){

	    $stmt = Conexion::conectar()-> prepare('call usp_listarmarca');
		$stmt -> execute();
		return $stmt -> fetchAll();
        $stmt = null;
		
	
	}

	static public function mdlRegistrar($id_marca,$nombre){        
  
         $id_usuario = $_SESSION["usuario"]->id_usuario;

        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarMarca( :p_id_marca,
                                                            :p_nombre ,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_marca",$id_marca, PDO::PARAM_STR);
            $stmt -> bindParam(":p_nombre", $nombre , PDO::PARAM_STR);
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

            return "Marca eliminada con éxito.";

        }else{

            return Conexion::conectar()->errorInfo();
        
        }
        $stmt = null;
    }

}