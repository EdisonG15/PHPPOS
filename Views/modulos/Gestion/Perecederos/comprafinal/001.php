<div class="container-fluid py-4">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

    <div class="row g-4">
        <div class="col-md-9">
            <div class="card shadow-sm mb-4 border-0 rounded-3">
                <div class="card-header bg-gradient-primary text-white d-flex align-items-center rounded-top-3">
                    <i class="fas fa-file-invoice-dollar fa-lg me-2"></i> <h5 class="mb-0 card-title-custom">Datos Generales de la Compra</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="proveedorSearch" class="form-label font-weight-bold">Proveedor <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg rounded-start" id="proveedorSearch" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList" aria-label="Buscar proveedor" required>
                                <datalist id="proveedoresList">
                                    <option value="Distribuidora Alfa S.A.">
                                    <option value="Comercial Beta Ltda.">
                                    <option value="Proveedor Gamma C.A.">
                                </datalist>
                                <button class="btn btn-outline-success btn-lg rounded-end" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                    <i class="fas fa-user-plus me-1"></i> Nuevo
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaFactura" class="form-label font-weight-bold">Fecha Factura <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg" id="fechaFactura" value="2025-05-28" required>
                        </div>
                        <div class="col-md-3">
                            <label for="numeroFactura" class="form-label font-weight-bold">Número Factura <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="numeroFactura" placeholder="Ej: 001-001-123456" required>
                        </div>
                        <div class="col-md-6" id="fechaVencimientoCredito" style="display: none;">
                            <label for="fechaVencimiento" class="form-label font-weight-bold">Fecha Vencimiento Crédito</label>
                            <input type="date" class="form-control form-control-lg" id="fechaVencimiento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4 border-0 rounded-3">
                <div class="card-header bg-gradient-info text-white d-flex align-items-center rounded-top-3">
                    <i class="fas fa-boxes fa-lg me-2"></i> <h5 class="mb-0 card-title-custom">Detalle de Productos</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3 mb-4 align-items-end">
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="">

                        <div class="col-md-5">
                            <label for="productoSearch" class="form-label font-weight-bold">Buscar Producto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off" aria-label="Buscar producto">
                            <datalist id="productosList">
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label font-weight-bold">F. Vencimiento</label>
                            <input type="date" class="form-control form-control-lg" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label font-weight-bold">Precio Compra <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label font-weight-bold">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" id="txtCantidadProducto" placeholder="0" min="1" required>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary btn-lg mt-2" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-2"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="card p-3 table-responsive border-0 rounded-3">
                        <table class="table table-hover table-striped align-middle" id="tb_Compra">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>F. Vencimiento</th>
                                    <th>Precio Compra</th>
                                    <th>Cantidad</th>
                                    <th>$-Iva</th>
                                    <th>$-Sub Total</th>
                                    <th>$-Total</th>
                                    <th class="text-center">Acciones</th>
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
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-gradient-dark text-white d-flex align-items-center rounded-top-3">
                    <i class="bi bi-calculator-fill fa-lg me-2"></i> <h5 class="mb-0 card-title-custom">Resumen de Compra</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3 mb-4">
                        <button class="btn btn-success btn-lg py-3 rounded-pill" id="btnIniciarComprasContado">
                            <i class="bi bi-cash-coin me-2"></i> Pagar al Contado
                        </button>
                        <button class="btn btn-outline-success btn-lg py-3 rounded-pill" id="btnIniciarComprasCredit">
                            <i class="bi bi-credit-card me-2"></i> Pagar a Crédito
                        </button>
                    </div>

                    <hr class="my-4 custom-hr">

                    <div class="summary-item d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Items:</span>
                        <strong id="Items" class="text-primary fs-5">0</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Sub Total:</span>
                        <strong class="text-secondary fs-5" id="subTotal">$0.00</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Impuesto 15%:</span>
                        <strong id="totalIva" class="text-warning fs-5">$0.00</strong>
                    </div>

                    <div class="summary-total-box p-3 text-center rounded bg-light border border-primary mt-4 mb-4">
                        <h4 class="mb-2 text-primary fw-bold">TOTAL A PAGAR</h4>
                        <h3 class="display-5 fw-bold text-primary" id="total_compras">$0.00</h3>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                        <label class="form-check-label small text-muted" for="chkafectarCaja">
                            <i class="bi bi-wallet2 me-1"></i> Afectar Caja al Registrar
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --bs-primary: #007bff; /* Custom primary color */
        --bs-info: #17a2b8; /* Custom info color */
        --bs-dark: #343a40; /* Custom dark color */
        --bs-success: #28a745; /* Custom success color */
        --bs-secondary: #6c757d; /* Custom secondary color */
        --bs-warning: #ffc107; /* Custom warning color */
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, var(--bs-primary), #0056b3) !important;
    }

    .bg-gradient-info {
        background: linear-gradient(45deg, var(--bs-info), #117a8b) !important;
    }

    .bg-gradient-dark {
        background: linear-gradient(45deg, var(--bs-dark), #1d2124) !important;
    }

    .card {
        border-radius: 1rem; /* More rounded corners for cards */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08) !important; /* Stronger but softer shadow */
    }

    .card-header {
        border-bottom: none; /* Remove default border from header */
        padding: 1.25rem 1.5rem; /* More padding for headers */
        border-top-left-radius: 1rem !important;
        border-top-right-radius: 1rem !important;
    }

    .card-title-custom {
        font-weight: 600;
        letter-spacing: 0.05em;
    }

    .form-control-lg {
        height: calc(2.5em + 1rem + 2px); /* Slightly larger input fields */
        font-size: 1.1rem;
        border-radius: 0.5rem; /* Rounded input fields */
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .input-group .btn-lg {
        border-radius: 0.5rem !important;
    }

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
    }

    .table th, .table td {
        padding: 1rem; /* More padding in table cells */
    }

    .table thead th {
        border-bottom: 2px solid #dee2e6; /* Clearer header separation */
        font-weight: 600;
        color: #343a40;
    }

    .summary-item span {
        font-weight: 500;
        color: #555;
    }

    .summary-item strong {
        font-size: 1.2rem;
        font-weight: 700;
    }

    .summary-total-box {
        background-color: #e9f5ff !important; /* Light blue background for total */
        border-color: var(--bs-primary) !important;
        padding: 1.5rem !important;
        border-radius: 0.75rem !important;
    }

    .summary-total-box h4 {
        color: var(--bs-primary) !important;
        margin-bottom: 0.75rem;
    }

    .summary-total-box h3 {
        color: var(--bs-primary) !important;
        font-size: 2.8rem; /* Larger total amount */
    }

    .custom-hr {
        border-top: 2px dashed #e9ecef; /* Dashed separator for a softer look */
    }

    /* Icon specific styles */
    .bi {
        vertical-align: middle;
        margin-right: 0.5rem;
    }
</style>