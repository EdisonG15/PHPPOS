<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> PRODUCTOS CON POCO STOCK   </h3>          
                        <div class="card-tools">
                        </div> 
                    </div>     
                     <div class="card-body">
                                     <div class="row">
                                     </div>
                                     <hr />
                                     <br>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_reporte_ganacias" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>codigo_barra</th>
                                    <th>Descripcion</th>
                                    <th class="text-center">Stock Actual</th>
                                    <th>Minimo Stock Producto</th>
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
    var accion;
    var table_ganacia;
    $(document).ready(function() {

        table_ganacia = $("#tb_reporte_ganacias").DataTable({
            dom: 'Bfrtip', // botoneras en la parte superior
            buttons: [
                {
                    // Configuración del botón de PDF
                    extend: 'pdfHtml5',
                     text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger', // Texto que se mostrará en el botón
                    title: 'Reporte de Ganancias', // Título para el documento PDF
                    orientation: 'portrait', // Orientación del PDF (portrait o landscape)
                    pageSize: 'A4', // Tamaño de la página (A4, Letter, etc.)
                    exportOptions: {
                        // Define qué columnas quieres exportar.
                        // Ajusta los índices según las columnas visibles en tu tabla de ganancias.
                        // Por ejemplo, si tienes 4 columnas visibles (sin contar la de control):
                        columns: [1, 2, 3, 4] // Asumiendo que las columnas 1, 2, 3, y 4 son las que quieres exportar
                    },
                    customize: function(doc) {
                        // Opcional: Puedes personalizar el documento PDF aquí
                        // Por ejemplo, añadir un pie de página o cambiar estilos.
                        // Si necesitas un total como en el otro reporte, tendrías que calcularlo
                        // de forma similar aquí y añadirlo al 'doc.content'.
                    }
                },
                 {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                      title: 'Reporte de Ganancias',
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
                    'accion': 1
                }, // 1: LISTAR PRODUCTOS
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
    })
</script>