<?php

require_once "conexion.php";

session_start();

class Models
{
    static public function mdlListarComprobante($fecha_inicio, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('CALL usp_consultar_ventas_con_estado_sri(:p_fechaInicio, :p_fechaFin)');

        $stmt->bindValue(":p_fechaInicio", !empty($fecha_inicio) ? $fecha_inicio : null, PDO::PARAM_STR);
        $stmt->bindValue(":p_fechaFin", !empty($fecha_fin) ? $fecha_fin : null, PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor(); // importante para procedimientos almacenados
        return $result;
    }
}

