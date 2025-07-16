<?php

require_once "../Models/conexion.php";

$dato_busqueda = $_GET['term'];

$stmt = Conexion::conectar()->prepare("SELECT 
                                            p.codigo_barra , 
                                            c.id_categoria as id_categoria,
                                            c.nombre_categoria as categoria,
                                            p.descripcion_producto as producto,
                                            p.img_producto  as imagen,
                                            p.precio_compra_producto as costo_unitario, 
                                            p.stock_producto as stock
                                        FROM 
                                            producto p 
                                        INNER JOIN 
                                            categorias c 
                                        ON 
                                            p.id_categoria_producto = c.id_categoria
                                        WHERE  (p.descripcion_producto  LIKE CONCAT('%', :dato_buscado, '%') 
                                                or p.codigo_barra  LIKE CONCAT('%', :dato_buscado, '%')
                                                or c.nombre_categoria  LIKE CONCAT('%', :dato_buscado, '%'))
                                        AND p.stock_producto > 0
                                        AND p.estado = 1
                                        LIMIT 0,5");

$stmt->bindParam(":dato_buscado", $dato_busqueda, PDO::PARAM_STR);
$stmt->execute();

$productos = $stmt->fetchAll();

$productData = array();

foreach ($productos as $row) {

    $codigo_producto = $row['codigo_barra'];
    $nombre_categoria = $row['categoria'];
    $descripcion_producto = $row['producto'];
    $imagen_producto = $row['imagen'];
  
    $stock_producto = $row['stock'];
    $precio_compra_producto = $row['costo_unitario'];
    // <a href="javascript:void(0);" class="d-flex border border-secondary border-left-0 border-right-0 border-top-0" style="width:100% !important;">
    $data["id"] = $codigo_producto;
    $data["value"] = $codigo_producto . ' - ' . $descripcion_producto;
    $data["label"] = '<div class="row mx-0 border border-secondary border-left-0 border-right-0 border-top-0">                           
                            <div class="col-lg-12 d-flex flex-row align-items-center">
                                <img src="vistas/assets/imagenes/productos/' . $imagen_producto . '" class="border rounded-pill text-center border-secondary" style="object-fit: cover; width: 40px; height: 40px; transition: transform .2s;" alt="">
                                <div class="d-flex flex-column ml-3 text-sm">
                                    <div class="text-sm">Codigo: ' . $codigo_producto . ' - Producto: ' . $descripcion_producto . '</div> 
                                    <div class="text-sm">' . "Stock: " .  $stock_producto . ' - Costo Unit.: ' . $precio_compra_producto . '</div>
                                </div>
                            </div>
                        </div>';

    array_push($productData, $data);
}

// return $productData;

echo json_encode($productData);
