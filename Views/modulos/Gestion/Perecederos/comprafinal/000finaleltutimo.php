<?php 
session_start();
            
           ?>

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
            /* border-radius: 8px; /* Applied to wrapper if overflow is hidden */
            /* overflow: hidden; /* Can clip DataTables elements, manage with wrapper or remove if using DataTables responsive */
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
        .icon-btn {
            background: none;
            border: none;
            color: var(--danger-color);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%; 
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
        .total-summary-box .d-flex { /* Assuming d-flex is from Bootstrap or similar */
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
        .action-buttons-group { /* Container for final action buttons */
             margin-top: 1.5rem; /* Spacing from the totals box */
        }
        .action-buttons-group .btn {
            padding: 0.9rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05); 
            margin-bottom: 0.5rem; /* Space between buttons if they wrap */
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

        /* Utility classes (if not using a framework like Bootstrap that provides them) */
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


        /* Basic responsive grid (similar to Bootstrap's concept) */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -0.75rem; /* Corresponds to col padding */
            margin-right: -0.75rem; /* Corresponds to col padding */
        }
        .col-md-1, .col-md-2, .col-md-3, .col-md-5, .col-md-6, .col-md-9 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            box-sizing: border-box;
            width: 100%; /* Default for smaller screens */
        }

        @media (min-width: 768px) { /* md breakpoint */
            .col-md-1 { width: calc(100% / 12 * 1); }
            .col-md-2 { width: calc(100% / 12 * 2); }
            .col-md-3 { width: calc(100% / 12 * 3); }
            .col-md-5 { width: calc(100% / 12 * 5); }
            .col-md-6 { width: calc(100% / 12 * 6); }
            .col-md-9 { width: calc(100% / 12 * 9); }
            .d-md-flex { display: flex !important; } /* For button group layout on md+ */
            .justify-content-md-end { justify-content: flex-end !important; } /* For button group layout on md+ */
        }
        input[type="hidden"] {
            display: none;
        }
    </style>


<div class="container-fluid mt-3">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>"/>
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>"/>
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" placeholder="nro Serie" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">
    
    <div class="row">
        <div class="col-md-9"> 
            <div class="section-card">
                <div class="card-header-custom">
                    <i class="fas fa-file-invoice-dollar"></i> Datos Generales de la Compra
                </div>
                <div class="card-body p-4">
                    <div class="row" style="gap: 1.5rem 0;"> <div class="col-md-6">
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
                    <div class="row align-items-end mb-4" style="gap: 1rem 0;"> <input id="txtIdProducto" type="hidden" value="0" />
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
                            <input type="number" class="form-control" id="txtCantidadProducto" placeholder="0" min="1">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary-custom" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-1"></i> Añadir
                            </button>
                        </div>
                    </div>

                    <div class="card p-3 table-responsive"> <table class="table table-hover align-middle" id="tb_Compra" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>F. Vencimiento</th>
                                    <th>Precio Compra</th>
                                    <th>Cantidad</th>
                                    <th>$-Iva</th>
                                    <th>$-Sub Total</th>
                                    <th>$-Total</th>
                                    <th class="text-center">Acciones</th> 
                                </tr>
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
                    <span>Subtotal General:</span>
                    <span id="subtotalGeneral">$ 0.00</span> </div>
                <div class="d-flex justify-content-between">
                    <span>Cant. Productos:</span>
                    <span id="totalCantidadProductos">0</span> </div>
                <div class="d-flex justify-content-between">
                    <span>Impuestos (12% IVA):</span>
                    <span id="impuestos">$ 0.00</span> </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h3>Total a Pagar:</h3>
                    <h2 class="total-amount-display" id="totalCompra">$ 0.00</h2> </div>
            </div>

            <div class="action-buttons-group d-grid gap-3 mt-5"> <button class="btn btn-success-custom" type="button" id="btnRegistrarCompra">
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
        </div> </div> </div>

