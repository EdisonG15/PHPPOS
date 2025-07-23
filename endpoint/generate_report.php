<?php
header('Content-Type: application/json'); // Default content type for success/error messages

$apiBaseUrl = 'http://localhost:9092/api/reportes'; // Replace with your Spring Boot API base URL

$reportType = $_POST['reportType'] ?? '';

switch ($reportType) {
    case 'historialVentas':
        $fechaInicio = $_POST['fechaInicio'] ?? '';
        $fechaFin = $_POST['fechaFin'] ?? '';
        $apiUrl = $apiBaseUrl . '/ventas/historial';
        $postFields = ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin];
        break;
    case 'ganancias':
        $fechaInicio = $_POST['fechaInicio'] ?? '';
        $fechaFin = $_POST['fechaFin'] ?? '';
        $apiUrl = $apiBaseUrl . '/reporte/ganacias';
        $postFields = ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin];
        break;
    case 'movimientoDiario':
        $fechaInicio = $_POST['fechaInicio'] ?? '';
        $fechaFin = $_POST['fechaFin'] ?? '';
        $apiUrl = $apiBaseUrl . '/reporte/movimientoDiario';
        $postFields = ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin];
        break;
    case 'movimientoMes':
        $anio = $_POST['anio'] ?? '';
        $apiUrl = $apiBaseUrl . '/reporte/movimientoMes';
        $postFields = ['anio' => $anio];
        break;
    case 'arqueoCaja':
        $idArqueo = $_POST['idArqueo'] ?? '';
        $apiUrl = $apiBaseUrl . '/arqueo/imprimir';
        $postFields = ['idArqueo' => $idArqueo];
        break;
    default:
        echo json_encode(['success' => false, 'message' => 'Tipo de reporte no válido o no seleccionado.']);
        exit;
}

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields)); // Send data as application/x-www-form-urlencoded
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

// Execute cURL and get the response
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

// Check for cURL errors
if (curl_errno($ch)) {
    echo json_encode(['success' => false, 'message' => 'Error al conectar con el servidor de reportes: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// If the API returns a PDF, set the correct headers
if ($httpCode == 200 && strpos($contentType, 'application/pdf') !== false) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=' . basename($apiUrl) . '.pdf'); // Use API path as base filename
    echo $response;
} else {
    // Handle non-PDF responses (e.g., errors from Spring Boot)
    $errorDetails = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE && isset($errorDetails['message'])) {
        echo json_encode(['success' => false, 'message' => 'Error del servidor de reportes: ' . $errorDetails['message']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error inesperado del servidor de reportes.', 'details' => $response]);
    }
}
?>