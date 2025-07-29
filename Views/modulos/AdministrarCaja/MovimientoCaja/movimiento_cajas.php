<?php
session_start();

?>
<script src="/WebPuntoVenta2025/Views/util/js/respuesta.js"></script>
<div class="container-fluid py-4">
  <!-- Encabezado -->
  <div class="row mb-4">
    <div class="col">
      <h2 class="text-primary">
        <i class="fas fa-cash-register me-2"></i>Administrar Caja - Movimientos de Caja
      </h2>
    </div>
    <div class="col-md-6 text-end">
        <button class="btn btn-success" id="btnAbrirCaja">
            <i class="fas fa-cash-register me-2"></i>Abrir Caja
        </button>
    </div>
  </div>

  <!-- Inputs ocultos -->
  <input id="txtId_usuario_movimiento_caja" type="hidden" value="<?php echo $_SESSION['usuario']->id_usuario; ?>">
  <input id="txtId_caja_movimiento" type="hidden" value="<?php echo $_SESSION['usuario']->id_caja; ?>">

  <!-- Pestañas -->
  <ul class="nav nav-tabs" id="tabs-movimientos" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link " id="ingresos-tab" data-bs-toggle="tab" data-bs-target="#ingresos" type="button" role="tab" aria-controls="ingresos" aria-selected="true">INGRESOS</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="devoluciones-tab" data-bs-toggle="tab" data-bs-target="#devoluciones" type="button" role="tab" aria-controls="devoluciones" aria-selected="false">DEVOLUCIONES</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="gastos-tab" data-bs-toggle="tab" data-bs-target="#gastos" type="button" role="tab" aria-controls="gastos" aria-selected="false">GASTOS</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="arqueos-tab" data-bs-toggle="tab" data-bs-target="#arqueos" type="button" role="tab" aria-controls="arqueos" aria-selected="false">ARQUEOS</button>
    </li>
  </ul>

  <!-- Contenido dividido en 2 columnas: Tabs + Resumen -->
  <div class="row mt-4">
    <!-- Columna principal con pestañas -->
    <div class="col-md-7">
      <div class="tab-content" id="tabsContent-movimientos">
        <!-- INGRESOS -->
        <div class="tab-pane fade " id="ingresos" role="tabpanel" aria-labelledby="ingresos-tab">
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
              <h5 class="mb-0 text-primary"><i class="fas fa-list me-2"></i>Listado de Ingresos</h5>
            </div>
            <div class="card-body">
              <table id="tbl_ingresos" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th>Id Ingreso</th>
                    <th>Id Movimiento</th>
                    <th>Tipo Ingreso</th>
                    <th>Tipo Pago</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Contenido dinámico -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- DEVOLUCIONES -->
        <div class="tab-pane fade" id="devoluciones" role="tabpanel" aria-labelledby="devoluciones-tab">
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
              <h5 class="mb-0 text-primary"><i class="fas fa-list me-2"></i>Listado de devoluciones</h5>
            </div>
            <div class="card-body">
              <table id="tbl_devoluciones" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th>Id devolucion</th>
                    <th>Id Movimiento</th>
                    <th>Tipo devolucion</th>
                    <th>Afecta caja</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Contenido dinámico -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- GASTOS -->
        <div class="tab-pane fade" id="gastos" role="tabpanel" aria-labelledby="gastos-tab">
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
              <h5 class="mb-0 text-primary"><i class="fas fa-list me-2"></i>Listado de Gastos</h5>
            </div>
            <div class="card-body">
              <table id="tbl_gastos" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th>Id Gasto</th>
                    <th>Id Movimiento</th>
                    <th>Tipo Gasto</th>
                    <th>Tipo Pago</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Contenido dinámico -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ARQUEO -->
        <div class="tab-pane fade show active" id="arqueos" role="tabpanel" aria-labelledby="arqueos-tab">
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
              <h5 class="mb-0 text-primary"><i class="fas fa-list me-2"></i>Listado de arqueos</h5>
            </div>
            <div class="card-body">

             <div class="row mb-4">
          
         
            <div class="col-md-3">
              <label for="rangoFecha" class="form-label">Fecha Arqueo:</label>
              <input type="text" class="form-control" id="rangoFecha" placeholder="Buscar por fecha  " autocomplete="off" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-outline-primary w-100" id="btnBuscarFinalizado"><i class="fas fa-search"></i> Buscar</button>
            </div>


          </div>
              <table id="tbl_arqueos" class="uk-table uk-table-hover uk-table-striped display" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th></th>
                    <th>#Arqueo</th>
                    <th>Caja</th>
                    <th>Usuario</th>
                    <th>F. Apertura</th>
                    <th>Apertura ($)</th>
                    <th>Ingresos ($)</th>
                    <th>Gastos ($)</th>
                    <th>Cierre ($)</th>
                    <th>Reportado Usuario ($)</th>
                    <th>Sobrante ($)</th>
                    <th>Faltante ($)</th>
                    <th>F. Cierre</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Contenido dinámico -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Columna fija con Resumen -->
    <div class="col-md-5">
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
          <h5 class="mb-0 text-primary"><i class="fas fa-chart-line me-2"></i>Resumen de Caja</h5>
        </div>
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td><i class="fas fa-circle text-secondary"></i></td>
                <td class="text-muted">Monto Inicial</td>
                <td class="text-end fw-bold" id="inicial">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-success"></i></td>
                <td class="text-muted">Ingresos</td>
                <td class="text-end fw-bold" id="Ingreso">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-primary"></i></td>
                <td class="text-muted">Total de ventas a crédito</td>
                <td class="text-end fw-bold" id="total_venta_creditos">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-danger"></i></td>
                <td class="text-muted">Total de compras a crédito</td>
                <td class="text-end fw-bold" id="total_compras_creditos">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-danger"></i></td>
                <td class="text-muted">Devoluciones Compras</td>
                <td class="text-end fw-bold" id="devoluciones_compras">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-danger"></i></td>
                <td class="text-muted">Devoluciones Ventas</td>
                <td class="text-end fw-bold" id="devoluciones_ventas">$ 0.00</td>
              </tr>
              <tr>
                <td><i class="fas fa-circle text-warning"></i></td>
                <td class="text-muted">Gastos</td>
                <td class="text-end fw-bold" id="Gasto">$ 0.00</td>
              </tr>
              <tr class="border-top">
                <td></td>
                <td class="text-success fw-bold">Ingresos Totales</td>
                <td class="text-end text-success fw-bold" id="Ingresos_total">$ 0.00</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-danger fw-bold">Egresos Totales</td>
                <td class="text-end text-danger fw-bold" id="Egresos_total">$ 0.00</td>
              </tr>
              <tr>
                <td></td>
                <td class="fw-bold">Saldo</td>
                <td class="text-end fw-bold" id="Saldo">$ 0.00</td>
              </tr>
              <tr class="border-top">
                <td></td>
                <td class="text-info fw-bold">Monto Inicial + Saldo</td>
                <td class="text-end text-info fw-bold" id="Diferencia">$ 0.00</td>
              </tr>
            </tbody>
          </table>
          <!-- Inputs ocultos -->
          <input type="hidden" id="txtinicial" value="">
          <input type="hidden" id="txtdiferencia" value="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mdlGestionarArqueoCaja" tabindex="-1" aria-labelledby="mdlGestionarArqueoCajaLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content">
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarArqueoCajaLabel">
          <i class="fas fa-building fa-lg"></i> Cierre de Caja
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body px-4 py-4 bg-light-subtle">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body px-4 py-4">

            <div class="row">
              <!-- Columna izquierda: Ingresos y Egresos -->
              <div class="col-md-6">
                <div class="card mb-3">
                  <div class="card-header bg-light">
                    <h6 class="mb-0 text-center">Ingresos Efectivo</h6>
                  </div>
                  <input type="hidden" id="txt_id_arqueo_caja" name="id_arqueo_caja" value="0">
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="efectivoInicio" class="form-label">Fondo Inicial de Caja ($):</label>
                      <input type="number" class="form-control" id="efectivoInicio" name="efectivoInicio" step="0.01" value="0.00" min="0" disabled>
                    </div>
                    <div class="mb-3">
                      <label for="ventasEfectivo" class="form-label">Ventas en Efectivo del Día ($):</label>
                      <input type="number" class="form-control" id="ventasEfectivo" name="ventasEfectivo" step="0.01" value="0.00" min="0">
                    </div>
                    <div class="mb-3">
                      <label for="otrosIngresosEfectivo" class="form-label">Otros Ingresos en Efectivo ($):</label>
                      <input type="number" class="form-control" id="otrosIngresosEfectivo" name="otrosIngresosEfectivo" step="0.01" value="0.00" min="0">
                    </div>
                  </div>
                </div>

              </div>

              <!-- Columna derecha: Conteo físico -->
              <div class="col-md-6">
                <div class="card mb-3">
                  <div class="card-header bg-light">
                    <h6 class="mb-0 text-center">Egresos Efectivo</h6>
                  </div>
                  <div class="card-body">

                    <div class="mb-3">
                      <label for="comprasEfectivo" class="form-label">Compras en Efectivo ($):</label>
                      <input type="number" class="form-control" id="comprasEfectivo" name="comprasEfectivo" step="0.01" value="0.00" min="0">
                    </div>
                    <div class="mb-3">
                      <label for="OtrosGastosEfectivo" class="form-label">Otros Gastos en Efectivo ($):</label>
                      <input type="number" class="form-control" id="OtrosGastosEfectivo" name="OtrosGastosEfectivo" step="0.01" value="0.00" min="0">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <!-- Sección de Billetes -->
                <div class="card mb-3">
                  <div class="card-header bg-light">
                    <h6 class="mb-0 text-center">Billetes</h6>
                  </div>
                  <div class="card-body">
                    <div class="row g-2">
                      <div class="col-6">
                        <label for="billete_100" class="form-label">Billetes de $100:</label>
                        <input type="number" class="form-control" id="billete_100" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_100">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="billete_50" class="form-label">Billetes de $50:</label>
                        <input type="number" class="form-control" id="billete_50" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_50">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="billete_20" class="form-label">Billetes de $20:</label>
                        <input type="number" class="form-control" id="billete_20" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_20">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="billete_10" class="form-label">Billetes de $10:</label>
                        <input type="number" class="form-control" id="billete_10" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_10">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="billete_5" class="form-label">Billetes de $5:</label>
                        <input type="number" class="form-control" id="billete_5" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_5">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="billete_1" class="form-label">Billetes de $1:</label>
                        <input type="number" class="form-control" id="billete_1" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_billete_1">$0.00</span>
                      </div>

                      <div class="col-6">
                        <div class="total-display">
                          <span>Total Billetes:</span>
                          <strong id="total_solo_billetes">$0.00</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Sección de Monedas -->
                <div class="card mb-3">
                  <div class="card-header bg-light">
                    <h6 class="mb-0 text-center">Monedas</h6>
                  </div>
                  <div class="card-body">
                    <div class="row g-2">
                      <div class="col-6">
                        <label for="moneda_1" class="form-label">Monedas de $1:</label>
                        <input type="number" class="form-control" id="moneda_1" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_1">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="moneda_050" class="form-label">Monedas de $0.50:</label>
                        <input type="number" class="form-control" id="moneda_050" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_050">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="moneda_025" class="form-label">Monedas de $0.25:</label>
                        <input type="number" class="form-control" id="moneda_025" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_025">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="moneda_010" class="form-label">Monedas de $0.10:</label>
                        <input type="number" class="form-control" id="moneda_010" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_010">$0.00</span>
                      </div>

                      <div class="col-6">
                        <label for="moneda_005" class="form-label">Monedas de $0.05:</label>
                        <input type="number" class="form-control" id="moneda_005" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_005">$0.00</span>
                      </div>
                      <div class="col-6">
                        <label for="moneda_001" class="form-label">Monedas de $0.01:</label>
                        <input type="number" class="form-control" id="moneda_001" oninput="calculateAllTotals()" min="0" value="0">
                      </div>
                      <div class="col-6 d-flex align-items-center">
                        <span id="total_moneda_001">$0.00</span>
                      </div>
                      <div class="col-6">
                        <div class="total-display">
                          <span>Total Monedas:</span>
                          <strong id="total_solo_monedas">$0.00</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="total-summary">
              <div class="total-display">
                <span>TOTAL EFECTIVO CONTADO:</span>
                <strong id="total_efectivo_contado">$0.00</strong>
              </div>
            </div>
            <!-- Observaciones -->
            <div class="mb-3">
              <label for="observaciones" class="form-label">Observaciones:</label>
              <textarea type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Escribe aquí cualquier comentario relevante..."> </textarea>
            </div>

            <div class="d-flex justify-content-end mt-5"> <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistro">
                <i class="fas fa-times me-2"></i> Cancelar
              </button>
              <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnRealizarArqueo">
                <i class="fas fa-save me-2"></i> Guardar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalAbrirCaja" tabindex="-1" aria-labelledby="modalAbrirCajaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <div class="modal-content rounded-4 shadow-lg"> <div class="modal-header bg-primary text-white border-0 rounded-top-4"> <h5 class="modal-title fw-light" id="modalAbrirCajaLabel">
                    <i class="fas fa-box-open me-2"></i>Abrir Caja
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4"> <form id="formAbrirCaja">
                    <div class="mb-3">
                        <label for="txtMontoInicial" class="form-label text-muted">Monto Inicial ($):</label>
                        <input type="number" class="form-control form-control-lg rounded-2" id="txtMontoInicial" placeholder="0.00" min="0" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtObservacionApertura" class="form-label text-muted">Observación (Opcional):</label>
                        <textarea class="form-control rounded-2" id="txtObservacionApertura" rows="3" placeholder="Notas adicionales sobre la apertura..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between p-4"> <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formAbrirCaja" class="btn btn-primary rounded-pill px-4" id="btnGuardarApertura">
                    <i class="fas fa-check me-2"></i>Guardar Apertura
                </button>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="modal fade" id="mdlGestionarMovimientoCaja" tabindex="-1" aria-labelledby="mdlGestionarMovimientoCajaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-cash-register"></i> Gestión de Movimiento de Caja
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="modal-body p-4">
                <form class="needs-validation" novalidate>
                    <input type="hidden" id="id_ingresos" value="">

                    <div class="mb-4">
                        <label for="ddlTipo_Movimiento" class="form-label fw-semibold">
                            <i class="fas fa-exchange-alt"></i> Tipo de Movimiento <span class="text-danger">*</span>
                        </label>
                        <select id="ddlTipo_Movimiento" class="form-control rounded-3 py-2 px-3" required>
                            <option value="0">Seleccione el tipo de Movimiento</option>
                            <option value="1">Ingresos</option>
                            <option value="2">Egresos</option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione el tipo de movimiento.</div>
                    </div>
