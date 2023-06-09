-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2023 a las 18:29:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `suma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `num_facturacion` int(11) DEFAULT NULL,
  `front` varchar(100) DEFAULT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `est` varchar(100) DEFAULT NULL,
  `tecnologia` varchar(100) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `central` varchar(45) DEFAULT NULL,
  `equipo` varchar(45) DEFAULT NULL,
  `molecula` varchar(45) DEFAULT NULL,
  `titular` int(11) DEFAULT NULL,
  `num_conexion` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `num_facturacion`, `front`, `producto`, `direccion`, `est`, `tecnologia`, `estado`, `central`, `equipo`, `molecula`, `titular`, `num_conexion`) VALUES
(0, 0, 'PORTALFIJA', '3PLAY 30M SILVER 1', 'KR 69D 24A 78 IN 2 AP 404', '4', 'FTTH', 'Activo', '0', '0', '0', 3, 6014104265);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pqr`
--

CREATE TABLE `detalle_pqr` (
  `id` int(11) DEFAULT NULL,
  `id_pqr` int(11) DEFAULT NULL,
  `clase` varchar(100) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `relacion` varchar(100) DEFAULT NULL,
  `causal` varchar(100) DEFAULT NULL,
  `sintoma` varchar(100) DEFAULT NULL,
  `descipcion` varchar(100) DEFAULT NULL,
  `solicitante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pqr`
--

CREATE TABLE `estado_pqr` (
  `id` int(11) NOT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `id` int(11) NOT NULL,
  `tipo_pqr` int(11) NOT NULL,
  `cuenta_id` int(11) DEFAULT NULL,
  `estado_pqr` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `agenda` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Asesor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `cuenta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopqr`
--

CREATE TABLE `tipopqr` (
  `id` int(11) NOT NULL,
  `pqr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `documento` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`documento`) VALUES
('CC'),
('TI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(5) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `celular` bigint(10) DEFAULT NULL,
  `uen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono_fijo` bigint(10) DEFAULT NULL,
  `usuario_etb` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `departamento` varchar(30) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `usm` varchar(30) DEFAULT NULL,
  `usuario_suma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo_documento`, `documento`, `nombre`, `apellido`, `pass`, `celular`, `uen`, `email`, `telefono_fijo`, `usuario_etb`, `categoria`, `departamento`, `ciudad`, `direccion`, `usm`, `usuario_suma`) VALUES
(1, 'CC', 1111111111, 'Escuela', 'digital', 'digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escueladigital'),
(3, 'CC', 52170647, 'ANA PATRICIA', 'WALTEROZ WALTEROZ', '123', 3132738038, 'Hogares y Mipymes', '0', 601410426, '0', 'ORO', 'BOGOTA', 'BOGOTA D.C', 'KR 690 24A 78 N 2 AP 404', 'NO', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_rol`
--

CREATE TABLE `usuario_has_rol` (
  `documento` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_has_rol`
--

INSERT INTO `usuario_has_rol` (`documento`, `rol`) VALUES
(1, 1),
(3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titular` (`titular`);

--
-- Indices de la tabla `detalle_pqr`
--
ALTER TABLE `detalle_pqr`
  ADD KEY `id_pqr` (`id_pqr`);

--
-- Indices de la tabla `estado_pqr`
--
ALTER TABLE `estado_pqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_id` (`cuenta_id`),
  ADD KEY `estado_pqr` (`estado_pqr`),
  ADD KEY `tipo_pqr` (`tipo_pqr`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_id` (`cuenta_id`);

--
-- Indices de la tabla `tipopqr`
--
ALTER TABLE `tipopqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- Indices de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipopqr`
--
ALTER TABLE `tipopqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  MODIFY `documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`titular`) REFERENCES `usuario_has_rol` (`documento`);

--
-- Filtros para la tabla `detalle_pqr`
--
ALTER TABLE `detalle_pqr`
  ADD CONSTRAINT `detalle_pqr_ibfk_1` FOREIGN KEY (`id_pqr`) REFERENCES `pqr` (`id`);

--
-- Filtros para la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD CONSTRAINT `pqr_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `pqr_ibfk_2` FOREIGN KEY (`estado_pqr`) REFERENCES `estado_pqr` (`id`),
  ADD CONSTRAINT `pqr_ibfk_3` FOREIGN KEY (`tipo_pqr`) REFERENCES `tipopqr` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_documento` (`documento`);

--
-- Filtros para la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD CONSTRAINT `usuario_has_rol_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_has_rol_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
