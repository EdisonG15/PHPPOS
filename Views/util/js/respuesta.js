function mostrarAlertaRespuesta(respuesta, onSuccessCallback = null, opciones = {}) {
    const {
        mensajeExito = 'éxito', // por defecto busca esta palabra
        mensajeAdvertencia = 'Warning',
        mensajeError = 'Excepción'
    } = opciones;

    const isSuccess = typeof respuesta === 'string' && respuesta.toLowerCase().includes(mensajeExito.toLowerCase());
    const isWarning = typeof respuesta === 'string' && respuesta.toLowerCase().includes(mensajeAdvertencia.toLowerCase());
    const isException = typeof respuesta === 'string' && respuesta.toLowerCase().includes(mensajeError.toLowerCase());

    if (isException) {
        Swal.fire({
            icon: 'error',
            title: 'Error inesperado',
            text: 'No se pudo completar la solicitud. Verifica tu conexión o contacta al soporte.',
            confirmButtonText: 'Cerrar'
        });
        return;
    }

    Swal.fire({
        icon: isSuccess ? 'success' : (isWarning ? 'warning' : 'error'),
        title: isSuccess ? '¡Operación exitosa!' : (isWarning ? 'Advertencia' : 'Error'),
        text: respuesta,
        timer: isSuccess ? 3000 : undefined,
        timerProgressBar: isSuccess,
        background: '#f0f0f0',
        color: '#333',
        confirmButtonText: isSuccess ? undefined : 'Cerrar'
    });

    if (isSuccess && typeof onSuccessCallback === 'function') {
        onSuccessCallback();
    }
}

function manejarErrorAjax() {
    Swal.fire({
        icon: 'error',
        title: 'Error inesperado',
        text: 'No se pudo completar la solicitud. Verifica tu conexión o contacta al soporte.',
        confirmButtonText: 'Cerrar'
    });
}

