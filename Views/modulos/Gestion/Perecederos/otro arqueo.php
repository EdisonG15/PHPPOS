<style>


</style>


<form id="cierreCajaForm">
  <div class="container">

    <div class="row">
      <!-- Columna izquierda: Ingresos y Egresos -->
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h6 class="mb-0 text-center">Ingresos Efectivo</h6>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="efectivoInicio" class="form-label">Fondo Inicial de Caja ($):</label>
              <input type="number" class="form-control" id="efectivoInicio" name="efectivoInicio" step="0.01" value="0.00" min="0">
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
              <label for="gastosEfectivo" class="form-label">Gastos en Efectivo del Día ($):</label>
              <input type="number" class="form-control" id="gastosEfectivo" name="gastosEfectivo" step="0.01" value="0.00" min="0">
            </div>
            <div class="mb-3">
              <label for="comprasEfectivo" class="form-label">Compras en Efectivo del Día ($):</label>
              <input type="number" class="form-control" id="comprasEfectivo" name="comprasEfectivo" step="0.01" value="0.00" min="0">
            </div>
            <div class="mb-3">
              <label for="otrosEgresosEfectivo" class="form-label">Otros Egresos en Efectivo ($):</label>
              <input type="number" class="form-control" id="otrosEgresosEfectivo" name="otrosEgresosEfectivo" step="0.01" value="0.00" min="0">
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
                <input type="number" class="form-control" id="billete_100" oninput="calculateDenomination()" min="0" value="0">
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
                <input type="number" class="form-control" id="billete_1" oninput="calculateDenomination()" min="0" value="0">
              </div>
              <div class="col-6 d-flex align-items-center">
                <span id="total_billete_1">$0.00</span>
              </div>

              <div class="col-6">
                 <div class="total-display">
                                <span>Total Billetes:</span>
                                <strong id="total_solo_billetes">$0.00</strong>
                            </div>
                <!-- <label for="total_billetes" class="form-label">Total Billetes:</label>
                <input type="number" class="form-control" id="total_billetes"  min="0" value="0"> -->
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
                <input type="number" class="form-control" id="moneda_1" oninput="calculateDenomination()" min="0" value="0">
              </div>
              <div class="col-6 d-flex align-items-center">
                <span id="total_moneda_1">$0.00</span>
              </div>

              <div class="col-6">
                <label for="moneda_050" class="form-label">Monedas de $0.50:</label>
                <input type="number" class="form-control" id="moneda_050" oninput="calculateDenomination()" min="0" value="0">
              </div>
              <div class="col-6 d-flex align-items-center">
                <span id="total_moneda_050">$0.00</span>
              </div>

              <div class="col-6">
                <label for="moneda_025" class="form-label">Monedas de $0.25:</label>
                <input type="number" class="form-control" id="moneda_025" oninput="calculateDenomination()" min="0" value="0">
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
                <!-- <label for="total_moneda" class="form-label">Total Monedas:</label>
                <input type="number" class="form-control" id="total_moneda"  min="0" value="0"> -->
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
          <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Escribe aquí cualquier comentario relevante...">
        </div>
    <!-- Botones -->
    <div class="row mt-4">
      <div class="col text-center">
        <button type="submit" class="btn btn-primary me-2">Realizar Cierre</button>
        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
      </div>
    </div>
  </div>
</form>


<script>
  // function calculateDenomination() {
  //   const denominations = {
  //     billete_100: 100,
  //     billete_50: 50,
  //     billete_20: 20,
  //     billete_10: 10,
  //     billete_5: 5,
  //     billete_1: 1,
  //     moneda_1: 1,
  //     moneda_050: 0.50,
  //     moneda_025: 0.25,
  //     moneda_010: 0.10,
  //     moneda_005: 0.05,
  //     moneda_001: 0.01
  //   };
   const denominations = {
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
        const billIds = ['billete_100', 'billete_50', 'billete_20', 'billete_10', 'billete_5', 'billete_1'];
        const coinIds = ['moneda_1', 'moneda_050', 'moneda_025', 'moneda_010', 'moneda_005','moneda_001'];

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

        // Ejecutar el cálculo inicial al cargar la página
        document.addEventListener('DOMContentLoaded', calculateAllTotals);
  //   for (const id in denominations) {
  //     const inputElement = document.getElementById(id);
  //     const totalElement = document.getElementById(`total_${id}`);
  //     const count = parseFloat(inputElement.value) || 0;
  //     const value = denominations[id];
  //     const total = count * value;
  //     totalElement.textContent = `$${total.toFixed(2)}`;
  //   }
  // }

  // document.addEventListener('DOMContentLoaded', calculateDenomination);
</script>