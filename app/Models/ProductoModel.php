<?php

/**
 *
 * Contiene las funciones relacionadas con el acceso a datos de la aplicación.
 * Aquí se centralizan las operaciones CRUD (crear, leer, actualizar, eliminar)
 * sobre la base de datos, utilizando PDO para realizar consultas seguras.
 *
 * Funciones actuales:
 * - obtenerTodos(PDO $pdo): devuelve todos los productos de la tabla.
 * - insertarProducto(PDO $pdo, array $datos): inserta un nuevo producto.
 *
 * Este archivo forma parte de la capa de modelo en la arquitectura del proyecto.
 */

namespace Jcvalens\TiendaWeb\Models;

use PDO;

class ProductoModel
{

    public static function obtenerTodos(PDO $pdo) : array
    {
        $sql = "SELECT * FROM productos";
        $stmt = $pdo->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }

    public static function insertarProducto(PDO $pdo, array $datos) : void
    {
        // 1. Definimos la consulta SQL para insertar un producto en la tabla "productos"
        // Los nombres precedidos por los dos puntos (:nombre, :descripcion, etc.) son marcadores de posición (placeholders).
        // Estos marcadores son como espacios en blanco que rellenaremos con los datos reales más adelante.
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria, imagen)         
            VALUES (:nombre, :descripcion, :precio, :stock, :categoria, :imagen)";

        // 2. Preparamos la consulta para que PDO la ejecute de forma segura, esto evita inyección de código malicioso.
        $stmt = $pdo->prepare($sql);

        // 3. Ejecutamos la consulta reemplazando los valores con los datos reales.
        $stmt->execute([
            ':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':precio' => $datos['precio'],
            ':stock' => $datos['stock'],
            ':categoria' => $datos['categoria'],
            ':imagen' => $datos['imagen']
        ]);
    }
}
