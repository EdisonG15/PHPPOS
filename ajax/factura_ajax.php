<?php
require_once "../Controllers/factura_controllers.php";
require_once "../Models/factura_models.php";
// require_once "libs/xmlseclibs/src/XMLSecurityKey.php";
// require_once "libs/xmlseclibs/src/XMLSecurityKey.php";
// require_once "libs/xmlseclibs/xmlseclibs.php";
require_once __DIR__ . '/../libs/xmlseclibs/XMLSecurityKey.php';
require_once __DIR__ . '/../libs/xmlseclibs/XMLSecurityDSig.php';
require_once __DIR__ . '/../libs/xmlseclibs/XMLSecEnc.php';
require_once __DIR__ . '/../libs/xmlseclibs/Utils/XPath.php';

use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;


// use RobRichards\XMLSecLibs\XMLSecurityDSig;
// $testPath = __DIR__ . '/../libs/xmlseclibs/XMLSecurityKey.php';
// if (file_exists($testPath)) {
//     echo "Ruta correcta: $testPath<br>";
// } else {
//     echo "Archivo no encontrado: $testPath<br>";
// }

// if (class_exists('RobRichards\XMLSecLibs\XMLSecurityKey')) {
//     echo "Clase XMLSecurityKey cargada correctamente";
// } else {
//     echo "Clase XMLSecurityKey **NO** cargada";
// }

//     function generarClaveAcceso($fechaEmision, $tipoComprobante, $ruc, $ambiente, $establecimiento, $ptoEmision,
//        $secuencial, $codigoNumerico, $tipoEmision) {
//         // Formatear fecha (DDMMYYYY)
//        $fecha = date('dmY', strtotime($fechaEmision));
    
//         // Construir clave sin el dígito verificador
//       $clave = $fecha
//         . str_pad($tipoComprobante, 2, '0', STR_PAD_LEFT)
//         . str_pad($ruc, 13, '0', STR_PAD_LEFT)
//         . $ambiente
//         . str_pad($establecimiento, 3, '0', STR_PAD_LEFT)
//         . str_pad($ptoEmision, 3, '0', STR_PAD_LEFT)
//         . str_pad($secuencial, 9, '0', STR_PAD_LEFT)
//         . str_pad($codigoNumerico, 8, '0', STR_PAD_LEFT)
//         . $tipoEmision;
    
//        // Agregar dígito verificador
//       $digitoVerificador = calcularDigitoVerificador($clave);
//       return $clave . $digitoVerificador;
//    }

//     function calcularDigitoVerificador($clave) {
//       $multiplicadores = [2,3,4,5,6,7];
//       $suma = 0;
//       $claveInvertida = strrev($clave);
    
//       for ($i = 0; $i < strlen($claveInvertida); $i++) {
//         $suma += intval($claveInvertida[$i]) * $multiplicadores[$i % count($multiplicadores)];
//       }

