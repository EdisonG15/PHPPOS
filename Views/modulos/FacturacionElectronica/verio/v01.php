<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Facturas Electrónicas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
        .card-header h3 { font-size: 1.5rem; }
        .badge-status { padding: 0.5em 0.7em; font-size: 0.85em; border-radius: 0.25rem; }
        .dataTables_wrapper .row:first-child { margin-bottom: 15px; }
        .dataTables_wrapper .row:last-child { margin-top: 15px; }
        .modal-xl { max-width: 90%; } /* Modal extra grande para la factura */
        .tab-pane .form-group.row { margin-bottom: 1rem; }
        .spinner-border-sm-custom { width: 1.2rem; height: 1.2rem; border-width: 0.15em; }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-file-invoice-dollar"></i> Gestión de Facturas Electrónicas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Facturación Electrónica</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Ventas y Facturas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" id="btnNuevaVenta"><i class="fas fa-cart-plus"></i> Nueva Venta (Ir a PdV)</button>
                                <button type="button" class="btn btn-tool" id="btnRefrescarListado"><i class="fas fa-sync-alt"></i> Refrescar Listado</button>
                                <button type="button" class="btn btn-tool" id="btnExportarListado"><i class="fas fa-file-excel"></i> Exportar</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha Desde:</label>
                                        <input type="date" class="form-control" id="filtroFechaDesde" value="<?php echo date('Y-m-01'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha Hasta:</label>
                                        <input type="date" class="form-control" id="filtroFechaHasta" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Estado SRI:</label>
                                        <select class="form-control" id="filtroEstadoSRI">
                                            <option value="">Todos</option>
                                            <option value="PENDIENTE_FACTURAR">Pendiente de Facturar</option>
                                            <option value="ENVIADA_SRI">Enviada al SRI</option>
                                            <option value="AUTORIZADA">Autorizada</option>
                                            <option value="NO_AUTORIZADA">No Autorizada</option>
                                            <option value="ANULADA">Anulada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cliente / N° Identificación:</label>
                                        <input type="text" class="form-control" id="filtroCliente" placeholder="RUC/Cédula o Nombre">
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-info" id="btnAplicarFiltros"><i class="fas fa-filter"></i> Aplicar Filtros</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="tablaFacturas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>N° Venta</th>
                                            <th>N° Factura</th>
                                            <th>Fecha Venta</th>
                                            <th>Cliente</th>
                                            <th>Total Venta</th>
                                            <th>Estado SRI</th>
                                            <th style="width: 20%;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tbody>
                                </table>
                            </div>
                        </div></div></div></section>
        </div></div>
    <div class="modal fade" id="modalFactura" tabindex="-1" role="dialog" aria-labelledby="modalFacturaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFacturaLabel">Gestionar Factura: <span id="modalFacturaNumero"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="invoiceTabModal" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="modal-datosGenerales-tab" data-toggle="tab" href="#modal-datosGenerales" role="tab" aria-controls="modal-datosGenerales" aria-selected="true">1. Datos Generales</a></li>
                        <li class="nav-item"><a class="nav-link" id="modal-detalles-tab" data-toggle="tab" href="#modal-detalles" role="tab" aria-controls="modal-detalles" aria-selected="false">2. Detalles</a></li>
                        <li class="nav-item"><a class="nav-link" id="modal-totalesPagos-tab" data-toggle="tab" href="#modal-totalesPagos" role="tab" aria-controls="modal-totalesPagos" aria-selected="false">3. Totales y Pagos</a></li>
                        <li class="nav-item"><a class="nav-link" id="modal-estadoSRI-tab" data-toggle="tab" href="#modal-estadoSRI" role="tab" aria-controls="modal-estadoSRI" aria-selected="false">4. Procesamiento SRI</a></li>
                        <li class="nav-item"><a class="nav-link" id="modal-envioCorreo-tab" data-toggle="tab" href="#modal-envioCorreo" role="tab" aria-controls="modal-envioCorreo" aria-selected="false">5. Envío Correo</a></li>
                    </ul>

                    <div class="tab-content mt-3" id="invoiceTabContentModal">

                        <div class="tab-pane fade show active" id="modal-datosGenerales" role="tabpanel" aria-labelledby="modal-datosGenerales-tab">
                            <div class="card card-info card-outline">
                                <div class="card-header"><h3 class="card-title">Información General de la Factura</h3></div>
                                <div class="card-body">
                                    <h4>Información del Emisor</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RUC Emisor:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-rucEmisor" readonly></div>
                                        <label class="col-sm-2 col-form-label">Razón Social:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-razonSocialEmisor" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Dir. Matriz:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-dirMatrizEmisor" readonly></div>
                                        <label class="col-sm-2 col-form-label">Dir. Emisión:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-dirEmisionEmisor" readonly></div>
                                    </div>
                                    <hr>
                                    <h4>Información del Comprobante</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo Comprobante:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" value="FACTURA" readonly></div>
                                        <label class="col-sm-2 col-form-label">Fecha Emisión:</label>
                                        <div class="col-sm-4"><input type="date" class="form-control" id="modal-fechaEmision" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">N° Factura:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-numeroFactura" readonly></div>
                                        <label class="col-sm-2 col-form-label">Clave de Acceso:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-claveAcceso" placeholder="Se llenará al autorizar" readonly></div>
                                    </div>
                                    <hr>
                                    <h4>Información del Cliente</h4>
                                    <input type="hidden" id="modal-idCliente" value="">
                                    <div class="form-group row">
                                        <label for="modal-tipoIdentificacion" class="col-sm-2 col-form-label">Tipo Identificación:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-tipoIdentificacion" readonly></div>
                                        <label for="modal-numeroIdentificacion" class="col-sm-2 col-form-label">Número Identificación:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-numeroIdentificacion" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-razonSocialCliente" class="col-sm-2 col-form-label">Razón Social/Nombres:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" id="modal-razonSocialCliente" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-direccionCliente" class="col-sm-2 col-form-label">Dirección:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" id="modal-direccionCliente" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-telefonoCliente" class="col-sm-2 col-form-label">Teléfono:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-telefonoCliente" readonly></div>
                                        <label for="modal-correoClientePrincipal" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="modal-correoClientePrincipal" placeholder="ejemplo@dominio.com">
                                            <small class="form-text text-muted">Editable para envío de correo.</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Información Adicional</h4>
                                    <div class="form-group row">
                                        <label for="modal-guiaRemision" class="col-sm-2 col-form-label">Guía de Remisión:</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" id="modal-guiaRemision" placeholder="Número de Guía (opcional)" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-observaciones" class="col-sm-2 col-form-label">Observaciones:</label>
                                        <div class="col-sm-10"><textarea class="form-control" id="modal-observaciones" rows="3" readonly></textarea></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="modal-detalles" role="tabpanel" aria-labelledby="modal-detalles-tab">
                            <div class="card card-info card-outline">
                                <div class="card-header"><h3 class="card-title">Detalle de Productos / Servicios</h3></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="modal-tablaDetalles">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;">Código</th>
                                                    <th style="width: 30%;">Descripción</th>
                                                    <th style="width: 10%;">Cantidad</th>
                                                    <th style="width: 15%;">P. Unitario</th>
                                                    <th style="width: 10%;">Descuento</th>
                                                    <th style="width: 10%;">IVA</th>
                                                    <th style="width: 15%;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="modal-totalesPagos" role="tabpanel" aria-labelledby="modal-totalesPagos-tab">
                            <div class="card card-info card-outline">
                                <div class="card-header"><h3 class="card-title">Totales y Formas de Pago</h3></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Resumen de Totales</h4>
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr><th>Subtotal 12%:</th><td class="text-right" id="modal-subtotal12">$0.00</td></tr>
                                                    <tr><th>Subtotal 0%:</th><td class="text-right" id="modal-subtotal0">$0.00</td></tr>
                                                    <tr><th>Descuento Total:</th><td class="text-right" id="modal-descuentoTotal">$0.00</td></tr>
                                                    <tr><th>IVA 12%:</th><td class="text-right" id="modal-iva12">$0.00</td></tr>
                                                    <tr><th>Total a Pagar:</th><td class="text-right"><strong><h4 id="modal-totalPagar">$0.00</h4></strong></td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Formas de Pago</h4>
                                            <table class="table table-bordered table-striped" id="modal-tablaFormasPago">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Pago</th>
                                                        <th>Valor</th>
                                                        <th>Plazo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="modal-estadoSRI" role="tabpanel" aria-labelledby="modal-estadoSRI-tab">
                            <div class="card card-info card-outline">
                                <div class="card-header"><h3 class="card-title">Procesamiento y Estado de la Factura con el SRI</h3></div>
                                <div class="card-body">
                                    <div class="text-center mb-4" id="seccionAccionSRI">
                                        <button type="button" class="btn btn-success btn-lg" id="btnGenerarEnviarSRI">
                                            <i class="fas fa-paper-plane"></i> Generar y Enviar al SRI
                                        </button>
                                        <button type="button" class="btn btn-info btn-lg" id="btnConsultarAutorizacion" style="display: none;">
                                            <i class="fas fa-sync-alt"></i> Consultar Autorización SRI
                                        </button>
                                        <div id="loadingSRI" class="spinner-border text-primary mt-2" role="status" style="display: none;">
                                            <span class="sr-only">Cargando...</span>
                                        </div>
                                    </div>
                                    <div id="alertSRI" class="mt-3"></div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <p><strong>Estado de la Factura:</strong> <span id="modal-estadoFacturaSRI" class="badge badge-secondary badge-status">Pendiente de Envío</span></p>
                                            <p id="modal-motivoNoAutorizado" style="display: none;"><small class="text-danger">Motivo: </small><span id="modal-motivoTexto"></span></p>
                                        </div>
                                        <div class="col-md-6 text-right" id="modal-descargasFactura" style="display: none;">
                                            <button type="button" class="btn btn-primary mr-2" id="btnDescargarXML"><i class="fas fa-file-code"></i> Descargar XML</button>
                                            <button type="button" class="btn btn-danger" id="btnDescargarRIDE"><i class="fas fa-file-pdf"></i> Descargar RIDE (PDF)</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="modal-envioCorreo" role="tabpanel" aria-labelledby="modal-envioCorreo-tab">
                            <div class="card card-info card-outline">
                                <div class="card-header"><h3 class="card-title">Envío de Factura por Correo Electrónico</h3></div>
                                <div class="card-body">
                                    <p class="lead text-center">La factura ha sido **AUTORIZADA por el SRI** y está lista para ser enviada por correo.</p>
                                    <div class="form-group row">
                                        <label for="modal-correoClienteEnvio" class="col-sm-3 col-form-label">Correo(s) del Cliente:</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="modal-correoClienteEnvio" name="correoClienteEnvio" value="" multiple placeholder="Separar múltiples correos con coma" required>
                                            <small class="form-text text-muted">Puedes agregar o modificar los correos. Separa con comas.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-asuntoCorreo" class="col-sm-3 col-form-label">Asunto del Correo:</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="modal-asuntoCorreo" name="asuntoCorreo" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modal-cuerpoCorreo" class="col-sm-3 col-form-label">Mensaje:</label>
                                        <div class="col-sm-9"><textarea class="form-control" id="modal-cuerpoCorreo" name="cuerpoCorreo" rows="4" readonly></textarea></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Adjuntos Incluidos:</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="modal-adjuntarXML" checked disabled>
                                                <label class="form-check-label" for="modal-adjuntarXML">XML de la Factura</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="modal-adjuntarRIDE" checked disabled>
                                                <label class="form-check-label" for="modal-adjuntarRIDE">RIDE (Representación Impresa PDF)</label>
                                            </div>
                                            <small class="form-text text-muted">Ambos archivos son obligatorios y se adjuntarán automáticamente.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <button type="button" class="btn btn-primary btn-lg" id="btnEnviarCorreoModal">
                                                <i class="fas fa-envelope"></i> Confirmar y Enviar Correo
                                            </button>
                                            <div id="loadingCorreoModal" class="spinner-border text-info mt-2" role="status" style="display: none;">
                                                <span class="sr-only">Cargando...</span>
                                            </div>
                                            <div id="alertCorreoModal" class="mt-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // --- Variables globales para la factura actual en el modal ---
            let currentInvoiceData = null; // Guardará todos los datos de la factura/venta seleccionada

            // --- Inicialización de DataTables ---
            const tablaFacturas = $('#tablaFacturas').DataTable({
                "processing": true,
                "serverSide": true, // Le indica a DataTables que los datos vienen del servidor
                "ajax": {
                    "url": "/api/facturas/listar", // Tu endpoint de Spring Boot para obtener la lista
                    "type": "POST", // O GET, según tu implementación
                    "contentType": "application/json",
                    "data": function (d) { // d contiene los parámetros de DataTables (paginación, filtros)
                        // Añade tus filtros personalizados aquí
                        d.fechaDesde = $('#filtroFechaDesde').val();
                        d.fechaHasta = $('#filtroFechaHasta').val();
                        d.estadoSRI = $('#filtroEstadoSRI').val();
                        d.clienteFiltro = $('#filtroCliente').val();
                        return JSON.stringify(d); // Envía los datos como JSON
                    }
                },
                "columns": [
                    { "data": "numeroVenta" },
                    { "data": "numeroFactura", "defaultContent": "Pendiente" },
                    { "data": "fechaVenta" },
                    { "data": "clienteRazonSocial" },
                    { "data": "totalVenta", "render": $.fn.dataTable.render.number(',', '.', 2, '$') },
                    { // Columna de Estado SRI con Badge
                        "data": "estadoSRI",
                        "render": function(data, type, row) {
                            let badgeClass = '';
                            let badgeText = '';
                            switch (data) {
                                case 'PENDIENTE_FACTURAR': badgeClass = 'badge-secondary'; badgeText = 'Pendiente Facturar'; break;
                                case 'ENVIADA_SRI': badgeClass = 'badge-warning'; badgeText = 'Enviada SRI'; break;
                                case 'AUTORIZADA': badgeClass = 'badge-success'; badgeText = 'Autorizada'; break;
                                case 'NO_AUTORIZADA': badgeClass = 'badge-danger'; badgeText = 'No Autorizada'; break;
                                case 'ANULADA': badgeClass = 'badge-info'; badgeText = 'Anulada'; break;
                                default: badgeClass = 'badge-light'; badgeText = 'Desconocido'; break;
                            }
                            return `<span class="badge ${badgeClass} badge-status">${badgeText}</span>`;
                        }
                    },
                    { // Columna de Acciones
                        "data": null, // No se mapea a una propiedad específica, se genera con JS
                        "render": function(data, type, row) {
                            let actionsHtml = '';
                            switch (row.estadoSRI) {
                                case 'PENDIENTE_FACTURAR':
                                    actionsHtml += `<button class="btn btn-success btn-sm btn-action generar-factura" data-id-venta="${row.idVenta}"><i class="fas fa-file-invoice"></i> Generar Factura</button>`;
                                    break;
                                case 'ENVIADA_SRI':
                                    actionsHtml += `<button class="btn btn-info btn-sm btn-action consultar-estado" data-id-factura="${row.idFactura}"><i class="fas fa-sync-alt"></i> Consultar Estado</button>`;
                                    actionsHtml += `<button class="btn btn-secondary btn-sm btn-action ver-detalles" data-id-factura="${row.idFactura}"><i class="fas fa-eye"></i> Ver</button>`;
                                    break;
                                case 'AUTORIZADA':
                                    actionsHtml += `<button class="btn btn-primary btn-sm btn-action descargar-ride" data-id-factura="${row.idFactura}"><i class="fas fa-file-pdf"></i> RIDE</button>`;
                                    actionsHtml += `<button class="btn btn-outline-dark btn-sm btn-action descargar-xml" data-id-factura="${row.idFactura}"><i class="fas fa-file-code"></i> XML</button>`;
                                    actionsHtml += `<button class="btn btn-info btn-sm btn-action reenviar-correo" data-id-factura="${row.idFactura}"><i class="fas fa-envelope"></i> Correo</button>`;
                                    actionsHtml += `<button class="btn btn-secondary btn-sm btn-action ver-detalles" data-id-factura="${row.idFactura}"><i class="fas fa-eye"></i> Ver</button>`;
                                    break;
                                case 'NO_AUTORIZADA':
                                    actionsHtml += `<button class="btn btn-warning btn-sm btn-action reintentar-factura" data-id-factura="${row.idFactura}"><i class="fas fa-exclamation-triangle"></i> Reintentar</button>`;
                                    actionsHtml += `<button class="btn btn-danger btn-sm btn-action anular-factura" data-id-factura="${row.idFactura}"><i class="fas fa-ban"></i> Anular</button>`; // Opcional
                                    actionsHtml += `<button class="btn btn-secondary btn-sm btn-action ver-detalles" data-id-factura="${row.idFactura}"><i class="fas fa-eye"></i> Ver</button>`;
                                    break;
                                case 'ANULADA':
                                    actionsHtml += `<button class="btn btn-secondary btn-sm btn-action ver-detalles" data-id-factura="${row.idFactura}"><i class="fas fa-eye"></i> Ver</button>`;
                                    break;
                            }
                            return actionsHtml;
                        },
                        "orderable": false,
                        "searchable": false
                    }
                ],
                "order": [[2, "desc"]], // Ordenar por fecha de venta descendente
                "language": { // Configuración en español
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es_es.json"
                }
            });

            // --- Manejo de Filtros y Recarga de DataTables ---
            $('#btnAplicarFiltros, #btnRefrescarListado').on('click', function() {
                tablaFacturas.ajax.reload(); // Recarga los datos de la tabla con los filtros actuales
            });

            // --- Lógica de Acciones de la Tabla (Delegación de Eventos) ---

            // Función para precargar y abrir el modal
            function loadAndOpenModal(invoiceData, mode = 'view') { // mode: 'new', 'edit', 'view'
                currentInvoiceData = invoiceData; // Almacena los datos para uso global en el modal

                // Título del modal
                let modalTitle = `Gestionar Factura: ${invoiceData.numeroFactura || invoiceData.numeroVenta}`;
                $('#modalFacturaLabel #modalFacturaNumero').text(modalTitle);

                // Precarga de Pestaña 1 (Datos Generales)
                $('#modal-rucEmisor').val(invoiceData.empresa.ruc);
                $('#modal-razonSocialEmisor').val(invoiceData.empresa.razonSocial);
                $('#modal-dirMatrizEmisor').val(invoiceData.empresa.direccionMatriz);
                $('#modal-dirEmisionEmisor').val(invoiceData.empresa.direccionEmision);
                $('#modal-fechaEmision').val(invoiceData.fechaEmision);
                $('#modal-numeroFactura').val(invoiceData.numeroFactura || 'Generando...');
                $('#modal-claveAcceso').val(invoiceData.claveAcceso || 'Se llenará al autorizar');

                $('#modal-idCliente').val(invoiceData.cliente.id);
                $('#modal-tipoIdentificacion').val(invoiceData.cliente.tipoIdentificacion);
                $('#modal-numeroIdentificacion').val(invoiceData.cliente.numeroIdentificacion);
                $('#modal-razonSocialCliente').val(invoiceData.cliente.razonSocial);
                $('#modal-direccionCliente').val(invoiceData.cliente.direccion);
                $('#modal-telefonoCliente').val(invoiceData.cliente.telefono);
                $('#modal-correoClientePrincipal').val(invoiceData.cliente.correo); // Editable para correo
                $('#modal-guiaRemision').val(invoiceData.guiaRemision || '');
                $('#modal-observaciones').val(invoiceData.observaciones || '');

                // Control de campos editables en Pestaña 1 según el modo
                const readOnly = (mode === 'view'); // Si es 'view', todo readonly. Si es 'new' o 'edit', algunos editables.
                $('#modal-fechaEmision').prop('readonly', readOnly);
                $('#modal-correoClientePrincipal').prop('readonly', readOnly);
                $('#modal-guiaRemision').prop('readonly', readOnly);
                $('#modal-observaciones').prop('readonly', readOnly);


                // Precarga de Pestaña 2 (Detalles de Productos/Servicios)
                $('#modal-tablaDetalles tbody').empty();
                if (invoiceData.detalles && invoiceData.detalles.length > 0) {
                    invoiceData.detalles.forEach(item => {
                        const row = `
                            <tr>
                                <td>${item.codigo}</td>
                                <td>${item.descripcion}</td>
                                <td>${item.cantidad}</td>
                                <td>$${item.precioUnitario.toFixed(2)}</td>
                                <td>$${item.descuento.toFixed(2)}</td>
                                <td>${item.tipoIva}%</td>
                                <td>$${item.total.toFixed(2)}</td>
                            </tr>
                        `;
                        $('#modal-tablaDetalles tbody').append(row);
                    });
                }

                // Precarga de Pestaña 3 (Totales y Formas de Pago)
                $('#modal-subtotal12').text(`$${invoiceData.subtotal12.toFixed(2)}`);
                $('#modal-subtotal0').text(`$${invoiceData.subtotal0.toFixed(2)}`);
                $('#modal-descuentoTotal').text(`$${invoiceData.descuentoTotal.toFixed(2)}`);
                $('#modal-iva12').text(`$${invoiceData.iva12.toFixed(2)}`);
                $('#modal-totalPagar').text(`$${invoiceData.totalPagar.toFixed(2)}`);

                $('#modal-tablaFormasPago tbody').empty();
                if (invoiceData.formasPago && invoiceData.formasPago.length > 0) {
                    invoiceData.formasPago.forEach(pago => {
                        const row = `
                            <tr>
                                <td>${pago.tipoPago}</td>
                                <td>$${pago.valor.toFixed(2)}</td>
                                <td>${pago.plazo || 'N/A'}</td>
                            </tr>
                        `;
                        $('#modal-tablaFormasPago tbody').append(row);
                    });
                }

                // Precarga de Pestaña 4 (Procesamiento SRI)
                $('#alertSRI').empty().hide(); // Limpiar alertas
                $('#modal-estadoFacturaSRI').text(invoiceData.estadoSRI.replace('_', ' ')).removeClass().addClass('badge badge-status ' + getBadgeClass(invoiceData.estadoSRI));
                $('#modal-motivoNoAutorizado').hide();
                $('#modal-descargasFactura').hide();
                $('#btnGenerarEnviarSRI').hide();
                $('#btnConsultarAutorizacion').hide();

                if (invoiceData.estadoSRI === 'PENDIENTE_FACTURAR') {
                    $('#btnGenerarEnviarSRI').show(); // Mostrar solo el botón de generar y enviar
                } else if (invoiceData.estadoSRI === 'ENVIADA_SRI') {
                    $('#btnConsultarAutorizacion').show();
                } else if (invoiceData.estadoSRI === 'AUTORIZADA') {
                    $('#modal-descargasFactura').show();
                    // Auto-cambiar a pestaña 5 (Envío Correo) si está autorizada
                    $('#modal-envioCorreo-tab').removeClass('disabled').attr('aria-disabled', 'false');
                    $('#modal-envioCorreo-tab').tab('show');
                    precargarDatosCorreoModal(invoiceData); // Precargar datos de correo
                } else if (invoiceData.estadoSRI === 'NO_AUTORIZADA') {
                    $('#modal-motivoTexto').text(invoiceData.motivoNoAutorizadaMensaje || 'Desconocido.').parent().show();
                    $('#btnGenerarEnviarSRI').show(); // Dar opción de reintentar
                }
                // Deshabilitar la pestaña de correo si no está autorizada
                if (invoiceData.estadoSRI !== 'AUTORIZADA') {
                    $('#modal-envioCorreo-tab').addClass('disabled').attr('aria-disabled', 'true');
                }


                // Abre el modal
                $('#modalFactura').modal('show');
                // Al abrir el modal, siempre ir a la primera pestaña por defecto si no está AUTORIZADA
                if(invoiceData.estadoSRI !== 'AUTORIZADA') {
                    $('#modal-datosGenerales-tab').tab('show');
                }
            }

            // Precargar datos en la pestaña 5 del modal
            function precargarDatosCorreoModal(facturaDatosAutorizados) {
                $('#modal-correoClienteEnvio').val(facturaDatosAutorizados.cliente.correo || '');
                const numeroFactura = facturaDatosAutorizados.numeroFactura || 'N/A';
                const razonSocialEmisor = facturaDatosAutorizados.empresa.razonSocial || 'Tu Empresa';
                $('#modal-asuntoCorreo').val(`Factura Electrónica N° ${numeroFactura} de ${razonSocialEmisor}`);
                $('#modal-cuerpoCorreo').val(`Estimado(a) cliente,
Adjuntamos su factura electrónica correspondiente. Gracias por su preferencia.
Saludos cordiales,
${razonSocialEmisor}`);
            }

            // Función de utilidad para las clases de badge
            function getBadgeClass(estado) {
                switch (estado) {
                    case 'PENDIENTE_FACTURAR': return 'badge-secondary';
                    case 'ENVIADA_SRI': return 'badge-warning';
                    case 'AUTORIZADA': return 'badge-success';
                    case 'NO_AUTORIZADA': return 'badge-danger';
                    case 'ANULADA': return 'badge-info';
                    default: return 'badge-light';
                }
            }

            // Función para mostrar alertas dentro del modal
            function mostrarAlertaModal(contenedorId, tipo, mensaje) {
                const alertClass = {
                    'success': 'alert-success', 'danger': 'alert-danger',
                    'warning': 'alert-warning', 'info': 'alert-info'
                }[tipo] || 'alert-info';

                const alertHtml = `<div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                                        ${mensaje}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>`;
                $(contenedorId).html(alertHtml).show();
            }

            // --- Manejadores de eventos para los botones de la tabla ---
            $('#tablaFacturas tbody').on('click', '.generar-factura', function() {
                const idVenta = $(this).data('id-venta');
                mostrarAlertaModal('#alertSRI', 'info', 'Cargando datos de la venta...');

                // Llamada AJAX para obtener los datos completos de la venta desde tu backend
                $.ajax({
                    url: `/api/ventas/${idVenta}/datos-para-facturar`, // Endpoint de Spring Boot
                    type: 'GET',
                    success: function(response) {
                        if (response.success && response.venta) {
                            loadAndOpenModal(response.venta, 'new'); // Pasa los datos de la venta y abre el modal en modo 'new'
                        } else {
                            mostrarAlertaModal('#alertSRI', 'danger', response.message || 'No se pudieron cargar los datos de la venta.');
                        }
                    },
                    error: function() {
                        mostrarAlertaModal('#alertSRI', 'danger', 'Error de conexión al cargar la venta. Intente de nuevo.');
                    }
                });
            });

            $('#tablaFacturas tbody').on('click', '.consultar-estado, .ver-detalles, .reintentar-factura, .reenviar-correo, .descargar-ride, .descargar-xml', function() {
                const idFactura = $(this).data('id-factura');
                const actionClass = $(this).attr('class'); // Para saber qué acción disparó el clic

                // Si es un botón de descarga, hacemos la descarga directa sin abrir modal
                if (actionClass.includes('descargar-ride')) {
                    window.open(`/api/facturas/${idFactura}/descargar-ride`, '_blank');
                    return;
                }
                if (actionClass.includes('descargar-xml')) {
                    window.open(`/api/facturas/${idFactura}/descargar-xml`, '_blank');
                    return;
                }

                mostrarAlertaModal('#alertSRI', 'info', 'Cargando datos de la factura...');
                $.ajax({
                    url: `/api/facturas/${idFactura}/datos`, // Endpoint para obtener datos completos de la factura
                    type: 'GET',
                    success: function(response) {
                        if (response.success && response.factura) {
                            let mode = 'view';
                            if (actionClass.includes('reintentar-factura')) {
                                mode = 'edit'; // Si es reintentar, permite edición limitada
                            }
                            loadAndOpenModal(response.factura, mode);

                            if (actionClass.includes('consultar-estado')) {
                                // Directamente en la pestaña de estado si es solo consulta
                                $('#modal-estadoSRI-tab').tab('show');
                                // Luego disparar la consulta al SRI desde dentro del modal (simulado)
                                $('#btnConsultarAutorizacion').click();
                            } else if (actionClass.includes('reenviar-correo')) {
                                // Directamente en la pestaña de envío de correo
                                $('#modal-envioCorreo-tab').tab('show');
                            }
                        } else {
                            mostrarAlertaModal('#alertSRI', 'danger', response.message || 'No se pudieron cargar los datos de la factura.');
                        }
                    },
                    error: function() {
                        mostrarAlertaModal('#alertSRI', 'danger', 'Error de conexión al cargar la factura. Intente de nuevo.');
                    }
                });
            });

            // --- Lógica de Botones dentro del Modal (Pestaña 4: Procesamiento SRI) ---
            $('#btnGenerarEnviarSRI').on('click', function() {
                // Validación y recopilación de datos de todas las pestañas (especialmente 1, 2, 3)
                // Usar currentInvoiceData para construir el JSON a enviar

                $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm-custom" role="status" aria-hidden="true"></span> Enviando...');
                $('#loadingSRI').show();
                mostrarAlertaModal('#alertSRI', 'info', 'Enviando factura al SRI. Esto puede tomar unos segundos...');

                // Construye el objeto de la factura con los datos del modal (currentInvoiceData y posibles ediciones)
                const facturaParaEnviar = {
                    idVenta: currentInvoiceData.idVenta, // O idFactura si ya existe
                    cliente: {
                        id: $('#modal-idCliente').val(),
                        correo: $('#modal-correoClientePrincipal').val() // Puede haber sido editado
                        // ... otros datos del cliente (generalmente no se editan aquí)
                    },
                    detalles: currentInvoiceData.detalles, // Asumimos que los detalles no se modifican en el modal
                    formasPago: currentInvoiceData.formasPago,
                    observaciones: $('#modal-observaciones').val(), // Puede haber sido editado
                    // ... el resto de campos que necesita tu backend para generar el XML
                };

                $.ajax({
                    url: '/api/facturas/generar-enviar', // Tu endpoint de Spring Boot
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(facturaParaEnviar),
                    success: function(response) {
                        $('#btnGenerarEnviarSRI').prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Generar y Enviar al SRI');
                        $('#loadingSRI').hide();
                        if (response.success) {
                            currentInvoiceData = response.factura; // Actualiza los datos de la factura actual
                            mostrarAlertaModal('#alertSRI', 'success', 'Factura procesada. Estado actual: ' + currentInvoiceData.estadoSRI.replace('_', ' '));
                            loadAndOpenModal(currentInvoiceData, 'view'); // Recarga el modal para actualizar el estado
                            tablaFacturas.ajax.reload(); // Recarga la tabla principal
                        } else {
                            mostrarAlertaModal('#alertSRI', 'danger', 'Error al procesar la factura: ' + (response.message || 'Desconocido.'));
                            if (response.factura) { // Si hay datos de factura, actualiza el modal
                                currentInvoiceData = response.factura;
                                loadAndOpenModal(currentInvoiceData, 'edit'); // Permite reintentar
                            }
                        }
                    },
                    error: function(xhr) {
                        $('#btnGenerarEnviarSRI').prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Generar y Enviar al SRI');
                        $('#loadingSRI').hide();
                        let errorMessage = 'Error de conexión o servidor al intentar enviar la factura.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        mostrarAlertaModal('#alertSRI', 'danger', errorMessage);
                        console.error("Error al enviar SRI:", xhr.responseText);
                    }
                });
            });

            $('#btnConsultarAutorizacion').on('click', function() {
                if (!currentInvoiceData || !currentInvoiceData.idFactura) {
                    mostrarAlertaModal('#alertSRI', 'warning', 'No hay una factura para consultar.');
                    return;
                }
                $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm-custom" role="status" aria-hidden="true"></span> Consultando...');
                $('#loadingSRI').show();
                mostrarAlertaModal('#alertSRI', 'info', 'Consultando estado al SRI...');

                $.ajax({
                    url: `/api/facturas/${currentInvoiceData.idFactura}/consultar-autorizacion`,
                    type: 'GET',
                    success: function(response) {
                        $('#btnConsultarAutorizacion').prop('disabled', false).html('<i class="fas fa-sync-alt"></i> Consultar Autorización SRI');
                        $('#loadingSRI').hide();
                        if (response.success && response.factura) {
                            currentInvoiceData = response.factura; // Actualiza los datos
                            mostrarAlertaModal('#alertSRI', 'success', 'Estado actualizado: ' + currentInvoiceData.estadoSRI.replace('_', ' '));
                            loadAndOpenModal(currentInvoiceData, 'view'); // Recarga el modal con el nuevo estado
                            tablaFacturas.ajax.reload(); // Recarga la tabla principal
                        } else {
                            mostrarAlertaModal('#alertSRI', 'danger', response.message || 'Error al consultar autorización.');
                        }
                    },
                    error: function(xhr) {
                        $('#btnConsultarAutorizacion').prop('disabled', false).html('<i class="fas fa-sync-alt"></i> Consultar Autorización SRI');
                        $('#loadingSRI').hide();
                        let errorMessage = 'Error de conexión o servidor al consultar autorización.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        mostrarAlertaModal('#alertSRI', 'danger', errorMessage);
                        console.error("Error al consultar SRI:", xhr.responseText);
                    }
                });
            });

            // Descargas dentro del modal
            $('#btnDescargarXML').on('click', function() {
                if (currentInvoiceData && currentInvoiceData.idFactura && currentInvoiceData.estadoSRI === 'AUTORIZADA') {
                    window.open(`/api/facturas/${currentInvoiceData.idFactura}/descargar-xml`, '_blank');
                } else {
                    mostrarAlertaModal('#alertSRI', 'warning', 'Factura no autorizada o ID no disponible para descargar XML.');
                }
            });
            $('#btnDescargarRIDE').on('click', function() {
                if (currentInvoiceData && currentInvoiceData.idFactura && currentInvoiceData.estadoSRI === 'AUTORIZADA') {
                    window.open(`/api/facturas/${currentInvoiceData.idFactura}/descargar-ride`, '_blank');
                } else {
                    mostrarAlertaModal('#alertSRI', 'warning', 'Factura no autorizada o ID no disponible para descargar RIDE.');
                }
            });

            // --- Lógica de Botón dentro del Modal (Pestaña 5: Envío por Correo) ---
            $('#btnEnviarCorreoModal').on('click', function() {
                if (!currentInvoiceData || !currentInvoiceData.idFactura || currentInvoiceData.estadoSRI !== 'AUTORIZADA') {
                    mostrarAlertaModal('#alertCorreoModal', 'warning', 'La factura debe estar Autorizada por el SRI antes de enviarla por correo.');
                    return;
                }

                const destinatarios = $('#modal-correoClienteEnvio').val().trim();
                if (!destinatarios) {
                    mostrarAlertaModal('#alertCorreoModal', 'warning', 'Por favor, ingrese al menos una dirección de correo para el envío.');
                    return;
                }

                $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm-custom" role="status" aria-hidden="true"></span> Enviando...');
                $('#loadingCorreoModal').show();
                mostrarAlertaModal('#alertCorreoModal', 'info', 'Enviando correo...');

                const correosArray = destinatarios.split(',').map(email => email.trim()).filter(email => email !== '');

                $.ajax({
                    url: `/api/facturas/${currentInvoiceData.idFactura}/enviar-correo`,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        destinatarios: correosArray,
                        asunto: $('#modal-asuntoCorreo').val(),
                        cuerpoMensaje: $('#modal-cuerpoCorreo').val()
                    }),
                    success: function(response) {
                        $('#btnEnviarCorreoModal').prop('disabled', false).html('<i class="fas fa-envelope"></i> Confirmar y Enviar Correo');
                        $('#loadingCorreoModal').hide();
                        if (response.success) {
                            mostrarAlertaModal('#alertCorreoModal', 'success', 'Correo enviado exitosamente.');
                        } else {
                            mostrarAlertaModal('#alertCorreoModal', 'warning', 'Hubo un problema al enviar el correo: ' + (response.message || 'Error desconocido.'));
                        }
                    },
                    error: function(xhr) {
                        $('#btnEnviarCorreoModal').prop('disabled', false).html('<i class="fas fa-envelope"></i> Confirmar y Enviar Correo');
                        $('#loadingCorreoModal').hide();
                        let errorMessage = 'Error de conexión o servidor al enviar el correo.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        mostrarAlertaModal('#alertCorreoModal', 'danger', errorMessage);
                        console.error("Error al enviar correo:", xhr.responseText);
                    }
                });
            });

            // --- Otros botones globales ---
            $('#btnNuevaVenta').on('click', function() {
                // Redirigir a tu pantalla de Punto de Venta
                window.location.href = '/punto-de-venta.html'; // Ajusta la URL de tu PdV
            });

            $('#btnExportarListado').on('click', function() {
                // Lógica para exportar datos (puedes hacer otra llamada AJAX al backend)
                alert('Funcionalidad de Exportar en desarrollo.');
            });

            // Limpiar el modal al cerrarlo para evitar mostrar datos viejos
            $('#modalFactura').on('hidden.bs.modal', function () {
                currentInvoiceData = null; // Limpiar datos al cerrar
                $('#alertSRI').empty().hide();
                $('#alertCorreoModal').empty().hide();
                // Opcional: restablecer la primera pestaña
                $('#modal-datosGenerales-tab').tab('show');
            });


            // Simulación de respuesta del backend para DataTables
            // En tu Spring Boot, tu endpoint /api/facturas/listar devolvería un JSON como este:
            // {
            //     "draw": 1, // Número de sorteo de DataTables
            //     "recordsTotal": 5, // Total de registros sin filtrar
            //     "recordsFiltered": 5, // Total de registros después de aplicar filtros
            //     "data": [
            //         {
            //             "idVenta": "V001", "idFactura": null, "numeroVenta": "20250715-001", "numeroFactura": null,
            //             "fechaVenta": "2025-07-15", "clienteRazonSocial": "Juan Pérez", "totalVenta": 150.00,
            //             "estadoSRI": "PENDIENTE_FACTURAR", "claveAcceso": null,
            //             "empresa": { "ruc": "1790000000001", "razonSocial": "MI EMPRESA S.A.", "direccionMatriz": "Av. Siempre Viva 123", "direccionEmision": "Calle Falsa 456" },
            //             "cliente": { "id": "C001", "tipoIdentificacion": "CEDULA", "numeroIdentificacion": "1712345678", "razonSocial": "Juan Pérez", "direccion": "Conocida 1", "telefono": "0991234567", "correo": "juan.perez@example.com" },
            //             "detalles": [{ "codigo": "P1", "descripcion": "Producto A", "cantidad": 1, "precioUnitario": 100, "descuento": 0, "tipoIva": "12", "total": 112 }, { "codigo": "P2", "descripcion": "Producto B", "cantidad": 1, "precioUnitario": 50, "descuento": 0, "tipoIva": "0", "total": 50 }],
            //             "subtotal12": 100, "subtotal0": 50, "descuentoTotal": 0, "iva12": 12, "totalPagar": 162, "formasPago": [{ "tipoPago": "EFECTIVO", "valor": 162 }]
            //         },
            //         {
            //             "idVenta": "V002", "idFactura": "F001", "numeroVenta": "20250714-002", "numeroFactura": "001-001-000000001",
            //             "fechaVenta": "2025-07-14", "clienteRazonSocial": "María Sol", "totalVenta": 200.00,
            //             "estadoSRI": "AUTORIZADA", "claveAcceso": "12345678901234567890123456789012345678901234567",
            //             "empresa": { "ruc": "1790000000001", "razonSocial": "MI EMPRESA S.A.", "direccionMatriz": "Av. Siempre Viva 123", "direccionEmision": "Calle Falsa 456" },
            //             "cliente": { "id": "C002", "tipoIdentificacion": "CEDULA", "numeroIdentificacion": "1787654321", "razonSocial": "María Sol", "direccion": "Conocida 2", "telefono": "0991234567", "correo": "maria.sol@example.com" },
            //             "detalles": [{ "codigo": "S1", "descripcion": "Servicio X", "cantidad": 1, "precioUnitario": 200, "descuento": 0, "tipoIva": "12", "total": 224 }],
            //             "subtotal12": 200, "subtotal0": 0, "descuentoTotal": 0, "iva12": 24, "totalPagar": 224, "formasPago": [{ "tipoPago": "TARJETA_CREDITO", "valor": 224 }]
            //         },
            //         {
            //             "idVenta": "V003", "idFactura": "F002", "numeroVenta": "20250713-003", "numeroFactura": "001-001-000000002",
            //             "fechaVenta": "2025-07-13", "clienteRazonSocial": "Pedro López", "totalVenta": 50.00,
            //             "estadoSRI": "NO_AUTORIZADA", "claveAcceso": "12345678901234567890123456789012345678901234568",
            //             "motivoNoAutorizadaMensaje": "RUC del cliente inválido.",
            //             "empresa": { "ruc": "1790000000001", "razonSocial": "MI EMPRESA S.A.", "direccionMatriz": "Av. Siempre Viva 123", "direccionEmision": "Calle Falsa 456" },
            //             "cliente": { "id": "C003", "tipoIdentificacion": "RUC", "numeroIdentificacion": "170000000000", "razonSocial": "Pedro López", "direccion": "Conocida 3", "telefono": "0991234567", "correo": "pedro.lopez@example.com" },
            //             "detalles": [{ "codigo": "P3", "descripcion": "Producto C", "cantidad": 1, "precioUnitario": 50, "descuento": 0, "tipoIva": "12", "total": 56 }],
            //             "subtotal12": 50, "subtotal0": 0, "descuentoTotal": 0, "iva12": 6, "totalPagar": 56, "formasPago": [{ "tipoPago": "EFECTIVO", "valor": 56 }]
            //         }
            //     ]
            // }

        });
    </script>
</body>
</html>