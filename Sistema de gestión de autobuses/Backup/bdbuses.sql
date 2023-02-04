-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2018 a las 02:48:06
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbuses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `empleadoid` int(11) NOT NULL,
  `empleadocedula` int(10) NOT NULL,
  `empleadonombre` varchar(20) NOT NULL,
  `empleadoapellido1` varchar(20) NOT NULL,
  `empleadoapellido2` varchar(20) NOT NULL,
  `empleadotelefono` int(9) NOT NULL,
  `empleadodireccion` varchar(120) NOT NULL,
  `empleadocuentabancaria` varchar(20) DEFAULT NULL,
  `empleadolicenciaid` int(11) NOT NULL,
  `empleadotipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Convertir de string a int telefono y cédula';

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`empleadoid`, `empleadocedula`, `empleadonombre`, `empleadoapellido1`, `empleadoapellido2`, `empleadotelefono`, `empleadodireccion`, `empleadocuentabancaria`, `empleadolicenciaid`, `empleadotipo`) VALUES
(1, 999999999, '@nombre', '@apellido1', '@apellido2', 99999999, '@direccion', '99999999999999999999', 3, 4),
(2, 888888888, '@nombre', '@apellido1', '@apellido2', 88888888, '@direccion', '88888888888888888888', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblicencia`
--

