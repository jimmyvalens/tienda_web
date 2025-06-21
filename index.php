<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/conexion.php';

$conexion = conectarBD();

if ($conexion) {
    echo "✅ Conexión exitosa";
} else {
    echo "❌ No se pudo conectar a la base de datos";
}