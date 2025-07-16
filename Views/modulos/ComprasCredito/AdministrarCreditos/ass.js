  
< !-- < script >
 var table_credito_vigente = 0;
var table_credito_finalizado = 0;
var table_historial_abonos;
var accion = 0;
var tipoAbono = 0;
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
            longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ]
        }
    },
    onReady: function (selectedDates, dateStr, instance) {
        if (!instance.calendarContainer.querySelector(".flatpickr-custom-buttons")) {
            const btnContainer = document.createElement("div");
            btnContainer.className = "flatpickr-custom-buttons";

            const btnCancelar = document.createElement("button");
            btnCancelar.textContent = "Cancelar";
            btnCancelar.className = "btn-cancelar";
            btnCancelar.addEventListener("click", () => {
                instance.clear();
                instance.close();
            });

            btnContainer.appendChild(btnCancelar);
            instance.calendarContainer.appendChild(btnContainer);
        }
    },
    onChange: function (selectedDates) {
        selectedRange = selectedDates;
    }
});

$(document).ready(function () {
    // Inicializa la pestaña activa al cargar la página
    if ($('#content-vigentes-tab').hasClass('active')) {
        cargarCreditoCompraVigente('Cobrables'); // O el estado inicial por defecto
    }

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        var targetTabId = $(e.target).attr('data-bs-target'); // La ID de la pestaña recién activada

        if (targetTabId === '#content-vigentes') {
            cargarCreditoCompraVigente('Cobrables'); // Carga con el estado por defecto o el que necesites
        } else if (targetTabId === '#content-finalizados') {
            // Necesitarás decidir qué estado inicial y fechas pasar aquí.
            // Por ejemplo, cargar todos los finalizados sin filtros de fecha inicialmente.
            cargarCreditoCompraFinalizado('Finalizado', '', '');
        }

        // ¡Esta línea es CRUCIAL para que DataTables se redibuje correctamente!
        // Le indica a DataTables que recalcule los anchos de las columnas y la capacidad de respuesta.
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust().responsive.recalc();
    });

    const today = new Date();

    // Fecha 15 días antes
    const startDate = new Date(today);
    startDate.setDate(today.getDate() - 15);
    // Fecha 15 días después
    const endDate = new Date(today);
    endDate.setDate(today.getDate() + 15);

    // Suponiendo que tienes una función para formatear fechas
    const fechaInicio = formatDate(startDate);
    const fechaFin = formatDate(endDate);
    let tipo_estado_finalizado = "Finalizado";
    let tipo_estado_vigente = "Cobrables";

    // Puedes pasarlas a tu función
    cargarCreditoCompraFinalizado(tipo_estado_finalizado, fechaInicio, fechaFin);
    cargarCreditoCompraVigente(tipo_estado_vigente, "", "");

    $("#iptNombreProveedor").keyup(function () {
        const index = $(this).data('index'); // obtiene el índice desde el atributo
        const valor = this.value; // obtiene el valor del input
        table_credito_vigente.column(index).search(valor).draw(); // aplica el filtro
    });

    $("#btnBuscarVigente").on('click', function () {
        let tipo_estado = $("#selEstadoProveedorVigente").val();
        cargarCreditoCompraVigente(tipo_estado, "", "");
    });

    $("#montoAbono").keyup(function () {

        let inputVal = $(this).val().replace(/,/g, ''); // elimina comas

        // Validación: solo permite números válidos sin ceros innecesarios al inicio
        if (!/^(?!0\d)\d*(\.\d{0,2})?$/.test(inputVal)) {
            $("#nuevoSaldo").val("");
            $("#divVuelto").hide();
            $("#montoVuelto").val("");
            return;
        }

        let montoAbono = parseFloat(inputVal);
        let saldoRestante = parseFloat($("#saldoRestante").val().replace(/,/g, ''));

        const $divVuelto = $("#divVuelto");
        const $montoVuelto = $("#montoVuelto");

        if (isNaN(montoAbono) || montoAbono < 0) {
            $("#nuevoSaldo").val("");
            $divVuelto.hide();
            $montoVuelto.val("");
            return;
        }

        if (isNaN(saldoRestante) || saldoRestante < 0) {
            $("#nuevoSaldo").val("Error");
            $divVuelto.hide();
            $montoVuelto.val("");
            return;
        }

        let nuevoSaldoCalculado;
        let vueltoCalculado = 0;

        if (montoAbono > saldoRestante) {
            nuevoSaldoCalculado = 0;
            vueltoCalculado = montoAbono - saldoRestante;
            $montoVuelto.val(vueltoCalculado.toFixed(2));
            $divVuelto.show();
        } else {
            nuevoSaldoCalculado = saldoRestante - montoAbono;
            $divVuelto.hide();
            $montoVuelto.val("");
        }

        $("#nuevoSaldo").val(nuevoSaldoCalculado.toFixed(2));

    });

    $("#btnBuscarFinalizado").on('click', function () {

        let tipo_estado = $("#selEstadoProveedorFinalizado").val();
        let tieneFechas = selectedRange.length === 2;

        let fechaInicio = null;
        let fechaFin = null;

        if (tieneFechas) {
            fechaInicio = formatDate(selectedRange[0]);
            fechaFin = formatDate(selectedRange[1]);
        }

        if (tipo_estado || tieneFechas) {
            cargarCreditoCompraFinalizado(tipo_estado, fechaInicio, fechaFin);
        } else {
            alert("Por favor selecciona al menos un filtro (estado o rango de fechas).");
        }

    });

    $('#tbl_credito_vigente').on('click', '.btnAbono', function (e) {
        $("#btn_procesar_abono").prop('disabled', false);
        tipoAbono = 1;
        $("#modalAbonoCredito").modal('show');
        accion = 2;
        let data = table_credito_vigente.row($(this).parents('tr')).data();
        // Declarar fuera del if
        let diasVencido = 0;
        let fechaVencimientoStr = data[11];
        if (fechaVencimientoStr) {
            let fechaVencimiento = new Date(fechaVencimientoStr);
            let hoy = new Date();

            // Limpiar horas para comparar solo fechas
            fechaVencimiento.setHours(0, 0, 0, 0);
            hoy.setHours(0, 0, 0, 0);

            let diferenciaMs = hoy - fechaVencimiento;
            diasVencido = Math.floor(diferenciaMs / (1000 * 60 * 60 * 24));

            if (diasVencido < 0) {
                diasVencido = 0; // aún no vence
            }
        }
        $("#txtIdCompra").val(data[1]);
        $("#txtIdCompraCredito").val(data[2]);
        $("#id_proveedor").val(data[3]);
        $("#proveedor").val(data[4]);
        $("#montoTotalCredito").val(data[7]);
        $("#montoAbonado").val(data[8]);
        $("#saldoRestante").val(data[9]);
        $("#fechaVencimientoCredito").val(data[11]);
        $("#diasRestantesVencimiento").val(diasVencido);
        $("#montoAbono").val("");
        $("#observacion").val("");
        $("#divVuelto").hide();


    });


    $("#btn_procesar_abono").on('click', function () {

        $("#btn_procesar_abono").prop('disabled', true);
        let montoAbono = parseFloat($("#montoAbono").val());
        let nuevoSaldo = parseFloat($("#nuevoSaldo").val());
        let saldoRestante = parseFloat($("#saldoRestante").val());
        let observacion = $("#observacion").val().trim();

        // Validación: abono mayor que cero
        if (isNaN(montoAbono) || montoAbono <= 0) {

            $("#btn_procesar_abono").prop('disabled', false);
            return Swal.fire({
                icon: 'warning',
                title: 'Monto inválido',
                text: 'El monto del abono debe ser mayor que cero.',
                confirmButtonText: 'Aceptar'
            });
        }

        // Validación: observación no vacía
        if (observacion === "") {
            $("#btn_procesar_abono").prop('disabled', false);
            return Swal.fire({
                icon: 'warning',
                title: 'Observación requerida',
                text: 'Por favor, ingresa una observación.',
                confirmButtonText: 'Aceptar'
            });
        }

        // Si el nuevo saldo es 0, usamos el saldo restante como abono
        if (nuevoSaldo === 0) {
            montoAbono = saldoRestante;
        }

        let datos = new FormData();
        datos.append('accion', accion);
        datos.append('id_caja', $("#txtId_caja").val());
        datos.append('id_Compra', $("#txtIdCompra").val());
        datos.append('id_compra_credito', $("#txtIdCompraCredito").val());
        datos.append('abonado', montoAbono.toFixed(2));
        datos.append('observacion', observacion);
        datos.append('metodo_pago', 1);
        $.ajax({
            url: "ajax/administrar_creditos_compra.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta) {
                mostrarAlertaRespuesta(respuesta, function () {
                    $("#modalAbonoCredito").modal('hide');
                    table_credito_vigente.ajax.reload();
                    Limpiar();


                }, {
                    mensajeExito: "éxito",
                    mensajeAdvertencia: "Warning",
                    mensajeError: "Excepción"
                });
            },
            error: manejarErrorAjax
        }).always(function () {
            $("#btn_procesar_abono").prop('disabled', false);
        });
    });

});

