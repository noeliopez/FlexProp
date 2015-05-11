-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2013 a las 09:40:41
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `demo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartelera`
--

CREATE TABLE IF NOT EXISTS `cartelera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cartelera`
--

INSERT INTO `cartelera` (`id`, `nombre`, `mensaje`, `fecha`) VALUES
(1, 'Noel', 'Hola', '25-09-1983'),
(2, 'Julio', 'Buenisimo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpropietario` int(11) DEFAULT NULL,
  `idagente` int(11) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `operacion` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `moneda` varchar(10) NOT NULL,
  `precio` float DEFAULT NULL,
  `hambientes` int(2) NOT NULL,
  `favorito` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `idpropietario`, `idagente`, `tipo`, `operacion`, `pais`, `provincia`, `localidad`, `direccion`, `latitud`, `longitud`, `moneda`, `precio`, `hambientes`, `favorito`, `activo`, `imgurl`) VALUES
(1, NULL, NULL, 'Casa', 'Venta', 'Argentina', 'Buenos Aires', 'Saenz Peña', 'Batallan 2834', '-34.6029577', '-58.532282899999984', 'U$D', 700000, 5, 0, 0, '6.JPG'),
(2, NULL, NULL, 'Departamento', 'Alquiler', 'Argentina', 'Buenos Aires', 'Saenz Peña', 'Av. America 641', '-34.6021379', '-58.52798569999999', 'U$D', 260035, 3, 0, 0, '4.jpg'),
(19, NULL, NULL, 'Casa', 'Venta', 'sd', 'da', 'das', 'as', '-34.6020766', '-58.52887399999997', 'U$D', 15000, 1500, 0, 0, '81.jpg'),
(12, NULL, NULL, 'Casa', 'Venta', 'Argentina', 'Seleccione su Estado', 'Buenos Aires', 'batallan 2834', '-34.6020766', '-58.52887399999997', 'U$D', 1, 1, 0, 0, '11.jpg'),
(13, NULL, NULL, 'Casa', 'Alquiler', 'Argentina', 'Buenos Aires', 'Caseros', 'Cavassa 2575', '-34.60584559999999', '-58.558892600000036', 'U$D', 150000, 5, 0, 0, '2.jpg'),
(8, NULL, NULL, 'Casa', 'Venta', 'Argentina', 'Buenos Aires', 'Santos Lugares', 'Langeri 2378', '-34.6020766', '-58.52887399999997', 'U$D', 500000, 7, 0, 0, '41.jpg'),
(15, NULL, NULL, 'Casa', 'Venta', 'Argentina', 'Buenos Aires', 'Saenz Peña', 'Posadas 457', '-34.6022563', '-58.52598969999997', 'U$D', 2500000, 3, 0, 0, '21.jpg'),
(17, NULL, NULL, 'Casa', 'Venta', 'argentina', 'buenos aires', 'mar del plata', 'Luro 1200', '-37.9561218', '-57.62992980000001', 'U$D', 15000, 3, 0, 0, '5.jpg'),
(18, NULL, NULL, 'Departamento', 'Alquiler', 'argentina', 'buenos aires', 'Saenz peña', 'Lage 705', '-34.5984022', '-58.53256239999996', '$', 1300, 1, 0, 0, '8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `ubash` varchar(45) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `horariodecontacto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `categoria`, `active`, `ubash`, `telefono`, `celular`, `mail`, `contraseña`, `horariodecontacto`) VALUES
(1, 'Raul', 'Demo', '2', NULL, NULL, '47122566', '1533333333', 'demo@demo.com', 'demo', 'Demondays a Fridays'),
(2, 'noel', 'perez', '1', 1, '12', '47122597', '1568482597', 'noeel.sp@hotmail.com', '151515', 'Miercoles y Viernes de 9 a 15hs.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
