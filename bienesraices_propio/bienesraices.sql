-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 22:08:35
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bienesraices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
`id` int(11) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish_ci,
  `habitaciones` int(6) DEFAULT NULL,
  `wc` int(6) DEFAULT NULL,
  `estacionamiento` int(6) DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedorId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(31, 'Casa en el bosque', '1200000.00', '3a0abea8215e199930749c7a95ad9f27.jpg', 'La mejor casa dentro de la naturaleza en la que podes disfrutar de todo el ambiente y todo ', 3, 1, 2, '2022-11-08', 2),
(34, 'Tu mansion', '9850000.00', '4ca933f9211ae9861e1d75444ba91691.jpg', 'La mas grande casa que hayas visto con muchas habitaciones. baÃ±os para todos y vas a vivir una vida muy feliz aqui en esta casa para toda la familia', 8, 3, 2, '2022-11-09', 1),
(35, 'Casa con triple garage', '690300.00', 'b406c009e03fb8355e32ace4399f24a0.jpg', 'Para que puedas guardar todos tus vehiculos', 1, 1, 3, '2022-11-09', 2),
(36, 'Departamento doble', '897555.00', 'ed540b1d75aaf1daa9873b6e20db4249.jpg', 'Dos departamentes muy buenos para alquilar', 6, 2, 1, '2022-11-09', 1),
(37, 'Residencia', '30000.00', '821202e4c77d4fa1220ccc4cb0cb5117.jpg', 'Alquiler para un estudiante', 1, 1, 1, '2022-11-09', 2),
(38, 'La mejor casa', '4502300.00', '180671056c2c64636a876f3bc25c0247.jpg', 'La mejor casa que vas a encontrar en esta ciudad, muy recomendada y buenos vecinos', 2, 1, 1, '2022-11-09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'marascofederico95@gmail.com', 'marasco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE IF NOT EXISTS `vendedores` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Federico', 'Marasco', '2396513939'),
(2, 'Valentina', 'Marasco', '2396513958');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
 ADD PRIMARY KEY (`id`), ADD KEY `vendedorId` (`vendedorId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
ADD CONSTRAINT `vendedor_FK` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
