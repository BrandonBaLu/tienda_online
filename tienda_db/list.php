
    $resultado = $db->query('SELECT * from producto;');

    $table = "<table class='table table-dark'>
    $table = "<table class='table'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio </th>
                <th>Stock<th>
                <th>Descripcion<th>
                <th>Update</th>
            </tr>";

    print($table);

    while ($row = $resultado->fetchArray()) {
        print("<tr>");
        print("<td>".$row['id_producto']."</td>");
        print("<td>".$row['nombre']."</td>");
        print("<td>".$row['precio_venta']."</td>");
        print("<td>".$row['stock']."</td>");
        print("<td>".$row['descripcion']."</td>");
        print("<td><a href='update.php?id_persona=".$row['id_producto']."'>Update</a></td>");
        print("</tr>");
    }
    print("</table>")