//       $modulo = 11 - ($suma % 11);
//       if ($modulo == 11) return 0;
//       if ($modulo == 10) return 1;
//       return $modulo;
//    }

   
  function construirXMLFactura($datosEmpresa, $datosCliente, $detalleVenta, $claveAcceso, $fechaEmision, $numeroFactura) {
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    // Elemento raíz
    $factura = $xml->createElement('factura');
    $factura->setAttribute('id', 'comprobante');
    $factura->setAttribute('version', '1.0.0');
    $xml->appendChild($factura);

    // infoTributaria
    $infoTributaria = $xml->createElement('infoTributaria');
    $infoTributaria->appendChild($xml->createElement('ambiente',  $datosEmpresa['ambiente'])); // 1=Pruebas, 2=Producción
    $infoTributaria->appendChild($xml->createElement('tipoEmision', $datosEmpresa['tipo_emision']));
    $infoTributaria->appendChild($xml->createElement('razonSocial', $datosEmpresa['razon_social_empresa']));
    $infoTributaria->appendChild($xml->createElement('nombreComercial', $datosEmpresa['nombre_comercial']));
    $infoTributaria->appendChild($xml->createElement('ruc', $datosEmpresa['ruc']));
    $infoTributaria->appendChild($xml->createElement('claveAcceso', $claveAcceso));
    $infoTributaria->appendChild($xml->createElement('codDoc', $datosEmpresa['TipoDocumento'])); // 01 = Factura
    $infoTributaria->appendChild($xml->createElement('estab', $datosEmpresa['establecimiento_codigo']));
    $infoTributaria->appendChild($xml->createElement('ptoEmi', $datosEmpresa['pto_emision']));
    $infoTributaria->appendChild($xml->createElement('secuencial', $numeroFactura));
    $infoTributaria->appendChild($xml->createElement('dirMatriz', $datosEmpresa['direccion_matriz']));
    $factura->appendChild($infoTributaria);

    // infoFactura
    $infoFactura = $xml->createElement('infoFactura');
    $infoFactura->appendChild($xml->createElement('fechaEmision', $fechaEmision));
    $infoFactura->appendChild($xml->createElement('dirEstablecimiento', $datosEmpresa['direccion_establecimiento']));
    $infoFactura->appendChild($xml->createElement('contribuyenteEspecial',   $datosEmpresa['contribuyenteEspecial']));
    $infoFactura->appendChild($xml->createElement('obligadoContabilidad',  $datosEmpresa['obligadoContabilidad']));
    $infoFactura->appendChild($xml->createElement('tipoIdentificacionComprador', $datosCliente['tipo_identificacion']));
    $infoFactura->appendChild($xml->createElement('razonSocialComprador', $datosCliente['razon_social']));
    $infoFactura->appendChild($xml->createElement('identificacionComprador', $datosCliente['identificacion']));
    $infoFactura->appendChild($xml->createElement('totalSinImpuestos', $datosCliente['total_sin_impuestos']));
    $infoFactura->appendChild($xml->createElement('totalDescuento', $datosCliente['total_descuento']));

    // Total con impuestos
    $totalConImpuestos = $xml->createElement('totalConImpuestos');
    $totalImpuesto = $xml->createElement('totalImpuesto');
    $totalImpuesto->appendChild($xml->createElement('codigo', '2')); // 2 = IVA, 3=ICE,5=IRBPNR
    $totalImpuesto->appendChild($xml->createElement('codigoPorcentaje', $datosEmpresa['codigoPorcentaje'])); // 2 = 12% ,3=14%,4=15%
    $totalImpuesto->appendChild($xml->createElement('baseImponible', $datosCliente['base_imponible']));
    $totalImpuesto->appendChild($xml->createElement('valor', $datosCliente['valor_iva']));
    $totalConImpuestos->appendChild($totalImpuesto);
    $infoFactura->appendChild($totalConImpuestos);

    $infoFactura->appendChild($xml->createElement('propina', '0.00'));
    $infoFactura->appendChild($xml->createElement('importeTotal', $datosCliente['importe_total']));
    $infoFactura->appendChild($xml->createElement('moneda', 'DOLAR')); // puedes cambiar si es otra moneda
    $factura->appendChild($infoFactura);

    // detalles
    $detalles = $xml->createElement('detalles');
    foreach ($detalleVenta as $detalle) {
        $detalleTag = $xml->createElement('detalle');
        $detalleTag->appendChild($xml->createElement('codigoPrincipal', $detalle['codigo']));
        $detalleTag->appendChild($xml->createElement('descripcion', $detalle['descripcion']));
        $detalleTag->appendChild($xml->createElement('cantidad', $detalle['cantidad']));
        $detalleTag->appendChild($xml->createElement('precioUnitario', $detalle['precio_unitario']));
        $detalleTag->appendChild($xml->createElement('descuento', $detalle['descuento']));
        $detalleTag->appendChild($xml->createElement('precioTotalSinImpuesto', $detalle['subtotal']));

        $impuestos = $xml->createElement('impuestos');
        $impuesto = $xml->createElement('impuesto');
        $impuesto->appendChild($xml->createElement('codigo', '2'));
        $impuesto->appendChild($xml->createElement('codigoPorcentaje', $datosEmpresa['codigoPorcentaje']));
        $impuesto->appendChild($xml->createElement('tarifa',  $datosEmpresa['tarifa']));// 12, 15,14
        $impuesto->appendChild($xml->createElement('baseImponible', $detalle['subtotal']));
        $impuesto->appendChild($xml->createElement('valor', $detalle['iva']));
        $impuestos->appendChild($impuesto);

        $detalleTag->appendChild($impuestos);
        $detalles->appendChild($detalleTag);
    }
    $factura->appendChild($detalles);

    // infoAdicional (opcional)
    $infoAdicional = $xml->createElement('infoAdicional');

    $campoAdicional = $xml->createElement('campoAdicional', $datosCliente['correo']);
    $campoAdicional->setAttribute('nombre', 'Email');
    $infoAdicional->appendChild($campoAdicional);

    $factura->appendChild($infoAdicional);

    // Guardar XML
    $xml->save('xml/factura.xml');
    return $xml->saveXML();
  }


