<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
            overflow-x: hidden; /* Prevent horizontal scrollbars during transitions */
        }
        .container-fluid { /* Using container-fluid for full width, mt-3 for top margin */
            padding-left: 1rem;
            padding-right: 1rem;
        }
         .container { /* Custom container class from your CSS */
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-card {
            background-color: var(--card-background);
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            margin-bottom: 2.5rem;
            border: 1px solid var(--border-color);
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
            display: block; 
        }
        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 8px; 
            padding: 0.75rem 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
            width: 100%; 
            box-sizing: border-box; 
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(90, 103, 216, 0.2); 
            background-color: #FBFDFF;
        }

        .input-group { /* For combining input and button */
            display: flex;
            width: 100%;
        }
        .input-group .form-control {
            flex-grow: 1;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group .btn { /* Ensure button in input group has correct rounding */
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-radius: 8px; /* Overrides individual if it's the only element or for overall consistency */
            white-space: nowrap;
        }
         /* Ensure specific button styles are applied correctly */
        .input-group .btn-outline-secondary-custom {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }


        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.1s ease;
            cursor: pointer;
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px); 
        }
        .btn-outline-secondary-custom {
            border: 1px solid var(--border-color);
            color: var(--secondary-color);
            background-color: var(--card-background);
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .btn-outline-secondary-custom:hover {
            background-color: var(--background-light);
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-inline {
            margin-right: 1.5rem; 
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Estilo de la tabla */
        .table-responsive { /* Using Bootstrap's default responsive class if available, or your custom styles */
            overflow-x: auto;
            width: 100%;
        }
        .table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 1rem;
        }
        .table thead th {
            background-color: var(--background-light);
            color: var(--secondary-color);
            font-weight: 600;
            border-bottom: 2px solid var(--border-color); 
            padding: 1rem 1.25rem;
            text-align: left; 
        }
        .table tbody tr {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid var(--border-color); 
        }
        .table tbody tr:last-child {
            border-bottom: none; 
        }
        .table tbody tr:hover {
            background-color: #F8F9FA; 
        }
        .table td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
        }
        .icon-btn, .btnEliminarproducto { /* Combined styles for delete buttons */
            background: none;
            border: none;
            color: var(--danger-color);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%; 
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .icon-btn:hover, .btnEliminarproducto:hover {
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
            border-top: 1px dashed var(--border-color); 
        }
        .total-summary-box h3 {
            font-weight: 700;
            color: #333;
            margin-bottom: 0;
            font-size: 1.5rem;
        }

        /* Botones de acción finales */
        .action-buttons-group { 
             margin-top: 1.5rem; 
        }
        .action-buttons-group .btn {
            padding: 0.9rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05); 
            margin-bottom: 0.5rem; 
        }
        .btn-success-custom {
            background-color: var(--success-color);
            border-color: var(--success-color);
            color: white;
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
            color: #495057; 
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
            color: white;
        }
        .btn-danger-custom:hover {
            background-color: #D32F2F;
            border-color: #D32F2F;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        /* Utility classes */
        .mt-3 { margin-top: 1rem; }
        .mt-5 { margin-top: 3rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .p-3 { padding: 1rem; }
        .p-4 { padding: 1.5rem; }
        .me-1 { margin-right: 0.25rem; }
        .me-2 { margin-right: 0.5rem; }
        .text-center { text-align: center; }
        .align-items-end { align-items: flex-end; }
        .justify-content-between { justify-content: space-between; }
        .align-items-center { align-items: center; }
        .d-flex { display: flex; }
        .d-grid { display: grid; }
        .gap-3 { gap: 1rem; }

        /* Basic responsive grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -0.75rem; 
            margin-right: -0.75rem; 
        }
        .col-md-1, .col-md-2, .col-md-3, .col-md-5, .col-md-6, .col-md-9 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            box-sizing: border-box;
            width: 100%; 
        }

        @media (min-width: 768px) { /* md breakpoint */
            .col-md-1 { width: calc(100% / 12 * 1); }
            .col-md-2 { width: calc(100% / 12 * 2); }
            .col-md-3 { width: calc(100% / 12 * 3); }
            .col-md-5 { width: calc(100% / 12 * 5); }
            .col-md-6 { width: calc(100% / 12 * 6); }
            .col-md-9 { width: calc(100% / 12 * 9); }
            .d-md-flex { display: flex !important; } 
            .justify-content-md-end { justify-content: flex-end !important; } 
        }
        input[type="hidden"] {
            display: none;
        }
    </style>
</head>
<body>

<div class="container-fluid mt-3">
    <input id="txtId_usuario" type="hidden" value="<?php echo isset($_SESSION["usuario"]->id_usuario) ? $_SESSION["usuario"]->id_usuario : ''; ?>"/>
    <input id="txtId_caja" type="hidden" value="<?php echo isset($_SESSION["usuario"]->id_caja) ? $_SESSION["usuario"]->id_caja : ''; ?>"/>
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" placeholder="nro Serie" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">
    
    <div class="row">
        <div class="col-md-9"> 
            <div class="section-card">
                <div class="card-header-custom">
                    <i class="fas fa-file-invoice-dollar"></i> Datos Generales de la Compra
                </div>
                <div class="card-body p-4">
                    <div class="row" style="gap: 1.5rem 0;"> 
                        <div class="col-md-6">
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
                    <div class="row align-items-end mb-4" style="gap: 1rem 0;"> 
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="" >

                        <div class="col-md-5">
                            <label for="productoSearch" class="form-label">Buscar Producto</label>
                            <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off">
                            <datalist id="productosList">
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label">F. Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label">Precio Compra</label>
                            <input type="number" class="form-control" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="txtCantidadProducto" placeholder="0" min="1" value="1">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary-custom" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-1"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="card p-3 table-responsive"> 
                        <table class="table table-hover align-middle" id="tb_Compra" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th> <th>Código</th> <th>Producto</th> <th>F. Vencimiento</th> <th>Precio Compra</th> <th>Cantidad</th> <th>$-Iva</th> <th>$-Sub Total</th> <th>$-Total</th> <th class="text-center">Acciones</th>  </tr>
                            </thead>
                            <tbody>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <div class="col-md-3">
            <div class="total-summary-box">
                <div class="d-flex justify-content-between">
                    <span>Items:</span>
                    <span id="totalItems">0</span> 
                </div>
                <div class="d-flex justify-content-between">
                    <span>Subtotal General:</span>
                    <span id="subtotalGeneralDisplay">$ 0.00</span> 
                </div>
                <div class="d-flex justify-content-between">
                    <span>Impuestos (IVA):</span>
                    <span id="impuestosDisplay">$ 0.00</span> 
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h3>Total a Pagar:</h3>
                    <h2 class="total-amount-display" id="totalCompraDisplay">$ 0.00</h2> 
                </div>
            </div>

            <div class="action-buttons-group d-grid gap-3 mt-5"> 
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
        </div> </div> </div> <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var table_compras; // Hacerla global para que sea accesible
    const IVA_RATE = 0.12; // Definir la tasa de IVA globalmente o según configuración

    // Función para limpiar los campos de entrada del producto
    function limpiarCamposProducto() {
        $('#txtIdProducto').val('0');
        $('#txtCodigoProducto').val('');
        $('#productoSearch').val(''); // Limpiar el campo de búsqueda también
        $('#txtNombreProducto').val('');
        $('#txtPrecioCompraProducto').val('');
        $('#txtllevaIva').val('0');
        $('#perecedero_producto').val('0');
        $('#txtFechaVencimiento').val('');
        $('#txtCantidadProducto').val('1'); // Resetear cantidad a 1
        $('#productoSearch').focus(); // Poner foco en el buscador
    }

    function cargarTableProducto(){
        table_compras = $('#tb_Compra').DataTable({
            scrollY: "300px",        // Altura máxima
            scrollCollapse: true,    // Colapsa si hay pocos datos
            paging: true,            // Muestra paginación
            "columns": [
                { "data": "id_producto" },           // 0
                { "data": "codigo_producto" },       // 1
                { "data": "descripcion_producto" },   // 2
                { "data": "vence" } ,                // 3
                { "data": "precio_compra_producto" },// 4
                { "data": "cantidad" },              // 5
                { "data": "iva" },                   // 6
                { "data": "sub_total" },             // 7
                { "data": "total" },                 // 8
                { "data": null }                     // 9 Acciones
            ],
            columnDefs: [  
                {
                    targets: 9, // Columna de acciones
                    orderable: false, 
                    render: function(data, type, full, meta) {
                        return "<center>" +
                               "<span class='btnEliminarproducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                               "<i class='fas fa-trash fs-5'></i> " +
                               "</span>" +
                               "</center>";      
                    }
                },
                // Ocultar columnas si es necesario, por ejemplo, ID.
                { targets: [0], visible: false }, // Ocultar id_producto
                // { targets: [1], visible: false }, // No ocultar codigo_producto si es útil
                // { targets: [6], visible: false }, // No ocultar IVA si es útil
            ],
            "order": [
                [2, 'asc'] // Ordenar por descripción de producto por defecto
            ],
            "language": { // Lenguaje en español para DataTables
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            responsive: true, // Habilitar la extensión Responsive
            // searching: false, // Deshabilitar búsqueda global de DataTables si se usa la propia
            // info: false, // Ocultar información de "Mostrando x de y"
        });
    };

    function CargarProductos(productoSeleccionado = ""){
        let codigo_producto_busqueda;
        
        if (productoSeleccionado !== "") {
            // Asumimos que productoSeleccionado es la descripción que viene del datalist
            // Necesitamos hacer un AJAX para obtener el código si solo tenemos la descripción
            // O, idealmente, el datalist deberia tener el código o ID en el 'value' o un data-attribute
            // Por ahora, si hay productoSeleccionado, se usará directamente para la búsqueda si tu AJAX lo soporta.
            // Si no, necesitarás ajustar esta lógica para obtener el código primero.
            codigo_producto_busqueda = productoSeleccionado; // O extraer el código si está en el string
        } else {
            codigo_producto_busqueda = $("#productoSearch").val(); 
        }
        
        // Limpiar la parte después de '/' si existe (ej. "COD001 / Producto Ejemplo")
        codigo_producto_busqueda = $.trim(codigo_producto_busqueda.split('/')[0]); 
        
        if (!codigo_producto_busqueda) return; // No buscar si está vacío

        $.ajax({
            url: "ajax/realizar_compras.ajax.php", // Endpoint para buscar UN producto por código/desc
            type: "POST",
            data: {
                'accion': 1 , // Acción para buscar un producto específico
                'codigo_barra': codigo_producto_busqueda // O el término de búsqueda que use tu AJAX
            },
            dataType: 'json',
            success: function(respuesta) {
                if (respuesta && respuesta.id_producto) { // Verificar si se encontró el producto
                    $("#txtIdProducto").val(respuesta.id_producto);
                    $("#txtCodigoProducto").val(respuesta.codigo_producto); // Usar el código real del producto
                    $("#productoSearch").val(respuesta.descripcion_producto); // Actualizar con la descripción completa
                    $("#txtNombreProducto").val(respuesta.descripcion_producto);
                    $("#txtPrecioCompraProducto").val(respuesta.precio_compra_producto);
                    $("#txtllevaIva").val(respuesta.lleva_iva_producto);
                    $("#perecedero_producto").val(respuesta.perecedero_producto);
                    $("#txtCantidadProducto").val(1).focus(); // Poner cantidad 1 y foco
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Producto no encontrado',
                        text: 'El código o descripción ingresado no arrojó resultados.'
                    });
                    limpiarCamposProducto(); // Limpiar campos si no se encuentra
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar producto:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error de Conexión',
                    text: 'No se pudo comunicar con el servidor para buscar el producto.'
                });
                limpiarCamposProducto();
            }
        });
    };

    function recalcularTotales(){
        let totalCompraFinal = 0;
        let subtotalGeneral = 0;
        let ivaGeneral = 0;
        let itemCount = 0;

        table_compras.rows().data().each(function(item) {
            itemCount += parseFloat(item.cantidad) || 0;
            subtotalGeneral += parseFloat(item.sub_total) || 0;
            ivaGeneral += parseFloat(item.iva) || 0;
            totalCompraFinal += parseFloat(item.total) || 0;
        });

        $("#totalItems").html(itemCount); // ID corregido
        $("#subtotalGeneralDisplay").html(`$ ${subtotalGeneral.toFixed(2)}`); // ID corregido
        $("#impuestosDisplay").html(`$ ${ivaGeneral.toFixed(2)}`); // ID corregido
        $("#totalCompraDisplay").html(`$ ${totalCompraFinal.toFixed(2)}`); // ID corregido
    };

    $(document).ready(function(){
        cargarTableProducto(); // Inicializar la DataTable

        // --- Evento para buscar producto al escribir en el input y popular datalist ---
        $('#productoSearch').on('keyup', function () {
            console.log
            let query = $(this).val().trim();
            if (query.length < 2) { // Empezar a buscar con al menos 2 caracteres
                $('#productosList').empty(); 
                return;
            }

            $.ajax({
                async: true, // Permitir asincronía para no bloquear UI
                url: "ajax/productos.ajax.php", // Endpoint para búsqueda general de productos
                method: "POST",
                data: {
                    'accion': 6, // Acción para búsqueda en lista
                    'opcion': 2, // Tu opción específica
                    'busqueda': query,
                },
                dataType: 'json',
                success: function(respuesta) {
                    $("#productosList").empty(); // Limpiar datalist antes de agregar nuevas opciones
                    if (respuesta && respuesta.length > 0) {
                        for (let i = 0; i < respuesta.length; i++) {
                            const producto = respuesta[i];
                            // Idealmente, el valor debería ser algo único como el ID o código,
                            // y la etiqueta visible ser la descripción.
                            // Ejemplo: <option value="${producto.codigo_producto}" data-id="${producto.id_producto}">${producto.descripcion_producto}</option>
                            // Por ahora, se usa la descripción como en tu código original.
                            $("#productosList").append(`<option value="${producto.descripcion_producto}">`);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al buscar productos para datalist:", error);
                }
            });
        }); 

        // --- Evento para cargar datos del producto cuando se selecciona una opción del datalist o se presiona Enter ---
        // El evento 'change' se dispara cuando el valor del input cambia y pierde el foco.
        // Para capturar la selección de datalist más efectivamente, a veces se usa 'input' o se combina con 'blur'.
        // O se puede manejar cuando el usuario presiona Enter.
        $("#productoSearch").on('change', function() { 
            let valorSeleccionado = $(this).val();
            if (valorSeleccionado) {
                CargarProductos(valorSeleccionado); 
                // No limpiar el input aquí inmediatamente, CargarProductos lo hará si es necesario o actualizará.
            }
        });

        // --- Botón Agregar Producto ---
        $('#btnAgregarProducto').on('click', function () {
            const idProducto = $('#txtIdProducto').val();
            const codigoProducto = $('#txtCodigoProducto').val();
            const nombreProducto = $('#txtNombreProducto').val();
            const cantidad = parseFloat($('#txtCantidadProducto').val()) || 0;
            const precioCompra = parseFloat($('#txtPrecioCompraProducto').val()) || 0;
            const llevaIvaProducto = $('#txtllevaIva').val(); // '0' o '1' como string
            const esPerecedero = $('#perecedero_producto').val(); // '0' o '1'
            const fechaVencimiento = $('#txtFechaVencimiento').val();

            if (!idProducto || idProducto === "0" || !codigoProducto || !nombreProducto) {
                Swal.fire({ // Usar Swal en lugar de Toast para mensajes más descriptivos
                    icon: 'warning',
                    title: 'Producto no seleccionado',
                    text: 'Por favor, busque y seleccione un producto válido antes de agregarlo.'
                });
                return;
            }

            if (cantidad <= 0) {
                 Swal.fire('Cantidad Inválida', 'La cantidad debe ser mayor a cero.', 'warning');
                 $('#txtCantidadProducto').focus();
                 return;
            }
             if (precioCompra <= 0) {
                 Swal.fire('Precio Inválido', 'El precio de compra debe ser mayor a cero.', 'warning');
                 $('#txtPrecioCompraProducto').focus();
                 return;
            }


            // Validar fecha de vencimiento para productos perecederos
            if (esPerecedero === '1' && (!fechaVencimiento || fechaVencimiento.trim() === '')) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Fecha de Vencimiento Requerida',
                    text: 'Este producto es perecedero y necesita una fecha de vencimiento.'
                });
                $('#txtFechaVencimiento').focus();
                return;
            }

            // Verificar si el producto ya existe en la tabla (por ID o código)
            let productoExistente = false;
            table_compras.rows().data().each(function(rowData) {
                if (rowData.id_producto === idProducto) {
                    productoExistente = true;
                }
            });

            if (productoExistente) {
                Swal.fire({
                    icon: 'info',
                    title: 'Producto ya agregado',
                    text: 'Este producto ya se encuentra en la lista. Puede modificar la cantidad allí si es necesario.'
                });
                return;
            }

            const subtotalProducto = cantidad * precioCompra;
            const ivaCalculado = (llevaIvaProducto === '1') ? subtotalProducto * IVA_RATE : 0;
            const totalProducto = subtotalProducto + ivaCalculado;

            table_compras.row.add({
                'id_producto': idProducto,
                'codigo_producto': codigoProducto,
                'descripcion_producto': nombreProducto,
                'cantidad': cantidad,
                'precio_compra_producto': precioCompra.toFixed(2),
                'iva': ivaCalculado.toFixed(2),
                'sub_total': subtotalProducto.toFixed(2), // Subtotal antes de IVA
                'total': totalProducto.toFixed(2),     // Total con IVA
                'vence': fechaVencimiento || 'N/A' // Si no hay fecha, poner N/A
            }).draw(false); // false para no resetear paginación

            recalcularTotales();
            limpiarCamposProducto(); // Limpiar campos para el siguiente producto
        });

        // --- Eliminar producto de la tabla ---
        $('#tb_Compra tbody').on('click', '.btnEliminarproducto', function() {
            table_compras.row($(this).parents('tr')).remove().draw(false);
            recalcularTotales();
        });
        
        // --- Limpiar Campos Generales y Tabla ---
        $('#btnLimpiarCampos').on('click', function() {
            $('#proveedorSearch').val('');
            $('#fechaFactura').val('2025-05-26'); // O una fecha actual dinámica
            $('#numeroFactura').val('');
            $('#fechaVencimiento').val('');
            $('#fechaVencimientoCredito').hide();

            limpiarCamposProducto();
            table_compras.clear().draw();
            recalcularTotales();
            
            Swal.fire('Limpiado', 'Se han limpiado todos los campos y la lista de productos.', 'success');
        });

        // --- Cancelar Compra ---
        $('#btnCancelar').on('click', function() {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Se cancelará la compra actual y se limpiarán todos los datos.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cancelar',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#btnLimpiarCampos').click(); // Simula clic en limpiar
                    // Podrías redirigir o hacer otra acción aquí
                }
            })
        });
        
        // --- Registrar Compra (Placeholder) ---
        $('#btnRegistrarCompra').on('click', function() {
            if (table_compras.rows().count() === 0) {
                Swal.fire('Error', 'No hay productos en la lista para registrar la compra.', 'error');
                return;
            }
            // Aquí iría tu lógica para recolectar todos los datos (proveedor, factura, productos de la tabla)
            // y enviarlos mediante AJAX a tu backend para guardarlos.
            Swal.fire('Registrar', 'Lógica de registro de compra pendiente.', 'info');
            console.log("Datos de la tabla para enviar:", table_compras.rows().data().toArray());
            console.log("Proveedor:", $('#proveedorSearch').val());
            console.log("Nro Factura:", $('#numeroFactura').val());
            // ... y más datos que necesites.
        });


        // --- IMPORTANT: Sidebar Integration for Table Adjustment ---
        // Este botón es SOLO PARA DEMOSTRACIÓN. Debes reemplazarlo con tu lógica REAL de sidebar.
        const mockSidebarToggleButton = $('<button class="btn btn-primary-custom" style="position: fixed; top: 10px; left: 10px; z-index: 1000;">Alternar Sidebar (Demo)</button>').appendTo('body');
        let isSidebarCollapsed = false;
        const mainContentColumn = $('.col-md-9'); 

        mockSidebarToggleButton.on('click', function() {
            isSidebarCollapsed = !isSidebarCollapsed;
            if (isSidebarCollapsed) {
                mainContentColumn.css('width', '100%'); 
                console.log('Mock sidebar colapsada.');
            } else {
                mainContentColumn.css('width', 'calc(100% / 12 * 9)'); 
                console.log('Mock sidebar expandida.');
            }

            // AJUSTAR DATATABLE DESPUÉS DEL CAMBIO DE DISEÑO.
            // Un pequeño timeout asegura que el DOM se haya actualizado.
            setTimeout(function() {
                if ($.fn.DataTable.isDataTable('#tb_Compra')) {
                    table_compras.columns.adjust().responsive.recalc().draw(false); 
                    console.log('DataTable ajustada por cambio de sidebar (mock).');
                }
            }, 250); // Ajusta este timeout si la animación de tu sidebar es más larga (ej. 300ms para transición de 0.3s)
        });
        // --- Fin del Mockup ---

        // CÓMO INTEGRAR CON TU SIDEBAR *REAL*:
        // 1. Identifica el evento o función JavaScript que se dispara cuando tu sidebar TERMINA de abrirse/cerrarse.
        // 2. Dentro de ese evento/función, llama a las líneas de ajuste de DataTable.

        // EJEMPLO usando un evento 'transitionend' (si tu sidebar usa transiciones CSS):
        // const actualSidebarElement = document.getElementById('tu-sidebar-real-id'); 
        // if (actualSidebarElement) {
        //     actualSidebarElement.addEventListener('transitionend', function() {
        //         if ($.fn.DataTable.isDataTable('#tb_Compra')) {
        //             console.log('Transición de sidebar real finalizada. Ajustando DataTable.');
        //             table_compras.columns.adjust().responsive.recalc().draw(false);
        //         }
        //     });
        // }

        // EJEMPLO si tu sidebar se alterna con un simple click de jQuery sin transiciones CSS complejas:
        // $('#tu-boton-real-de-sidebar-id').on('click', function() {
        //     // ... tu código que alterna la sidebar ...
        //     
        //     setTimeout(function() {
        //         if ($.fn.DataTable.isDataTable('#tb_Compra')) {
        //             console.log('Sidebar real alternada. Ajustando DataTable.');
        //             table_compras.columns.adjust().responsive.recalc().draw(false);
        //         }
        //     }, 250); // Ajusta el delay según la rapidez con que se actualiza el layout
        // });

        // Inicializar totales al cargar la página
        recalcularTotales();

    }); // Fin de $(document).ready
</script>

</body>
</htm