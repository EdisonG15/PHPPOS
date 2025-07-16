<?php 
session_start();
            
           ?>

           <br>
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h2 class="m-0">Administrar Creditos - Clientes</h2>

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div>

</div>

<div class="content">

    <div class="container-fluid">

        <ul class="nav nav-tabs" id="tabs-creditos" role="tablist">

            <li class="nav-item">
                <a class="nav-link " id="content-vigentes-tab" data-toggle="pill" href="#content-vigentes" role="tab" aria-controls="content-vigentes" aria-selected="false">VIGENTES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " id="content-finalizados-tab" data-toggle="pill" href="#content-finalizados" role="tab" aria-controls="content-finalizados" aria-selected="false">FINALIZADOS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link  active " id="content-abono-tab" data-toggle="pill" href="#content-abono" role="tab" aria-controls="content-abono" aria-selected="false">ABONOS</a>
            </li>
          

        </ul>

        <div class="tab-content" id="tabsContent-creditos">

    <div class="tab-pane fade  show mt-4 px-4" id="content-vigentes" role="tabpanel" aria-labelledby="content-vigentes-tab">
                <!-- <h4>Administrar Perfiles</h4> -->
                <div class="content pb-2">
              <div class="row p-0 m-0">

        <!--LISTADO DE CATEGORIAS -->
        <div class="col-md-12">
            <div class="card card-gray shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Creditos Vigentes</h3>
                </div>
                <div class="card-body">
                    <br>
                    <table id="tbl_credito_vigente" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark text-left">
                       
                                    <th>Id Credito</th>
                                    <th>Id Venta</th>
                                    <th>Id Cliente</th>
                                    <th>Cliente</th>
                                    <th>Monto</th>              
                                    <th>Abono</th>
                                    <th>Restante</th>
                                
                                    <th>Fecha Registro</th>
                                    
                                    <th>Estado</th>
                                    <th class="text-center">Opciones</th>
                        </thead>
                        <tbody class="small text left">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
    </div>
</div>


            </div>

    <!--  ERMEMEME -->

            <!-- /#content-modulos -->

            
            <!--============================================================================================================================================
            CONTENIDO PARA MODULOS 
            =============================================================================================================================================-->
 <div class="tab-pane fade  mt-4 px-4" id="content-finalizados" role="tabpanel" aria-labelledby="content-finalizados-tab">

               <div class="content pb-2">
              <div class="row p-0 m-0">

        <!--LISTADO DE CATEGORIAS -->
        <div class="col-md-12">
            <div class="card card-gray shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Creditos Finalizados</h3>
                </div>
                <div class="card-body">
                    <br>
                    <table id="tbl_credito_finalizados"class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark text-left">
                       
                                   <th>Id Credito</th>
                                    <th>Id Venta</th>
                                    <th>Id Cliente</th>
                                    <th>Cliente</th>
                                    <th>Monto</th>              
                                    <th>Abono</th>
                                    <th>Restante</th>
                                
                                    <th>Fecha Registro</th>
                                    
                                    <th>Estado</th>
                                    <th class="text-center">Opciones</th>
                        </thead>
                        <tbody class="small text left">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
    </div>
