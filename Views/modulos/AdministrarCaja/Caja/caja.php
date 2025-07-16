<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Caja  </h3>
                        <div class="card-tools">
                            
                        </div> 
                    </div> 
                        <br>
                     <div class="card-body">
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_caja" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Numero Caja</th>
                                    <th>Nombre</th>
                                    <th>Folio</th>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Modificacion</th>
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

<div class="modal fade" id="mdlGestionarCaja" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white py-2">
                <h5 class="modal-title">Agregar Caja</h5>
                <button type="button" class="btn btn-outline-light border-0 fs-4" data-bs-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <input type="hidden" id="idcaja" name="caja" value="">
                                <label for="txtNumeroCaja" class="form-label"><i class="fas fa-hashtag fs-5"></i> Número de Caja <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="txtNumeroCaja"
                                    name="txtNumeroCaja" maxlength="19" minlength="2" required autocomplete="off"
                                    placeholder="Ingrese número de caja"
                                    onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                <div class="invalid-feedback">Debe ingresar el Número de Caja.</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="txtNombreCaja" class="form-label"><i class="fas fa-box fs-5"></i> Nombre de Caja <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="txtNombreCaja"
                                    name="txtNombreCaja" maxlength="19" minlength="2" required autocomplete="off"
                                    placeholder="Ingrese nombre de caja"
                                    onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                <div class="invalid-feedback">Debe ingresar el Nombre de Caja.</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="txtFolio" class="form-label"><i class="fas fa-file-alt fs-5"></i> Folio <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="txtFolio"
                                    name="txtFolio" maxlength="19" minlength="2" required autocomplete="off"
                                    placeholder="Ingrese folio"
                                    onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                <div class="invalid-feedback">Debe ingresar el Folio.</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label for="ddlEstado_caja" class="form-label"><i class="fas fa-toggle-on fs-5"></i> Estado <span class="text-danger">*</span></label>
                                <select name="estado" id="ddlEstado_caja" class="form-select form-select-lg rounded-3">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-danger btn-lg mx-2 px-4" data-bs-dismiss="modal" id="btnCancelarRegistro">
                                <i class="fas fa-times-circle"></i> Cancelar
                            </button>
                            <button type="button" class="btn btn-primary btn-lg mx-2 px-4" id="btnGuardar_caja">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var accion;  
    var table_caja; 
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });


  $(document).ready(function() {
    cargarTableCaja();

    $('#tb_caja tbody').on('click', '.btnActivarAlm', function() {
        accion = 4; //seteamos la accion para editar
     let data = table_caja.row($(this).parents('tr')).data();
         let id_caja = data[1];
            estado =data[7];
            if(estado==1){
                estado=2;
            }else {
                estado=1;
            }
              let datos = new FormData();
                datos.append("accion", accion);
                datos.append("id", id_caja); //codigo_producto
                datos.append("estado", estado); //codigo_producto
                $.ajax({
                    url: "ajax/caja.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log("respuesta",respuesta);
                        if (respuesta == "ok") {

                            table_caja.ajax.reload();
                        }
                    }
                });
    });

     
    $('#tb_caja tbody').on('click', '.btnEditar', function() {
        
        $("#mdlGestionarCaja").modal('show');
        accion = 3; //registrar
        let data = table_caja.row($(this).parents('tr')).data();
                                $('needs-validation').removeClass('was-validated');
                                $("#idcaja").val(data[1]);
                                $("#txtNumeroCaja").val(data[2]);
                                $("#txtNombreCaja").val(data[3]);
                                $("#txtFolio").val(data[4]);
                                $("#ddlEstado_caja").val(data[7]);
                               

    });

    
    $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier evento
        limpiar();
    });

    $('#tb_caja tbody').on('click', '.btnEliminar', function() {

        accion = 4; //seteamos la accion para editar
        let data = table_caja.row($(this).parents('tr')).data();
        let codigo_producto = data[1];
        Swal.fire({
            title: 'Está seguro de eliminar el Caja?',
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
                datos.append("estado", 0); //codigo_producto
                $.ajax({
                    url: "ajax/caja.ajax.php",
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
                                title: 'El Caja se eliminó correctamente'
                            });
                            table_caja.ajax.reload();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'El Caja no se pudo eliminar'
                            });
                        }
                    }
                });
            }
        })
    });

  }); /** document ready */

   document.getElementById("btnGuardar_caja").addEventListener("click", function() {
    let forms = document.getElementsByClassName('needs-validation');
    let validation = Array.prototype.filter.call(forms, function(form) {
        if (form.checkValidity() === true) {   // si todo los campos estar guardado
            Swal.fire({
                title: 'Está seguro de registrar el Caja?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo registrarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) { // preguntos si la respuesta en afirmativa
                    let datos = new FormData();
                    datos.append("accion", accion);
                    datos.append("id", $("#idcaja").val());
                    datos.append("numerocaja", $("#txtNumeroCaja").val());
                    datos.append("nombre", $("#txtNombreCaja").val());
                    datos.append("folio", $("#txtFolio").val());
                    datos.append("estado"  ,  $("#ddlEstado_caja").val());
                    let titulo_msj='';
                    if(accion == 2){
                         titulo_msj = "El Caja se registró correctamente";
                    }
                    if(accion == 3){
                        titulo_msj = "El Caja se actualizó correctamente";
                    }

                    $.ajax({
                        url: "ajax/caja.ajax.php",
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
                                console.log("si inresasaaaaaa");
                                table_caja.ajax.reload(); // recaragar table
                                // limpiar todos los impu
                                $("#mdlGestionarCaja").modal('hide');
                                limpiar();
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El caja no se pudo registrar'
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
  
  function cargarTableCaja(){
    table_caja = $("#tb_caja").DataTable({  
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                   {

                text: 'Agregar Caja',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                    $("#mdlGestionarCaja").modal('show');
                    limpiar();
               $(".needs-validation").removeClass("was-validated");
                     accion = 2; //registrar
                  }
              },
                 
                    'excel','pdf', 'print', 'pageLength'
                ],
            //   pageLength: [5, 10, 15, 30, 50, 100],
            //   pageLength: 5,

        ajax: {
            
                url: "ajax/caja.ajax.php",
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
                    {
                            "targets": 7,
                            "sortable": false,
                            "render": function (data, type, full, meta){
                                if(data == 1){
                                    return "<center>" +
                                    "<button class='btn btn-sm btnActivarAlm btn-success  ' ><i class='fa fa-toggle-on'></i> ACTIVO</button>"
                                }else{
                                    return  "<center>" +
                                    "<button class='btn btn-sm btnActivarAlm btn-danger' ><i class='fa fa-toggle-off'></i> INACTIVO</button>" 
                                }           
                            }
                        },
                    {
                        targets: 8,
                        orderable: false, // no ordenar
                        render: function(data, type, full, meta) {
                            return "<center>" +                        // px tamaño
                                "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>" +
                                "<i class='fas fa-pencil-alt fs-5'></i>" + //icono
                                "</span>" +
                                "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>" +
                                "<i class='fas fa-trash fs-5'></i>" +
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

  function limpiar() {
        $("#idcaja").val("");
        $("#txtNumeroCaja").val("");
        $("#txtNombreCaja").val("");
        $("#txtFolio").val("");
        $("#ddlEstado_caja").val([1]);
        $(".needs-validation").removeClass("was-validated");
  };
  
</script>
