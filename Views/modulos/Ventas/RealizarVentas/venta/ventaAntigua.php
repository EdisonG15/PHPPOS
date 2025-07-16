<?php 
session_start()         
           ?>
<style>
    body, html {
      height: 100%;
      background: #f5f7fa;
    }
    .sidebar {
  
      border-right: 1px solid #e0e6ed;
      height: 100%;
      padding: 1rem;
    }
    .sidebar .list-group-item {
      cursor: pointer;
    }
    .sidebar .list-group-item.active {
      border-color: #0d6efd;
      background-color: #e7f1ff;
      color: #0d6efd;
    }
    .content {
      position: relative;
      padding: 1rem 2rem 4rem; /* bottom space for fixed summary */
      overflow-y: auto;
      height: 100%;
    }
    .content .card {
      border: none;
      border-radius: .75rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .summary-bar {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      background: #ffffff;
      border-top: 1px solid #e0e6ed;
      padding: .75rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 -2px 8px rgba(0,0,0,0.03);
    }
    .summary-bar .btn-action {
      min-width: 100px;
    }
    .table-scroll {
      max-height: 220px;
      overflow-y: auto;
    } 
 </style>

  <div class="row g-0 h-100">
    <!-- SIDEBAR: Búsqueda + Lista -->
    <aside class="col-12 col-md-4 sidebar">
      <div class="mb-4">
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="searchInputCodigo" placeholder="Buscar..." autocomplete="off">
          <label for="searchInputCodigo"><i class="bi bi-search me-1"></i>Artículo / Código</label>
        </div>
        <!-- <button class="btn btn-primary w-100"><i class="bi bi-search"></i> Buscar</button> -->
      </div>
      <div class="list-group" id="productList">
        <!-- Ejemplo de ítems -->
  
      </div>
    </aside>

    <!-- CONTENT: Detalle + Tabla + Totales -->
    <section class="col-12 col-md-8 content">
      <!-- HEADER: Factura / Proveedor / Fecha -->
      <input id="txtIdCliente" type="hidden" value="1"/>

      <input id="txtId_usuario" type="hidden"  value="<?php         
            echo  $_SESSION["usuario"]->id_usuario ?>"/>

      <input id="txtId_caja"  type="hidden"  value="<?php            
            echo  $_SESSION["usuario"]->id_caja ?>"/>                    
        <input id="txtNumeroDocumento" type="hidden" value="0" />

      <div class="card mb-4 p-3">
        <div class="row g-3">
          <div class="col-4 form-floating">
          <select class="form-select" id="selDocumentoVenta">
                    <option value="03" selected>Ticket</option>
                     <option value="01">Factura</option>
              </select>
              <label for="selDocumentoVenta">Documento</label>
          </div>
          <div class="col-4 form-floating">
            <input type="text" class="form-control" id="clienteName" placeholder="Cliente" autocomplete="off">
            <label for="clienteName">Cliente</label>
          </div>
          <div class="col-4 form-floating">
            <input type="date" class="form-control" id="purchaseDate" placeholder="Fecha" value="2025-04-24">
            <label for="purchaseDate">Fecha de Compra</label>
          </div>
        </div>
      </div>

      <!-- DETALLE DE ARTÍCULO SELECCIONADO -->
      
      <!-- TABLA DE ÍTEMS CON SCROLL -->
      <div class="card mb-5 p-0">
        <div class="table-scroll">
          <!-- <table  id="lstProductosVenta" class="table table-hover table-sm mb-0">
            <thead class="table-light"> -->
            <table id="lstProductosVenta" class="table table-hover table-sm mb-0" style="width:100%">
            <thead class="table-light">
              <tr>
                <th></th>
                <th>Id Producto</th>
                <th>Código</th>
                <th>Id Categoria</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>LLeva Iva</th>
                <th >Cant.</th>
                <th >Precio</th>
                <th >Iva</th>
                <th >SubTotal</th>
                <th >Total</th>
                <th class="text-center">Acciones</th>
                <!-- <th class="text-end">Normal</th> -->
                <th >Precio 1</th>
                <th >Precio 2</th>
              </tr>
            </thead>
            <tbody>             
            </tbody>
          </table>
        </div>
      </div>

      <!-- BARRA DE TOTALES FIJA -->
      <div class="summary-bar">
      <input type="hidden" min="0" name="iptNroVenta" id="iptNroVenta"
      class="form-control form-control-sm" placeholder="Nro Venta" disabled>

        <div>
          <small>Items:</small > <strong id="itemProducto">0</strong>
          &nbsp;&nbsp;
          <small>Iva:</small> <strong id="boleta_igv" class="text-danger">0,00</strong>
          &nbsp;&nbsp;
          <small>SubTotal:</small> <strong id="boleta_subtotal" class="text-danger">0,00</strong>
          &nbsp;&nbsp;
          <small>Efectivo recibido:</small>
          <input type="number" name="iptEfectivo" id="iptEfectivoRecibido" class="form-control form-control-sm d-inline-block" style="width: 80px;" placeholder="0">
          &nbsp;&nbsp;
          <small>Vuelto:</small> <strong id="Vuelto" class="text-danger">0,00</strong>
          &nbsp;&nbsp;
        </div>
        <div>
          <small>Total:</small>
          <strong class="fs-4 text-success" id="totalVenta" >0,00</strong>
          &nbsp;&nbsp;
          <button class="btn btn-primary btn-action"   id="btnIniciarVentaContado"><i class="bi bi-cash-stack"></i> Contado</button>
          <button class="btn btn-outline-primary btn-action" id="btnVentaCredit" ><i class="bi bi-credit-card-2-front"></i> Crédito</button>
          <button class="btn btn-outline-secondary btn-action"><i class="bi bi-x-circle"></i> Cancelar</button>
        </div>
      </div>
    </section>
  </div>

<script>

    var producto_ventas;
    var items = [];
    var itemProducto = 0;
    var iva =0;
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
$(document).ready(function(){
    CargarNroBoleta();
    cargarTableProducto();
    CargarClienteAutocomplete();

$("#btnVaciarListado").on('click', function() {
            vaciarListado();
});

$("#searchInputCodigo").change(function() { //change cuando dectente un movimiento
            CargarProductos();              
});

$('#searchInputCodigo').on('keyup', function () {

    let query = $(this).val().trim();

    if (query.length < 2) {
      $('#productList').empty(); // limpiar si hay poco texto
      return;
    }

    $.ajax({
      url: "ajax/productos.ajax.php",
      method: "POST",
      data: {
        'accion': 6,
        'opcion': 1,
        'busqueda': query  // importante: que el backend reciba este parámetro
      },
      dataType: 'json',
      success: function (respuesta) {
        $('#productList').empty(); // limpiar lista

        if (respuesta.length === 0) {
          $('#productList').append('<div class="list-group-item text-muted">No se encontraron productos</div>');
        } else {
          respuesta.forEach(producto => {
            $('#productList').append(`
              <a href="#" class="list-group-item list-group-item-action"
                 onclick="CargarProductos('${producto.descripcion_producto}')">
                ${producto.descripcion_producto}
              </a>
            `);
          });
        }
      }
    });
});

$("#clienteName").change(function() { //change cuando dectente un movimiento
            CargarCliente();        
});    
              
$('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
    producto_ventas.row($(this).parents('tr')).remove().draw();
            recalcularTotales();
});

$('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {

        let $inputw = $(this);
        let rows = producto_ventas.row($inputw.closest('tr'));
        let datas = rows.data();

    if (datas.id_producto == '') {
        return; 
    }

            let data = producto_ventas.row($(this).parents('tr')).data();
            let  cantidad_actual = $(this)[0]['value'];
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

                                        producto_ventas.cell(index, 8).data('<input type="text" style="width:80px;" codigo_barra = "' + cod_producto_actual + '" class="form-control text-center iptCantidad m-0 p-0" value="1">').draw();
                        
                                             $("#searchInputCodigo").val("");
                                             $("#searchInputCodigo").focus();

                                      // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                                         let NuevoPrecioPoducto = (parseFloat(1) * data['precio_venta'].replaceAll("$./ ", "")).toFixed(2);
                                             NuevoPrecio = "$./ " + NuevoPrecioPoducto;   
                                             lleva_iva=data['lleva_iva_producto'];
                                if (data['lleva_iva_producto']==1){

                                    nuevoiva= (NuevoPrecioPoducto*iva).toFixed(2);
                                    console.log("lleva iva",nuevoiva)
                                    console.log("iva a multiplicar",iva)
                                    console.log("NuevoPrecio",NuevoPrecioPoducto)
                                }else{
                                    nuevoiva= (NuevoPrecioPoducto*0).toFixed(2);
                                    console.log("lleva no iva",nuevoiva)
                                }
                                producto_ventas.cell(index, 10).data(nuevoiva).draw();
                                producto_ventas.cell(index, 12).data(NuevoPrecio).draw();
                                // RECALCULAMOS TOTALES
                                recalcularTotales();
                            } else {
                               
                                producto_ventas.cell(index, 8).data('<input type="text" style="width:80px;" codigo_barra = "' + cod_producto_actual + '"  class="form-control text-center iptCantidad m-0 p-0" value="' + cantidad_actual + '">').draw();
                              
                                    let  NuevoPrecioPoducto = (parseFloat(cantidad_actual) * data['precio_venta'].replaceAll("$./ ", "")).toFixed(2);
                                         NuevoPrecio = "$./ " + NuevoPrecioPoducto;
                                         lleva_iva=data['lleva_iva_producto'];
                                         console.log("si estoy llevando el iva cant:",lleva_iva);
                                if (data['lleva_iva_producto']==1){
                                    // NuevoPrecio.replaceAll("$./ ", "")).toFixed(2)
                                    nuevoiva= (NuevoPrecioPoducto*iva).toFixed(2);
                                    console.log("lleva iva",nuevoiva)
                                    console.log("iva a multiplicar",iva)
                                    console.log("NuevoPrecio",NuevoPrecioPoducto)
                                }else{
                                    nuevoiva= (NuevoPrecioPoducto*0).toFixed(2);
                                    console.log("lleva no iva",nuevoiva)
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

            let precio_ventas=0;
            let precio_ventas_normal=0;
            let  codigo_producto = $(this).attr("codigo");
            let volorX=0;
           volorX=  parseFloat($(this).attr("precio")).toFixed(2);
       if(volorX>0){                   
            precio_ventas = parseFloat($(this).attr("precio").replaceAll("$./ ","")).toFixed(2);
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
            console.log("precio midificado:",precio_ventas); 
            recalcularMontos(codigo_producto,precio_ventas);
});

$("#iptEfectivoRecibido").keyup(function() {
            actualizarVuelto();
});
  
$("#btnIniciarVentaContado").on('click', function() {
  $("#btnIniciarVentaContado").prop('disabled', true);  
      enviarVenta('contado');
});

$("#btnVentaCredit").on('click', function() {
  $("#btnVentaCredit").prop('disabled', true);  
     enviarVenta('credito');
});


});
// Fin de  document.ready




function CargarClienteAutocomplete(){

    $.ajax({
			async: false,
			url: "ajax/clientes.ajax.php",
			method: "POST",
			data: {
				'accion': 5
			},
			dataType: 'json',
			success: function(respuesta) {
                let itemsclientes = [];
				for (let i = 0; i < respuesta.length; i++) {
					itemsclientes.push(respuesta[i]['descripcion_clientes']) 
				}
				 $("#clienteName").autocomplete({ //es el codigo de barra a buscar                   
					source: itemsclientes,
				    select: function(event, ui) {
				 		   CargarCliente(ui.item.value);   
						 $("#clienteName").val("");
				     	return false;
					}
				})
			}
	});
    
};


 /****************************** producuto******************************************* */

function cargarTableProducto(){
      producto_ventas = $('#lstProductosVenta').DataTable({
            "columns": [
                { "data": "contador" },
                { "data": "id_producto" },
                { "data": "codigo_barra" },
                { "data": "id_categoria" },
                { "data": "nombre_categoria" },
                { "data": "descripcion_producto" },
                { "data": "unidad" },
                { "data": "lleva_iva_producto" },
                { "data": "cantidad" },
                { "data": "precio_venta" },
                { "data": "iva" },
                { "data": "subtotal" },
                { "data": "total" },
                { "data": "acciones" },
                { "data": "precio_1_producto" },
                { "data": "precio_2_producto" },
            ],
          
            columnDefs: [{
                targets: 0,  // idice cero donde se encuentra la columna
                visible: false
                },
                { targets: 1, visible: false},{ targets: 3, visible: false},{ targets: 4, visible: false},{ targets: 6, visible: false},
                { targets: 7, visible: false},{ targets: 10, visible: false},{ targets: 14, visible: false},{ targets: 15, visible: false},
                {
                    targets: [3,4,5,6,7,8,9,10,11,12,13,14,15],
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
    let codigo_producto = producto || $("#searchInputCodigo").val();
    codigo_producto = $.trim(codigo_producto.split('/')[0]);
    let producto_repetido = false;

    // Verificar si el producto ya está en la tabla
    producto_ventas.rows().eq(0).each(function(index) {
        let row = producto_ventas.row(index);
        let data = row.data();

        if (codigo_producto == data['codigo_barra']) {
            producto_repetido = true;
            actualizarCantidadProducto(index, data, codigo_producto);
            return false; // Salir del bucle early
        }
    });

    if (producto_repetido) {
        return;
    }

    // Si el producto no está repetido, hacer una solicitud AJAX
    obtenerProductoPorCodigo(codigo_producto);
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
                $("#searchInputCodigo").val("").focus();
            }
        }
    });
};

// Agrega un producto nuevo a la tabla
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
        'cantidad': '<input type="text" style="width:80px;" codigo_barra = "' + respuesta['codigo_barra'] + '" class="form-control text-center iptCantidad p-0 m-0" value="1">',
        'unidad': respuesta['unidad'],
        'lleva_iva_producto': respuesta['lleva_iva_producto'],
        'precio_venta': respuesta['precio_venta'],
        'iva': ivaProducto.toFixed(2),
        'subtotal': subtotalProducto.toFixed(2),
        'total': respuesta['total'],
        'acciones': generarAccionesProducto(respuesta),
        'precio_1_producto': respuesta['precio_1_producto'] || "",
        'precio_2_producto': respuesta['precio_2_producto'] || ""
    }).draw();

    recalcularTotales();
};

