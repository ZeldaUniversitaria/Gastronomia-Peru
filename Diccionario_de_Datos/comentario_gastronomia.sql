-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 21-11-2025 a las 09:24:22
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667283_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_gastronomia`
--

CREATE TABLE `comentario_gastronomia` (
  `comentario_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `nombre_anonimo` varchar(100) DEFAULT NULL,
  `contenido` text NOT NULL,
  `platillo` varchar(50) NOT NULL DEFAULT 'general',
  `fecha_comentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentario_gastronomia`
--

INSERT INTO `comentario_gastronomia` (`comentario_id`, `usuario_id`, `nombre_anonimo`, `contenido`, `platillo`, `fecha_comentario`) VALUES
(1, 1, NULL, 'El Ceviche peruano siempre es mejor acompañado de una rica inca kola bien fria', 'general', '2025-10-20'),
(2, 1, NULL, 'Excelente platillo, me recuerda al Ceviche en México', 'ceviche', '2025-11-05'),
(4, 2, NULL, 'Se antoja bastante', 'lomo_saltado', '2025-11-05'),
(5, 4, NULL, 'Perfecto para acompañar la comida¡!', 'chicha_morada', '2025-11-12'),
(6, 5, NULL, 'Esquisito, mejor que las fajitas', 'lomo_saltado', '2025-11-12'),
(7, 5, NULL, 'Muy refrescante', 'pisco_sour', '2025-11-12'),
(8, 6, NULL, 'Joder ya antojaron', 'lomo_saltado', '2025-11-12'),
(9, 8, NULL, 'Ya antojaron', 'anticuchos', '2025-11-12'),
(10, 7, NULL, 'NAH ESTUVO REGOD 10/10', 'ceviche', '2025-11-12'),
(11, 7, NULL, 'EXQUISITO, SIRVAME 3 PARA LLEVAR', 'lomo_saltado', '2025-11-12'),
(12, 7, NULL, '10/10', 'pisco_sour', '2025-11-12'),
(13, 9, NULL, 'Muy rico, su color me recordó a la Jamaica', 'chicha_morada', '2025-11-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario_gastronomia`
--
ALTER TABLE `comentario_gastronomia`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario_gastronomia`
--
ALTER TABLE `comentario_gastronomia`
  MODIFY `comentario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario_gastronomia`
--
ALTER TABLE `comentario_gastronomia`
  ADD CONSTRAINT `comentario_gastronomia_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario_gastronomia` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