</div>


            </div><!-- /#content-modulos -->

            <div class="tab-pane fade active show mt-4 px-4" id="content-abono" role="tabpanel" aria-labelledby="content-abono-tab">

                
             <div class="content pb-2">
              <div class="row p-0 m-0">

        <!--LISTADO DE CATEGORIAS -->
        <div class="col-md-12">
            <div class="card card-gray shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Creditos Abono</h3>
                </div>
                <div class="card-body">
                    <br>


                    
        <div class="col-lg-2">
                 <!-- small box -->
                 
                     <div class="inner">
                         <h4 id="total_creditos">$./ 0,00.00</h4>

                         <p>TotaL Credito</p>
                     </div>
                  
                   
                 
             </div>
   <div class="row">
                                         
                 <div class="row align-items-end">
                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <label for="txtFechaInicio" class="col-form-label col-form-label-sm">Cliente:</label>
                            <input type="text" class="form-control form-control-sm model" id="iptCedulaCliente_cobrar"  placeholder="Buscar por nombre o cedula del Clientes" autocomplete="off">
                        </div>
                    </div>
                 
              
                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <button id="btnBuscar_historial_abono_ventas" type="button" class="btn btn-sm btn-info btn-block" ><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <button id="btn_cobrar_abono_credito" type="button" class="btn btn-sm btn-dark btn-block" ><i class="fas fa-money-bill"></i> Cobrar</button>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                        <button class="btn btn-success btn-block" id="btnVaciarListado">
                       
                       <a style="cursor:pointer;"   onclick="CargarContenido('Views/modulos/Ventas/RealizarVentas/realizar_ventas.php','content-wrapper')" >  <i class="fa fa-shop"></i> Ventas </a>
                          
                          
                          </button>
                        </div>
                    </div>
                </div>

                                     <!-- para ingresar contenidos -->


                                     </div>
                                     <hr />
                                     <br>

                    <table id="tbl_credito_abono_ventas" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark text-left">
                       
                                   
                                    <th>Id Credito</th>
                                    <th>Id Venta</th>
                                    <th>Id Cliente</th>
                                    <th>Cliente</th>
                                    <th>Monto</th>              
                                    <th>Abono</th>
                                    <th>Restante</th> 
                                    <th>Fecha Registro</th>
                                    <th>Estado</th>
                                    <th>Nro Boleta</th>
                                    <th class="text-center">Opciones</th>
                        </thead>
                        <tbody class="small text left">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
    </div>
</div>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="mdlGestionarCreditos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-primary text-white p-4">
                <h5 class="modal-title" id="titulo_modal_stock">Nuevo Abono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalStock"></button>
            </div>
            <div class="modal-body px-5 py-4">
                <div class="row">
                    <!-- Campos ocultos -->
                    <input type="hidden" id="id_venta_credito" name="credito" value="">
                    <input type="hidden" id="id_cliente" name="cliente" value="">
                    <input type="hidden" id="nro_credito_ventas" name="nrociente" value="">
                    <input type="hidden" id="id_ventas" name="cliente" value="">
                    <input type="hidden" id="nro_ventas" name="nrociente" value="">
                    <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>"/>
                    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>"/>

                    <!-- Información vertical -->
                    <div class="col-12 mb-4">
                        <label class="form-label text-secondary fs-5 fw-semibold">Nombre:</label>
                        <span id="nombrecliente" class="form-control-plaintext text-dark fs-4"></span>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label text-secondary fs-5 fw-semibold">Monto Total:</label>
                        <span id="Monto_total" class="form-control-plaintext text-dark fs-4"></span>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label text-secondary fs-5 fw-semibold">Abonado:</label>
                        <span id="Abonado" class="form-control-plaintext text-dark fs-4"></span>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label text-secondary fs-5 fw-semibold">Restante:</label>
                        <span id="saldo_restante" class="form-control-plaintext text-dark fs-4"></span>
                    </div>

                    <!-- Input para agregar abono -->
                    <div class="col-12 mb-4">
                        <label for="iptAbonoSumar" class="d-flex align-items-center text-info fs-5">
                            <i class="fas fa-plus-circle fs-6"></i>
                            <span class="ms-2">Agregar Abono</span>
                        </label>
                        <input type="number" min="0" class="form-control form-control-lg rounded-3" id="iptAbonoSumar" placeholder="Ingrese cantidad a abonar">
                    </div>

                    <!-- Saldo nuevo -->
                    <div class="col-12 mb-4">
                        <label class="form-label text-danger fs-5 fw-semibold">Nuevo Saldo:</label>
                        <span id="NuevoSaldo" class="form-control-plaintext text-dark fs-4"></span>
                    </div>

                </div>
            </div>

            <!-- Botones más grandes -->
            <div class="modal-footer border-0 py-3">
                <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="modal" id="btnCancelarRegistroStock">Cancelar</button>
                <button type="button" class="btn btn-success btn-lg" id="btnGuardar_abono">Guardar</button>
            </div>
        </div>
    </div>
