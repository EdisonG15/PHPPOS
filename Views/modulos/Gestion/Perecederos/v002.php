<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jeily - Punto de Venta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar, .footer {
      background-color: #003366;
      color: white;
    }

    .main-title {
      font-size: 1.5rem;
    }

    .panel {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      padding: 20px;
      margin-bottom: 24px;
    }

    .table thead {
      background-color: #003366;
      color: white;
    }

    .btn-square {
      width: 100%;
      padding: 12px;
      font-size: 14px;
    }

    .btn-square i {
      margin-right: 6px;
    }

    .footer {
      padding: 12px;
      text-align: right;
      font-size: 14px;
    }

    .card-total {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      border: 1px solid #dee2e6;
    }

    .total-amount {
      font-size: 2rem;
      color: #198754;
    }
  </style>
</head>
<body>

  <!-- Encabezado -->
  <nav class="navbar px-4 py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="main-title text-white"><i class="bi bi-cash-register me-2"></i>Jeily - Punto de Venta</span>
      <span class="text-white fw-bold">15/05/2025</span>
    </div>
  </nav>

  <div class="container my-4">

    <!-- Panel de entrada -->
    <div class="panel">
      <h5 class="mb-3">📦 Venta de Productos</h5>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Código del producto:</label>
          <input type="text" class="form-control" placeholder="Ej. 123456">
        </div>
        <div class="col-md-2">
          <label class="form-label">Cantidad:</label>
          <input type="number" class="form-control" value="1" min="1">
        </div>
        <div class="col-md-6 d-flex align-items-end justify-content-end">
          <button class="btn btn-outline-primary me-2"><i class="bi bi-search"></i> Búsqueda dinámica</button>
          <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Registrar recarga</button>
        </div>
      </div>
    </div>

    <!-- Tabla de productos -->
    <div class="panel">
      <table class="table table-bordered align-middle text-center mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Descuento</th>
            <th>Importe</th>
          </tr>
        </thead>
        <tbody>
          <!-- Dinámicamente agregar productos -->
          <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
           <tr>
            <!-- <td colspan="7" class="text-muted">Sin productos aún...</td> -->
                 <td>LOT001</td>
                  <td>LOT001</td>
                   <td>LOT001</td>
        <td>50</td>
        <td>2025-05-01</td>
        <td>2026-01-01</td>
        <td>Sin observaciones</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Acciones y Total -->
    <div class="row">
      <div class="col-md-8">
        <div class="row g-2">
          <div class="col-md-3"><button class="btn btn-outline-info btn-square"><i class="bi bi-box"></i> F9 Artículo Común</button></div>
          <div class="col-md-3"><button class="btn btn-outline-warning btn-square"><i class="bi bi-info-circle"></i> F7 Datos extra</button></div>
          <div class="col-md-3"><button class="btn btn-outline-success btn-square"><i class="bi bi-lightning"></i> F11 Búsqueda rápida</button></div>
          <div class="col-md-3"><button class="btn btn-outline-danger btn-square"><i class="bi bi-x-circle"></i> F8 Cancelar venta</button></div>
        </div>
        <div class="row g-2 mt-2">
          <div class="col-md-3"><button class="btn btn-outline-secondary btn-square"><i class="bi bi-pencil"></i> F6 Editar venta</button></div>
          <div class="col-md-3"><button class="btn btn-outline-dark btn-square"><i class="bi bi-receipt"></i> F3 Reimprimir ticket</button></div>
          <div class="col-md-3"><button class="btn btn-outline-primary btn-square"><i class="bi bi-boxes"></i> F10 Venta a granel</button></div>
          <div class="col-md-3"><button class="btn btn-outline-secondary btn-square"><i class="bi bi-ticket-perforated"></i> F5 Nuevo ticket</button></div>
        </div>
      </div>

      <!-- Total -->
      <div class="col-md-4">
        <div class="card-total">
          <div class="text-center mb-3">
            <h6>Total a pagar</h6>
            <div class="total-amount fw-bold">$0.00</div>
          </div>
          <div class="d-flex justify-content-between"><span>Descuento:</span><span>$0.00</span></div>
          <div class="d-flex justify-content-between"><span>Dólares:</span><span>$0.00</span></div>
          <div class="d-grid mt-3">
            <button class="btn btn-warning btn-lg"><i class="bi bi-cash-coin"></i> F12 Cobrar</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Pie -->
  <div class="footer">
    Cajero: <strong>Jeily</strong> | Hora: <span id="hora"></span> | Versión 6.3
  </div>

  <script>
    setInterval(() => {
      const now = new Date();
      document.getElementById("hora").textContent = now.toLocaleTimeString();
    }, 1000);
  </script>

</body>
</html>
