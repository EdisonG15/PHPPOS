<?php 
session_start();
            
           ?>
<style>
         .card {
            border-radius: 1rem; /* More prominent rounding */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* More noticeable, soft shadow */
            margin-bottom: 1.5rem;
            border: none; /* Remove default border */
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3); /* Gradient header */
            color: white;
            font-weight: 700; /* Bolder header text */
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .card-header .card-title {
            margin-bottom: 0;
            font-size: 1.25rem; /* Larger title */
        }

        .card-header .bi {
            font-size: 1.5rem; /* Larger icons in header */
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 0.5rem; /* Softer input corners */
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem; /* More padding for touch targets */
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .35) !important; /* Slightly wider focus shadow */
            border-color: #0d6efd !important;
        }

        /* Floating Labels - improved spacing */
        .form-floating > label {
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            color: #6c757d; /* Softer label color */
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select:focus ~ label,
        .form-floating > .form-select:not(:placeholder-shown) ~ label {
            transform: scale(0.8) translateY(-0.75rem) translateX(0.2rem); /* Adjusted for better appearance */
            background-color: #fff; /* Ensures label stands out against input */
            padding: 0 0.3rem; /* Reduces label background size */
            border-radius: 0.25rem;
        }

        /* Buttons */
        .btn {
            border-radius: 0.6rem; /* Rounded buttons */
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            transition: all 0.2s ease-in-out; /* Smooth hover effect */
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }


        /* Table Styling */
        .table {
            --bs-table-hover-bg: #e9f2fb; /* Softer hover for table */
            --bs-table-striped-bg: #f5f8fc; /* Lighter stripe */
        }

        .table thead th {
            background-color: #f1f4f8; /* Light blueish grey for header */
            color: #34495e; /* Darker, professional text */
            font-weight: 700; /* Bolder header text */
            padding: 0.9rem 1rem;
            white-space: nowrap;
            border-bottom: 2px solid #dee2e6; /* Stronger bottom border for header */
        }

        .table tbody td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e0e6ed; /* Lighter row separator */
        }

        /* Custom scrollable table container */
        .table-responsive-scroll {
            max-height: 60vh; /* Control max height */
            overflow-y: auto; /* Enable vertical scroll */
            border-radius: 0.75rem; /* Match card rounding */
            border: 1px solid #e0e6ed; /* Subtle border */
        }

        .table-responsive-scroll thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #f1f4f8; /* Ensures sticky header has background */
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* Subtle shadow for sticky header */
        }

        /* Summary Total Box */
        .summary-total-box {
            background-color: #e9f5ff; /* Light blue background for totals */
            border-radius: 0.75rem;
            padding: 1.5rem; /* More padding */
            margin-top: 1.5rem;
            text-align: center;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); /* Inner shadow for depth */
        }

        .summary-total-box h4 {
            font-weight: 700;
            color: #0056b3; /* Darker blue for "TOTAL" text */
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .summary-total-box strong {
            font-size: 2.5rem; /* Larger total amount */
            color: #007bff; /* Primary color for total amounts */
            display: block; /* Ensures it takes full line */
            margin-top: 0.5rem;
        }

        /* Specific text styles for summary */
        .summary-item {
            font-size: 1.05rem;
            font-weight: 500;
            color: #34495e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.4rem 0;
        }
        .summary-item strong {
            font-size: 1.15rem;
            color: #495057;
        }
        .summary-item .text-danger-custom {
            color: #dc3545; /* Bootstrap danger color */
            font-weight: 700; /* Bolder for emphasis */
        }

        hr.custom-hr {
            border-top: 2px dashed #e0e6ed; /* Dashed separator */
            margin: 1.5rem 0;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #5a6268;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .card-header {
                padding: 1rem;
            }
            .card-header .card-title {
                font-size: 1.1rem;
            }
            .card-header .bi {
                font-size: 1.3rem;
            }
            .summary-total-box strong {
                font-size: 2rem;
            }
        }
    </style>

