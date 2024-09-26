-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2024 a las 23:25:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(5) NOT NULL,
  `dni_u` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `T1` float(8,2) NOT NULL,
  `T2` float(8,2) NOT NULL,
  `T3` float(8,2) NOT NULL,
  `nota_materia` float(8,2) NOT NULL,
  `nota_final` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `dni_u`, `id_materia`, `T1`, `T2`, `T3`, `nota_materia`, `nota_final`) VALUES
(2, 47654345, 1, 1.00, 1.00, 1.00, 1.00, 1.00),
(4, 46891208, 1, 3.00, 4.00, 6.00, 0.00, 4.33),
(5, 46891208, 4, 2.00, 3.00, 2.00, 0.00, 2.33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mesa`
--

CREATE TABLE `det_mesa` (
  `id_detmesa` int(6) NOT NULL,
  `asistencia` varchar(30) NOT NULL,
  `dni_u` int(6) NOT NULL,
  `nota` float(8,2) NOT NULL,
  `id_mesa` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id_in` int(6) NOT NULL,
  `id_mesa` int(6) NOT NULL,
  `dni_u` int(6) NOT NULL,
  `id_materia` int(6) NOT NULL,
  `fecha_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `dni_p` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `dni_p`) VALUES
(1, 'Redes II', 12345732),
(2, 'Redes I', 45673284),
(3, 'Programación', 98786341),
(4, 'Inglés', 86592125),
(5, 'Probabilidad y estadistica', 47654324),
(6, 'Lengua y literatura', 65732923);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `dni_p1` int(8) NOT NULL,
  `dni_p2` int(8) NOT NULL,
  `dni_p3` int(8) NOT NULL,
  `id_materia` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preceptor`
--

CREATE TABLE `preceptor` (
  `dni_pre` int(8) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `nombre` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `dni_p` int(8) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`dni_p`, `Nombre`) VALUES
(10202305, 'Bruce Wayne'),
(12345732, 'Barrios Mendez Juan'),
(19306834, 'Koce Mela Norman'),
(39203549, 'Apu Sebas Losimp'),
(45673284, 'Shang Sun'),
(47654324, 'Fernandez Jose'),
(48697867, 'Miguel Angel'),
(56491204, 'Chimi Changa Fang'),
(65732923, 'Chango Pama'),
(74345934, 'Sun Stanley'),
(86592125, 'Cage Nicolas'),
(98786341, 'Lopez Ancha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni_u` int(8) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `tipo_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni_u`, `nombre_usuario`, `tipo_usuario`) VALUES
(46891208, 'Fabricio', 1),
(47654345, 'Santiago Gonzalo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `calificaciones_ibfk_1` (`dni_u`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `det_mesa`
--
ALTER TABLE `det_mesa`
  ADD PRIMARY KEY (`id_detmesa`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id_in`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `dni_p` (`dni_p`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `preceptor`
--
ALTER TABLE `preceptor`
  ADD PRIMARY KEY (`dni_pre`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`dni_p`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `det_mesa`
--
ALTER TABLE `det_mesa`
  MODIFY `id_detmesa` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id_in` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `dni_u` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47654346;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`dni_u`) REFERENCES `usuario` (`dni_u`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`dni_p`) REFERENCES `profesor` (`dni_p`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
