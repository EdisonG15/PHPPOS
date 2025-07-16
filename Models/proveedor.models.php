<?php

require_once "conexion.php";
// use PhpOffice\PhpSpreadsheet\IOFactory;
session_start();
class ProveedorModels{
   
    static public function mdlListarProveedor(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarProveedor');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlListarNombreProveedor($busqueda){

        $stmt = Conexion::conectar()->prepare("   SELECT Concat(p.ruc , ' - ' ,p.nombre)  as descripcion_proveedor
        FROM proveedor p where p.estado= 1 
        AND (
            p.ruc LIKE :busqueda 
            OR p.nombre LIKE :busqueda 
            OR p.razon_social LIKE :busqueda
          )  
           LIMIT 5 ");
         $busqueda = "%$busqueda%";
        $stmt->bindParam(":busqueda", $busqueda, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlGuardar( $IdProveedor,$Ruc, $nombre, $RazonSocial, $Telefono, $Correo, $Direccion){        ;
       
        $id_usuario = $_SESSION["usuario"]->id_usuario;
    
        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_GuardarProveedor( 
                                                            :p_id_proveedor,
                                                            :p_ruc ,
                                                            :p_nombre,
                                                            :p_razon_social,
                                                            :p_telefono,
                                                            :p_email,
                                                            :p_direccion,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_proveedor",$IdProveedor, PDO::PARAM_STR);
            $stmt -> bindParam(":p_ruc", $Ruc , PDO::PARAM_STR);
			$stmt -> bindParam(":p_nombre", $nombre , PDO::PARAM_STR);
            $stmt -> bindParam(":p_razon_social", $RazonSocial , PDO::PARAM_STR);
            $stmt -> bindParam(":p_telefono",$Telefono, PDO::PARAM_STR);
            $stmt -> bindParam(":p_email", $Correo , PDO::PARAM_STR);
			$stmt -> bindParam(":p_direccion", $Direccion , PDO::PARAM_STR);
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


    static public function mdlEliminar($IdProveedor){
        $id_usuario = $_SESSION["usuario"]->id_usuario;
        try{ //try can
            
            $stmt = Conexion::conectar()->prepare("CALL usp_EliminarProveedor( :p_id_proveedor,
                                                            :p_id_usuario
                                                            )");      
                                                        
            $stmt -> bindParam(":p_id_proveedor",$IdProveedor, PDO::PARAM_STR);
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

    static public function mdlGetDatosProveedor($NumeroDocumento){
        // echo json_encode($NumeroDocumento);
        $stmt = Conexion::conectar()->prepare("SELECT Concat(p.ruc , ' - ' ,p.nombre)  as nombres, p.id_proveedor,p.ruc,p.razon_social ,p.nombre from proveedor p
                                            WHERE p.ruc = :numeroDocumento
                                                AND p.estado=1 ");
        
        $stmt -> bindParam(":numeroDocumento",$NumeroDocumento,PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

}