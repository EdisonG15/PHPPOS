<?php 
session_start();
            
           ?>
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">                           
                               <h3 class="card-title"><i class="fas fa-list"></i> Lista Arqueo </h3>
                            <div class="card-tools">
                             </div>
                     </div> 
                        <br>
                     <div class="card-body">
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_arqueo_caja" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>id caja</th>
                                    <th>id usuario</th>
                                    <th>Fecha Apertura</th>
                                    <th>Monto Apertura</th>
                                    <th>Ingresos</th>                         
                                    <th>Gastos</th>
                                    <th>Monto Cierre</th>
                                    <th>Usuario</th>
                                    <th>sobrante</th>
                                    <th>faltante</th>                                 
                                    <th>Fecha Cierre</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
             </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal para ingresar o modificar un Productos -->
<div class="modal fade" id="mdlGestionarArqueo" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- contenido del modal -->
        <div class="modal-content">
            <!-- cabecera del modal -->
            <div class="modal-header bg-dark py-1">
                <h5 class="modal-title">Abrir Caja</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>   
            </div>
            <!-- cuerpo del modal -->
            <div class="modal-body">  
                <form class="needs-validation" novalidate > <!--Para validar el formulario que los campos se llene -->
                    <!-- Abrimos una fila -->
                    <div class="row">
                        <!-- Columna para registro del codigo de barras -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                            <input type="hidden" id ="idarqueoCaja" name ="arqueocaja" value ="">

                            <input id="txtId_usuario_arqueo" type="hidden"  value="<?php            
   echo  $_SESSION["usuario"]->id_usuario ?>"/>

              <input id="txtId_caja_arqueo" type="hidden"  value="<?php 
   echo  $_SESSION["usuario"]->id_caja ?>"/>
                                <label class="" for="txtMontoInicial"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Monto Inicial</span><span class="text-danger">*</span>
                                </label>
                                <input type="number"  class="form-control form-control-sm" id="txtMontoInicial"
                                    name="txtMontoInicial" placeholder=""  required  >
                                <div class="invalid-feedback">Debe ingresar el monto inicial </div>
                            </div>
                        </div>

                        <!-- Columna para registro de la categoría del producto -->
                        <div class="col-12  col-lg-6">
                            <div class="form-group mb-2">
                            <label class="" for="ddlEstado"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Estado</span><span class="text-danger">*</span>
                                </label>
                                <select name="estado" id="ddlEstado" class="form-control   form-control-sm">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            </div>
                        </div>
                        <!-- creacion de botones para cancelar y guardar el producto -->
                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width:170px;"
                            data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>
                        <button type="button" style="width:170px;" class="btn btn-info mt-3 mx-2"
                            id="btnGuardar">Guardar </button>
                        <!-- <button class="btn btn-default btn-success" type="submit" name="submit" value="Submit">Save</button> -->

                    </div>
                </form>
            
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="mdlGestionarArqueo_Caja" tabindex="-1" aria-labelledby="modalArqueoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalArqueoLabel">Arqueo de Caja</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input id="txt_id_arqueo_caja" type="hidden"  value=""/>
            <input id="txt_id_caja" type="hidden"  value=""/>
            <input id="txt_id_usuario" type="hidden"  value=""/>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 text-center">Billetes</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$100</span>
                                            <input type="number" class="form-control" id="inpuBillete100" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$50</span>
                                            <input type="number" class="form-control" id="inpuBillete50" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$20</span>
                                            <input type="number" class="form-control" id="inpuBillete20" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$10</span>
                                            <input type="number" class="form-control" id="inpuBillete10" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$5</span>
                                            <input type="number" class="form-control" id="inpuBillete5" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$2</span>
                                            <input type="number" class="form-control" id="inpuBillete2" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$1</span>
                                            <input type="number" class="form-control" id="inpuBillete1" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Billetes:</label>
                                        <input type="number" class="form-control text-end fw-bold" id="inpuTotalBilletes" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sección de Monedas -->
                    <div class="col-md-6">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 text-center">Monedas</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$1</span>
                                            <input type="number" class="form-control" id="inputMoneda1" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$0.50</span>
                                            <input type="number" class="form-control" id="inputMoneda50" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$0.25</span>
                                            <input type="number" class="form-control" id="inputMoneda25" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$0.10</span>
                                            <input type="number" class="form-control" id="inputMoneda10" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$0.05</span>
                                            <input type="number" class="form-control" id="inputMoneda5" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">$0.01</span>
                                            <input type="number" class="form-control" id="inputMoneda001" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Monedas:</label>
                                        <input type="number" class="form-control text-end fw-bold" id="inpuTotalMoneda" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3 shadow-sm rounded-3">
                    <div class="card-body">
                        <h6 class="text-primary">Total Efectivo: <span id="total_efectivo" class="text-secondary fw-bold"></span></h6>
                        <div class="mt-3">
                            <label for="txt_Comentario" class="form-label">Comentario:</label>
                            <input type="text" class="form-control" id="txt_Comentario" placeholder="Opcional">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-sm" id="btnRealizarArqueo">Realizar Arqueo</button>
            </div>
        </div>
    </div>
