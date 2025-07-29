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
                <h3 class="card-title"><i class="fas fa-list"></i> Lista Clientes</h3>
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
                    <table id="tb_clientesC" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                      <thead class="bg-dark ">
                        <tr>
                          <th></th>
                          <th>id</th>
                          <th># Documento</th>
                          <th>Cliente</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Fecha Registro</th>
                          <th>Fecha Actulizacion</th>
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

    <!-- Modal: Agregar Cliente -->
    <div class="modal fade" id="mdlGestionarClientes" tabindex="-1" aria-labelledby="mdlGestionarClientesLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
          <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
            <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarClientesLabel">
              <i class="fas fa-user-plus fa-lg"></i> Agregar Cliente
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar" id="btnCerrarModal"></button>
          </div>

          <div class="modal-body bg-light-subtle px-4 py-4">
            <div class="card shadow-sm border-0 rounded-4">
              <div class="card-body px-4 py-4">
                <form class="needs-validation" novalidate>
                  <div class="row g-4">
                    <input type="hidden" id="IdCliente" name="cliente" value="0">

                    <div class="col-lg-4">
                      <div class="form-floating">
                        <select class="form-select form-control-modern" id="selTipoIdentificacion">
                          <option value="04" selected>RUC</option>
                          <option value="05">CÉDULA</option>
                          <option value="06">PASAPORTE</option>
                        </select>
                        <label for="selTipoIdentificacion">Tipo Identificación <span class="text-danger"></span></label>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-floating">
                        <input type="text" class="form-control form-control-modern" id="iptNumeroDocumento"
                          name="iptNumeroDocumento" maxlength="13" minlength="10" placeholder="Ej. 0987654321" required
                          autocomplete="off">
                        <label for="iptNumeroDocumento">Número Cédula <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar la cédula del cliente.</div>
                      </div>
                    </div>

                    <div class="col-lg-4 d-flex align-items-center justify-content-end pt-3">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="chkValidar" name="chkValidar">
                        <label class="form-check-label text-muted small" for="chkValidar">No validar </label>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="text" class="form-control form-control-modern" id="iptNombre" name="iptNombre"
                          maxlength="100" minlength="5" placeholder="Ej. Juan Andrés" required autocomplete="off">
                        <label for="iptNombre">Nombres <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar el nombre del cliente.</div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="text" class="form-control form-control-modern" id="iptApellido" name="iptApellido"
                          maxlength="100" minlength="5" placeholder="Ej. Pérez García" required autocomplete="off">
                        <label for="iptApellido">Apellidos <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar el apellido del cliente.</div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="text" class="form-control form-control-modern" id="iptDireccion" name="iptDireccion"
                          maxlength="100" minlength="5" placeholder="Ej. Av. Principal 123" required autocomplete="off">
                        <label for="iptDireccion">Dirección <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar la dirección.</div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="text" class="form-control form-control-modern" id="iptTelefono" name="iptTelefono"
                          maxlength="12" minlength="10" placeholder="Ej. 0987654321" required
                          autocomplete="off">
                        <label for="iptTelefono">Teléfono <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar el teléfono.</div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="email" class="form-control form-control-modern" id="iptEmail" name="iptEmail"
                          maxlength="100" minlength="5" placeholder="Ej. correo@ejemplo.com" required autocomplete="off">
                        <label for="iptEmail">Correo <span class="text-danger"></span></label>
                        <div class="invalid-feedback">Debe ingresar un correo válido.</div>
                      </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4">
                      <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistro">
                        <i class="fas fa-times me-2"></i> Cancelar
                      </button>
                      <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardar_cliente">
                        <i class="fas fa-save me-2"></i> Guardar
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      var accion = 0;
      var table_clientes = 0;

      $(document).ready(function() {
        cargarTableCliente();

        $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier evento
          fun_limpiar();
        });

        $('#tb_clientesC tbody').on('click', '.btnEditar', function() {
          accion = 2; //seteamos la accion para editar
          $("#mdlGestionarClientes").modal('show');
          $("#chkValidar").prop("checked", false);
          $('needs-validation').removeClass('was-validated');
          let data = table_clientes.row($(this).parents('tr')).data();
          $("#IdCliente").val(data[1]);
          $("#iptNumeroDocumento").val(data[2]);
          $("#iptNombre").val(data[4]);
          $("#iptApellido").val(data[5]);
          $("#iptDireccion").val(data[6]);
          $("#iptTelefono").val(data[7]);
          $("#iptEmail").val(data[8]);
        });

        $('#tb_clientesC tbody').on('click', '.btnEliminar', function() {
          accion = 3; //seteamos la accion para editar
          let data = table_clientes.row($(this).parents('tr')).data();
          let id_cliente = data[1];
          console.log("id:", id_cliente);
          Swal.fire({
            title: 'Está seguro de eliminar el Clientes?',
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
              datos.append("IdCliente", id_cliente); //codigo_producto               
              $.ajax({
                url: "ajax/clientes.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  mostrarAlertaRespuesta(respuesta, () => {
                    table_clientes.ajax.reload();
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

      }); /** fin document ready */

    
document.getElementById("btnGuardar_cliente").addEventListener("click", function () {
  const btnGuardarCliente = this;
  btnGuardarCliente.disabled = true; // 🔒 Desactivar para evitar múltiples clics

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
    }).then(() => {
      btnGuardarCliente.disabled = false; // 🔓 Reactivar si hubo error de validación
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
    }).then(() => {
      btnGuardarCliente.disabled = false; // 🔓 Reactivar si hay campos incompletos
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
    if (!result.isConfirmed) {
      btnGuardarCliente.disabled = false; // 🔓 Reactivar si cancela
      return;
    }

    const datos = new FormData();
    datos.append("accion", accion);
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
      success: function (respuesta) {
        mostrarAlertaRespuesta(respuesta, function () {
          table_clientes.ajax.reload();
          fun_limpiar();
          $("#mdlGestionarClientes").modal('hide');
          btnGuardarCliente.disabled = false; // 🔓 Reactivar luego del éxito
        }, {
          mensajeExito: "éxito",
          mensajeAdvertencia: "Warning",
          mensajeError: "Excepción"
        });
         btnGuardarCliente.disabled = false; // 🔓 Reactivar luego del éxito
      },
      error: function () {
        manejarErrorAjax();
        btnGuardarCliente.disabled = false; // 🔓 Reactivar si hay error AJAX
      }
    });
  });
});

      function cargarTableCliente() {
        table_clientes = $("#tb_clientesC").DataTable({
          dom: 'Bfrtip', //botoneras en la parte superios
          buttons: [{
              text: 'Agregar Clientes',
              className: 'addNewRecord',
              action: function(e, dt, node, config) {
                $("#mdlGestionarClientes").modal('show');

                fun_limpiar()
                accion = 2; //registrar
                $("#chkValidar").prop("checked", false);
              }
            },
            'excel', 'print', 'pageLength'
          ],
          //   pageLength: [5, 10, 15, 30, 50, 100],
          //   pageLength: 10,
          ajax: {
            url: "ajax/clientes.ajax.php",
            dataSrc: '', // Que la data que retorne  no queremos 
            type: "POST",
            data: {
              'accion': 1
            }, //1: LISTAR PRODUCTOS

          },
          responsive: {
            details: {
              type: 'column'
            }
          },
          columnDefs: [{
              targets: 0, // idice cero donde se encuentra la columna
              orderable: false, // es columan tenga ordenamiento
              className: 'control' // aparescar  un boton 
            }, {targets: 1, visible: false}, { targets: 4, visible: false },
            { targets: 5,visible: false}, { targets: 8,visible: false},
            {
              "targets": 11,
              "sortable": false,
              "className": "text-center",
              "render": function(data, type, full, meta) {
                return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';

              }
            },
            {
              targets: 12,
              orderable: false, // no ordenar
              render: function(data, type, full, meta) {
                return `
                          <center>
                           <div class="dropdown text-center">
                               <button class="btn-acciones dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
                                   Acciones <i class="fas fa-caret-down ms-2"></i>
                           </button>
                     <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
                               <li>
                           <a class="dropdown-item btnEditar" href="#" data-id="${full.id_cliente}" title="Editar" style="cursor:pointer;">
                             <i class="fas fa-edit me-2"></i> Editar
                               </a>
                           </li>
                           <li>
                            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_cliente}" title="Eliminar" style="cursor:pointer;">
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

      function fun_limpiar() {
        $("#IdCliente").val("0");
        $("#iptNumeroDocumento").val("");
        $("#iptDireccion").val("");
        $("#iptNombre").val("");
        $("#iptApellido").val("");
        
        $("#iptTelefono").val("");
        $("#iptEmail").val("");
        $(".needs-validation").removeClass("was-validated");
      };

      document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
      });

      document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
      });
    </script>