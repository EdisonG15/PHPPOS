   <?php
    session_start()
    ?>
   <link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
   <script src="/WebPuntoVenta2025/Views/util/js/validarDocumento.js"></script>
   <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
  .input-group .btn-outline-secondary-custom {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
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
           --primary-color: #007bff;
           /* Azul vibrante */
           --secondary-color: #6c757d;
           /* Gris sutil */
           --accent-color: #28a745;
           /* Verde para éxito */
           --bg-light: #f4f7f6;
           /* Fondo muy claro */
           --card-bg: #ffffff;
           /* Fondo de tarjetas */
           --text-dark: #343a40;
           /* Texto oscuro */
           --border-radius: 0.75rem;
           /* Bordes más redondeados */
           --shadow-light: rgba(0, 0, 0, 0.08);
           /* Sombra suave */

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
       }

       .container-fluid {
           padding-top: 1rem;
           padding-left: 1rem;
           padding-right: 1rem;
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
           padding: 1rem 1rem;
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

       .card {
           border: none;
           border-radius: var(--border-radius);
           box-shadow: 0 0.5rem 1rem var(--shadow-light);
           margin-bottom: 1.5rem;
       }

       .card-header {
           background-color: var(--primary-color);
           color: white;
           border-top-left-radius: var(--border-radius);
           border-top-right-radius: var(--border-radius);
           font-weight: 600;
           padding: 1rem 1rem;
           border-bottom: 1px solid rgba(0, 0, 0, 0.125);
       }

       .card-header.bg-success {
           background-color: var(--accent-color) !important;
       }

       .card-header.bg-info {
           background-color: #17a2b8 !important;
           /* Mantenemos info de Bootstrap */
       }

       .form-control,
       .form-select {
           border-radius: 0.5rem;
           padding: 0.75rem 1rem;
           border: 1px solid #ced4da;
           transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
       }

       .form-control:focus,
       .form-select:focus {
           border-color: var(--primary-color);
           box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
       }

       .btn {
           border-radius: 0.5rem;
           padding: 0.75rem 1.5rem;
           font-weight: 500;
           transition: all 0.2s ease-in-out;
       }

       .btn-primary {
           background-color: var(--primary-color);
           border-color: var(--primary-color);
       }

       .btn-primary:hover {
           background-color: #0056b3;
           border-color: #0056b3;
       }

       .btn-warning {
           background-color: #ffc107;
           border-color: #ffc107;
           color: var(--text-dark);
           /* Texto oscuro para contraste */
       }

       .btn-warning:hover {
           background-color: #e0a800;
           border-color: #e0a800;
       }

       .btn-success {
           background-color: var(--accent-color);
           border-color: var(--accent-color);
       }

       .btn-success:hover {
           background-color: #218838;
           border-color: #218838;
       }

       .btn-secondary {
           background-color: var(--secondary-color);
           border-color: var(--secondary-color);
       }

       .btn-secondary:hover {
           background-color: #5a6268;
           border-color: #5a6268;
       }

       .table {
           border-radius: var(--border-radius);
           overflow: hidden;
           /* Para que los bordes redondeados se apliquen al encabezado */
       }

       .summary-box {
           background-color: var(--bg-light);
           padding: 1.5rem;
           border-radius: var(--border-radius);
           font-size: 1.15em;
           font-weight: 600;
           border: 1px dashed #ced4da;
       }

       .summary-box .display-5 {
           font-size: 2.75rem;
           font-weight: 700;
           color: var(--accent-color);
       }

       .product-item {
           display: flex;
           align-items: center;
           justify-content: space-between;
           padding: 0.5rem 0;
           border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
       }

       .product-item:last-child {
           border-bottom: none;
       }

       .product-item-name {
           font-weight: 500;
       }

       .product-item-qty-price {
           font-size: 0.9em;
           color: var(--secondary-color);
       }

       .modal-header {
           background-color: var(--primary-color);
           color: white;
           border-top-left-radius: var(--border-radius);
           border-top-right-radius: var(--border-radius);
           border-bottom: none;
       }

       .modal-footer .btn {
           border-radius: 0.5rem;
       }

       .transparent-button {
    background-color: transparent !important;
    border-color: transparent !important;
    box-shadow: none !important;
}

/* Si el icono mismo tiene un tono azul, asegúrate de que su color sea el primario */
.transparent-button .text-primary {
    color: var(--bs-primary) !important; /* Usar la variable de color primario de Bootstrap */
}

/* Tus reglas existentes para el dropdown, que son correctas */
.dropdown-menu {
    z-index: 1050 !important;
    position: absolute !important;
}

/* Es CRÍTICO que la celda de la tabla que contiene el dropdown tenga overflow: visible */
/* Esto apunta a las celdas dentro de tu tabla #lstProductosVenta, específicamente la columna de Acciones */
#lstProductosVenta tbody tr td {
    overflow: visible !important; /* Anula cualquier overflow: hidden heredado */
}

/* Si el .table-responsive es el culpable (a veces Bootstrap lo oculta para el scroll) */
.table-responsive {
    overflow: visible !important; /* Permite que el contenido desborde el contenedor */
}

/* Y si el propio .table tiene overflow: hidden; */
.table {
    overflow: visible !important; /* Asegura que la tabla en sí no recorte los dropdowns */
}

