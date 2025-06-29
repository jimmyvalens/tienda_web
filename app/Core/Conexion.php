<?php

namespace Jcvalens\TiendaWeb\Core;

use PDO;
use PDOException;

class Conexion
{
    public static function conectar()
    {
        // 1. Cargar configuración
        $config = require __DIR__ . '/../../config/database.php';

        $host = $config['host'];
        $dbname = $config['dbname'];
        $user = $config['user'];
        $password = $config['password'];
        $charset = $config['charset'];

        // 2. Construir DSN
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        // 3. Opciones de PDO
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // 4. Conectar y devolver
        try {
            return new PDO($dsn, $user, $password, $opciones);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            return null;
        }
    }
}
