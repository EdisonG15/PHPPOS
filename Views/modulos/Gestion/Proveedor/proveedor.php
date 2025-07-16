    <link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
    <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
     <script src="/WebPuntoVenta2025/Views/util/js/validarDocumento.js"></script>
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">                     
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Proveedor  </h3>
                        <div class="card-tools">
                        </div> 
                    </div> 
                     <br>
                     <div class="card-body">
                                     <div class="row">
                                     </div>
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_proveedor" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>RUC</th>
                                    <th>Nombre</th>
                                    <th>Razon Social</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Actualizacion</th>
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
<div class="modal fade" id="mdlGestionarProveedor" tabindex="-1" aria-labelledby="mdlGestionarProveedorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarProveedorLabel">
                    <i class="fas fa-building fa-lg"></i> Agregar Proveedor </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
                      <div class="modal-body px-4 py-4 bg-light-subtle">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body px-4 py-4">
          
                        <form class="needs-validation" novalidate>
                            <div class="row g-4"> <input type="hidden" id="id" name="rol" value="0"> <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptRuc" name="iptRuc"
                                               maxlength="13" minlength="10" placeholder="Ej. 1792XXXXXXX001" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off">
                                        <label for="iptRuc">RUC <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el RUC.</div> 
                                    </div>
                                </div>

                                   <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptNombre"
                                        maxlength="100" minlength="5" placeholder="Ej. Nombre del Contacto" required autocomplete="off">
                                        <label for="iptNombre">Nombre <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el nombre.</div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 d-flex align-items-center justify-content-end pt-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="chkValidar">
                                        <label class="form-check-label text-muted small" for="chkValidar">No validar</label>
                                    </div>
                                </div>

                             

                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptRazonSocial" 
                                         maxlength="100" minlength="5" placeholder="Ej. Nombre de la Empresa S.A." required autocomplete="off">
                                        <label for="iptRazonSocial">Razón Social <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar la razón social.</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptTelefono" maxlength="13" placeholder="Ej. 0987654321" required autocomplete="off">
                                        <label for="iptTelefono">Teléfono <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar el teléfono.</div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control form-control-modern" id="iptCorreo" 
                                         maxlength="100" minlength="5" placeholder="Ej. info@empresa.com" required autocomplete="off">
                                        <label for="iptCorreo">Correo <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar un correo válido.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-modern" id="iptDireccion"
                                         maxlength="100" minlength="5" placeholder="Ej. Calle Principal 456, Ciudad" required autocomplete="off">
                                        <label for="iptDireccion">Dirección <span class="text-danger"></span></label>
                                        <div class="invalid-feedback">Debe ingresar la dirección.</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                   
                
                <div class="d-flex justify-content-end mt-5"> <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistro">
                        <i class="fas fa-times me-2"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardar">
                        <i class="fas fa-save me-2"></i> Guardar
                    </button>
                </div>
             </div>
        </div>
      </div>
        </div>
    </div>
