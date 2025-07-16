<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner"><h3><span id="countPendientes">0</span></h3><p>Facturas Pendientes</p></div>
                    <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                    <a href="#" class="small-box-footer filter-status" data-status="PENDIENTE_FACTURAR">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner"><h3><span id="countEnviadas">0</span></h3><p>Facturas Enviadas</p></div>
                    <div class="icon"><i class="fas fa-paper-plane"></i></div>
                    <a href="#" class="small-box-footer filter-status" data-status="ENVIADA_SRI">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner"><h3><span id="countAutorizadas">0</span></h3><p>Facturas Autorizadas</p></div>
                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                    <a href="#" class="small-box-footer filter-status" data-status="AUTORIZADA">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner"><h3><span id="countNoAutorizadas">0</span></h3><p>Facturas No Autorizadas</p></div>
                    <div class="icon"><i class="fas fa-times-circle"></i></div>
                    <a href="#" class="small-box-footer filter-status" data-status="NO_AUTORIZADA">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

---

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-search"></i> Buscar y Filtrar Facturas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-success" id="btnNuevaVenta"><i class="fas fa-cart-plus"></i> Nueva Venta</button>
                    <button type="button" class="btn btn-tool btn-info" id="btnRefrescarListado"><i class="fas fa-sync-alt"></i> Refrescar</button>
                    <button type="button" class="btn btn-tool btn-secondary" id="btnExportarListado"><i class="fas fa-file-excel"></i> Exportar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" id="quickSearchInput" placeholder="Buscar por N° Venta, N° Factura, Cliente, RUC/Cédula...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-outline-info btn-flat" id="btnAdvancedFiltersToggle"><i class="fas fa-sliders-h"></i> Filtros Avanzados</button>
                    </div>
                </div>
                <div class="row mt-3" id="advancedFiltersArea" style="display: none;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Rango de Fechas:</label>
                            <input type="text" class="form-control float-right" id="dateRangePicker">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Estado SRI:</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Seleccionar estados" style="width: 100%;" id="filterStatusSelect">
                                <option value="PENDIENTE_FACTURAR">Pendiente de Facturar</option>
                                <option value="ENVIADA_SRI">Enviada al SRI</option>
                                <option value="AUTORIZADA">Autorizada</option>
                                <option value="NO_AUTORIZADA">No Autorizada</option>
                                <option value="ANULADA">Anulada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tipo Comprobante:</label>
                            <select class="form-control" id="filterDocType">
                                <option value="">Todos</option>
                                <option value="FACTURA">Factura</option>
                                <option value="NC">Nota de Crédito</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" id="btnApplyAdvancedFilters"><i class="fas fa-filter"></i> Aplicar</button>
                        <button type="button" class="btn btn-default" id="btnClearAdvancedFilters"><i class="fas fa-undo"></i> Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

---

<section class="content">
    <div class="container-fluid">
        <div id="facturasContainer" class="row">
            <div class="col-12 text-center" id="loadingCards" style="display: none;">
                <div class="spinner-border text-primary" role="status"><span class="sr-only">Cargando...</span></div>
                <p class="mt-2">Cargando facturas...</p>
            </div>
            <div class="col-12 text-center" id="noResultsFound" style="display: none;">
                <p class="lead"><i class="fas fa-info-circle"></i> No se encontraron facturas con los criterios seleccionados.</p>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination" id="paginationControls">
                    </ul>
            </nav>
        </div>
    </div>
</section>

---

<div class="modal fade" id="modalFactura" tabindex="-1" role="dialog" aria-labelledby="modalFacturaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFacturaLabel">Gestionar Factura: <span id="modalFacturaNumero"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-justified mb-3" id="invoiceTabModal" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="modal-datosGenerales-tab" data-toggle="tab" href="#modal-datosGenerales" role="tab" aria-controls="modal-datosGenerales">1. Datos Generales</a></li>
                    <li class="nav-item"><a class="nav-link" id="modal-detalles-tab" data-toggle="tab" href="#modal-detalles" role="tab" aria-controls="modal-detalles">2. Detalles</a></li>
                    <li class="nav-item"><a class="nav-link" id="modal-totalesPagos-tab" data-toggle="tab" href="#modal-totalesPagos" role="tab" aria-controls="modal-totalesPagos">3. Totales y Pagos</a></li>
                    <li class="nav-item"><a class="nav-link" id="modal-estadoSRI-tab" data-toggle="tab" href="#modal-estadoSRI" role="tab" aria-controls="modal-estadoSRI">4. Procesamiento SRI</a></li>
                    <li class="nav-item"><a class="nav-link" id="modal-envioCorreo-tab" data-toggle="tab" href="#modal-envioCorreo" role="tab" aria-controls="modal-envioCorreo">5. Envío Correo</a></li>
                </ul>

                <div class="tab-content mt-3" id="invoiceTabContentModal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </div>
        </div>
    </div>
</div>

---

### Consideraciones Adicionales UI/UX:

* **Librerías Adicionales:**
    * **Date Range Picker:** Para el selector de fechas avanzado (`https://www.daterangepicker.com/`).
    * **Select2:** Para el filtro de estado multiselección (`https://select2.org/`).
    * **Moment.js:** A menudo útil para trabajar con fechas si usas Date Range Picker.c
* **JavaScript para el Flujo:**
    * Necesitarás un JS que cargue los datos de las **tarjetas de resumen** (`countPendientes`, etc.) al inicio.
    * Otro JS para **generar las tarjetas de factura dinámicamente** dentro del `#facturasContainer`, basándose en los datos que recibas de tu endpoint de listar.
    * Manejar la **paginación personalizada** si no usas DataTables para el listado (si usas DataTables en el backend, puedes mantener la paginación de DataTables).
    * La lógica para abrir el modal y precargar los datos es la misma, pero ahora la activación viene del clic en un botón dentro de la tarjeta de factura.
    * **Manejo de estados:** Cuando una factura se autoriza o falla, asegúrate de actualizar la **tarjeta específica** en el listado (`#facturasContainer`) y las **tarjetas de resumen** del dashboard.

Este diseño, aunque requiere un poco más de trabajo inicial en el frontend para generar las tarjetas dinámicamente, ofrece una **experiencia de usuario superior** al ser más visual, interactivo y alineado con flujos de trabajo de paneles modernos.