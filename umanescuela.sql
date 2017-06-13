-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 22:38:06
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `umanescuela`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCantMenuDia` (IN `fecha` DATE)  NO SQL
select count(*), menu.descripcion
from pedido 
inner join personas on personas.id=pedido.id_usuario 
inner join menu on menu.id_menu=pedido.id_menu
where pedido.fecha=fecha
and pedido.id_menu IN
(select pedido.id_menu
from pedido 
inner join personas on personas.id=pedido.id_usuario 
inner join menu on menu.id_menu=pedido.id_menu
where pedido.fecha=fecha)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDiasHabilitadosSinMenu` (IN `idPersona` INT(8) UNSIGNED)  NO SQL
SELECT * from dia where habilitado='1' and dia not in(select fecha from pedido where usuario=idPersona)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPedidosConUser` (IN `userId` INT(11))  NO SQL
select pedido.fecha,pedido.id_usuario,pedido.id_menu,personas.usuario,personas.apellido, personas.nombre,menu.descripcion,pedido.comentario,pedido.fecha_ingreso
from pedido 
inner join personas on personas.id=pedido.id_usuario 
inner join menu on menu.id_menu=pedido.id_menu
where pedido.id_usuario=userId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPedidosDia` (IN `fecha` DATE)  NO SQL
select pedido.fecha,pedido.id_usuario,pedido.id_menu,personas.usuario,personas.apellido, personas.nombre,menu.descripcion,pedido.comentario,pedido.fecha_ingreso, personas.curso
from pedido 
inner join personas on personas.id=pedido.id_usuario 
inner join menu on menu.id_menu=pedido.id_menu
where pedido.fecha=fecha$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPedidosDiaConTope` (IN `fecha` DATE, IN `fechaHoraMax` DATETIME)  NO SQL
select pedido.fecha,pedido.id_usuario,pedido.id_menu,personas.usuario,personas.apellido, personas.nombre,menu.descripcion,pedido.comentario,pedido.fecha_ingreso, personas.curso
from pedido 
inner join personas on personas.id=pedido.id_usuario 
inner join menu on menu.id_menu=pedido.id_menu
where pedido.fecha=fecha and pedido.fecha_ingreso<fechaHoraMax$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `fecha` date NOT NULL,
  `nombre_dia` text NOT NULL,
  `habilitado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`fecha`, `nombre_dia`, `habilitado`) VALUES
