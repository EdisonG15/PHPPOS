<?php
session_start();

?>
    <link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
<style>
    .sugerencias-container {
    display: none; /* Oculto por defecto */
    position: absolute;
    top: 100%; /* Posicionado justo debajo del campo de búsqueda */
    left: 0;
    right: 0;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0 0 0.25rem 0.25rem;
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.sugerencia-item {
    display: flex;
    align-items: center;
    padding: 0.5rem;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.sugerencia-item:hover {
    background-color: #f0f0f0;
}

.sugerencia-item:last-child {
    border-bottom: none;
}

.sugerencia-img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    object-fit: cover;
}

.sugerencia-descripcion {
    font-size: 0.9rem;
    color: #333;
}
    :root {
        --primary-color: #5A67D8;
        /* Azul violeta principal */
        --primary-light: #7F8AEF;
        --primary-dark: #434DA1;
        --secondary-color: #6B7280;
        /* Gris oscuro para texto secundario */
        --background-light: #F0F4F8;
        /* Fondo muy claro */
        --card-background: #FFFFFF;
        /* Fondo de tarjetas blanco puro */
        --border-color: #E2E8F0;
        /* Borde sutil */
        --success-color: #4CAF50;
        --warning-color: #FFC107;
        --danger-color: #F44336;
        --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.06);
        --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.1);
        --info-color: #17a2b8; 
    }

     .container-fluid {
           padding-top: 1rem;
           padding-left: 1rem;
           padding-right: 1rem;
       }

    .container {
        /* Custom container class from your CSS */
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-card {
        background-color: var(--card-background);
        border-radius: 12px;
        box-shadow: var(--shadow-light);
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-color);
    }

    .card-header-custom {
        background-color: var(--card-background);
        color: var(--primary-color);
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--border-color);
        font-size: 1.35rem;
        font-weight: 700;
        /* Más audaz */
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        display: flex;
        align-items: center;
    }

    .card-header-custom i {
        margin-right: 10px;
        color: var(--primary-light);
    }

    .form-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control,
    .form-select {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.2s ease-in-out;
        width: 100%;
        box-sizing: border-box;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 0.2rem rgba(90, 103, 216, 0.2);
        background-color: #FBFDFF;
    }

    .input-group {
        /* For combining input and button */
        display: flex;
        width: 100%;
    }

    .input-group .form-control {
        flex-grow: 1;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group .btn {
        /* Ensure button in input group has correct rounding */
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-radius: 8px;
        /* Overrides individual if it's the only element or for overall consistency */
        white-space: nowrap;
    }

    /* Ensure specific button styles are applied correctly */
    .input-group .btn-outline-secondary-custom {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }


    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.25rem;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.1s ease;
        cursor: pointer;
    }

    .btn-primary-custom:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-1px);
    }

    .btn-outline-secondary-custom {
        border: 1px solid var(--border-color);
        color: var(--secondary-color);
        background-color: var(--card-background);
        font-weight: 500;
        padding: 0.75rem 1.25rem;
        border-radius: 8px;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-outline-secondary-custom:hover {
        background-color: var(--background-light);
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-inline {
        margin-right: 1.5rem;
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    /* Estilo de la tabla */
    .table-responsive {
        /* Using Bootstrap's default responsive class if available, or your custom styles */
        overflow-x: auto;
        width: 100%;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        /* border-radius: 8px; /* Applied to wrapper if overflow is hidden */
        /* overflow: hidden; /* Can clip DataTables elements, manage with wrapper or remove if using DataTables responsive */
    }

    .table thead th {
        background-color: var(--background-light);
        color: var(--secondary-color);
        font-weight: 600;
        border-bottom: 2px solid var(--border-color);
        padding: 1rem 1.25rem;
        text-align: left;
    }

    .table tbody tr {
        transition: background-color 0.2s ease;
        border-bottom: 1px solid var(--border-color);
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #F8F9FA;
    }

    .table td {
        padding: 1rem 1.25rem;
        vertical-align: middle;
    }

    .icon-btn {
        background: none;
        border: none;
        color: var(--danger-color);
        font-size: 1.1rem;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 50%;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .icon-btn:hover {
        background-color: rgba(244, 67, 54, 0.1);
        color: var(--danger-color);
    }

    /* Box de Totales */
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
    /* Botones de acción finales */
    .action-buttons-group {
        /* Container for final action buttons */
        margin-top: 1.5rem;
        /* Spacing from the totals box */
    }

    .action-buttons-group .btn {
        padding: 0.9rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 0.5rem;
        /* Space between buttons if they wrap */
    }

    .btn-success-custom {
        background-color: var(--success-color);
        border-color: var(--success-color);
        color: white;
    }

    .btn-success-custom:hover {
        background-color: #388E3C;
        border-color: #388E3C;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }
.btn-outline-info-custom {
    /* background-color: transparent; */
     background-color: transparent;
    color: var(--info-color, #17a2b8);
    border: 2px solid var(--info-color, #17a2b8);
    transition: all 0.3s ease;
}

.btn-outline-info-custom:hover {
    background-color: var(--info-color, #17a2b8);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

    .btn-warning-custom {
        background-color: var(--warning-color);
        border-color: var(--warning-color);
        color: #495057;
    }

    .btn-warning-custom:hover {
        background-color: #FFD233;
        border-color: #FFD233;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-danger-custom {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
        color: white;
    }

    .btn-danger-custom:hover {
        background-color: #D32F2F;
        border-color: #D32F2F;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    /* Utility classes (if not using a framework like Bootstrap that provides them) */
    .mt-3 {
        margin-top: 1rem;
    }

    .mt-5 {
        margin-top: 3rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .p-3 {
        padding: 1rem;
    }

    .p-4 {
        padding: 1.5rem;
    }

    .me-1 {
        margin-right: 0.25rem;
    }

    .me-2 {
        margin-right: 0.5rem;
    }

    .text-center {
        text-align: center;
    }

    .align-items-end {
        align-items: flex-end;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center;
    }

    .d-flex {
        display: flex;
    }

    .d-grid {
        display: grid;
    }

    .gap-3 {
        gap: 1rem;
    }


    /* Basic responsive grid (similar to Bootstrap's concept) */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: -0.75rem;
        /* Corresponds to col padding */
        margin-right: -0.75rem;
        /* Corresponds to col padding */
    }

    .col-md-1,
    .col-md-2,
    .col-md-3,
    .col-md-5,
    .col-md-6,
    .col-md-9 {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        box-sizing: border-box;
        width: 100%;
        /* Default for smaller screens */
    }

    @media (min-width: 768px) {

        /* md breakpoint */
        .col-md-1 {
            width: calc(100% / 12 * 1);
        }

        .col-md-2 {
            width: calc(100% / 12 * 2);
        }

        .col-md-3 {
            width: calc(100% / 12 * 3);
        }

        .col-md-5 {
            width: calc(100% / 12 * 5);
        }

        .col-md-6 {
            width: calc(100% / 12 * 6);
        }

        .col-md-9 {
            width: calc(100% / 12 * 9);
        }

        .d-md-flex {
            display: flex !important;
        }

        /* For button group layout on md+ */
        .justify-content-md-end {
            justify-content: flex-end !important;
        }

        /* For button group layout on md+ */
    }

    input[type="hidden"] {
        display: none;
    }

    
</style>
   <script src="/WebPuntoVenta2025/Views/util/js/validarDocumento.js"></script>
       <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
<div class="container-fluid">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" placeholder="nro Serie" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

    <div class="row">
        <div class="col-md-9">
            <div class="section-card">
                    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-invoice-dollar"></i> Datos Generales de la Compra</span>
        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosVenta" aria-expanded="false" aria-controls="collapseDatosVenta">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>
    <div class="collapse" id="collapseDatosVenta">
                <div class="card-body p-4">
                    <div class="row" style="gap: 1.5rem 0;">
                        <div class="col-md-6">
                               <input id="txtIdProveedor" type="hidden" value="0" />
                            <input id="iptruc" type="hidden" value="0" />
                            <label for="proveedorSearchF" class="form-label">Proveedor</label>
                          
                            <div class="input-group">
                                <input type="text" class="form-control" id="proveedorSearchF" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList" autocomplete="off">
                                <datalist id="proveedoresList">

                                </datalist>
                                <button class="btn btn-outline-secondary-custom" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaCompra" class="form-label">Fecha Factura</label>
                            <input type="date" class="form-control" id="fechaCompra" value="">
                        </div>
                        <div class="col-md-3">
                            <label for="txtNumerofactura" class="form-label">Número Factura</label>
                            <input type="text" class="form-control" id="txtNumerofactura" placeholder="Ej: 001-001-123456" autocomplete="off">
                        </div>
               
                    </div>
                </div>
</div>
            </div>
            <div class="section-card">
                <div class="card-header-custom">
                    <i class="fas fa-boxes"></i> Detalle de Productos
                </div>
                <div class="card-body p-4">
                    <div class="row align-items-end mb-4" style="gap: 1rem 0;">
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="">
                        <div class="col-md-5" style="position: relative;">
    <label for="productoSearchC" class="form-label">Buscar Producto</label>
    <input type="text" class="form-control" id="productoSearchC" placeholder="Buscar o seleccionar producto..." autocomplete="off">
    <div id="productosSugerencias" class="sugerencias-container"></div>
     </div>
                        
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label">F. Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label">Precio Compra</label>
                            <input type="number" class="form-control" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0" autocomplete="off">
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="txtCantidadProducto" placeholder="0" min="1" autocomplete="off">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary-custom" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-1"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="card p-3 table-responsive">
                        <table class="table table-hover align-middle" id="tb_CompraC" style="width:100%">
                            <thead>
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
        <div class="col-md-3">
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

<div class="modal fade" id="modalRegistrarProveedor" tabindex="-1" aria-labelledby="modalRegistrarProveedorLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title" id="modalRegistrarProveedorLabel">
          <i class="bi bi-person-add me-2"></i>Registrar Nuevo Proveedor
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <form class="needs-validation" novalidate>

              <div class="row mb-3">
                <div class="form-floating col-md-6">
                         <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptRuc" name="iptRuc"
                                               maxlength="13" minlength="10" placeholder="Ej. 1792XXXXXXX001" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off">
                                        <label for="iptRuc">RUC <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el RUC.</div> 
                                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-end pt-3">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="chkValidar">
                    <label class="form-check-label text-muted small" for="chkValidar">No validar RUC</label>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptNombre"
                                        maxlength="100" minlength="5" placeholder="Ej. Nombre del Contacto" required autocomplete="off">
                                        <label for="iptNombre">Nombre <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el nombre.</div>
                                    </div>
              </div>

              <div class="mb-3">
              <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptRazonSocial" 
                                         maxlength="100" minlength="5" placeholder="Ej. Nombre de la Empresa S.A." required autocomplete="off">
                                        <label for="iptRazonSocial">Razón Social <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar la razón social.</div>
                                    </div>
              </div>

              <div class="mb-3">
                        <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptDireccion"
                                         maxlength="100" minlength="5" placeholder="Ej. Calle Principal 456, Ciudad" required autocomplete="off">
                                        <label for="iptDireccion">Dirección <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar la dirección.</div>
                                    </div>
              </div>

              <div class="mb-3">
                  <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptTelefono" maxlength="13" placeholder="Ej. 0987654321" required autocomplete="off">
                                        <label for="iptTelefono">Teléfono <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el teléfono.</div>
                                    </div>
              </div>

              <div class="mb-3">
               <div class="form-floating">
                                        <input type="email" class="form-control form-control-modern" id="iptCorreo" 
                                         maxlength="100" minlength="5" placeholder="Ej. info@empresa.com" required autocomplete="off">
                                        <label for="iptCorreo">Correo <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar un correo válido.</div>
                                    </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarProveedor" class="btn btn-primary">
          <i class="bi bi-save me-2"></i>Guardar Proveedor
        </button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalCredito" tabindex="-1" aria-labelledby="modalCreditoLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title" id="modalRegistrarProveedorLabel">
          <i class="bi bi-person-add me-2"></i>Compra a Crédito
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="montoAbonado" class="form-label">Monto Abonado ($)</label>
          <input type="number" class="form-control" id="montoAbonado" min="0" value="0">
        </div>
        <div class="mb-3">
          <label for="fechaVencimiento" class="form-label">Fecha vencimiento</label>
          <input type="date" class="form-control" id="fechaVencimiento" >
        </div>
        <div class="alert alert-info" id="montoRestante" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCredito">Realizar Compra</button>
      </div>
    </div>
  </div>
</div>

<script>
    var accion;
    var table_comprasC;
    $(document).ready(function() {
        cargarTableProducto();
        CargarNroBoleta();
        verificarSiExisteCajaAbierta();
         $('#proveedorSearchF').on('keyup', function() {
              let query = $(this).val().trim();
            if (query.length < 2) {
                $('#proveedoresList').empty(); // limpiar si hay poco texto
                return;
            }
            $.ajax({
                async: false,
                url: "ajax/proveedor.ajax.php",
                method: "POST",
                data: {
                    'accion': 4,
                    'busqueda': query,
                },
                dataType: 'json',
                success: function(respuesta) {
                    console.log("respuesta:", respuesta);

                    // Limpiar datalist
                    $("#proveedoresList").empty();

                    for (let i = 0; i < respuesta.length; i++) {
                        const descripcion = respuesta[i]['descripcion_proveedor'];

                        // Agregar opciones al datalist
                        $("#proveedoresList").append(`<option value="${descripcion}"></option>`);
                    }

                    // Manejar evento cuando se selecciona un producto
                    $("#proveedorSearchF").on('change', function() {
                        let valor = $(this).val();
                        if (valor !== '') {
                            CargarProveedor(valor);
                            $(this).val('').focus(); // limpiar y volver a enfocar
                        }
                    });
                }
            });
        });
          $('#btnIniciarComprasCredit').on('click', function () {
          if (!validarCamposCompra()) return;
          $("#modalCredito").modal('show');

           });

     $(document).off('click', '#btnIniciarComprasContado').on('click', '#btnIniciarComprasContado', function () {
    const $btn = $("#btnIniciarComprasContado");
    $btn.prop('disabled', true); // Evita múltiples clics rápidos

    if (!validarCamposCompra()) {
        $btn.prop('disabled', false);
        return;
    }

    const formData = recolectarDatosCompra(1);
    confirmarYEnviarCompra(formData);
});

$(document).off('click', '#btnGuardarCredito').on('click', '#btnGuardarCredito', function () {
    const $btn = $("#btnGuardarCredito");
    $btn.prop('disabled', true); // prevenir clics múltiples

    let efectivoRecibido = parseFloat($("#montoAbonado").val()) || 0;
    let totalCompras = parseFloat($("#total_compras").html());
    let fechaVencimiento = $("#fechaVencimiento").val();

    if (fechaVencimiento === "") {
        Swal.fire({
            icon: 'warning',
            title: 'Ingrese la fecha Vencimiento'
        });
        $btn.prop('disabled', false); // reactivar si hay error
        return;
    }

    if (efectivoRecibido >= totalCompras) {
        Swal.fire({
            icon: 'warning',
            title: 'No se puede aplicar crédito, ya que no hay saldo'
        });
        $btn.prop('disabled', false); // reactivar si hay error
        return;
    }

    const formData = recolectarDatosCompra(2, efectivoRecibido);
    confirmarYEnviarCompra(formData);
});

       $('#tb_CompraC tbody').on('click', '.btnEliminarproducto', function() {
            table_comprasC.row($(this).parents('tr')).remove().draw();
            recalcularTotales();

      });

        $("#productoSearchC").change(function() { //change cuando dectente un movimiento
            CargarProductosC();
        });

         // --- LÓGICA PARA BUSCAR PRODUCTO ---
    $('#productoSearchC').on('keyup', function() {
        let query = $(this).val().trim();
        if (query.length < 2) {
            $('#productosSugerencias').empty().hide(); // Oculta y limpia si la búsqueda es muy corta
            return;
        }
        $.ajax({
            url: "ajax/productos.ajax.php", // Tu endpoint sigue siendo el mismo
            method: "POST",
            data: {
                'accion': 6,
                'opcion': 2,
                'busqueda': query,
            },
            dataType: 'json',
            success: function(respuesta) {
                console.log("respuesta:", respuesta);

                let sugerenciasDiv = $("#productosSugerencias");
                sugerenciasDiv.empty().show(); // Limpia sugerencias anteriores y muestra el contenedor

                if (respuesta.length === 0) {
                    sugerenciasDiv.html('<div class="p-2">No se encontraron productos.</div>');
                    return;
                }
                
                for (let i = 0; i < respuesta.length; i++) {
                    const producto = respuesta[i];

                    // IMPORTANTE: Ajusta la ruta a tu carpeta de imágenes
                    // const imagenUrl = 'vistas/img/productos/' + producto.img_producto;
                     const imagenUrl = producto.img_producto;
                    // La descripción de la consulta SQL modificada
                    const descripcion = producto.descripcion_completa; 
                    
                    // El código limpio para identificar el producto
                    const codigo = producto.codigo_barra;

                    // Crear el HTML para cada ítem de sugerencia
                    const suggestionHtml = `
                        <div class="sugerencia-item" data-codigo="${codigo}">
                            <img src="${imagenUrl}" alt="" class="sugerencia-img">
                            <div class="sugerencia-descripcion">${descripcion}</div>
                        </div>
                    `;
                    
                    sugerenciasDiv.append(suggestionHtml);
                }
            }
        });
    });

    // --- MANEJADOR DE CLIC PARA LAS SUGERENCIAS ---
    // Usar un manejador de eventos delegado para elementos creados dinámicamente
    $('#productosSugerencias').on('click', '.sugerencia-item', function() {
        // Obtener el código del producto desde el atributo 'data-codigo'
        const codigoSeleccionado = $(this).data('codigo');

        // Cargar los datos del producto en el formulario
        CargarProductosC(codigoSeleccionado);

        // Ocultar la caja de sugerencias
        $('#productosSugerencias').empty().hide();

        // Opcional: Limpiar el campo de búsqueda para la siguiente búsqueda
        $('#productoSearchC').val('').focus();
    });
    
    // Ocultar sugerencias si el usuario hace clic fuera
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productoSearchC, #productosSugerencias').length) {
            $('#productosSugerencias').hide();
        }
    })
const redondear = (valor) => parseFloat(valor.toFixed(2));
$('#btnAgregarProducto').on('click', function() {
    const $codigoProducto = $('#txtCodigoProducto');
    const $nombreProducto = $('#txtNombreProducto');
    const $idProducto = $('#txtIdProducto');
    const $cantidadProducto = $('#txtCantidadProducto');
    const $precioCompraProducto = $('#txtPrecioCompraProducto');
    const $llevaIva = $('#txtllevaIva');
    const $fechaVencimiento = $('#txtFechaVencimiento');
    const $perecedero_producto = $('#perecedero_producto');
    
    const codigo = $codigoProducto.val();
    const nombre = $nombreProducto.val();

    // Validaciones iniciales
    if (!codigo || !nombre) {
        Toast.fire({ icon: 'warning', title: 'No hay producto para agregar' });
        return;
    }
    
    let existeCodigo = table_comprasC.rows().data().toArray().some(row => row['codigo_producto'] === codigo);
    if (existeCodigo) {
        Toast.fire({ icon: 'warning', title: 'El producto ya existe en la compra' });
        return;
    }

    const cantidad = parseFloat($cantidadProducto.val()) || 0;
    const precioCompraConIva = parseFloat($precioCompraProducto.val()) || 0;
    const llevaIva = parseInt($llevaIva.val()) || 0;
    const perecedero = parseInt($perecedero_producto.val()) || 0;
    const fechaVencimiento = $fechaVencimiento.val();
    
    if (perecedero === 1 && (!fechaVencimiento || fechaVencimiento.trim() === '')) {
        Swal.fire({
            icon: 'warning',
            title: 'El producto perecedero requiere una fecha de vencimiento'
        });
        return;
    }

    // --- Lógica de cálculo mejorada para decimales ---
    let iva = 0;
    let subtotal = 0;
    const total = redondear(cantidad * precioCompraConIva); // El total se calcula primero y se redondea

    if (llevaIva === 1) {
        // Se calcula el subtotal (valor sin IVA)
        const precioUnitarioSinIva = precioCompraConIva / (1 + ivaP);
        subtotal = redondear(precioUnitarioSinIva * cantidad);

        // El IVA se calcula por diferencia para que cuadre exactamente
        iva = redondear(total - subtotal);
    } else {
        subtotal = total;
        iva = 0;
    }

    // Se agrega la fila a la tabla con los valores ya redondeados
    table_comprasC.row.add({
        'id_producto': $idProducto.val(),
        'codigo_producto': codigo,
        'descripcion_producto': nombre,
        'cantidad': cantidad,
        'precio_compra_producto': redondear(precioCompraConIva),
        'iva': iva,
        'sub_total': subtotal,
        'total': total,
        'vence': fechaVencimiento
    }).draw();

    recalcularTotales();
    limpiartxtProducto();
});
    // $('#btnAgregarProducto').on('click', function() {
    //         const $codigoProducto = $('#txtCodigoProducto');
    //         const $nombreProducto = $('#txtNombreProducto');
    //         const $idProducto = $('#txtIdProducto');
    //         const $cantidadProducto = $('#txtCantidadProducto');
    //         const $precioCompraProducto = $('#txtPrecioCompraProducto');
    //         const $llevaIva = $('#txtllevaIva');
    //         const $fechaVencimiento = $('#txtFechaVencimiento');
    //         const $perecedero_producto = $('#perecedero_producto');
    //         const codigo = $codigoProducto.val();
    //         const nombre = $nombreProducto.val();

    //         if (!codigo || !nombre) {
    //             Toast.fire({
    //                 icon: 'warning',
    //                 title: 'No Hay Producto para Agregar'
    //             });
    //             return;
    //         }

    //         let existeCodigo = table_comprasC.rows().data().toArray().some(row => row['codigo_producto'] === codigo);

    //         if (existeCodigo) {
    //             Toast.fire({
    //                 icon: 'warning',
    //                 title: 'El producto ya existe en la compra'
    //             });
    //             return;
    //         }

    //         const cantidad = parseFloat($cantidadProducto.val()) || 0;
    //         const precioCompra = parseFloat($precioCompraProducto.val()) || 0;
    //         const llevaIva = parseFloat($llevaIva.val()) || 0;
    //         const total = cantidad * precioCompra;
    //         const iva = llevaIva > 0 ? total * ivaP : 0;
    //         const subtotal = total - iva;

    //         const perecedero = parseInt($perecedero_producto.val()) || 0;
    //         const fechaVencimiento = $fechaVencimiento.val();

    //         // Validar que si el producto es perecedero, tenga fecha de vencimiento
    //         if (perecedero === 1 && (!fechaVencimiento || fechaVencimiento.trim() === '')) {
    //             Swal.fire({
    //                 icon: 'warning',
    //                 title: 'El producto perecedero requiere una fecha de vencimiento'
    //             });
    //             return;
    //         }

    //         table_comprasC.row.add({
    //             'id_producto': $idProducto.val(),
    //             'codigo_producto': codigo,
    //             'descripcion_producto': nombre,
    //             'cantidad': cantidad,
    //             'precio_compra_producto': precioCompra.toFixed(2),
    //             'iva': iva.toFixed(2),
    //             'sub_total': subtotal.toFixed(2),
    //             'total': total.toFixed(2),
    //             'vence': $fechaVencimiento.val()
    //         }).draw();

    //         recalcularTotales();
    //         limpiartxtProducto();
    //     });

        $('#btnRegistrarProveedor').on('click',function() {
            $("#modalRegistrarProveedor").modal('show');
        });

    });


$(document).off('click', '#btnGuardarProveedor').on('click', '#btnGuardarProveedor', function () {
    const $btn = $("#btnGuardarProveedor");
    $btn.prop('disabled', true); // 🔒 Evitar múltiples clics

    const tipoIdentificacion = "04";
    const numeroDocumento = $("#iptRuc").val().trim();
    const saltarValidacion = document.getElementById("chkValidar").checked;

    const tipoIdentificacionTexto = {
        "05": "Cédula",
        "04": "RUC",
        "06": "Pasaporte"
    };

    const validarDocumento = () => {
        if (saltarValidacion) return true;

        switch (tipoIdentificacion) {
            case "05": return validarCedula(numeroDocumento);
            case "04": return validarRUC(numeroDocumento);
            case "06": return validarPasaporte(numeroDocumento);
            default: return false;
        }
    };

    if (!validarDocumento()) {
        const tipoTexto = tipoIdentificacionTexto[tipoIdentificacion] || "documento";
        Swal.fire({
            icon: 'warning',
            title: 'Documento inválido',
            text: `El número de ${tipoTexto.toLowerCase()} ingresado no es válido. Por favor, verifica el valor.`,
            confirmButtonText: 'Aceptar'
        });
        $btn.prop('disabled', false); // 🔓 Reactivar si error
        return;
    }

    const forms = document.getElementsByClassName('needs-validation');
    const formularioValido = Array.from(forms).every(form => {
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return false;
        }
        return true;
    });

    if (!formularioValido) {
        Swal.fire({
            icon: 'info',
            title: 'Por favor complete todos los campos obligatorios'
        });
        $btn.prop('disabled', false); // 🔓 Reactivar si error
        return;
    }

    Swal.fire({
        title: '¿Está seguro de registrar el Proveedor?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarlo',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (!result.isConfirmed) {
            $btn.prop('disabled', false); // 🔓 Reactivar si cancelado
            return;
        }

        const datos = new FormData();
        datos.append("accion", 2);
        datos.append("IdProveedor", 0);
        datos.append("Ruc", $("#iptRuc").val());
        datos.append("Nombre", $("#iptNombre").val());
        datos.append("RazonSocial", $("#iptRazonSocial").val());
        datos.append("Telefono", $("#iptTelefono").val());
        datos.append("Correo", $("#iptCorreo").val());
        datos.append("Direccion", $("#iptDireccion").val());

        $.ajax({
            url: "ajax/proveedor.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta) {
                mostrarAlertaRespuesta(respuesta, function () {
                    CargarProveedor(numeroDocumento);
                    fun_limpiar_proveedor();
                    $("#modalRegistrarProveedor").modal('hide');
                }, {
                    mensajeExito: "éxito",
                    mensajeAdvertencia: "Warning",
                    mensajeError: "Excepción"
                });
            },
            error: manejarErrorAjax
        }).always(function () {
            $btn.prop('disabled', false); // 🔓 Reactivar siempre al terminar AJAX
        });
    });
});

   function recolectarDatosCompra(tipoPago, efectivoRecibido = 0) {
    let totalSubtotalCompras = parseFloat($("#subTotal").html());
    let totalIvaCompras = parseFloat($("#totalIva").html());
    let totalCompras = parseFloat($("#total_compras").html());
    let restante = totalCompras - efectivoRecibido;
    let fechaVencimiento= $("#fechaVencimiento").val();
    let afectarCaja = $('#chkafectarCaja').is(":checked") ? 1 : 0;
      if (tipoPago === 2 && efectivoRecibido === 0) {
         afectarCaja = 0;
            }
    let formData = new FormData();
    
    table_comprasC.rows().eq(0).each(function(index) {
        let row = table_comprasC.row(index);
        let data = row.data();
        formData.append('arr[]', JSON.stringify({
            id_producto: data['id_producto'],
            cantidad: parseFloat(data['cantidad']),
            precio_compra_producto: data['precio_compra_producto'],
            sub_total: data['sub_total'],
            iva: data['iva'],
            total: data['total'],
            codigo_producto: data['codigo_producto'],
            vence: data['vence'] || null
        }));
    });

    formData.append('id_caja', $("#txtId_caja").val());
     formData.append('afectarCaja', afectarCaja);
    formData.append('abono', tipoPago === 2 ? efectivoRecibido : 0);
    formData.append('restante', tipoPago === 2 ? restante : 0);
    formData.append('TipoDocumento', 2);
    formData.append('fechaCompra', $("#fechaCompra").val());
    formData.append('fechaVencimiento', tipoPago === 2 ? fechaVencimiento  : "");
    formData.append('NumeroFactura', $("#txtNumerofactura").val());
    formData.append('IdProveedor', $("#txtIdProveedor").val());
    formData.append('Tipo_pago', tipoPago);
    formData.append('iva', totalIvaCompras);
    formData.append('subtotalcosto', totalSubtotalCompras);
    formData.append('TotalCosto', totalCompras);
    formData.append('Nro_compras', $("#Nro_correlativo_compras").val());
    formData.append('Nro_credito_compras', $("#Nro_credito_compras").val());

    return formData;
 };

function confirmarYEnviarCompra(formData) {
    for (let pair of formData.entries()) {
        console.log(pair[0] + ':', pair[1]);
    }

    Swal.fire({
        title: '¿Está seguro de registrar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarlo!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/realizar_compras.ajax.php",
                method: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    mostrarAlertaRespuesta(respuesta, function () {
                        table_comprasC.clear().draw();
                        LimpiarInputs();
                        CargarNroBoleta();
                        $("#modalCredito").modal('hide');
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
                },
                error: manejarErrorAjax
            }).always(function () {
                // Reactivar botones después del AJAX
                $("#btnIniciarComprasCredit").prop('disabled', false);
                $("#btnIniciarComprasContado").prop('disabled', false);
                $("#btnGuardarCredito").prop('disabled', false);
            });
        } else {
            // Reactivar botones si se cancela
            $("#btnIniciarComprasCredit").prop('disabled', false);
            $("#btnIniciarComprasContado").prop('disabled', false);
            $("#btnGuardarCredito").prop('disabled', false);
        }
    });
}


function CargarProveedor(proveedor ="") {
     let ruc =0;
        if (proveedor != "") {
            ruc = proveedor;
        } else {
          ruc = $("#iptproveedor").val(); 
        }
        ruc = $.trim(ruc.split('-')[0]);    
               
                   if (!ruc || ruc === "0") {
                         console.log("RUC inválido, no se ejecuta AJAX");
                        return;
                    }
      $.ajax({
             url: "ajax/proveedor.ajax.php",
             type: "POST",
             data: {
                 'accion': 5 ,
                 'NumeroDocumento': ruc
             },
             dataType: 'json',
             success: function(respuesta) {
                 $("#txtIdProveedor").val(respuesta['id_proveedor']);
                 $("#iptruc").val(ruc);
                  $("#proveedorSearchF").val(respuesta['nombre']);
                
             }
      });
};


    function cargarTableProducto() {
        table_comprasC = $('#tb_CompraC').DataTable({
            //  scrollY: "300px",          // Altura máxima
            scrollCollapse: true, // Colapsa si hay pocos datos
            paging: true, // Muestra paginación si hay muchos productos
            "columns": [

                { "data": "id_producto" },
                { "data": "codigo_producto" },
                { "data": "descripcion_producto" },
                { "data": "vence" } ,
                { "data": "precio_compra_producto" },
                { "data": "cantidad" },
                { "data": "iva" },
                { "data": "sub_total" },
                { "data": "total" },
                { "data": null }   
            ],
            columnDefs: [{
                    targets: 9,
                    orderable: false, // no ordenar
                    render: function(data, type, full, meta) {
                        return "<center>" + // px tamaño
                            "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                            "<i class='fas fa-trash fs-5'> </i> " +
                            "</span>"
                        "</center>"
                    }
                },
                { targets: 0, visible: false},{ targets: 1, visible: false},{ targets: 6, visible: false},
            ],
            "order": [
                [2, 'desc']
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            responsive: true,
            //   paging: false,
            //   searching: false,
            //  info: false
        });
    };

    function CargarProductosC(producto = " ") {

        if (producto != "") {
            codigo_producto = producto;
        } else {
            codigo_producto = $("#productoSearchC").val();
        }
        codigo_producto = $.trim(codigo_producto.split('/')[0]);
        $.ajax({
            url: "ajax/realizar_compras.ajax.php",
            type: "POST",
            data: {
                'accion': 1,
                'codigo_barra': codigo_producto
            },
            dataType: 'json',
            success: function(respuesta) {

                $("#txtIdProducto").val(respuesta['id_producto']);
                $("#txtCodigoProducto").val(codigo_producto);
                $("#productoSearchC").val(respuesta['descripcion_producto']);
                $("#txtNombreProducto").val(respuesta['descripcion_producto']);
                $("#txtPrecioCompraProducto").val(respuesta['precio_compra_producto']);
                $("#txtllevaIva").val(respuesta['lleva_iva_producto']);
                $("#perecedero_producto").val(respuesta['perecedero_producto']);
                $("#txtCantidadProducto").val(1);

            }
        });
    };

    function recalcularTotales() {
        let totalCompras = 0;
        let totalSubtotalCompras = 0;
        let totalIvaCompras = 0;
        let itemCount = 0;

        table_comprasC.rows().every(function() { // More robust iteration
            let data = this.data();
            if (data) { // Ensure data exists for the row
                totalCompras += parseFloat(data['total']) || 0;
                totalSubtotalCompras += parseFloat(data['sub_total']) || 0;
                totalIvaCompras += parseFloat(data['iva']) || 0;
                itemCount++;
            }
        });

        $("#Items").html(itemCount); // No need for .toFixed(2) for item count
        $("#subTotal").html(totalSubtotalCompras.toFixed(2));
        $("#total_compras").html(totalCompras.toFixed(2));
        $("#totalIva").html(totalIvaCompras.toFixed(2));
    }

    function limpiartxtProducto() {
        $("#txtIdProducto").val("0");
        $("#txtCodigoProducto").val("");
        $("#txtNombreProducto").val("");
        $("#txtCantidadProducto").val("1");
        $("#txtPrecioCompraProducto").val("0");
        $("#txtllevaIva").val("0");
        $("#txtFechaVencimiento").val("");
         $("#productoSearchC").val("");

    };

    function LimpiarInputs() {
        limpiartxtProducto();
        $("#txtNumerofactura").val("");
        $("#txtIdProveedor").val("");
        $("#txtCantidadProducto").val("1");
        $("#iptproveedor").val("0");
        $("#iptruc").val("");
        $("#Items").html("0");
        $("#subTotal").html("0");
        $("#totalIva").html("0");
        $("#total_compras").html("0");
        $("#montoAbonado").val("0");
        $("#fechaVencimiento").val("");
        $("#proveedorSearchF").val("");
          $("#fechaCompra").val("");
     
        table_comprasC.clear().draw();
    };

    function CargarNroBoleta() {
        $.ajax({
            async: false,
            url: "ajax/realizar_ventas.ajax.php",
            method: "POST",
            data: {
                'accion': 1
            },
            dataType: 'json',
            success: function(respuesta) {
                Nro_correlativo_compras = respuesta["nro_correlativo_compras"];
                Nro_credito_compras = respuesta["nro_credito_compras"];
                ivaP = (respuesta["impuesto"] / 100);
                $("#Nro_correlativo_compras").val(Nro_correlativo_compras);
                $("#Nro_credito_compras").val(Nro_credito_compras);
            }
        });
    };
function verificarSiExisteCajaAbierta() {
    let datos = new FormData();
    datos.append("opcion", 1);
    datos.append("txt_id_caja", $("#txtId_caja").val());
    datos.append("txt_id_usuario", $("#txtId_usuario").val());

    $.ajax({
        url: "ajax/validar.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (parseInt(respuesta['existe']) == 0) {
                $("#btnRegistrarProveedor").prop('disabled', true);
                $("#btnAgregarProducto").prop('disabled', true);
                $("#btnIniciarComprasContado").prop('disabled', true);
                $("#btnIniciarComprasCredit").prop('disabled', true);

                Swal.fire({
                    title: 'La caja se encuentra cerrada',
                    text: 'Todas las opciones están deshabilitadas. Por favor, abra la caja primero para habilitar las opciones.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Abrir Caja',
                    cancelButtonText: 'Cerrar',
                    reverseButtons: true,
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Carga la vista usando tu función interna
                        CargarContenido('Views/modulos/AdministrarCaja/MovimientoCaja/movimiento_cajas.php', 'content-wrapper');
                    }
                });
            }
        }
    });
}
      function fun_limpiar_proveedor(){
        $('needs-validation').removeClass('was-validated');
        $("#id").val("0");
        $("#iptRuc").val("");
        $("#iptNombre").val("");
        $("#iptRazonSocial").val("");
        $("#iptTelefono").val("");
        $("#iptCorreo").val("");
        $("#iptDireccion").val("");
  };

 function validarCamposCompra() {
   const count = table_comprasC.rows().count();
   if (count === 0) {
    Swal.fire({
      icon: 'warning',
      title: 'No hay productos para guardar'
    });
    return false;
  }
  const campos = [
    { valor: $("#txtNumerofactura").val(), mensaje: 'Ingrese el número de factura' },
    { valor: $("#fechaCompra").val(), mensaje: 'Ingrese la fecha de la factura' },
    { valor: $("#txtIdProveedor").val(), mensaje: 'Seleccione un proveedor válido', validar: val => parseInt(val) > 0 }
  ];

  for (let campo of campos) {
    const esValido = campo.validar ? campo.validar(campo.valor) : campo.valor !== "";
    if (!esValido) {
      Swal.fire({
        icon: 'warning',
        title: campo.mensaje
      });
      return false;
    }
  }

  return true;
}

</script>