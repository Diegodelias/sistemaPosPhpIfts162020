-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-10-2022 a las 02:24:35
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.4.0

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
  `ultima_compra` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `compras`, `ultima_compra`, `fecha`) VALUES
(25, 'cliente1', 4534543, 'cliente1@gmail.com', '(12) 4343-2423', 'direccion prueba', 7, '2022-10-07 23:05:55', '2020-10-25 23:01:28'),
(26, 'cliente2', 2656666, 'cliente2@gmail.com', '(65) 6565-6565', 'cadorna 4343', 0, '0000-00-00 00:00:00', '2020-10-25 23:02:09'),
(29, 'pepe', 12345, 'pepe@gmail.com', '(11) 1111-1111', 'direccion 122', NULL, NULL, '2022-10-08 02:04:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'ZAPATILLAS UNDER ARMOUR CHARGED ', 'vistas/imagenes/productos/101/425.jpg', 59, 1000, 1200, 3, '2022-10-08 02:05:55'),
(2, 1, '102', 'Zapatillas Under Armour Hovr Infinite', 'vistas/imagenes/productos/102/428.jpg', 156, 4500, 9000, 3, '2022-10-08 02:05:55'),
(3, 1, '103', 'Zapatillas Puma Jaro Knit', 'vistas/imagenes/productos/103/531.jpg', 157, 5000, 6000, 0, '2020-11-08 14:52:50'),
(4, 1, '104', 'Zapatillas Puma Rupture', 'vistas/imagenes/productos/104/117.jpg', 6, 9000, 12600, 1, '2022-10-08 02:05:55'),
(5, 1, '105', 'Zapatillas adidas Phosphere', 'vistas/imagenes/productos/105/963.jpg', 26, 12000, 16800, 0, '2020-11-10 19:52:02'),
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
(71, 10, '1001', 'Zapatillas Under Armour AG Medal SL', 'vistas/imagenes/productos/1001/412.jpg', 36, 95000, 133000, 3, '2020-10-05 20:07:16'),
(94, 2, '211', 'pata rana', 'vistas/imagenes/productos/default.png', 10, 5000, 7000, NULL, '2020-11-10 22:17:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(46, 'pepe', 'pepe', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 'Administrador', 'vistas/imagenes/usuarios/pepe/909.jpg', 1, '2020-06-30 23:45:49', '2020-07-01 02:45:49'),
(49, 'miguelitou', 'miguelito', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 'Vendedor', 'vistas/imagenes/usuarios/miguelito/942.jpg', 1, '2020-07-05 23:26:22', '2020-07-06 02:26:22'),
(57, 'usuarioDeprueba', 'usuarioPrueba', '123456', 'Vendedor', 'vistas/imagenes/usuarios/usuarioPrueba/603.jpg', 1, '2020-08-13 00:00:03', '2020-08-13 03:00:03'),
(59, 'usuarioprueba2', 'usuarioprueba2', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 'Administrador', '', 1, '2020-10-25 19:50:24', '2020-10-25 22:50:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(61, 10001, 25, 46, '[{\"id\":\"  1    \",\"descripcion\":\"ZAPATILLAS UNDER ARMOUR CHARGED \",\"cantidad\":\"2\",\"stock\":\"60\",\"precio\":\"1200\",\"total\":\"2400\"},{\"id\":\"  2    \",\"descripcion\":\"Zapatillas Under Armour Hovr Infinite\",\"cantidad\":\"2\",\"stock\":\"157\",\"precio\":\"9000\",\"total\":\"18000\"}]', 4284, 20400, 24684, 'Efectivo', '2020-11-10 22:16:18');

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
