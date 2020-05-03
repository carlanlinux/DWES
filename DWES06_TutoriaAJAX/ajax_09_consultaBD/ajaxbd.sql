-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2019 a las 12:08:39
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
-- Base de datos: `ajaxbd`
--
CREATE DATABASE IF NOT EXISTS `ajaxbd` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `ajaxbd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajaxbd`
--

DROP TABLE IF EXISTS `ajaxbd`;
CREATE TABLE `ajaxbd`
(
    `id`        int(2)                              NOT NULL,
    `firstname` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
    `lastname`  varchar(20) COLLATE utf8_spanish_ci NOT NULL,
    `age`       int(2)                              NOT NULL,
    `hometown`  int(20)                             NOT NULL,
    `job`       int(25)                             NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ajaxbd`
--

INSERT INTO `ajaxbd` (`id`, `firstname`, `lastname`, `age`, `hometown`, `job`)
VALUES (0, 'FirstName', 'LastName', 0, 0, 0),
       (1, 'Peter', 'Griffin', 41, 0, 0),
       (2, 'Lois', 'Griffin', 40, 0, 0),
       (3, 'Joseph', 'Swanson', 39, 0, 0),
       (4, 'Glenn', 'Quagmire', 41, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
