<?php


class Controllers{


    static public function ctrMostrar(){
		
		$respuesta = Models::mdlMostrar();

		return $respuesta;
	
	}
	static public function ctrRegistrar($data, $file = null){
        // Define el directorio de destino para las imágenes cargadas
        // __DIR__ se refiere al directorio del archivo actual (controllers.php)
        // Por lo tanto, "../Views/assets/imagenes/logo/" es la ruta relativa desde aquí.
        $upload_dir = __DIR__ . "/../Views/assets/imagenes/imgUsuario/";

        // Asegúrate de que el directorio de carga exista
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Crea el directorio si no existe (con permisos 0755)
        }

$logo_path_for_db = ''; // Ruta del logo para la base de datos (por defecto vacía)

        // Si se subió un archivo y tiene nombre
        if ($file && $file['name']) {
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            // Genera un nombre de archivo único para evitar sobreescrituras
            $new_file_name = uniqid('logo_') . '.' . $file_extension;
            $target_file = $upload_dir . $new_file_name;

            // Mueve el archivo cargado del directorio temporal a tu destino
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                // Guarda la ruta relativa en la base de datos
                // Esta ruta es la que tu servidor web usará para mostrar la imagen
                $logo_path_for_db = "Views/assets/imagenes/imgUsuario/" . $new_file_name;
            } else {
                return ["status" => "error", "message" => "Error al mover el archivo de logo."];
            }
        } else {
            // No se subió un nuevo archivo. Usar la ruta existente o vacía.
            // Asegúrate de que 'logo_path_current' sea el nombre que envías desde el frontend
            if (isset($data['logo_path_current']) && !empty($data['logo_path_current'])) {
                $logo_path_for_db = $data['logo_path_current'];
            } else {
                $logo_path_for_db = ''; // No hay logo existente y no se subió uno nuevo
            }
        }

        
                // Prepara los datos para el modelo, incluyendo la ruta del logo
        // Asegúrate de que las claves aquí coincidan con tus columnas de base de datos y parámetros del SP
       
        // 2. Preparar los datos para el modelo, incluyendo el ID de empresa y la ruta final del logo
        $usuario_data = [
            "id_usuario"         => empty($data["id_usuario"]) ? null : (int)$data["id_usuario"], // Importante: null para INSERT, int para UPDATE
            "username"       => $data["username"],
            "email"   => $data["email"],
            "password"                => $data["password"],
            "confirmPassword"              => $data["confirmPassword"],
            "firstName"           => $data["firstName"], // Asegúrate de castear a int
            "lastName"   => $data["lastName"],
            "cedula" => $data["cedula"],
            "mobile"              => $data["mobile"],
            "address"           => $data["address"],
            "landmark"            => $data["landmark"],
            "city" => $data["city"],
            "selPerfil" => $data["selPerfil"],
            "selCaja"           => $data["selCaja"],
            "logo_path"          => $logo_path_for_db
        ];


		$respuesta = Models::mdlRegistrar( $usuario_data);
	
		return $respuesta;
	}


	static public function ctrEliminar($table, $data, $id, $nameId){
		
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
		return $respuesta;
	}

    // static public function ctrListarUsuarios(){
    
    //     $usuarios = UsuariosModelo::mdlListarUsuarios();
       
    //     return $usuarios;
    
    // }    
   
    // static public function ctrRegistrarUsuarios($Cedula,$Nombres, $Apellidos,$Telefono, $Direccion, $Correo, $Usuario, $Clave, $IdRol,$IdCaja  ,$Activo ){

    //     $registroUsuarios = UsuariosModelo::mdlRegistrarUsuarios($Cedula,$Nombres, $Apellidos,$Telefono, $Direccion, $Correo, $Usuario, $Clave, $IdRol,$IdCaja ,$Activo    );
   
    //      return $registroUsuarios;
    //       }
          
    //       static public function ctrActualizarUsuarios($table, $data, $id, $nameId){
           
    //        $respuesta = UsuariosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
           
    //        return $respuesta;
    //    }
      
   
    //    static public function ctrEliminarUsuarios($table, $data, $id, $nameId){
           
    //        $respuesta = UsuariosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
           
    //        return $respuesta;
    //    }
    //    static public function ctrVerificaSiExiste($VerificaExiste,$VerificaExiste1){

    //     $respuesta = UsuariosModelo::mdlVerificaSiExiste($VerificaExiste,$VerificaExiste1);
    //     // static public function ctrVerificaSiExiste($VerificaExiste){
    //         // printf("SI INGRESAS cotrolller");

    //     $respuesta = UsuariosModelo::mdlVerificaSiExiste($VerificaExiste,$VerificaExiste1);
    
    //     return $respuesta;
    // }
   

}