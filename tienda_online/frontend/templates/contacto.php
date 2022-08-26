<!DOCTYPE html>
<html>
    <head>
        <title>Contactanos</title>
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
                <a href="../index.php" class="navbar-brand">
                    <img src="../tienda_online/tienda_php/imagenes/logo.jpg" height="60" alt="Abarrotes BaLu">
                </a>
                
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i>Home</a>
                        <a href="../../templates/contacto.ph" class="nav-item nav-link"><i class="fa fa-fw fa-pencil-square-o"></i>Insertar Productos</a>
                    </div>
                    <form class="d-flex">
                        <div class="input-group">                    
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-fw fa-search"></i></button>
                        </div>
                    </form>
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contactanos</h1>
                    <hr>
                    <form action="../tienda_php/templates/contacto.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
