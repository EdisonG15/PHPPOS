<?php
require_once "conexion.php";
session_start();

class ClientesModels{

    static public function mdlListarClientes(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarClientes');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
        $stmt = null;
    }
 
    static public function mdlGuargar($IdCliente,$tipo_identificacion,$NumeroDocumento, $Nombre, $Apellido,
          $Direccion, $Telefono,$Email){        
          $id_usuario = $_SESSION["usuario"]->id_usuario;
    
        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarCliente( 
                                                            :p_id_cliente,
                                                            :p_tipo_identificacion ,
                                                            :p_numeroDocumento,
                                                            :p_nombre,
                                                            :p_apellido,
                                                            :p_direccion,
                                                            :p_telefono,
                                                            :p_email,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_cliente",$IdCliente, PDO::PARAM_STR);
            $stmt -> bindParam(":p_tipo_identificacion", $tipo_identificacion , PDO::PARAM_STR);
			$stmt -> bindParam(":p_numeroDocumento", $NumeroDocumento , PDO::PARAM_STR);
            $stmt -> bindParam(":p_nombre", $Nombre , PDO::PARAM_STR);
            $stmt -> bindParam(":p_apellido", $Apellido , PDO::PARAM_STR);
            $stmt -> bindParam(":p_direccion",$Direccion, PDO::PARAM_STR);
            $stmt -> bindParam(":p_telefono", $Telefono , PDO::PARAM_STR);
			$stmt -> bindParam(":p_email", $Email , PDO::PARAM_STR);
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

    static public function mdlEliminar($id){
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_EliminarCliente( :p_id_cliente,
                                                            :p_id_usuario
                                                            )");                                               
            $stmt -> bindParam(":p_id_cliente",$id, PDO::PARAM_STR);
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
         
    static public function mdlListarNombreClientes($busqueda){

        // $stmt = Conexion::conectar()->prepare("SELECT Concat(c.numeroDocumento , ' - ' ,c.nombre)  as descripcion_clientes
        // FROM cliente c where c.estado=1 ");
        // $stmt -> execute();
        // return $stmt->fetchAll();
        // $stmt = null;

            $stmt = Conexion::conectar()->prepare("  SELECT CONCAT(c.numeroDocumento, ' - ', c.nombre, ' ', c.apellido) AS descripcion_clientes
           FROM cliente c
              WHERE c.estado = 1;
        AND (
           c.numeroDocumento LIKE :busqueda 
            OR c.nombre LIKE :busqueda 
            OR c.apellido LIKE :busqueda
          )  
           LIMIT 5 ");
         $busqueda = "%$busqueda%";
        $stmt->bindParam(":busqueda", $busqueda, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlGetDatosCliente($NumeroDocumento){

        $stmt = Conexion::conectar()->prepare("SELECT Concat(c.numeroDocumento , ' - ' ,c.nombre)  as nombres,c.nombre, c.id_cliente,c.numeroDocumento from cliente c 
                                            WHERE c.numeroDocumento = :numeroDocumento
                                                AND c.estado=1 ");
        
        $stmt -> bindParam(":numeroDocumento",$NumeroDocumento,PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

}