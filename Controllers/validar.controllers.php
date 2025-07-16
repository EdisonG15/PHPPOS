<?php 

class Controllers{

static public function ctrVerificaSiExiste($txt_id_caja,$txt_id_usuario){

$respuesta = Models::mdlVerificaSiExiste($txt_id_caja,$txt_id_usuario);

return $respuesta;
}


}