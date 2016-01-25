-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2016 a las 10:55:38
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_mycontacts`
--
CREATE DATABASE IF NOT EXISTS `bd_mycontacts` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactos`
--

CREATE TABLE IF NOT EXISTS `tbl_contactos` (
`id_contacto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(15) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(15) COLLATE utf8_bin NOT NULL,
  `mail` varchar(20) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(15) COLLATE utf8_bin NOT NULL,
  `telefono` int(9) NOT NULL,
  `ubicacion1` int(11) DEFAULT NULL,
  `ubicacion2` int(11) DEFAULT NULL,
  `foto` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ubicacion`
--

CREATE TABLE IF NOT EXISTS `tbl_ubicacion` (
`id_ubicacion` int(11) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(15) COLLATE utf8_bin NOT NULL,
  `mail` varchar(25) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefono` int(9) NOT NULL,
  `ubicacion1` int(11) DEFAULT NULL,
  `ubicacion2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
 ADD PRIMARY KEY (`id_contacto`), ADD KEY `id_usuario` (`id_usuario`,`ubicacion1`,`ubicacion2`), ADD KEY `ubicacion1` (`ubicacion1`), ADD KEY `ubicacion2` (`ubicacion2`);

--
-- Indices de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
 ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `ubicacion1` (`ubicacion1`,`ubicacion2`), ADD KEY `ubicacion2` (`ubicacion2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
ADD CONSTRAINT `tbl_contactos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`),
ADD CONSTRAINT `tbl_contactos_ibfk_2` FOREIGN KEY (`ubicacion1`) REFERENCES `tbl_ubicacion` (`id_ubicacion`),
ADD CONSTRAINT `tbl_contactos_ibfk_3` FOREIGN KEY (`ubicacion2`) REFERENCES `tbl_ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`ubicacion1`) REFERENCES `tbl_ubicacion` (`id_ubicacion`),
ADD CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`ubicacion2`) REFERENCES `tbl_ubicacion` (`id_ubicacion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
