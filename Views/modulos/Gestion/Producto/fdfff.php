<br>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Estilos para la imagen dentro del tooltip */
.tooltip-large-img {
    max-width: 200px; /* O el tamaño que desees para la imagen grande */
    height: auto;
    display: block; /* Para centrar si es necesario o manejar el flujo */
    margin: 0; /* Asegurarse de que no haya margen */
    padding: 0; /* Asegurarse de que no haya padding */
    border: none; /* ¡Importante para quitar cualquier borde de la imagen! */
}

/* Estilos para el contenedor del tooltip en sí */
.tooltip-inner {
    background-color: transparent !important; /* Fondo transparente */
    border: none !important; /* Sin borde en el tooltip */
    padding: 0 !important; /* Quitar padding interno del tooltip */
    box-shadow: none !important; /* Quitar cualquier sombra si no la quieres */
}

/* Para que la flecha del tooltip también sea transparente o se integre mejor */
.tooltip .tooltip-arrow::before {
    border-color: transparent !important;
}

/* Si usas Bootstrap 5, la clase puede ser diferente, como .tooltip-inner */
/* Ajusta si ves que los estilos no se aplican, inspecciona el elemento en el navegador */

    /********************************************************************************************************* */
    /* Stepper Styles */
    .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        /* Align items to the start to make titles align at top */
        position: relative;
        padding: 0 5%;
        /* Adjusted padding for better spacing within modal */
        margin-bottom: 2rem;
        flex-wrap: wrap;
        /* Allow wrapping on smaller screens */
    }

    .stepper-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
        flex-grow: 1;
        cursor: pointer;
        text-decoration: none;
        /* Remove default link underline */
        color: inherit;
        /* Inherit color */
        min-width: 120px;
        /* Minimum width for each item to prevent squishing */
        margin-bottom: 1rem;
        /* Space between wrapped items */
    }

    .stepper-icon-container {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        /* Circle shape */
        background-color: #e9ecef;
        font-size: 1.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        border: 2px solid #e9ecef;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        /* Subtle shadow for icons */
    }

    .stepper-icon {
        color: #6c757d;
    }

    .stepper-label {
        text-align: center;
        font-size: 0.9rem;
        /* Smaller label for modal context */
        color: #495057;
        margin-top: 10px;
        font-weight: 500;
        line-height: 1.2;
    }

    .stepper-sublabel {
        font-size: 0.75rem;
        /* Even smaller sublabel */
        color: #adb5bd;
        font-weight: 400;
    }

    .stepper-item.active .stepper-icon-container {
        background-color: #6f42c1;
        /* Purple */
        border-color: #6f42c1;
        box-shadow: 0 4px 10px rgba(111, 66, 193, 0.3);
    }

    .stepper-item.active .stepper-icon {
        color: white;
    }

    .stepper-item.active .stepper-label {
        color: #6f42c1;
        font-weight: 600;
    }

    .stepper-item.active .stepper-sublabel {
        color: #6f42c1;
    }

    .stepper-line {
        position: absolute;
        width: calc(100% - 10%);
        /* Adjust to fit between icons */
        height: 2px;
        background-color: #dee2e6;
        top: 27px;
        /* Half of icon height + border */
        left: 5%;
        /* Start from padding edge */
        z-index: 0;
        transition: background-color 0.3s ease;
    }

    /* Specific line segments between icons */
    .stepper-line:nth-child(1) {
        left: calc(5% + 55px/2);
        width: calc((100% - 10%)/2 - 55px);
    }

    .stepper-line:nth-child(2) {
        left: calc(5% + 55px/2 + (100% - 10%)/2);
        width: calc((100% - 10%)/2 - 55px);
    }

    .stepper-item.completed .stepper-icon-container {
        background-color: #28a745;
        /* Green for completed */
        border-color: #28a745;
    }

    .stepper-item.completed .stepper-icon {
        color: white;
    }

    .stepper-item.completed .stepper-label,
    .stepper-item.completed .stepper-sublabel {
        color: #495057;
    }

    /* Line styling for completed segments */
    .stepper-item.completed+.stepper-line {
        background-color: #28a745;
        /* Green line */
    }

    .stepper-item:first-child.completed+.stepper-line {
        background-color: #28a745;
        /* Green line for the first segment if first is completed */
    }


    @media (max-width: 768px) {
        .stepper-wrapper {
            flex-direction: column;
            align-items: flex-start;
            padding: 0;
            margin-left: 1rem;
            /* Adjust for small screen alignment */
        }

        .stepper-item {
            flex-direction: row;
            align-items: center;
            margin-bottom: 15px;
            width: 100%;
            justify-content: flex-start;
        }

        .stepper-icon-container {
            margin-right: 15px;
        }

        .stepper-line {
            display: none;
            /* Hide horizontal lines on small screens */
        }

        .stepper-item+.stepper-item::before {
            /* Vertical line for small screens */
            content: '';
            position: absolute;
            left: 27px;
            /* Align with center of icon */
            top: -15px;
            /* Adjust to connect to previous item */
            height: calc(100% + 15px);
            /* Extend to connect */
            width: 2px;
            background-color: #dee2e6;
            z-index: 0;
        }

        .stepper-item.completed+.stepper-item::before {
            background-color: #28a745;
            /* Green vertical line for completed */
        }
    }


    /* Form Step Transition */
    .form-step {
        display: none;
        animation: fadeIn 0.5s ease-out;
    }

    .form-step.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Custom styling for form elements */
    .form-title {
        color: #343a40;
        font-weight: 600;
        font-size: 1.75rem;
    }

    .form-subtitle {
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px 18px;
        border: 1px solid #e0e0e0;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #8c72cf;
        box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.2);
        outline: none;
    }

    /* Input validation styling */
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.2);
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85em;
        margin-top: 0.5rem;
        display: none;
    }

    .form-control.is-invalid+.invalid-feedback {
        display: block;
    }

    .form-select.is-invalid+.invalid-feedback {
        display: block;
    }

    /* Buttons */
    .btn {
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #6f42c1;
        border-color: #6f42c1;
    }

    .btn-primary:hover {
        background-color: #5a36a3;
        border-color: #5a36a3;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(111, 66, 193, 0.3);
    }

    .btn-outline-secondary {
        border-color: #ced4da;
        color: #6c757d;
        background-color: white;
    }

    .btn-outline-secondary:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #495057;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(108, 117, 125, 0.1);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
    }

    /* Logo upload styles */
    .logo-upload-container {
        width: 100%;
        max-width: 350px;
        height: 250px;
        /* Keep original height for product image */
        border-radius: 15px;
        /* Slightly rounded corners for product image */
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.2rem;
        color: #6c757d;
        border: 2px dashed #ced4da;
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .logo-upload-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        /* Use contain for product image */
        display: block;
        /* Always show image placeholder */
    }

    .logo-upload-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        padding: 10px;
        font-size: 0.9rem;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 5px;
    }

    .logo-upload-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 2;
    }

    .logo-upload-container:hover .logo-upload-overlay {
        opacity: 1;
    }

   
    /************************************************************************************* */
    
