/*Rutina de generacion de una tienda*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*Tabla de empleado*/
CREATE TABLE `empleado_codTienda` (
  `codEmpleado` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `movil` varchar(12) NOT NULL,
  `foto` blob NOT NULL,
  `sueldo` float NOT NULL,
  `codUsuario` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `empleado_codTienda`
  ADD PRIMARY KEY (`codEmpleado`);

/* Tabla de  producto*/
CREATE TABLE `producto_codTienda` (
  `codProducto` varchar(3) NOT NULL,
  `referencia` varchar(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `IVA` float NOT NULL,
  `descuento` float NOT NULL,
  `cantidad` int(3) NOT NULL,
  `cantidadMin` int(3) NOT NULL,
  `nuevo` tinyint(1) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `producto_codTienda`
  ADD PRIMARY KEY (`codProducto`);

/*Tabla de Proveedores*/
CREATE TABLE `proveedor_codTienda` (
  `codProveedor` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombreContacto` varchar(30) NOT NULL,
  `apellido1Contacto` varchar(30) NOT NULL,
  `apellido2Contacto` varchar(30) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `movil` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `proveedor_codTienda`
  ADD PRIMARY KEY (`codProveedor`);

/*Tabla de suministro*/
CREATE TABLE `suministro_codTienda` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `suministro_codTienda`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

 COMMIT;