<?php

require_once "conexion.php";
session_start();
// use PhpOffice\PhpSpreadsheet\IOFactory;


class Models{

    static public function mdlListarEmpresas(){
    
        $stmt = Conexion::conectar()->prepare('call usp_ListarEmpresa');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlRegistrarEmpresa( $data){        
          $id_usuario = $_SESSION["usuario"]->id_usuario;
             $id_empresa = $data["id_empresa"];
             

        try{ //try can

            $stmt = Conexion::conectar()->prepare("CALL usp_registrar_o_actualizar_empresa( :p_id_empresa,
                                                            :p_razon_social,:p_nombre_comercial, :p_ruc,:p_marca,:p_id_firma,:p_direccion_matriz,
                                                            :p_direccion_sucursal,:p_email,:p_telefono,:p_mensaje,
                                                            :p_contribuyente_especial,:p_obligado_contabilidad,:p_ambiente,
                                                            :p_tipo_emision,:p_establecimiento_codigo,:p_punto_emision_codigo,:p_secuencial,
                                                            :p_codigo_iva,:p_logo_path,:p_id_usuario
                                                            
                                                            )");      
            $stmt->bindParam(":p_id_empresa",$id_empresa);                                       
            $stmt->bindParam(":p_razon_social", $data["razon_social"], PDO::PARAM_STR);
            $stmt->bindParam(":p_nombre_comercial", $data["nombre_comercial"], PDO::PARAM_STR);
            $stmt->bindParam(":p_ruc", $data["ruc"], PDO::PARAM_STR);
            $stmt->bindParam(":p_marca", $data["marca"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_firma", $data["id_firma"], PDO::PARAM_INT);
            $stmt->bindParam(":p_direccion_matriz", $data["direccion_matriz"], PDO::PARAM_STR);
            $stmt->bindParam(":p_direccion_sucursal", $data["direccion_sucursal"], PDO::PARAM_STR);
            $stmt->bindParam(":p_email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":p_telefono", $data["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":p_mensaje", $data["mensaje"], PDO::PARAM_STR);
            $stmt->bindParam(":p_contribuyente_especial", $data["contribuyente_especial"], PDO::PARAM_STR);
            $stmt->bindParam(":p_obligado_contabilidad", $data["obligado_contabilidad"], PDO::PARAM_STR);
            $stmt->bindParam(":p_ambiente", $data["ambiente"], PDO::PARAM_STR);
            $stmt->bindParam(":p_tipo_emision", $data["tipo_emision"], PDO::PARAM_STR);
            $stmt->bindParam(":p_establecimiento_codigo", $data["establecimiento_codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":p_punto_emision_codigo", $data["punto_emision_codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":p_secuencial", $data["secuencial"], PDO::PARAM_INT);
            $stmt->bindParam(":p_codigo_iva", $data["codigo_iva"], PDO::PARAM_INT);
            $stmt->bindParam(":p_logo_path", $data["logo_path"], PDO::PARAM_STR);
            $stmt->bindParam(":p_id_usuario",  $id_usuario, PDO::PARAM_INT);

 
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

            return "Empresa eliminada con éxito.";

        }else{

            return Conexion::conectar()->errorInfo();
        
        }
        $stmt = null;
    }

}