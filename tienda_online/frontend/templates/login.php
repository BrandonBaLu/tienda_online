<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css" media="screen"/>
        <script type="text/javascript" src="js/carrito.js" charset="utf-8"></script>
        <script type="text/javascript" src="js/sweetalert2.all.min.js" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="../tienda_php/css/styles.css" media="screen"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
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
                        <a href="../../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i>Home</a>
                        <a href="../../tienda.php" class="nav-item nav-link"><i class="fa fa-fw fa-shopping-cart"></i>Tienda</a>
                    </div>
                    <div class="navbar-nav">
                        <h1 style="color:white">Iniciar sesión</h1>
                    </div>
                    <div class="navbar-nav">
                        <a href="../../carrito.php" class="nav-item nav-link"><i class="fa fa-fw fa-shopping-cart"></i>Carrito</a>
                        <a href="../../registro.php" class="nav-item nav-link"><i class="fa fa-fw fa-sign-in"></i>Registrate</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <center><button type="submit" class="btn btn-primary">Login</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>