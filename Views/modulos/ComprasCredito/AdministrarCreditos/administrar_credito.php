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
    <h2 class="fw-bold text-primary">Administrar Créditos - Proveedor</h2>
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

    <!-- TAB Finalizado -->
    <div class="tab-pane fade " id="content-finalizados" role="tabpanel">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Créditos </h5>
        </div>
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
           <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION['usuario']->id_caja ?>" />
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-md-3">
              <label for="iptCedulaCliente_cobrar" class="form-label">Cliente:</label>
              <input type="text" class="form-control" id="iptCedulaCliente_cobrar" autocomplete="off" placeholder="Buscar por nombre o cédula" />
            </div>
            <div class="col-md-3">
              <label for="selEstadoProveedorFinalizado">Estado Cliente</label>
              <select class="form-select" id="selEstadoProveedorFinalizado">
                <option value="Finalizado" selected>Todo</option>
                <option value="Pagado">Pagado</option>
                <option value="Inactivo">Inactivo</option>
              </select>

            </div>
            <div class="col-md-3">
              <label for="rangoFechaCreditosCompras" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="rangoFechaCreditosCompras" placeholder="Buscar por Fecha " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarFinalizadoCompras"><i class="fas fa-search"></i> Buscar</button>
            </div>


          </div>

          <div>
            <table id="tbl_credito_finalizadoCompras" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
              <thead class="bg-dark text-left">
                <th></th>
                <th>Id Compra</th>
                <th>Id Crédito</th>
                <th>Id Proveedor</th>
                <th>Proveedor</th>
                <th>Razon Social</th>
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
              <label for="iptNombreProveedor" class="form-label">Proveedor:</label>
              <input type="text" class="form-control" id="iptNombreProveedor" data-index="3" placeholder="Buscar por nombre" autocomplete="off" />
            </div>
            <div class="col-md-3">
              <label for="selEstadoProveedorVigente">Estado Proveedor</label>
              <select class="form-select" id="selEstadoProveedorVigente">
                <option value="Cobrables" selected>Todo</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Vencido">Vencido</option>
              </select>

            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarVigenteCompras"><i class="fas fa-search"></i> Buscar</button>
            </div>
          </div>

          <div>
            <table id="tbl_credito_vigenteCompras" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
              <thead class="bg-dark text-left">
                <th></th>
                <th>Id Compra</th>
                <th>Id Crédito</th>
                <th>Id Proveedor</th>
                <th>Proveedor</th>
                <th>Razon Social</th>
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

    <!-- Repite estructura similar para los tabs de VIGENTES y FINALIZADOS -->
  </div>
</div>
<!-- Modal Abono Crédito Moderno -->

<div class="modal fade" id="modalAbonoCreditoCompras" tabindex="-1" aria-labelledby="modalAbonoCreditoComprasLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="modalAbonoCreditoComprasLabel">
          <i class="fas fa-hand-holding-usd fa-lg"></i> Registrar Abono de Crédito
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body px-5 py-5 bg-light-subtle">
        <form id="formAbono">
          
           <input id="txtIdCompra" type="hidden" value="0" />
           <input id="txtIdCompraCredito" type="hidden" value="0" />
           <input id="id_proveedor" type="hidden" value="0" />
        
          <div class="form-floating mb-4">
            <input type="text" class="form-control form-control-modern" id="proveedor" placeholder="proveedor" readonly>
            <label for="proveedor">Nombre del Proveedor</label>
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
            <button type="button" id="btn_procesar_abonoCompras" class="btn btn-success btn-lg px-5 shadow-sm btn-modern-success">
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
        <table id="tblHistorialAbonosCompras" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
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
// Variables globales
var table_credito_vigenteCompras = null; // Inicializar como null para verificar si ya se instanció
var table_credito_finalizadoCompras = null;
var selectedRangeAdminitrarCompras = [];

