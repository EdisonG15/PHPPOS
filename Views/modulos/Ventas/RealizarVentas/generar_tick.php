<?php

if(isset($_GET["nro_boleta"])){
    $nro_boleta = $_GET["nro_boleta"];
    
}

?>

<main>
    <div class="container-fluid vh-100">
        <iframe src="<?php echo "http://localhost/WebPuntoVenta2025/ajax/realizar_ventas.ajax.php?nro_boleta=".$nro_boleta ?>" frameborder="0" height="100%" width="100%">

        </iframe>
    </div>
</main>