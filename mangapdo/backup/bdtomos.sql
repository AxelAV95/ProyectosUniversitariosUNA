-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2022 a las 05:33:38
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
-- Base de datos: `bdtomos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarTomo` (IN `nombre` VARCHAR(255), IN `numero` INT, IN `anio` INT, IN `id` INT)  UPDATE `tbtomo` SET `tomonombre`= nombre,`tomonumero`=numero,`tomoanio`=anio WHERE `tomoid` = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarTomo` (IN `id` INT)  DELETE FROM `tbtomo` WHERE `tomoid` = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarTomo` (IN `id` INT, IN `nombre` VARCHAR(255), IN `numero` INT, IN `anio` INT)  INSERT INTO `tbtomo` VALUES (id,nombre,numero,anio)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTomos` ()  SELECT * FROM `tbtomo`$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtomo`
--

CREATE TABLE `tbtomo` (
  `tomoid` int(11) NOT NULL,
  `tomonombre` varchar(255) NOT NULL,
  `tomonumero` int(11) NOT NULL,
  `tomoanio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbtomo`
--

INSERT INTO `tbtomo` (`tomoid`, `tomonombre`, `tomonumero`, `tomoanio`) VALUES
(1, 'One piece', 1, 1997),
(2, 'Bleach', 1, 2001),
(3, 'Naruto', 1, 2003);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbtomo`
--
ALTER TABLE `tbtomo`
  ADD PRIMARY KEY (`tomoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
