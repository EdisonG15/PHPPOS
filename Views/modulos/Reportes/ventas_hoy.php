
<br>
<!-- Main content  los cuadors de ayuda de busqueda-->
<div class="content">
    <div class="container-fluid">
      <!-- row para criterios de busqueda -->
        <div class="row">

            <div class="col-lg-12">

                <div class="card card-dark">
                    <div class="card-header">
                        
                        <h3 class="card-title"><i class="fas fa-list"></i> Listado de Ventas del Dia de Hoy </h3>
                        <div class="card-tools">
                            
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                        
                     <div class="card-body">

                                     <div class="row">


                                     <div class="col-lg-2">
                 <!-- small box -->
                
                     <div class="inner">
                         <h4 id="total_ventas_hoy">$./ 00.00</h4>

                         <p>Total Ventas Hoy </p>
                     </div>
             </div>
                                     </div>
                                     <hr />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tb_reporte_ventas_hoy" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                            <thead class="bg-dark ">
                                <tr>       
                            <th>Nro Boleta</th>
                            <th>Codigo Barras</th>
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total Venta</th>
                            <th>Fecha Venta</th>      
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
    $(document).ready(function() {
        let groupColumn = 0;
        let table_ventas_hoy = $("#tb_reporte_ventas_hoy").DataTable({
            "columnDefs": [{
                    visible: false,
                    targets: groupColumn
                }, //groupColumn
                {
                    targets: [1, 2, 3, 4, 5],
                    orderable: false
                }
            ],
            "order": [
                [6, 'desc']
            ], // Assuming column 6 is a date/time or similar for ordering
            dom: 'Bfrtip',
            buttons: [
        
                {
                    // Start of PDF export button configuration
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger',
                    title: 'Reporte de Ventas del Día',
                    orientation: 'portrait', // Usually portrait for this type of report
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6] // Adjust these indices based on what you actually want to show
                    },
                    customize: function(doc) {
                        let totalVentaPDF = 0.00;
                        table_ventas_hoy.rows({
                            filter: 'applied'
                        }).every(function() {
                            let data = this.data(); // Get the row's data
                            totalVentaPDF += parseFloat(data[5].replace('$./ ', '') || 0);
                        });
                        const numExportedColumns = doc.content[1].table.body[0].length;
                        const emptyCellsCount = numExportedColumns - 1;
                        const emptyCells = Array(emptyCellsCount).fill('');

                        doc.content.push({
                            text: '',
                            margin: [0, 10, 0, 0]
                        });

                        // Add the total row to the PDF
                        doc.content.push({
                            table: {
                                headerRows: 0, // No header for this small table
                                widths: Array(numExportedColumns - 1).fill('*').concat(['auto']),
                                body: [
                                    [
                                        ...emptyCells, // Fill with empty cells
                                        {
                                            text: 'Total General de Ventas: $ ' + totalVentaPDF.toFixed(2),
                                            alignment: 'right',
                                            bold: true,
                                            // You can apply a background or different style if needed
                                            // fillColor: '#CCCCCC'
                                        }
                                    ]
                                ]
                            },
                            layout: 'noBorders' // No borders for the total row
                        });
                    }
                }, // End of PDF export button configuration
                 {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                      title: 'Reporte de Ventas del Día',
                      exportOptions: {
                    // ¡AQUÍ ESTÁ EL CAMBIO! Define las mismas columnas que para PDF.
                     columns: [1, 2, 3, 4, 5, 6]
                }
                },
                'pageLength'
            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/reporte.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc": function(respuesta) {
                    let TotalVentaAdministar = 0.00;
                    // Note: Your response data is an array of arrays, not objects, so use index [5]
                    for (let i = 0; i < respuesta.length; i++) {
                        // Ensure data[5] is treated as a string before replacing
                        TotalVentaAdministar += parseFloat(String(respuesta[i][5]).replace('$./ ', '') || 0);
                    }
                    let res = '$ ' + TotalVentaAdministar.toFixed(2);
                    $("#total_ventas_hoy").html(res);
                    return respuesta;
                },
                data: {
                    'accion': 4,
                }
            },
            drawCallback: function(settings) {
                let api = this.api();
                let rows = api.rows({
                    page: 'current'
                }).nodes();
                let last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        const data = group.split("-");
                        let nroBoleta = data[0];
                        nroBoleta = nroBoleta.split(":")[1].trim();

                        $(rows).eq(i).before(
                            '<tr class="group">' +
                            '<td colspan="6" class="fs-6 fw-bold fst-italic bg-light text-white"> ' +
                            group +
                            '</td>' +
                            '</tr>'
                        );

                        last = group;
                    }
                });
            },
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    })
</script>
