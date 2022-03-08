-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2022 a las 09:20:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `web`
--
CREATE SCHEMA IF NOT EXISTS web;
USE web;

-- Estructura de tabla para la tabla `usuarios`

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL DEFAULT 'usuario',
  `fechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estructura de tabla para la tabla `contacto`

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fechaMensaje` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcado de datos para la tabla `contacto`

INSERT INTO `contacto` (`id_contacto`, `usuario`, `email`, `mensaje`, `fechaMensaje`) VALUES
(20, 'user', 'user@gmail.com', '18022022', '2022-02-18'),
(43, 'usuario', 'usuario@gmail.com', 'probando probando buenas', '2022-03-04');

-- Volcado de datos para la tabla `usuarios`

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `password`, `tipoUsuario`, `fechaNacimiento`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'administrador', '2002-07-29'),
(2, 'administrador', 'administrador@gmail.com', 'administrador', 'administrador', NULL),
(3, 'user', 'user@gmail.com', 'user', 'usuario', '2022-02-02'),
(4, 'usuario', 'usuario@gmail.com', 'usuario', 'usuario', '2022-02-09');

-- Indices de la tabla `contacto`

ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `email` (`email`);

-- Indices de la tabla `usuarios`

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id_alumno` (`id_usuario`);

-- AUTO_INCREMENT de la tabla `contacto`

ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

-- AUTO_INCREMENT de la tabla `usuarios`

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

-- Filtros para la tabla `contacto`

ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
