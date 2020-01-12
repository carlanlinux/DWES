-- Seleccionamos la base de datos
USE dwes;

-- Creamos la tabla
CREATE TABLE usuarios (
	usuario VARCHAR(20) NOT NULL PRIMARY KEY,
	contrasena VARCHAR(32) NOT NULL
) ENGINE = INNODB;

-- Creamos el usuario dwes
INSERT INTO usuarios (usuario, contrasena) VALUES
('dwes1', ' $2y$10$GcfDfvo5J.tiDWv2vW16hurTj/BkjOTw8rDZOelsx.ci4nXMZ9Rtm');