<div class="mb-4">
  <label for="txt_Monto" class="form-label fw-semibold">
    <i class="fas fa-money-bill-alt"></i> Monto <span class="text-danger">*</span>
  </label>
  <input
    type="number"
    step="0.01"
    class="form-control rounded-3 py-2 px-3"
    id="txt_Monto"
    name="txt_Monto"
    required
    maxlength="9"
    min="1"
    placeholder="Ingrese el monto"
  />
  <div class="invalid-feedback">Debe ingresar un monto válido.</div>
</div>

                    <div class="mb-4">
                        <label for="txt_Comentario" class="form-label fw-semibold">
                            <i class="fas fa-comment-dots"></i> Comentario <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control rounded-3 py-2 px-3" id="txt_Comentario" name="txt_Comentario" required minlength="5" maxlength="50" placeholder="Ingrese un comentario" />
                        <div class="invalid-feedback">Debe ingresar un comentario válido.</div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-danger w-50 py-2 fw-semibold" data-bs-dismiss="modal" id="btnCancelarRegistro">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-primary w-50 py-2 fw-semibold" id="btnGuardar_movimiento">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<script>
var table_ingresos = null; // Inicializar con null
var table_gastos = null;   // Inicializar con null
var table_devoluciones = null; // Inicializar con null
var table_arqueo = null;   // Asumiendo que table_arqueo también se usa de manera similar

  var FonoInicial = 0;
  var IngresosVentasEfectivo = 0;
  var OtrosIngresosEfectivo = 0;

  var EgresosComprasEfectivo = 0;
  var OtrosEgresosEfectivo = 0;


  var denominations = {
    // Billetes
    billete_100: 100,
    billete_50: 50,
    billete_20: 20,
    billete_10: 10,
    billete_5: 5,
    billete_1: 1,
    // Monedas
    moneda_1: 1,
    moneda_050: 0.50,
    moneda_025: 0.25,
    moneda_010: 0.10,
    moneda_005: 0.05,
    moneda_001: 0.01
  };
  // Arrays para agrupar IDs de billetes y monedas
  var billIds = ['billete_100', 'billete_50', 'billete_20', 'billete_10', 'billete_5', 'billete_1'];
  var coinIds = ['moneda_1', 'moneda_050', 'moneda_025', 'moneda_010', 'moneda_005', 'moneda_001'];
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
    onReady: function(selectedDates, dateStr, instance) {
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
    onChange: function(selectedDates) {
      selectedRange = selectedDates;
    }
  });
  $(document).ready(function() {
    cargarTables();
   cargarTablesSummaryOnly();

     const today = new Date();

    // Fecha 15 días antes
    const startDate = new Date(today);
    startDate.setDate(today.getDate() - 120);
    console.log("startDate:",startDate)
    // Fecha 15 días después
    const endDate = new Date(today);
    endDate.setDate(today.getDate() + 1);
      // Suponiendo que tienes una función para formatear fechas
    const fechaDesde = formatDate(startDate);
    const fechaHasta = formatDate(endDate);
     cargarTableArqueo(fechaDesde,fechaHasta);

$("#btnBuscarFinalizado").on('click', function() {

  let tieneFechas = selectedRange.length === 2;

  let fechaInicio = null;
  let fechaFin = null;

  if (tieneFechas) {
    fechaInicio = formatDate(selectedRange[0]);
    fechaFin = formatDate(selectedRange[1]);
    cargarTableArqueo(fechaInicio, fechaFin);
  } else {
    Swal.fire({
      icon: 'warning',
      title: 'Rango de fechas requerido',
      text: 'Por favor selecciona al menos un filtro (rango de fechas).',
      confirmButtonText: 'Entendido'
    });
  }

});

 function imprimirArqueo(idArqueo) {
        // Show a loading indicator (e.g., using SweetAlert2 or Toastr)
        Swal.fire({
            title: 'Generando Arqueo',
            text: 'Por favor, espera...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: 'endpoint/generate_report.php', // Your PHP proxy script
            type: 'POST',
            data: {
                reportType: 'arqueoCaja', // Tell PHP which report to generate
                idArqueo: idArqueo
            },
            xhrFields: {
                responseType: 'blob' // Expect a binary blob response (PDF)
            },
            success: function(response, status, xhr) {
                Swal.close(); // Close loading indicator

                const contentType = xhr.getResponseHeader('Content-Type');
                if (contentType && contentType.indexOf('application/pdf') !== -1) {
                    // It's a PDF, create a download link
                    const blob = new Blob([response], {
                        type: 'application/pdf'
                    });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;

                    // Get filename from Content-Disposition header or default
                    const contentDisposition = xhr.getResponseHeader('Content-Disposition');
                    let filename = `arqueo_caja_${idArqueo}.pdf`; // Default filename
                    if (contentDisposition) {
                        const filenameMatch = contentDisposition.match(/filename="(.+)"/);
                        if (filenameMatch && filenameMatch.length > 1) {
                            filename = filenameMatch[1];
                        }
                    }
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url); // Clean up the URL
                    toastr.success('¡Arqueo de caja descargado exitosamente!');
                } else {
                    // Not a PDF, likely an error message
                    const reader = new FileReader();
                    reader.onload = function() {
                        try {
                            const errorJson = JSON.parse(reader.result);
                            toastr.error(errorJson.message || 'Error desconocido al generar el arqueo.');
                        } catch (e) {
                            toastr.error('Respuesta inesperada del servidor al generar el arqueo.');
                        }
                    };
                    reader.readAsText(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close(); // Close loading indicator
                let errorMessage = 'Error de conexión. Intenta de nuevo.';
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
            }
        });
    }

    // Event Delegation for the "Imprimir Arqueo" button
    // This is crucial because DataTables dynamically creates these buttons.
    // We attach the listener to a parent element (e.g., #tbl_arqueos or document body)
    // and then filter for clicks on .btnImprimirAqueo
    $('#tbl_arqueos tbody').on('click', '.btnImprimirAqueo', function(e) {
        e.preventDefault(); // Prevent the default link behavior
        const idArqueo = $(this).data('id'); // Get the ID from data-id attribute
        imprimirArqueo(idArqueo);
    });

    // Ensure Toastr is initialized if not already (typically done in AdminLTE setup)
    if (typeof toastr !== 'undefined') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };
    }

    $('#tbl_ingresos tbody').on('click', '.btn_edit_ingresos', function() {
        opcion_movimiento=1;
        accion = 7; 
        let data = table_ingresos.row($(this).parents('tr')).data();
        let c=   (data[2]);
        $("#mdlGestionarMovimientoCaja").modal('show');
        $("#id_ingresos").val(data[0]);
        $("#ddlTipo_Movimiento").val(1);
        $("#ddlTipo_Movimiento") .prop('disabled', true);                           
        $("#txt_Comentario").val(data[4]);
        $("#txt_Monto").val(data[5]);                    
    })

      $('#tbl_gastos tbody').on('click', '.btn_edit_gastos', function() {
        opcion_movimiento=2; 
        accion = 7;  
        let data = table_gastos.row($(this).parents('tr')).data();
        let c=   (data[2]);
                    $("#mdlGestionarMovimientoCaja").modal('show');
                                $("#id_ingresos").val(data[0]);
                                $("#ddlTipo_Movimiento").val(2);
                                $("#ddlTipo_Movimiento") .prop('disabled', true);
                                $("#txt_Comentario").val(data[4]);
                                $("#txt_Monto").val(data[5]);
                          
    })

  $('#tbl_ingresos tbody').on('click', '.btnEliminar_ingresos', function () {
    accion = 7; // seteamos la accion para eliminar
    opcion_movimiento = 1;
    let data = table_ingresos.row($(this).parents('tr')).data();
    let c = data[2];

    if (c == 'Otros' || c == 'Creditos') {
    let id_ingresos = data[0];
    let monto = data[5];

    Swal.fire({
      title: '¿Está seguro de eliminar este Movimiento?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, deseo eliminarlo!',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        let datos = new FormData();
        datos.append("accion", accion);
        datos.append("id", id_ingresos);
        datos.append("opcion", opcion_movimiento);

        $.ajax({
          url: "ajax/movimiento_cajas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function (respuesta) {
            mostrarAlertaRespuesta(respuesta, () => {
               cargarTables();
            }, {
              mensajeExito: 'eliminado con éxito',
              mensajeAdvertencia: 'Warning',
              mensajeError: 'error'
            });
          },
          error: manejarErrorAjax
        });
      }
    });
   }
  });
    $('#tbl_gastos tbody').on('click', '.btnEliminar_gastos', function() {
         console.log("eleiminar");
        accion = 7; //seteamos la accion para editar
        opcion_movimiento=2
        let data = table_gastos.row($(this).parents('tr')).data();
        let id_ingresos = data[0]; 
            let monto = data[5];

        Swal.fire({
            title: 'Está seguro de eliminar este Movimiento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append("accion", accion);
                datos.append("id", id_ingresos); //codigo_producto
                datos.append("opcion", opcion_movimiento); //codigo_producto 
                $.ajax({
                    url: "ajax/movimiento_cajas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                         mostrarAlertaRespuesta(respuesta, () => {
               cargarTables();
            }, {
              mensajeExito: 'eliminado con éxito',
              mensajeAdvertencia: 'Warning',
              mensajeError: 'error'
            });
          },
          error: manejarErrorAjax
        });
      }
    });
   
  });


    $('#tbl_arqueos').on('click', '.btnArqueo', function(e) {
      //   tipoAbono=1;
      $("#mdlGestionarArqueoCaja").modal('show');
      let data = table_arqueo.row($(this).parents('tr')).data();
      console.log("estoydata", data[1]);
      $("#txt_id_arqueo_caja").val(data[1]);
      $("#efectivoInicio").val(FonoInicial);
      $("#ventasEfectivo").val(IngresosVentasEfectivo);
      $("#otrosIngresosEfectivo").val(OtrosIngresosEfectivo);
      $("#comprasEfectivo").val(EgresosComprasEfectivo);
      $("#OtrosGastosEfectivo").val(OtrosEgresosEfectivo);

    });

    // Función para mostrar el modal "Abrir Caja"
