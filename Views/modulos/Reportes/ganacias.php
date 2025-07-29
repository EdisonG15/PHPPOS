<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">                
                        <h3 class="card-title"><i class="fas fa-list"></i> Historial Producto </h3>
                        <div class="card-tools">                           
                        </div> 
                    </div> 
                     <div class="card-body">
                                   <div class="row mb-4">       
            <div class="col-md-3">
              <label for="rangoFechaGanacias" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFechaGanacias" placeholder="Buscar por Fecha " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarGancias"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>
                         <div class="row">
        <div class="col-lg-2">
                 <!-- small box -->
                     <div class="inner">
                         <h4 id="total_compras">$./ 0,00.00</h4>

                         <p>TotaL Compras Vendidas</p>
                     </div>
             </div>
        <div class="col-lg-2">
                 <!-- small box -->
                     <div class="inner">
                         <h4 id="total_Ventas">$./ 0,000.00</h4>
                         <p>Total Ventas</p>
                     </div>
             </div>
             <!-- TARJETA TOTAL GANANCIAS -->
             <div class="col-lg-2">
                 <!-- small box -->
                     <div class="inner">
                         <h4 id="total_Ganancias">$./ 00.00</h4>
                         <p>Total Ganancias</p>
                     </div>      
             </div>
             </div>
                                    <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_reporte_ganacias" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>Codigo Barra</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad Vendida</th>
                                    <th>Precio Venta Prom</th>
                                    <th>Costo Unitario Prom</th>
                                    <th>Ganancia Unitaria Prom</th>
                                    <th>Total Ventas</th>
                                    <th>Total Compras</th>
                                    <th>Total Ganancia</th>                                 
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

flatpickr("#rangoFechaGanacias", {
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
    function formatDate(date) {
        if (!date) return null;
        const d = new Date(date);
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    const fechaInicioHoy = new Date();
    const fechaFinHoy = new Date();
    cargarTableGanacias(formatDate(fechaInicioHoy), formatDate(fechaFinHoy));

    $(document).on('click', '#btnBuscarGancias', function() {
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
            if ($.fn.DataTable.isDataTable('#tb_reporte_ganacias')) {
                $('#tb_reporte_ganacias').DataTable().clear().draw();
            }
        }
    });

});

