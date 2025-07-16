<div class="container-fluid py-5 page-background">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

    <div class="row g-5">
        <div class="col-md-9">
            <div class="card shadow-sm mb-5 component-card">
                <div class="card-header bg-white border-bottom-0 p-4 d-flex align-items-center">
                    <i class="fas fa-file-invoice fa-lg text-primary me-3"></i> <h4 class="mb-0 card-title-bold">Datos Generales de la Compra</h4>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="proveedorSearch" class="form-label form-label-custom">Proveedor <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat">
                                <input type="text" class="form-control form-control-lg-custom" id="proveedorSearch" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList" aria-label="Buscar proveedor" required>
                                <datalist id="proveedoresList">
                                    <option value="Distribuidora Alfa S.A.">
                                    <option value="Comercial Beta Ltda.">
                                    <option value="Proveedor Gamma C.A.">
                                </datalist>
                                <button class="btn btn-outline-secondary-custom btn-lg-custom" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                    <i class="fas fa-user-plus me-1"></i> Nuevo
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaFactura" class="form-label form-label-custom">Fecha Factura <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg-custom" id="fechaFactura" value="2025-05-28" required>
                        </div>
                        <div class="col-md-3">
                            <label for="numeroFactura" class="form-label form-label-custom">Número Factura <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg-custom" id="numeroFactura" placeholder="Ej: 001-001-123456" required>
                        </div>
                        <div class="col-md-6" id="fechaVencimientoCredito" style="display: none;">
                            <label for="fechaVencimiento" class="form-label form-label-custom">Fecha Vencimiento Crédito</label>
                            <input type="date" class="form-control form-control-lg-custom" id="fechaVencimiento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-5 component-card">
                <div class="card-header bg-white border-bottom-0 p-4 d-flex align-items-center">
                    <i class="fas fa-boxes fa-lg text-info me-3"></i> <h4 class="mb-0 card-title-bold">Detalle de Productos</h4>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4 mb-4 align-items-end">
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="">

                        <div class="col-md-5">
                            <label for="productoSearch" class="form-label form-label-custom">Buscar Producto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg-custom" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off" aria-label="Buscar producto">
                            <datalist id="productosList">
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label form-label-custom">F. Vencimiento</label>
                            <input type="date" class="form-control form-control-lg-custom" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label form-label-custom">Precio Compra <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg-custom" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label form-label-custom">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg-custom" id="txtCantidadProducto" placeholder="0" min="1" required>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary-custom btn-lg-custom mt-2" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-2"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive p-4 table-container-custom">
                        <table class="table table-hover table-striped table-custom align-middle" id="tb_Compra">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>F. Vencimiento</th>
                                    <th>Precio Compra</th>
                                    <th>Cantidad</th>
                                    <th>IVA</th>
                                    <th>SubTotal</th>
                                    <th>Total</th>
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
            <div class="card shadow-sm component-card">
                <div class="card-header bg-white border-bottom-0 p-4 d-flex align-items-center">
                    <i class="fas fa-cash-register fa-lg text-success me-3"></i> <h4 class="mb-0 card-title-bold">Resumen de Compra</h4>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3 mb-4">
                        <button class="btn btn-success-custom btn-lg-custom py-3" id="btnIniciarComprasContado">
                            <i class="fas fa-hand-holding-usd me-2"></i> Pagar al Contado
                        </button>
                        <button class="btn btn-outline-info-custom btn-lg-custom py-3" id="btnIniciarComprasCredit">
                            <i class="fas fa-credit-card me-2"></i> Pagar a Crédito
                        </button>
                    </div>

                    <hr class="my-4 divider-custom">

                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span class="summary-label-custom">Items:</span>
                        <strong id="Items" class="summary-value-custom text-primary">0</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span class="summary-label-custom">Sub Total:</span>
                        <strong class="summary-value-custom text-secondary-custom" id="subTotal">$0.00</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-4">
                        <span class="summary-label-custom">Impuesto 15% (IVA):</span>
                        <strong id="totalIva" class="summary-value-custom text-warning">($0.00)</strong>
                    </div>

                    <div class="total-box-custom p-4 text-center mt-4 mb-4">
                        <h5 class="mb-2 total-label-custom">TOTAL A PAGAR</h5>
                        <h2 class="display-5 fw-bold total-amount-custom" id="total_compras">$0.00</h2>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input checkbox-custom" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                        <label class="form-check-label small text-muted" for="chkafectarCaja">
                            <i class="fas fa-cash-register me-1"></i> Afectar Caja al Registrar
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
        --primary-color: #007bff; /* Standard Blue */
        --success-color: #28a745; /* Standard Green */
        --info-color: #17a2b8; /* Standard Cyan */
        --secondary-color: #6c757d; /* Standard Grey */
        --light-bg: #f8f9fa; /* Very light grey */
        --border-color: #e9ecef; /* Lighter border */
        --text-color: #343a40; /* Dark grey text */
        --soft-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.04);
        --focus-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.1);
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--light-bg);
        color: var(--text-color);
    }

    .page-background {
        background: linear-gradient(to bottom right, #f4f6f9, #e9eff4); /* Subtle background gradient */
        min-height: 100vh;
    }

    /* Card Styling */
    .component-card {
        border: none;
        border-radius: 12px;
        box-shadow: var(--soft-shadow);
        overflow: hidden;
        background-color: #ffffff; /* Pure white background for cards */
        transition: all 0.2s ease-in-out;
    }

    .component-card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08); /* Slightly more pronounced shadow on hover */
    }

    .card-header {
        border-bottom: 1px solid var(--border-color); /* Defined but light border */
        padding: 1.5rem 2rem;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-title-bold {
        font-weight: 600;
        font-size: 1.35rem;
        color: var(--text-color);
    }

    /* Form Elements */
    .form-label-custom {
        font-weight: 500;
        color: #555;
        margin-bottom: 0.6rem;
        font-size: 0.95rem;
    }

    .form-control-lg-custom {
        height: calc(2.8em + 0.75rem + 2px); /* Slightly taller inputs */
        font-size: 1rem;
        border-radius: 8px; /* Slightly rounded */
        border: 1px solid var(--border-color);
        padding: 0.8rem 1.2rem;
        background-color: #fff;
        color: var(--text-color);
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control-lg-custom:focus {
        border-color: var(--primary-color);
        box-shadow: var(--focus-shadow);
    }

    .input-group-flat .form-control {
        border-right: none; /* No border between input and button */
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group-flat .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-left: 1px solid var(--border-color); /* Add a border to the button only */
    }

    /* Custom Buttons */
    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    }

    .btn-primary-custom:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.3);
        transform: translateY(-1px);
    }

    .btn-success-custom {
        background-color: var(--success-color);
        border-color: var(--success-color);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.2);
    }

    .btn-success-custom:hover {
        background-color: #218838;
        border-color: #1e7e34;
        box-shadow: 0 6px 12px rgba(40, 167, 69, 0.3);
        transform: translateY(-1px);
    }

    .btn-outline-secondary-custom {
        border: 1px solid var(--secondary-color);
        color: var(--secondary-color);
        background-color: transparent;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-secondary-custom:hover {
        background-color: rgba(108, 117, 125, 0.08);
        color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .btn-outline-info-custom {
        border: 1px solid var(--info-color);
        color: var(--info-color);
        background-color: transparent;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-info-custom:hover {
        background-color: rgba(23, 162, 184, 0.08);
        color: var(--info-color);
        border-color: var(--info-color);
    }

    /* Table Styling */
    .table-container-custom {
        background-color: #ffffff; /* Pure white background for table area */
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 1.5rem !important;
        box-shadow: var(--soft-shadow);
    }

    .table-custom {
        background-color: transparent; /* No background for the table itself */
        border-radius: 8px;
        overflow: hidden;
    }

    .table-custom thead {
        background-color: var(--light-bg); /* Light header for the table */
        color: var(--text-color);
    }

    .table-custom th, .table-custom td {
        padding: 1rem 1.2rem;
        border-color: rgba(0, 0, 0, 0.06); /* Very light border */
        vertical-align: middle;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.03) !important; /* Extremely subtle hover */
    }

    /* Summary Section */
    .divider-custom {
        border-top: 1px dashed var(--border-color); /* Subtle dashed line */
    }

    .summary-label-custom {
        color: #666;
        font-weight: 500;
        font-size: 1rem;
    }

    .summary-value-custom {
        font-size: 1.3rem;
        font-weight: 700;
    }

    .total-box-custom {
        background-color: var(--primary-color); /* Solid primary color */
        color: white;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3); /* Stronger shadow for emphasis */
        transition: all 0.2s ease-in-out;
    }

    .total-box-custom:hover {
        box-shadow: 0 10px 25px rgba(0, 123, 255, 0.4);
        transform: translateY(-2px);
    }

    .total-label-custom {
        color: rgba(255, 255, 255, 0.8); /* Slightly subdued white */
        font-weight: 500;
        letter-spacing: 0.05em;
        font-size: 0.95rem;
    }

    .total-amount-custom {
        color: #ffffff; /* Pure white for the total amount */
        font-size: 3.2rem;
        letter-spacing: -0.05em; /* Tighter letter spacing for numbers */
    }

    .checkbox-custom:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
</style>