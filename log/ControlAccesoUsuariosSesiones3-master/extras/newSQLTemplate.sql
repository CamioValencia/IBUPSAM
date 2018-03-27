-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2015 a las 17:29:44
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `dareyesm_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `idProfile` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameProfi` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idProfile`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`idProfile`, `nameProfi`) VALUES
(1, 'Admin'),
(2, 'Standard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loginUsers` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `passUsers` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idprofile` int(11) NOT NULL,
  `emailUser` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idActiveCode` longtext COLLATE utf8_spanish_ci,
  `path_imgUser` longtext COLLATE utf8_spanish_ci,
  `idexistindb` int(11) NOT NULL,
  `status` set('Disabled','Enabled') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `loginUsers`, `passUsers`, `idprofile`, `emailUser`, `idActiveCode`, `path_imgUser`, `idexistindb`, `status`) VALUES
(1, 'prueba', 'prueba', 1, 'none', 'none', 'none', 1, 'Enabled'),
(12, 'userNtest', '1234', 2, 'correo@correo.com', 'fq48mbohkecl2rfp5pae', 'http://localhost:8888/VIDEOTUTORIALES/PDO/users/public/images/12/N9ZNuSbQT0d5BP9_5N.jpg', 0, 'Enabled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `id_data` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `names` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bornin` date NOT NULL,
  `country` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idUsers` int(11) NOT NULL,
  PRIMARY KEY (`id_data`),
  KEY `fk1` (`idUsers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id_data`, `names`, `bornin`, `country`, `city`, `idUsers`) VALUES
(2, 'Lorenzo Lamas loca', '2015-08-21', 'MEXICO', 'ACAPULCO', 12);

