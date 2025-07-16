<div class="modal fade" id="mdlGestionarProducto" role="dialog" tabindex="-1" aria-labelledby="mdlGestionarProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="modal-title fw-bold fs-4" id="mdlGestionarProductoLabel">Agregar Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModal"></button>
            </div>
            <div class="modal-body p-4 pt-3 pb-0 overflow-auto" style="max-height: calc(100vh - 180px);"> 
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light fw-bold py-2 px-3">
                                    <i class="fas fa-info-circle me-2 text-primary"></i> Información General
                                </div>
                                <div class="card-body row g-2 py-3 px-3"> <div class="col-12 col-lg-4">
                                        <input type="hidden" id="idProducto" name="producto" value="0">
                                        <label for="iptCodigoReg" class="form-label d-flex align-items-center text-secondary mb-1 small">
                                            <i class="fas fa-barcode me-2 text-primary"></i> Código de Barras <span class="text-danger ms-1">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm border-2 rounded-3 focus-ring" id="iptCodigoReg" name="iptCodigoReg"
                                            maxlength="13" minlength="3" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off" placeholder="E.g., 1234567890123">
                                        <div class="invalid-feedback">Debe ingresar el código de barras.</div>
                                        <div class="valid-feedback">¡Código válido!</div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="selCategoriaReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-dumpster me-2 text-primary"></i>Categoría <span class="text-danger ms-1">*</span>
                                            </label>
                                          
                                                <select name="estado" id="selCategoriaReg" class="form-select form-control-sm border-2 rounded-3 focus-ring" required>
    </select>
                                            <div class="invalid-feedback">Seleccione la categoría.</div>
                                            <div class="valid-feedback">¡Categoría seleccionada!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="selMedidasReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-ruler-combined me-2 text-primary"></i> Medidas <span class="text-danger ms-1">*</span>
                                            </label>
                                            <select class="form-select form-control-sm border-2 rounded-3 focus-ring" id="selMedidasReg" required>
                                                </select>
                                            <div class="invalid-feedback">Seleccione las medidas.</div>
                                            <div class="valid-feedback">¡Medidas seleccionadas!</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="iptDescripcionReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-file-signature me-2 text-primary"></i> Nombre del Producto <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="text" class="form-control form-control-sm border-2 rounded-3 focus-ring" id="iptDescripcionReg"
                                                maxlength="50" minlength="3" required autocomplete="off" placeholder="E.g., Camiseta deportiva">
                                            <div class="invalid-feedback">Debe ingresar el nombre del producto.</div>
                                            <div class="valid-feedback">¡Nombre válido!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light fw-bold py-2 px-3">
                                    <i class="fas fa-camera me-2 text-primary"></i> Imagen y Caducidad
                                </div>
                                <div class="card-body py-3 px-3">
                                    <div class="form-group mb-3">
                                        <label for="iptImagen" class="form-label text-secondary mb-1 small">
                                            <i class="fas fa-image me-2 text-primary"></i> <span class="small">Seleccione una imagen (opcional)</span>
                                        </label>
                                        <input type="file" class="form-control form-control-sm border-2 rounded-3" id="iptImagen" name="iptImagen" accept="image/*" onchange="previewFile(this)">
                                        <div class="invalid-feedback">Formato de imagen no permitido.</div>
                                        <div class="valid-feedback">¡Imagen seleccionada!</div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center align-items-center bg-light rounded-3 p-2 border border-secondary" style="height: 180px; overflow: hidden;"> 
                                        <img id="previewImg" src="Views/assets/imagenes/no_image.jpg" class="img-fluid rounded-2" style="object-fit: contain; max-width: 100%; max-height: 100%;" alt="Vista previa de la imagen">
                                    </div>

                                    <div class="form-group mb-1">
                                        <label for="iptFechaVencimiento" class="form-label text-secondary mb-1 small">
                                            <i class="fas fa-calendar-alt me-2 text-primary"></i> Fecha de Vencimiento <span class="text-danger ms-1 perecedero-required-asterisk" style="display: none;">*</span>
                                        </label>
                                        <input type="date" class="form-control form-control-sm border-2 rounded-3 focus-ring" id="iptFechaVencimiento">
                                        <div class="invalid-feedback">Debe ingresar la fecha de vencimiento para productos perecederos.</div>
                                        <div class="valid-feedback">¡Fecha válida!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light fw-bold py-2 px-3">
                                    <i class="fas fa-dollar-sign me-2 text-primary"></i> Precios y Stock
                                </div>
                                <div class="card-body row g-2 py-3 px-3"> <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptPrecioCompraReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-dollar-sign me-2 text-primary"></i> Precio de Compra <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="number" min="0" step="0.01" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptPrecioCompraReg" maxlength="8" placeholder="0.00" required oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            <div class="invalid-feedback">Debe ingresar el precio de compra.</div>
                                            <div class="valid-feedback">¡Campo correcto!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptPrecioVentaReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-dollar-sign me-2 text-primary"></i> Precio de Venta <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="number" min="0" step="0.01" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptPrecioVentaReg" maxlength="8" placeholder="0.00" required
                                                oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            <div class="invalid-feedback">El precio de venta debe ser mayor que el precio de compra.</div>
                                            <div class="valid-feedback">¡Precio válido!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptPrecio1" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-dollar-sign me-2 text-primary"></i> Precio 1 <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="number" min="0.00" step="0.01" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptPrecio1" maxlength="8" placeholder="0.00" required
                                                oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            <div class="invalid-feedback">El Precio 1 debe ser mayor que el precio de compra.</div>
                                            <div class="valid-feedback">¡Precio válido!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptPrecio2" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-dollar-sign me-2 text-primary"></i> Precio 2
                                            </label>
                                            <input type="number" min="0.00" step="0.01" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptPrecio2" maxlength="8" placeholder="0.00"
                                                oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            <div class="invalid-feedback">El Precio 2 debe ser mayor que el precio de compra.</div>
                                            <div class="valid-feedback">¡Precio válido!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptStockReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-boxes me-2 text-primary"></i> Stock <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="number" min="0" maxlength="5" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptStockReg" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="E.g., 100" required>
                                            <div class="invalid-feedback">Debe ingresar el stock.</div>
                                            <div class="valid-feedback">¡Stock válido!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="iptMinimoStockReg" class="form-label text-secondary mb-1 small">
                                                <i class="fas fa-exclamation-triangle me-2 text-primary"></i> Mínimo Stock <span class="text-danger ms-1">*</span>
                                            </label>
                                            <input type="number" min="0" maxlength="5" class="form-control form-control-sm border-2 rounded-3 focus-ring"
                                                id="iptMinimoStockReg" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="E.g., 10" required>
                                            <div class="invalid-feedback">Debe ingresar el stock mínimo.</div>
                                            <div class="valid-feedback">¡Stock mínimo válido!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light fw-bold py-2 px-3">
                                    <i class="fas fa-cogs me-2 text-primary"></i> Opciones Adicionales
                                </div>
                                <div class="card-body d-flex flex-column flex-md-row justify-content-start align-items-center py-3 px-3">
                                    <div class="form-check form-switch mb-2 mb-md-0 me-md-4">
                                        <input class="form-check-input" type="checkbox" id="chkIva" name="chkIva">
                                        <label class="form-check-label text-secondary small" for="chkIva">
                                            <span class="small fw-semibold">APLICAR IVA</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="chkPerecedero" name="chkPerecedero">
                                        <label class="form-check-label text-secondary small" for="chkPerecedero">
                                            <span class="small fw-semibold">PRODUCTO PERECEDERO</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-end pt-3 pb-3 px-4 mt-4">
                        <button type="button" class="btn btn-outline-secondary me-3 px-4 py-2 rounded-pill fw-semibold" data-bs-dismiss="modal" id="btnCancelarRegistro">
                            <i class="fas fa-times me-2"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-primary px-5 py-2 rounded-pill fw-semibold" id="btnGuardar">
                            <i class="fas fa-save me-2"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="mdlGestionarCategorias" tabindex="-1" aria-labelledby="mdlGestionarCategoriasLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0 modern-modal-content" >
      
      <div class="modal-header text-white py-4 px-4 rounded-top-4 modern-header-gradient">
        <h5 class="modal-title d-flex align-items-center gap-3 fw-bold" id="mdlGestionarCategoriasLabel">
          <i class="fas fa-layer-group fa-lg"></i> Agregar Categoría
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body px-4 py-4 bg-light-subtle">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body px-4 py-4">

            <form class="needs-validation" novalidate>
              <input type="hidden" id="idCategoria" name="categoria" value="0">
              
              <div class="form-floating mb-4">
                <input type="text" class="form-control form-control-modern" id="txtCategoria"
                       name="txtCategoria" maxlength="50" minlength="10" placeholder="Ej. Electrónica"
                       required autocomplete="off">
                <label for="txtCategoria">Categoría <span class="text-danger"></span></label>
                <div class="invalid-feedback">Debe ingresar el nombre de la categoría.</div>
              </div>

              <div class="form-floating mb-5">
                <select name="estado" id="ddlEstado_categorias" class="form-select form-control-modern">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
                <label for="ddlEstado_categorias">Estado <span class="text-danger"></span></label>
              </div>

              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-danger btn-lg me-3" data-bs-dismiss="modal" id="btnCancelarRegistroCategorias">
                  <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="button" class="btn btn-primary btn-lg px-5 shadow-sm btn-modern-primary" id="btnGuardarCategorias">
                  <i class="fas fa-save me-2"></i>Guardar
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<script>
   // Validar que el precio de venta sea mayor que el precio de compra
    
         if (precioVenta <= precioCompra) {
        formularioValido = false;
        $("#iptPrecioVentaReg").addClass("is-invalid");
        $("#iptPrecioVentaReg").next(".invalid-feedback").text("El precio de venta debe ser mayor que el precio de compra.");
    } else {
        $("#iptPrecioVentaReg").removeClass("is-invalid");
        // Reset to default feedback if not invalid due to this condition
        // This line might need to be adjusted if there are other default required validations
        if (!$("#iptPrecioVentaReg")[0].checkValidity()) { // Check if browser validation fails
            $("#iptPrecioVentaReg").next(".invalid-feedback").text("Debe ingresar el precio de venta.");
        }
    }

        // Validar que Precio 1 sea mayor que el Precio de Compra
         if (precio1 <= precioCompra) {
        formularioValido = false;
        $("#iptPrecio1").addClass("is-invalid");
        $("#iptPrecio1").next(".invalid-feedback").text("El Precio por Mayor debe ser mayor que el precio de compra.");
    } else {
        $("#iptPrecio1").removeClass("is-invalid");
        if (!$("#iptPrecio1")[0].checkValidity()) {
            $("#iptPrecio1").next(".invalid-feedback").text("Debe ingresar el Precio por Mayor.");
        }
    }

        // Validar que Precio 2 sea mayor que el Precio de Compra (solo si tiene un valor)
        // Precio 2 no es requerido en tu HTML, por eso validamos si tiene un valor ingresado
     if (precio2 !== 0 && precio2 <= precioCompra) {
        formularioValido = false;
        $("#iptPrecio2").addClass("is-invalid");
        $("#iptPrecio2").next(".invalid-feedback").text("El Precio Especial debe ser mayor que el precio de compra o ser 0.");
    } else {
        $("#iptPrecio2").removeClass("is-invalid");
        // Only set default message if it's currently invalid from HTML5 validation and not from our custom validation above
        if (!$("#iptPrecio2")[0].checkValidity()) {
            $("#iptPrecio2").next(".invalid-feedback").text("Debe ingresar el Precio Especial.");
        }
    }
        // Validar fecha de vencimiento si es perecedero
       if (isPerecedero) {
        fechaVencimientoInput.prop('required', true); // Add required attribute
        if (!fechaVencimiento) {
            formularioValido = false;
            fechaVencimientoInput.addClass("is-invalid");
            fechaVencimientoInput.next(".invalid-feedback").text("Debe ingresar la fecha de vencimiento para productos perecederos.");
        } else {
            fechaVencimientoInput.removeClass("is-invalid");
        }
    } else {
        fechaVencimientoInput.prop('required', false); // Remove required attribute
        fechaVencimientoInput.removeClass("is-invalid"); // Ensure it's not marked invalid
        // Optionally clear the value if it's not perecedero and you don't want to send it
        // fechaVencimientoInput.val('');
    }

    </script>