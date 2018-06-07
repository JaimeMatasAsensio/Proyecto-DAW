/*Rutina de generacion de una tienda*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*Tabla de empleado*/
CREATE TABLE `2_empleado` (
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

ALTER TABLE `2_empleado`
  ADD PRIMARY KEY (`codEmpleado`);

/* Tabla de  producto*/
CREATE TABLE `2_producto` (
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

ALTER TABLE `2_producto`
  ADD PRIMARY KEY (`codProducto`);

/*Tabla de Proveedores*/
CREATE TABLE `2_proveedor` (
  `codProveedor` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombreContacto` varchar(30) NOT NULL,
  `apellido1Contacto` varchar(30) NOT NULL,
  `apellido2Contacto` varchar(30) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `movil` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `2_proveedor`
  ADD PRIMARY KEY (`codProveedor`);

/*Tabla de suministro*/
CREATE TABLE `2_suministro` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `2_suministro`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

 COMMIT;