-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2018 a las 21:41:00
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
-- Estructura de tabla para la tabla `empleado_1`
--

CREATE TABLE `empleado_1` (
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
-- Volcado de datos para la tabla `empleado_1`
--

INSERT INTO `empleado_1` (`codEmpleado`, `nombre`, `apellido1`, `apellido2`, `telefono`, `movil`, `foto`, `sueldo`, `codUsuario`) VALUES
('1', 'Pancracio', 'Fernandez', 'Juarez', '926240002', '692920002', '', 1200.34, '1'),
('2', 'Privato', 'Juarez', 'Beltran', '926240004', '696920004', '', 875.49, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_2`
--

CREATE TABLE `empleado_2` (
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
-- Volcado de datos para la tabla `empleado_2`
--

INSERT INTO `empleado_2` (`codEmpleado`, `nombre`, `apellido1`, `apellido2`, `telefono`, `movil`, `foto`, `sueldo`, `codUsuario`) VALUES
('1', 'Manuela', 'Carrasco', 'Hernandez', '926230002', '665890002', '', 1589.5, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_3`
--

CREATE TABLE `empleado_3` (
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
-- Estructura de tabla para la tabla `producto_1`
--

CREATE TABLE `producto_1` (
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
-- Volcado de datos para la tabla `producto_1`
--

INSERT INTO `producto_1` (`codProducto`, `referencia`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `cantidad`, `cantidadMin`, `nuevo`, `foto`) VALUES
('1', '7896451456128', 'PlagaFest', 'Plaguicida de efecto rapido. Conserva tu cosecha en perfecto estado sin alterar el fruto afectando solamente a las malas hierbas que reducen tu produccion. Manejar con cuidado y no exponer al sol o a alta temperatura. Venta en bidones de 80 litros de capacidad', 164.25, 0.16, 0.1, 100, 10, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_2`
--

CREATE TABLE `producto_2` (
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
-- Volcado de datos para la tabla `producto_2`
--

INSERT INTO `producto_2` (`codProducto`, `referencia`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `cantidad`, `cantidadMin`, `nuevo`, `foto`) VALUES
('1', '7894456679', 'Botijo Ceramico Blanco', 'Fabuloso botijo de ceramica blanca, este botijo de color blanco refrescara sus tardes mas calurosas.', 18.65, 0.21, 0.1, 7, 12, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_3`
--

CREATE TABLE `producto_3` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_1`
--

CREATE TABLE `proveedor_1` (
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
-- Volcado de datos para la tabla `proveedor_1`
--

INSERT INTO `proveedor_1` (`codProveedor`, `nombre`, `nombreContacto`, `apellido1Contacto`, `apellido2Contacto`, `telefono`, `movil`, `email`) VALUES
('1', 'Quimicas Manchegas S.A.', 'Manuel', 'Lopez', 'Valiente', '926240003', '696920003', 'comercial1@quimiman.net');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_2`
--

CREATE TABLE `proveedor_2` (
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
-- Estructura de tabla para la tabla `proveedor_3`
--

CREATE TABLE `proveedor_3` (
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
-- Estructura de tabla para la tabla `suministro_1`
--

CREATE TABLE `suministro_1` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suministro_1`
--

INSERT INTO `suministro_1` (`codProducto`, `codProveedor`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministro_2`
--

CREATE TABLE `suministro_2` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministro_3`
--

CREATE TABLE `suministro_3` (
  `codProducto` varchar(3) NOT NULL,
  `codProveedor` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('1', 'Suministros Agricolas Eco', 'españa', 'Albacete', 'Pobla', 'C/ Buena Vida', '1', '926241002', '696920002', 'Eco@Suministros.agricolas.es', 'pre'),
('2', 'Artesanias el Botijo', 'España', 'Albacete', 'El Bonillo', 'C/ Zarzal', '23', '926240003', '665890001', 'artesanias@elbotijo.com', 'fre'),
('3', 'Hola', 'Mundo', 'Estoy', 'vivo', 'yVengo', '0', '123456789', '989454653', 'por@AJAX.es', 'pre');

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
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`codUsuario`,`codTienda`);

--
-- Indices de la tabla `empleado_1`
--
ALTER TABLE `empleado_1`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `empleado_2`
--
ALTER TABLE `empleado_2`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `empleado_3`
--
ALTER TABLE `empleado_3`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `producto_1`
--
ALTER TABLE `producto_1`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `producto_2`
--
ALTER TABLE `producto_2`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `producto_3`
--
ALTER TABLE `producto_3`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `proveedor_1`
--
ALTER TABLE `proveedor_1`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `proveedor_2`
--
ALTER TABLE `proveedor_2`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `proveedor_3`
--
ALTER TABLE `proveedor_3`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `suministro_1`
--
ALTER TABLE `suministro_1`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

--
-- Indices de la tabla `suministro_2`
--
ALTER TABLE `suministro_2`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

--
-- Indices de la tabla `suministro_3`
--
ALTER TABLE `suministro_3`
  ADD PRIMARY KEY (`codProducto`,`codProveedor`);

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