// Genera las acciones del producto (botones de eliminar y cambiar precio)
function generarAccionesProducto(respuesta) {
    return "<center>" +
        "<span class='btnEliminarproducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'>" +
        "<i class='fas fa-trash fs-5'> </i>" +
        "</span>" +
        "<div class='btn-group'>" +
        "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
        "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
        "</button>" +
        "<ul class='dropdown-menu'>" +
        "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_barra'] + "' precio=' " + respuesta['precio_venta'] + "' style='cursor:pointer; font-size:14px;'>Normal (" + respuesta['precio_venta'] + ")</a></li>" +
        "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_barra'] + "' precio=' " + respuesta['precio_1_producto'] + "' style='cursor:pointer; font-size:14px;'>Precio 1 ($./ " + parseFloat(respuesta['precio_1_producto']).toFixed(2) + ")</a></li>" +
        "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_barra'] + "' precio=' " + respuesta['precio_2_producto'] + "' style='cursor:pointer; font-size:14px;'>Precio 2 ($./ " + parseFloat(respuesta['precio_2_producto']).toFixed(2) + ")</a></li>" +
        "</ul>" +
        "</div>" +
        "</center>";
};

/****************************************fin producto************************************************************** */

/*************************************** Venta******************************************* */

function enviarVenta(tipoVenta) {

    let totalVenta = parseFloat($("#totalVenta").html());
    let ivatotalVenta = parseFloat($("#boleta_igv").html());
    let subtotalVenta = parseFloat($("#boleta_subtotal").html());
    let Vuelto = $("#Vuelto").html();
    let nro_boleta = $("#iptNroVenta").val();
    let tipo_documento = $("#selDocumentoVenta").val();
    let efect = parseFloat($("#iptEfectivoRecibido").val()) || 0;
    let count = producto_ventas.rows().count();

    if (count === 0) {
        Toast.fire({ icon: 'warning', title: 'No hay productos en el listado.' });
        $("#btnIniciarVentaContado").prop('disabled', false);
        return;
    }

    if (tipoVenta === 'contado' && (efect <= 0 || isNaN(efect))) {
        Toast.fire({ icon: 'warning', title: 'Ingrese el monto en efectivo' });
        $("#btnIniciarVentaContado").prop('disabled', false);
        return;
    }

    if (tipoVenta === 'contado' && efect < totalVenta) {
        Toast.fire({ icon: 'warning', title: 'El efectivo es menor al costo total' });
        $("#btnIniciarVentaContado").prop('disabled', false);
        return;
    }

    let formData = new FormData();
    let detalles = construirDetalleVenta(producto_ventas);
  
    detalles.forEach(item => formData.append('arr[]', item));
    formData.append('Id_caja', $("#txtId_caja").val());
    formData.append('IdCliente', $("#txtIdCliente").val());
    formData.append('nro_boleta', nro_boleta);
    formData.append('tipo_pago', tipoVenta === 'contado' ? 1 : 2);
    formData.append('TipoDocumento', tipo_documento);
    formData.append('descripcion_venta', 'Venta realizada con Nro Boleta: ' + nro_boleta);
    formData.append('CantidadProducto', count);
    formData.append('CantidadTotal', count);
    formData.append('iva', ivatotalVenta);
    formData.append('subtotal', subtotalVenta);
    formData.append('total_venta', totalVenta);
    formData.append('ImporteRecibido', efect);
    formData.append('ImporteCambio', tipoVenta === 'contado' ? Vuelto : totalVenta - efect);
    formData.append('nro_credito_venta', nro_credito_venta);
    $.ajax({
        url: "ajax/realizar_ventas.ajax.php",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta.includes("Error")) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'No se pudo completar la venta',
                    text: respuesta,
                    showConfirmButton: true
                });
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: respuesta,
                    showConfirmButton: false,
                    timer: 1500
                });
                // table_ventas.clear().draw();
                LimpiarInputs();
                CargarNroBoleta();
                window.open('http://localhost/WebPuntoVenta2025/Views/modulos/Ventas/RealizarVentas/generar_tick.php?nro_boleta=' + nro_boleta);
            }
            $("#btnIniciarVentaContado").prop('disabled', false);
        },
        error: function () {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error en la conexión',
                text: 'No se pudo conectar con el servidor. Intente nuevamente.',
                showConfirmButton: true
            });
            $("#btnIniciarVentaContado").prop('disabled', false);
        }
    });
};