CREATE TABLE `tblicencia` (
  `licenciaid` int(11) NOT NULL,
  `licenciaempleadoid` int(11) NOT NULL,
  `licenciatipolicencia` varchar(30) NOT NULL,
  `licenciafechavencimiento` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblicencia`
--

INSERT INTO `tblicencia` (`licenciaid`, `licenciaempleadoid`, `licenciatipolicencia`, `licenciafechavencimiento`) VALUES
(1, 1, 'A,B1', '2018-11-12,2018-11-14'),
(2, 2, 'A', '2018-11-15'),
(3, 1, 'A', '2018-12-21'),
(4, 2, 'A', '2018-11-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmantenimiento`
--

CREATE TABLE `tbmantenimiento` (
  `mantenimientoid` int(11) NOT NULL,
  `mantenimientovehiculoid` varchar(20) NOT NULL,
  `mantenimientoempleadoid` varchar(20) NOT NULL,
  `mantenimientofechainicio` varchar(40) NOT NULL,
  `mantenimientofechafin` varchar(40) NOT NULL,
  `mantenimientocostounitario` varchar(20) NOT NULL,
  `mantenimientodetallecostounitario` varchar(60) NOT NULL,
  `mantenimientocostototal` varchar(10) NOT NULL,
  `mantenimientofrenos` int(1) DEFAULT NULL,
  `mantenimientocarroceria` int(1) DEFAULT NULL,
  `mantenimientomotor` int(1) DEFAULT NULL,
  `mantenimientorotulasuspension` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmantenimiento`
--

INSERT INTO `tbmantenimiento` (`mantenimientoid`, `mantenimientovehiculoid`, `mantenimientoempleadoid`, `mantenimientofechainicio`, `mantenimientofechafin`, `mantenimientocostounitario`, `mantenimientodetallecostounitario`, `mantenimientocostototal`, `mantenimientofrenos`, `mantenimientocarroceria`, `mantenimientomotor`, `mantenimientorotulasuspension`) VALUES
(1, '1', '1', '2018-11-20', '2018-11-21', '5', 'hola', '5', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmarchamo`
--

CREATE TABLE `tbmarchamo` (
  `marchamoid` int(11) NOT NULL,
  `marchamovehiculoid` varchar(20) NOT NULL,
  `marchamomonto` int(15) NOT NULL,
  `marchamomontopartes` int(15) NOT NULL,
  `marchamofechapago` date NOT NULL,
  `marchamomultainteres` int(11) NOT NULL,
  `marchamomontoneto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmarchamo`
--

INSERT INTO `tbmarchamo` (`marchamoid`, `marchamovehiculoid`, `marchamomonto`, `marchamomontopartes`, `marchamofechapago`, `marchamomultainteres`, `marchamomontoneto`) VALUES
(1, '1', 150000, 0, '2018-11-30', 20000, 170000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreparacionhistorico`
--

CREATE TABLE `tbreparacionhistorico` (
  `reparacionhistoricoid` int(11) NOT NULL,
  `reparacionhistoricoempleadoid` int(11) NOT NULL,
  `reparacionhistoricobusid` int(11) NOT NULL,
  `reparacionhistoricofecha` varchar(30) NOT NULL,
  `reparacionmantenimientoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbreparacionhistorico`
--

INSERT INTO `tbreparacionhistorico` (`reparacionhistoricoid`, `reparacionhistoricoempleadoid`, `reparacionhistoricobusid`, `reparacionhistoricofecha`, `reparacionmantenimientoid`) VALUES
(1, 1, 1, '2018-11-20-2018-11-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrtv`
--

CREATE TABLE `tbrtv` (
  `rtvid` int(11) NOT NULL,
  `rtvempleadoid` int(11) NOT NULL,
  `rtvvehiculoid` int(11) NOT NULL,
  `rtvfechavencimiento` date NOT NULL,
  `rtvmontobase` int(11) NOT NULL,
  `rtvmontoacumulado` int(11) NOT NULL,
  `rtvestado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrtvhistorico`
--

CREATE TABLE `tbrtvhistorico` (
  `rtvhistoricoid` int(11) NOT NULL,
  `rtvhistoricovehiculoid` int(11) NOT NULL,
  `rtvhistoricoanio` int(11) NOT NULL,
  `rtvempleadoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbrtvhistorico`
--

INSERT INTO `tbrtvhistorico` (`rtvhistoricoid`, `rtvhistoricovehiculoid`, `rtvhistoricoanio`, `rtvempleadoid`) VALUES
(3, 1, 2018, 2),
(4, 1, 2018, 2),
(5, 1, 2018, 2),
(6, 1, 2018, 2),
(7, 1, 2018, 2),
(8, 1, 2018, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbruta`
--

CREATE TABLE `tbruta` (
  `rutaid` int(11) NOT NULL,
  `rutacodigo` int(10) NOT NULL,
  `rutalugarsalida` varchar(50) NOT NULL,
  `rutalugardestino` varchar(50) NOT NULL,
  `rutatarifaminima` int(10) NOT NULL,
  `rutatarifamaxima` int(10) NOT NULL,
  `rutatiempopromedio` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbruta`
--

INSERT INTO `tbruta` (`rutaid`, `rutacodigo`, `rutalugarsalida`, `rutalugardestino`, `rutatarifaminima`, `rutatarifamaxima`, `rutatiempopromedio`) VALUES
(1, 2147483647, '@salida', '@destino', 300, 2000, '01:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrutahorario`
--

CREATE TABLE `tbrutahorario` (
  `rutahorarioid` int(10) NOT NULL,
  `rutahorariorutaid` int(10) NOT NULL,
  `rutahorariotipodia` varchar(15) NOT NULL,
  `rutahorariohora` varchar(120) NOT NULL,
  `rutahorariobus` varchar(120) NOT NULL,
  `rutahorarioidavuelta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrutatarifa`
--

CREATE TABLE `tbrutatarifa` (
  `rutatarifaid` int(11) NOT NULL,
  `rutatarifarutaid` int(10) NOT NULL,
  `rutatarifaidavuelta` int(1) NOT NULL,
  `rutatarifalugares` varchar(80) NOT NULL,
  `rutatarifamonto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoempleado`
--

CREATE TABLE `tbtipoempleado` (
  `tipoempleadoid` int(11) NOT NULL,
  `tipoempleadonombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoempleado`
--

INSERT INTO `tbtipoempleado` (`tipoempleadoid`, `tipoempleadonombre`) VALUES
(1, 'Chofer'),
(2, 'Cajero'),
(3, 'Asistente'),
(4, 'Mecanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbvehiculo`
--

CREATE TABLE `tbvehiculo` (
  `vehiculoid` varchar(20) NOT NULL,
  `vehiculoplaca` varchar(12) NOT NULL,
  `vehiculomarca` varchar(25) NOT NULL,
  `vehiculomodelo` varchar(25) NOT NULL,
  `vehiculotipo` varchar(8) NOT NULL,
  `vehiculocapacidad` int(11) NOT NULL,
  `vehiculoestado` varchar(15) NOT NULL,
  `vehiculoempleadoid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbvehiculo`
--

INSERT INTO `tbvehiculo` (`vehiculoid`, `vehiculoplaca`, `vehiculomarca`, `vehiculomodelo`, `vehiculotipo`, `vehiculocapacidad`, `vehiculoestado`, `vehiculoempleadoid`) VALUES
('1', '999999999999', '@marca', '@modelo', 'Bus', 40, 'Disponible', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`empleadoid`),
  ADD KEY `tb_empleados_ibfk_1` (`empleadolicenciaid`),
  ADD KEY `tb_empleados_ibfk_2` (`empleadotipo`);

--
-- Indices de la tabla `tblicencia`
--
ALTER TABLE `tblicencia`
  ADD PRIMARY KEY (`licenciaid`),
  ADD KEY `licenciaempleadoid` (`licenciaempleadoid`);

--
-- Indices de la tabla `tbmantenimiento`
--
ALTER TABLE `tbmantenimiento`
  ADD PRIMARY KEY (`mantenimientoid`);

--
-- Indices de la tabla `tbmarchamo`
--
ALTER TABLE `tbmarchamo`
  ADD PRIMARY KEY (`marchamoid`);

--
-- Indices de la tabla `tbreparacionhistorico`
--
ALTER TABLE `tbreparacionhistorico`
  ADD PRIMARY KEY (`reparacionhistoricoid`);

--
-- Indices de la tabla `tbrtv`
--
ALTER TABLE `tbrtv`
  ADD PRIMARY KEY (`rtvid`);

--
-- Indices de la tabla `tbrtvhistorico`
--
ALTER TABLE `tbrtvhistorico`
  ADD PRIMARY KEY (`rtvhistoricoid`);

--
-- Indices de la tabla `tbruta`
--
ALTER TABLE `tbruta`
  ADD PRIMARY KEY (`rutacodigo`);

--
-- Indices de la tabla `tbrutahorario`
--
ALTER TABLE `tbrutahorario`
  ADD PRIMARY KEY (`rutahorarioid`);

--
-- Indices de la tabla `tbrutatarifa`
--
ALTER TABLE `tbrutatarifa`
  ADD PRIMARY KEY (`rutatarifaid`);

--
-- Indices de la tabla `tbtipoempleado`
--
ALTER TABLE `tbtipoempleado`
  ADD PRIMARY KEY (`tipoempleadoid`);

--
-- Indices de la tabla `tbvehiculo`
--
ALTER TABLE `tbvehiculo`
  ADD PRIMARY KEY (`vehiculoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
