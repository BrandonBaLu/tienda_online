<?php
$medidaTicket = 180;

?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
        }

        td.precio {
            text-align: right;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ticket centrado">
        <h1>NOMBRE DEL NEGOCIO</h1>
        <h2>Ticket de venta #12</h2>
        <h2>2020-02-05 00:12:22</h2>
        <?php
        $productos = [
            [
                "cantidad" => 31,
                "descripcion" => "Cheetos verdes 80 g",
                "precio" => 123,
            ],
            [
                "cantidad" => 12,
                "descripcion" => "Teclado HyperX",
                "precio" => 1233,
            ],
            [
                "cantidad" => 12,
                "descripcion" => "Mouse Logitech ASD123",
                "precio" => 841,
            ],
            [
                "cantidad" => 15,
                "descripcion" => "Monitor Samsung 123",
                "precio" => 3546,
            ],
        ];
        ?>
        <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>Ejemplo en JS</title>
    </head>
    <body>
    <select name="" id="" class="opciones">
      <option value="Cero" class="opcion">-------------</option>
      <option value="Uno" class="opcion">Uno</option>
      <option value="Dos" class="opcion">Dos</option>
      <option value="Tres" class="opcion">Tres</option>
      <option value="Cuatro" class="opcion">Cuatro</option>
      <option value="Cinco" class="opcion">Cinco</option>
    </select>
    <br />
    <textarea class="areaTexto" cols="30" rows="10">
      
    </textarea>
    <script>
        let opciones  = document.querySelector(".opciones")
        let textoArea = document.querySelector(".areaTexto")
        
        opciones.addEventListener("change", (event) => {
          let opcion = event.target.value
          textoArea.innerText = opcion
        })
    </script>
      
    </body>
    </html>

        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $total += $producto["cantidad"] * $producto["precio"];
                ?>
                    <tr>
                        <td class="cantidad"><?php echo number_format($producto["cantidad"], 2) ?></td>
                        <td class="producto"><?php echo $producto["descripcion"] ?></td>
                        <td class="precio">$<?php echo number_format($producto["precio"], 2) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio">
                    $<?php echo number_format($total, 2) ?>
                </td>
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA! <br> <strong>www.abarrotesbalu.com</strong></p>
            
    </div>
 
</body>

</html>