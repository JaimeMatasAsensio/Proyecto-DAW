-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2018 a las 16:55:30
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

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
('1', 'Pancracio', 'Dominico', 'Bataran', '9262400002', '6969200012', '', 1000.5, '1'),
('2', 'Eustaquio', 'Dominico', 'Salinero', '926240003', '696920003', '', 875.24, '2');

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
  `nuevo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `1_producto`
--

INSERT INTO `1_producto` (`codProducto`, `referencia`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `cantidad`, `cantidadMin`, `nuevo`) VALUES
('1', '4789465123384', 'TotalClear', 'Herbicida ponente para uso exterior de efecto rapido. Esta herbicida eliminara las malas hierbas de su cosecha sin dañar las plantas buenas. De baja dispersion y disolucion rapida. No usar en abientes cerrados ni con concentracion alta. Puede dañar los y vias respiratorias si hay una larga exposicion', 248.79, 0.23, 0.1, 100, 5, 1);

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
('1', 'Quimicas Manchegas S.A.', 'Manuel', 'Fernandez', 'de la Hera', '926240004', '696920004', 'comercial@quimicasmanchegas.com');

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
('1', '1'),
('2', '1');

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
('1', 'Tienda1', 'España', 'Ciudad Real', 'Miguelturra', 'C/Paraiso', '14', '926240001', '696920001', 'tienda1@hotmail.com', 'fre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nivelAcceso` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `nombre`, `password`, `email`, `nivelAcceso`) VALUES
('0', 'admin', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'admin@shopshere.es', 'adm'),
('1', 'gerente1', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'gerente@hotmail.com', 'gen'),
('2', 'empleado1', 'ea92acff989b7a0b0a5363b0453ae47b4809bcee', 'empleado1@gmail.com', 'emp');

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
-- Indices de la tabla `1_suministro`
--
ALTER TABLE `1_suministro`
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
