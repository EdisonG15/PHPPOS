<?php

class UsuarioControlador{

    /* 
    Validar el acceso del usuario
    */
    public function login(){

        if(isset($_POST["loginUsuario"])){

            $usuario = $_POST["loginUsuario"];
            // $password = $_POST["loginPassword"];

            $password = $_POST["loginPassword"];
           
            // $password = hash('sha512', $password );
        //      $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
              
        //   $opcion=1;
            
        //     $respuesta = UsuarioModelo::mdlvalidar_licencia($usuario, $password, $ip, $opcion);
        $respuesta = UsuarioModelo::mdlIniciarSesion($usuario, $password);
            if(count($respuesta) > 0){

            //     $respuesta=0;
            //     $opcion=2;
            // $respuesta = UsuarioModelo::mdlvalidar_licencia($usuario, $password, $ip, $opcion);;

            // if(count($respuesta) > 0){

                $_SESSION["usuario"] = $respuesta[0];

                echo '
                    <script>
                        window.location = "http://localhost/WebPuntoVenta2025";
                    </script>
                
                ';
            // }else{

            //     echo '
            //         <script>
            //             fncSweetAlert("error","Usuario y/o password inválido","http://localhost/WebPuntoVenta2025");
            //         </script>
                
            //     ';
            // }
        } else {
            echo '
            <script>
                fncSweetAlert("error","Licencia No Activada en esta Maquina; comuniquese con su Proveedor","http://localhost/WebPuntoVenta");
            </script>
        
        ';
        }

        }
    }

    static public function ctrObtenerMenuUsuario($id_usuario){

        $menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($id_usuario);

        return $menuUsuario;
    }

    static public function ctrObtenerSubMenuUsuario($idMenu,$id_perfil_usuario){

        $subMenuUsuario = UsuarioModelo::mdlObtenerSubMenuUsuario($idMenu, $id_perfil_usuario);
        
        return $subMenuUsuario ;
    
    }

    

}