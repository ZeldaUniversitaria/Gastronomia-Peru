-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 21-11-2025 a las 09:24:33
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
-- Estructura de tabla para la tabla `usuario_gastronomia`
--

CREATE TABLE `usuario_gastronomia` (
  `usuario_id` int NOT NULL,
  `carrera_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario_gastronomia`
--

INSERT INTO `usuario_gastronomia` (`usuario_id`, `carrera_id`, `nombre`, `email`, `fecha_registro`, `contrasena`) VALUES
(1, 1, 'Zelda', 'zelda@gmail.com', '2025-10-20', NULL),
(2, 1, 'Andrea', 'andrea@gmail.com', '2025-11-05', '$2y$10$Fi1gmregUbcKVmgPisy08epBXSsua8vETFFEBi7CFg7kVo8dRpGY6'),
(3, 5, 'PATRICIO RESENDIZ MATA', 'PATRICIO@GMAIL.COM', '2025-11-12', '$2y$10$mgxSxCn5JfL/jkZYD.aiBubhE7pG1/36MjVhzWJlTKZGpCsommqgW'),
(4, 1, 'Zahira', 'zahiragarcia860@gmail.com', '2025-11-12', '$2y$10$JmMk710D/6PkMEJ/Kv9egumswPmKLAEZ67e9diyZG5ZwCS53PFXS.'),
(5, 1, 'samuel', 'usuario.alumno@gmail.com', '2025-11-12', '$2y$10$76X7UbPXuRcz6Tisw7biTuSE9GBzSzf5uMQ/O0EYNz8dZmMFXBhWa'),
(6, 1, 'Itzel', 'itzel.chavez03@gmail.com', '2025-11-12', '$2y$10$oSBf4cw6//8Y6EEnm92pLO1SA4K9zRBt8ScihXgSnvDFpVGqsDRT.'),
(7, 1, 'VINICIO HERNÁNDEZ', 'bv@gmail.com', '2025-11-12', '$2y$10$hwVa1FF7O8QylAeGmCVkY.ota/CWG3hxOWF6nFQ.35ypbWPxfutUq'),
(8, 1, 'David Eduardo', '321@jsjs.com', '2025-11-12', '$2y$10$mfR1FjybtAHDNU5woc8xJO0CO7WS9Rex9YvAxbCkdZF3TYxASo2fG'),
(9, 7, 'Silvia Torres', 'Silvia@gmail.com', '2025-11-21', '$2y$10$NdXbALZ5bpNlc0EAufrz2eSvdNo9gqT4el3Uhr87xbMTdM1PYczEC'),
(10, 1, 'Víctor', 'victor@gmail.com', '2025-11-21', '$2y$10$7w9resgC5Xk.lpi.zXfoAOIZj1mVriOQxwatwoKdJ/ZxGbnsOU5TW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario_gastronomia`
--
ALTER TABLE `usuario_gastronomia`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario_gastronomia`
--
ALTER TABLE `usuario_gastronomia`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_gastronomia`
--
ALTER TABLE `usuario_gastronomia`
  ADD CONSTRAINT `usuario_gastronomia_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera_gastronomia` (`carrera_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
