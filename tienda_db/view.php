<?php

    $id_producto = $_GET["id_producto"];

    $db = new SQLite3("tienda.db");

    $resultado = $db->query("SELECT * from producto where id_producto='$id_producto';");

    while ($row = $resultado->fetchArray()) {
        $id_producto = $row["id_producto"];
        $nombre = $row["nombre"];
        $primer_apellido = $row["precio_venta"];
        $primer_apellido = $row["stock"];
        $primer_apellido = $row["descripcion"];
    }

    $form ="<form action='db/update.php' method='GET'>
            <div class='form-group'>
                <label for='id_producto'>ID</label>
                <input type='text' readonly class='form-control' id='id_producto' name='id_producto aria-describedby='Id producto' value='$id_producto'>
            </div>
            <div class='form-group'>
                <label for='nombre'>Nombre</label>
                <input type='text' class='form-control' id='nombre' name='nombre' aria-describedby='nombre' value='$nombre'>
            </div>
            <div class='form-group'>
                <label for='nombre'>Precio</label>
                <input type='text' class='form-control' id='precio_venta' name='precio_venta' aria-describedby='precio_venta' value='$precio_venta'>
            </div>
            <div class='form-group'>
                <label for='stock'>Productos en existenc</label>
                <input type='text' class='form-control' id='stock' name='stock' aria-describedby='stock' value='$stock'>
            </div>
            <div class='form-group'>
                <label for='descripcion'>Descripcion del producto</label>
                <input type='text' class='form-control' id='descripcion' name='descripcion' aria-describedby='descripcion' value='$descripcion'>
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </form>";

    print($form);

?> 