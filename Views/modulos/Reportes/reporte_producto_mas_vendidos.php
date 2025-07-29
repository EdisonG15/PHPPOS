<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Producto Mas Vendidos </h3>
                        <div class="card-tools">
                        </div> 
                    </div> 
                     <div class="card-body">
                                <div class="row mb-4">       
            <div class="col-md-3">
              <label for="rangoFechaProductoMasVendido" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFechaProductoMasVendido" placeholder="Buscar por Fecha " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscProductoMasVendido"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>
                                     <div class="row">
                                     </div>
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_rp_productoMasVendido" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>codigo_barra</th>
                                    <th>Descripcion</th>
                                    <th class="text-center">Cantidad</th>
                                    <th>Total Venta</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                 </div>            
                </div> <!-- ./ end card-body -->
            </div>
        </div>    
    </div>
</div>
<script>
    var accion;
    var table_ganacia;
    var selectedRangerGanacias = [];

    flatpickr("#rangoFechaProductoMasVendido", {
        mode: "range",
        dateFormat: "Y-m-d",
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
                    e.preventDefault();
                    instance.clear();
                    instance.close();
                });
                btnContainer.appendChild(btnCancelar);
                instance.calendarContainer.appendChild(btnContainer);
            }
        },
        onChange: function(selectedDates) {
            selectedRangerGanacias = selectedDates;
        }
    });

    $(document).ready(function() {

        // Función de ayuda para formatear la fecha como YYYY-MM-DD
        function formatDate(date) {
            if (!date) return null;
            const d = new Date(date);
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const day = String(d.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Carga inicial al cargar la página (rango de fechas de hoy)
        const fechaInicioHoy = new Date();
        const fechaFinHoy = new Date();
        cargarTableGanacias(formatDate(fechaInicioHoy), formatDate(fechaFinHoy));

        $(document).on('click', '#btnBuscProductoMasVendido', function() {
            let fechaInicio = null;
            let fechaFin = null;

            if (selectedRangerGanacias.length === 2) {
                fechaInicio = formatDate(selectedRangerGanacias[0]);
                fechaFin = formatDate(selectedRangerGanacias[1]);
                cargarTableGanacias(fechaInicio, fechaFin);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Filtros requeridos',
                    text: 'Por favor selecciona un rango de fechas para buscar.',
                    confirmButtonText: 'Entendido'
                });
                // Opcional: Limpiar la tabla si no hay fechas seleccionadas
                if ($.fn.DataTable.isDataTable('#tb_rp_productoMasVendido')) {
                    $('#tb_rp_productoMasVendido').DataTable().clear().draw();
                }
            }
        });


    })

    function cargarTableGanacias(fechaDesde, fechaHasta) {
        console.log("fechaHasta", fechaHasta)
        console.log("fechaDesde", fechaDesde)
        const tabla = $('#tb_rp_productoMasVendido');
        if ($.fn.DataTable.isDataTable(tabla)) {
            tabla.DataTable().clear().destroy();
        }
        table_ganacia = $("#tb_rp_productoMasVendido").DataTable({

            dom: 'Bfrtip', // botoneras en la parte superior
            buttons: [
                {
                    // **AQUÍ SE AÑADE EL BOTÓN DE PDF**
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger',
                    title: 'Reporte de Productos Más Vendidos', // Título descriptivo para este reporte
                    orientation: 'portrait',
                    pageSize: 'A4',
                    exportOptions: {
                        // Asegúrate de ajustar estos índices a las columnas que quieres en el PDF
                        // 0 es 'control', así que usualmente empezamos de 1 para los datos
                        columns: [1, 2, 3, 4] // Ejemplo: Columna 1 (Nombre), 2 (Categoría), 3 (Cantidad), 4 (Total)
                    },
                    customize: function(doc) {
                        // Aquí puedes añadir personalizaciones adicionales al PDF si lo necesitas,
                        // como un total de ganancias o un resumen de fechas.
                        doc.content.splice(0, 0, {
                            text: 'Rango de Fechas: ' + fechaDesde + ' al ' + fechaHasta,
                            alignment: 'center',
                            margin: [0, 0, 0, 12]
                        });
                    }
                },
                 {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                     title: 'Reporte de Productos Más Vendidos',
                      exportOptions: {
                    // ¡AQUÍ ESTÁ EL CAMBIO! Define las mismas columnas que para PDF.
                   columns: [1, 2, 3, 4]
                }
                },
                
                'pageLength'
            ],
            ajax: {

                url: "ajax/reporte.ajax.php",
                dataSrc: '', // Que la data que retorne no queremos
                type: "POST",
                data: {
                    'accion': 2, // 2: ACCION PARA PRODUCTOS MAS VENDIDOS
                    'fechaInicio': fechaDesde,
                    'fechaFin': fechaHasta
                },
            },
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                    targets: 0, // indice cero donde se encuentra la columna
                    orderable: false, // es columan tenga ordenamiento
                    className: 'control' // aparescar un boton
                },


                {
                    targets: 3,
                    className: "text-center"
                },

                {
                    targets: 4,
                    className: "text-center"
                },
            ],
            "order": [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20, 50],
            "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

    }
</script>
