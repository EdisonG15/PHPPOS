<?php
// Simulación (debes conectar a DB real)
$facturas = [
  ["id" => 1, "cliente" => "Juan Pérez", "fecha" => "2025-07-15", "total" => 100.00, "estado" => "PENDIENTE"],
  ["id" => 2, "cliente" => "Ana López", "fecha" => "2025-07-14", "total" => 350.50, "estado" => "ENVIADO"]
];
header('Content-Type: application/json');
echo json_encode($facturas);
