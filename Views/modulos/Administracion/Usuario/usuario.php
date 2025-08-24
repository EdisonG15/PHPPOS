   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">    
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Usuario  </h3>
                        <div class="card-tools">    
                        </div> 
                    </div> 
                        <br>
                     <div class="card-body">
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tbl_usuarios" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                  
            <th>ID Usuario</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Clave</th>
            <th>ID Perfil</th>
            <th>ID Caja</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Landmarks</th>
            <th>Imagen</th>
            <th>Ciudad</th>
            <th>Estado</th>
         
            <th class="text-center">Opciones</th>
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
<!--  -->

<div class="modal fade" id="mdlGestionarUsuarios" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-ancho-personalizad">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarUsuariosLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
              <div class="header-section d-flex flex-column flex-sm-row align-items-center justify-content-between">
            <!-- Logo and Title -->
             <input type="hidden" id="id_usuario" name="id_usuario" value="0">
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
                    <h1 class="h3 font-weight-bold text-gray-800">Perfil Usuario</h1>
                    <p class="h5 text-muted mt-1">Usuario Para El Sistema</p>
                </div>
            </div>
            <p class="text-muted text-center text-sm-end">Administra del Usuario de tu empresa</p>
        </div>

        <!-- Stepper Navigation -->
        <div class="stepper-wrapper mt-5 mb-5">
            <a class="stepper-item active" data-step="1">
                <div class="stepper-icon-container">
                    <i class="fas fa-user-alt stepper-icon"></i> <!-- General Info icon -->
                </div>
                <div class="stepper-label text-center">Cuenta <br> <span class="stepper-sublabel">Detalles</span></div>
            </a>
            <div class="stepper-line"></div>
            <a class="stepper-item" data-step="2">
                <div class="stepper-icon-container">
                    <i class="fas fa-address-card stepper-icon"></i> <!-- Address Info icon -->
                </div>
                <div class="stepper-label text-center">Personal <br> <span class="stepper-sublabel">Información</span></div>
            </a>
            <div class="stepper-line"></div>
            <a class="stepper-item" data-step="3">
                <div class="stepper-icon-container">
                    <i class="fas fa-file-invoice-dollar stepper-icon"></i> <!-- Tax Info icon -->
                </div>
                <div class="stepper-label text-center">Administración<br> <span class="stepper-sublabel">Perfil</span></div>
            </a>
        </div>

        <form id="companyProfileForm" class="needs-validation" novalidate>
            <!-- Hidden input for logo URL (this is what you'd save to the database) -->
            <input type="hidden" id="logo_url" name="logo_url">

            <!-- Step 1: Información General -->
            <div class="form-step active" data-step="1">
                <h4 class="mb-3 form-title">Información de la cuenta</h4>
                <p class="form-subtitle">Ingrese los detalles de su cuenta para comenzar</p>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Nombre de usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">
                            El Nombre de usuario es requerido.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            El Email es requerido.
                        </div>
                    </div>
                     <!-- <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" value="********" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye-slash"></i></button>
                                <div class="invalid-feedback">
                                    Se requiere contraseña.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">confirmar Contraseña <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="********" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button"><i class="fas fa-eye-slash"></i></button>
                                <div class="invalid-feedback">
                                   Por favor, confirma tu contraseña. Las contraseñas deben coincidir..
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" value="********" required>
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password"><i class="fas fa-eye-slash"></i></button>
                <div class="invalid-feedback">
                    Se requiere contraseña.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="confirmPassword" class="form-label">confirmar Contraseña <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="********" required>
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="confirmPassword"><i class="fas fa-eye-slash"></i></button>
                <div class="invalid-feedback">
                    Por favor, confirma tu contraseña. Las contraseñas deben coincidir..
                </div>
            </div>
        </div><script>
    document.addEventListener('DOMContentLoaded', function () {
        // ... (your existing JavaScript code) ...

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.dataset.target;
                const passwordInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                // Toggle the type attribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>
                   
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button type="button" class="btn btn-primary next-step">Siguiente → <i class="fas fa-arrow-right ms-2"></i></button>
                </div>
            </div>

            <!-- Step 2: Contacto y Dirección -->
            <div class="form-step" data-step="2">
                <h4 class="mb-3 form-title">Información personal</h4>
                <p class="form-subtitle">Cuéntanos un poco sobre ti.</p>
                <div class="row g-4">
                    <div class="col-6">
                        <label for="firstName" class="form-label">Nombres <span class="text-danger">*</span></label>
                        <!-- <textarea class="form-control" id="firstName" name="firstName" rows="2" required></textarea> -->
                         <input type="text" class="form-control" id="firstName" name="firstName" value="" required>
                        <div class="invalid-feedback">
                          El nombre es obligatorio.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="lastName" class="form-label">Apellidos <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="lastName" name="lastName" value="" required>
                         <div class="invalid-feedback">
                            El apellido es obligatorio.
                        </div>
                    </div>
                       <div class="col-md-6">
                        <label for="cedula" class="form-label">Cedula <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="13" required pattern="[0-9]{10}|[0-9]{13}">
                        <div class="invalid-feedback">
                            El cedula es requerido y debe tener 10 .
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="mobile" class="form-label">Móvil <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="202 555 0111" required>
                        <div class="invalid-feedback">
                          Se requiere número de móvil.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
                        <!-- <input type="text" class="form-control" id="address" name="address"> -->
                        <!-- <textarea class="form-control" id="address" name="address" rows="2" required></textarea> -->
                         <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" required>
                          <div class="invalid-feedback">
                         La dirección es obligatoria.
                        </div>
                    </div>
                     <div class="col-12">
                            <label for="landmark" class="form-label">Punto de referencia (opcional)</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Apartment, suite, etc.">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Ciudad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" value="Jackson" required>
                            <div class="invalid-feedback">
                               Se requiere ciudad.
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
                <h4 class="mb-3 form-title">Administración</h4>
                <p class="form-subtitle">Perfil</p>
                <div class="row g-4">
                  
                      <div class="col-md-6">
                                                <label for="selPerfil" class="form-label small">Rol </label>
                                                <select class="form-select form-select-sm" id="selPerfil" name="selPerfil" required>
                                        
                                                </select>
                                                <div class="invalid-feedback">Seleccione Rol.</div>
                                            </div>
                                       <div class="col-md-6">
                                                <label for="selCaja" class="form-label small">Caja </label>
                                                <select class="form-select form-select-sm" id="selCaja" name="selCaja" required>
                                                </select>
                                                <div class="invalid-feedback">Seleccione Caja</div>
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
</div>

<script>
    var accion;  
    var table; 
    (function() {
    let currentStep = 1;
    const formSteps = document.querySelectorAll('.form-step');
    const stepperItems = document.querySelectorAll('.stepper-item');
    const companyProfileForm = document.getElementById('companyProfileForm');

    // Función para actualizar la visibilidad del formulario y el indicador de pasos
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

        document.querySelectorAll('.form-step .btn').forEach(btn => btn.classList.add('d-none'));

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

    // Función para validar las entradas del paso actual
    function validateCurrentStep() {
        const currentFormStep = formSteps[currentStep - 1];
        const requiredInputs = currentFormStep.querySelectorAll('[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            input.classList.remove('is-invalid');
            const feedbackElement = input.nextElementSibling;
            if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                if (!feedbackElement.dataset.originalMessage) {
                    feedbackElement.dataset.originalMessage = feedbackElement.innerHTML;
                }
                feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
            }

            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
                isValid = false;
            }
        });

        if (currentStep === 1) {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');

            if (password.value !== confirmPassword.value && password.value !== '' && confirmPassword.value !== '') {
                confirmPassword.classList.add('is-invalid');
                const feedbackElement = confirmPassword.nextElementSibling;
                if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                    if (!feedbackElement.dataset.originalMessage) {
                        feedbackElement.dataset.originalMessage = feedbackElement.innerHTML;
                    }
                    feedbackElement.innerHTML = 'Las contraseñas no coinciden.';
                }
                isValid = false;
            } else if (password.checkValidity() && confirmPassword.checkValidity() && password.value === confirmPassword.value) {
                confirmPassword.classList.remove('is-invalid');
                const feedbackElement = confirmPassword.nextElementSibling;
                if (feedbackElement && feedbackElement.classList.contains('invalid-feedback') && feedbackElement.dataset.originalMessage) {
                    feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
                }
            }
        }
        return isValid;
    }

    // Individual input validation on type/blur
    function validateInput(input) {
        input.classList.remove('is-invalid');
        const feedbackElement = input.nextElementSibling;
        if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
            if (feedbackElement.dataset.originalMessage) {
                feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
            }
        }

        if (input.checkValidity()) {
            input.classList.remove('is-invalid');
        } else {
            input.classList.add('is-invalid');
        }

        if (input.id === 'password' || input.id === 'confirmPassword') {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');

            if (password.value !== confirmPassword.value && password.value !== '' && confirmPassword.value !== '') {
                confirmPassword.classList.add('is-invalid');
                const feedbackElementCP = confirmPassword.nextElementSibling;
                if (feedbackElementCP && feedbackElementCP.classList.contains('invalid-feedback')) {
                    if (!feedbackElementCP.dataset.originalMessage) {
                        feedbackElementCP.dataset.originalMessage = feedbackElementCP.innerHTML;
                    }
                    feedbackElementCP.innerHTML = 'Las contraseñas no coinciden.';
                }
            } else if (password.value === confirmPassword.value && password.value !== '') {
                confirmPassword.classList.remove('is-invalid');
                const feedbackElementCP = confirmPassword.nextElementSibling;
                if (feedbackElementCP && feedbackElementCP.classList.contains('invalid-feedback') && feedbackElementCP.dataset.originalMessage) {
                    feedbackElementCP.innerHTML = feedbackElementCP.dataset.originalMessage;
                }
            }
        }
    }

    // Event Listeners for navigation buttons
    companyProfileForm.addEventListener('click', (event) => {
        if (event.target.classList.contains('next-step')) {
            if (validateCurrentStep()) {
                if (currentStep < formSteps.length) {
                    currentStep++;
                    updateFormSteps();
                }
            }
        } else if (event.target.classList.contains('prev-step')) {
            const currentFormStepElement = formSteps[currentStep - 1];
            currentFormStepElement.querySelectorAll('.is-invalid').forEach(input => {
                input.classList.remove('is-invalid');
                const feedbackElement = input.nextElementSibling;
                if (feedbackElement && feedbackElement.classList.contains('invalid-feedback') && feedbackElement.dataset.originalMessage) {
                    feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
                }
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
            if (stepToGo < currentStep) {
                const currentFormStepElement = formSteps[currentStep - 1];
                currentFormStepElement.querySelectorAll('.is-invalid').forEach(input => {
                    input.classList.remove('is-invalid');
                    const feedbackElement = input.nextElementSibling;
                    if (feedbackElement && feedbackElement.classList.contains('invalid-feedback') && feedbackElement.dataset.originalMessage) {
                        feedbackElement.innerHTML = feedbackElement.dataset.originalMessage;
                    }
                });
                currentStep = stepToGo;
                updateFormSteps();
            } else if (stepToGo === currentStep) {
                // Do nothing, already on this step
            } else {
                if (validateCurrentStep()) {
                    currentStep = stepToGo;
                    updateFormSteps();
                }
            }
        });
    });

   
    // Event listeners 'input' and 'blur' for real-time validation
    companyProfileForm.querySelectorAll('input, select, textarea').forEach(input => {
        if (input.hasAttribute('required') || input.hasAttribute('pattern') || input.type === 'email' || input.type === 'tel' || input.type === 'password') {
            input.addEventListener('input', () => validateInput(input));
            input.addEventListener('blur', () => validateInput(input));
        }
    });

    // Special handling for password confirmation
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    if (passwordInput && confirmPasswordInput) {
        passwordInput.addEventListener('input', () => validateInput(confirmPasswordInput));
        confirmPasswordInput.addEventListener('input', () => validateInput(confirmPasswordInput));
    }

    const logoUploadArea = document.getElementById('logo-upload-area');
    const logoUploadInput = document.getElementById('logo-upload');

    if (logoUploadArea && logoUploadInput) {
        logoUploadArea.addEventListener('click', () => {
            logoUploadInput.click();
        });
    }

    window.previewLogo = function(event) {
        console.log("Leyendo imagen...");
        const reader = new FileReader();

        reader.onload = function() {
            const output = document.getElementById('logo-preview');
            const placeholderText = document.getElementById('logo-placeholder-text');
            output.src = reader.result;
            output.style.display = 'block';
            placeholderText.style.display = 'none';
        };
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        } else {
            const output = document.getElementById('logo-preview');
            const placeholderText = document.getElementById('logo-placeholder-text');
            output.src = 'https://placehold.co/96x96/e0e0e0/555555?text=Logo';
            output.style.display = 'block';
            placeholderText.style.display = 'none';
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
        document.getElementById('id_usuario').value = '0'; // Restablecer ID a 0 para un nuevo registro

        // 5. Restablecer el estado del stepper y del formulario al primer paso
        currentStep = 1;
        updateFormSteps(); // Esto re-renderizará el formulario al primer paso y activará el stepper item 1
 console.log('currentStep después de limpiar:', currentStep); 
        console.log('Formulario limpiado y restablecido a los valores predeterminados y al primer paso.');
    }

    // Manejo del envío del formulario (para el último paso)
    companyProfileForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        if (!validateCurrentStep()) {
            companyProfileForm.classList.add('was-validated');
            console.log('Envío del formulario prevenido debido a errores de validación.');
        } else {
            console.log('¡Formulario Enviado!');
              const datos = new FormData();

             // Obtén el ID de la empresa del campo oculto
             const idUsuario = document.getElementById('id_usuario').value;
             datos.append('id_usuario', idUsuario); // Envía el ID de la empresa al backend

             // Anexa todos los demás datos de los campos de texto
        for (let [key, value] of new FormData(this).entries()) {
                // Excluimos 'id_empresa' porque ya lo añadimos, y los inputs de logo
           if (key !== 'id_usuario' && key !== 'logo_url' && key !== 'logo_file') {
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
                    title: 'Está seguro de registrar el Usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo registrarla',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (!result.isConfirmed) return;
                    $.ajax({
                       url: "ajax/usuario.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            mostrarAlertaRespuesta(respuesta, function() {
                                table.ajax.reload();

                                $("#mdlGestionarUsuarios").modal('hide');
                                clearForm();
                            }, {
                                mensajeExito: "éxito",
                                mensajeAdvertencia: "Warning",
                                mensajeError: "Excepción"
                            });
                        },
                        error: manejarErrorAjax
                    });
                });
           

        }
    });

    // Actualización inicial al cargar para establecer el primer paso como activo
    updateFormSteps();
})();



    $(document).ready(function() {
        cargarCombo()
        cargarTablaUsuario();
    //   $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { 
    //     limpiar();
    //    });


        $('#tbl_usuarios tbody').on('click', '.btnEditar', function() {

            // 2. Obtenemos los datos de la fila seleccionada (ya lo tienes)
            var data = table.row($(this).parents('tr')).data();
            console.log("Datos de la empresa para editar:", data); // ¡Siempre bueno para depurar!

            // 3. Rellenamos el campo oculto id_empresa
            // Asegúrate de que el ID del input oculto sea 'id_empresa'
            document.getElementById('id_usuario').value = data.id_usuario; // Asumiendo que la columna es 'id_Empresa'

            // 4. Rellenamos los demás campos de texto e inputs
            document.getElementById('username').value = data.usuario;
            document.getElementById('email').value = data.email;
            document.getElementById('password').value = data.clave;
            document.getElementById('confirmPassword').value = data.clave;
            // Para selects, si tienes un id_firma, selecciona la opción correcta
            document.getElementById('firstName').value = data.nombre_usuario;
            document.getElementById('lastName').value = data.apellido_usuario;
            document.getElementById('cedula').value = data.cedula;
            document.getElementById('mobile').value = data.telefono;
            document.getElementById('address').value = data.direccion;
            document.getElementById('landmark').value = data.landmarks;
            document.getElementById('city').value = data.ciudad;
             document.getElementById('selPerfil').value = data.id_perfil_usuario;
              document.getElementById('selCaja').value = data.id_caja;
            

       
            // 5. ¡Cargamos y mostramos la IMAGEN!
            const logoPreview = document.getElementById('logo-preview'); // El <img> donde se muestra la imagen
            const logoPlaceholderText = document.getElementById('logo-placeholder-text'); // El texto de placeholder
            const logoUrlInput = document.getElementById('logo_url'); // Tu input oculto para la URL actual

            if (data.img && data.img !== "") { // Si hay una ruta de logo guardada en la DB
                logoPreview.src = data.img; // Establece la URL del <img>
                logoPreview.style.display = 'block'; // Muestra la imagen
                logoPlaceholderText.style.display = 'none'; // Oculta el texto de placeholder
                logoUrlInput.value = data.img; // Guarda la ruta actual en el input oculto (para si no se cambia la img)
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
            $("#mdlGestionarUsuarios").modal('show');

            // Opcional: Reiniciar la validación del formulario si estás usando Bootstrap's 'was-validated'
            // Esto es para que no muestre errores de validación antiguos al abrir el modal
            const form = document.getElementById('companyProfileForm');
            form.classList.remove('was-validated');
            // Si tienes pasos, asegúrate de ir al primer paso si es un formulario con varios pasos
            // y resetear el estado de los indicadores de paso.
        
       });
       
       
    
        $('#tbl_usuarios tbody').on('click', '.btnEliminar', function() {
        
               accion = 3; //seteamos la accion para editar
               var data = table.row($(this).parents('tr')).data();
               var id_usuario = data[1];
               Swal.fire({
                     title: 'Está seguro de eliminar el Usuario?',
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
                        datos.append("IdUsuario", id_usuario); //codigo_producto               
                        datos.append("estado", 2); //codigo_producto               
                    $.ajax({
                              url: "ajax/usuario.ajax.php",
                              method: "POST",
                              data: datos,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: 'json',
                           success: function(respuesta) {                   
                             mostrarAlertaRespuesta(respuesta, () => {
                                table.ajax.reload();


                            }, {
                                mensajeExito: 'eliminado con éxito',
                                mensajeAdvertencia: 'Warning',
                                mensajeError: 'error'
                            });
                        },
                        error: manejarErrorAjax
                    });
                        }
        })
    
    });

  
  });/** fin decoment ready */

  function cargarCombo(){

    $.ajax({
        url: "ajax/CargarComboPerfil.ajax.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
        console.log("perfil",respuesta);
            var options = '<option selected value="">Seleccione una rol</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';
            }

            $("#selPerfil").append(options);
        }
        
    });

    $.ajax({
        url: "ajax/cargarcombocaja.ajax.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="">Seleccione una caja</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';
            }

            $("#selCaja").append(options);
        }
    });
  };

  function cargarTablaUsuario(){
     table = $("#tbl_usuarios").DataTable({
        dom: 'Bfrtip',  //botoneras en la parte superios
         buttons: [
            {
                text: 'Agregar Usuario',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                    $("#mdlGestionarUsuarios").modal('show');
                     accion = 2; //registrar
                    //  $("#chkValidar").prop("checked", false);
                     clearForm();
                  }
              },
          {
    extend: 'excel',
    exportOptions: {
      columns: [2,3,4,5,9,10,11] // aquí defines las columnas que sí exportarás
    }
  },
  {
    extend: 'print',
    exportOptions: {
      columns: [2,3,4,5,9,10,11] // lo mismo para imprimir
    }
  },
  'pageLength'
          ],
        ajax: {
             url: "ajax/usuario.ajax.php",
             dataSrc: '', // Que la data que retorne  no queremos 
             type: "POST",
             data: {'accion': 1  },//1: LISTAR PRODUCTOS
        },
          responsive: {
           details: {
                  type: 'column'
              }
          },
           columnDefs: [

               {
                    targets: 0,  // idice cero donde se encuentra la columna
                    orderable: false, // es columan tenga ordenamiento
                    className: 'control' // aparescar  un boton 
                    },
                    {targets: 1,visible: false},{ targets: 5, visible: false },{ targets: 6, visible: false },
                    { targets: 7, visible: false },{ targets: 8, visible: false },{ targets: 9, visible: false },
                    { targets: 10, visible: false }, { targets: 11, visible: false }, { targets: 12, visible: false },
                     { targets: 13, visible: false }, { targets: 14, visible: false }, 
   
                   {
	            		 targets: 15,
                    sortable: false,
                    className: "text-center",
                    render: function(data) {
                        return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                   
                   } },
                {
                   targets: 16,
                    orderable: false, // no ordenar
                    render: function(data, type, full, meta) {
                        return `
      <div class="dropdown text-center">
        <button class="btn btn-light btn-sm rounded-circle p-1" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px; height: 30px;">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
          <li>
            <a class="dropdown-item btnEditar" href="#" data-id="${full.id_usuario}" title="Editar" style="cursor:pointer;">
              <i class="fas fa-edit"></i> Editar
            </a>
          </li>
          <li>
            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_usuario}" title="Eliminar" style="cursor:pointer;">
              <i class="fas fa-trash-alt"></i> Eliminar
            </a>
          </li>
        </ul>
      </div>
    `;
                    }
              }
         ],
         "order": [[ 0, 'desc' ]],
                lengthMenu: [ 5, 10, 15, 20, 50],
                "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
  };
  
  


</script>