</div>

<script>
    var accion;  
    var table_arqueo_caja; 
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

   $(document).ready(function() {
        cargarTableArqueo();
      $('#tb_arqueo_caja tbody').on('click', '.btnEditar', function() {   
        $("#mdlGestionarArqueo_Caja").modal('show');
        $('needs-validation').removeClass('was-validated');
        accion = 8; //registrar
        let data = table_arqueo_caja.row($(this).parents('tr')).data();
        $("#txt_id_arqueo_caja").val(data[1]);
        $("#txt_id_caja").val(data[2]);
        $("#txt_id_usuario").val(data[3]);
        $("#inpuTotalBilletes") .prop('disabled', true); 
        $("#inpuTotalMoneda") .prop('disabled', true);
      });
    
      $('#tb_arqueo_caja tbody').on('click', '.btnEliminar', function() {
        accion = 4; //seteamos la accion para editar
        let data = table_arqueo_caja.row($(this).parents('tr')).data();
        let codigo_producto = data[1];
        Swal.fire({
            title: 'Está seguro de eliminar el Arqueo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append("accion", accion);
                datos.append("id", codigo_producto); //codigo_producto
                datos.append("estado", 3); //codigo_producto
                $.ajax({
                    url: "ajax/marca.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log("respuesta",respuesta);
                        if (respuesta == "ok") {
                            Toast.fire({
                                icon: 'success',
                                title: 'El Arqueo se eliminó correctamente'
                            });
                            table.ajax.reload();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'El Arqueo no se pudo eliminar'
                            });
                        }
                    }
                });
            }
        })
      });
    
      $('#tb_arqueo_caja tbody').on('click', '.btnCerrarCaja', function() {
          operacion_stock = 1; //sumar stock
          accion = 3;
            $("#mdlGestionarArqueoCaja").modal('show'); //MOSTRAR VENTANA MODAL
                 let total_fectivo_ventas=0;
                 let data = table_arqueo_caja.row($(this).parents('tr')).data();
                  $("#horaApertura").html(data[4])
                  $("#montoInicial").html(data[5]);
                  $("#id_arqueo_caja").val(data[1]);
                    let datos = new FormData();                
                    datos.append("accion", 4);                  
                    datos.append("id_caja",  $("#txtId_caja_arqueo").val());
                    datos.append("id_usuario",$("#txtId_usuario_arqueo").val());   
                    $.ajax({
                        url: "ajax/arqueo_caja.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                              let total_ingresos= respuesta[0]['total_ingresos'];
                                let total_egresos= respuesta[0]['total_egresos'];
                                let total_segun_sistema= total_ingresos-total_egresos;
                              $("#Efectivo_Ventas").html(respuesta[0]['total_fectivo_ventas']);
                              $("#Cobro_Ventas_a_Credito").html(respuesta[0]['total_fectivo_credito']);
                              $("#Ventas_a_Credito").html(respuesta[0]['total_ventas_credito']);
                              $("#otro_ingresos").html(respuesta[0]['total_otros_ingresos']);
                              $("#Compras").html(respuesta[0]['total_efectivo_compras']);
                              $("#Prestamos").html(respuesta[0]['total_prestamos']);
                              $("#Pagos_Compras_a_Credictos").html(respuesta[0]['total_pagos_compras_credito']);
                              $("#Gastos").html(respuesta[0]['total_otros_gastos']);
                              $("#Compras_a_Credito").html(respuesta[0]['total_credito_compras']);
                              $("#montoIngresos").html(respuesta[0]['total_ingresos']);
                              $("#montoEgreso").html(respuesta[0]['total_egresos']);
                                $("#total_segun_sistema").html(total_segun_sistema);
                                console.log("total_segun_sistema:",total_segun_sistema);
                           }
                    });
      });

      $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier evento
                            // limpiar los ipunt
        $('needs-validation').removeClass('was-validated');
        $("#idMarca").val("");
        $("#txtMarca").val("");
        $("#ddlEstado").val([1]);
     });
 

  });/** fin document ready */
 
  document.getElementById("btnGuardar").addEventListener("click", function() {
  
      let forms = document.getElementsByClassName('needs-validation');
      let validation = Array.prototype.filter.call(forms, function(form) {
        if (form.checkValidity() === true) {   // si todo los campos estar guardado 
            Swal.fire({
                title: 'Está seguro de Abrir el Caja?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo Abrir!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) { // preguntos si la respuesta en afirmativa
                    let datos = new FormData();
                    datos.append("accion", accion);
                    datos.append("id_arqueo_caja ", $("#idarqueoCaja").val());
                    datos.append("id_caja",  $("#txtId_caja_arqueo").val());
                    datos.append("id_usuario",$("#txtId_usuario_arqueo").val());
                    datos.append("monto_inicial"  ,  $("#txtMontoInicial").val());
                    datos.append("estado"  ,  1);
               let titulo_msj =''
                    if(accion == 2){
                         titulo_msj = "Se abrio correctamente";
                    }
                    if(accion == 3){
                         titulo_msj = "Se cerro correctamente";
                    }
                    $.ajax({
                        url: "ajax/arqueo_caja.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            console.log("que me trae",respuesta);
                            if (respuesta == "ok") {
                                Toast.fire({
                                    icon: 'success',
                                    title: titulo_msj
                                });
                                table_arqueo_caja.ajax.reload(); // recaragar table
                                // limpiar todos los impu
                                $("#mdlGestionarArqueo").modal('hide');
                                $(".needs-validation").removeClass("was-validated");
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El Arqueo no se pudo registrar'
                                });
                            }
                        }
                    });
                }
            })
        }else {
            console.log("No paso la validacion")
        }
        form.classList.add('was-validated');

    });
  });
  
  document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
         $(".needs-validation").removeClass("was-validated");
  });
  
  document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
  });

  function cargarTableArqueo(){
    table_arqueo_caja = $("#tb_arqueo_caja").DataTable({            
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                 {
                text: 'Abrir Caja',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                abri_caja();
                  }
              },
                    'excel','pdf', 'print', 'pageLength'
                ],
            //   pageLength: [5, 10, 15, 30, 50, 100],
            //   pageLength: 5,

        ajax: {
            
                url: "ajax/arqueo_caja.ajax.php",
                dataSrc: '', // Que la data que retorne  no queremos 
                type: "POST",
                data: {'accion': 1  },//1: LISTAR PRODUCTOS
            
            },
                responsive: {
                details: {
                        type: 'column'
                    }
                },
                columnDefs: [
                {
                    targets: 0,  // idice cero donde se encuentra la columna
                    orderable: false, // es columan tenga ordenamiento
                    className: 'control' // aparescar  un boton 
                    },
                    { targets: 1,visible: false },  { targets: 2,visible: false },  { targets: 3,visible: false },
                    { targets: 6,visible: false },{ targets: 7,visible: false },
                    {
                            "targets":13,
                            "sortable": false,
                            "render": function (data, type, full, meta){
                                if(data == 1){
                                    return "<center>" +
                                     "<button class='btn btn-sm btnAbrir btn-success  ' ><i class='fa fa-toggle-on'></i> Abierta</button>" 
                                }else{
                                    return "<center>" +
                                     "<button class='btn btn-sm btnCerrada btn-danger' ><i class='fa fa-toggle-off'></i> Cerrada</button>" 
                                }                          
                            }
                        },
                    {
                        targets: 14,
                        orderable: false, // no ordenar
                        render: function(data, type, full, meta) {
                            return "<center>" +                        // px tamaño
                                "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>" +
                                "<i class='fas fa-dollar-sign fs-5'></i>" + //icono
                                "</span>" +
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
  };

  function abri_caja(){
       let Badera_arqueo=0;
       $(".needs-validation").removeClass("was-validated");
       let datos = new FormData();
       datos.append("opcion", 1);
       datos.append("txt_id_caja"  ,$("#txtId_caja_arqueo").val());
       datos.append("txt_id_usuario"  ,$("#txtId_usuario_arqueo").val());
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

                      Badera_arqueo=1;
                      console.log("para gautdar :",Badera_arqueo);
                  }      
                  else {
                      Toast.fire({
                          icon: 'error',
                          title: 'Ya se encuentra Abierta La caja'
                      })
                      Badera_arqueo=0; 
                  }
                  
      if(Badera_arqueo==1){
                 $("#mdlGestionarArqueo").modal('show');
                  accion = 2; 

                let Id_caja= $("#txtId_caja_arqueo").val();
                let Id_usuario=$("#txtId_usuario_arqueo").val();
                let valor=0;
          $.ajax({
              url: "ajax/arqueo_caja.ajax.php",
              method: 'POST',
              data: {'accion': 9 ,
              'Id_caja': Id_caja,
              'Id_usuario': Id_usuario,
                },
              dataType: 'json',
                success: function(respuesta) {
                     if ( respuesta !='') {
                         $("#txtMontoInicial").val(respuesta[0]['usuario']);
                          $("#txtMontoInicial") .prop('disabled', true);

                      }else {
                         $("#txtMontoInicial") .prop('disabled', false);
                     }
                }
           });

     }
    }
 });
}


</script>