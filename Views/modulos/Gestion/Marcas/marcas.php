<link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
 <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>

<div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">    
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Marca </h3>
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
                        <table id="tb_marca"  class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Nombre</th>
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

<div class="modal fade" id="mdlGestionarMarca" tabindex="-1" aria-labelledby="mdlGestionarMarcaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">

            <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
                <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarCategoriasLabel">
    <i class="fas fa-layer-group fa-lg"></i> Agregar Marca
</h5>

                <button type="button" class="btn-close btn-close-white" id="btnCerrarModal" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body px-4 py-4 bg-light-subtle">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body px-4 py-4">
                        <form class="needs-validation" novalidate>
                            <input type="hidden" id="idMarca" name="marca" value="">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-modern" id="txtMarca"
                                    name="txtMarca" maxlength="50" minlength="3" placeholder="Ej. Dell"
                                    required autocomplete="off">
                                <label for="txtMarca">Categoría <span class="text-danger"></span></label>
                                <div class="invalid-feedback">Debe ingresar el nombre de la Marca.</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistroMarca">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardarMarca">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var accion;
    var table;
 
    $(document).ready(function() {
       cargarTableMarca();
     
        // hablilitar el modal 
        $("#nuevo").on('click', function() {
            $("#mdlGestionarCategoriasLabel").html('<i class="fas fa-layer-group fa-lg"></i> Agregar Marca');
            $("#mdlGestionarMarca").modal('show');
            accion = 2; //registrar

        })


      
        $('#tb_marca tbody').on('click', '.btnEditar', function() {
    // Mostrar modal
    $("#mdlGestionarMarca").modal('show');
    
    // Cambiar el título del modal
    $("#mdlGestionarCategoriasLabel").html('<i class="fas fa-layer-group fa-lg"></i> Actualizar Marca');

    // Acción actualizar
    accion = 2;

    // Obtener datos de la fila
    var data = table.row($(this).parents('tr')).data();
    $("#idMarca").val(data[1]);
    $("#txtMarca").val(data[2]);
    $("#ddlEstado").val(data[5]);
});


        $("#btnCancelarRegistroMarca, #btnCerrarModal").on('click', function() {
            Limpiar();

        })

        $('#tb_marca tbody').on('click', '.btnEliminar', function() {
            var data = table.row($(this).parents('tr')).data();
            var codigo_producto = data[1];
            Swal.fire({
                title: 'Está seguro de eliminar el Marca?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var datos = new FormData();
                    datos.append("accion", 3);
                    datos.append("Idmarca", codigo_producto); //codigo_producto
                    datos.append("estado", 2); //codigo_producto
                    $.ajax({
                        url: "ajax/marca.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            mostrarAlertaRespuesta(respuesta, () => {
                                table.ajax.reload();
                                Limpiar();
                            }, {
                                mensajeExito: 'eliminada con éxito',
                                mensajeAdvertencia: 'Warning',
                                mensajeError: 'error'
                            });
                        },
                        error: manejarErrorAjax

                    });
                }
            })
        })
    })

    document.getElementById("btnGuardarMarca").addEventListener("click", function() {
        const forms = document.getElementsByClassName('needs-validation');
           const idMarca = $("#idMarca").val() || "0";
        Array.from(forms).forEach((form) => {
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                Swal.fire({
                    icon: 'info',
                    title: 'Por favor complete todos los campos obligatorios'
                });
                return;
            }
            // Confirmación con SweetAlert
            Swal.fire({
                title: 'Está seguro de registrar el Marca?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, deseo registrarla',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (!result.isConfirmed) return;
                const datos = new FormData();
                datos.append("accion", accion); // asegúrate de que `accion` esté definido en el contexto
                datos.append("Idmarca", idMarca);
                datos.append("nombre", $("#txtMarca").val());
                $.ajax({
                    url: "ajax/marca.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        mostrarAlertaRespuesta(respuesta, function() {
                            table.ajax.reload();
                            Limpiar();
                            $("#mdlGestionarMarca").modal('hide');
                        }, {
                            mensajeExito: "éxito",
                            mensajeAdvertencia: "Warning",
                            mensajeError: "Excepción"
                        });
                    },
                    error: manejarErrorAjax
                });
            });

            form.classList.add('was-validated');
        });

    });

    // Limpirar el impurn de la validacion
    document.getElementById("btnCancelarRegistroMarca").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })
    document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })

    function Limpiar() {
        $("#idMarca").val("");
        $("#txtMarca").val("");
        $("#ddlEstado").val([1]);
        $(".needs-validation").removeClass("was-validated");
    }

    function cargarTableMarca(){

        table = $("#tb_marca").DataTable({           
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                {

                text: 'Agregar Marca',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                   $("#mdlGestionarMarca").modal('show');
                Limpiar();
                     accion = 2; //registrar
               
                  }
              },
                                
                    'excel','pdf', 'print', 'pageLength'
                ],
              pageLength: [5, 10, 15, 30, 50, 100],
              pageLength: 5,

        ajax: {
            
                url: "ajax/marca.ajax.php",
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
                     {targets: 1,visible: false},
                    {
                            "targets": 5,
                            "sortable": false,
                             "className": "text-center",
                            "render": function (data, type, full, meta){
                              return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                                
                            }
                        },
                
                    {
                        targets: 6,
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
                           <a class="dropdown-item btnEditar" href="#" data-id="${full.id_categoria}" title="Editar" style="cursor:pointer;">
                             <i class="fas fa-edit me-2"></i> Editar
                               </a>
                           </li>
                           <li>
                            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_categoria}" title="Eliminar" style="cursor:pointer;">
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
            "order": [[ 0, 'desc' ]],
                lengthMenu: [ 5, 10, 15, 20, 50],
                "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
    });
    }
</script>