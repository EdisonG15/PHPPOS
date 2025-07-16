<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compras - Estilo Moderno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --primary-color: #5A67D8; /* Azul violeta principal */
            --primary-light: #7F8AEF;
            --primary-dark: #434DA1;
            --secondary-color: #6B7280; /* Gris oscuro para texto secundario */
            --background-light: #F0F4F8; /* Fondo muy claro */
            --card-background: #FFFFFF; /* Fondo de tarjetas blanco puro */
            --border-color: #E2E8F0; /* Borde sutil */
            --success-color: #4CAF50;
            --warning-color: #FFC107;
            --danger-color: #F44336;
            --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-light);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .container {
            max-width: 1200px; /* Un poco más ancho para más espacio */
        }

        .section-card {
            background-color: var(--card-background);
            border-radius: 12px; /* Bordes ligeramente más suaves */
            box-shadow: var(--shadow-light);
            margin-bottom: 2.5rem; /* Más espacio entre secciones */
            border: 1px solid var(--border-color); /* Borde sutil */
        }
        .card-header-custom {
            background-color: var(--card-background);
            color: var(--primary-color);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 1.35rem;
            font-weight: 700; /* Más audaz */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            display: flex;
            align-items: center;
        }
        .card-header-custom i {
            margin-right: 10px;
            color: var(--primary-light);
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 8px; /* Bordes redondeados para inputs */
            padding: 0.75rem 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(90, 103, 216, 0.2); /* Sombra de foco más suave */
            background-color: #FBFDFF;
        }

        .input-group .btn {
            border-radius: 8px; /* Coincide con los inputs */
        }
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px); /* Efecto ligero de elevación */
        }
        .btn-outline-secondary-custom {
            border: 1px solid var(--border-color);
            color: var(--secondary-color);
            background-color: var(--card-background);
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-outline-secondary-custom:hover {
            background-color: var(--background-light);
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-inline {
            margin-right: 1.5rem; /* Más espacio entre opciones de radio */
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Estilo de la tabla */
        .table {
            border-radius: 8px;
            overflow: hidden; /* Para que los bordes redondeados se apliquen a la tabla */
            margin-top: 1rem;
        }
        .table thead th {
            background-color: var(--background-light);
            color: var(--secondary-color);
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.25rem;
        }
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        .table tbody tr:hover {
            background-color: #F8F9FA; /* Resaltado suave al pasar el mouse */
        }
        .table td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-top: 1px solid var(--border-color); /* Separadores de fila */
        }
        .icon-btn {
            background: none;
            border: none;
            color: var(--danger-color);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%; /* Botones redondos para iconos */
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .icon-btn:hover {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger-color);
        }

        /* Box de Totales */
        .total-summary-box {
            background-color: var(--card-background);
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            padding: 1.5rem;
            border: 1px solid var(--border-color);
        }
        .total-summary-box .d-flex {
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
            color: var(--secondary-color);
        }
        .total-summary-box .d-flex span:first-child {
            font-weight: 500;
        }
        .total-summary-box .total-amount-display {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-color);
            text-align: right;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px dashed var(--border-color); /* Separador punteado */
        }
        .total-summary-box h3 {
            font-weight: 700;
            color: #333;
            margin-bottom: 0;
            font-size: 1.5rem;
        }

        /* Botones de acción finales */
        .action-buttons-group .btn {
            padding: 0.9rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05); /* Sombra para botones */
        }
        .btn-success-custom {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        .btn-success-custom:hover {
            background-color: #388E3C;
            border-color: #388E3C;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .btn-warning-custom {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: #495057; /* Texto más oscuro para contraste */
        }
        .btn-warning-custom:hover {
            background-color: #FFD233;
            border-color: #FFD233;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .btn-danger-custom {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        .btn-danger-custom:hover {
            background-color: #D32F2F;
            border-color: #D32F2F;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <h2 class="mb-5 text-center" style="color: var(--primary-dark); font-weight: 800;">
            <i class="fas fa-file-invoice me-3"></i>
            Registro de Compras
        </h2>

        <div class="section-card">
            <div class="card-header-custom">
                <i class="fas fa-boxes"></i> Datos Generales de la Compra
            </div>
            <div class="card-body p-4">
                <div class="row g-4"> <div class="col-md-6">
                        <label for="proveedorSearch" class="form-label">Proveedor</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="proveedorSearch" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList">
                            <datalist id="proveedoresList">
                                <option value="Distribuidora Alfa S.A.">
                                <option value="Comercial Beta Ltda.">
                                <option value="Proveedor Gamma C.A.">
                            </datalist>
                            <button class="btn btn-outline-secondary-custom" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechaFactura" class="form-label">Fecha Factura</label>
                        <input type="date" class="form-control" id="fechaFactura" value="2025-05-26">
                    </div>
                    <div class="col-md-3">
                        <label for="numeroFactura" class="form-label">Número Factura</label>
                        <input type="text" class="form-control" id="numeroFactura" placeholder="Ej: 001-001-123456">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tipo de Pago</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoPago" id="pagoEfectivo" value="efectivo" checked>
                                <label class="form-check-label" for="pagoEfectivo">Efectivo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoPago" id="pagoCredito" value="credito">
                                <label class="form-check-label" for="pagoCredito">Crédito</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6" id="fechaVencimientoCredito" style="display: none;">
                        <label for="fechaVencimiento" class="form-label">Fecha Vencimiento Crédito</label>
                        <input type="date" class="form-control" id="fechaVencimiento">
                    </div>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="card-header-custom">
                <i class="fas fa-boxes"></i> Detalle de Productos
            </div>
            <div class="card-body p-4">
                <div class="row g-3 mb-4 align-items-end"> <div class="col-md-5">
                        <label for="productoSearch" class="form-label">Buscar Producto</label>
                        <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList">
                        <datalist id="productosList">
                            <option value="Leche Larga Vida Litro">
                            <option value="Pan Integral 400g">
                            <option value="Huevos Cubeta (30 un)">
                            <option value="Aceite de Girasol Litro">
                        </datalist>
                    </div>
                    <div class="col-md-2">
                        <label for="fechaVencimientoProducto" class="form-label">F. Vencimiento</label>
                        <input type="date" class="form-control" id="fechaVencimientoProducto">
                    </div>
                    <div class="col-md-2">
                        <label for="precioCompraProducto" class="form-label">Precio Compra</label>
                        <input type="number" class="form-control" id="precioCompraProducto" placeholder="0.00" step="0.01">
                    </div>
                    <div class="col-md-1">
                        <label for="cantidadProducto" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidadProducto" placeholder="0" min="1">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary-custom" type="button" id="btnAddProducto">
                            <i class="fas fa-plus-circle me-1"></i> Añadir
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="tablaProductos">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>F. Vencimiento</th>
                                <th>Precio Compra</th>
                                <th>Cantidad</th>
                                <th>Subtotal Ítem</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Café Molido 250g</td>
                                <td>N/A</td>
                                <td>3.50</td>
                                <td>5</td>
                                <td>17.50</td>
                                <td class="text-center"><button class="icon-btn delete-row"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                            <tr>
                                <td>Chocolate Barra 100g</td>
                                <td>2026-03-15</td>
                                <td>1.80</td>
                                <td>10</td>
                                <td>18.00</td>
                                <td class="text-center"><button class="icon-btn delete-row"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                </div>
            <div class="col-md-4">
                <div class="total-summary-box">
                    <div class="d-flex justify-content-between">
                        <span>Subtotal General:</span>
                        <span id="subtotalGeneral">$ 35.50</span>
                    </div>
                     <div class="d-flex justify-content-between">
                        <span>Cant. Productos:</span>
                        <span id="totalCantidadProductos">15</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Impuestos (12% IVA):</span>
                        <span id="impuestos">$ 4.26</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h3>Total a Pagar:</h3>
                        <h2 class="total-amount-display" id="totalCompra">$ 39.76</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-5 action-buttons-group">
            <button class="btn btn-success-custom" type="button" id="btnRegistrarCompra">
                <i class="fas fa-check-circle me-2"></i>
                Registrar Compra
            </button>
            <button class="btn btn-warning-custom" type="button" id="btnLimpiarCampos">
                <i class="fas fa-broom me-2"></i>
                Limpiar
            </button>
            <button class="btn btn-danger-custom" type="button" id="btnCancelar">
                <i class="fas fa-times me-2"></i>
                Cancelar
            </button>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioPagoCredito = document.getElementById('pagoCredito');
            const radioPagoEfectivo = document.getElementById('pagoEfectivo');
            const fechaVencimientoCreditoDiv = document.getElementById('fechaVencimientoCredito');
            const tablaProductosBody = document.querySelector('#tablaProductos tbody');
            const btnAddProducto = document.getElementById('btnAddProducto');
            const productoSearch = document.getElementById('productoSearch');
            const fechaVencimientoProducto = document.getElementById('fechaVencimientoProducto');
            const precioCompraProducto = document.getElementById('precioCompraProducto');
            const cantidadProducto = document.getElementById('cantidadProducto');

            // Mostrar/ocultar campo de fecha de vencimiento para crédito
            radioPagoCredito.addEventListener('change', function() {
                if (this.checked) {
                    fechaVencimientoCreditoDiv.style.display = 'block';
                }
            });
            radioPagoEfectivo.addEventListener('change', function() {
                if (this.checked) {
                    fechaVencimientoCreditoDiv.style.display = 'none';
                }
            });

            // Función para añadir una fila de producto a la tabla
            btnAddProducto.addEventListener('click', function() {
                const producto = productoSearch.value.trim();
                const fechaVenc = fechaVencimientoProducto.value;
                const precio = parseFloat(precioCompraProducto.value);
                const cantidad = parseInt(cantidadProducto.value);

                if (producto && !isNaN(precio) && precio > 0 && !isNaN(cantidad) && cantidad > 0) {
                    const subtotalItem = (precio * cantidad).toFixed(2);
                    const newRow = `
                        <tr>
                            <td>${producto}</td>
                            <td>${fechaVenc || 'N/A'}</td>
                            <td>${precio.toFixed(2)}</td>
                            <td>${cantidad}</td>
                            <td>${subtotalItem}</td>
                            <td class="text-center"><button class="icon-btn delete-row"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    `;
                    tablaProductosBody.insertAdjacentHTML('beforeend', newRow);

                    // Limpiar campos de entrada de producto
                    productoSearch.value = '';
                    fechaVencimientoProducto.value = '';
                    precioCompraProducto.value = '';
                    cantidadProducto.value = '';

                    updateTotals(); // Actualizar totales después de añadir
                } else {
                    alert('Por favor, ingresa un producto, precio y cantidad válidos.');
                }
            });

            // Eliminar fila de producto
            tablaProductosBody.addEventListener('click', function(e) {
                if (e.target.closest('.delete-row')) {
                    e.target.closest('tr').remove();
                    updateTotals(); // Actualizar totales después de eliminar
                }
            });

            // Función para actualizar los totales (subtotal general, cantidad total, impuestos, total compra)
            function updateTotals() {
                let subtotalGeneral = 0;
                let totalCantidadProductos = 0;

                tablaProductosBody.querySelectorAll('tr').forEach(row => {
                    const subtotalItemText = row.children[4].textContent;
                    subtotalGeneral += parseFloat(subtotalItemText);
                    totalCantidadProductos += parseInt(row.children[3].textContent);
                });

                const impuestos = subtotalGeneral * 0.12; // Asumiendo 12% de IVA en Ecuador
                const totalCompra = subtotalGeneral + impuestos;

                document.getElementById('subtotalGeneral').textContent = `$ ${subtotalGeneral.toFixed(2)}`;
                document.getElementById('totalCantidadProductos').textContent = totalCantidadProductos;
                document.getElementById('impuestos').textContent = `$ ${impuestos.toFixed(2)}`;
                document.getElementById('totalCompra').textContent = `$ ${totalCompra.toFixed(2)}`;
            }

            // Llamar a updateTotals al cargar la página para reflejar los datos de ejemplo
            updateTotals();

            // Botón de Registrar Compra (ejemplo de alerta)
            document.getElementById('btnRegistrarCompra').addEventListener('click', function() {
                alert('¡Compra registrada exitosamente! (Lógica de guardado se implementaría aquí)');
                // Aquí iría la lógica para enviar los datos al backend
            });

            // Botón Limpiar Campos
            document.getElementById('btnLimpiarCampos').addEventListener('click', function() {
                if (confirm('¿Estás seguro de que quieres limpiar todos los campos?')) {
                    document.getElementById('proveedorSearch').value = '';
                    document.getElementById('fechaFactura').value = '';
                    document.getElementById('numeroFactura').value = '';
                    document.getElementById('pagoEfectivo').checked = true;
                    fechaVencimientoCreditoDiv.style.display = 'none';
                    document.getElementById('fechaVencimiento').value = '';
                    tablaProductosBody.innerHTML = ''; // Limpiar filas de la tabla
                    updateTotals(); // Recalcular totales a cero
                }
            });

             // Botón Cancelar
            document.getElementById('btnCancelar').addEventListener('click', function() {
                if (confirm('¿Estás seguro de que quieres cancelar y salir sin guardar?')) {
                    alert('Operación cancelada.');
                    document.getElementById('btnLimpiarCampos').click();
                }
            });
        });
    </script>
</body>
</html>