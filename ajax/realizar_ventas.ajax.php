<?php
require_once "../Controllers/realizar_ventas.controllers.php";
require_once "../Models/realizar_ventas.models.php";



class AjaxVentas{

    public function ajaxObtenerNroBoleta(){

        $nroBoleta = VentasControlador::ctrObtenerNroBoleta();

        echo json_encode($nroBoleta,JSON_UNESCAPED_UNICODE);

    }

    public function ajaxRegistrarVenta($datos,$Id_caja,$IdCliente,$nro_boleta,$tipo_pago,
    $TipoDocumento, $descripcion_venta, $CantidadProducto,$CantidadTotal, $iva,
    $subtotal,$total_venta,$ImporteRecibido,$ImporteCambio,$nro_credito_venta,$fechaVencimiento){

        $registroVenta = VentasControlador::ctrRegistrarVenta($datos,$Id_caja,$IdCliente,
        $nro_boleta,$tipo_pago, $TipoDocumento, $descripcion_venta, $CantidadProducto,$CantidadTotal,$iva,
        $subtotal,$total_venta,$ImporteRecibido,
        $ImporteCambio,$nro_credito_venta,$fechaVencimiento);
        echo json_encode($registroVenta,JSON_UNESCAPED_UNICODE);

    }
    public function ajaxListarVentas($fechaDesde, $fechaHasta){

        $ventas = VentasControlador::ctrListarVentas($fechaDesde, $fechaHasta);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

    public function ajaxObtenerDetalleFacturaVentas($nro_boleta, $opcion){

        $ventas = VentasControlador::ctrObtenerDetalleFacturaVentas($nro_boleta,$opcion);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }
    public function ajaxEliminarVentas($nroBoleta,$id_usuario){
        $respuesta = VentasControlador::ctrEliminarVentas($nroBoleta,$id_usuario);  

        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

    }

// public function AjaxGenerarTicketVenta($nro_boleta)
// {
//     require('../Views/assets/plugins/fpdf/fpdf.php');

//     $pdf = new FPDF($orientation = 'P', $unit = 'mm', array(80, 258));
//     $pdf->AddPage();
//     $pdf->setMargins(4, 10, 4);

//     # Datos de la empresa
//     $Empresa = VentasControlador::ctrObtenerDatosDelaEmpresa();

//     foreach ($Empresa as $empre) {
//         $razon_social = $empre["razon_social"];
//         $ruc          = $empre["ruc"];
//         $direccion    = $empre["direccion"];
//         $telefono     = $empre["telefono"];
//         $email        = $empre["email"];
//         $mensaje      = $empre["mensaje"];
//         $iva          = $empre["iva"];
//     }

//     # Datos de la venta
//     $productos = VentasControlador::ctrObtenerDetalleVenta($nro_boleta);
//     foreach ($productos as $pr) {
//         $fechaventa        = $pr["fechaVentas"];
//         $numerocaja        = $pr["numero_caja"];
//         $nombrecajero      = $pr["nombre_cajero"];
//         $nombrecliente     = $pr["nombre_cliente"];
//         $Documentocliente  = $pr["documento_cliente"];
//         $telefonocliente   = $pr["telefono_cliente"];
//         $direccioncliente  = $pr["direccion_cliente"];
//         $sub_total_cab     = $pr["subtotal_Cab"];
//         $iva_Cab           = $pr["iva_Cab"];
//         $total_pagar_cab   = $pr["total_ventas_cab"];
//         $total_pagado_Cab  = $pr["ImporteRecibido"];
//         $cambio_Cab        = $pr["ImporteCambio"];
//         $abono_credito     = $pr["abono_credito"];
//         $tipo_pago         = $pr["tipo_pago"];
//     }

//     # Logo (opcional)
//     if (file_exists('../Views/assets/imagenes/logo/logoempresa.jpg')) {
//         $pdf->Image('../Views/assets/imagenes/logo/logoempresa.jpg', 25, 10, 30);
//         $pdf->Ln(35);
//     }

//     # Encabezado empresa
//     $pdf->SetFont('Arial','B',12);
//     $pdf->Cell(0,5,utf8_decode(strtoupper($razon_social)),0,1,'C');
//     $pdf->SetFont('Arial','',9);
//     $pdf->MultiCell(0,5,utf8_decode("RUC: ".$ruc),0,'C');
//     $pdf->MultiCell(0,5,utf8_decode($direccion),0,'C');
//     $pdf->MultiCell(0,5,utf8_decode("Tel: ".$telefono),0,'C');
//     $pdf->MultiCell(0,5,utf8_decode($email),0,'C');

//     # Separador
//     $pdf->Cell(0,5,str_repeat("=",40),0,1,'C');
//    // $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');

//     # Datos del ticket
//     $pdf->SetFont('Arial','B',10);
//     $pdf->Cell(0,6,utf8_decode("TICKET N° ".$nro_boleta),0,1,'C');
//     $pdf->SetFont('Arial','',9);
//     $pdf->Cell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime($fechaventa))),0,1,'C');
//     // $pdf->Cell(0,5,utf8_decode("Caja: ".$numerocaja."  -  Cajero: ".$nombrecajero),0,1,'C');
//     $pdf->Cell(0,5,utf8_decode("Caja: ".$numerocaja),0,1,'C');
//     $pdf->Cell(0,5,utf8_decode("Cajero: ".$nombrecajero),0,1,'C');


//    // $pdf->Cell(0,5,str_repeat("-",40),0,1,'C');
// $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');
//     # Cliente
//     // $pdf->MultiCell(0,5,utf8_decode("Cliente: ".$nombrecliente),0,'L');
//   # Cliente
// $pdf->SetFont('Arial','',9);

// # Nombre del cliente
// $pdf->Cell(20, 5, utf8_decode("Cliente:"), 0, 0, 'L');  
// $pdf->Cell(0, 5, utf8_decode($nombrecliente), 0, 1, 'L'); // 0 = resto de línea, 1 = salto de línea

// # Documento del cliente
// $pdf->Cell(25, 5, utf8_decode("Documento:"), 0, 0, 'L');  
// $pdf->Cell(0, 5, utf8_decode($Documentocliente), 0, 1, 'L');

// # Teléfono del cliente
// $pdf->Cell(20, 5, utf8_decode("Teléfono:"), 0, 0, 'L');  
// $pdf->Cell(0, 5, utf8_decode($telefonocliente), 0, 1, 'L');

// # Dirección del cliente
// $pdf->Cell(20, 5, utf8_decode("Dirección:"), 0, 0, 'L');  
// $pdf->Cell(0, 5, utf8_decode($direccioncliente), 0, 1, 'L');

//     // $pdf->Cell(0,5,str_repeat("-",40),0,1,'C');
// $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');
//     # Tabla de productos
//     $pdf->SetFont('Arial','B',9);
//     $pdf->Cell(25,5,"Producto",0,0,'L');
//     $pdf->Cell(12,5,"Cant.",0,0,'C');
//     $pdf->Cell(15,5,"Precio",0,0,'C');
//     $pdf->Cell(20,5,"Total",0,1,'C');
//     $pdf->SetFont('Arial','',8);

//     // $total = 0;
//     foreach ($productos as $pro) {
//         $descripcion_producto = utf8_decode($pro["descripcion_producto"]);
//         $limite_caracteres = 12;
//         if (strlen($descripcion_producto) > $limite_caracteres) {
//             $descripcion_para_mostrar = substr($descripcion_producto, 0, $limite_caracteres) . '...';
//         } else {
//             $descripcion_para_mostrar = $descripcion_producto;
//         }

//         $pdf->Cell(25,4,$descripcion_para_mostrar,0,0,'L');
//         $pdf->Cell(12,4,$pro["cantidad"],0,0,'C');
//         // $pdf->Cell(20,4,"$. ".number_format($pro["Sub_total"],2,".",","),0,1,'C');
//         $pdf->Cell(15,4,"$. ".number_format($pro["PrecioUnidad"],2,".",","),0,0,'C');
//         $pdf->Cell(20,4,"$. ".number_format($pro["total_ventas_producto"],2,".",","),0,1,'C');
//         // $total += $pro["cantidad"] * $pro["PrecioUnidad"];
//     }
//     $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');

//     # Totales
//     $pdf->Cell(35,5,"TOTAL",0,0,'R');
//     $pdf->Cell(35,5,"$. ".ROUND($total_pagar_cab,2),0,1,'R');
//     $pdf->Cell(35,5,"SUBTOTAL",0,0,'R');
//     $pdf->Cell(35,5,"$. ".ROUND($sub_total_cab,2),0,1,'R');

//     $pdf->Cell(35,5,$iva,0,0,'R');
//     $pdf->Cell(35,5,"$. ".ROUND($iva_Cab,2),0,1,'R');

//     $pdf->Cell(0,5,str_repeat("=",40),0,1,'C');

//     # TOTAL destacado
//     $pdf->SetFont('Arial','B',11);
//     $pdf->Cell(35,8,"TOTAL A PAGAR",0,0,'R');
//     $pdf->Cell(35,8,"$. ".ROUND($total_pagar_cab,2),0,1,'R');
//     $pdf->SetFont('Arial','',9);

//     if ($tipo_pago ==='CREDITO'){
//         $pdf->Cell(35,5,"TOTAL PAGADO",0,0,'R');
//         $pdf->Cell(35,5,"$. ".ROUND($abono_credito,2),0,1,'R');
//         $pdf->Cell(35,5,"SALDO RESTANTE",0,0,'R');
//         $pdf->Cell(35,5,"$. ".(ROUND($total_pagar_cab,2)-ROUND($abono_credito,2)),0,1,'R');
//     } else {
//         $pdf->Cell(35,5,"EFECTIVO RECIBIDO",0,0,'R');
//         $pdf->Cell(35,5,"$. ".ROUND($total_pagado_Cab,2),0,1,'R');
//         $pdf->Cell(35,5,"CAMBIO",0,0,'R');
//         $pdf->Cell(35,5,"$. ".ROUND($cambio_Cab,2),0,1,'R');
//     }

//     $pdf->Cell(35,5,"USTED AHORRA",0,0,'R');
//     $pdf->Cell(35,5,"$0.00",0,1,'R');

//     $pdf->Ln(10);
//     $pdf->MultiCell(0,5,utf8_decode($mensaje),0,'C',false);
//     $pdf->SetFont('Arial','B',9);
//     $pdf->Cell(0,7,utf8_decode("¡Gracias por su compra!"),0,1,'C');

//     # Footer con QR opcional
//     if (file_exists('../Views/assets/img/qr.png')) {
//         $pdf->Image('../Views/assets/img/qr.png', 25, $pdf->GetY(), 30);
//         $pdf->Ln(35);
//     }
//     $pdf->SetFont('Arial','I',8);
//     $pdf->MultiCell(0,5,utf8_decode("Síguenos en nuestras redes sociales para promociones"),0,'C');

//     $pdf->Output();
// }

    public function AjaxGenerarTicketVenta($nro_boleta)
{
    require('../Views/assets/plugins/fpdf/fpdf.php');

    $pdf = new FPDF($orientation = 'P', $unit = 'mm', array(80, 258));
    $pdf->AddPage();
    $pdf->setMargins(4, 10, 4);

    # Datos de la empresa
    $Empresa = VentasControlador::ctrObtenerDatosDelaEmpresa();
    foreach ($Empresa as $empre) {
        $razon_social = $empre["razon_social"];
        $ruc          = $empre["ruc"];
        $direccion    = $empre["direccion"];
        $telefono     = $empre["telefono"];
        $email        = $empre["email"];
        $mensaje      = $empre["mensaje"];
        $iva          = $empre["iva"];
    }

    # Datos de la venta
    $productos = VentasControlador::ctrObtenerDetalleVenta($nro_boleta);
    foreach ($productos as $pr) {
        $fechaventa        = $pr["fechaVentas"];
        $numerocaja        = $pr["numero_caja"];
        $nombrecajero      = $pr["nombre_cajero"];
        $nombrecliente     = $pr["nombre_cliente"];
        $Documentocliente  = $pr["documento_cliente"];
        $telefonocliente   = $pr["telefono_cliente"];
        $direccioncliente  = $pr["direccion_cliente"];
        $sub_total_cab     = $pr["subtotal_Cab"];
        $iva_Cab           = $pr["iva_Cab"];
        $total_pagar_cab   = $pr["total_ventas_cab"];
        $total_pagado_Cab  = $pr["ImporteRecibido"];
        $cambio_Cab        = $pr["ImporteCambio"];
        $abono_credito     = $pr["abono_credito"];
        $tipo_pago         = $pr["tipo_pago"];
    }

    # Logo
    if (file_exists('../Views/assets/imagenes/logo/logoempresa.jpg')) {
        $pdf->Image('../Views/assets/imagenes/logo/logoempresa.jpg', 25, 10, 30);
        $pdf->Ln(35);
    }

    # Encabezado empresa
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,5,utf8_decode(strtoupper($razon_social)),0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: ".$ruc),0,'C');
    $pdf->MultiCell(0,5,utf8_decode($direccion),0,'C');
    $pdf->MultiCell(0,5,utf8_decode("Tel: ".$telefono),0,'C');
    $pdf->MultiCell(0,5,utf8_decode($email),0,'C');

    # Separador
    $pdf->Cell(0,5,str_repeat("=",40),0,1,'C');

    # Datos del ticket
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,6,utf8_decode("TICKET N° ".$nro_boleta),0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime($fechaventa))),0,1,'C');
    $pdf->Cell(0,5,utf8_decode("Caja: ".$numerocaja),0,1,'C');
    $pdf->Cell(0,5,utf8_decode("Cajero: ".$nombrecajero),0,1,'C');

    # Línea
    $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');

    # Cliente
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,5,"CLIENTE",0,1,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(20,5,"Nombre:",0,0,'L');  
    $pdf->Cell(0,5,utf8_decode($nombrecliente),0,1,'L'); 
    $pdf->Cell(25,5,"Documento:",0,0,'L');  
    $pdf->Cell(0,5,utf8_decode($Documentocliente),0,1,'L');
    $pdf->Cell(20,5,"Telefono:",0,0,'L');  
    $pdf->Cell(0,5,utf8_decode($telefonocliente),0,1,'L');
    $pdf->Cell(20,5,"Direccion:",0,0,'L');  
    $pdf->Cell(0,5,utf8_decode($direccioncliente),0,1,'L');

    # Línea
    $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');

    # Detalle productos
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,"Producto",0,0,'L');
    $pdf->Cell(12,5,"Cant.",0,0,'C');
    $pdf->Cell(15,5,"Precio",0,0,'C');
    $pdf->Cell(20,5,"Total",0,1,'C');
    $pdf->SetFont('Arial','',8);

    foreach ($productos as $pro) {
        $descripcion_producto = utf8_decode($pro["descripcion_producto"]);
        $limite_caracteres = 12;
        if (strlen($descripcion_producto) > $limite_caracteres) {
            $descripcion_para_mostrar = substr($descripcion_producto, 0, $limite_caracteres) . '...';
        } else {
            $descripcion_para_mostrar = $descripcion_producto;
        }
        $pdf->Cell(25,4,$descripcion_para_mostrar,0,0,'L');
        $pdf->Cell(12,4,$pro["cantidad"],0,0,'C');
        $pdf->Cell(15,4,"$. ".number_format($pro["PrecioUnidad"],2,".",","),0,0,'C');
        $pdf->Cell(20,4,"$. ".number_format($pro["total_ventas_producto"],2,".",","),0,1,'C');
    }
    $pdf->Cell(72,1,str_repeat("-",72),0,1,'C');

    # Totales
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(35,5,"TOTAL",0,0,'R');
    $pdf->Cell(35,5,"$. ".ROUND($total_pagar_cab,2),0,1,'R');
    $pdf->Cell(35,5,"SUBTOTAL",0,0,'R');
    $pdf->Cell(35,5,"$. ".ROUND($sub_total_cab,2),0,1,'R');
    $pdf->Cell(35,5,$iva,0,0,'R');
    $pdf->Cell(35,5,"$. ".ROUND($iva_Cab,2),0,1,'R');
   

    $pdf->Cell(0,5,str_repeat("=",40),0,1,'C');

    # TOTAL destacado
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(35,8,"TOTAL A PAGAR",0,0,'R');
    $pdf->Cell(35,8,"$. ".ROUND($total_pagar_cab,2),0,1,'R');
    $pdf->SetFont('Arial','',9);

    # Forma de pago
    $pdf->Cell(35,5,"FORMA DE PAGO",0,0,'R');
    $pdf->Cell(35,5,utf8_decode($tipo_pago),0,1,'R');

    if ($tipo_pago === 'CREDITO'){
        $pdf->Cell(35,5,"TOTAL PAGADO",0,0,'R');
        $pdf->Cell(35,5,"$. ".ROUND($abono_credito,2),0,1,'R');
        $pdf->Cell(35,5,"SALDO RESTANTE",0,0,'R');
        $pdf->Cell(35,5,"$. ".(ROUND($total_pagar_cab,2)-ROUND($abono_credito,2)),0,1,'R');
    } else {
        $pdf->Cell(35,5,"EFECTIVO RECIBIDO",0,0,'R');
        $pdf->Cell(35,5,"$. ".ROUND($total_pagado_Cab,2),0,1,'R');
        $pdf->Cell(35,5,"CAMBIO",0,0,'R');
        $pdf->Cell(35,5,"$. ".ROUND($cambio_Cab,2),0,1,'R');
    }

    $pdf->Cell(35,5,"USTED AHORRA",0,0,'R');
    $pdf->Cell(35,5,"$0.00",0,1,'R');

    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',9);
    $pdf->MultiCell(0,5,utf8_decode("¡Gracias por su compra!"),0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(0,5,utf8_decode($mensaje),0,'C',false);
    // $pdf->MultiCell(0,5,utf8_decode("Presenta este ticket y recibe 5% de descuento en tu próxima compra."),0,'C');
$pdf->MultiCell(0,5,utf8_decode(" Gracias por su compra. Su preferencia nos motiva a seguir brindándole el mejor servicio."),0,'C');
    # Footer con QR dinámico
    if (file_exists('../Views/assets/img/qr.png')) {
        $pdf->Image('../Views/assets/img/qr.png', 25, $pdf->GetY(), 30);
        $pdf->Ln(35);
    }
    $pdf->SetFont('Arial','I',8);
    $pdf->MultiCell(0,5,utf8_decode("Síguenos en nuestras redes sociales para promociones"),0,'C');

    $pdf->Output();
}

}