/* Para la columna específica de acciones, si es necesario */
#lstProductosVenta .text-center { /* La clase que tienes en el th de Acciones */
    overflow: visible !important;
}
   </style>
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-9">
               <div class="section-card">
                 <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-invoice-dollar"></i> Datos Generales de la Venta</span>
        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosVenta" aria-expanded="false" aria-controls="collapseDatosVenta">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div> 
     <div class="collapse" id="collapseDatosVenta">
                   <div class="card-body p-4">
                       <div class="row" style="gap: 1.5rem 0;">
                           <div class="col-md-6">
                               <input type="hidden" min="0" name="iptNroVenta" id="iptNroVenta"
                                   class="form-control form-control-sm" placeholder="Nro Venta" disabled>

                               <input id="txtIdCliente" type="hidden" value="1" />

                               <input id="txtId_usuario" type="hidden" value="<?php
                                                                                echo  $_SESSION["usuario"]->id_usuario ?>" />

                               <input id="txtId_caja" type="hidden" value="<?php
                                                                            echo  $_SESSION["usuario"]->id_caja ?>" />
                               <input id="txtNumeroDocumento" type="hidden" value="0" />
                               <label for="clienteSearch" class="form-label">Cliente</label>
                               <div class="input-group">
                                   <input type="text" class="form-control" id="clienteSearch" placeholder="Buscar o seleccionar cliente..." list="clientesList" autocomplete="off">
                                   <datalist id="clientesList">
                                   </datalist>
                                   <button class="btn btn-outline-secondary-custom" type="button" id="btnRegistrarCliente" title="Registrar Nuevo Cliente">
                                       <i class="fas fa-user-plus"></i>
                                   </button>
                               </div>
                           </div>
                           <div class="col-md-3">
                         <div class="row mt-3">
         <div class="col-12 d-flex flex-column align-items-end"> <label class="form-label mb-2" style="font-weight: 500;">Movimientos de Caja:</label> <div class="d-flex justify-content-end gap-2"> <button class="btn btn-success btn-sm" id="btnEntradaDinero">
                <i class="fas fa-coins me-1"></i> Entrada
            </button>
            <button class="btn btn-warning btn-sm" id="btnSalidadaDinero">
                <i class="fas fa-door-open me-1"></i> Salida
            </button>
            </div>
              </div>
           </div>
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
                           <div class="col-md-5"  style="position: relative;">
                                <label for="productoSearch" class="form-label">Buscar Producto</label>
                                <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." autocomplete="off">
                                <div id="productosSugerencias" class="sugerencias-container"></div>
                           </div>
                       </div>
                       <div class="card p-3 table-responsive">
                           <table class="table table-hover align-middle" id="lstProductosVenta" style="width:100%">
                               <thead>
                                   <tr>
                                       <th></th>
                                       <th>Id Producto</th>
                                       <th>Código</th>
                                       <th>Id Categoria</th>
                                       <th>Categoria</th>
                                       <th>Descripción</th>
                                       <th>Unidad</th>
                                       <th>LLeva Iva</th>
                                       <th>Cant.</th>
                                       <th>Precio</th>
                                       <th>Iva</th>
                                       <th>SubTotal</th>
                                       <th>Total</th>
                                       <th class="text-center">Acciones</th>
                                       <th>Normal</th>
                                       <th>Precio 1</th>
                                       <th>Precio 2</th>
                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
           <!-- 🧾 Resumen de Venta -->
           <div class="col-md-3">
               <div class="card">
                   <div class="card-header bg-success">
                       <h4 class="mb-0"><i class="bi bi-receipt-cutoff me-2"></i>Resumen de Venta</h4>
                   </div>
                   <div class="card-body">
                       <div class="summary-box mb-4">
                           <div class="d-flex justify-content-between mb-2">
                               <span>Subtotal:</span>
                               <span id="boleta_subtotal" class="fw-bold"></span>
                           </div>
                           <div class="d-flex justify-content-between mb-2">
                               <span class="iva_label">IVA (12%):</span>
                               <span id="boleta_igv" class="fw-bold"></span>
                           </div>
                           <div class="d-flex justify-content-between align-items-center mt-3">
                               <strong>Total Venta:</strong>
                               <strong id="totalVenta" class="display-5"></strong>
                           </div>
                       </div>
                       <hr class="my-4">
                       <div class="mb-4">
                           <label for="iptEfectivoRecibido" class="form-label fs-5">Valor Recibido</label>
                           <input type="number" class="form-control form-control-lg text-end" id="iptEfectivoRecibido" placeholder="0.00" step="0.01" min="0">
                       </div>
                       <div class="summary-box mb-4">
                           <div class="d-flex justify-content-between align-items-center">
                               <span>Vuelto:</span>
                               <span id="Vuelto" class="display-6 text-success">$</span>
                           </div>
                       </div>
                       <hr class="my-4">
                       <div class="d-grid gap-3">
                           <button type="button" class="btn btn-primary btn-lg shadow" id="btnIniciarVentaContado">
                               <i class="bi bi-check-circle me-2"></i> Realizar Venta
                           </button>
                           <button type="button" class="btn btn-warning btn-lg shadow" id="btnVentaCredit">
                               <i class="bi bi-credit-card me-2"></i> Venta a Crédito
                           </button>
                           <button type="button" class="btn btn-secondary btn-lg shadow" id="btnVaciarListado">
                               <i class="bi bi-x-circle me-2"></i> Limpiar Venta
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="modalRegistrarCliente" tabindex="-1" aria-labelledby="modalRegistrarClienteLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
               <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                   <h5 class="modal-title" id="modalRegistrarClienteLabel">
                       <i class="bi bi-person-add me-2"></i>Registrar Nuevo Cliente
                   </h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <input type="hidden" id="IdCliente" name="cliente" value="0">
               <div class="modal-body">
                   <div class="card shadow-sm border-0">
                       <div class="card-body">
                           <form class="needs-validation" novalidate>

                               <div class="row mb-3">
                                   <div class="form-floating col-md-6">
                                       <div class="form-floating">
                                           <select class="form-select form-control-modern" id="selTipoIdentificacion">
                                               <option value="04" selected>RUC</option>
                                               <option value="05">Cédula</option>
                                               <!-- <option value="06">Pasaporte</option> -->
                                           </select>
                                           <label for="selTipoIdentificacion">Tipo Identificación <span class="text-danger"></span></label>
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
                                       <input type="text" class="form-control form-control-modern" id="iptNumeroDocumento"
                                           name="iptNumeroDocumento" maxlength="13" minlength="10" placeholder="Ej. 0987654321" required
                                           autocomplete="off">
                                       <label for="iptNumeroDocumento">Número Cédula <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar la cédula del cliente.</div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptNombre" name="iptNombre"
                                           maxlength="100" minlength="5" placeholder="Ej. Juan Andrés" required autocomplete="off">
                                       <label for="iptNombre">Nombres <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el nombre del cliente.</div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptApellido" name="iptApellido"
                                           maxlength="100" minlength="5" placeholder="Ej. Pérez García" required autocomplete="off">
                                       <label for="iptApellido">Apellidos <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el apellido del cliente.</div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptDireccion" name="iptDireccion"
                                           maxlength="100" minlength="5" placeholder="Ej. Av. Principal 123" required autocomplete="off">
                                       <label for="iptDireccion">Dirección <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar la dirección.</div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptTelefono" name="iptTelefono"
                                           maxlength="12" minlength="10" placeholder="Ej. 0987654321" required
                                           autocomplete="off">
                                       <label for="iptTelefono">Teléfono <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el teléfono.</div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="email" class="form-control form-control-modern" id="iptEmail" name="iptEmail"
                                           maxlength="100" minlength="5" placeholder="Ej. correo@ejemplo.com" required autocomplete="off">
                                       <label for="iptEmail">Correo <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar un correo válido.</div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   <button type="button" id="btnGuardar_cliente" class="btn btn-primary">
                       <i class="bi bi-save me-2"></i>Guardar Cliente
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
                       <i class="bi bi-person-add me-2"></i>Venta a Crédito
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
                       <input type="date" class="form-control" id="fechaVencimiento">
                   </div>
                   <div class="alert alert-info" id="montoRestante" style="display:none;"></div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary" id="btnGuardarCredito">Realizar Venta</button>
               </div>
           </div>
       </div>
   </div>

  <div class="modal fade" id="mdlGestionarCaja" tabindex="-1" aria-labelledby="mdlGestionarCajaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title" id="titulo_modal_caja">
                    <i class="fas fa-cash-register me-2"></i> Gestionar Caja
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalw"></button>
            </div>
            <div class="modal-body p-4"> <form class="needs-validation" novalidate> <input type="hidden" id="ddlTipo">
                    <input type="hidden" id="selopciones">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating mb-3"> <input type="number" class="form-control form-control-modern" id="txt_Monto" placeholder="Ingrese el importe" required min="0" step="0.01">
                                <label for="txt_Monto">
                                    <i class="fas fa-dollar-sign me-2"></i> Importe:
                                </label>
                                <div class="invalid-feedback">Por favor, ingrese un monto válido.</div>
                            </div>
                        </div>
                        <div class="col-12" id="col_descripcion">
                            <div class="form-floating mb-3"> <input type="text" class="form-control form-control-modern" id="txt_Comentario" placeholder="Ingrese un comentario" required>
                                <label for="txt_Comentario">
                                    <i class="fas fa-comment-alt me-2"></i> Comentario:
                                </label>
                                <div class="invalid-feedback">Debe ingresar un comentario válido.</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center p-3"> <button type="button" class="btn btn-secondary fw-bold flex-fill mx-1" data-bs-dismiss="modal" id="btnCancelarcaja">
                    <i class="fas fa-times me-2"></i> Cancelar
                </button>
                <button class="btn btn-primary fw-bold flex-fill mx-1" id="btnGuardarCaja">
                    <i class="fas fa-save me-2"></i> Guardar Movimiento
                </button>
            </div>
        </div>
    </div>
