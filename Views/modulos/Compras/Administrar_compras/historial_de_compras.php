<?php
session_start();

?>
<br>
<style>
  .flatpickr-calendar.rangeMode .flatpickr-innerContainer {
    display: flex;
    gap: 20px;
  }

  .flatpickr-custom-buttons {
    display: flex;
    justify-content: space-between;
    padding: 8px 10px;
    border-top: 1px solid #ddd;
  }

  .flatpickr-custom-buttons button {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }

  .btn-aplicar {
    background-color: #28a745;
    color: white;
  }

  .btn-cancelar {
    background-color: #ccc;
    color: black;
  }

.btn-acciones {
  background: transparent;
  border: 1px solid #007bff;
  color: #007bff;
  padding: 6px 12px;
  border-radius: 6px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
  user-select: none;
}
.btn-acciones:hover, .btn-acciones:focus {
  background-color: #007bff;
  color: white;
}

/* La flechita tendrá algo de margen a la izquierda */
.btn-acciones i.fa-caret-down {
  margin-left: 6px;
}

/* Menú desplegable */
.dropdown-menu {
  border-radius: 10px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  min-width: 140px;
  padding: 6px 0;
  font-size: 14px;
  transition: background-color 0.3s ease, color 0.3s ease;
  user-select: none;
}

/* Las opciones tienen cursor pointer para el mouse */
.dropdown-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 8px 16px;
  color: #333;
  cursor: pointer;
  transition: background-color 0.25s ease, color 0.25s ease;
  user-select: none;
}

/* Hover suave con fondo más claro y texto blanco */
.dropdown-item:hover, .dropdown-item:focus {
  background-color: #3399ff; /* azul claro */
  color: white;
  text-decoration: none;
  outline: none;
}

</style>
<div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                  <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
    <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
                    <div class="card-header">    
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Compras </h3>
                        <div class="card-tools">                  
                        </div> 
                    </div>      
                    <br>
                     <div class="card-body">
<div class="row mb-4">
            <div class="col-md-3">
              <label for="rangoFechaCompras" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFechaCompras" placeholder="Buscar por Fecha " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarCompras"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>
                                     <div class="row">
                                     </div>
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_administrarCompras"  class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>Id Compras</th>
                                    <th># Boleta Compras</th>
                                    <th>Tipo Comprobamte</th>
                                    <th>Factura</th>
                                    <th>Proveedor</th>
                                    <th>Razon Social</th>
                                    <th>Usuario</th>
                                    <th>Sub Total</th>
                                    <th>Iva</th>
                                    <th>Total</th>
                                    <th>Fecha Compra</th>
                                    <th>Fecha Registro</th>
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

<script>

    var table_compras;
    var selectedRange = [];
  flatpickr("#rangoFechaCompras", {
        mode: "range",
        dateFormat: "d/m/Y",
        showMonths: 2,
        closeOnSelect: true,
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
            },
            months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            if (!instance.calendarContainer.querySelector(".flatpickr-custom-buttons")) {
                const btnContainer = document.createElement("div");
                btnContainer.className = "flatpickr-custom-buttons";
                const btnCancelar = document.createElement("button");
                btnCancelar.textContent = "Cancelar";
                btnCancelar.className = "btn-cancelar";
                btnCancelar.addEventListener("click", (e) => {
                    e.preventDefault(); // Evitar que el formulario se envíe
                    instance.clear();
                    instance.close();
                });

                btnContainer.appendChild(btnCancelar);
                instance.calendarContainer.appendChild(btnContainer);
            }
        },
        onChange: function(selectedDates) {
            selectedRange = selectedDates;
        }
    });

  $(document).ready(function(){
verificarSiExisteCajaAbierta();
    // 2. Establece las fechas de inicio y fin
    const fechaInicio = new Date(); // Fecha de hoy
    const fechaFin = new Date();    // También hoy, pero la modificaremos
    
    // Aumenta un día a la fecha final
    fechaFin.setDate(fechaFin.getDate() + 1);

    // 3. Llama a la función con el rango de fechas correcto
    cargarTableCompras(formatDate(fechaInicio), formatDate(fechaFin));
   
  $('#tb_administrarCompras').on('click', '.btnEliminarCompras', function(e) {
            // e.preventDefault();
          const idEliminar = $(this).data('id');
  
           Swal.fire({
            title: 'Está seguro de eliminar la Compra?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append("accion", 3);
                datos.append("idEliminar", idEliminar); //codigo_producto
                $.ajax({
                    url: "ajax/realizar_compras.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        if ((respuesta.includes("eliminada correctamente"))) {
                            Swal.fire({
                                icon: 'success',
                                title: '<strong>¡Operación exitosa!</strong>',
                                title: respuesta,
                                timer: 3000,
                                timerProgressBar: true,
                                background: '#f0f0f0',
                                color: '#333'
                            });
                            table_compras.ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '<strong>Error</strong>',
                                title: respuesta,
                                confirmButtonText: 'Cerrar'
                            });
                        }
                    }
                });
            }
        }) 
    });
    });

