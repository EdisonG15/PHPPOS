<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Lote</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <label for="iptCodigoBarra" class="form-label">Producto:</label>
                                <input type="text" class="form-control" id="iptCodigoBarra" placeholder="Buscar por codigo barra" />
                            </div>
                            <div class="col-md-2">
                                <label for="selEstadoLote">Estado Lote</label>
                                <select class="form-select" id="selEstadoLote">
                                    <option value="-1" selected>Todo</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="selVisualizacionLote" class="form-label">Visualización de Lotes</label>
                                <select class="form-select" id="selVisualizacionLote">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="1">Agrupar por lote</option>
                                    <option value="2">Mostrar todos los lotes</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="rangoFecha" class="form-label">Fecha del Lote:</label>
                                <input type="text" class="form-control" id="rangoFecha" placeholder="Buscar por fecha " />
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button class="btn btn-outline-primary w-100" id="btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                            </div>


                        </div>

                        <div><br>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="tb_lote" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                                        <thead class="bg-dark ">
                                            <tr>
                                                <th></th>
                                                <th># Lote</th>
                                                <th>Codigo Barra</th>
                                                <th>Percedero</th>
                                                <th>Producto</th>
                                                <th>Cant. Comprada</th>
                                                <th>Bonificación</th>
                                                <th>Stock Disponible</th>
                                                <th>Costo Unitario</th>
                                                <th>Precio Total</th>
                                                <th>F. Compra</th>
                                                <th>F. Vencimiento</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
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

<script>
            var table_lote = 0;
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
                        longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ]
                    }
                },
                onReady: function(selectedDates, dateStr, instance) {
                    if (!instance.calendarContainer.querySelector(".flatpickr-custom-buttons")) {
                        const btnContainer = document.createElement("div");
                        btnContainer.className = "flatpickr-custom-buttons";

                        const btnCancelar = document.createElement("button");
                        btnCancelar.textContent = "Cancelar";
                        btnCancelar.className = "btn-cancelar";
                        btnCancelar.addEventListener("click", () => {
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
            $(document).ready(function() {
                cargarTableLote("", 1, "", "", "");

                $("#btnBuscar").on('click', function() {
                    console.log("estoy buscaddo")
                    let CodigoBarra = $("#iptCodigoBarra").val();
                    let EstadoLote = $("#selEstadoLote").val();
                    let VisualizacionLote = $("#selVisualizacionLote").val();
                    let tieneFechas = selectedRange.length === 2;
                    let fechaInicio = null;
                    let fechaFin = null;

                    if (tieneFechas) {
                        fechaInicio = formatDate(selectedRange[0]);
                        fechaFin = formatDate(selectedRange[1]);
                    }

                    cargarTableLote(CodigoBarra, EstadoLote, VisualizacionLote, fechaInicio, fechaFin);
                });
            });


            function cargarTableLote(CodigoBarra, EstadoLote, VisualizacionLote, fechaDesde, fechaHasta) {
                if ($.fn.DataTable.isDataTable("#tb_lote")) {
                    $("#tb_lote").DataTable().clear().destroy();
                }
                table_lote = $("#tb_lote").DataTable({
                    dom: 'Bfrtip', //botoneras en la parte superios
                    buttons: [

                        'excel', 'print', 'pageLength'
                    ],
                    //   pageLength: [5, 10, 15, 30, 50, 100],
                    //   pageLength: 10,
                    ajax: {
                        url: "ajax/lote_producto.ajax.php",
                        dataSrc: '', // Que la data que retorne  no queremos 
                        type: "POST",
                        data: {
                            'accion': 1,
                            'CodigoBarra': CodigoBarra,
                            'EstadoLote': EstadoLote,
                            'VisualizacionLote': VisualizacionLote,
                            'fechaDesde': fechaDesde,
                            'fechaHasta': fechaHasta
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
                        }, //{targets: 1,visible: false},{ targets: 6, visible: false },
                        {
                            "targets": 12,
                            "sortable": false,
                            "className": "text-center",
                            "render": function(data, type, full, meta) {
                                return data === 'Activo' ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
                            }
                        },

                         {
                    targets: 13,
                    visible: false
                }
                        // {
                        //     targets: 13,
                        //     orderable: false, // no ordenar
                        //     render: function(data, type, full, meta) {
                        //         return "<center>" + // px tamaño
                        //             "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>" +
                        //             "<i class='fas fa-pencil-alt fs-5'></i>" + //icono
                        //             "</span>" +
                        //             "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>" +
                        //             "<i class='fas fa-trash fs-5'></i>" +
                        //             "</span>" +
                        //             "</center>"
                        //     }
                        // }
                    ],
                    //  "order": [[ 0, 'desc' ]],
                    //         lengthMenu: [ 5, 10, 15, 20, 50],
                    //         "pageLength": 10,
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }
                });
            };

            
     // Función para formatear la fecha a 'YYYY-MM-DD' para el backend
  function formatDate(date) {
      const d = new Date(date);
      const month = '' + (d.getMonth() + 1).toString().padStart(2, '0');
      const day = '' + d.getDate().toString().padStart(2, '0');
      const year = d.getFullYear();
      //return [year, month, day].join('-');
       return `${year}-${month}-${day}`; 
  }

 </script>