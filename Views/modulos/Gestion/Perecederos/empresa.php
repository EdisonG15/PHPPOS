<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile Management</title>
    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Light gray background */
        }
        /* Custom styles for input focus */
        .form-input:focus {
            border-color: #6366f1; /* Indigo-500 */
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.5); /* Semi-transparent indigo shadow */
            outline: none;
        }
        /* Custom styles for buttons */
        .btn-primary {
            background-color: #6366f1; /* Indigo-500 */
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #4f46e5; /* Indigo-600 */
            transform: translateY(-1px);
        }
        .btn-primary:active {
            background-color: #4338ca; /* Indigo-700 */
            transform: translateY(0);
        }
        .btn-secondary {
            background-color: #e5e7eb; /* Gray-200 */
            color: #4b5563; /* Gray-700 */
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #d1d5db; /* Gray-300 */
            transform: translateY(-1px);
        }
        .btn-secondary:active {
            background-color: #9ca3af; /* Gray-400 */
            transform: translateY(0);
        }
        /* Card shadow */
        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Styles for stepper indicators */
        .stepper-item {
            @apply flex flex-col items-center flex-1 text-gray-500; /* Default gray text */
        }
        .stepper-icon-container {
            @apply w-12 h-12 rounded-lg flex items-center justify-center mb-2; /* Square icon background */
            background-color: #f3f4f6; /* Light gray background for inactive */
            border: 1px solid #d1d5db; /* Gray-300 border */
            transition: all 0.3s ease-in-out;
        }
        .stepper-icon {
            @apply w-6 h-6 text-gray-600; /* Default icon color */
        }
        .stepper-title {
            @apply text-sm font-medium;
        }
        .stepper-description {
            @apply text-xs text-gray-400; /* Lighter gray for description */
        }
        .stepper-line {
            @apply flex-grow h-0.5 bg-gray-300 mx-4; /* Connecting line */
        }

        .stepper-item.active .stepper-icon-container {
            background-color: #6366f1; /* Indigo-500 for active */
            border-color: #6366f1;
        }
        .stepper-item.active .stepper-icon {
            @apply text-white; /* White icon for active */
        }
        .stepper-item.active .stepper-title {
            @apply text-gray-800 font-semibold; /* Darker text for active title */
        }
        .stepper-item.active .stepper-description {
            @apply text-gray-600; /* Darker text for active description */
        }

        .stepper-item.completed .stepper-icon-container {
            background-color: #e0e7ff; /* Light indigo for completed icon background */
            border-color: #a5b4fc; /* Indigo-300 border */
        }
        .stepper-item.completed .stepper-icon {
            @apply text-indigo-600; /* Indigo icon for completed */
        }
        .stepper-item.completed .stepper-title {
            @apply text-gray-700; /* Slightly darker gray for completed title */
        }
        .stepper-item.completed .stepper-description {
            @apply text-gray-500; /* Default gray for completed description */
        }
        /* Make line active only when the previous step is completed and the current step is active */
        .stepper-item.completed + .stepper-line {
            background-color: #6366f1; /* Indigo-500 for completed line segment */
        }
    </style>