</div>





<script>

    var accion;  
    var table_credito_vigente; 
    var itemsclientes_cobrar = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var table_credito_finalizado; 
    var table_credito_abono; 
    var baderara_validar_Abono=0;
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    $(document).ready(function() {
         CargarClientesinicio();
        cargarDataTables();

     verificarSiExisteCajaAbierta();
      /*===================================================================*/
    // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
    /*====================================================================================================================*/
 

    $('#tbl_credito_abono_ventas tbody').on('click', '.btnimprimirticke', function() {

    let data = table_credito_abono.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE

  let nro_boleta=data[9];
        window.open('http://localhost/WebPuntoVenta/Views/modulos/Ventas/RealizarVentas/generar_tick.php?nro_boleta='+nro_boleta);

   
  

    })
 
      /* ======================================================================================
    EVENTO QUE LIMPIA EL INPUT DE INGRESO DE STOCK AL CERRAR LA VENTANA MODAL limpiar
    =========================================================================================*/
    $("#btnCancelarRegistroStock, #btnCerrarModalStock").on('click', function() {
        $("#iptAbonoSumar").val("")
        $("#NuevoSaldo").html("");
    })
   /* ======================================================================================
    EVENTO AL DIGITAR LA CANTIDAD A AUMENTAR O DISMINUIR DEL STOCK
    =========================================================================================*/
    $("#iptAbonoSumar").keyup(function() {
        

        // console.log($("#iptStockSumar").val());

       
            // si el imput no este vacio y que sea mayor a cero
            if ($("#iptAbonoSumar").val() != " ") {

                let SaldoActual = parseFloat($("#saldo_restante").html());// cogue del que ya esta
                let cantidadAgregar = parseFloat($("#iptAbonoSumar").val()); // lo que digito en el imput
                let nuevo_saldo=SaldoActual-cantidadAgregar;
                  
                if ($("#iptAbonoSumar").val() >SaldoActual){
                    $("#NuevoSaldo").html('0');

                }else {
                    $("#NuevoSaldo").html(nuevo_saldo.toFixed(2));
                }
             
               

            } else {
                 // 
                Toast.fire({
                    icon: 'warning',
                    title: 'Ingrese un valor mayor a 0'
                });
                $("#iptAbonoSumar").val("")
                $("#NuevoSaldo").html(parseFloat($("#saldo_restante").html()));

            }

       

        

    })



    })


        
 function cargarDataTables() {

    table_credito_vigente = $("#tbl_credito_vigente").DataTable({
        
        /* dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                
                
                 
                    'excel','pdf', 'print', 'pageLength'
                ],
              pageLength: [5, 10, 15, 30, 50, 100],
              pageLength: 5,
           */
        // LISTAR  PRODUCTOS
        ///////////////////////////////////////////////////////////////////////
        ajax: {
             url: "ajax/administrar_creditos.ajax.php",
             dataSrc: '', // Que la data que retorne  no queremos 
             type: "POST",
             data: {'accion': 1  },//1: LISTAR PRODUCTOS
        
        },
        ///////////////////////////////////////////////////////////////////////
          responsive: {
           details: {
                  type: 'column'
              }
          },
           columnDefs: [
           

                    {
                 targets: 0,  
                 visible: false, 
              },
              {
                 targets: 1,  
                 visible: false,  
              },
              {
                 targets: 2,  
                 visible: false,  
              },
        
              
              {
                 targets: 9,  
                 visible: false,
                 
                  
                
              },
            // {
	            	// 	"targets": 15,
	            	// 	"sortable": false,
	            	// 	"render": function (data, type, full, meta){

	            	// 		if(data == 1){
					// 			return "<div class='bg-danger color-palette text-center'>Pendiente</div> " 
	            	// 		}else if(data == 2){
					// 			return "<div class='bg-primary color-palette text-center'>Cancelado</div> " 
	            	// 		}
	            			
	            	// 	}
	            	// },
                    /*
               {
                  targets: 15,
                  orderable: false, // no ordenar
                  render: function(data, type, full, meta) {
                      return "<center>" +                        // px tamaño
                          "<span class='btn_ver text-primary px-1' style='cursor:pointer;'>" +
                          "<i class='fas fa-pencil-alt fs-5'></i>" + //icono
                          "</span>" +
                          "<span class='btnEliminarRol text-danger px-1' style='cursor:pointer;'>" +
                          "<i class='fas fa-trash fs-5'></i>" +
                          "</span>" +
                          "</center>"
                  }
              }


           */
         ],
         "order": [[ 0, 'desc' ]],
                lengthMenu: [ 5, 10, 15, 20, 50],
                "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });

    table_credito_finalizado = $("#tbl_credito_finalizados").DataTable({
      

      // LISTAR  PRODUCTOS
      ///////////////////////////////////////////////////////////////////////
      ajax: {
           url: "ajax/administrar_creditos.ajax.php",
           dataSrc: '', // Que la data que retorne  no queremos 
           type: "POST",
           data: {'accion': 2  },//1: LISTAR PRODUCTOS
      
      },
      ///////////////////////////////////////////////////////////////////////
        responsive: {
         details: {
                type: 'column'
            }
        },
         columnDefs: [
        
            {
                 targets: 0,  
                 visible: false, 
              },
              {
                 targets: 1,  
                 visible: false,  
              },
              {
                 targets: 2,  
                 visible: false,  
              },
        
              
              {
                 targets: 9,  
                 visible: false,
                 
                  
                
              },
          // {
                  // 	"targets": 15,
                  // 	"sortable": false,
                  // 	"render": function (data, type, full, meta){

                  // 		if(data == 1){
                  // 			return "<div class='bg-danger color-palette text-center'>Pendiente</div> " 
                  // 		}else if(data == 2){
                  // 			return "<div class='bg-primary color-palette text-center'>Cancelado</div> " 
                  // 		}
                          
                  // 	}
                  // },
                  /*
             {
                targets: 15,
                orderable: false, // no ordenar
                render: function(data, type, full, meta) {
                    return "<center>" +                        // px tamaño
                        "<span class='btnAbono text-primary px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-pencil-alt fs-5'></i>" + //icono
                        "</span>" +
                        "<span class='btnEliminarRol text-danger px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-trash fs-5'></i>" +
                        "</span>" +
                        "</center>"
                }
            }
            */

       ],
       "order": [[ 0, 'desc' ]],
              lengthMenu: [ 5, 10, 15, 20, 50],
              "pageLength": 10,
      language: {
          url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      }
    });

    
    table_credito_abono = $("#tbl_credito_abono_ventas").DataTable({
      
      // LISTAR  PRODUCTOS
      ///////////////////////////////////////////////////////////////////////
    //   ajax: {
    //        url: "ajax/administrar_creditos.ajax.php",
    //        dataSrc: '', // Que la data que retorne  no queremos 
    //        type: "POST",
    //        data: {'accion': 1  },//1: LISTAR PRODUCTOS
      
    //      },
     
    //     responsive: {
    //      details: {
    //             type: 'column'
    //         }
    //     },
    //      columnDefs: [
        
    //         {
    //              targets: 0,  
    //              visible: false, 
    //           },
    //           {
    //              targets: 1,  
    //              visible: false,  
    //           },             
    //           {
    //              targets: 2,  
    //              visible: false,  
    //           },
    //           {
    //              targets: 9,  
    //              visible: false,  
    //           },
        
    //       // {
    //               // 	"targets": 15,
    //               // 	"sortable": false,
    //               // 	"render": function (data, type, full, meta){

    //               // 		if(data == 1){
    //               // 			return "<div class='bg-danger color-palette text-center'>Pendiente</div> " 
    //               // 		}else if(data == 2){
    //               // 			return "<div class='bg-primary color-palette text-center'>Cancelado</div> " 
    //               // 		}
                          
    //               // 	}
    //               // },
    //          {
    //             targets: 10,
    //             orderable: false, // no ordenar
    //             render: function(data, type, full, meta) {
    //                 return "<center>" +                        // px tamaño
    //                     "<span class='btnAbono text-info px-1' style='cursor:pointer;'>" +
    //                     "<i class='fas fa-dollar-sign fs-5'></i>" + //icono
    //                     "</span>" +
    //                     /*"<span class='btnEliminarRol text-danger px-1' style='cursor:pointer;'>" +
    //                     "<i class='fas fa-trash fs-5'></i>" +
    //                     "</span>" +
    //                     */
    //                     "</center>"
    //             }
    //         }

    //    ],
    //    "order": [[ 0, 'desc' ]],
    //           lengthMenu: [ 5, 10, 15, 20, 50],
    //           "pageLength": 10,
    //   language: {
    //       url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    //   }
    });




    }
   

    $("#btnGuardar_abono").on('click', function() {
       
 
        $("#btnGuardar_abono") .prop('disabled', true);
                 
                 if ($("#iptAbonoSumar").val() != "" ) { //impide que guardese esta bacio
         
                 
                     let NuevoSaldo = parseFloat($("#NuevoSaldo").html()),
                     id_credito = $("#id_credito").val();
         
                      let abono  = $("#iptAbonoSumar").val();
                     let Monto_total = parseFloat($("#Monto_total").html())
         
                             if (NuevoSaldo==0){
                               abono =parseFloat($("#saldo_restante").html());
         
                             }else if (NuevoSaldo>0) {
         
                                 abono= $("#iptAbonoSumar").val();
                             }
                       console.log("abonossssss",abono);
                     let datos = new FormData();
         
                     datos.append('accion', accion);
                    datos.append('id_usuario', $("#txtId_usuario").val());
                     datos.append('id_caja', $("#txtId_caja").val());
                     datos.append('id_cliente', $("#id_cliente").val());
                     datos.append('id_venta_credito', $("#id_venta_credito").val());
                     
                    datos.append('abono', abono);
                     datos.append('NuevoSaldo', NuevoSaldo);
                console.log('abono',abono);
                console.log('NuevoSaldo',NuevoSaldo);
         
                    $.ajax({
                         url: "ajax/administrar_creditos.ajax.php",
                         method: "POST",
                         data: datos, // se pasa la data
                         processData: false,
                         contentType: false,
                         dataType: 'json',
                         success: function(respuesta) { //respuesta 
         
                            
         
                             Swal.fire({
                                     position: 'center',
                                     icon: 'success',
                                     title: respuesta,
                                     showConfirmButton: false,
                                     timer: 1500
                                 })
         
                   
                              
                                 $("#mdlGestionarCreditos").modal('hide'); // se sierra la ventana
                                 $("#iptAbonoSumar").val("")
                                 table_credito_abono.ajax.reload();
                                 table_credito_vigente.ajax.reload();
                                 table_credito_finalizado.ajax.reload();
                                  
         
                                 $("#btnGuardar_abono") .prop('disabled', false);
                            
         
                         }
                     });
         
                 } else {
                    $("#btnGuardar_abono") .prop('disabled', false);
                     Toast.fire({
                         icon: 'warning',
                         title: 'Debe ingresar la cantidad a aumentar'
                     });
                 }
         
    })
         
    function verificarSiExisteCajaAbierta(){
      
      let datos = new FormData();

        datos.append("opcion", 1);
       //  datos.append("VerificaExiste",  $("#txtCategoria").val()); //codigo_producto    

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

                    baderara_validar_Abono=1;
            }      
               
             }

             });
}



    function CargarClientesinicio(){

           /* ======================================================================================
		TRAER LISTADO DE CLIENTES PARA INPUT DE AUTOCOMPLETADO
		======================================================================================*/
  
		$.ajax({
			async: false,
			url: "ajax/clientes.ajax.php",
			method: "POST",
			data: {
				'accion': 5
			},
			dataType: 'json',
			success: function(respuesta) {
                        console.log("lo que trae:",respuesta);
				for (let i = 0; i < respuesta.length; i++) {
					itemsclientes_cobrar.push(respuesta[i]['descripcion_clientes']) 
				}
                let contador=0;
                 contador=contador+1;
                          console.log("contador:",contador);
                console.log("del fro sss",itemsclientes_cobrar)
				 $("#iptCedulaCliente_cobrar").autocomplete({ //es el codigo de barra a buscar
                   
					source: itemsclientes_cobrar,
				    select: function(event, ui) {
                        console.log("dentro face 1");
                      console.log("dentro face 1",ui.item.value)
				 		   CargarCliente(ui.item.value);   
                       
						 $("#iptCedulaCliente_cobrar").val("");

					

				     	return false;
					}
				})


			}
		});
    }



    $("#iptCedulaCliente_cobrar").change(function() { //change cuando dectente un movimiento
            CargarCliente();        
    });


   function CargarCliente(clientes = "") {
   
        console.log("sssjsjssjsjs");

        console.log("clientes*****",clientes);
       let  cedula_cliente=0;

        if (clientes != "") {
            cedula_cliente = clientes;
            
        } else {
              cedula_cliente = $("#iptCedulaCliente_cobrar").val();
        }

        $("#iptCedulaCliente_cobrar").val("");

        $.ajax({
            url: "ajax/clientes.ajax.php",
            method: "POST",
            data: {
                'accion': 6, 
              
                'cedula_cliente': cedula_cliente
               
            },
            dataType: 'json',
            success: function(respuesta) {
                // console.log("dentro face 2",respuesta)
                /*===================================================================*/
                //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
                /*===================================================================*/
                           
                        console.log("respuesta",respuesta);  
                          
                if (respuesta) {            
               

                            // $("#txtIdCliente").val(respuesta['id_cliente']);
                            // $("#txtNumeroDocumento").val(respuesta['numeroDocumento']);
                            $("#iptCedulaCliente_cobrar").val(respuesta['nombres']);
                            
                            
                     console.log("Datos de regresos");
                      console.log("id cliente:",respuesta['id_cliente']);
                      console.log("Numero Documento:",respuesta['numeroDocumento']);
                      console.log("Nombre:",respuesta['nombres']);
     
                /*===================================================================*/
                //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                /*===================================================================*/
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: ' El cliente  no existe por favor registre al cliente'
                    });

                    $("#iptCodigoVenta").val("");
                    $("#iptCodigoVenta").focus();
                }

            }
        });   


}




