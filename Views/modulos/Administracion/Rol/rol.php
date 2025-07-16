
<!-- <?php 
session_start()         
           ?> -->
<style>
body, html {
  height: 100%;
  background-color: #f7f8fa;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}

.sidebar {
  background: #ffffff;
  border-right: 1px solid #e0e6ed;
  height: 100%;
  padding: 2rem 1.5rem;
  box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}

.sidebar .list-group-item {
  cursor: pointer;
  transition: all 0.3s ease;
}

.sidebar .list-group-item:hover {
  background-color: #e7f1ff;
  color: #0056b3;
}

.sidebar .list-group-item.active {
  background-color: #e7f1ff;
  color: #0056b3;
  border-color: #0056b3;
}

.content {
  position: relative;
  padding: 2rem 3rem 5rem; /* Bottom space for fixed summary */
  overflow-y: auto;
  height: 100%;
}

.card {
  border-radius: 0.75rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  background-color: #fff;
  margin-bottom: 2rem;
  padding: 1.5rem;
}

.card-header {
  font-size: 1.25rem;
  font-weight: bold;
  border-bottom: 1px solid #e0e6ed;
  padding-bottom: 1rem;
}

.card-body {
  padding: 1rem 0;
}

.form-floating input, .form-floating select {
  font-size: 1rem;
  padding: 0.75rem;
  border-radius: 0.375rem;
}

.table-scroll {
  max-height: 300px;
  overflow-y: auto;
  border-radius: 0.75rem;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  margin-top: 1.5rem;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, table td {
  padding: 0.75rem;
  text-align: left;
  font-size: 0.9rem;
}

table th {
  background-color: #f8f9fa;
  font-weight: 600;
}

table td {
  background-color: #fff;
}

.summary-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: #ffffff;
  border-top: 1px solid #e0e6ed;
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
}

.summary-bar small {
  font-size: 0.875rem;
  color: #6c757d;
}

.summary-bar .btn-action {
  min-width: 120px;
  border-radius: 0.375rem;
  padding: 0.5rem 1.5rem;
}

.summary-bar .btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.summary-bar .btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

.summary-bar .btn-outline-primary {
  border-color: #007bff;
  color: #007bff;
}

.summary-bar .btn-outline-primary:hover {
  background-color: #007bff;
  color: #fff;
}

.summary-bar .text-danger {
  font-weight: 600;
}

.summary-bar .text-success {
  font-size: 1.25rem;
  font-weight: 600;
}

.table-hover tbody tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

</style>

<div class="row g-0 h-100">
 

    <!-- CONTENT -->
    <section class="col-12 col-md-8 content">
        <input id="txtIdCliente" type="hidden" value="1" />
        <input id="txtId_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]->id_usuario ?>" />
        <input id="txtId_caja" type="hidden" value="<?php echo $_SESSION["usuario"]->id_caja ?>" />
        <input id="txtNumeroDocumento" type="hidden" value="0" />

        <div class="card mb-4">
            <div class="card-header">Información del Cliente y Documento</div>
            <div class="row g-3">
                <div class="col-4 form-floating">
                    <select class="form-select" id="selDocumentoVenta">
                        <option value="1" selected>Ticket</option>
                        <option value="2">Factura</option>
                    </select>
                    <label for="selDocumentoVenta">Documento</label>
                </div>
                <div class="col-4 form-floating">
                    <input type="text" class="form-control" id="clienteName" placeholder="Cliente">
                    <label for="clienteName">Cliente</label>
                </div>
                <div class="col-4 form-floating">
                    <input type="date" class="form-control" id="purchaseDate" value="2025-04-24">
                    <label for="purchaseDate">Fecha de Compra</label>
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="table-scroll">
                <table id="lstProductosVenta" class="table table-hover table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Id Producto</th>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos dinámicos -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="summary-bar">
            <div>
                <small>Items:</small> <strong id="itemProducto">0</strong>
                &nbsp;&nbsp;
                <small>SubTotal:</small> <strong id="boleta_subtotal" class="text-danger">00,000</strong>
                &nbsp;&nbsp;
                <small>Efectivo:</small>
                <input type="number" id="iptEfectivoRecibido" class="form-control form-control-sm" placeholder="0">
            </div>
            <div>
                <small>Total:</small>
                <strong class="text-success" id="totalVenta">00,000</strong>
                &nbsp;&nbsp;
                <button class="btn btn-primary btn-action" id="btnIniciarVentaContado"><i class="bi bi-cash-stack"></i> Contado</button>
                <button class="btn btn-outline-primary btn-action" id="btnVentaCredit"><i class="bi bi-credit-card-2-front"></i> Crédito</button>
                <button class="btn btn-outline-secondary btn-action"><i class="bi bi-x-circle"></i> Cancelar</button>
            </div>
        </div>
    </section>

       <!-- SIDEBAR -->
    <div class="col-12 col-md-4 sidebar">
        <div class="mb-4">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="searchInputCodigo" placeholder="Buscar..." autocomplete="off">
                <label for="searchInputCodigo"><i class="bi bi-search me-1"></i>Artículo / Código</label>
            </div>
        </div>
        <div class="list-group" id="productList">
            <!-- Items dinámicos aquí -->
        </div>
    </div>
</div>