</div>
   <script>
    var producto_ventas;
       var items = [];
       var itemProducto = 0;
       var iva = 0;
       var razon_social;
       var ruc;
       var mensaje;
       var direccion;
       var marca;
       var email;
       var nro_credito_venta;
       var Toast = Swal.mixin({
           toast: true,
           position: 'top',
           showConfirmButton: false,
           timer: 3000
       });
       
 $(document).ready(function() {
        cargarTableProducto();
        CargarNroBoleta();
        verificarSiExisteCajaAbierta();
        $('#clienteSearch').on('keyup', function() {
               let query = $(this).val().trim();
               if (query.length < 2) {
                   $('#clientesList').empty(); // limpiar si hay poco texto
                   return;
               }

               $.ajax({
                   async: false,
                   url: "ajax/clientes.ajax.php",
                   method: "POST",
                   data: {
                       'accion': 5,
                       'busqueda': query,
                   },
                   dataType: 'json',
                   success: function(respuesta) {
                       console.log("respuesta:", respuesta);

                       // Limpiar datalist
                       $("#clientesList").empty();

                       for (let i = 0; i < respuesta.length; i++) {
                           const descripcion = respuesta[i]['descripcion_clientes'];

                           // Agregar opciones al datalist
                           $("#clientesList").append(`<option value="${descripcion}"></option>`);
                       }

                       // Manejar evento cuando se selecciona un producto
                       $("#clienteSearch").on('change', function() {
                           let valor = $(this).val();
                           if (valor !== '') {
                               CargarCliente(valor);
                               $(this).val('').focus(); // limpiar y volver a enfocar
                           }
                       });
                   }
               });
        });
     
 // Maneja el evento keyup en el input de búsqueda de productos
    $('#productoSearch').on('keyup', function() {
        let query = $(this).val().trim();
        let sugerenciasDiv = $('#productosSugerencias');

        if (query.length < 2) {
            sugerenciasDiv.empty().hide(); // Limpia y oculta si hay poco texto
            return;
        }

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 6,
                'opcion': 1,
                'busqueda': query,
            },
            dataType: 'json',
            success: function(respuesta) {
                sugerenciasDiv.empty().show(); // Limpia sugerencias anteriores y muestra el contenedor
                if (respuesta.length === 0) {
                    sugerenciasDiv.html('<div class="p-2 text-muted">No se encontraron productos.</div>');
                    return;
                }
                for (let i = 0; i < respuesta.length; i++) {
                    const producto = respuesta[i];
                    const imagenUrl = producto.img_producto;
                    const descripcion = producto.descripcion_completa;
                    const codigo = producto.codigo_barra;

                    // Crea el HTML para cada ítem de sugerencia
                    const suggestionHtml = `
                        <div class="sugerencia-item list-group-item list-group-item-action d-flex align-items-center" data-codigo="${codigo}" style="cursor:pointer;">
                            <img src="${imagenUrl}" alt="" class="sugerencia-img me-2" style="width: 40px; height: 40px; object-fit: cover;">
                            <div class="sugerencia-descripcion">${descripcion}</div>
                        </div>
                    `;
                    sugerenciasDiv.append(suggestionHtml);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX de búsqueda:", textStatus, errorThrown);
                $('#productosSugerencias').empty().hide();
            }
        });
    }); 
           $('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
               producto_ventas.row($(this).parents('tr')).remove().draw();
               recalcularTotales();
           });

           $('#btnRegistrarCliente').on('click', function() {
               $("#modalRegistrarCliente").modal('show');
           });
           $('#btnVentaCredit').on('click', function() {
               $("#modalCredito").modal('show');
           });

        
           // Eventos de botones
        //    $('#btnGuardarCredito').on('click', function() {
        //        $("#btnGuardarCredito").prop('disabled', true);
        //        enviarVenta('credito');
        //    });

      $(document).off('click', '#btnGuardarCredito').on('click', '#btnGuardarCredito', function () {
           const $btn = $(this);
           $btn.prop('disabled', true); // 🔒 Deshabilita el botón inmediatamente
           enviarVenta('credito');      // ⏳ Ejecuta una sola vez la venta a crédito
      });
        //    $("#btnIniciarVentaContado").on('click', function() {
        //        $("#btnIniciarVentaContado").prop('disabled', true);
        //        enviarVenta('contado');
        //    });
      $(document).off('click', '#btnIniciarVentaContado').on('click', '#btnIniciarVentaContado', function () {
             const $btn = $("#btnIniciarVentaContado");
             $btn.prop('disabled', true); // 🔒 Desactiva el botón inmediatamente
             enviarVenta('contado');
     });

         // --- Manejador de cambio de cantidad (`.iptCantidad`) ---
// $('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {
//     let $inputw = $(this);
//     let row = producto_ventas.row($inputw.closest('tr'));
//     let data = row.data(); // Obtiene los datos actuales de la fila

//     if (data.id_producto == '') {
//         return;
//     }
//     let cantidad_actual = parseFloat($(this).val()); // Obtiene la nueva cantidad del input
//     let cod_producto_actual = $(this).attr('codigo_barra');

//     console.log("este es el codigo barra:",cod_producto_actual);
//     // Validación: Si la cantidad no es numérica o es menor/igual a cero.
//     if (isNaN(cantidad_actual) || cantidad_actual <= 0) {
//         Toast.fire({
//             icon: 'error',
//             title: 'INGRESE UN VALOR NUMERICO Y MAYOR A 0'
//         });
//         $(this).val("1"); // Restablece la cantidad a 1 en el input
//         cantidad_actual = 1; // Actualiza la variable para el cálculo
//         $("#searchInputCodigo").val("").focus();
//     }

//     // Llama a AJAX para validar el stock (tu lógica existente).
//     $.ajax({
//         async: false, // Considera hacer esto asíncrono (true) para una mejor UX
//         url: "ajax/productos.ajax.php",
//         method: "POST",
//         data: {
//             'accion': 8, // Validar stock del producto
//             'codigo_producto': cod_producto_actual,
//             'cantidad': cantidad_actual
//         },
//         dataType: 'json',
//         success: function(respuesta) {
//             // Si no hay stock suficiente, restablece la cantidad a 1.
//             if (parseInt(respuesta['existe']) == 0) {
//                 Toast.fire({
//                     icon: 'error',
//                     title: 'El producto ' + data['descripcion_producto'] + ' ya no tiene stock'
//                 });
//                 // Restablece el input de cantidad en la tabla a 1.
//                 producto_ventas.cell(row.index(), 8).data('<input type="text" style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" codigo_barra = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="1">').draw();
//                 cantidad_actual = 1; // Asegura que la variable de cantidad sea 1 para los cálculos siguientes.

//                 $("#searchInputCodigo").val("");
//                 $("#searchInputCodigo").focus();
//             }

//             // Recalcula los valores de la fila con la cantidad (validada/actualizada).
//             let precioUnitarioBruto = parseFloat(data['precio_venta'].replace("$./ ", ""));
//             let totalBrutoProducto = (cantidad_actual * precioUnitarioBruto);

//             let nuevoiva = 0;
//             let nuevosubtotal = totalBrutoProducto; // Inicialmente, subtotal es el total bruto

//             if (data['lleva_iva_producto'] == 1) {
//                 nuevosubtotal = totalBrutoProducto / (1 + iva);
//                 nuevoiva = totalBrutoProducto - nuevosubtotal;
//             }

//             // Actualiza las celdas de la tabla.
//             producto_ventas.cell(row.index(), 10).data(nuevoiva.toFixed(2)).draw();
//             producto_ventas.cell(row.index(), 11).data(nuevosubtotal.toFixed(2)).draw();
//             producto_ventas.cell(row.index(), 12).data("$./ " + totalBrutoProducto.toFixed(2)).draw(); // El total es el total bruto

