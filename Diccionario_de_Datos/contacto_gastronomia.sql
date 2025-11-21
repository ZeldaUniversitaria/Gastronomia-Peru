-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 21-11-2025 a las 09:24:29
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
-- Estructura de tabla para la tabla `contacto_gastronomia`
--

CREATE TABLE `contacto_gastronomia` (
  `contacto_id` int NOT NULL,
  `usuario_id` int DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `asunto` varchar(180) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contacto_gastronomia`
--

INSERT INTO `contacto_gastronomia` (`contacto_id`, `usuario_id`, `nombre`, `email`, `asunto`, `mensaje`, `fecha_envio`) VALUES
(1, 2, 'Andrea', 'andrea@gmail.com', 'Visita al Restaurante', 'Quería darle de manera personal al chef mis felicitaciones, además de agradecer a todo el personal por su atención.', '2025-11-21 09:04:56'),
(2, 9, 'Silvia Torres', 'Silvia@gmail.com', 'Reservación', 'Buenas tardes, me gustaría saber si es posible reservar alguna de sus áreas en el restaurante para un evento pequeño, espero su respuesta, gracias.', '2025-11-21 09:08:07'),
(3, 10, 'Víctor', 'victor@gmail.com', 'Agradecimiento', 'Muchas gracias por todas las atenciones que tuvieron en mi visita, en verdad es un restaurante que no solo se caracteriza por su sabor, sino también por su servicio al cliente', '2025-11-21 09:13:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto_gastronomia`
--
ALTER TABLE `contacto_gastronomia`
  ADD PRIMARY KEY (`contacto_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto_gastronomia`
--
ALTER TABLE `contacto_gastronomia`
  MODIFY `contacto_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto_gastronomia`
--
ALTER TABLE `contacto_gastronomia`
  ADD CONSTRAINT `contacto_gastronomia_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario_gastronomia` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
