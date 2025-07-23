<?php
// En FacturacionElectronica.php (controlador
$rutaCompleta = $_GET['ruta'] ?? '';

$basePermitida = 'C:\\DocumentosApp\\';
if (stripos($rutaCompleta, $basePermitida) !== 0) {
    http_response_code(403);
    exit("Acceso denegado.");
}

if (!file_exists($rutaCompleta)) {
    http_response_code(404);
    exit("Archivo no encontrado.");
}

$nombreArchivo = basename($rutaCompleta);
$extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

// Definir content-type según extensión
switch ($extension) {
    case 'pdf':
        header('Content-Type: application/pdf');
        header("Content-Disposition: inline; filename=\"$nombreArchivo\"");
        break;
    case 'xml':
        header('Content-Type: application/xml');
        header("Content-Disposition: inline; filename=\"$nombreArchivo\"");
        break;
    default:
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=\"$nombreArchivo\"");
        break;
}

header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Content-Length: ' . filesize($rutaCompleta));
readfile($rutaCompleta);
exit;