document.getElementById('btnAbrirCaja').addEventListener('click', function() {
    var myModal = new bootstrap.Modal(document.getElementById('modalAbrirCaja'));
    myModal.show();
});

// Manejar el envío del formulario dentro del modal
document.getElementById('formAbrirCaja').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío de formulario por defecto

    const montoInicialInput = document.getElementById('txtMontoInicial'); // Referencia al elemento input
    const montoInicial = montoInicialInput.value;
    const observacion = document.getElementById('txtObservacionApertura').value;

    // --- INICIO DE LA VALIDACIÓN CON FEEDBACK MEJORADO ---
    if (montoInicial === '' || isNaN(montoInicial) || parseFloat(montoInicial) <= 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error de Validación',
            text: 'Por favor, ingrese un **monto inicial válido y mayor a cero**.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Entendido'
        });
        montoInicialInput.focus(); // Enfocar el campo para que el usuario sepa dónde corregir
        return; // Detiene la ejecución si la validación falla
    }
    // --- FIN DE LA VALIDACIÓN ---

    Swal.fire({
        title: '¿Está seguro de abrir la caja?',
        text: "Se registrará la apertura de la caja con un monto de: $" + parseFloat(montoInicial).toFixed(2), // Formatear para mejor lectura
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarla',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (!result.isConfirmed) {
            return; // Si el usuario cancela, no hacemos nada más.
        }

        const datos = new FormData();
        datos.append("accion", 9); // Asegúrate de que esta acción sea correcta para tu backend
        datos.append("montoInicial", montoInicial);
        datos.append("observacion", observacion);

        $.ajax({
            url: "ajax/movimiento_cajas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json', // Esperamos una respuesta JSON de tu PHP
            success: function(respuesta) {
                // Aquí usamos tu función mostrarAlertaRespuesta
                // Le pasamos la respuesta del AJAX, el callback para éxito y las opciones
                mostrarAlertaRespuesta(respuesta, function() {
                    // Este es el callback que se ejecuta SI la operación es un 'éxito'
                    // y el usuario cierra la alerta de éxito.
                    
                    // 1. Limpia el formulario del modal
                    document.getElementById('formAbrirCaja').reset(); // Limpia todos los campos del formulario
                    
                       $("#modalAbrirCaja").modal('hide');
                      table_arqueo.ajax.reload();
                      cargarTablesSummaryOnly();
                    // 3. (Opcional, pero recomendado) Recargar/Actualizar la interfaz
                    //    Estas funciones deberías implementarlas para actualizar los datos
                    //    en la tabla de arqueos y el resumen de caja.
                    //    ej: cargarDatosDeArqueos();
                    //    ej: actualizarResumenDeCaja();

                }, {
              mensajeExito: "éxito",
              mensajeAdvertencia: "Warning",
              mensajeError: "Excepción"
            });
            },
          error: manejarErrorAjax
        });
    });
    // EL CIERRE DEL MODAL AQUI FUE ELIMINADO, DEBE ESTAR EN EL SUCESS DE AJAX
});
// También podrías querer limpiar los campos del modal cuando se oculta
document.getElementById('modalAbrirCaja').addEventListener('hidden.bs.modal', function (event) {
    document.getElementById('txtMontoInicial').value = '';
    document.getElementById('txtObservacionApertura').value = '';
});


  });
  /*  fin de document ready */


  function calculateAllTotals() {
    let totalBilletes = 0;
    let totalMonedas = 0;

    // 1. Calcular y actualizar el total individual de cada denominación
    for (const id in denominations) {
      const inputElement = document.getElementById(id);
      const totalElement = document.getElementById(`total_${id}`);
      const count = parseFloat(inputElement.value) || 0; // Asegura que es un número
      const value = denominations[id];
      const total = count * value;
      totalElement.textContent = `$${total.toFixed(2)}`;

      // 2. Acumular para el total de billetes y monedas
      if (billIds.includes(id)) {
        totalBilletes += total;
      } else if (coinIds.includes(id)) {
        totalMonedas += total;
      }
    }

    // 3. Actualizar el Total de Billetes y el Total de Monedas
    document.getElementById('total_solo_billetes').textContent = `$${totalBilletes.toFixed(2)}`;
    document.getElementById('total_solo_monedas').textContent = `$${totalMonedas.toFixed(2)}`;

    // 4. Calcular y actualizar el Gran Total de Efectivo Contado
    const totalEfectivoContado = totalBilletes + totalMonedas;
    document.getElementById('total_efectivo_contado').textContent = `$${totalEfectivoContado.toFixed(2)}`;
  }

