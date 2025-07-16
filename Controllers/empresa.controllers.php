<?php


class Controllers{

    static public function ctrListarEmpresas(){
    
        $empresa = Models::mdlListarEmpresas();
    
        return $empresa;
    
    }


    static public function ctrRegistrarEmpresa( $data, $file = null){
        // Define el directorio de destino para las imágenes cargadas
        // __DIR__ se refiere al directorio del archivo actual (controllers.php)
        // Por lo tanto, "../Views/assets/imagenes/logo/" es la ruta relativa desde aquí.
        $upload_dir = __DIR__ . "/../Views/assets/imagenes/logo/";

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
                $logo_path_for_db = "Views/assets/imagenes/logo/" . $new_file_name;
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
        $empresa_data = [
            "id_empresa"         => empty($data["id_empresa"]) ? null : (int)$data["id_empresa"], // Importante: null para INSERT, int para UPDATE
            "razon_social"       => $data["razon_social"],
            "nombre_comercial"   => $data["nombre_comercial"],
            "ruc"                => $data["ruc"],
            "marca"              => $data["marca"],
            "id_firma"           => (int)$data["id_firma"], // Asegúrate de castear a int
            "direccion_matriz"   => $data["direccion_matriz"],
            "direccion_sucursal" => $data["direccion_sucursal"],
            "email"              => $data["email"],
            "telefono"           => $data["telefono"],
            "mensaje"            => $data["mensaje"],
            "contribuyente_especial" => $data["contribuyente_especial"],
            "obligado_contabilidad" => $data["obligado_contabilidad"],
            "ambiente"           => $data["ambiente"],
            "tipo_emision"       => $data["tipo_emision"],
            "establecimiento_codigo" => $data["establecimiento_codigo"],
            "punto_emision_codigo" => $data["punto_emision_codigo"],
            "secuencial"         => (int)$data["secuencial"], // Asegúrate de castear a int
            "codigo_iva"         => (int)$data["codigo_iva"],   // Asegúrate de castear a int
            "logo_path"          => $logo_path_for_db
        ];
        // Llama a tu modelo para guardar los datos en la base de datos
        // Asumiendo que Model::mdlRegistrarEmpresa es el método que interactúa con tu SP
        $response_model = Models::mdlRegistrarEmpresa($empresa_data);

        return $response_model; // Devuelve la respuesta del modelo
    }

    static public function ctrEliminar($table, $data, $id, $nameId){
		
		$respuesta = Models::mdlActualizarInformacion($table, $data, $id, $nameId);
		
		return $respuesta;
	}

      }
        
   