function construirDetalleVenta(table) {
    let arr = [];
    table.rows().eq(0).each(function (index) {
        let row = table.row(index);
        let data = row.data();

        let cantidad = $("<div>").html(data['cantidad']).find("input").length > 0
            ? $("<div>").html(data['cantidad']).find("input").val()
            : data['cantidad'];

        let descripcion_producto = $("<div>").html(data['descripcion_producto']).find("input").length > 0
            ? $("<div>").html(data['descripcion_producto']).find("input").val()
            : data['descripcion_producto'];

        let precio_venta = $("<div>").html(data['precio_venta']).find("input").length > 0
            ? $("<div>").html(data['precio_venta']).find("input").val()
            : data['precio_venta'].toString().replace("$./ ", "");

        arr[index] = JSON.stringify({
            id_producto: data['id_producto'] || '',
            codigo_barra: data['codigo_barra'] || '',
            cantidad: parseFloat(cantidad),
            precio_venta: precio_venta,
            iva: data['iva'],
            subtotal: data['subtotal'],
            total: data['total'].toString().replace("$./ ", ""),
            descripcion_producto: descripcion_producto
        });
    });
    console.log("rr",arr);
    return arr;

   
}

 
/*************************************** Fin Venta******************************************* */

function CargarCliente(clientes = "") {

       let  cedula_cliente=0;
        if (clientes != "") {
            cedula_cliente = clientes;
            
        } else {
              cedula_cliente = $("#clienteName").val();
        }
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
                            $("#clienteName").val(respuesta['nombre']);
     
                /*===================================================================*/
                //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                /*===================================================================*/
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: ' El cliente  no existe por favor registre al cliente'
                    });

                    $("#searchInputCodigo").val("");
                    $("#searchInputCodigo").focus();
                }
            }
        });   
};