//             // Recalcula los totales generales.
//             recalcularTotales();
//         }
//     });
// });
// --- Manejador de cambio de cantidad (`.iptCantidad`) ---
// Este evento se dispara cuando cambias manualmente la cantidad en el input.
$('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {
    let $inputw = $(this);
    let row = producto_ventas.row($inputw.closest('tr'));
    // **SIEMPRE OBTÉN LOS DATOS DE LA FILA DE DATATABLES.**
    // Estos datos ('data') son la fuente más fiable para 'id_producto', 'codigo_barra', etc.
    let data = row.data(); 

    if (data.id_producto == '') {
        return;
    }

    let cantidad_actual = parseFloat($(this).val());

    // =========================================================================
    // ✨ EL CAMBIO CRÍTICO:
    // Obtén el codigo_barra directamente de los datos de la fila de DataTables ('data').
    // Esto evita cualquier problema con atributos 'undefined' en el elemento HTML
    // que se haya recreado debido a las actualizaciones de DataTables.
    // =========================================================================
    let cod_producto_actual = data['codigo_barra'];
    // =========================================================================

    console.log("codigo_barra para AJAX:", cod_producto_actual); // Verifica que aquí siempre sea el código correcto

    // Validación: Si la cantidad no es numérica o es menor/igual a cero.
    if (isNaN(cantidad_actual) || cantidad_actual <= 0) {
        Toast.fire({
            icon: 'error',
            title: 'INGRESE UN VALOR NUMERICO Y MAYOR A 0'
        });
        $(this).val("1"); // Restablece la cantidad a 1 en el input
        cantidad_actual = 1; // Actualiza la variable para el cálculo
        $("#searchInputCodigo").val("").focus();
    }

    // Llama a AJAX para validar el stock.
    $.ajax({
        async: false, // ¡Recuerda, esto bloquea la UI! Considera cambiar a 'true' y refactorizar.
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: {
            'accion': 8, // Validar stock del producto
            'codigo_producto': cod_producto_actual, // Usa el 'cod_producto_actual' que obtuvimos de 'data'
            'cantidad': cantidad_actual
        },
        dataType: 'json',
        success: function(respuesta) {
            // Si no hay stock suficiente, restablece la cantidad a 1.
            if (parseInt(respuesta['existe']) == 0) {
                Toast.fire({
                    icon: 'error',
                    title: 'El producto ' + data['descripcion_producto'] + ' ya no tiene stock'
                });
                // Al recrear el input aquí, asegúrate de mantener el 'codigo_barra'
                // aunque ya no lo uses para obtener el valor en el manejador.
                producto_ventas.cell(row.index(), 8).data('<input type="text" style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" codigo_barra = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="1">').draw();
                cantidad_actual = 1; // Asegura que la variable de cantidad sea 1 para los cálculos siguientes.

                $("#searchInputCodigo").val("");
                $("#searchInputCodigo").focus();
            }

            // Recalcula los valores de la fila con la cantidad (validada/actualizada).
            let precioUnitarioBruto = parseFloat(data['precio_venta'].replace("$./ ", ""));
            let totalBrutoProducto = (cantidad_actual * precioUnitarioBruto);

            let nuevoiva = 0;
            let nuevosubtotal = totalBrutoProducto;

            if (data['lleva_iva_producto'] == 1) {
                nuevosubtotal = totalBrutoProducto / (1 + iva);
                nuevoiva = totalBrutoProducto - nuevosubtotal;
            }

            // Actualiza las celdas de la tabla.
            producto_ventas.cell(row.index(), 10).data(nuevoiva.toFixed(2)).draw();
            producto_ventas.cell(row.index(), 11).data(nuevosubtotal.toFixed(2)).draw();
            producto_ventas.cell(row.index(), 12).data("$./ " + totalBrutoProducto.toFixed(2)).draw();

            // Recalcula los totales generales.
            recalcularTotales();
        }
    });
});

// --- Manejador de click en los precios del Dropdown ---
// Se llama cuando el usuario selecciona un tipo de precio (Normal, Por Mayor, Especial)
$('#lstProductosVenta tbody').on('click', '.dropdown-item', function() {
    let codigo_producto = $(this).attr("codigo");
    // El precio de los atributos 'precio' del dropdown DEBE ser el precio BRUTO (incluye IVA).
    let nuevo_precio_unitario_bruto = parseFloat($(this).attr("precio")); 

    // Validación para asegurar que el precio es válido.
    if (isNaN(nuevo_precio_unitario_bruto) || nuevo_precio_unitario_bruto <= 0) {
        console.warn("Precio inválido recibido del dropdown:", nuevo_precio_unitario_bruto);
        return;
    }

    // Itera sobre las filas de la tabla para encontrar el producto y actualizarlo.
    producto_ventas.rows().eq(0).each(function(index) {
        let row = producto_ventas.row(index);
        let data = row.data();
        if (data['codigo_barra'] == codigo_producto) {
            // Actualiza el 'precio_venta' en los datos de la fila con el nuevo precio bruto formateado.
            data['precio_venta'] = "$./ " + nuevo_precio_unitario_bruto.toFixed(2); 

            // Obtiene la cantidad actual del campo de entrada en la tabla.
            let currentQuantityInput = $(row.node()).find('.iptCantidad');
            let cantidad_actual = parseFloat(currentQuantityInput.val());

            // Recalcula los montos de esta fila específica con el nuevo precio.
            let totalBrutoProducto = (cantidad_actual * nuevo_precio_unitario_bruto);

            let nuevoiva = 0;
            let nuevosubtotal = totalBrutoProducto; // Inicialmente, subtotal es el total bruto

            if (data['lleva_iva_producto'] == 1) {
                nuevosubtotal = totalBrutoProducto / (1 + iva);
                nuevoiva = totalBrutoProducto - nuevosubtotal;
            }

            // Actualiza las celdas de la tabla para la fila.
            producto_ventas.cell(index, 9).data("$./ " + nuevo_precio_unitario_bruto.toFixed(2)).draw(); // Actualiza columna de Precio
            producto_ventas.cell(index, 10).data(nuevoiva.toFixed(2)).draw();
            producto_ventas.cell(index, 11).data(nuevosubtotal.toFixed(2)).draw();
            producto_ventas.cell(index, 12).data("$./ " + totalBrutoProducto.toFixed(2)).draw(); // El total es el total bruto

            // Detiene el bucle ya que el producto fue encontrado y actualizado.
            return false; 
        }
    });

    // Recalcula los totales generales después del cambio de precio.
    recalcularTotales();
});
           $("#iptEfectivoRecibido").keyup(function() {
               actualizarVuelto();
           });
           $("#btnVaciarListado").on('click', function() {
               vaciarListado();
        });
   $("#btnEntradaDinero").on('click', function() {
      $("#mdlGestionarCaja").modal('show');

    // Cambiar el color de la cabecera a verde (bg-success)
    $(".modal-header").removeClass("bg-danger bg-warning").addClass("bg-success");

    // Cambiar el título del modal para indicar que es una "Entrada"
    $("#titulo_modal_caja").html('<i class="fas fa-coins me-2"></i> Registrar Entrada de Dinero');

    // Establecer los valores de los campos ocultos
    $("#ddlTipo").val(1);
    $("#selopciones").val(5);

    // Opcional: Limpiar los campos del formulario cada vez que se abre
    $("#txt_Monto").val('');
    $("#txt_Comentario").val('');
    // También podrías resetear la validación si estás usando Bootstrap's needs-validation
    // $('.needs-validation').removeClass('was-validated');
});

