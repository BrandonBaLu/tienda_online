<?php
    $nombre         = $_POST['nombre'];
    $precio_venta   = $_POST['precio'];
    $existencias    = $_POST['cantidad'];
    $descripcion    = $_POST['descripcion'];

    $db = new SQLite3("../../sql/tienda.db");

    $db->exec("INSERT INTO producto (producto,precio_venta,existencias,descripcion) VALUES ('$nombre', '$precio_venta', '$existencias', '$descripcion');");
    header("Location: ../index.php")
?>
