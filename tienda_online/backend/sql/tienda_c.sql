-- Tabla para productos
CREATE TABLE producto (
    id_producto INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    producto VARCHAR(100) NOT NULL,
    precio_venta DECIMAL(11,2) NOT NULL,
    existencias INTEGER NOT NULL,
    descripcion VARCHAR(256) NULL,
    ruta_imagen VARCHAR(300) NULL, -- Campo para la ruta de las imágenes
    id_categoria INTEGER,
    id_promocion INTEGER,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
    FOREIGN KEY (id_promocion) REFERENCES promocion(id_promocion)
);

-- Tabla para categorías de productos
CREATE TABLE categoria (
    id_categoria INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla para promociones
CREATE TABLE promocion (
    id_promocion INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    descuento DECIMAL(5,2) NOT NULL, -- Porcentaje de descuento
    fecha_inicio TIMESTAMP NOT NULL,
    fecha_fin TIMESTAMP NOT NULL
);

-- Tabla para tickets de venta
CREATE TABLE ticket (
    id_venta INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    total_venta DECIMAL(11,2) NOT NULL,
    id_metodo_pago INTEGER,
    FOREIGN KEY (id_metodo_pago) REFERENCES metodo_pago(id_metodo)
);

-- Tabla para métodos de pago
CREATE TABLE metodo_pago (
    id_metodo INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    metodo VARCHAR(50) NOT NULL
);

-- Tabla para detalles del ticket
CREATE TABLE detalle_ticket (
    id_detalle INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    id_venta INTEGER NOT NULL,
    id_producto INTEGER NOT NULL,
    cantidad INTEGER NOT NULL,
    subtotal DECIMAL(11,2) NOT NULL,
    FOREIGN KEY (id_venta) REFERENCES ticket(id_venta),
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

-- Tabla para clientes
CREATE TABLE cliente (
    id_cliente INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NULL,
    telefono VARCHAR(15) NULL,
    direccion TEXT NULL
);

-- Tabla para empleados
CREATE TABLE empleado (
    id_empleado INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    telefono VARCHAR(10) NULL,
    direccion TEXT NULL,
    puesto VARCHAR(50) NOT NULL,
    foto VARCHAR(300) NULL,
    usuario VARCHAR(100) UNIQUE NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(256) NOT NULL, -- Hasheada para mayor seguridad
    fecha_ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

-- Tabla para proveedores
CREATE TABLE proveedor (
    id_proveedor INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NULL,
    correo VARCHAR(100) NULL,
    direccion TEXT NULL
);

-- Tabla para compras de productos a proveedores
CREATE TABLE compra (
    id_compra INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    id_proveedor INTEGER NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    total DECIMAL(11,2) NOT NULL,
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);

-- Tabla para movimientos de inventario
CREATE TABLE movimiento_inventario (
    id_movimiento INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    id_producto INTEGER NOT NULL,
    tipo_movimiento VARCHAR(50) NOT NULL, -- Entrada o Salida
    cantidad INTEGER NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

-- Tabla para auditorías
CREATE TABLE auditoria (
    id_auditoria INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    accion VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

-- Inserción de datos iniciales
-- Ejemplo de categorías
INSERT INTO categoria (nombre) VALUES 
    ('Bebidas'), 
    ('Alimentos'), 
    ('Limpieza'), 
    ('Cuidado Personal');

-- Ejemplo de métodos de pago
INSERT INTO metodo_pago (metodo) VALUES 
    ('Efectivo'), 
    ('Tarjeta de Crédito'), 
    ('Tarjeta de Débito'), 
    ('Transferencia Bancaria');

-- Ejemplo de productos
INSERT INTO producto (producto, precio_venta, existencias, descripcion, ruta_imagen, id_categoria) VALUES 
    ('Boing', 6.50, 20, 'Producto líquido de 250 ml.', '../../frontend/imagenes/productos/boing.jpg', 1),
    ('Barritas', 10, 20, 'Galletas de 125g.', '../../frontend/imagenes/productos/barritas.jpg', 2),
    ('Jarrito 2L', 19, 20, 'Producto líquido de 2 l.', '../../frontend/imagenes/productos/jarrito.jpg', 1),
    ('Coca Cola 600 ml', 13.50, 10, 'Producto líquido de 600 ml.', '../../frontend/imagenes/productos/coca_cola.jpg', 1),
    ('Aceite cristal', 15, 10, 'Producto líquido de 500 ml.', '../../frontend/imagenes/productos/aceite.jpg', 3);

-- Ejemplo de promociones
INSERT INTO promocion (descripcion, descuento, fecha_inicio, fecha_fin) VALUES 
    ('Descuento de verano', 10.00, '2025-01-01', '2025-02-01');

-- Ejemplo de cliente
INSERT INTO cliente (nombre, correo, telefono, direccion) VALUES 
    ('Juan Pérez', 'juan.perez@example.com', '5551234567', 'Calle Falsa 123, Ciudad');

-- Ejemplo de empleado
INSERT INTO empleado (nombre, apellido_paterno, apellido_materno, telefono, direccion, puesto, foto, usuario, correo, contrasena) VALUES
    ('Brandon', 'Balderas', 'Lucas', '7753000065', 'calle falsa 123, ciudad', 'administrador', '../../frontend/imagenes/usuario/brandon.jpg', 'brandon', 'patolucas.bbl@gmail.com', 'contrasena123');

-- Ejemplo de proveedor
INSERT INTO proveedor (nombre, telefono, correo, direccion) VALUES 
    ('Distribuidora ABC', '5559876543', 'contacto@abc.com', 'Av. Central 456, Ciudad');
