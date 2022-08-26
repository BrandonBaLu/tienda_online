<?php

    $id_producto    = $_POST['id_producto'];
    $nombre         = $_POST['nombre'];
    $precio_venta   = $_POST['precio_venta'];
    $existencias    = $_POST['existencias'];
    $descripcion    = $_POST['descripcion'];

    include '../templates/conexion.php';
    $sentencia = "UPDATE producto SET producto='$nombre', precio_venta='$precio_venta', existencias='$existencias', descripcion='$descripcion' WHERE id_producto='$id_producto';";
    $db->exec($sentencia);
    header("Location: listar_productos.php");


    /*include '../../templates/conexion.php';
    $db->exec("UPDATE producto SET producto='$nombre', precio_venta='$precio_venta', existencias='$existencias', descripcion='$descripcion' WHERE id_producto='$id_producto';");

    header("Location: ../listar_productos.php");*/

?>
