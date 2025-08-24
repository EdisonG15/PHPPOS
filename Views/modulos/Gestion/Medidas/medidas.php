<br>
    <!-- <link rel="stylesheet" href="css/medidas.css"> -->
    <link rel="stylesheet" href="/WebPuntoVenta2025/Views/util/css/form-styles.css">
    <script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
        
<style>
  .bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #0056b3); /* Un azul más vibrante que el primary por defecto */
  }
  /* Si tus botones "Acciones" tienen un estilo específico que desees replicar */
  .btn-acciones {
      background-color: #f8f9fa; /* o el color de fondo de tu elección */
      border: 1px solid #ced4da;
      color: #343a40;
      padding: 0.375rem 0.75rem;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: all 0.2s ease-in-out;
  }
  .btn-acciones:hover {
      background-color: #e2e6ea;
      border-color: #dae0e5;
  }
  </style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark   ">
                    <div class="card-header">      
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Medidas</h3>
                        <div class="card-tools">                           
                        </div> 
                    </div>           
                      <br>
                     <div class="card-body">
                <div class="row mt-3">
                    <div class="col-sm-12">
                  
                        <table id="tb_medidas"   class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Siglas</th>
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

<div class="modal fade" id="mdlGestionarMedidas" tabindex="-1" aria-labelledby="mdlGestionarMedidasLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content" >
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarMedidasLabel">
          <i class="fas fa-ruler-combined fa-lg"></i> Agregar Medidas
        </h5>
   
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body bg-light-subtle px-4 py-4">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body px-4 py-4">
            <form class="needs-validation" novalidate>
              <input type="hidden" id="idMedidas" name="medidas" value="0">

                 <div class="form-floating mb-4">
                <input type="text" class="form-control form-control-modern" id="txtNombreCorto"
                       name="txtNombreCorto" maxlength="20" minlength="1" placeholder="Ej. Und"
                       required autocomplete="off">
                <label for="txtNombreCorto">Codigo <span class="text-danger"></span></label>
                <div class="invalid-feedback">Debe ingresar el Codigo.</div>
              </div>

              <div class="form-floating mb-4">
                <input type="text" class="form-control form-control-modern" id="txtMedidas"
                       name="txtMedidas" maxlength="50" minlength="2" placeholder="Ej. Unidad"
                       required autocomplete="off">
                <label for="txtMedidas">Medidas <span class="text-danger"></span></label>
                <div class="invalid-feedback">Debe ingresar el nombre de la Medida.</div>
              </div>

           

              <div class="form-floating mb-5">
                <select name="estado" id="ddlEstado" class="form-select form-control-modern">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
                <label for="ddlEstado">Estado <span class="text-danger"></span></label>
              </div>

              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistro">
                  <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardar">
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
    var table_medidas; 

 $(document).ready(function() {
    cargarTableMedidas();

 
 $('#tb_medidas tbody').on('click', '.btnEditar', function() {
        $("#mdlGestionarMedidas").modal('show');
        $(".needs-validation").removeClass("was-validated");
        
        // Cambiar el título del modal
    $("#mdlGestionarMedidasLabel").html('<i class="fas fa-layer-group fa-lg"></i> Actualizar Medida');

        accion = 2; //registrar
        let  data = table_medidas.row($(this).parents('tr')).data();
            $("#idMedidas").val(data[1]);
            $("#txtMedidas").val(data[2]);
            $("#txtNombreCorto").val(data[3]);
            $("#ddlEstado").val(data[6]);   
 });

 $('#tb_medidas tbody').on('click', '.btnEliminar', function() {
        accion = 3; //seteamos la accion para editar
        let data = table_medidas.row($(this).parents('tr')).data();
        let idMedida = data[1];
        Swal.fire({
            title: 'Está seguro de eliminar la Medida?',
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
                datos.append("idMedidas", idMedida); //codigo_producto
                $.ajax({
                    url: "ajax/medidas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        mostrarAlertaRespuesta(respuesta, () => {
                       table_medidas.ajax.reload();
                    
                  
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
 });

 $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() { //  cuandi de active cualquier event  
      Limpiar();
 });

}); 


 function  cargarTableMedidas(){
    table_medidas = $("#tb_medidas").DataTable({      
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [{
                text: 'Agregar Medidas',
                 className: 'addNewRecord',
                  action: function(e, dt, node, config) {
                    $("#mdlGestionarMedidas").modal('show');
                     $("#mdlGestionarMedidasLabel").html('<i class="fas fa-layer-group fa-lg"></i> Agregar Medida');

                        Limpiar();
                     accion = 2; //registrar
                    
                  }
              },                
                {
    extend: 'excel',
    exportOptions: {
      columns: [2,3,4,6] // aquí defines las columnas que sí exportarás
    }
  },
   {
  extend: 'pdfHtml5',
  orientation: 'portrait', // vertical
  pageSize: 'A4',
  exportOptions: {
    columns: [2, 3, 4, 6]
  },
  customize: function (doc) {
    // 🔹 Centramos la tabla en toda la hoja
    doc.content[1].table.widths = 
      Array(doc.content[1].table.body[0].length).fill('*');
    
    // 🔹 Ajustamos alineación de tabla
    doc.content[1].margin = [10, 0, 10, 0]; // margen izq,top,der,abajo
  }
},

  {
    extend: 'print',
    exportOptions: {
      columns: [2,3,4,6] // lo mismo para imprimir
    }
  },
  'pageLength'
                ],
              pageLength: [5, 10, 15, 30, 50, 100],
              pageLength: 5,

        ajax: {
            
                url: "ajax/medidas.ajax.php",
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
                            "targets": 6,
                            "sortable": false,
                            "className": "text-center",
                            "render": function (data, type, full, meta){
                               return data === '1' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                                     
                            }
                        },
                
                    {
                        targets: 7,
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
                           <a class="dropdown-item btnEditar" href="#" data-id="${full.id_medida}" title="Editar" style="cursor:pointer;">
                             <i class="fas fa-edit me-2"></i> Editar
                               </a>
                           </li>
                           <li>
                            <a class="dropdown-item btnEliminar" href="#" data-id="${full.id_medida}" title="Eliminar" style="cursor:pointer;">
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
 };

 document.getElementById("btnGuardar").addEventListener("click", function () {
    const forms = document.getElementsByClassName('needs-validation');
    txtMedidas.value = txtMedidas.value.trim().toUpperCase();
    txtNombreCorto.value = txtNombreCorto.value.trim().toUpperCase();

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
            title: '¿Está seguro de registrar la Medida?',
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
            datos.append("idMedidas", $("#idMedidas").val());
            datos.append("nombre", $("#txtMedidas").val());
            datos.append("nombrecorto", $("#txtNombreCorto").val()); 

            $.ajax({
                url: "ajax/medidas.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (respuesta) {
                  
                      mostrarAlertaRespuesta(respuesta, function () {
                      table_medidas.ajax.reload();
                      Limpiar();
                      $("#mdlGestionarMedidas").modal('hide');
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

 document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
         $(".needs-validation").removeClass("was-validated");
 });

 document.getElementById("btnCerrarModal").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
 });
 function Limpiar() {
        $("#idMedidas").val("0");
        $("#txtMedidas").val("");
        $("#txtNombreCorto").val("");
        $("#ddlEstado").val([1]);
        $(".needs-validation").removeClass("was-validated");    
 };