</head>
<body class="p-4 sm:p-6 lg:p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 rounded-lg card">
        <!-- Header with Logo and Title -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-8 pb-4 border-b border-gray-200">
            <!-- Logo Display and Upload -->
            <div class="flex flex-col items-center sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 mb-4 sm:mb-0">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-3xl font-bold overflow-hidden border-4 border-indigo-200 relative group">
                    <!-- Dynamic Logo Display - Replace with actual image via JS if uploaded -->
                    <img id="logo-preview" src="https://placehold.co/96x96/e0e0e0/555555?text=Logo" alt="Company Logo" class="w-full h-full object-cover rounded-full">
                    <!-- Overlay for upload icon -->
                    <label for="logo-upload" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer rounded-full">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"></path>
                        </svg>
                        <input type="file" id="logo-upload" name="logo_file" accept="image/*" class="hidden" onchange="previewLogo(event)">
                    </label>
                </div>
                <!-- Company Name and Electronic Invoicing Text -->
                <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                    <h1 class="text-3xl font-semibold text-gray-800">Company Profile</h1>
                    <p class="text-lg text-gray-600 mt-1">Facturación Electrónica</p>
                </div>
            </div>
            <p class="text-gray-500 text-center sm:text-right">Manage your company's information</p>
        </div>

        <!-- Stepper Navigation -->
        <div class="flex justify-between items-center mb-8">
            <div class="stepper-item active" id="step-nav-1">
                <div class="stepper-icon-container">
                    <!-- Icon for General Information (Document/File) -->
                    <svg class="stepper-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="stepper-title">Cuenta</span>
                <span class="stepper-description">Detalles de la Cuenta</span>
            </div>
            <div class="stepper-line"></div>
            <div class="stepper-item" id="step-nav-2">
                <div class="stepper-icon-container">
                    <!-- Icon for Tax and Emission Information (User/Person) -->
                    <svg class="stepper-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="stepper-title">Personal</span>
                <span class="stepper-description">Ingresar Información</span>
            </div>
            <div class="stepper-line"></div>
            <div class="stepper-item" id="step-nav-3">
                <div class="stepper-icon-container">
                    <!-- Icon for Contact and Address Information (Billing/Location) -->
                    <svg class="stepper-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10M11 15v2m-6 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="stepper-title">Facturación</span>
                <span class="stepper-description">Detalles de Pago</span>
            </div>
        </div>

        <form id="company-profile-form">
            <!-- Hidden input for logo URL (this is what you'd save to the database) -->
            <input type="hidden" id="logo_url" name="logo_url">

            <!-- Step 1: General Information -->
            <div class="form-step" id="step-1">
                <section class="mb-8 p-6 bg-gray-50 rounded-lg shadow-inner">
                    <h2 class="text-xl font-semibold text-gray-700 mb-5 border-b pb-2 border-gray-200">Información General</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="razon_social" class="block text-sm font-medium text-gray-700 mb-1">Razon Social</label>
                            <input type="text" id="razon_social" name="razon_social" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="nombre_comercial" class="block text-sm font-medium text-gray-700 mb-1">Nombre Comercial</label>
                            <input type="text" id="nombre_comercial" name="nombre_comercial" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="ruc" class="block text-sm font-medium text-gray-700 mb-1">RUC</label>
                            <input type="text" id="ruc" name="ruc" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="id_firma" class="block text-sm font-medium text-gray-700 mb-1">ID Firma</label>
                            <input type="number" id="id_firma" name="id_firma" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </section>
            </div>

            <!-- Step 2: Tax Information -->
            <div class="form-step hidden" id="step-2">
                <section class="mb-8 p-6 bg-gray-50 rounded-lg shadow-inner">
                    <h2 class="text-xl font-semibold text-gray-700 mb-5 border-b pb-2 border-gray-200">Información de Impuestos y Emisión</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="contribuyente_especial" class="block text-sm font-medium text-gray-700 mb-1">Contribuyente Especial</label>
                            <input type="text" id="contribuyente_especial" name="contribuyente_especial" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Obligado Contabilidad</label>
                            <div class="mt-1 flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" name="obligado_contabilidad" value="SI">
                                    <span class="ml-2 text-gray-700">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" name="obligado_contabilidad" value="NO">
                                    <span class="ml-2 text-gray-700">No</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ambiente</label>
                            <div class="mt-1 flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" name="ambiente" value="1">
                                    <span class="ml-2 text-gray-700">1 (Pruebas)</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" name="ambiente" value="2">
                                    <span class="ml-2 text-gray-700">2 (Producción)</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label for="tipo_emision" class="block text-sm font-medium text-gray-700 mb-1">Tipo Emisión</label>
                            <input type="text" id="tipo_emision" name="tipo_emision" maxlength="1" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="establecimiento_codigo" class="block text-sm font-medium text-gray-700 mb-1">Código Establecimiento</label>
                            <input type="text" id="establecimiento_codigo" name="establecimiento_codigo" maxlength="3" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="punto_emision_codigo" class="block text-sm font-medium text-gray-700 mb-1">Código Punto Emisión</label>
                            <input type="text" id="punto_emision_codigo" name="punto_emision_codigo" maxlength="3" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="secuencial" class="block text-sm font-medium text-gray-700 mb-1">Secuencial</label>
                            <input type="number" id="secuencial" name="secuencial" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="codigo_iva" class="block text-sm font-medium text-gray-700 mb-1">Código IVA</label>
                            <input type="number" id="codigo_iva" name="codigo_iva" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </section>
            </div>

            <!-- Step 3: Contact and Address Information -->
            <div class="form-step hidden" id="step-3">
                <section class="mb-8 p-6 bg-gray-50 rounded-lg shadow-inner">
                    <h2 class="text-xl font-semibold text-gray-700 mb-5 border-b pb-2 border-gray-200">Información de Contacto y Dirección</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label for="direccion_matriz" class="block text-sm font-medium text-gray-700 mb-1">Dirección Matriz</label>
                            <textarea id="direccion_matriz" name="direccion_matriz" rows="3" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label for="direccion_sucursal" class="block text-sm font-medium text-gray-700 mb-1">Dirección Sucursal</label>
                            <textarea id="direccion_sucursal" name="direccion_sucursal" rows="3" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="4" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Action Buttons (outside form-step to be always visible) -->
            <div class="flex justify-between mt-8">
                <button type="button" id="prev-btn" class="btn-secondary px-6 py-2 rounded-md font-medium text-lg hidden">
                    ← Anterior
                </button>
                <button type="button" id="next-btn" class="btn-primary text-white px-6 py-2 rounded-md font-medium text-lg ml-auto">
                    Siguiente →
                </button>
                <button type="submit" id="submit-btn" class="btn-primary text-white px-6 py-2 rounded-md font-medium text-lg ml-auto hidden">
                    Guardar Cambios
                </button>
            </div>
        </form>

    <script>
        let currentStep = 1;
        const formSteps = document.querySelectorAll('.form-step');
        const stepperItems = document.querySelectorAll('.stepper-item');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');

        // Function to update the form visibility and stepper
        function updateFormSteps() {
            formSteps.forEach((step, index) => {
                if (index + 1 === currentStep) {
                    step.classList.remove('hidden');
                } else {
                    step.classList.add('hidden');
                }
            });

            stepperItems.forEach((item, index) => {
                if (index + 1 === currentStep) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
                if (index + 1 < currentStep) {
                    item.classList.add('completed');
                } else {
                    item.classList.remove('completed');
                }
            });

            // Handle button visibility
            if (currentStep === 1) {
                prevBtn.classList.add('hidden');
            } else {
                prevBtn.classList.remove('hidden');
            }

            if (currentStep === formSteps.length) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }

        // Event Listeners for Navigation Buttons
        nextBtn.addEventListener('click', () => {
            if (currentStep < formSteps.length) {
                currentStep++;
                updateFormSteps();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                updateFormSteps();
            }
        });

        // Initial setup
        updateFormSteps();

        // Function to preview the selected logo
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('logo-preview');
                output.src = reader.result;
                // You would typically send this 'reader.result' (base64) to your backend
                // The backend then uploads it to cloud storage and returns the URL.
                // For demonstration, we'll just set a placeholder URL in the hidden input.
                // In a real application, you'd fetch the actual uploaded URL from your server.
                document.getElementById('logo_url').value = 'https://example.com/path/to/uploaded/logo.png';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        // Handle form submission (for the last step)
        document.getElementById('company-profile-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // In a real application, you would collect all form data here
            // including the logo_url, and send it to your backend using fetch or XMLHttpRequest.
            console.log('Form Submitted!');
            const formData = new FormData(this);
            const data = {};
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }
            console.log(data); // Log collected form data
            // Add your AJAX/Fetch call here to send data to your server
            // Example:
            /*
            fetch('/api/save-company-profile', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                console.log('Success:', result);
                // Show success message or redirect
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message
            });
            */
        });

    </script>
    </div>
</body>
</html>
