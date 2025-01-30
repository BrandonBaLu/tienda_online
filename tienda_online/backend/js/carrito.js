function insertar() {
  var cantidad = parseInt($("#cantidad_product").val()) || 0;
  var nombreProducto = $("#producto option:selected").text();
  var precio = parseFloat($("#producto").val()) || 0;
  var carrito = $("#comment").val();
  var idProducto = $("#producto option:selected").data("id");
  var totalCompra = cantidad * precio;

  if (cantidad > 0 && cantidad < 10 && precio > 0) {
    $("#comment").val(carrito + cantidad + "\t" + nombreProducto + "\tPU:$" + precio + "\ttotal:$" + totalCompra + "\n");
    var idProductos = $("#idProductos").val();
    $("#idProductos").val(idProductos + idProducto + ":" + cantidad + ";");
    llenaTotal(totalCompra);
    $("#producto").val("0");
    $("#cantidad_product").val("");
  } else {
    Swal.fire("Error", "La cantidad debe ser mayor a 0 y menor a 10, y el precio debe ser válido", "error");
  }
}

function limpiar() {
  $("#comment, #cantidad_product, #totalCompra, #producto, #pago").val("");
}

function llenaTotal(costo) {
  var totalActual = parseFloat($("#totalCompra").val()) || 0;
  $("#totalCompra").val((totalActual + costo).toFixed(2));
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
  efectivoDiv.hide();

  if (metodoPago === '1') {
    efectivoDiv.show();
  } else if (metodoPago === '4') {
    $('#totalCompraTransferencia').text($('#totalCompra').val());
    $('#pagoTransferencia').text($('#totalCompra').val());
    //se llena el input pago con el total de la compra
    $('#pago').val($('#totalCompra').val());
    $('#transferenciaModal').modal('show');

  }
}

