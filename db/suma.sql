-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2023 a las 18:40:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
(0, 8312587, 'PORTALFIJA', '3PLAY 30M SILVER 1', 'KR 69D 24A 78 IN 2 AP 404', '4', 'FTTH', 'Activo', 'CENTRAL CUN', 'BOCUZTC60104003', 'N4CU07_E15', 3, 601410426),
(1, 312685, 'PORTALFIJA', '3PLAY 30M SILVER 1', 'KR 50 88 SUR 81 N 3', '4', 'FTTH ', 'Activo', 'CENTRAL CUN', 'BOCUZTC60104003', 'N4CU07_E15', 3, 601421569);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pqr`
--

CREATE TABLE `detalle_pqr` (
  `id` int(11) NOT NULL,
  `id_pqr` int(11) DEFAULT NULL,
  `clase` varchar(100) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `relacion` varchar(100) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `causal` varchar(100) DEFAULT NULL,
  `sintoma` varchar(100) DEFAULT NULL,
  `descipcion` varchar(100) DEFAULT NULL,
  `solicitante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pqr`
--

INSERT INTO `detalle_pqr` (`id`, `id_pqr`, `clase`, `motivo`, `relacion`, `producto`, `causal`, `sintoma`, `descipcion`, `solicitante`) VALUES
(1, 1, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', 'CONFIRMACION', '', 52170641),
(2, 1, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', 'CONFIRMACION', 'Confirmación visita', 52170641),
(3, 1, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', '', '', 52170641),
(4, 1, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', '', '', 52170641),
(5, 2, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', 'CONFIRMACION', 'hh', 1036541204),
(6, 2, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', 'CONFIRMACION', 'kk', 1036541204),
(7, 2, 'PETICION', 'INFORMACION', 'INTERNET', 'PRODUCTO', 'VISITA TECNICA', 'REAGENDAMIENTO', 'tgggg', 1036541204);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pqr`
--

CREATE TABLE `estado_pqr` (
  `id` int(11) NOT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_pqr`
--

INSERT INTO `estado_pqr` (`id`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Cancelado'),
(3, 'Completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_visita`
--

CREATE TABLE `estado_visita` (
  `id` int(11) NOT NULL,
  `visita` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_visita`
--

INSERT INTO `estado_visita` (`id`, `visita`) VALUES
(1, 'Abierta'),
(2, 'Pendiente'),
(3, 'Cancelada'),
(4, 'Cerrada');

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
  `agenda` date DEFAULT NULL,
  `id_visita` int(2) DEFAULT NULL,
  `nombre_pqr` varchar(50) NOT NULL,
  `id_solicitante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pqr`
--

INSERT INTO `pqr` (`id`, `tipo_pqr`, `cuenta_id`, `estado_pqr`, `fecha`, `agenda`, `id_visita`, `nombre_pqr`, `id_solicitante`) VALUES
(1, 2, 0, 1, '2023-06-22 12:22:08', '2023-06-27', 1, 'MDM-PQR-38814008', 1),
(2, 2, 1, 1, '2023-09-04 19:08:32', '2023-09-05', 2, 'MDM-PQR-34562138', 2);

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
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `id_solicitante` int(11) NOT NULL,
  `tipo_documento` varchar(2) DEFAULT NULL,
  `documento_soli` int(10) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `celular` bigint(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `id_pqr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id_solicitante`, `tipo_documento`, `documento_soli`, `nombre`, `apellido`, `telefono`, `celular`, `email`, `direccion`, `id_pqr`) VALUES
(1, 'CC', 52170641, 'Patricia', 'Perez', 6014104265, 3156123280, 'pdiaz5783@gmail.com', 'KR 69D 24A 78 IN 2 AP 404', 1),
(2, 'CC', 1036541204, 'Rafael', 'Miranda', 601421569, 3156123280, 'no2@etb.com', 'KR 50 88 SUR 81 N 3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopqr`
--

CREATE TABLE `tipopqr` (
  `id` int(11) NOT NULL,
  `pqr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipopqr`
--

INSERT INTO `tipopqr` (`id`, `pqr`) VALUES
(1, 'MASIVA'),
(2, 'FALLA TECNICA');

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
  `usuario_suma` varchar(100) NOT NULL,
  `barrio` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo_documento`, `documento`, `nombre`, `apellido`, `pass`, `celular`, `uen`, `email`, `telefono_fijo`, `usuario_etb`, `categoria`, `departamento`, `ciudad`, `direccion`, `usm`, `usuario_suma`, `barrio`) VALUES
(1, 'CC', 1111111111, 'Escuela', 'digital', 'digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escueladigital', ''),
(2, 'CC', 1036541204, 'RAFAEL', 'MIRANDA', '123', 3156123280, 'Hogares y Mipymes', 'no2@etb.com', 601421569, '0', 'ORO', 'BOGOTA', 'BOGOTA D.C', 'KR 50 88 SUR 81 N 3', 'NO', '0', '006303'),
(3, 'CC', 52170647, 'ANA PATRICIA', 'WALTEROZ WALTEROZ', '123', 3132738038, 'Hogares y Mipymes', 'no@etb.com', 601410426, '0', 'ORO', 'BOGOTA', 'BOGOTA D.C', 'KR 690 24A 78 N 2 AP 404', 'NO', '0', '006303'),
(5, 'CC', 123456789, 'Escuela', 'Digital', '[NULL]', 3214352353, 'Hogares y Mipymes', 'escuela@gmail.com', 6014305423, '0', 'ORO', 'BOGOTA', 'BOGOTA D.C', 'KR 690 23A 34 N 2 AP 402', 'NO', '0', '006303');

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
(3, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(2) NOT NULL,
  `estado_visita` int(2) DEFAULT NULL,
  `cuenta_id` int(2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id`, `estado_visita`, `cuenta_id`, `fecha`) VALUES
(1, 1, 0, '2023-06-20 15:00:11'),
(2, 1, 1, '2023-09-07 19:07:32');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pqr` (`id_pqr`);

--
-- Indices de la tabla `estado_pqr`
--
ALTER TABLE `estado_pqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_visita`
--
ALTER TABLE `estado_visita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_id` (`cuenta_id`),
  ADD KEY `estado_pqr` (`estado_pqr`),
  ADD KEY `tipo_pqr` (`tipo_pqr`),
  ADD KEY `id_visita` (`id_visita`),
  ADD KEY `id_solicitante` (`id_solicitante`);

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
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`id_solicitante`),
  ADD KEY `tipo_documento` (`tipo_documento`),
  ADD KEY `id_pqr` (`id_pqr`);

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
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_visita` (`estado_visita`),
  ADD KEY `cuenta_id` (`cuenta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_pqr`
--
ALTER TABLE `detalle_pqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado_visita`
--
ALTER TABLE `estado_visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  MODIFY `id_solicitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopqr`
--
ALTER TABLE `tipopqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  MODIFY `documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `pqr_ibfk_3` FOREIGN KEY (`tipo_pqr`) REFERENCES `tipopqr` (`id`),
  ADD CONSTRAINT `pqr_ibfk_4` FOREIGN KEY (`id_visita`) REFERENCES `visita` (`id`),
  ADD CONSTRAINT `pqr_ibfk_5` FOREIGN KEY (`id_solicitante`) REFERENCES `solicitante` (`id_solicitante`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta` (`id`);

--
-- Filtros para la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD CONSTRAINT `solicitante_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_documento` (`documento`);

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

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`estado_visita`) REFERENCES `estado_visita` (`id`),
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