function recalcularTotales(){

        let TotalVenta = 0.00;
        let TotalIva = 0.00;
        producto_ventas.rows().eq(0).each(function(index) { //recorro table
            let row = producto_ventas.row(index);
            let data = row.data();                                                             //total puede ser el numero de la coluna
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
                razon_social= respuesta["razon_social"];
                ruc= respuesta["ruc"];
                mensaje= respuesta["mensaje"];
                direccion= respuesta["direccion"];
                marca= respuesta["marca"];
                email= respuesta["email"];
                iva= (respuesta["impuesto"] /100);               
                nro_credito_venta=respuesta["nro_credito_ventas"];       
                $("#iptNroSerie").val(serie_boleta);
                $("#iptNroVenta").val(nro_boleta);
            }
        });
};

function recalcularMontos(codigo_producto, precio_venta){
       let nuevoiva=0;
       let nuevosubtotal=0;
       let NuevoPrecio=0;
       let cantidad_actual=0;
       let lleva_iva=0;
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
                lleva_iva=data['lleva_iva_producto'];
                if (data['lleva_iva_producto']==1){
                    nuevoiva= (NuevoPrecio*iva).toFixed(2);
                }else{
                    nuevoiva= (NuevoPrecio*0).toFixed(2);
                }
                nuevosubtotal= (NuevoPrecio-nuevoiva).toFixed(2);
                NuevoPrecio = "$./ " + NuevoPrecio;
                producto_ventas.cell(index, 10).data(nuevoiva).draw();
                producto_ventas.cell(index, 11).data(nuevosubtotal).draw();
                producto_ventas.cell(index, 12).data(NuevoPrecio).draw();
                
               
            }
    });

        recalcularTotales();

};