$("#btnSalidadaDinero").on('click', function() {
    $("#mdlGestionarCaja").modal('show');

    // Cambiar el color de la cabecera a naranja (bg-warning)
    $(".modal-header").removeClass("bg-danger bg-success").addClass("bg-warning");

    // Cambiar el título del modal para indicar que es una "Salida"
    $("#titulo_modal_caja").html('<i class="fas fa-door-open me-2"></i> Registrar Salida de Dinero');

    // Establecer los valores de los campos ocultos
    $("#ddlTipo").val(2);
    $("#selopciones").val(8);

    // Opcional: Limpiar los campos del formulario cada vez que se abre
    $("#txt_Monto").val('');
    $("#txt_Comentario").val('');
    // $('.needs-validation').removeClass('was-validated');
});   
     // Maneja el clic en un elemento de sugerencia
    $('#productosSugerencias').on('click', '.sugerencia-item', function() {
        let codigoProducto = $(this).data('codigo');
        $('#productoSearch').val(codigoProducto); // Rellena el input con el código seleccionado
        $('#productosSugerencias').empty().hide(); // Oculta y limpia las sugerencias
        CargarProductos(codigoProducto); // Carga el producto en la tabla
        $('#productoSearch').val('').focus(); // Limpia el input de búsqueda y vuelve a enfocar
    });

      // Opcional: Oculta las sugerencias si se hace clic fuera del input de búsqueda o las sugerencias
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productoSearch, #productosSugerencias').length) {
            $('#productosSugerencias').empty().hide();
        }
    });

    // Previene el envío del formulario al presionar Enter en el input de búsqueda
    // Útil para lectores de código de barras
    $('#productoSearch').on('keypress', function(e) {
        if (e.which === 13) { // Tecla Enter
            e.preventDefault();
            let query = $(this).val().trim();
            if (query.length > 0) {
                CargarProductos(query);
                $(this).val('').focus();
                $('#productosSugerencias').empty().hide();
            }
        }
    });
});

    function cargarTableProducto() {
           producto_ventas = $('#lstProductosVenta').DataTable({
               "columns": [{
                       "data": "contador"
                   },
                   {
                       "data": "id_producto"
                   },
                   {
                       "data": "codigo_barra"
                   },
                   {
                       "data": "id_categoria"
                   },
                   {
                       "data": "nombre_categoria"
                   },
                   {
                       "data": "descripcion_producto"
                   },
                   {
                       "data": "unidad"
                   },
                   {
                       "data": "lleva_iva_producto"
                   },
                   {
                       "data": "cantidad"
                   },
                   {
                       "data": "precio_venta"
                   },
                   {
                       "data": "iva"
                   },
                   {
                       "data": "subtotal"
                   },
                   {
                       "data": "total"
                   },
                   {
                       "data": "acciones"
                   },
                   {
                       "data": "precio_normal"
                   },
                   {
                       "data": "precio_1_producto"
                   },
                   {
                       "data": "precio_2_producto"
                   },

               ],

               columnDefs: [{
                       targets: 0, // idice cero donde se encuentra la columna
                       visible: false
                   },
                   {
                       targets: 1,
                       visible: false
                   }, {
                       targets: 3,
                       visible: false
                   }, {
                       targets: 4,
                       visible: false
                   }, {
                       targets: 6,
                       visible: false
                   },
                   {
                       targets: 7,
                       visible: false
                   }, {
                       targets: 10,
                       visible: false
                   }, {
                       targets: 14,
                       visible: false
                   }, {
                       targets: 15,
                       visible: false
                   },
                   {
                       targets: 16,
                       visible: false
                   },
                   {
                       targets: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
                       orderable: false
                   },

               ],
               "order": [
                   [0, 'desc']
               ],

               "language": {
                   "url": "Views/assets/plugin/datatable/Spanish.json"
               },
               paging: false,
               searching: false,
               //  info: false
           });
    };

     function CargarCliente(clientes = "") {
           let cedula_cliente = 0;
           if (clientes != "") {
               cedula_cliente = clientes;
           } else {
               cedula_cliente = $("#clienteSearch").val();
           }
           cedula_cliente = $.trim(cedula_cliente.split('-')[0]);

           if (!cedula_cliente || cedula_cliente === "0") {
               console.log("cedula inválido, no se ejecuta AJAX");
               return;
           }
           console.log("cedula_cliente", cedula_cliente);
           $.ajax({
               url: "ajax/clientes.ajax.php",
               method: "POST",
               data: {
                   'accion': 6,
                   'cedula_cliente': cedula_cliente

               },
               dataType: 'json',
               success: function(respuesta) {

                   if (respuesta) {
                       $("#txtIdCliente").val(respuesta['id_cliente']);
                       $("#txtNumeroDocumento").val(respuesta['numeroDocumento']);
                       $("#clienteSearch").val(respuesta['nombre']);

                       /*===================================================================*/
                       //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                       /*===================================================================*/
                   } else {
                       Toast.fire({
                           icon: 'error',
                           title: ' El cliente  no existe por favor registre al cliente'
                       });

                       $("#clienteSearch").val("");
                       $("#clienteSearch").focus();
                   }
               }
           });
    };
    
  // --- `CargarNroBoleta` y `actualizarIVAs` (ya estaban correctas para cargar el IVA) ---
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
            serie_boleta = respuesta["serie_boleta"];
            nro_boleta = respuesta["nro_venta"];
            razon_social = respuesta["razon_social"];
            ruc = respuesta["ruc"];
            mensaje = respuesta["mensaje"];
            direccion = respuesta["direccion"];
            marca = respuesta["marca"];
            email = respuesta["email"];
            iva = (respuesta["impuesto"] / 100); // Esto establece la variable global 'iva' correctamente como decimal.
            nro_credito_venta = respuesta["nro_credito_ventas"];
            $("#iptNroSerie").val(serie_boleta);
            $("#iptNroVenta").val(nro_boleta);
            actualizarIVAs(iva); // Pasa el valor decimal del IVA para actualizar las etiquetas.
        }
    });
}

    // --- Otras funciones (sin cambios en la lógica de IVA) ---
function CargarProductos(producto = "") {
    let codigo_producto = producto || $("#productoSearch").val();
     console.log("codigo:",codigo_producto);
    // codigo_producto = $.trim(codigo_producto.split('/')[0]);
    // console.log("codigo:",codigo_producto);
       // Conversión segura a string y luego split
    codigo_producto = $.trim(String(codigo_producto).split('/')[0]);
    console.log("codigo procesado:", codigo_producto);

    let producto_repetido = false;
    console.log("producto_repetido pase por repetir1", producto_repetido);
    producto_ventas.rows().eq(0).each(function(index) {
        let row = producto_ventas.row(index);
        let data = row.data();

        if (codigo_producto == data['codigo_barra']) {
            producto_repetido = true;
            console.log("producto_repetido pase por repetir2", producto_repetido);
            actualizarCantidadProducto(index, data, codigo_producto);
            return false; // Salir del bucle temprano
        }
    });

    if (producto_repetido) {
        console.log("producto_repetido pase por repetir 3", producto_repetido);
        return;
    }
    console.log("producto_repetido pase por repetir 4 no igresos", producto_repetido);
    obtenerProductoPorCodigo(codigo_producto);
}

      // Actualiza la cantidad del producto ya existente en la tabla
    function actualizarCantidadProducto(index, data, codigo_producto) {
           let cantidad = parseFloat($.parseHTML(data['cantidad'])[0]['value']) + 1;
          console.log("producto actuali;",codigo_producto);
           $.ajax({
               async: false,
               url: "ajax/productos.ajax.php",
               method: "POST",
               data: {
                   'accion': 8,
                   'codigo_producto': codigo_producto,
                   'cantidad': cantidad
               },
               dataType: 'json',
               success: function(respuesta) {
                   if (parseInt(respuesta['existe']) == 0) {
                       Toast.fire({
                           icon: 'error',
                           title: ' El producto ' + data['descripcion_producto'] + ' ya no tiene stock'
                       });
                       $("#searchInputCodigo").val("").focus();
                   } else {
                       actualizarFilaProducto(index, data, cantidad, respuesta);
                   }
               }
           });
    };

         // Actualiza los datos de la fila del producto
  // --- Recalcula IVA y Totales en `actualizarFilaProducto` ---
