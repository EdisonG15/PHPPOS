   <?php
    session_start()
    ?>
   <link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
   <script src="/WebPuntoVenta2025/Views/util/js/validarDocumento.js"></script>
   <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <style>
       :root {
           --primary-color: #007bff;
           /* Azul vibrante */
           --secondary-color: #6c757d;
           /* Gris sutil */
           --accent-color: #28a745;
           /* Verde para éxito */
           --bg-light: #f4f7f6;
           /* Fondo muy claro */
           --card-bg: #ffffff;
           /* Fondo de tarjetas */
           --text-dark: #343a40;
           /* Texto oscuro */
           --border-radius: 0.75rem;
           /* Bordes más redondeados */
           --shadow-light: rgba(0, 0, 0, 0.08);
           /* Sombra suave */

           --primary-color: #5A67D8;
           /* Azul violeta principal */
           --primary-light: #7F8AEF;
           --primary-dark: #434DA1;
           --secondary-color: #6B7280;
           /* Gris oscuro para texto secundario */
           --background-light: #F0F4F8;
           /* Fondo muy claro */
           --card-background: #FFFFFF;
           /* Fondo de tarjetas blanco puro */
           --border-color: #E2E8F0;
           /* Borde sutil */
           --success-color: #4CAF50;
           --warning-color: #FFC107;
           --danger-color: #F44336;
           --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.06);
           --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.1);
       }

       .container-fluid {
           padding-top: 1rem;
           padding-left: 1rem;
           padding-right: 1rem;
       }

       .section-card {
           background-color: var(--card-background);
           border-radius: 12px;
           box-shadow: var(--shadow-light);
           margin-bottom: 1.5rem;
           border: 1px solid var(--border-color);
       }

       .card-header-custom {
           background-color: var(--card-background);
           color: var(--primary-color);
           padding: 1rem 1rem;
           border-bottom: 1px solid var(--border-color);
           font-size: 1.35rem;
           font-weight: 700;
           /* Más audaz */
           border-top-left-radius: 12px;
           border-top-right-radius: 12px;
           display: flex;
           align-items: center;
       }

       .card-header-custom i {
           margin-right: 10px;
           color: var(--primary-light);
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
           padding: 1rem 1rem;
           border-bottom: 1px solid rgba(0, 0, 0, 0.125);
       }

       .card-header.bg-success {
           background-color: var(--accent-color) !important;
       }

       .card-header.bg-info {
           background-color: #17a2b8 !important;
           /* Mantenemos info de Bootstrap */
       }

       .form-control,
       .form-select {
           border-radius: 0.5rem;
           padding: 0.75rem 1rem;
           border: 1px solid #ced4da;
           transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
       }

       .form-control:focus,
       .form-select:focus {
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
           color: var(--text-dark);
           /* Texto oscuro para contraste */
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
           overflow: hidden;
           /* Para que los bordes redondeados se apliquen al encabezado */
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
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-9">
               <div class="section-card">
                 <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-invoice-dollar"></i> Datos Generales de la Venta</span>
        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosVenta" aria-expanded="false" aria-controls="collapseDatosVenta">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>  <div class="collapse" id="collapseDatosVenta">
                   <div class="card-body p-4">
                       <div class="row" style="gap: 1.5rem 0;">
                           <div class="col-md-6">
                               <input type="hidden" min="0" name="iptNroVenta" id="iptNroVenta"
                                   class="form-control form-control-sm" placeholder="Nro Venta" disabled>

                               <input id="txtIdCliente" type="hidden" value="1" />

                               <input id="txtId_usuario" type="hidden" value="<?php
                                                                                echo  $_SESSION["usuario"]->id_usuario ?>" />

                               <input id="txtId_caja" type="hidden" value="<?php
                                                                            echo  $_SESSION["usuario"]->id_caja ?>" />
                               <input id="txtNumeroDocumento" type="hidden" value="0" />
                               <label for="clienteSearch" class="form-label">Cliente</label>
                               <div class="input-group">
                                   <input type="text" class="form-control" id="clienteSearch" placeholder="Buscar o seleccionar cliente..." list="clientesList" autocomplete="off">
                                   <datalist id="clientesList">

                                   </datalist>
                                   <button class="btn btn-outline-secondary-custom" type="button" id="btnRegistrarCliente" title="Registrar Nuevo Cliente">
                                       <i class="fas fa-user-plus"></i>
                                   </button>
                               </div>
                           </div>
                           <div class="col-md-3">
                               <label for="selDocumentoVenta" class="form-label">Tipo de Documento</label>
                               <select class="form-select form-select-lg" id="selDocumentoVenta">
                                   <option selected value="03">Ticket</option>
                                   <option value="01">Factura</option>

                               </select>
                           </div>
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


                           <div class="col-md-5">
                               <!-- <label for="productoSearch" class="form-label">Buscar Producto</label> -->
                               <!-- <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." list="productosList" autocomplete="off">
                               <datalist id="productosList">
                               </datalist> -->
                                <label for="productoSearch" class="form-label">Buscar Producto</label>
                                <input type="text" class="form-control" id="productoSearch" placeholder="Buscar o seleccionar producto..." autocomplete="off">
                                <div id="productosSugerencias" class="sugerencias-container"></div>
                           </div>
                       </div>

                       <div class="card p-3 table-responsive">
                           <table class="table table-hover align-middle" id="lstProductosVenta" style="width:100%">
                               <thead>
                                   <tr>
                                       <th></th>
                                       <th>Id Producto</th>
                                       <th>Código</th>
                                       <th>Id Categoria</th>
                                       <th>Categoria</th>
                                       <th>Descripción</th>
                                       <th>Unidad</th>
                                       <th>LLeva Iva</th>
                                       <th>Cant.</th>
                                       <th>Precio</th>
                                       <th>Iva</th>
                                       <th>SubTotal</th>
                                       <th>Total</th>
                                       <th class="text-center">Acciones</th>
                                       <th>Normal</th>
                                       <th>Precio 1</th>
                                       <th>Precio 2</th>
                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>

           </div>

           <!-- 🧾 Resumen de Venta -->
           <div class="col-md-3">
               <div class="card">
                   <div class="card-header bg-success">
                       <h4 class="mb-0"><i class="bi bi-receipt-cutoff me-2"></i>Resumen de Venta</h4>
                   </div>
                   <div class="card-body">
                       <div class="summary-box mb-4">
                           <div class="d-flex justify-content-between mb-2">
                               <span>Subtotal:</span>
                               <span id="boleta_subtotal" class="fw-bold"></span>
                           </div>
                           <div class="d-flex justify-content-between mb-2">
                               <span class="iva_label">IVA (12%):</span>
                               <span id="boleta_igv" class="fw-bold"></span>
                           </div>
                           <div class="d-flex justify-content-between align-items-center mt-3">
                               <strong>Total Venta:</strong>
                               <strong id="totalVenta" class="display-5"></strong>
                           </div>
                       </div>

                       <hr class="my-4">

                       <div class="mb-4">
                           <label for="iptEfectivoRecibido" class="form-label fs-5">Valor Recibido</label>
                           <input type="number" class="form-control form-control-lg text-end" id="iptEfectivoRecibido" placeholder="0.00" step="0.01" min="0">
                       </div>

                       <div class="summary-box mb-4">
                           <div class="d-flex justify-content-between align-items-center">
                               <span>Vuelto:</span>
                               <span id="Vuelto" class="display-6 text-success">$</span>
                           </div>
                       </div>

                       <hr class="my-4">
                       <div class="d-grid gap-3">
                           <button type="button" class="btn btn-primary btn-lg shadow" id="btnIniciarVentaContado">
                               <i class="bi bi-check-circle me-2"></i> Realizar Venta
                           </button>
                           <button type="button" class="btn btn-warning btn-lg shadow" id="btnVentaCredit">
                               <i class="bi bi-credit-card me-2"></i> Venta a Crédito
                           </button>
                           <button type="button" class="btn btn-secondary btn-lg shadow" id="btnVaciarListado">
                               <i class="bi bi-x-circle me-2"></i> Limpiar Venta
                           </button>
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="modalRegistrarCliente" tabindex="-1" aria-labelledby="modalRegistrarClienteLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
               <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                   <h5 class="modal-title" id="modalRegistrarClienteLabel">
                       <i class="bi bi-person-add me-2"></i>Registrar Nuevo Cliente
                   </h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <input type="hidden" id="IdCliente" name="cliente" value="0">
               <div class="modal-body">
                   <div class="card shadow-sm border-0">
                       <div class="card-body">
                           <form class="needs-validation" novalidate>

                               <div class="row mb-3">
                                   <div class="form-floating col-md-6">
                                       <div class="form-floating">
                                           <select class="form-select form-control-modern" id="selTipoIdentificacion">
                                               <option value="04" selected>RUC</option>
                                               <option value="05">Cédula</option>
                                               <!-- <option value="06">Pasaporte</option> -->
                                           </select>
                                           <label for="selTipoIdentificacion">Tipo Identificación <span class="text-danger"></span></label>
                                       </div>
                                   </div>
                                   <div class="col-md-6 d-flex align-items-end pt-3">
                                       <div class="form-check">
                                           <input type="checkbox" class="form-check-input" id="chkValidar">
                                           <label class="form-check-label text-muted small" for="chkValidar">No validar RUC</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptNumeroDocumento"
                                           name="iptNumeroDocumento" maxlength="13" minlength="10" placeholder="Ej. 0987654321" required
                                           autocomplete="off">
                                       <label for="iptNumeroDocumento">Número Cédula <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar la cédula del cliente.</div>
                                   </div>
                               </div>



                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptNombre" name="iptNombre"
                                           maxlength="100" minlength="5" placeholder="Ej. Juan Andrés" required autocomplete="off">
                                       <label for="iptNombre">Nombres <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el nombre del cliente.</div>
                                   </div>
                               </div>

                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptApellido" name="iptApellido"
                                           maxlength="100" minlength="5" placeholder="Ej. Pérez García" required autocomplete="off">
                                       <label for="iptApellido">Apellidos <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el apellido del cliente.</div>
                                   </div>
                               </div>

                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptDireccion" name="iptDireccion"
                                           maxlength="100" minlength="5" placeholder="Ej. Av. Principal 123" required autocomplete="off">
                                       <label for="iptDireccion">Dirección <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar la dirección.</div>
                                   </div>
                               </div>

                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control form-control-modern" id="iptTelefono" name="iptTelefono"
                                           maxlength="12" minlength="10" placeholder="Ej. 0987654321" required
                                           autocomplete="off">
                                       <label for="iptTelefono">Teléfono <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar el teléfono.</div>
                                   </div>
                               </div>

                               <div class="mb-3">
                                   <div class="form-floating">
                                       <input type="email" class="form-control form-control-modern" id="iptEmail" name="iptEmail"
                                           maxlength="100" minlength="5" placeholder="Ej. correo@ejemplo.com" required autocomplete="off">
                                       <label for="iptEmail">Correo <span class="text-danger"></span></label>
                                       <div class="invalid-feedback">Debe ingresar un correo válido.</div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   <button type="button" id="btnGuardar_cliente" class="btn btn-primary">
                       <i class="bi bi-save me-2"></i>Guardar Cliente
                   </button>
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="modalCredito" tabindex="-1" aria-labelledby="modalCreditoLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
               <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                   <h5 class="modal-title" id="modalRegistrarProveedorLabel">
                       <i class="bi bi-person-add me-2"></i>Venta a Crédito
                   </h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="mb-3">
                       <label for="montoAbonado" class="form-label">Monto Abonado ($)</label>
                       <input type="number" class="form-control" id="montoAbonado" min="0" value="0">
                   </div>
                   <div class="mb-3">
                       <label for="fechaVencimiento" class="form-label">Fecha vencimiento</label>
                       <input type="date" class="form-control" id="fechaVencimiento">
                   </div>
                   <div class="alert alert-info" id="montoRestante" style="display:none;"></div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary" id="btnGuardarCredito">Realizar Venta</button>
               </div>
           </div>
       </div>
   </div>
   <script>
       var producto_ventas;
       var items = [];
       var itemProducto = 0;
       var iva = 0;
       var razon_social;
       var ruc;
       var mensaje;
       var direccion;
       var marca;
       var email;
       var nro_credito_venta;
       var Toast = Swal.mixin({
           toast: true,
           position: 'top',
           showConfirmButton: false,
           timer: 3000
       });
       $(document).ready(function() {
           cargarTableProducto();
           CargarNroBoleta();

           $('#clienteSearch').on('keyup', function() {
               let query = $(this).val().trim();
               if (query.length < 2) {
                   $('#clientesList').empty(); // limpiar si hay poco texto
                   return;
               }

               $.ajax({
                   async: false,
                   url: "ajax/clientes.ajax.php",
                   method: "POST",
                   data: {
                       'accion': 5,
                       'busqueda': query,
                   },
                   dataType: 'json',
                   success: function(respuesta) {
                       console.log("respuesta:", respuesta);

                       // Limpiar datalist
                       $("#clientesList").empty();

                       for (let i = 0; i < respuesta.length; i++) {
                           const descripcion = respuesta[i]['descripcion_clientes'];

                           // Agregar opciones al datalist
                           $("#clientesList").append(`<option value="${descripcion}"></option>`);
                       }

                       // Manejar evento cuando se selecciona un producto
                       $("#clienteSearch").on('change', function() {
                           let valor = $(this).val();
                           if (valor !== '') {
                               CargarCliente(valor);
                               $(this).val('').focus(); // limpiar y volver a enfocar
                           }
                       });
                   }
               });
           });
           $('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
               producto_ventas.row($(this).parents('tr')).remove().draw();
               recalcularTotales();
           });

           $('#btnRegistrarCliente').on('click', function() {
               $("#modalRegistrarCliente").modal('show');
           });
           $('#btnVentaCredit').on('click', function() {

               $("#modalCredito").modal('show');
           });

        
           // Eventos de botones
           $('#btnGuardarCredito').on('click', function() {
               $("#btnGuardarCredito").prop('disabled', true);
               enviarVenta('credito');
           });

           $("#btnIniciarVentaContado").on('click', function() {
               $("#btnIniciarVentaContado").prop('disabled', true);
               enviarVenta('contado');
           });

           $('#productoSearch').on('keyup', function() {
               let query = $(this).val().trim();
               if (query.length < 2) {
                  // $('#productosSugerencias').empty(); // limpiar si hay poco texto
                    $('#productosSugerencias').empty().hide();
                   return;
               }

               $.ajax({
                   async: false,
                   url: "ajax/productos.ajax.php",
                   method: "POST",
                   data: {
                       'accion': 6,
                       'opcion': 1,
                       'busqueda': query,
                   },
                   dataType: 'json',
                   success: function(respuesta) {


                       // Limpiar datalist
                    //    $("#productosList").empty();
                       let sugerenciasDiv = $("#productosSugerencias");
                sugerenciasDiv.empty().show(); // Limpia sugerencias anteriores y muestra el contenedor

                if (respuesta.length === 0) {
                    sugerenciasDiv.html('<div class="p-2">No se encontraron productos.</div>');
                    return;
                }
                

                       for (let i = 0; i < respuesta.length; i++) {
                    const producto = respuesta[i];

                    // IMPORTANTE: Ajusta la ruta a tu carpeta de imágenes
                    // const imagenUrl = 'vistas/img/productos/' + producto.img_producto;
                     const imagenUrl = producto.img_producto;
                    // La descripción de la consulta SQL modificada
                    const descripcion = producto.descripcion_completa; 
                    
                    // El código limpio para identificar el producto
                    const codigo = producto.codigo_barra;

                    // Crear el HTML para cada ítem de sugerencia
                    const suggestionHtml = `
                        <div class="sugerencia-item" data-codigo="${codigo}">
                            <img src="${imagenUrl}" alt="" class="sugerencia-img">
                            <div class="sugerencia-descripcion">${descripcion}</div>
                        </div>
                    `;
                    
                    sugerenciasDiv.append(suggestionHtml);
                }
                       // Manejar evento cuando se selecciona un producto
                       $("#productoSearch").on('change', function() {
                           let valor = $(this).val();
                           if (valor !== '') {
                               CargarProductos(valor);
                               $(this).val('').focus(); // limpiar y volver a enfocar
                           }
                       });
                   }
               });
           });

           $('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {

               let $inputw = $(this);
               let rows = producto_ventas.row($inputw.closest('tr'));
               let datas = rows.data();

               if (datas.id_producto == '') {
                   return;
               }

               let data = producto_ventas.row($(this).parents('tr')).data();
               let cantidad_actual = $(this)[0]['value'];
               let cod_producto_actual = $(this)[0]['attributes'][2]['value'];
               if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

                   Toast.fire({
                       icon: 'error',
                       title: 'INGRESE UN VALOR NUMERICO Y MAYOR A 0'
                   });

                   $(this)[0]['value'] = "1";
                   $("#searchInputCodigo").val("");
                   $("#searchInputCodigo").focus();
                   return;
               }
               producto_ventas.rows().eq(0).each(function(index) {
                   let row = producto_ventas.row(index);
                   let data = row.data();
                   if (data['codigo_barra'] == cod_producto_actual) {
                       $.ajax({
                           async: false,
                           url: "ajax/productos.ajax.php",
                           method: "POST",
                           data: {
                               'accion': 8,
                               'codigo_producto': cod_producto_actual,
                               'cantidad': cantidad_actual
                           },
                           dataType: 'json',
                           success: function(respuesta) {
                               if (parseInt(respuesta['existe']) == 0) {
                                   Toast.fire({
                                       icon: 'error',
                                       title: 'El producto ' + data['descripcion_producto'] + ' ya no tiene stock'
                                   });

                                   producto_ventas.cell(index, 8).data('<input type="text"  style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" codigo_barra = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="1">').draw();

                                   $("#searchInputCodigo").val("");
                                   $("#searchInputCodigo").focus();

                                   // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                                   let NuevoPrecioPoducto = (parseFloat(1) * data['precio_venta'].replaceAll("$./ ", "")).toFixed(2);
                                   NuevoPrecio = "$./ " + NuevoPrecioPoducto;
                                   lleva_iva = data['lleva_iva_producto'];
                                   if (data['lleva_iva_producto'] == 1) {

                                       nuevoiva = (NuevoPrecioPoducto * iva).toFixed(2);
                                       console.log("lleva iva", nuevoiva)
                                       console.log("iva a multiplicar", iva)
                                       console.log("NuevoPrecio", NuevoPrecioPoducto)
                                   } else {
                                       nuevoiva = (NuevoPrecioPoducto * 0).toFixed(2);
                                       console.log("lleva no iva", nuevoiva)
                                   }
                                   producto_ventas.cell(index, 10).data(nuevoiva).draw();
                                   producto_ventas.cell(index, 12).data(NuevoPrecio).draw();
                                   // RECALCULAMOS TOTALES
                                   recalcularTotales();
                               } else {

                                   producto_ventas.cell(index, 8).data('<input type="text" style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;" codigo_barra = "' + cod_producto_actual + '"  class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="' + cantidad_actual + '">').draw();

                                   let NuevoPrecioPoducto = (parseFloat(cantidad_actual) * data['precio_venta'].replaceAll("$./ ", "")).toFixed(2);
                                   NuevoPrecio = "$./ " + NuevoPrecioPoducto;
                                   lleva_iva = data['lleva_iva_producto'];
                                   console.log("si estoy llevando el iva cant:", lleva_iva);
                                   if (data['lleva_iva_producto'] == 1) {
                                       // NuevoPrecio.replaceAll("$./ ", "")).toFixed(2)
                                       nuevoiva = (NuevoPrecioPoducto * iva).toFixed(2);
                                       console.log("lleva iva", nuevoiva)
                                       console.log("iva a multiplicar", iva)
                                       console.log("NuevoPrecio", NuevoPrecioPoducto)
                                   } else {
                                       nuevoiva = (NuevoPrecioPoducto * 0).toFixed(2);
                                       console.log("lleva no iva", nuevoiva)
                                   }

                                   producto_ventas.cell(index, 10).data(nuevoiva).draw();
                                   producto_ventas.cell(index, 12).data(NuevoPrecio).draw();
                                   // RECALCULAMOS TOTALES
                                   recalcularTotales();
                               }
                           }
                       });

                   }
               });
           });

           $('#lstProductosVenta tbody').on('click', '.dropdown-item', function() {

               let precio_ventas = 0;
               let precio_ventas_normal = 0;
               let codigo_producto = $(this).attr("codigo");
               let volorX = 0;
               volorX = parseFloat($(this).attr("precio")).toFixed(2);
               console.log(" valor volorX", volorX);
               if (volorX > 0) {
                   precio_ventas = parseFloat($(this).attr("precio").replaceAll("$./ ", "")).toFixed(2);
                   producto_ventas.rows().eq(0).each(function(index) {
                       let row = producto_ventas.row(index);
                       let data = row.data();
                       if (data['codigo_barra'] == codigo_producto) {
                           let valor_actual_cantidad = parseFloat($.parseHTML(data['cantidad'])[0]['value']);
                           //   producto_ventas.cell(index, 20).data(parseFloat(0).toFixed(2)).draw();
                           //   producto_ventas.cell(index, 8).data('<input type="text" style="width:80px;" codigo_barra = "' + codigo_producto + '" class="form-control text-center iptCantidad m-0 p-0" value="1">').draw();
                           producto_ventas.cell(index, 8).data('<input type="text" style="width:80px;" codigo_barra="' + codigo_producto + '" class="form-control text-center iptCantidad m-0 p-0" value="' + valor_actual_cantidad + '">').draw();
                       }
                   });
                   console.log(" valor es 0");
               }
               console.log("🚀 ~ file: ventas.php:527 ~ $ ~ codigo_producto", codigo_producto)
               console.log("precio midificado:", precio_ventas);
               recalcularMontos(codigo_producto, precio_ventas);
           });

           $("#iptEfectivoRecibido").keyup(function() {
               actualizarVuelto();
           });

           $("#btnVaciarListado").on('click', function() {
               vaciarListado();
           });

    // --- MANEJADOR DE CLIC PARA LAS SUGERENCIAS ---
    // Usar un manejador de eventos delegado para elementos creados dinámicamente
    $('#productosSugerencias').on('click', '.sugerencia-item', function() {
        // Obtener el código del producto desde el atributo 'data-codigo'
        const codigoSeleccionado = $(this).data('codigo');

        // Cargar los datos del producto en el formulario
        CargarProductos(codigoSeleccionado);

        // Ocultar la caja de sugerencias
        $('#productosSugerencias').empty().hide();

        // Opcional: Limpiar el campo de búsqueda para la siguiente búsqueda
        $('#productoSearch').val('').focus();
    });
    
    // Ocultar sugerencias si el usuario hace clic fuera
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productoSearch, #productosSugerencias').length) {
            $('#productosSugerencias').hide();
        }
    })
       });


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

                   serie_boleta = respuesta["serie_boleta"];
                   nro_boleta = respuesta["nro_venta"];
                   razon_social = respuesta["razon_social"];
                   ruc = respuesta["ruc"];
                   mensaje = respuesta["mensaje"];
                   direccion = respuesta["direccion"];
                   marca = respuesta["marca"];
                   email = respuesta["email"];
                   iva = (respuesta["impuesto"] / 100);
                   nro_credito_venta = respuesta["nro_credito_ventas"];
                   $("#iptNroSerie").val(serie_boleta);
                   $("#iptNroVenta").val(nro_boleta);
                   actualizarIVAs(iva);
               }
           });
       };

       function CargarCliente(clientes = "") {

           let cedula_cliente = 0;
           if (clientes != "") {
               cedula_cliente = clientes;
           } else {
               cedula_cliente = $("#clienteSearch").val();
           }
           cedula_cliente = $.trim(cedula_cliente.split('-')[0]);

           if (!cedula_cliente || cedula_cliente === "0") {
               console.log("cedula inválido, no se ejecuta AJAX");
               return;
           }
           console.log("cedula_cliente", cedula_cliente);
           $.ajax({
               url: "ajax/clientes.ajax.php",
               method: "POST",
               data: {
                   'accion': 6,
                   'cedula_cliente': cedula_cliente

               },
               dataType: 'json',
               success: function(respuesta) {

                   if (respuesta) {
                       $("#txtIdCliente").val(respuesta['id_cliente']);
                       $("#txtNumeroDocumento").val(respuesta['numeroDocumento']);
                       $("#clienteSearch").val(respuesta['nombre']);

                       /*===================================================================*/
                       //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                       /*===================================================================*/
                   } else {
                       Toast.fire({
                           icon: 'error',
                           title: ' El cliente  no existe por favor registre al cliente'
                       });

                       $("#clienteSearch").val("");
                       $("#clienteSearch").focus();
                   }
               }
           });
       };

       function cargarTableProducto() {
           producto_ventas = $('#lstProductosVenta').DataTable({
               "columns": [{
                       "data": "contador"
                   },
                   {
                       "data": "id_producto"
                   },
                   {
                       "data": "codigo_barra"
                   },
                   {
                       "data": "id_categoria"
                   },
                   {
                       "data": "nombre_categoria"
                   },
                   {
                       "data": "descripcion_producto"
                   },
                   {
                       "data": "unidad"
                   },
                   {
                       "data": "lleva_iva_producto"
                   },
                   {
                       "data": "cantidad"
                   },
                   {
                       "data": "precio_venta"
                   },
                   {
                       "data": "iva"
                   },
                   {
                       "data": "subtotal"
                   },
                   {
                       "data": "total"
                   },
                   {
                       "data": "acciones"
                   },
                   {
                       "data": "precio_normal"
                   },
                   {
                       "data": "precio_1_producto"
                   },
                   {
                       "data": "precio_2_producto"
                   },

               ],

               columnDefs: [{
                       targets: 0, // idice cero donde se encuentra la columna
                       visible: false
                   },
                   {
                       targets: 1,
                       visible: false
                   }, {
                       targets: 3,
                       visible: false
                   }, {
                       targets: 4,
                       visible: false
                   }, {
                       targets: 6,
                       visible: false
                   },
                   {
                       targets: 7,
                       visible: false
                   }, {
                       targets: 10,
                       visible: false
                   }, {
                       targets: 14,
                       visible: false
                   }, {
                       targets: 15,
                       visible: false
                   },
                   {
                       targets: 16,
                       visible: false
                   },
                   {
                       targets: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
                       orderable: false
                   },

               ],
               "order": [
                   [0, 'desc']
               ],

               "language": {
                   "url": "Views/assets/plugin/datatable/Spanish.json"
               },
               paging: false,
               searching: false,
               //  info: false
           });
       };

       function CargarProductos(producto = "") {
           let codigo_producto = producto || $("#productoSearch").val();
           codigo_producto = $.trim(codigo_producto.split('/')[0]);
           let producto_repetido = false;
           console.log("producto_repetido pase por repetir1", producto_repetido);
           // Verificar si el producto ya está en la tabla
           producto_ventas.rows().eq(0).each(function(index) {
               let row = producto_ventas.row(index);
               let data = row.data();

               if (codigo_producto == data['codigo_barra']) {
                   producto_repetido = true;
                   console.log("producto_repetido pase por repetir2", producto_repetido);
                   actualizarCantidadProducto(index, data, codigo_producto);
                   return false; // Salir del bucle early
               }
           });

           if (producto_repetido) {
               console.log("producto_repetido pase por repetir 3", producto_repetido);
               return;
           }
           console.log("producto_repetido pase por repetir 4 no igresos", producto_repetido);
           // Si el producto no está repetido, hacer una solicitud AJAX
           obtenerProductoPorCodigo(codigo_producto);
       };

       function generarAccionesProducto(respuesta) {
           let match = respuesta['precio_venta'].match(/(\d+\.\d{1,2})/);
           let precioNormal = match ? parseFloat(match[0]) : 0;

           console.log("respuesta,", respuesta);
           console.log("precioNormal,", precioNormal);

           return "<center>" +
               "<span class='btnEliminarproducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'>" +
               "<i class='fas fa-trash fs-5'> </i>" +
               "</span>" +
               "<div class='btn-group'>" +
               "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
               "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
               "</button>" +
               "<ul class='dropdown-menu'>" +
               "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + precioNormal.toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Normal ($./ " + precioNormal.toFixed(2) + ")</a></li>" +
               "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + parseFloat(respuesta['precio_1_producto']).toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Precio 1 ($./ " + parseFloat(respuesta['precio_1_producto']).toFixed(2) + ")</a></li>" +
               "<li><a class='dropdown-item' codigo='" + respuesta['codigo_barra'] + "' precio='" + parseFloat(respuesta['precio_2_producto']).toFixed(2) + "' style='cursor:pointer; font-size:14px;'>Precio 2 ($./ " + parseFloat(respuesta['precio_2_producto']).toFixed(2) + ")</a></li>" +
               "</ul>" +
               "</div>" +
               "</center>";
       }

       // Obtiene el producto por su código de barra
       function obtenerProductoPorCodigo(codigo_producto) {
           $.ajax({
               url: "ajax/productos.ajax.php",
               method: "POST",
               data: {
                   'accion': 7, // Buscar producto por su código de barra
                   'codigo_producto': codigo_producto
               },
               dataType: 'json',
               success: function(respuesta) {
                   if (respuesta) {
                       agregarProductoATabla(respuesta);
                   } else {
                       Toast.fire({
                           icon: 'error',
                           title: ' El producto no existe o no tiene stock'
                       });
                       $("#productoSearch").val("").focus();
                   }
               }
           });
       };

       // Actualiza la cantidad del producto ya existente en la tabla
       function actualizarCantidadProducto(index, data, codigo_producto) {
           let cantidad = parseFloat($.parseHTML(data['cantidad'])[0]['value']) + 1;

           $.ajax({
               async: false,
               url: "ajax/productos.ajax.php",
               method: "POST",
               data: {
                   'accion': 8,
                   'codigo_producto': codigo_producto,
                   'cantidad': cantidad
               },
               dataType: 'json',
               success: function(respuesta) {
                   if (parseInt(respuesta['existe']) == 0) {
                       Toast.fire({
                           icon: 'error',
                           title: ' El producto ' + data['descripcion_producto'] + ' ya no tiene stock'
                       });
                       $("#searchInputCodigo").val("").focus();
                   } else {
                       actualizarFilaProducto(index, data, cantidad, respuesta);
                   }
               }
           });
       };

         function agregarProductoATabla(respuesta) {
           let itemProducto = producto_ventas.rows().count() + 1;
           let ivaProducto = parseFloat(respuesta['precio_venta'].replace("$./ ", "")) * iva * (respuesta['lleva_iva_producto']);
           let subtotalProducto = parseFloat(respuesta['total'].replace("$./ ", "")) - ivaProducto;

           producto_ventas.row.add({
               'contador': itemProducto,
               'id_producto': respuesta['id_producto'],
               'codigo_barra': respuesta['codigo_barra'],
               'id_categoria': respuesta['id_categoria'],
               'nombre_categoria': respuesta['nombre_categoria'],
               'descripcion_producto': respuesta['descripcion_producto'],
               'cantidad': '<input type="text"   style="width: 60px; padding: 1px; margin: 1 auto; box-sizing: border-box;"  codigo_barra = "' + respuesta['codigo_barra'] + '" class="form-control form-control-sm text-center iptCantidad p-0 m-0" value="1">',
               'unidad': respuesta['unidad'],
               'lleva_iva_producto': respuesta['lleva_iva_producto'],
               'precio_venta': respuesta['precio_venta'],
               'iva': ivaProducto.toFixed(2),
               'subtotal': subtotalProducto.toFixed(2),
               'total': respuesta['total'],
               'acciones': generarAccionesProducto(respuesta),
               'precio_normal': respuesta['precio_venta'] || "",
               'precio_1_producto': respuesta['precio_1_producto'] || "",
               'precio_2_producto': respuesta['precio_2_producto'] || ""
           }).draw();

           recalcularTotales();
       };

       // Actualiza los datos de la fila del producto
       function actualizarFilaProducto(index, data, cantidad, respuesta) {
           let nuevoTotal = (parseInt(cantidad) * parseFloat(data['precio_venta'].replace("$./ ", ""))).toFixed(2);
           let nuevoIva = data['lleva_iva_producto'] == 1 ? (nuevoTotal * iva).toFixed(2) : 0;
           let nuevoSubtotal = (nuevoTotal - nuevoIva).toFixed(2);

           producto_ventas.cell(index, 8).data('<input type="text" style="width:80px;" codigo_barra = "' + respuesta['codigo_barra'] + '" class="form-control text-center iptCantidad m-0 p-0" value="' + cantidad + '">').draw();
           producto_ventas.cell(index, 10).data(nuevoIva).draw();
           producto_ventas.cell(index, 11).data(nuevoSubtotal).draw();
           producto_ventas.cell(index, 12).data("$./ " + nuevoTotal).draw();

           recalcularTotales();
       };

     
       function actualizarIVAs(porcentaje) {
           porcentaje = porcentaje * 100;
           console.log("porcentaje", porcentaje);
           const ivaLabels = document.querySelectorAll('.iva_label');
           ivaLabels.forEach(label => {
               label.innerText = `IVA (${porcentaje}%):`;
           });
       }

       function getInputValueFromHTML(html, fallback = '') {
           const input = $("<div>").html(html).find("input");
           return input.length > 0 ? input.val() : html || fallback;
       }

       function construirDetalleVenta(table) {
           let arr = [];
           table.rows().eq(0).each(function(index) {
               let data = table.row(index).data();

               arr.push(JSON.stringify({
                   id_producto: data['id_producto'] || '',
                   codigo_barra: data['codigo_barra'] || '',
                   cantidad: parseFloat(getInputValueFromHTML(data['cantidad'], 0)),
                   precio_venta: getInputValueFromHTML(data['precio_venta']).toString().replace("$./ ", ""),
                   iva: data['iva'],
                   subtotal: data['subtotal'],
                   total: data['total'].toString().replace("$./ ", ""),
                   descripcion_producto: getInputValueFromHTML(data['descripcion_producto'])
               }));
           });
           return arr;
       }

       function construirFormDataVenta(tipoVenta, detalles, totalVenta, efectivoRecibido, vuelto) {
           const formData = new FormData();
           const tipoPago = tipoVenta === 'contado' ? 1 : 2;

           detalles.forEach(item => formData.append('arr[]', item));
           formData.append('Id_caja', $("#txtId_caja").val());
           formData.append('IdCliente', $("#txtIdCliente").val());
           formData.append('nro_boleta', $("#iptNroVenta").val());
           formData.append('tipo_pago', tipoPago);
           formData.append('TipoDocumento', $("#selDocumentoVenta").val());
           formData.append('descripcion_venta', 'Venta realizada con Nro Boleta: ' + $("#iptNroVenta").val());
           formData.append('CantidadProducto', producto_ventas.rows().count());
           formData.append('CantidadTotal', producto_ventas.rows().count());
           formData.append('iva', parseFloat($("#boleta_igv").html()));
           formData.append('subtotal', parseFloat($("#boleta_subtotal").html()));
           formData.append('total_venta', totalVenta);
           formData.append('ImporteRecibido', efectivoRecibido);
           formData.append('ImporteCambio', vuelto);
           formData.append('nro_credito_venta', nro_credito_venta);
           formData.append('fechaVencimiento', tipoVenta === 'credito' ? $("#fechaVencimiento").val() : "");

           return formData;
       }

       function mostrarAlerta(tipo, titulo, texto = '') {
           Swal.fire({
               icon: tipo,
               title: titulo,
               text: texto,
               showConfirmButton: true
           });
       }

       function enviarVenta(tipoVenta) {
           const totalVenta = parseFloat($("#totalVenta").html());
           const efectivoRecibido = parseFloat(
               tipoVenta === 'contado' ? $("#iptEfectivoRecibido").val() : $("#montoAbonado").val()
           ) || 0;

           const count = producto_ventas.rows().count();
           const fechaVencimiento = $("#fechaVencimiento").val();

           if (count === 0) {
               mostrarAlerta('warning', 'No hay productos en el listado.');
               habilitarBotones();
               return;
           }

           if (efectivoRecibido <= 0 || isNaN(efectivoRecibido)) {
               mostrarAlerta('warning', 'Ingrese el monto en efectivo');
               habilitarBotones();
               return;
           }

           if (tipoVenta === 'contado' && efectivoRecibido < totalVenta) {
               mostrarAlerta('warning', 'El efectivo es menor al costo total');
               habilitarBotones();
               return;
           }

           if (tipoVenta === 'credito') {
               if (!fechaVencimiento) {
                   mostrarAlerta('warning', 'Ingrese la fecha Vencimiento');
                   habilitarBotones();
                   return;
               }

               if (efectivoRecibido >= totalVenta) {
                   mostrarAlerta('warning', 'No se puede aplicar crédito, ya que no hay saldo');
                   habilitarBotones();
                   return;
               }
           }

           const detalles = construirDetalleVenta(producto_ventas);
           const vuelto = tipoVenta === 'contado' ? $("#Vuelto").html() : (totalVenta - efectivoRecibido);

           const formData = construirFormDataVenta(tipoVenta, detalles, totalVenta, efectivoRecibido, vuelto);

           $.ajax({
               url: "ajax/realizar_ventas.ajax.php",
               method: "POST",
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: function(respuesta) {
                //    const res = JSON.parse(respuesta);

                      mostrarAlertaRespuesta(respuesta, function() {
                      $("#modalCredito").modal('hide');
                       LimpiarInputs();
                       CargarNroBoleta();
                        habilitarBotones();
                       const nro_boleta = $("#iptNroVenta").val();
                       window.open(`http://localhost/WebPuntoVenta2025/Views/modulos/Ventas/RealizarVentas/generar_tick.php?nro_boleta=${nro_boleta}`);
                    }, {
                        mensajeExito: "éxito",
                        mensajeAdvertencia: "Warning",
                        mensajeError: "Excepción"
                    });
             
               },
               error: function() {
                   mostrarAlerta('error', 'Error en la conexión', 'No se pudo conectar con el servidor. Intente nuevamente.');
                   habilitarBotones();
               }
           });
       }


       function actualizarVuelto() {
           let totalVenta = $("#totalVenta").html(); // capturo Total 
           $("#chkEfectivoExacto").prop('checked', false); // desabilitar el checked al moento de digitar
           let efectivoRecibido = $("#iptEfectivoRecibido").val(); // capturo lo que recibido  
           if (efectivoRecibido > 0) {
               $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2)); //caturmaos EfectivoEntregado
               vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta);
               $("#Vuelto").html(vuelto.toFixed(2));
           } else {
               $("#EfectivoEntregado").html("0.00");
               $("#Vuelto").html("0.00");

           }
       };

       function recalcularMontos(codigo_producto, precio_venta) {
           let nuevoiva = 0;
           let nuevosubtotal = 0;
           let NuevoPrecio = 0;
           let cantidad_actual = 0;
           let lleva_iva = 0;
           producto_ventas.rows().eq(0).each(function(index) {
               let row = producto_ventas.row(index);
               let data = row.data();
               if (data['codigo_barra'] == codigo_producto) {
                   // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                   producto_ventas.cell(index, 9).data("$./ " + parseFloat(precio_venta).toFixed(2)).draw();
                   // cantidad_actual = 
                   console.log("🚀 ~ file: ventas.php:744 ~ table.rows ~ data", parseFloat($.parseHTML(data['cantidad'])[0]['value']))
                   cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);
                   // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                   NuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta'].replaceAll("$./ ", "")).toFixed(2);
                   lleva_iva = data['lleva_iva_producto'];
                   if (data['lleva_iva_producto'] == 1) {
                       nuevoiva = (NuevoPrecio * iva).toFixed(2);
                   } else {
                       nuevoiva = (NuevoPrecio * 0).toFixed(2);
                   }
                   nuevosubtotal = (NuevoPrecio - nuevoiva).toFixed(2);
                   NuevoPrecio = "$./ " + NuevoPrecio;
                   producto_ventas.cell(index, 10).data(nuevoiva).draw();
                   producto_ventas.cell(index, 11).data(nuevosubtotal).draw();
                   producto_ventas.cell(index, 12).data(NuevoPrecio).draw();


               }
           });

           recalcularTotales();

       };

       function recalcularTotales() {

           let TotalVenta = 0.00;
           let TotalIva = 0.00;
           producto_ventas.rows().eq(0).each(function(index) { //recorro table
               let row = producto_ventas.row(index);
               let data = row.data(); //total puede ser el numero de la coluna
               TotalVenta = parseFloat(TotalVenta) + parseFloat(data['total'].replace("$./ ", ""));
               TotalIva = parseFloat(TotalIva) + parseFloat(data['iva']);
           });
           $("#totalVenta").html(""); // quita la s./ 
           $("#totalVenta").html(TotalVenta.toFixed(2)); // catura solo el valor sin S./
           totalVenta = $("#totalVenta").html();
           // var igv = parseFloat((totalVenta) * iva);
           let subtotal = parseFloat(totalVenta) - parseFloat(TotalIva);
           // $("#totalVentaRegistrar").html(totalVenta);
           $("#boleta_subtotal").html(parseFloat(subtotal).toFixed(2));
           $("#boleta_igv").html(parseFloat(TotalIva).toFixed(2));
           // $("#boleta_total").html(parseFloat(totalVenta).toFixed(2));
           $("#iptEfectivoRecibido").val("");
           $("#chkEfectivoExacto").prop('checked', false);
           $("#EfectivoEntregado").html("0.00");
           $("#Vuelto").html("0.00");
           $("#iptCodigoVenta").val("");
           $("#iptCodigoVenta").focus();
       };

       document.getElementById("btnGuardar_cliente").addEventListener("click", function() {

           const tipoIdentificacion = $("#selTipoIdentificacion").val();
           const numeroDocumento = $("#iptNumeroDocumento").val().trim();
           const saltarValidacion = document.getElementById("chkValidar").checked;

           const tipoIdentificacionTexto = {
               "05": "Cédula",
               "04": "RUC",
               "06": "Pasaporte"
           };

           const validarDocumento = () => {
               if (saltarValidacion) return true;
               switch (tipoIdentificacion) {
                   case "05":
                       return validarCedula(numeroDocumento);
                   case "04":
                       return validarRUC(numeroDocumento);
                   case "06":
                       return validarPasaporte(numeroDocumento);
                   default:
                       return false;
               }
           };

           if (!validarDocumento()) {
               const tipoTexto = tipoIdentificacionTexto[tipoIdentificacion] || "documento";
               Swal.fire({
                   icon: 'warning',
                   title: 'Documento inválido',
                   text: `El número de ${tipoTexto.toLowerCase()} ingresado no es válido. Por favor, verifica el valor.`,
                   confirmButtonText: 'Aceptar'
               });
               return;
           }

           const forms = document.getElementsByClassName('needs-validation');
           let formularioValido = true;

           Array.from(forms).forEach(form => {
               if (!form.checkValidity()) {
                   formularioValido = false;
                   form.classList.add('was-validated');
               }
           });

           if (!formularioValido) {
               Swal.fire({
                   icon: 'info',
                   title: 'Por favor complete todos los campos obligatorios'
               });
               return;
           }

           Swal.fire({
               title: '¿Está seguro de registrar el Cliente?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Sí, deseo registrarlo!',
               cancelButtonText: 'Cancelar',
           }).then((result) => {
               if (!result.isConfirmed) return;

               const datos = new FormData();
               datos.append("accion", 2);
               datos.append("IdCliente", $("#IdCliente").val());
               datos.append("tipoIdentificacion", tipoIdentificacion);
               datos.append("NumeroDocumento", numeroDocumento);
               datos.append("Nombre", $("#iptNombre").val());
               datos.append("Apellido", $("#iptApellido").val());
               datos.append("Direccion", $("#iptDireccion").val());
               datos.append("Telefono", $("#iptTelefono").val());
               datos.append("Email", $("#iptEmail").val());
               datos.append("Estado", 1);

               $.ajax({
                   url: "ajax/clientes.ajax.php",
                   method: "POST",
                   data: datos,
                   cache: false,
                   contentType: false,
                   processData: false,
                   dataType: 'json',
                   success: function(respuesta) {
                       mostrarAlertaRespuesta(respuesta, function() {
                           CargarCliente(numeroDocumento);
                           fun_limpiar();
                           $("#modalRegistrarCliente").modal('hide');
                       }, {
                           mensajeExito: "éxito",
                           mensajeAdvertencia: "Warning",
                           mensajeError: "Excepción"
                       });
                   },
                   error: manejarErrorAjax
               });
           });
       });

       function vaciarListado() {
           producto_ventas.clear().draw();

       };

       function LimpiarInputs() {
           producto_ventas.clear().draw();
           $("#totalVenta").html("0.00");
           $("#iptEfectivoRecibido").val("");
           $("#selTipoPago").val(1);
           $("#EfectivoEntregado").html("0.00");
           $("#Vuelto").html("0.00");
           $("#chkEfectivoExacto").prop('checked', false);
           $("#boleta_subtotal").html("0.00");
           $("#boleta_igv").html("0.00");
           $("#iptCedulaCliente").val("");
           $("#fechaVencimiento").val("");
           $("#productoSearch").val("");
           $("#clienteSearch").val("");


       };

       function fun_limpiar() {
           $("#IdCliente").val("0");
           $("#iptNumeroDocumento").val("");
           $("#iptDireccion").val("");
           $("#iptNombre").val("");
           $("#iptTelefono").val("");
           $("#iptEmail").val("");
           $(".needs-validation").removeClass("was-validated");
       };

       function habilitarBotones() {
           $("#btnIniciarVentaContado").prop('disabled', false);
           $("#btnGuardarCredito").prop('disabled', false);
       }
   </script>