</style>
<link rel="stylesheet" href="/WebPuntoVenta2025/Views/modulos/Gestion/Producto/css/producto.css">
<link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
<script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
<div class="content">
    <div class="container-fluid">
        <!-- row para criterios de busqueda -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark  ">
                    <div class="card-header">
                        <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool text-danger" id="btnLimpiarBusqueda">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="d-none d-md-flex col-md-12 ">
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptCodigoBarras_cades" class="form-control"
                                        data-index="2"> <!-- ./ por el campo de la bses de daros -->
                                    <label for="iptCodigoBarras_cades">Código de Barras</label>
                                </div>
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptCategoria" class="form-control" data-index="4">
                                    <label for="iptCategoria">Categoría</label>
                                </div>
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptProducto" class="form-control" data-index="5">
                                    <label for="iptProducto">Producto</label>
                                </div>
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptPrecioVentaDesde" class="form-control">
                                    <label for="iptPrecioVentaDesde">P. Venta Desde</label>
                                </div>
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptPrecioVentaHasta" class="form-control">
                                    <label for="iptPrecioVentaHasta">P. Venta Hasta</label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
        </div>
        <br>
        <!-- row para listado de productos/inventario -->
        <div class="row">
            <div class="col-lg-12">
                <table id="tbl_productos" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                    <thead class="bg-dark   ">
                        <tr style="font-size: 15px;">
                            <th></th>
                            <th>id</th>
                            <th>Codigo</th>
                            <th>Id Categoria</th>
                            <th>Categoría</th>
                            <th>Id Marca</th>
                            <th>Marca</th>
                            <th>Producto</th>
                            <th>id unidades</th>
                            <th>unidades medidas</th>
                            <th>P. Compra</th>
                            <th>P. Venta </th>
                            <th>P. Por Mayor </th>
                            <th>P. Especial</th>
                            <th>Iva</th>
                            <th>Perecedero</th>
                            <th>Stock</th>
                            <th>Min. Stock</th>
                            <th>costo_total_producto</th>
                            <th>Fecha Creación</th>
                            <th>Fecha Actualización</th>
                            <th>Img</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-small">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarCategorias" tabindex="-1" aria-labelledby="mdlGestionarCategoriasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarCategoriasLabel">
                    <i class="fas fa-layer-group fa-lg"></i> Agregar Categoría
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body px-4 py-4 bg-light-subtle">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body px-4 py-4">
                        <form class="needs-validation" novalidate>
                            <input type="hidden" id="idCategoria" name="categoria" value="0">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-modern" id="txtCategoria"
                                    name="txtCategoria" maxlength="50" minlength="4" placeholder="Ej. Electrónica"
                                    autocomplete="off">
                                <label for="txtCategoria">Categoría <span class="text-danger"></span></label>
                                <div class="invalid-feedback">Debe ingresar el nombre de la categoría.</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistroCategorias">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardarCategorias">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarMarca" tabindex="-1" aria-labelledby="mdlGestionarMarcaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarCategoriasLabel">
                    <i class="fas fa-layer-group fa-lg"></i> Agregar Marca
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body px-4 py-4 bg-light-subtle">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body px-4 py-4">
                        <form class="needs-validation" novalidate>
                            <input type="hidden" id="idMarca" name="marca" value="">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-modern" id="txtMarca"
                                    name="txtMarca" maxlength="50" minlength="5" placeholder="Ej. Dell"
                                    autocomplete="off">
                                <label for="txtMarca">Marca <span class="text-danger"></span></label>
                                <div class="invalid-feedback">Debe ingresar el nombre de la Marca.</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistroMarca">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardarMarca">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarMedidas" tabindex="-1" aria-labelledby="mdlGestionarMedidasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarMedidasLabel">
                    <i class="fas fa-ruler-combined fa-lg"></i> Agregar Medidas
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body bg-light-subtle px-4 py-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body px-4 py-4">
                        <form class="needs-validation" novalidate>
                            <input type="hidden" id="idMedidas" name="medidas" value="0">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-modern" id="txtMedidas"
                                    name="txtMedidas" maxlength="50" minlength="2" placeholder="Ej. Unidad"
                                    autocomplete="off">
                                <label for="txtMedidas">Medidas <span class="text-danger"></span></label>
                                <div class="invalid-feedback">Debe ingresar el nombre de la Medida.</div>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-modern" id="txtNombreCorto"
                                    name="txtNombreCorto" maxlength="20" minlength="2" placeholder="Ej. Und"
                                    autocomplete="off">
                                <label for="txtNombreCorto">Nombre Corto <span class="text-danger"></span></label>
                                <div class="invalid-feedback">Debe ingresar el Nombre Corto.</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistroUnidadMedida">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardarUnidaMedida">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarStock" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title" id="stockModalLabel"><i class="bi bi-box-seam me-2"></i> Gestión de Stock</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="idProducto_stock" name="producto" value="0">
                 <input type="hidden" id="iptPrecioCosto" name="iptPrecioCosto" value="0">
                
                <input type="hidden" id="percedero" name="percedero" value="0">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Código:</strong> <span id="stock_codigoProducto" class="d-block text-muted"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Producto:</strong> <span id="nombre_producto" class="d-block text-muted"></span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Stock Actual:</strong> <span id="stock_Stock" class="d-block text-primary fs-5 fw-bold"></span>
                    </div>
                </div>
                <hr class="my-4">
                <form id="stockForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="selTipoOperacion" class="form-label">Tipo de Acción:</label>
                            <select class="form-select form-select-lg shadow-sm" id="selTipoOperacion" required>
                                <option value="">Seleccione una acción</option>
                                <option value="COMPRA">COMPRA</option>
                                <option value="PROMOCION">PROMOCION</option>
                            </select>
                        </div>
                        <div class="col-md-6" id="fechaVencimientoContainer">
                            <label for="iptFechaVencimientoAun" class="form-label">Fecha Vencimiento:</label>
                            <input type="date" class="form-control form-control-lg shadow-sm" id="iptFechaVencimientoAun" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="iptPrecioCompra" class="form-label">Precio Compra:</label>
                            <input type="number" class="form-control form-control-lg shadow-sm" id="iptPrecioCompra" min="0.01" step="0.01" value="0.00" required>
                        </div>
                        <div class="col-md-6 d-none" id="contenedorLotes">
                            <label for="selectLote" class="form-label">Seleccionar lote:</label>
                            <select id="selectLote" class="form-select form-select-lg shadow-sm">
                                <option value="">Seleccione un lote</option>
                                <!-- Se llenará dinámicamente -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="iptCantidad" class="form-label">Cantidad a Guardar:</label>
                            <input type="number" class="form-control form-control-lg shadow-sm" id="iptCantidad" min="1" value="1" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="iptComentario" class="form-label">Observación:</label>
                        <textarea class="form-control shadow-sm" id="iptComentario" rows="3" placeholder="Ej: Ingreso por nueva mercadería, Salida por venta..."></textarea>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Nuevo Stock: <span id="stock_NuevoStock" class="badge bg-success fs-4 px-3 py-2 rounded-pill fw-bold">0</span></h5>
                        <button type="button" id="btnGuardarNuevorStock" class="btn btn-success btn-lg mt-3 mt-md-0"><i class="bi bi-check-circle me-2"></i> Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlGestionarProducto" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-ancho-personalizad">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarProductoLabel">Agregar Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="modal-body p-4 overflow-auto" style="max-height: calc(100vh - 180px);">
                <div class="stepper-wrapper mb-5">
                    <a class="stepper-item active" data-step="1">
                        <div class="stepper-icon-container">
                            <i class="fas fa-box-open stepper-icon"></i> 
                        </div>
                        <div class="stepper-label text-center">Detalles <br> <span class="stepper-sublabel">del Producto</span></div>
                    </a>
                    <div class="stepper-line"></div>
                    <a class="stepper-item" data-step="2">
                        <div class="stepper-icon-container">
                            <i class="fas fa-dollar-sign stepper-icon"></i> </div>
                        <div class="stepper-label text-center">Precios <br> <span class="stepper-sublabel">y Stock</span></div>
                    </a>
                    <div class="stepper-line"></div>
                    <a class="stepper-item" data-step="3">
                        <div class="stepper-icon-container">
                            <i class="fas fa-cogs stepper-icon"></i> </div>
                        <div class="stepper-label text-center">Opciones <br> <span class="stepper-sublabel">Adicionales</span></div>
                    </a>
                </div>

                <form id="productForm" class="needs-validation" novalidate>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column align-items-center">
                                <label for="logo-upload" class="logo-upload-container mb-3" id="product-image-upload-area">
                                    <img id="logo-preview" src="https://placehold.co/350x250/e9ecef/6c757d?text=No+Image" alt="Vista previa de la imagen">
                                    <span id="logo-placeholder-text" class="logo-upload-text">Subir Imagen</span>
                                    <div class="logo-upload-overlay">
                                        <i class="fas fa-camera fa-2x mb-2"></i>
                                        <span>Cambiar Imagen</span>
                                    </div>
                                    <input type="file" id="logo-upload" name="logo_file" accept="image/*" class="d-none" onchange="previewFile(event)">
                                </label>
                                <input type="hidden" id="idProducto" name="idProducto" value="0">
                                <input type="hidden" id="logo_url" name="logo_url">
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-step active" data-step="1">
                                <h4 class="mb-3 form-title">Información General</h4>
                                <p class="form-subtitle">Detalles básicos del producto.</p>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="iptCodigoReg" class="form-label small">Código</label>
                                                <input type="text" class="form-control form-control-sm" id="iptCodigoReg" name="iptCodigoReg" maxlength="13" minlength="3" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off">
                                                <div class="invalid-feedback">Debe ingresar el código de barras (mín. 3, máx. 13 dígitos).</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selMedidasReg" class="form-label small">Unidad de Medida</label>
                                                <select class="form-select form-select-sm" id="selMedidasReg" name="selMedidasReg" required>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la unidad de medida.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selMarcaReg" class="form-label small">Marca</label>
                                                <select class="form-select form-select-sm" id="selMarcaReg" name="selMarcaReg" required>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la Marca.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selCategoriaReg" class="form-label small">Categoría</label>
                                                <select class="form-select form-select-sm" id="selCategoriaReg" name="selCategoriaReg" required>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la Categoría.</div>
                                            </div>
                                            <div class="col-12">
                                                <label for="iptDescripcionReg" class="form-label small">Descripción</label>
                                                <textarea class="form-control form-control-sm" id="iptDescripcionReg" name="iptDescripcionReg" rows="2" maxlength="15" required></textarea>
                                                <div class="invalid-feedback">Debe ingresar la Descripción del producto (máximo 100 caracteres).</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>

                            <div class="form-step" data-step="2">
                                <h4 class="mb-3 form-title">Configuración de Precios e Inventario</h4>
                                <p class="form-subtitle">Define los costos y precios de venta.</p>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="iptPrecioCompraReg" class="form-label small">Costo</label>
                                                <input type="number" min="0" step="0.01" class="form-control form-control-sm" id="iptPrecioCompraReg" name="iptPrecioCompraReg" placeholder="0.00" required>
                                                <div class="invalid-feedback">Debe ingresar el precio del Costo.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="iptPrecioVentaReg" class="form-label small">Precio de venta</label>
                                                <input type="number" min="0" step="0.01" class="form-control form-control-sm" id="iptPrecioVentaReg" name="iptPrecioVentaReg" placeholder="0.00" required>
                                                <div class="invalid-feedback">Debe ingresar el precio de venta.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="iptStockReg" class="form-label small">Stock Actual</label>
                                                <input type="number" min="0" class="form-control form-control-sm" id="iptStockReg" name="iptStockReg" required>
                                                <div class="invalid-feedback">Debe ingresar el stock.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="iptMinimoStockReg" class="form-label small">Stock Mínimo de Alerta</label>
                                                <input type="number" min="0" class="form-control form-control-sm" id="iptMinimoStockReg" name="iptMinimoStockReg" required>
                                                <div class="invalid-feedback">Debe ingresar el stock Mínimo.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="iptPrecio1" class="form-label small">Precio por Mayor</label>
                                                <input type="number" min="0.00" step="0.01" class="form-control form-control-sm" id="iptPrecio1" name="iptPrecio1" placeholder="0.00" required>
                                                <div class="invalid-feedback">Debe ingresar el Precio por Mayor.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="iptPrecio2" class="form-label small">Precio Especial</label>
                                                <input type="number" min="0.00" step="0.01" class="form-control form-control-sm" id="iptPrecio2" name="iptPrecio2" placeholder="0.00" required>
                                                <div class="invalid-feedback">Debe ingresar el Precio Especial.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                                    <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>

                            <div class="form-step" data-step="3">
                                <h4 class="mb-3 form-title">Ajustes Adicionales</h4>
                                <p class="form-subtitle">Configura opciones extra para el producto.</p>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" id="chkIva" name="chkIva">
                                                    <label class="form-check-label small" for="chkIva">APLICAR IVA</label>
                                                </div>
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" id="chkPerecedero" name="chkPerecedero">
                                                    <label class="form-check-label small" for="chkPerecedero">PRODUCTO PERECEDERO</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="contFechaVencimiento" style="display: none;">
                                                <label for="iptFechaVencimiento" class="form-label small">Fecha de Vencimiento <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control form-control-sm" id="iptFechaVencimiento" name="iptFechaVencimiento">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                                    <button type="submit" class="btn btn-success">Guardar Datos <i class="fas fa-save ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modalImage" class="img-fluid" alt="Producto Imagen">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNuevaFechaVencimiento" tabindex="-1" role="dialog" aria-labelledby="modalNuevaFechaVencimientoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevaFechaVencimientoLabel">Ingresar Nueva Fecha de Vencimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="iptNuevaFechaVencimiento">Fecha de Vencimiento:</label>
                    <input type="date" class="form-control" id="iptNuevaFechaVencimiento">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmarNuevaFecha">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var accion;
    var table_producto;
    var operacion_stock = 0;
    var BaderaPerceddero = 0;
    // Wrap the entire script in an IIFE to create a new scope
    (function() {
        // Declaración de variables del formulario y stepper
        var currentStep = 1;
        const formSteps = document.querySelectorAll('.form-step');
        const stepperItems = document.querySelectorAll('.stepper-item');
        const productForm = document.getElementById('productForm');
        const chkPerecedero = document.getElementById('chkPerecedero');
        const contFechaVencimiento = document.getElementById('contFechaVencimiento');
        const iptFechaVencimiento = document.getElementById('iptFechaVencimiento');

        // Función para actualizar la visibilidad de los pasos
        function updateFormSteps() {
            formSteps.forEach(step => step.classList.remove('active'));
            if (formSteps[currentStep - 1]) {
                formSteps[currentStep - 1].classList.add('active');
            }

            stepperItems.forEach((item, index) => {
                item.classList.remove('active', 'completed');
                if (index + 1 === currentStep) {
                    item.classList.add('active');
                } else if (index + 1 < currentStep) {
                    item.classList.add('completed');
                }
            });
        }

        // Función para validar los campos requeridos del paso actual
        function validateCurrentStep() {
            const currentFormStep = formSteps[currentStep - 1];
            const requiredInputs = currentFormStep.querySelectorAll('input[required]:not([type="hidden"]), select[required], textarea[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (input.offsetWidth > 0 || input.offsetHeight > 0) {
                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                }
            });

            if (currentStep === 3 && chkPerecedero.checked) {
                if (iptFechaVencimiento.value === '') {
                    iptFechaVencimiento.classList.add('is-invalid');
                    isValid = false;
                } else {
                    iptFechaVencimiento.classList.remove('is-invalid');
                }
            }
            return isValid;
        }

        // --- MANEJADORES DE EVENTOS DE NAVEGACIÓN ---
        productForm.addEventListener('click', (event) => {
            if (event.target.classList.contains('next-step')) {
                if (validateCurrentStep()) {
                    if (currentStep < formSteps.length) {
                        currentStep++;
                        updateFormSteps();
                    }
                }
            } else if (event.target.classList.contains('prev-step')) {
                // Limpia errores al retroceder
                const currentFormStepElement = formSteps[currentStep - 1];
                currentFormStepElement.querySelectorAll('.is-invalid').forEach(input => {
                    input.classList.remove('is-invalid');
                });
                if (currentStep > 1) {
                    currentStep--;
                    updateFormSteps();
                }
            }
        });

        // --- LÓGICA DEL FORMULARIO Y SUS CAMPOS ---
        chkPerecedero.addEventListener('change', function() {
            if (this.checked) {
                contFechaVencimiento.style.display = 'block';
                iptFechaVencimiento.setAttribute('required', 'true');
            } else {
                contFechaVencimiento.style.display = 'none';
                iptFechaVencimiento.removeAttribute('required');
                iptFechaVencimiento.classList.remove('is-invalid');
                iptFechaVencimiento.value = '';
            }
        });

        window.previewFile = function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = reader.result;
                output.style.display = 'block';
                placeholderText.style.display = 'none';
                // This line is a placeholder; in a real app, the actual URL would come from the server
                document.getElementById('logo_url').value = 'https://example.com/path/to/uploaded/company_logo.png';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            } else {
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = "https://placehold.co/96x96/e0e0e0/555555?text=Logo"; // Reset to default placeholder
                output.style.display = 'block';
                placeholderText.style.display = 'block';
                document.getElementById('logo_url').value = ''; // Clear the hidden URL
            }
        };
        // Envío final del formulario
        productForm.addEventListener('submit', async function(event) { // Añadimos 'async' aquí
            event.preventDefault();
            event.stopPropagation();

            if (validateCurrentStep()) {
                console.log('Formulario enviado (simulación)!');
                const datos = new FormData();
                // Obtén el ID del producto del campo oculto
                const id_producto = document.getElementById('idProducto').value;
                datos.append('idProducto', id_producto); // Envía el ID del producto al backend
                // Anexa todos los demás datos de los campos del formulario
                for (let [key, value] of new FormData(this).entries()) {
                    if (key !== 'idProducto' && key !== 'logo_url' && key !== 'logo_file') {
                        datos.append(key, value);
                    }
                }
                // --- Lógica para el manejo de la IMAGEN ---
                const logoFileInput = document.getElementById('logo-upload'); // Correcto: ID de tu input file
                // const existingLogoUrl = document.getElementById('logo_url'); // Campo oculto con la URL de la imagen actual
                const existingLogoUrl = document.getElementById('logo_url').value;
                // Verifica si se seleccionó una nueva imagen
                // Lógica para el logo:
                if (logoFileInput.files.length > 0) {
                    // Caso 1: El usuario seleccionó un nuevo archivo de logo
                    datos.append('logo_file', logoFileInput.files[0]);
                    // Opcional: Si quieres eliminar el logo anterior en el backend, puedes enviar su ruta aquí
                    // datos.append('old_logo_path', existingLogoUrl);
                } else {

                    datos.append('logo_path_current', existingLogoUrl); // Envía la URL actual que ya está en DB o es vacía
                }
                // 3. MANEJO EXPLÍCITO DE CHECKBOXES
                // Aseguramos que los checkboxes siempre envíen un valor (1 para marcado, 0 para desmarcado)
                datos.set('chkIva', document.getElementById('chkIva').checked ? '1' : '0');
                datos.set('chkPerecedero', document.getElementById('chkPerecedero').checked ? '1' : '0');
                datos.append("accion", 2); // Un nombre más descriptivo
                // --- Depuración de FormData (opcional, para ver lo que envías) ---
                console.log("Datos del FormData a enviar:");
                for (let [key, value] of datos.entries()) {
                    if (value instanceof File) {
                        console.log(`${key}: File (Name: ${value.name}, Type: ${value.type}, Size: ${value.size} bytes)`);
                    } else {
                        console.log(`${key}: ${value}`);
                    }
                }
                console.log("---------------------------------------");

                // --- Confirmación con SweetAlert2 ---
                const confirmacion = await Swal.fire({
                    title: '¿Está seguro de registrar el producto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo registrarlo',
                    cancelButtonText: 'Cancelar'
                });

                if (!confirmacion.isConfirmed) {
                    return; // Si el usuario cancela, no hacemos la llamada AJAX
                }

                // --- Llamada AJAX ---
                $.ajax({
                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json', // Esperamos una respuesta JSON
                    success: function(respuesta) {
                        // Asegúrate de que 'mostrarAlertaRespuesta' maneje bien el formato de la respuesta.
                        // Si tu backend devuelve un JSON, tal vez quieras pasar respuesta.mensaje o respuesta.status
                        if (typeof mostrarAlertaRespuesta === 'function') {
                            // Adaptar la respuesta al formato que espera mostrarAlertaRespuesta
                            let mensajeRespuesta = typeof respuesta.mensaje !== 'undefined' ? respuesta.mensaje : JSON.stringify(respuesta);
                            mostrarAlertaRespuesta(mensajeRespuesta, () => {
                                // Callback de éxito: recargar tabla y limpiar formulario
                                if (typeof table_producto !== 'undefined' && table_producto.ajax) {
                                    // table_producto.ajax.reload();
                                   
                                     table_producto.ajax.reload(() => {
                                        table_producto.columns.adjust().responsive.recalc();
                                       }, false);

                                }
                                if (typeof limpiar === 'function') {
                                    limpiar(); // Asegúrate de que esta función existe y resetea el formulario
                                }
                                // Cierra el modal solo después de que la alerta de éxito ha sido mostrada y el callback ejecutado
                                const modal = bootstrap.Modal.getInstance(document.getElementById('mdlGestionarProducto'));
                                if (modal) modal.hide();
                            }, {
                                mensajeExito: "éxito", // Estas opciones deben coincidir con lo que tu backend responde
                                mensajeAdvertencia: "Warning",
                                mensajeError: "Excepción"
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Si la respuesta no es JSON o hay un error de red/servidor
                        if (typeof manejarErrorAjax === 'function') {
                            manejarErrorAjax(jqXHR, textStatus, errorThrown);
                        } else {
                            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR);
                            Swal.fire("Error", "Ocurrió un error al procesar la solicitud. Por favor, intente de nuevo.", "error");
                        }
                    }
                });
            }
        });

        // =======================================================================
        // --- VALIDACIÓN EN TIEMPO REAL (CORREGIDO Y DEFINITIVO) ---
        // =======================================================================
        const handleFieldInteraction = (event) => {
            const field = event.target;
            if (field.classList.contains('is-invalid')) {
                if (field.checkValidity()) {
                    field.classList.remove('is-invalid');
                }
            }
        };

        const fieldsToValidate = productForm.querySelectorAll('input, textarea, select');
        fieldsToValidate.forEach(field => {
            // 'input' funciona genial para campos de texto.
            field.addEventListener('input', handleFieldInteraction);
            // 'change' es ESENCIAL para que los <select> y <input type="date"> se corrijan al instante.
            field.addEventListener('change', handleFieldInteraction);
        });

        // --- MANEJO DEL ESTADO DEL MODAL ---
        const gestionarProductoModal = document.getElementById('mdlGestionarProducto');
        gestionarProductoModal.addEventListener('show.bs.modal', function() {
            productForm.reset();
            currentStep = 1;
            updateFormSteps();

            productForm.classList.remove('was-validated');
            productForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

            document.getElementById('logo-preview').src = "https://placehold.co/350x250/e9ecef/6c757d?text=No+Image";
            document.getElementById('idProducto').value = '0';

            contFechaVencimiento.style.display = 'none';
            iptFechaVencimiento.removeAttribute('required');
        });

        // Inicialización al cargar la página
        updateFormSteps();
    })();

    $(document).ready(function() {

        $('#tbl_productos').on('click', '.product-image-wrapper', function() {
        const largeImg = $(this).data('large-img');
        const productName = $(this).data('product-name');
        $('#modalImage').attr('src', largeImg);
        $('#imageModalLabel').text(productName);
    });

        // --- GESTIÓN MEJORADA DEL FONDO (BACKDROP) DE LOS MODALES ---
        $(document).on('show.bs.modal', '.modal', function() {
            // Calcula un z-index más alto para el nuevo modal
            var zIndex = 1050 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);

            // Ajusta el z-index del fondo del nuevo modal para que esté justo debajo de él
            // El setTimeout asegura que Bootstrap ya haya creado el backdrop
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

        $(document).on('hidden.bs.modal', '.modal', function() {
            // Cuando un modal se oculta:
            // 1. Remueve la clase 'modal-stack' de su propio backdrop para que no interfiera si se reabre
            $(this).prev('.modal-backdrop').removeClass('modal-stack');

            // 2. Si todavía hay modales visibles:
            if ($('.modal:visible').length) {
                // a. Asegúrate de que la clase 'modal-open' esté en el body para evitar que la página principal sea interactiva
                $('body').addClass('modal-open');

                // b. Reajusta los z-index de los modales y backdrops que quedan visibles
                // Esto es crucial para asegurar que el modal que queda visible esté en la capa superior correcta
                $('.modal:visible').each(function(index) {
                    var currentZIndex = 1050 + (10 * index);
                    $(this).css('z-index', currentZIndex);
                    $(this).prev('.modal-backdrop').css('z-index', currentZIndex - 1);
                });
            } else {
                // Si no quedan modales visibles, asegúrate de que el body no tenga la clase 'modal-open'
                // Bootstrap debería hacer esto por sí mismo, pero es una seguridad.
                $('body').removeClass('modal-open');
            }
        });
        // --- FIN DE LA GESTIÓN MEJORADA DEL FONDO ---

        // Carga los datos iniciales para los selects
        cargarCamboMedidas();
        cargarCamboCategoria();
        cargarCamboMarca();
        cargarProducto(); // Esta función probablemente carga los datos de la tabla de productos

        // Event listener para la selección de "Agregar Nueva Categoría"
        $("#selCategoriaReg").on('select2:select', function(e) {
            var selectedValue = e.params.data.id;
            if (selectedValue === "nueva_categoria") {
                // Retrasa un poco el reset para que Select2 no interfiera
                setTimeout(function() {
                    $("#selCategoriaReg").val('').trigger('change');
                }, 1);
                $("#mdlGestionarCategorias").modal('show'); // Abre el modal de Categorías
            }
        });

        // Event listener para la selección de "Agregar Nueva Marca"
        $("#selMarcaReg").on('select2:select', function(e) {
            var selectedValue = e.params.data.id;
            if (selectedValue === "nueva_marca") {
                setTimeout(function() {
                    $("#selMarcaReg").val('').trigger('change');
                }, 1);
                $("#mdlGestionarMarca").modal('show'); // Abre el modal de Marcas
            }
        });

        // Event listener para la selección de "Agregar Nueva Unidad Medida"
        $("#selMedidasReg").on('select2:select', function(e) {
            var selectedValue = e.params.data.id;
            if (selectedValue === "nueva_medida") {
                setTimeout(function() {
                    $("#selMedidasReg").val('').trigger('change');
                }, 1);
                $("#mdlGestionarMedidas").modal('show'); // Abre el modal de Medidas
            }
        });
        /*===================================================================================================================*/
        // EVENTOS PARA CRITERIOS DE BUSQUEDA (CODIGO, CATEGORIA Y PRODUCTO)
        /*================================================================================================================*/
        $("#iptCodigoBarras_cades").keyup(function() {
            table_producto.column($(this).data('index')).search(this.value).draw(); // que cature su indices
        })

        $("#iptCategoria").keyup(function() {
            table_producto.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptProducto").keyup(function() {
            table_producto.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
            table_producto.draw();
        })

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                let precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
                let precioHasta = parseFloat($("#iptPrecioVentaHasta").val());
                let col_venta = parseFloat(data[7]);
                if ((isNaN(precioDesde) && isNaN(precioHasta)) ||
                    (isNaN(precioDesde) && col_venta <= precioHasta) ||
                    (precioDesde <= col_venta && isNaN(precioHasta)) ||
                    (precioDesde <= col_venta && col_venta <= precioHasta)) {
                    return true;
                }
                return false;
            }
        )
        $("#chkPerecedero").on("change", function() {
            if ($(this).is(":checked")) {
                $("#contFechaVencimiento").show();
                $('#iptFechaVencimiento').prop('required', true);
            } else {
                $("#contFechaVencimiento").hide();
                //  $("#iptFechaVencimiento").removeAttr("required");
                $('#iptFechaVencimiento').prop('required', false);

            }
        });

        // Al cargar, aplicar también
        if ($("#chkPerecedero").is(":checked")) {
            $("#contFechaVencimiento").show();
        }

        $("#iptCantidad").keyup(function() {
            let stockActual = parseFloat($("#stock_Stock").html());
            let cantidadAgregar = parseFloat($("#iptCantidad").val()); // lo que digito en el imput

            if (operacion_stock == 1) { // si es ingual a uno
                // si el imput no este vacio y que sea mayor a cero          
                if ($("#iptCantidad").val() != "" && $("#iptCantidad").val() > 0) {
                    $("#stock_NuevoStock").html(stockActual + cantidadAgregar);

                } else {
                    // 
                    Toast.fire({
                        icon: 'warning',
                        title: 'Ingrese un valor mayor a 0'
                    });
                    $("#iptCantidad").val("")
                    $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
                }

            } else {

                if ($("#iptCantidad").val() != "" && $("#iptCantidad").val() > 0) {


                    $("#stock_NuevoStock").html(stockActual - cantidadAgregar);

                    if (parseInt($("#stock_NuevoStock").html()) < 0) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'La cantidad a disminuir no puede ser mayor al stock actual (Nuevo stock < 0)'
                        });

                        $("#iptCantidad").val("");
                        $("#iptCantidad").focus();
                        $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));

                    }
                } else {

                    Toast.fire({
                        icon: 'warning',
                        title: 'Ingrese un valor mayor a 0'
                    });

                    $("#iptCantidad").val("")
                    $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
                }
            }
        });
     
       $('#tbl_productos tbody').on('click', '.btnEditarProducto', function() {
            accion = 2; //seteamos la accion para editar 
            $("#mdlGestionarProducto").modal('show');
            $(".needs-validation").removeClass("was-validated");
            let data = table_producto.row($(this).parents('tr')).data();
            console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data)
            $("#idProducto").val(data[1]);
            $("#iptCodigoReg").val(data[2]);
            cargarCamboCategoria(String(data[3]));
            $("#iptDescripcionReg").val(data[7]);
            cargarCamboMedidas(String(data[8]));
            cargarCamboMarca(String(data[5]));
             $("#iptMinimoStockReg").val(data[17]);
            $("#iptPrecioCompraReg").val(data[10]);
            $("#iptPrecioVentaReg").val(data[11]);
            $("#iptPrecio1").val(data[12]);
            $("#iptPrecio2").val(data[13]);
            let lleva_iva = (data[14]);
            let Perecedero = (data[15]);
            if (lleva_iva == 1) {
                $("#chkIva").prop("checked", true);

            } else {
                $("#chkIva").prop("checked", false);
            }
            if (Perecedero == 1) {
                $("#chkPerecedero").prop("checked", true);
                //   $("#contFechaVencimiento").show();
                // $('#iptFechaVencimiento').prop('', true);
                document.getElementById('iptFechaVencimiento').value = new Date().toISOString().split('T')[0];
            } else {
                //     $("#contFechaVencimiento").show();
                 $('#iptFechaVencimiento').prop('', true);
                $("#chkPerecedero").prop("checked", false);
                document.getElementById('iptFechaVencimiento').value = new Date().toISOString().split('T')[0];
            }
            $("#iptStockReg").val(data[16]);
            $("#iptStockReg").prop('disabled', true);
            // $("#iptMinimoStockReg").prop('disabled', true);
            $("#iptPrecioCompraReg").prop('disabled', true);
            $('#iptFechaVencimiento').prop('disabled', true);

            const logoPreview = document.getElementById('logo-preview');
            const logoPlaceholderText = document.getElementById('logo-placeholder-text');
            const imagenActualInput = document.getElementById('logo_url');
            const imgProductoValue = data[21]; // Asumo que el índice 21 es img_producto
            if (imgProductoValue && imgProductoValue !== "") {
                // const basePath = "vistas/img/productos/";
                // logoPreview.src = basePath + imgProductoValue;
                logoPreview.src =  imgProductoValue;
                logoPreview.style.display = 'block';
                logoPlaceholderText.style.display = 'none';
                imagenActualInput.value = imgProductoValue;
            } else {
                logoPreview.src = "https://placehold.co/350x250/e9ecef/6c757d?text=No+Image";
                logoPreview.style.display = 'block';
                logoPlaceholderText.style.display = 'block';
                imagenActualInput.value = '';
            }
            document.getElementById('logo-upload').value = '';

        });

        $('#tbl_productos tbody').on('click', '.btnEliminarProducto', function() {

            accion = 5; //seteamos la accion para editar    
            let data = table_producto.row($(this).parents('tr')).data();
            let id_producto = data[1];
            Swal.fire({
                title: 'Está seguro de eliminar el producto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    let datos = new FormData();
                    datos.append("accion", accion);
                    datos.append("id_producto", id_producto); //codigo_producto    
                    datos.append("activo", 0); //codigo_producto   
                    $.ajax({
                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            mostrarAlertaRespuesta(respuesta, () => {
                                table_proveedor.ajax.reload();

                            }, {
                                mensajeExito: 'éxito',
                                mensajeAdvertencia: 'Warning',
                                mensajeError: 'error'
                            });
                        },
                        error: manejarErrorAjax

                    });
                }
            })
        });

        $("#btnCancelarRegistroStock, #btnCerrarModalStock").on('click', function() {
            funcion_limpirar_stock();
        })

        $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier evento
            $("#validate_codigo").css("display", "none"); // es span de validadion para limpiar
            $("#validate_categoria").css("display", "none");
            $("#validate_descripcion").css("display", "none");
            $("#validate_precio_compra").css("display", "none");
            $("#validate_precio_venta").css("display", "none");
            $("#validate_stock").css("display", "none");
            $("#validate_min_stock").css("display", "none");
            $("#idProducto").val("0");
            $("#iptCodigoReg").val(""); // limpiar los ipunt 
            $("#selCategoriaReg").val("");
            $("#iptDescripcionReg").val("");
            $("#iptPrecioCompraReg").val("");
            $("#iptPrecioVentaReg").val("");
            $("#iptUtilidadReg").val("");
            $("#iptStockReg").val("");
            $("#iptMinimoStockReg").val("");
            $("#iptPrecio1").val("");
            $("#iptPrecio2").val("");
            $("#selMedidasReg").val("");
            $("#selMarcaReg").val("");
        });

        $('#tbl_productos tbody').on('click', '.btnAumentarStock', function() {
            funcion_limpiar_stock();
            operacion_stock = 1; // sumar stock
            accion = 3;
            cargarOpcionesTipoOperacion(operacion_stock); // solo COMPRA y PROMOCION
            $("#mdlGestionarStock").modal('show');
            $("#titulo_che").html('Costo Cero');
            $("#titulo_modal_stock").html('Aumentar Stock');
            $("#titulo_modal_label").html('Agregar al Stock');
            $("#iptCantidad").attr("placeholder", "Ingrese cantidad a agregar al Stock");
            let datos = table_producto.row($(this).parents('tr')).data();
            let perecedero = datos[15];
            if (perecedero == 1) {
                $("#iptFechaVencimientoAun").prop("disabled", false);
            } else {
                $("#iptFechaVencimientoAun").prop("disabled", true).val("");
            }

            $("#idProducto_stock").val(datos[1]);
            $("#stock_codigoProducto").html(datos[2]);
            $("#nombre_producto").html(datos[7]);
            $("#stock_Stock").html(datos[16]);
            $("#iptPrecioCompra").val(datos[10]);
            $("#percedero").val(datos[15]);
            $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
            $("#iptPrecioCompra").prop("disabled", false);
            $("#iptPrecioCompra").parent().removeClass("d-none");
            $("#iptFechaVencimientoAun").parent().removeClass("d-none");
            $("#contenedorLotes").addClass("d-none");
        });

        $('#tbl_productos tbody').on('click', '.btnDisminuirStock', function() {
            funcion_limpiar_stock();
            operacion_stock = 2; // restar stock
            accion = 3;
            cargarOpcionesTipoOperacion(operacion_stock); // solo PERDIDA, DEVOLUCION, CAMBIO
            $("#mdlGestionarStock").modal('show');
            $("#iptPrecioCosto").val(datos[10]);
            $("#titulo_che").html('Costo Cero');
            $("#titulo_modal_stock").html('Disminuir Stock');
            $("#titulo_modal_label").html('Disminuir al Stock');
            $("#iptCantidad").attr("placeholder", "Ingrese cantidad a disminuir al Stock");
            let datos = table_producto.row($(this).parents('tr')).data();
            let perecedero = datos[15];
            BaderaPerceddero = perecedero;
            if (perecedero == 1) {
                $("#iptPrecioCompra").parent().removeClass("d-none");
                $("#iptFechaVencimientoAun").prop("disabled", false);
                $("#iptPrecioCompra").prop("disabled", true);
                $("#contenedorLotes").addClass("d-none");
            } else {
                // $("#iptPrecioCompra").prop("disabled", false);
                $("#iptPrecioCompra").parent().addClass("d-none");
                $("#contenedorLotes").removeClass("d-none");
                $("#iptFechaVencimientoAun").prop("disabled", true).val("");

            }

            $("#idProducto_stock").val(datos[1]);
            $("#stock_codigoProducto").html(datos[2]);
            $("#nombre_producto").html(datos[7]);
            $("#stock_Stock").html(datos[16]);
            
            $("#percedero").val(datos[15]);
            $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
        });

        // Cambiar comportamiento según tipo de acción
        $('#selTipoOperacion').on('change', function() {
            let tipo = $(this).val();
            if (operacion_stock === 2) { // solo si se está disminuyendo
                if (tipo === "PERDIDA") {
                    $("#iptPrecioCompra").parent().addClass("d-none");
                    $("#iptFechaVencimientoAun").prop("disabled", true);
                    //   $("#iptFechaVencimientoAun").parent().addClass("d-none");
                    $("#contenedorLotes").removeClass("d-none");
                    let idProducto = $("#idProducto_stock").val();
                    cargarLotesProducto(idProducto);
                } else if (tipo === "DEVOLUCION") {
                    if (BaderaPerceddero === '1') {
                        // Mostrar el campo de precio
                        $("#iptPrecioCompra").parent().removeClass("d-none");
                        $("#iptFechaVencimientoAun").prop("disabled", false);
                        //   $("#iptPrecioCompra").parent().addClass("d-none");
                        $("#iptPrecioCompra").prop("disabled", true);
                        $("#contenedorLotes").addClass("d-none");
                        //   $("#iptFechaVencimientoAun").parent().removeClass("d-none");
                    } else if (BaderaPerceddero === '0') {
                        cargarLotesProducto(idProducto);
                        $("#iptFechaVencimientoAun").prop("disabled", true);
                        $("#iptPrecioCompra").parent().addClass("d-none");
                        // $("#iptPrecioCompra").parent().removeClass("d-none");
                        $("#contenedorLotes").removeClass("d-none");
                    }
                } else {
                    // Por defecto, mostrar precio y fecha, ocultar combo
                    $("#iptPrecioCompra").parent().removeClass("d-none");
                    $("#iptFechaVencimientoAun").parent().removeClass("d-none");
                    $("#contenedorLotes").addClass("d-none");
                }
            } else if (operacion_stock === 1) { 
                      if (tipo === "COMPRA") {
$("#iptPrecioCompra").prop("disabled", false);
                       } else if  (tipo === "PROMOCION") {
$("#iptPrecioCompra").prop("disabled", true);
                                 }

                 }
        });

        // $("#btnGuardarNuevorStock").on('click', function() {
        //     const cantidad = parseFloat($("#iptCantidad").val());
        //     const comentario = $("#iptComentario").val().trim();
        //     const percedero = $("#percedero").val();
        //     const tipoOperacion = $("#selTipoOperacion").val();
        //     const nuevoStock = parseFloat($("#stock_NuevoStock").html());
        //     const idProducto = $("#idProducto_stock").val();
        //     const codigoProducto = $("#stock_codigoProducto").html();
        //     let fechaVencimiento = "";
        //     let precioCompra = 0;
        //     function obtenerPrecioDesdeCombo() {
        //         const combo = document.getElementById('selectLote');
        //         const texto = combo.options[combo.selectedIndex].text;
        //         const precioTexto = texto.split('$')[1]; // "12.50"
        //         return parseFloat(precioTexto);
        //     }

        //     // === Lógica de negocio según operación ===
        //     if (operacion_stock === 1) {
        //         precioCompra = parseFloat($("#iptPrecioCompra").val());
        //         fechaVencimiento = $("#iptFechaVencimientoAun").val();
        //     } else if (operacion_stock === 2) {
        //         if (tipoOperacion === "PERDIDA") {
        //             precioCompra = obtenerPrecioDesdeCombo();
        //             fechaVencimiento = "";
        //             console.log('PERDIDA:', {
        //                 precioCompra,
        //                 fechaVencimiento
        //             });

        //         } else if (tipoOperacion === "DEVOLUCION") {
        //             if (percedero === "1") {
        //                 precioCompra = "";
        //                 fechaVencimiento = $("#iptFechaVencimientoAun").val();
        //             } else {
        //                 precioCompra = obtenerPrecioDesdeCombo();
        //                 fechaVencimiento = "";
        //             }
        //             console.log('DEVOLUCION:', {
        //                 percedero,
        //                 precioCompra,
        //                 fechaVencimiento
        //             });
        //         }
        //     }

        //     // === Validaciones ===
        //     if (!cantidad || cantidad <= 0 || comentario === "") {
        //         Toast.fire({
        //             icon: 'warning',
        //             title: 'Debe ingresar una cantidad válida y un comentario'
        //         });
        //         return;
        //     }
        //     // === Preparar datos para enviar ===
        //     const datos = new FormData();
        //     datos.append('accion', accion);
        //     datos.append('id_producto', idProducto);
        //     datos.append('codigo_producto', codigoProducto);
        //     datos.append('tipo_movimiento', operacion_stock);
        //     datos.append('comentario', comentario);
        //     datos.append('nuevo_stock', nuevoStock);
        //     datos.append('cantidad', cantidad);
        //     datos.append('precio_compra', precioCompra);
        //     datos.append('tipo_operacion', tipoOperacion);
        //     datos.append('fechaVencimientoAun', fechaVencimiento);
        //     // === Enviar por AJAX ===
        //     $.ajax({
        //         url: "ajax/productos.ajax.php",
        //         method: "POST",
        //         data: datos,
        //         processData: false,
        //         contentType: false,
        //         dataType: 'json',
        //         success: function(respuesta) {
        //             mostrarAlertaRespuesta(respuesta, function() {
        //                 table_producto.ajax.reload();
        //                 funcion_limpiar_stock();
        //                 $("#mdlGestionarStock").modal('hide');
        //             }, {
        //                 mensajeExito: "éxito",
        //                 mensajeAdvertencia: "Warning",
        //                 mensajeError: "Excepción"
        //             });
        //         },
        //         error: manejarErrorAjax
        //     });
        // });

        $("#btnGuardarNuevorStock").on('click', function() {
    // 1. Obtención de valores iniciales
    const cantidad = parseFloat($("#iptCantidad").val());
    const comentario = $("#iptComentario").val().trim();
    const percedero = $("#percedero").val(); // Asegúrate de que este valor sea "1" o "0" (string)
    const tipoOperacion = $("#selTipoOperacion").val();
    const nuevoStock = parseFloat($("#stock_NuevoStock").html());
    const idProducto = $("#idProducto_stock").val();
    const codigoProducto = $("#stock_codigoProducto").html();
    const precioCosto =$("#iptPrecioCosto").val();
    let fechaVencimiento = ""; 
    let precioCompra = 0; // Se inicializa para ser asignado más adelante
    let nuevafechaVencimiento="";
    // Función auxiliar para obtener el precio de compra del combo
    function obtenerPrecioDesdeCombo() {
        const combo = document.getElementById('selectLote');
        // Asegúrate de que el combo y su selección existan para evitar errores
        if (combo && combo.selectedIndex !== -1) {
            const texto = combo.options[combo.selectedIndex].text;
            const match = texto.split('$')[1]; // Intenta obtener el valor después del '$'
            return parseFloat(match) || 0; // Convierte a float, si no es válido, retorna 0
        }
        return 0; // Retorna 0 si el combo no está disponible o no hay selección
    }

    // 2. Validaciones iniciales
    if (!cantidad || cantidad <= 0 || comentario === "") {
        Toast.fire({
            icon: 'warning',
            title: 'Debe ingresar una cantidad válida y un comentario'
        });
        return; // Detiene la ejecución si las validaciones fallan
    }

    // 3. Función para enviar los datos por AJAX (centralizada)
    // Se define aquí para poder llamarla después de obtener la fecha del modal
    function enviarDatosStock() {
        const datos = new FormData();
        datos.append('accion', accion); // 'accion' debe estar definida en tu scope global o superior
        datos.append('id_producto', idProducto);
        datos.append('codigo_producto', codigoProducto);
        datos.append('tipo_movimiento', operacion_stock); // 'operacion_stock' debe estar definida
        datos.append('comentario', comentario);
        datos.append('nuevo_stock', nuevoStock);
        datos.append('cantidad', cantidad);
        datos.append('precio_compra', precioCompra); // El precio de compra final
        datos.append('tipo_operacion', tipoOperacion);
        datos.append('fechaVencimientoAun', fechaVencimiento); // La fecha de vencimiento final
        datos.append('nuevaFechaVencimientoAun', nuevafechaVencimiento); // La fecha de vencimiento final
        datos.append('precioCosto',precioCosto);
        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(respuesta) {
                // Asume que 'mostrarAlertaRespuesta', 'table_producto' y 'funcion_limpiar_stock' están definidas
                mostrarAlertaRespuesta(respuesta, function() {
                    table_producto.ajax.reload();
                    funcion_limpiar_stock();
                    $("#mdlGestionarStock").modal('hide'); // Cierra el modal principal de gestión de stock
                }, {
                    mensajeExito: "éxito",
                    mensajeAdvertencia: "Warning",
                    mensajeError: "Excepción"
                });
            },
            error: manejarErrorAjax // Asume que 'manejarErrorAjax' está definida
        });
    }

    // 4. Lógica de negocio según el tipo de operación
    if (operacion_stock === 1) { // Ejemplo: "Entrada" o "Adición"
        precioCompra = parseFloat($("#iptPrecioCompra").val());
        fechaVencimiento = $("#iptFechaVencimientoAun").val();
        enviarDatosStock(); // Envía los datos directamente
    } else if (operacion_stock === 2) { // Ejemplo: "Salida" o "Ajuste"
        if (tipoOperacion === "PERDIDA") {
            precioCompra = obtenerPrecioDesdeCombo();
            fechaVencimiento = ""; // No aplica fecha de vencimiento para pérdida
            console.log('PERDIDA:', {
                precioCompra,
                fechaVencimiento
            });
            enviarDatosStock(); // Envía los datos directamente
        } else if (tipoOperacion === "DEVOLUCION") {
            if (percedero === "1") { // Si es perecedero, pedimos nueva fecha
                // Muestra el modal para ingresar la nueva fecha de vencimiento
                $("#modalNuevaFechaVencimiento").modal('show');

                // Maneja el clic del botón "Guardar" dentro del modal de nueva fecha
                // Usamos .off().on() para evitar que el evento se adjunte múltiples veces
                $("#btnConfirmarNuevaFecha").off('click').on('click', function() {
                    nuevafechaVencimiento = $("#iptNuevaFechaVencimiento").val();
                    if (!nuevaFecha) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Debe ingresar una nueva fecha de vencimiento.'
                        });
                        return; // No cierra el modal y pide la fecha
                    }

                    fechaVencimiento = $("#iptFechaVencimientoAun").val();
                    precioCompra = ""; // Si el proveedor te cambia el producto, el precio de compra del "nuevo" registro no viene del lote anterior. Considera tu lógica de negocio aquí. Podrías añadir un input en el modal si el precio de compra también cambia.

                    $("#modalNuevaFechaVencimiento").modal('hide'); // Cierra el modal de nueva fecha
                    console.log('DEVOLUCION - PERECEDERO (NUEVA FECHA):', {
                        percedero,
                        precioCompra,
                        fechaVencimiento
                    });
                    enviarDatosStock(); // Ahora sí, envía los datos con la nueva fecha
                });

            } else { // Si no es perecedero, no necesitamos nueva fecha
                precioCompra = obtenerPrecioDesdeCombo();
                fechaVencimiento = "";
                console.log('DEVOLUCION - NO PERECEDERO:', {
                    percedero,
                    precioCompra,
                    fechaVencimiento
                });
                enviarDatosStock(); // Envía los datos directamente
            }
        }
    }
    // Si hay otras condiciones para 'operacion_stock', puedes añadirlas aquí
});
        $("#btnLimpiarBusqueda").on('click', function() {
            $("#iptCodigoBarras_cades").val('')
            $("#iptCategoria").val('')
            $("#iptProducto").val('')
            $("#iptPrecioVentaDesde").val('')
            $("#iptPrecioVentaHasta").val('')
            table_producto.search('').columns().search('').draw(); // eliminar todos sus filtros 
        });
    });

    document.getElementById("btnGuardarCategorias").addEventListener("click", function() {
        const forms = document.getElementsByClassName('needs-validation');
        // Confirmación con SweetAlert
        Swal.fire({
            title: '¿Está seguro de registrar la Categoría?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deseo registrarla',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (!result.isConfirmed) return;
            const datos = new FormData();
            datos.append("accion", 2); // asegúrate de que `accion` esté definido en el contexto
            datos.append("idCategoria", $("#idCategoria").val());
            datos.append("categoria", $("#txtCategoria").val());
            datos.append("estado", 1);
            $.ajax({
                url: "ajax/categorias.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                    mostrarAlertaRespuesta(respuesta, function() {
                      cargarCamboCategoria();
                        LimpiarCategoria();
                        $("#mdlGestionarCategorias").modal('hide');
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
                },
                error: manejarErrorAjax
            });
        });
    });

    document.getElementById("btnGuardarMarca").addEventListener("click", function() {
        const idMarca = $("#idMarca").val() || "0";
        Swal.fire({
            title: 'Está seguro de registrar el Marca?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deseo registrarla',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (!result.isConfirmed) return;
            const datos = new FormData();
            datos.append("accion", 2); // asegúrate de que `accion` esté definido en el contexto
            datos.append("Idmarca", idMarca);
            datos.append("nombre", $("#txtMarca").val());
            $.ajax({
                url: "ajax/marca.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                    mostrarAlertaRespuesta(respuesta, function() {
                        cargarCamboMarca();
                        LimpiarMarca();
                        $("#mdlGestionarMarca").modal('hide');
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
                },
                error: manejarErrorAjax
            });
        });
    });

    document.getElementById("btnGuardarUnidaMedida").addEventListener("click", function() {
        txtMedidas.value = txtMedidas.value.trim().toUpperCase();
        txtNombreCorto.value = txtNombreCorto.value.trim().toUpperCase();
        // Confirmación con SweetAlert
        Swal.fire({
            title: '¿Está seguro de registrar la Medida?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deseo registrarla',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (!result.isConfirmed) return;

            const datos = new FormData();
            datos.append("accion", accion); // asegúrate de que `accion` esté definido en el contexto
            datos.append("idMedidas", $("#idMedidas").val());
            datos.append("nombre", $("#txtMedidas").val());
            datos.append("nombrecorto", $("#txtNombreCorto").val());
            $.ajax({
                url: "ajax/medidas.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                    mostrarAlertaRespuesta(respuesta, function() {
                        cargarCamboMedidas();
                        LimpiarMedidas();
                        $("#mdlGestionarMedidas").modal('hide');
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
                },
                error: manejarErrorAjax
            });
        });
    });

    function cargarProducto() {
        table_producto = $("#tbl_productos").DataTable({
            dom: 'Bfrtip', //botoneras en la parte superios
            buttons: [{
                    text: 'Agregar Producto',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        $("#mdlGestionarProducto").modal('show');
                        $(".needs-validation").removeClass("was-validated");
                        accion = 2; //registrar
                        $('#iptStockReg').removeAttr('disabled');
                        $('#iptMinimoStockReg').removeAttr('disabled');
                        $('#iptCodigoReg').removeAttr('disabled');
                        $('#iptPrecioCompraReg').removeAttr('disabled');
                        $('#iptFechaVencimiento').removeAttr('disabled');
                        limpiar();
                        $("#chkIva").prop("checked", false);
                        // $("#chkPerecedero").prop("checked", );
                        $('#chkPerecedero').prop('checked', true); // activar checkbox
                        $('#contFechaVencimiento').show(); // mostrar contenedor si aplica
                        //  $("#contFechaVencimiento").attr("required", true);
                        $('#iptFechaVencimiento').prop('required', true);

                    }
                },
                'excel', 'print', 'pdf', 'pageLength'
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,

            ajax: {
                url: "ajax/productos.ajax.php",
                dataSrc: '', // Que la data que retorne  no queremos 
                type: "POST",
                data: {
                    'accion': 1
                }, //1: LISTAR PRODUCTOS
            },

            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                    targets: 0, // idice cero donde se encuentra la columna
                    orderable: false, // es columan tenga ordenamiento
                    className: 'control' // aparescar  un boton 
                }, 
                {targets: 1, visible: false}, {   targets: 2,  visible: false  },{  targets: 3, visible: false},
                 {  targets: 4, visible: false}, {  targets: 5,  visible: false},{  targets: 6,  visible: false}, 
                
                  {
    targets: 7,
    orderable: false,
    render: function(data, type, row) {
        var imgPath = row.img_producto || 'https://via.placeholder.com/40'; // Miniatura pequeña
        var largeImgPath = row.img_producto || 'https://via.placeholder.com/600'; // Imagen más grande para el modal
        var productName = row.descripcion_producto || 'Producto';

        return `
            <div class="d-flex align-items-center product-image-wrapper"
                 data-bs-toggle="modal" data-bs-target="#imageModal"
                 data-large-img="${largeImgPath}"
                 data-product-name="${productName}"
                 style="cursor: pointer;">
                <img src="${imgPath}" alt="${row.nombre_categoria}" class="rounded me-2"
                     style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <h6 class="mb-0">${row.nombre_categoria}</h6>
                    <small class="text-muted">${row.descripcion_producto}</small>
                </div>
            </div>
        `;
    }
},

                {  targets: 8,  visible: false}, 
{
    targets: 14, // Columna IVA
    render: function(data, type, row) {
        let statusClass = '';
        let statusText = '';
        if (data == 1) {
            statusClass = 'bg-info text-dark';
            statusText = 'Sí';
        } else {
            statusClass = 'bg-warning text-dark';
            statusText = 'No';
        }

        // Añade una clase de tamaño de fuente de Bootstrap, por ejemplo, 'fs-6' o 'small'
        return `<span class="badge ${statusClass} fs-6">${statusText}</span>`; 
        // O si quieres que sea aún más pequeño, prueba con 'small':
        // return `<span class="badge ${statusClass} small">${statusText}</span>`;
    }
},
{
    targets: 15, // Columna Perecedero
    render: function(data, type, row) {
        let statusClass = '';
        let statusText = '';
        if (data == 1) {
            statusClass = 'bg-info text-dark';
            statusText = 'Sí';
        } else {
            statusClass = 'bg-warning text-dark';
            statusText = 'No';
        }

        // Añade la misma clase de tamaño de fuente de Bootstrap
        return `<span class="badge ${statusClass} fs-6">${statusText}</span>`;
        // return `<span class="badge ${statusClass} small">${statusText}</span>`;
    }
},

                {
                    targets: 17,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (parseFloat(rowData[16]) <= parseFloat(rowData[17])) {
                            $(td).parent().css('background', '#FF5733')
                            $(td).parent().css('color', '#ffffff')
                        }
                    }
                },
                {
                    targets: 18,
                    visible: false
                }, {
                    targets: 19,
                    visible: false
                },
                {
                    targets: 20,
                    visible: false
                }, {
                    targets: 21,
                    visible: false
                },

                {
                    targets: 22,
                    orderable: false, // no ordenar
                    render: function(data, type, full, meta) {
                        const productId = full.id_producto || full.id_producto; // Usa id_producto si existe, si no, id_cliente
                        const productName = full.descripcion_producto || 'Producto'; // Nombre del producto para el título del modal

                        return `
                        <div class="dropdown text-center">
        <button class="btn btn-light btn-sm rounded-circle p-1" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px; height: 30px;">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
           <li>
                            <a class="dropdown-item btn-accion-item btnEditarProducto" href="#" data-id="${productId}" title="Editar ${productName}">
                                <i class="bi bi-pencil-square me-2 text-primary"></i> Editar
                            </a>
                        </li>
                        <li>
                           <a class="dropdown-item btn-accion-item btnAumentarStock" href="#" data-bs-toggle="modal" 
                              title="Aumentar Stock de ${productName}" style="cursor:pointer;">
                              <i class="bi bi-plus-circle me-2 text-success"></i> Aumentar Stock
                           </a>
                       </li>
                       <li>
                           <a class="dropdown-item btn-accion-item btnDisminuirStock" href="#" data-bs-toggle="modal" 
                           title="Disminuir Stock de ${productName}" style="cursor:pointer;">
                           <i class="bi bi-dash-circle me-2 text-warning"></i> Disminuir Stock
                          </a>
                       </li>

                        <li><hr class="dropdown-divider"></li> <li>
                            <a class="dropdown-item btn-accion-item btnEliminarProducto" href="#" data-id="${productId}" title="Eliminar ${productName}">
                                <i class="bi bi-trash-fill me-2 text-danger"></i> Eliminar
                            </a>
                        </li>
        </ul>
      </div>
            
        `;
                    }
                }

            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

    }

    function cargarOpcionesTipoOperacion(operacion) {
        const select = $('#selTipoOperacion');
        select.empty(); // Limpia todas las opciones
        if (operacion === 1) {
            // Aumentar stock
            select.append('<option value="">Seleccione una acción</option>');
            select.append('<option value="COMPRA">COMPRA</option>');
            select.append('<option value="PROMOCION">PROMOCION</option>');
        } else if (operacion === 2) {
            // Disminuir stock
                
            select.append('<option value="">Seleccione una acción</option>');
            select.append('<option value="DEVOLUCION">DEVOLUCION</option>');
            select.append('<option value="PERDIDA">PERDIDA</option>');
            // select.append('<option value="CAMBIO">CAMBIO</option>');
        }
    }

    function radio_acion_evento() {
        funcion_limpirar_stock();
        let stockActual = parseFloat($("#stock_Stock").html());
        $("#stock_NuevoStock").html(parseFloat(stockActual));

    }

    function funcion_limpiar_stock() {
        $("#iptCantidad").val("");
        $("#iptComentario").val("");
        $("#iptFechaVencimientoAun").val("");

    }

    function limpiar() {
        $("#iptCodigoReg").val("");
        // $("#selCategoriaReg").val("");
        $("#iptDescripcionReg").val("");
        $("#iptPrecioCompraReg").val("");
        $("#iptPrecioVentaReg").val("");
        $("#iptPrecio1").val("");
        $("#iptPrecio2").val("");
        // $("#selMedidasReg").val("");
        $("#iptStockReg").val("");
        $("#iptMinimoStockReg").val("");
        $("#iptUnidadesFracion").val("");
        $("#iptPrecioFracion").val("");
        $("#iptPrecioFracion1").val("");
        $("#iptPrecioFracion2").val("");
        $(".needs-validation").removeClass("was-validated");
        $("#selCategoriaReg").val('').trigger('change');
        $("#selMedidasReg").val('').trigger('change');
        $("#selMarcaReg").val('').trigger('change');
        $('#iptImagen').val(''); // Limpiar input file
        $('#previewImg').attr('src', 'Views/assets/imagenes/no_image.jpg'); // Imagen por defecto
        $('#idProducto').val('0'); // ID del producto a cero (nuevo)
        $('#imagenActual').val(''); // Limpiar campo oculto imagen_actual

    }


    function cargarLotesProducto(idProducto) {
        let datos = new FormData();
        datos.append("accion", 9);
        datos.append("id_producto", idProducto);

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                let $select = $("#selectLote");
                $select.empty().append('<option value="">Seleccione un lote</option>');
                data.forEach(function(lote) {
                    $select.append(`<option value="${lote.id}">
          ${lote.fechaVencimiento} - $${lote.precioCompra}
        </option>`);
                });
            },
            error: function() {
                alert('Error al cargar los lotes');
            }
        });
    }

    function LimpiarCategoria() {
        $("#idCategoria").val("0");
        $("#txtCategoria").val("");
    };

    function LimpiarMarca() {
        $("#idMarca").val("");
        $("#txtMarca").val("");
    };

    function LimpiarMedidas() {
        $("#idMedidas").val("0");
        $("#txtMedidas").val("");
        $("#txtNombreCorto").val("");


    }

    function actualizarSelect2Opciones(selector, placeholderText, dataOptions, nuevaOpcionValue, nuevaOpcionText, selectedValue = '') {
        // Si Select2 no está inicializado, inicialízalo una vez
        if (!$(selector).hasClass("select2-hidden-accessible")) {
            $(selector).select2({
                placeholder: placeholderText,
                allowClear: true,
                dropdownParent: $('#mdlGestionarProducto'), // Crucial para modales
                language: "es"
            });
        }
        // Vaciar las opciones existentes
        $(selector).empty();
        // Añadir la opción por defecto "Seleccionar"
        var defaultOption = new Option("Seleccionar", "", true, true);
        $(selector).append(defaultOption);
        // var defaultOption = new Option("", "", true, true);
        // $(selector).append(defaultOption);
        // Añadir la opción "Agregar Nueva..."
        var addOption = new Option(nuevaOpcionText, nuevaOpcionValue, false, false);
        $(selector).append(addOption);
        // Añadir las opciones de datos reales
        dataOptions.forEach(item => {
            var newOption = new Option(item[1], item[0], false, false);
            $(selector).append(newOption);
        });
        // Seleccionar un valor si se proporciona (útil para edición)
        if (selectedValue) {
            $(selector).val(selectedValue).trigger('change');
        } else {
            // Asegurarse de que "Seleccionar" esté realmente seleccionado si no hay valor predeterminado
            $(selector).val('').trigger('change');
        }
    }

    function cargarCamboCategoria(selectedCategoryId = '') { // Recibe un ID para pre-seleccionar si es necesario
        $.ajax({
            url: "ajax/cargarcombo.ajax.php",
            cache: false,
            dataType: 'json',
            success: function(respuesta) {
                actualizarSelect2Opciones(
                    "#selCategoriaReg",
                    "Buscar Categoría",
                    respuesta, // Los datos de categorías
                    "nueva_categoria",
                    "+ Agregar Nueva Categoría",
                    selectedCategoryId // Pasa el ID si se quiere seleccionar
                );
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error al cargar categorías:", textStatus, errorThrown);
                Swal.fire("Error", "No se pudieron cargar las categorías. Por favor, intente de nuevo.", "error");
            }
        });
    }

    function cargarCamboMarca(selectedMarcaId = '') {
        $.ajax({
            url: "ajax/cargarcombomarca.ajax.php",
            cache: false,
            dataType: 'json',
            success: function(respuesta) {
                actualizarSelect2Opciones(
                    "#selMarcaReg",
                    "Buscar Marca",
                    respuesta,
                    "nueva_marca",
                    "+ Agregar Nueva Marca",
                    selectedMarcaId
                );
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error al cargar marcas:", textStatus, errorThrown);
                Swal.fire("Error", "No se pudieron cargar las marcas. Por favor, intente de nuevo.", "error");
            }
        });
    }

    function cargarCamboMedidas(selectedMedidaId = '') {
        $.ajax({
            url: "ajax/cargarcombomedidas.ajax.php",
            cache: false,
            dataType: 'json',
            success: function(respuesta) {
                actualizarSelect2Opciones(
                    "#selMedidasReg",
                    "Buscar Unidad Medida",
                    respuesta,
                    "nueva_medida",
                    "+ Agregar Nueva Unidad Medida",
                    selectedMedidaId
                );
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error al cargar unidades de medida:", textStatus, errorThrown);
                Swal.fire("Error", "No se pudieron cargar las unidades de medida. Por favor, intente de nuevo.", "error");
            }
        });
    }
</script>