// Se llama cuando se actualiza la cantidad de un producto existente.
function actualizarFilaProducto(index, data, cantidad, respuesta) {
    // El precio unitario bruto (ya incluye IVA) se toma de los datos de la fila.
    let precioUnitarioBruto = parseFloat(data['precio_venta'].replace("$./ ", ""));     
    // Calcula el total bruto (con IVA) para esta línea de producto.
    let totalBrutoProducto = (cantidad * precioUnitarioBruto); 
    let ivaProductoActual = 0;
    let subtotalProductoActual = totalBrutoProducto; // Inicialmente, subtotal es el total bruto
    // Si el producto lleva IVA, desglosamos el IVA y obtenemos el subtotal neto.
    if (data['lleva_iva_producto'] == 1) {
        // Calcula el subtotal neto: total bruto / (1 + tasa de IVA)
        subtotalProductoActual = totalBrutoProducto / (1 + iva); 
        // Calcula el monto del IVA: total bruto - subtotal neto
        ivaProductoActual = totalBrutoProducto - subtotalProductoActual;
    }
    // Actualiza el campo de cantidad en la tabla.
    producto_ventas.cell(index, 8).data(
        '<input type="text" style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" ' +
        'codigo_barra = "' + respuesta['codigo_barra'] + '" ' +
        'class="form-control form-control-sm text-center iptCantidad p-0 m-0" ' +
        'value="' + cantidad + '">'
    ).draw();

    
    // Actualiza las celdas de IVA, subtotal y total en la tabla con los nuevos valores.
    producto_ventas.cell(index, 10).data(ivaProductoActual.toFixed(2)).draw();
    producto_ventas.cell(index, 11).data(subtotalProductoActual.toFixed(2)).draw();
    producto_ventas.cell(index, 12).data("$./ " + totalBrutoProducto.toFixed(2)).draw(); // El total es el total bruto
    // Llama a la función para recalcular los totales generales de la venta.
    recalcularTotales();
}

    // Obtiene el producto por su código de barra
   function obtenerProductoPorCodigo(codigo_producto) {
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: {
            'accion': 7, // Buscar producto por su código de barra
            'codigo_producto': codigo_producto
        },
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta) {
                agregarProductoATabla(respuesta);
            } else {
                Toast.fire({
                    icon: 'error',
                    title: ' El producto no existe o no tiene stock'
                });
                $("#productoSearch").val("").focus();
            }
        }
    });
}

        
// --- Agrega un nuevo producto a la tabla en `agregarProductoATabla` ---
// Se llama cuando se añade un producto por primera vez a la tabla de ventas.
function agregarProductoATabla(respuesta) {
    let itemProducto = producto_ventas.rows().count() + 1;
    // Asumiendo que 'precio_venta' de la respuesta AJAX es el precio BRUTO (incluye IVA).
    let precioUnitarioBruto = parseFloat(respuesta['precio_venta'].replace("$./ ", ""));

    let ivaProducto = 0;
    let subtotalProducto = precioUnitarioBruto; // Inicialmente, subtotal es el precio bruto

    // Si el producto lleva IVA, desglosamos el IVA y obtenemos el subtotal neto.
    if (respuesta['lleva_iva_producto'] == 1) {
        subtotalProducto = precioUnitarioBruto / (1 + iva); // Subtotal neto para una unidad
        ivaProducto = precioUnitarioBruto - subtotalProducto; // IVA para una unidad
    }

    producto_ventas.row.add({
        'contador': itemProducto,
        'id_producto': respuesta['id_producto'],
        'codigo_barra': respuesta['codigo_barra'],
        'id_categoria': respuesta['id_categoria'],
        'nombre_categoria': respuesta['nombre_categoria'],
        'descripcion_producto': respuesta['descripcion_producto'],
        // Input de cantidad con valor inicial de 1.
        'cantidad': '<input type="text" style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" codigo_barra = "' + respuesta['codigo_barra'] + '" class="form-control form-control-sm text-center iptCantidad p-0 m-0" value="1">',
        'unidad': respuesta['unidad'],
        'lleva_iva_producto': respuesta['lleva_iva_producto'],
        'precio_venta': "$./ " + precioUnitarioBruto.toFixed(2), // Almacena el precio bruto formateado.
        'iva': ivaProducto.toFixed(2), // Almacena el IVA de una unidad.
        'subtotal': subtotalProducto.toFixed(2), // Almacena el subtotal neto de una unidad.
        'total': "$./ " + precioUnitarioBruto.toFixed(2), // Almacena el total (precio bruto) de una unidad.
        'acciones': generarAccionesProducto(respuesta),
        'precio_normal': respuesta['precio_venta'] || "", 
        'precio_1_producto': respuesta['precio_1_producto'] || "",
        'precio_2_producto': respuesta['precio_2_producto'] || ""
    }).draw();

    // Recalcula los totales generales después de añadir el producto.
    recalcularTotales();
}


   function generarAccionesProducto(respuesta) {
    // Asegúrate de que precioNormal, precio_1_producto y precio_2_producto sean los precios BRUTOS.
    let match = respuesta['precio_venta'].match(/(\d+\.\d{1,2})/);
    let precioNormal = match ? parseFloat(match[0]) : 0;

    return "<center>" +
        "<span class='btnEliminarproducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'>" +
        "<i class='fas fa-trash fs-5'> </i>" +
        "</span>" +
        "<div class='btn-group'>" +
        "<button type='button' class='p-0 btn btn-link dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
        "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
        "</button>" +
        "<ul class='dropdown-menu'>" +
        "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + precioNormal.toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Normal ($./ " + precioNormal.toFixed(2) + ")</a></li>" +
        "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + parseFloat(respuesta['precio_1_producto']).toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Precio por Mayor ($./ " + parseFloat(respuesta['precio_1_producto']).toFixed(2) + ")</a></li>" +
        "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + parseFloat(respuesta['precio_2_producto']).toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Precio Especial ($./ " + parseFloat(respuesta['precio_2_producto']).toFixed(2) + ")</a></li>" +
        "</ul>" +
        "</div>" +
        "</center>";
}

       function actualizarVuelto() {
           let totalVenta = $("#totalVenta").html(); // capturo Total 
           $("#chkEfectivoExacto").prop('checked', false); // desabilitar el checked al moento de digitar
           let efectivoRecibido = $("#iptEfectivoRecibido").val(); // capturo lo que recibido  
           if (efectivoRecibido > 0) {
               $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2)); //caturmaos EfectivoEntregado
               vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta);
               $("#Vuelto").html(vuelto.toFixed(2));
           } else {
               $("#EfectivoEntregado").html("0.00");
               $("#Vuelto").html("0.00");

           }
       };

    // --- Recalcula IVA y Totales en `recalcularMontos` (cuando el precio unitario cambia) ---
// Se llama cuando se selecciona un precio diferente (Normal, Por Mayor, Especial) para un producto.
function recalcularMontos(codigo_producto, precio_venta_nuevo_bruto) {
    let cantidad_actual = 0;
    producto_ventas.rows().eq(0).each(function(index) {
        let row = producto_ventas.row(index);
        let data = row.data();
        if (data['codigo_barra'] == codigo_producto) {
            // Actualiza el precio de venta almacenado en el objeto de datos de la fila con el nuevo precio bruto.
            data['precio_venta'] = "$./ " + parseFloat(precio_venta_nuevo_bruto).toFixed(2);
            // Actualiza la celda del precio en la tabla.
            producto_ventas.cell(index, 9).data(data['precio_venta']).draw(); 

            // Obtiene la cantidad actual del input dentro de la celda.
            cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

            // Calcula el total bruto (con IVA) con el nuevo precio y cantidad.
            let totalBrutoProducto = (cantidad_actual * parseFloat(precio_venta_nuevo_bruto));

            let nuevoiva = 0;
            let nuevosubtotal = totalBrutoProducto; // Inicialmente, subtotal es el total bruto

            // Si el producto lleva IVA, desglosamos el IVA y obtenemos el subtotal neto.
            if (data['lleva_iva_producto'] == 1) {
                nuevosubtotal = totalBrutoProducto / (1 + iva);
                nuevoiva = totalBrutoProducto - nuevosubtotal;
            }

            // Actualiza las celdas de IVA, subtotal y total en la tabla.
            producto_ventas.cell(index, 10).data(nuevoiva.toFixed(2)).draw();
            producto_ventas.cell(index, 11).data(nuevosubtotal.toFixed(2)).draw();
            producto_ventas.cell(index, 12).data("$./ " + totalBrutoProducto.toFixed(2)).draw(); // El total es el total bruto
            
            // Rompe el bucle una vez que se encuentra y actualiza el producto.
            return false; 
        }
    });
    // Llama a la función para recalcular los totales generales de la venta.
    recalcularTotales();
}

       // --- `recalcularTotales` función ---
