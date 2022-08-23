<?php
    include 'conexion.php';
    $resultado = $db->query("SELECT * from producto");
    if(isset($_GET['producto']));
    

?>
 
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="js/carrito.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js" charset="utf-8"></script>
    <title>TIENDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h2 class="stiloslabel">ABARROTES BALDERAS</h2>
      <form method="POST" action="ticket.php" target="_blank" name="tienda" >
        <h2>productos</h2>
        <div class="form-group">
          <label for="sel1">lista de productos (selecciona uno):</label>
          <select class="form-control" id="producto" name="producto">
            <option value="0" selected>Selecciona un producto</option>
            <?php 
                        
                        while ($row = $resultado->fetchArray())
                        {
                            $existencias = $row["existencias"];
                            if ($existencias>0)
                            {
                    ?>
                                <option data-id="<?php echo $row['id_producto']?>" value="<?php echo $row['precio_venta']?>"> <?php echo $row['producto']?></option>
                    <?php
                            }
                        }
                    ?> 
            ?>
          </select>
        
          <label for="cantidad">cantidad:</label>
          <input type="number" class="form-control" id="cantidad_product"  name="cantidad_product" placeholder="Ingresa la cantidad">
          <br>
          <input type="button" id="insert" class="btn btn-primary" onclick="insertar()"  value="Insertar"> 
          <input type="button" id ="compra" class="btn btn-danger" onclick="limpiar()" value="Nueva compra"> 
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
  </body>
</html>



        

