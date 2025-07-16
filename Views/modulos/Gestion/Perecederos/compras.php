

    <style>
        :root {
            --primary-color: #007bff; /* Azul estándar de Bootstrap para consistencia */
            --secondary-color: #6c757d;
            --accent-color: #28a745; /* Verde para acciones positivas */
            --bg-light: #f8f9fa; /* Fondo muy claro */
            --card-bg: #ffffff;
            --text-dark: #343a40;
            --border-radius: 0.75rem;
            --shadow-light: rgba(0, 0, 0, 0.08); /* Sombra suave */
            --header-gradient: linear-gradient(135deg, #007bff, #0056b3); /* Gradiente para encabezados */
        }

        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh; /* Asegura que el fondo cubra toda la altura */
            display: flex;
            flex-direction: column;
        }
        .container-fluid {
            flex-grow: 1; /* Permite que el contenedor se expanda */
            padding: 2.5rem;
        }
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 0.5rem 1rem var(--shadow-light);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background: var(--header-gradient);
            color: white;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-bottom: none;
            display: flex;
            align-items: center;
        }
        .card-header h4, .card-header h5 {
            margin-bottom: 0;
            color: white;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .form-floating > .form-control,
        .form-floating > .form-select {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }
        .form-floating > label {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .btn {
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem; /* Espacio entre ícono y texto */
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .btn-outline-secondary {
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }
        .btn-outline-secondary:hover {
            background-color: var(--secondary-color);
            color: white;
        }
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Tabla de productos */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .table-custom thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 1.2rem;
            font-weight: 600;
            vertical-align: middle;
        }
        .table-custom tbody tr {
            background-color: var(--card-bg);
            border-bottom: 1px solid #e0e0e0;
        }
        .table-custom tbody tr:last-child {
            border-bottom: none;
        }
        .table-custom tbody td {
            padding: 0.8rem 1.2rem;
            vertical-align: middle;
        }
        .table-custom tbody td .form-control {
            height: auto; /* Ajusta la altura para inputs en tabla */
            padding: 0.5rem 0.75rem;
        }
        .table-custom .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        /* Summary boxes for totals */
        .summary-box {
            background-color: var(--bg-light);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            font-size: 1.15em;
            font-weight: 600;
            border: 1px dashed #ced4da;
            margin-bottom: 1.5rem; /* Espacio entre los boxes */
        }
        .summary-box.total {
            background-color: var(--accent-color);
            color: white;
            border: none;
            text-align: center;
        }
        .summary-box.total .display-5 {
            font-weight: 700;
            font-size: 2.75rem;
        }

        /* Visually hide labels but keep them for accessibility */
        .form-label.visually-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0,0,0,0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
    </style>


    <div class="container-fluid mt-3">
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario; ?>"/>
        <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja; ?>"/>
        <input type="hidden" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm">
        <input type="hidden" name="Nro_credito_compras" id="Nro_credito_compras">

        <div class="row g-4"> <div class="col-lg-3 col-md-5"> <div class="card">
                    <div class="card-header">
                        <i class="bi bi-box-seam me-2"></i>
                        <h5 class="mb-0">Detalles del Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="iptCodigo" class="form-label">Escanear/Buscar Código</label>
                            <input type="text" class="form-control form-control-lg" id="iptCodigo" placeholder="Código de barras o SKU" autofocus>
                        </div>
                        
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        
                        <div class="mb-3">
                            <label for="txtCodigoProducto" class="form-label">Código</label>
                            <input type="text" class="form-control" id="txtCodigoProducto" name="Codigo" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="txtNombreProducto" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="txtNombreProducto" name="Nombre" value="" placeholder="Nombre del producto" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="txtCantidadProducto" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="txtCantidadProducto" name="Cantidad" value="1" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="txtPrecioCompraProducto" class="form-label">Precio de Compra (Unidad)</label>
                            <input type="number" class="form-control" value="" id="txtPrecioCompraProducto" name="PrecioCompra" step="0.01" min="0">
                        </div>
                        <div class="mb-4">
                            <label for="txtFechaVencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento" name="FechaVencimiento" value="">
                        </div>
                        <button class="btn btn-success w-100 btn-lg" id="btnAgregarProducto">
                            <i class="bi bi-plus-circle"></i> Añadir a la Compra
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7"> <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-building me-2"></i>
                        <h5 class="mb-0">Información del Proveedor y Factura</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtNumerofactura" value="" placeholder=" ">
                                    <label for="txtNumerofactura">Número de Factura</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="fechaCompra" value="<?php echo date('Y-m-d'); ?>" placeholder=" ">
                                    <label for="fechaCompra">Fecha de Compra</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input id="txtIdProveedor" type="hidden" value="0" />
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="text" class="form-control" id="iptproveedor" value="" placeholder=" ">
                                        <label for="iptproveedor">Proveedor</label>
                                    </div>
                                    <button class="btn btn-outline-primary" type="button" id="btnBuscarProveedor">
                                        <i class="bi bi-search"></i> Buscar
                                    </button>
                                    <button class="btn btn-primary" type="button" id="btnRegistrarProveedor" data-bs-toggle="modal" data-bs-target="#modalRegistrarProveedor">
                                        <i class="bi bi-person-add"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="iptruc" value="" readonly placeholder=" ">
                                    <label for="iptruc">RUC / ID</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-3">
                    <div class="card-header bg-white text-dark py-3" style="background-color: var(--bg-light) !important;">
                        <h5 class="mb-0">Productos en la Compra</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="tb_Compra" class="table table-custom align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 10%;">ID</th>
                                        <th style="width: 15%;">Código</th>
                                        <th style="width: 25%;">Descripción</th>
                                        <th style="width: 8%;">Cant</th>
                                        <th style="width: 12%;">P. Compra</th>
                                        <th style="width: 10%;">IVA (15%)</th>
                                        <th style="width: 10%;">Total</th>
                                        <th style="width: 10%;">Vence</th>
                                        <th style="width: 5%;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>123</td>
                                        <td>PROD001</td>
                                        <td>Producto Ejemplo Uno</td>
                                        <td><input type="number" class="form-control form-control-sm text-center" value="2" min="1"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="10.00" step="0.01" min="0"></td>
                                        <td>$3.00</td>
                                        <td>$23.00</td>
                                        <td><input type="date" class="form-control form-control-sm" value="2025-12-31"></td>
                                        <td><button class="btn btn-sm btn-danger btn-action"><i class="bi bi-x-circle-fill"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12"> <div class="card">
                    <div class="card-header bg-success">
                        <i class="bi bi-calculator me-2"></i>
                        <h5 class="mb-0">Resumen de Totales</h5>
                    </div>
                    <div class="card-body">
                        <div class="summary-box">
                            <p class="mb-1">Ítems Totales:</p>
                            <h4 id="Items" class="fw-bold">0</h4>
                        </div>
                        <div class="summary-box">
                            <p class="mb-1">Subtotal:</p>
                            <h4 id="subTotal" class="fw-bold">$0.00</h4>
                        </div>
                        <div class="summary-box">
                            <p class="mb-1">IVA (15%):</p>
                            <h4 id="totalIva" class="fw-bold">$0.00</h4>
                        </div>
                        <div class="summary-box total mt-4 mb-4">
                            <p class="mb-2">TOTAL COMPRA:</p>
                            <h1 id="total_compras" class="display-5">$0.00</h1>
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                            <label class="form-check-label" for="chkafectarCaja">
                                <span class="fw-bold">Afectar Caja</span>
                                <small class="text-muted d-block">Marca si esta compra afecta el flujo de caja.</small>
                            </label>
                        </div>
                        
                        <div class="d-grid gap-3">
                            <button class="btn btn-primary btn-lg" id="btnIniciarComprasContado">
                                <i class="bi bi-cash-coin"></i> Registrar Compra (Contado)
                            </button>
                            <button class="btn btn-outline-secondary btn-lg" id="btnIniciarComprasCredit">
                                <i class="bi bi-credit-card"></i> Registrar Compra (Crédito)
                            </button>
                            <button class="btn btn-danger btn-lg" id="btnCancelarCompra">
                                <i class="bi bi-x-circle"></i> Cancelar Compra
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegistrarProveedor" tabindex="-1" aria-labelledby="modalRegistrarProveedorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarProveedorLabel"><i class="bi bi-person-add me-2"></i>Registrar Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRegistrarProveedor">
                        <div class="mb-3">
                            <label for="regRucProveedor" class="form-label">RUC / ID</label>
                            <input type="text" class="form-control" id="regRucProveedor" placeholder="Ej: 1792123456001" required>
                        </div>
                        <div class="mb-3">
                            <label for="regNombreProveedor" class="form-label">Razón Social / Nombre</label>
                            <input type="text" class="form-control" id="regNombreProveedor" placeholder="Nombre de la empresa o proveedor" required>
                        </div>
                        <div class="mb-3">
                            <label for="regDireccionProveedor" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="regDireccionProveedor" placeholder="Calle, número, ciudad" required>
                        </div>
                        <div class="mb-3">
                            <label for="regTelefonoProveedor" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="regTelefonoProveedor" placeholder="Ej: 022123456">
                        </div>
                        <div class="mb-3">
                            <label for="regEmailProveedor" class="form-label">Email</label>
                            <input type="email" class="form-control" id="regEmailProveedor" placeholder="contacto@proveedor.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="formRegistrarProveedor" class="btn btn-primary"><i class="bi bi-save me-2"></i>Guardar Proveedor</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // PHP values (ensure they are properly echoed as JavaScript strings)
            const idUsuario = document.getElementById('txtId_usuario').value;
            const idCaja = document.getElementById('txtId_caja').value;
            // Removed Nro_correlativo_compras and Nro_credito_compras as they are hidden inputs
            // and their values would typically be generated/managed by backend for a new purchase.

            // Product Panel Elements
            const iptCodigo = document.getElementById('iptCodigo');
            const txtIdProducto = document.getElementById('txtIdProducto');
            const txtllevaIva = document.getElementById('txtllevaIva');
            const perecedero_producto = document.getElementById('perecedero_producto');
            const txtCodigoProducto = document.getElementById('txtCodigoProducto');
            const txtNombreProducto = document.getElementById('txtNombreProducto');
            const txtCantidadProducto = document.getElementById('txtCantidadProducto');
            const txtPrecioCompraProducto = document.getElementById('txtPrecioCompraProducto');
            const txtFechaVencimiento = document.getElementById('txtFechaVencimiento');
            const btnAgregarProducto = document.getElementById('btnAgregarProducto');

            // Supplier & Invoice Panel Elements
            const txtNumerofactura = document.getElementById('txtNumerofactura');
            const fechaCompra = document.getElementById('fechaCompra');
            const txtIdProveedor = document.getElementById('txtIdProveedor');
            const iptproveedor = document.getElementById('iptproveedor');
            const btnBuscarProveedor = document.getElementById('btnBuscarProveedor');
            const iptruc = document.getElementById('iptruc');
            const btnRegistrarProveedor = document.getElementById('btnRegistrarProveedor');
            const formRegistrarProveedor = document.getElementById('formRegistrarProveedor');
            const modalRegistrarProveedor = new bootstrap.Modal(document.getElementById('modalRegistrarProveedor'));

            // Totals & Actions Panel Elements
            const ItemsSpan = document.getElementById('Items');
            const subTotalSpan = document.getElementById('subTotal');
            const totalIvaSpan = document.getElementById('totalIva');
            const total_comprasSpan = document.getElementById('total_compras');
            const chkafectarCaja = document.getElementById('chkafectarCaja');
            const btnIniciarComprasContado = document.getElementById('btnIniciarComprasContado');
            const btnIniciarComprasCredit = document.getElementById('btnIniciarComprasCredit');
            const btnCancelarCompra = document.getElementById('btnCancelarCompra');
            const tb_Compra = document.getElementById('tb_Compra').getElementsByTagName('tbody')[0];

            let productosEnCompra = []; // Array to store products in the current purchase
            let currentProveedor = null; // Object to store the selected supplier

            // Sample product data (replace with actual backend calls)
            const sampleProducts = [
                { id: 1, codigo: 'PROD001', descripcion: 'Producto Ejemplo Uno', llevaIva: true, perecedero: true, precioBase: 10.00 },
                { id: 2, codigo: 'SERV002', descripcion: 'Servicio de Mantenimiento', llevaIva: true, perecedero: false, precioBase: 50.00 },
                { id: 3, codigo: 'ITEM003', descripcion: 'Componente Electrónico', llevaIva: false, perecedero: false, precioBase: 5.00 },
            ];

            // Sample supplier data (replace with actual backend calls)
            const sampleProveedores = [
                { id: 101, nombre: 'Proveedor Alfa S.A.', ruc: '1792123456001', direccion: 'Av. Colón E12-34', contacto: 'ventas@alfa.com' },
                { id: 102, nombre: 'Distribuidora Beta', ruc: '0990123456002', direccion: 'Calle Principal 567', contacto: '042555123' },
            ];

            // --- UI Update Functions ---

            function calculateTotals() {
                let subTotal = 0;
                let totalIva = 0;
                let totalItems = 0;
                const ivaRate = 0.15; // Assuming 15% IVA for Ecuador as of 2025

                productosEnCompra.forEach(p => {
                    const lineSubtotal = p.cantidad * p.precioCompra;
                    subTotal += lineSubtotal;
                    if (p.llevaIva) {
                        totalIva += lineSubtotal * ivaRate;
                    }
                    totalItems += p.cantidad;
                });

                const grandTotal = subTotal + totalIva;

                ItemsSpan.textContent = totalItems;
                subTotalSpan.textContent = `$${subTotal.toFixed(2)}`;
                totalIvaSpan.textContent = `$${totalIva.toFixed(2)}`;
                total_comprasSpan.textContent = `$${grandTotal.toFixed(2)}`;
            }

            function renderProductsTable() {
                tb_Compra.innerHTML = ''; // Clear existing rows

                if (productosEnCompra.length === 0) {
                    const row = tb_Compra.insertRow();
                    const cell = row.insertCell(0);
                    cell.colSpan = 10;
                    cell.textContent = 'No hay productos añadidos a la compra.';
                    cell.className = 'text-center text-muted py-3';
                    return;
                }

                productosEnCompra.forEach((product, index) => {
                    const row = tb_Compra.insertRow();
                    const lineSubtotal = (product.cantidad * product.precioCompra);
                    const lineIva = product.llevaIva ? (lineSubtotal * 0.15) : 0;
                    const lineTotal = lineSubtotal + lineIva;

                    row.insertCell(0).textContent = index + 1; // #
                    row.insertCell(1).textContent = product.id; // Id
                    row.insertCell(2).textContent = product.codigo; // Código
                    row.insertCell(3).textContent = product.descripcion; // Descripción

                    // Quantity input
                    const qtyCell = row.insertCell(4);
                    const qtyInput = document.createElement('input');
                    qtyInput.type = 'number';
                    qtyInput.className = 'form-control form-control-sm text-center';
                    qtyInput.value = product.cantidad;
                    qtyInput.min = '1';
                    qtyInput.addEventListener('change', (e) => {
                        const newQty = parseInt(e.target.value);
                        if (!isNaN(newQty) && newQty >= 1) {
                            product.cantidad = newQty;
                            renderProductsTable(); // Re-render to update line totals
                            calculateTotals();
                        } else {
                            e.target.value = product.cantidad;
                        }
                    });
                    qtyCell.appendChild(qtyInput);

                    // Price input
                    const priceCell = row.insertCell(5);
                    const priceInput = document.createElement('input');
                    priceInput.type = 'number';
                    priceInput.className = 'form-control form-control-sm';
                    priceInput.value = product.precioCompra.toFixed(2);
                    priceInput.step = '0.01';
                    priceInput.min = '0';
                    priceInput.addEventListener('change', (e) => {
                        const newPrice = parseFloat(e.target.value);
                        if (!isNaN(newPrice) && newPrice >= 0) {
                            product.precioCompra = newPrice;
                            renderProductsTable(); // Re-render
                            calculateTotals();
                        } else {
                            e.target.value = product.precioCompra.toFixed(2);
                        }
                    });
                    priceCell.appendChild(priceInput);

                    row.insertCell(6).textContent = `$${lineSubtotal.toFixed(2)}`; // $-Sub Total (price * qty)
                    row.insertCell(7).textContent = `$${lineIva.toFixed(2)}`; // $-Iva
                    row.insertCell(8).textContent = `$${lineTotal.toFixed(2)}`; // $-Total

                    // Expiry Date input
                    const expiryCell = row.insertCell(9);
                    if (product.perecedero) {
                        const expiryInput = document.createElement('input');
                        expiryInput.type = 'date';
                        expiryInput.className = 'form-control form-control-sm';
                        expiryInput.value = product.fechaVencimiento || '';
                        expiryInput.addEventListener('change', (e) => {
                            product.fechaVencimiento = e.target.value;
                        });
                        expiryCell.appendChild(expiryInput);
                    } else {
                        expiryCell.textContent = 'N/A';
                        expiryCell.className = 'text-muted';
                    }
                    

                    // Action button
                    const actionCell = row.insertCell(10);
                    const deleteBtn = document.createElement('button');
                    deleteBtn.className = 'btn btn-sm btn-danger btn-action';
                    deleteBtn.innerHTML = '<i class="bi bi-x-circle-fill"></i>';
                    deleteBtn.addEventListener('click', () => {
                        productosEnCompra.splice(index, 1);
                        renderProductsTable();
                        calculateTotals();
                    });
                    actionCell.appendChild(deleteBtn);
                });
            }

            function clearProductForm() {
                txtIdProducto.value = '0';
                txtllevaIva.value = '0';
                perecedero_producto.value = '0';
                txtCodigoProducto.value = '';
                txtNombreProducto.value = '';
                txtCantidadProducto.value = '1';
                txtPrecioCompraProducto.value = '';
                txtFechaVencimiento.value = '';
                iptCodigo.value = '';
                iptCodigo.focus();
            }

            function clearPurchaseForm() {
                productosEnCompra = [];
                currentProveedor = null;
                renderProductsTable();
                calculateTotals();
                clearProductForm();
                txtNumerofactura.value = '';
                fechaCompra.value = new Date().toISOString().split('T')[0]; // Set to current date
                txtIdProveedor.value = '0';
                iptproveedor.value = '';
                iptruc.value = '';
                chkafectarCaja.checked = false;
            }

            // --- Event Listeners ---

            // Product Panel
            iptCodigo.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission
                    // Simulate product lookup (replace with actual AJAX/fetch call)
                    const searchTerm = iptCodigo.value.trim().toLowerCase();
                    const foundProduct = sampleProducts.find(p => 
                        p.codigo.toLowerCase() === searchTerm || p.descripcion.toLowerCase().includes(searchTerm)
                    );

                    if (foundProduct) {
                        txtIdProducto.value = foundProduct.id;
                        txtllevaIva.value = foundProduct.llevaIva ? '1' : '0';
                        perecedero_producto.value = foundProduct.perecedero ? '1' : '0';
                        txtCodigoProducto.value = foundProduct.codigo;
                        txtNombreProducto.value = foundProduct.descripcion;
                        txtPrecioCompraProducto.value = foundProduct.precioBase.toFixed(2);
                        txtCantidadProducto.value = '1'; // Default quantity
                        txtFechaVencimiento.value = foundProduct.perecedero ? '' : ''; // Clear if not perecedero
                    } else {
                        alert('Producto no encontrado. Considera añadirlo a la lista de productos.');
                        clearProductForm(); // Clear fields to allow manual entry if needed
                        txtNombreProducto.readOnly = false; // Allow manual entry if not found
                        txtCodigoProducto.readOnly = false;
                    }
                }
            });

            btnAgregarProducto.addEventListener('click', () => {
                const id = txtIdProducto.value === '0' ? Date.now() : parseInt(txtIdProducto.value); // Use existing ID or generate new
                const codigo = txtCodigoProducto.value.trim();
                const descripcion = txtNombreProducto.value.trim();
                const cantidad = parseInt(txtCantidadProducto.value);
                const precioCompra = parseFloat(txtPrecioCompraProducto.value);
                const fechaVencimiento = txtFechaVencimiento.value;
                const llevaIva = txtllevaIva.value === '1';
                const perecedero = perecedero_producto.value === '1';

                if (!descripcion || !cantidad || isNaN(cantidad) || cantidad <= 0 || !precioCompra || isNaN(precioCompra) || precioCompra < 0) {
                    alert('Por favor, completa la descripción, cantidad y precio de compra del producto.');
                    return;
                }

                if (perecedero && !fechaVencimiento) {
                    alert('Este producto es perecedero. Por favor, ingresa la fecha de vencimiento.');
                    return;
                }

                // Check if product already exists in the purchase list
                const existingProductIndex = productosEnCompra.findIndex(p => p.id === id);

                if (existingProductIndex > -1 && txtIdProducto.value !== '0') { // Only merge if it's an existing product from master list
                    productosEnCompra[existingProductIndex].cantidad += cantidad;
                    productosEnCompra[existingProductIndex].precioCompra = precioCompra; // Update price to latest
                    if (perecedero) productosEnCompra[existingProductIndex].fechaVencimiento = fechaVencimiento;
                } else {
                    productosEnCompra.push({
                        id,
                        codigo: codigo || 'N/A', // Allow N/A if not found
                        descripcion,
                        cantidad,
                        precioCompra,
                        fechaVencimiento: perecedero ? fechaVencimiento : '',
                        llevaIva,
                        perecedero
                    });
                }
                
                renderProductsTable();
                calculateTotals();
                clearProductForm();
                txtNombreProducto.readOnly = true; // Reset readonly status
                txtCodigoProducto.readOnly = true;
            });

            // Supplier & Invoice Panel
            btnBuscarProveedor.addEventListener('click', () => {
                const searchTerm = iptproveedor.value.trim().toLowerCase();
                const foundProveedor = sampleProveedores.find(p => 
                    p.nombre.toLowerCase().includes(searchTerm) || p.ruc.toLowerCase().includes(searchTerm)
                );

                if (foundProveedor) {
                    currentProveedor = foundProveedor;
                    txtIdProveedor.value = foundProveedor.id;
                    iptproveedor.value = foundProveedor.nombre;
                    iptruc.value = foundProveedor.ruc;
                } else {
                    alert('Proveedor no encontrado. Considera registrarlo.');
                    txtIdProveedor.value = '0';
                    iptruc.value = '';
                    currentProveedor = null;
                }
            });

            formRegistrarProveedor.addEventListener('submit', function(event) {
                event.preventDefault();
                const regRuc = document.getElementById('regRucProveedor').value.trim();
                const regNombre = document.getElementById('regNombreProveedor').value.trim();
                const regDireccion = document.getElementById('regDireccionProveedor').value.trim();
                const regTelefono = document.getElementById('regTelefonoProveedor').value.trim();
                const regEmail = document.getElementById('regEmailProveedor').value.trim();

                if (regRuc && regNombre && regDireccion) {
                    const newProveedorId = Math.max(...sampleProveedores.map(p => p.id)) + 1; // Simple ID generation
                    const newProveedor = {
                        id: newProveedorId,
                        nombre: regNombre,
                        ruc: regRuc,
                        direccion: regDireccion,
                        contacto: regTelefono || regEmail
                    };
                    sampleProveedores.push(newProveedor); // Add to sample data

                    currentProveedor = newProveedor;
                    txtIdProveedor.value = newProveedor.id;
                    iptproveedor.value = newProveedor.nombre;
                    iptruc.value = newProveedor.ruc;

                    alert(`Proveedor "${regNombre}" registrado y seleccionado.`);
                    modalRegistrarProveedor.hide();
                    formRegistrarProveedor.reset();
                } else {
                    alert('Por favor, completa los campos obligatorios para registrar al proveedor.');
                }
            });

            // Totals & Actions Panel
            btnIniciarComprasContado.addEventListener('click', () => {
                const totalCompra = parseFloat(total_comprasSpan.textContent.replace('$', ''));
                if (productosEnCompra.length === 0) {
                    alert('No hay productos en la compra.');
                    return;
                }
                if (!currentProveedor) {
                    alert('Por favor, selecciona o registra un proveedor.');
                    return;
                }
                if (!txtNumerofactura.value.trim()) {
                    alert('Ingresa el número de factura.');
                    return;
                }
                if (!fechaCompra.value) {
                    alert('Ingresa la fecha de compra.');
                    return;
                }

                // Simulate saving to backend
                const purchaseData = {
                    usuarioId: idUsuario,
                    cajaId: idCaja,
                    proveedor: currentProveedor,
                    numFactura: txtNumerofactura.value.trim(),
                    fechaCompra: fechaCompra.value,
                    productos: productosEnCompra,
                    subtotal: parseFloat(subTotalSpan.textContent.replace('$', '')),
                    iva: parseFloat(totalIvaSpan.textContent.replace('$', '')),
                    total: totalCompra,
                    tipoPago: 'Contado',
                    afectarCaja: chkafectarCaja.checked,
                    // Nro_correlativo_compras and Nro_credito_compras would be handled by backend
                };
                console.log('Registrando compra al contado:', purchaseData);
                alert('Compra al contado registrada con éxito!');
                clearPurchaseForm();
            });

            btnIniciarComprasCredit.addEventListener('click', () => {
                const totalCompra = parseFloat(total_comprasSpan.textContent.replace('$', ''));
                 if (productosEnCompra.length === 0) {
                    alert('No hay productos en la compra.');
                    return;
                }
                if (!currentProveedor) {
                    alert('Por favor, selecciona o registra un proveedor para compras a crédito.');
                    return;
                }
                if (!txtNumerofactura.value.trim()) {
                    alert('Ingresa el número de factura.');
                    return;
                }
                 if (!fechaCompra.value) {
                    alert('Ingresa la fecha de compra.');
                    return;
                }

                if (confirm('¿Confirmas esta compra a crédito?')) {
                    const purchaseData = {
                        usuarioId: idUsuario,
                        cajaId: idCaja,
                        proveedor: currentProveedor,
                        numFactura: txtNumerofactura.value.trim(),
                        fechaCompra: fechaCompra.value,
                        productos: productosEnCompra,
                        subtotal: parseFloat(subTotalSpan.textContent.replace('$', '')),
                        iva: parseFloat(totalIvaSpan.textContent.replace('$', '')),
                        total: totalCompra,
                        tipoPago: 'Crédito',
                        afectarCaja: chkafectarCaja.checked,
                    };
                    console.log('Registrando compra a crédito:', purchaseData);
                    alert('Compra a crédito registrada con éxito!');
                    clearPurchaseForm();
                }
            });

            btnCancelarCompra.addEventListener('click', () => {
                if (confirm('¿Estás seguro de cancelar la compra actual? Se perderán todos los datos ingresados.')) {
                    clearPurchaseForm();
                    alert('Compra cancelada.');
                }
            });

            // --- Initial Load ---
            renderProductsTable();
            calculateTotals();
            fechaCompra.value = new Date().toISOString().split('T')[0]; // Set default date
            iptCodigo.focus(); // Set focus to the barcode input on load
        });
    </script>
</body>
</html> 