$("#btn_cobrar_abono_credito").on('click',function(){
 
   let count=0;
    table_credito_abono.rows().eq(0).each(function(index) { // recorro un for en el listado
         
         count = count + 1;
        
      
     });
      
     if(count>0){

    if(baderara_validar_Abono==1){
            Swal.fire({
            icon: 'error',
          title: 'Opcion deshabilitada...',
            text: 'No se puede realizar esta operación ya que la caja se encuentra cerrada!',
 
          })}else{
      
        accion = 4;


              let Nombrecliente=$("#iptCedulaCliente_cobrar").val();

      if (Nombrecliente != "") {
           

        Nombrecliente = $.trim(Nombrecliente.split('-')[1]);
        console.log("nombre cliente",Nombrecliente);
    
        } else {
       return;
          
        }
        $("#mdlGestionarCreditos").modal('show'); //MOSTRAR VENTANA MODAL

        $("#btn_cobrar_abono_credito") .prop('disabled', false);
       let tota_credito= $("#total_creditos").html();
          $("#nombrecliente").html(Nombrecliente);

         
          
          
    }
     }else{

        Toast.fire({
                        icon: 'warning',
                        title: 'No Hay listado Credito del cliente,'
       
                    });
     }
 })
 
 $("#btnBuscar_historial_abono_ventas").on('click',function(){
   
      let cedula=$("#iptCedulaCliente_cobrar").val();

      if (cedula != "") {
           

        cedula = $.trim(cedula.split('-')[0]);
    
        } else {
       return;
          
        }  

        console.log("ceduladd : ",cedula);
      table_credito_abono.destroy();
      table_credito_abono = $("#tbl_credito_abono_ventas").DataTable({
      
      ajax: {
           url: "ajax/administrar_creditos.ajax.php",
           dataSrc: '', // Que la data que retorne  no queremos 
           type: "POST",


           dataType: 'json',
                "dataSrc": function (respuesta){

                    console.log("lo que trae : ",respuesta)
                   let TotalCredito = 0.00;
               let total_abono=0.00;
               let saldo_restante=0;
               let id_clientes=0;
               let id_venta_credit=0;
               let TotalCredito_deudor=0;
                
                    for (let i = 0; i < respuesta.length; i++) {
                        // console.log("d",i);
                        TotalCredito_deudor = parseFloat(respuesta[i][6]) + parseFloat(TotalCredito_deudor) ;
                        TotalCredito = parseFloat(respuesta[i][4]) + parseFloat(TotalCredito) ;
                        total_abono= parseFloat(respuesta[i][5]) + parseFloat(total_abono) ;
                        id_clientes= respuesta[i][2] ;
                        id_venta_credito=respuesta[i][0] ;
                      
                    }
                    let resup= '$ '+TotalCredito_deudor.toFixed(2);
                    console.log("TotalCredito_deudor : ",TotalCredito_deudor);
                    console.log("TotalCredito : ",TotalCredito);
                    console.log("total_abono : ",total_abono);
                    console.log("id_clientes : ",id_clientes);
                    console.log("id_venta_credito : ",id_venta_credito);

                     $("#saldo_restante").html(TotalCredito.toFixed(2)-total_abono.toFixed(2));	
                      $("#Abonado").html(total_abono.toFixed(2));	
                    $("#total_creditos").html(resup);
                    $("#Monto_total").html(TotalCredito.toFixed(2)) 		
                       $("#id_cliente").val(id_clientes);
                       $("#id_venta_credito").val(id_venta_credito);
                       
                  $("#NuevoSaldo").html(TotalCredito.toFixed(2)-total_abono.toFixed(2));
            
                    return  respuesta;
                },
           data: {'accion': 3 ,
                    'p_numero_cedula':cedula
                 },//1: LISTAR PRODUCTOS
      
         },
     
        responsive: {
         details: {
                type: 'column'
            }
        },
         columnDefs: [
            {
                 targets: 0,  
                 visible: false, 
              },
              {
                 targets: 1,  
                 visible: false,  
              },

              {
                 targets: 2,  
                 visible: false,  
              },
              {
                 targets: 9,  
                 visible: false,  
              },
        
             {
                targets: 10,
                orderable: false, // no ordenar
                render: function(data, type, full, meta) {
                    return "<center>" +                        // px tamaño
                        "<span class='btnimprimirticke text-danger px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-file-pdf fs-5'></i>" + //icono
                        "</span>" +
                        /*"<span class='btnEliminarRol text-danger px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-trash fs-5'></i>" +
                        "</span>" +
                        */
                        "</center>"
                }
            }

       ],
       "order": [[ 0, 'desc' ]],
              lengthMenu: [ 5, 10, 15, 20, 50],
              "pageLength": 10,
      language: {
          url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      }
    });
        
        
        })




</script>