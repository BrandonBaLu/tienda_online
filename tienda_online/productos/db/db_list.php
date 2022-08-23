<?php
    $db = new SQLite3("../sql/tienda.db");

    $resultado = $db->query("SELECT * from producto;");

    $table = "
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Descripcion</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
    ";

    print($table);

    while ($row = $resultado->fetchArray()) {
       
        $id_producto    = $row['id_producto'];
        $producto       = $row['producto'];
        $precio_venta   = $row['precio_venta'];
        $existencias    = $row['existencias'];
        $descripcion    = $row['descripcion'];

        $table = "
            <tr>
                <td>$id_producto</td>
                <td>$producto</td>
                <td>$precio_venta</td>
                <td>$existencias</td>
                <td>$descripcion</td>
                <td><a href='view.php?id_producto=$id_producto'>View</a></td>
                <td><a href='update.php?id_producto=$id_producto'>Update</a></td>
                <td><a href='delete.php?id_producto=$id_producto'>Delete</a></td>
            </tr>
        ";

        print($table);



    }
 
    print("</table>");
?>