('2017-04-03', 'Lunes', 0),
('2017-04-04', 'Martes', 0),
('2017-04-05', 'Miércoles', 0),
('2017-04-06', 'Jueves', 0),
('2017-04-07', 'Viernes', 0),
('2017-04-10', 'Lunes', 0),
('2017-04-11', 'Martes', 0),
('2017-04-12', 'Miércoles', 0),
('2017-04-13', 'Jueves', 0),
('2017-04-14', 'Viernes', 0),
('2017-04-17', 'Lunes', 0),
('2017-04-18', 'Martes', 0),
('2017-04-19', 'Miércoles', 0),
('2017-04-20', 'Jueves', 0),
('2017-04-21', 'Viernes', 0),
('2017-04-24', 'Lunes', 0),
('2017-04-25', 'Martes', 0),
('2017-04-26', 'Miércoles', 0),
('2017-04-27', 'Jueves', 0),
('2017-04-28', 'Viernes', 0),
('2017-05-01', 'Lunes', 0),
('2017-05-02', 'Martes', 0),
('2017-05-03', 'Miércoles', 0),
('2017-05-04', 'Jueves', 0),
('2017-05-05', 'Viernes', 0),
('2017-05-08', 'Lunes', 0),
('2017-05-09', 'Martes', 0),
('2017-05-10', 'Miércoles', 0),
('2017-05-11', 'Jueves', 0),
('2017-05-12', 'Viernes', 0),
('2017-05-15', 'Lunes', 0),
('2017-05-16', 'Martes', 0),
('2017-05-17', 'Miércoles', 0),
('2017-05-18', 'Jueves', 0),
('2017-05-19', 'Viernes', 0),
('2017-05-22', 'Lunes', 0),
('2017-05-23', 'Martes', 0),
('2017-05-24', 'Miércoles', 0),
('2017-05-25', 'Jueves', 0),
('2017-05-26', 'Viernes', 0),
('2017-05-29', 'Lunes', 0),
('2017-05-30', 'Martes', 0),
('2017-05-31', 'Miércoles', 0),
('2017-06-01', 'Jueves', 0),
('2017-06-02', 'Viernes', 0),
('2017-06-05', 'Lunes', 0),
('2017-06-06', 'Martes', 0),
('2017-06-07', 'Miércoles', 0),
('2017-06-08', 'Jueves', 0),
('2017-06-09', 'Viernes', 0),
('2017-06-12', 'Lunes', 1),
('2017-06-13', 'Martes', 1),
('2017-06-14', 'Miércoles', 1),
('2017-06-15', 'Jueves', 1),
('2017-06-16', 'Viernes', 1),
('2017-06-19', 'Lunes', 0),
('2017-06-20', 'Martes', 0),
('2017-06-21', 'Miércoles', 0),
('2017-06-22', 'Jueves', 0),
('2017-06-23', 'Viernes', 0),
('2017-06-26', 'Lunes', 0),
('2017-06-27', 'Martes', 0),
('2017-06-28', 'Miércoles', 0),
('2017-06-29', 'Jueves', 0),
('2017-06-30', 'Viernes', 0),
('2017-07-03', 'Lunes', 0),
('2017-07-04', 'Martes', 0),
('2017-07-05', 'Miércoles', 0),
('2017-07-06', 'Jueves', 0),
('2017-07-07', 'Viernes', 0),
('2017-07-10', 'Lunes', 0),
('2017-07-11', 'Martes', 0),
('2017-07-12', 'Miércoles', 0),
('2017-07-13', 'Jueves', 0),
('2017-07-14', 'Viernes', 0),
('2017-07-17', 'Lunes', 0),
('2017-07-18', 'Martes', 0),
('2017-07-19', 'Miércoles', 0),
('2017-07-20', 'Jueves', 0),
('2017-07-21', 'Viernes', 0),
('2017-07-24', 'Lunes', 0),
('2017-07-25', 'Martes', 0),
('2017-07-26', 'Miércoles', 0),
('2017-07-27', 'Jueves', 0),
('2017-07-28', 'Viernes', 0),
('2017-07-31', 'Lunes', 0),
('2017-08-01', 'Martes', 0),
('2017-08-02', 'Miércoles', 0),
('2017-08-03', 'Jueves', 0),
('2017-08-04', 'Viernes', 0),
('2017-08-07', 'Lunes', 0),
('2017-08-08', 'Martes', 0),
('2017-08-09', 'Miércoles', 0),
('2017-08-10', 'Jueves', 0),
('2017-08-11', 'Viernes', 0),
('2017-08-14', 'Lunes', 0),
('2017-08-15', 'Martes', 0),
('2017-08-16', 'Miércoles', 0),
('2017-08-17', 'Jueves', 0),
('2017-08-18', 'Viernes', 0),
('2017-08-21', 'Lunes', 0),
('2017-08-22', 'Martes', 0),
('2017-08-23', 'Miércoles', 0),
('2017-08-24', 'Jueves', 0),
('2017-08-25', 'Viernes', 0),
('2017-08-28', 'Lunes', 0),
('2017-08-29', 'Martes', 0),
('2017-08-30', 'Miércoles', 0),
('2017-08-31', 'Jueves', 0),
('2017-09-01', 'Viernes', 0),
('2017-09-04', 'Lunes', 0),
('2017-09-05', 'Martes', 0),
('2017-09-06', 'Miércoles', 0),
('2017-09-07', 'Jueves', 0),
('2017-09-08', 'Viernes', 0),
('2017-09-11', 'Lunes', 0),
('2017-09-12', 'Martes', 0),
('2017-09-13', 'Miércoles', 0),
('2017-09-14', 'Jueves', 0),
('2017-09-15', 'Viernes', 0),
('2017-09-18', 'Lunes', 0),
('2017-09-19', 'Martes', 0),
('2017-09-20', 'Miércoles', 0),
('2017-09-21', 'Jueves', 0),
('2017-09-22', 'Viernes', 0),
('2017-09-25', 'Lunes', 0),
('2017-09-26', 'Martes', 0),
('2017-09-27', 'Miércoles', 0),
('2017-09-28', 'Jueves', 0),
('2017-09-29', 'Viernes', 0),
('2017-10-02', 'Lunes', 0),
('2017-10-03', 'Martes', 0),
('2017-10-04', 'Miércoles', 0),
('2017-10-05', 'Jueves', 0),
('2017-10-06', 'Viernes', 0),
('2017-10-09', 'Lunes', 0),
('2017-10-10', 'Martes', 0),
('2017-10-11', 'Miércoles', 0),
('2017-10-12', 'Jueves', 0),
('2017-10-13', 'Viernes', 0),
('2017-10-16', 'Lunes', 0),
('2017-10-17', 'Martes', 0),
('2017-10-18', 'Miércoles', 0),
('2017-10-19', 'Jueves', 0),
('2017-10-20', 'Viernes', 0),
('2017-10-23', 'Lunes', 0),
('2017-10-24', 'Martes', 0),
('2017-10-25', 'Miércoles', 0),
('2017-10-26', 'Jueves', 0),
('2017-10-27', 'Viernes', 0),
('2017-10-30', 'Lunes', 0),
('2017-10-31', 'Martes', 0),
('2017-11-01', 'Miércoles', 0),
('2017-11-02', 'Jueves', 0),
('2017-11-03', 'Viernes', 0),
('2017-11-06', 'Lunes', 0),
('2017-11-07', 'Martes', 0),
('2017-11-08', 'Miércoles', 0),
('2017-11-09', 'Jueves', 0),
('2017-11-10', 'Viernes', 0),
('2017-11-13', 'Lunes', 0),
('2017-11-14', 'Martes', 0),
('2017-11-15', 'Miércoles', 0),
('2017-11-16', 'Jueves', 0),
('2017-11-17', 'Viernes', 0),
('2017-11-20', 'Lunes', 0),
('2017-11-21', 'Martes', 0),
('2017-11-22', 'Miércoles', 0),
('2017-11-23', 'Jueves', 0),
('2017-11-24', 'Viernes', 0),
('2017-11-27', 'Lunes', 0),
('2017-11-28', 'Martes', 0),
('2017-11-29', 'Miércoles', 0),
('2017-11-30', 'Jueves', 0),
('2017-12-01', 'Viernes', 0),
('2017-12-04', 'Lunes', 0),
('2017-12-05', 'Martes', 0),
('2017-12-06', 'Miércoles', 0),
('2017-12-07', 'Jueves', 0),
('2017-12-08', 'Viernes', 0),
('2017-12-11', 'Lunes', 0),
('2017-12-12', 'Martes', 0),
('2017-12-13', 'Miércoles', 0),
('2017-12-14', 'Jueves', 0),
('2017-12-15', 'Viernes', 0),
('2017-12-18', 'Lunes', 0),
('2017-12-19', 'Martes', 0),
('2017-12-20', 'Miércoles', 0),
('2017-12-21', 'Jueves', 0),
('2017-12-22', 'Viernes', 0),
('2017-12-25', 'Lunes', 0),
('2017-12-26', 'Martes', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia-menu`
--

CREATE TABLE `dia-menu` (
  `fecha` date NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia-menu`
--

INSERT INTO `dia-menu` (`fecha`, `id_menu`) VALUES
('2017-04-07', 8),
('2017-04-07', 7),
('2017-04-03', 13),
('2017-04-04', 12),
('2017-04-04', 11),
('2017-04-04', 10),
('2017-04-05', 13),
('2017-04-03', 14),
('2017-04-05', 12),
('2017-04-06', 13),
('2017-04-06', 12),
('2017-04-05', 11),
('2017-04-04', 13),
('2017-04-06', 16),
('2017-04-06', 15),
('2017-04-03', 12),
('2017-04-03', 11),
('2017-04-03', 10),
('2017-04-05', 14),
('2017-06-12', 10),
('2017-06-12', 11),
('2017-06-12', 12),
('2017-06-12', 13),
('2017-06-12', 14),
('2017-06-12', 15),
('2017-06-12', 16),
('2017-06-12', 17),
('2017-06-13', 10),
('2017-06-13', 11),
('2017-06-13', 12),
('2017-06-14', 10),
('2017-06-14', 11),
('2017-06-14', 12),
('2017-06-14', 13),
('2017-06-14', 14),
('2017-06-15', 10),
('2017-06-15', 11),
('2017-06-15', 12),
('2017-06-15', 13),
('2017-06-15', 14),
('2017-06-16', 11),
('2017-06-16', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `descripcion`) VALUES
(10, 'Hamburguesa al plato con papas fritas o ensalada'),
(11, 'Hamburguesa en pan con tomate y huevo'),
(12, 'Milanesa al plato con papas fritas o ensalada'),
(13, 'Sandwich de milanesa con tomate y huevo'),
(14, 'Salchichas con papas fritas o ensalada'),
(15, 'Ensalada grande'),
(16, 'Lajmayin x3'),
(17, 'Empanadas de carne x 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `comentario` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_ingreso` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`fecha`, `id_usuario`, `id_menu`, `comentario`, `fecha_ingreso`) VALUES
('2017-04-05', 1, 9999, '', '2017-06-06 11:27:11'),
('2017-04-06', 1, 16, '', '2017-06-06 11:41:15'),
('2017-04-04', 1, 14, 'ensalada 3333', '2017-06-07 12:51:51'),
('2017-04-03', 1, 12, '', '2017-06-06 11:27:11'),
('2017-04-03', 3, 12, 'ensalada', '2017-05-30 16:56:34'),
('2017-04-04', 3, 13, 'tomate solo', '2017-05-30 16:56:34'),
('2017-04-05', 3, 14, '', '2017-05-30 16:56:34'),
('2017-04-06', 3, 12, '', '2017-05-30 16:56:34'),
('2017-04-03', 4, 12, 'fritas', '2017-05-30 16:57:13'),
('2017-04-04', 4, 10, '', '2017-05-30 16:57:13'),
('2017-04-05', 4, 14, '', '2017-05-30 16:57:13'),
('2017-04-06', 4, 12, '', '2017-05-30 16:57:13'),
('2017-04-03', 5, 12, 'fritassss', '2017-05-30 16:59:26'),
('2017-04-04', 5, 10, '', '2017-05-30 16:59:26'),
('2017-04-05', 5, 14, '', '2017-05-30 16:59:26'),
('2017-04-06', 5, 12, '', '2017-05-30 16:59:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `id_tipo_usuario` int(1) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` varchar(500) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `usuario`, `password`, `id_tipo_usuario`, `nombre`, `apellido`, `email`, `curso`) VALUES
(1, 'diego', 'diego', 2, 'Diego', 'Shocron', '', ''),
(2, 'admin', 'admin', 1, 'admin', '', '', ''),
(3, 'diego2', 'diego2', 2, 'diego', 'sho', 'diego', ''),
(4, 'diego3', 'diego3', 2, 'diego3', 'sho3', 'diego_3', ''),
(5, 'diego4', 'diego4', 2, 'diego4', 'sho4', 'diego_4', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`fecha`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`fecha`,`id_usuario`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
