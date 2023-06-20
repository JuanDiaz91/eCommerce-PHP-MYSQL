-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2023 a las 22:28:54
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cambalache`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admon`
--

CREATE TABLE `admon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `baja` tinyint(4) NOT NULL,
  `login_dt` datetime NOT NULL,
  `baja_dt` datetime NOT NULL,
  `modificado_dt` datetime NOT NULL,
  `creado_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admon`
--

INSERT INTO `admon` (`id`, `nombre`, `correo`, `contraseña`, `status`, `baja`, `login_dt`, `baja_dt`, `modificado_dt`, `creado_dt`) VALUES
(3, 'Juanda', 'juandanieldiazmateos@gmail.com', '6fe644bda2e1f6a81599f6050edd519c032950e32aced9b182ebf5540af18cbacce43eb959b6e060531c6ffa50afddc439e9dc9ea3cfe1e816662136da8e7b3b', 1, 0, '2023-05-02 21:26:56', '2023-04-04 22:08:24', '2023-04-04 22:04:04', '2023-03-29 21:35:17'),
(4, 'Maria', 'mbmateos@hotmail.com', '0637107af52a1cef6a45565e42a255df9a58b57542e1ca42d7aa9638ac341d70ec45b4aa91f0aba94a9efb969d105b72c95dd7757bf709c1900b2cf573ab8ac6', 1, 1, '2023-04-28 16:24:54', '2023-05-02 21:27:44', '2023-05-02 21:27:36', '2023-04-28 16:24:23'),
(5, 'catherin', 'Catherine@gmail.com', '1e8b876ac882a448e8bb2f4fa85107b27a71d7ebe5f452cc929516c013b5a20c5a4d84a4c5bfcc8febeaf16706ebc68f50d8e9840a7ebaa284561bf8eb268427', 1, 1, '0000-00-00 00:00:00', '2023-04-30 12:15:20', '0000-00-00 00:00:00', '2023-04-30 12:15:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `estado`, `idUsuario`, `idProducto`, `cantidad`, `descuento`, `envio`, `fecha`) VALUES
(8, 1, 8, 6, '4.00', '5.00', '0.00', '2023-04-27 13:37:40'),
(9, 1, 8, 3, '1.00', '1.00', '0.00', '2023-04-27 14:19:41'),
(10, 1, 8, 9, '1.00', '2.00', '0.00', '2023-04-27 19:11:47'),
(11, 1, 8, 10, '1.00', '5.00', '0.00', '2023-04-27 19:11:47'),
(12, 1, 8, 18, '1.00', '1.00', '0.00', '2023-04-28 13:27:53'),
(13, 1, 8, 7, '1.00', '1.00', '0.00', '2023-04-28 13:27:53'),
(14, 1, 8, 11, '1.00', '1.00', '0.00', '2023-04-28 13:27:53'),
(15, 1, 8, 8, '1.00', '1.00', '0.00', '2023-04-28 13:32:55'),
(16, 1, 8, 19, '3.00', '2.00', '1.00', '2023-04-28 14:31:57'),
(17, 1, 8, 20, '1.00', '1.00', '0.00', '2023-04-28 14:35:50'),
(20, 1, 11, 39, '1.00', '0.00', '2.00', '2023-04-28 19:56:15'),
(24, 1, 8, 55, '1.00', '0.00', '1.00', '2023-04-30 18:32:56'),
(27, 1, 8, 24, '1.00', '0.00', '2.00', '2023-05-01 22:33:45'),
(31, 1, 12, 23, '1.00', '0.00', '2.00', '2023-05-02 21:26:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

CREATE TABLE `llaves` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `indice` int(11) NOT NULL,
  `cadena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`id`, `tipo`, `indice`, `cadena`) VALUES
