<style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>

    <div class="content">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center bg-light">
                            <h3 class="card-title mb-0">
                                <i class="fas fa-file-invoice-dollar text-primary"></i> Gestión de Ventas
                            </h3>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" id="btnNuevaVenta">
                                    <i class="fas fa-plus"></i> Nueva Venta
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="rangoFecha" class="form-label fw-bold">Filtrar por Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="text" id="rangoFecha" class="form-control" placeholder="Selecciona un rango"/>
                                    </div>
                                </div>
                                 <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarComprobatesSRI"><i class="fas fa-search"></i> Buscar</button>
            </div>
                            </div>

                            <div class="table-responsive">
                                <table id="tb_venta" class="table table-hover table-striped" style="width:100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id Venta</th>
                                             <th>Nro. Boleta</th>
                                            <th>Cliente</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>clave Acceso</th>
                                            <th>Fecha Autorizacion</th>
                                             <th>Xml</th>
                                              <th>Pdf</th>
                                                <th>¿Enviado?</th>
                                            <th class="text-center">Estado SRI</th>
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var API_BASE_URL = 'http://localhost:9092';
        var table;
         var selectedRange = [];
  flatpickr("#rangoFecha", {
        mode: "range",
        dateFormat: "d/m/Y",
        showMonths: 2,
        closeOnSelect: true,
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
            },
            months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            if (!instance.calendarContainer.querySelector(".flatpickr-custom-buttons")) {
                const btnContainer = document.createElement("div");
                btnContainer.className = "flatpickr-custom-buttons";
                const btnCancelar = document.createElement("button");
                btnCancelar.textContent = "Cancelar";
                btnCancelar.className = "btn-cancelar";
                btnCancelar.addEventListener("click", (e) => {
                    e.preventDefault(); // Evitar que el formulario se envíe
                    instance.clear();
                    instance.close();
                });

                btnContainer.appendChild(btnCancelar);
                instance.calendarContainer.appendChild(btnContainer);
            }
        },
        onChange: function(selectedDates) {
            selectedRange = selectedDates;
        }
    });
        $(document).ready(function() {
          

      //      2. Establece las fechas de inicio y fin
    const fechaInicio = new Date(); // Fecha de hoy
    const fechaFin = new Date();    // También hoy, pero la modificaremos
    
    // Aumenta un día a la fecha final
    fechaFin.setDate(fechaFin.getDate() + 1);

    // 3. Llama a la función con el rango de fechas correcto
    cargarComprobantesSRI(formatDate(fechaInicio), formatDate(fechaFin));
        
            // Event listener para el botón "Nueva Venta"
            $('#btnNuevaVenta').on('click', function() {
                alert('Funcionalidad para Nueva Venta (redireccionar o abrir modal)');
                // Ejemplo: window.location.href = '/new-sale';
            });

            // Event listener para el botón "Enviar al SRI"
            // Event listener para el botón "Enviar al SRI"

// Event listener para el botón "Enviar al SRI"
$('#tb_venta tbody').on('click', '.btn-enviar-sri', function() {
    const ventaId = $(this).data('id');
    const $button = $(this); // Capturar el botón para manipularlo

    // 1. Swal de Confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: `¿Deseas enviar la venta ${ventaId} al SRI? Esta acción es irreversible.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, enviar al SRI',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Usuario confirmó, proceder con la llamada AJAX

            // Deshabilitar el botón y mostrar un spinner para feedback
            $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...');

            $.ajax({
                // ¡Aquí es donde lo colocas!
                url: `${API_BASE_URL}/api/factura/emitir/${ventaId}`,
                type: 'POST',
                success: function(response) {
                    // Re-habilitar el botón y restaurar el texto
                    $button.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Enviar');

                    // 2. Swal para Mensajes de Éxito o Error del Backend
                    if (response.code >= 200 && response.code < 300) {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: response.message || 'La operación se completó con éxito.',
                            icon: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Error: ' + (response.message || 'Mensaje de error no disponible.'),
                            icon: 'error'
                        });
                    }
                    table.ajax.reload(null, false); // Recargar la tabla
                },
                error: function(xhr, status, error) {
                    // Re-habilitar el botón y restaurar el texto
                    $button.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Enviar');

                    let errorMessage = 'Error desconocido al comunicarse con el servidor.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (error) {
                        errorMessage = `Error de red: ${error}`;
                    } else if (status) {
                        errorMessage = `Estado: ${status}`;
                    }

                    // 3. Swal para Errores de Conexión/Servidor
                    Swal.fire({
                        title: 'Error de Conexión',
                        text: `No se pudo enviar la factura al SRI: ${errorMessage}`,
                        icon: 'error'
                    });
                    table.ajax.reload(null, false); // Recargar la tabla
                }
            });
        }
    });
});

