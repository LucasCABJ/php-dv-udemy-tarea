CREATE DATABASE tienda;
USE tienda;

CREATE TABLE usuarios(
    usuario_id          INT AUTO_INCREMENT NOT NULL,
    nombre              VARCHAR(255) NOT NULL,
    apellidos           VARCHAR(255) NOT NULL,
    email               VARCHAR(255) NOT NULL,
    password            VARCHAR(255) NOT NULL,
    rol                 VARCHAR(25),
    imagen              VARCHAR(255),
    CONSTRAINT pk_usuario PRIMARY KEY (usuario_id),
    CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(NULL, 'admin', 'admin', 'admin@admin.com', '1234', 'admin', null);

CREATE TABLE categorias {
    categoria_id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    CONSTRAINT pk_categoria PRIMARY KEY (categoria_id)
}ENGINE=InnoDB;

INSERT INTO categorias VALUES (NULL, 'Manga corta');
INSERT INTO categorias VALUES (NULL, 'Manga larga');
INSERT INTO categorias VALUES (NULL, 'Tirantes');
INSERT INTO categorias VALUES (NULL, 'Sudaderas');

CREATE TABLE productos(
    producto_id         INT AUTO_INCREMENT NOT NULL,
    categoria_id        INT NOT NULL,
    nombre              VARCHAR(255) NOT NULL,
    descripcion         TEXT,
    precio              FLOAT(100, 2) NOT NULL,
    stock               INT(255) NOT NULL,
    ofertas             VARCHAR(2),
    fecha               DATE NOT NULL,
    imagen              INT(255),
    CONSTRAINT pk_producto PRIMARY KEY (producto_id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id),
)ENGINE=InnoDB;

CREATE TABLE pedidos(
    pedido_id          INT AUTO_INCREMENT NOT NULL,
    usuario_id         INT NOT NULL,
    provincia          VARCHAR NOT NULL,
    localidad          VARCHAR NOT NULL,
    direccion          VARCHAR NOT NULL,
    coste              FLOAT NOT NULL,
    estado             VARCHAR NOT NULL,
    fecha              DATE,
    hora               TIME,
    CONSTRAINT pk_pedido PRIMARY KEY (pedido_id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
)ENGINE=InnoDB;

CREATE TABLE lineas_pedidos(
    lineas_pedido_id INT NOT NULL AUTO_INCREMENT,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    CONSTRAINT pk_lineas_pedido PRIMARY KEY (lineas_pedido_id),
    CONSTRAINT fk_linea_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(pedido_id),
    CONSTRAINT fk_linea_producto FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
)ENGINE=InnoDB;