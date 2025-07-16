<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta Moderno - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for a cleaner look (optional) */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; /* slate-300 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; /* slate-500 */
        }
        /* Basic styling for number input arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <script>
        // Tailwind Custom Configuration (Optional - for custom colors, fonts, etc.)
        // For this example, we'll primarily use default Tailwind and some arbitrary values.
        // tailwind.config = {
        //   theme: {
        //     extend: {
        //       colors: {
        //         'primary': '#007bff',
        //         'secondary': '#6c757d',
        //         'accent': '#28a745',
        //       }
        //     }
        //   }
        // }
    </script>
</head>
<body class="bg-slate-100 font-sans text-slate-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <div class="lg:col-span-7 xl:col-span-8 space-y-6">
                <div class="bg-white rounded-xl shadow-lg">
                    <div class="bg-blue-600 text-white p-4 sm:p-5 rounded-t-xl flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        <h4 class="text-xl font-semibold">Detalle de Venta</h4>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="mb-6">
                            <label for="buscarProducto" class="sr-only">Buscar Producto</label>
                            <div class="flex items-center shadow-sm rounded-lg">
                                <input type="text" class="flex-grow p-3 border border-slate-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" id="buscarProducto" placeholder="Buscar producto por código o nombre...">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-r-lg transition-colors flex items-center" type="button" id="btnBuscarProducto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                    Añadir
                                </button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="text-lg font-semibold mb-3 text-slate-700">Productos en la Venta:</h5>
                            <div id="listaProductosVenta" class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg border border-slate-200 product-item-dynamic">
                                    <div>
                                        <span class="font-medium text-slate-700">Producto Moderno A</span>
                                        <div class="text-sm text-slate-500">2 x $15.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2 sm:space-x-3">
                                        <input type="number" class="form-input w-16 text-center border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="2" min="1">
                                        <span class="font-semibold text-slate-700 w-20 text-right">$30.00</span>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-md hover:bg-red-100 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg border border-slate-200 product-item-dynamic">
                                    <div>
                                        <span class="font-medium text-slate-700">Servicio Rápido B</span>
                                        <div class="text-sm text-slate-500">1 x $25.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2 sm:space-x-3">
                                        <input type="number" class="form-input w-16 text-center border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="1" min="1">
                                        <span class="font-semibold text-slate-700 w-20 text-right">$25.00</span>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-md hover:bg-red-100 transition-colors">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="noProductosVenta" class="text-center text-slate-500 py-4 hidden">No hay productos en la venta.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg">
                    <div class="bg-sky-600 text-white p-4 sm:p-5 rounded-t-xl flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <h5 class="text-xl font-semibold">Información del Cliente</h5>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="mb-4">
                            <label for="buscarCliente" class="block text-sm font-medium text-slate-700 mb-1">Buscar Cliente</label>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <input type="text" class="flex-grow p-3 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none transition-all" id="buscarCliente" placeholder="Cédula, RUC o Nombre...">
                                <button class="bg-slate-500 hover:bg-slate-600 text-white p-3 rounded-lg transition-colors flex items-center justify-center" type="button" id="btnSeleccionarCliente">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    Seleccionar
                                </button>
                                <button class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg transition-colors flex items-center justify-center" type="button" id="btnAbrirModalCliente">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="17" y1="11" x2="23" y2="11"></line></svg>
                                    Registrar
                                </button>
                            </div>
                        </div>
                        <div id="clienteSeleccionado" class="hidden p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg" role="alert">
                            Cliente: <strong id="nombreClienteDisplay"></strong> (<span id="cedulaClienteDisplay"></span>)
                        </div>
                        <div id="noClienteSeleccionado" class="p-3 bg-sky-100 border border-sky-300 text-sky-700 rounded-lg" role="alert">
                            No hay cliente seleccionado.
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 xl:col-span-4">
                <div class="bg-white rounded-xl shadow-lg sticky top-8">
                    <div class="bg-green-600 text-white p-4 sm:p-5 rounded-t-xl flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <h4 class="text-xl font-semibold">Resumen de Venta</h4>
                    </div>
                    <div class="p-4 sm:p-6 space-y-5">
                        <div class="p-4 bg-slate-50 border border-dashed border-slate-300 rounded-lg space-y-2">
                            <div class="flex justify-between text-slate-600">
                                <span>Subtotal:</span>
                                <span id="subtotalVenta" class="font-semibold text-slate-800">$55.00</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>IVA (12%):</span>
                                <span id="ivaVenta" class="font-semibold text-slate-800">$6.60</span>
                            </div>
                            <hr class="my-2 border-slate-200">
                            <div class="flex justify-between items-center text-slate-700">
                                <strong class="text-lg">Total Venta:</strong>
                                <strong id="totalGeneral" class="text-3xl font-bold text-green-600">$61.60</strong>
                            </div>
                        </div>

                        <div>
                            <label for="valorRecibido" class="block text-base font-medium text-slate-700 mb-1">Valor Recibido</label>
                            <input type="number" class="form-input w-full p-3 text-right text-lg border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all" id="valorRecibido" placeholder="0.00" step="0.01" min="0">
                        </div>

                        <div class="p-4 bg-green-50 border border-dashed border-green-300 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-medium text-green-700">Vuelto:</span>
                                <span id="vueltoVenta" class="text-3xl font-bold text-green-700">$0.00</span>
                            </div>
                        </div>

                        <div>
                            <label for="tipoDocumento" class="block text-sm font-medium text-slate-700 mb-1">Tipo de Documento</label>
                            <select class="form-select w-full p-3 text-base border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" id="tipoDocumento">
                                <option selected value="Factura">Factura</option>
                                <option value="Nota de Venta">Nota de Venta</option>
                                <option value="Ticket">Ticket Consumidor Final</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-3 pt-2">
                            <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 ease-in-out flex items-center justify-center" id="btnRealizarVenta">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                Realizar Venta
                            </button>
                            <button type="button" class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 ease-in-out flex items-center justify-center" id="btnVentaCredito">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                Venta a Crédito
                            </button>
                            <button type="button" class="w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 ease-in-out flex items-center justify-center" id="btnLimpiar">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                Limpiar Venta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalRegistrarCliente" class="fixed inset-0 bg-slate-800 bg-opacity-75 flex items-center justify-center p-4 z-50 hidden transition-opacity duration-300 ease-in-out">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg transform transition-all duration-300 ease-in-out scale-95 opacity-0" id="modalDialog">
            <div class="bg-blue-600 text-white p-4 sm:p-5 rounded-t-xl flex justify-between items-center">
                <h5 class="text-xl font-semibold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="17" y1="11" x2="23" y2="11"></line></svg>
                    Registrar Nuevo Cliente
                </h5>
                <button type="button" class="text-blue-200 hover:text-white transition-colors" id="btnCerrarModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="p-4 sm:p-6">
                <form id="formRegistrarCliente" class="space-y-4">
                    <div>
                        <label for="regCedulaRuc" class="block text-sm font-medium text-slate-700">Cédula / RUC</label>
                        <input type="text" class="mt-1 form-input w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="regCedulaRuc" placeholder="Ej: 1712345678" required>
                    </div>
                    <div>
                        <label for="regNombreCliente" class="block text-sm font-medium text-slate-700">Nombre Completo</label>
                        <input type="text" class="mt-1 form-input w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="regNombreCliente" placeholder="Nombre y Apellido" required>
                    </div>
                    <div>
                        <label for="regDireccionCliente" class="block text-sm font-medium text-slate-700">Dirección</label>
                        <input type="text" class="mt-1 form-input w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="regDireccionCliente" placeholder="Calle principal, número, ciudad" required>
                    </div>
                    <div>
                        <label for="regTelefonoCliente" class="block text-sm font-medium text-slate-700">Teléfono (Opcional)</label>
                        <input type="tel" class="mt-1 form-input w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="regTelefonoCliente" placeholder="Ej: 0991234567">
                    </div>
                    <div>
                        <label for="regEmailCliente" class="block text-sm font-medium text-slate-700">Email (Opcional)</label>
                        <input type="email" class="mt-1 form-input w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="regEmailCliente" placeholder="correo@ejemplo.com">
                    </div>
                </form>
            </div>
            <div class="bg-slate-50 p-4 sm:p-5 rounded-b-xl flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-200 hover:bg-slate-300 rounded-lg transition-colors" id="btnCancelarModal">Cancelar</button>
                <button type="submit" form="formRegistrarCliente" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    Guardar Cliente
                </button>
            </div>
        </div>
    </div>

<script>
    // Modal JavaScript
    const modal = document.getElementById('modalRegistrarCliente');
    const modalDialog = document.getElementById('modalDialog');
    const btnAbrirModalCliente = document.getElementById('btnAbrirModalCliente');
    const btnCerrarModal = document.getElementById('btnCerrarModal');
    const btnCancelarModal = document.getElementById('btnCancelarModal');

    function openModal() {
        modal.classList.remove('hidden');
        setTimeout(() => { // Delay for transition
            modal.classList.remove('opacity-0');
            modalDialog.classList.remove('scale-95', 'opacity-0');
            modalDialog.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal() {
        modalDialog.classList.remove('scale-100', 'opacity-100');
        modalDialog.classList.add('scale-95', 'opacity-0');
        modal.classList.add('opacity-0');
        setTimeout(() => { // Delay for transition
            modal.classList.add('hidden');
        }, 300); // Match transition duration
    }

    if (btnAbrirModalCliente) {
        btnAbrirModalCliente.addEventListener('click', openModal);
    }
    if (btnCerrarModal) {
        btnCerrarModal.addEventListener('click', closeModal);
    }
    if (btnCancelarModal) {
        btnCancelarModal.addEventListener('click', closeModal);
    }
    // Close modal on escape key
    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
    // Close modal on backdrop click
    if (modal) {
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
    }

    // Placeholder for dynamic product list updates and calculations
    // You'll need to adapt your existing JavaScript to work with the new Tailwind classes.
    // For example, when adding a product:
    // const listaProductosVenta = document.getElementById('listaProductosVenta');
    // const noProductosVenta = document.getElementById('noProductosVenta');
    // function agregarProductoALista(nombre, cantidad, precioUnitario, precioTotal) {
    //     noProductosVenta.classList.add('hidden');
    //     const itemHTML = `
    //         <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg border border-slate-200 product-item-dynamic">
    //             <div>
    //                 <span class="font-medium text-slate-700">${nombre}</span>
    //                 <div class="text-sm text-slate-500">${cantidad} x $${precioUnitario.toFixed(2)}</div>
    //             </div>
    //             <div class="flex items-center space-x-2 sm:space-x-3">
    //                 <input type="number" class="form-input w-16 text-center border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="${cantidad}" min="1">
    //                 <span class="font-semibold text-slate-700 w-20 text-right">$${precioTotal.toFixed(2)}</span>
    //                 <button class="text-red-500 hover:text-red-700 p-1 rounded-md hover:bg-red-100 transition-colors" onclick="eliminarProducto(this)">
    //                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
    //                 </button>
    //             </div>
    //         </div>`;
    //     listaProductosVenta.insertAdjacentHTML('beforeend', itemHTML);
    // }

    // function eliminarProducto(buttonElement) {
    //    buttonElement.closest('.product-item-dynamic').remove();
    //    if (listaProductosVenta.children.length <= 1) { // <=1 because of the #noProductosVenta element if it's not removed
    //        const dynamicItems = listaProductosVenta.querySelectorAll('.product-item-dynamic');
    //        if (dynamicItems.length === 0) {
    //            noProductosVenta.classList.remove('hidden');
    //        }
    //    }
    //    // Recalculate totals
    // }
    
    // Initial check if product list is empty
    // document.addEventListener('DOMContentLoaded', () => {
    //    const dynamicItems = document.getElementById('listaProductosVenta').querySelectorAll('.product-item-dynamic');
    //    const noProductosVenta = document.getElementById('noProductosVenta');
    //    if (dynamicItems.length === 0) {
    //        noProductosVenta.classList.remove('hidden');
    //    } else {
    //        noProductosVenta.classList.add('hidden');
    //    }
    // });

</script>

</body>
</html>
