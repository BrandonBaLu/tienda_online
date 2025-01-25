<?php 
    // Obtener el ID del producto desde la URL
    $id_producto = $_GET["id_producto"];

    // Conexión a la base de datos
    $db = new SQLite3('../../backend/sql/tienda_c.db');

    // Consultar la información del producto
    $resultado = $db->query("SELECT * FROM producto WHERE id_producto='$id_producto';");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detalles del Producto</title>

        <!-- Bootstrap 4.5 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- SweetAlert CSS -->
        <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css" media="screen"/>

        <!-- SweetAlert JS -->
        <script type="text/javascript" src="js/sweetalert2.all.min.js" charset="utf-8"></script>

        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="../tienda_php/css/styles.css" media="screen"/>

        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Inline Styles -->
        <style>
            .card-img-top {
                max-height: 300px; /* Limita la altura de la imagen */
                object-fit: cover; /* Ajusta la imagen sin deformarla */
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="../../index.php" class="navbar-brand">
                    <img src="../imagenes/logo.jpg" height="60" alt="Abarrotes BaLu">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="../../index.php" class="nav-item nav-link active">
                            <i class="fa fa-fw fa-home"></i> Home
                        </a>
                        <a href="../../tienda.php" class="nav-item nav-link">
                            <i class="fa fa-fw fa-shopping-cart"></i> Tienda
                        </a>
                    </div>
                    <div class="navbar-nav">
                        <h1 class="text-white">Producto</h1>
                    </div>
                    <div class="navbar-nav">
                        <a href="../../carrito.php" class="nav-item nav-link">
                            <i class="fa fa-fw fa-shopping-cart"></i> Carrito
                        </a>
                        <a href="../../registro.php" class="nav-item nav-link">
                            <i class="fa fa-fw fa-sign-in"></i> Regístrate
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenido -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php
                    while ($fila = $resultado->fetchArray()) {
                        echo "
                        <div class='col-md-6'>
                            <div class='card shadow-lg'>
                                <img class='card-img-top' src='".$fila["ruta_imagen"]."' alt='Imagen del producto'>
                                <div class='card-body'>
                                    <h4 class='card-title'>".$fila["producto"]."</h4>
                                    <p class='card-text'>".$fila["descripcion"]."</p>
                                    <p class='card-text text-success font-weight-bold'>Precio: $".$fila["precio_venta"]."</p>
                                    <p class='card-text'>Existencias: ".$fila["existencias"]."</p>
                                    <a href='carrito.php?id_producto=".$fila["id_producto"]."' class='btn btn-primary'>
                                        <i class='fa fa-cart-plus'></i> Agregar al carrito
                                    </a>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-white text-center py-3 mt-5">
            <p class="mb-0">© 2025 Abarrotes BaLu. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
