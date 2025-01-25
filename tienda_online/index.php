<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes BaLu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../backend/css/styles.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../backend/js/sweetalert2.all.min.js" charset="utf-8"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }
        .card-title {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            margin-top: 20px;
            text-align: center;
        }
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="../index.php" class="navbar-brand">
                <img src="../frontend/imagenes/logo.jpg" height="60" alt="Abarrotes BaLu">
                <span class="ml-2">Abarrotes BaLu</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../frontend/templates/contacto.php"><i class="fa fa-fw fa-user"></i> Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../frontend/templates/tienda.php"><i class="fa fa-fw fa-shopping-cart"></i> Tienda</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../frontend/templates/carrito.php"><i class="fa fa-fw fa-shopping-cart"></i> Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../frontend/templates/login.php"><i class="fa fa-fw fa-sign-in"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="display-4">¡Bienvenidos a Abarrotes BaLu!</h1>
            <p class="lead">Encuentra los mejores productos al mejor precio.</p>
        </div>
        <div class="row">
            <?php
            // Conectar a la base de datos SQLite
            $db = new SQLite3('./backend/sql/tienda_c.db');
            //$db = new SQLite3('./backend/sql/tienda.db');

            // Realizar la consulta para obtener todos los productos
            $resultado = $db->query('SELECT * FROM producto;');

            // Verificar si hay productos en la base de datos
            if ($resultado) {
                while ($row = $resultado->fetchArray()) {
                    $id_producto = $row['id_producto'];
                    $nombre = $row['producto'];
                    $precio_venta = $row['precio_venta'];
                    $existencias = $row['existencias'];
                    $descripcion = $row['descripcion'];
                    $ruta_imagen = $row['ruta_imagen']; // Ruta de la imagen
                    // Crear una tarjeta para cada producto
                    echo '
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="' . htmlspecialchars($ruta_imagen) . '" class="card-img-top" alt="' . htmlspecialchars($nombre) . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($nombre) . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Precio: $' . htmlspecialchars($precio_venta) . '</h6>
                            <p class="card-text">' . htmlspecialchars($descripcion) . '</p>
                            <p class="card-text"><strong>Existencias:</strong> ' . htmlspecialchars($existencias) . '</p>
                            <a href="../frontend/templates/producto.php?id_producto=' . htmlspecialchars($id_producto) . '" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                ';
                }
            } else {
                echo '<p class="text-center">No se encontraron productos en la base de datos.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Abarrotes BaLu. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
