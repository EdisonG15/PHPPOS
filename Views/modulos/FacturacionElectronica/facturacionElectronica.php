<section class="content">
  <div class="container-fluid">
    <div class="card card-outline card-primary shadow">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Facturas Electrónicas</h3>
        <button class="btn btn-success btn-sm" onclick="nuevaFactura()">
          <i class="fas fa-plus-circle"></i> Nueva Factura
        </button>
      </div>
      <div class="card-body">
        <table id="tabla-facturas" class="table table-striped table-hover table-bordered">
          <thead class="bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
//   const tabla = $('#tabla-facturas').DataTable({
//     ajax: {
//       url: 'ajax/facturas.php',
//       dataSrc: ''
//     },
//     columns: [
//       { data: null, render: (data, type, row, meta) => meta.row + 1 },
//       { data: 'cliente' },
//       { data: 'fecha' },
//       { data: 'total', render: data => `$${parseFloat(data).toFixed(2)}` },
//       { data: 'estado', render: data => {
//         const color = data === 'ENVIADO' ? 'success' : 'warning';
//         return `<span class="badge bg-${color}">${data}</span>`;
//       }},
//       { data: 'id', render: id => `
//         <button class="btn btn-sm btn-primary btn-enviar" data-id="${id}">
//           <i class="fas fa-paper-plane"></i> Enviar al SRI
//         </button>` }
//     ]
//   });
$(document).ready(function () {
  const tabla = $('#tabla-facturas').DataTable({
    ajax: {
      url: 'ajax/facturas.php',
      dataSrc: ''
    },
    columns: [
      { data: null, render: (data, type, row, meta) => meta.row + 1 },
      { data: 'cliente' },
      { data: 'fecha' },
      { data: 'total', render: data => `$${parseFloat(data).toFixed(2)}` },
      { data: 'estado', render: estado => {
        const color = estado === 'ENVIADO' ? 'success' : estado === 'ERROR' ? 'danger' : 'warning';
        return `<span class="badge bg-${color}">${estado}</span>`;
      }},
      { data: 'id', render: renderAcciones }
    ]
  });

  function renderAcciones(id) {
    return `
      <div class="btn-group" role="group">
        <button class="btn btn-primary btn-sm enviar-sri" data-id="${id}" title="Enviar al SRI">
          <i class="fas fa-paper-plane"></i>
        </button>
        <button class="btn btn-info btn-sm consultar-estado" data-id="${id}" title="Consultar Estado">
          <i class="fas fa-search"></i>
        </button>
        <button class="btn btn-secondary btn-sm descargar-pdf" data-id="${id}" title="Descargar PDF RIDE">
  <i class="fas fa-file-pdf"></i>
</button>
<button class="btn btn-dark btn-sm descargar-xml" data-id="${id}" title="Descargar XML">
  <i class="fas fa-file-code"></i>
</button>

        <button class="btn btn-warning btn-sm enviar-email" data-id="${id}" title="Enviar por Email">
          <i class="fas fa-envelope"></i>
        </button>
        <button class="btn btn-danger btn-sm eliminar-factura" data-id="${id}" title="Eliminar">
          <i class="fas fa-trash"></i>
        </button>
      </div>`;
  }

  // Delegar eventos
  $('#tabla-facturas tbody')
    .on('click', '.enviar-sri', function () {
      const id = $(this).data('id');
      enviarSRI(id);
    })
    .on('click', '.consultar-estado', function () {
      const id = $(this).data('id');
      consultarEstado(id);
    })
    .on('click', '.enviar-email', function () {
      const id = $(this).data('id');
      enviarCorreo(id);
    })
    .on('click', '.eliminar-factura', function () {
      const id = $(this).data('id');
      eliminarFactura(id);
    });

//   function enviarSRI(id) {
//     Swal.fire({ title: 'Enviando al SRI...', didOpen: () => Swal.showLoading() });
//     $.post('backend/enviarFactura.php', { facturaId: id }, res => {
//       Swal.close();
//       const r = JSON.parse(res);
//       Swal.fire('Respuesta SRI', r.mensaje, r.status);
//       tabla.ajax.reload();
//     });
//   }

  function enviarSRI(id) {
  Swal.fire({
    title: '¿Enviar factura al SRI?',
    text: 'Una vez enviada no podrá modificarse.',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Sí, enviar',
    cancelButtonText: 'Cancelar'
  }).then(result => {
    if (result.isConfirmed) {
      // Mostramos loader
      Swal.fire({
        title: 'Enviando al SRI...',
        text: 'Espere un momento mientras se procesa la solicitud.',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });

      // Llamada AJAX al backend
      $.ajax({
        url: 'backend/enviarFactura.php',
        method: 'POST',
        data: { facturaId: id },
        success: response => {
          Swal.close();
          let res;
          try {
            res = JSON.parse(response);
          } catch (e) {
            res = { mensaje: 'Respuesta inesperada del servidor.', status: 'error' };
          }

          Swal.fire({
            title: res.status === 'success' ? '¡Factura enviada!' : 'Error al enviar',
            text: res.mensaje,
            icon: res.status === 'success' ? 'success' : 'error'
          });

          $('#tabla-facturas').DataTable().ajax.reload();
        },
        error: () => {
          Swal.close();
          Swal.fire('Error', 'No se pudo conectar con el servidor.', 'error');
        }
      });
    }
  });
}


  function consultarEstado(id) {
    Swal.fire({ title: 'Consultando estado...', didOpen: () => Swal.showLoading() });
    $.post('backend/estadoFactura.php', { facturaId: id }, res => {
      Swal.close();
      const r = JSON.parse(res);
      Swal.fire('Estado actual', r.estado, 'info');
    });
  }

  function enviarCorreo(id) {
    Swal.fire({ title: 'Enviando correo...', didOpen: () => Swal.showLoading() });
    $.post('backend/enviarCorreo.php', { facturaId: id }, res => {
      Swal.close();
      const r = JSON.parse(res);
      Swal.fire('Correo enviado', r.mensaje, r.status);
    });
  }

  function eliminarFactura(id) {
    Swal.fire({
      title: '¿Eliminar factura?',
      text: 'Esta acción no se puede deshacer',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar'
    }).then(result => {
      if (result.isConfirmed) {
        $.post('backend/eliminarFactura.php', { facturaId: id }, res => {
          const r = JSON.parse(res);
          Swal.fire('Eliminado', r.mensaje, r.status);
          tabla.ajax.reload();
        });
      }
    });
  }
});


  // Evento para enviar factura
  $('#tabla-facturas tbody').on('click', '.btn-enviar', function () {
    const facturaId = $(this).data('id');

    Swal.fire({
      title: '¿Estás seguro?',
      text: `¿Deseas enviar la factura ${facturaId} al SRI?`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sí, enviar',
      cancelButtonText: 'Cancelar'
    }).then(result => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'ajax/enviarFactura.php',
          method: 'POST',
          data: { facturaId },
          beforeSend: () => Swal.showLoading(),
          success: (response) => {
            Swal.close();
            let res;
            try {
              res = JSON.parse(response);
            } catch {
              res = { mensaje: response, status: 'error' };
            }

            Swal.fire({
              title: 'Respuesta del SRI',
              text: res.mensaje || 'Factura enviada.',
              icon: res.status === 'success' ? 'success' : 'error'
            });

            tabla.ajax.reload();
          },
          error: () => {
            Swal.close();
            Swal.fire('Error', 'No se pudo conectar con el backend.', 'error');
          }
        });
      }
    });
  });
});
</script>

