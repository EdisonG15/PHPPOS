<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Facturación Electrónica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f4f7f9; /* Un fondo suave para el tablero */
        }
        .billing-board {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto; /* Permite scroll horizontal si no caben las columnas */
            padding-bottom: 1rem;
        }
        .board-column {
            flex: 1;
            min-width: 300px; /* Ancho mínimo de cada columna */
            max-width: 320px;
            background-color: #e9ecef;
            border-radius: 10px;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .column-header {
            padding: 1rem;
            font-weight: bold;
            border-bottom: 2px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .column-header .badge {
            font-size: 0.9em;
        }
        .column-content {
            padding: 0.75rem;
            overflow-y: auto;
            flex-grow: 1;
        }
        .invoice-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-left: 5px solid #6c757d; /* Color por defecto */
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: grab;
            transition: box-shadow 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .invoice-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card-customer {
            font-weight: 600;
            color: #343a40;
            font-size: 1.1em;
        }
        .card-details {
            font-size: 0.9em;
            color: #6c757d;
            margin: 0.5rem 0;
        }
        .card-total {
            font-size: 1.2em;
            font-weight: bold;
            color: #000;
            text-align: right;
        }
        .card-actions {
            margin-top: 1rem;
            text-align: right;
        }
        /* Colores específicos por estado */
        .invoice-card.status-pendiente { border-left-color: #0d6efd; }
        .invoice-card.status-enviado { border-left-color: #ffc107; }
        .invoice-card.status-autorizado { border-left-color: #198754; }
        .invoice-card.status-rechazado { border-left-color: #dc3545; }
    </style>
</head>
<body>

<div class="container-fluid my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-columns text-primary"></i> Tablero de Facturación</h2>
        <div>
            <button class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Venta</button>
        </div>
    </div>

    <div class="billing-board" id="billingBoard">

        <div class="board-column">
            <div class="column-header">
                <span><i class="fas fa-file-import"></i> Pendiente de Envío</span>
                <span class="badge bg-primary rounded-pill">2</span>
            </div>
            <div class="column-content" data-column-id="pendiente">
                <div class="invoice-card status-pendiente" data-invoice-id="12346">
                    <div class="card-customer">Ana Gómez</div>
                    <div class="card-details">
                        <i class="fas fa-receipt"></i> 001-001-12346 <br>
                        <i class="fas fa-calendar-alt"></i> 15/07/2025
                    </div>
                    <div class="card-total">$58.50</div>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-sm" title="Enviar al SRI"><i class="fas fa-paper-plane"></i> Enviar</button>
                    </div>
                </div>
                <div class="invoice-card status-pendiente" data-invoice-id="12348">
                    <div class="card-customer">Luisa Torres</div>
                    <div class="card-details">
                        <i class="fas fa-receipt"></i> 001-001-12348 <br>
                        <i class="fas fa-calendar-alt"></i> 15/07/2025
                    </div>
                    <div class="card-total">$320.00</div>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-sm" title="Enviar al SRI"><i class="fas fa-paper-plane"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="board-column">
            <div class="column-header">
                <span><i class="fas fa-sync-alt"></i> En Proceso</span>
                <span class="badge bg-warning text-dark rounded-pill">1</span>
            </div>
            <div class="column-content" data-column-id="enviado">
                <div class="invoice-card status-enviado" data-invoice-id="12349">
                    <div class="card-customer">Jorge Campos</div>
                    <div class="card-details">
                        <i class="fas fa-receipt"></i> 001-001-12349 <br>
                        <i class="fas fa-calendar-alt"></i> 15/07/2025
                    </div>
                    <div class="card-total">$80.00</div>
                    <div class="card-actions">
                        <button class="btn btn-info btn-sm text-white" title="Consultar Estado"><i class="fas fa-search"></i> Consultar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="board-column">
            <div class="column-header">
                <span><i class="fas fa-check-circle"></i> Autorizadas</span>
                <span class="badge bg-success rounded-pill">1</span>
            </div>
            <div class="column-content" data-column-id="autorizado">
                <div class="invoice-card status-autorizado" data-invoice-id="12345">
                    <div class="card-customer">Juan Pérez</div>
                    <div class="card-details">
                        <i class="fas fa-receipt"></i> 001-001-12345 <br>
                        <i class="fas fa-calendar-alt"></i> 15/07/2025
                    </div>
                    <div class="card-total">$112.00</div>
                    <div class="card-actions">
                        <button class="btn btn-success btn-sm" title="Enviar a Cliente"><i class="fas fa-envelope"></i></button>
                        <button class="btn btn-secondary btn-sm" title="Descargar"><i class="fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="board-column">
            <div class="column-header">
                <span><i class="fas fa-times-circle"></i> Rechazadas</span>
                <span class="badge bg-danger rounded-pill">1</span>
            </div>
            <div class="column-content" data-column-id="rechazado">
                <div class="invoice-card status-rechazado" data-invoice-id="12347">
                    <div class="card-customer">Carlos Ruiz</div>
                    <div class="card-details">
                        <i class="fas fa-receipt"></i> 001-001-12347 <br>
                        <i class="fas fa-calendar-alt"></i> 14/07/2025
                    </div>
                    <div class="card-total">$250.00</div>
                    <div class="card-actions">
                        <button class="btn btn-danger btn-sm" title="Ver Errores"><i class="fas fa-bug"></i> Ver Error</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
$(document).ready(function() {
    // Inicializar SortableJS en cada columna de contenido
    const columns = document.querySelectorAll('.column-content');
    columns.forEach(column => {
        new Sortable(column, {
            group: 'shared', // Permite arrastrar tarjetas entre columnas
            animation: 150,
            ghostClass: 'bg-light' // Estilo de la tarjeta fantasma mientras se arrastra
        });
    });

    // Ejemplo de AJAX al hacer clic en un botón de acción
    $('.billing-board').on('click', '.btn-primary', function() {
        const card = $(this).closest('.invoice-card');
        const invoiceId = card.data('invoice-id');

        Swal.fire({
            title: 'Enviar Factura al SRI',
            text: `¿Confirmas el envío de la factura #${invoiceId}?`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, enviar ahora'
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí iría tu llamada AJAX a tu backend en Spring Boot
                Swal.fire('Enviando...', 'Tu factura se está procesando.', 'info');
                
                // Simulación de éxito: Mover la tarjeta a "En Proceso"
                setTimeout(() => {
                    const enProcesoColumn = $('[data-column-id="enviado"]');
                    card.removeClass('status-pendiente').addClass('status-enviado');
                    card.find('.card-actions').html(`
                        <button class="btn btn-info btn-sm text-white" title="Consultar Estado"><i class="fas fa-search"></i> Consultar</button>
                    `);
                    enProcesoColumn.append(card);
                    Swal.close();
                }, 1500);
            }
        });
    });
});
</script>

</body>
</html>