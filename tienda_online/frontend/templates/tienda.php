<?php
    include "conexion.php";

    //$sesion = $_SESSION["id_empleado"];
    //$empelado = $db->query("SELECT * from empleado where id_empleado = $sesion");
    $empelado = $db->query("SELECT * from empleado where id_empleado = 1");
    $resultado = $db->query("SELECT * from producto");
    $pago = $db->query("SELECT * from metodo_pago");

    while ($row = $empelado->fetchArray()) {
      $id_empleado = $row["id_empleado"];
      $nombre = $row["nombre"];
      $apellido = $row["apellido_paterno"];
      $apellido2 = $row["apellido_materno"];
      $foto = $row["foto"];
      $puesto = $row["puesto"];
    }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tienda - Abarrotes BaLu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/styles.css">
    <script type="text/javascript" src="../../backend/js/carrito.js"></script>
    <script type="text/javascript" src="../../backend/js/sweetalert2.all.min.js"></script>
    <script>
      function togglePagoEfectivo() {
      const metodoPago = document.getElementById('metodo_pago').value;
      const efectivoDiv = document.getElementById('efectivo_div');
      
      // Mostrar el campo si el id_metodo es 1 (Efectivo) o 2 (Transferencia)
      if (metodoPago === '1' || metodoPago === '4') {
        efectivoDiv.style.display = 'block';
      } else {
        efectivoDiv.style.display = 'none';
      }
    }

    </script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">
          <img src="../imagenes/logo.jpg" height="60" alt="Abarrotes BaLu">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="../../index.php" class="nav-item nav-link active"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="../crud_tienda/insertar_productos.php" class="nav-item nav-link"><i class="fa fa-fw fa-pencil-square-o"></i> Insertar Productos</a>
          </div>
          <h1 class="text-light mb-0 mx-auto">Compras</h1>
          <div class="navbar-nav dropdown">
            <a href="#" class="nav-link dropdown-toggle text-light" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo $foto; ?>" alt="Foto de perfil" class="rounded-circle" height="40" width="40">
              <span><?php echo $nombre . " " . $apellido; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
              <a class="dropdown-item" href="#"><i class="fa fa-user-circle"></i> Ver Perfil</a>
              <a class="dropdown-item text-danger" href="logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="jumbotron text-center">
        <h2 class="mb-4">ABARROTES BALDERAS</h2>
        <form method="POST" action="ticket.php" target="_blank" name="tienda">
          <h3 class="mb-3">Productos</h3>
          <div class="form-group">
            <label for="producto">Lista de productos (selecciona uno):</label>
            <select class="form-control" id="producto" name="producto">
              <option value="0" selected>Selecciona un producto</option>
              <?php 
                while ($row = $resultado->fetchArray()) {
                  $id = $row['id_producto'];
                  $producto = $row['producto'];
                  $precio = $row['precio_venta'];
                  $existencias = $row['existencias'];
                  if ($existencias > 0) {
                    echo "<option data-id='$id' value='$precio'>$producto</option>";
                  }
                }
              ?>
            </select>

            <label for="cantidad_product" class="mt-3">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad_product" name="cantidad_product" placeholder="Ingresa la cantidad">

            <div class="mt-4">
              <button type="button" id="insert" class="btn btn-primary" onclick="insertar()">Insertar</button>
              <button type="button" id="compra" class="btn btn-danger" onclick="limpiar()">Nueva compra</button>
            </div>
          </div>

          <h3 class="mt-4">Carrito de compras</h3>
          <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
          <input type="hidden" id="idProductos" name="idProductos" value="">

          <div class="form-group mt-3">
            <label for="totalCompra">Total:</label>
            <input type="text" value="0" id="totalCompra" name="totalCompra" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label for="metodo_pago">Método de pago:</label>
            <select class="form-control" id="metodo_pago" name="metodo_pago" onchange="togglePagoEfectivo()">
              <option value="">Selecciona un método de pago</option>
              <?php 
                while ($row = $pago->fetchArray()) {
                  $id_metodo = $row['id_metodo'];
                  $metodo_pago = $row['metodo'];
                  echo "<option value='$id_metodo'>$metodo_pago</option>";
                }
              ?>
            </select>
          </div>

          <div class="form-group" id="efectivo_div" style="display: none;">
            <label for="pago">Pago:</label>
            <input type="number" class="form-control" id="pago" name="pago" placeholder="Ingresa el monto recibido">
          </div>

          <button type="submit" class="btn btn-info" onclick="validateForm()">Pagar</button>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
      <p class="mb-0">© 2025 Abarrotes BaLu. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>