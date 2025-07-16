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

    cargarTableProducto();
    CargarClienteAutocomplete();





$("#clienteName").change(function() { //change cuando dectente un movimiento
            CargarCliente();        
});    
              




  


$("#btnVentaCredit").on('click', function() {
  $("#btnVentaCredit").prop('disabled', true);  
     enviarVenta('credito');
});


});
// Fin de  document.ready







 /****************************** producuto******************************************* */







// Agrega un producto nuevo a la tabla


// Genera las acciones del producto (botones de eliminar y cambiar precio)


/****************************************fin producto************************************************************** */

/*************************************** Venta******************************************* */


 
/*************************************** Fin Venta******************************************* */








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



</script>
