<?php
session_start();
?>
<style>
  .form-floating label {
    color: #6c757d;
    /* gris medio, suave */
    font-weight: 500;
    /* peso medio */
    text-shadow: 0.5px 0.5px 1px rgba(0, 0, 0, 0.1);
    /* sombra sutil */
    transition: all 0.3s ease-in-out;
  }

  .form-floating input:focus+label {
    color: #007bff;
    /* cambia de color al enfocar (azul Bootstrap) */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
  }

</style>
<script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
<div class="content-header py-3">
  <div class="container-fluid">
    <h2 class="fw-bold text-primary">Administrar Créditos - Clientes</h2>
  </div>
</div>

<div class="container-fluid">
  <ul class="nav nav-tabs" id="tabs-creditos" role="tablist">

    <li class="nav-item">
      <button class="nav-link" id="content-finalizados-tab" data-bs-toggle="tab" data-bs-target="#content-finalizados" type="button" role="tab">FINALIZADOS</button>
    </li>
    <li class="nav-item">
      <button class="nav-link active" id="content-vigentes-tab" data-bs-toggle="tab" data-bs-target="#content-vigentes" type="button" role="tab">VIGENTES</button>
    </li>
  </ul>

  <div class="tab-content py-4" id="tabsContent-creditos">
   <input id="txtId_usuario" type="hidden" value="<?php
                                                                                echo  $_SESSION["usuario"]->id_usuario ?>" />

                               <input id="txtId_caja" type="hidden" value="<?php
                                                                            echo  $_SESSION["usuario"]->id_caja ?>" />
    <!-- TAB Finalizado -->
    <div class="tab-pane fade " id="content-finalizados" role="tabpanel">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Créditos </h5>
        </div>
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-md-3">
              <label for="iptCedulaCliente_cobrar" class="form-label">Cliente:</label>
              <input type="text" class="form-control" id="iptCedulaCliente_cobrar" autocomplete="off" placeholder="Buscar por nombre o cédula" />
            </div>
            <div class="col-md-3">
              <label for="selEstadoClienteFinalizado">Estado Cliente</label>
              <select class="form-select" id="selEstadoClienteFinalizado">
                <option value="Finalizado" selected>Todo</option>
                <option value="Pagado">Pagado</option>
                <option value="Inactivo">Inactivo</option>
              </select>

            </div>
            <div class="col-md-3">
              <label for="rangoFechaVenta" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFechaVenta" placeholder="Buscar por rango fecha " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarFinalizado"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>
          <div>
            <table id="tbl_credito_finalizadoVentas" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
              <thead class="bg-dark text-left">
                <th></th>
                <th>Id Crédito</th>
                <th>Id Cliente</th>
                <th>Cliente</th>
                <th>Nro Credito</th>
                <th>Monto</th>
                <th>Abono</th>
                <th>Restante</th>
                <th>Fecha Venta</th>
                <th>Fecha Vencimiento</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody class="small text left">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- TAB Vigente -->
    <div class="tab-pane fade show  active " id="content-vigentes" role="tabpanel">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Créditos Abono</h5>
        </div>
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-md-3">
              <label for="iptNombreCliente" class="form-label">Cliente:</label>
              <input type="text" class="form-control" id="iptNombreCliente" data-index="3" placeholder="Buscar por nombre" autocomplete="off" />
            </div>
            <div class="col-md-3">
              <label for="selEstadoClienteVigente">Estado Cliente</label>
              <select class="form-select" id="selEstadoClienteVigente">
                <option value="Cobrables" selected>Todo</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Vencido">Vencido</option>
              </select>

            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarVigente"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>

          <div>
            <table id="tbl_credito_vigenteVenta" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
              <thead class="bg-dark text-left">
                <th></th>
                <th>Id Crédito</th>
                <th>Id Cliente</th>
                <th>Cliente</th>
                <th>Nro Credito</th>
                <th>Monto</th>
                <th>Abono</th>
                <th>Restante</th>
                <th>Fecha Venta</th>
                <th>Fecha Vencimiento</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody class="small text left">

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAbonoCredito" tabindex="-1" aria-labelledby="modalAbonoCreditoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="modalAbonoCreditoLabel">
          <i class="fas fa-hand-holding-usd fa-lg"></i> Registrar Abono de Crédito
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body px-5 py-5 bg-light-subtle">
        <form id="formAbono">
           <input id="txtIdCliente" type="hidden" value="0" />
          <input id="txtIdCredito" type="hidden" value="0" />
          <input id="txtId_caja" type="hidden" value="<?php
                                                      echo  $_SESSION["usuario"]->id_caja ?>" />
          <div class="form-floating mb-4">
            <input type="text" class="form-control form-control-modern" id="clienteNombre" placeholder="Cliente" readonly>
            <label for="clienteNombre">Cliente</label>
          </div>

          <div class="row g-4 mb-4">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control form-control-modern" id="montoTotalCredito" placeholder="Monto Total" readonly>
                <label for="montoTotalCredito">Monto Total del Crédito</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control form-control-modern" id="montoAbonado" placeholder="Monto Abonado" readonly>
                <label for="montoAbonado">Monto Abonado</label>
              </div>
            </div>
          </div>

          <div class="row g-4 mb-4">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control form-control-modern" id="saldoRestante" placeholder="Saldo Restante" readonly>
                <label for="saldoRestante">Saldo Restante</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control text-success fw-bold form-control-modern" id="nuevoSaldo" placeholder="Nuevo Saldo" readonly>
                <label for="nuevoSaldo">Nuevo Saldo (estimado)</label>
              </div>
            </div>
          </div>
          <div class="row g-4 mb-4">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control form-control-modern" id="fechaVencimientoCredito" placeholder="Fecha de Vencimiento" readonly>
                <label for="fechaVencimientoCredito">Fecha de Vencimiento</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control form-control-modern" id="diasRestantesVencimiento" placeholder="Días para Vencimiento" readonly>
                <label for="diasRestantesVencimiento">Días para Vencimiento</label>
              </div>
            </div>
          </div>

          <div class="form-floating mb-4">
            <input type="number" class="form-control form-control-modern" id="montoAbono" placeholder="Monto a Abonar" min="0.01" step="0.01" required>
            <label for="montoAbono">Monto a Abonar</label>
          </div>
          <div class="form-floating mb-4" id="divVuelto" style="display: none;"> <input type="text" class="form-control form-control-modern text-info fw-bold" id="montoVuelto" placeholder="Vuelto a Dar" readonly>
            <label for="montoVuelto">Vuelto a Dar</label>
          </div>

          <div class="form-floating mb-5"> <textarea class="form-control form-control-modern" id="observacion" placeholder="Comentario adicional..." style="height: 100px"></textarea>
            <label for="observacion">Observación</label>
          </div>

          <div class="d-flex justify-content-end">
            <button type="button" id="btn_procesar_abono" class="btn btn-success btn-lg px-5 shadow-sm btn-modern-success">
              <i class="fas fa-check-circle me-3"></i>Confirmar Abono
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalHistorialAbonos" tabindex="-1" aria-labelledby="modalHistorialAbonosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <div class="modal-content">
      <div class="modal-header bg-primary text-white"> <h5 class="modal-title" id="modalHistorialAbonosLabel">
          <i class="fas fa-history me-2"></i>Historial de Abonos - Crédito N°: <span id="spanNumeroCredito"></span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-3">Mostrando los abonos para el crédito del proveedor: <strong id="spanProveedorModal"></strong></p>
        <table id="tblHistorialAbonos" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
          <thead class="bg-dark text-left text-white"> <tr>
              <th>ID Abono</th>
              <th>Fecha Abono</th>
              <th>Monto Abono</th>
              <th>Forma de Pago</th>
              <th>Comentario/Ref.</th>
            </tr>
          </thead>
          <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 

