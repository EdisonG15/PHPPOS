<?php

$menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($_SESSION["usuario"]->id_usuario);

?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
<ul class="navbar-nav ml-auto">
    <!-- Notificaciones -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="btnNotificaciones">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge" id="contadorLotes">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaLotes">
            <span class="dropdown-header">Lotes por vencer</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted">Sin datos</a>
        </div>
    </li>
</ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="Views/assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SISTEMA VENTAS</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="Views/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                 <img src="Views/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  <!-- <img src="<?php echo $_SESSION['usuario']->img ?>" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <h6 class="text-warning"><?php echo $_SESSION["usuario"]->nombre_usuario . ' ' . $_SESSION["usuario"]->apellido_usuario ?></h6>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <?php foreach ($menuUsuario as $menu) : ?>
                    <li class="nav-item <?php if ($menu->abrir_arbol == 1) : ?> <?php echo ' menu-is-opening menu-open'; ?> <?php endif; ?>">
                        <a style="cursor: pointer;" class="nav-link <?php if ($menu->vista_inicio == 1) : ?>
                                                <?php echo 'active'; ?>
                                            <?php endif; ?>" <?php if (!empty($menu->vista)) : ?> onclick="CargarContenido('Views/modulos/<?php echo $menu->vista; ?>','content-wrapper')" <?php endif; ?>>
                            <i class="nav-icon <?php echo $menu->icon_menu; ?>"></i>
                            <p>
                                <?php echo $menu->modulo ?>
                                <?php if (empty($menu->vista)) : ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif; ?>
                            </p>
                        </a>

                        <?php if (empty($menu->vista)) : ?>

                            <?php
                            $subMenuUsuario = UsuarioModelo::mdlObtenerSubMenuUsuario($menu->id, $_SESSION["usuario"]->id_usuario);
                            ?>

                            <ul class="nav nav-treeview">

                                <?php foreach ($subMenuUsuario as $subMenu) : ?>

                                    <li class="nav-item">
                                        <a style="cursor: pointer;" class="nav-link <?php if ($subMenu->vista_inicio == 1) : ?>
                                                <?php echo 'active '; ?>
                                            <?php endif; ?>" onclick="CargarContenido('Views/modulos/<?php echo $subMenu->vista ?>','content-wrapper')">
                                            <i class="<?php echo $subMenu->icon_menu; ?> nav-icon"></i>
                                            <p><?php echo $subMenu->modulo; ?></p>
                                        </a>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>

                <li class="nav-item">
                    <a style="cursor: pointer;" class="nav-link" href="http://localhost/WebPuntoVenta2025/?cerrar_sesion=1">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Cerrar Sesion
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    $(".nav-link").on('click', function() {
        $(".nav-link").removeClass('active');
        $(this).addClass('active');
    })

   $(document).ready(function() {
function cargarNotificaciones() {
    let contadorLotes = 0;
    let contadorPocoStock = 0;
    
    // Petición para lotes por vencer
    $.ajax({
        url: 'ajax/reporte.ajax.php',
        type: 'POST',
        data: { 'accion': 5, 'numeroDias': 15 },
        dataType: 'json',
        success: function(lotes) {
            contadorLotes = lotes.length;
            let lista = $("#listaLotes");
            lista.html('<span class="dropdown-header">Notificaciones</span><div class="dropdown-divider"></div>');
            
            // Si hay lotes por vencer, los agregamos a la lista
            if (contadorLotes > 0) {
                lista.append('<span class="dropdown-header">Lotes por vencer</span>');
                lotes.forEach(function(lote) {
                    lista.append(`
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-box mr-2"></i> ${lote.descripcion_producto}
                            <span class="float-right text-muted text-sm">${lote.dias_para_vencer} días</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    `);
                });
            }

            // Petición para productos con poco stock
            $.ajax({
                url: 'ajax/reporte.ajax.php',
                type: 'POST',
                data: { 'accion': 1 }, // Llamamos a la nueva acción
                dataType: 'json',
                success: function(productos) {
                    contadorPocoStock = productos.length;
                    let totalContador = contadorLotes + contadorPocoStock;
                    $("#contadorLotes").text(totalContador);

                   console.log("producto:",productos);
                    // Si hay productos con poco stock, los agregamos a la lista
                    if (contadorPocoStock > 0) {
                        lista.append('<span class="dropdown-header">Poco stock</span>');
                        productos.forEach(function(producto) {
                            lista.append(`
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-exclamation-triangle mr-2"></i> ${producto.descripcion_producto}
                                    <span class="float-right text-muted text-sm">Stock: ${producto.stock_producto}</span>
                                </a>
                                <div class="dropdown-divider"></div>
                            `);
                        });
                    }

                    // Si no hay ninguna notificación
                    if (totalContador === 0) {
                        lista.append('<a href="#" class="dropdown-item text-center text-muted">No hay notificaciones</a>');
                    }
                }
            });
        }
    });
}
// Llamamos a la nueva función que combina ambas notificaciones
setInterval(cargarNotificaciones, 60000);
    });
//     function cargarLotesPorVencer() {
//     $.ajax({
//         url: 'ajax/reporte.ajax.php',
//         type: 'POST',
//         data: { 'accion': 5,
//             'numeroDias': 15 }, // Cambia el número de días
//         dataType: 'json',
//         success: function(lotes) {
//             let contador = lotes.length;
//             $("#contadorLotes").text(contador);

//             let lista = $("#listaLotes");
//             lista.html('<span class="dropdown-header">Lotes por vencer</span><div class="dropdown-divider"></div>');

//             if (contador === 0) {
//                 lista.append('<a href="#" class="dropdown-item text-center text-muted">No hay lotes próximos a vencer</a>');
//             } else {
//                 lotes.forEach(function(lote) {
//                     lista.append(`
//                         <a href="#" class="dropdown-item">
//                             <i class="fas fa-box mr-2"></i> ${lote.descripcion_producto}
//                             <span class="float-right text-muted text-sm">${lote.dias_para_vencer} días</span>
//                         </a>
//                         <div class="dropdown-divider"></div>
//                     `);
//                 });
//             }
//         }
//     });
// }



</script>