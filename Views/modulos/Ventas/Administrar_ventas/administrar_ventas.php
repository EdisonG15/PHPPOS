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
                    <div class="card-header">    
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Venta </h3>
                        <div class="card-tools">                  
                        </div> 
                    </div>      
                    <br>
                     <div class="card-body">
                
                      <!-- <input type="text" id="rangoFecha" placeholder="Selecciona rango de fecha" /> -->

                
<div class="row mb-4">
       
            <div class="col-md-3">
              <label for="rangoFecha" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFecha" placeholder="Buscar por Fecha " autocomplete="off" />
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
                        <table id="tb_venta"  class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>Id Venta</th>
                                    <th>Nro Boleta</th>
                                    <th>Tipo Pago</th>
                                    <th>Tipo Documento</th>
                                    <th>Iva</th>
                                    <th>Sub Total</th>
                                    <th>Total Venta</th>
                                    <th>Usuario</th>
                                    <th>Fecha Venta</th>
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
     
    var table_ventas;
    var selectedRange = [];

  flatpickr("#rangoFecha", {
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
             // 1. Define la función para formatear fechas
    function formatDate(date) {
        const d = new Date(date);
        // El método .toString() es opcional aquí, padStart funciona en números en JS moderno, pero es buena práctica.
        const month = (d.getMonth() + 1).toString().padStart(2, '0');
        const day = d.getDate().toString().padStart(2, '0');
        const year = d.getFullYear();
        return `${year}-${month}-${day}`;
    }

    // 2. Establece las fechas de inicio y fin
    const fechaInicio = new Date(); // Fecha de hoy
    const fechaFin = new Date();    // También hoy, pero la modificaremos
    
    // Aumenta un día a la fecha final
    fechaFin.setDate(fechaFin.getDate() + 1);

    // 3. Llama a la función con el rango de fechas correcto
    cargarTableVentas(formatDate(fechaInicio), formatDate(fechaFin));
    // También puedes establecer la fecha seleccionada en el input de flatpickr si quieres
    // document.querySelector("#rangoFecha").value = `${fechaHoy} a ${fechaHoy}`;

    
      $('#tb_venta').on('click', '.btnEliminar', function(e) {
            // e.preventDefault();
          const idEliminar = $(this).data('id');
  
           Swal.fire({
            title: 'Está seguro de eliminar la Venta?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append("accion", 2);
                datos.append("idEliminar", idEliminar); //codigo_producto
                $.ajax({
                    url: "ajax/administrar_ventas.ajax.php",
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
                            table_ventas.ajax.reload();
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


      $('#tb_venta').on('click', '.btnXML', function(e) {
            // e.preventDefault();
          const idVenta = $(this).data('id');
  
              $.ajax({
                  url: 'ajax/factura_ajax.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                       accion: 1,       // Esta es la acción que llama al método generarXMLFacturaSRI
                       id_venta: idVenta
                    },
                 success: function(response) {
                    console.log("respiuesta",response);
                     if (response.success) {
                      alert('XML generado correctamente.');
                    } else {
                       alert('Error: ' + (response.error || 'No se pudo generar el XML.'));
                    }
                },
                error: function(xhr, status, error) {
                  // console.error('Error en la solicitud AJAX:', error);
                }
             });
      });


  });

    function cargarTableVentas(fechaDesde, fechaHasta){
          if ($.fn.DataTable.isDataTable('#tb_venta')) {
             $('#tb_venta').DataTable().destroy();
          }

        table_ventas = $("#tb_venta").DataTable({           
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Agregar Categorias',
                className: 'addNewRecord',
                action: function(e, dt, node, config) {}
            },
            'excel', 'pdf', 'print', 'pageLength'
        ],
        pageLength: 5,
        ajax: {
            url: "ajax/administrar_ventas.ajax.php",
            type: "POST",
            dataSrc: '',
            data: {
                'accion': 1,
                'fechaDesde': fechaDesde,
                'fechaHasta': fechaHasta
            }
        },
        responsive: {
            details: { type: 'column' }
        },
        columnDefs: [
            { targets: 0, orderable: false, className: 'control' },
            { targets: 1, visible: false },
            { targets: 2, visible: false },
            // { targets: 3, visible: false },
            // { targets: 5, visible: false },
            // { targets: 6, visible: false },
            {
                targets: 10,
                sortable: false,
                render: function (data) {
                    return data == 1 ?
                        "<center><button class='btn btn-sm btnActivarAlm btn-success'><i class='fa fa-toggle-on'></i> ACTIVO</button></center>" :
                        "<center><button class='btn btn-sm btnActivarAlm btn-danger'><i class='fa fa-toggle-off'></i> INACTIVO</button></center>";
                }
            },
            {
                targets: 11,
                orderable: false,
                render: function (data, type, full, meta) {
                      return `
                            <div class="dropdown text-center">
        <button class="btn-acciones dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
          Acciones
          <i class="fas fa-caret-down ms-2"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
          <li>
            <a class="dropdown-item btnXML" href="#" data-id="${full.IdVenta}" style="cursor:pointer;">
              <i class="fas fa-pencil-alt"></i> XML
            </a>
          </li>
          <li>
            <a class="dropdown-item btnEliminar" href="#" data-id="${full.IdVenta}" style="cursor:pointer;">
              <i class="fas fa-trash-alt"></i> Borrar
            </a>
          </li>
        </ul>
      </div>
                      `;
                }
            }
        ],
        order: [[ 0, 'desc' ]],
        lengthMenu: [ 5, 10, 15, 20, 50 ],
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
      }

      if ( tieneFechas) {
        cargarTableVentas(fechaInicio, fechaFin);
      } else {
        alert("Por favor selecciona al menos un filtro (estado o rango de fechas).");
      }

 });
</script>
