CREATE DATABASE `BiblioCaracol`;
USE `BiblioCaracol`;

CREATE TABLE `Temas` (
  `idTema` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idTema`)
);

CREATE TABLE `Usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Contrasena` varchar(150) NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`),
  UNIQUE KEY `Mail_UNIQUE` (`Mail`)
);

CREATE TABLE `Autores` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idAutor`)
);

CREATE TABLE `Editorial` (
  `idEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idEditorial`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`)
);

CREATE TABLE `Estante` (
  `idEstante` int(11) NOT NULL,
  PRIMARY KEY (`idEstante`)
);

CREATE TABLE `Fila` (
  `idFila` int(11) NOT NULL,
  `Estante_idEstante` int(11) NOT NULL,
  PRIMARY KEY (`idFila`,`Estante_idEstante`),
  KEY `fk_FIla_Estante1_idx` (`Estante_idEstante`),
  CONSTRAINT `fk_FIla_Estante1` FOREIGN KEY (`Estante_idEstante`) REFERENCES `Estante` (`idEstante`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Posicion` (
  `idPosicion` int(11) NOT NULL,
  `Fila_idFila` int(11) NOT NULL,
  `Fila_Estante_idEstante` int(11) NOT NULL,
  PRIMARY KEY (`idPosicion`,`Fila_idFila`,`Fila_Estante_idEstante`),
  KEY `fk_Posicion_FIla1_idx` (`Fila_idFila`,`Fila_Estante_idEstante`),
  CONSTRAINT `fk_Posicion_FIla1` FOREIGN KEY (`Fila_idFila`, `Fila_Estante_idEstante`) REFERENCES `Fila` (`idFIla`, `Estante_idEstante`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Generos` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idGenero`)
);

CREATE TABLE `Contenido` (
  `idContenido` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  `Tipo` enum('Libro','Video','Revista','Audio') NOT NULL,
  `UPC` varchar(13) DEFAULT NULL,
  `Grande` tinyint(1) NOT NULL DEFAULT '0',
  `Idioma` varchar(20) NOT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `PublicoMeta` enum('Niños','Jóvenes','Adultos') NOT NULL,
  `URLPortada` varchar(256) DEFAULT NULL,
  `Editorial_idEditorial` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`),
  UNIQUE KEY `UPC_UNIQUE` (`UPC`),
  KEY `fk_Contenido_Editorial1_idx` (`Editorial_idEditorial`),
  CONSTRAINT `fk_Contenido_Editorial1` FOREIGN KEY (`Editorial_idEditorial`) REFERENCES `Editorial` (`idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Copia` (
  `idCopia` int(11) NOT NULL AUTO_INCREMENT,
  `Contenido_idContenido` int(11) NOT NULL,
  `Posicion_idPosicion` int(11) NOT NULL DEFAULT '1',
  `Posicion_Fila_idFIla` int(11) NOT NULL DEFAULT '1',
  `Posicion_Fila_Estante_idEstante` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCopia`,`Contenido_idContenido`),
  KEY `fk_Copia_Contenido1_idx` (`Contenido_idContenido`),
  KEY `fk_Copia_Posicion1_idx` (`Posicion_idPosicion`,`Posicion_Fila_idFIla`,`Posicion_Fila_Estante_idEstante`),
  CONSTRAINT `fk_Copia_Contenido1` FOREIGN KEY (`Contenido_idContenido`) REFERENCES `Contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Copia_Posicion1` FOREIGN KEY (`Posicion_idPosicion`, `Posicion_Fila_idFIla`, `Posicion_Fila_Estante_idEstante`) REFERENCES `Posicion` (`idPosicion`, `Fila_idFila`, `Fila_Estante_idEstante`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Usuarios_idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_Pedidos_Usuarios_idx` (`Usuarios_idUsuario`),
  CONSTRAINT `fk_Pedidos_Usuarios` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `Contenido_has_Generos` (
  `Contenido_idContenido` int(11) NOT NULL,
  `Generos_idGenero` int(11) NOT NULL,
  PRIMARY KEY (`Contenido_idContenido`,`Generos_idGenero`),
  KEY `fk_Contenido_has_Generos_Generos1_idx` (`Generos_idGenero`),
  KEY `fk_Contenido_has_Generos_Contenido1_idx` (`Contenido_idContenido`),
  CONSTRAINT `fk_Contenido_has_Generos_Contenido1` FOREIGN KEY (`Contenido_idContenido`) REFERENCES `Contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contenido_has_Generos_Generos1` FOREIGN KEY (`Generos_idGenero`) REFERENCES `Generos` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Contenido_has_Pedidos` (
  `Contenido_idContenido` int(11) NOT NULL,
  `Pedidos_idPedido` int(11) NOT NULL,
  `Aprobado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Contenido_idContenido`,`Pedidos_idPedido`),
  KEY `fk_Contenido_has_Pedidos_Pedidos1_idx` (`Pedidos_idPedido`),
  KEY `fk_Contenido_has_Pedidos_Contenido1_idx` (`Contenido_idContenido`),
  CONSTRAINT `fk_Contenido_has_Pedidos_Contenido1` FOREIGN KEY (`Contenido_idContenido`) REFERENCES `Contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contenido_has_Pedidos_Pedidos1` FOREIGN KEY (`Pedidos_idPedido`) REFERENCES `Pedidos` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Contenido_has_Temas` (
  `Contenido_idContenido` int(11) NOT NULL,
  `Temas_idTema` int(11) NOT NULL,
  PRIMARY KEY (`Contenido_idContenido`,`Temas_idTema`),
  KEY `fk_Contenido_has_Temas_Temas1_idx` (`Temas_idTema`),
  KEY `fk_Contenido_has_Temas_Contenido1_idx` (`Contenido_idContenido`),
  CONSTRAINT `fk_Contenido_has_Temas_Contenido1` FOREIGN KEY (`Contenido_idContenido`) REFERENCES `Contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contenido_has_Temas_Temas1` FOREIGN KEY (`Temas_idTema`) REFERENCES `Temas` (`idTema`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Prestamos` (
  `idPrestamo` int(11) NOT NULL AUTO_INCREMENT,
  `FechaPrestamo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaDevuelto` date DEFAULT NULL,
  `Usuarios_idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPrestamo`),
  KEY `fk_Prestamos_Usuarios1_idx` (`Usuarios_idUsuario`),
  CONSTRAINT `fk_Prestamos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `Prestamos_has_Copia` (
  `Prestamos_idPrestamo` int(11) NOT NULL,
  `Copia_idCopia` int(11) NOT NULL,
  `Copia_Contenido_idContenido` int(11) NOT NULL,
  PRIMARY KEY (`Prestamos_idPrestamo`,`Copia_idCopia`,`Copia_Contenido_idContenido`),
  KEY `fk_Prestamos_has_Copia_Copia1_idx` (`Copia_idCopia`,`Copia_Contenido_idContenido`),
  KEY `fk_Prestamos_has_Copia_Prestamos1_idx` (`Prestamos_idPrestamo`),
  CONSTRAINT `fk_Prestamos_has_Copia_Copia1` FOREIGN KEY (`Copia_idCopia`, `Copia_Contenido_idContenido`) REFERENCES `Copia` (`idCopia`, `Contenido_idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prestamos_has_Copia_Prestamos1` FOREIGN KEY (`Prestamos_idPrestamo`) REFERENCES `Prestamos` (`idPrestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `Autores_has_Contenido` (
  `Autores_idAutor` int(11) NOT NULL,
  `Contenido_idContenido` int(11) NOT NULL,
  PRIMARY KEY (`Autores_idAutor`,`Contenido_idContenido`),
  KEY `fk_Autores_has_Contenido_Contenido1_idx` (`Contenido_idContenido`),
  KEY `fk_Autores_has_Contenido_Autores1_idx` (`Autores_idAutor`),
  CONSTRAINT `fk_Autores_has_Contenido_Autores1` FOREIGN KEY (`Autores_idAutor`) REFERENCES `Autores` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Autores_has_Contenido_Contenido1` FOREIGN KEY (`Contenido_idContenido`) REFERENCES `Contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
