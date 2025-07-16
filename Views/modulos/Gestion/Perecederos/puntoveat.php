
  <style>
    body, html {
      height: 100%;
      background: #f5f7fa;
    }
    /* .sidebar {
      background: #ffffff;
      border-right: 1px solid #e0e6ed;
      height: 100%;
      padding: 1rem;
    }
    .sidebar .list-group-item {
      cursor: pointer;
    }
    .sidebar .list-group-item.active {
      border-color: #0d6efd;
      background-color: #e7f1ff;
      color: #0d6efd;
    } */
    .content {
      position: relative;
      padding: 1rem 2rem 4rem; /* bottom space for fixed summary */
      overflow-y: auto;
      height: 100%;
    }
    .content .card {
      border: none;
      border-radius: .75rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .summary-bar {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      background: #ffffff;
      border-top: 1px solid #e0e6ed;
      padding: .75rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 -2px 8px rgba(0,0,0,0.03);
    }
    .summary-bar .btn-action {
      min-width: 100px;
    }
    .table-scroll {
      max-height: 220px;
      overflow-y: auto;
    }
  </style>


  <div class="row g-0 h-100">
    <!-- SIDEBAR: Búsqueda + Lista -->
    <aside class="col-12 col-md-4 sidebar">
      <div class="mb-4">
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
          <label for="searchInput"><i class="bi bi-search me-1"></i>Artículo / Código</label>
        </div>
        <button class="btn btn-primary w-100"><i class="bi bi-search"></i> Buscar</button>
      </div>
      <div class="list-group" id="productList">
        <!-- Ejemplo de ítems -->
        <a class="list-group-item list-group-item-action active">
          ARROZ ROA X LB <span class="badge bg-primary float-end">1500</span>
        </a>
        <a class="list-group-item list-group-item-action">
          FABULOSO ANTIBACTERIAL MANZ <span class="badge bg-primary float-end">6450</span>
        </a>
        <a class="list-group-item list-group-item-action">
          DETERGENTE GOL FLORAL 125 G <span class="badge bg-primary float-end">3600</span>
        </a>
        <!-- ... -->
      </div>
    </aside>

    <!-- CONTENT: Detalle + Tabla + Totales -->
    <section class="col-12 col-md-8 content">
      <!-- HEADER: Factura / Proveedor / Fecha -->
      <div class="card mb-4 p-3">
        <div class="row g-3">
          <div class="col-4 form-floating">
            <input type="text" class="form-control" id="invoiceNo" placeholder="Factura #" value="0111">
            <label for="invoiceNo">Factura Compra #</label>
          </div>
          <div class="col-4 form-floating">
            <input type="text" class="form-control" id="providerName" placeholder="Proveedor">
            <label for="providerName">Proveedor</label>
          </div>
          <div class="col-4 form-floating">
            <input type="date" class="form-control" id="purchaseDate" placeholder="Fecha" value="2025-04-24">
            <label for="purchaseDate">Fecha de Compra</label>
          </div>
        </div>
      </div>

      <!-- DETALLE DE ARTÍCULO SELECCIONADO -->
      <!-- <div class="card mb-4 p-3">
        <div class="row g-3 align-items-end">
          <div class="col-5 form-floating">
            <input type="text" class="form-control" id="selDesc" placeholder="Descripción" value="ARROZ ROA X LB" readonly>
            <label for="selDesc">Descripción</label>
          </div>
          <div class="col-3 form-floating">
            <input type="text" class="form-control" id="selCode" placeholder="Código" value="7702552000097" readonly>
            <label for="selCode">Código</label>
          </div>
          <div class="col-2 form-floating">
            <input type="number" class="form-control" id="selQty" placeholder="Cantidad" value="10">
            <label for="selQty">Cantidad</label>
          </div>
          <div class="col-2 form-floating">
            <input type="number" class="form-control" id="selPrice" placeholder="Precio + IVA" value="1200">
            <label for="selPrice">Precio + IVA</label>
          </div>
          <div class="col-12 text-end">
            <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Añadir</button>
            <button class="btn btn-outline-danger"><i class="bi bi-trash"></i> Eliminar</button>
          </div>
        </div>
      </div> -->

      <!-- TABLA DE ÍTEMS CON SCROLL -->
      <div class="card mb-5 p-0">
        <div class="table-scroll">
          <table class="table table-hover table-sm mb-0">
            <thead class="table-light">
              <tr>
                <th>Código</th>
                <th>Factura</th>
                <th>Descripción</th>
                <th class="text-end">Cant.</th>
                <th class="text-end">SubTotal</th>
                <th>Vence</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              <tr>
                <td>7702137001</td>
                <td>0111</td>
                <td>LIMPIO CLOROX ROPA COLOR 375 ML</td>
                <td class="text-end">10</td>
                <td class="text-end">50000</td>
                <td>2025-04-24</td>
              </tr>
              
              <!-- más filas... -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- BARRA DE TOTALES FIJA -->
      <div class="summary-bar">
        <div>
          <small>Items:</small> <strong>10</strong>
          &nbsp;&nbsp;
          <small>SubTotal:</small> <strong class="text-danger">50,000</strong>
          &nbsp;&nbsp;
          <small>Descuento:</small>
          <input type="number" class="form-control form-control-sm d-inline-block" style="width: 80px;" placeholder="0">
        </div>
        <div>
          <small>Total:</small>
          <strong class="fs-4 text-success">50,000</strong>
          &nbsp;&nbsp;
          <button class="btn btn-primary btn-action"><i class="bi bi-cash-stack"></i> Contado</button>
          <button class="btn btn-outline-primary btn-action"><i class="bi bi-credit-card-2-front"></i> Crédito</button>
          <button class="btn btn-outline-secondary btn-action"><i class="bi bi-x-circle"></i> Cancelar</button>
        </div>
      </div>
    </section>
  </div>
