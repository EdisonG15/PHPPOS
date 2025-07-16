<?php


class ClientesControllers{
    

    static public function ctrListarClientes(){
    
        $clientes = ClientesModels::mdlListarClientes();
      
        return $clientes;
    
    }
    
    static public function ctrGuardar($IdCliente,$tipo_identificacion,$NumeroDocumento, $Nombre, $Apellido,
         $Direccion, $Telefono,$Email){

        $registroClientes = ClientesModels::mdlGuargar($IdCliente,$tipo_identificacion,$NumeroDocumento, $Nombre, 
        $Apellido, $Direccion, $Telefono,$Email);
   
         return $registroClientes;
    }
    
    static public function ctrEliminar($id){
           
           $respuesta = ClientesModels::mdlEliminar( $id);
           
           return $respuesta;
    }

    static public function ctrListarNombreClientes($busqueda){
       
        $clientes = ClientesModels::mdlListarNombreClientes($busqueda);

        return $clientes;
        
    }
    
    static public function ctrGetDatosClientes($NumeroDocumento){
            
        $clientes = ClientesModels::mdlGetDatosCliente($NumeroDocumento);

        return $clientes;

    }

}