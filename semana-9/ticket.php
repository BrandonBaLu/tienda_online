<?php
 $carrito = $_POST ['comment'];
 $total = $_POST ['totalCompra'];
 $pago = $_POST['pago'];
 $cambio =  $pago - $total;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="js/carrito.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js" charset="utf-8"></script>
    <title>Ticket de compra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div">
      <h1 class="stiloslabel4">ABARROTES BALDERAS</h1>
      <br>
      <h2>Ticket:</h2>
      <p>-----------------------------------------------------------</p>
      <p class="stiloslabel3">Tus compras son: <br><?php print("\n" . $carrito ."\n");?></p>
      <p>-----------------------------------------------------------</p>
      <p>El total a pagar : <?php print("$".$total);?></p>
      <p>Usted pago : <?php print("$".$pago);?></p>
      <p>Su cambio es de : <?php print("$".$cambio);?></p>
      <p><?php echo "Fecha: ". date("d"). " del ". date("m"). " del ". date("Y") ;?></p>
      <p>-----------------------------------------------------------</p>
      <p class="stiloslabel5">Gracias por su compra</p>
      <p>-----------------------------------------------------------</p>
      
    </div>
  </body>
</html>
