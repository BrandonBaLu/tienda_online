<?php 
// Recibir datos del formulario
$metodo_pago = $_POST['metodo_pago'];
$cantidad = $_POST['cantidad_product'];
$carrito = $_POST['comment'];
$total = $_POST['totalCompra'];
$pago = $_POST['pago'];
$cambio = $pago - $total;
$idProductos = isset($_POST['idProductos']) ? $_POST['idProductos'] : '';
$productoS = $_POST['producto'];

include 'conexion.php'; // Asegúrate de que este archivo incluye correctamente la conexión con SQLite

try {
    // Iniciar transacción
    $db->exec('BEGIN TRANSACTION');
    
    // Procesar los productos
    $productos = explode(";", $idProductos);
    foreach ($productos as $producto) {
        $productoYCantidad = explode(":", $producto);
        if (!isset($productoYCantidad[0]) || !isset($productoYCantidad[1])) {
            continue;
        }

        // Actualizar existencias del producto
        $db->exec('UPDATE producto SET existencias = existencias - ' . (int)$productoYCantidad[1] . ' WHERE id_producto="' . (int)$productoYCantidad[0] . '"');

        // Insertar el ticket
        $db->exec('INSERT INTO ticket (total_venta, id_metodo_pago) VALUES ("' . $total . '", "' . $metodo_pago . '")');

        $id_venta = $db->exec('SELECT id_venta FROM ticket ORDER BY id_venta DESC LIMIT 1');
    
        // Insertar en la tabla detalle_ticket
        $subtotal = $db->querySingle('SELECT precio_venta FROM producto WHERE id_producto="' . (int)$productoYCantidad[0] . '"') * (int)$productoYCantidad[1];
        $db->exec('INSERT INTO detalle_ticket (id_venta, id_producto, cantidad, subtotal) VALUES ("' . $id_venta . '", "' . (int)$productoYCantidad[0] . '", "' . (int)$productoYCantidad[1] . '", "' . $subtotal . '")');
    }

    // Confirmar transacción
    $db->exec('COMMIT');
} catch (Exception $e) {
    // Revertir transacción en caso de error
    $db->exec('ROLLBACK');
    die('Error: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket de compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .ticket {
            width: 300px;
            margin: 20px auto;
            background: white;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .ticket h1, .ticket h2, .ticket p {
            text-align: center;
            margin: 5px 0;
        }
        .ticket ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }
        .ticket ul li {
            margin: 5px 0;
            font-size: 14px;
        }
        .divider {
            border-top: 1px dashed #ccc;
            margin: 10px 0;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
            cursor: pointer;
        }
        .btn-success {
            background: #28a745;
        }
    </style>
</head>
<body>
    <div class="ticket" id="ticket">
        <h3 class="text-center">ABARROTES BALDERAS</h3>
        <h4 class="text-center">Ticket de compra</h4>
        <div class="divider"></div>
        <p><strong>Tus compras son:</strong></p>
        <ul>
            <?php
                $lines = explode("\n", $carrito);
                foreach ($lines as $line) {
                    if (trim($line) !== "") {
                        echo "<p>$line</p>";
                    }
                }
            ?>
        </ul>
        <div class="divider"></div>
        <p><strong>Total a pagar:</strong> $<?php echo $total; ?></p>
        <p><strong>Usted pagó:</strong> $<?php echo $pago; ?></p>
        <p><strong>Su cambio:</strong> $<?php echo $cambio; ?></p>
        <p><strong>Fecha:</strong> <?php echo date("d/m/Y"); ?></p>
        <div class="divider"></div>
        <p>Gracias por su compra</p>
        <p>¡Vuelva pronto!</p>
    </div>
    <div class="btn-container">
        <button class="btn btn-success" onclick="imprimirTicket()">Imprimir Ticket</button>
        <button class="btn" onclick="location.href='tienda.php'">Regresar</button>
    </div>
    <script>
        function imprimirTicket() {
            var contenido = document.getElementById('ticket').innerHTML;
            var ventana = window.open('', '', 'height=600,width=600');
            ventana.document.write('<html><head><title>Imprimir Ticket</title>');
            ventana.document.write('<link rel="stylesheet" href="css/ticket.css">');
            ventana.document.write('</head><body>');
            ventana.document.write('<div class="container">');
            ventana.document.write(contenido);
            ventana.document.write('</div>');
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.onload = function () {
                ventana.print();
                ventana.close();
            };
        }
    </script>

</body>
</html>
