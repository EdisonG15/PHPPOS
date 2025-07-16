<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Compras Avanzada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer2MbIkRjXhEVq4861y+T6kCgS1p06Q69uPRh7Fk1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #eef2f6; /* Lighter, modern background */
            font-family: 'Inter', sans-serif; /* Example: a modern font */
        }

        /* General Card Styling */
        .card {
            border-radius: 1rem; /* More prominent rounding */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* More noticeable, soft shadow */
            margin-bottom: 1.5rem;
            border: none; /* Remove default border */
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3); /* Gradient header */
            color: white;
            font-weight: 700; /* Bolder header text */
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .card-header .card-title {
            margin-bottom: 0;
            font-size: 1.25rem; /* Larger title */
        }

        .card-header .bi {
            font-size: 1.5rem; /* Larger icons in header */
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 0.5rem; /* Softer input corners */
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem; /* More padding for touch targets */
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .35) !important; /* Slightly wider focus shadow */
            border-color: #0d6efd !important;
        }

        /* Floating Labels - improved spacing */
        .form-floating > label {
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            color: #6c757d; /* Softer label color */
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select:focus ~ label,
        .form-floating > .form-select:not(:placeholder-shown) ~ label {
            transform: scale(0.8) translateY(-0.75rem) translateX(0.2rem); /* Adjusted for better appearance */
            background-color: #fff; /* Ensures label stands out against input */
            padding: 0 0.3rem; /* Reduces label background size */
            border-radius: 0.25rem;
        }

        /* Buttons */
        .btn {
            border-radius: 0.6rem; /* Rounded buttons */
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            transition: all 0.2s ease-in-out; /* Smooth hover effect */
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }


        /* Table Styling */
        .table {
            --bs-table-hover-bg: #e9f2fb; /* Softer hover for table */
            --bs-table-striped-bg: #f5f8fc; /* Lighter stripe */
        }

        .table thead th {
            background-color: #f1f4f8; /* Light blueish grey for header */
            color: #34495e; /* Darker, professional text */
            font-weight: 700; /* Bolder header text */
            padding: 0.9rem 1rem;
            white-space: nowrap;
            border-bottom: 2px solid #dee2e6; /* Stronger bottom border for header */
        }

        .table tbody td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e0e6ed; /* Lighter row separator */
        }

        /* Custom scrollable table container */
        .table-responsive-scroll {
            max-height: 60vh; /* Control max height */
            overflow-y: auto; /* Enable vertical scroll */
            border-radius: 0.75rem; /* Match card rounding */
            border: 1px solid #e0e6ed; /* Subtle border */
        }

        .table-responsive-scroll thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #f1f4f8; /* Ensures sticky header has background */
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* Subtle shadow for sticky header */
        }

        /* Summary Total Box */
        .summary-total-box {
            background-color: #e9f5ff; /* Light blue background for totals */
            border-radius: 0.75rem;
            padding: 1.5rem; /* More padding */
            margin-top: 1.5rem;
            text-align: center;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); /* Inner shadow for depth */
        }

        .summary-total-box h4 {
            font-weight: 700;
            color: #0056b3; /* Darker blue for "TOTAL" text */
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .summary-total-box strong {
            font-size: 2.5rem; /* Larger total amount */
            color: #007bff; /* Primary color for total amounts */
            display: block; /* Ensures it takes full line */
            margin-top: 0.5rem;
        }

        /* Specific text styles for summary */
        .summary-item {
            font-size: 1.05rem;
            font-weight: 500;
            color: #34495e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.4rem 0;
        }
        .summary-item strong {
            font-size: 1.15rem;
            color: #495057;
        }
        .summary-item .text-danger-custom {
            color: #dc3545; /* Bootstrap danger color */
            font-weight: 700; /* Bolder for emphasis */
        }

        hr.custom-hr {
            border-top: 2px dashed #e0e6ed; /* Dashed separator */
            margin: 1.5rem 0;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #5a6268;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .card-header {
                padding: 1rem;
            }
            .card-header .card-title {
                font-size: 1.1rem;
            }
            .card-header .bi {
                font-size: 1.3rem;
            }
            .summary-total-box strong {
                font-size: 2rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                        <i class="bi bi-box-seam me-3"></i>
                        <h5 class="card-title">Detalle de Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="iptCodigo" class="form-label visually-hidden">Escanee código</label>
                            <input type="text" class="form-control form-control-lg" id="iptCodigo" placeholder="Escanee código de barras..." autofocus>
                        </div>

                        <input id="txtIdProducto" type="hidden" value="0"/>
                        <input id="txtllevaIva" type="hidden" value="0"/>
                        <input id="perecedero_producto" type="hidden" value="0"/>

                        <div class="mb-3">
                            <label for="txtCodigoProducto" class="form-label small mb-1">Código</label>
                            <input type="text" class="form-control" id="txtCodigoProducto" name="Codigo" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="txtNombreProducto" class="form-label small mb-1">Descripción</label>
                            <input type="text" class="form-control" id="txtNombreProducto" name="Nombre" value="">
                        </div>
                        <div class="mb-3">
                            <label for="txtCantidadProducto" class="form-label small mb-1">Cantidad</label>
                            <input type="number" class="form-control" id="txtCantidadProducto" name="Cantidad" value="1" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="txtPrecioCompraProducto" class="form-label small mb-1">Precio Compra Unidad</label>
                            <input type="text" class="form-control" value="" id="txtPrecioCompraProducto" name="PrecioCompra">
                        </div>
                        <div class="mb-4">
                            <label for="txtFechaVencimiento" class="form-label small mb-1">Fecha Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento" name="FechaVencimiento" value="">
                        </div>
                        <button class="btn btn-success w-100 py-2" id="btnAgregarProducto">
                            <i class="bi bi-plus-circle me-2"></i>Añadir Producto
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-info-circle me-3"></i>
                        <h5 class="card-title">Detalle de la Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="txtNumerofactura" value="" placeholder="Número de Factura">
                                    <label for="txtNumerofactura">Número Factura</label>
                                </div>
                                <input id="txtIdProveedor" type="hidden" value="0"/>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptproveedor" value="" placeholder="Proveedor">
                                    <label for="iptproveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="fechaCompra" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha de Compra">
                                    <label for="fechaCompra">Fecha de Compra</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptruc" value="" readonly placeholder="RUC del Proveedor">
                                    <label for="iptruc">RUC del Proveedor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <i class="bi bi-cart-check me-3"></i>
                        <h5 class="card-title">Productos Añadidos</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive-scroll">
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
                        <i class="bi bi-calculator me-3"></i>
                        <h5 class="card-title">Resumen de Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-outline-primary py-2" id="btnIniciarComprasContado">
                                <i class="bi bi-cash-coin me-2"></i>Pagar al Contado
                            </button>
                            <button class="btn btn-outline-secondary py-2" id="btnIniciarComprasCredit">
                                <i class="bi bi-credit-card me-2"></i>Pagar a Crédito
                            </button>
                        </div>

                        <hr class="custom-hr">

                        <div class="summary-item">
                            Items: <strong id="Items">0</strong>
                        </div>
                        <div class="summary-item">
                            Sub Total: $<strong class="text-danger-custom" id="subTotal">0.00</strong>
                        </div>
                        <div class="summary-item">
                            Impuesto 15%: $<strong id="totalIva">0.00</strong>
                        </div>

                        <div class="summary-total-box mt-4 mb-3">
                            <h4>TOTAL A PAGAR</h4>
                            $<strong id="total_compras">0.00</strong>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                            <label class="form-check-label small" for="chkafectarCaja">
                                <i class="bi bi-wallet2 me-1"></i>Afectar Caja al Registrar
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
        $(document).ready(function() {
            $('#tb_Compra').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "paging": false,
                "searching": false,
                "info": false,
                "ordering": false, /* Disable sorting for this table */
                "columnDefs": [
                    { "width": "5%", "targets": 0 },
                    { "width": "5%", "targets": 1, "visible": false }, /* Hide ID column */
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

            const today = new Date().toISOString().split('T')[0];
            $('#fechaCompra').val(today);
        });

        // Your existing JavaScript logic for adding products, calculating totals, etc.
        // Make sure to use the correct selectors and IDs.
    </script>
</body>
</html>