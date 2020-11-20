create table producto(
       id_producto integer primary key identity,
       nombre varchar(100) not null unique,
       precio_venta decimal(11,2) not null,
       stock integer not null,
       descripcion varchar(256) null
);

INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Boing", "6.50", "20","Producto liquido de 250 ml.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Barritas", "10", "8","Galletas de 125g.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Jarrito 2L", "19", "5","Producto liquido de 2 l.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Coca Cola 600 ml", "13.50", "3","Producto liquido de 600 ml.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Aceite cristal", "15", "10","Producto liquido de 500 ml.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Rexona talco", "35", "2","Producto en polvo de 250g.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Agua bonafont", "12", "5","Producto liquido de 2l.");
INSERT INTO personas(nombre, precio_venta, stock, descripcion) values("Fabuloso", "18", "6","Producto liquido de 1l.");

create table venta(
       idventa integer primary key identity,
       tipo_comprobante varchar(20) not null,
       serie_comprobante varchar(7) null,
       num_comprobante varchar (10) not null,
       fecha_hora datetime not null,
       total decimal (11,2) not null,
       estado varchar(20) not null,
    
);

--Tabla detalle_venta
create table detalle_venta(
       iddetalle_venta integer primary key identity,
       idventa integer not null,
       idproducto integer not null,
       cantidad integer not null,
       precio decimal(11,2) not null,
       FOREIGN KEY (idventa) REFERENCES venta (idventa) ON DELETE CASCADE,
       FOREIGN KEY (id_producto) REFERENCES producto (id_producto)
);
