<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

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
                    <a href="../../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i> Home</a>
                    <a href="../../tienda.php" class="nav-item nav-link"><i class="fa fa-fw fa-shopping-cart"></i> Tienda</a>
                </div>
                <div class="navbar-nav">
                    <h1 class="text-white">Iniciar sesión</h1>
                </div>
                <div class="navbar-nav">
                    <a href="../../carrito.php" class="nav-item nav-link"><i class="fa fa-fw fa-shopping-cart"></i> Carrito</a>
                    <a href="../../registro.php" class="nav-item nav-link"><i class="fa fa-fw fa-sign-in"></i> Regístrate</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Jumbotron for Login -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron p-4 bg-light shadow-lg">
                    <!-- Profile Icon -->
                    <div class="text-center mb-4">
                        <i class="fa fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="#" class="text-secondary">Olvidé mi contraseña</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">¿No tienes cuenta? <a href="../../registro.php">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2025 Abarrotes BaLu. Todos los derechos reservados.</p>
    </footer>

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="js/carrito.js" charset="utf-8"></script>
</body>
</html>
