<br>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Botón principal más pequeño */
    .action-dropdown .btn-action-dropdown {
        background-color: rgb(208, 212, 90);
        /* background-color: #f8f9fa; */
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: 0.5rem;
        padding: 0.3rem 0.75rem;
        font-size: 0.8rem;
        font-weight: 500;
        box-shadow: none;
        transition: all 0.2s ease;
    }

    .modal-ancho-personalizado {
        /* Usa la propiedad que prefieras. 90vw es una buena opción. */
        max-width: 100vw;
    }

    /* In your CSS file or <style> block */
    .tab-content .tab-pane {
        min-height: 300px;
        /* Adjust as needed based on your shortest tab's content */
    }

    .action-dropdown .btn-action-dropdown:hover {
        background-color: #e2e6ea;
        color: #212529;
    }

    /* Menú desplegable más compacto */
    .action-dropdown .dropdown-menu {
        min-width: 140px;
        padding: 0.25rem 0;
        border-radius: 0.5rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    /* Ítems del menú más pequeños */
    .action-dropdown .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: #343a40;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Íconos más pequeños y alineados */
    .action-dropdown .dropdown-item .bi {
        font-size: 1rem;
        margin: 0;
        color: inherit;
        /* hereda el color del ítem para coherencia */
    }

    /* Hover */
    .action-dropdown .dropdown-item:hover {
        background-color: #f1f3f5;
        color: #007bff;
    }

    /* Separador más pequeño */
    .action-dropdown .dropdown-divider {
        margin: 0.3rem 0;
        border-top: 1px solid #dee2e6;
    }

    .action-dropdown .btn-action-dropdown .bi {
        vertical-align: middle;
    }

    .form-select {
        color: #343a40;
        /* Dark gray text */
        background-color: #ffffff;
        /* Explicitly white background */
    }

    .form-select option {
        color: #343a40;
        /* Ensure options also have dark text */
    }

    /* Custom CSS para un estilo más moderno */

    /* Foco de los campos de formulario */
    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        /* Un azul más suave o un gris */
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        /* Sombra más sutil */
    }

    /* Bordes ligeramente más redondeados para los inputs y selects */
    .form-control,
    .form-select {
        border-radius: 0.375rem;
        /* El valor por defecto de Bootstrap 5 es 0.25rem, puedes aumentarlo ligeramente */
    }

    /* Color del encabezado de la tarjeta si quieres algo más suave que el azul primario */
    .card-header.bg-light {
        background-color: #f8f9fa !important;
        /* Mantenerlo claro */
        color: #495057;
        /* Un gris más oscuro para el texto del título de la tarjeta */
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        /* Una línea divisoria sutil */
    }

    /* Sombra ligera para los botones al pasar el mouse (hover) */
    .btn-primary:hover {
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
        transform: translateY(-1px);
        /* Efecto sutil de levantamiento */
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-secondary:hover {
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.1);
        transform: translateY(-1px);
        transition: all 0.2s ease-in-out;
    }
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
                            <th>P. Venta 1 </th>
                            <th>P. Venta 2</th>
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