function cargarTables() {
    // Tu código de AJAX para el resumen de caja
    $.ajax({
        url: "ajax/movimiento_cajas.ajax.php",
        method: 'POST',
        data: {
            'accion': 2
        },
        dataType: 'json',
        success: function(respuesta) {
            // ... (Tu lógica para actualizar los totales y saldos) ...
            const montoInicial = parseFloat(respuesta[0]['monto_inicial']);
            const total_ingresos =
                parseFloat(respuesta[0]['total_ingresos_ventas']) +
                parseFloat(respuesta[0]['total_abono_credito_venta']) +
                parseFloat(respuesta[0]['total_otros_ingresos']);
            const total_gastos =
                parseFloat(respuesta[0]['total_compras']) +
                parseFloat(respuesta[0]['total_abono_credito_compras']) +
                parseFloat(respuesta[0]['total_gastos_otros']);
            const saldo_movimiento = parseFloat(total_ingresos - total_gastos);

            const saldo_final = parseFloat(montoInicial + saldo_movimiento);
            $("#inicial").html(montoInicial.toFixed(2));
            $("#devoluciones_compras").html(parseFloat(respuesta[0]['total_devolucion_compras']).toFixed(2));
            $("#devoluciones_ventas").html(parseFloat(respuesta[0]['total_devolucion_ventas']).toFixed(2));
            $("#Ingreso").html(total_ingresos.toFixed(2));
            $("#total_venta_creditos").html(parseFloat(respuesta[0]['total_credito_pendiente_venta']).toFixed(2));
            $("#total_compras_creditos").html(parseFloat(respuesta[0]['total_credito_pendiente_compras']).toFixed(2));

            $("#Gasto").html(total_gastos.toFixed(2));
            $("#Ingresos_total").html(total_ingresos.toFixed(2));
            $("#Egresos_total").html(total_gastos.toFixed(2));
            $("#Saldo").html(saldo_movimiento.toFixed(2));
            $("#Diferencia").html(saldo_final.toFixed(2));

            FonoInicial = parseFloat(respuesta[0]['monto_inicial']);
            IngresosVentasEfectivo = parseFloat(respuesta[0]['total_ingresos_ventas']);
            OtrosIngresosEfectivo =
                parseFloat(respuesta[0]['total_abono_credito_venta']) +
                parseFloat(respuesta[0]['total_otros_ingresos']);

            EgresosComprasEfectivo = parseFloat(respuesta[0]['total_compras']);
            OtrosEgresosEfectivo =
                parseFloat(respuesta[0]['total_abono_credito_compras']) +
                parseFloat(respuesta[0]['total_gastos_otros']);

            // ***** Lógica para RE-INICIALIZAR DataTables *****
            // Primero, destruir si ya existen instancias
            if ($.fn.DataTable.isDataTable('#tbl_ingresos')) {
                $('#tbl_ingresos').DataTable().destroy();
            }
            if ($.fn.DataTable.isDataTable('#tbl_devoluciones')) {
                $('#tbl_devoluciones').DataTable().destroy();
            }
            if ($.fn.DataTable.isDataTable('#tbl_gastos')) {
                $('#tbl_gastos').DataTable().destroy();
            }

            // Luego, volver a inicializar cada tabla con sus configuraciones originales
            // table_ingresos
            table_ingresos = $("#tbl_ingresos").DataTable({
                ajax: {
                    url: "ajax/movimiento_cajas.ajax.php",
                    dataSrc: '',
                    type: "POST",
                    data: {
                        'accion': 3
                    },
                },
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    targets: 0,
                    visible: false,
                }, {
                    targets: 1,
                    visible: false,
                }, {
                    targets: 2,
                    visible: false,
                }, {
                    targets: 3,
                    visible: false,
                }, {
                    targets: 6,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        const tipoIngreso = full[2]; // índice de tipo_ingresos en la fila
                        if (tipoIngreso === 'Otros') {
                            return "<center>" +
                                "<span class='btn_edit_ingresos text-primary px-1' style='cursor:pointer;'>" +
                                "<i class='fas fa-pencil-alt fs-5'></i>" +
                                "</span>" +
                                "<span class='btnEliminar_ingresos text-danger px-1' style='cursor:pointer;'>" +
                                "<i class='fas fa-trash fs-5'></i>" +
                                "</span>" +
                                "</center>";
                        } else {
                            return ""; // No mostrar botones si no es "Otros"
                        }
                    }
                }],
                "order": [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20, 50],
                "pageLength": 10,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });

            // table_devoluciones
            table_devoluciones = $("#tbl_devoluciones").DataTable({
                ajax: {
                    url: "ajax/movimiento_cajas.ajax.php",
                    dataSrc: '',
                    type: "POST",
                    data: {
                        'accion': 4,
                        'opcion': 'todo',
                    },
                },
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    targets: 0,
                    visible: false,
                }, {
                    targets: 1,
                    visible: false,
                }, {
                    targets: 2,
                    visible: false,
                }, {
                    targets: 3,
                    visible: false,
                }],
                "order": [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20, 50],
                "pageLength": 10,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });

            // table_gastos
            table_gastos = $("#tbl_gastos").DataTable({
                ajax: {
                    url: "ajax/movimiento_cajas.ajax.php",
                    dataSrc: '',
                    type: "POST",
                    data: {
                        'accion': 5
                    },
                },
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    targets: 0,
                    visible: false,
                }, {
                    targets: 1,
                    visible: false,
                }, {
                    targets: 2,
                    visible: false,
                }, {
                    targets: 3,
                    visible: false,
                }, {
                    targets: 6,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        const tipoGastos = full[2]; // índice de tipo_ingresos en la fila
                         if (tipoGastos === 'Otros') {
                        return "<center>" +
                            "<span class='btn_edit_gastos text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>" +
                            "<span class='btnEliminar_gastos text-danger px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-trash fs-5'></i>" +
                            "</span>" +
                            "</center>";
                           } else {
                            return ""; // No mostrar botones si no es "Otros"
                        }
                    }
                }],
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
    });
};

