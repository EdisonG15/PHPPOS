<?php 

require_once "conexion.php";

class Models{
    // mostrar categorias
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	static public function mdlMostrar(){
		// printf("SI INGRESAS");
	   //	$stmt = Conexion::conectar()-> prepare("SELECT id,categoria,ruta,fecha,estado,'X' as acciones FROM categorias");
	   $stmt = Conexion::conectar()-> prepare('call usp_ListarCaja');
		$stmt -> execute();

		return $stmt -> fetchAll();
        $stmt = null;
		
	
	}

	static public function mdlRegistrar($numerocaja,$nombre,$folio){        
        // echo json_encode($Descripcion);
        // echo json_encode($Estado);
        try{ //try can

            
            // date_default_timezone_set('America/Guayaquil'); 
            // $fecha = date('Y-m-d h:i:s ', time());

            $stmt = Conexion::conectar()->prepare("INSERT INTO cajas(numero_caja,
                                                                             nombre_caja,
                                                                             folio
                                                                        ) 
                                                VALUES (:numero_caja,
                                                        :nombre, 
                                                        :folio
                                                           )");      
                                                        
            $stmt -> bindParam(":numero_caja", $numerocaja , PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $nombre , PDO::PARAM_STR);
            $stmt -> bindParam(":folio", $folio , PDO::PARAM_STR);

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
    //// Actualizar el estock
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