if(isset($_POST["accion"]) && $_POST["accion"] == 1){
	
	$nroBoleta = new AjaxVentas();
    $nroBoleta -> ajaxObtenerNroBoleta();
	
}else if(isset($_POST["accion"]) && $_POST["accion"] == 2 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
    $ventas = new AjaxVentas();
    $ventas -> ajaxListarVentas($_POST["fechaDesde"],$_POST["fechaHasta"] );
} else if(isset($_POST["accion"]) && $_POST["accion"] == 3 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
       
            $ventas = new AjaxVentas();
            $ventas -> ajaxEliminarVentas($_POST["Boleta"], $_POST["id_usuario"]);
         
  }  else if(isset($_POST["accion"]) && $_POST["accion"] == 4){ // LISTADO DE VENTAS POR RANGO DE FECHAS
       
    $ventas = new AjaxVentas();
    $ventas -> ajaxObtenerDetalleFacturaVentas($_POST["Boleta"],$_POST["opcion"]);
    
  }else {
     
	if((isset($_POST["arr"]))){
		$registrar = new AjaxVentas();
        $registrar -> ajaxRegistrarVenta($_POST["arr"],$_POST['Id_caja'],$_POST['IdCliente'],$_POST['nro_boleta'],$_POST['tipo_pago'],
        $_POST['TipoDocumento'],$_POST['descripcion_venta'],$_POST['CantidadProducto'],$_POST['CantidadTotal'],$_POST['iva'],
        $_POST['subtotal'],$_POST['total_venta'],$_POST['ImporteRecibido'],$_POST['ImporteCambio'],$_POST['nro_credito_venta'],
        $_POST['fechaVencimiento']);
	}

    if (isset($_GET["nro_boleta"])) {

        $ventas = new AjaxVentas;
        $ventas->AjaxGenerarTicketVenta($_GET["nro_boleta"]);
    }
    
 }




