<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Compras - TuEmpresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer2MbIkRjXhEVq4861y+T6kCgS1p06Q69uPRh7Fk1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css"/>
    
    <style>
        /* Floating label adjustments */
.form-floating > label {
    padding: 0.85rem 1rem;
    font-size: 0.9rem;
    color: var(--secondary-color);
    /* Ensure no explicit background color by default */
    background-color: transparent; /* Changed */
    transition: all 0.2s ease-in-out; /* Smooth transition for label movement */
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .form-select:focus ~ label,
.form-floating > .form-select:not(:placeholder-shown) ~ label {
    transform: scale(0.85) translateY(-0.8rem) translateX(0.15rem);
    /* The key fix: set background to match body/card, and add a small padding/negative margin */
    background-color: var(--card-bg); /* This ensures it matches the card background */
    padding: 0 0.2rem;
    margin-left: -0.2rem; /* Pull it slightly to cover the border if needed */
    z-index: 2; /* Ensure label is above input content */
    color: var(--primary-color); /* Optionally change label color on focus/filled */
}
        :root {
            --primary-color: #007bff; /* Bootstrap primary blue */
            --secondary-color: #6c757d; /* Bootstrap secondary grey */
            --light-bg: #f8f9fa; /* Light grey background */
            --card-bg: #ffffff; /* White card background */
            --border-color: #e9ecef; /* Light border color */
            --text-color: #343a40; /* Darker text */
            --success-color: #28a745;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            min-height: 100vh; /* Ensure body takes full viewport height */
            display: flex;
            flex-direction: column;
        }

        /* Adjust container to take remaining height */
        .container-fluid {
            flex-grow: 1;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            display: flex; /* Use flexbox for inner layout */
            flex-direction: column;
        }
        .row.g-4 {
            flex-grow: 1;
        }


        /* Card styling */
        .card {
            border-radius: 0.8rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
            background-color: var(--card-bg);
            overflow: hidden;
            display: flex; /* Make cards flex containers */
            flex-direction: column; /* Stack content vertically */
        }
        /* Make cards in middle column take full available height */
        .col-lg-6 .card {
            flex-grow: 1; /* Allow cards in middle column to expand */
        }


        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .card-title {
            font-weight: 500;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .card-body {
            padding: 1.5rem;
            flex-grow: 1; /* Allow card body to take available space */
            display: flex;
            flex-direction: column; /* Stack contents within card body */
        }

        /* Form input styling */
        .form-control, .form-select {
            border-radius: 0.35rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            border-color: var(--primary-color);
        }

        /* Floating label adjustments */
        .form-floating > label {
            padding: 0.85rem 1rem;
            font-size: 0.9rem;
            color: var(--secondary-color);
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select:focus ~ label,
        .form-floating > .form-select:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-0.8rem) translateX(0.15rem);
            background-color: var(--card-bg);
            padding: 0 0.2rem;
            margin-left: -0.2rem;
        }

        /* Readonly input styling */
        .form-control[readonly] {
            background-color: var(--border-color);
            opacity: 0.9;
        }

        /* Buttons */
        .btn {
            border-radius: 0.35rem;
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-success { background-color: var(--success-color); border-color: var(--success-color); }
        .btn-success:hover { background-color: #218838; border-color: #1e7e34; }

        .btn-outline-primary { border-color: var(--primary-color); color: var(--primary-color); }
        .btn-outline-primary:hover { background-color: var(--primary-color); color: white; }

        .btn-outline-secondary { border-color: var(--secondary-color); color: var(--secondary-color); }
        .btn-outline-secondary:hover { background-color: var(--secondary-color); color: white; }

        /* DataTables specifics */
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            display: none;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.9rem;
        }

        .table thead th {
            background-color: var(--border-color);
            color: var(--text-color);
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            padding: 0.75rem 1rem;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: var(--light-bg);
        }

        .table tbody td {
            padding: 0.65rem 1rem;
            vertical-align: middle;
        }

        /* Custom scrollable table body for fixed header */
        .table-responsive-scroll {
            flex-grow: 1; /* Allow table wrapper to take available height */
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 0.35rem;
            margin-top: 0.5rem;
            position: relative; /* For sticky header context */
        }
        .table-responsive-scroll thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: var(--card-bg);
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.05);
        }
        
        /* Summary total box */
        .summary-total-box {
            background-color: rgba(0, 123, 255, 0.1);
            border: 1px solid rgba(0, 123, 255, 0.2);
            border-radius: 0.75rem;
            padding: 1.25rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .summary-total-box .total-label {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .summary-total-box .total-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
        }
        .summary-total-box .total-amount small {
            font-size: 1.5rem;
            margin-right: 0.2rem;
            opacity: 0.8;
        }

        /* Detail summary lines */
        .summary-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #eee;
        }
        .summary-line:last-child {
            border-bottom: none;
        }
        .summary-line strong {
            font-weight: 600;
            color: var(--text-color);
        }
        .summary-line .value {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 1.1rem;
        }
        .summary-line.text-danger-custom .value {
            color: var(--danger-color);
        }

        /* Checkbox styling */
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Specific adjustments for Product Detail column on larger screens */
        @media (min-width: 992px) { /* Lg breakpoint */
            .col-lg-3.order-lg-1 .card-body {
                padding-top: 1rem; /* Reduce top padding in card body for product details */
                padding-bottom: 1rem; /* Reduce bottom padding */
            }
            .col-lg-3.order-lg-1 .mb-3 {
                margin-bottom: 0.75rem !important; /* Smaller margins for fields */
            }
            .col-lg-3.order-lg-1 .mb-4 {
                margin-bottom: 1rem !important; /* Adjusted margin for date picker */
            }
            .col-lg-3.order-lg-1 .form-label {
                margin-bottom: 0.25rem !important; /* Smaller margin for labels */
            }
            .col-lg-3.order-lg-1 .btn {
                margin-top: 0.5rem; /* Space before button */
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario; ?>"/>
        <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja; ?>"/>
        <input type="hidden" id="Nro_correlativo_compras" disabled>
        <input type="hidden" id="Nro_credito_compras">

        <div class="row g-4 flex-grow-1"> <div class="col-lg-3 col-md-5 order-md-1 order-lg-1 d-flex flex-column"> <div class="card flex-grow-0"> <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i>Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            <input type="text" class="form-control form-control-lg" id="iptCodigo" placeholder="Escanear o Código" autofocus>
                        </div>
                        
                        <input id="txtIdProducto" type="hidden" value="0"/>
                        <input id="txtllevaIva" type="hidden" value="0"/>
                        <input id="perecedero_producto" type="hidden" value="0"/>
                        
                        <div class="mb-3">
                            <label for="txtCodigoProducto" class="form-label small text-muted">Código</label>
                            <input type="text" class="form-control" id="txtCodigoProducto" name="Codigo" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="txtNombreProducto" class="form-label small text-muted">Descripción</label>
                            <input type="text" class="form-control" id="txtNombreProducto" name="Nombre" value="">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="txtCantidadProducto" class="form-label small text-muted">Cant.</label>
                                <input type="number" class="form-control" id="txtCantidadProducto" name="Cantidad" value="1" min="1">
                            </div>
                            <div class="col-6">
                                <label for="txtPrecioCompraProducto" class="form-label small text-muted">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">L.</span>
                                    <input type="text" class="form-control" value="" id="txtPrecioCompraProducto" name="PrecioCompra" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtFechaVencimiento" class="form-label small text-muted">Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento" name="FechaVencimiento" value="">
                        </div>
                        <button class="btn btn-success w-100 py-2" id="btnAgregarProducto">
                            <i class="bi bi-plus-circle"></i> Añadir Item
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7 order-md-2 order-lg-2 d-flex flex-column"> <div class="card mb-4 flex-grow-0"> <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-receipt"></i>Datos de Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="txtNumerofactura" placeholder=" ">
                                    <label for="txtNumerofactura">No. Factura</label>
                                </div>
                                <input id="txtIdProveedor" type="hidden" value="0"/>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptproveedor" placeholder=" ">
                                    <label for="iptproveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="fechaCompra" value="<?php echo date('Y-m-d'); ?>" placeholder=" ">
                                    <label for="fechaCompra">Fecha de Compra</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptruc" value="" readonly placeholder=" ">
                                    <label for="iptruc">RUC Proveedor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card flex-grow-1"> <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-cart-check"></i>Items de la Compra</h5>
                    </div>
                    <div class="card-body p-0 d-flex flex-column"> <div class="table-responsive table-responsive-scroll flex-grow-1"> <table id="tb_Compra" class="table table-striped table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Id</th>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th class="text-end">Cant</th>
                                        <th class="text-end">Precio Compra</th>
                                        <th class="text-end">Sub Total (L.)</th>
                                        <th class="text-end">IVA (L.)</th>
                                        <th class="text-end">Total (L.)</th>
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

            <div class="col-lg-3 col-md-12 order-md-3 order-lg-3 d-flex flex-column"> <div class="card flex-grow-1"> <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-wallet2"></i>Resumen y Pago</h5>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between"> <div> <div class="d-grid gap-3 mb-4">
                                <button class="btn btn-outline-primary py-2" id="btnIniciarComprasContado">
                                    <i class="bi bi-cash-coin"></i> Finalizar Contado
                                </button>
                                <button class="btn btn-outline-secondary py-2" id="btnIniciarComprasCredit">
                                    <i class="bi bi-credit-card"></i> Finalizar Crédito
                                </button>
                            </div>
                            
                            <hr class="my-3">

                            <div class="summary-line">
                                <span>Items:</span> <strong id="Items">0</strong>
                            </div>
                            <div class="summary-line text-danger-custom">
                                <span>Sub Total:</span> <strong class="value" id="subTotal">0.00</strong>
                            </div>
                            <div class="summary-line">
                                <span>Impuesto 15%:</span> <strong class="value" id="totalIva">0.00</strong>
                            </div>
                        </div>

                        <div> <div class="summary-total-box mt-4">
                                <div class="total-label">TOTAL A PAGAR</div>
                                <div class="total-amount"><small>L.</small><span id="total_compras">0.00</span></div>
                            </div>

                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                                <label class="form-check-label small text-muted" for="chkafectarCaja">
                                    Marcar para registrar en la caja
                                </label>
                            </div>
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
            // Initialize DataTables
            $('#tb_Compra').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "paging": false,
                "searching": false,
                "info": false,
                "ordering": false,
                "columnDefs": [
                    { "width": "5%", "targets": 0, "orderable": false, "className": "text-center" }, // Action (delete)
                    { "width": "0%", "targets": 1, "visible": false }, // Id (hidden)
                    { "width": "10%", "targets": 2 }, // Código
                    { "width": "25%", "targets": 3 }, // Descripción (given more relative width)
                    { "width": "8%", "targets": 4, "className": "text-end" }, // Cantidad
                    { "width": "10%", "targets": 5, "className": "text-end" }, // Precio Compra
                    { "width": "10%", "targets": 6, "className": "text-end" }, // Sub Total
                    { "width": "10%", "targets": 7, "className": "text-end" }, // IVA
                    { "width": "10%", "targets": 8, "className": "text-end" }, // Total
                    { "width": "12%", "targets": 9 } // Vence (increased width for date)
                ]
            });

            // Set today's date for fechaCompra by default
            const today = new Date().toISOString().split('T')[0];
            $('#fechaCompra').val(today);

            // --- Your existing JavaScript logic should be integrated here ---
            // (Functions like addProductToTable, updatePurchaseSummary, delete-row-btn,
            //  price formatting, product lookup, provider autocomplete, etc., remain similar.)

            function addProductToTable(product) {
                const table = $('#tb_Compra').DataTable();
                table.row.add([
                    '<button class="btn btn-sm btn-outline-danger delete-row-btn" title="Eliminar item"><i class="bi bi-trash"></i></button>',
                    product.id,
                    product.codigo,
                    product.descripcion,
                    parseFloat(product.cantidad), // Ensure number
                    parseFloat(product.precioCompra).toFixed(2),
                    parseFloat(product.subTotal).toFixed(2),
                    parseFloat(product.iva).toFixed(2),
                    parseFloat(product.total).toFixed(2),
                    product.fechaVencimiento || 'N/A'
                ]).draw(false);
                updatePurchaseSummary();
            }

            $('#tb_Compra tbody').on('click', '.delete-row-btn', function() {
                const table = $('#tb_Compra').DataTable();
                table.row($(this).parents('tr')).remove().draw(false);
                updatePurchaseSummary();
            });

            function updatePurchaseSummary() {
                let totalItems = 0;
                let subTotal = 0;
                let totalIva = 0;
                let finalTotal = 0;

                $('#tb_Compra').DataTable().rows().every(function() {
                    const data = this.data();
                    totalItems += parseFloat(data[4]); // Quantity
                    subTotal += parseFloat(data[6]);    // Sub Total
                    totalIva += parseFloat(data[7]);     // IVA
                    finalTotal += parseFloat(data[8]);   // Total
                });

                $('#Items').text(totalItems);
                $('#subTotal').text(subTotal.toFixed(2));
                $('#totalIva').text(totalIva.toFixed(2));
                $('#total_compras').text(finalTotal.toFixed(2));
            }

            updatePurchaseSummary(); // Initial calculation

            $('#txtPrecioCompraProducto').on('blur', function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    $(this).val(value.toFixed(2));
                }
            }).on('focus', function() {
                let value = $(this).val();
                if (value.indexOf('.') !== -1) {
                    $(this).val(parseFloat(value).toString());
                }
            });

            $('#btnAgregarProducto').on('click', function() {
                const newProduct = {
                    id: $('#txtIdProducto').val(),
                    codigo: $('#txtCodigoProducto').val(),
                    descripcion: $('#txtNombreProducto').val(),
                    cantidad: $('#txtCantidadProducto').val(),
                    precioCompra: $('#txtPrecioCompraProducto').val(),
                    fechaVencimiento: $('#txtFechaVencimiento').val(),
                    llevaIva: $('#txtllevaIva').val() === '1'
                };

                if (!newProduct.descripcion || newProduct.cantidad <= 0 || isNaN(newProduct.precioCompra) || parseFloat(newProduct.precioCompra) <= 0) {
                    alert('Por favor, complete todos los campos de producto correctamente (Descripción, Cantidad > 0, Precio > 0).');
                    return;
                }

                const unitPrice = parseFloat(newProduct.precioCompra);
                const quantity = parseInt(newProduct.cantidad);
                const itemSubTotal = unitPrice * quantity;
                const itemIvaRate = newProduct.llevaIva ? 0.15 : 0;
                const itemIva = itemSubTotal * itemIvaRate;
                const itemTotal = itemSubTotal + itemIva;

                newProduct.subTotal = itemSubTotal;
                newProduct.iva = itemIva;
                newProduct.total = itemTotal;

                addProductToTable(newProduct);

                $('#iptCodigo').val('').focus();
                $('#txtIdProducto').val('0');
                $('#txtCodigoProducto').val('');
                $('#txtNombreProducto').val('');
                $('#txtCantidadProducto').val('1');
                $('#txtPrecioCompraProducto').val('');
                $('#txtFechaVencimiento').val('');
                $('#txtllevaIva').val('0');
                $('#perecedero_producto').val('0');
                $('#txtFechaVencimiento').prop('disabled', false); // Re-enable for next product
            });

            // Autocomplete for Proveedor (requires jQuery UI Autocomplete, not just jQuery)
            // You'll need to link jQuery UI CSS/JS for this
            // Example: https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css
            // Example: https://code.jquery.com/ui/1.13.2/jquery-ui.min.js
            /*
            $('#iptproveedor').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'your_backend_url/search_providers.php',
                        dataType: 'json',
                        data: { term: request.term },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return { label: item.nombre, value: item.nombre, id: item.id, ruc: item.ruc };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#txtIdProveedor').val(ui.item.id);
                    $('#iptruc').val(ui.item.ruc);
                }
            });
            */

            // Product lookup by code/barcode
            $('#iptCodigo').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    const searchTerm = $(this).val();
                    if (searchTerm.length > 0) {
                        $.ajax({
                            url: 'your_backend_url/get_product_by_code.php',
                            dataType: 'json',
                            data: { code: searchTerm },
                            success: function(productData) {
                                if (productData) {
                                    $('#txtIdProducto').val(productData.id_producto);
                                    $('#txtCodigoProducto').val(productData.codigo);
                                    $('#txtNombreProducto').val(productData.nombre);
                                    $('#txtPrecioCompraProducto').val(productData.precio_compra);
                                    $('#txtllevaIva').val(productData.lleva_iva ? '1' : '0');
                                    $('#perecedero_producto').val(productData.perecedero ? '1' : '0');

                                    if (productData.perecedero === 0) {
                                        $('#txtFechaVencimiento').val('');
                                        $('#txtFechaVencimiento').prop('disabled', true);
                                    } else {
                                        $('#txtFechaVencimiento').prop('disabled', false);
                                    }
                                    $('#txtCantidadProducto').focus().select();
                                } else {
                                    alert('Producto no encontrado. Verifique el código o la descripción.');
                                    $('#txtIdProducto').val('0');
                                    $('#txtCodigoProducto').val('');
                                    $('#txtNombreProducto').val('');
                                    $('#txtPrecioCompraProducto').val('');
                                    $('#txtllevaIva').val('0');
                                    $('#perecedero_producto').val('0');
                                    $('#txtFechaVencimiento').val('');
                                    $('#txtFechaVencimiento').prop('disabled', false);
                                    $('#txtNombreProducto').focus(); // Suggest manual entry/search
                                }
                            },
                            error: function() {
                                alert('Error al buscar producto. Intente de nuevo.');
                            }
                        });
                    }
                }
            });

            // Initial state for Fecha Vencimiento based on 'perecedero_producto' (if pre-populated)
            // You might need to trigger this on page load if 'perecedero_producto' has a default value
            if ($('#perecedero_producto').val() === '0') {
                $('#txtFechaVencimiento').val('');
                $('#txtFechaVencimiento').prop('disabled', true);
            }
            // Event listener for changes (if it can be dynamically set)
            $('#perecedero_producto').on('change', function() {
                if ($(this).val() === '0') {
                    $('#txtFechaVencimiento').val('');
                    $('#txtFechaVencimiento').prop('disabled', true);
                } else {
                    $('#txtFechaVencimiento').prop('disabled', false);
                }
            });
        });
    </script>
</body>
</html>