// --- Event listener para el botón "Consultar Estado SRI" ---
$('#tb_venta tbody').on('click', '.btn-consultar-estado', function() {
    const ventaId = $(this).data('id');
    const claveAcceso = $(this).data('clave');
    const $button = $(this); // Capturar el botón para manipularlo

    Swal.fire({
        title: '¿Deseas consultar el estado?',
        text: `Se consultará el estado de la factura con ID ${ventaId} y clave de acceso ${claveAcceso}.`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, consultar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Usuario confirmó, proceder con la llamada AJAX

            // Deshabilitar el botón y mostrar un spinner
            $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Consultando...');

            $.ajax({
                url: `${API_BASE_URL}/api/factura/comprobar/${claveAcceso}`,
                type: 'GET', // Es un GET ya que estás consultando datos
                success: function(response) {
                    // Re-habilitar el botón y restaurar el texto
                    $button.prop('disabled', false).html('<i class="fas fa-sync-alt"></i> Consultar');

                    if (response.code >= 200 && response.code < 300) {
                        // Respuesta exitosa del backend
                        const estadoSRI = response.data.estado; // 'AUTORIZADO', 'NO_AUTORIZADO', etc.
                        const numeroAutorizacion = response.data.numeroAutorizacion;
                        
                        let titleText = 'Estado Consultado';
                        let iconType = 'info'; // Por defecto

                        if (estadoSRI === 'AUTORIZADO') {
                            titleText = '¡Factura Autorizada!';
                            iconType = 'success';
                        } else if (estadoSRI === 'NO_AUTORIZADO' || estadoSRI === 'DEVUELTA' || estadoSRI === 'ERROR_CONSULTA_SRI') {
                            titleText = 'Factura No Autorizada / Error';
                            iconType = 'error';
                        } else if (estadoSRI === 'RECIBIDA' || estadoSRI === 'EN_PROCESO') {
                            titleText = 'Factura en Proceso';
                            iconType = 'warning';
                        }

                        Swal.fire({
                            title: titleText,
                            html: `
                                <p><strong>Estado del SRI:</strong> ${response.message}</p>
                                ${numeroAutorizacion ? `<p><strong>No. Autorización:</strong> ${numeroAutorizacion}</p>` : ''}
                                <small>La tabla se actualizará automáticamente.</small>
                            `,
                            icon: iconType
                        });
                    } else {
                        // El backend respondió con un error manejado (ej. 404 si la clave no existe)
                        Swal.fire({
                            title: 'Error al Consultar',
                            text: response.message || 'Mensaje de error no disponible.',
                            icon: 'error'
                        });
                    }
                    table.ajax.reload(null, false); // Recargar la tabla para mostrar el nuevo estado
                },
                error: function(xhr, status, error) {
                    // Re-habilitar el botón y restaurar el texto
                    $button.prop('disabled', false).html('<i class="fas fa-sync-alt"></i> Consultar');

                    let errorMessage = 'Error desconocido al comunicarse con el servidor.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (error) {
                        errorMessage = `Error de red: ${error}`;
                    } else if (status) {
                        errorMessage = `Estado: ${status}`;
                    }

                    Swal.fire({
                        title: 'Error de Conexión',
                        text: `No se pudo consultar el estado al SRI: ${errorMessage}`,
                        icon: 'error'
                    });
                    table.ajax.reload(null, false); // Recargar la tabla en caso de error
                }
            });
        }
    });
});         


            // Event listener para el botón "Enviar al Cliente"
            // $('#tb_venta tbody').on('click', '.btn-enviar-cliente', function() {
            //     const claveAcceso = $(this).data('clave');
            //     if (claveAcceso && confirm(`¿Deseas enviar el comprobante con clave ${claveAcceso} al cliente por correo?`)) {
            //         $.ajax({
            //             url: `/api/comprobantes/enviar-email/${claveAcceso}`,
            //             type: 'POST',
            //             success: function(response) {
            //                 if (response.code === 200) {
            //                     alert('Comprobante enviado al cliente exitosamente.');
            //                 } else {
            //                     alert('Error al enviar el comprobante al cliente: ' + response.message);
            //                 }
            //             },
            //             error: function(xhr, status, error) {
            //                 const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error desconocido al comunicarse con el servidor.';
            //                 alert(`Error al enviar el comprobante al cliente: ${errorMessage}`);
            //             }
            //         });
            //     } else if (!claveAcceso) {
            //         alert('No se encontró clave de acceso para enviar el correo.');
            //     }
            // });

            // --- Event listener para el botón "Enviar al Cliente" ---
