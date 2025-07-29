<?php
// Configuración de PHP para evitar errores que corrompan el JSON en producción
ini_set('display_errors', 0); // Deshabilita la visualización de errores en la salida
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // Reporta todos los errores EXCEPTO NOTICES y WARNINGS

// Asegurarse de que el navegador sepa que la respuesta es JSON
header('Content-Type: application/json');

require_once "../Models/carga_masiva.models.php"; // Asegúrate que la ruta sea correcta
require_once "../vendor/autoload.php"; // Asegúrate que la ruta sea correcta

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date; // Importar la clase Date

class AjaxCargaMasivaProductos {

    public function procesarCargaMasiva() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_FILES['archivo_excel']) || $_FILES['archivo_excel']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['status' => 'error', 'mensaje' => 'No se recibió ningún archivo o hubo un error en la subida.']);
            return;
        }

        $inputFileName = $_FILES['archivo_excel']['tmp_name'];
        $spreadsheet = null;

        try {
            $spreadsheet = IOFactory::load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet();

            // *** INICIO DEL CAMBIO CRÍTICO para leer solo el rango de datos ***
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            
            // Define el rango de datos a leer, desde la fila 2 (A2) hasta la última fila
            // Esto asume que la fila 1 siempre son los encabezados y tus datos comienzan en la fila 2.
            $dataRange = 'A3:' . $highestColumn . $highestRow;
            $data = $sheet->rangeToArray(
                $dataRange,
                null,     // $nullValue: Valor a usar para celdas vacías
                true,     // $calculateFormulas: Calcular fórmulas si las hay
                true,     // $dataOnly: Obtener solo el valor de la celda (importante para fechas como números)
                true      // $formatData: Aplicar formato de celda (ej. números como float)
            );
            // *** FIN DEL CAMBIO CRÍTICO ***


            $rowsProcessed = 0; // Se refiere a las filas de DATOS reales que se intentan procesar
            $rowsSuccess = 0;
            $rowsWarning = 0;
            $rowsError = 0;
            $messages = [];

            $id_usuario_actual = $_SESSION["usuario"]->id_usuario ?? 0;
            
            // Ya no necesitamos $firstDataRow = 2; ni el `if ($row_excel_number < $firstDataRow)`
            // porque rangeToArray ya excluyó la primera fila (los encabezados).
            
            // Iterar sobre las filas de datos. PhpSpreadsheet::rangeToArray() devuelve un array 0-indexado
            // donde el primer elemento (índice 0) corresponde a la primera fila del rango especificado (fila 2 de Excel)
            foreach ($data as $rowIndex => $rowData) {
                // Calcular el número de fila original de Excel para los mensajes (fila Excel = $rowIndex + 2)
                $row_excel_number = $rowIndex + 2; 
              file_put_contents("debug_log.txt", print_r($rowData, true), FILE_APPEND);
                // Saltar filas completamente vacías (aún es una buena práctica por si hay filas vacías entre datos)
                if (empty(array_filter($rowData))) {
                    continue; 
                }

                // Ahora $rowData contiene los datos de una fila real de tu Excel.
                $rowsProcessed++; 
                
                // Inicializa variables para la fila actual ANTES de las validaciones
                $fila_ok = true;
                $mensaje_fila_prefix = "Fila $row_excel_number (C&oacute;digo: " . (trim($rowData['A'] ?? '')) . "): ";
                $mensaje_fila = $mensaje_fila_prefix; 

                // ******** VALIDACIONES CLAVE *********

                // 1. Validar Código de Barra (Columna A)
                $codigo_barra = trim($rowData['A'] ?? '');
                if (empty($codigo_barra)) { 
                    $mensaje_fila .= "El C&oacute;digo de Barra es obligatorio. ";
                    $fila_ok = false;
                }

                // 2. Validar ID de Categoría (Columna B)
                $id_categoria_producto = (int) ($rowData['B'] ?? 0);
                if ($id_categoria_producto <= 0) { 
                    $mensaje_fila .= "El ID de Categor&iacute;a es inv&aacute;lido o no existe. ";
                    $fila_ok = false;
                }

                // 3. Validar ID de Marca (Columna C)
                $id_marca_producto = (int) ($rowData['C'] ?? 0);
                if ($id_marca_producto <= 0) { 
                    $mensaje_fila .= "El ID de Marca es inv&aacute;lido o no existe. ";
                    $fila_ok = false;
                }

                // 4. Validar ID de Unidad de Medida (Columna D)
                $id_unidades = (int) ($rowData['D'] ?? 0);
                if ($id_unidades <= 0) { 
                    $mensaje_fila .= "El ID de Unidad de Medida es inv&aacute;lido o no existe. ";
                    $fila_ok = false;
                }
                
                // 5. Validar Precio de Compra (Columna G)
                $precio_compra_producto = (float) str_replace(',', '', ($rowData['G'] ?? 0.00));
                if ($precio_compra_producto <= 0 && (float)str_replace(',', '', ($rowData['H'] ?? 0.00)) <= 0) { 
                    $mensaje_fila .= "El Precio de Compra o Venta debe ser mayor a cero. ";
                    $fila_ok = false;
                }

                // 6. Manejo de Fecha de Vencimiento (Columna O)
                $fecha_vencimiento = null;
                // Si la columna N (chkPerecedero) es 1, la fecha de vencimiento es obligatoria
                if ((int) ($rowData['N'] ?? 0) === 1) { 
                    if (!empty($rowData['O'])) {
                        $excelDateValue = $rowData['O'];

                        if (is_numeric($excelDateValue)) {
                            // Si es numérico, es un número serial de Excel, usar excelToDateTimeObject
                            try {
                                $dateObj = Date::excelToDateTimeObject($excelDateValue);
                                $fecha_vencimiento = $dateObj->format('Y-m-d');
                            } catch (Exception $e) {
                                $mensaje_fila .= "Formato de Fecha de Vencimiento num&eacute;rico inv&aacute;lido. ";
                                $fila_ok = false;
                            }
                        } elseif (is_string($excelDateValue) && strtotime($excelDateValue) !== false) {
                            // Si es una cadena y strtotime puede parsearla, usar strtotime
                            $fecha_vencimiento = date('Y-m-d', strtotime($excelDateValue));
                        } else {
                            // No es numérico ni una cadena de fecha válida
                            $mensaje_fila .= "Formato de Fecha de Vencimiento inv&aacute;lido. ";
                            $fila_ok = false;
                        }
                    } else {
                        $mensaje_fila .= "La Fecha de Vencimiento es obligatoria para productos perecederos. ";
                        $fila_ok = false;
                    }
                }
                // FIN DE LAS VALIDACIONES

                // Si alguna validación falló, agrega el error y salta a la siguiente fila
                if (!$fila_ok) {
                    $messages[] = ['status' => 'error', 'mensaje' => $mensaje_fila . "Fila omitida."];
                    $rowsError++;
                    continue; // Pasa a la siguiente fila del Excel sin llamar al modelo
                }

                // Construcción de $datosProducto con las variables validadas y convertidas
                $datosProducto = [
                    'id_producto'           => (int) ($rowData['P'] ?? 0), 
                    'iptCodigoReg'          => $codigo_barra,              
                    'selCategoriaReg'       => $id_categoria_producto,    
                    'selMarcaReg'           => $id_marca_producto,        
                    'selMedidasReg'         => $id_unidades,              
                    'iptDescripcionReg'     => trim($rowData['E'] ?? ''), 
                    'logo_path'             => trim($rowData['F'] ?? ''), 
                    'iptPrecioCompraReg'    => $precio_compra_producto,   
                    'iptPrecioVentaReg'     => (float) str_replace(',', '', ($rowData['H'] ?? 0.00)), 
                    'iptPrecio1'            => (float) str_replace(',', '', ($rowData['I'] ?? 0.00)),  
                    'iptPrecio2'            => (float) str_replace(',', '', ($rowData['J'] ?? 0.00)),  
                    'chkIva'                => (int) ($rowData['K'] ?? 0),  
                    'iptStockReg'           => (float) str_replace(',', '', ($rowData['L'] ?? 0.00)),  
                    'iptMinimoStockReg'     => (float) str_replace(',', '', ($rowData['M'] ?? 0.00)), 
                    'chkPerecedero'         => (int) ($rowData['N'] ?? 0),  
                    'iptFechaVencimiento'   => $fecha_vencimiento,          
                    'id_usuario'            => $id_usuario_actual
                ];

                // Llamada al modelo para guardar los datos
                $respuestaModelo = CargaMasivaModelo::mdlGuardarCargaMasiva($datosProducto);

                $modelStatus = $respuestaModelo['status'] ?? 'error';
                $modelMessage = $respuestaModelo['mensaje'] ?? 'Mensaje de respuesta del modelo no disponible.';

                if ($modelStatus == 'success' || $modelStatus == 'ok') {
                    $rowsSuccess++;
                    $messages[] = ['status' => 'success', 'mensaje' => $mensaje_fila_prefix . $modelMessage];
                } elseif ($modelStatus == 'warning') {
                    $rowsWarning++;
                    $messages[] = ['status' => 'warning', 'mensaje' => $mensaje_fila_prefix . $modelMessage];
                } else {
                    $rowsError++;
                    $messages[] = ['status' => 'error', 'mensaje' => $mensaje_fila_prefix . $modelMessage];
                }
            } // Fin del foreach

            // Respuesta final después de procesar todas las filas
            echo json_encode([
                'status' => $rowsError > 0 ? 'error' : ($rowsWarning > 0 ? 'warning' : 'success'),
                'mensaje' => "Carga masiva finalizada. Procesadas: $rowsProcessed, Éxito: $rowsSuccess, Advertencias: $rowsWarning, Errores: $rowsError.",
                'detalles' => $messages
            ]);

        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            echo json_encode(['status' => 'error', 'mensaje' => 'Error al leer el archivo Excel. Asegúrese de que es un archivo .xlsx o .xls válido. Mensaje: ' . $e->getMessage()]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'mensaje' => 'Error inesperado al procesar la carga masiva: ' . $e->getMessage()]);
        } finally {
            if ($spreadsheet) {
                unset($spreadsheet); // Liberar memoria
            }
        }
    }
}

// Para manejar la solicitud AJAX
if (isset($_POST["accion"]) && $_POST["accion"] == "cargar_masiva_productos") {
    $cargaMasiva = new AjaxCargaMasivaProductos();
    $cargaMasiva->procesarCargaMasiva();
}