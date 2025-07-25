<?php

require_once "conexion.php";

class UsuarioModelo{

    static public function mdlIniciarSesion($usuario, $password){
       
        $stmt = Conexion::conectar()->prepare("select *
                                                from usuarios u 
                                                inner join perfiles p
                                                on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm
                                                on pm.id_perfil = u.id_perfil_usuario
                                                inner join modulos m
                                                on m.id = pm.id_modulo
                                                where u.usuario = :usuario
                                                and u.clave = :password
                                                and vista_inicio = 1");

        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
        $stmt = null;

    }


    static public function mdlvalidar_licencia($usuario, $password, $ip, $opcion){

        $stmt = Conexion::conectar()->prepare("call sp_validar_licencia(:p_usuario,:p_password,:p_ip,:p_opcion)");

        $stmt->bindParam(":p_usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":p_password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":p_ip", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":p_opcion", $opcion, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
        $stmt = null;

    }



    static public function mdlObtenerMenuUsuario($id_usuario){

        $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista,pm.vista_inicio
                                                from usuarios u inner join perfiles p on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm on pm.id_perfil = p.id_perfil
                                                inner join modulos m on m.id = pm.id_modulo
                                                where u.id_usuario = :id_usuario
                                                -- and m.padre_id =0
                                                and ( m.padre_id is null or  m.padre_id =0)
                                                order by m.orden");

        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);

        $stmt->execute();

	    return $stmt-> fetchAll(PDO::FETCH_CLASS);
        $stmt = null;
    }

    static public function mdlObtenerSubMenuUsuario($idMenu,$id_usuario){

        $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista,pm.vista_inicio
                                                from usuarios u inner join perfiles p on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm on pm.id_perfil = p.id_perfil
                                                inner join modulos m on m.id = pm.id_modulo
                                                where u.id_usuario = :id_usuario
                                                and m.padre_id = :idMenu
                                                order by m.id");
    
        $stmt->bindParam(":idMenu", $idMenu, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);
    
        $stmt->execute();
    
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
        $stmt = null;
        
    }

    

}