// Se encarga de sumar todos los IVAs y Totales de las filas para mostrar el resumen de la venta.
function recalcularTotales() {
    let TotalVenta = 0.00; // Suma de los totales con IVA de cada producto.
    let TotalIva = 0.00; // Suma de los IVAs de cada producto.
    let TotalSubtotal = 0.00; // Suma de los subtotales (netos) de cada producto.

    producto_ventas.rows().eq(0).each(function(index) { 
        let row = producto_ventas.row(index);
        let data = row.data(); 
        TotalVenta = parseFloat(TotalVenta) + parseFloat(data['total'].replace("$./ ", "")); // Total bruto por línea
        TotalIva = parseFloat(TotalIva) + parseFloat(data['iva']); // IVA por línea
        TotalSubtotal = parseFloat(TotalSubtotal) + parseFloat(data['subtotal']); // Subtotal neto por línea
    });
    
    $("#totalVenta").html(TotalVenta.toFixed(2)); 
    // Ahora el subtotal ya no se calcula restando del total, sino sumando los subtotales de cada línea
    $("#boleta_subtotal").html(parseFloat(TotalSubtotal).toFixed(2)); 
    $("#boleta_igv").html(parseFloat(TotalIva).toFixed(2));
    
    // Restablece los campos de pago.
    $("#iptEfectivoRecibido").val("");
    $("#chkEfectivoExacto").prop('checked', false);
    $("#EfectivoEntregado").html("0.00");
    $("#Vuelto").html("0.00");
    $("#iptCodigoVenta").val("");
    $("#iptCodigoVenta").focus();
}

    //    document.getElementById("btnGuardar_cliente").addEventListener("click", function() {

    //        const tipoIdentificacion = $("#selTipoIdentificacion").val();
    //        const numeroDocumento = $("#iptNumeroDocumento").val().trim();
    //        const saltarValidacion = document.getElementById("chkValidar").checked;

    //        const tipoIdentificacionTexto = {
    //            "05": "Cédula",
    //            "04": "RUC",
    //            "06": "Pasaporte"
    //        };

    //        const validarDocumento = () => {
    //            if (saltarValidacion) return true;
    //            switch (tipoIdentificacion) {
    //                case "05":
    //                    return validarCedula(numeroDocumento);
    //                case "04":
    //                    return validarRUC(numeroDocumento);
    //                case "06":
    //                    return validarPasaporte(numeroDocumento);
    //                default:
    //                    return false;
    //            }
    //        };

    //        if (!validarDocumento()) {
    //            const tipoTexto = tipoIdentificacionTexto[tipoIdentificacion] || "documento";
    //            Swal.fire({
    //                icon: 'warning',
    //                title: 'Documento inválido',
    //                text: `El número de ${tipoTexto.toLowerCase()} ingresado no es válido. Por favor, verifica el valor.`,
    //                confirmButtonText: 'Aceptar'
    //            });
    //            return;
    //        }
    //   const form = document.querySelector('#modalRegistrarCliente form.needs-validation');
    //     if (!form.checkValidity()) {
    //       form.classList.add('was-validated');
    //        Swal.fire({
    //         icon: 'info',
    //         title: 'Por favor complete todos los campos obligatorios'
    //       });
    //     return;
    //  }


    //     //    const forms = document.getElementsByClassName('needs-validation');
    //     //    let formularioValido = true;

    //     //    Array.from(forms).forEach(form => {
    //     //        if (!form.checkValidity()) {
    //     //            formularioValido = false;
    //     //            form.classList.add('was-validated');
    //     //        }
    //     //    });

    //     //    if (!formularioValido) {
    //     //        Swal.fire({
    //     //            icon: 'info',
    //     //            title: 'Por favor complete todos los campos obligatorios'
    //     //        });
    //     //        return;
    //     //    }

    //        Swal.fire({
    //            title: '¿Está seguro de registrar el Cliente?',
    //            icon: 'warning',
    //            showCancelButton: true,
    //            confirmButtonColor: '#3085d6',
    //            cancelButtonColor: '#d33',
    //            confirmButtonText: 'Sí, deseo registrarlo!',
    //            cancelButtonText: 'Cancelar',
    //        }).then((result) => {
    //            if (!result.isConfirmed) return;

    //            const datos = new FormData();
    //            datos.append("accion", 2);
    //            datos.append("IdCliente", $("#IdCliente").val());
    //            datos.append("tipoIdentificacion", tipoIdentificacion);
    //            datos.append("NumeroDocumento", numeroDocumento);
    //            datos.append("Nombre", $("#iptNombre").val());
    //            datos.append("Apellido", $("#iptApellido").val());
    //            datos.append("Direccion", $("#iptDireccion").val());
    //            datos.append("Telefono", $("#iptTelefono").val());
    //            datos.append("Email", $("#iptEmail").val());
    //            datos.append("Estado", 1);

    //            $.ajax({
    //                url: "ajax/clientes.ajax.php",
    //                method: "POST",
    //                data: datos,
    //                cache: false,
    //                contentType: false,
    //                processData: false,
    //                dataType: 'json',
    //                success: function(respuesta) {
    //                    mostrarAlertaRespuesta(respuesta, function() {
    //                        CargarCliente(numeroDocumento);
    //                        fun_limpiar();
    //                        $("#modalRegistrarCliente").modal('hide');
    //                    }, {
    //                        mensajeExito: "éxito",
    //                        mensajeAdvertencia: "Warning",
    //                        mensajeError: "Excepción"
    //                    });
    //                },
    //                error: manejarErrorAjax
    //            });
    //        });
    //    });

    document.getElementById("btnGuardar_cliente").addEventListener("click", function () {
    const btn = this;
    btn.disabled = true; // 🔒 Bloquea el botón desde el inicio

    const tipoIdentificacion = $("#selTipoIdentificacion").val();
    const numeroDocumento = $("#iptNumeroDocumento").val().trim();
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
        }).then(() => {
            btn.disabled = false; // 🔓 Rehabilita el botón si hubo error
        });
        return;
    }

    const form = document.querySelector('#modalRegistrarCliente form.needs-validation');
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        Swal.fire({
            icon: 'info',
            title: 'Por favor complete todos los campos obligatorios'
        }).then(() => {
            btn.disabled = false; // 🔓 Rehabilita si validación falla
        });
        return;
    }

    Swal.fire({
        title: '¿Está seguro de registrar el Cliente?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarlo!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (!result.isConfirmed) {
            btn.disabled = false; // 🔓 Si se cancela el registro
            return;
        }

        const datos = new FormData();
        datos.append("accion", 2);
        datos.append("IdCliente", $("#IdCliente").val());
        datos.append("tipoIdentificacion", tipoIdentificacion);
        datos.append("NumeroDocumento", numeroDocumento);
        datos.append("Nombre", $("#iptNombre").val());
        datos.append("Apellido", $("#iptApellido").val());
        datos.append("Direccion", $("#iptDireccion").val());
        datos.append("Telefono", $("#iptTelefono").val());
        datos.append("Email", $("#iptEmail").val());
        datos.append("Estado", 1);

        $.ajax({
            url: "ajax/clientes.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta) {
                mostrarAlertaRespuesta(respuesta, function () {
                    CargarCliente(numeroDocumento);
                    fun_limpiar();
                    $("#modalRegistrarCliente").modal('hide');
                    btn.disabled = false; // 🔓 Solo se habilita si terminó bien
                }, {
                    mensajeExito: "éxito",
                    mensajeAdvertencia: "Warning",
                    mensajeError: "Excepción"
                });
            },
            error: function () {
                manejarErrorAjax();
                btn.disabled = false; // 🔓 Si hubo error en Ajax
            }
        });
    });
});

         
      function actualizarIVAs(porcentaje) {
    porcentaje = porcentaje * 100; // Convierte el decimal a porcentaje para mostrar.
    const ivaLabels = document.querySelectorAll('.iva_label');
    ivaLabels.forEach(label => {
        label.innerText = `IVA (${porcentaje}%):`;
    });
}


       function getInputValueFromHTML(html, fallback = '') {
           const input = $("<div>").html(html).find("input");
           return input.length > 0 ? input.val() : html || fallback;
       }

    function construirDetalleVenta(table) {
    let arr = [];
    table.rows().eq(0).each(function(index) {
        let row = table.row(index);
        let data = row.data();
        let $inputCantidad = $(row.node()).find('.iptCantidad');
        let cantidad = parseFloat($inputCantidad.val()) || 0;

        arr.push(JSON.stringify({
            id_producto: data['id_producto'] || '',
            codigo_barra: data['codigo_barra'] || '',
            cantidad: cantidad,
            precio_venta: getInputValueFromHTML(data['precio_venta']).toString().replace("$./ ", ""),
            iva: data['iva'],
            subtotal: data['subtotal'],
            total: data['total'].toString().replace("$./ ", ""),
            descripcion_producto: getInputValueFromHTML(data['descripcion_producto'])
        }));
    });
    return arr;
}


       function construirFormDataVenta(tipoVenta, detalles, totalVenta, efectivoRecibido, vuelto) {
           const formData = new FormData();
           const tipoPago = tipoVenta === 'contado' ? 1 : 2;

           detalles.forEach(item => formData.append('arr[]', item));
           formData.append('Id_caja', $("#txtId_caja").val());
           formData.append('IdCliente', $("#txtIdCliente").val());
           formData.append('nro_boleta', $("#iptNroVenta").val());
           formData.append('tipo_pago', tipoPago);
        //    formData.append('TipoDocumento', $("#selDocumentoVenta").val());
           formData.append('TipoDocumento', "03");
           formData.append('descripcion_venta', 'Venta realizada con Nro Boleta: ' + $("#iptNroVenta").val());
           formData.append('CantidadProducto', producto_ventas.rows().count());
           formData.append('CantidadTotal', producto_ventas.rows().count());
           formData.append('iva', parseFloat($("#boleta_igv").html()));
           formData.append('subtotal', parseFloat($("#boleta_subtotal").html()));
           formData.append('total_venta', totalVenta);
           formData.append('ImporteRecibido', efectivoRecibido);
           formData.append('ImporteCambio', vuelto);
           formData.append('nro_credito_venta', nro_credito_venta);
           formData.append('fechaVencimiento', tipoVenta === 'credito' ? $("#fechaVencimiento").val() : "");

           return formData;
       }

       function mostrarAlerta(tipo, titulo, texto = '') {
           Swal.fire({
               icon: tipo,
               title: titulo,
               text: texto,
               showConfirmButton: true
           });
       }