document.getElementById("btnRealizarArqueo").addEventListener("click", function() {
    const btn = this;
    btn.disabled = true; // Desactiva el botón al hacer clic
    const forms = document.getElementsByClassName('needs-validation');
    Swal.fire({
        title: '¿Está seguro de realizar el arqueo?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarla',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
         if (!result.isConfirmed) {
            btn.disabled = false; // Reactiva si cancela
            return;
        }

        const datos = new FormData();
        datos.append("accion", 8);
        datos.append("txt_id_arqueo_caja", $("#txt_id_arqueo_caja").val());
        datos.append("inpuBillete100", $("#billete_100").val());
        datos.append("inpuBillete50", $("#billete_50").val());
        datos.append("inpuBillete20", $("#billete_20").val());
        datos.append("inpuBillete10", $("#billete_10").val());
        datos.append("inpuBillete5", $("#billete_5").val());
        datos.append("inpuBillete1", $("#billete_1").val());
        datos.append("inputMoneda1", $("#moneda_1").val());
        datos.append("inputMoneda50", $("#moneda_050").val());
        datos.append("inputMoneda25", $("#moneda_025").val());
        datos.append("inputMoneda10", $("#moneda_010").val());
        datos.append("inputMoneda5", $("#moneda_005").val());
        datos.append("inputMoneda001", $("#moneda_001").val());
        datos.append("total_efectivo", $("#total_efectivo_contado").html().replace('$', ''));
        datos.append("inpuTotalMoneda", $("#total_solo_monedas").html().replace('$', ''));
        datos.append("inpuTotalBilletes", $("#total_solo_billetes").html().replace('$', ''));
        datos.append("txt_Comentario", $("#observaciones").val());

        $.ajax({
            url: "ajax/movimiento_cajas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {
                mostrarAlertaRespuesta(respuesta, function() {
                    // En lugar de destruir y reinicializar todas las tablas,
                    // puedes recargar sus datos usando ajax.reload()
                       cargarTablesSummaryOnly(); 
                    if (table_arqueo) {
                        table_arqueo.ajax.reload();
                    }
                    if (table_ingresos) {
                        table_ingresos.ajax.reload(null, false);
                    }
                    if (table_gastos) {
                        table_gastos.ajax.reload(null, false);
                    }
                    if (table_devoluciones) {
                        table_devoluciones.ajax.reload(null, false);
                    }
                 
                    LimpiarArqueo();
                    $("#mdlGestionarArqueoCaja").modal('hide');
                }, {
                    mensajeExito: "éxito",
                    mensajeAdvertencia: "Warning",
                    mensajeError: "Excepción"
                });
                   btn.disabled = false; 
            },
            
            error: function (xhr, status, error) {
                manejarErrorAjax(xhr, status, error);
                btn.disabled = false; // Reactiva en caso de error
            }
            // error: manejarErrorAjax
        });
    });
});

