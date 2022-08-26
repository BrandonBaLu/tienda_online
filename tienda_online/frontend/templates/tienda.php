<?php
    include "conexion.php";
    $resultado = $db->query("SELECT * from producto");
?>
 
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>TIENDA</title>
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
            <a href="../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i>Home</a>
            <a href="../crud_tienda/insertar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-pencil-square-o"></i>Insertar Productos</a>
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
      <div class="jumbotron text-center">     
        <h2 class="">ABARROTES BALDERAS</h2>
        <form method="POST" action="ticket.php" target="_blank" name="tienda" >
          <h2>productos</h2>
          <div class="form-group">
            <label for="sel1">lista de productos (selecciona uno):</label>
            <select class="form-control" id="producto" name="producto">
              <option value="0" selected>Selecciona un producto</option>
              <?php 
                while ($row = $resultado->fetchArray())
                {
                  $id           = $row['id_producto'];
                  $producto     = $row['producto'];
                  $precio       = $row['precio_venta'];
                  $cantidad     = $row['cantidad'];
                  $descripcion  = $row['descripcion'];
                  $existencias  = $row["existencias"];
                  
                  if ($existencias>0)
                    {
              ?>
                      <option data-id="<?php echo $id?>" value="<?php echo $precio?>"> <?php echo $producto?></option>
              <?php
                    }
                }
              ?> 
            </select>

            <label for="cantidad">cantidad:</label>
            <input type="number" class="form-control" id="cantidad_product"  name="cantidad_product" placeholder="Ingresa la cantidad">
            <br>
            <input type="button" id="insert" class="btn btn-primary" onclick="insertar()" value="Insertar"> 
            <input type="button" id ="compra" class="btn btn-danger" onclick="limpiar()"  value="Nueva compra"> 
            <br>
            <br>      
            <h2>carrito de compras</h2>
            <textarea class="form-control" rows="5" id="comment" name="comment" ></textarea>
            <input type="hidden" id="idProductos" name="idProductos" value=""/>
            <br>
            <label for="totalCompra">Total:</label>
            <input type="text" value="0" id="totalCompra" name="totalCompra" class="campodeshabilitado">
            <br>
            <label for="cantidad">pago:</label>
            <input type="number" class="form-control" id="pago" placeholder="Ingresa el monto recibido" name="pago">
            <br>
            <input type="submit" class="btn btn-info" value="Pagar" onclick="validateForm()">
          </div>
        </form>        
      </div>
    </div>
  </body>
</html>



        

