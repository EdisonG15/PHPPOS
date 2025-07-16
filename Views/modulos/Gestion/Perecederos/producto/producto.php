<style>
    body {
      background-color: #ecf0f5;
    }
    .card-custom {
      border-top: 3px solid #007bff;
      border-radius: 5px;
    }
    .form-label {
      font-weight: bold;
    }
    .image-box {
      max-width: 100%;
      height: auto;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0069d9;
    }
  </style>

<div class="content">
    <div class="container-fluid">
  <h4><i class="bi bi-pencil-square"></i> Agregar nuevo producto</h4>
  <div class="row mt-4">
    
    <!-- Imagen -->
    <div class="col-md-4">
      <div class="card card-custom p-3 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/104/104925.png" alt="Producto" class="image-box">
      </div>
    </div>

    <!-- Formulario -->
    <div class="col-md-8">
      <div class="card card-custom p-4">
        <h5 class="mb-3">Detalles del producto</h5>
        <form>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Código</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Modelo</label>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Presentación</label>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Fabricante</label>
              <select class="form-select">
                <option>Selecciona</option>
                <option>Fabricante 1</option>
                <option>Fabricante 2</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Estado</label>
              <select class="form-select">
                <option>Activo</option>
                <option>Inactivo</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Costo</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Utilidad</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Precio de venta</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Stock inicial</label>
              <input type="number" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Imagen</label>
              <input type="file" class="form-control">
            </div>
          </div>

          <button type="submit" class="btn btn-primary mt-2">Guardar datos</button>
        </form>
      </div>
    </div>

  </div>
</div>
  </div>
</div>
<!-- <div class="modal fade" id="mdlGestionarStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded">
            <div class="modal-header bg-primary py-3 text-white">
                <h5 class="modal-title" id="titulo_modal_stock">Adicionar Stock</h5>
                <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close"
                    id="btnCerrarModalStock">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="hidden" id="percedero" name="rol" value="0">
                        <label class="form-label text-muted d-block">Id: <span id="idProducto_stock" class="text-dark"></span></label>
                        <label class="form-label text-muted d-block">Codigo: <span id="stock_codigoProducto" class="text-dark"></span></label>
                        <label class="form-label text-muted d-block">Producto: <span id="nombre_producto" class="text-dark"></span></label>
                        <label class="form-label text-muted d-block">Stock: <span id="stock_Stock" class="text-dark"></span></label>
                        <input type="hidden" id="precio_compras_producto">
                    </div>
                    <div class="mb-3">
                        <label for="selTipoOperacion" class="form-label">Tipo de Ingreso</label>
                        <select class="form-select" id="selTipoOperacion">
                            <option value="COMPRA" selected="true">COMPRA</option>
                            <option value="PROMOCION">PROMOCION</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="iptCantidad" class="d-flex align-items-center">
                                <i class="fas fa-plus-circle fs-6 me-2"></i>
                                <span id="titulo_modal_label" class="text-primary">Agregar al Stock</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptCantidad"
                                placeholder="Ingrese cantidad a agregar al Stock">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="iptFechaVencimientoAun" class="d-flex align-items-center">
                                <i class="fas fa-plus-circle fs-6 me-2"></i>
                                <span id="titulo_modal_label" class="text-primary">Fecha Vencimiento</span>
                            </label>
                            <input type="date" min="0" class="form-control form-control-sm" id="iptFechaVencimientoAun"
                                placeholder="Ingrese Fecha Vencimiento">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="iptComentario" class="d-flex align-items-center">
                                <i class="fas fa-comment-alt fs-6 me-2"></i>
                                <span id="titulo_modal_label">Comentario</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptComentario"
                                placeholder="Ingrese el concepto de dicha operación">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-danger">Nuevo Stock: <span id="stock_NuevoStock" class="text-dark"></span></label><br>
                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-end gap-1">
                <button type="button" class="btn btn-outline-secondary btn-sm me-1" data-bs-dismiss="modal" id="btnCancelarRegistroStock">Cancelar</button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardarNuevorStock">Guardar</button>
            </div>
        </div>
    </div>
