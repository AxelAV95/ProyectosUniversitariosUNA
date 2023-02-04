-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 03:22:27
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsaf2`
--
CREATE DATABASE IF NOT EXISTS `dbsaf2` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dbsaf2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE `tbcliente` (
  `clienteid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clientecedula` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `clientenombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clienteapellido1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clienteapellido2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clientedireccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `clientecorreo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clientetelefono` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `clientemedidor` int(50) NOT NULL,
  `clientecasas` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clientetipo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clienteestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`clienteid`, `clientecedula`, `clientenombre`, `clienteapellido1`, `clienteapellido2`, `clientedireccion`, `clientecorreo`, `clientetelefono`, `clientemedidor`, `clientecasas`, `clientetipo`, `clienteestado`) VALUES
('9500001', '', 'Jennifer', 'Ellis', 'Araya', 'Finca 2', '', '', 4447, '1', '2', 1),
('9500002', '', 'Ingrid', 'García', 'Alemán', 'Finca 2', '', '', 4448, '2', '2', 1),
('9500003', '', 'José', 'Garita', 'Rubí', 'Finca 2', '', '', 4451, '1', '2', 1),
('9500004', '', 'Jean Carlos', 'Cedeño', 'Medrano', 'Finca 2', '', '', 4452, '1', '2', 1),
('9500005', '', 'Dayana', 'Aguirre', 'Rojas', 'Finca 2', '', '', 4453, '1', '2', 1),
('9500006', '', 'Shirley', 'Espinoza', 'Rubí', 'Finca 2', '', '', 4454, '1', '2', 1),
('9500007', '', 'Angelica', 'Santamaría', 'AS', 'Finca 2', '', '', 5187, '1', '2', 1),
('9500008', '', 'Suly', 'Ellis', 'Araya', 'Finca 2', '', '', 5189, '1', '2', 1),
('9500009', '', 'Jaqueline', 'Trejos', 'Villagra', 'Finca 2', '', '', 5191, '1', '2', 1),
('9500010', '', ' Kerlin', 'Herrera', 'Rivera', 'Finca 2', '', '', 5193, '1', '2', 1),
('9500011', '', 'Guadalupe', 'Mora', 'Salazar', 'Finca 2', '', '', 7924, '1', '2', 1),
('9500014', '', 'Marcos', 'Benavides', 'Porras', 'Finca 2', '', '', 16825, '1', '2', 1),
('9500015', '', 'ADI', 'Finca dos', 'Comunal', 'Finca 2', '', '', 16826, '1', '2', 1),
('9500016', '', 'Farina', 'Murillo', 'Castro', 'Finca 2', '', '', 16827, '1', '2', 1),
('9500017', '', 'Ana', 'Montero', 'Venegas', 'Finca 2', '', '', 16828, '1', '2', 1),
('9500018', '', 'Nely', 'Jiménez', 'Hernández', 'Finca 2', '', '', 16829, '1', '2', 1),
('9500019', '', 'Cecilia', 'Mora', 'Salazar', 'Finca 2', '', '', 16830, '1', '2', 1),
('9500020', '', 'Patricia', 'Marín', 'Cartín', 'Finca 2', '', '', 16831, '1', '2', 1),
('9500021', '', 'Francisco', 'Rodríguez', 'Araya', 'Finca 2', '', '', 16832, '1', '1', 1),
('9500022', '', 'Cecilia', 'Barboza', 'Alvarado', 'Finca 2', '', '', 16833, '1', '2', 1),
('9500023', '', 'Carlos', 'Corella', 'Mora', 'Finca 2', '', '', 16834, '1', '2', 1),
('9500024', '', 'Efrain', 'Camacho', 'Hernández', 'Finca 2', '', '', 35577, '1', '2', 1),
('9500025', '', 'Luis', 'Cortéz', 'Rodríguez', 'Finca 2', '', '', 36906, '1', '2', 1),
('9500026', '', 'Mariam', 'Quiros', 'Brenes', 'Finca 2', '', '', 36909, '1', '2', 1),
('9500027', '', 'Eliza', 'Sandoval', 'Solano', 'Finca 2', '', '', 36913, '1', '2', 1),
('9500028', '', 'Oscar', 'Chávez', 'Sibaja', 'Finca 2', '', '', 36914, '1', '2', 1),
('9500029', '', 'Darling', 'Rodríguez', 'DR', 'Finca 2', '', '', 36915, '1', '2', 1),
('9500030', '', 'Patronato', 'Escolar', 'Finca dos', 'Finca 2', '', '', 37916, '1', '2', 1),
('9500031', '', 'Marta', 'Rodríguez', 'Araya', 'Finca 2', '', '', 37917, '1', '2', 1),
('9500032', '', 'Daniel', 'Cordero', 'Granados', 'Finca 2', '', '', 37920, '2', '2', 1),
('9500033', '', 'Odir', 'Botris', 'OB', 'Finca 2', '', '', 37921, '1', '2', 1),
('9500034', '', 'Noylin', 'Sevilla', 'Jiménez', 'Finca 2', '', '', 38886, '1', '2', 1),
('9500035', '', 'Dignora', 'González', 'Ruíz', 'Finca 2', '', '', 38888, '2', '2', 1),
('9500036', '', 'Erika', 'Aguirre', 'Rojas', 'Finca 2', '', '', 38889, '1', '2', 1),
('9500037', '', 'Senia', 'Urbina', 'Madrigal', 'Finca 2', '', '', 38890, '1', '2', 1),
('9500038', '', 'Valeriano', 'González', 'Cruz', 'Finca 2', '', '', 43669, '1', '2', 1),
('9500039', '', 'Carmen', 'Porras', 'Araya', 'Finca 2', '', '', 49202, '1', '1', 1),
('9500040', '', 'Keilyn', 'Aguilar', 'Jiménez', 'Finca 2', '', '', 93662, '1', '2', 1),
('9500041', '', 'Adita', 'Fallas', 'Rodríguez', 'Finca 2', '', '', 103725, '1', '2', 1),
('9500042', '', 'Belisa', 'Calderón', 'Fernández', 'Finca 2', '', '', 154450, '1', '2', 1),
('9500043', '', 'Maritza', 'Mora', 'Salazar', 'Finca 2', '', '', 196796, '1', '2', 1),
('9500044', '', 'Viviana', 'Fallas', 'Rodríguez', 'Finca 2', '', '', 196797, '1', '2', 1),
('9500045', '', 'Rebeca', 'Brenes', 'Valverde', 'Finca 2', '', '', 196798, '1', '2', 1),
('9500046', '', 'Mayra', 'Cartín ', 'Araya', 'Finca 2 - Casa N2', '', '', 196799, '1', '2', 1),
('9500047', '', 'Marcos', 'Durán', 'Alfaro', 'Finca 2 - (Oso)', '', '', 247156, '1', '2', 1),
('9500048', '', 'Oldemar', 'Salas', 'Monge', 'Finca 2', '', '', 247157, '1', '2', 1),
('9500049', '', 'Álvaro', 'Muñoz', 'Martínez', 'Finca 2', '', '', 247159, '1', '2', 1),
('9500050', '', 'Minor', 'Mesén', 'Mora', 'Finca 2', '', '', 247160, '2', '2', 1),
('9500051', '', 'Alvaro', 'Castro', 'Segura', 'Finca 2', '', '', 247161, '2', '2', 1),
('9500052', '', 'Cristina', 'Castro', 'Segura', 'Finca 2', '', '', 247162, '1', '2', 1),
('9500053', '', 'Elieth', 'Medrano', 'Rodríguez', 'Finca 2', '', '', 247163, '1', '2', 1),
('9500054', '', 'Mayra', 'Cartín', 'Araya', 'Finca 2 - Casa N3', '', '', 247164, '1', '2', 1),
('9500055', '', 'Carlos', 'Sibaja', 'Madrigal', 'Finca 2 - Casa N2', '', '', 247165, '1', '2', 1),
('9500056', '', 'Ramón', 'Gónzalez', 'Sánchez', 'Finca 2', '', '', 247166, '1', '2', 1),
('9500057', '', 'María', 'Araya', 'Agüero', 'Finca 2', '', '', 247167, '1', '1', 1),
('9500058', '', 'José Luis', 'Rodríguez', 'Castillo', 'Finca 2', '', '', 247168, '1', '2', 1),
('9500059', '', 'Sara María', 'López', 'Carrillo', 'Finca 2', '', '', 247169, '1', '2', 1),
('9500060', '', 'Alba', 'Trejos', 'Córtez', 'Finca 2', '', '', 247170, '1', '2', 1),
('9500061', '', 'Virginia', 'López', 'Calderón', 'Finca 2', '', '', 247171, '1', '2', 1),
('9500062', '', 'Asociación', 'de ', 'Mujeres(ORG)', 'Finca 2', '', '', 247172, '1', '2', 1),
('9500063', '111111111', 'Junta', 'de ', 'Educación (casa 1)', 'Finca 2', 'test@gmail.com', '11111111', 247173, '1', '2', 1),
('9500064', '', 'Araceli', 'Sandí', 'Alvarez', 'Finca 2', '', '', 247175, '1', '2', 1),
('9500065', '', 'Roxinia', 'Durán', 'Alfaro', 'Finca 2', '', '', 247176, '1', '2', 1),
('9500066', '', 'Ismael', 'Soto', 'Jiménez', 'Finca 2', '', '', 247177, '1', '2', 1),
('9500067', '', 'Claudio', 'Barrantes', 'Hernández', 'Finca 2', '', '', 247178, '2', '2', 1),
('9500068', '', 'Flor', 'Gómez', 'Vargas', 'Finca 2', '', '', 247179, '1', '1', 1),
('9500069', '', 'Dunia', 'Jiménez', 'Mayorga', 'Finca 2', '', '', 247180, '2', '1', 1),
('9500070', '', 'Catalina', 'Rubí', 'Acuña', 'Finca 2', '', '', 247181, '1', '2', 1),
('9500071', '', 'Carmen', 'Porras', 'Araya', 'Finca 2', '', '', 247182, '1', '2', 1),
('9500072', '', 'Oficina', 'de', 'Salud', 'Finca 2', '', '', 247183, '1', '2', 1),
('9500073', '', 'María Eugenia', 'Jiménez', 'Marín', 'Finca 2', '', '', 247184, '1', '2', 1),
('9500074', '111111111', 'Junta', 'de ', 'Educación (casa 2)', 'Finca 2', 'test@gmail.com', '11111111', 247185, '1', '2', 1),
('9500075', '', 'Juan', 'Sequeira', 'Pizarro', 'Finca 2', '', '', 247186, '1', '2', 2),
('9500076', '', 'Victor', 'Araya', 'Padilla', 'Finca 2', '', '', 247187, '1', '2', 1),
('9500077', '', 'Miguel', 'Carmona', 'Abarca', 'Finca 2', '', '', 247188, '1', '2', 1),
('9500078', '', 'Alberto', 'Aguirre', 'Quesada', 'Finca 2', '', '', 247189, '1', '2', 1),
('9500079', '', 'Luis', 'Cortéz', 'Rodríguez', 'Finca 2', '', '', 247190, '1', '2', 1),
('9500080', '', 'Edwin', 'Araya', 'Mora', 'Finca 2', '', '', 247191, '1', '2', 1),
('9500081', '', 'Juana', 'Castro', 'Aguirre', 'Finca 2', '', '', 247193, '1', '2', 1),
('9500082', '', 'Carlos', 'Sibaja', 'Madrigal', 'Finca 2', '', '', 247194, '1', '1', 1),
('9500083', '', 'Roxinia', 'Cortés', 'Cortés', 'Finca 2', '', '', 247195, '1', '2', 1),
('9500084', '', 'Carlos', 'Fernández', 'Arias', 'Finca 2', '', '', 247196, '1', '1', 1),
('9500085', '', 'Ilce', 'Porras', 'González', 'Finca 2', '', '', 247197, '1', '2', 1),
('9500086', '', 'Jorge', 'Sánchez', 'Segura', 'Finca 2', '', '', 247200, '2', '1', 1),
('9500087', '', 'Ana Melida', 'Fallas', 'Rodríguez', 'Finca 2', '', '', 247201, '1', '2', 1),
('9500088', '', 'David', 'Rodríguez', 'Chavarría', 'Finca 2', '', '', 247202, '1', '2', 1),
('9500089', '', 'Janet', 'Matarrita', 'Rangen', 'Finca 2', '', '', 247203, '1', '2', 1),
('9500090', '', 'María', 'Andrade', 'Villalobos', 'Finca 2', 'andrade.axel.21@gmail.com', '', 247204, '1', '2', 1),
('9500091', '', 'Dagoberto', 'Marín', 'Morales(Casa Karen)', 'Finca 2', '', '', 247205, '1', '2', 1),
('9500092', '', 'Ramón', 'Agüero', 'Agüero', 'Finca 2', '', '', 247206, '1', '2', 1),
('9500093', '', 'Vanessa', 'Rodríguez', 'Valerio', 'Finca 2', '', '', 247207, '1', '2', 1),
('9500094', '', 'Alejandrina', 'Rodríguez ', 'Reyes', 'Finca 2', '', '', 247208, '1', '2', 1),
('9500095', '', 'Flor', 'Gómez', 'Vargas', 'Finca 2 - Casa', '', '', 247209, '1', '2', 1),
('9500096', '', 'Nelly', 'Chávez', 'Calvo', 'Finca 2', '', '', 247210, '1', '2', 1),
('9500097', '', 'Damaris', 'Bogantes', 'Badilla', 'Finca 2', '', '', 247211, '1', '2', 1),
('9500098', '', 'Marvin', 'González', 'Loría', 'Finca 2', '', '', 247212, '1', '2', 1),
('9500099', '', 'Manuel', 'Quintanilla', 'Romero', 'F', '', '', 247213, '1', '2', 1),
('9500100', '', 'Katia', 'Zuñiga', 'Victor', 'Finca 2', '', '', 247214, '1', '2', 1),
('9500101', '', 'Juaquin', 'Camacho', 'JC', 'Finca 2', '', '', 247215, '1', '2', 1),
('9500102', '', 'Roger', 'Murillo', 'Villegas', 'Finca 2', '', '', 247216, '1', '2', 1),
('9500103', '', 'Nelly', 'Sánchez ', 'Oses', 'Finca 2', '', '', 247217, '1', '2', 1),
('9500104', '', 'Marcos', 'Guerrero', 'Paniagüa', 'Finca 2', '', '', 247218, '1', '2', 1),
('9500105', '', 'Catalina', 'Villagra', 'Gómez', 'Finca 2', '', '', 247219, '1', '2', 1),
('9500106', '', 'Ana Lidia', 'Trejos', 'Trejos', 'Finca 2', '', '', 247221, '1', '2', 1),
('9500107', '', 'Yadira', 'Jiménez', 'Jiménez', 'Finca 2', '', '', 247222, '1', '2', 1),
('9500108', '', 'Eduviges', 'Carrillo', 'Sánchez', 'Finca 2', '', '', 247223, '1', '2', 1),
('9500109', '', 'Maritza', 'López', 'Araya', 'Finca 2', '', '', 247224, '1', '2', 1),
('9500110', '', 'Aura Estela', 'Espinoza', 'Blandón', 'Finca 2', '', '', 247225, '1', '2', 2),
('9500111', '', 'William', 'Morera', 'Ramírez', 'Finca 2', '', '', 247226, '1', '2', 1),
('9500112', '', 'Bernarda', 'Fernández', 'Granados', 'Finca 2', '', '', 247227, '1', '2', 1),
('9500113', '', 'Juan', 'Jiménez', 'García', 'Finca 2', '', '', 247229, '1', '2', 1),
('9500114', '', 'Sulay', 'Villalobos', 'Salas', 'Finca 2', '', '', 247230, '1', '2', 1),
('9500115', '', 'Olga ', 'Campos', 'Carranza', 'Finca 2', '', '', 247231, '1', '2', 1),
('9500116', '', 'Manuel', 'Abarca', 'Carmona', 'Finca 2', '', '', 247232, '1', '2', 1),
('9500117', '', 'Ana', 'Yancy', 'Camacho', 'Finca 2', '', '', 247234, '1', '2', 1),
('9500118', '', 'Victor', 'Vargas', 'Rojas', 'Finca 2', '', '', 247235, '1', '2', 1),
('9500119', '', 'Martín', 'Victor', 'Tenorio', 'Finca 2', '', '', 247236, '1', '2', 1),
('9500120', '', 'Doris', 'Muñoz', 'Martínez', 'Finca 2', '', '', 247237, '1', '2', 1),
('9500121', '', 'Cecilia', 'Castro', 'Aguirre', 'Finca 2', '', '', 247238, '1', '2', 1),
('9500122', '', 'Gerardo', 'Mosquera', 'Álvarez', 'Finca 2', '', '', 247239, '1', '2', 2),
('9500123', '', 'Marina', 'Sandoval', 'Solano', 'Finca 2', '', '', 247240, '1', '2', 1),
('9500124', '', 'Juan', 'Vargas', 'Rojas', 'Finca 2', '', '', 247241, '1', '1', 1),
('9500125', '', 'Virginia', 'Rodríguez', 'Rodríguez', 'Finca 2', '', '', 247242, '1', '2', 1),
('9500126', '', 'Edwin', 'Cedeño', 'Sanabria', 'Finca 2', '', '', 247243, '1', '1', 1),
('9500127', '', 'Mario', 'Vega', 'Ramírez', 'Finca 2', '', '', 247244, '1', '2', 1),
('9500128', '', 'Mayra', 'Cartín', 'Araya', 'Finca 2 - (Casa alquiler - Pamela)', '', '', 247245, '1', '2', 1),
('9500129', '', 'Mayela', 'Rubí', 'Acuña', 'Finca 2', '', '', 247246, '1', '2', 1),
('9500130', '111111111', 'Manuel', 'Araya', 'Calderón', 'Finca 2', 'test@gmail.com', '22222222', 247247, '1', '2', 1),
('9500131', '', 'Rogelio', 'Mejías', 'Jiménez', 'Finca 2', '', '', 247248, '2', '2', 1),
('9500132', '', 'Jorge', 'Sánchez', 'Segura', 'Finca 2', '', '', 247249, '1', '2', 1),
('9500133', '', 'Marlene', 'Patiño', 'Martínez', 'Finca 2', '', '', 247250, '1', '2', 1),
('9500134', '', 'Marian', 'García', 'Alemán', 'Finca 2', '', '', 247251, '1', '2', 1),
('9500135', '', 'María', 'Zarate', 'Ávila', 'Finca 2', '', '', 247252, '1', '2', 1),
('9500136', '', 'Xinia', 'Jiménez', 'Jiménez', 'Finca 2', '', '', 247253, '1', '2', 1),
('9500137', '', 'Edwin', 'Araya', 'Mora', 'Finca 2 - (Casa Irene)', '', '', 247254, '1', '2', 1),
('9500138', '', 'Miguel', 'López', 'Blanco', 'Finca 2', '', '', 247255, '1', '2', 1),
('9500139', '', 'Ana Yancy', 'Castro', 'Segura', 'Finca 2', '', '', 247256, '1', '2', 1),
('9500140', '', 'Margarita', 'Vega', 'Vega', 'Finca 2', '', '', 247257, '1', '2', 1),
('9500141', '', 'Manuel', 'Espinoza', 'Espinoza', 'Finca 2', '', '', 247258, '1', '2', 1),
('9500142', '', 'Alejo', 'Soto', 'Jiménez', 'Finca 2', '', '', 247259, '1', '2', 1),
('9500143', '', 'Allan', 'Benavides', 'Porras', 'Finca 2', '', '', 247260, '1', '2', 1),
('9500144', '', 'Madelina', 'Aguirre', 'Acevedo', 'Finca 2', '', '', 247261, '1', '2', 1),
('9500145', '', 'Roger', 'Araya', 'Mora', 'Finca 2', '', '', 247262, '1', '2', 1),
('9500146', '', 'Irian', 'Bogantes', 'Badilla', 'Finca 2', '', '', 247263, '1', '2', 1),
('9500147', '', 'Ángel ', 'Ruíz', 'Trejos', 'Finca 2', '', '', 247265, '1', '2', 1),
('9500148', '', 'Jorge', 'Montoya', 'Campos', 'Finca 2', '', '', 247266, '1', '2', 1),
('9500149', '', 'María', 'Berrocal', 'Chinchilla', 'Finca 2', '', '', 247267, '1', '2', 1),
('9500150', '', 'María Eugenia', 'Marín', 'Morales', 'Finca 2', '', '', 247268, '1', '2', 1),
('9500151', '', 'CEN', 'CINAI', 'ADEC', 'Finca 2', '', '', 247269, '1', '2', 1),
('9500152', '', 'Margarita', 'López', 'Viales', 'Finca 2', '', '', 247270, '1', '2', 1),
('9500153', '', 'EBAIS', 'Finca', 'Dos', 'Finca 2', '', '', 247272, '1', '2', 1),
('9500154', '', 'Iglesia', 'Vida', 'Abundante', 'Finca 2', '', '', 247273, '1', '2', 1),
('9500155', '', 'Marcos', 'Durán', 'Alfaro', 'Finca 2', '', '', 247274, '1', '2', 1),
('9500156', '', 'ADI', 'Finca dos', 'Comunitaria', 'Finca 2', '', '', 247275, '1', '2', 1),
('9500157', '', 'Rodolfo', 'Marín', 'Morales', 'Finca 2', '', '', 247284, '1', '2', 1),
('9500158', '', 'Asociación ', 'de ', 'desarrollo(DEPT)', 'Finca 2', '', '', 247731, '1', '2', 1),
('9500159', '', 'Irene', 'Rodríguez', 'Araya', 'Finca 2', '', '', 247732, '1', '2', 1),
('9500160', '', 'Rodrigo', 'Rodríguez', 'Matamoros', 'Finca 2', '', '', 247733, '1', '2', 1),
('9500161', '', 'Carlos', 'Loría', 'Mora', 'Finca 2', '', '', 247736, '1', '2', 1),
('9500162', '', 'Flor', 'Rodríguez', 'Cordero', 'Finca 2', '', '', 247737, '1', '2', 1),
('9500163', '', 'María', 'Madrigal', 'León', 'Finca 2', '', '', 247738, '1', '2', 1),
('9500164', '', 'Catalina', 'Mora', 'CM', 'Finca 2', '', '', 247739, '1', '1', 1),
('9500165', '', 'Junta', 'Edificadora', 'Catolica', 'Finca 2', '', '', 247740, '1', '2', 1),
('9500166', '', 'Alberto', 'Benavides', 'Porras', 'Finca 2', '', '', 324701, '1', '2', 1),
('9500167', '', 'Carlos', 'Guzmán', 'Vargas', 'Finca 2', '', '', 324704, '1', '2', 1),
('9500168', '000000000', 'Alice', 'Zumbado', 'AZ', 'Finca 2', 'd@gmail.com', '22222222', 324710, '2', '1', 1),
('9500169', '', 'Verania', 'Porras', 'Núñez', 'Finca 2', '', '', 325081, '1', '2', 1),
('9500170', '', 'Kindri', 'Arias', 'López', 'Finca 2', '', '', 325218, '1', '2', 1),
('9500171', '', 'Cintia', 'Espinoza', 'Rubi', 'Finca 2', '', '', 325584, '2', '2', 1),
('9500172', '', 'Alcoholicos', 'Anónimos', 'AA', 'Finca 2', '', '', 325585, '1', '2', 2),
('9500173', '', 'Jermy', 'Díaz', 'Delgado', 'Finca 2', '', '', 325586, '1', '2', 1),
('9500174', '', 'Rebeca', 'Rodríguez', 'Arrieta', 'Finca 2', '', '', 325589, '1', '2', 1),
('9500175', '', 'Ivania', 'Porras', 'Porras', 'Finca 2', '', '', 325694, '1', '2', 1),
('9500176', '', 'Eduardo', 'Trigueros', 'Vega', 'Finca 2', '', '', 353455, '1', '2', 1),
('9500177', '', 'Isaac', 'Ellis', 'Ellis', 'Finca 2', '', '', 353459, '1', '2', 1),
('9500178', '', 'Rolando', 'Cordero', 'González', 'Finca 2', '', '', 355601, '1', '2', 1),
('9500179', '', 'Dellanira', 'Araya', 'Venegas', 'Finca 2', '', '', 355602, '1', '2', 1),
('9500180', '', 'Iris', 'Cartín', 'Araya', 'Finca 2', '', '', 355603, '1', '2', 1),
('9500181', '', 'Blanca Nieves', 'Loría', 'Mora', 'Finca 2', '', '', 355604, '3', '1', 1),
('9500182', '', 'Ronald', 'Cartín', 'Araya', 'Finca 2', '', '', 355605, '1', '2', 1),
('9500183', '', 'Casa', 'Pastoral', 'CP', 'Finca 2', '', '', 355606, '1', '2', 1),
('9500184', '', 'Gerardina', 'Jiménez', 'García', 'Finca 2', '', '', 355607, '1', '2', 1),
('9500185', '', 'Selmira', 'Rodríguez', 'Chavarría', 'Finca 2', '', '', 355608, '1', '2', 1),
('9500186', '', 'Juan Carlos', 'Guzmán', 'Vasquez', 'Finca 2', '', '', 355609, '1', '2', 1),
('9500187', '', 'Edwin', 'Molina', 'Venegas', 'Finca 2', '', '', 355610, '1', '2', 1),
('9500188', '', 'Kendall', 'Montoya', 'Calderón', 'Finca 2', '', '', 355733, '1', '2', 1),
('9500189', '', 'Damaris', 'Benavides', 'Porras', 'Finca 2', '', '', 355739, '1', '2', 1),
('9500190', '', 'Silvia', 'Nuñez', 'Morales', 'Finca 2', '', '', 355761, '1', '2', 1),
('9500191', '', 'Maritza', 'Araya', 'Morales', 'Finca 2', '', '', 355762, '1', '2', 1),
('9500192', '', 'Edwin Gerardo ', 'Molina', 'Bustos', 'Finca 2', '', '', 355763, '1', '2', 1),
('9500193', '', 'Carmen', 'Venegas', 'Salas', 'Finca 2', '', '', 355764, '1', '2', 1),
('9500194', '', 'Maribel', 'Madrigal', 'Flores', 'Finca 2', '', '', 355765, '1', '2', 1),
('9500195', '', 'Dagoberto', 'Marín', 'Morales', 'Finca 2', '', '', 355766, '1', '2', 1),
('9500196', '', 'Ofelia', 'Herrera', 'Rivera', 'Finca 2', '', '', 355767, '1', '2', 1),
('9500197', '', 'Aura', 'Victor', 'Tenorio', 'Finca 2', '', '', 355768, '1', '2', 1),
('9500198', '', 'Rebeca', 'Alemán', 'Ramírez', 'Finca 2', '', '', 355769, '1', '2', 1),
('9500199', '', 'Antonio', 'Alfaro', 'Garro', 'Finca 2', '', '', 749201, '1', '2', 1),
('9500200', '', 'Elba', 'Valerio', 'Chávez', 'Finca 2', '', '', 749205, '1', '2', 1),
('9500201', '', 'Cecilio', 'Sánchez', 'Segura', 'Finca 2', '', '', 749209, '1', '2', 1),
('9500202', '', 'Cecilia', 'Mora', 'Salazar', 'Finca 2 - (Director)', '', '', 783097, '1', '2', 1),
('9500203', '', 'Deisy', 'Vargas', 'Porras', 'Finca 2', '', '', 783098, '1', '2', 1),
('9500204', '', 'Flor', 'Gómez', 'Vargas', 'Finca 2-(Casa alquiler)', '', '', 783099, '1', '2', 1),
('9500205', '111111111', 'Ramón', 'Alvarado', 'Alvarado', 'Finca 2', 'test@gmail.com', '11111111', 783100, '1', '2', 1),
('9500206', '', 'Cristobal', 'Chávez', 'Mora', 'Finca 2', '', '', 783101, '1', '2', 1),
('9500218', '', 'Lisbeth', 'López', 'G', 'Finca 2', '', '', 9500218, '0', '3', 3),
('9500208', '', 'Junior', 'Trejos', 'Durán', 'Finca 2', '', '', 14749206, '1', '2', 1),
('9500209', '', 'Flor', 'Gómez', 'Vargas', 'Finca 2', '', '', 15004449, '1', '1', 1),
('9500210', '', 'Jairo', 'Morera', 'Castro', 'Finca 2', '', '', 111037917, '1', '2', 1),
('9500211', '', 'Silvia', 'Benavides', 'Martínez', 'Finca 2', '', '', 111037922, '1', '2', 1),
('9500212', '', 'William', 'García', 'García', 'Finca 2', '', '', 111037923, '1', '2', 2),
('9500213', '', 'Luis', 'Rodríguez', 'Pérez', 'Finca 2', '', '', 111038887, '1', '2', 1),
('9500214', '', 'Tatiana', 'Gómez', 'Cartín', 'Finca 2', '', '', 140749203, '1', '2', 1),
('9500215', '', 'Eylin', 'Trigueros', 'Araya', 'Finca 2', '', '', 140749204, '1', '2', 1),
('9500216', '', 'Luz Mery', 'Vega', 'Vega', 'Finca 2', '', '', 140749210, '1', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcobro`
--

DROP TABLE IF EXISTS `tbcobro`;
CREATE TABLE `tbcobro` (
  `cobroid` int(11) NOT NULL,
  `cobrofecha` varchar(20) NOT NULL,
  `cobroclienteid` int(15) NOT NULL,
  `cobroconcepto` varchar(20) NOT NULL,
  `cobroanio` int(11) NOT NULL,
  `cobromedidorid` int(11) NOT NULL,
  `cobrolecturaactual` int(11) NOT NULL,
  `cobrolecturaanterior` int(11) NOT NULL,
  `cobroconsumometroscubicos` int(11) NOT NULL,
  `cobrotarifabasica` int(11) NOT NULL,
  `cobrototalmetroscuadrados` int(11) NOT NULL,
  `cobroleyhidrante` int(11) NOT NULL,
  `cobrorecargo` int(11) NOT NULL,
  `cobrototalapagar` int(11) NOT NULL,
  `cobroestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcobro`
--

INSERT INTO `tbcobro` (`cobroid`, `cobrofecha`, `cobroclienteid`, `cobroconcepto`, `cobroanio`, `cobromedidorid`, `cobrolecturaactual`, `cobrolecturaanterior`, `cobroconsumometroscubicos`, `cobrotarifabasica`, `cobrototalmetroscuadrados`, `cobroleyhidrante`, `cobrorecargo`, `cobrototalapagar`, `cobroestado`) VALUES
(1, '22-03-2019', 9500090, 'Febrero', 2019, 247204, 243, 232, 11, 3360, 2420, 165, 0, 5945, 2),
(2, '26-03-2019', 9500001, 'Febrero', 2019, 4447, 146, 136, 10, 3360, 2170, 150, 0, 5680, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconsumo`
--

DROP TABLE IF EXISTS `tbconsumo`;
CREATE TABLE `tbconsumo` (
  `consumoid` int(11) NOT NULL,
  `consumoclientemedidor` int(11) NOT NULL,
  `consumometroscubicos` int(11) NOT NULL,
  `consumofecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbconsumo`
--

INSERT INTO `tbconsumo` (`consumoid`, `consumoclientemedidor`, `consumometroscubicos`, `consumofecha`) VALUES
(1, 12345, 92, '2018-11-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

DROP TABLE IF EXISTS `tbempleado`;
CREATE TABLE `tbempleado` (
  `empleadoid` int(12) NOT NULL,
  `empleadocedula` varchar(20) NOT NULL,
  `empleadonombre` varchar(20) NOT NULL,
  `empleadoapellido1` varchar(25) NOT NULL,
  `empleadoapellido2` varchar(25) NOT NULL,
  `empleadodireccion` varchar(50) NOT NULL,
  `empleadocorreo` varchar(40) NOT NULL,
  `empleadotelefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`empleadoid`, `empleadocedula`, `empleadonombre`, `empleadoapellido1`, `empleadoapellido2`, `empleadodireccion`, `empleadocorreo`, `empleadotelefono`) VALUES
(1, '999999999', 'Admin', 'Admin', 'Admin', 'Address', 'saf2@test.com', '99999999'),
(2, '777777777', 'User', 'User', 'User', 'Address', 'user@test.com', '22222222'),
(3, '292992929', 'Axel', 'Andrade', 'Villalobos', 'das', 'villalobos.axel@yahoo.es', '22222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestado`
--

DROP TABLE IF EXISTS `tbestado`;
CREATE TABLE `tbestado` (
  `estadoid` int(11) NOT NULL,
  `estadodescripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbestado`
--

INSERT INTO `tbestado` (`estadoid`, `estadodescripcion`) VALUES
(1, 'Activo'),
(2, 'Suspendido'),
(3, 'Otros'),
(4, 'Inhabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhistorialprevistas`
--

DROP TABLE IF EXISTS `tbhistorialprevistas`;
CREATE TABLE `tbhistorialprevistas` (
  `historialprevistasid` int(11) NOT NULL,
  `historialprevistasclienteid` int(11) NOT NULL,
  `historialprevistasfechaabono` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhistoricoprevista`
--

DROP TABLE IF EXISTS `tbhistoricoprevista`;
CREATE TABLE `tbhistoricoprevista` (
  `historicoprevistaprevistaid` int(11) NOT NULL,
  `historicoprevistaclienteid` int(11) NOT NULL,
  `historicoprevistasaldoanterior` int(11) NOT NULL,
  `historicoprevistaabono` int(11) NOT NULL,
  `historicoprevistasaldoactual` int(11) NOT NULL,
  `historicoprevistafecha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbhistoricoprevista`
--

INSERT INTO `tbhistoricoprevista` (`historicoprevistaprevistaid`, `historicoprevistaclienteid`, `historicoprevistasaldoanterior`, `historicoprevistaabono`, `historicoprevistasaldoactual`, `historicoprevistafecha`) VALUES
(1, 9500218, 98345, 5000, 93345, '03.22.19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimpuestofijo`
--

DROP TABLE IF EXISTS `tbimpuestofijo`;
CREATE TABLE `tbimpuestofijo` (
  `impuestofijoid` int(11) NOT NULL,
  `impuestodescripcion` varchar(20) NOT NULL,
  `impuestovalor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbimpuestofijo`
--

INSERT INTO `tbimpuestofijo` (`impuestofijoid`, `impuestodescripcion`, `impuestovalor`) VALUES
(1, 'Tarifa básica', 3360),
(2, 'Recargo', 2),
(3, 'Hidrante', 15),
(4, 'Reconexion', 9900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmediciongeneral`
--

DROP TABLE IF EXISTS `tbmediciongeneral`;
CREATE TABLE `tbmediciongeneral` (
  `medicionid` int(11) NOT NULL,
  `medicionclientemedidorid` int(11) NOT NULL,
  `Enero` int(11) DEFAULT NULL,
  `Febrero` int(11) DEFAULT NULL,
  `Marzo` int(11) DEFAULT NULL,
  `Abril` int(11) DEFAULT NULL,
  `Mayo` int(11) DEFAULT NULL,
  `Junio` int(11) DEFAULT NULL,
  `Julio` int(11) DEFAULT NULL,
  `Agosto` int(11) DEFAULT NULL,
  `Septiembre` int(11) DEFAULT NULL,
  `Octubre` int(11) DEFAULT NULL,
  `Noviembre` int(11) DEFAULT NULL,
  `Diciembre` int(11) DEFAULT NULL,
  `AnioActual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmediciongeneral`
--

INSERT INTO `tbmediciongeneral` (`medicionid`, `medicionclientemedidorid`, `Enero`, `Febrero`, `Marzo`, `Abril`, `Mayo`, `Junio`, `Julio`, `Agosto`, `Septiembre`, `Octubre`, `Noviembre`, `Diciembre`, `AnioActual`) VALUES
(1, 4447, 136, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(2, 4448, 214, 238, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(3, 4451, 558, 575, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(4, 4452, 315, 327, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(5, 4453, 213, 230, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(6, 4454, 529, 547, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(7, 5187, 595, 616, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(8, 5189, 384, 401, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(9, 5191, 178, 197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(10, 5193, 108, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(11, 7924, 938, 951, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(12, 16825, 2037, 2057, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(13, 16826, 912, 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(14, 16827, 1591, 1621, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(15, 16828, 1639, 1658, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(16, 16829, 1185, 1198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(17, 16830, 1411, 1418, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(18, 16831, 1430, 1444, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(19, 16832, 3190, 3231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(20, 16833, 1987, 1992, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(21, 16834, 2833, 2863, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(22, 35577, 5796, 5823, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(23, 36906, 555, 577, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(24, 36909, 363, 377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(25, 36913, 722, 737, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(26, 36914, 1688, 1704, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(27, 36915, 159, 164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(28, 37916, 2479, 2543, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(29, 37917, 321, 327, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(30, 37920, 1989, 2020, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(31, 37921, 1261, 1294, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(32, 38886, 582, 601, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(33, 38888, 2052, 2086, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(34, 38889, 1367, 1385, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(35, 38890, 644, 644, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(36, 43669, 84, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(37, 49202, 13, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(38, 93662, 101, 114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(39, 103725, 844, 861, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(40, 154450, 168, 180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(41, 196796, 2952, 2986, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(42, 196797, 1741, 1755, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(43, 196798, 2889, 2917, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(44, 196799, 1714, 1724, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(45, 247156, 1698, 1739, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(46, 247157, 2523, 2541, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(47, 247159, 2195, 2208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(48, 247160, 2882, 2907, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(49, 247161, 3300, 3365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(50, 247162, 2704, 2723, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(51, 247163, 2010, 2016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(52, 247164, 1646, 1665, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(53, 247165, 3003, 3019, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(54, 247166, 533, 536, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(55, 247167, 3433, 3454, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(56, 247168, 5074, 5111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(57, 247169, 2483, 2518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(58, 247170, 2706, 2726, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(59, 247171, 3339, 3367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(60, 247172, 360, 361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(61, 247173, 519, 524, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(62, 247175, 325, 341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(63, 247176, 1742, 1745, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(64, 247177, 2526, 2550, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(65, 247178, 2456, 2489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(66, 247179, 1813, 1835, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(67, 247180, 2796, 2811, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(68, 247181, 4992, 5013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(69, 247182, 3326, 3329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(70, 247183, 22, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(71, 247184, 1157, 1171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(72, 247185, 1344, 1354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(73, 247186, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(74, 247187, 916, 919, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(75, 247188, 1422, 1430, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(76, 247189, 1804, 1807, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(77, 247190, 3800, 3808, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(78, 247191, 3455, 3471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(79, 247193, 1646, 1666, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(80, 247194, 2421, 2439, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(81, 247195, 1561, 1590, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(82, 247196, 84, 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(83, 247197, 2935, 2958, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(84, 247200, 3600, 3616, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(85, 247201, 3400, 3428, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(86, 247202, 2312, 2335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(87, 247203, 3436, 3493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(88, 247204, 3170, 3198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(89, 247205, 1898, 1918, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(90, 247206, 2340, 2353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(91, 247207, 3627, 3666, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(92, 247208, 3051, 3077, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(93, 247209, 3080, 3092, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(94, 247210, 4268, 4302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(95, 247211, 2336, 2353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(96, 247212, 2606, 2622, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(97, 247213, 1999, 2016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(98, 247214, 2901, 2926, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(99, 247215, 3352, 3388, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(100, 247216, 3864, 3917, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(101, 247217, 1212, 1216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(102, 247218, 2283, 2302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(103, 247219, 4284, 4319, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(104, 247221, 2086, 2105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(105, 247222, 2603, 2613, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(106, 247223, 3724, 3751, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(107, 247224, 1942, 1963, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(108, 247225, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(109, 247226, 2682, 2712, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(110, 247227, 3067, 3081, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(111, 247229, 4039, 4071, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(112, 247230, 1861, 1876, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(113, 247231, 3116, 3117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(114, 247232, 2127, 2148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(115, 247234, 2180, 2197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(116, 247235, 3660, 3694, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(117, 247236, 668, 680, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(118, 247237, 2189, 2195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(119, 247238, 3275, 3295, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(120, 247239, 1436, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(121, 247240, 1584, 1598, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(122, 247241, 2446, 2450, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(123, 247242, 2482, 2501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(124, 247243, 6041, 6097, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(125, 247244, 1639, 1651, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(126, 247245, 1864, 1872, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(127, 247246, 2222, 2238, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(128, 247247, 1614, 1627, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(129, 247248, 5647, 5697, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(130, 247249, 331, 331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(131, 247250, 1047, 1059, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(132, 247251, 195, 195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(133, 247252, 3242, 3271, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(134, 247253, 2125, 2131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(135, 247254, 137, 145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(136, 247255, 987, 987, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(137, 247256, 5016, 5036, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(138, 247257, 2204, 2206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(139, 247258, 1606, 1612, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(140, 247259, 3491, 3525, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(141, 247260, 2868, 2892, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(142, 247261, 2176, 2201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(143, 247262, 2938, 2962, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(144, 247263, 2106, 2118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(145, 247265, 1946, 1962, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(146, 247266, 2710, 2725, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(147, 247267, 509, 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(148, 247268, 1601, 1615, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(149, 247269, 2812, 2841, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(150, 247270, 1642, 1654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(151, 247272, 3727, 3737, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(152, 247273, 1297, 1307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(153, 247274, 2456, 2459, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(154, 247275, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(155, 247284, 1841, 1859, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(156, 247731, 983, 985, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(157, 247732, 1052, 1059, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(158, 247733, 816, 817, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(159, 247736, 2750, 2774, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(160, 247737, 2292, 2343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(161, 247738, 1646, 1653, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(162, 247739, 1763, 1772, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(163, 247740, 2129, 2137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(164, 324701, 1790, 1821, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(165, 324704, 582, 585, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(166, 324710, 2334, 2350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(167, 325081, 914, 928, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(168, 325218, 1385, 1410, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(169, 325584, 2202, 2249, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(170, 325585, 63, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(171, 325586, 1019, 1041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(172, 325589, 426, 441, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(173, 325694, 565, 568, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(174, 353455, 2979, 3004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(175, 353459, 4674, 4679, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(176, 355601, 1885, 1912, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(177, 355602, 964, 976, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(178, 355603, 3686, 3714, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(179, 355604, 5103, 5151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(180, 355605, 2602, 2628, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(181, 355606, 2489, 2505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(182, 355607, 2842, 2878, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(183, 355608, 4259, 4296, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(184, 355609, 4755, 4801, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(185, 355610, 2353, 2379, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(186, 355733, 2846, 2860, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(187, 355739, 3555, 2586, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(188, 355761, 3662, 3671, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(189, 355762, 3698, 3724, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(190, 355763, 3593, 3616, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(191, 355764, 5250, 5300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(192, 355765, 1789, 1803, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(193, 355766, 2032, 2061, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(194, 355767, 4361, 4397, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(195, 355768, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(196, 355769, 2867, 2891, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(197, 749201, 509, 509, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(198, 749205, 404, 432, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(199, 749209, 918, 937, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(200, 783097, 737, 756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(201, 783098, 923, 937, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(202, 783099, 1203, 1221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(203, 783100, 873, 880, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(204, 783101, 1389, 1409, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(205, 14749206, 109, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(206, 15004449, 572, 590, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(207, 111037917, 727, 746, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(208, 111037922, 385, 398, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(209, 111037923, 481, 508, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(210, 111038887, 658, 672, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(211, 140749203, 425, 436, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(212, 140749204, 267, 273, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019),
(213, 140749210, 733, 752, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmedidaestandar`
--

DROP TABLE IF EXISTS `tbmedidaestandar`;
CREATE TABLE `tbmedidaestandar` (
  `medidaestandarid` int(11) NOT NULL,
  `medidaestandarrango` varchar(11) NOT NULL,
  `medidaestandardomipre` varchar(11) NOT NULL,
  `medidaestandaremprego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmedidaestandar`
--

INSERT INTO `tbmedidaestandar` (`medidaestandarid`, `medidaestandarrango`, `medidaestandardomipre`, `medidaestandaremprego`) VALUES
(1, '1-10', '217', 326),
(2, '11-30', '250', 375),
(3, '31-60', '312', 469),
(4, '61-999', '469', 469);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmultilogin`
--

DROP TABLE IF EXISTS `tbmultilogin`;
CREATE TABLE `tbmultilogin` (
  `multiloginid` int(11) NOT NULL,
  `multiloginempleadoid` int(11) NOT NULL,
  `multiloginpassword` varchar(10) NOT NULL,
  `multilogintipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmultilogin`
--

INSERT INTO `tbmultilogin` (`multiloginid`, `multiloginempleadoid`, `multiloginpassword`, `multilogintipousuario`) VALUES
(1, 1, 'admin', 1),
(2, 2, '1234user', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprevista`
--

DROP TABLE IF EXISTS `tbprevista`;
CREATE TABLE `tbprevista` (
  `previstaid` int(11) NOT NULL,
  `previstaclienteid` int(11) NOT NULL,
  `previstasaldoanterior` int(11) DEFAULT NULL,
  `previstaabonoactual` int(11) DEFAULT NULL,
  `previstasaldoactual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbprevista`
--

INSERT INTO `tbprevista` (`previstaid`, `previstaclienteid`, `previstasaldoanterior`, `previstaabonoactual`, `previstasaldoactual`) VALUES
(1, 9500218, 98345, 5000, 93345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipocliente`
--

DROP TABLE IF EXISTS `tbtipocliente`;
CREATE TABLE `tbtipocliente` (
  `tipoclienteid` int(11) NOT NULL,
  `tipoclientenombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipocliente`
--

INSERT INTO `tbtipocliente` (`tipoclienteid`, `tipoclientenombre`) VALUES
(1, 'Emprego'),
(2, 'Domipre'),
(3, 'Prevista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipousuario`
--

DROP TABLE IF EXISTS `tbtipousuario`;
CREATE TABLE `tbtipousuario` (
  `tipousuarioid` int(11) NOT NULL,
  `tipousuariodescripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipousuario`
--

INSERT INTO `tbtipousuario` (`tipousuarioid`, `tipousuariodescripcion`) VALUES
(1, 'administrador'),
(2, 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`clientemedidor`);

--
-- Indices de la tabla `tbcobro`
--
ALTER TABLE `tbcobro`
  ADD PRIMARY KEY (`cobroid`);

--
-- Indices de la tabla `tbconsumo`
--
ALTER TABLE `tbconsumo`
  ADD PRIMARY KEY (`consumoid`),
  ADD KEY `consumoclienteid` (`consumoclientemedidor`);

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`empleadoid`);

--
-- Indices de la tabla `tbestado`
--
ALTER TABLE `tbestado`
  ADD PRIMARY KEY (`estadoid`);

--
-- Indices de la tabla `tbhistorialprevistas`
--
ALTER TABLE `tbhistorialprevistas`
  ADD PRIMARY KEY (`historialprevistasid`);

--
-- Indices de la tabla `tbmediciongeneral`
--
ALTER TABLE `tbmediciongeneral`
  ADD PRIMARY KEY (`medicionid`),
  ADD KEY `medicionclientemedidorid` (`medicionclientemedidorid`);

--
-- Indices de la tabla `tbmultilogin`
--
ALTER TABLE `tbmultilogin`
  ADD PRIMARY KEY (`multiloginid`),
  ADD KEY `multiloginempleadoid` (`multiloginempleadoid`);

--
-- Indices de la tabla `tbtipocliente`
--
ALTER TABLE `tbtipocliente`
  ADD PRIMARY KEY (`tipoclienteid`);

--
-- Indices de la tabla `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  ADD PRIMARY KEY (`tipousuarioid`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbmediciongeneral`
--
ALTER TABLE `tbmediciongeneral`
  ADD CONSTRAINT `tbmediciongeneral_ibfk_1` FOREIGN KEY (`medicionclientemedidorid`) REFERENCES `tbcliente` (`clientemedidor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbmultilogin`
--
ALTER TABLE `tbmultilogin`
  ADD CONSTRAINT `tbmultilogin_ibfk_1` FOREIGN KEY (`multiloginempleadoid`) REFERENCES `tbempleado` (`empleadoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
