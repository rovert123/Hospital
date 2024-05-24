-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2023 a las 21:22:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idAdministracion` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idAdministracion`, `nombre`) VALUES
(1, 'Oral'),
(2, 'Intravenosa'),
(3, 'Sublingual'),
(4, 'Rectal'),
(5, 'Vaginal'),
(6, 'Ocular'),
(7, 'Nasal'),
(8, 'Inhalatoria'),
(9, 'Cutaneo'),
(10, 'Intramuscular'),
(11, 'Transdérmica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoorden`
--

CREATE TABLE `estadoorden` (
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadoorden`
--

INSERT INTO `estadoorden` (`idEstado`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'Rechazado'),
(3, 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposanguineo`
--

CREATE TABLE `gruposanguineo` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gruposanguineo`
--

INSERT INTO `gruposanguineo` (`idTipo`, `nombre`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fechaCaducidad` date NOT NULL,
  `precio` double NOT NULL,
  `viaAdministracion` int(11) NOT NULL,
  `tipoMedicamento` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idMedicamento`, `stock`, `nombre`, `descripcion`, `fechaCaducidad`, `precio`, `viaAdministracion`, `tipoMedicamento`) VALUES
(1, 99, 'Naproxeno', 'Caja con 30 tabletas', '2023-10-01', 20000, 4, 6),
(2, 20, 'Ibuprofeno', 'Caja con 50 tabletas', '2025-10-31', 24950, 1, 1),
(3, 15, 'Acetaminofen', 'Caja con 20 tabletas', '2025-12-18', 15000, 1, 1),
(4, 299, 'Flumin', 'caja con 50 tabletas', '2025-10-23', 19500, 1, 1),
(5, 250, 'Zyloric', 'Caja con 30 tabletas', '2024-08-15', 23000, 1, 3),
(6, 50, 'amchafibrin', 'frasco 49,5g ', '2023-09-21', 25000, 2, 7),
(7, 30, 'adenocor', 'frasco de 49,5g ', '2023-12-22', 15000, 2, 7),
(8, 40, 'adrenalina', 'frasco de 49,5g ', '2023-07-14', 25000, 2, 7),
(9, 50, 'trangorex', 'frasco de 40,5g ', '2023-11-10', 20000, 2, 7),
(10, 30, 'tenormin', 'frasco de 40,5g', '2023-09-06', 15000, 2, 7),
(11, 70, 'Adenosina ', 'Caja con 100 tabletas', '2024-08-22', 22000, 3, 4),
(12, 50, 'verapamilo', 'caja con 50 tabletas', '2023-11-23', 30000, 3, 4),
(13, 100, 'nicorandil', 'caja con 50 tabletas', '2024-08-15', 25000, 3, 4),
(14, 150, 'nifedifina', 'caja con 30 tabletas', '2025-03-20', 27000, 3, 4),
(15, 200, 'alprazonlan', 'caja con 3 tabletas ', '2024-06-08', 45000, 3, 4),
(16, 50, 'ultrasam', 'analgésico en forma de crema  ', '2024-01-04', 40000, 4, 6),
(17, 25, 'fenobarbital', 'analgésico en forma de crema ', '2023-01-06', 30000, 4, 6),
(18, 20, 'solidamil', 'crema antibiótica', '2023-01-05', 15000, 4, 6),
(19, 30, 'azitromicina ', 'crema antibiótica', '2022-12-02', 25000, 4, 6),
(20, 40, 'eritrocimina', 'crema analgésica ', '2023-10-07', 40000, 4, 6),
(21, 35, 'clotrimazol', 'crema antibiótica', '2024-11-01', 30000, 5, 6),
(22, 40, 'lomexil', 'crema antibiótica ', '2023-12-08', 19000, 5, 6),
(23, 35, 'ginoflorex', 'crema antibiótica ', '2025-07-01', 25000, 5, 6),
(24, 50, 'gyno-canesflor', 'caja con 3 capsulas ', '2026-02-19', 27000, 5, 3),
(25, 40, 'bexon_duo', 'caja con 2 capsulas ', '2023-09-14', 45000, 5, 3),
(26, 25, 'gentacare', 'crema tópica', '2023-07-05', 35000, 6, 5),
(27, 20, 'corticare', 'crema topica', '2024-01-11', 30000, 6, 5),
(28, 25, 'tetraciclina', 'crema tópica', '2023-06-13', 25000, 6, 5),
(29, 20, 'tetraciclina', 'crema topica ', '2023-04-08', 27000, 6, 5),
(30, 30, 'cloranifecol', 'crema topica', '2022-12-23', 45000, 6, 5),
(31, 30, 'budesonia', 'crema topica', '2023-04-15', 45000, 9, 6),
(32, 25, 'butametasona', 'crema tópica', '2023-04-19', 25000, 9, 6),
(33, 30, 'clobetasol', 'crema topica ', '2022-11-09', 15000, 9, 6),
(34, 40, 'cortobenzolona\r\n', 'crema topica', '2023-03-03', 25000, 9, 6),
(35, 60, 'Desonida', 'Crema tópica ', '2022-11-17', 40000, 9, 5),
(36, 50, 'cefotaxima', 'frasco de 49,5g', '2024-11-04', 20000, 10, 7),
(37, 45, 'cefoxitina', 'frasco de 40,5g', '2023-08-15', 30000, 10, 7),
(38, 25, 'cefradina', 'frasco de 49,5g', '2024-05-07', 25000, 10, 7),
(39, 30, 'clindamicina', 'frasco de 40,5g', '2023-04-07', 40000, 10, 7),
(40, 30, 'dexamentazona', 'frasco de 49,5g', '2023-05-10', 45000, 10, 7),
(41, 50, 'buprenorfina', 'frasco de 40,5g', '2023-02-09', 30000, 11, 7),
(42, 34, 'capsaicina', 'frasco de 49,5g', '2023-07-14', 15000, 11, 7),
(43, 100, 'pfizer', 'frasco de 45,9g', '2023-07-14', 25000, 11, 7),
(44, 40, 'fentanilo', 'frasco de 40,5g', '2025-03-20', 40000, 11, 7),
(45, 32, 'nitroglicerina', 'frasco de 49,5g', '2023-09-14', 45000, 11, 7),
(46, 180, 'Fosamax', 'Caja con 100 tabletas', '2024-08-15', 25500, 1, 3),
(47, 19, 'Acetaminofen', 'Botella 90 Ml', '2022-11-16', 8000, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idOrden` int(11) NOT NULL,
  `documentoPaciente` bigint(20) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `dosificacion` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `documentoUsuario` bigint(20) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`idOrden`, `documentoPaciente`, `idMedicamento`, `dosificacion`, `cantidad`, `documentoUsuario`, `idEstado`) VALUES
(3, 34789765, 2, '1 Cada 8 Horas', 3, 1000538470, 2),
(4, 37890098, 3, '1 Cada 5 horas', 2, 1000538470, 3),
(5, 37890098, 2, '1 Cada 8 Horas', 3, 1000538470, 3),
(6, 46645706, 7, '1 cada 8 horas', 2, 1001185978, 3),
(7, 46645706, 3, '1 cada 6 horas', 2, 1001185978, 3),
(8, 46645706, 6, '1 cada 8 hras', 2, 1001185978, 1),
(9, 1000105212, 4, '1 cada 5 horas', 1, 1001185978, 3),
(10, 1001198765, 3, '1 cada 8 horas', 1, 1001196875, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `documento` bigint(20) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `edad` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `password` varchar(500) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `idRol` int(11) NOT NULL,
  `documentoUsuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`documento`, `nombre`, `apellido`, `edad`, `idTipo`, `correo`, `password`, `telefono`, `direccion`, `idRol`, `documentoUsuario`) VALUES
(34789765, 'Oscar', 'Garzon', 56, 4, 'oscar.garzon@paciente.com', '$2y$10$vOks0GUl.kQBSKpeg1rWfuWyVuzzPML2UEYUI39dxWreQE7Lzxrfe', 3128797891, 'Soacha, Cundinamarca', 4, 1000538470),
(37890098, 'Andrea', 'Gomez', 67, 8, 'andrea.gomez@paciente.com', '$2y$10$7lTi9VhSLMc1UnmQpcZbcOjvhLZY8mp9pz0ANUYOeXLNxfXKmiEW2', 3057869909, 'Soacha, Cundinamarca', 4, 1000538470),
(45098712, 'Jose', 'Arenas', 34, 2, 'jose.arenas@paciente.com', '$2y$10$eueYQa41CZnCaxl.evyz3uN6SLk20QlhJE/yPT0/6HyPxB/djT7O.', 3098097878, 'Cra 51 #10a-110', 4, 1000538470),
(45678098, 'Carlos', 'Suarez', 34, 5, 'carlos.suarez@paciente.com', '$2y$10$mxVekHcysPjgqoob6aDG5e6/HprKhdRvJZTQ9p4mr9Nhnvt5eYk3u', 3109811098, 'Ciudad Verde, Soacha', 4, 1000538470),
(46645706, 'Mariana', 'Beltran', 43, 8, 'marina@paciente.com', '$2y$10$iAjtDLrtVS8kpGMG5r2w9.bQxQ5y9sWSbSi8llac3h1C72eaGzdQu', 322766198, 'Soacha, Ciudad Verde', 4, 1001185978),
(75076123, 'Angel', 'Lopez', 45, 2, 'angel.lopez@paciente.com', '$2y$10$wlC9oFTDCwbbyv5uC7WRweWPYu/DJh8r/dadioIVgpAwxRZfH32ou', 304657123, 'Soacha, Cundinamarca', 4, 1000538470),
(87654654, 'Andres', 'Pabon', 21, 7, 'andres.pabon@paciente.com', '$2y$10$iJJrLjtz7MCIGOTE1gHmpuWSoGQEWCavTUKvvJ5nGxfysOKJ/s1Re', 3126577761, 'Bosa, Soacha', 4, 1000538470),
(100537471, 'Miguel', 'Santos', 20, 5, 'miguel.santos@paciente.com', '$2y$10$08IvMRmeFUnwLFNfTXFOgeDKVUEfTz9HOOxqowoU7QpIjOlQGpYIS', 3023567676, 'Ciudad Verde, Soacha', 4, 1000538470),
(456785432, 'Manuela', 'Manrique', 28, 6, 'manuela.manrique@paciente.com', '$2y$10$duz0ZL6kZHfkjCH/8tMNeeq29Zld85aRGKQxbH5TQbMUKRP09qg6u', 314387543, 'Bosa, Soacha', 4, 1000538470),
(566457008, 'Julio', 'Bello', 46, 2, 'julio@paciente', '$2y$10$vdPPWNcoyLnrIItciaPtS.xxh62NN6RamOSNS2rAigjBKl4ubH9CC', 3112746089, 'Soacha, Cundinamarca', 4, 1001185978),
(1000105212, 'Camila', 'Suarez', 42, 5, 'camila@paciente.com', '$2y$10$AaoWGqtKjGoIPtfQZrbAq.Xp4pcZgDGJ5S41Uo0HGGlWA1GerRi7i', 3227641156, 'Soacha', 4, 1001185978),
(1000538476, 'Esteban', 'Moncada', 22, 4, 'esteban.moncada@paciente.com', '$2y$10$pz5y8yqRjbvthm9uaG8SpeltPW8kcWbWUJpDqzudAxGsoQuC8CWhK', 3225678090, 'Bosa, Soacha', 4, 1001185978),
(1001198765, 'Marquinos\n', 'Beltran', 20, 4, 'marquinos.beltran@paciente.com', '123456', 3215687987, 'San Mateo', 4, 1001196875),
(1002579097, 'Alberto', 'Carlos', 23, 3, 'alberto.carlos@paciente.com', '$2y$10$2P.uka9n/xo1Odr7iK2zLuoqr6Ia9hCGh3UHOKWppKD9n8QRbukfm', 3224567809, 'Bosa, Soacha', 4, 1000538470),
(1010200300, 'Juana', 'Moreno', 23, 1, 'juana.moreno@paciente.com', '$2y$10$No8ChNTnoojYTvQeOK6XpOSCXj1HtvA.ylKZX8QL1/zPPtwnEZ8mi', 3015678765, 'Bosa', 4, 1000538470),
(1100456543, 'Daniel', 'Garcia', 19, 3, 'daniel.garcia@paciente.edu.co', '$2y$10$nCiHDKmEudA3lxhSEohYduV9ZuJHZfIPSPOeS.J43jblVGmES5yMq', 3213649754, 'Ciudad Verde', 4, 1000538470),
(10039843231, 'Suares', 'Silva', 32, 3, 'suarez.silva@paciente.com', '123456', 3214569294, 'Soacha', 4, 1001196875);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(6, 100134562, 100500.00, '2022-11-16 15:27:03', '2022-11-16 15:27:03', '1'),
(7, 100134562, 102000.00, '2022-11-16 16:33:46', '2022-11-16 16:33:46', '1'),
(8, 100134562, 102000.00, '2022-11-16 16:38:51', '2022-11-16 16:38:51', '1'),
(9, 100134562, 102000.00, '2022-11-16 16:39:11', '2022-11-16 16:39:11', '1'),
(10, 100134562, 102000.00, '2022-11-16 16:39:41', '2022-11-16 16:39:41', '1'),
(11, 100134562, 102000.00, '2022-11-16 16:41:37', '2022-11-16 16:41:37', '1'),
(12, 100134562, 24950.00, '2022-11-16 16:57:56', '2022-11-16 16:57:56', '1'),
(13, 100134562, 24950.00, '2022-11-16 16:58:03', '2022-11-16 16:58:03', '1'),
(14, 100134562, 39950.00, '2022-11-16 17:08:10', '2022-11-16 17:08:10', '1'),
(15, 100134562, 39950.00, '2022-11-16 17:08:52', '2022-11-16 17:08:52', '1'),
(16, 100134562, 64500.00, '2022-11-16 21:49:44', '2022-11-16 21:49:44', '1'),
(17, 100134562, 64500.00, '2022-11-16 21:49:55', '2022-11-16 21:49:55', '1'),
(18, 100134562, 64500.00, '2022-11-16 21:50:29', '2022-11-16 21:50:29', '1'),
(19, 1007285345, 8000.00, '2022-11-16 21:51:22', '2022-11-16 21:51:22', '1'),
(20, 1007285345, 41500.00, '2022-11-16 21:52:31', '2022-11-16 21:52:31', '1'),
(21, 1007285345, 41500.00, '2022-11-16 21:54:42', '2022-11-16 21:54:42', '1'),
(22, 100134562, 39950.00, '2022-11-16 21:56:03', '2022-11-16 21:56:03', '1'),
(23, 100134562, 39950.00, '2022-11-16 21:57:27', '2022-11-16 21:57:27', '1'),
(24, 100134562, 39950.00, '2022-11-16 21:57:36', '2022-11-16 21:57:36', '1'),
(25, 100134562, 39950.00, '2022-11-16 21:58:26', '2022-11-16 21:58:26', '1'),
(26, 100134562, 8000.00, '2022-11-16 21:59:15', '2022-11-16 21:59:15', '1'),
(27, 100134562, 8000.00, '2022-11-16 21:59:26', '2022-11-16 21:59:26', '1'),
(28, 100134562, 33500.00, '2022-11-16 21:59:50', '2022-11-16 21:59:50', '1'),
(29, 100134562, 76500.00, '2022-11-16 22:00:09', '2022-11-16 22:00:09', '1'),
(30, 100134562, 24950.00, '2022-11-16 22:00:41', '2022-11-16 22:00:41', '1'),
(31, 100134562, 15000.00, '2022-11-16 22:01:03', '2022-11-16 22:01:03', '1'),
(32, 100134562, 15000.00, '2022-11-16 22:01:09', '2022-11-16 22:01:09', '1'),
(33, 100134562, 15000.00, '2022-11-16 22:01:15', '2022-11-16 22:01:15', '1'),
(34, 100134562, 15000.00, '2022-11-16 22:01:25', '2022-11-16 22:01:25', '1'),
(35, 100134562, 15000.00, '2022-11-16 22:01:27', '2022-11-16 22:01:27', '1'),
(36, 100134562, 60500.00, '2022-11-16 22:07:59', '2022-11-16 22:07:59', '1'),
(37, 100134562, 60500.00, '2022-11-16 22:10:31', '2022-11-16 22:10:31', '1'),
(38, 100134562, 60500.00, '2022-11-16 22:11:15', '2022-11-16 22:11:15', '1'),
(39, 100134562, 60500.00, '2022-11-16 22:13:18', '2022-11-16 22:13:18', '1'),
(40, 100134562, 45500.00, '2022-11-16 22:13:39', '2022-11-16 22:13:39', '1'),
(41, 100134562, 45500.00, '2022-11-16 22:14:02', '2022-11-16 22:14:02', '1'),
(42, 100134562, 45500.00, '2022-11-16 22:14:44', '2022-11-16 22:14:44', '1'),
(43, 100134562, 40000.00, '2022-11-16 22:18:51', '2022-11-16 22:18:51', '1'),
(44, 100134562, 8000.00, '2022-11-16 22:21:34', '2022-11-16 22:21:34', '1'),
(45, 100134562, 83000.00, '2022-11-16 22:26:46', '2022-11-16 22:26:46', '1'),
(46, 100134562, 83000.00, '2022-11-16 22:27:19', '2022-11-16 22:27:19', '1'),
(47, 100134562, 147500.00, '2022-11-16 22:29:17', '2022-11-16 22:29:17', '1'),
(48, 100134562, 8000.00, '2022-11-16 22:31:15', '2022-11-16 22:31:15', '1'),
(49, 100134562, 70500.00, '2022-11-17 09:50:09', '2022-11-17 09:50:09', '1'),
(50, 100134562, 40500.00, '2022-11-17 09:59:09', '2022-11-17 09:59:09', '1'),
(51, 100134562, 25500.00, '2022-11-17 10:14:19', '2022-11-17 10:14:19', '1'),
(52, 100134562, 25500.00, '2022-11-17 10:22:41', '2022-11-17 10:22:41', '1'),
(53, 100134562, 25500.00, '2022-11-17 10:38:58', '2022-11-17 10:38:58', '1'),
(54, 100134562, 20000.00, '2022-11-17 11:11:28', '2022-11-17 11:11:28', '1'),
(55, 100134562, 25500.00, '2022-11-17 11:17:57', '2022-11-17 11:17:57', '1'),
(56, 100134562, 25500.00, '2022-11-17 11:19:12', '2022-11-17 11:19:12', '1'),
(57, 100134562, 25500.00, '2022-11-17 11:35:23', '2022-11-17 11:35:23', '1'),
(58, 100134562, 25500.00, '2023-03-10 11:02:05', '2023-03-10 11:02:05', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_articulos`
--

CREATE TABLE `pedido_articulos` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_articulos`
--

INSERT INTO `pedido_articulos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 6, 41, 1),
(2, 6, 45, 1),
(3, 6, 46, 1),
(4, 10, 46, 4),
(5, 11, 46, 4),
(6, 12, 2, 1),
(7, 13, 2, 1),
(8, 18, 4, 2),
(9, 18, 46, 1),
(10, 19, 47, 1),
(11, 20, 47, 2),
(12, 20, 46, 1),
(13, 21, 47, 2),
(14, 21, 46, 1),
(15, 22, 3, 1),
(16, 22, 2, 1),
(17, 27, 47, 1),
(18, 28, 46, 1),
(19, 28, 47, 1),
(20, 29, 46, 3),
(21, 30, 2, 1),
(22, 45, 47, 4),
(23, 45, 46, 2),
(24, 46, 47, 4),
(25, 46, 46, 2),
(26, 47, 46, 1),
(27, 47, 45, 2),
(28, 47, 47, 4),
(29, 48, 47, 1),
(30, 49, 45, 1),
(31, 49, 46, 1),
(32, 50, 42, 1),
(33, 50, 46, 1),
(34, 51, 46, 1),
(35, 52, 46, 1),
(36, 53, 46, 1),
(37, 54, 1, 1),
(38, 55, 46, 1),
(39, 56, 46, 1),
(40, 57, 46, 1),
(41, 58, 46, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Encargado'),
(4, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomedicamento`
--

CREATE TABLE `tipomedicamento` (
  `idTipomedicamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomedicamento`
--

INSERT INTO `tipomedicamento` (`idTipomedicamento`, `nombre`) VALUES
(1, 'Tableta'),
(2, 'Jarabe'),
(3, 'Capsula'),
(4, 'Comprimido'),
(5, 'Crema Tópica'),
(6, 'Ungüento Tópico '),
(7, 'Inyectable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` bigint(20) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `password` varchar(300) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombre`, `apellido`, `correo`, `password`, `telefono`, `idRol`) VALUES
(45679092, 'Juan', 'Rondon', 'juan.rondon@encargado.com', '$2y$10$JZhA6R3Cc0SjkmkId1gR6uoilo0aysEUXZGdaFh3KBqgJviIum9RO', 312435899, 3),
(98090876, 'Juan', 'Caceres', 'juan.caceres@medico.com', '$2y$10$bbnjkO7YTlSYahzjECjnIuFtqMixrU16hmUkd/JrrCeae17uwMx82', 3017863421, 2),
(100134562, 'Tevi', 'Esco', 'tevi.esco@encargado.com', '$2y$10$VB6CAcmF7Ulq/QotKLI0/.bM.2QrJzoAlV3ePJ8f8xcQw/UbSpTZa', 3215578134, 3),
(1000538470, 'Esteban', 'Escobar', 'esteban@medico.com', '$2y$10$4uuWOhZMoeaFMwXDRlia.uT9iadXBx/B31hFs2Dxy2hhPQWPfs7aa', 3007982212, 2),
(1000578543, 'Carlos', 'Herrero', 'carlos@encargado.com', '$2y$10$2LWd8D24MHnd42SA8HMwqOkI1499h9.HFF2gk.jmU7qyXTU7xhk0K', 345678954, 3),
(1001185978, 'Christian', 'Beltran', 'christian.beltran@medico.com', '$2y$10$VB6CAcmF7Ulq/QotKLI0/.bM.2QrJzoAlV3ePJ8f8xcQw/UbSpTZa', 3214569294, 2),
(1001196875, 'Juan', 'Martín', 'juan@medico.com', '123456', 3214569294, 2),
(1005122559, 'Mariana', 'Manchado', 'mariana@medico.com', '$2y$10$VxbzgmN8Liq70TxLFCnY2e0g4WJII9/fEY6h/lvFEN/RA/PDyUFy.', 3223009248, 2),
(1007285345, 'Carlitos', 'Lopez', 'admin@admin.com', '$2y$10$Ji1faIv662L8rSlYKFHYgudy7vLFMYwNcK7dbQN.QPoSSbxuphxVi', 301879654, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`idAdministracion`);

--
-- Indices de la tabla `estadoorden`
--
ALTER TABLE `estadoorden`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `gruposanguineo`
--
ALTER TABLE `gruposanguineo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idMedicamento`),
  ADD KEY `viaAdministracion` (`viaAdministracion`),
  ADD KEY `tipoMedicamento` (`tipoMedicamento`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idOrden`),
  ADD KEY `documentoPaciente` (`documentoPaciente`),
  ADD KEY `documentoUsuario` (`documentoUsuario`),
  ADD KEY `idMedicamento` (`idMedicamento`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `gruposanguineo` (`idTipo`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `documentoUsuario` (`documentoUsuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `pedido_articulos`
--
ALTER TABLE `pedido_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipomedicamento`
--
ALTER TABLE `tipomedicamento`
  ADD PRIMARY KEY (`idTipomedicamento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `idOrden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `pedido_articulos`
--
ALTER TABLE `pedido_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `medicamento_ibfk_1` FOREIGN KEY (`viaAdministracion`) REFERENCES `administracion` (`idAdministracion`),
  ADD CONSTRAINT `medicamento_ibfk_2` FOREIGN KEY (`tipoMedicamento`) REFERENCES `tipomedicamento` (`idTipomedicamento`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamento` (`idMedicamento`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`documentoPaciente`) REFERENCES `paciente` (`documento`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`documentoUsuario`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `orden_ibfk_4` FOREIGN KEY (`idEstado`) REFERENCES `estadoorden` (`idEstado`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `gruposanguineo` (`idTipo`),
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`documentoUsuario`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `paciente_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `usuario` (`documento`);

--
-- Filtros para la tabla `pedido_articulos`
--
ALTER TABLE `pedido_articulos`
  ADD CONSTRAINT `pedido_articulos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
