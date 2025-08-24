<br>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
<style>
    /* Header Specific Styles */
    .header-section {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e0e0e0;
    }

    /* Stepper Styles (reused from modal, adjusted for full page context) */
    .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        position: relative;
        padding: 0 5%;
        margin-bottom: 2rem;
        flex-wrap: wrap;
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
        color: inherit;
        min-width: 120px;
        margin-bottom: 1rem;
    }

    .stepper-icon-container {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background-color: #e9ecef;
        font-size: 1.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        border: 2px solid #e9ecef;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .stepper-icon {
        color: #6c757d;
    }

    .stepper-label {
        text-align: center;
        font-size: 0.9rem;
        color: #495057;
        margin-top: 10px;
        font-weight: 500;
        line-height: 1.2;
    }

    .stepper-sublabel {
        font-size: 0.75rem;
        color: #adb5bd;
        font-weight: 400;
    }

    .stepper-item.active .stepper-icon-container {
        background-color: #6f42c1;
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
        height: 2px;
        background-color: #dee2e6;
        top: 27px;
        left: 5%;
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
        }

        .stepper-item+.stepper-item::before {
            content: '';
            position: absolute;
            left: 27px;
            top: -15px;
            height: calc(100% + 15px);
            width: 2px;
            background-color: #dee2e6;
            z-index: 0;
        }

        .stepper-item.completed+.stepper-item::before {
            background-color: #28a745;
        }
    }

    /* Form Step Transition */
    .form-step {
        display: none;
        animation: fadeIn 0.5s ease-out;
        padding: 2rem;
        /* Add padding to form steps */
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

    /* Logo upload styles for header */
    .logo-upload-container {
        width: 96px;
        /* Adjust as needed */
        height: 96px;
        border-radius: 50%;
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
        object-fit: cover;
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
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Datos Empresa </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <br>
                        </div>
                        <hr />
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table id="tb_empresa" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                                    <thead class="bg-dark ">
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Razón Social</th>
                                            <th>Nombre Comercial</th>
                                            <th>RUC</th>
                                            <th>Marca</th>
                                            <th>ID Firma</th>
                                            <th>Dirección Matriz</th>
                                            <th>Dirección Sucursal</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Mensaje</th>
                                            <th>Contribuyente Especial</th>
                                            <th>Obligado Contabilidad</th>
                                            <th>Ambiente</th>
                                            <th>Tipo Emisión</th>
                                            <th>Cod. Establecimiento</th>
                                            <th>Cod. Punto Emisión</th>
                                            <th>Secuencial</th>
                                            <th>Código IVA</th>
                                            <th>Logo</th>
                                            <th>Serie Boleta</th>
                                            <th>Correlativo Ventas</th>
                                            <th>Correlativo Compras</th>
                                            <th>Estado</th>
                                            <th class="text-center">Opciones</th> <!-- Campo 'opc' -->
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarEmpresa" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarEmpresaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-ancho-personalizad">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarEmpresaLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="header-section d-flex flex-column flex-sm-row align-items-center justify-content-between">
                <!-- Logo and Title -->
                <input type="hidden" id="id_empresa" name="id_empresa" value="0">
                <div class="d-flex flex-column flex-sm-row align-items-center space-y-4 space-sm-y-0 space-sm-x-3 mb-4 mb-sm-0">
                    <div class="logo-upload-container me-3" id="logo-upload-area">
                        <img id="logo-preview" src="https://placehold.co/96x96/e0e0e0/555555?text=Logo" alt="Company Logo" class="rounded-circle">
                        <span id="logo-placeholder-text" class="logo-upload-text">Subir Logo</span>
                        <div class="logo-upload-overlay">
                            <i class="fas fa-upload fa-2x mb-2"></i>
                            <span>Cambiar Logo</span>
                        </div>
                        <input type="file" id="logo-upload" name="logo_file" accept="image/*" class="d-none" onchange="previewLogo(event)">
                    </div>
                    <div class="d-flex flex-column align-items-center align-items-sm-start text-center text-sm-start">
                        <h1 class="h3 font-weight-bold text-gray-800">Perfil de Empresa</h1>
                        <p class="h5 text-muted mt-1">Facturación Electrónica</p>
                    </div>
                </div>
                <p class="text-muted text-center text-sm-end">Administra la información de tu empresa</p>
            </div>

            <!-- Stepper Navigation -->
            <div class="stepper-wrapper mt-5 mb-5">
                <a class="stepper-item active" data-step="1">
                    <div class="stepper-icon-container">
                        <i class="fas fa-info stepper-icon"></i> <!-- General Info icon -->
                    </div>
                    <div class="stepper-label text-center">Información <br> <span class="stepper-sublabel">General</span></div>
                </a>
                <div class="stepper-line"></div>
                <a class="stepper-item" data-step="2">
                    <div class="stepper-icon-container">
                        <i class="fas fa-map-marker-alt stepper-icon"></i> <!-- Address Info icon -->
                    </div>
                    <div class="stepper-label text-center">Contacto y <br> <span class="stepper-sublabel">Dirección</span></div>
                </a>
                <div class="stepper-line"></div>
                <a class="stepper-item" data-step="3">
                    <div class="stepper-icon-container">
                        <i class="fas fa-file-invoice-dollar stepper-icon"></i> <!-- Tax Info icon -->
                    </div>
                    <div class="stepper-label text-center">Impuestos y <br> <span class="stepper-sublabel">Emisión</span></div>
                </a>
            </div>

            <form id="companyProfileForm" class="needs-validation" novalidate>
                <!-- Hidden input for logo URL (this is what you'd save to the database) -->
                <input type="hidden" id="logo_url" name="logo_url">

                <!-- Step 1: Información General -->
                <div class="form-step active" data-step="1">
                    <h4 class="mb-3 form-title">Información General</h4>
                    <p class="form-subtitle">Detalles básicos de tu empresa.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="razon_social" class="form-label">Razon Social <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                            <div class="invalid-feedback">
                                La Razón Social es requerida.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre_comercial" class="form-label">Nombre Comercial <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" required>
                            <div class="invalid-feedback">
                                La Nombre Comercial es requerido.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ruc" class="form-label">RUC <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ruc" name="ruc" maxlength="13" required pattern="[0-9]{10}|[0-9]{13}">
                            <div class="invalid-feedback">
                                El RUC es requerido y debe tener 10 o 13 dígitos numéricos.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="marca" class="form-label">Marca <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                            <div class="invalid-feedback">
                                La Marca es requerido.
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="id_firma" class="form-label">ID Firma <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="id_firma" name="id_firma" required min="1">
                            <div class="invalid-feedback">
                                El ID de Firma es requerido y debe ser un número válido.
                            </div>
                        </div> -->

                          <div class="col-md-6">
                            <label for="forma_pago" class="form-label small">Forma de Pago </label>
                            <select class="form-select form-select-sm" id="forma_pago" name="forma_pago" required>
                                <option value="">Seleccione...</option>
                                <option value="01">SIN UTILIZACION DEL SISTEMA FINANCIERO</option>
                                <option value="15">COMPENSACIÓN DE DEUDAS</option>
                                <option value="16">TARJETA DE DÉBITO</option>
                                <option value="17">DINERO ELECTRÓNICO</option>
                                <option value="18">TARJETA PREPAGO</option>
                                <option value="19">TARJETA DE CRÉDITO</option>
                                <option value="20">OTROS CON UTILIZACIÓN DEL SISTEMA FINANCIERO</option>
                                <option value="21">ENDOSO DE TÍTULOS</option>
                            </select>
                            <div class="invalid-feedback">Seleccione El Código IVA es requerido.</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                    </div>
                </div>

                <!-- Step 2: Contacto y Dirección -->
                <div class="form-step" data-step="2">
                    <h4 class="mb-3 form-title">Información de Contacto y Dirección</h4>
                    <p class="form-subtitle">Detalles para comunicarte con tus clientes.</p>
                    <div class="row g-4">
                        <div class="col-12">
                            <label for="direccion_matriz" class="form-label">Dirección Matriz <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="direccion_matriz" name="direccion_matriz" rows="2" required></textarea>
                            <div class="invalid-feedback">
                                La Dirección Matriz es requerida.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="direccion_sucursal" class="form-label">Dirección Sucursal <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="direccion_sucursal" name="direccion_sucursal" rows="2" required></textarea>
                            <div class="invalid-feedback">
                                La Dirección Sucursal es requerida.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Ingrese una dirección de correo electrónico válida.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            <div class="invalid-feedback">
                                Ingrese el numero Teléfono .
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="mensaje" class="form-label">Mensaje <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="2" required></textarea>
                            <div class="invalid-feedback">
                                Ingrese un Mensaje .
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                        <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                    </div>
                </div>

                <!-- Step 3: Impuestos y Emisión -->
                <div class="form-step" data-step="3">
                    <h4 class="mb-3 form-title">Información de Impuestos y Emisión</h4>
                    <p class="form-subtitle">Configuración fiscal y de facturación electrónica.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="contribuyente_especial" class="form-label">Contribuyente Especial</label>
                            <input type="text" class="form-control" id="contribuyente_especial" name="contribuyente_especial">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Obligado a Contabilidad <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obligado_contabilidad" id="radioSiContabilidad" value="SI" required>
                                    <label class="form-check-label" for="radioSiContabilidad">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obligado_contabilidad" id="radioNoContabilidad" value="NO" required>
                                    <label class="form-check-label" for="radioNoContabilidad">No</label>
                                </div>
                                <div class="invalid-feedback">
                                    Debe seleccionar si está obligado a contabilidad.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ambiente <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ambiente" id="radioAmbientePruebas" value="1" required>
                                    <label class="form-check-label" for="radioAmbientePruebas">1 (Pruebas)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ambiente" id="radioAmbienteProduccion" value="2" required>
                                    <label class="form-check-label" for="radioAmbienteProduccion">2 (Producción)</label>
                                </div>
                                <div class="invalid-feedback">
                                    Debe seleccionar el ambiente de emisión.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_emision" class="form-label">Tipo Emisión <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tipo_emision" name="tipo_emision" maxlength="1" required pattern="[1-9]">
                            <div class="invalid-feedback">
                                El Tipo de Emisión es requerido (1 dígito numérico).
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="establecimiento_codigo" class="form-label">Código Establecimiento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="establecimiento_codigo" name="establecimiento_codigo" maxlength="3" required pattern="[0-9]{3}">
                            <div class="invalid-feedback">
                                El Código de Establecimiento es requerido (3 dígitos numéricos).
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="punto_emision_codigo" class="form-label">Código Punto Emisión <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="punto_emision_codigo" name="punto_emision_codigo" maxlength="3" required pattern="[0-9]{3}">
                            <div class="invalid-feedback">
                                El Código de Punto de Emisión es requerido (3 dígitos numéricos).
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="secuencial" class="form-label">Secuencial <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="secuencial" name="secuencial" required min="1">
                            <div class="invalid-feedback">
                                El Secuencial es requerido y debe ser un número válido.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="codigo_iva" class="form-label small">Código IVA </label>
                            <select class="form-select form-select-sm" id="codigo_iva" name="codigo_iva" required>
                                <option value="">Seleccione...</option>
                                <option value="0">0</option>
                                <option value="2">12</option>
                                <option value="3">14</option>
                                <option value="4">15</option>
                                <option value="5">5</option>
                            </select>
                            <div class="invalid-feedback">Seleccione El Código IVA es requerido.</div>
                        </div>
                        <!-- <div class="col-md-6">
                        <label for="codigo_iva" class="form-label">Código IVA <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="codigo_iva" name="codigo_iva" required min="0">
                        <div class="invalid-feedback">
                            El Código IVA es requerido y debe ser un número válido.
                        </div>
                    </div> -->
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                        <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save ms-2"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var accion;
    var table_empresa;


    (function() {
        var currentStep = 1;
        const formSteps = document.querySelectorAll('.form-step');
        const stepperItems = document.querySelectorAll('.stepper-item');
        const companyProfileForm = document.getElementById('companyProfileForm');

        // Función para actualizar la visibilidad del formulario y el paso a paso
        function updateFormSteps() {
            formSteps.forEach(step => step.classList.remove('active'));
            formSteps[currentStep - 1].classList.add('active');

            stepperItems.forEach((item, index) => {
                item.classList.remove('active', 'completed');
                if (index + 1 === currentStep) {
                    item.classList.add('active');
                } else if (index + 1 < currentStep) {
                    item.classList.add('completed');
                }
            });

            // Ocultar primero todos los botones de navegación dentro de los pasos del formulario
            document.querySelectorAll('.form-step .prev-step, .form-step .next-step, .form-step [type="submit"]').forEach(btn => btn.classList.add('d-none'));

            // Mostrar los botones específicos para el paso actual
            const currentFormStepElement = formSteps[currentStep - 1];
            const prevBtn = currentFormStepElement.querySelector('.prev-step');
            const nextBtn = currentFormStepElement.querySelector('.next-step');
            const submitBtn = currentFormStepElement.querySelector('[type="submit"]');

            if (prevBtn) {
                prevBtn.classList.remove('d-none');
            }
            if (nextBtn) {
                nextBtn.classList.remove('d-none');
            }
            if (submitBtn) {
                submitBtn.classList.remove('d-none');
            }
        }

        // Función para validar un solo campo de entrada
        function validateInput(input) {
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
                return false;
            } else {
                input.classList.remove('is-invalid');
                return true;
            }
        }

        // Función para validar grupos de botones de opción específicamente
        function validateRadioGroup(radioGroupSelector, feedbackSelector) {
            const radioButtons = document.querySelectorAll(radioGroupSelector);
            const feedbackElement = document.querySelector(feedbackSelector);
            let isSelected = Array.from(radioButtons).some(radio => radio.checked);

            if (!isSelected) {
                radioButtons.forEach(radio => radio.classList.add('is-invalid')); // Marcar todas las radios del grupo como inválidas
                if (feedbackElement) feedbackElement.style.display = 'block';
                return false;
            } else {
                radioButtons.forEach(radio => radio.classList.remove('is-invalid'));
                if (feedbackElement) feedbackElement.style.display = 'none';
                return true;
            }
        }

        // Function to validate the current step's inputs
        function validateCurrentStep() {
            const currentFormStep = formSteps[currentStep - 1];
            const requiredInputs = currentFormStep.querySelectorAll('input[required]:not([type="hidden"]):not([type="radio"]), select[required], textarea[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!validateInput(input)) {
                    isValid = false;
                }
            });

            // Specific validation for radio buttons (obligado_contabilidad, ambiente)
            if (currentStep === 3) {
                if (!validateRadioGroup('input[name="obligado_contabilidad"]', '#radioSiContabilidad + label + .invalid-feedback')) {
                    isValid = false;
                }
                if (!validateRadioGroup('input[name="ambiente"]', '#radioAmbientePruebas + label + .invalid-feedback')) {
                    isValid = false;
                }
            }

            return isValid;
        }

        // Add event listeners for instant validation feedback
        formSteps.forEach(step => {
            // For text inputs, textareas, and selects
            step.querySelectorAll('input:not([type="hidden"]):not([type="radio"]), select, textarea').forEach(input => {
                input.addEventListener('input', function() {
                    // Only validate on input if it has already been marked as invalid
                    if (this.classList.contains('is-invalid')) {
                        validateInput(this);
                    }
                });
                // Add a blur event to validate when the user leaves the field
                input.addEventListener('blur', function() {
                    validateInput(this);
                });
            });

            // For radio buttons, listen for 'change' event
            step.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Re-validate the entire group when a radio button changes
                    if (this.name === 'obligado_contabilidad') {
                        validateRadioGroup('input[name="obligado_contabilidad"]', '#radioSiContabilidad + label + .invalid-feedback');
                    } else if (this.name === 'ambiente') {
                        validateRadioGroup('input[name="ambiente"]', '#radioAmbientePruebas + label + .invalid-feedback');
                    }
                });
            });
        });

        // Event Listeners for Navigation Buttons
        companyProfileForm.addEventListener('click', (event) => {
            if (event.target.classList.contains('next-step')) {
                if (validateCurrentStep()) {
                    if (currentStep < formSteps.length) {
                        currentStep++;
                        updateFormSteps();
                    }
                }
            } else if (event.target.classList.contains('prev-step')) {
                // When going back, clear validation state for the step being left
                const currentFormStepElement = formSteps[currentStep - 1];
                currentFormStepElement.querySelectorAll('.is-invalid').forEach(input => {
                    input.classList.remove('is-invalid');
                });
                currentFormStepElement.querySelectorAll('.invalid-feedback').forEach(feedback => {
                    feedback.style.display = 'none';
                });

                if (currentStep > 1) {
                    currentStep--;
                    updateFormSteps();
                }
            }
        });

        // Event listener for stepper item clicks (direct navigation)
        stepperItems.forEach(item => {
            item.addEventListener('click', () => {
                const stepToGo = parseInt(item.dataset.step);

                // Allow direct navigation to previous steps or the current step without re-validation
                if (stepToGo <= currentStep) {
                    // When going back, clear validation state for the step being left
                    const currentFormStepElement = formSteps[currentStep - 1];
                    currentFormStepElement.querySelectorAll('.is-invalid').forEach(input => {
                        input.classList.remove('is-invalid');
                    });
                    currentFormStepElement.querySelectorAll('.invalid-feedback').forEach(feedback => {
                        feedback.style.display = 'none';
                    });
                    currentStep = stepToGo;
                    updateFormSteps();
                } else { // Trying to go forward
                    if (validateCurrentStep()) { // Validate current step before allowing to go forward
                        currentStep = stepToGo;
                        updateFormSteps();
                    }
                }
            });
        });

        // Function to preview the selected logo
        window.previewLogo = function(event) { // Make it global or ensure it's accessible
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = reader.result;
                output.style.display = 'block';
                placeholderText.style.display = 'none';
                document.getElementById('logo_url').value = 'https://example.com/path/to/uploaded/company_logo.png'; // Placeholder
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            } else {
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = "https://placehold.co/96x96/e0e0e0/555555?text=Logo";
                output.style.display = 'block';
                placeholderText.style.display = 'block';
                document.getElementById('logo_url').value = '';
            }
        };

        
    // --- FUNCIÓN MEJORADA: Limpiar el formulario y resetear al primer paso ---
    function clearForm() {
        // 1. Reiniciar todos los campos del formulario
        companyProfileForm.reset();

        // 2. Limpiar estilos de validación y mensajes de error
        companyProfileForm.classList.remove('was-validated');
        companyProfileForm.querySelectorAll('.is-invalid').forEach(input => {
            input.classList.remove('is-invalid');
            const feedbackElement = input.nextElementSibling;
            if (feedbackElement && feedbackElement.classList.contains('invalid-feedback') && feedbackElement.dataset.originalMessage) {
                feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
            }
        });

        // 3. Restablecer campos específicos que 'reset()' no maneja como queremos
        // Por ejemplo, las contraseñas si no quieres que vuelvan a '********'
        document.getElementById('password').value = '';
        document.getElementById('confirmPassword').value = '';

        // 4. Restablecer el logo a su estado inicial
        const logoPreview = document.getElementById('logo-preview');
        const logoPlaceholderText = document.getElementById('logo-placeholder-text');
        logoPreview.src = 'https://placehold.co/96x96/e0e0e0/555555?text=Logo'; // Restablece a la imagen por defecto
        logoPreview.style.display = 'block'; // Asegura que el placeholder esté visible
        logoPlaceholderText.style.display = 'block'; // Asegura que el texto "Subir Logo" esté visible si la imagen es el placeholder
        document.getElementById('logo_url').value = ''; // Limpiar la URL del logo oculta
        document.getElementById('id_empresa').value = '0'; // Restablecer ID a 0 para un nuevo registro

        // 5. Restablecer el estado del stepper y del formulario al primer paso
        currentStep = 1;
        updateFormSteps(); // Esto re-renderizará el formulario al primer paso y activará el stepper item 1
 console.log('currentStep después de limpiar:', currentStep); 
        console.log('Formulario limpiado y restablecido a los valores predeterminados y al primer paso.');
    }

        // Handle form submission (for the last step)
        companyProfileForm.addEventListener('submit', function(event) {
            if (!validateCurrentStep()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault(); // Prevent default form submission for AJAX

                console.log('Form Submitted!');

                const datos = new FormData();

                // Obtén el ID de la empresa del campo oculto
                const idEmpresa = document.getElementById('id_empresa').value;
                datos.append('id_empresa', idEmpresa); // Envía el ID de la empresa al backend

                // Anexa todos los demás datos de los campos de texto
                for (let [key, value] of new FormData(this).entries()) {
                    // Excluimos 'id_empresa' porque ya lo añadimos, y los inputs de logo
                    if (key !== 'id_empresa' && key !== 'logo_url' && key !== 'logo_file') {
                        datos.append(key, value);
                    }
                }

                const logoFileInput = document.getElementById('logo-upload');
                const existingLogoUrl = document.getElementById('logo_url').value; // Contiene la URL actual si no se ha cambiado

                // Lógica para el logo:
                if (logoFileInput.files.length > 0) {
                    // Caso 1: El usuario seleccionó un nuevo archivo de logo
                    datos.append('logo_file', logoFileInput.files[0]);
                    // Opcional: Si quieres eliminar el logo anterior en el backend, puedes enviar su ruta aquí
                    // datos.append('old_logo_path', existingLogoUrl);
                } else {

                    datos.append('logo_path_current', existingLogoUrl); // Envía la URL actual que ya está en DB o es vacía
                }

                // Anexa la acción
                datos.append("accion", 2); // Esto sigue siendo "registrar" para el AJAX, el SP decide si es INSERT o UPDATE

                // ... (El console.log para depuración, y luego tu llamada AJAX)
                for (let [key, value] of datos.entries()) {
                    if (value instanceof File) {
                        console.log(`${key}: File (Name: ${value.name}, Type: ${value.type}, Size: ${value.size} bytes)`);
                    } else {
                        console.log(`${key}: ${value}`);
                    }
                }
                console.log("---------------------------------------");


                Swal.fire({
                    title: 'Está seguro de registrar empresa?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo registrarla',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (!result.isConfirmed) return;
                    $.ajax({
                        url: "ajax/empresa.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            mostrarAlertaRespuesta(respuesta, function() {
                                table_empresa.ajax.reload();

                                $("#mdlGestionarEmpresa").modal('hide');
                                eliminarDatosFormulario()
                            }, {
                                mensajeExito: "éxito",
                                mensajeAdvertencia: "Warning",
                                mensajeError: "Excepción"
                            });
                        },
                        error: manejarErrorAjax
                    });
                });


                // alert('¡Formulario enviado con éxito! Revisa la consola para los datos.');
            }
            companyProfileForm.classList.add('was-validated');
        });

        // Trigger click on logo area to allow file selection
        document.getElementById('logo-upload-area').addEventListener('click', function() {
            document.getElementById('logo-upload').click();
        });

        // Initial setup on page load
        updateFormSteps();
    })();




    $(document).ready(function() {
        // Listar
        //=====================================================================================================
        table_empresa = $("#tb_empresa").DataTable({

            dom: 'Bfrtip', //botoneras en la parte superios
            buttons: [{

                    text: 'Agregar Empresa',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        $("#mdlGestionarEmpresa").modal('show');
                        accion = 2; //registrar



                    }
                },

   {
    extend: 'excel',
    exportOptions: {
      columns: [2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]  // ✅ solo estas columnas en horizontal
    }
  },
  {
    extend: 'pdfHtml5',
    orientation: 'landscape', // 👉 horizontal
    pageSize: 'A4',
    exportOptions: {
      columns: [2,3,4,5,7,8,9]
    }
  },
  {
    extend: 'print',
    exportOptions: {
      columns: [2,3,4,5,7,8,9]
    }
  },
  'pageLength'
   
            ],
            //   pageLength: [5, 10, 15, 30, 50, 100],
            //   pageLength: 5,

            ajax: {

                url: "ajax/empresa.ajax.php",
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

                {
                    targets: 1,
                    visible: false
                },
                {
                    targets: 3,
                    visible: false
                },
                {
                    targets: 5,
                    visible: false
                },
                {
                    targets: 6,
                    visible: false
                },
                {
                    targets: 7,
                    visible: false
                },
                {
                    targets: 8,
                    visible: false
                },
                {
                    targets: 9,
                    visible: false
                },
                {
                    targets: 11,
                    visible: false
                },
                {
                    targets: 12,
                    visible: false
                },
                {
                    targets: 13,
                    visible: false
                },
                {
                    targets: 15,
                    visible: false
                },
                {
                    targets: 16,
                    visible: false
                },
                {
                    targets: 17,
                    visible: false
                },
                {
                    targets: 18,
                    visible: false
                },
                {
                    targets: 19,
                    visible: false
                },
                {
                    targets: 20,
                    visible: false
                },
                {
                    targets: 21,
                    visible: false
                },
                // {  targets: 20,   visible: false },
                // {  targets: 20,   visible: false },
                {
                    targets: 24,
                    sortable: false,
                    className: "text-center",
                    render: function(data) {
                        return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                    }

                },

                {
                    targets: 25,
                    orderable: false, // no ordenar
                    render: function(data, type, full, meta) {
                        return `
      <div class="dropdown text-center">
        <button class="btn btn-light btn-sm rounded-circle p-1" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px; height: 30px;">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
          <li>
            <a class="dropdown-item btnEditar" href="#" data-id="${full.id_Empresa}" title="Editar" style="cursor:pointer;">
              <i class="fas fa-edit"></i> Editar
            </a>
          </li>
          <li>
            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_Empresa}" title="Eliminar" style="cursor:pointer;">
              <i class="fas fa-trash-alt"></i> Eliminar
            </a>
          </li>
        </ul>
      </div>
    `;
                    }
                }

            ],
            "order": [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20, 50],
            "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });


        $('#tb_empresa tbody').on('click', '.btnEditar', function() {

            // 1. Establecemos la acción para editar (ya lo tienes)
            accion = 3;

            // 2. Obtenemos los datos de la fila seleccionada (ya lo tienes)
            var data = table_empresa.row($(this).parents('tr')).data();
            console.log("Datos de la empresa para editar:", data); // ¡Siempre bueno para depurar!

            // 3. Rellenamos el campo oculto id_empresa
            // Asegúrate de que el ID del input oculto sea 'id_empresa'
            document.getElementById('id_empresa').value = data.id_Empresa; // Asumiendo que la columna es 'id_Empresa'

            // 4. Rellenamos los demás campos de texto e inputs
            document.getElementById('razon_social').value = data.razon_social;
            document.getElementById('nombre_comercial').value = data.nombre_comercial;
            document.getElementById('ruc').value = data.ruc;
            document.getElementById('marca').value = data.marca;
            // Para selects, si tienes un id_firma, selecciona la opción correcta
            document.getElementById('forma_pago').value = data.forma_pago;
            document.getElementById('direccion_matriz').value = data.direccion_matriz;
            document.getElementById('direccion_sucursal').value = data.direccion_sucursal;
            document.getElementById('email').value = data.email;
            document.getElementById('telefono').value = data.telefono;
            document.getElementById('mensaje').value = data.mensaje;
            document.getElementById('contribuyente_especial').value = data.contribuyente_especial;

            const radiosObligado = document.querySelectorAll('input[name="obligado_contabilidad"]');
            for (const radio of radiosObligado) {
                if (radio.value === data.obligado_contabilidad) {
                    radio.checked = true; // Marca el radio button que coincide con el valor de la base de datos
                    break; // Salimos del bucle una vez que encontramos la coincidencia
                }
            }

            // **Para 'ambiente' (asumiendo que los radios tienen name="ambiente")**
            const radiosAmbiente = document.querySelectorAll('input[name="ambiente"]');
            for (const radio of radiosAmbiente) {
                if (radio.value === data.ambiente) {
                    radio.checked = true; // Marca el radio button que coincide
                    break;
                }
            }
            document.getElementById('tipo_emision').value = data.tipo_emision;
            document.getElementById('establecimiento_codigo').value = data.establecimiento_codigo;
            document.getElementById('punto_emision_codigo').value = data.punto_emision_codigo;
            document.getElementById('secuencial').value = data.secuencial;
            document.getElementById('codigo_iva').value = data.codigo_iva;

            // 5. ¡Cargamos y mostramos la IMAGEN!
            const logoPreview = document.getElementById('logo-preview'); // El <img> donde se muestra la imagen
            const logoPlaceholderText = document.getElementById('logo-placeholder-text'); // El texto de placeholder
            const logoUrlInput = document.getElementById('logo_url'); // Tu input oculto para la URL actual

            if (data.logo_path && data.logo_path !== "") { // Si hay una ruta de logo guardada en la DB
                logoPreview.src = data.logo_path; // Establece la URL del <img>
                logoPreview.style.display = 'block'; // Muestra la imagen
                logoPlaceholderText.style.display = 'none'; // Oculta el texto de placeholder
                logoUrlInput.value = data.logo_path; // Guarda la ruta actual en el input oculto (para si no se cambia la img)
            } else {
                // Si no hay logo, muestra el placeholder o una imagen por defecto
                logoPreview.src = "https://placehold.co/96x96/e0e0e0/555555?text=Logo"; // Imagen por defecto
                logoPreview.style.display = 'block';
                logoPlaceholderText.style.display = 'block'; // Muestra el texto de placeholder
                logoUrlInput.value = ''; // Asegura que el input oculto esté vacío
            }

            // Opcional: Limpiar el input de tipo 'file' para que el usuario pueda seleccionar una nueva imagen
            // Esto es importante porque los inputs de tipo file no pueden ser "pre-llenados" por seguridad.
            document.getElementById('logo-upload').value = '';

            // 6. Finalmente, abrimos el modal
            $("#mdlGestionarEmpresa").modal('show');

            // Opcional: Reiniciar la validación del formulario si estás usando Bootstrap's 'was-validated'
            // Esto es para que no muestre errores de validación antiguos al abrir el modal
            const form = document.getElementById('companyProfileForm');
            form.classList.remove('was-validated');
            // Si tienes pasos, asegúrate de ir al primer paso si es un formulario con varios pasos
            // y resetear el estado de los indicadores de paso.

        })


        //EVENTO AL DAR CLICK EN EL BOTON ELIMINAR
        // =========================================================================================*/
        $('#tb_empresa tbody').on('click', '.btnEliminar', function() {

            accion = 3; //seteamos la accion para editar

            var data = table_empresa.row($(this).parents('tr')).data();

            var codigo = data[1];


            Swal.fire({
                title: 'Está seguro de eliminar el Empresa?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("Id_Empresa", codigo); //codigo_producto               
                    datos.append("estado", 2); //codigo_producto               

                    $.ajax({
                        url: "ajax/empresa.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {

                            mostrarAlertaRespuesta(respuesta, () => {
                                table_empresa.ajax.reload();


                            }, {
                                mensajeExito: 'eliminada con éxito',
                                mensajeAdvertencia: 'Warning',
                                mensajeError: 'error'
                            });
                        },
                        error: manejarErrorAjax

                    });

                }
            })
        })
    })

</script>