</div>
<script>
   var accion;
   var table_proveedor;

 $(document).ready(function() {
    cargarTableProveedor();

   $('#tb_proveedor tbody').on('click', '.btnEditar', function() {
        $("#mdlGestionarProveedor").modal('show');
        $('needs-validation').removeClass('was-validated');
        console.log("si esta editado")
        $("#chkValidar").prop("checked", false);
        accion = 2; //seteamos la accion para editar
        let  data = table_proveedor.row($(this).parents('tr')).data();
        $("#id").val(data[1]);
        $("#iptRuc").val(data[2]);
        $("#iptNombre").val(data[3]);
        $("#iptRazonSocial").val(data[4]);
        $("#iptDireccion").val(data[5]);
        $("#iptTelefono").val(data[6]);
        $("#iptCorreo").val(data[7]);
   });

   $('#tb_proveedor tbody').on('click', '.btnEliminar', function() {
        accion = 3; //seteamos la accion para editar
        let data = table_proveedor.row($(this).parents('tr')).data();
        let codigo_producto = data[1];
        //  alert (data [1]);
        Swal.fire({
            title: 'Está seguro de eliminar el Proveedor?',
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
                datos.append("IdProveedor", codigo_producto); //codigo_producto
                datos.append("Estado", 0); //codigo_producto
                $.ajax({
                    url: "ajax/proveedor.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

                          mostrarAlertaRespuesta(respuesta, () => {
                           table_proveedor.ajax.reload();
                           fun_limpiar();
                     
                         }, {
                           mensajeExito: 'éxito',
                           mensajeAdvertencia: 'Warning',
                           mensajeError: 'error'
                           });
                          },
                         error: manejarErrorAjax
           
                });
            }
        })
  });


    $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier evento
      fun_limpiar();
   } );

 }); /**  fin document ready */

  document.getElementById("btnGuardar").addEventListener("click", function () {
    const tipoIdentificacion = "04";
    const numeroDocumento = $("#iptRuc").val().trim();
    const saltarValidacion = document.getElementById("chkValidar").checked;

    const tipoIdentificacionTexto = {
        "05": "Cédula",
        "04": "RUC",
        "06": "Pasaporte"
    };

    const validarDocumento = () => {
        if (saltarValidacion) return true;

        switch (tipoIdentificacion) {
            case "05": return validarCedula(numeroDocumento);
            case "04": return validarRUC(numeroDocumento);
            case "06": return validarPasaporte(numeroDocumento);
            default: return false;
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
    const formularioValido = Array.from(forms).every(form => {
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return false;
        }
        return true;
    });

    if (!formularioValido) {
        Swal.fire({
            icon: 'info',
            title: 'Por favor complete todos los campos obligatorios'
        });
        return;
    }

    Swal.fire({
        title: '¿Está seguro de registrar el Proveedor?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarlo',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (!result.isConfirmed) return;
        const datos = new FormData();
        datos.append("accion", accion); // asegúrate de que esté definido en el scope
        datos.append("IdProveedor", $("#id").val());
        datos.append("Ruc", $("#iptRuc").val());
        datos.append("Nombre", $("#iptNombre").val());
        datos.append("RazonSocial", $("#iptRazonSocial").val());
        datos.append("Telefono", $("#iptTelefono").val());
        datos.append("Correo", $("#iptCorreo").val());
        datos.append("Direccion", $("#iptDireccion").val());

        $.ajax({
            url: "ajax/proveedor.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta) {
                 mostrarAlertaRespuesta(respuesta, function () {
                      table_proveedor.ajax.reload();
                      fun_limpiar();
                      $("#mdlGestionarProveedor").modal('hide');
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


  document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
         $(".needs-validation").removeClass("was-validated");
  });
  document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
  });

  function cargarTableProveedor(){
    table_proveedor = $("#tb_proveedor").DataTable({
        dom: 'Bfrtip',  //botoneras en la parte superios
         buttons: [
             {
                text: 'Agregar Proveedor',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                    $("#mdlGestionarProveedor").modal('show');
                     accion = 2; //registrar
                     $("#chkValidar").prop("checked", false);
                     fun_limpiar();

                  }
              },
              'excel', 'print', 'pageLength'
          ],
        //   pageLength: [5, 10, 15, 30, 50, 100],
        //   pageLength: 10,
        ajax: {
             url: "ajax/proveedor.ajax.php",
             dataSrc: '', // Que la data que retorne  no queremos
             type: "POST",
             data: {'accion': 1  },//1: LISTAR PRODUCTOS

        },
          responsive: {
           details: {
                  type: 'column'
              }
          },
           columnDefs: [{
                 targets: 0,  // idice cero donde se encuentra la columna
                 orderable: false, // es columan tenga ordenamiento
                 className: 'control' // aparescar  un boton
              }, {targets: 1, visible: false},{targets: 8,visible: false },{ targets: 9,visible: false },
                {
	            		"targets": 10,
	            		"sortable": false,
                        "className": "text-center",
	            		"render": function (data, type, full, meta){
                              return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                              
	            		}
	            	},
               {
                  targets: 11,
                  orderable: false, // no ordenar
                  render: function(data, type, full, meta) {
                     return  `
                          <center>
                           <div class="dropdown text-center">
                               <button class="btn-acciones dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
                                   Acciones <i class="fas fa-caret-down ms-2"></i>
                           </button>
                     <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
                               <li>
                           <a class="dropdown-item btnEditar" href="#" data-id="${full.id_proveedor}" title="Editar" style="cursor:pointer;">
                             <i class="fas fa-edit me-2"></i> Editar
                               </a>
                           </li>
                           <li>
                            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_proveedor}" title="Eliminar" style="cursor:pointer;">
                           <i class="fas fa-trash-alt me-2"></i> Eliminar
                          </a>
                         </li>
                              </ul>
                                   </div>
                              </center>

                      `
                  }
              }
         ],
        //  "order": [[ 0, 'desc' ]],
        //         lengthMenu: [ 5, 10, 15, 20, 50],
        //         "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
  };

  function fun_limpiar(){
        $('needs-validation').removeClass('was-validated');
        $("#id").val("0");
        $("#iptRuc").val("");
        $("#iptNombre").val("");
        $("#iptRazonSocial").val("");
        $("#iptTelefono").val("");
        $("#iptCorreo").val("");
        $("#iptDireccion").val("");
  };

</script>