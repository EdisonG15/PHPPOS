<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Empresa - Multi-Paso</title>
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 2rem; /* Add padding to body for overall spacing */
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            width: 100%; /* Make card take full width within its container */
            max-width: 1000px; /* Max width for consistency */
        }

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
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
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
        .stepper-line:nth-child(1) { left: calc(5% + 55px/2); width: calc((100% - 10%)/2 - 55px); }
        .stepper-line:nth-child(2) { left: calc(5% + 55px/2 + (100% - 10%)/2); width: calc((100% - 10%)/2 - 55px); }


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
        .stepper-item.completed + .stepper-line {
            background-color: #28a745; /* Green line */
        }
        .stepper-item:first-child.completed + .stepper-line {
            background-color: #28a745; /* Green line for the first segment if first is completed */
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
            .stepper-item + .stepper-item::before {
                content: '';
                position: absolute;
                left: 27px;
                top: -15px;
                height: calc(100% + 15px);
                width: 2px;
                background-color: #dee2e6;
                z-index: 0;
            }
            .stepper-item.completed + .stepper-item::before {
                background-color: #28a745;
            }
        }

        /* Form Step Transition */
        .form-step {
            display: none;
            animation: fadeIn 0.5s ease-out;
            padding: 2rem; /* Add padding to form steps */
        }

        .form-step.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 18px;
            border: 1px solid #e0e0e0;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #8c72cf;
            box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.2);
            outline: none;
        }

        /* Input validation styling */
        .form-control.is-invalid, .form-select.is-invalid {
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
        .form-control.is-invalid + .invalid-feedback {
            display: block;
        }
        .form-select.is-invalid + .invalid-feedback {
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
            width: 96px; /* Adjust as needed */
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
            display: block; /* Always show image placeholder */
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
</head>
<body>

<div class="container my-5">
    <div class="card shadow-lg">
        <!-- Header Section -->
        <div class="header-section d-flex flex-column flex-sm-row align-items-center justify-content-between">
            <!-- Logo and Title -->
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
                        <label for="nombre_comercial" class="form-label">Nombre Comercial</label>
                        <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial">
                    </div>
                    <div class="col-md-6">
                        <label for="ruc" class="form-label">RUC <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ruc" name="ruc" maxlength="13" required pattern="[0-9]{10}|[0-9]{13}">
                        <div class="invalid-feedback">
                            El RUC es requerido y debe tener 10 o 13 dígitos numéricos.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca">
                    </div>
                    <div class="col-md-6">
                        <label for="id_firma" class="form-label">ID Firma <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="id_firma" name="id_firma" required min="1">
                        <div class="invalid-feedback">
                            El ID de Firma es requerido y debe ser un número válido.
                        </div>
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
                        <label for="direccion_sucursal" class="form-label">Dirección Sucursal</label>
                        <textarea class="form-control" id="direccion_sucursal" name="direccion_sucursal" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Ingrese una dirección de correo electrónico válida.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-12">
                        <label for="mensaje" class="form-label">Mensaje (Opcional)</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="2"></textarea>
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
                        <label for="codigo_iva" class="form-label">Código IVA <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="codigo_iva" name="codigo_iva" required min="0">
                        <div class="invalid-feedback">
                            El Código IVA es requerido y debe ser un número válido.
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-outline-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                    <button type="submit" class="btn btn-success">Guardar Perfil <i class="fas fa-save ms-2"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Wrap the entire script in an IIFE to create a new scope
    (function() {
        var currentStep = 1; // Use 'var' to avoid redeclaration issues in some environments
        const formSteps = document.querySelectorAll('.form-step');
        const stepperItems = document.querySelectorAll('.stepper-item');
        const companyProfileForm = document.getElementById('companyProfileForm');

        // Function to update the form visibility and stepper
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

            // Update button visibility based on the current step's buttons
            const currentFormStepElement = formSteps[currentStep - 1];
            const prevBtn = currentFormStepElement.querySelector('.prev-step');
            const nextBtn = currentFormStepElement.querySelector('.next-step');
            const submitBtn = currentFormStepElement.querySelector('[type="submit"]');

            // Hide all navigation buttons within form steps first
            document.querySelectorAll('.form-step .prev-step, .form-step .next-step, .form-step [type="submit"]').forEach(btn => btn.classList.add('d-none'));

            // Show the specific buttons for the current step
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

        // Function to validate the current step's inputs
        function validateCurrentStep() {
            const currentFormStep = formSteps[currentStep - 1];
            // Select all required inputs, selects, and textareas within the current step that are not hidden
            const requiredInputs = currentFormStep.querySelectorAll('input[required]:not([type="hidden"]):not([type="radio"]), select[required], textarea[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            // Specific validation for radio buttons (obligado_contabilidad, ambiente)
            if (currentStep === 3) {
                const radioObligadoContabilidad = document.querySelectorAll('input[name="obligado_contabilidad"]');
                const radioAmbiente = document.querySelectorAll('input[name="ambiente"]');

                let isContabilidadSelected = Array.from(radioObligadoContabilidad).some(radio => radio.checked);
                if (!isContabilidadSelected) {
                    // Find the invalid feedback for this group and show it. This might require a dedicated div.
                    // For now, we'll just mark the first radio as invalid.
                    radioObligadoContabilidad[0].classList.add('is-invalid');
                    radioObligadoContabilidad[0].closest('div').querySelector('.invalid-feedback').style.display = 'block';
                    isValid = false;
                } else {
                    radioObligadoContabilidad[0].classList.remove('is-invalid');
                    radioObligadoContabilidad[0].closest('div').querySelector('.invalid-feedback').style.display = 'none';
                }

                let isAmbienteSelected = Array.from(radioAmbiente).some(radio => radio.checked);
                if (!isAmbienteSelected) {
                    radioAmbiente[0].classList.add('is-invalid');
                    radioAmbiente[0].closest('div').querySelector('.invalid-feedback').style.display = 'block';
                    isValid = false;
                } else {
                    radioAmbiente[0].classList.remove('is-invalid');
                    radioAmbiente[0].closest('div').querySelector('.invalid-feedback').style.display = 'none';
                }
            }


            return isValid;
        }

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
                // When going back, remove validation state from the step being left
                const previousFormStep = formSteps[currentStep - 1];
                previousFormStep.querySelectorAll('.is-invalid').forEach(input => {
                    input.classList.remove('is-invalid');
                });
                // Also hide invalid feedback for radio buttons when navigating back
                previousFormStep.querySelectorAll('.invalid-feedback').forEach(feedback => {
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
                // Allow direct navigation to previous or current step if it's valid
                if (stepToGo < currentStep) {
                    // When going back, remove validation state from the step being left
                    const previousFormStep = formSteps[currentStep - 1];
                    previousFormStep.querySelectorAll('.is-invalid').forEach(input => {
                        input.classList.remove('is-invalid');
                    });
                    previousFormStep.querySelectorAll('.invalid-feedback').forEach(feedback => {
                        feedback.style.display = 'none';
                    });
                    currentStep = stepToGo;
                    updateFormSteps();
                } else if (stepToGo === currentStep) {
                    // Do nothing, already on this step
                } else { // Trying to go forward
                    if (validateCurrentStep()) { // Validate current step before allowing to go forward
                        currentStep = stepToGo;
                        updateFormSteps();
                    }
                }
            });
        });

        // Function to preview the selected logo
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = reader.result;
                output.style.display = 'block'; // Show the image
                placeholderText.style.display = 'none'; // Hide the text

                // For demonstration, set a placeholder URL in the hidden input.
                // In a real application, you'd upload this to a server and get the URL.
                document.getElementById('logo_url').value = 'https://example.com/path/to/uploaded/company_logo.png';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            } else {
                // If no file selected, revert to placeholder
                const output = document.getElementById('logo-preview');
                const placeholderText = document.getElementById('logo-placeholder-text');
                output.src = "https://placehold.co/96x96/e0e0e0/555555?text=Logo";
                output.style.display = 'block';
                placeholderText.style.display = 'block';
                document.getElementById('logo_url').value = '';
            }
        }

        // Handle form submission (for the last step)
        companyProfileForm.addEventListener('submit', function(event) {
            if (!validateCurrentStep()) { // Validate last step before final submission
                event.preventDefault(); // Prevent default form submission if invalid
                event.stopPropagation();
            } else {
                event.preventDefault(); // Prevent default form submission for AJAX

                console.log('Form Submitted!');
                const formData = new FormData(this);
                const data = {};
                for (let [key, value] of formData.entries()) {
                    data[key] = value;
                }
                console.log(data); // Log collected form data

                alert('¡Formulario enviado con éxito! Revisa la consola para los datos.'); // For demonstration
            }
            companyProfileForm.classList.add('was-validated'); // Add Bootstrap's was-validated class to show browser's validation styles
        });

        // Trigger click on logo area to allow file selection
        document.getElementById('logo-upload-area').addEventListener('click', function() {
            document.getElementById('logo-upload').click();
        });

        // Initial setup on page load
        updateFormSteps();
    })(); // IIFE ends here
</script>
</body>
</html>