<style>
  .bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #0056b3); /* Un azul más vibrante que el primary por defecto */
  }
  /* Si tus botones "Acciones" tienen un estilo específico que desees replicar */
  .btn-acciones {
      background-color: #f8f9fa; /* o el color de fondo de tu elección */
      border: 1px solid #ced4da;
      color: #343a40;
      padding: 0.375rem 0.75rem;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: all 0.2s ease-in-out;
  }
  .btn-acciones:hover {
      background-color: #e2e6ea;
      border-color: #dae0e5;
  }
  </style>

<script>
 var table_credito_vigenteVenta = 0;
  var table_credito_finalizadoVenta = 0;
  var accion = 0;
  var tipoAbono=0;
  var selectedRangeVenta = [];

function formatDate(date) {
    let d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [day, month, year].join('/');
}

$(document).ready(function() {
  verificarSiExisteCajaAbierta();
  flatpickr("#rangoFechaVenta", {
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
            selectedRangeVenta = selectedDates;
        }
  });

      // 2. CARGA INICIAL DE DATOS
    // ===================================
    // Carga la tabla que corresponde a la pestaña activa al iniciar
    if ($('#content-vigentes-tab').hasClass('active')) {
        cargarCreditoVentaVigente('Cobrables', "", "");
    } else { // Asume que la otra es la activa por defecto
        const today = new Date();
        const startDate = new Date(today);
        startDate.setDate(today.getDate() - 15);
        const endDate = new Date(today);
        endDate.setDate(today.getDate() + 15);
        cargarCreditoVentaFinalizado("Finalizado", formatDate(startDate), formatDate(endDate));
    }

    // Evento para cambio de pestañas
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var targetTabId = $(e.target).attr('data-bs-target');

        if (targetTabId === '#content-vigentes') {
            // Solo carga si la tabla no ha sido inicializada
            if (!$.fn.DataTable.isDataTable('#tbl_credito_vigenteVenta')) {
                 cargarCreditoVentaVigente('Cobrables', "", "");
            }
        } else if (targetTabId === '#content-finalizados') {
             // Carga siempre que se cambia a esta pestaña o solo si no ha sido inicializada
            let tieneFechas = selectedRangeVenta.length === 2;
            let fechaInicio = tieneFechas ? formatDate(selectedRangeVenta[0]) : '';
            let fechaFin = tieneFechas ? formatDate(selectedRangeVenta[1]) : '';
            cargarCreditoVentaFinalizado('Finalizado', fechaInicio, fechaFin);
        }

        // Ajusta las columnas de las tablas DataTables al cambiar de pestaña
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust().responsive.recalc();
    });


    //   $("#iptNombreCliente").keyup(function() {
    //   const index = $(this).data('index'); // obtiene el índice desde el atributo
    //   const valor = this.value; // obtiene el valor del input
    //   table_credito_vigenteVenta.column(index).search(valor).draw(); // aplica el filtro
    // });

    // Filtro para nombre de proveedor
    $(document).on('keyup', '#iptNombreCliente', function() {
        // Asegúrate de que la variable table_credito_vigenteVenta esté correctamente inicializada
        // y sea accesible en este scope.
        if (table_credito_vigenteVenta) {
            const index = $(this).data('index');
            const valor = this.value;
            table_credito_vigenteVenta.column(index).search(valor).draw();
        }
    });



      $(document).on('click', '#btnBuscarVigente', function() {
        let tipo_estado = $("#selEstadoClienteVigente").val();
        cargarCreditoVentaVigente(tipo_estado, "", "");
     });

     $(document).on('click', '#btnBuscarFinalizado', function() {
     let tipo_estado = $("#selEstadoClienteFinalizado").val();
      let tieneFechas = selectedRangeVenta.length === 2;

      let fechaInicio = null;
      let fechaFin = null;

      if (tieneFechas) {
        fechaInicio = formatDate(selectedRangeVenta[0]);
        fechaFin = formatDate(selectedRangeVenta[1]);
      }

      if (tipo_estado || tieneFechas) {
        cargarCreditoVentaFinalizado(tipo_estado, fechaInicio, fechaFin);
      } else {
        alert("Por favor selecciona al menos un filtro (estado o rango de fechas).");
      }

 });


   // Cálculo de abono y vuelto
    $(document).on('keyup', '#montoAbono', function() {
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


}); //fin  ready

