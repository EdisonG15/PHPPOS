<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Compras - TuEmpresa</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9Oer2MbIkRjXhEVq4861y+T6kCgS1p06Q69uPRh7Fk1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css"/>
    
    <style>
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
            font-family: 'Roboto', sans-serif; /* Modern sans-serif font */
            background-color: var(--light-bg);
            color: var(--text-color);
        }

        /* Container padding for consistent spacing */
        .container-fluid {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        /* Card styling */
        .card {
            border-radius: 0.8rem; /* Slightly more rounded */
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05); /* Softer, more pronounced shadow */
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color); /* Subtle border */
            background-color: var(--card-bg);
            overflow: hidden; /* Ensures border-radius applies to content */
        }

        .card-header {
            background-color: var(--primary-color); /* Use primary color for header */
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
            gap: 0.75rem; /* Space between icon and text */
        }
        
        .card-body {
            padding: 1.5rem; /* Consistent padding */
        }

        /* Form input styling */
        .form-control, .form-select {
            border-radius: 0.35rem; /* Slightly rounded inputs */
            padding: 0.75rem 1rem; /* More comfortable padding */
            border: 1px solid #ced4da;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25); /* Primary color focus ring */
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
            background-color: var(--card-bg); /* Match label background to card */
            padding: 0 0.2rem;
            margin-left: -0.2rem;
        }

        /* Readonly input styling */
        .form-control[readonly] {
            background-color: var(--border-color); /* Clearly indicate read-only */
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
            gap: 0.5rem; /* Space between icon and text */
        }

        .btn-success { background-color: var(--success-color); border-color: var(--success-color); }
        .btn-success:hover { background-color: #218838; border-color: #1e7e34; }

        .btn-outline-primary { border-color: var(--primary-color); color: var(--primary-color); }
        .btn-outline-primary:hover { background-color: var(--primary-color); color: white; }

        .btn-outline-secondary { border-color: var(--secondary-color); color: var(--secondary-color); }
        .btn-outline-secondary:hover { background-color: var(--secondary-color); color: white; }

        /* Table styling */
        .dataTables_wrapper .dataTables_filter {
            display: none; /* Hide default search bar if not needed */
        }
        .dataTables_wrapper .dataTables_info {
            display: none; /* Hide default info text if not needed */
        }
        .dataTables_wrapper .dataTables_paginate {
            display: none; /* Hide default pagination if not needed */
        }

        .table {
            margin-bottom: 0; /* Remove default margin */
            border-collapse: separate; /* For rounded corners or more space */
            border-spacing: 0; /* No space between cells by default */
            font-size: 0.9rem;
        }

        .table thead th {
            background-color: var(--border-color); /* Lighter header background */
            color: var(--text-color);
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            padding: 0.75rem 1rem;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #dee2e6; /* Separator for rows */
        }

        .table tbody tr:last-child {
            border-bottom: none; /* No border for the last row */
        }

        .table tbody tr:hover {
            background-color: var(--light-bg); /* Subtle hover effect */
        }

        .table tbody td {
            padding: 0.65rem 1rem;
            vertical-align: middle;
        }

        /* Custom scrollable table body for fixed header */
        .table-responsive-scroll {
            max-height: 400px; /* Adjust as needed, e.g., 60vh for viewport height */
            overflow-y: auto;
            border: 1px solid var(--border-color); /* Border around the scrollable area */
            border-radius: 0.35rem; /* Match input rounding */
            margin-top: 0.5rem; /* Space below header */
        }
        .table-responsive-scroll thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: var(--card-bg); /* Ensure header background is visible */
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.05); /* Subtle shadow for sticky header */
        }
        
        /* Summary total box */
        .summary-total-box {
            background-color: rgba(0, 123, 255, 0.1); /* Light primary color background */
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
            font-size: 2.5rem; /* Larger font for total */
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1; /* Adjust line height */
        }
        .summary-total-box .total-amount small {
            font-size: 1.5rem; /* Currency symbol size */
            margin-right: 0.2rem;
            opacity: 0.8;
        }

        /* Detail summary lines */
        .summary-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #eee; /* Subtle dashed line */
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario; ?>"/>
        <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja; ?>"/>
        <input type="hidden" id="Nro_correlativo_compras" disabled>
        <input type="hidden" id="Nro_credito_compras">

        <div class="row g-4">
            <div class="col-lg-3 col-md-5 order-md-1 order-lg-1">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i>Detalle del Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            <input type="text" class="form-control form-control-lg" id="iptCodigo" placeholder="Escanee o busque el código..." autofocus>
                        </div>
                        
                        <input id="txtIdProducto" type="hidden" value="0"/>
                        <input id="txtllevaIva" type="hidden" value="0"/>
                        <input id="perecedero_producto" type="hidden" value="0"/>
                        
                        <div class="mb-3">
                            <label for="txtCodigoProducto" class="form-label small text-muted mb-1">Código del Producto</label>
                            <input type="text" class="form-control" id="txtCodigoProducto" name="Codigo" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="txtNombreProducto" class="form-label small text-muted mb-1">Descripción</label>
                            <input type="text" class="form-control" id="txtNombreProducto" name="Nombre" value="">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="txtCantidadProducto" class="form-label small text-muted mb-1">Cantidad</label>
                                <input type="number" class="form-control" id="txtCantidadProducto" name="Cantidad" value="1" min="1">
                            </div>
                            <div class="col-6">
                                <label for="txtPrecioCompraProducto" class="form-label small text-muted mb-1">Precio Compra</label>
                                <div class="input-group">
                                    <span class="input-group-text">L.</span> <input type="text" class="form-control" value="" id="txtPrecioCompraProducto" name="PrecioCompra" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtFechaVencimiento" class="form-label small text-muted mb-1">Fecha Vencimiento (si aplica)</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento" name="FechaVencimiento" value="">
                        </div>
                        <button class="btn btn-success w-100 py-2" id="btnAgregarProducto">
                            <i class="bi bi-plus-circle"></i> Añadir a la Compra
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7 order-md-2 order-lg-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-receipt"></i>Datos de la Compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="txtNumerofactura" placeholder=" ">
                                    <label for="txtNumerofactura">Número de Factura</label>
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
                                    <label for="iptruc">RUC del Proveedor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-cart-check"></i>Items de la Compra</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive-scroll">
                            <table id="tb_Compra" class="table table-striped table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th> <th>Id</th>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th>Cant</th>
                                        <th>Precio Compra</th>
                                        <th>Sub Total (L.)</th>
                                        <th>IVA (L.)</th>
                                        <th>Total (L.)</th>
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

            <div class="col-lg-3 col-md-12 order-md-3 order-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-wallet2"></i>Resumen y Pago</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3 mb-4">
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
                        
                        <div class="summary-total-box mt-4">
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
                "ordering": false, // If the order of items is fixed (by addition)
                "columnDefs": [
                    { "width": "5%", "targets": 0, "orderable": false, "className": "text-center" }, // Action column
                    { "width": "5%", "targets": 1, "visible": false }, // Id hidden
                    { "width": "10%", "targets": 2 }, // Código
                    { "width": "25%", "targets": 3 }, // Descripción
                    { "width": "8%", "targets": 4, "className": "text-end" }, // Cantidad
                    { "width": "12%", "targets": 5, "className": "text-end" }, // Precio Compra
                    { "width": "10%", "targets": 6, "className": "text-end" }, // Sub Total
                    { "width": "10%", "targets": 7, "className": "text-end" }, // IVA
                    { "width": "10%", "targets": 8, "className": "text-end" }, // Total
                    { "width": "8%", "targets": 9 } // Vence
                ]
            });

            // Set today's date for fechaCompra by default
            const today = new Date().toISOString().split('T')[0];
            $('#fechaCompra').val(today);

            // --- Your existing JavaScript logic should be integrated here ---
            // Example of how to add a row (replace with your actual data handling)
            // Function to add product to table
            function addProductToTable(product) {
                const table = $('#tb_Compra').DataTable();
                table.row.add([
                    '<button class="btn btn-sm btn-outline-danger delete-row-btn"><i class="bi bi-trash"></i></button>', // Delete button
                    product.id,
                    product.codigo,
                    product.descripcion,
                    product.cantidad,
                    parseFloat(product.precioCompra).toFixed(2),
                    parseFloat(product.subTotal).toFixed(2),
                    parseFloat(product.iva).toFixed(2),
                    parseFloat(product.total).toFixed(2),
                    product.fechaVencimiento || 'N/A'
                ]).draw(false); // Use draw(false) to avoid re-sorting/re-paging
                // You'll need to re-calculate totals after adding/removing
                updatePurchaseSummary();
            }

            // Example: Handle delete button click (event delegation)
            $('#tb_Compra tbody').on('click', '.delete-row-btn', function() {
                const table = $('#tb_Compra').DataTable();
                table.row($(this).parents('tr')).remove().draw(false);
                updatePurchaseSummary();
            });

            // Example: Update summary totals (implement your calculation logic)
            function updatePurchaseSummary() {
                let totalItems = 0;
                let subTotal = 0;
                let totalIva = 0;
                let finalTotal = 0;

                // Iterate over DataTables rows to calculate totals
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

            // Call update on initial load (if there's pre-existing data)
            updatePurchaseSummary();

            // Example for Price input formatting
            $('#txtPrecioCompraProducto').on('blur', function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    $(this).val(value.toFixed(2));
                }
            }).on('focus', function() {
                // Remove formatting on focus for easier editing
                let value = $(this).val();
                if (value.indexOf('.') !== -1) {
                    $(this).val(parseFloat(value).toString());
                }
            });

            // Add product button logic (simplified)
            $('#btnAgregarProducto').on('click', function() {
                // Get values from product input fields
                const newProduct = {
                    id: $('#txtIdProducto').val(),
                    codigo: $('#txtCodigoProducto').val(),
                    descripcion: $('#txtNombreProducto').val(),
                    cantidad: $('#txtCantidadProducto').val(),
                    precioCompra: $('#txtPrecioCompraProducto').val(),
                    fechaVencimiento: $('#txtFechaVencimiento').val(),
                    llevaIva: $('#txtllevaIva').val() === '1' // Assuming 1 means it carries IVA
                };

                // Basic validation
                if (!newProduct.descripcion || newProduct.cantidad <= 0 || isNaN(newProduct.precioCompra)) {
                    alert('Por favor, complete todos los campos de producto correctamente.');
                    return;
                }

                // Calculate sub-total, IVA, and total for the new product
                const unitPrice = parseFloat(newProduct.precioCompra);
                const quantity = parseInt(newProduct.cantidad);
                const itemSubTotal = unitPrice * quantity;
                const itemIvaRate = newProduct.llevaIva ? 0.15 : 0; // 15% IVA for Ecuador
                const itemIva = itemSubTotal * itemIvaRate;
                const itemTotal = itemSubTotal + itemIva;

                newProduct.subTotal = itemSubTotal;
                newProduct.iva = itemIva;
                newProduct.total = itemTotal;

                addProductToTable(newProduct);

                // Clear product input fields for next entry (optional)
                $('#iptCodigo').val('').focus();
                $('#txtIdProducto').val('0');
                $('#txtCodigoProducto').val('');
                $('#txtNombreProducto').val('');
                $('#txtCantidadProducto').val('1');
                $('#txtPrecioCompraProducto').val('');
                $('#txtFechaVencimiento').val('');
                $('#txtllevaIva').val('0'); // Reset IVA flag
                $('#perecedero_producto').val('0'); // Reset perishable flag
            });

            // Logic for autocompletion (example - you'll need backend support)
            $('#iptproveedor').autocomplete({
                source: function(request, response) {
                    // Replace with your AJAX call to search providers
                    $.ajax({
                        url: 'your_backend_url/search_providers.php', // Your API endpoint
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.nombre, // What is shown in the list
                                    value: item.nombre, // What is put in the input field
                                    id: item.id,
                                    ruc: item.ruc
                                };
                            }));
                        }
                    });
                },
                minLength: 2, // Start searching after 2 characters
                select: function(event, ui) {
                    $('#txtIdProveedor').val(ui.item.id);
                    $('#iptruc').val(ui.item.ruc);
                }
            });

            // Similarly, for product search (using iptCodigo, potentially with a search button or after scan)
            $('#iptCodigo').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    e.preventDefault();
                    const searchTerm = $(this).val();
                    if (searchTerm.length > 0) {
                        // Simulate product lookup (replace with actual AJAX)
                        $.ajax({
                            url: 'your_backend_url/get_product_by_code.php', // Your API endpoint
                            dataType: 'json',
                            data: {
                                code: searchTerm
                            },
                            success: function(productData) {
                                if (productData) {
                                    $('#txtIdProducto').val(productData.id_producto);
                                    $('#txtCodigoProducto').val(productData.codigo);
                                    $('#txtNombreProducto').val(productData.nombre);
                                    $('#txtPrecioCompraProducto').val(productData.precio_compra);
                                    $('#txtllevaIva').val(productData.lleva_iva ? '1' : '0');
                                    $('#perecedero_producto').val(productData.perecedero ? '1' : '0');

                                    // Clear vencimiento if not perishable
                                    if (productData.perecedero === 0) {
                                        $('#txtFechaVencimiento').val('');
                                        $('#txtFechaVencimiento').prop('disabled', true);
                                    } else {
                                        $('#txtFechaVencimiento').prop('disabled', false);
                                    }
                                    $('#txtCantidadProducto').focus().select(); // Focus on quantity
                                } else {
                                    alert('Producto no encontrado.');
                                    // Clear fields if product not found
                                    $('#txtIdProducto').val('0');
                                    $('#txtCodigoProducto').val('');
                                    $('#txtNombreProducto').val('');
                                    $('#txtPrecioCompraProducto').val('');
                                    $('#txtllevaIva').val('0');
                                    $('#perecedero_producto').val('0');
                                    $('#txtFechaVencimiento').val('');
                                    $('#txtFechaVencimiento').prop('disabled', false); // Enable for manual entry if needed
                                }
                            }
                        });
                    }
                }
            });

            // Handle disabling/enabling Fecha Vencimiento based on 'perecedero_producto'
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