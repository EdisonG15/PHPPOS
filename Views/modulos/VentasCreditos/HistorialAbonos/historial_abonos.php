
<br>
<!-- Main content  los cuadors de ayuda de busqueda-->
<div class="content">
    <div class="container-fluid">
      <!-- row para criterios de busqueda -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <!-- <h3 class="card-title">Lista Abonos </h3> -->
                        <h3 class="card-title"><i class="fas fa-list"></i> Lista Abonos </h3>
                        <div class="card-tools">                          
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->                       
                     <div class="card-body">
                                     <div class="row">                                                        
                 <div class="row align-items-end">
                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <label for="txtFechaInicio" class="col-form-label col-form-label-sm">Fecha Inicio:</label>
                            <input type="date" class="form-control form-control-sm model" id="txtFechaInicio" name="FechaInicio" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <label for="txtFechaFin" class="col-form-label col-form-label-sm">Fecha Fin:</label>
                            <input type="date" class="form-control form-control-sm model" id="txtFechaFin" name="FechaFin" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group mb-0">
                            <button id="btnBuscar_historial_abono_ventas" type="button" class="btn btn-sm btn-info btn-block" ><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                                     </div>
                                     <hr />
                                     <br>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table id="tbl_credito_historial_abono" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                        <thead class="bg-dark ">
                                <tr>
                                    <th></th>
                                    <th>Usuario</th>
                                    <th>Caja</th>
                                    <th>Cliente Tef.</th>
                                    <th>Monto</th>
                                    <!-- <th>Nro Credito</th> -->
                                    <th>Fecha Abono</th>                                                       
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
  var groupColumn = 0; 
  var table_historial_abono_ventas; 
  var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {

        table_historial_abono_ventas = $("#tbl_credito_historial_abono").DataTable({

            "columnDefs": [
                { visible: false, targets: groupColumn },//groupColumn
                {
                    targets: [1,2,3,4,5],
                    orderable: false
                }
            ],
            "order": [[ 1, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'print', 'pageLength',

            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/historial_abonos.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc": "",
                data: {
                    'accion': 1
                    // 'fechaDesde': ventas_desde,
                    // 'fechaHasta' : ventas_hasta
                }                              
            },
            drawCallback: function (settings) {
                
                let api = this.api();
                let rows = api.rows( {page:'current'} ).nodes();
                let last=null;
    
                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {       
                    console.log("gtusp:,",group)         
                                    
                    if ( last !== group ) {

                        const data = group.split("-");
                        let nroBoleta = data[0];
                        nroBoleta = nroBoleta.split(":")[1].trim();                        
                        console.log("🚀 ~ file: administrar_ventas.php ~ line 134 ~ nroBoleta", nroBoleta)

                        $(rows).eq(i).before(
                            '<tr class="group">'+
                                '<td colspan="6" class="fs-6 fw-bold fst-italic bg-light text-white"> ' +
                                    /*
                                    '<i nroBoleta = ' + nroBoleta + ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;"></i> '+
                                    */
                                        group +  
                                '</td>'+
                            '</tr>'
                        );

                        last = group;
                    }
                } );
            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }

           
           });


    })


    
     $("#btnBuscar_historial_abono_ventas").on('click',function(){

            // table.clear().draw();
         console.log("ingresaaod al boton buscar")

         if($("#txtFechaInicio").val() == ''){
            ventas_desde = '2023-01-01';
         }else{
            ventas_desde = $("#txtFechaInicio").val();
         }

         if($("#txtFechaFin").val() == ''){
            ventas_hasta = '2023-12-01';
         }else{
            ventas_hasta = $("#txtFechaFin").val();
         }
       

        
        
          let id_cliente=0;
          console.log("ventas_desde:",ventas_desde);
          console.log("ventas_hasta:",ventas_hasta);

        //   ventas_desde = ventas_desde.substr(6,4) + '-' + ventas_desde.substr(3,2) + '-' + ventas_desde.substr(0,2) ;        
        //   console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
        //   ventas_hasta = ventas_hasta.substr(7,4) + '-' + ventas_hasta.substr(3,2) + '-' + ventas_hasta.substr(0,2) ;
        //   console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)

       
        table_historial_abono_ventas.destroy();
        table_historial_abono_ventas = $('#tbl_credito_historial_abono').DataTable({  
            "columnDefs": [
                { visible: false, targets: groupColumn },//groupColumn


                {
                    targets: [1,2,3,4,5],
                    orderable: false
                }
            ],
            "order": [[ 1, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'print', 'pageLength',

            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/historial_abonos.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc": "",
                data: {
                    'accion': 3,
                    'fechaDesde': ventas_desde,
                    'fechaHasta' : ventas_hasta,
                    'id_cliente' : id_cliente
                }                              
            },
            drawCallback: function (settings) {
                
                let api = this.api();
                let rows = api.rows( {page:'current'} ).nodes();
                let last=null;
    
                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {                
                                    
                    if ( last !== group ) {

                        const data = group.split("-");
                        let nroBoleta = data[0];
                        nroBoleta = nroBoleta.split(":")[1].trim();                        
                        console.log("🚀 ~ file: administrar_ventas.php ~ line 134 ~ nroBoleta", nroBoleta)

                        $(rows).eq(i).before(
                            '<tr class="group">'+
                                '<td colspan="6" class="fs-6 fw-bold fst-italic bg-light text-white"> ' +
                                /*
                                    '<i nroBoleta = ' + nroBoleta + ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;"></i> '+
                                    */
                                        group +  
                                '</td>'+
                            '</tr>'
                        );

                        last = group;
                    }
                } );
            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
        
        })



</script>


