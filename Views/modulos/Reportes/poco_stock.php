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
                       
                           
                        <h3 class="card-title"><i class="fas fa-list"></i> Historial Producto  </h3>
                       
                        <div class="card-tools">
                            
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                        
                     <div class="card-body">

                                     <div class="row">

<!-- 
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-sm btn-success" id="nuevo_categorias"><i class="fa fa-plus" aria-hidden="true"></i>  Agregar Nuevo</button>
                    </div> -->


                                     <!-- para ingresar contenidos -->


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
            data: {'accion': 1},//1: LISTAR PRODUCTOS
        
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
                    targets: 3,
                 
                    className: "text-center"
                 },
                   
                 {
                    targets: 4,
                 
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


    </script>

