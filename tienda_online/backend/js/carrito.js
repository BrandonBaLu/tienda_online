function insertar() {
  var cantidad = parseInt($("#cantidad_product").val());
  var nombreProducto = $("#producto option:selected").text();
  var precio = parseFloat($("#producto").val());
  var carrito = $("#comment").val();
  var idProducto = $("#producto option:selected").data("id");

  var totalCompra = cantidad * precio;

  if (cantidad > 0 && cantidad < 100 && precio > 0) {
    $("#comment").val(carrito + cantidad + "\t" + nombreProducto + "\tPU:$" + precio + "\ttotal:$" + totalCompra + "\n");
    var idProductos = $("#idProductos").val();
    $("#idProductos").val(idProductos + idProducto + ":" + cantidad + ";");
    llenaTotal(totalCompra);
    $("#producto").val("0");
    $("#cantidad_product").val("");
  } else if (cantidad <= 0 || precio <= 0) {
    Swal.fire("Error", "No has ingresado valores válidos", "error");
  } else if (cantidad >= 10) {
    Swal.fire("Error", "La cantidad del producto debe ser mayor a 0 y menor a 10", "error");
  }
}

function limpiar() {
  $("#comment").val("");
  $("#cantidad_product").val("");
  $("#totalCompra").val("0");
  $("#producto").val("0");
  $("#pago").val("");
}

function llenaTotal(costo) {
  var totalActual = parseFloat($("#totalCompra").val()) || 0;
  var totalFinal = totalActual + costo;
  $("#totalCompra").val(totalFinal.toFixed(2));
}

function validateForm() {
  var pago = parseFloat($("#pago").val()) || 0;
  var totalCompra = parseFloat($("#totalCompra").val()) || 0;

  if (pago <= 0) {
    Swal.fire("Error", "El pago debe ser mayor a cero", "error");
    return false;
  }
  if (pago < totalCompra) {
    Swal.fire("Error", "El pago debe ser mayor o igual al total de la compra", "error");
    return false;
  }
  return true;
}

function togglePagoEfectivo() {
  const metodoPago = $('#metodo_pago').val();
  const efectivoDiv = $('#efectivo_div');

  if (metodoPago === '1') {
    efectivoDiv.show();
  } else if (metodoPago === '4') {
    Swal.fire({
      icon: 'info',
      title: 'Datos de la transferencia',
      html: `
        <p><strong>Banco:</strong> BBVA Bancomer</p>
        <p><strong>Cuenta:</strong> 123456789</p>
        <p><strong>Titular:</strong> Brandon Balderas L.</p>
        <p><strong>Rut:</strong> 12345678-9</p>
        <p><strong>Monto:</strong> $${$('#totalCompra').val()}</p>
        <form method="POST" action="ticket.php" target="_blank" name="tienda" onsubmit="return validateForm()">
          <input type="hidden" name="carrito" value="${$('#comment').val()}">
          <input type="hidden" name="total" value="${$('#totalCompra').val()}">
          <input type="hidden" name="pago" value="${$('#pago').val()}">
          <input type="hidden" name="metodo_pago" value="${$('#metodo_pago').val()}">
          
          <button type="submit" class="btn btn-success">Imprimir Ticket</button>
        </form> 
      `,
    }).then((result) => {
      if (result.isConfirmed) {
        limpiar();
      }
    });
    efectivoDiv.hide();
  } else {
    efectivoDiv.hide();
  }
}
