<?php

require_once "conexion.php";

session_start();

class LoteModel{

    static public function mdlListarLote($CodigoBarra = null, $EstadoLote = null, $VisualizacionLote = null, $fechaDesde = null, $fechaHasta = null) {
    
    $procedimiento = ($VisualizacionLote == 1) ? 'usp_consultar_lotes_agrupados' : 'usp_consultar_lotes';
        // Asegurarse de que fechas vacías se conviertan a NULL
    $fechaDesde = ($fechaDesde === '') ? null : $fechaDesde;
    $fechaHasta = ($fechaHasta === '') ? null : $fechaHasta;

    $stmt = Conexion::conectar()->prepare("CALL $procedimiento(:p_estado, :p_fecha_inicio, :p_fecha_fin, :p_codigo_barra)");

    // Usar bindValue para permitir valores NULL correctamente
    $stmt->bindValue(":p_estado", $EstadoLote, is_null($EstadoLote) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(":p_fecha_inicio", $fechaDesde, is_null($fechaDesde) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(":p_fecha_fin", $fechaHasta, is_null($fechaHasta) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(":p_codigo_barra", $CodigoBarra, is_null($CodigoBarra) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $stmt = null;

    return $resultado;
}
}
