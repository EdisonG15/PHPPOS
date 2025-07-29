<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">                
                        <h3 class="card-title"><i class="fas fa-list"></i>  Producto A vencer </h3>
                        <div class="card-tools">                           
                        </div> 
                    </div> 
                     <div class="card-body">
                                   <div class="row mb-4">       
            <div class="col-md-3">
              <label for="diasVencer" class="form-label">Dias A vencer:</label>
              <input type="text" class="form-control" id="diasVencer" placeholder="Ingrese el numemero de dias " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnProductoProximoAvencer"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>
                         
                                    <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_reporte_ProductoPorVencer" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>Id Producto</th>
                                    <th>Codigo Barra</th>
                                    <th>Descripcion</th>
                                    <th>Lote</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Dias Para Vencer</th>
                                    <th>Stock Disponible</th>
                                                                   
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
    $(document).ready(function() {

        // Carga inicial de la tabla con un valor por defecto (ej: productos a vencer en los próximos 15 días).
        cargarTablaProductosPorVencer(15);

        // Evento de clic para el botón de búsqueda (ID corregido).
        $(document).on('click', '#btnProductoProximoAvencer', function() {

            // Se obtiene el valor del campo de texto y se convierte a un número entero (ID corregido).
            const numeroDias = parseInt($("#diasVencer").val());

            // Se valida que el valor sea un número válido y mayor que cero.
            if (numeroDias && numeroDias > 0) {
                cargarTablaProductosPorVencer(numeroDias);
            } else {
                // Si la entrada no es válida, se muestra una alerta.
                Swal.fire({
                    icon: 'warning',
                    title: 'Entrada no válida',
                    text: 'Por favor, ingrese un número de días válido para buscar.',
                    confirmButtonText: 'Entendido'
                });

                // Opcional: Limpiar la tabla si la búsqueda no es válida.
                if ($.fn.DataTable.isDataTable('#tb_reporte_ProductoPorVencer')) {
                    $('#tb_reporte_ProductoPorVencer').DataTable().clear().draw();
                }
            }
        });
    });

    // Variable global para la tabla, para poder acceder a ella si es necesario.
    var tableProductoPorVencer;

    /**
     * Función para inicializar o recargar la DataTable con los productos próximos a vencer.
     * @param {number} diasVencer - El número de días para filtrar los productos.
     */
    function cargarTablaProductosPorVencer(diasVencer) {
        
        // Si la tabla ya existe, se destruye para poder re-inicializarla sin errores.
        if ($.fn.DataTable.isDataTable('#tb_reporte_ProductoPorVencer')) {
            $('#tb_reporte_ProductoPorVencer').DataTable().destroy();
        }

        tableProductoPorVencer = $("#tb_reporte_ProductoPorVencer").DataTable({
            dom: 'Bfrtip', // Habilita los botones en la parte superior.
            buttons: [{
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger',
                    title: 'Reporte de Productos Próximos dias a Vencer',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    exportOptions: {
                        // Se exportan las columnas visibles, ajusta los índices si es necesario.
                        // Columnas: 1 (ID Prod), 2 (Código), 3 (Desc), 5 (Fecha), 6 (Días), 7 (Stock)
                        columns: [1, 2, 3, 5, 6, 7]
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                     title: 'Reporte de Productos Próximos dias a Vencer',
                      exportOptions: {
                    // ¡AQUÍ ESTÁ EL CAMBIO! Define las mismas columnas que para PDF.
                    columns: [1, 2, 3, 5, 6, 7]
                }
                },
                'pageLength'
            ],
            ajax: {
                url: "ajax/reporte.ajax.php",
                type: "POST",
                data: {
                    'accion': 5,
                    'numeroDias': diasVencer // Se envía el parámetro a PHP.
                },
                dataSrc: '' // Necesario porque la respuesta de PHP no está anidada en un objeto.
            },
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'control'
            }],
            "order": [
                [6, 'asc'] // Se ordena por "Días Para Vencer" de forma ascendente (los más próximos primero).
            ],
            lengthMenu: [10, 20, 50, 100],
            "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    }
</script>