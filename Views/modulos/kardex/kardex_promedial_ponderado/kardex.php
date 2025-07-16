<!-- 

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h4 class="m-0">Kardex</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item">Kardex</li>
                    <li class="breadcrumb-item active">Administrar Kardex</li> -->

                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  <link rel="stylesheet" href="Views/assets/dist/css/plantilla.css"> -->
 
                <!-- </ol>
            </div>
        </div>
    </div>
</div> -->

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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ventas_hasta">Ventas hasta:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="ventas_hasta">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Codigo Barra:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class=""></i></span></div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime"  id="txt_codigo_barra">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><a class="btn btn-info" style="width:120px;" id="btnFiltrar">Buscar</a></div>
                            </div>
                        </div>

                    
                        <div class="row">
                                            <div class="col-12 col-md-4" role="document">
                                                <div class="form-group">
                                                    <label >Producto:</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">

                                                                <i class="fab fa-product-hunt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="txt_codigo_barra" class="form-control" data-index="1">

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-12 col-md-4" role="document">
                                                <div class="form-group">
                                                    <label >Tipo:</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">

                                                                <i class="fas fa-layer-group"></i>
                                                            </div>
                                                        </div>
                                                        <select type="text" class="form-control" id="iptTipo" name="iptTipo" data-index="3">
                                                            <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">seleccione tipo</font></font></option>

                                                            <option value="Entrada">Entrada</option>

                                                            <option value="Eliminado">Eliminado</option>
                                                            <option value="Ajuste">Ajuste</option>
                                                            <option value="Salida">Salida</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4" role="document">
                                                <div class="form-group">
                                                    <label >Responsable:</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">

                                                                <i class="fas fa-users"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="iptResponsable" class="form-control" data-index="7">

                                                    </div>
                                                </div>
                                            </div> -->


                                        </div>
                     

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
        
        </div>
        <div class="row">
            <div class="col-md-12">
                <table  class="uk-table uk-table-hover uk-table-striped display" style="width:100%" id="lstKardex">
                    <thead class="bg-dark ">
                        <tr>
                            <th>ID</th>
                            <th>ID Producto</th>
                            <th>Codigo Barras</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Comprobante</th>
                            <th>Entrada</th>
                            <th>Salidad</th>
                            <th>Existencia</th>
                        </tr>
                    </thead>
                    <tbody class="small"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>

    var codigo_barra='';
    var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});

   $(document).ready(function(){

    var table, ventas_desde, ventas_hasta;
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

        table = $("#lstKardex").DataTable({
            
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                
                 
                    'excel','pdf', 'print', 'pageLength'
                ],
              pageLength: [5, 10, 15, 30, 50, 100],
              pageLength: 5,

        ajax: {
            
                url: "ajax/kardex.ajax.php",
                dataSrc: '', // Que la data que retorne  no queremos 
                type: "POST",
                data: {'accion': 1 ,
                   'fechaDesde': ventas_desde,
                    'fechaHasta' : ventas_hasta,
                   'codigo_barra':codigo_barra},//1: LISTAR PRODUCTOS
            
            },
            ///////////////////////////////////////////////////////////////////////
                responsive: {
                details: {
                        type: 'column'
                    }
                },
                columnDefs: [
                
                   
                    {
                        targets: 0,
                        visible: false
                     },
                     {
                    targets: [3,4,5,6,7,8,9],
                    orderable: false
                },
                     {
                        targets: 1,
                        visible: false
                     },
                     {
                    targets: 7,
                    className: "text-center"
                 },
                 {
                    targets: 8,
                 
                    className: "text-center"
                 },
                 {
                    targets: 9,
                 
                    className: "text-center"
                 }
                
                  
                
              

            ],
            "order": [[ 0, 'asc' ]],
                lengthMenu: [ 5, 10, 15, 20, 50],
                "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
       });


       
    $("#btnFiltrar").on('click',function(){

        cargar_datos();
           

    })

    $("#txt_codigo_barra").keyup(function() {
        cargar_datos();
    })

 function cargar_datos() {

             // table.clear().draw();
         console.log("ingresaaod al boton buscar")

         if($("#ventas_desde").val() == ''){
            ventas_desde = '01-01-2023';
         }else{
            ventas_desde = $("#ventas_desde").val();
         }

         if($("#ventas_desde").val() == ''){
            ventas_hasta = '04-12-2023';
         }else{
            ventas_hasta = $("#ventas_hasta").val();
         }
         
         
         if($("#txt_codigo_barra").val() == ''){
          
            codigo_barra = '';
         }else{
            codigo_barra =  $("#txt_codigo_barra").val();
         }
         
         

      
       
      

          ventas_desde = ventas_desde.substr(6,4) + '-' + ventas_desde.substr(3,2) + '-' + ventas_desde.substr(0,2) ;        
          console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
          ventas_hasta = ventas_hasta.substr(6,4) + '-' + ventas_hasta.substr(3,2) + '-' + ventas_hasta.substr(0,2) ;
          console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)
           table.destroy();
           table = $("#lstKardex").DataTable({
            
            dom: 'Bfrtip',  //botoneras en la parte superios
            buttons: [
                
                 
                    'excel','pdf', 'print', 'pageLength'
                ],
              pageLength: [5, 10, 15, 30, 50, 100],
              pageLength: 5,

        ajax: {
            
                url: "ajax/kardex.ajax.php",
                dataSrc: '', // Que la data que retorne  no queremos 
                type: "POST",
                data: {'accion': 1 ,
                   'fechaDesde': ventas_desde,
                    'fechaHasta' : ventas_hasta,
                   'codigo_barra':codigo_barra},//1: LISTAR PRODUCTOS
            
            },
            ///////////////////////////////////////////////////////////////////////
                responsive: {
                details: {
                        type: 'column'
                    }
                },
                columnDefs: [
                
                   
                    {
                        targets: 0,
                        visible: false
                     },

                     {
                        targets: 1,
                        visible: false
                     },
                     {
                    targets: 7,
                    className: "text-center"
                 },
                 {
                    targets: 8,
                 
                    className: "text-center"
                 },
                 {
                    targets: 9,
                 
                    className: "text-center"
                 }
                
              

            ],
            "order": [[ 0, 'asc' ]],
                lengthMenu: [ 5, 10, 15, 20, 50],
                "pageLength": 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
       });

    
  }

  })

 



</script>