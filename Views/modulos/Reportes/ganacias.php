
<br>
<!-- Main content  los cuadors de ayuda de busqueda-->
<div class="content">

    <div class="container-fluid">


      <!-- row para criterios de busqueda -->
        <div class="row">

            <div class="col-lg-12">

                <div class="card card-dark">
                    <div class="card-header">                
                        <h3 class="card-title"><i class="fas fa-list"></i> Historial Producto </h3>
                        <div class="card-tools">
                            
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                     <div class="card-body">
                                     <div class="row">
                                     <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ventas_desde">Ventas desde:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="ventas_desde">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ventas_hasta">Ventas hasta:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="ventas_hasta">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><button class="btn btn-info" style="width:120px;" id="btnFiltrar_Ganacias">Buscar</button></div>
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
                                    <!-- <th class="text-center">Stock Actual</th> -->
                                    <th>Precio Venta</th>
                                    <th>Costo Unitario</th>
                                    <th>Ganancia Unitaria</th>
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
    // var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top',
    //     showConfirmButton: false,
    //     timer: 3000
    // });

    $(document).ready(function() {

        let table_ganacia, ventas_desde, ventas_hasta;
 

        $('#ventas_desde, #ventas_hasta').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

        $("#ventas_desde").val(moment().startOf('month').format('DD/MM/YYYY'));
        $("#ventas_hasta").val(moment().format('DD/MM/YYYY'));

        ventas_desde = $("#ventas_desde").val();
        ventas_hasta = $("#ventas_hasta").val();
        

        table_ganacia = $("#tb_reporte_ganacias").DataTable({
        
        dom: 'Bfrtip',  //botoneras en la parte superios
        buttons: [
                    
                'excel', 'print', 'pageLength'
            ],
        //   pageLength: [5, 10, 15, 30, 50, 100],
        //   pageLength: 5,

    ajax: {
        
            url: "ajax/reporte.ajax.php",
            dataSrc: '', // Que la data que retorne  no queremos 
            type: "POST",

            dataType: 'json',
                "dataSrc": function (respuesta){

                    console.log("lo que trae : ",respuesta)
                   let TotalVentaAdministar = 0.00;
                   let TotalComprasAdministar=0.00;
                   let TotalGanaciaAdministar=0.00;
                
                    for (let i = 0; i < respuesta.length; i++) {
                        // console.log("d",i);
                        TotalGanaciaAdministar = parseFloat(respuesta[i][9]) + parseFloat(TotalGanaciaAdministar) ;
                        TotalComprasAdministar = parseFloat(respuesta[i][8]) + parseFloat(TotalComprasAdministar) ;
                        TotalVentaAdministar = parseFloat(respuesta[i][7]) + parseFloat(TotalVentaAdministar) ;
                        // TotalVentaAdministar = parseFloat(respuesta[i][5].replace('$./ ', '')) + parseFloat(TotalVentaAdministar) ;
                        // // TotalVentaAdministar = parseFloat(respuesta[i][5]) + parseFloat(TotalVentaAdministar) ;
                        // console.log("total:",TotalVentaAdministar);
                    }
                    let resup= '$ '+TotalGanaciaAdministar.toFixed(2);
                 
                    $("#total_Ganancias").html(resup);

                    // $("#total_Ventas").html(TotalVentaAdministar.toFixed(2))
                    resup= '$ '+TotalVentaAdministar.toFixed(2);
                     $("#total_Ventas").html(resup);
                     resup= '$ '+TotalComprasAdministar.toFixed(2);
                    $("#total_compras").html(resup);
                    return  respuesta;
                },
            data: {'accion': 3,
                'fechaDesde': " ",
                'fechaHasta' : " "
            },//1: LISTAR PRODUCTOS
        
        },
        ///////////////////////////////////////////////////////////////////////
            responsive: {
            details: {
                    type: 'column'
                }
            },
            columnDefs: [
            {
                targets: 0,  // idice cero donde se encuentra la columna
                orderable: false, // es columan tenga ordenamiento
                className: 'control' // aparescar  un boton 
                },
               
                {
                    targets: 4,
                    visible: false
                 },
                 {
                    targets: 5,
                    visible: false
                 },
              
                 {
                    targets: 3,
                 
                    className: "text-center"
                 }, 

        ],
        "order": [[ 0, 'desc' ]],
            lengthMenu: [ 5, 10, 15, 20, 50],
            "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
   });


   $("#btnFiltrar_Ganacias").on('click',function(){

// table.clear().draw();
console.log("ingresaaod al boton buscar")

if($("#ventas_desde").val() == ''){
ventas_desde = '01-01-2025';
}else{
ventas_desde = $("#ventas_desde").val();
}

if($("#ventas_desde").val() == ''){
ventas_hasta = '04-12-2025';
}else{
ventas_hasta = $("#ventas_hasta").val();
}

 table_ganacia.destroy();

table_ganacia = $("#tb_reporte_ganacias").DataTable({
        
        dom: 'Bfrtip',  //botoneras en la parte superios
        buttons: [
                    
                'excel', 'print', 'pageLength'
            ],
        //   pageLength: [5, 10, 15, 30, 50, 100],
        //   pageLength: 5,

    ajax: {
        
            url: "ajax/reporte.ajax.php",
            dataSrc: '', // Que la data que retorne  no queremos 
            type: "POST",

            dataType: 'json',
                "dataSrc": function (respuesta){

                    console.log("lo que trae : ",respuesta)
                   let TotalVentaAdministar = 0.00;
                   let TotalComprasAdministar=0.00;
                   let TotalGanaciaAdministar=0.00;
                
                    for (let i = 0; i < respuesta.length; i++) {
                        // console.log("d",i);
                        TotalGanaciaAdministar = parseFloat(respuesta[i][9]) + parseFloat(TotalGanaciaAdministar) ;
                        TotalComprasAdministar = parseFloat(respuesta[i][8]) + parseFloat(TotalComprasAdministar) ;
                        TotalVentaAdministar = parseFloat(respuesta[i][7]) + parseFloat(TotalVentaAdministar) ;
                        // TotalVentaAdministar = parseFloat(respuesta[i][5].replace('$./ ', '')) + parseFloat(TotalVentaAdministar) ;
                        // // TotalVentaAdministar = parseFloat(respuesta[i][5]) + parseFloat(TotalVentaAdministar) ;
                        // console.log("total:",TotalVentaAdministar);
                    }
                    let resup= '$ '+TotalGanaciaAdministar.toFixed(2);
                 
                    $("#total_Ganancias").html(resup);

                    // $("#total_Ventas").html(TotalVentaAdministar.toFixed(2))
                    resup= '$ '+TotalVentaAdministar.toFixed(2);
                     $("#total_Ventas").html(resup);
                     resup= '$ '+TotalComprasAdministar.toFixed(2);
                    $("#total_compras").html(resup);
                    return  respuesta;
                },
            data: {'accion': 3,
                'fechaDesde': ventas_desde,
                'fechaHasta' : ventas_hasta
                },//1: LISTAR PRODUCTOS
        
        },
        ///////////////////////////////////////////////////////////////////////
            responsive: {
            details: {
                    type: 'column'
                }
            },
            columnDefs: [
            {
                targets: 0,  // idice cero donde se encuentra la columna
                orderable: false, // es columan tenga ordenamiento
                className: 'control' // aparescar  un boton 
                },
               
                {
                    targets: 4,
                    visible: false
                 },
                 {
                    targets: 5,
                    visible: false
                 },
              
                 {
                    targets: 3,
                 
                    className: "text-center"
                 }, 

        ],
        "order": [[ 0, 'desc' ]],
            lengthMenu: [ 5, 10, 15, 20, 50],
            "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
   });

})
   
})





    </script>

