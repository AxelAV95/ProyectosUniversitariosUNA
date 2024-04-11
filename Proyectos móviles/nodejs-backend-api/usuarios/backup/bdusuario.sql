-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 01:51:29
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
-- Base de datos: `bdusuario`
--
CREATE DATABASE IF NOT EXISTS `bdusuario` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdusuario`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ActualizarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario` (IN `p_usuarioid` INT, IN `p_usuarionombre` VARCHAR(50), IN `p_usuariocorreo` VARCHAR(50), IN `p_usuariopassword` VARCHAR(50), IN `p_usuariotipo` VARCHAR(50), IN `p_usuariofecharegistro` DATE, IN `p_usuarioestado` INT)  BEGIN
    UPDATE tbusuario
    SET
        usuarionombre = p_usuarionombre,
        usuariocorreo = p_usuariocorreo,
        usuariopassword = p_usuariopassword,
        usuariotipo = p_usuariotipo,
        usuariofecharegistro = p_usuariofecharegistro,
        usuarioestado = p_usuarioestado
    WHERE
        usuarioid = p_usuarioid;
END$$

DROP PROCEDURE IF EXISTS `EliminarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (IN `p_usuarioid` INT)  BEGIN
    DELETE FROM tbusuario
    WHERE usuarioid = p_usuarioid;
END$$

DROP PROCEDURE IF EXISTS `InsertarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_usuarionombre` VARCHAR(50), IN `p_usuariocorreo` VARCHAR(50), IN `p_usuariopassword` VARCHAR(50), IN `p_usuariotipo` VARCHAR(50), IN `p_usuariofecharegistro` DATE, IN `p_usuarioestado` INT)  BEGIN
    INSERT INTO tbusuario (usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado)
    VALUES (p_usuarionombre, p_usuariocorreo, p_usuariopassword, p_usuariotipo, p_usuariofecharegistro, p_usuarioestado);
END$$

DROP PROCEDURE IF EXISTS `ObtenerUsuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUsuarios` ()  BEGIN
    SELECT *
    FROM tbusuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE `tbusuario` (
  `usuarioid` int(11) NOT NULL,
  `usuarionombre` varchar(50) NOT NULL,
  `usuariocorreo` varchar(50) NOT NULL,
  `usuariopassword` varchar(50) NOT NULL,
  `usuariotipo` varchar(50) NOT NULL,
  `usuariofecharegistro` date NOT NULL,
  `usuarioestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`usuarioid`, `usuarionombre`, `usuariocorreo`, `usuariopassword`, `usuariotipo`, `usuariofecharegistro`, `usuarioestado`) VALUES
(12, 'Axel AV', 'andrade.axel.21@gmail.com', '123456', 'Administrador', '2023-06-19', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`usuarioid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `usuarioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
