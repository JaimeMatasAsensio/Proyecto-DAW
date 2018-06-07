-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 16:33:19
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopshpere`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1_empleado`
--

CREATE TABLE `1_empleado` (
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

--
-- Volcado de datos para la tabla `1_empleado`
--

INSERT INTO `1_empleado` (`codEmpleado`, `nombre`, `apellido1`, `apellido2`, `telefono`, `movil`, `foto`, `sueldo`, `codUsuario`) VALUES
('1', 'Pancracio', 'Fernandez', 'Juarez', '926240002', '692920002', '', 1200.34, '1'),
('2', 'Privato', 'Juarez', 'Beltran', '926240004', '696920004', '', 875.49, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1_producto`
--

CREATE TABLE `1_producto` (
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

--
-- Volcado de datos para la tabla `1_producto`
--

INSERT INTO `1_producto` (`codProducto`, `referencia`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `cantidad`, `cantidadMin`, `nuevo`, `foto`) VALUES
('1', '7896451456128', 'PlagaFest', 'Plaguicida de efecto rapido. Conserva tu cosecha en perfecto estado sin alterar el fruto afectando solamente a las malas hierbas que reducen tu produccion. Manejar con cuidado y no exponer al sol o a alta temperatura. Venta en bidones de 80 litros de capacidad', 164.25, 0.16, 0.1, 100, 10, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1_proveedor`
--

CREATE TABLE `1_proveedor` (
  `codProveedor` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombreContacto` varchar(30) NOT NULL,
  `apellido1Contacto` varchar(30) NOT NULL,
  `apellido2Contacto` varchar(30) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `movil` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `1_proveedor`
--

INSERT INTO `1_proveedor` (`codProveedor`, `nombre`, `nombreContacto`, `apellido1Contacto`, `apellido2Contacto`, `telefono`, `movil`, `email`) VALUES
('1', 'Quimicas Manchegas S.A.', 'Manuel', 'Lopez', 'Valiente', '926240003', '696920003', 'comercial1@quimiman.net');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1_suministro`
--

CREATE TABLE `1_suministro` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `1_suministro`
--

INSERT INTO `1_suministro` (`codProducto`, `codProveedor`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2_empleado`
--

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

--
-- Volcado de datos para la tabla `2_empleado`
--

INSERT INTO `2_empleado` (`codEmpleado`, `nombre`, `apellido1`, `apellido2`, `telefono`, `movil`, `foto`, `sueldo`, `codUsuario`) VALUES
('1', 'Manuela', 'Carrasco', 'Hernandez', '926230002', '665890002', '', 1589.5, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2_producto`
--

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

--
-- Volcado de datos para la tabla `2_producto`
--

INSERT INTO `2_producto` (`codProducto`, `referencia`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `cantidad`, `cantidadMin`, `nuevo`, `foto`) VALUES
('1', '7894456679', 'Botijo Ceramico Blanco', 'Fabuloso botijo de ceramica blanca, este botijo de color blanco refrescara sus tardes mas calurosas.', 18.65, 0.21, 0.1, 7, 12, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2_proveedor`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2_suministro`
--

CREATE TABLE `2_suministro` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `codUsuario` varchar(3) NOT NULL,
  `codTienda` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`codUsuario`, `codTienda`) VALUES
('0', '1'),
('0', '2'),
('1', '1'),
('2', '1'),
('3', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `codTienda` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `movil` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tipoSuscripcion` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`codTienda`, `nombre`, `pais`, `provincia`, `poblacion`, `direccion`, `numero`, `telefono`, `movil`, `email`, `tipoSuscripcion`) VALUES
('1', 'Suministros Agricolas AlCampo', 'España', 'Ciudad Real', 'Miguelturra', 'C/Secarral', '1', '926241001', '696920001', 'alCampo@SuministrosAlcampo.es', 'fre'),
('2', 'Artesanias el Botijo', 'España', 'Albacete', 'El Bonillo', 'C/ Zarzal', '23', '926230001', '665890001', 'artesanias@elbotijo.es', 'pre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nivelAcceso` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `nombre`, `password`, `email`, `nivelAcceso`) VALUES
('0', 'Admin', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'administrador@hshosphere.es', 'adm'),
('1', 'gerente1', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'gerente1@gmail.com', 'gen'),
('2', 'empleado1', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'privato@gmail.com', 'emp'),
('3', 'gerente2', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'gerente@elbotijo.es', 'gen');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `1_empleado`
--
ALTER TABLE `1_empleado`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `1_producto`
--
ALTER TABLE `1_producto`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `1_proveedor`
--
ALTER TABLE `1_proveedor`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `1_suministro`
--
ALTER TABLE `1_suministro`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

--
-- Indices de la tabla `2_empleado`
--
ALTER TABLE `2_empleado`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `2_producto`
--
ALTER TABLE `2_producto`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `2_proveedor`
--
ALTER TABLE `2_proveedor`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `2_suministro`
--
ALTER TABLE `2_suministro`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`codUsuario`,`codTienda`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`codTienda`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