(1, 'admonStatus', 0, 'Inactivo'),
(2, 'admonStatus', 1, 'Activo'),
(3, 'tipoProducto', 1, 'Bisutería'),
(4, 'tipoProducto', 2, 'Láminas'),
(5, 'tipoProducto', 3, 'Postales'),
(6, 'tipoProducto', 4, 'Sombreros'),
(7, 'tipoProducto', 5, 'Pantalones'),
(8, 'tipoProducto', 6, 'Vestidos'),
(9, 'tipoProducto', 7, 'Zapatos'),
(10, 'tipoProducto', 8, 'Blusas'),
(11, 'statusProducto', 0, 'Inactivo'),
(12, 'statusProducto', 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `relacion1` int(11) NOT NULL,
  `relacion2` int(11) NOT NULL,
  `relacion3` int(11) NOT NULL,
  `masvendido` char(1) NOT NULL,
  `nuevos` char(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `baja` tinyint(4) NOT NULL,
  `creado_dt` datetime NOT NULL,
  `modificado_dt` datetime NOT NULL,
  `baja_dt` datetime NOT NULL,
  `talla` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `tipo`, `nombre`, `descripcion`, `precio`, `descuento`, `envio`, `imagen`, `fecha`, `relacion1`, `relacion2`, `relacion3`, `masvendido`, `nuevos`, `status`, `baja`, `creado_dt`, `modificado_dt`, `baja_dt`, `talla`, `color`) VALUES
(21, '6', 'Safari verde', '&lt;p&gt;vestido corto sin mangas.&lt;/p&gt;', '10.00', '0.00', '2.00', 'safari-verde.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 1, '2023-04-28 17:13:48', '2023-05-02 21:28:45', '2023-05-02 21:28:54', '                   M            ', 'beige'),
(22, '6', 'enso&ntilde;aci&oacute;n', '&lt;p&gt;Vestido corto con escote palabra de honor&lt;/p&gt;', '15.00', '0.00', '2.00', 'ensonacion.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 0, '2023-04-28 17:18:01', '2023-04-28 18:13:47', '0000-00-00 00:00:00', '                   M            ', 'rosa oscuro'),
(23, '6', 'noche serena', '&lt;p&gt;Vestido corto con escote palabra de honor en tela brillante&lt;/p&gt;', '15.00', '0.00', '2.00', 'noche-serena.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 17:22:13', '2023-04-28 18:14:14', '0000-00-00 00:00:00', '                                        M        ', 'azul'),
(24, '6', 'selva', '&lt;p&gt;vestido largo de tirantes estampado con volantes&amp;nbsp;&lt;/p&gt;', '20.00', '0.00', '2.00', 'selva.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 17:26:57', '2023-04-28 18:11:42', '0000-00-00 00:00:00', '                    L            ', 'marrón'),
(25, '6', 'atardecer', '&lt;p&gt;vestido corto ajustado de manga corta con escote orlado con peque&ntilde;o volante&lt;/p&gt;', '10.00', '0.00', '2.00', 'atardecer.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 0, '2023-04-28 17:30:58', '2023-04-28 18:15:38', '0000-00-00 00:00:00', '                L                ', 'beige'),
(26, '8', 'camiseta', '&lt;p&gt;camiseta algod&oacute;n manga corta&lt;/p&gt;', '4.00', '0.00', '2.00', 'camiseta.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 17:33:42', '2023-04-28 18:16:11', '0000-00-00 00:00:00', '                 M               ', 'azul celeste'),
(27, '5', 'short', '&lt;p&gt;pantal&oacute;n corto vaquero&lt;/p&gt;', '8.00', '0.00', '2.00', 'short.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 17:35:46', '2023-04-28 18:16:58', '0000-00-00 00:00:00', '                    M            ', 'azul celeste'),
(28, '8', 'sprin', '&lt;p&gt;camiseta algod&oacute;n tirantes&amp;nbsp;&lt;/p&gt;', '4.00', '0.00', '2.00', 'sprin.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 17:39:16', '2023-04-28 18:17:51', '0000-00-00 00:00:00', '                L                ', 'beige'),
(29, '5', 'short', '&lt;p&gt;pantal&oacute;n vaquero corto&lt;/p&gt;', '7.00', '0.00', '2.00', 'short.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 1, '2023-04-28 17:42:07', '2023-04-28 18:19:27', '2023-04-28 18:26:51', '                                  M              ', 'caqui'),
(30, '8', 'primavera', '&lt;p&gt;camiseta algod&oacute;n manga corta estampada&lt;/p&gt;', '4.00', '0.00', '2.00', 'primavera.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 17:47:12', '2023-04-28 18:21:11', '0000-00-00 00:00:00', '                   L             ', 'azul celeste'),
(31, '5', 'cara y cruz', '&lt;p&gt;pantal&oacute;n corto vaquero con lentejuelas&lt;/p&gt;', '8.00', '0.00', '2.00', 'cara-y-cruz.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 0, '2023-04-28 17:49:59', '2023-04-28 18:21:43', '0000-00-00 00:00:00', '                 M               ', 'azul celeste'),
(32, '4', 'tocado azul', '&lt;p&gt;tocado con flor esterilla y plumas&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-azul.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:03:24', '2023-04-28 18:30:19', '0000-00-00 00:00:00', '                                             ', 'azul claro'),
(33, '4', 'tocado pam', '&lt;p&gt;tocado color caldera&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-pam.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 18:06:01', '2023-04-28 18:31:36', '0000-00-00 00:00:00', '                                                ', ''),
(34, '4', 'tocado blue', '&lt;p&gt;tocado azul&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-blue.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:07:32', '2023-04-28 18:32:26', '0000-00-00 00:00:00', '                                ', ''),
(35, '4', 'tocado green', '&lt;p&gt;tocado verde&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-green.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 0, '2023-04-28 18:09:41', '2023-04-28 18:33:08', '0000-00-00 00:00:00', '                                                ', ''),
(36, '4', 'tocado grey', '&lt;p&gt;tocado gris oscuro&lt;/p&gt;', '3.00', '0.00', '2.00', 'tocado-grey.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:35:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(37, '4', 'tocado acua', '&lt;p&gt;tocado de sombrerillo verde agua&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-acua.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:37:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(38, '4', 'tocado lazo', '&lt;p&gt;tocado rosa palo&lt;/p&gt;', '3.00', '0.00', '2.00', 'tocado-lazo.jpg', '2023-04-28', 0, 0, 0, '0', '1', 1, 0, '2023-04-28 18:39:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(39, '4', 'tocado flor', '&lt;p&gt;tocado flor azul&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-flor.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:40:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(40, '5', 'ba&ntilde;ador surf 1', '&lt;p&gt;ba&ntilde;ador largo de secado r&aacute;pido&lt;/p&gt;', '5.00', '0.00', '2.00', 'banador-surf-1.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 18:44:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '  L              ', 'azulón'),
(41, '5', 'ba&ntilde;ador surf 2', '&lt;p&gt;ba&ntilde;ador largo secado r&aacute;pido&lt;/p&gt;', '5.00', '0.00', '2.00', 'banador-surf-2.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:47:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'M                ', 'multicolor'),
(42, '5', 'ba&ntilde;ador surf 3', '&lt;p&gt;ba&ntilde;ador largo de secado r&aacute;pido&lt;/p&gt;', '5.00', '0.00', '2.00', 'banador-surf-3.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 18:49:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' L               ', 'blanco y negro'),
(43, '5', 'pantal&oacute;n skate', '&lt;p&gt;pantal&oacute;n semilargo vaquero&lt;/p&gt;', '8.00', '0.00', '2.00', 'pantalon-skate.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 18:57:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'L                ', 'negro'),
(44, '5', 'vaqueros', '&lt;p&gt;pantal&oacute;n vaquero largo&amp;nbsp;&lt;/p&gt;', '8.00', '0.00', '2.00', 'vaqueros.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:00:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '    M            ', 'negro'),
(45, '5', 'fondillero', '&lt;p&gt;pantal&oacute;n vaquero de fondillos&lt;/p&gt;', '8.00', '0.00', '2.00', 'fondillero.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:03:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'L                ', 'gris'),
(46, '8', 'oriental', '&lt;p&gt;blusa en seda artificial estampada&lt;/p&gt;', '5.00', '0.00', '2.00', 'oriental.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:06:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' S               ', 'azul y blanco'),
(47, '6', 'flamenca', '&lt;p&gt;traje de flamenca forrado entallado&lt;/p&gt;', '15.00', '0.00', '2.00', 'flamenca.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:09:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'L                ', 'rojo'),
(48, '6', 'flamenca 1', '&lt;p&gt;Traje de flamenca sin mangas estampado&lt;/p&gt;', '15.00', '0.00', '2.00', 'flamenca-1.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:11:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'L                ', 'estampado sobre fondo blanco'),
(49, '6', 'flamenca 2', '&lt;p&gt;vestido flamenca vaporoso ajustado&lt;/p&gt;', '15.00', '0.00', '2.00', 'flamenca-2.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:14:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' L               ', 'azul celeste'),
(50, '1', 'cartera', '&lt;p&gt;cartera color melocot&oacute;n&lt;/p&gt;', '5.00', '0.00', '2.00', 'cartera.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:30:09', '2023-04-28 19:32:11', '0000-00-00 00:00:00', '                                ', ''),
(51, '1', 'cartera 1', '&lt;p&gt;cartera rafia crudo&lt;/p&gt;', '5.00', '0.00', '2.00', 'cartera-1.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:31:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(52, '1', 'cartera 2 y 3', '&lt;p&gt;dos carteras al precio de una naranja y burdeos&lt;/p&gt;', '8.00', '0.00', '2.00', 'cartera-2-y-3.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:34:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(53, '1', 'cartera 4', '&lt;p&gt;cartera azul azafata&lt;/p&gt;', '5.00', '0.00', '2.00', 'cartera-4.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:38:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(54, '3', 'Ferrys', '&lt;p&gt;dise&ntilde;ada por el pintor ayamontino Manuel Feria&lt;/p&gt;', '1.00', '0.00', '1.00', 'ferrys.jpg', '2023-04-28', 0, 0, 0, '1', '0', 1, 0, '2023-04-28 19:47:15', '2023-04-28 19:50:47', '0000-00-00 00:00:00', '                                ', ''),
(55, '3', 'D&aacute;rsena ', '&lt;p&gt;dise&ntilde;o del pintor ayamontino Manuel Feria&lt;/p&gt;', '1.00', '0.00', '1.00', 'darsena-.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:48:31', '2023-04-28 19:51:36', '0000-00-00 00:00:00', '                                ', ''),
(56, '3', 'boya', '&lt;p&gt;dise&ntilde;o del pintor ayamontino Manuel Feria&lt;/p&gt;', '1.00', '0.00', '1.00', 'boya.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:49:50', '2023-04-28 19:52:01', '0000-00-00 00:00:00', '                                ', ''),
(57, '3', 'calle Rompeculos', '&lt;p&gt;dise&ntilde;o del pintor ayamontino Manuel Feria&lt;/p&gt;', '1.00', '0.00', '1.00', 'calle-rompeculos.jpg', '2023-04-28', 0, 0, 0, '0', '0', 1, 0, '2023-04-28 19:54:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                ', ''),
(58, '4', 'tocado boda', '&lt;p&gt;tocado para boda&lt;/p&gt;', '5.00', '0.00', '2.00', 'tocado-boda.jpg', '2023-05-01', 0, 0, 0, '0', '0', 1, 0, '2023-05-01 11:45:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `codpos` varchar(10) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `primerApellido`, `segundoApellido`, `email`, `direccion`, `ciudad`, `provincia`, `codpos`, `pais`, `contraseña`) VALUES
(8, 'Juan', 'Díaz', 'Mateos', 'juandanieldiazmateos@gmail.com', 'Benavente, 12', 'Ayamonte', 'Huelva', '21400', 'España', 'bb6e55f235326d53e31533c0d8caaf67faa688af9b347db85066334157d7b7ef98d4f60a9be13bfe37f56998ab8e0549e6ff17723458f231689c7e4f348e1bfb'),
(9, 'Alicia  ', 'Mesa', 'García', 'aliciamega.09a@gmail.com', 'bollullos del condado', 'Ayamonte', 'Huelva', '21400', 'España', 'bb6e55f235326d53e31533c0d8caaf67faa688af9b347db85066334157d7b7ef98d4f60a9be13bfe37f56998ab8e0549e6ff17723458f231689c7e4f348e1bfb'),
(10, 'alberto', 'alfonso', 'moreno', 'albertosalxi@hotmail.com', 'barriada san roque 17', 'villablanca', 'huelva', '21590', 'españa', '6c89c7076b773c421a29fab30742b82ada53fa08b81d0a6ebed3539649136866696d86c46fc313a0e8948ffc682fecb8b3ae679bb1a9546edcaedce5fd0acaf7'),
(11, 'Maria Bella', 'Mateos', 'Povea', 'mbmateos@hotmail.com', 'Benavente, 12', 'Ayamonte', 'Huelva', '21400', 'España', '0637107af52a1cef6a45565e42a255df9a58b57542e1ca42d7aa9638ac341d70ec45b4aa91f0aba94a9efb969d105b72c95dd7757bf709c1900b2cf573ab8ac6'),
(12, 'Juan', 'Díaz', 'Mateos', 'juanito_dm11@hotmail.com', 'Benavente, 12', 'Ayamonte', 'Huelva', '21400', 'España', 'bb6e55f235326d53e31533c0d8caaf67faa688af9b347db85066334157d7b7ef98d4f60a9be13bfe37f56998ab8e0549e6ff17723458f231689c7e4f348e1bfb');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admon`
--
ALTER TABLE `admon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `llaves`
--
ALTER TABLE `llaves`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admon`
--
ALTER TABLE `admon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `llaves`
--
ALTER TABLE `llaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
