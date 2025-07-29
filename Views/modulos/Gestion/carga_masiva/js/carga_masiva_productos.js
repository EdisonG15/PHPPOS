// views/modules/carga_masiva/js/carga_masiva_productos.js

$(document).ready(function () {
    const formCargaMasiva = document.getElementById('formCargaMasiva');
    const feedbackCargaMasiva = document.getElementById('feedbackCargaMasiva');
    const fileInput = document.getElementById('archivo_excel');
    const fileLabel = document.querySelector('.custom-file-label');

    // Actualiza el label del input file con el nombre del archivo seleccionado
    if (fileInput && fileLabel) {
        fileInput.addEventListener('change', function () {
            if (this.files.length > 0) {
                fileLabel.innerText = this.files[0].name;
                this.classList.remove('is-invalid'); // Eliminar feedback de validación
                this.classList.add('is-valid');
            } else {
                fileLabel.innerText = fileLabel.dataset.defaultText; // Restaurar texto por defecto
                this.classList.remove('is-valid');
            }
        });
    }

    if (formCargaMasiva) {
        formCargaMasiva.addEventListener('submit', async function (e) {
            e.preventDefault(); // Evitar el envío de formulario tradicional
            e.stopPropagation(); // Evitar propagación del evento

            // Validación de Bootstrap 5 (si estás usando esa versión)
            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                Swal.fire('Advertencia', 'Por favor, selecciona un archivo Excel antes de continuar.', 'warning');
                return;
            }

            if (fileInput.files.length === 0) {
                fileInput.classList.add('is-invalid');
                Swal.fire('Error', 'Por favor, selecciona un archivo Excel para cargar.', 'error');
                return;
            }

            const formData = new FormData();
            formData.append('archivo_excel', fileInput.files[0]);
            formData.append('accion', 'cargar_masiva_productos'); // Una acción específica para este módulo

            // Confirmación con SweetAlert2
            const confirmacion = await Swal.fire({
                title: '¿Está seguro de iniciar la carga masiva?',
                text: 'Esta acción procesará los datos del Excel y podría crear o actualizar múltiples productos.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Cargar',
                cancelButtonText: 'Cancelar'
            });

            if (!confirmacion.isConfirmed) {
                return; // Si el usuario cancela, no hacemos la llamada AJAX
            }

            // Mostrar spinner de carga
            Swal.fire({
                title: 'Procesando carga...',
                text: 'Esto puede tardar unos minutos dependiendo del tamaño del archivo. Por favor, espere.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Llamada AJAX
            $.ajax({
                url: "ajax/carga_masiva.ajax.php", // El nuevo archivo AJAX dedicado
                method: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (respuesta) {
                    Swal.close(); // Cerrar spinner

                    // Limpiar mensajes previos en el div de feedback
                    feedbackCargaMasiva.innerHTML = '';

                    let detailsHtml = '';
                    if (respuesta.detalles && respuesta.detalles.length > 0) {
                        detailsHtml += '<h5>Detalles por Fila:</h5><div class="list-group" style="max-height: 400px; overflow-y: auto;">';
                        respuesta.detalles.forEach(detail => {
                            let itemClass = '';
                            if (detail.status === 'success') itemClass = 'list-group-item-success';
                            else if (detail.status === 'warning') itemClass = 'list-group-item-warning';
                            else if (detail.status === 'error') itemClass = 'list-group-item-danger';
                            detailsHtml += `<li class="list-group-item ${itemClass}">${detail.mensaje}</li>`;
                        });
                        detailsHtml += '</div>';
                    }

                    // Mostrar resumen general y detalles
                    Swal.fire({
                        title: respuesta.status.charAt(0).toUpperCase() + respuesta.status.slice(1), // Capitaliza la primera letra
                        text: respuesta.mensaje,
                        icon: respuesta.status,
                        didClose: () => {
                            // Mostrar detalles en el área de feedback después de cerrar la alerta principal
                            feedbackCargaMasiva.innerHTML = detailsHtml;
                        }
                    });

                    // Resetear el formulario y el input file
                    formCargaMasiva.reset();
                    formCargaMasiva.classList.remove('was-validated');
                    fileLabel.innerText = fileLabel.dataset.defaultText;
                    fileInput.classList.remove('is-valid', 'is-invalid');

                    // Opcional: Recargar la tabla de productos si existe en otra pantalla
                    // if (typeof table_producto !== 'undefined' && table_producto.ajax) {
                    //     table_producto.ajax.reload(() => {
                    //         table_producto.columns.adjust().responsive.recalc();
                    //     }, false);
                    // }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close(); // Cerrar spinner
                    console.error("Error en la solicitud AJAX de carga masiva:", textStatus, errorThrown, jqXHR);
                    let errorMessage = "Ocurrió un error al intentar subir el archivo. Por favor, intente de nuevo o contacte a soporte.";
                    if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
                        errorMessage = jqXHR.responseJSON.mensaje;
                    }
                    Swal.fire("Error de Conexión", errorMessage, "error");
                }
            });
        });
    }
});