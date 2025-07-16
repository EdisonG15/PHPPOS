<?php 
session_start();
            
           ?>
<br>
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Criterios de Busqueda</h3>
                        <div class="card-tools"><button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
                    </div>
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

                            <input id="txtId_usuario_Administrar_ventas" type="hidden"  value="<?php 

            
echo  $_SESSION["usuario"]->id_usuario ?>"/>

              <input id="txtId_caja_administrar_ventas"  type="hidden"  value="<?php 


echo  $_SESSION["usuario"]->id_caja ?>"/>
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
                                <div class="form-group m-0"><button class="btn btn-info" style="width:120px;" id="btnFiltrar_administrar_ventas">Buscar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <h4>Total ventas: $./ <span id="totalVentasAdministrar">0.00</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table  class="uk-table uk-table-hover uk-table-striped display" style="width:100%" id="lst_Ventas">
                    <thead class="bg-dark ">
                        <tr>
                            <th>Nro Boleta</th>
                            <th>Codigo Barras</th>
                            <!-- <th>Categoria</th> -->
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total Venta</th>
                            <th>Fecha Venta</th>
                        </tr>
                    </thead>
                    <tbody class="small"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

// var table_factura;
    var baderara_validar=0;
    var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
    $(document).ready(function(){

        verificarSiExisteCajaAbierta();

        let table_administracion_ventas, ventas_desde, ventas_hasta;
        let groupColumn = 0;

        $('#ventas_desde, #ventas_hasta').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

        $("#ventas_desde").val(moment().startOf('month').format('DD/MM/YYYY'));
        $("#ventas_hasta").val(moment().format('DD/MM/YYYY'));

        ventas_desde = $("#ventas_desde").val();
        ventas_hasta = $("#ventas_hasta").val();
        
        ventas_desde = ventas_desde.substr(6,4) + '-' + ventas_desde.substr(3,2) + '-' + ventas_desde.substr(0,2) ;        
        console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
        ventas_hasta = ventas_hasta.substr(6,4) + '-' + ventas_hasta.substr(3,2) + '-' + ventas_hasta.substr(0,2) ;
        console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)

        table_administracion_ventas = $('#lst_Ventas').DataTable({  
            "columnDefs": [
                { visible: false, targets: groupColumn },//groupColumn


                {
                    targets: [1,2,3,4,5],
                    orderable: false
                }
            ],
            "order": [[ 5, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'print', 'pageLength',

            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/administrar_ventas.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc": function (respuesta){

                    console.log("lo que trae iniio : ",respuesta)
                   let TotalVentaAdministar = 0.00;
                
                    for (let i = 0; i < respuesta.length; i++) {
                        // console.log("d",i);

                        TotalVentaAdministar = parseFloat(respuesta[i][4].replace('$./ ', '')) + parseFloat(TotalVentaAdministar) ;
                        // // TotalVentaAdministar = parseFloat(respuesta[i][5]) + parseFloat(TotalVentaAdministar) ;
                        // console.log("total:",TotalVentaAdministar);
                    }
                    $("#totalVentasAdministrar").html(TotalVentaAdministar.toFixed(2))
                    return  respuesta;
                },
                data: {
                    'accion': 1,
                    'fechaDesde': ventas_desde,
                    'fechaHasta' : ventas_hasta
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
                                    '<i nroBoleta = ' + nroBoleta + ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;"></i>  '+ '<i nroBoleta = ' + nroBoleta + ' class="fas fa-file-pdf fs-6 text-danger mx-2 btnImprimirTicke" style="cursor:pointer;"></i>  '+
                                   
                                    
                                    group +  
                                        
                                '</td>'+
                            '</tr>'
                        );

                        last = group;
                    }
                } );
            },
            language: {
                // "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                "url": "Views/assets/plugin/datatable/Spanish.json"
            }
        });

    $("#btnFiltrar_administrar_ventas").on('click',function(){

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
       
       
      

          ventas_desde = ventas_desde.substr(6,4) + '-' + ventas_desde.substr(3,2) + '-' + ventas_desde.substr(0,2) ;        
          console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
          ventas_hasta = ventas_hasta.substr(6,4) + '-' + ventas_hasta.substr(3,2) + '-' + ventas_hasta.substr(0,2) ;
          console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)
          table_administracion_ventas.destroy();
           table_administracion_ventas = $('#lst_Ventas').DataTable({  
            "columnDefs": [
                { visible: false, targets: groupColumn },//groupColumn


                {
                    targets: [1,2,3,4,5],
                    orderable: false
                }
            ],
            "order": [[ 5, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'print', 'pageLength',

            ],
            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 15,
            ajax: {
                url: 'ajax/administrar_ventas.ajax.php',
                type: 'POST',
                dataType: 'json',
                "dataSrc":  function (respuesta){

                    console.log("lo que trae : ",respuesta)
                   let TotalVentaAdministar= 0.00;
                
                    for (let i = 0; i < respuesta.length; i++) {

                        TotalVentaAdministar = parseFloat(respuesta[i][4].replace('$./ ', '')) + parseFloat(TotalVentaAdministar) ;
                        console.log("total:",TotalVentaAdministar);
                    }
                    $("#totalVentasAdministrar").html(TotalVentaAdministar.toFixed(2))
                    return  respuesta;
                },
                data: {
                    'accion': 1,
                    'fechaDesde': ventas_desde,
                    'fechaHasta' : ventas_hasta
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
                                '<i nroBoleta = ' + nroBoleta + ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;"></i>  '+ '<i nroBoleta = ' + nroBoleta + ' class="fas fa-file-pdf fs-6 text-danger mx-2 btnImprimirTicke" style="cursor:pointer;"></i>  '+
                                        
                                group +  
                                '</td>'+
                            '</tr>'
                        );

                        last = group;
                    }
                } );
            },
            language: {
                // "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                "url": "Views/assets/plugin/datatable/Spanish.json"
            }
        });
        
    })
    

    $('#lst_Ventas tbody').on('click', '.btnImprimirTicke', function(){

        let nroBoleta = $(this).attr("nroBoleta");
        window.open('http://localhost/WebPuntoVenta/Views/modulos/Ventas/RealizarVentas/generar_tick.php?nro_boleta='+nroBoleta);


    })
      
     $('#lst_Ventas tbody').on('click', '.btnEliminarVenta', function(){
        let nroBoleta = $(this).attr("nroBoleta");
        let id_usuario = $("#txtId_usuario_Administrar_ventas").val()
      let formData = new FormData();
        formData.append('accion',5);
        formData.append('p_opcion',1);
        formData.append('id_usuario',id_usuario);
       
        formData.append('nroBoleta',nroBoleta);

        $.ajax({
    url: "ajax/realizar_compras.ajax.php",
    method: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
        console.log("respuesta:", respuesta);

        try {
            let jsonResponse = JSON.parse(respuesta); // Convertir a objeto JSON

            console.log("respuesta.error:", jsonResponse.error);

            if (jsonResponse.success) {
    Swal.fire({
        title: '¿Está seguro de eliminar esta Venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo eliminarla!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/realizar_ventas.ajax.php",
                type: "POST",
                data: {
                    accion: '3',
                    Boleta: String(nroBoleta),
                    id_usuario: id_usuario
                },
                dataType: 'json',
                success: function(respuesta) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: respuesta[0],
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table_administracion_ventas.ajax.reload();
                }
            });
        }
    });
} else {
    Swal.fire({
        icon: 'error',
        title: 'No se puede completar...',
        text: jsonResponse.error
    });
}


        } catch (e) {
            console.error("Error al parsear JSON:", e);
            Swal.fire({
                icon: 'error',
                title: 'Error inesperado',
                text: 'No se pudo procesar la respuesta del servidor.'
            });
        }
    }
});

   
     });


})