$(document).on('click', '.btnVerHistorialAbonos', function(e) {
    // Evita el comportamiento por defecto del enlace si es un <a>
    e.preventDefault(); 

    let data = table_credito_finalizadoVenta.row($(this).parents('tr')).data();
    
    var idCredito = data.id_venta_credito; // Asumiendo que 'IdCompraCreditos' es el nombre de la propiedad en tu objeto de datos
    var proveedorNombre = data[3]; // Asumiendo que el nombre del proveedor es la columna de índice 4
    var numeroCredito = data[4]; // Asumiendo que el número de crédito es la columna de índice 6

    // Actualiza los títulos del modal
    $('#spanNumeroCredito').text(numeroCredito);
    $('#spanProveedorModal').text(proveedorNombre);

    // Muestra el modal
    $('#modalHistorialAbonos').modal('show');

    // Llama a la función para cargar la tabla de historial de abonos dentro del modal
    cargarHistorialAbonos(idCredito);
});

$(document).on('click', '.btnAbono', function(e) {
    tipoAbono=1;
      $("#modalAbonoCredito").modal('show');
      accion = 2;
      let data = table_credito_vigenteVenta.row($(this).parents('tr')).data();
      // Declarar fuera del if
      let diasVencido = 0;
      let fechaVencimientoStr = data[9];
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

      $("#txtIdCredito").val(data[1]);
      $("#clienteNombre").val(data[3]);
      $("#montoTotalCredito").val(data[5]);
      $("#montoAbonado").val(data[6]);
      $("#saldoRestante").val(data[7]);
      $("#fechaVencimientoCredito").val(data[9]);
      $("#diasRestantesVencimiento").val(diasVencido);
      $("#montoAbono").val("");
      $("#divVuelto").hide();
      //   $("#iptEfectivoRecibido").val("");
});
  