function actualizarVuelto(){       
            let totalVenta = $("#totalVenta").html(); // capturo Total 
            $("#chkEfectivoExacto").prop('checked', false);// desabilitar el checked al moento de digitar
            let efectivoRecibido = $("#iptEfectivoRecibido").val();// capturo lo que recibido  
            if (efectivoRecibido > 0) {  
                $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2)); //caturmaos EfectivoEntregado
                vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta); 
                $("#Vuelto").html(vuelto.toFixed(2));
            } else {
                $("#EfectivoEntregado").html("0.00");
                $("#Vuelto").html("0.00");
        
            }
};


function tineCreditoPendiente(){
        let num_credito=0;
        let nombre_completo_cliente='';
        let numeroDocumento=''
        let total_credito=0;
        let datos = new FormData();
        datos.append("accion", 5);
        datos.append("id_cliente",  $("#txtIdCliente").val());
  if( $("#iptCedulaCliente").val() != "") {
      $.ajax({
              url: "ajax/historial_abonos.ajax.php",
              method: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'json',
                success: function(respuesta) {  
                                  console.log("lo que trae:",respuesta);
                    for (let index = 0; index < respuesta.length; index++) {
                          num_credito=num_credito+1;
                          numeroDocumento= respuesta[index][0] ;
                          nombre_completo_cliente= respuesta[index][1] ;
                          total_credito= parseFloat(total_credito) + parseFloat(respuesta[index][2]) ;
                    }
                        console.log("num_credito:",num_credito);
                        console.log("numeroDocumento:",numeroDocumento);
                        console.log("nombre_completo_cliente:",nombre_completo_cliente);
                        console.log("total_credito:",total_credito);
                      if(num_credito > 0){
                          Swal.fire({                   
                                title: 'Este Cliente ya tiene  Creditos?',
                                icon: 'warning',
                                text: "N° Credito: "+num_credito +" N° Cedula: "+numeroDocumento + " Nombre Cliente : "+nombre_completo_cliente + " Total Saldo: "+total_credito,
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, deseo registrarlo!',
                                cancelButtonText: 'Cancelar',       
                              }).then((result) => {
                                        if (result.isConfirmed) { 
                                            realizarVenta();
                                         }else {                            
                                               $("#btnIniciarVenta") .prop('disabled', false);                    
                                             }
                                  })
                        }else {
                                realizarVenta();
                              }
                 }
            });
    }else {
               Toast.fire({
                    icon: 'warning',
                    title: '******** No hay cliente para Aplicar el credito *******'
                     });
                     $("#btnIniciarVenta") .prop('disabled', false);
     }
  
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

                                 $("#btnIniciarVenta") .prop('disabled', true);
                                 $("#btnEntradaDinero") .prop('disabled', true);
                                 $("#btnSalidadaDinero") .prop('disabled', true);
                                 $("#btnVaciarListado") .prop('disabled', true);           
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
};

</script>