// Manejador de eventos para el botón "Historial de Abonos" en las tablas
$(document).on('click', '.btnVerHistorialAbonos', function () {
    var idCredito = $(this).data('idcredito'); // Obtiene el ID del crédito de la fila
    let data = table_credito_finalizado.row($(this).parents('tr')).data();
    // var proveedorNombre = $(this).closest('tr').find('td').eq(1).text(); // Asumiendo que el proveedor está en la segunda columna visible (ajusta el índice si es diferente)
    // var numeroCredito = $(this).closest('tr').find('td').eq(6).text(); // Asumiendo que el Nro Credito está en la quinta columna visible (ajusta el índice)
    var proveedorNombre = data[4]; // Asumiendo que el proveedor está en la segunda columna visible (ajusta el índice si es diferente)
    var numeroCredito = data[6]; // Asumiendo que el Nro Credito está en la quinta columna visible (ajusta el índice)

    // Actualiza los títulos del modal
    $('#spanNumeroCredito').text(numeroCredito);
    $('#spanProveedorModal').text(proveedorNombre);

    // Muestra el modal
    $('#modalHistorialAbonos').modal('show');

    // Llama a la función para cargar la tabla de historial de abonos dentro del modal
    cargarHistorialAbonos(idCredito);
});

// Función para cargar la tabla de créditos Vigentes
function cargarCreditoCompraVigente(tipo_estado) {
    // Destruye la instancia existente de DataTable si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tbl_credito_vigente')) {
        $('#tbl_credito_vigente').DataTable().destroy();
    }
    table_credito_vigente = $("#tbl_credito_vigente").DataTable({
        // ... (tu configuración existente de DataTable para Vigentes) ...
        ajax: {
            url: "ajax/administrar_creditos_compra.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                'accion': 1,
                'filtro': 'Todos',
                'filtroEstado': tipo_estado,
                'fechaInicio': "",
                'fechaFin': ""
            },
        },
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
            targets: 0,
            orderable: false,
            className: 'control'
        },
        {
            targets: 1,
            visible: false
        }, {
            targets: 2,
            visible: false
        },
        {
            targets: 3,
            visible: false
        }, {
            targets: 6,
            visible: false
        },
        {
            targets: 13,
            orderable: false,
            render: function (data, type, full, meta) {
                return `
            <div class="dropdown text-center">
              <button class="btn-acciones dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
                Acciones <i class="fas fa-caret-down ms-2"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
                <li>
                  <a class="dropdown-item btnAbono" href="#" data-id="${full.id_venta_credito}" title="Realizar abono a este crédito" style="cursor:pointer;">
                    <i class="fas fa-hand-holding-usd"></i> Abono
                  </a>
                </li>
              </ul>
            </div>`;
            }
        }
        ],
        "order": [
            [0, 'desc']
        ],
        lengthMenu: [5, 10, 15, 20, 50],
        "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
}

