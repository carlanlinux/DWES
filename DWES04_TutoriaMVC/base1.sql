-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2020 a las 12:51:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base1`
--
CREATE DATABASE IF NOT EXISTS `base1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `base1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos`
(
    `codigo`      int(11)                                NOT NULL,
    `nombre`      varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
    `mail`        varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
    `codigocurso` int(11)                                NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`codigo`, `nombre`, `mail`, `codigocurso`)
VALUES (1, 'Diego', 'diego@gmail.com', 3),
       (2, 'Almudena', 'almudena@gmail.com', 2),
       (3, 'Patricia', 'patricia@gmail.com', 3),
       (4, 'Javier', 'javier@gmail.com', 3),
       (5, 'Lucas', 'lucasa@gmail.com', 2),
       (6, 'Marta', 'martaa@gmail.com', 3),
       (7, 'Jesús', 'jesus@gmail.com', 1),
       (8, 'Félix', 'felix@gmail.com', 2),
       (9, 'Alicia', 'aliciaa@gmail.com', 3),
       (10, 'Sara', 'sara@gmail.com', 1),
       (11, 'Jose', 'jose@gmail.com', 2),
       (12, 'Rodrigo', 'rodrigo@gmail.com', 3),
       (13, 'Guillermo', 'gullermo@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos`
(
    `codigo`      int(11)                                NOT NULL,
    `nombrecurso` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codigo`, `nombrecurso`)
VALUES (1, 'PHP'),
       (2, 'ASP'),
       (3, 'JSP');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
    ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
    ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
    MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 14;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
    MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