<script>
  var accion;
  var table_compras;
  $(document).ready(function(){
    cargarTableProducto();
     CargarNroBoleta();
   verificarSiExisteCajaAbierta();
   $("#productoSearch").change(function() { //change cuando dectente un movimiento
        CargarProductos();        
   });  

   $('#productoSearch').on('keyup', function () {
        let query = $(this).val().trim();
    if (query.length < 2) {
      $('#productosList').empty(); // limpiar si hay poco texto
      return;
    }

    $.ajax({
        async: false,
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: {
            'accion': 6,
            'opcion': 2,
            'busqueda': query,
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("respuesta:", respuesta);

            // Limpiar datalist
            $("#productosList").empty();

            for (let i = 0; i < respuesta.length; i++) {
                const descripcion = respuesta[i]['descripcion_producto'];
                
                // Agregar opciones al datalist
                $("#productosList").append(`<option value="${descripcion}"></option>`);
            }

            // Manejar evento cuando se selecciona un producto
            $("#productoSearch").on('change', function () {
                let valor = $(this).val();
                if (valor !== '') {
                    CargarProductos(valor);
                    $(this).val('').focus(); // limpiar y volver a enfocar
                }
            });
        }
    });

  });  

   $('#btnAgregarProducto').on('click', function () {
    const $codigoProducto = $('#txtCodigoProducto');
    const $nombreProducto = $('#txtNombreProducto');
    const $idProducto = $('#txtIdProducto');
    const $cantidadProducto = $('#txtCantidadProducto');
    const $precioCompraProducto = $('#txtPrecioCompraProducto');
    const $llevaIva = $('#txtllevaIva');
    const $fechaVencimiento = $('#txtFechaVencimiento');
    const $perecedero_producto = $('#perecedero_producto');

    const codigo = $codigoProducto.val();
    const nombre = $nombreProducto.val();

    if (!codigo || !nombre) {
        Toast.fire({
            icon: 'warning',
            title: 'No Hay Producto para Agregar'
        });
        return;
    }

    let existeCodigo = table_compras.rows().data().toArray().some(row => row['codigo_producto'] === codigo);

    if (existeCodigo) {
        Toast.fire({
            icon: 'warning',
            title: 'El producto ya existe en la compra'
        });
        return;
    }

    const cantidad = parseFloat($cantidadProducto.val()) || 0;
    const precioCompra = parseFloat($precioCompraProducto.val()) || 0;
    const llevaIva = parseFloat($llevaIva.val()) || 0;
    const total = cantidad * precioCompra;
    const iva = llevaIva > 0 ? total * ivaP : 0;
    const subtotal = total - iva;

    const perecedero = parseInt($perecedero_producto.val()) || 0;
    const fechaVencimiento = $fechaVencimiento.val();

       // Validar que si el producto es perecedero, tenga fecha de vencimiento
    if (perecedero === 1 && (!fechaVencimiento || fechaVencimiento.trim() === '')) {
        Swal.fire({
            icon: 'warning',
            title: 'El producto perecedero requiere una fecha de vencimiento'
        });
        return;
    }

    table_compras.row.add({
        'id_producto': $idProducto.val(),
        'codigo_producto': codigo,
        'descripcion_producto': nombre,
        'cantidad': cantidad,
        'precio_compra_producto': precioCompra.toFixed(2),
        'iva': iva.toFixed(2),
        'sub_total': subtotal.toFixed(2),
        'total': total.toFixed(2),
        'vence': $fechaVencimiento.val()
    }).draw();

    recalcularTotales();
    limpiartxtProducto();
  });

   });

   
    function cargarTableProducto(){
     table_compras = $('#tb_Compra').DataTable({
        //  scrollY: "300px",          // Altura máxima
         scrollCollapse: true,      // Colapsa si hay pocos datos
         paging: true,              // Muestra paginación si hay muchos productos
            "columns": [
               
                { "data": "id_producto" },
                { "data": "codigo_producto" },
                { "data": "descripcion_producto" },
                { "data": "vence" } ,
                { "data": "precio_compra_producto" },
                { "data": "cantidad" },
                { "data": "iva" },
                { "data": "sub_total" },
                { "data": "total" },
                { "data": null }       
            ],
            columnDefs: [  
                {
                  targets: 9,
                  orderable: false, // no ordenar
                  render: function(data, type, full, meta) {
                      return "<center>" +                        // px tamaño
                         "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                                            "<i class='fas fa-trash fs-5'> </i> " +
                                            "</span>" 
                          "</center>"        
                    }
                },
                 { targets: 0, visible: false},{ targets: 1, visible: false},{ targets: 6, visible: false},
            ],
            "order": [
                [1, 'desc']
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            responsive: true,
          //   paging: false,
          //   searching: false,
          //  info: false
    });
    };

 function CargarProductos(producto =" "){
    
        if (producto != "") {
            codigo_producto = producto;
        } else {
             codigo_producto = $("#productoSearch").val(); 
        }
        codigo_producto = $.trim(codigo_producto.split('/')[0]);    
    $.ajax({
             url: "ajax/realizar_compras.ajax.php",
             type: "POST",
             data: {
                 'accion': 1 ,
                 'codigo_barra': codigo_producto
             },
             dataType: 'json',
             success: function(respuesta) {
          
                  $("#txtIdProducto").val(respuesta['id_producto']);
                  $("#txtCodigoProducto").val(codigo_producto);
                  $("#productoSearch").val(respuesta['descripcion_producto']);
                   $("#txtNombreProducto").val(respuesta['descripcion_producto']);
                  $("#txtPrecioCompraProducto").val(respuesta['precio_compra_producto']);
                  $("#txtllevaIva").val(respuesta['lleva_iva_producto']);
                  $("#perecedero_producto").val(respuesta['perecedero_producto']);
                 $("#txtCantidadProducto").val(1);
                
             }
     });
 };



 function recalcularTotales(){
    let totalCompras=0;
    let totalSubtotalCompras=0;
    let totalIvaCompras=0;
    let cont=0;
    table_compras.rows().eq(0).each(function(index) { // recorro un for en el listado
        cont=cont+1;
            let row = table_compras.row(index);
            let data = row.data();
            totalCompras = parseFloat(totalCompras) + parseFloat( data['total']);
            totalSubtotalCompras=  parseFloat(totalSubtotalCompras) +   parseFloat(data['sub_total']);
            totalIvaCompras= parseFloat(totalIvaCompras) +  parseFloat( data['iva']);
          
        });
        $("#Items").html(parseFloat(cont).toFixed(2));
        $("#subTotal").html(parseFloat(totalSubtotalCompras).toFixed(2));
        $("#total_compras").html(parseFloat(totalCompras).toFixed(2));
        $("#totalIva").html(parseFloat(totalIvaCompras).toFixed(2));
 };


 function limpiartxtProducto(){
        $("#txtIdProducto").val("0");
        $("#txtCodigoProducto").val("");
        $("#txtNombreProducto").val("");
        $("#txtCantidadProducto").val("1");
        $("#txtPrecioCompraProducto").val("0");
        $("#txtllevaIva").val("0");
        $("#txtFechaVencimiento").val("");
        
 };

  function LimpiarInputs(){
     limpiartxtProducto();
        $("#txtNumerofactura").val("");
        $("#txtIdProveedor").val("");
        $("#txtCantidadProducto").val("1");
        $("#iptproveedor").val("0");
        $("#iptruc").val("");
        $("#Items").html("0");
        $("#subTotal").html("0");
        $("#totalIva").html("0");
        $("#total_compras").html("0");
         $("#montoAbonado").val("0");
          $("#fechaVencimiento").val("");
        table_compras.clear().draw();
 };

 
 function verificarSiExisteCajaAbierta(){
      
      let datos = new FormData();
      datos.append("opcion", 1);
      datos.append("txt_id_caja"  ,$("#txtId_caja").val());
      datos.append("txt_id_usuario"  ,$("#txtId_usuario").val());
      $.ajax({
             url: "ajax/validar.ajax.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             dataType: 'json',
             success: function(respuesta) {
                if (parseInt(respuesta['existe']) == 0) {// si esiste pero no hasy stock

                         $("#btnBuscarProveedor") .prop('disabled', true);
                         $("#btnBuscarProducto") .prop('disabled', true);
                         $("#btnAgregarCompra") .prop('disabled', true);
                         $("#btnIniciarCompras") .prop('disabled', true);

                      Swal.fire({
                           title: 'LA CAJA SE ENCUENTRA CERRADA, TODAS LAS OPCIONES SE ENCUENTRA DESHABILITADA, POR FAVOR ABRA LA CAJA PRIMERO PARA HABILITAR LAS OPCIONES.',
                           width: 600,
                           icon: 'warning',
                           padding: '3em',
                           color: '#716add',
                       })
                 }      
              }
            });          
 };

function CargarNroBoleta() {
   $.ajax({
   async: false,
   url: "ajax/realizar_ventas.ajax.php",
   method: "POST",
   data: {
       'accion': 1
   },
   dataType: 'json',
   success: function(respuesta) {
       Nro_correlativo_compras=respuesta["nro_correlativo_compras"];
       Nro_credito_compras=respuesta["nro_credito_compras"];
       ivaP= (respuesta["impuesto"] /100);
       $("#Nro_correlativo_compras").val(Nro_correlativo_compras);
       $("#Nro_credito_compras").val(Nro_credito_compras);
   }
  });
 };

  </script>