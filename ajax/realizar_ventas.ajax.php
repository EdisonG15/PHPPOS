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


    

    public function AjaxGenerarTicketVenta($nro_boleta)
    {

        require('../Views/assets/plugins/fpdf/fpdf.php');

        $pdf = new FPDF($orientation = 'P', $unit = 'mm', array(80, 258));        
        $pdf->AddPage();        
        $pdf->setMargins(4,10,4);

        //nombre del negocio
   # Encabezado y datos de la empresa #
    $Empresa = VentasControlador::ctrObtenerDatosDelaEmpresa();
    $pdf->SetFont('Arial','B',10);
   $pdf->SetTextColor(0,0,0);
                           /* nombre de la empresa */
                           foreach ($Empresa as $empre) {
$pdf->MultiCell(0,5,utf8_decode(strtoupper($empre["razon_social"])),0,'C',false);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,5,utf8_decode($empre["ruc"]),0,'C',false);

$pdf->MultiCell(0,5,utf8_decode($empre["direccion"]),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode($empre["telefono"]),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode($empre["email"]),0,'C',false);

$mensaje=$empre["mensaje"];
$iva=$empre["iva"];
                           }

                           $productos = VentasControlador::ctrObtenerDetalleVenta($nro_boleta);

                           foreach ($productos as $pr) {
                            $fechaventa=$pr["fechaVentas"];
                            $numerocaja=$pr["numero_caja"];
                            $nombrecajero=$pr["nombre_cajero"];
                            $nombrecliente=$pr["nombre_cliente"];
                            $Documentocliente=$pr["documento_cliente"];
                            $telefonocliente=$pr["telefono_cliente"];
                            $direccioncliente=$pr["direccion_cliente"];
                            /* factura  */
                            $sub_total_cab=$pr["subtotal_Cab"];
                            $iva_Cab=$pr["iva_Cab"];
                            $total_pagar_cab=$pr["total_ventas_cab"];
                            $total_pagado_Cab=$pr["ImporteRecibido"];
                            $cambio_Cab=$pr["ImporteCambio"];
                            $abono_credito=$pr["abono_credito"];

                            $tipo_pago=$pr["tipo_pago"];

                           }


$pdf->Ln(1);
$pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
$pdf->Ln(5);

$pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime($fechaventa))."  "),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode("Caja Nro: ". $numerocaja),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode("Cajero: ".$nombrecajero),0,'C',false);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro:".$nro_boleta)),0,'C',false);
$pdf->SetFont('Arial','',9);

$pdf->Ln(1);
$pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
$pdf->Ln(5);

$pdf->MultiCell(0,5,utf8_decode("Cliente: ".$nombrecliente),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode("Documento: ". $Documentocliente),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode("Teléfono: ". $telefonocliente),0,'C',false);
$pdf->MultiCell(0,5,utf8_decode("Dirección: ". $direccioncliente),0,'C',false);

$pdf->Ln(1);
$pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
$pdf->Ln(3);
# Tabla de productos #
$pdf->Cell(10,5,utf8_decode("Cant."),0,0,'C');
$pdf->Cell(19,5,utf8_decode("Precio"),0,0,'C');
$pdf->Cell(15,5,utf8_decode("Desc."),0,0,'C');
$pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

$pdf->Ln(3);
$pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
$pdf->Ln(3);

        
        $total = 0;

      

        $pdf->SetFont('Arial', '', 8);

    /*----------  Detalles de la tabla  ----------*/
        foreach ($productos as $pro) {

            // $pdf->MultiCell(0,4,utf8_decode("Nombre de producto a vender"),0,'C',false);
            $pdf->Cell(10,4, $pro["cantidad"], 0, 0, 'C');
            $pdf->Cell(19,4,"$. " . number_format($pro["PrecioUnidad"], 2, ".", ","), 0, 0,'C');
            $pdf->Cell(19,4, utf8_decode(strtoupper(substr($pro["descripcion_producto"], 0, 20))));
            $pdf->Cell(28,4,  "$./ " . number_format( $pro["total_ventas_producto"], 2, ".", ","), 0, 0,'C');
            // $pdf->Cell(28,4,  "$./ " . number_format($pro["cantidad"] * $pro["PrecioUnidad"], 2, ".", ","), 0, 0,'C');
            $pdf->Ln(4);
             $total += $pro["cantidad"] * $pro["PrecioUnidad"];
   
        }

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

        // $sub_total=  $total - ($total*0.13)
    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5, "$./ ". ROUND($sub_total_cab,2) ,0, 0,'C');
    // $pdf->Cell(32,5, "$./ ". ROUND($total,2) - ROUND($total*0.13,2),0, 0,'C');
  

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode($iva),0,0,'C');
    $pdf->Cell(32,5,"$./ ". ROUND($iva_Cab,2),0, 0, 'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5, "$./ ".ROUND($total_pagar_cab,2),0, 0,'C');

    $pdf->Ln(5);
   
    if ($tipo_pago ==='CREDITO' ){
        $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
        $pdf->Cell(22,5,utf8_decode("TOTAL PAGADO"),0,0,'C');
        $pdf->Cell(32,5,utf8_decode("$./ ".ROUND($abono_credito ,2)),0,0,'C');
    }else{

        $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
        $pdf->Cell(22,5,utf8_decode("EFECTIVO RECIBIDO"),0,0,'C');
        $pdf->Cell(32,5,utf8_decode("$./ ".ROUND($total_pagado_Cab,2)),0,0,'C');

    }
   

    $pdf->Ln(5);

    if ($tipo_pago ==='CREDITO'){
        $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
        $pdf->Cell(22,5,utf8_decode("SALDO RESTANTE"),0,0,'C');
        $pdf->Cell(32,5,utf8_decode("$./ ".ROUND($total_pagar_cab,2)-ROUND($abono_credito,2)),0,0,'C');
    // $pdf->Cell(32,5, "$./ ". ROUND($total,2) - ROUND($total*0.13,2),0, 0,'C');
    } else {
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("CAMBIO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$./ ".ROUND($cambio_Cab,2)),0,0,'C');
         }
    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode($mensaje),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);


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




