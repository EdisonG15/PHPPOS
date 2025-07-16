<!-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Mantenedor</a></li>
        <li class="breadcrumb-item active" aria-current="page">Medidas</li>
    </ol>
</nav> -->

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

<!-- 
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-sm btn-success" id="nuevo_categorias"><i class="fa fa-plus" aria-hidden="true"></i>  Agregar Nuevo</button>
                    </div> -->


                                     <!-- para ingresar contenidos -->


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
              
                </div> <!-- ./ end card-body -->
            </div>

        </div>

        
    
    
    </div>


</div>


<script>
    var accion;  
 
    // var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top',
    //     showConfirmButton: false,
    //     timer: 3000
    // });

    $(document).ready(function() {

        let groupColumn = 0;

        let table_ventas_hoy = $("#tb_reporte_ventas_hoy").DataTable({
        
            "columnDefs": [
                { visible: false, targets: groupColumn },//groupColumn


                {
                    targets: [1,2,3,4,5],
                    orderable: false
                }
            ],
            "order": [[ 6, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'print', 'pageLength',

            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/reporte.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc": function (respuesta){

                    console.log("lo que trae : ",respuesta)
                   let TotalVentaAdministar = 0.00;
                
                    for (let i = 0; i < respuesta.length; i++) {
                        // console.log("d",i);

                        TotalVentaAdministar = parseFloat(respuesta[i][5].replace('$./ ', '')) + parseFloat(TotalVentaAdministar) ;
                        // // TotalVentaAdministar = parseFloat(respuesta[i][5]) + parseFloat(TotalVentaAdministar) ;
                        // console.log("total:",TotalVentaAdministar);
                    }
                    let res=  '$ ' +TotalVentaAdministar.toFixed(2);
                    $("#total_ventas_hoy").html(res);
                    return  respuesta;
                },
                data: {
                    'accion': 4,
                    // 'fechaDesde': ventas_desde,
                    // 'fechaHasta' : ventas_hasta
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
                        console.log("🚀 *****************************", nroBoleta)
                        nroBoleta = nroBoleta.split(":")[1].trim();                        
    

                        $(rows).eq(i).before(
                            '<tr class="group">'+
                                '<td colspan="6" class="fs-6 fw-bold fst-italic bg-light    text-white"> ' +
                                    // '<i nroBoleta = ' + nroBoleta + ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;"></i>  '+
                                        group +  
                                '</td>'+
                            '</tr>'
                        );

                        last = group;
                    }
                } );
            },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
   });

         






  



})


    </script>

