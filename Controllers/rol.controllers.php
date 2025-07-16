<?php


class RolControlador{

    static public function ctrListarRol(){
    
        $rol = RolModelo::mdlListarRol();
    
        return $rol;
    
    }
    
    static public function ctrRegistrarRol($Descripcion, $Estado){

     $registroRol = RolModelo::mdlRegistrarRol($Descripcion, $Estado);

      return $registroRol;
       }
       
       static public function ctrActualizarRol($table, $data, $id, $nameId){
        
        $respuesta = RolModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    static public function ctrEliminarRol($table, $data, $id, $nameId){
        
        $respuesta = RolModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    // static public function ctrActualizarRol($IdRol, $Descripcion, $Estado){
        
    //     $respuesta = RolModelo::mdlActualizarInformacion($IdRol,$Descripcion, $Estado);
        
    //     return $respuesta;
    // }

  

}