$('#tb_venta tbody').on('click', '.btn-enviar-cliente', function() {
    const claveAcceso = $(this).data('clave');
    const $button = $(this); // Capturar el botón para manipularlo

    // 1. Swal de Confirmación para enviar el correo
    Swal.fire({
        title: '¿Estás seguro?',
        text: `¿Deseas enviar el comprobante con clave de acceso ${claveAcceso} por correo al cliente?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, enviar correo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Usuario confirmó, proceder con la llamada AJAX

            // Deshabilitar el botón y mostrar un spinner para feedback
            $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...');

            $.ajax({
                url: `${API_BASE_URL}/api/comprobantes/enviar-email/${claveAcceso}`,
                type: 'POST', // Es un POST para enviar el correo
                success: function(response) {
                    // Re-habilitar el botón y restaurar el texto original (ícono de sobre)
                    $button.prop('disabled', false).html('<i class="fas fa-envelope"></i>');

                    // 2. Swal para Mensajes de Éxito o Error del Backend
                    if (response.code >= 200 && response.code < 300) {
                        Swal.fire({
                            title: '¡Correo Enviado!',
                            text: response.message || 'El comprobante fue enviado por correo exitosamente.',
                            icon: 'success'
                        });
                    } else {
                        // El backend respondió con un error manejado (ej. 400 si el email no existe)
                        Swal.fire({
                            title: 'Error al Enviar Correo',
                            text: 'Error: ' + (response.message || 'Mensaje de error no disponible.'),
                            icon: 'error'
                        });
                    }
                    table.ajax.reload(null, false); // Recargar la tabla para reflejar posibles actualizaciones de estado
                },
                error: function(xhr, status, error) {
                    // Re-habilitar el botón y restaurar el texto original
                    $button.prop('disabled', false).html('<i class="fas fa-envelope"></i>');

                    let errorMessage = 'Error desconocido al comunicarse con el servidor.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (error) {
                        errorMessage = `Error de red: ${error}`;
                    } else if (status) {
                        errorMessage = `Estado: ${status}`;
                    }

                    // 3. Swal para Errores de Conexión/Servidor
                    Swal.fire({
                        title: 'Error de Conexión',
                        text: `No se pudo enviar el correo: ${errorMessage}`,
                        icon: 'error'
                    });
                    table.ajax.reload(null, false); // Recargar la tabla en caso de error
                }
            });
        }
    });
});


            // --- Event listener para el botón "Descargar RIDE/XML" ---
            $('#tb_venta tbody').on('click', '.btn-descargar-ride-xml', function() {
    const rowData = table.row($(this).parents('tr')).data();

    const claveAcceso = rowData.clave_acceso;
    const rutaXml = rowData.ruta_xml_autorizado;
    const rutaPdf = rowData.pdf_generado;

    if (!rutaXml && !rutaPdf) {
        Swal.fire({
            title: 'Archivos no disponibles',
            text: 'No se encontraron las rutas para descargar el XML ni el PDF.',
            icon: 'warning'
        });
        return;
    }

    let downloadOptionsHtml = '';
    if (rutaPdf) {
        // Llama a tu endpoint PHP que se encarga de descargar el PDF
        const urlPdf = `endpoint/descargar.php?ruta=${encodeURIComponent(rutaPdf)}&tipo=pdf`;
        downloadOptionsHtml += `<a href="${urlPdf}" target="_blank" download="RIDE-${claveAcceso}.pdf" class="swal2-styled swal2-confirm" style="background-color: #007bff; margin: 10px;">
                                    <i class="fas fa-file-pdf"></i> Descargar RIDE (PDF)
                                </a>`;
    }
    if (rutaXml) {
        // Llama a tu endpoint PHP para descargar XML
        const urlXml = `endpoint/descargar.php?ruta=${encodeURIComponent(rutaXml)}&tipo=xml`;
        downloadOptionsHtml += `<a href="${urlXml}" target="_blank" download="Factura-${claveAcceso}.xml" class="swal2-styled swal2-cancel" style="background-color: #6c757d; margin: 10px;">
                                    <i class="fas fa-file-code"></i> Descargar XML
                                </a>`;
    }

    Swal.fire({
        title: 'Selecciona una descarga',
        html: `
            <p>¿Qué documento deseas descargar para la clave de acceso <strong>${claveAcceso}</strong>?</p>
            <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                ${downloadOptionsHtml}
            </div>
        `,
        icon: 'info',
        showConfirmButton: false,
        showCancelButton: true,
        cancelButtonText: 'Cerrar'
    });
});
            // Event listener para el botón "Ver Detalles"
            $('#tb_venta tbody').on('click', '.btn-ver-detalles', function() {
                const ventaId = $(this).data('id');
                alert(`Ver detalles de la venta ID: ${ventaId}`);
                // Ejemplo: window.location.href = `/sales/${ventaId}/details`;
            });

            // Event listener para el botón "Eliminar Venta"
            $('#tb_venta tbody').on('click', '.btn-eliminar-venta', function() {
                const ventaId = $(this).data('id');
                if (confirm(`¿Estás seguro de eliminar la venta ${ventaId}?`)) {
                    alert(`Eliminar venta ID: ${ventaId}`);
                    // Necesitarás un endpoint en el backend para esto
                    // Ejemplo: $.ajax({ url: `/api/ventas/${ventaId}`, type: 'DELETE', success: function() { table.ajax.reload(); } });
                }
            });

            // Event listener para el botón "Ver Errores"
            $('#tb_venta tbody').on('click', '.btn-ver-errores', function() {
                const ventaId = $(this).data('id');
                alert(`Ver errores de autorización para venta ID: ${ventaId}`);
                // Esto podría abrir un modal con detalles del error obtenidos de otro endpoint
            });
        });

        function cargarComprobantesSRI(fechaDesde, fechaHasta) {
    if ($.fn.DataTable.isDataTable('#tb_venta')) {
        $('#tb_venta').DataTable().destroy();
    }

    table = $('#tb_venta').DataTable({
        "processing": true,
        "ajax": {
            "url": "endpoint/comprobantes.php",
            "type": "POST",
            "dataSrc": '',
            "data": {
                'accion': 1,
                'fechaInicio': fechaDesde,
                'fechaFin': fechaHasta
            }
        },
        "columns": [
            { "data": "IdVenta", "visible": false },
            { "data": "nro_boleta_mostrar" },
            { "data": "nombre_cliente" },
            { "data": "total_venta", "render": function(data) { return `$${parseFloat(data).toFixed(2)}`; } },
            { "data": "fecha_registro" },
            { "data": "clave_acceso" , "visible": false},
            { "data": "fecha_autorizacion" , "visible": false},
             { "data": "ruta_xml_autorizado" , "visible": false},
              { "data": "pdf_generado" , "visible": false},
            { "data": "enviado_cliente",
                "className": "text-center",
    "render": function(data) {
        if (data == 1) {
            return `<span class="badge bg-success">Sí</span>`;
        } else if (data == 2) {
            return `<span class="badge bg-danger">No</span>`;
        } else {
            return `<span class="badge bg-secondary">NO</span>`;
        }
    }
             },
            {
                "data": "estado_sri_mostrar",
                "className": "text-center",
                "render": function(data) {
                    let badgeClass = '';
                    let statusText = data; // Por defecto, el texto original

                    // Mapea los estados del backend a un texto amigable y colores de badge
                    switch (data) {
                        case 'AUTORIZADO':
                            badgeClass = 'bg-success';
                            statusText = 'Autorizado';
                            break;
                        case 'POR ENVIAR':
                        case 'GENERADO':
                            badgeClass = 'bg-secondary';
                            statusText = 'Por Enviar';
                            break;
                        case 'NO_AUTORIZADO':
                        case 'DEVUELTA':
                        case 'ERROR_CONSULTA_SRI':
                            badgeClass = 'bg-danger';
                            statusText = 'No Autorizado'; // O 'Error SRI'
                            break;
                        case 'RECIBIDA':
                            badgeClass = 'bg-warning text-dark'; // Usa text-dark para mejor contraste
                            statusText = 'Recibida';
                            break;
                        case 'EN_PROCESO':
                            badgeClass = 'bg-info';
                            statusText = 'En Proceso';
                            break;
                        default: // OTRO / DESCONOCIDO
                            badgeClass = 'bg-dark';
                            statusText = 'Desconocido';
                            break;
                    }
                    return `<span class="badge ${badgeClass}">${statusText}</span>`;
                }
            },
            {
                "data": null,
                "className": "text-center",
                "orderable": false,
                "render": function(data, type, row) {
                    let buttons = `<div class="btn-group" role="group">`;
                    const estadoSRI = row.estado_sri_mostrar;

                    if (estadoSRI === 'AUTORIZADO') {
                        buttons += `
                            <button class="btn btn-sm btn-success btn-enviar-cliente" title="Enviar por Correo" data-clave="${row.clave_acceso}"><i class="fas fa-envelope"></i></button>
                            <button class="btn btn-sm btn-info btn-descargar-ride-xml" title="Descargar RIDE/XML" data-clave="${row.clave_acceso}"><i class="fas fa-download"></i></button>
                            <button class="btn btn-sm btn-secondary btn-ver-detalles" title="Ver Detalles" data-id="${row.IdVenta}"><i class="fas fa-eye"></i></button>
                        `;
                    } else if (estadoSRI === 'POR ENVIAR' || estadoSRI === 'GENERADO') {
                        buttons += `
                            <button class="btn btn-sm btn-primary btn-enviar-sri" title="Enviar al SRI" data-id="${row.IdVenta}"><i class="fas fa-paper-plane"></i> Enviar</button>
                            <button class="btn btn-sm btn-danger btn-eliminar-venta" title="Eliminar Venta" data-id="${row.IdVenta}"><i class="fas fa-trash"></i></button>
                        `;
                    } else if (estadoSRI === 'RECIBIDA') {
                        buttons += `   
                            <button class="btn btn-sm btn-warning btn-consultar-estado" title="Consultar Estado SRI" data-id="${row.IdVenta}" data-clave="${row.clave_acceso}"><i class="fas fa-sync-alt"></i> Consultar</button>
                            <button class="btn btn-sm btn-secondary btn-ver-detalles" title="Ver Detalles" data-id="${row.IdVenta}"><i class="fas fa-eye"></i></button>
                        `;
                    } else if (['NO_AUTORIZADO', 'DEVUELTA', 'ERROR_CONSULTA_SRI'].includes(estadoSRI)) {
                        buttons += `
                            <button class="btn btn-sm btn-warning btn-ver-errores" title="Ver Errores" data-id="${row.IdVenta}"><i class="fas fa-exclamation-triangle"></i> Errores</button>
                            <button class="btn btn-sm btn-secondary btn-ver-detalles" title="Ver Detalles" data-id="${row.IdVenta}"><i class="fas fa-eye"></i></button>
                        `;
                    } else { // Para EN_PROCESO, OTRO / DESCONOCIDO
                        buttons += `
                            <button class="btn btn-sm btn-secondary btn-ver-detalles" title="Ver Detalles" data-id="${row.IdVenta}"><i class="fas fa-eye"></i></button>
                        `;
                    }
                    buttons += `</div>`;
                    return buttons;
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json"
        }
    });
}

$(document).on('click', '#btnBuscarComprobatesSRI', function() {
     
    let tieneFechas = selectedRange.length === 2;
    let fechaInicio = null;
    let fechaFin = null;

    if (tieneFechas) {
        fechaInicio = formatDate(selectedRange[0]);
        fechaFin = formatDate(selectedRange[1]);
        cargarComprobantesSRI(fechaInicio, fechaFin);
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Filtro requerido',
            text: 'Por favor selecciona al menos un filtro (estado o rango de fechas).',
            confirmButtonText: 'Aceptar'
        });
    }
});

          // 1. Define la función para formatear fechas
    function formatDate(date) {
        const d = new Date(date);
        // El método .toString() es opcional aquí, padStart funciona en números en JS moderno, pero es buena práctica.
        const month = (d.getMonth() + 1).toString().padStart(2, '0');
        const day = d.getDate().toString().padStart(2, '0');
        const year = d.getFullYear();
        return `${year}-${month}-${day}`;
    }
    </script>