// Función para cargar la tabla de créditos Finalizados
function cargarCreditoCompraFinalizado(tipo_estado, fechaDesde, fechaHasta) {
    // Destruye la instancia existente de DataTable si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tbl_credito_finalizado')) {
        $('#tbl_credito_finalizado').DataTable().destroy();
    }
    table_credito_finalizado = $("#tbl_credito_finalizado").DataTable({

        ajax: {
            url: "ajax/administrar_creditos_compra.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                'accion': 1,
                'filtro': 'Todos',
                'filtroEstado': tipo_estado,
                'fechaInicio': fechaDesde,
                'fechaFin': fechaHasta
            },
        },
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
            targets: 0,
            orderable: false,
            className: 'control'
        },
        {
            targets: 1,
            visible: false
        }, {
            targets: 2,
            visible: false
        },
        {
            targets: 3,
            visible: false
        }, {
            targets: 6,
            visible: false
        },
        {
            targets: 13, // Columna de Opciones
            orderable: false,
            render: function (data, type, full, meta) {
                // full.id_credito sería el ID único del crédito que quieres consultar
                return `
            <div class="dropdown text-center">
                <button class="btn-acciones dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
                    Acciones <i class="fas fa-caret-down ms-2"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
                    <li>
                        <a class="dropdown-item btnVerHistorialAbonos" href="#" 
                           data-idcredito="${full.IdCompraCreditos}"  
                           title="Ver historial de abonos" style="cursor:pointer;">
                            <i class="fas fa-history"></i> Historial de Abonos
                        </a>
                    </li>
                </ul>
            </div>`;
            }
        }

        ],
        "order": [
            [0, 'desc']
        ],
        lengthMenu: [5, 10, 15, 20, 50],
        "pageLength": 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
}
// Función para formatear la fecha a 'YYYY-MM-DD' para el backend
function formatDate(date) {
    const d = new Date(date);
    const month = '' + (d.getMonth() + 1).toString().padStart(2, '0');
    const day = '' + d.getDate().toString().padStart(2, '0');
    const year = d.getFullYear();
    //return [year, month, day].join('-');
    return `${year}-${month}-${day}`;
}


