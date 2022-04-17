-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 17:01:27
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_usuario` int(11) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `Apellido` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(20) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_usuario`, `foto`, `usuario`, `nombre`, `Apellido`, `fecha`, `estado`, `correo`, `contraseña`) VALUES
(1, 'default.jpg', 'HOSTT', 'Host', 'user', '2021-06-08 14:34:33', 'admin', 'mateodelarosa@gmail.com', '984cefd6d27eb0471fc401a493a4fdff'),
(2, '1626959566_1619790965_imagena.jpg', 'HOST', 'el2', 'Superior', '2021-06-08 14:34:33', 'admin', 'mateodelarosa2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, '1626933029_1620878691_profile1.jpg', 'mateoDLR3', 'richard', 'mon', '2021-06-08 23:54:37', 'elegido', 'mateodelarosa4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `mensaje` varchar(5000) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre`, `email`, `titulo`, `mensaje`, `fecha`) VALUES
(1, 'mateo', 'mateofalso@gmail.com', 'ready', 'ready mi fafa ready esta funcion', '2021-06-05 16:53:10'),
(2, 'mateo', 'mateofalso@gmail.com', 'ya dio', 'sin errores mi fafa', '2021-06-05 16:53:41'),
(9, 'richard', 'richard@gmail.com', 'confirmacion pedido', 'hola buenas tardes yo realice una compra el dia de ayer quiera', '2021-06-10 18:20:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `PrecioUnitario` decimal(20,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descargado` int(1) NOT NULL,
  `total` float(250,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `id_venta`, `id_producto`, `PrecioUnitario`, `cantidad`, `descargado`, `total`) VALUES
(40, 42, 14, '213.00', 3, 0, 639.00),
(41, 42, 17, '213.00', 2, 0, 426.00),
(43, 43, 17, '213.00', 2, 0, 426.00),
(44, 44, 17, '213.00', 1, 0, 213.00),
(46, 44, 14, '213.00', 2, 0, 426.00),
(48, 45, 14, '213.00', 1, 0, 213.00),
(83, 68, 14, '213.00', 1, 0, 213.00),
(84, 68, 16, '2312.00', 1, 0, 2312.00),
(97, 74, 14, '213.00', 1, 0, 213.00),
(98, 75, 14, '213.00', 1, 0, 213.00),
(99, 75, 16, '2312.00', 2, 0, 4624.00),
(100, 76, 14, '213.00', 1, 0, 213.00),
(101, 76, 16, '2312.00', 2, 0, 4624.00),
(105, 78, 14, '213.00', 2, 0, 426.00),
(106, 80, 16, '2312.00', 2, 0, 4624.00),
(111, 85, 16, '2312.00', 2, 0, 4624.00),
(112, 86, 16, '2312.00', 2, 0, 4624.00),
(113, 87, 16, '2312.00', 2, 0, 4624.00),
(114, 88, 16, '2312.00', 2, 0, 4624.00),
(116, 89, 16, '2312.00', 1, 0, 2312.00),
(117, 90, 14, '213.00', 2, 0, 426.00),
(118, 90, 16, '2312.00', 1, 0, 2312.00),
(119, 91, 17, '54000.00', 1, 0, 54000.00),
(120, 92, 17, '54000.00', 1, 0, 54000.00),
(121, 93, 16, '23120.00', 1, 0, 23120.00),
(122, 94, 17, '54000.00', 1, 0, 54000.00),
(123, 94, 16, '23120.00', 2, 0, 46240.00),
(125, 95, 16, '23120.00', 1, 0, 23120.00),
(126, 95, 17, '54000.00', 2, 0, 108000.00),
(127, 96, 17, '54000.00', 2, 0, 108000.00),
(129, 97, 16, '23120.00', 1, 0, 23120.00),
(130, 97, 17, '54000.00', 1, 0, 54000.00),
(131, 98, 17, '54000.00', 1, 0, 54000.00),
(133, 100, 14, '32000.00', 1, 0, 32000.00),
(134, 100, 19, '80000.00', 1, 0, 80000.00),
(135, 101, 14, '32000.00', 1, 0, 32000.00),
(136, 101, 17, '54000.00', 1, 0, 54000.00),
(137, 102, 14, '32000.00', 1, 0, 32000.00),
(138, 102, 16, '23120.00', 2, 0, 46240.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `talla` varchar(30) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `categoria` varchar(11) NOT NULL,
  `cantidad` varchar(11) NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_vendedor`, `nombre`, `descripcion`, `stock`, `precio`, `talla`, `foto`, `categoria`, `cantidad`, `estado`) VALUES
(14, 2, 'Sudadera', 'Sudadera Deportiva buena tela, perfecta para hacer deporte o estar en la casa', 21, 32000, 's', '1626094142_imagen3.jpg', 'hombre', '', 'activo'),
(16, 123, 'Conjunto deportivo', 'Conjunto deportivo para mujer con buzo y medias', 12, 23120, 'M', 'imagen.jpg', 'mujer', '', 'activo'),
(17, 14, 'pantaloneta ', 'sport para hacer deporte fina', 22, 54000, 'm', '1624983704_ropa.jpg', 'hombre', '', 'activo'),
(19, 14, 'bolso ', 'morral deportivo, resistente, dinámico', 5, 80000, 'N/A', '1626099336_imagen6.jpg', 'instrumento', '', 'activo'),
(20, 2, 'Tennis deportivos', 'Tennis nike deportivos', 13, 60000, '38', '1626099392_imagen5.jpg', 'instrumento', '', 'activo'),
(21, 31, 'TRX', 'Trx para hacer abdomen ', 3, 80000, 'N/A', '1626963249_trx.jpg', 'instrumento', '', 'activo'),
(22, 33, 'Chaqueta deportiva', 'Chaqueta deportiva de cuero excelente tela ', 2, 59900, 'L', '1626964073_chaqueta.jpg', 'mujer', '', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_sub` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id_sub`, `correo`) VALUES
(4, 'hola@gmail.com'),
(5, 'holaa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Total` decimal(60,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `nombre`, `Correo`, `telefono`, `direccion`, `Status`, `Total`) VALUES
(42, 'eh24ub2do0325fsindcmhckrs5', '', '2021-06-07 23:22:20', 'mateoDe La Rosa Rojas', 'wbrakusf_j954m@fuluj.com', '3103501413', 'dg 214214 fe', 'aprobado', '1278.00'),
(43, 'eh24ub2do0325fsindcmhckrs5', '', '2021-06-07 23:29:38', 'rubyrojas', 'wbrakusf_j954m@fuluj.com', '3101239867', 'dg 123dewd', 'pendiente', '426.00'),
(44, 'eh24ub2do0325fsindcmhckrs5', '', '2021-06-07 23:39:05', 'camilaDe La Rosa Rojas', 'maria.camila@gmail.com', '3113609341', 'dg 123 falso', 'denegado', '1278.00'),
(45, 'he8hdocmai8u5kc009g4ckldtg', '', '2021-06-10 18:10:12', 'richardmontoya', 'richard@gmail.com', '3134567890', 'dg 123 falso ', 'denegado', '426.00'),
(68, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 13:43:25', 'matefalso', 'mateonz911@gmail.com', '66666', 'dg 58 n 123', 'pendiente', '2738.00'),
(74, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 14:58:16', 'mateDe La Rosa Rojas', 'LinuxMTASA@hotmail.com', '23123212', 'dg 58 n 123', 'aprobado', '426.00'),
(75, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 14:59:11', 'mateofalsos', 'prueba@gmail.com', '555555', 'dg 58 n 123', 'pendiente', '4837.00'),
(76, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:00:35', 'matefalsos', 'mateonz911@gmail.com', '999888', 'dg 58 n 123', 'denegado', '5050.00'),
(78, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:03:39', 'mateofalso', 'mateonz911@gmail.com', '999888', 'dg 58 n 123', 'aprobado', '426.00'),
(79, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:07:29', 'mateofalso', 'mateonz911@gmail.com', '999888', 'dg 58 n 123', 'pendiente', '0.00'),
(80, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:15:00', 'matesfalso', 'prueba@gmail.com', '44444', 'dg 58 n 123', 'pendiente', '4624.00'),
(85, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:31:57', 'matesfalso', 'prueba@gmail.com', '44444', 'dg 58 n 123', 'pendiente', '4624.00'),
(86, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:41:14', 'matesfalso', 'prueba@gmail.com', '44444', 'dg 58 n 123', 'denegado', '4624.00'),
(87, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:41:47', 'matesfalso', 'prueba@gmail.com', '44444', 'dg 58 n 123', 'denegado', '4624.00'),
(88, '4ka82kbhf8ebh045eb7ohisokm', '', '2021-06-20 15:43:45', 'matesfalso', 'prueba@gmail.com', '44444', 'dg 58 n 123', 'aprobado', '4624.00'),
(89, '316vs2pt8tjc1ft4u7lk6ddpov', '', '2021-06-21 15:52:09', 'brandonfalsosss', 'mateo.delarosa@udea.edu.co', '444444', 'dg 58 n 123', 'aprobado', '2525.00'),
(90, 'mrglr2n9vpk2356hvcogbjopkj', '', '2021-06-22 13:30:10', 'matefalso', 'mdel789@misena.edu.co', '13333224', 'dg 58 n 123', 'denegado', '2738.00'),
(91, 'eobkdfsqbff49gish5pshk9dq5', '', '2021-07-11 12:15:32', 'meryrojaaas', 'wbrakusf_j954m@fuluj.com', '13333224', 'dg 58 n 123', 'pendiente', '54000.00'),
(92, 'eobkdfsqbff49gish5pshk9dq5', '', '2021-07-11 12:16:42', 'meruewqewqe', 'prueba@gmail.com', '1333322', 'dg 58 n 123', 'denegado', '54000.00'),
(93, 'eobkdfsqbff49gish5pshk9dq5', '', '2021-07-11 12:49:07', 'maxsteel', 'LinuxMTASA@hotmail.com', '3108795643', 'dg 58 n 123', 'pendiente', '23120.00'),
(94, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 15:03:49', 'willfalso', 'mateo.delarosa@udea.edu.co', '3134567890', 'avenida casi verdad', 'pendiente', '100240.00'),
(95, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 15:07:07', 'matesDe La Rosa Rojas', 'prueba@gmail.com', '333344', 'dg 58 n 123', 'denegado', '162420.00'),
(96, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 16:00:16', 'camilaDe La Rosa Rojas', 'mdel789@misena.edu.co', '3103501238', 'dg 59 nº38-90', 'denegado', '139300.00'),
(97, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 16:18:11', 'matefalsos', 'mateonz911@gmail.com', '999888', 'dg 58 n 123', 'aprobado', '77120.00'),
(98, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 16:29:29', 'matesssfalsos', 'mdel789@misena.edu.co', '3142341256', 'dg 58 n 123', 'denegado', '54000.00'),
(99, 'q0k114hd74fnbvk29kkm8lha98', '', '2021-07-11 16:33:42', 'matefalso', 'prueba@gmail.com', '1333322', 'dg 58 n 123', 'pendiente', '62600.00'),
(100, 'c0akhlv2nkdu7lgjjokbfhfp3i', '', '2021-07-12 09:27:43', 'MateooDlr', 'mateonz912@gmail.com', '3198765430', 'Dg 40 n60-56', 'pendiente', '112000.00'),
(101, '60tt2liobculebtg1bda3en71g', '', '2021-07-12 09:30:21', 'julietavargas', 'julietamasfalsa@gmail.com', '3124478990', 'dg 67 n603', 'pendiente', '86000.00'),
(102, 'kklt0pohjeb7bjeg5umv16fpa4', '', '2021-07-22 09:05:04', 'mateo De La Rosa Rojas', 'prueba@gmail.com', '3136199233', 'dg 58 n 123', 'pendiente', '78240.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
