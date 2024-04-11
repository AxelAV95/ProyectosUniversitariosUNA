-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-10-2022 a las 10:41:13
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmanga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenero`
--

CREATE TABLE `tbgenero` (
  `generoid` int(11) NOT NULL,
  `generonombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbgenero`
--

INSERT INTO `tbgenero` (`generoid`, `generonombre`) VALUES
(1, 'Shonen'),
(2, 'Aventura'),
(3, 'Romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtomo`
--

CREATE TABLE `tbtomo` (
  `tomoid` int(11) NOT NULL,
  `tomonombre` varchar(255) NOT NULL,
  `tomonumero` int(11) NOT NULL,
  `tomoanio` int(11) NOT NULL,
  `tomogenero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbtomo`
--

INSERT INTO `tbtomo` (`tomoid`, `tomonombre`, `tomonumero`, `tomoanio`, `tomogenero`) VALUES
(1, 'One piece', 13, 1997, '1,2'),
(2, 'Bleach', 1, 2001, '1'),
(3, 'Naruto', 1, 2003, '1'),
(10, 'HxH', 1, 1998, '1,2'),
(11, 'Dragon ball', 10, 1991, '1'),
(14, 'Kimi ni todoke', 1, 2001, '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`generoid`);

--
-- Indices de la tabla `tbtomo`
--
ALTER TABLE `tbtomo`
  ADD PRIMARY KEY (`tomoid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbtomo`
--
ALTER TABLE `tbtomo`
  MODIFY `tomoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
