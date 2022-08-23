<?php
    $db = new SQLite3("../sql/tienda.db");
    $resultado = $db->query("SELECT * from ticket;");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Historial de ventas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>HISTORIAL DE VENTAS</h2>
  <p>Tus productos restantes son:</p>            
  <table class="table table-dark">
    <thead>
        <tr>
            <th>Id_venta</th>
            <th>Fecha y hora</th>
            <th>Cantidad del producto</th>
            <th>Producto</th>
            <th>Total producto</th>
        </tr>
    </thead>
    <tbody>
                     <?php 
                        
                        while ($row = $resultado->fetchArray())
                        {
                            
                        
                            {
                    ?>
                                <tr>
                                    <td><?php echo $row['id_venta']?></td>
                                    <td><?php echo $row['fecha_hora']?></td>
                                    <td><?php echo $row['cantidad_producto']?></td>
                                    <td><?php echo $row['producto']?></td>
                                    <td><?php echo $row['total_producto']?></td>
                                   
                                </tr> 
                     
		           
                    <?php
                            }
                        }
                       
                    ?> 
    </tbody>
  </table>
</div>
</body>
</html>