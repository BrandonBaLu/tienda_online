<?php
    
    include '../templates/conexion.php';
    
    $id_producto = $_GET["id_producto"];
    //echo $id_producto;
    $resultado = $db->query("SELECT * from producto where id_producto='$id_producto';");

    while ($row = $resultado->fetchArray()) {
        $id_producto_db = $row["id_producto"];
        $nombre         = $row["producto"];
        $precio_venta   = $row["precio_venta"];
        $existencias    = $row["existencias"];
        $descripcion    = $row["descripcion"];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar Productos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../backend/css/styles.css" media="screen"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">
          <img src="../imagenes/logo.jpg" height="60" alt="Abarrotes BaLu">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="../../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i>Home</a>
            <a href="listar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-list-alt"></i>Listar Productos</a>
          </div>
          <form class="d-flex">
            <div class="input-group">                    
              <input type="text" class="form-control" placeholder="Search">
              <button type="button" class="btn btn-secondary"><i class="fa fa-fw fa-search"></i></button>
            </div>
          </form>
          <div class="navbar-nav">
            
          </div>
        </div>
      </div>
    </nav>
    
    <div class="container mt-3">
        <div class="jumbtron">
            <center><h1>Actualizar el producto <?php echo $nombre ?></h1></center>
            <a href="listar_productos.php">Lista de productos</a>
            <form action='actualizar.php' method='POST'>
                <div class='form-group'>
                    
                    <input type="hidden" type='text' class='form-control' name='id_producto' id='id_producto' value='<?php echo $id_producto_db ?>' readonly>
                    <label for='nombre'>Nombre</label>
                    <input type='text'  class='form-control' id='nombre' name='nombre' aria-describedby='nombre' value='<?php echo $nombre ?>'>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for='precio_venta'>Precio</label>
                        <input type='number'  class='form-control' id='precio_venta' name='precio_venta' aria-describedby='precio_venta' value='<?php echo $precio_venta ?>'>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for='existencias'>Existencias</label>
                        <input type='number'  class='form-control' id='existencias' name='existencias' aria-describedby='existencias' value='<?php echo $existencias ?>'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='descripcion'>Descripcion</label>
                    <input type='text'  class='form-control' id='descripcion' name='descripcion' aria-describedby='descripcion' value='<?php echo $descripcion ?>'>
                </div>
                <button type='submit' class='btn btn-primary'>Actualizar</button>
            </form>
                </div>
            </div>
        </div>
    </body>
</html>

