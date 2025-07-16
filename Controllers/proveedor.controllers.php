<?php


class ProveedorControllers{
    
    static public function ctrListarProveedor(){
      
        $Proveedor = ProveedorModels::mdlListarProveedor();
    
        return $Proveedor;
    
    }
    
    static public function ctrGuardar($IdProveedor, $Ruc, $nombre, $RazonSocial, $Telefono, $Correo, $Direccion){

        $registroProveedor = ProveedorModels::mdlGuardar($IdProveedor, $Ruc, $nombre, $RazonSocial, $Telefono, $Correo, $Direccion);
   
         return $registroProveedor;
    }
          
    static public function ctrEliminar($IdProveedor){
		
            $respuesta = ProveedorModels::mdlEliminar($IdProveedor);
            
            return $respuesta;
    }

   

    static public function ctrListarNombreProveedor($busqueda){
       
        $proveedor = ProveedorModels::mdlListarNombreProveedor($busqueda);

        return $proveedor;
        
    }
    
    static public function ctrGetDatosProveedor($NumeroDocumento){
            
        $proveedor = ProveedorModels::mdlGetDatosProveedor($NumeroDocumento);

        return $proveedor;

    }

}
    