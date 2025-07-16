<div class="container-fluid py-5 custom-bg">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

    <div class="row g-5">
        <div class="col-md-9">
            <div class="card modern-card mb-5">
                <div class="card-header modern-card-header d-flex align-items-center">
                    <i class="fas fa-receipt fa-lg me-3"></i> <h5 class="mb-0 card-title-lg">Datos Generales de la Compra</h5>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="proveedorSearch" class="form-label modern-label">Proveedor <span class="text-danger">*</span></label>
                            <div class="input-group modern-input-group">
                                <input type="text" class="form-control modern-input" id="proveedorSearch" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList" aria-label="Buscar proveedor" required>
                                <datalist id="proveedoresList">
                                    <option value="Distribuidora Alfa S.A.">
                                    <option value="Comercial Beta Ltda.">
                                    <option value="Proveedor Gamma C.A.">
                                </datalist>
                                <button class="btn modern-btn-outline" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                    <i class="fas fa-user-plus me-1"></i> Nuevo
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaFactura" class="form-label modern-label">Fecha Factura <span class="text-danger">*</span></label>
                            <input type="date" class="form-control modern-input" id="fechaFactura" value="2025-05-28" required>
                        </div>
                        <div class="col-md-3">
                            <label for="numeroFactura" class="form-label modern-label">Número Factura <span class="text-danger">*</span></label>
                            <input type="text" class="form-control modern-input" id="numeroFactura" placeholder="Ej: 001-001-123456" required>
                        </div>
                        <div class="col-md-6" id="fechaVencimientoCredito" style="display: none;">
                            <label for="fechaVencimiento" class="form-label modern-label">Fecha Vencimiento Crédito</label>
                            <input type="date" class="form-control modern-input" id="fechaVencimiento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card modern-card mb-5">
                <div class="card-header modern-card-header d-flex align-items-center">
                    <i class="fas fa-boxes fa-lg me-3"></i> <h5 class="mb-0 card-title-lg">Detalle de Productos</h5>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4 mb-4 align-items-end">
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="">

                        <div class="col-md-5">
                            <label for="productoSearch" class="form-label modern-label">Buscar Producto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control modern-input" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off" aria-label="Buscar producto">
                            <datalist id="productosList">
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label modern-label">F. Vencimiento</label>
                            <input type="date" class="form-control modern-input" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label modern-label">Precio Compra <span class="text-danger">*</span></label>
                            <input type="number" class="form-control modern-input" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label modern-label">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control modern-input" id="txtCantidadProducto" placeholder="0" min="1" required>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn modern-btn-primary mt-2" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-2"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive p-4 modern-table-container">
                        <table class="table table-hover modern-table align-middle" id="tb_Compra">
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
            <div class="card modern-card">
                <div class="card-header modern-card-header d-flex align-items-center">
                    <i class="fas fa-calculator fa-lg me-3"></i> <h5 class="mb-0 card-title-lg">Resumen de Compra</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3 mb-4">
                        <button class="btn modern-btn-success py-3" id="btnIniciarComprasContado">
                            <i class="fas fa-money-bill-wave me-2"></i> Pagar al Contado
                        </button>
                        <button class="btn modern-btn-outline-secondary py-3" id="btnIniciarComprasCredit">
                            <i class="fas fa-credit-card me-2"></i> Pagar a Crédito
                        </button>
                    </div>

                    <hr class="my-4 modern-hr">

                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span class="summary-label">Items:</span>
                        <strong id="Items" class="summary-value text-primary">0</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span class="summary-label">Sub Total:</span>
                        <strong class="summary-value text-info" id="subTotal">$0.00</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-4">
                        <span class="summary-label">Impuesto 15% (IVA):</span>
                        <strong id="totalIva" class="summary-value text-warning">$0.00</strong>
                    </div>

                    <div class="modern-total-box p-4 text-center mt-4 mb-4">
                        <h4 class="mb-2 modern-total-label">TOTAL A PAGAR</h4>
                        <h3 class="display-4 fw-bold modern-total-amount" id="total_compras">$0.00</h3>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input modern-checkbox" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                        <label class="form-check-label small text-muted" for="chkafectarCaja">
                            <i class="fas fa-wallet me-1"></i> Afectar Caja al Registrar
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f2f5; /* Very light grey background */
        color: #333;
    }

    .custom-bg {
        background: linear-gradient(135deg, #f0f2f5 0%, #e0e6ec 100%); /* Subtle gradient background */
        min-height: 100vh;
    }

    /* Modern Card Styles (Glassmorphism inspired) */
    .modern-card {
        background: rgba(255, 255, 255, 0.7); /* Slightly translucent white */
        border: 1px solid rgba(255, 255, 255, 0.3); /* Light border */
        border-radius: 20px; /* More rounded corners */
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.08); /* Soft, diffused shadow */
        backdrop-filter: blur(8px); /* The glass effect */
        -webkit-backdrop-filter: blur(8px); /* For Safari */
        overflow: hidden; /* Ensures content stays within rounded borders */
        transition: all 0.3s ease-in-out;
    }

    .modern-card:hover {
        box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.15); /* Slightly larger shadow on hover */
    }

    .modern-card-header {
        background: rgba(255, 255, 255, 0.5); /* Lighter header background */
        padding: 1.5rem 2rem; /* Generous padding */
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        color: #555; /* Soft dark text */
        font-weight: 600;
        border-top-left-radius: 18px; /* Match card radius */
        border-top-right-radius: 18px; /* Match card radius */
    }

    .card-title-lg {
        font-size: 1.5rem;
        color: #333;
        font-weight: 600;
    }

    /* Form Control Styles */
    .modern-label {
        font-weight: 500;
        color: #555;
        margin-bottom: 0.6rem;
        font-size: 0.95rem;
    }

    .modern-input {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 10px; /* Slightly rounded input fields */
        padding: 0.8rem 1.2rem;
        font-size: 1rem;
        color: #333;
        transition: all 0.3s ease-in-out;
    }

    .modern-input:focus {
        background: #fff;
        border-color: #a7d9ff; /* Light blue focus border */
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.1); /* Subtle focus shadow */
    }

    .modern-input-group .modern-input {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .modern-input-group .modern-btn-outline {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    /* Button Styles */
    .btn.modern-btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    }

    .btn.modern-btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.3);
        transform: translateY(-2px);
    }

    .btn.modern-btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px; /* Slightly more rounded */
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.2);
    }

    .btn.modern-btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        box-shadow: 0 6px 12px rgba(40, 167, 69, 0.3);
        transform: translateY(-2px);
    }

    .btn.modern-btn-outline {
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(0, 0, 0, 0.15);
        color: #555;
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    
    .btn.modern-btn-outline:hover {
        background: rgba(0, 123, 255, 0.1);
        border-color: #007bff;
        color: #007bff;
        box-shadow: 0 3px 8px rgba(0, 123, 255, 0.1);
    }

    .btn.modern-btn-outline-secondary {
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(108, 117, 125, 0.3);
        color: #6c757d;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .btn.modern-btn-outline-secondary:hover {
        background: rgba(108, 117, 125, 0.1);
        border-color: #6c757d;
        color: #6c757d;
        box-shadow: 0 3px 8px rgba(108, 117, 125, 0.1);
    }

    /* Table Styles */
    .modern-table-container {
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        padding: 20px;
    }

    .modern-table {
        background: transparent !important;
        border-radius: 10px;
        overflow: hidden; /* Ensures rounded corners */
    }

    .modern-table thead {
        background-color: rgba(230, 240, 250, 0.7); /* Light blue header */
        color: #444;
    }

    .modern-table th, .modern-table td {
        padding: 1.2rem 1rem; /* More generous padding */
        border-color: rgba(0, 0, 0, 0.05); /* Lighter border */
    }

    .modern-table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05) !important; /* Subtle hover effect */
    }

    /* Summary Section Styles */
    .modern-hr {
        border-top: 1px solid rgba(0, 0, 0, 0.1); /* Simple, clean HR */
    }

    .summary-label {
        color: #666;
        font-weight: 500;
        font-size: 1.05rem;
    }

    .summary-value {
        font-size: 1.4rem;
        font-weight: 700;
    }

    .modern-total-box {
        background: linear-gradient(45deg, #e0f2f7, #cceeff); /* Light blue gradient background */
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.15); /* Soft, primary shadow */
    }

    .modern-total-label {
        color: #007bff;
        font-weight: 600;
        letter-spacing: 0.03em;
    }

    .modern-total-amount {
        color: #0056b3; /* Slightly darker primary for total */
        font-size: 3.5rem; /* Larger and more impactful */
    }

    .modern-checkbox .form-check-input:checked {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>