<!-- <link rel="stylesheet" href="/WebPuntoVenta2025/Views/modulos/Compras/RealizarCompras/css/compra.css"> -->
<div class="container-fluid mt-4">
    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
    <input type="hidden" min="0" name="Nro_correlativo_compras" id="Nro_correlativo_compras" class="form-control form-control-sm" disabled>
    <input type="hidden" min="0" name="Nro_credito_compras" id="Nro_credito_compras">

    <div class="row g-4">
        <div class="col-md-9">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="fas fa-boxes me-2"></i>
                    <h5 class="mb-0">Datos Generales de la Compra</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="proveedorSearch" class="form-label">Proveedor <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="proveedorSearch" placeholder="Buscar o seleccionar proveedor..." list="proveedoresList" aria-label="Buscar proveedor" required>
                                <datalist id="proveedoresList">
                                    <option value="Distribuidora Alfa S.A.">
                                    <option value="Comercial Beta Ltda.">
                                    <option value="Proveedor Gamma C.A.">
                                </datalist>
                                <button class="btn btn-outline-success" type="button" id="btnRegistrarProveedor" title="Registrar Nuevo Proveedor">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaFactura" class="form-label">Fecha Factura <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="fechaFactura" value="2025-05-26" required>
                        </div>
                        <div class="col-md-3">
                            <label for="numeroFactura" class="form-label">Número Factura <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="numeroFactura" placeholder="Ej: 001-001-123456" required>
                        </div>
                        <div class="col-md-6" id="fechaVencimientoCredito" style="display: none;">
                            <label for="fechaVencimiento" class="form-label">Fecha Vencimiento Crédito</label>
                            <input type="date" class="form-control" id="fechaVencimiento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="fas fa-boxes me-2"></i>
                    <h5 class="mb-0">Detalle de Productos</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3 mb-4 align-items-end">
                        <input id="txtIdProducto" type="hidden" value="0" />
                        <input id="txtllevaIva" type="hidden" value="0" />
                        <input id="perecedero_producto" type="hidden" value="0" />
                        <input type="hidden" id="txtCodigoProducto" name="Codigo" value="">
                        <input type="hidden" id="txtNombreProducto" name="Nombre" value="">

                        <div class="col-md-5">
                            <label for="productoSearch" class="form-label">Buscar Producto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off" aria-label="Buscar producto">
                            <datalist id="productosList">
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <label for="txtFechaVencimiento" class="form-label">F. Vencimiento</label>
                            <input type="date" class="form-control" id="txtFechaVencimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="txtPrecioCompraProducto" class="form-label">Precio Compra <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="txtPrecioCompraProducto" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-1">
                            <label for="txtCantidadProducto" class="form-label">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="txtCantidadProducto" placeholder="0" min="1" required>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-success" type="button" id="btnAgregarProducto">
                                <i class="fas fa-plus-circle me-2"></i> Añadir
                            </button>
                        </div>
                    </div>   
                    <!-- <div class="card p-3 table-responsive"> 
                        <table class="table table-hover align-middle" id="tb_Compra" style="width:100%"> -->

                    <div class="card p-3 table-responsive">
                        <table class="table table-hover table-striped align-middle" id="tb_Compra" style="width:100%">
                            <thead class="table-light">
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
        </div>

        <div class="col-lg-3 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center">
                    <i class="bi bi-calculator me-2"></i>
                    <h5 class="mb-0">Resumen de Compra</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3 mb-4">
                        <button class="btn btn-primary btn-lg" id="btnIniciarComprasContado">
                            <i class="bi bi-cash-coin me-2"></i> Pagar al Contado
                        </button>
                        <button class="btn btn-outline-primary btn-lg" id="btnIniciarComprasCredit">
                            <i class="bi bi-credit-card me-2"></i> Pagar a Crédito
                        </button>
                    </div>

                    <hr class="my-4">

                    <div class="summary-item d-flex justify-content-between align-items-center mb-2">
                        <span>Items:</span>
                        <strong id="Items">0</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-2">
                        <span>Sub Total:</span>
                        <strong class="text-info" id="subTotal">$0.00</strong>
                    </div>
                    <div class="summary-item d-flex justify-content-between align-items-center mb-3">
                        <span>Impuesto 15%:</span>
                        <strong id="totalIva">$0.00</strong>
                    </div>

                    <div class="summary-total-box p-3 text-center rounded bg-light border border-primary mt-4 mb-4">
                        <h4 class="mb-2 text-primary">TOTAL A PAGAR</h4>
                        <h3 class="display-6 fw-bold text-primary" id="total_compras">$0.00</h3>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="chkafectarCaja" name="chkafectarCaja">
                        <label class="form-check-label small text-muted" for="chkafectarCaja">
                            <i class="bi bi-wallet2 me-1"></i> Afectar Caja al Registrar
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                [2, 'desc']
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

 
 function recalcularTotales() {
    let totalCompras = 0;
    let totalSubtotalCompras = 0;
    let totalIvaCompras = 0;
    let itemCount = 0;

    table_compras.rows().every(function() { // More robust iteration
        let data = this.data();
        if (data) { // Ensure data exists for the row
            totalCompras += parseFloat(data['total']) || 0;
            totalSubtotalCompras += parseFloat(data['sub_total']) || 0;
            totalIvaCompras += parseFloat(data['iva']) || 0;
            itemCount++;
        }
    });

    $("#Items").html(itemCount); // No need for .toFixed(2) for item count
    $("#subTotal").html(totalSubtotalCompras.toFixed(2));
    $("#total_compras").html(totalCompras.toFixed(2));
    $("#totalIva").html(totalIvaCompras.toFixed(2));
}



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

  </script>