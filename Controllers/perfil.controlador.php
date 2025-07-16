<?php

class PerfilControlador{
/* INICIO */
    static public function ctrObtenerPerfiles(){

        $modulos = PerfilModelo::mdlObtenerPerfiles();

        return $modulos;
    }

  /* FIN */
    static public function ctrListarRol(){
    
        $rol = PerfilModelo::mdlListarRol();
    
        return $rol;
    
    }
    
    static public function ctrRegistrarRol($Descripcion, $Estado){

     $registroRol = PerfilModelo::mdlRegistrarRol($Descripcion, $Estado);

      return $registroRol;
       }
       
       static public function ctrActualizarRol($table, $data, $id, $nameId){
        
        $respuesta = PerfilModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    static public function ctrEliminarRol($table, $data, $id, $nameId){
        
        $respuesta = PerfilModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }


}