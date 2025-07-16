<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Gestión de Producto</title>
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
        }

        .modal-ancho-personalizad {
            max-width: 1000px; /* Ancho ajustado para el modal XL */
        }

        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .modal-header {
            border-bottom: none;
            padding: 1.5rem 2rem;
        }
        .modal-title {
            color: #fff;
        }
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .modal-body {
            padding: 2rem;
        }

        /* Stepper Styles */
        .stepper-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align items to the start to make titles align at top */
            position: relative;
            padding: 0 5%; /* Adjusted padding for better spacing within modal */
            margin-bottom: 2rem;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
        }

        .stepper-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
            flex-grow: 1;
            cursor: pointer;
            text-decoration: none; /* Remove default link underline */
            color: inherit; /* Inherit color */
            min-width: 120px; /* Minimum width for each item to prevent squishing */
            margin-bottom: 1rem; /* Space between wrapped items */
        }

        .stepper-icon-container {
            width: 55px;
            height: 55px;
            border-radius: 50%; /* Circle shape */
            background-color: #e9ecef;
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            border: 2px solid #e9ecef;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Subtle shadow for icons */
        }

        .stepper-icon {
            color: #6c757d;
        }

        .stepper-label {
            text-align: center;
            font-size: 0.9rem; /* Smaller label for modal context */
            color: #495057;
            margin-top: 10px;
            font-weight: 500;
            line-height: 1.2;
        }

        .stepper-sublabel {
            font-size: 0.75rem; /* Even smaller sublabel */
            color: #adb5bd;
            font-weight: 400;
        }

        .stepper-item.active .stepper-icon-container {
            background-color: #6f42c1; /* Purple */
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
            width: calc(100% - 10%); /* Adjust to fit between icons */
            height: 2px;
            background-color: #dee2e6;
            top: 27px; /* Half of icon height + border */
            left: 5%; /* Start from padding edge */
            z-index: 0;
            transition: background-color 0.3s ease;
        }
        
        /* Specific line segments between icons */
        .stepper-line:nth-child(1) { left: calc(5% + 55px/2); width: calc((100% - 10%)/2 - 55px); }
        .stepper-line:nth-child(2) { left: calc(5% + 55px/2 + (100% - 10%)/2); width: calc((100% - 10%)/2 - 55px); }

        .stepper-item.completed .stepper-icon-container {
            background-color: #28a745; /* Green for completed */
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
                margin-left: 1rem; /* Adjust for small screen alignment */
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
                display: none; /* Hide horizontal lines on small screens */
            }
            .stepper-item + .stepper-item::before { /* Vertical line for small screens */
                content: '';
                position: absolute;
                left: 27px; /* Align with center of icon */
                top: -15px; /* Adjust to connect to previous item */
                height: calc(100% + 15px); /* Extend to connect */
                width: 2px;
                background-color: #dee2e6;
                z-index: 0;
            }
            .stepper-item.completed + .stepper-item::before {
                background-color: #28a745; /* Green vertical line for completed */
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

        /* Logo upload styles */
        .logo-upload-container {
            width: 100%;
            max-width: 350px;
            height: 250px; /* Keep original height for product image */
            border-radius: 15px; /* Slightly rounded corners for product image */
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
            object-fit: contain; /* Use contain for product image */
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

<!-- The button to trigger the modal (for demonstration purposes) -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdlGestionarProducto">
        Abrir Modal de Producto
    </button>
</div>


<div class="modal fade" id="mdlGestionarProducto" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-ancho-personalizad">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarProductoLabel">Agregar Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="modal-body p-4 overflow-auto" style="max-height: calc(100vh - 180px);">
                <!-- Stepper Navigation -->
                <div class="stepper-wrapper mb-5">
                    <a class="stepper-item active" data-step="1">
                        <div class="stepper-icon-container">
                            <i class="fas fa-box-open stepper-icon"></i> <!-- Product details icon -->
                        </div>
                        <div class="stepper-label text-center">Detalles <br> <span class="stepper-sublabel">del Producto</span></div>
                    </a>
                    <div class="stepper-line"></div>
                    <a class="stepper-item" data-step="2">
                        <div class="stepper-icon-container">
                            <i class="fas fa-dollar-sign stepper-icon"></i> <!-- Pricing icon -->
                        </div>
                        <div class="stepper-label text-center">Precios <br> <span class="stepper-sublabel">y Stock</span></div>
                    </a>
                    <div class="stepper-line"></div>
                    <a class="stepper-item" data-step="3">
                        <div class="stepper-icon-container">
                            <i class="fas fa-cogs stepper-icon"></i> <!-- Options icon -->
                        </div>
                        <div class="stepper-label text-center">Opciones <br> <span class="stepper-sublabel">Adicionales</span></div>
                    </a>
                </div>

                <form id="productForm" class="needs-validation" novalidate>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Logo upload area for product image -->
                                <label for="iptImagen" class="logo-upload-container mb-3" id="product-image-upload-area">
                                    <img id="previewImg" src="https://placehold.co/350x250/e9ecef/6c757d?text=No+Image" alt="Vista previa de la imagen">
                                    <span id="product-image-placeholder-text" class="logo-upload-text">Subir Imagen</span>
                                    <div class="logo-upload-overlay">
                                        <i class="fas fa-camera fa-2x mb-2"></i>
                                        <span>Cambiar Imagen</span>
                                    </div>
                                    <input type="file" class="form-control form-control-sm d-none" id="iptImagen" name="iptImagen" accept="image/*" onchange="previewFile(this)">
                                </label>
                                <input type="hidden" id="idProducto" name="producto" value="0">
                                <input type="hidden" id="imagenActual" name="imagen_actual" value="">
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <!-- Step 1: Product Details -->
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
                                                    <option value="">Seleccione...</option>
                                                    <option value="unidad">Unidad</option>
                                                    <option value="kg">Kilogramo</option>
                                                    <option value="litro">Litro</option>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la unidad de medida.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selMarcaReg" class="form-label small">Marca</label>
                                                <select class="form-select form-select-sm" id="selMarcaReg" name="selMarcaReg" required>
                                                    <option value="">Seleccione...</option>
                                                    <option value="marcaA">Marca A</option>
                                                    <option value="marcaB">Marca B</option>
                                                    <option value="marcaC">Marca C</option>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la Marca.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selCategoriaReg" class="form-label small">Categoría</label>
                                                <select class="form-select form-select-sm" id="selCategoriaReg" name="selCategoriaReg" required>
                                                    <option value="">Seleccione...</option>
                                                    <option value="electronica">Electrónica</option>
                                                    <option value="alimentos">Alimentos</option>
                                                    <option value="ropa">Ropa</option>
                                                </select>
                                                <div class="invalid-feedback">Seleccione la Categoría.</div>
                                            </div>
                                            <div class="col-12">
                                                <label for="iptDescripcionReg" class="form-label small">Descripción</label>
                                                <textarea class="form-control form-control-sm" id="iptDescripcionReg" name="iptDescripcionReg" rows="2" required></textarea>
                                                <div class="invalid-feedback">Debe ingresar la Descripción del producto.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>

                            <!-- Step 2: Pricing and Stock -->
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

                            <!-- Step 3: Additional Options -->
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
                                                <div class="invalid-feedback">Debe ingresar la Fecha de Vencimiento.</div>
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
            <div class="modal-footer d-flex justify-content-end pt-3 pb-3 px-4 mt-2 border-top-0">
                <button type="button" class="btn btn-outline-secondary me-2 px-4 py-2 rounded-pill fw-semibold" data-bs-dismiss="modal" id="btnCerrarModalFooter">
                    <i class="fas fa-times me-2"></i> Cancelar
                </button>
                <!-- The "Guardar datos" button from the last step will handle submission -->
            </div>
        </div>
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
        const productForm = document.getElementById('productForm'); // Renamed to productForm for clarity
        const chkPerecedero = document.getElementById('chkPerecedero');
        const contFechaVencimiento = document.getElementById('contFechaVencimiento');
        const iptFechaVencimiento = document.getElementById('iptFechaVencimiento');

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
            // Select all required inputs and selects within the current step that are not hidden
            const requiredInputs = currentFormStep.querySelectorAll('input[required]:not([type="hidden"]), select[required], textarea[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (input.type === 'file') {
                    // For file inputs, check if a file is selected only if it's required
                    if (input.hasAttribute('required') && input.files.length === 0) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                } else {
                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                }
            });

            // Specific validation for Fecha de Vencimiento if PRODUCTO PERECEDERO is checked
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

        // Event Listeners for Navigation Buttons
        productForm.addEventListener('click', (event) => {
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

        // Toggle 'Fecha de Vencimiento' visibility based on 'Producto Perecedero' checkbox
        chkPerecedero.addEventListener('change', function() {
            if (this.checked) {
                contFechaVencimiento.style.display = 'block';
                iptFechaVencimiento.setAttribute('required', 'true');
            } else {
                contFechaVencimiento.style.display = 'none';
                iptFechaVencimiento.removeAttribute('required');
                iptFechaVencimiento.classList.remove('is-invalid'); // Clear validation if unchecked
            }
        });

        // Function to preview the selected image for the product
        function previewFile(input) {
            const previewImg = document.getElementById('previewImg');
            const placeholderText = document.getElementById('product-image-placeholder-text');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                    placeholderText.style.display = 'none';
                    // You would typically send this 'e.target.result' (base64) to your backend
                    // The backend then uploads it to cloud storage and returns the URL.
                    // For demonstration, we'll just set a placeholder URL in the hidden input.
                    document.getElementById('imagenActual').value = 'https://example.com/path/to/uploaded/product_image.jpg';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                previewImg.src = "https://placehold.co/350x250/e9ecef/6c757d?text=No+Image"; // Revert to default placeholder
                previewImg.style.display = 'block'; // Ensure placeholder image is visible
                placeholderText.style.display = 'none'; // Keep text hidden as image is shown
                document.getElementById('imagenActual').value = '';
            }
        }

        // Handle form submission (for the last step)
        productForm.addEventListener('submit', function(event) {
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

                // Here you would typically send the 'data' object to your backend using fetch or XMLHttpRequest.
                // Example (uncomment and adapt for your backend):
                /*
                fetch('/api/save-product', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json' // Adjust if sending FormData directly
                    },
                    body: JSON.stringify(data) // Or just 'formData' if your API expects multipart/form-data
                })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result);
                    // Show success message, close modal, or redirect
                    const modal = bootstrap.Modal.getInstance(document.getElementById('mdlGestionarProducto'));
                    if (modal) modal.hide();
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error message
                });
                */
                // For demonstration, close modal after a short delay
                setTimeout(() => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('mdlGestionarProducto'));
                    if (modal) modal.hide();
                }, 1000);
            }
            productForm.classList.add('was-validated'); // Add Bootstrap's was-validated class to show browser's validation styles
        });

        // --- Modal Event Listeners ---
        const gestionarProductoModal = document.getElementById('mdlGestionarProducto');
        gestionarProductoModal.addEventListener('shown.bs.modal', function () {
            currentStep = 1; // Reset to first step when modal opens
            updateFormSteps();
            // Clear any previous validation messages when modal opens
            productForm.classList.remove('was-validated');
            productForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            // Reset image preview and related hidden fields
            document.getElementById('previewImg').src = "https://placehold.co/350x250/e9ecef/6c757d?text=No+Image";
            document.getElementById('product-image-placeholder-text').style.display = 'block';
            document.getElementById('imagenActual').value = '';
            document.getElementById('idProducto').value = '0'; // Reset product ID
            // Reset checkbox and date visibility
            chkPerecedero.checked = false;
            contFechaVencimiento.style.display = 'none';
            iptFechaVencimiento.removeAttribute('required');
            iptFechaVencimiento.value = ''; // Clear date field
        });

        // Close modal button in header and footer
        document.getElementById('btnCerrarModal').addEventListener('click', function() {
            const modal = bootstrap.Modal.getInstance(gestionarProductoModal);
            if (modal) modal.hide();
        });
        document.getElementById('btnCancelarRegistro').addEventListener('click', function() {
            const modal = bootstrap.Modal.getInstance(gestionarProductoModal);
            if (modal) modal.hide();
        });


        // Initial setup on page load
        updateFormSteps();
    })(); // IIFE ends here
</script>
</body>
</html>
