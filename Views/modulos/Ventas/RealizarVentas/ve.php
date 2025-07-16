
   <script>
       var producto_ventas;
       var items = [];
       var itemProducto = 0;
       var iva = 0;
       var razon_social;
       var ruc;
       var mensaje;
       var direccion;
       var marca;
       var email;
       var nro_credito_venta;
       var Toast = Swal.mixin({
           toast: true,
           position: 'top',
           showConfirmButton: false,
           timer: 3000
       });
       $(document).ready(function() {
           cargarTableProducto();
           CargarNroBoleta();

         
       });


 
     

      


   </script>