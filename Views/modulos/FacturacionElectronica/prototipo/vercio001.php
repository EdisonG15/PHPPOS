<!DOCTYPE html>
<!-- <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        /* Pequeños ajustes para un look más pulido */
        .card-title i { margin-right: 8px; }
        .table { vertical-align: middle; }
        .badge { font-size: 0.85em; }
    </style>
</head>
<body> -->

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-file-invoice-dollar text-primary"></i> Gestión de Ventas
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Nueva Venta
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="rangoFecha" class="form-label fw-bold">Filtrar por Fecha:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" id="rangoFecha" class="form-control" placeholder="Selecciona un rango"/>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tb_venta" class="table table-hover table-striped" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nro. Boleta</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Estado SRI</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001-001-12345</td>
                                    <td>Juan Pérez</td>
                                    <td>$112.00</td>
                                    <td>15/07/2025</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Autorizado</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-success" title="Enviar al Cliente"><i class="fas fa-envelope"></i></button>
                                            <button class="btn btn-sm btn-info" title="Descargar RIDE/XML"><i class="fas fa-download"></i></button>
                                            <button class="btn btn-sm btn-secondary" title="Ver Detalles"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001-001-12346</td>
                                    <td>Ana Gómez</td>
                                    <td>$58.50</td>
                                    <td>15/07/2025</td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary">Por Enviar</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary btn-enviar-sri" data-id="12346" title="Enviar al SRI"><i class="fas fa-paper-plane"></i></button>
                                            <button class="btn btn-sm btn-danger" title="Eliminar Venta"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001-001-12347</td>
                                    <td>Carlos Ruiz</td>
                                    <td>$250.00</td>
                                    <td>14/07/2025</td>
                                    <td class="text-center">
                                        <span class="badge bg-danger">No Autorizado</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-warning" title="Ver Errores"><i class="fas fa-exclamation-triangle"></i></button>
                                            <button class="btn btn-sm btn-secondary" title="Ver Detalles"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Inicializar el DateRangePicker
    $('#rangoFecha').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Limpiar',
            applyLabel: 'Aplicar',
            fromLabel: 'Desde',
            toLabel: 'Hasta',
            format: 'DD/MM/YYYY'
        }
    });

    $('#rangoFecha').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        // Aquí puedes agregar la lógica para filtrar la tabla con AJAX
    });

    // Ejemplo de cómo manejar el click para enviar al SRI con AJAX
    $('#tb_venta').on('click', '.btn-enviar-sri', function() {
        const ventaId = $(this).data('id');
        const
 
fila = $(this).closest('tr');

        Swal.fire({
            title: '¿Confirmas el envío?',
            text: `Se enviará la factura de la venta ${ventaId} al SRI.`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Simulación de llamada AJAX
                Swal.fire({
                    title: 'Enviando...',
                    text: 'Por favor espera.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '/tu-endpoint-php/enviar-sri.php',
                    type: 'POST',
                    data: { id: ventaId },
                    success: function(response) {
                        // Suponiendo que tu PHP devuelve un JSON con el nuevo estado
                        Swal.close();
                        fila.find('.text-center').eq(1) // Segunda columna de centrado (Estado SRI)
                            .html('<span class="badge bg-warning">Pendiente</span>');
                        
                        // Cambiar los botones
                        let nuevosBotones = `
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-info" title="Consultar Estado"><i class="fas fa-sync-alt"></i></button>
                            <button class="btn btn-sm btn-secondary" title="Ver Detalles"><i class="fas fa-eye"></i></button>
                        </div>`;
                        fila.find('.text-center').eq(2).html(nuevosBotones);

                        Swal.fire('¡Enviado!', 'La factura está pendiente de autorización.', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo enviar la factura.', 'error');
                    }
                });
            }
        });
    });
});
</script>

<!-- </body>
</html> -->