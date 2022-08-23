create table producto(
       id_producto integer  primary key AUTOINCREMENT not null,
       producto varchar(100) not null,
       precio_venta decimal(11,2) not null,
       existencias integer not null,
       descripcion varchar(256) null
);

INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Boing", "6.50", "20","Producto liquido de 250 ml.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Barritas", "10", "20","Galletas de 125g.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Jarrito 2L", "19", "20","Producto liquido de 2 l.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Coca Cola 600 ml", "13.50", "10","Producto liquido de 600 ml.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Aceite cristal", "15", "10","Producto liquido de 500 ml.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Rexona talco", "35", "30","Producto en polvo de 250g.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Agua bonafont", "12", "15","Producto liquido de 2l.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Fabuloso", "18", "20","Producto liquido de 1l.");
INSERT INTO producto(producto, precio_venta, existencias, descripcion) values("Tostadas Charras", "22", "20","Producto de tostadas de 300g.");

create table ticket(
       id_venta integer  not null primary key AUTOINCREMENT not null,
       fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP not null,
       cantidad_producto varchar (25) not null ,
       producto varchar (300) not null ,
       total_producto  integer not null
);

