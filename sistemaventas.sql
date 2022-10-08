-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-10-2020 a las 22:59:34
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Running', '2020-07-27 01:08:05'),
(2, 'Urbano', '2020-07-27 01:08:29'),
(3, 'Training', '2020-07-27 01:08:43'),
(4, 'TENNIS', '2020-07-31 03:37:17'),
(5, 'outdoor', '2020-07-31 03:37:24'),
(6, 'FUTBOL', '2020-07-31 03:37:32'),
(7, 'BASQUETBALL', '2020-07-31 03:37:39'),
(8, 'RUGBY', '2020-07-31 03:37:45'),
(9, 'HANDBALL', '2020-07-31 03:37:55'),
(10, 'GOLF', '2020-07-31 03:38:08'),
(11, 'INDOOR', '2020-07-31 03:38:15'),
(12, 'NATACIÓN', '2020-07-31 03:38:21'),
(60, 'Zapatilla Prueba', '2020-08-04 02:48:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `compras` int(11) DEFAULT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `compras`, `ultima_compra`, `fecha`) VALUES
(15, 'Pedro', 56566666, 'pedro@gmail.com', '(66) 6666-6666', 'Boedo 232', 14, '2020-10-02 23:40:53', '2020-07-20 15:40:52'),
(21, 'fernandito', 23232, 'dfsdf@fdfd.com.ar', '(11) 1234-3432', 'fdsf', 9, '2020-10-04 15:03:33', '2020-08-06 02:28:35'),
(23, 'Billy Garibotti', 12121, 'billy@gmail.com', '(12) 4343-4343', 'xxx 1265', 8, '2020-10-02 23:40:13', '2020-08-30 17:57:24'),
(24, 'Maria Fernadez', 32445656, 'msamdas@gamil.com', '(11) 1111-1111', 'saraza 22', 1, '2020-10-02 23:26:31', '2020-09-25 14:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `codigo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_id_Categorias` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'ZAPATILLAS UNDER ARMOUR CHARGED ', 'vistas/imagenes/productos/101/425.jpg', 48, 1000, 1200, 2, '2020-10-04 18:03:33'),
(2, 1, '102', 'Zapatillas Under Armour Hovr Infinite', 'vistas/imagenes/productos/102/428.jpg', 148, 4500, 9000, 1, '2020-10-02 17:08:07'),
(3, 1, '103', 'Zapatillas Puma Jaro Knit', 'vistas/imagenes/productos/103/531.jpg', 154, 5000, 6000, 1, '2020-10-02 17:08:39'),
(4, 1, '104', 'Zapatillas Puma Rupture', 'vistas/imagenes/productos/104/117.jpg', 6, 9000, 12600, 4, '2020-10-02 17:08:39'),
(5, 1, '105', 'Zapatillas adidas Phosphere', 'vistas/imagenes/productos/105/963.jpg', 26, 12000, 16800, 1, '2020-10-02 17:08:40'),
(6, 1, '106', 'Zapatillas adidas Nova Flow', 'vistas/imagenes/productos/106/458.jpg', 30, 12000, 16800, 0, '2020-09-27 18:53:53'),
(7, 1, '107', 'Zapatillas Nike Odyssey React', 'vistas/imagenes/productos/107/678.jpg', 10, 9500, 13300, 0, '2020-09-27 18:54:07'),
(8, 1, '108', 'Zapatillas Nike Zoom Winflo 6', 'vistas/imagenes/productos/108/895.jpg', 18, 7800, 10920, 0, '2020-09-27 18:54:25'),
(9, 1, '109', 'Zapatillas adidas Pulseboost HD', 'vistas/imagenes/productos/109/564.jpg', 65, 11000, 15400, 0, '2020-09-27 18:56:32'),
(10, 1, '110', 'Zapatillas Nike Zoom Rival Fly', 'vistas/imagenes/productos/110/212.jpg', 10, 7800, 11000, 0, '2020-09-27 18:56:53'),
(11, 1, '111', 'Zapatillas adidas Edge Gameday', 'vistas/imagenes/productos/111/500.jpg', 19, 7500, 9000, 0, '2020-08-08 17:51:03'),
(12, 1, '112', 'Zapatillas Reebok Royal Pervad', 'vistas/imagenes/productos/112/821.jpg', 11, 7500, 13500, 0, '2020-08-08 17:51:33'),
(13, 1, '113', 'Zapatillas adidas Energyfalcon', 'vistas/imagenes/productos/113/463.jpg', 0, 0, 0, 0, '2020-08-08 17:39:01'),
(14, 1, '114', 'Zapatillas Fila Racer Knit ', 'vistas/imagenes/productos/114/620.jpg', 0, 0, 0, 0, '2020-08-08 17:40:18'),
(15, 1, '115', 'Zapatillas Fila FR 97 Energized', 'vistas/imagenes/productos/115/955.jpg', 0, 0, 0, 0, '2020-08-08 17:41:05'),
(16, 2, '201', 'Zapatillas Nike Path Winter', 'vistas/imagenes/productos/201/655.jpg', 0, 0, 0, 0, '2020-08-08 17:42:42'),
(17, 2, '202', 'Zapatillas Puma BMW Wired Cage', 'vistas/imagenes/productos/202/102.jpg', 0, 0, 0, 0, '2020-08-08 17:43:23'),
(18, 2, '203', 'Zapatillas Topper Chalpa', 'vistas/imagenes/productos/203/432.jpg', 0, 0, 0, 0, '2020-08-08 17:47:43'),
(19, 2, '204', 'Zapatillas Nike Air Max Command', 'vistas/imagenes/productos/204/535.jpg', 0, 0, 0, 0, '2020-08-08 17:49:30'),
(20, 2, '205', 'Zapatillas Nike Flight Legacy', 'vistas/imagenes/productos/205/959.jpg', 0, 0, 0, 0, '2020-08-08 17:50:17'),
(21, 2, '206', 'Zapatillas Reebok Royal Pervader', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(22, 2, '207', 'Zapatillas adidas Advantage', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(23, 2, '208', 'ZAPATILLAS PUMA ELECTRON STREET', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(24, 2, '209', 'Zapatillas Nike Explore Strada', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(25, 2, '210', 'Zapatillas Nike Nightgazer', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(26, 3, '301', 'Zapatillas Under Armour Hovr Apex', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(27, 3, '302', 'Zapatillas Reebok Flexagon Energy TR', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(28, 3, '303', 'Zapatillas Under Armour Hovr', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(29, 3, '304', 'Zapatillas Puma LQDCELL Hydra', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(30, 3, '305', 'Zapatillas Fila Discovery Masc', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(31, 3, '306', 'Zapatillas Nike Renew Rival 2', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(32, 3, '307', 'Zapatillas Under Armour Project Rock', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(33, 3, '308', 'Zapatillas Nike Free Trainer V8', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(34, 3, '309', 'Zapatillas Nike Legend React', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(35, 3, '310', 'Zapatillas Under Armour HOVR SLK', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(36, 4, '401', 'Zapatillas Topper X Forcer', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(37, 4, '402', 'Zapatillas Fila Lugano ', '', 0, 0, 0, 0, '2020-07-30 03:04:26'),
(38, 4, '403', 'Zapatillas Nike Court Lite 2', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(39, 4, '404', 'Zapatillas adidas Courtsmash', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(40, 4, '405', 'Zapatillas Fila Ot Pro Clay', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(41, 4, '406', 'Zapatillas Fila Top Spin 3', '', 0, 0, 0, 0, '2020-07-30 03:07:00'),
(42, 4, '407', '', '', 0, 0, 0, 0, '2020-07-30 03:16:49'),
(43, 4, '408', 'Zapatillas Nike Court Lite 2', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(44, 4, '409', 'Zapatillas adidas Courtsmash', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(45, 5, '501', 'Zapatillas Fila Overtech', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(46, 5, '502', 'Zapatillas Fila Overtech evo', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(47, 5, '503', 'Zapatillas adidas Terrex AX 3', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(48, 6, '601', 'Botines Nike Phantom Venom', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(49, 6, '602', 'Botines Nike Mercurial Vapor 13', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(50, 6, '603', 'Botines adidas Copa 20 FG', '', 0, 0, 0, 0, '2020-07-30 03:08:13'),
(51, 6, '604', 'Botines adidas Predator 20 FG', '', 0, 0, 0, 0, '2020-07-30 03:08:27'),
(52, 6, '605', 'Botines adidas Copa 20 TF', '', 0, 0, 0, 0, '2020-07-30 03:08:46'),
(53, 6, '606', 'Botines Nike Vapor 13 Elite FG', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(54, 6, '607', 'Botines adidas Predator 20.4 FG', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(55, 6, '608', 'Botines adidas Predator 20.4 TF', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(56, 6, '609', 'Botines Puma Future 5.4 TT', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(57, 6, '610', 'Botines adidas Nemeziz 19.1 FG', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(58, 7, '701', 'Zapatillas Nike Jordan Proto-Lyte', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(59, 7, '702', 'Zapatillas Nike Jordan Zoom Zero', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(60, 7, '703', 'Zapatillas Nike Air Max Infuriate III Low', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(61, 7, '704', 'Zapatillas Under Armour Spawn 2', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(62, 7, '705', 'Zapatillas Under Armour Curry 7', '', 0, 0, 0, 0, '2020-07-28 18:32:08'),
(63, 7, '706', 'Zapatillas Nike Kyrie Flytrap', 'vistas/imagenes/productos/706/806.jpg', 30, 12000, 16800, 0, '2020-10-02 23:34:21'),
(64, 7, '707', 'Zapatillas Nike Air Versatile III', 'vistas/imagenes/productos/707/313.jpg', 45, 15000, 21000, 0, '2020-10-02 23:33:33'),
(65, 8, '801', 'Botines adidas Kakari SG', 'vistas/imagenes/productos/801/533.jpg', 20, 20000, 28000, 0, '2020-10-02 23:32:18'),
(66, 8, '802', 'Botines Puma Evopower Vigor', 'vistas/imagenes/productos/802/208.jpg', 20, 16000, 22400, 0, '2020-10-02 23:31:42'),
(67, 8, '803', 'Botines Gilbert Kaizen Power 8 Stud Rugby', 'vistas/imagenes/productos/803/812.jpg', 39, 16000, 22400, 1, '2020-10-03 02:40:53'),
(68, 8, '804', 'Botines Gilbert Boot Shiro MSX', 'vistas/imagenes/productos/804/756.jpg', 25, 16000, 22400, 12, '2020-10-03 02:40:53'),
(69, 8, '805', 'Botines Gilbert Shiro Pro 6 Stud Rugby', 'vistas/imagenes/productos/805/442.jpg', 0, 15000, 21000, 0, '2020-10-02 23:29:48'),
(70, 9, '901', 'Zapatillas adidas Essence', 'vistas/imagenes/productos/901/724.jpg', 0, 15000, 21000, 0, '2020-10-02 23:28:56'),
(71, 10, '1001', 'Zapatillas Under Armour AG Medal SL', 'vistas/imagenes/productos/1001/890.jpg', 36, 95000, 133000, 3, '2020-10-03 02:35:59'),
(72, 10, '1002', 'Zapatillas Under Armour HOVR Fade', 'vistas/imagenes/productos/1002/371.jpg', 8991, 9000, 12600, 7, '2020-10-03 02:40:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT current_timestamp(),
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(46, 'pepe', 'pepe', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 'Administrador', 'vistas/imagenes/usuarios/pepe/323.png', 1, '2020-06-30 23:45:49', '2020-07-01 02:45:49'),
(49, 'miguelitou', 'miguelito', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 'Vendedor', 'vistas/imagenes/usuarios/miguelito/534.png', 1, '2020-07-05 23:26:22', '2020-07-06 02:26:22'),
(57, 'usuarioDeprueba', 'usuarioPrueba', '123456', 'Vendedor', '', NULL, '2020-08-13 00:00:03', '2020-08-13 03:00:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_id_cliente` (`id_cliente`),
  KEY `FK_id_vendedor` (`id_vendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(22, 10001, 15, 46, '[{\"id\":\" 1  \",\"descripcion\":\"ZAPATILLAS UNDER ARMOUR CHARGED \",\"cantidad\":\"1\",\"stock\":\"49\",\"precio\":\"1200\",\"total\":\"1200\",\"metodo_pago\":\"Efectivo\"},{\"id\":\" 2  \",\"descripcion\":\"Zapatillas Under Armour Hovr Infinite\",\"cantidad\":\"1\",\"stock\":\"148\",\"precio\":\"9000\",\"total\":\"9000\",\"metodo_pago\":\"Efectivo\"}]', 2142, 10200, 12342, 'Efectivo', '2020-10-02 17:08:07'),
(23, 10002, 21, 46, '[{\"id\":\" 3  \",\"descripcion\":\"Zapatillas Puma Jaro Knit\",\"cantidad\":\"1\",\"stock\":\"154\",\"precio\":\"6000\",\"total\":\"6000\",\"metodo_pago\":\"TC\"},{\"id\":\" 4  \",\"descripcion\":\"Zapatillas Puma Rupture\",\"cantidad\":\"4\",\"stock\":\"6\",\"precio\":\"12600\",\"total\":\"50400\",\"metodo_pago\":\"TC\"},{\"id\":\" 5  \",\"descripcion\":\"Zapatillas adidas Phosphere\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"16800\",\"total\":\"16800\",\"metodo_pago\":\"TC\"}]', 18300, 73200, 91500, 'TC', '2020-10-02 17:08:40'),
(24, 10003, 24, 46, '[{\"id\":\" 72  \",\"descripcion\":\"Zapatillas Under Armour HOVR Fade\",\"cantidad\":\"1\",\"stock\":\"8999\",\"precio\":\"12600\",\"total\":\"12600\",\"metodo_pago\":\"Efectivo\"}]', 2520, 12600, 15120, 'Efectivo', '2020-10-03 02:26:31'),
(25, 10004, 15, 46, '[{\"id\":\" 72  \",\"descripcion\":\"Zapatillas Under Armour HOVR Fade\",\"cantidad\":\"2\",\"stock\":\"8996\",\"precio\":\"12600\",\"total\":\"25200\",\"metodo_pago\":\"TC\"}]', 5040, 25200, 30240, 'TC', '2020-10-03 02:29:35'),
(26, 10005, 23, 46, '[{\"id\":\" 68  \",\"descripcion\":\"Botines Gilbert Boot Shiro MSX\",\"cantidad\":\"3\",\"stock\":\"36\",\"precio\":\"22400\",\"total\":\"67200\",\"metodo_pago\":\"Efectivo\"},{\"id\":\" 71  \",\"descripcion\":\"Zapatillas Under Armour AG Medal SL\",\"cantidad\":\"3\",\"stock\":\"36\",\"precio\":\"133000\",\"total\":\"399000\",\"metodo_pago\":\"Efectivo\"}]', 93240, 466200, 559440, 'Efectivo', '2020-10-03 02:36:00'),
(27, 10006, 21, 46, '[{\"id\":\" 72  \",\"descripcion\":\"Zapatillas Under Armour HOVR Fade\",\"cantidad\":\"1\",\"stock\":\"8995\",\"precio\":\"12600\",\"total\":\"12600\",\"metodo_pago\":\"TC\"}]', 2520, 12600, 15120, 'TC', '2020-10-03 02:36:38'),
(28, 10007, 15, 46, '[{\"id\":\" 68  \",\"descripcion\":\"Botines Gilbert Boot Shiro MSX\",\"cantidad\":\"4\",\"stock\":\"31\",\"precio\":\"22400\",\"total\":\"89600\",\"metodo_pago\":\"Efectivo\"}]', 17920, 89600, 107520, 'Efectivo', '2020-10-03 02:37:10'),
(29, 10008, 15, 46, '[{\"id\":\" 68  \",\"descripcion\":\"Botines Gilbert Boot Shiro MSX\",\"cantidad\":\"3\",\"stock\":\"27\",\"precio\":\"22400\",\"total\":\"67200\",\"metodo_pago\":\"Efectivo\"}]', 14112, 67200, 81312, 'Efectivo', '2020-10-03 02:38:22'),
(30, 10009, 21, 46, '[{\"id\":\" 68  \",\"descripcion\":\"Botines Gilbert Boot Shiro MSX\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"22400\",\"total\":\"22400\",\"metodo_pago\":\"TC\"}]', 2240, 22400, 24640, 'TC', '2020-10-03 02:39:08'),
(31, 10010, 15, 46, '[{\"id\":\" 72  \",\"descripcion\":\"Zapatillas Under Armour HOVR Fade\",\"cantidad\":\"1\",\"stock\":\"8994\",\"precio\":\"12600\",\"total\":\"12600\",\"metodo_pago\":\"Efectivo\"}]', 2646, 12600, 15246, 'Efectivo', '2020-10-03 02:39:46'),
(32, 10011, 23, 46, '[{\"id\":\" 72  \",\"descripcion\":\"Zapatillas Under Armour HOVR Fade\",\"cantidad\":\"2\",\"stock\":\"8991\",\"precio\":\"12600\",\"total\":\"25200\",\"metodo_pago\":\"Efectivo\"}]', 5040, 25200, 30240, 'Efectivo', '2020-10-03 02:40:13'),
(33, 10012, 15, 46, '[{\"id\":\" 68  \",\"descripcion\":\"Botines Gilbert Boot Shiro MSX\",\"cantidad\":\"1\",\"stock\":\"25\",\"precio\":\"22400\",\"total\":\"22400\",\"metodo_pago\":\"Efectivo\"},{\"id\":\" 67  \",\"descripcion\":\"Botines Gilbert Kaizen Power 8 Stud Rugby\",\"cantidad\":\"1\",\"stock\":\"39\",\"precio\":\"22400\",\"total\":\"22400\",\"metodo_pago\":\"Efectivo\"}]', 14336, 44800, 59136, 'Efectivo', '2020-10-03 02:40:53'),
(34, 10013, 21, 46, '[{\"id\":\" 1  \",\"descripcion\":\"ZAPATILLAS UNDER ARMOUR CHARGED \",\"cantidad\":\"1\",\"stock\":\"48\",\"precio\":\"1200\",\"total\":\"1200\"}]', 252, 1200, 1452, 'Eectivo', '2020-10-04 18:03:33');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