function cargarTableArqueo(fecha_inicio,fecha_fin){
 
  table_arqueo = $("#tbl_arqueos").DataTable({
    destroy: true,
          ajax: {
            url: "ajax/movimiento_cajas.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
              'accion': 1,
              'fechaInicio': fecha_inicio,
              'fechaFin': fecha_fin
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
            },
            {
              targets: 2,
              visible: false
            },
            {
              targets: 3,
              visible: false
            },
            {
              targets: 6,
              visible: false
            },
            {
              targets: 7,
              visible: false
            },
            {
              targets: 10,
              visible: false
            },
            {
              targets: 11,
              visible: false
            },
            {
              targets: 13,
              sortable: false,
              className: "text-center",
              render: function(data) {
                return data === '1' ? '<span class="badge bg-success">Abierta</span>' : '<span class="badge bg-secondary">Cerrado</span>';
              }
            },
           {
  targets: 14,
  orderable: false,
  render: function(data, type, full, meta) {
    let arqueoOption = '';
    let imprimirOption = '';

    if (full.estado === '1') {
      // Si está abierta, solo mostrar botón "Arqueo"
      arqueoOption = `
        <li>
          <a class="dropdown-item btnArqueo" href="#" data-id="${full.id_arqueo_caja}" title="Realizar abono a este crédito" style="cursor:pointer;">
            <i class="fas fa-cash-register"></i> Arqueo
          </a>
        </li>
      `;
    } else {
      // Si está cerrada, solo mostrar botón "Imprimir"
      imprimirOption = `
        <li>
          <a class="dropdown-item btnImprimirAqueo" href="#" data-id="${full.id_arqueo_caja}" title="Imprimir arqueo del cliente" style="cursor:pointer;">
            <i class="fas fa-print"></i> Imprimir Arqueo
          </a>
        </li>
      `;
    }

    return `
      <div class="dropdown text-center">
        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="accionesDropdown${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="accionesDropdown${meta.row}">
          ${arqueoOption}
          ${imprimirOption}
        </ul>
      </div>
    `;
  }
}

          ],
          order: [
            [0, 'desc']
          ],
          lengthMenu: [5, 10, 15, 20, 50],
          pageLength: 10,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          }
 });
}
// Una nueva función para cargar solo los datos de resumen sin afectar a los DataTables
function cargarTablesSummaryOnly() {
    $.ajax({
        url: "ajax/movimiento_cajas.ajax.php",
        method: 'POST',
        data: {
            'accion': 2
        },
        dataType: 'json',
        success: function(respuesta) {
          console.log("sss",respuesta)
            const montoInicial = parseFloat(respuesta[0]['monto_inicial']);
            const total_ingresos =
                parseFloat(respuesta[0]['total_ingresos_ventas']) +
                parseFloat(respuesta[0]['total_abono_credito_venta']) +
                parseFloat(respuesta[0]['total_otros_ingresos']);
            const total_gastos =
                parseFloat(respuesta[0]['total_compras']) +
                parseFloat(respuesta[0]['total_abono_credito_compras']) +
                parseFloat(respuesta[0]['total_gastos_otros']);
            const saldo_movimiento = parseFloat(total_ingresos - total_gastos);

            const saldo_final = parseFloat(montoInicial + saldo_movimiento);
            $("#inicial").html(montoInicial.toFixed(2));
            $("#devoluciones_compras").html(parseFloat(respuesta[0]['total_devolucion_compras']).toFixed(2));
            $("#devoluciones_ventas").html(parseFloat(respuesta[0]['total_devolucion_ventas']).toFixed(2));
            $("#Ingreso").html(total_ingresos.toFixed(2));
            $("#total_venta_creditos").html(parseFloat(respuesta[0]['total_credito_pendiente_venta']).toFixed(2));
            $("#total_compras_creditos").html(parseFloat(respuesta[0]['total_credito_pendiente_compras']).toFixed(2));

            $("#Gasto").html(total_gastos.toFixed(2));
            $("#Ingresos_total").html(total_ingresos.toFixed(2));
            $("#Egresos_total").html(total_gastos.toFixed(2));
            $("#Saldo").html(saldo_movimiento.toFixed(2));
            $("#Diferencia").html(saldo_final.toFixed(2));

            FonoInicial = parseFloat(respuesta[0]['monto_inicial']);
            IngresosVentasEfectivo = parseFloat(respuesta[0]['total_ingresos_ventas']);
            OtrosIngresosEfectivo =
                parseFloat(respuesta[0]['total_abono_credito_venta']) +
                parseFloat(respuesta[0]['total_otros_ingresos']);

            EgresosComprasEfectivo = parseFloat(respuesta[0]['total_compras']);
            OtrosEgresosEfectivo =
                parseFloat(respuesta[0]['total_abono_credito_compras']) +
                parseFloat(respuesta[0]['total_gastos_otros']);
        }
    });
}
  function LimpiarArqueo() {
    // Limpiar campos de entrada
    $("#txt_id_arqueo_caja").val("");
    $("#billete_100").val("0");
    $("#billete_50").val("0");
    $("#billete_20").val("0");
    $("#billete_10").val("0");
    $("#billete_5").val("0");
    $("#billete_1").val("0");
    $("#moneda_1").val("0");
    $("#moneda_050").val("0");
    $("#moneda_025").val("0");
    $("#moneda_010").val("0");
    $("#moneda_005").val("0");
    $("#moneda_001").val("0");
    $("#observaciones").val("");
    // Limpiar valores mostrados en HTML (como totales)
    $("#total_efectivo_contado").html("0.00");
    $("#total_solo_billetes").html("0.00");
    $("#total_solo_monedas").html("0.00");

  }

   function formatDate(date) {
    const d = new Date(date);
    const month = '' + (d.getMonth() + 1).toString().padStart(2, '0');
    const day = '' + d.getDate().toString().padStart(2, '0');
    const year = d.getFullYear();
    //return [year, month, day].join('-');
    return `${year}-${month}-${day}`;
  }

