<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Facturación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .kpi-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .kpi-card:hover {
            transform: translateY(-5px);
        }
        .kpi-icon {
            font-size: 2.5rem;
            opacity: 0.5;
        }
        .kpi-value {
            font-size: 2rem;
            font-weight: bold;
        }
        .card-header-custom {
            background-color: transparent;
            border-bottom: 1px solid #dee2e6;
        }
        .list-group-item-action:hover {
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Dashboard de Facturación</h1>
        <button class="btn btn-primary"><i class="fas fa-plus me-2"></i>Nueva Venta</button>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card kpi-card p-3">
                <div class="d-flex align-items-center">
                    <div class="kpi-icon text-primary me-3"><i class="fas fa-dollar-sign"></i></div>
                    <div>
                        <div class="text-muted">Total Facturado (Hoy)</div>
                        <div class="kpi-value">$1,250.75</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card kpi-card p-3">
                <div class="d-flex align-items-center">
                    <div class="kpi-icon text-success me-3"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <div class="text-muted">Facturas Autorizadas</div>
                        <div class="kpi-value">32</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card kpi-card p-3">
                <div class="d-flex align-items-center">
                    <div class="kpi-icon text-warning me-3"><i class="fas fa-sync-alt"></i></div>
                    <div>
                        <div class="text-muted">Pendientes de Envío</div>
                        <div class="kpi-value">4</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card kpi-card p-3">
                <div class="d-flex align-items-center">
                    <div class="kpi-icon text-danger me-3"><i class="fas fa-times-circle"></i></div>
                    <div>
                        <div class="text-muted">Facturas Rechazadas</div>
                        <div class="kpi-value">2</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card kpi-card">
                <div class="card-header card-header-custom">
                    <h5 class="card-title mb-0">Facturación Últimos 7 Días</h5>
                </div>
                <div class="card-body">
                    <canvas id="ventasChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card kpi-card">
                <div class="card-header card-header-custom">
                     <h5 class="card-title mb-0">🚨 Acciones Críticas</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">Factura #12347 Rechazada</div>
                            <small class="text-muted">Cliente: Carlos Ruiz - Error en RUC.</small>
                        </div>
                        <button class="btn btn-warning btn-sm">Revisar</button>
                    </a>
                     <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">Factura #12340 Rechazada</div>
                            <small class="text-muted">Cliente: Mega Corp - Firma inválida.</small>
                        </div>
                        <button class="btn btn-warning btn-sm">Revisar</button>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">Factura #12350 Pendiente</div>
                            <small class="text-muted">Cliente: Ana Gómez - Lista para enviar.</small>
                        </div>
                        <button class="btn btn-primary btn-sm">Enviar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    // Configuración del Gráfico de Barras (Ventas)
    const ctx = document.getElementById('ventasChart').getContext('2d');
    const ventasChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
            datasets: [{
                label: 'Monto Facturado ($)',
                data: [1200, 1900, 800, 2100, 1500, 2500, 900],
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});
</script>

</body>
</html>