class AjaxFactura{
      public function   generarXMLFacturaSRI($id_venta)  {
    //  try {  
       $factura = ControllersFactura::ctrObtenerCabecera($id_venta);
       $factura = $factura[0];
      
       $detalleVenta = ControllersFactura::ctrObtenerDetalles($id_venta);

          // 3. Mapear los datos
       $datosEmpresa = [
            'razon_social_empresa' => $factura['razon_social_empresa'],
            'nombre_comercial' => $factura['nombre_comercial'],
            'ruc' => $factura['ruc'],
            'direccion_matriz' => $factura['direccion_matriz'],
            'direccion_establecimiento' => $factura['direccion_establecimiento'],
            // 'establecimiento' => $factura['establecimiento'],
            'pto_emision' => $factura['pto_emision'],
            'ambiente' => $factura['ambiente'],
            'tipo_emision' => $factura['tipo_emision'],
            'TipoDocumento' => $factura['TipoDocumento'],
            'establecimiento_codigo' => $factura['establecimiento_codigo'],
            'codigoPorcentaje' => $factura['codigoPorcentaje'],
            'tarifa' => $factura['tarifa'],
            'contribuyenteEspecial' => $factura['contribuyente_especial'],
            'obligadoContabilidad' => $factura['obligado_contabilidad']
           
       ];
    
       $datosCliente = [
             'tipo_identificacion' => $factura['tipo_identificacion'],
             'razon_social' => $factura['razon_social'],
             'identificacion' => $factura['identificacion'],
             'correo' => $factura['correo'],
             'total_sin_impuestos' => $factura['total_sin_impuestos'],
             'total_descuento' => $factura['total_descuento'],
             'base_imponible' => $factura['base_imponible'],
             'valor_iva' => $factura['valor_iva'],
             'importe_total' => $factura['importe_total']
       ];

      $fechaEmision = date('d/m/Y', strtotime($factura['fecha_emision']));
      $tipoComprobante = ($factura['TipoDocumento']);
      $ruc= $factura['ruc'];
      $ambiente= $factura['ambiente'];
      $establecimiento= $factura['establecimiento_codigo'];
      $ptoEmision= $factura['pto_emision'];
      $secuencial= $factura['nro_boleta'];
    // $secuencial= $factura['secuencial'];
      $codigoNumerico= '8';
      $numeroFactura=$factura['nro_boleta'];
      $tipoEmision= $factura['tipo_emision'];
   
      $claveAcceso = generarClaveAcceso($fechaEmision, $tipoComprobante, $ruc, $ambiente, $establecimiento, $ptoEmision,
      $secuencial, $codigoNumerico, $tipoEmision);
    //  echo json_encode($claveAcceso);
      $respuesta =  construirXMLFactura($datosEmpresa, $datosCliente, $detalleVenta, $claveAcceso, $fechaEmision, $numeroFactura);
  
    //  try {
        // Cargar el XML
        // funcion para frimar 
      //   $doc = new DOMDocument();
      //   $doc->load("xml/factura.xml");

      //   // Inicializar la firma
      //   $objDSig = new XMLSecurityDSig();
    
      //   $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
      //   $objDSig->addReference($doc, XMLSecurityDSig::SHA1);

      //    $privateKeyFile = "firma/private.key";      // salida del comando openssl
      //    $certificateFile = "firma/certificado.crt"; // salida del comando openssl

      //   $privateKey = file_get_contents($privateKeyFile);
      //   $certificate = file_get_contents($certificateFile);

      //   if (!$privateKey || !$certificate) {
      //    throw new Exception("No se pudo leer la clave privada o el certificado");
      //       }

      //     $certInfo = [
      //    'pkey' => $privateKey,
      //    'cert' => $certificate
      //      ];


      //   // Cargar la clave privada en xmlseclibs
      //   $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, ['type'=>'private']);
      //   $objKey->loadKey($certInfo['pkey'], false); // false = la clave ya está en formato de texto

      //   // Firmar y guardar
      //   $objDSig->sign($objKey);
      //   $objDSig->appendSignature($doc->documentElement);
      //   $doc->save("docfirmado/factura_firmada.xml");
      // /* fin de firmar */
        //  echo json_encode([
        //     'success' => true,
        //     'mensaje' => 'XML generado correctamente'
        //     // 'claveAcceso' => $claveAcceso ?? null
        // ]);
/************ */
// $wsdl = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl";

// // Leer el XML firmado
// $xmlFirmado = file_get_contents('docfirmado/FACTURA_PROPORCIONAL.xml');

// // Eliminar BOM si existe
// $xmlFirmado = preg_replace('/^\xEF\xBB\xBF/', '', $xmlFirmado);

// // Quitar espacios innecesarios
// $xmlFirmado = trim($xmlFirmado);

// // Guardar XML limpio (opcional para revisión)
// file_put_contents('docfirmado/factura_firmada_limpia.xml', $xmlFirmado);

// // Codificar en base64
// $xmlBase64 = base64_encode($xmlFirmado);

// try {
//     $client = new SoapClient($wsdl, [
//         'trace' => true,
//         'cache_wsdl' => WSDL_CACHE_NONE,
//     ]);

//     $params = [
//         'comprobante' => $xmlBase64,
//     ];

//     $response = $client->validarComprobante($params);

//     echo "<pre>";
//     print_r($response);
//     echo "</pre>";
// } catch (Exception $e) {
//     echo json_encode([
//         'success' => false,
//         'error' => 'Error al enviar la factura al SRI: ' . $e->getMessage(),
//     ]);
// }

/************************************ */
// --- 1. Definir el nombre del archivo XML que el servicio Node.js debe firmar ---
// Este archivo DEBE EXISTIR en la carpeta 'facturas_pendientes' del servidor Node.js.
// $xmlFileName = 'factura.xml';

// // --- 2. Preparar los datos para enviar al servicio Node.js ---
// // El servicio Node.js espera un JSON con la clave 'xmlFileName'.
// $postData = [
//     'xmlFileName' => $xmlFileName,
// ];

// // Codificar los datos a JSON
// $jsonData = json_encode($postData);

// // --- 3. Configurar y ejecutar la solicitud cURL ---
// $ch = curl_init('http://localhost:3000/firmar'); // URL de tu servicio Node.js

// // Configurar cURL para una solicitud POST
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devuelve la respuesta como string en lugar de imprimirla
// curl_setopt($ch, CURLOPT_POST, true);           // Configura la solicitud como POST
// curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Envía los datos JSON en el cuerpo de la solicitud

// // Establecer las cabeceras HTTP para indicar que el cuerpo es JSON
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($jsonData) // Es buena práctica enviar el Content-Length
// ]);

// $response = curl_exec($ch); // Ejecutar la solicitud

// // --- 4. Manejo de errores de cURL ---
// if (curl_errno($ch)) {
//     echo "❌ Error cURL al conectar con el servicio Node.js: " . curl_error($ch) . "\n";
//     curl_close($ch);
//     exit(); // Terminar el script si hay un error de conexión
// }

// curl_close($ch); // Cerrar la sesión cURL

// // --- 5. Decodificar y procesar la respuesta del servicio Node.js ---
// $res = json_decode($response, true);

// if (isset($res['ok']) && $res['ok'] === true) {
//     // El servicio Node.js ya guardó el archivo firmado.
//     // Aquí solo confirmamos el éxito.
//     echo "✅ Factura firmada correctamente en el servidor Node.js.\n";
//     echo "Mensaje del servicio: " . ($res['message'] ?? 'Sin mensaje específico.') . "\n";
// } else {
//     // Mostrar el error si el servicio Node.js reporta un problema
//     echo "❌ Error en el servicio de firma: " . ($res['error'] ?? 'Desconocido') . "\n";
//     echo "Respuesta completa del servicio (para depuración): " . $response . "\n";
// }

/*************************************** */
/** enviar el SRI */
// URL del WSDL del servicio de recepción del SRI
$wsdl = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl";

// Rutas de los archivos
$xmlFirmadoFilePath = 'docfirmado/firmado_factura.xml'; // Archivo XML firmado generado por Java
$zipFilePath = 'docfirmado/factura_firmada.zip';      // Archivo ZIP temporal

// --- 1. Leer el XML firmado ---
$xmlFirmadoContent = file_get_contents($xmlFirmadoFilePath);

if ($xmlFirmadoContent === false) {
    die("Error: No se pudo leer el archivo XML firmado en '$xmlFirmadoFilePath'.\n");
}

// Eliminar BOM si existe (buena práctica, aunque Java no debería añadirlo)
$xmlFirmadoContent = preg_replace('/^\xEF\xBB\xBF/', '', $xmlFirmadoContent);

// Quitar espacios innecesarios al inicio/fin del archivo
$xmlFirmadoContent = trim($xmlFirmadoContent);

// --- 2. Crear un archivo ZIP con el XML firmado ---
$zip = new ZipArchive();
if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    // Añadir el XML al ZIP. El nombre del archivo dentro del ZIP es importante,
    // a menudo es la clave de acceso + .xml, pero para la recepción, puede ser cualquier nombre.
    // Usaremos el nombre original del archivo XML.
    $zip->addFromString(basename($xmlFirmadoFilePath), $xmlFirmadoContent);
    $zip->close();
    echo "✅ Archivo XML comprimido a ZIP con éxito: $zipFilePath\n";
} else {
    die("❌ Error: No se pudo crear el archivo ZIP.\n");
}

// --- 3. Leer el contenido del archivo ZIP ---
$zipContent = file_get_contents($zipFilePath);

if ($zipContent === false) {
    die("Error: No se pudo leer el contenido del archivo ZIP.\n");
}

// --- 4. Codificar el contenido del ZIP en base64 ---
$zipBase64 = base64_encode($zipContent);

// --- 5. Enviar la solicitud SOAP al SRI ---
try {
    $client = new SoapClient($wsdl, [
        'trace' => true,        // Habilita el rastreo para depuración
        'cache_wsdl' => WSDL_CACHE_NONE, // No cachea el WSDL
        'soap_version' => SOAP_1_1, // El SRI suele usar SOAP 1.1
        'connection_timeout' => 30, // Tiempo de espera para la conexión
    ]);

    $params = [
        'xml' => $zipBase64, // El parámetro del servicio de recepción del SRI es 'xml', no 'comprobante'
    ];

    // Llamar al método 'validarComprobante' del servicio web del SRI
    $response = $client->validarComprobante($params);

    echo "<pre>";
    print_r($response);
    echo "</pre>";

} catch (SoapFault $e) {
    // Captura errores específicos de SOAP
    echo "❌ Error SOAP al enviar la factura al SRI:\n";
    echo "Mensaje: " . $e->getMessage() . "\n";
    echo "Código: " . $e->getCode() . "\n";
    echo "Request Headers:\n" . $client->__getLastRequestHeaders() . "\n";
    echo "Request:\n" . $client->__getLastRequest() . "\n";
    echo "Response Headers:\n" . $client->__getLastResponseHeaders() . "\n";
    echo "Response:\n" . $client->__getLastResponse() . "\n";
} catch (Exception $e) {
    // Captura otras excepciones
    echo "❌ Error general al enviar la factura al SRI: " . $e->getMessage() . "\n";
} finally {
    // Opcional: Eliminar el archivo ZIP temporal
    if (file_exists($zipFilePath)) {
        unlink($zipFilePath);
        echo "Archivo ZIP temporal eliminado.\n";
    }
}
}

}
if (isset($_POST['accion'])) {
    
    $accion = intval($_POST['accion']);
    $ajax = new AjaxFactura();

    switch ($accion) {

        case 1: // Mostrar categorías
            $ajax->generarXMLFacturaSRI($_POST["id_venta"] );
            break;

        default:
            echo json_encode(["error" => "Acción no válida"]);
            break;
    }
}

