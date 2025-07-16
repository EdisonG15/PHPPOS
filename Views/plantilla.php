<?php

session_start();


if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {

    session_destroy();

    echo '
            <script>
                window.location = "http://localhost/WebPuntoVenta2025/";
            </script>        
        ';
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA VENTAS</title>

    <link rel="shortcut icon" href="Views/assets/dist/img/logo.png" type="image/x-icon">

        
  <!-- ✅ jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- ✅ DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- ✅ Flatpickr para rango de fechas -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <!-- ============================================================================================================= -->
    <!-- REQUIRED CSS -->
    <!-- ============================================================================================================= -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet"> -->

<style>

/* Importa tus fuentes de Google Fonts en tu archivo CSS o en el <head> */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Open+Sans:wght@400;600&display=swap');

body {
  font-family: 'Open Sans', sans-serif;
  color: #333; /* Un gris oscuro para el texto principal */
}

/* Encabezado del Modal */
.modern-header-gradient {
  background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%); /* Ejemplo de degradado moderno */
  /* O un color plano si prefieres un look más minimalista */
  /* background-color: #007bff; */
  padding-top: 1.5rem !important;
  padding-bottom: 1.5rem !important;
}

.modal-title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 0.02em; /* Ligeramente más espaciado entre letras */
}

.modal-content.modern-modal-content {
  border-radius: 1.5rem; /* Bordes más redondeados */
  box-shadow: 0 1rem 3rem rgba(0,0,0,.15); /* Sombra más suave y extendida */
  overflow: hidden; /* Asegura que el rounded-top funcione bien */
}

/* Campos de Formulario */
.form-control-modern,
.form-select.form-control-modern {
  border-radius: 0.75rem; /* Bordes ligeramente más redondeados para los campos */
  border: 1px solid #ced4da;
  transition: all 0.3s ease-in-out;
  padding: 1rem 0.75rem; /* Ajusta el padding si es necesario con form-floating */
}

.form-control-modern:focus,
.form-select.form-control-modern:focus {
  border-color: #0d6efd; /* Color de foco de Bootstrap primary */
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Sombra de foco más suave */
}


/* Botón de Confirmación */
.btn-modern-success {
  background-color: #28a745; /* Verde estándar de Bootstrap success */
  border-color: #28a745;
  font-weight: 600; /* Ligeramente más negrita */
  border-radius: 2rem; /* Botón más redondeado */
  padding: 0.75rem 2.5rem; /* Más padding horizontal */
  transition: all 0.3s ease-in-out;
  box-shadow: 0 0.5rem 1rem rgba(40, 167, 69, 0.2); /* Sombra sutil para el botón */
}

.btn-modern-success:hover {
  background-color: #218838;
  border-color: #1e7e34;
  transform: translateY(-2px); /* Pequeño efecto de elevación al hacer hover */
  box-shadow: 0 0.75rem 1.5rem rgba(40, 167, 69, 0.3);
}

/* Iconos dentro de los botones */
.btn-modern-success i {
  margin-right: 0.75rem; /* Más espacio entre el icono y el texto */
}

/* Ajustes generales */
.modal-body {
  padding: 2.5rem !important; /* Más espacio interior en el cuerpo del modal */
}

.d-flex.justify-content-end {
  padding-top: 1rem; /* Espacio antes del botón */
}

/*************************************************************************************************************************** */



</style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet"> -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="Views/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="Views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="Views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Jquery CSS -->
    <link rel="stylesheet" href="Views/assets/plugins/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap 5 -->
    <link href="Views/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- JSTREE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="Views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    

    <!-- Select2 -->
    <link rel="stylesheet" href="Views/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="Views/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->

     <link rel="stylesheet" href="Views/assets/plugins/dataTablesVersion/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="Views/assets/plugins/dataTablesVersion/css/responsive.dataTables.min.css">
     <link rel="stylesheet" href="Views/assets/plugins/dataTablesVersion/css/fixedColumns.dataTables.min.css">
     <link rel="stylesheet" href="Views/assets/plugins/dataTablesVersion/css/buttons.dataTables.min.css">

    <!-- toogle switch -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="Views/assets/dist/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="Views/assets/dist/css/adminlte.css">


    <!-- Estilos personzalidos -->
    <link rel="stylesheet" href="Views/assets/dist/css/plantilla.css">

    <!-- ============================================================================================================= -->
    <!-- REQUIRED SCRIPTS -->
    <!-- ============================================================================================================= -->

    <!-- jQuery -->
    <!-- <script src="Views/assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="Views/assets/plugins/jquery/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="Views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="Views/assets/plugins/chart.js/Chart.min.js"></script>

    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    <script src="Views/assets/plugins/canvas/js/canvasjs.min.js"></script>

    <!-- InputMask -->
    <script src="Views/assets/plugins/moment/moment.min.js"></script>
    <script src="Views/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="Views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- jquery UI -->
    <script src="Views/assets/plugins/jquery-ui/js/jquery-ui.js"></script>

    <!-- JS Bootstrap 5 -->
    <script src="Views/assets/plugins/bootstrap/jss/bootstrap.bundle.min.js"></script>


    <!-- JSTREE JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> -->

    <script src="Views/assets/plugins/jstree/js/jstree.min.js"></script> 
    <!-- date-range-picker -->
    <script src="Views/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  

<!-- DataTables principal (antes de los plugins) -->
<script src="Views/assets/plugins/dataTablesVersion/js/jquery.dataTables.min.js"></script>

<!-- Plugins de DataTables (en este orden) -->
<script src="Views/assets/plugins/dataTablesVersion/js/dataTables.buttons.min.js"></script>
<script src="Views/assets/plugins/dataTablesVersion/js/buttons.html5.min.js"></script>
<script src="Views/assets/plugins/dataTablesVersion/js/buttons.print.min.js"></script>
<script src="Views/assets/plugins/dataTablesVersion/js/dataTables.fixedColumns.min.js"></script>
<script src="Views/assets/plugins/dataTablesVersion/js/dataTables.responsive.min.js"></script>

<script src="Views/assets/dist/js/jquery.tabledit.min.js"></script>
    

    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <!-- <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script> -->

    <!-- Bootstrap Switch -->
    <!-- <script src="https://unpkg.com/bootstrap-switch"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
    <script src="Views/assets/plugins/bootstrap/jss/bootstrap-switch.js"></script>
    <script src="Views/assets/plugins/bootstrap/jss/bootstrap4-toggle.min.js"></script>
    <!-- Select2 -->
    <script src="Views/assets/plugins/select2/js/select2.full.min.js"></script>

    <!-- AdminLTE App -->
    <script src="Views/assets/dist/js/adminlte.min.js"></script>
    <script src="Views/assets/dist/js/plantilla.js"></script>

    <script src="Views/assets/dist/js/funciones_globales.js"></script>


</head>

<?php if (isset($_SESSION["usuario"])) : ?>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            <?php include "models/aside.php"; ?>

            <div class="content-wrapper">

                <?php include "Views/modulos/" . $_SESSION["usuario"]->vista ?>

            </div>
        </div>

        <script>
            function CargarContenido(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }

        </script>

    </body>

<?php else : ?>

    <body>

         <?php include "Views/Login/login_final.php" ?> 

    </body>

<?php endif; ?>

</html>