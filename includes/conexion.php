<?php

function conectarBD()
{
    // 1. Variables de conexión
    $host = 'localhost';
    $dbname = 'tienda_web';
    $user = 'root';
    $password = '';
    $charset = 'utf8mb4';

    // 2. Construir DSN
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    // 3. Opciones para PDO
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modo error con excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Resultados como array asociativo
        PDO::ATTR_EMULATE_PREPARES => false, // Desactiva emulación de consultas preparadas
    ];

    // 4. Intentar conexión
    try {
        $pdo = new PDO($dsn, $user, $password, $opciones);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
        return null;
    }
}
