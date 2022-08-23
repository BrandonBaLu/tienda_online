function insertar(){
  var cantidad= $("#cantidad_product").val();
  var nombreProducto = $("#producto option:selected").text();
  var precio=$("#producto").val();
  var carrito = $("#comment").val();
  var idProducto = $("#producto option:selected").data("id");
  var producto= $("#producto").val();
  
  if(cantidad<10 & cantidad >0 &  precio >0){
    $("#comment").text(carrito +cantidad + "\t"+nombreProducto +  "\t$" + precio + "\t$"+ parseFloat(cantidad)*parseFloat(precio)+"\n");
    var idProductos = $("#idProductos").val();
    $("#idProductos").val(idProductos + idProducto + ":" + cantidad + ";");
    llenaTotal(parseFloat(cantidad)* parseFloat(precio));
    $("#producto").val(nombreProducto)
    $("#cantidad_product").val(" ")
    $("#producto").val("0")
  }
  else if (cantidad <=0 & precio<=0 ){
    Swal.fire("Error","No has ingresado valores", 'error')
  }

  else if (cantidad>0 & cantidad>=10 & precio>0){
    Swal.fire("Error", "La cantidad del producto debe ser mayor a 0 y menor a 10", 'error');
  }

  else if (precio>0 & cantidad<=0 || precio<=0 & cantidad>0 ){
    Swal.fire("Error","Ingresa producto o cantidad", 'error')
  }
}

function limpiar(){
  $("#comment").empty();
  $("#cantidad_product").val(" ");
   $("#totalCompra").val('0');
  $("#producto").val("0");
  $("#pago").val(" ")
}


function llenaTotal(costo){
  var totalActual = $("#totalCompra").val();
  var totalFinal = parseFloat(totalActual)+parseFloat(costo);
  $("#totalCompra").val(totalFinal);
}

function validateForm() {
  var x = document.forms["tienda"]["pago"].value;
  var pago = $("#pago").val()
  if (x == "") {
    Swal.fire("Error","No has ingresado el pago", 'error' );
    return false;
    }

  else if (pago<=0){
    Swal.fire("Error","el pago debe ser mayor a cero ", 'error' );
  }
}

 


 

 
