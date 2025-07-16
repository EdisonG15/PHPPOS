<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta Moderno</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <style>
        :root {
            --primary-color: #007bff; /* Azul vibrante */
            --secondary-color: #6c757d; /* Gris sutil */
            --accent-color: #28a745; /* Verde para éxito */
            --bg-light: #f4f7f6; /* Fondo muy claro */
            --card-bg: #ffffff; /* Fondo de tarjetas */
            --text-dark: #343a40; /* Texto oscuro */
            --border-radius: 0.75rem; /* Bordes más redondeados */
            --shadow-light: rgba(0, 0, 0, 0.08); /* Sombra suave */
        }

        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }
        .container-fluid {
            padding: 2.5rem;
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
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        .card-header.bg-success {
            background-color: var(--accent-color) !important;
        }
        .card-header.bg-info {
            background-color: #17a2b8 !important; /* Mantenemos info de Bootstrap */
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
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
            color: var(--text-dark); /* Texto oscuro para contraste */
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
            overflow: hidden; /* Para que los bordes redondeados se apliquen al encabezado */
        }
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 1.2rem;
            font-weight: 600;
        }
        .table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }
        .table tbody tr:last-child {
            border-bottom: none;
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
    </style>
</head>
<body>

    <div class="container-fluid " >
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="bi bi-cart-fill me-2"></i>Detalle de Venta</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="buscarProducto" class="form-label visually-hidden">Buscar Producto</label>
                            <div class="input-group input-group-lg shadow-sm">
                                <input type="text" class="form-control" id="buscarProducto" placeholder="Buscar producto por código o nombre...">
                                <button class="btn btn-outline-primary" type="button" id="btnBuscarProducto">
                                    <i class="bi bi-plus-circle"></i> Añadir
                                </button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Productos en la Venta:</h5>
                            <div id="listaProductosVenta" class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center product-item">
                                    <div>
                                        <span class="product-item-name">Producto Moderno A</span>
                                        <div class="product-item-qty-price">2 x $15.00</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="number" class="form-control form-control-sm text-center me-2" value="2" min="1" style="width: 70px;">
                                        <span class="fw-bold me-3">$30.00</span>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center product-item">
                                    <div>
                                        <span class="product-item-name">Servicio Rápido B</span>
                                        <div class="product-item-qty-price">1 x $25.00</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="number" class="form-control form-control-sm text-center me-2" value="1" min="1" style="width: 70px;">
                                        <span class="fw-bold me-3">$25.00</span>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                                </div>
                        </div>

                        <hr class="my-4">

                        <div class="card bg-light shadow-sm">
                            <div class="card-header bg-info">
                                <h5 class="mb-0"><i class="bi bi-person-fill me-2"></i>Información del Cliente</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="buscarCliente" class="form-label">Buscar Cliente</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="buscarCliente" placeholder="Cédula, RUC o Nombre...">
                                        <button class="btn btn-outline-secondary" type="button" id="btnSeleccionarCliente">
                                            <i class="bi bi-search"></i> Seleccionar
                                        </button>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalRegistrarCliente">
                                            <i class="bi bi-person-plus"></i> Registrar
                                        </button>
                                    </div>
                                </div>
                                <div id="clienteSeleccionado" class="alert alert-success d-none" role="alert">
                                    Cliente: <strong id="nombreClienteDisplay"></strong> (<span id="cedulaClienteDisplay"></span>)
                                </div>
                                <div id="noClienteSeleccionado" class="alert alert-info" role="alert">
                                    No hay cliente seleccionado.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="mb-0"><i class="bi bi-receipt-cutoff me-2"></i>Resumen de Venta</h4>
                    </div>
                    <div class="card-body">
                        <div class="summary-box mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span id="subtotalVenta" class="fw-bold">$55.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>IVA (12%):</span>
                                <span id="ivaVenta" class="fw-bold">$6.60</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <strong>Total Venta:</strong>
                                <strong id="totalGeneral" class="display-5">$61.60</strong>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <label for="valorRecibido" class="form-label fs-5">Valor Recibido</label>
                            <input type="number" class="form-control form-control-lg text-end" id="valorRecibido" placeholder="0.00" step="0.01" min="0">
                        </div>

                        <div class="summary-box mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Vuelto:</span>
                                <span id="vueltoVenta" class="display-6 text-success">$0.00</span>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                            <select class="form-select form-select-lg" id="tipoDocumento">
                                <option selected value="Factura">Factura</option>
                                <option value="Nota de Venta">Nota de Venta</option>
                                <option value="Ticket">Ticket Consumidor Final</option>
                            </select>
                        </div>

                        <div class="d-grid gap-3">
                            <button type="button" class="btn btn-primary btn-lg shadow" id="btnRealizarVenta">
                                <i class="bi bi-check-circle me-2"></i> Realizar Venta
                            </button>
                            <button type="button" class="btn btn-warning btn-lg shadow" id="btnVentaCredito">
                                <i class="bi bi-credit-card me-2"></i> Venta a Crédito
                            </button>
                            <button type="button" class="btn btn-secondary btn-lg shadow" id="btnLimpiar">
                                <i class="bi bi-x-circle me-2"></i> Limpiar Venta
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalRegistrarCliente" tabindex="-1" aria-labelledby="modalRegistrarClienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarClienteLabel"><i class="bi bi-person-add me-2"></i>Registrar Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRegistrarCliente">
                        <div class="mb-3">
                            <label for="regCedulaRuc" class="form-label">Cédula / RUC</label>
                            <input type="text" class="form-control" id="regCedulaRuc" placeholder="Ej: 1712345678" required>
                        </div>
                        <div class="mb-3">
                            <label for="regNombreCliente" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="regNombreCliente" placeholder="Nombre y Apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="regDireccionCliente" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="regDireccionCliente" placeholder="Calle principal, número, ciudad" required>
                        </div>
                        <div class="mb-3">
                            <label for="regTelefonoCliente" class="form-label">Teléfono (Opcional)</label>
                            <input type="tel" class="form-control" id="regTelefonoCliente" placeholder="Ej: 0991234567">
                        </div>
                        <div class="mb-3">
                            <label for="regEmailCliente" class="form-label">Email (Opcional)</label>
                            <input type="email" class="form-control" id="regEmailCliente" placeholder="correo@ejemplo.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="formRegistrarCliente" class="btn btn-primary"><i class="bi bi-save me-2"></i>Guardar Cliente</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Referencias a elementos del DOM
            const listaProductosVenta = document.getElementById('listaProductosVenta');
            const buscarProductoInput = document.getElementById('buscarProducto');
            const btnBuscarProducto = document.getElementById('btnBuscarProducto');
            const valorRecibidoInput = document.getElementById('valorRecibido');
            const vueltoVentaSpan = document.getElementById('vueltoVenta');
            const subtotalVentaSpan = document.getElementById('subtotalVenta');
            const ivaVentaSpan = document.getElementById('ivaVenta');
            const totalGeneralSpan = document.getElementById('totalGeneral');
            const btnRealizarVenta = document.getElementById('btnRealizarVenta');
            const btnLimpiar = document.getElementById('btnLimpiar');

            // Cliente
            const buscarClienteInput = document.getElementById('buscarCliente');
            const btnSeleccionarCliente = document.getElementById('btnSeleccionarCliente');
            const clienteSeleccionadoDiv = document.getElementById('clienteSeleccionado');
            const noClienteSeleccionadoDiv = document.getElementById('noClienteSeleccionado');
            const nombreClienteDisplay = document.getElementById('nombreClienteDisplay');
            const cedulaClienteDisplay = document.getElementById('cedulaClienteDisplay');
            const formRegistrarCliente = document.getElementById('formRegistrarCliente');
            const modalRegistrarCliente = new bootstrap.Modal(document.getElementById('modalRegistrarCliente'));

            // Datos de la venta (simulados)
            let productosEnVenta = [
                { id: 1, nombre: 'Producto Moderno A', cantidad: 2, precioUnitario: 15.00 },
                { id: 2, nombre: 'Servicio Rápido B', cantidad: 1, precioUnitario: 25.00 }
            ];
            let clienteActual = null; // Objeto para almacenar el cliente seleccionado

            // --- Funciones de Cálculo y Actualización ---

            function calcularTotales() {
                let subtotal = 0;
                productosEnVenta.forEach(producto => {
                    subtotal += producto.cantidad * producto.precioUnitario;
                });
                const iva = subtotal * 0.12; // Asumiendo 12% de IVA en Ecuador
                const total = subtotal + iva;

                subtotalVentaSpan.textContent = `$${subtotal.toFixed(2)}`;
                ivaVentaSpan.textContent = `$${iva.toFixed(2)}`;
                totalGeneralSpan.textContent = `$${total.toFixed(2)}`;

                return total;
            }

            function actualizarListaProductos() {
                listaProductosVenta.innerHTML = ''; // Limpiar lista
                if (productosEnVenta.length === 0) {
                    listaProductosVenta.innerHTML = '<div class="alert alert-warning text-center" role="alert">No hay productos en la venta.</div>';
                    return;
                }

                productosEnVenta.forEach((producto, index) => {
                    const productDiv = document.createElement('div');
                    productDiv.className = 'list-group-item d-flex justify-content-between align-items-center product-item';
                    productDiv.innerHTML = `
                        <div>
                            <span class="product-item-name">${producto.nombre}</span>
                            <div class="product-item-qty-price">${producto.cantidad} x $${producto.precioUnitario.toFixed(2)}</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control form-control-sm text-center me-2" value="${producto.cantidad}" min="1" style="width: 70px;">
                            <span class="fw-bold me-3">$${(producto.cantidad * producto.precioUnitario).toFixed(2)}</span>
                            <button class="btn btn-sm btn-outline-danger" data-index="${index}"><i class="bi bi-trash"></i></button>
                        </div>
                    `;
                    listaProductosVenta.appendChild(productDiv);

                    // Añadir listeners a los nuevos elementos
                    const qtyInput = productDiv.querySelector('input[type="number"]');
                    qtyInput.addEventListener('change', (e) => {
                        const newQty = parseInt(e.target.value);
                        if (!isNaN(newQty) && newQty >= 1) {
                            productosEnVenta[index].cantidad = newQty;
                            actualizarListaProductos(); // Re-renderizar para actualizar el subtotal de la línea
                            calcularTotales();
                            actualizarVuelto();
                        } else {
                            e.target.value = productosEnVenta[index].cantidad; // Revertir si es inválido
                        }
                    });

                    const deleteBtn = productDiv.querySelector('.btn-outline-danger');
                    deleteBtn.addEventListener('click', () => {
                        productosEnVenta.splice(index, 1);
                        actualizarListaProductos();
                        calcularTotales();
                        actualizarVuelto();
                    });
                });
            }

            function actualizarVuelto() {
                const totalVenta = parseFloat(totalGeneralSpan.textContent.replace('$', ''));
                const valorRecibido = parseFloat(valorRecibidoInput.value) || 0;
                const vuelto = valorRecibido - totalVenta;
                vueltoVentaSpan.textContent = `$${Math.max(0, vuelto).toFixed(2)}`;
                if (vuelto < 0) {
                    vueltoVentaSpan.classList.remove('text-success');
                    vueltoVentaSpan.classList.add('text-danger');
                } else {
                    vueltoVentaSpan.classList.remove('text-danger');
                    vueltoVentaSpan.classList.add('text-success');
                }
            }

            function actualizarDisplayCliente() {
                if (clienteActual) {
                    nombreClienteDisplay.textContent = clienteActual.nombre;
                    cedulaClienteDisplay.textContent = clienteActual.cedulaRuc;
                    clienteSeleccionadoDiv.classList.remove('d-none');
                    noClienteSeleccionadoDiv.classList.add('d-none');
                } else {
                    clienteSeleccionadoDiv.classList.add('d-none');
                    noClienteSeleccionadoDiv.classList.remove('d-none');
                }
            }

            function limpiarVenta() {
                productosEnVenta = [];
                clienteActual = null;
                actualizarListaProductos();
                calcularTotales();
                valorRecibidoInput.value = '';
                buscarProductoInput.value = '';
                buscarClienteInput.value = '';
                actualizarVuelto();
                actualizarDisplayCliente();
            }

            // --- Event Listeners ---

            btnBuscarProducto.addEventListener('click', () => {
                const productoBuscado = buscarProductoInput.value.trim();
                if (productoBuscado) {
                    // Simulación de añadir producto (en un caso real, harías una búsqueda y seleccionarías)
                    const nuevoProducto = {
                        id: Date.now(), // ID único
                        nombre: `Producto: ${productoBuscado}`,
                        cantidad: 1,
                        precioUnitario: parseFloat((Math.random() * 20 + 5).toFixed(2)) // Precio aleatorio entre 5 y 25
                    };
                    productosEnVenta.push(nuevoProducto);
                    actualizarListaProductos();
                    calcularTotales();
                    actualizarVuelto();
                    buscarProductoInput.value = ''; // Limpiar campo después de añadir
                } else {
                    alert('Por favor, ingresa un nombre o código de producto para añadir.');
                }
            });

            // Permite añadir producto al presionar Enter
            buscarProductoInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    btnBuscarProducto.click();
                }
            });

            valorRecibidoInput.addEventListener('input', actualizarVuelto);

            btnSeleccionarCliente.addEventListener('click', () => {
                const clienteBuscado = buscarClienteInput.value.trim();
                if (clienteBuscado) {
                    // Simulación de búsqueda y selección de cliente
                    // En un caso real, esto llamaría a tu backend para buscar en la base de datos
                    // Si se encuentra, clienteActual = { id: ..., nombre: ..., cedulaRuc: ... }
                    // Si no, podrías mostrar un mensaje o abrir el modal de registro automáticamente.
                    alert(`Simulando búsqueda de cliente: "${clienteBuscado}".\n\nSi existiera, se seleccionaría. Si no, debería registrarlo.`);
                    
                    // Ejemplo de selección simulada si se "encontró"
                    clienteActual = {
                        id: 123,
                        cedulaRuc: '1712345678',
                        nombre: 'Juan Pérez García'
                    };
                    actualizarDisplayCliente();
                } else {
                    alert('Por favor, ingresa cédula, RUC o nombre para buscar un cliente.');
                }
            });

            formRegistrarCliente.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

                const regCedulaRuc = document.getElementById('regCedulaRuc').value.trim();
                const regNombreCliente = document.getElementById('regNombreCliente').value.trim();
                const regDireccionCliente = document.getElementById('regDireccionCliente').value.trim();
                const regTelefonoCliente = document.getElementById('regTelefonoCliente').value.trim();
                const regEmailCliente = document.getElementById('regEmailCliente').value.trim();

                if (regCedulaRuc && regNombreCliente && regDireccionCliente) {
                    // Aquí enviarías los datos a tu backend para guardar el nuevo cliente
                    alert(`Cliente "${regNombreCliente}" (${regCedulaRuc}) registrado con éxito (simulado).`);

                    // Después de registrar, se "selecciona" automáticamente
                    clienteActual = {
                        id: Date.now(), // ID simulado
                        cedulaRuc: regCedulaRuc,
                        nombre: regNombreCliente,
                        direccion: regDireccionCliente,
                        telefono: regTelefonoCliente,
                        email: regEmailCliente
                    };
                    actualizarDisplayCliente();
                    modalRegistrarCliente.hide(); // Ocultar el modal
                    formRegistrarCliente.reset(); // Limpiar el formulario del modal
                } else {
                    alert('Por favor, rellena todos los campos obligatorios para registrar al cliente.');
                }
            });

            btnRealizarVenta.addEventListener('click', () => {
                const totalVenta = parseFloat(totalGeneralSpan.textContent.replace('$', ''));
                const valorRecibido = parseFloat(valorRecibidoInput.value) || 0;
                const tipoDocumento = document.getElementById('tipoDocumento').value;

                if (productosEnVenta.length === 0) {
                    alert('Por favor, añade productos a la venta antes de continuar.');
                    return;
                }

                if (valorRecibido < totalVenta) {
                    alert('El valor recibido es insuficiente. Por favor, completa el pago.');
                    valorRecibidoInput.focus();
                    return;
                }

                if (!clienteActual && tipoDocumento === 'Factura') {
                    alert('Para emitir una Factura, debes seleccionar o registrar un cliente.');
                    buscarClienteInput.focus();
                    return;
                }

                // Aquí iría la lógica para guardar la venta en tu sistema
                const ventaData = {
                    productos: productosEnVenta,
                    cliente: clienteActual,
                    subtotal: parseFloat(subtotalVentaSpan.textContent.replace('$', '')),
                    iva: parseFloat(ivaVentaSpan.textContent.replace('$', '')),
                    total: totalVenta,
                    valorRecibido: valorRecibido,
                    vuelto: parseFloat(vueltoVentaSpan.textContent.replace('$', '')),
                    tipoDocumento: tipoDocumento,
                    fecha: new Date().toISOString()
                };

                console.log('Datos de la Venta a Guardar:', ventaData);
                alert('¡Venta realizada con éxito!');
                
                limpiarVenta(); // Resetear la pantalla para la siguiente venta
            });

            btnVentaCredito.addEventListener('click', () => {
                if (productosEnVenta.length === 0) {
                    alert('Añade productos a la venta antes de intentar una venta a crédito.');
                    return;
                }
                if (!clienteActual) {
                    alert('Para realizar una venta a crédito, es obligatorio seleccionar o registrar un cliente.');
                    return;
                }

                if (confirm('¿Estás seguro de realizar esta venta a crédito?')) {
                    const ventaCreditoData = {
                        productos: productosEnVenta,
                        cliente: clienteActual,
                        totalCredito: parseFloat(totalGeneralSpan.textContent.replace('$', '')),
                        fecha: new Date().toISOString()
                    };
                    console.log('Datos de Venta a Crédito:', ventaCreditoData);
                    alert('¡Venta a crédito registrada con éxito!');
                    limpiarVenta();
                }
            });

            btnLimpiar.addEventListener('click', () => {
                if (confirm('¿Estás seguro de que quieres limpiar toda la venta actual?')) {
                    limpiarVenta();
                }
            });

            // --- Inicialización ---
            actualizarListaProductos();
            calcularTotales();
            actualizarVuelto();
            actualizarDisplayCliente();
        });
    </script>
</body>
</html>