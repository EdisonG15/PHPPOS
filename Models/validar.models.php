
<?php 

require_once "conexion.php";
class Models{

    static public function mdlVerificaSiExiste($txt_id_caja,$txt_id_usuario){
     
        $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) AS existe
                                                          FROM arqueo_caja ar
                                                     WHERE ar.estado = 1 
                                 AND ar.id_caja = :txt_id_caja and ar.id_usuario=:txt_id_usuario" );

        $stmt -> bindParam(":txt_id_usuario",$txt_id_usuario,PDO::PARAM_STR);
        
        $stmt -> bindParam(":txt_id_caja",$txt_id_caja,PDO::PARAM_STR);
    
    

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
    }

}
