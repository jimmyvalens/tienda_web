<?php

require_once __DIR__ . '/../bootstrap.php';

$pdo = conectarBD();
$productos = obtenerProductos($pdo);

return $productos;