function funcion_validar_eliminar(nroBoleta){
    let id_usuario = $("#txtId_usuario_Administrar_ventas").val()
      let formData = new FormData();
        formData.append('accion',5);
        formData.append('p_opcion',1);
        formData.append('id_usuario',id_usuario);
       
        formData.append('nroBoleta',nroBoleta);

        $.ajax({
    url: "ajax/realizar_compras.ajax.php",
    method: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
        console.log("respuesta:", respuesta);

        try {
            let jsonResponse = JSON.parse(respuesta); // Convertir a objeto JSON

            console.log("respuesta.error:", jsonResponse.error);

            if (jsonResponse.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'No se puede completar...',
                    text: jsonResponse.error
                });
                return;
            }
        } catch (e) {
            console.error("Error al parsear JSON:", e);
            Swal.fire({
                icon: 'error',
                title: 'Error inesperado',
                text: 'No se pudo procesar la respuesta del servidor.'
            });
        }
    }
});

}

function validar_cliente_tiene_abono(nroBoleta) {
    let formData = new FormData();
        formData.append('accion',6);
                formData.append('nroBoleta',nroBoleta);
                $.ajax({
                    url: "ajax/realizar_compras.ajax.php",
                    method: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                    console.log("resss",respuesta)
                    console.log("13:",respuesta[14]);
                      if(respuesta[14] == 0){
                        Swal.fire({
      icon: 'error',
      title: 'No se puede completar...',
     text: 'Ya se a realizado abono a esta venta',
 
       })

       return;  
                      }
                     }
                });

}

    function verificarSiExisteCajaAbierta(){
     
             let datos = new FormData();

       datos.append("opcion", 1);
      //  datos.append("VerificaExiste",  $("#txtCategoria").val()); //codigo_producto    

       datos.append("txt_id_caja"  ,$("#txtId_caja_administrar_ventas").val());
       datos.append("txt_id_usuario"  ,$("#txtId_usuario_Administrar_ventas").val());

       
       $.ajax({
                    url: "ajax/validar.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

         

                        if (parseInt(respuesta['existe']) == 0) {// si esiste pero no hasy stock

                            baderara_validar=1;

            $("#btnEliminarVenta") .prop('disabled', true);
            $("#btnFiltrar_administrar_ventas") .prop('disabled', true);
         
            
            Swal.fire({
  title: 'LA CAJA SE ENCUENTRA CERRADA, TODAS LAS OPCIONES SE ENCUENTRA DESHABILITADA, POR FAVOR ABRA LA CAJA PRIMERO PARA HABILITAR LAS OPCIONES.',
  width: 600,
  icon: 'warning',
  padding: '3em',
  color: '#716add',
})
                        }      
                        else {
                           

            
                        }
       

                    }

                    });
    }
</script>