// document.getElementById("btnGuardar_movimiento").addEventListener("click", function() {
//     let forms = document.getElementsByClassName('needs-validation');
//     Array.prototype.forEach.call(forms, function(form) {
//         if (form.checkValidity() === true) {
//             fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
//             Swal.fire({
//                 title: 'Está seguro de registrar Movimientos Cajas?',
//                 icon: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Si, deseo registrarlo!',
//                 cancelButtonText: 'Cancelar',
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     let datos = new FormData();
//                     datos.append("accion", 6);
//                     datos.append("opcion", opcion_movimiento);
//                     datos.append("id", $("#id_ingresos").val());
//                     datos.append("tipo_movimientos", $("#ddlTipo_Movimiento").val());
//                     datos.append("tipo_movimiento", 1);
//                     datos.append("monto", $("#txt_Monto").val());
//                     datos.append("concepto", $("#txt_Comentario").val());

//                     $.ajax({
//                         url: "ajax/movimiento_cajas.ajax.php",
//                         method: "POST",
//                         data: datos,
//                         cache: false,
//                         contentType: false,
//                         processData: false,
//                         dataType: 'json',
//                         success: function(respuesta) {
//                             mostrarAlertaRespuesta(respuesta, function() {
//                                 $("#mdlGestionarMovimientoCaja").modal('hide'); // Asegúrate que es este ID
//                                 cargarTables(); // Llama a la función completa para re-inicializar
//                             }, {
//                                 mensajeExito: "éxito",
//                                 mensajeAdvertencia: "Warning",
//                                 mensajeError: "Excepción"
//                             });
//                         },
//                         error: manejarErrorAjax
//                     });
//                 }
//             });
//         }
//         form.classList.add('was-validated');
//     });
// });

</script>