-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 20:12:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `IdCotizacion` int(10) NOT NULL,
  `IdEmpresa` int(10) NOT NULL,
  `Estado` int(10) NOT NULL,
  `Metros_Cubicos` int(10) NOT NULL,
  `Valor_Metro` int(10) NOT NULL,
  `Iva` int(10) NOT NULL,
  `Valor_Total` int(10) NOT NULL,
  `Observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`IdCotizacion`, `IdEmpresa`, `Estado`, `Metros_Cubicos`, `Valor_Metro`, `Iva`, `Valor_Total`, `Observaciones`) VALUES
(1, 1, 1, 200, 1000, 38000, 238000, 'test  N°1'),
(2, 28, 2, 50, 1000, 9500, 59500, 't5'),
(3, 3, 3, 100, 200, 3800, 23800, 'test  N°3'),
(4, 2, 2, 200, 1000, 38000, 238000, '4°'),
(5, 1, 1, 200, 1000, 38000, 238000, 'hhhh'),
(6, 29, 1, 200, 1000, 38000, 238000, 'Prueba ##'),
(7, 2, 2, 200, 1000, 38000, 238000, 'Prueba #gg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefacturas`
--

CREATE TABLE `detallefacturas` (
  `IdDetalleFactura` int(11) NOT NULL,
  `IdFactura` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ValorUnitario` double(20,2) NOT NULL,
  `ValorDetalle` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefacturas`
--

INSERT INTO `detallefacturas` (`IdDetalleFactura`, `IdFactura`, `IdProducto`, `Cantidad`, `ValorUnitario`, `ValorDetalle`) VALUES
(1, 2, 2, 20, 100.00, 2000.00),
(2, 3, 1, 20, 100.00, 2000.00),
(3, 3, 6, 200, 150.00, 30000.00),
(4, 5, 2, 2000, 200.00, 400000.00),
(5, 5, 7, 4000, 220.00, 880000.00),
(6, 6, 1, 200, 200.00, 40000.00),
(7, 6, 6, 2000, 210.00, 420000.00),
(8, 7, 1, 1000, 100.00, 100000.00),
(9, 7, 5, 2000, 110.00, 220000.00),
(10, 8, 3, 200, 100.00, 20000.00),
(11, 8, 3, 200, 100.00, 20000.00),
(12, 8, 3, 200, 100.00, 20000.00),
(13, 9, 1, 200, 100.00, 20000.00),
(14, 9, 6, 500, 110.00, 55000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(10) NOT NULL,
  `Empresa` varchar(30) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `Empresa`, `Ciudad`, `Direccion`) VALUES
(1, 'Constructora Capital', 'Medellin', 'Cra  54 # 34d'),
(2, 'Conconcreto', 'Bello', 'calle 66 a N° 55-65'),
(3, 'Vienes y Raizes', 'Envigado', 'calle 5 a N° 5-66  '),
(4, 'Constuctora andina', 'Riongro', 'calle 12 a N° 55-66  '),
(5, 'Inverciones M&M', 'Medellin', 'calle 73 a N° 66  '),
(27, 'Casas y Apartamentos', 'Envigado', '655ggatt'),
(28, 'lotes mz', 'Bello', 'Cra  54 # 34dd'),
(29, 'JE construcciones', 'Bello', '665r66');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IdEstado` int(10) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IdEstado`, `Estado`) VALUES
(1, 'En Proceso'),
(2, 'Aceptada'),
(3, 'Rechazada'),
(7, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `IdFactura` int(6) NOT NULL,
  `IdCliente` int(6) NOT NULL,
  `FechaFactura` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`IdFactura`, `IdCliente`, `FechaFactura`) VALUES
(2, 1, '2020-06-22 13:31:29'),
(3, 2, '2020-06-22 13:35:19'),
(5, 27, '2020-06-22 13:40:02'),
(6, 5, '2020-06-22 13:42:16'),
(7, 27, '2020-06-22 13:48:49'),
(8, 4, '2020-06-22 13:50:47'),
(9, 1, '2020-06-22 14:06:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(10) NOT NULL,
  `Producto` varchar(30) NOT NULL,
  `Precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Producto`, `Precio`) VALUES
(1, 'Tejas de Arcilla', 1200),
(2, 'Teja de Zinc', 20000),
(3, 'Teja Metalica', 30000),
(4, 'Ladrillo Bocadillo', 1900),
(5, 'Ladrillo Puqueño', 1600),
(6, 'Ladrillo Medio', 2000),
(7, 'Ladrillo Grande', 2500),
(8, 'Bloque Cemento', 3000),
(9, 'Cemento 25 KG', 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `IdTipo_Usuario` int(10) NOT NULL,
  `Tipo_Usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Clave` varchar(30) NOT NULL,
  `TipoUsuario` int(10) NOT NULL,
  `Estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Clave`, `TipoUsuario`, `Estado`) VALUES
(1, 'Juan', '1234', 1, 1),
(2, 'pedro', '4321', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`IdCotizacion`),
  ADD KEY `FK_IdEmpresa` (`IdEmpresa`),
  ADD KEY `FK_Estado` (`Estado`);

--
-- Indices de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD PRIMARY KEY (`IdDetalleFactura`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`IdFactura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`IdTipo_Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `IdCotizacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  MODIFY `IdDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `IdEstado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `IdFactura` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `IdTipo_Usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `FK_Estado` FOREIGN KEY (`Estado`) REFERENCES `estado` (`IdEstado`),
  ADD CONSTRAINT `FK_IdEmpresa` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