$(document).on('click', '.btnAbonoMultiple', function(e) {
  tipoAbono=2;
      accion=2;
      e.preventDefault();
      $("#modalAbonoCredito").modal('show');
      const idCliente = $(this).data('id');
      const datos = new FormData();
      datos.append('accion', 3);
      datos.append('id_cliente', idCliente);
      $.ajax({
        url: "ajax/administrar_creditos.ajax.php",
        method: "POST",
        data: datos,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(respuesta) {
          console.log("resp:", respuesta);
          if (respuesta.length > 0) {
            const datos = respuesta[0];
            $("#txtIdCliente").val(datos['id_cliente']);
            $("#clienteNombre").val(datos['nombre_cliente']);
            $("#montoTotalCredito").val(datos['monto_total']);
            $("#montoAbonado").val(datos['monto_abonado']);
            $("#saldoRestante").val(datos['saldo_pendiente']);
          } else {
            alert("No se encontró información del cliente.");
          }
        }
      });
});


  $(document).on('click', '#btn_procesar_abono', function () {
  const btn = $(this);
  if (btn.prop('disabled')) return; // Evita múltiples clics
  btn.prop('disabled', true);       // 🔒 Desactiva el botón inmediatamente

  let montoAbono = parseFloat($("#montoAbono").val());
  let nuevoSaldo = parseFloat($("#nuevoSaldo").val());
  let saldoRestante = parseFloat($("#saldoRestante").val());
  let observacion = $("#observacion").val().trim();

  // Validación: abono mayor que cero
  if (isNaN(montoAbono) || montoAbono <= 0) {
    btn.prop('disabled', false); // 🔓 Rehabilita si hay error
    return Swal.fire({
      icon: 'warning',
      title: 'Monto inválido',
      text: 'El monto del abono debe ser mayor que cero.',
      confirmButtonText: 'Aceptar'
    });
  }

  // Validación: observación no vacía
  if (observacion === "") {
    btn.prop('disabled', false); // 🔓 Rehabilita si hay error
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
  datos.append('IdCliente', $("#txtIdCliente").val());
  datos.append('id_venta_credito', $("#txtIdCredito").val());
  datos.append('abono', montoAbono.toFixed(2));
  datos.append('observacion', observacion);
  datos.append('metodo_pago', 1);
  datos.append('tipoAbono', tipoAbono);

  $.ajax({
    url: "ajax/administrar_creditos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      mostrarAlertaRespuesta(respuesta, function () {
        table_credito_vigenteVenta.ajax.reload();
        Limpiar();
        $("#modalAbonoCredito").modal('hide');
      }, {
        mensajeExito: "éxito",
        mensajeAdvertencia: "Warning",
        mensajeError: "Excepción"
      });
    },
    error: function () {
      manejarErrorAjax();
    },
    complete: function () {
      btn.prop('disabled', false); // 🔓 Siempre se vuelve a habilitar
    }
  });
});


  function cargarCreditoVentaVigente(tipo_estado, fechaDesde, fechaHasta) {
    table_credito_vigenteVenta = $("#tbl_credito_vigenteVenta").DataTable({
      destroy: true, // importante para recargar correctamente
      ajax: {
        url: "ajax/administrar_creditos.ajax.php",
        dataSrc: '', // Que la data que retorne  no queremos 
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
          targets: 4,
          visible: false
        }, 

        {
          targets: 11,
          orderable: false, // no ordenar
          render: function(data, type, full, meta) {
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
        <li>
          <a class="dropdown-item btnAbonoMultiple" href="#" data-id="${full.id_cliente}" title="Realizar abono a todos los créditos del cliente" style="cursor:pointer;">
            <i class="fas fa-layer-group"></i> Abono múltiple
          </a>
        </li>
      </ul>
    </div>
                      `;
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

  function cargarCreditoVentaFinalizado(tipo_estado, fechaDesde, fechaHasta) {
      table_credito_finalizadoVenta = $("#tbl_credito_finalizadoVentas").DataTable({
      destroy: true,

      ajax: {
        url: "ajax/administrar_creditos.ajax.php",
        dataSrc: '', // Que la data que retorne  no queremos 
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
          targets: 4,
          visible: false
        },
        {
     targets: 11, // Columna de Opciones
     orderable: false,
     render: function(data, type, full, meta) {
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



    function Limpiar() {
    $("#txtIdCredito").val("");
    $("#clienteNombre").val("");
    $("#montoTotalCredito").val("");
    $("#montoAbonado").val("");
    $("#saldoRestante").val("");
    $("#fechaVencimientoCredito").val("");
    $("#diasRestantesVencimiento").val("");
    $("#montoAbono").val("");
    $("#divVuelto").val("");
    $("#observacion").val("");

  }

    function cargarHistorialAbonos(idCredito) {
     // Destruye la instancia existente de DataTable si ya está inicializada
      if ($.fn.DataTable.isDataTable('#tblHistorialAbonos')) {
        $('#tblHistorialAbonos').DataTable().destroy();
      }

     table_historial_abonos = $("#tblHistorialAbonos").DataTable({
        "ajax": {
            "url": "ajax/administrar_creditos.ajax.php", // Tu archivo AJAX
            "type": "POST",
            "data": {
                'accion': 4, // Una nueva acción para obtener el historial de abonos
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
        "drawCallback": function() {
            // Ajustar columnas después de que el modal se muestre y la tabla se dibuje
            // Esto es crucial para la responsividad dentro de un modal
            if ($.fn.DataTable.isDataTable('#tblHistorialAbonos')) {
                $('#tblHistorialAbonos').DataTable().columns.adjust().responsive.recalc();
            }
        }
    });

  }

function verificarSiExisteCajaAbierta() {
    let datos = new FormData();
    datos.append("opcion", 1);
    datos.append("txt_id_caja", $("#txtId_caja").val());
    datos.append("txt_id_usuario", $("#txtId_usuario").val());

    $.ajax({
        url: "ajax/validar.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (parseInt(respuesta['existe']) == 0) {
                // $("#btnRegistrarProveedor").prop('disabled', true);
                // $("#btnAgregarProducto").prop('disabled', true);
                // $("#btnIniciarComprasContado").prop('disabled', true);
                // $("#btnIniciarComprasCredit").prop('disabled', true);
                $(".btnAbono").prop("disabled", true);
                  $(".btnAbonoMultiple").prop("disabled", true);
                Swal.fire({
                    title: 'La caja se encuentra cerrada',
                    text: 'Todas las opciones están deshabilitadas. Por favor, abra la caja primero para habilitar las opciones.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Abrir Caja',
                    cancelButtonText: 'Cerrar',
                    reverseButtons: true,
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Carga la vista usando tu función interna
                        CargarContenido('Views/modulos/AdministrarCaja/MovimientoCaja/movimiento_cajas.php', 'content-wrapper');
                    }
                });
            }
        }
    });
}

</script>