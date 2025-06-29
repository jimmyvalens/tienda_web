<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

// Importar clases necesarias
use Jcvalens\TiendaWeb\Core\Conexion;
use Jcvalens\TiendaWeb\Models\ProductoModel;

// Conexión a la base de datos
$pdo = Conexion::conectar();

if (!$pdo) {
    echo "❌ No se pudo conectar a la base de datos";
    exit;
}

$productos = ProductoModel::obtenerTodos($pdo);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
</head>
<body>
    <h1>Productos disponibles</h1>

    <table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= htmlspecialchars($producto['id']) ?></td>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= htmlspecialchars($producto['precio']) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