function cargarTableGanacias(fechaDesde, fechaHasta) {
    const tabla = $('#tb_reporte_ganacias');
    if ($.fn.DataTable.isDataTable(tabla)) {
        tabla.DataTable().clear().destroy();
    }

    table_ganacia = $("#tb_reporte_ganacias").DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdfHtml5',
         
              text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger',
            title: 'Reporte de Ganancias',
            orientation: 'landscape', // vertical portrait
            pageSize: 'A4',
            exportOptions: {
             
                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
            },
            customize: function(doc) {
                // Calcular los totales de los datos actuales de la tabla (después de filtros/paginación)
                let totalVentasExport = 0;
                let totalComprasExport = 0;
                let totalGananciaExport = 0;

                table_ganacia.rows({
                    filter: 'applied'
                }).every(function() {
                    let data = this.data();
                    totalVentasExport += parseFloat(data.total_ventas || 0);
                    totalComprasExport += parseFloat(data.total_compras || 0);
                    totalGananciaExport += parseFloat(data.total_ganancia || 0);
                });
                
                // Determinar el número de columnas que se están exportando al PDF
                // Esto es crucial para que los anchos y el cuerpo de la tabla de resumen coincidan
                const numExportedColumns = doc.content[1].table.body[0].length;

                // Crear un array de celdas vacías para las primeras columnas
                // Queremos que los totales se alineen debajo de las últimas 3 columnas (Total Ventas, Total Compras, Total Ganancia).
                // Si tienes 9 columnas exportadas, necesitas (9 - 3) = 6 celdas vacías.
                const emptyCellsBeforeTotals = Array(numExportedColumns - 3).fill('');

                // Añadir un espacio antes del resumen
                doc.content.push({
                    text: '',
                    margin: [0, 10, 0, 0]
                });

                // Añadir la fila de resumen como una nueva tabla para un mejor control
                doc.content.push({
                    table: {
                        headerRows: 0, // Sin encabezado para esta tabla de resumen
                        // Definir los anchos para la tabla de resumen. DEBEN coincidir con numExportedColumns.
                        // Son 9 columnas. Ajusta los '*' y 'auto' según cómo quieras que se vean.
                        widths: ['*', '*', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'], // 9 elementos
                        body: [
                            // Fila para las etiquetas de los totales
                            [
                                ...emptyCellsBeforeTotals, // Celdas vacías para las primeras columnas
                                {
                                    text: 'Total Ventas:',
                                    alignment: 'right',
                                    bold: true
                                }, {
                                    text: 'Total Compras:',
                                    alignment: 'right',
                                    bold: true
                                }, {
                                    text: 'Total Ganancias:',
                                    alignment: 'right',
                                    bold: true
                                }
                            ],
                            // Fila para los valores de los totales
                            [
                                ...emptyCellsBeforeTotals, // Celdas vacías para las primeras columnas
                                {
                                    text: '$ ' + totalVentasExport.toFixed(2),
                                    alignment: 'right',
                                    bold: true
                                }, {
                                    text: '$ ' + totalComprasExport.toFixed(2),
                                    alignment: 'right',
                                    bold: true
                                }, {
                                    text: '$ ' + totalGananciaExport.toFixed(2),
                                    alignment: 'right',
                                    bold: true
                                }
                            ]
                        ]
                    },
                    layout: 'noBorders' // Sin bordes para la tabla de resumen
                });
            }
        } ,{
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                     title: 'Reporte de Ganancias',
                      exportOptions: {
                    // ¡AQUÍ ESTÁ EL CAMBIO! Define las mismas columnas que para PDF.
                   columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
                },  'pageLength'],
        ajax: {
            url: "ajax/reporte.ajax.php",
            type: "POST",
            dataType: 'json',
            data: {
                'accion': 3,
                'fechaInicio': fechaDesde,
                'fechaFin': fechaHasta
            },
            dataSrc: function(respuesta) {
                let TotalVentaAdministar = 0.00;
                let TotalComprasAdministar = 0.00;
                let TotalGanaciaAdministar = 0.00;
                if (respuesta && Array.isArray(respuesta)) {
                    for (let i = 0; i < respuesta.length; i++) {
                        TotalGanaciaAdministar += parseFloat(respuesta[i].total_ganancia || 0);
                        TotalComprasAdministar += parseFloat(respuesta[i].total_compras || 0);
                        TotalVentaAdministar += parseFloat(respuesta[i].total_ventas || 0);
                    }
                }

                $("#total_Ganancias").html('$ ' + TotalGanaciaAdministar.toFixed(2));
                $("#total_Ventas").html('$ ' + TotalVentaAdministar.toFixed(2));
                $("#total_compras").html('$ ' + TotalComprasAdministar.toFixed(2));

                return respuesta;
            }
        },
        columns: [{
                data: 'vacio'
            }, // Columna vacía para responsive (índice 0)
            {
                data: 'codigo_barra'
            }, // índice 1
            {
                data: 'descripcion_producto'
            }, // índice 2
            {
                data: 'total_cantidad_vendida'
            }, // índice 3
            {
                data: 'precio_venta'
            }, // índice 4
            {
                data: 'costo_unitario'
            }, // índice 5
            {
                data: 'ganancia_unitaria'
            }, // índice 6
            {
                data: 'total_ventas'
            }, // índice 7
            {
                data: 'total_compras'
            }, // índice 8
            {
                data: 'total_ganancia'
            } // índice 9
        ],
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'control'
            },
          
            {
                targets: 3,
                className: "text-center"
            }
        ],
        order: [
            [1, 'desc']
        ], // ordena por código de barra
        lengthMenu: [5, 10, 15, 20, 50],
        pageLength: 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
}
</script>

_