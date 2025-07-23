  <div class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">
                        <i class="fas fa-chart-pie mr-2"></i> Tablero de Reportes
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-success"> <div class="card-header border-0">
                    <h3 class="card-title text-bold">
                        Generar un nuevo Reporte
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form id="reportGeneratorForm">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="reportTypeSelect" class="form-label text-muted">1. Selecciona el tipo de reporte:</label>
                                <select class="form-control form-control-lg" id="reportTypeSelect" name="reportType" required>
                                    <option value="">-- Elige un reporte aquí --</option>
                                    <option value="historialVentas">Historial de Ventas</option>
                                    <option value="ganancias">Reporte de Ganancias</option>
                                    <option value="movimientoDiario">Movimiento Diario</option>
                                    <option value="movimientoMes">Movimiento Mensual por Año</option>
                                </select>
                            </div>
                        </div>

                        <div id="dynamicReportInputs" class="mt-4 p-3 bg-light rounded-lg border">
                            <p class="text-center text-muted m-0">
                                <i class="fas fa-info-circle mr-1"></i> Selecciona un reporte arriba para ver las opciones.
                            </p>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-lg px-5 shadow-sm">
                                    <i class="fas fa-file-download mr-2"></i> Generar y Descargar Reporte
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    const $reportTypeSelect = $('#reportTypeSelect');
    const $dynamicInputsContainer = $('#dynamicReportInputs');
    const $reportGeneratorForm = $('#reportGeneratorForm');
    const $submitButton = $reportGeneratorForm.find('button[type="submit"]');
    const phpScriptUrl = 'endpoint/generate_report.php'; // Your PHP script URL

    // Function to update dynamic input fields based on selected report type
    function updateReportInputs() {
        const selectedReportType = $reportTypeSelect.val();
        let htmlInputs = '';

        if (selectedReportType === 'historialVentas' || selectedReportType === 'ganancias' || selectedReportType === 'movimientoDiario') {
            htmlInputs = `
                <label class="form-label text-muted mb-3">2. Ingresa el rango de fechas:</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaInicio">Fecha Inicio:</label>
                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaFin">Fecha Fin:</label>
                            <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
                        </div>
                    </div>
                </div>
            `;
        } else if (selectedReportType === 'movimientoMes') {
            htmlInputs = `
                <label class="form-label text-muted mb-3">2. Ingresa el año:</label>
                <div class="form-group">
                    <label for="anio">Año:</label>
                    <input type="number" class="form-control" id="anio" name="anio" placeholder="Ej: 2023" min="1900" max="2100" required>
                </div>
            `;
        } else {
            // Default message when no report is selected
            htmlInputs = `
                <p class="text-center text-muted m-0">
                    <i class="fas fa-info-circle mr-1"></i> Selecciona un reporte arriba para ver las opciones.
                </p>
            `;
        }

        $dynamicInputsContainer.html(htmlInputs);

        // Enable/disable submit button based on selection
        if (selectedReportType) {
            $submitButton.prop('disabled', false);
        } else {
            $submitButton.prop('disabled', true);
        }
    }

    // Event listener for report type selection change
    $reportTypeSelect.on('change', updateReportInputs);

    // Initial call to set inputs and disable button
    updateReportInputs();

    // Handle form submission
    $reportGeneratorForm.submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        const selectedReportType = $reportTypeSelect.val();
        if (!selectedReportType) {
            toastr.warning('Por favor, selecciona un tipo de reporte antes de continuar.');
            return;
        }

        const formData = new FormData(this);

        // Show loading indicator and disable button
        const card = $(this).closest('.card');
        card.append('<div class="overlay dark"><i class="fas fa-2x fa-sync-alt fa-spin text-white"></i></div>'); // Added 'dark' class for overlay
        $submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Generando...');

        $.ajax({
            url: phpScriptUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhrFields: {
                responseType: 'blob' // Important: Expect a binary blob response
            },
            success: function(response, status, xhr) {
                const contentType = xhr.getResponseHeader('Content-Type');
                if (contentType && contentType.indexOf('application/pdf') !== -1) {
                    const blob = new Blob([response], { type: 'application/pdf' });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;

                    const contentDisposition = xhr.getResponseHeader('Content-Disposition');
                    let filename = 'reporte.pdf';
                    if (contentDisposition) {
                        const filenameMatch = contentDisposition.match(/filename="(.+)"/);
                        if (filenameMatch && filenameMatch.length > 1) {
                            filename = filenameMatch[1];
                        }
                    }
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    toastr.success('¡Reporte generado y descargado exitosamente!');
                } else {
                    const reader = new FileReader();
                    reader.onload = function() {
                        try {
                            const errorJson = JSON.parse(reader.result);
                            toastr.error(errorJson.message || 'Ocurrió un error desconocido al generar el reporte.');
                        } catch (e) {
                            toastr.error('Respuesta inesperada del servidor o formato no válido.');
                        }
                    };
                    reader.readAsText(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errorMessage = 'Error de conexión con el servidor. Intenta de nuevo.';
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage = jqXHR.responseJSON.message;
                } else if (jqXHR.responseText) {
                    try {
                        const errorJson = JSON.parse(jqXHR.responseText);
                        errorMessage = errorJson.message || errorMessage;
                    } catch (e) {
                        // Not JSON, use generic error
                    }
                }
                toastr.error(errorMessage);
            },
            complete: function() {
                card.find('.overlay').remove();
                $submitButton.prop('disabled', false).html('<i class="fas fa-file-download mr-2"></i> Generar y Descargar Reporte');
            }
        });
    });
});   
</script>