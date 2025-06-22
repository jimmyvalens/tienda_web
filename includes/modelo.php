<?php

/**
 * modelo.php
 *
 * Contiene las funciones relacionadas con el acceso a datos de la aplicación.
 * Aquí se centralizan las operaciones CRUD (crear, leer, actualizar, eliminar)
 * sobre la base de datos, utilizando PDO para realizar consultas seguras.
 *
 * Funciones actuales:
 * - obtenerProductos(PDO $pdo): devuelve todos los productos de la tabla.
 * - insertarProducto(PDO $pdo, array $datos): inserta un nuevo producto.
 *
 * Este archivo forma parte de la capa de modelo en la arquitectura del proyecto.
 */


function obtenerProductos(PDO $pdo){
    $sql = "SELECT * FROM productos";
    $stmt = $pdo->query($sql);
    $producto = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $producto;
}