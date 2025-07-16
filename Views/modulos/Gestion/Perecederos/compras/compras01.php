<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer2MbIkRjXhEVq4861y+T6kCgS1p06Q69uPRh7Fk1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* General body styling */
        body {
            background-color: #f8f9fa; /* Light grey background */
        }

        /* Card styling */
        .card {
            border-radius: 0.75rem; /* Slightly softer corners */
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Subtle shadow */
            margin-bottom: 1.5rem; /* Spacing between cards */
        }

        /* Card header for better structure */
        .card-header {
            background-color: #007bff; /* Primary color for header */
            color: white;
            font-weight: 600;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
            padding: 1rem 1.5rem;
        }

        /* Card title inside header */
        .card-title {
            font-weight: 600;
            margin-bottom: 0;
        }

        /* Focus styles for inputs and selects */
        input:focus, select:focus, textarea:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25) !important; /* Bootstrap primary focus color */
            border-color: #86b7fe !important;
        }

        /* Table styling for better readability */
        .table {
            --bs-table-hover-bg: #e2e6ea; /* Lighter hover background */
            --bs-table-striped-bg: #f2f2f2; /* Subtle stripe background */
        }

        .table thead th {
            white-space: nowrap;
            background-color: #e9ecef; /* Light grey header background */
            font-weight: 600;
            color: #495057; /* Darker text for headers */
        }

        .table tbody tr {
            border-bottom: 1px solid #dee2e6; /* Separator for rows */
        }

        /* Custom styling for total boxes */
        .summary-total-box {
            background-color: #e9f5ff; /* Light blue background for totals */
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            text-align: center;
        }

        .summary-total-box strong {
            font-size: 1.5rem;
            color: #007bff; /* Primary color for total amounts */
        }

        /* Highlighting for important amounts */
        .text-danger-custom {
            color: #dc3545; /* Bootstrap danger color */
            font-weight: 600;
        }
        
        /* Adjustments for form floating labels */
        .form-floating > label {
            padding: 0.75rem 0.75rem;
            font-size: 0.875rem;
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select:focus ~ label,
        .form-floating > .form-select:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        }

        /* Sticky header for table on scroll (optional, if table gets very long) */
        @media (min-width: 768px) {
            .table-responsive-custom {
                overflow-x: auto;
                max-height: 60vh; /* Adjust as needed for scrollable table body */
                overflow-y: auto;
            }
            .table-responsive-custom thead th {
                position: sticky;
                top: 0;
                z-index: 10;
                background-color: #e9ecef; /* Ensure header background is visible when sticky */
            }
        }
        
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario; ?>"/>
        <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja; ?>"/>
        <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" disabled>
        <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

        <div class="row g-4">
            <div class="col-lg-3 col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-box-seam me-2"></i>Detalle de Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="iptCodigo" class="form-label visually-hidden">Escanee código</label>
                            <input type="text" class="form-control form-control-lg" id="iptCodigo" placeholder="Escanee código de barras..." autofocus>
                        </div>
                        
                        <input id="txtIdProducto" type="hidden" value="0"/>
                        <input id="txtllevaIva" type="hidden" value="0"/>
                        <input id="perecedero_producto" type="hidden" value="0"/>
                        
                        <div class="mb-2">
                            <label for="txtCodigoProducto" class="form-label small mb-0">Código</label>
                            <input type="text" class="form-control" id="txtCodigoProducto" name="Codigo" value="" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="txtNombreProducto" class="form-label small mb-0">Descripción</label>
                            <input type="text" class="form-control" id="txtNombreProducto" name="Nombre" value="">
                        </div>
                        <div class="mb-2">
                            <label for="txtCantidadProducto" class="form-label small mb-0">Cantidad</label>
                            <input type="number" class="form-control" id="txtCantidadProducto" name="Cantidad" value="1" min="1">
                        </div>
                        <div class="mb-2">
                            <label for="txtPrecioCompraProducto" class="form-label small mb-0">Precio Compra Unidad</label>
                            <input type="text" class="form-control" value="" id="txtPrecioCompraProducto" name="PrecioCompra">
                        </div>
                        <div class="mb-3">
                            <label for="txtFechaVencimiento" class="form-label small mb-0">Fecha Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento" name="FechaVencimiento" value="">
                        </div>
                        <button class="btn btn-success w-100 mt-2 py-2" id="btnAgregarProducto">
                            <i class="bi bi-plus-circle me-2"></i>Añadir Producto
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-info-circle me-2"></i>Detalle de la Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="txtNumerofactura" value="">
                                    <label for="txtNumerofactura">Número Factura</label>
                                </div>
                                <input id="txtIdProveedor" type="hidden" value="0"/>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptproveedor" value="" placeholder=" ">
                                    <label for="iptproveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="fechaCompra" value="<?php echo date('Y-m-d'); ?>">
                                    <label for="fechaCompra">Fecha de Compra</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptruc" value="" readonly placeholder=" ">
                                    <label for="iptruc">RUC del Proveedor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-list-ul me-2"></i>Productos Añadidos</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive-custom">
                            <table id="tb_Compra" class="table table-striped table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th>Cant</th>
                                        <th>Precio Compra</th>
                                        <th>Sub Total ($)</th>
                                        <th>IVA ($)</th>
                                        <th>Total ($)</th>
                                        <th>Vence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-calculator me-2"></i>Resumen de Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-outline-primary py-2" id="btnIniciarComprasContado">
                                <i class="bi bi-cash-coin me-2"></i>Pagar al Contado
                            </button>
                            <button class="btn btn-outline-secondary py-2" id="btnIniciarComprasCredit">
                                <i class="bi bi-credit-card me-2"></i>Pagar a Crédito
                            </button>
                        </div>
                        
                        <hr class="my-3">

                        <p class="d-flex justify-content-between align-items-center mb-1">
                            Items: <strong id="Items">0</strong>
                        </p>
                        <p class="d-flex justify-content-between align-items-center mb-1">
                            Sub Total: $<strong class="text-danger-custom" id="subTotal">0.00</strong>
                        </p>
                        <p class="d-flex justify-content-between align-items-center mb-1">
                            Impuesto 15%: $<strong id="totalIva">0.00</strong>
                        </p>
                        
                        <div class="summary-total-box mt-3 mb-3">
                            TOTAL: $<strong id="total_compras">0.00</strong>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                            <label class="form-check-label small" for="chkafectarCaja">
                                Afectar Caja
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

    <script>
        // Initialize DataTables (example, adjust as per your actual implementation)
        $(document).ready(function() {
            $('#tb_Compra').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Spanish language pack
                },
                "paging": false,       // Disable pagination if you want all rows visible
                "searching": false,    // Disable search box
                "info": false,         // Disable showing "Showing X of Y entries"
                "columnDefs": [
                    { "width": "5%", "targets": 0 }, // Adjust column widths as needed
                    { "width": "5%", "targets": 1 },
                    { "width": "10%", "targets": 2 },
                    { "width": "25%", "targets": 3 },
                    { "width": "8%", "targets": 4 },
                    { "width": "10%", "targets": 5 },
                    { "width": "10%", "targets": 6 },
                    { "width": "10%", "targets": 7 },
                    { "width": "10%", "targets": 8 },
                    { "width": "7%", "targets": 9 }
                ]
            });

            // Set today's date for fechaCompra by default
            const today = new Date().toISOString().split('T')[0];
            $('#fechaCompra').val(today);
        });

        // Your existing JavaScript logic for adding products, calculating totals, etc.
        // goes here. Make sure to update selectors if you changed IDs/classes.
        // For example:
        // document.getElementById('btnAgregarProducto').addEventListener('click', function() { ... });
        // Make sure your JavaScript uses the new IDs like 'txtNumerofactura', 'iptproveedor', etc.
    </script>
</body>
</html>