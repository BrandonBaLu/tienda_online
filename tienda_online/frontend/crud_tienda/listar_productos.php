<!DOCTYPE html>
<html>
    <head>
        <title>Listar Productos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../backend/css/sweetalert2.min.css" media="screen"/>
        <script type="text/javascript" src="../../backend/js/carrito.js" charset="utf-8"></script>
        <script type="text/javascript" src="../../backend/js/sweetalert2.all.min.js" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="../../backend/css/styles.css" media="screen"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            <a href="insertar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-pencil-square-o"></i>Insertar Productos</a>
            <a href="actualizar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-list-alt"></i>Actualizar</a>
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
        <h1 class="display-4">Listar Productos</h1>
        <p class="lead">Lista de productos registrados en la base de datos</p>
        <hr class="my-4">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="w3-table-all">
            <thead>
              <tr class="w3-blue">
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Descripcion</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../templates/conexion.php';
                    $resultado = $db->query("SELECT * from producto;");
        
                    while ($row = $resultado->fetchArray()) {
                        $id_producto    = $row['id_producto'];
                        $producto       = $row['producto'];
                        $precio_venta   = $row['precio_venta'];
                        $existencias    = $row['existencias'];
                        $status         = $row['existencias'];
                        $descripcion    = $row['descripcion'];
                        if($status > 0){
                            $status = "Disponible";
                        }else{
                            $status = "Agotado";
                        }                        
                        $table = "
                            <tr>
                                <td>$id_producto</td>
                                <td>$producto</td>
                                <td>$precio_venta</td>
                                <td>$existencias</td>
                                <td>$status</td>
                                <td>$descripcion</td>
                                <td><a href='producto_id.php?id_producto=$id_producto'><span class='fa fa-fw fa-list'></span>Ver producto</a></td>
                                <td><a href='actualizar_productos.php?id_producto=$id_producto'><span class='fa fa-fw fa-pencil'></span>Actualizar</a></td>
                                <td><a href='eliminar_productos.php?id_producto=$id_producto'><span class='fa fa-fw fa-trash'></span>Eliminar</a></td>
                            </tr>
                        ";
                        print($table);
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </body>
</html>