<div class="modal fade" id="mdlGestionarProducto" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-ancho-personalizad">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarProductoLabel">Agregar Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="modal-body p-4 overflow-auto" style="max-height: calc(100vh - 180px);">
                <form class="needs-validation" novalidate>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column align-items-center">
                                <img id="previewImg" src="Views/assets/imagenes/no_image.jpg" class="img-fluid rounded border p-2 mb-3" style="width: 100%; max-width: 350px; height: 250px; object-fit: contain;" alt="Vista previa de la imagen">
                                <div class="w-100">
                                    <label for="iptImagen" class="form-label small">Imagen del Producto</label>
                                    <input type="file" class="form-control form-control-sm" id="iptImagen" name="iptImagen" accept="image/*" onchange="previewFile(this)">
                                    <div class="invalid-feedback">Formato de imagen no permitido.</div>
                                </div>
                                <input type="hidden" id="idProducto" name="producto" value="0">
                                <input type="hidden" id="imagenActual" name="imagen_actual" value="">
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <ul class="nav nav-tabs mb-4" id="productTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#productDetails" type="button" role="tab" aria-controls="productDetails" aria-selected="true">Detalles del Producto</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pricing-tab" data-bs-toggle="tab" data-bs-target="#productPricing" type="button" role="tab" aria-controls="productPricing" aria-selected="false">Precios y Stock</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="options-tab" data-bs-toggle="tab" data-bs-target="#additionalOptions" type="button" role="tab" aria-controls="additionalOptions" aria-selected="false">Opciones Adicionales</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="productTabsContent">
                                <div class="tab-pane fade show active" id="productDetails" role="tabpanel" aria-labelledby="details-tab">
                                    <div class="card mb-3">
                                        <div class="card-header bg-light fw-bold">
                                            Información General
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="iptCodigoReg" class="form-label small">Código</label>
                                                    <input type="text" class="form-control form-control-sm" id="iptCodigoReg" name="iptCodigoReg" maxlength="13" minlength="3" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off">
                                                    <div class="invalid-feedback">Debe ingresar el código de barras.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="selMedidasReg" class="form-label small">Unidad de Medida</label>
                                                    <select class="form-select form-select-sm" id="selMedidasReg" required></select>
                                                    <div class="invalid-feedback">Seleccione el medida.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="selMarcaReg" class="form-label small">Marca</label>
                                                    <select class="form-select form-select-sm" id="selMarcaReg" required></select>
                                                    <div class="invalid-feedback">Seleccione el Marca.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="selCategoriaReg" class="form-label small">Categoría</label>
                                                    <select class="form-select form-select-sm" id="selCategoriaReg" required></select>
                                                    <div class="invalid-feedback">Seleccione la Categoría.</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="iptDescripcionReg" class="form-label small">Descripción</label>
                                                    <textarea class="form-control form-control-sm" id="iptDescripcionReg" rows="2" required></textarea>
                                                    <div class="invalid-feedback">Debe ingresar la Descripción del producto.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="productPricing" role="tabpanel" aria-labelledby="pricing-tab">
                                    <div class="card mb-3">
                                        <div class="card-header bg-light fw-bold">
                                            Configuración de Precios e Inventario
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="iptPrecioCompraReg" class="form-label small">Costo</label>
                                                    <input type="number" min="0" step="0.01" class="form-control form-control-sm" id="iptPrecioCompraReg" placeholder="0.00" required>
                                                    <div class="invalid-feedback">Debe ingresar el precio del Costo.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="iptPrecioVentaReg" class="form-label small">Precio de venta</label>
                                                    <input type="number" min="0" step="0.01" class="form-control form-control-sm" id="iptPrecioVentaReg" placeholder="0.00" required>
                                                    <div class="invalid-feedback">Debe ingresar el precio de venta.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="iptStockReg" class="form-label small">Stock Actual</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="iptStockReg" required>
                                                    <div class="invalid-feedback">Debe ingresar el stock.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="iptMinimoStockReg" class="form-label small">Stock Mínimo de Alerta</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="iptMinimoStockReg" required>
                                                    <div class="invalid-feedback">Debe ingresar el stock Mínimo.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="iptPrecio1" class="form-label small">Precio por Mayor</label>
                                                    <input type="number" min="0.00" step="0.01" class="form-control form-control-sm" id="iptPrecio1" placeholder="0.00" required>
                                                    <div class="invalid-feedback">Debe ingresar el Precio por Mayor.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="iptPrecio2" class="form-label small">Precio Especial</label>
                                                    <input type="number" min="0.00" step="0.01" class="form-control form-control-sm" id="iptPrecio2" placeholder="0.00" required>
                                                    <div class="invalid-feedback">Debe ingresar el Precio Especial.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="additionalOptions" role="tabpanel" aria-labelledby="options-tab">
                                    <div class="card mb-3">
                                        <div class="card-header bg-light fw-bold">
                                            Ajustes Adicionales
                                        </div>
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
                                                <div class="col-md-6" id="contFechaVencimiento">
                                                    <label for="iptFechaVencimiento" class="form-label small">Fecha de Vencimiento <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control form-control-sm" id="iptFechaVencimiento">
                                                    <div class="invalid-feedback">Debe ingresar la Fecha de Vencimiento.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-end pt-3 pb-3 px-4 mt-2 border-top-0">
                <button type="button" class="btn btn-outline-secondary me-2 px-4 py-2 rounded-pill fw-semibold" data-bs-dismiss="modal" id="btnCancelarRegistro">
                    <i class="fas fa-times me-2"></i> Cancelar
                </button>
                <button type="button" class="btn btn-primary px-5 py-2 rounded-pill fw-semibold" id="btnGuardar">
                    <i class="fas fa-save me-2"></i> Guardar datos
                </button>
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
<script>
    var accion;
    var table_producto;
    var operacion_stock = 0;
    var BaderaPerceddero = 0;
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    $(document).ready(function() {
        cargarCamboMedidas();
        cargarCamboCategoria();
        cargarCamboMarca();

        cargarProducto();
        // Event listener para la selección de "Agregar Nueva Categoría"
        $("#selCategoriaReg").on('select2:select', function(e) {
            var selectedValue = e.params.data.id;
            if (selectedValue === "nueva_categoria") {
                // Resetea la selección visible para que no se quede en "+ Agregar Nueva Categoría"
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
            // alert (data [1]);
            $("#idProducto").val(data[1]);
            $("#iptCodigoReg").val(data[2]);
            $("#iptCodigoReg").prop('disabled', true);
            // $("#selCategoriaReg").val(data[3]);
            cargarCamboCategoria(String(data[3]));
            $("#iptDescripcionReg").val(data[7]);
            // $("#selMedidasReg").val(data[6]);
            cargarCamboMedidas(String(data[8]));
            cargarCamboMarca(String(data[5]));

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

            } else {

                $("#chkPerecedero").prop("checked", false);
            }

            $("#iptStockReg").val(data[16]);
            $("#iptMinimoStockReg").val(data[17]);
            $("#iptStockReg").prop('disabled', true);
            $("#iptMinimoStockReg").prop('disabled', true);
            $("#iptPrecioCompraReg").prop('disabled', true);
            $('#iptFechaVencimiento').prop('disabled', true);
            $("#imagenActual").val(data[21]);
            // 🔽 Cargar imagen
            let nombreImagen = data[21]; // <- Ajusta este índice según la posición de la imagen en tu datatable
            let rutaImagen = nombreImagen ? `Views/assets/imagenes/productos/${nombreImagen}` : `Views/assets/imagenes/no_image.jpg`;
            $("#previewImg").attr("src", rutaImagen);
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

            // Mostrar precio y fecha, ocultar combo

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
            //   $("#iptPrecioCompra").val(datos[8]);

            $("#percedero").val(datos[15]);
            $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));

            // Al inicio, ocultar combo y mostrar campos por defecto
            //   $("#iptPrecioCompra").parent().removeClass("d-none");
            //   $("#iptFechaVencimientoAun").parent().removeClass("d-none");

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
            }
        });
        $("#btnGuardarNuevorStock").on('click', function() {
            const cantidad = parseFloat($("#iptCantidad").val());
            const comentario = $("#iptComentario").val().trim();
            const percedero = $("#percedero").val();
            const tipoOperacion = $("#selTipoOperacion").val();
            const nuevoStock = parseFloat($("#stock_NuevoStock").html());
            const idProducto = $("#idProducto_stock").val();
            const codigoProducto = $("#stock_codigoProducto").html();
            let fechaVencimiento = "";
            let precioCompra = 0;

            function obtenerPrecioDesdeCombo() {
                const combo = document.getElementById('selectLote');
                const texto = combo.options[combo.selectedIndex].text;
                const precioTexto = texto.split('$')[1]; // "12.50"
                return parseFloat(precioTexto);
            }

            // === Lógica de negocio según operación ===
            if (operacion_stock === 1) {
                precioCompra = parseFloat($("#iptPrecioCompra").val());
                fechaVencimiento = $("#iptFechaVencimientoAun").val();
            } else if (operacion_stock === 2) {
                if (tipoOperacion === "PERDIDA") {
                    precioCompra = obtenerPrecioDesdeCombo();
                    fechaVencimiento = "";
                    console.log('PERDIDA:', {
                        precioCompra,
                        fechaVencimiento
                    });

                } else if (tipoOperacion === "DEVOLUCION") {
                    if (percedero === "1") {
                        precioCompra = "";
                        fechaVencimiento = $("#iptFechaVencimientoAun").val();
                    } else {
                        precioCompra = obtenerPrecioDesdeCombo();
                        fechaVencimiento = "";
                    }
                    console.log('DEVOLUCION:', {
                        percedero,
                        precioCompra,
                        fechaVencimiento
                    });
                }
            }

            // === Validaciones ===
            if (!cantidad || cantidad <= 0 || comentario === "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar una cantidad válida y un comentario'
                });
                return;
            }

            // Validación opcional de fecha para perecederos
            // if (percedero === "1" && fechaVencimiento === "") {
            //     Toast.fire({
            //         icon: 'warning',
            //         title: 'Debe ingresar la fecha de vencimiento para un producto perecedero'
            //     });
            //     return;
            // }

            // === Preparar datos para enviar ===
            const datos = new FormData();
            datos.append('accion', accion);
            datos.append('id_producto', idProducto);
            datos.append('codigo_producto', codigoProducto);
            datos.append('tipo_movimiento', operacion_stock);
            datos.append('comentario', comentario);
            datos.append('nuevo_stock', nuevoStock);
            datos.append('cantidad', cantidad);
            datos.append('precio_compra', precioCompra);
            datos.append('tipo_operacion', tipoOperacion);
            datos.append('fechaVencimientoAun', fechaVencimiento);

            // === Enviar por AJAX ===
            $.ajax({
                url: "ajax/productos.ajax.php",
                method: "POST",
                data: datos,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(respuesta) {
                    mostrarAlertaRespuesta(respuesta, function() {
                        table_producto.ajax.reload();
                        funcion_limpiar_stock();
                        $("#mdlGestionarStock").modal('hide');
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
                },
                error: manejarErrorAjax
            });
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


    document.getElementById("btnGuardar").addEventListener("click", async function() {
        const file = $("#iptImagen").val();
        const forms = document.getElementsByClassName('needs-validation');
        const inputImage = document.querySelector('#iptImagen');
        let formularioValido = true;
        let imagenValida = true;

        // Validar formulario con HTML5
        Array.from(forms).forEach(form => {
            if (!form.checkValidity()) {
                formularioValido = false;
                form.classList.add('was-validated');
            }
        });

        // Validar extensión de imagen (si se ha seleccionado)
        if (file) {
            const ext = file.substring(file.lastIndexOf(".")).toLowerCase();
            const extensionesValidas = [".jpg", ".png", ".gif", ".jpeg", ".webp"];
            imagenValida = extensionesValidas.includes(ext);
            $("#iptImagen").toggleClass("is-invalid", !imagenValida);
        }

        if (!formularioValido || (file && !imagenValida)) {
            const mensaje = !imagenValida ?
                "El formato de imagen no está permitido. Use JPG, PNG, GIF, JPEG o WEBP." :
                "Por favor, complete todos los campos obligatorios y corrija los errores.";

            Swal.fire({
                icon: 'info',
                title: mensaje,
            });

            return;
        }

        // Precios
        const precioCompra = parseFloat($("#iptPrecioCompraReg").val()) || 0;
        const precioVenta = parseFloat($("#iptPrecioVentaReg").val()) || 0;
        const precio1 = parseFloat($("#iptPrecio1").val()) || 0;
        const precio2 = parseFloat($("#iptPrecio2").val()) || 0;

        if (precioVenta <= precioCompra || precio1 <= precioCompra || precio2 <= precioCompra) {
            return Swal.fire({
                icon: 'warning',
                title: 'Revisión de precios',
                text: 'Todos los precios de venta deben ser mayores al precio de compra.'
            });
        }

        // Confirmación
        const confirmacion = await Swal.fire({
            title: '¿Está seguro de registrar el producto?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deseo registrarlo',
            cancelButtonText: 'Cancelar'
        });

        if (!confirmacion.isConfirmed) return;

        const stock = parseFloat($("#iptStockReg").val()) || 0;
        const costoTotal = precioCompra * stock;
        const perecedero = $('#chkPerecedero').is(":checked") ? 1 : 0;
        const iva = $('#chkIva').is(":checked") ? 1 : 0;
        const fechaVencimiento = perecedero ? $("#iptFechaVencimiento").val() : "";

        const datos = new FormData();
        datos.append("accion", typeof accion !== 'undefined' ? accion : 1);
        datos.append("id_Producto", $("#idProducto").val());
        datos.append("codigo_producto", $("#iptCodigoReg").val());
        datos.append("id_categoria_producto", $("#selCategoriaReg").val());
        datos.append("id_marca_producto", $("#selMarcaReg").val());
        datos.append("id_medidas_producto", $("#selMedidasReg").val());
        datos.append("descripcion_producto", $("#iptDescripcionReg").val());
        datos.append("precio_compra_producto", precioCompra);
        datos.append("precio_venta_producto", precioVenta);
        datos.append("precio_1_producto", precio1);
        datos.append("precio_2_producto", precio2);
        datos.append("Perecedero", perecedero);
        datos.append("iva", iva);
        datos.append("stock_producto", stock);
        datos.append("minimo_stock_producto", $("#iptMinimoStockReg").val());
        datos.append("ventas_producto", 0);
        datos.append("costo_total_producto", costoTotal);
        datos.append("fecha_vencimiento", fechaVencimiento);

        // Imagen
        if (inputImage.files.length > 0) {
            datos.append("archivo[]", inputImage.files[0]);
            console.log("inputImage.files[0]",inputImage.files[0]);
        } else {
            const imagenActual = $("#imagenActual").val() || "";
            datos.append("imagen_actual", imagenActual);
            console.log("imagenActual",imagenActual);
        }
        console.log("")

        // Envío AJAX
        // $.ajax({
        //     url: "ajax/productos.ajax.php",
        //     method: "POST",
        //     data: datos,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     dataType: 'json',
        //     success: function(respuesta) {
        //         if (typeof mostrarAlertaRespuesta === 'function') {
        //             mostrarAlertaRespuesta(respuesta, () => {
        //                 if (typeof table_producto !== 'undefined') table_producto.ajax.reload();
        //                 if (typeof limpiar === 'function') limpiar();
        //                 $("#mdlGestionarProducto").modal('hide');
        //             }, {
        //                 mensajeExito: "éxito",
        //                 mensajeAdvertencia: "Warning",
        //                 mensajeError: "Excepción"
        //             });
        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         if (typeof manejarErrorAjax === 'function') {
        //             manejarErrorAjax(jqXHR, textStatus, errorThrown);
        //         } else {
        //             console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR);
        //             Swal.fire("Error", "Ocurrió un error al procesar la solicitud. Por favor, intente de nuevo.", "error");
        //         }
        //     }
        // });
    });

    document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    });

    document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
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
                        table_categorias.ajax.reload();
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
                }, {
                    targets: 1,
                    visible: false
                }, {
                    targets: 2,
                    visible: false
                },
                {
                    targets: 3,
                    visible: false
                }, {
                    targets: 5,
                    visible: false
                },
                {
                    targets: 6,
                    visible: false
                },
                {
                    targets: 8,
                    visible: false
                }, {
                    targets: 9,
                    visible: false
                },
                {
                    targets: 11,
                    visible: false
                }, {
                    targets: 12,
                    visible: false
                },
                {
                    targets: 13,
                    visible: false
                },
                {
                    targets: 14,
                    visible: false
                },

                {
                    targets: 15,
                    visible: false
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
            <div class="d-flex justify-content-center align-items-center">
                <div class="dropdown action-dropdown">
                    
             <button class="btn btn-action-dropdown dropdown-toggle" type="button" id="accionesDropdown${meta.row}" 
        data-bs-toggle="dropdown" aria-expanded="false" title="Producto ${productName}">
           Opciones <i class="bi bi-caret-down-fill ms-1"></i>
         </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-lg animated--grow-in" aria-labelledby="accionesDropdown${meta.row}">
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
            select.append('<option value="COMPRA">COMPRA</option>');
            select.append('<option value="PROMOCION">PROMOCION</option>');
        } else if (operacion === 2) {
            // Disminuir stock
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

    function previewFile(input) {
        let file = $("input[type=file]").get(0).files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function() {
                console.log("face :3")
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

    onload = function() {
        var ele = document.querySelectorAll('.validanumericos')[0];
        ele.onkeypress = function(e) {
            if (isNaN(this.value + String.fromCharCode(e.charCode)))
                console.log("funciona");
            return false;
        }
        ele.onpaste = function(e) {
            console.log("dsdddssdsd");
            e.preventDefault();
        }
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