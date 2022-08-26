<?php

    $id_producto = $_GET["id_producto"];

    include '../templates/conexion.php';

    $resultado = $db->query("SELECT * from producto where id_producto='$id_producto';");

    while ($row = $resultado->fetchArray()) {
        $id_producto    = $row["id_producto"];
        $nombre         = $row["producto"];
        $precio_venta   = $row["precio_venta"];
        $existencias    = $row["existencias"];
        $descripcion    = $row["descripcion"];
    }
  

    $form = "
        <div class='form-group'>
            <label for='id_producto'>ID</label>
            <input type='text' readonly class='form-control' id='id_producto' name='id_producto' aria-describedby='Id producto' value='$id_producto'>
        </div>
        <div class='form-group'>
            <label for='nombre'>Nombre</label>
            <input type='text' class='form-control' id='nombre' name='nombre' aria-describedby='nombre' value='$nombre'>
        </div>
        <div class='form-group'>
            <label for='precio_venta'>Precio</label>
            <input type='number' class='form-control' id='precio_venta' name='precio_venta' aria-describedby='precio_venta' value='$precio_venta'>
        </div>
        <div class='form-group'>
            <label for='existencias'>Existencias</label>
            <input type='number' class='form-control' id='existencias' name='existencias' aria-describedby='existencias' value='$existencias'>
        </div>
        <div class='form-group'>
            <label for='descripcion'>Descripcion</label>
            <input type='text' class='form-control' id='descripcion' name='descripcion' aria-describedby='descripcion' value='$descripcion'>
        </div>
        ";

    print($form);
?>