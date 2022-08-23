<?php

    $id_producto = $_GET['id_producto'];
    $nombre = $_GET['nombre'];
    $precio_venta = $_GET['precio_venta'];
    $existencias = $_GET['existencias'];
    $descripcion = $_GET['descripcion'];

    $db = new SQLite3("../../sql/tienda.db");
    $db->exec("UPDATE producto SET producto='$nombre', precio_venta='$precio_venta', existencias='$existencias', descripcion='$descripcion' WHERE id_producto='$id_producto';");

    header("Location: ../index.php");

?>
