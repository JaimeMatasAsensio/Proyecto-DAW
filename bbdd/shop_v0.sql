-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2018 a las 16:01:44
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
-- Base de datos: `shopShpere`
--
--Estas tablas se generan con un alias que sera el codTienda
--almacenado en la tabla tienda. Con cada registro se ejecutaran
--estas sentencias SQL y seran las tablas con las que podra
--trabajar una tienda. El usuario administrador podra acceder
--a cualquier concunto de tablas de una tienda.

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `[alias]_empleado`
--

CREATE TABLE `empleado` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `[alias]_producto`
--

CREATE TABLE `producto` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `[alias]_proveedor`
--

CREATE TABLE `proveedor` (
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
-- Estructura de tabla para la tabla `[alias]_suministro`
--

CREATE TABLE `suministro` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
