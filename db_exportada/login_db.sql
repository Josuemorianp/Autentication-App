-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2023 a las 16:43:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasena`, `nombre`, `bio`, `phone`, `photo`) VALUES
(1, 'admin@admin', '$2y$10$HQZMGRT2YWFNZGJ3agGyvOVOMt5n6ZlZ7xhjsOQCaXwfksquQviha', 'admin', 'el admin que administra administradamente', '+580000000000', NULL),
(2, 'test@test', 'admin', 'test', 'tester que testea testeadamente', '+58 0000000', NULL),
(3, 'prueba@prueba', '$2y$10$rzBPFtIfyuFQtVSRPBKoDeofVipkPJMV7Ft8bG8fcXmh2MyhGusTm', NULL, NULL, NULL, NULL),
(4, 'admdin@admin', '$2y$10$WYpRHwFn4yNu/Zm.kRrqGeQXmPpIharSHOEokOWqMk1ChRQ9b.S2G', NULL, NULL, NULL, NULL),
(5, 'prueba2@prueba', '$2y$10$Fw607.i.ueNt/A/Mp.YOQOByazJXz/HCmhfL.TU8EKQHBlXcXaE26', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