// Función para formatear fechas (asegúrate de que exista y funcione como esperas)
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
    // 1. INICIALIZACIÓN DE COMPONENTES
    // ===================================
    flatpickr("#rangoFechaCreditosCompras", {
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
            selectedRangeAdminitrarCompras = selectedDates;
        }
    });

    // 2. CARGA INICIAL DE DATOS
    // ===================================
    // Carga la tabla que corresponde a la pestaña activa al iniciar
    if ($('#content-vigentes-tab').hasClass('active')) {
        cargarCreditoCompraVigente('Cobrables', "", "");
    } else { // Asume que la otra es la activa por defecto
        const today = new Date();
        const startDate = new Date(today);
        startDate.setDate(today.getDate() - 15);
        const endDate = new Date(today);
        endDate.setDate(today.getDate() + 15);

        cargarCreditoCompraFinalizadoCompras("Finalizado", formatDate(startDate), formatDate(endDate));
    }


    // 3. MANEJADORES DE EVENTOS
    // ===================================

    // Evento para cambio de pestañas
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var targetTabId = $(e.target).attr('data-bs-target');

        if (targetTabId === '#content-vigentes') {
            // Solo carga si la tabla no ha sido inicializada
            if (!$.fn.DataTable.isDataTable('#tbl_credito_vigenteCompras')) {
                 cargarCreditoCompraVigente('Cobrables', "", "");
            }
        } else if (targetTabId === '#content-finalizados') {
             // Carga siempre que se cambia a esta pestaña o solo si no ha sido inicializada
            let tieneFechas = selectedRangeAdminitrarCompras.length === 2;
            let fechaInicio = tieneFechas ? formatDate(selectedRangeAdminitrarCompras[0]) : '';
            let fechaFin = tieneFechas ? formatDate(selectedRangeAdminitrarCompras[1]) : '';
            cargarCreditoCompraFinalizadoCompras('Finalizado', fechaInicio, fechaFin);
        }

        // Ajusta las columnas de las tablas DataTables al cambiar de pestaña
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust().responsive.recalc();
    });


    // *** EVENTOS CORREGIDOS CON DELEGACIÓN ***

    // Filtro para nombre de proveedor
    $(document).on('keyup', '#iptNombreProveedor', function() {
        // Asegúrate de que la variable table_credito_vigenteCompras esté correctamente inicializada
        // y sea accesible en este scope.
        if (table_credito_vigenteCompras) {
            const index = $(this).data('index');
            const valor = this.value;
            table_credito_vigenteCompras.column(index).search(valor).draw();
        }
    });


    // Cálculo de abono y vuelto
    $(document).on('keyup', '#montoAbono', function() {
        let inputVal = $(this).val().replace(/,/g, ''); // Elimina comas

        // Permite valores vacíos para poder borrar el contenido
        if (inputVal === "") {
            $("#nuevoSaldo").val("");
            $("#divVuelto").hide();
            $("#montoVuelto").val("");
            return;
        }

        // Validación mejorada
        if (!/^\d*\.?\d{0,2}$/.test(inputVal) || isNaN(parseFloat(inputVal))) {
            return; // Si no es un número válido, no hace nada
        }

        let montoAbono = parseFloat(inputVal);
        let saldoRestante = parseFloat($("#saldoRestante").val().replace(/,/g, ''));

        const $divVuelto = $("#divVuelto");
        const $montoVuelto = $("#montoVuelto");

        if (isNaN(saldoRestante)) {
            $("#nuevoSaldo").val("Error en saldo");
            $divVuelto.hide();
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

}); // fin ready

  function cargarCreditoCompraVigente(tipo_estado, fechaDesde, fechaHasta) {
    table_credito_vigenteCompras = $("#tbl_credito_vigenteCompras").DataTable({
      destroy: true, // importante para recargar correctamente
      ajax: {
        url: "ajax/administrar_creditos_compra.ajax.php",
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
          targets: 3,
          visible: false
        }, { targets: 6, visible: false },


        {
          targets: 13,
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

  function cargarCreditoCompraFinalizadoCompras(tipo_estado, fechaDesde, fechaHasta) {
      table_credito_finalizadoCompras = $("#tbl_credito_finalizadoCompras").DataTable({
      destroy: true,

      ajax: {
        url: "ajax/administrar_creditos_compra.ajax.php",
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
          targets: 3,
          visible: false
        }, { targets: 6, visible: false },
        {
     targets: 13, // Columna de Opciones
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
      if ($.fn.DataTable.isDataTable('#tblHistorialAbonosCompras')) {
        $('#tblHistorialAbonosCompras').DataTable().destroy();
      }

     table_historial_abonos = $("#tblHistorialAbonosCompras").DataTable({
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
        "drawCallback": function() {
            // Ajustar columnas después de que el modal se muestre y la tabla se dibuje
            // Esto es crucial para la responsividad dentro de un modal
            if ($.fn.DataTable.isDataTable('#tblHistorialAbonosCompras')) {
                $('#tblHistorialAbonosCompras').DataTable().columns.adjust().responsive.recalc();
            }
        }
    });

  }

  $(document).on('click', '#btnBuscarVigenteCompras', function() {
        let tipo_estado = $("#selEstadoProveedorVigente").val();
        cargarCreditoCompraVigente(tipo_estado, "", "");
 });

 $(document).on('click', '#btnBuscarFinalizadoCompras', function() {
     let tipo_estado = $("#selEstadoProveedorFinalizado").val();
      let tieneFechas = selectedRangeAdminitrarCompras.length === 2;

      let fechaInicio = null;
      let fechaFin = null;

      if (tieneFechas) {
        fechaInicio = formatDate(selectedRangeAdminitrarCompras[0]);
        fechaFin = formatDate(selectedRangeAdminitrarCompras[1]);
      }

      if (tipo_estado || tieneFechas) {
        cargarCreditoCompraFinalizadoCompras(tipo_estado, fechaInicio, fechaFin);
      } else {
        alert("Por favor selecciona al menos un filtro (estado o rango de fechas).");
      }

 });

 
  $(document).on('click', '.btnVerHistorialAbonos', function(e) {
    // Evita el comportamiento por defecto del enlace si es un <a>
    e.preventDefault(); 

    let data = table_credito_finalizadoCompras.row($(this).parents('tr')).data();
    
    var idCredito = data.IdCompraCreditos; // Asumiendo que 'IdCompraCreditos' es el nombre de la propiedad en tu objeto de datos
    var proveedorNombre = data[4]; // Asumiendo que el nombre del proveedor es la columna de índice 4
    var numeroCredito = data[6]; // Asumiendo que el número de crédito es la columna de índice 6

    // Actualiza los títulos del modal
    $('#spanNumeroCredito').text(numeroCredito);
    $('#spanProveedorModal').text(proveedorNombre);

    // Muestra el modal
    $('#modalHistorialAbonos').modal('show');

    // Llama a la función para cargar la tabla de historial de abonos dentro del modal
    cargarHistorialAbonos(idCredito);
});

$(document).on('click', '.btnAbono', function(e) {
            fun_limpiar() 
      $("#btn_procesar_abonoCompras").prop('disabled', false);
      tipoAbono=1;
      $("#modalAbonoCreditoCompras").modal('show');
      accion = 2;
      let data = table_credito_vigenteCompras.row($(this).parents('tr')).data();
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
  
  function fun_limpiar() {
      $("#montoAbono").val("");
        $("#nuevoSaldo").val("");
          $("#montoVuelto").val("");
           $("#observacion").val("");

  }

  // Asegúrate que solo se registre UNA VEZ
$(document).off('click', '#btn_procesar_abonoCompras').on('click', '#btn_procesar_abonoCompras', function () {

  $("#btn_procesar_abonoCompras").prop('disabled', true);

  let montoAbono = parseFloat($("#montoAbono").val());
  let nuevoSaldo = parseFloat($("#nuevoSaldo").val());
  let saldoRestante = parseFloat($("#saldoRestante").val());
  let observacion = $("#observacion").val().trim();

  if (isNaN(montoAbono) || montoAbono <= 0) {
    $("#btn_procesar_abonoCompras").prop('disabled', false);
    return Swal.fire({
      icon: 'warning',
      title: 'Monto inválido',
      text: 'El monto del abono debe ser mayor que cero.',
      confirmButtonText: 'Aceptar'
    });
  }

  if (observacion === "") {
    $("#btn_procesar_abonoCompras").prop('disabled', false);
    return Swal.fire({
      icon: 'warning',
      title: 'Observación requerida',
      text: 'Por favor, ingresa una observación.',
      confirmButtonText: 'Aceptar'
    });
  }

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
    success: function(respuesta) {
      console.log("Abono procesado:", respuesta); // ayuda a depurar
      mostrarAlertaRespuesta(respuesta, function() {
        $("#modalAbonoCreditoCompras").modal('hide');
        table_credito_vigenteCompras.ajax.reload();
        fun_limpiar();
      }, {
        mensajeExito: "éxito",
        mensajeAdvertencia: "Warning",
        mensajeError: "Excepción"
      });
    },
    error: manejarErrorAjax
  }).always(function() {
    $("#btn_procesar_abonoCompras").prop('disabled', false);
  });
});


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