function enviarVenta(tipoVenta) {
    const totalVenta = parseFloat($("#totalVenta").html());
    const efectivoRecibido = parseFloat(
        tipoVenta === 'contado' ? $("#iptEfectivoRecibido").val() : $("#montoAbonado").val()
    ) || 0;

    const count = producto_ventas.rows().count();
    const fechaVencimiento = $("#fechaVencimiento").val();

    if (count === 0) {
        mostrarAlerta('warning', 'No hay productos en el listado.');
        habilitarBotones();
        return;
    }

    const esContado = tipoVenta === 'contado';
    const efectivoInvalido = efectivoRecibido <= 0 || isNaN(efectivoRecibido);

    if (esContado && efectivoInvalido) {
        mostrarAlerta('warning', 'Ingrese el monto en efectivo');
        habilitarBotones();
        return;
    }

    if (tipoVenta === 'contado' && efectivoRecibido < totalVenta) {
        mostrarAlerta('warning', 'El efectivo es menor al costo total');
        habilitarBotones();
        return;
    }

    if (tipoVenta === 'credito') {
        if (!fechaVencimiento) {
            mostrarAlerta('warning', 'Ingrese la fecha Vencimiento');
            habilitarBotones();
            return;
        }

        if (efectivoRecibido >= totalVenta) {
            mostrarAlerta('warning', 'No se puede aplicar crédito, ya que no hay saldo');
            habilitarBotones();
            return;
        }
    }

    const detalles = construirDetalleVenta(producto_ventas);
    const vuelto = tipoVenta === 'contado' ? $("#Vuelto").html() : (totalVenta - efectivoRecibido);

    const formData = construirFormDataVenta(tipoVenta, detalles, totalVenta, efectivoRecibido, vuelto);

    $.ajax({
        url: "ajax/realizar_ventas.ajax.php",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            mostrarAlertaRespuesta(respuesta, function () {
                $("#modalCredito").modal('hide');
                LimpiarInputs();
                const nro_boleta = $("#iptNroVenta").val();
                window.open(`http://localhost/WebPuntoVenta2025/Views/modulos/Ventas/RealizarVentas/generar_tick.php?nro_boleta=${nro_boleta}`);
                CargarNroBoleta();
            }, {
                mensajeExito: "éxito",
                mensajeAdvertencia: "Warning",
                mensajeError: "Excepción"
            });
        },
        error: function () {
            mostrarAlerta('error', 'Error en la conexión', 'No se pudo conectar con el servidor. Intente nuevamente.');
        },
        complete: function () {
            habilitarBotones(); // 🔓 Siempre se reactiva el botón aquí (éxito o error)
        }
    });
}

       function vaciarListado() {
           producto_ventas.clear().draw();

       };

       function LimpiarInputs() {
           producto_ventas.clear().draw();
           $("#totalVenta").html("0.00");
           $("#iptEfectivoRecibido").val("");
           $("#selTipoPago").val(1);
           $("#EfectivoEntregado").html("0.00");
           $("#Vuelto").html("0.00");
           $("#chkEfectivoExacto").prop('checked', false);
           $("#boleta_subtotal").html("0.00");
           $("#boleta_igv").html("0.00");
           $("#iptCedulaCliente").val("");
           $("#fechaVencimiento").val("");
           $("#productoSearch").val("");
           $("#clienteSearch").val("");
       };

       function fun_limpiar() {
           $("#IdCliente").val("0");
           $("#iptNumeroDocumento").val("");
           $("#iptDireccion").val("");
           $("#iptNombre").val("");
           $("#iptTelefono").val("");
           $("#iptEmail").val("");
           $(".needs-validation").removeClass("was-validated");
       };

       function habilitarBotones() {
           $("#btnIniciarVentaContado").prop('disabled', false);
           $("#btnGuardarCredito").prop('disabled', false);
       }



       document.getElementById("btnGuardarCaja").addEventListener("click", function() {
         const $btnCajaGuardar = $("#btnGuardarCaja");
    $btnCajaGuardar.prop('disabled', true); // 🔒 Evitar múltiples clics

            Swal.fire({
                title: 'Está seguro de realizar este movimiento en la Caja?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo registrarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) { // preguntos si la respuesta en afirmativa
                    let datos = new FormData();
                    datos.append("accion", 6);
                    datos.append("id", 0);
                    datos.append("tipo_movimientos", $("#ddlTipo").val());
                    datos.append("tipo_movimiento",1);
                    datos.append("monto"  ,  $("#txt_Monto").val());
                    datos.append("concepto"  ,  $("#txt_Comentario").val());
                    $.ajax({
                        url: "ajax/movimiento_cajas.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                             mostrarAlertaRespuesta(respuesta, function() {
                                  $("#mdlGestionarCaja").modal('hide');
              table_categorias.ajax.reload();
              LimpiarMoviemiento();
                 $btnCajaGuardar.prop('disabled', false);
            
            }, {
              mensajeExito: "éxito",
              mensajeAdvertencia: "Warning",
              mensajeError: "Excepción"
            });
             $btnCajaGuardar.prop('disabled', false);
              },
          error: manejarErrorAjax
          });
                }
            })
 });

 function LimpiarMoviemiento() {
                    $("#ddlTipo").val("");
                    $("#selopciones").val("");
                    $("#txt_Monto").val("");
                    $("#txt_Comentario").val("");
                    $(".needs-validation").removeClass("was-validated");
    
 }

 
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
                $("#btnIniciarVentaContado").prop('disabled', true);
                $("#btnVentaCredit").prop('disabled', true);
                $("#btnSalidadaDinero").prop('disabled', true);
                $("#btnEntradaDinero").prop('disabled', true);
                $("#btnRegistrarCliente").prop("disabled", true);
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

   </script>