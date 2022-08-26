<!DOCTYPE html>
<html>
<head>
    <title>Insertar Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="../../backend/js/sweetalert2.all.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../../backend/css/styles.css" media="screen"/>
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
            <a href="listar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-list"></i>Listar productos</a>
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
    <div class="container mt-3">
      <div class="jumbtron">
        <h1 class="display-4">Insertar Productos</h1>
        <p class="lead">Insertar productos en la tienda</p>
        <hr class="my-4">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="insertar_productos.php" method="POST">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
                </div>
                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                </div>
                <center><button type="submit" name="eliminar" id="eliminar" class="btn btn-primary">Insertar</button></center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">ABARROTES BALU.</span>
      </div>
    </footer>
  
  </body>
</html>


<?php


  include '../templates/conexion.php';
  if(isset($_POST['eliminar'])){
    $nombre         = $_POST['nombre'];
    $precio_venta   = $_POST['precio'];
    $existencias    = $_POST['cantidad'];
    $descripcion    = $_POST['descripcion'];

    $sql = "INSERT INTO producto (producto,precio_venta,existencias,descripcion) VALUES ('$nombre', '$precio_venta', '$existencias', '$descripcion');";
    $resultado = $db->query($sql);
    if($resultado){
      echo "<script>
      Swal.fire({
        title: 'El producto se inserto correctamente',
        text: 'Regresar a la lista de clientes ',
        type: 'success'
      }).then(function() {
          window.location = 'listar_productos.php';
      });
      </script>";
    }else{
      echo "<script>
      Swal.fire({
        title: 'Error al insertar el producto',
        text: 'Intente de nuevo',
        type: 'error'
      }).then(function() {
          window.location = 'insertar_productos.php';
      });
      </script>";
    }
  }

?>