function cargarHistorialAbonos(idCredito) {
    // Destruye la instancia existente de DataTable si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tblHistorialAbonos')) {
        $('#tblHistorialAbonos').DataTable().destroy();
    }

    table_historial_abonos = $("#tblHistorialAbonos").DataTable({
        "ajax": {
            "url": "ajax/administrar_creditos_compra.ajax.php", // Tu archivo AJAX
            "type": "POST",
            "data": {
                'accion': 3, // Una nueva acción para obtener el historial de abonos
                'id_credito': idCredito
            },
            "dataSrc": "" // Los datos deben venir directamente como un array de objetos
        },
        "columns": [
            { "data": "id_abono" }, // Asegúrate de que los nombres de las propiedades coincidan con tu JSON de respuesta
            { "data": "fecha_abono" },
            { "data": "monto_abono" },
            { "data": "forma_pago" },
            { "data": "comentario_referencia" }
        ],
        "responsive": true, // Activa la responsividad para la tabla dentro del modal
        "deferRender": true, // Optimización para tablas grandes
        "retrieve": true, // Permite que DataTable retorne la instancia existente si ya está creada
        "paging": true, // Paginación
        "lengthChange": false, // No permitir cambiar la cantidad de entradas por página
        "searching": false, // No mostrar el campo de búsqueda en este modal
        "ordering": false, // No permitir ordenar las columnas en este modal (o ajusta según necesidad)
        "info": false, // No mostrar "Showing X to Y of Z entries"
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "drawCallback": function () {
            // Ajustar columnas después de que el modal se muestre y la tabla se dibuje
            // Esto es crucial para la responsividad dentro de un modal
            if ($.fn.DataTable.isDataTable('#tblHistorialAbonos')) {
                $('#tblHistorialAbonos').DataTable().columns.adjust().responsive.recalc();
            }
        }
    });
    // Ajustar las columnas cuando el modal se ha mostrado completamente
    // Esto asegura que DataTables calcule correctamente los anchos
    $('#modalHistorialAbonos').on('shown.bs.modal', function () {
        if ($.fn.DataTable.isDataTable('#tblHistorialAbonos')) {
            $('#tblHistorialAbonos').DataTable().columns.adjust().responsive.recalc();
        }
    });
} -->

