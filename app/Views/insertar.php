<?php
require_once __DIR__ . '/../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = floatval($_POST['precio'] ?? 0);
    $stock = intval($_POST['stock'] ?? 0);
    $categoria = trim($_POST['categoria'] ?? '');
    $imagen = trim($_POST['imagen'] ?? '');

    if ($nombre && $precio > 0) {
        $pdo = conectarBD();

        insertarProducto($pdo, [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria' => $categoria,
            'imagen' => $imagen
        ]);

        echo "<p>Producto insertado correctamente.</p>";
    } else {
        echo "<p>El nombre y el precio son obligatorios.</p>";
    }
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar productos</title>
</head>

<body>
    <h1>Formulario para nuevos productos</h1>
    <form action="insertar.php" method="post">
        <div class="campo">
            <label for="nombre">Nombre producto: </label>
            <input type="text" id="nombre" name="nombre">
        </div>
        <div class="campo">
            <label for="descripcion">Descripción: </label>
            <textarea name="descripcion" id="descripcion"></textarea>
        </div>
        <div class="campo">
            <label for="precio">Precio: </label>
            <input type="number" id="precio" name="precio" step="0.01">
        </div>
        <div class="campo">
            <label for="stock">Stock: </label>
            <input type="number" id="stock" name="stock">
        </div>
        <div class="campo">
            <label for="categoria">Categoría: </label>
            <input type="text" id="categoria" name="categoria">
        </div>
        <div class="campo">
            <label for="imagen">Imagen: </label>
            <input type="text" id="imagen" name="imagen">
        </div>
        <div class="campo">
            <button type="submit">Guardar producto</button>
        </div>
    </form>

</body>

</html>