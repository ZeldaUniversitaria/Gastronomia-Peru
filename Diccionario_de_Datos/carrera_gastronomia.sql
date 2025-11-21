-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 21-11-2025 a las 09:24:16
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
-- Estructura de tabla para la tabla `carrera_gastronomia`
--

CREATE TABLE `carrera_gastronomia` (
  `carrera_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carrera_gastronomia`
--

INSERT INTO `carrera_gastronomia` (`carrera_id`, `nombre`, `descripcion`) VALUES
(1, 'Licenciatura en Diseño Digital de Medios Interactivos', 'Formación enfocada en el desarrollo de contenidos digitales, diseño interactivo, animación y entornos virtuales.'),
(2, 'Licenciatura en Diseño Gráfico', 'Estudia los fundamentos del diseño visual, la comunicación gráfica y la creación de identidad visual.'),
(3, 'Licenciatura en Diseño Industrial', 'Carrera orientada al diseño y desarrollo de productos funcionales e innovadores para la industria.'),
(4, 'Ingeniería en Sistemas', 'Forma profesionales capaces de desarrollar, implementar y administrar sistemas informáticos y soluciones tecnológicas.'),
(5, 'Ingeniería en Mecatrónica', 'Integra mecánica, electrónica y programación para la automatización y el control de sistemas inteligentes.'),
(6, 'Licenciatura en Psicología', 'Estudia el comportamiento humano y los procesos mentales para promover el bienestar psicológico y social.'),
(7, 'Licenciatura en Pedagogía', 'Prepara profesionales en la enseñanza, planeación educativa y desarrollo de programas formativos.'),
(8, 'Licenciatura en Biotecnología', 'Explora el uso de organismos vivos para desarrollar productos y tecnologías innovadoras en salud, agricultura y ambiente.'),
(9, 'Licenciatura en Enfermería', 'Forma profesionales en el cuidado integral de la salud, atención clínica y promoción del bienestar.'),
(10, 'Licenciatura en Odontología', 'Capacita en la prevención, diagnóstico y tratamiento de enfermedades bucales, con enfoque clínico y de salud pública.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera_gastronomia`
--
ALTER TABLE `carrera_gastronomia`
  ADD PRIMARY KEY (`carrera_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera_gastronomia`
--
ALTER TABLE `carrera_gastronomia`
  MODIFY `carrera_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
