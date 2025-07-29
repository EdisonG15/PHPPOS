<?php
// views/modules/carga_masiva/carga_masiva_productos.php

// Puedes incluir lógica de autenticación o permisos aquí si es necesario
// if (!isset($_SESSION["usuario"])) {
//     header("Location: login.php"); // Redirige si no está logueado
//     exit();
// }
?>

<div class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Carga Masiva de Productos</h1>
                </div>
            </div>
        </div></section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Instrucciones para la Carga Masiva</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Utilice la plantilla de Excel para estructurar sus datos. Asegúrese de que las columnas coincidan con las siguientes especificaciones:</p>
                            <ul>
                                <li>**Columna A: Código de Barra** (Obligatorio)</li>
                                <li>**Columna B: ID Categoría** (Obligatorio, debe existir en el sistema)</li>
                                <li>**Columna C: ID Marca** (Obligatorio, debe existir en el sistema)</li>
                                <li>**Columna D: ID Unidad de Medida** (Obligatorio, debe existir en el sistema)</li>
                                <li>**Columna E: Descripción del Producto** (Obligatorio)</li>
                                <li>**Columna F: Ruta Imagen** (Opcional, ruta relativa o nombre de archivo si la imagen ya está en el servidor, ej: `Views/assets/imagenes/productos/mi_imagen.png`. Si está vacío, se usará la imagen por defecto.)</li>
                                <li>**Columna G: Precio Compra** (Obligatorio, formato numérico)</li>
                                <li>**Columna H: Precio Venta** (Obligatorio, formato numérico)</li>
                                <li>**Columna I: Precio 1** (Obligatorio, formato numérico)</li>
                                <li>**Columna J: Precio 2** (Obligatorio, formato numérico)</li>
                                <li>**Columna K: Lleva IVA** (1 para Sí, 0 para No)</li>
                                <li>**Columna L: Stock** (Obligatorio, formato numérico)</li>
                                <li>**Columna M: Mínimo Stock** (Obligatorio, formato numérico)</li>
                                <li>**Columna N: Perecedero** (1 para Sí, 0 para No)</li>
                                <li>**Columna O: Fecha Vencimiento** (Obligatorio si es Perecedero. Formato: YYYY-MM-DD)</li>
                                <li>**Columna P: ID Producto** (Opcional. Use **0** para crear un nuevo producto. Use el **ID existente** para actualizar un producto. Deje en 0 para todos los productos nuevos.)</li>
                            </ul>
                            <p class="text-info">
                                <i class="fas fa-info-circle"></i> **Nota:** Para obtener los IDs de Categoría, Marca y Unidad de Medida, consulte la sección de gestión de Productos en su sistema.
                            </p>
                            <a href="Views/assets/templates/PlantillaCargaMasivaProductos.xlsx" download class="btn btn-success btn-lg">
                                <i class="fas fa-download"></i> Descargar Plantilla de Carga Masiva
                            </a>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Subir Archivo Excel</h3>
                        </div>
                        <form id="formCargaMasiva" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="archivo_excel">Seleccione su archivo Excel:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="archivo_excel" name="archivo_excel" accept=".xlsx, .xls" required>
                                            <label class="custom-file-label" for="archivo_excel" data-default-text="Elegir archivo">Elegir archivo</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Por favor, seleccione un archivo Excel.</div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg mt-3">
                                        <i class="fas fa-upload"></i> Cargar Productos
                                    </button>
                                </div>
                            </div>
                            </form>
                    </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Resultados de la Carga</h3>
                        </div>
                        <div class="card-body">
                            <div id="feedbackCargaMasiva">
                                <p class="text-muted">Los resultados de la carga masiva aparecerán aquí.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div></section>
    </div>

<script src="Views/modulos/Gestion/carga_masiva/js/carga_masiva_productos.js"></script>

<script>
    // Script para mostrar el nombre del archivo seleccionado en el input type="file"
    document.getElementById('archivo_excel').addEventListener('change', function() {
        var fileName = this.files[0].name;
        var nextSibling = this.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>