function cargarTableCompras(fechaDesde, fechaHasta) {
    if ($.fn.DataTable.isDataTable('#tb_administrarCompras')) {
        $('#tb_administrarCompras').DataTable().destroy();
    }

    table_compras = $("#tb_administrarCompras").DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Agregar Compra', // Texto más adecuado
                className: 'btn btn-primary addNewRecord', // Clases de Bootstrap para mejor estilo
                action: function(e, dt, node, config) {
                    // Aquí va la lógica para abrir tu modal o formulario de nueva compra
                      CargarContenido('Views/modulos/Compras/RealizarCompras/compras.php', 'content-wrapper');
                    // onclick="CargarContenido('Views/modulos/Compras/RealizarCompras/compras.php','content-wrapper')" 
                }
            },
                 {
    extend: 'excel',
    exportOptions: {
      columns: [2,4,5,8,9,10,11,13]  // ✅ solo estas columnas en horizontal
    }
  },
  {
    extend: 'pdfHtml5',
    orientation: 'landscape', // 👉 horizontal
    pageSize: 'A4',
    exportOptions: {
      columns: [2,4,5,8,9,10,11,13]
    }
  },
  {
    extend: 'print',
    exportOptions: {
      columns: [2,4,5,8,9,10,11,13]
    }
  },
  'pageLength'
        ],
        pageLength: 5,
        ajax: {
            url: "ajax/realizar_compras.ajax.php",
            type: "POST",
            dataSrc: '',
            data: {
                'accion': 2,
                'fechaDesde': fechaDesde,
                'fechaHasta': fechaHasta
            }
        },
        responsive: {
            details: { type: 'column' }
        },
        columnDefs: [
            { targets: 0, orderable: false, className: 'control' },
            { targets: [1, 2, 3, 5, 6], visible: false }, // Agrupamos columnas ocultas

            // =======================================================
            // ✨ COLUMNA DE ESTADO CON DISEÑO MEJORADO ✨
            // =======================================================
            {
                targets: 13,
                sortable: false,
                className: 'text-center', // Centramos usando la clase, no la etiqueta <center>
                render: function(data) {
                    // Usamos un operador ternario para un código más limpio y badges para el estilo
                    return data == 1
                        ? '<span class="badge rounded-pill bg-success"><i class="fas fa-check-circle me-1"></i> ACTIVO</span>'
                        : '<span class="badge rounded-pill bg-danger"><i class="fas fa-times-circle me-1"></i> INACTIVO</span>';
                }
            },
            {
                targets: 14,
                orderable: false,
                className: 'text-center',
                render: function(data, type, full, meta) {
    return `
        <button class="btn btn-outline-danger btn-sm btnEliminarCompras" data-id="${full.IdCompra}" title="Eliminar compra">
            <i class="fas fa-trash-alt me-1"></i> Eliminar
        </button>
    `;
}

            }
        ],
        order: [[ 0, 'desc' ]],
        lengthMenu: [5, 10, 15, 20, 50],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
}

$(document).on('click', '#btnBuscarCompras', function() {

  let tieneFechas = selectedRange.length === 2;
  let fechaInicio = null;
  let fechaFin = null;

  if (tieneFechas) {
    fechaInicio = formatDate(selectedRange[0]);
    fechaFin = formatDate(selectedRange[1]);
    cargarTableCompras(fechaInicio, fechaFin);
  } else {
    Swal.fire({
      icon: 'warning',
      title: 'Filtros requeridos',
      text: 'Por favor selecciona al menos un filtro (estado o rango de fechas).',
      confirmButtonText: 'Entendido'
    });
  }

});

    function formatDate(date) {
        const d = new Date(date);
        // El método .toString() es opcional aquí, padStart funciona en números en JS moderno, pero es buena práctica.
        const month = (d.getMonth() + 1).toString().padStart(2, '0');
        const day = d.getDate().toString().padStart(2, '0');
        const year = d.getFullYear();
        return `${year}-${month}-${day}`;
    }


function verificarSiExisteCajaAbierta() {
    let datos = new FormData();
    datos.append("opcion", 1);
    datos.append("txt_id_caja", $("#txtId_caja").val());
    datos.append("txt_id_usuario", $("#txtId_usuario").val());

    $.ajax({
        url: "ajax/validar.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (parseInt(respuesta['existe']) == 0) {
                // $("#btnRegistrarProveedor").prop('disabled', true);
                // $("#btnAgregarProducto").prop('disabled', true);
                // $("#btnIniciarComprasContado").prop('disabled', true);
                // $("#btnIniciarComprasCredit").prop('disabled', true);
                $(".btnEliminarCompras").prop("disabled", true);
                Swal.fire({
                    title: 'La caja se encuentra cerrada',
                    text: 'Todas las opciones están deshabilitadas. Por favor, abra la caja primero para habilitar las opciones.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Abrir Caja',
                    cancelButtonText: 'Cerrar',
                    reverseButtons: true,
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Carga la vista usando tu función interna
                        CargarContenido('Views/modulos/AdministrarCaja/MovimientoCaja/movimiento_cajas.php', 'content-wrapper');
                    }
                });
            }
        }
    });
}
</script>
