-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2018 a las 21:12:01
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
-- Base de datos: `dbflyfree`
--
CREATE DATABASE IF NOT EXISTS `dbflyfree` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbflyfree`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `actualizarPaquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarPaquete` (IN `precio` INT, IN `dias` INT, IN `cantidad` INT, IN `fecha` DATE, IN `descripcion` VARCHAR(100), IN `idPaquete` INT, IN `idDestino` INT, IN `idServicio` INT, IN `img` LONGBLOB)  NO SQL
UPDATE `tbpaquetes` SET `paquetedescripcion`= descripcion,`paquetecantidadpersonas`=cantidad,`paquetefecha`=fecha,`paquetedias`=dias,`paqueteprecio`=precio,`destinoid`=idDestino,`servicioid`=idServicio, imagen =img
WHERE `paqueteid`= idPaquete$$

DROP PROCEDURE IF EXISTS `actualizarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarPersona` (IN `nombre` VARCHAR(30), IN `apellido1` VARCHAR(30), IN `apellido2` VARCHAR(30), IN `email` TEXT, IN `telefono` INT(11), IN `pass` TEXT, IN `genero` VARCHAR(30), IN `pais` VARCHAR(30))  NO SQL
UPDATE `tbpersona` SET `personanombre`=nombre,`personaapellido1`=apellido1,`personaapellido2`=apellido2,`personaemail`=email,`personatelefono`= telefono,`personapassword`=pass,`personagenero`=genero,`personapais`=pais WHERE `personaemail` = email$$

DROP PROCEDURE IF EXISTS `agregarPaquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarPaquete` (IN `idDestino` INT, IN `descripcion` TEXT, IN `cantidad` INT, IN `fecha` TEXT, IN `dia` INT, IN `precio` DOUBLE, IN `idServicio` INT, IN `pic` LONGBLOB, IN `idPaquete` INT)  NO SQL
INSERT INTO `tbpaquetes`(`paqueteid`,`destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES (idPaquete,idDestino,descripcion,cantidad,fecha,dia,precio,idServicio,pic)$$

DROP PROCEDURE IF EXISTS `buscarPaquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarPaquete` (IN `codigo` INT)  NO SQL
SELECT `paqueteid`, `destinoid`, `servicioid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio` FROM `tbpaquetes`  WHERE `paqueteid` = codigo$$

DROP PROCEDURE IF EXISTS `buscarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarPersona` (IN `email` TEXT)  NO SQL
SELECT `personaid`, `personanombre`, `personaapellido1`, `personaapellido2`, `personaemail`, `personatelefono`, `personapassword`, `personagenero`, `personapais` FROM `tbpersona` WHERE `personaemail` = email$$

DROP PROCEDURE IF EXISTS `eliminarPaquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPaquete` (IN `codigo` INT)  NO SQL
DELETE FROM `tbpaquetes` WHERE `paqueteid` = codigo$$

DROP PROCEDURE IF EXISTS `eliminarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPersona` (IN `email` TEXT)  NO SQL
DELETE FROM `tbpersona` WHERE personaemail = email$$

DROP PROCEDURE IF EXISTS `insertarDestino`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarDestino` (IN `id` INT, IN `nombre` VARCHAR(30), IN `ubicacion` TEXT)  NO SQL
INSERT INTO `tbdestino`(`destinoid`, `destinonombre`, `destinoubicacion`) VALUES (id,nombre,ubicacion)$$

DROP PROCEDURE IF EXISTS `insertarPaquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarPaquete` (IN `idPaquete` INT, IN `idDestino` INT, IN `idServicio` INT, IN `precio` INT, IN `dias` INT, IN `cantidad` INT, IN `fecha` VARCHAR(10), IN `descripcion` TEXT, IN `img` LONGBLOB)  NO SQL
INSERT INTO `tbpaquetes`(`paqueteid`, `destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES (idPaquete,idDestino,descripcion,cantidad,fecha,dias,precio,idServicio,img)$$

DROP PROCEDURE IF EXISTS `insertarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarPersona` (IN `personaid` INT(11), IN `personanombre` VARCHAR(30), IN `personaapellido1` VARCHAR(30), IN `personaapellido2` VARCHAR(30), IN `personaemail` TEXT, IN `personatelefono` INT(11), IN `personapass` VARCHAR(20), IN `personagenero` VARCHAR(30), IN `personapais` VARCHAR(30))  NO SQL
INSERT INTO `tbpersona`(`personaid`, `personanombre`, `personaapellido1`, `personaapellido2`, `personaemail`, `personatelefono`, `personapassword`, `personagenero`, `personapais`) VALUES (personaid,personanombre,personaapellido1,personaapellido2,personaemail,personatelefono,personapass,personagenero,personapais)$$

DROP PROCEDURE IF EXISTS `mostrarDestinos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarDestinos` ()  NO SQL
BEGIN
SELECT * FROM tbdestino ;
END$$

DROP PROCEDURE IF EXISTS `MostrarPaquetes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarPaquetes` ()  NO SQL
SELECT * FROM `tbpaquetes`$$

DROP PROCEDURE IF EXISTS `mostrarPersonas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarPersonas` ()  NO SQL
BEGIN
SELECT * FROM `tbpersona`;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadministrador`
--

DROP TABLE IF EXISTS `tbadministrador`;
CREATE TABLE IF NOT EXISTS `tbadministrador` (
  `administradorid` int(11) NOT NULL AUTO_INCREMENT,
  `personaid` int(11) NOT NULL,
  PRIMARY KEY (`administradorid`),
  KEY `personaid` (`personaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `clienteid` int(11) NOT NULL AUTO_INCREMENT,
  `personaid` int(11) NOT NULL,
  PRIMARY KEY (`clienteid`),
  KEY `personaid` (`personaid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`clienteid`, `personaid`) VALUES
(1, 1),
(5, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdestino`
--

DROP TABLE IF EXISTS `tbdestino`;
CREATE TABLE IF NOT EXISTS `tbdestino` (
  `destinoid` int(11) NOT NULL AUTO_INCREMENT,
  `destinonombre` varchar(30) NOT NULL,
  `destinoubicacion` varchar(50) NOT NULL,
  PRIMARY KEY (`destinoid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdestino`
--

INSERT INTO `tbdestino` (`destinoid`, `destinonombre`, `destinoubicacion`) VALUES
(1, 'Francia', '200m'),
(2, 'Buenos Aires', 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacturas`
--

DROP TABLE IF EXISTS `tbfacturas`;
CREATE TABLE IF NOT EXISTS `tbfacturas` (
  `facturaid` int(11) NOT NULL AUTO_INCREMENT,
  `reservaid` int(11) NOT NULL,
  PRIMARY KEY (`facturaid`),
  KEY `reservaid` (`reservaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpaquetes`
--

DROP TABLE IF EXISTS `tbpaquetes`;
CREATE TABLE IF NOT EXISTS `tbpaquetes` (
  `paqueteid` int(11) NOT NULL AUTO_INCREMENT,
  `destinoid` int(11) NOT NULL,
  `paquetedescripcion` text NOT NULL,
  `paquetecantidadpersonas` int(11) NOT NULL,
  `paquetefecha` text NOT NULL,
  `paquetedias` int(11) NOT NULL,
  `paqueteprecio` double DEFAULT NULL,
  `servicioid` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  PRIMARY KEY (`paqueteid`),
  KEY `destinoid` (`destinoid`),
  KEY `servicioid` (`servicioid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpaquetes`
--

INSERT INTO `tbpaquetes` (`paqueteid`, `destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES
(1, 1, 'Nice place!', 2, '2018-05-25', 3, 50000, 1, 0xffd8ffe000104a46494600010100000100010000ffdb00840009060713131215131213151515151616171516151715171615151515171715151515181e2820181a251b151721312125292b2e2e2e181f3338332d37282d2e2b010a0a0a0e0d0e1b10101b2d251f26352e2d2b2d2d2d2d2d2d2f2d2e322d2d2b2d2b352d2d2d2d2d2d2d2d2d2d2f2d2d2d2d2d2d2d2d2d2b2d2d2f2d2d2d2d2d2dffc000110800a8012c03012200021101031101ffc4001b00000202030100000000000000000000000304020500010607ffc4004210000201030301060404030702040700000102110003210412314105132251617106328191a1b1d1f01442c1235262728292e124f11543b2c2073334535593a2ffc4001b01000203010101000000000000000000000203000104050607ffc40030110002020103010409050101000000000000010211030412213105134151142261718191a1b1f0233252c1d1f115ffda000c03010002110311003f00f1e0820f9e2079f3267edf7a1eda6ae5ba814a4290f681a6288079d6b6d114546cb884b006e59e244fb4e7f0a947d289693c3271d07af9d6d44d2dc86c62983b83fe2865718a6dade2a212a94862c6c594ff00dea1b734565a8ae0cd16e24573c86ba9c0e7f2fb7d2a3794080793f94c4fb60f14d8b730de79a26b1dd9eddb6290968228750614bdcb85463fbd718cf4fc2871b4dd33b19b0b863df15d6be4535c4f16289b6b573770f276922639fd7ae7d69dd08b6d87241e878020753fbe28a4e91ce86dc9936f4bf337a463b62011389191ec7cb3c7b53f72d15b64a0cc7d847888f58fdcc512d6942e049e2783c8907db23ef4cbaf81882386ce30789a4b9727a0c3a68ac52b7cd7e51436ed46590ca80447a7123e9cfa55a7646999bfb47ca8f95625b91e203cab348a67c42580e720f22411c1c48ab6d236ec290207104638a283729a495bf2110c0a18a539cb6c578f1f37eef22c2d36d0074000fb548c734323f78a8d7ba8456d4f6d7f47cdb2ca5be494ad73cf3cfcfccddc5a5ae2d321aa2f9a658b457bb508dca6af5aa4dd68c62225ea1b85630a03b50b0d208ce282d9a131acb7a82a4989f0b2f31f3a324fd374fd2864f6a6c34acc2b5ad951ef6b0ea2a17c9a6b74336e8eb7854a455512c50a5436d3cca2865285c4b4c536d44a539dcd41ad556d2ec50ad6a29aeeeb502ab69764024e282e95797bb28dbb6b71997c440d832c25770248c03054ed26618639852e5a04715e1f751d9da5685a905a3ba418ac54a2dc557346d5647a09ac5533fbeb4d59b0046e123aa83b4ffb8831f6a6bb3f522d34ed1714a9565798323d0e083c1ffb506e4c7ec6b87d446719fdfa56adc18f3a2f758add9b1e61b311813e7227fa50a683c7b9ca84e26a212acc6847419e07a927159afecb7b774da71b5956d9706247796d2e440273e303e9d38a8a69f2687a79c64a0fab13b2cc17c3e21d3cc79e3f18a1dce54c49e9cf9cf344bd7882631ed5ab249327f1e055df89b2738c62a17e41dbb36e5d66296c92a017da67a0820733e832628babec6bb657c49fca492083003282641e6481f5ae9be11d460dbd87c5e22c33d00f17eb57fa9d38752ac241e4798f2aea697450cf877293bfa1c1d6eba7a6d538ca0a9f37e34fc7cbe879b2e110a0339903823ac9ebcc53da4b0cee1482254e2223c24c67a1222ba8d5f6506b8ae3891b8748031f9014dbdb18c0c71e9e82a61eca9cb23dee927f343f376e4218a3dd72dae57f16b8f8ff008515aec9224961b8c71c0f3f7a2e9b4a509e0f91ebea22acd8540a57631767e9f1cd4e2b95ed3919bb6b599b14b14e5717d7842db6b456982b42615d05239742ee282c6992b4375a3b2c1ab5035283a549da82cd449104ae501853775680c9441a62ac2b5abb5160b759cc193b370019870abbe064cb1381e1268aeb47bfff00d15ef5b96c1f380e840f6927f783cced56d60e3cd1af4b4e653e99895939a9115bd30f02fb5488ad3813eea37e48097ee60ab26a4454628e8a362e1a9adea145645420c8d451038a4e2a42aecaa1a6cd0fbaa1abd17bfabea5740ad8307904fb03d78f6a9aad440e242e0463ae7931d7f4a35b5af9ec99e829d006b50662a16d20cd592da9a1f75078a159028c7942c164e7353dbf4a304a222e23cf9f6e95370c5ed21a74e447ad2f7d8eedd26780499300401f6c7b0a7ad023ebfb8a73f80852d131804091bc83b547ae2837fac6ac78e5923c787880ec331751ee895475761d4ec2081e9271e933d29cf88fb4ff00887379ac84baccc6eba9245d076f770bc2ed5017d7ae6acfe1cf832f5c24de0d65768225659b74c40271106673918cd59ea7e00531378c8dde2da720e1405dc2204f9c96e915ab1e9b3cd70b8063da3a6c4d372f597e755f967986b946e11d44fe3565d9ba27baa102fcb2d200076920316204c03b79fa535db1d92ba6d49452b742004ee06248276b28383e93e53d68d63b57baeebb80c1866e878d8cc3080464a8c983d4f589aaa49ed93aaebe604f3b94bbc4aefa797c7c4b4ecdec57b7755595940c865822608067383c7d7d6ba56b54c767eb52f2865227aace418c8f51eb45b96ebd0687163c50fd3769f279eed4d565d4655dec76b8aaa455dcb74bb25593daa19b35d15339b4571b74365ab07b7406b546a45d08b2d0ca538e94b5d3469905ee52b74d32e282cb4e89426eb41229c64a132531320b30a130a64ad40ad5d962371289ad48d1bfab21fbdc03ff0067b79e40a2ba5676aaff00d2479cf4f2ba9c1ebedec7ceb97daeff0043e28d9a27fa9f02974abe01522b46d22784fb9a93256bd2f3863ee1791d4d8a95a8eca64ad40ad3e81b0056b228a56b5b6ab697b81456f6d13656f654a26e04056e28bb6b7b6ae8ab1f5b4460727a790fd68f62d609e63a54ec5af1118279cf975983d6981a68224c8300c0cfdbcebe65297859ebe306d396de1700ed09a9bd891530a27c3c7b41fa8f3a6ed24d2dca8cee25435a8ada255addd2d00d8a2ef13069f523a35f103eb5e95f0d762a771b9c06ef195d7fc3b276329e8d92647422b87ecfb3cd7a0fc1a5cdb21b7b0060316055600f005991cfe3d2b4e827179ea4bc07ea9658e8ae32e2d3f6972cb496b430562a24c638fea40fb902ad19292d65876521182311862bbb69f3db224d7a2ddc33ccede559e35a9d497408c89bc3333dd8fed2e33312c5d87204e00180053ff11766d9b4d6eddbf13283de10326406493c712401c4906a1da7d99dc5d742dbca11e282264027049f3f3ae9fb3bb29f5168f7872b742ee61e25554ca89ff32e311f8579b8396494b1d5cbfcea7aca84231c927515e1efe9c3f8f1ff000e53b34b0c0f01246d60086ce2370cc7a0f3eb8aef6cda6da03904f9acc7e24d407c356d5d5d0b4ab2986820811e9cf59f3ab6366bb3d9da79e0ddbfefc1c7ed6d5e2d44611c5cd5db6a9d9586d509edd5a359a13d9aeaa99c4da5535aa5ee2c559dd4a52e5aa74640b2b2ead2af6ead5ecd01ed53e33028aa6b74164ab47b3407b74c53215cd6e84c94f3a501d698a45093ad09929b714165a626558bb2d47b68c69f831e1f639b7200e8d279f23472b59dbd6e34c7192067cf6b5b581ec4113e5f63caed897e8a5ed3768399bf7147a0120c883391d79393f6fce8ec945d3a8dcc011c4faf499f5131456b75b7412dda7888d471918894a894a70dba81b75b056e14d959b29936eb5ddd42f70becacd94c7775beeea1370becadeda63bbadf77509b8b8b3636b49e339fc629bfe14ec62012607009da091981c0f5f3a7af5ab60a80fb9481bb688339955dc32604cfad0d2c90d83222091d491900f51339ea3de2be4ce5cdb3e830928c7bb4b87f4b174d095337413b5c0706419ea18f20c027fd26b566d11c88ab4b165e4a293e2f98168076e7c4498c6deb57a7e12766b252592e2cb1236f76c1648604601381e7f8d5c633c9fb15997510c78d7ace99cfb69080b31e35dc320e24813e5c7da2977d2e6ae759a4365cda610ca44e411054111039ce73f96496b40580201f1185e818f100fbd666dc65542765be1d95da1d03c88462090a20132c4481ee4662bbdf8445beed917706106e2b4618882571f29da39e2ae343d98a88a082480872412a5478406004ed9314e1b626604c44f58f29f2aefe97472c5253b3167d629e378ab8f000d68509b4f4db0a85751499cd71451dcec3b5de35d6b61dd88cb78a368006d07038e79a3b5ae71cf3ebef5657283ddd486d8f4449b94bab10ee6b46cd3e6dd0d9299bc5ed2bded52d72d559bdba0bdba38c80712a6e59a5ae5aab7b96e95b894f8cc534553daa5ee5bab3b894adcb74f8c85b2b6e252b716acee5aa5ae5aa74642d9577129774ab47b3407b14f8c812add28452acdf4f4336298a40b2bc5a9a8fc52b16408e42cce376e7b8c08f480493fe2ab2b76b23d33f6f4eb48fc56aa2c8f9a37a2f5cc25c03693e623db68f6ae276ce4bd913a7d98bf732af489e2e867af5f9460fae3ef34db5ba1dbb70d2003f299c8c0da09fa824fbe3ae5e74ad9d933fd1af688d7f192c41ad50cdaa79968456bab662dc2a6dd47653452a3ddd59370b6cacdb4cf7759ddd426e16d95bd94c8b75beeeaec9b8b6368ac6f32a730bf391ba08ea14f3cfe92c6aeda2dddb65fbc58586865cc0270c0119fb4c74345b16cb800720131d5cf51efc40f4f3399d9b52e0641eb8c8eb95e4e3a57c89cf8aa3dfe4c6f75b971fd781d17c39d843523219425c1b9b1b59604db1d437067c8fb57a069b482da2a2ced5000933007027db1497c2cd6bba22cab05562a4beddc4f2676f313d6ae01aef68b0431c149757d59c8d666964c8d3e8bc0e67b57e1e5297ae7cd75bc52d8002c12aa071e111993eb4cf6576384b0a8ff3487ff2b6223cb0003e79abdad4531697129efaf0afec577d3dbb6c0915945db5a22b4d89a0715a2944ac352c804a50d968e4545854b2a85ca50d969822a05289305a14714075a79add40dba35201a2b5edd01ec55ab2509d298a62dc0a97d3d2efa7ab774a5ae253a3314e254dcb14b5cb556d72dd2d72cd3a3214d15572dd2d712ad2e59a59ecd3e3214cabb894064ab47b3407b34f8c8532b9eeaa112de263088be2b8e713b2daf88fbfca3a9aa0f8bb50e1518aaacc020beeb8085665de13c36e43b1080b6d912722ba3ed3d4dbb56c97de66477698de232198e36c6e2464c0e3cf9cf8aee975b205b08a8d754209931dd29deec7c44c0cc753e467cef68e4df9ebc11ddd0c36e1bf1672d6b5655a79e772ee064190c3a473f95761d99aa37ad872a566466331824474991f4ae26e887ca882cc011807313ebcd75df0adc26d143fca4c099806247dcccff8ab5f65e471c9b7c199fb42170dde43ec95036e9feeeb46d57a0dc71acaf36eb3baa7bbaaceeaaf712c47baac16a9feeab3baa9b8ab1216ab3b934f8b55beeaa6e2586d3dc2ac854024303912206723cbd7a55a6a3520b25d510e776e59254670327822411e58a434d6cb4baab32a03bcaa960a0eecb18c08eb565d8166d5edeaec55954775ec189611d70c48cf4af93c54e5eac7c4fa3e6cb8f76e978715ec03a4d75db4c7ba729393b78813024e604f07d2baef8335f7248769b64b1966c873e2e09e0c9388ccf315cf6b2cdbb3dedb742d7412a0b1daaaa0c86500f88919cc60d2767522008183335239678269df4f0bfa18b2a592e970fa33d76ddd0df2907d883f954e6b8eec82d6efa20729de286daead3104ed823cc1ccfe95d7a99120c8f4af43a6cef346daa67372e3d8f8764ab22b515bad02c8edad15a956aa108915122a66a26a108115122894aea35d6d0c3b006273e5fafa50cb2460ae4e89564cad419686dda36a6378e01f70738f3a25bbcac48064af3838fbd48e7c72749af994e2c1b2d09929b2b4365a7290b711374a03ad3ec9427b74d52172895ae94bba55a35aa03d9a6c662a502aae5ba59ed55c3d9a0b58a74662650299ed501ac4d5db69aabf5aca25032ef8189c804c127cb131eb1ef472cea1172604304a72491c4f6d5c577f9bc2768104e56e116cc475daac798f18999c29f10236eb4080610eec99df24b463a80bfb22aefb72ca5b00aaa6edc7c576e04e548c4f3c010b06b8aed8ed5737092cac52546182c738933024c4f48af3cf2778db3d0286c4912b9a0df649611b2edcc0e4eeb8c241e60467ae056764dd16efced3e3e824c2b1f14752a218e78d839a8f65769a2ab0636c1666c30791bd595983024f5ebd63d6857f5bb761574600f0a4933c827008c8e9ea2b4e29b84a334232454a2e2cef16dd4bbaaaaf863b685d0b6b639650017fecc0f212376e9e9c749ae9fb8af490cca4ad1e7726294254cadee6b5dc55977159dc517782e8adee2a42c558f715b162a7784a2bc59ac362acc58ac362abbc26d38bd4eacaf844c60fb9fd922af7e0bed1ba6fdbb486dc33a91de8f94ae7c2dc8240e073f8d5176a69e1992776d3e17e772f2ac0f932c1fad2fd9ae43a90e508387120ace09919e3cabe770a8b4fc8f7baac552b5d1f43bef8cefabdfbaf6b26c774974aced2c430dca7a6d2150fd2a96c0dc0b9f383c48c60903a7ad57f67eab6b36d002dc5642bd36b41024f910a7fd22ba1f84348972edb0e48ded001f96e200c5d78ff000c7d69396b2cfdadfdc08dc61ec4474cde467ef579d8bab6b666485e3930098cc4c4fea6a8759a56b4ed2085df71549ea11f6e3cf119f5ac1ab27038fdf3e758a6a78e7c70d0d8c6338f43bf6ed77e91ef1cd117b5de3e59fdf3547a1ba36027248cfd7cbd7d69c6d472388e9d2291ff00a5aa8bfdecc52c514ea8b15ed96fee8fa4cd16cf6d291e25607ae3f1aa2efa31c7afd8d29acd5403067389e47afee6ba1a7ed6caff0073e45cb123b84bea577290444e3f78aa7ed0ed96431b6339dc0f1e583cd50e8af3321ea419ff008c56f51aa2f83c804411d2207e534cd476bce6b6c38654712f12c87c4139242f3819cf03dc707dc5565ed59732c4364f887338119c440c0aaad4347d3d6933aa38db33fd3dab9f933e7ccaa5218a318f42e9ae8c4010a001e7feaf3f5f3a56f6b1d9f787da4ccc12047a7a7e9552f79c1324c73c98388907ca967bcdd311cfa7343184fccbb474767b66f2303bcb460124919c999ff8ab3bdf14b8ddfd98044c4c91d22483eff8570c9da6ca403c9cc8f622247146bbda01b919ce3238eb8f4fcab4c32ea71f1193a05a833aa4f8bdc378edaed2711222620cf51fad74ba4d5a5c4570400d8ce3c430409f635e65fc623a00049020e25a40124790e696ff00c44af81648f2323af300f311f8d6cd3f686a20deee7de04f141f4e0f5967498dcb23912247d282d76dc4ef5889f9870393ed915e64fac25cc0303c21413e1680a01919feb4b2f69193249226062047f48ad4bb5b2ff05f317e8f1f33bfbddbfa753058fa1039c49f6888cf5a6745acb579775b704495ce0823a41f4cfb579aded4ed60b75730a42c0182b2a723ac83f7f39a5777cbb8ca86981231fcdc6570391478bb57327eba40cb4d07d0f5efe1eb93ed1ecd6b971c97bac0ced50cb68059e77001987b9abfd47695b5d3a147770c81b79f9d94f04e304fd20035c27c48cd7818675ccb057da09c01262588c0cfaf4c569d66b60ea165e9f16db90f2767dab65957b9b4d2a0b30dccc5818877c39c7427f2af2fed16ef2f5d70d3bae31e9105b1fd2bd61745ff004a8eee5dd2d482c541ef0c30b6d20990422938c6eea4d79d58eca2c86e787e60a32244c9dc04f887e94b870686d3473c6d9f3fc3fe2866c9f21fb35d268fe1c37354da7b859485680bb4fcb7026e1b880478b76391c638e9fb13ff008756753a617896b0f704a0b6772a8e25c1f9f20f0479ce71ae1172e8267251ea705d8bdda5eb575a0f76e1a0099da66067e69103d62bda34e16e22ba10cac01523820d79276b7635ed15f16afa827e6468252eacc631079823a48919aeebe0bed554454206c273dddb6096c931b9fa26480c06321fa927669b3ecf5198f5583bc5b91d27f0f5afe1ead8e9eb5dc56fef4e7772557f0f521a7ab14b6089104798c8fbd0deedb56dace8182ef2a59410827c441fe5c1cfa54ef49dc8a0b1441a6f4a7c59a4f53daba7b6db5eea86f2c9fc852e7a88c7aba0e381be879700a1503380c2ddc381c904ed59ebc0cfb0e94ae981990242c13c8e06ee7a60734969afc113c00c07a824b7e66af74bda3b76414503a349e238038996fb7ad792943c0f633a9c37a7f0be7f2fe8747674d6f522ddec8dbbc3228f136d328b231312663f9a31d357aecdcb6f664150c46d90ca4b718e398fad50276bdc0acb0a126422f876e7f9620fbccf3e752bddaa7702a2555514edf0823fbc42e55c9ebd48f5ac91d352ebeef70a849c5f2ad17faa56b8482e014f08126214473e70b1f4a6bb3b46a549260c8e3a5732baae81cc31e09ffd59e649fc6ad6deb580014e0080475f591fd6919a1295b4cd5352551c7ff3f2ceaacdd850be51c79f9d44dfea4feff7f95520d6340e303cff00e7d6a62ea9c339f61159e3d9d924f939b395377d4b27d419c63933ed551aad4927279e0549b6f01cc7d273c8e7a8a5f516d7a16f4c4ff4add8bb3690a73439d9daf80d82013f3749e403f63f7f4ac7d6805b76601e0f5f7fb55477b10361899ce240fcbad02d5e0793e7f97fde89f66dbb4c1de5cdc6dc3748000e9ce294d2ea88711238191e6c27f014b3481b5c5c49330d2a39c723c80a42fdfdbc16ebcb4fb445363a069532b7a1e761bb2f2bbbaf1ccfe53406d58008ea3911c81939ea27a4d571d5b13c9e3ccf34aeaaf31eb388e5ba993f7a6ad171c937968758b2a1a1667cfd40fc7140d4768fcb1820cccc48ca6d3c63c355ba8ba76ff274c6d1239393b7cc9ebd684f2710be92071327a79e699e83c81b877b4752ab70c103d898e3a64f3cfd452d7bb5561486333993c4010c3f2fa52704e485e0f4ff008a56e5b3d147e344b48bc49b8e8876d95bc4624bed33383be30474e28da6d65964dce4123c4c01cc4804161e7bbcb15ca17bb3ba248332626799f7c511c3a100aa92caa4e0601f128f2e369ffb547a24fa17bd9df3f697f14136da455b8c558c4b140fb83339e0020af4f9140e82a95350addda86400ac82c3c5b549f0fd4823efeb5436b5170f76a723791078dabb36fd2431a4ec6a2e2ed3b048002e2214ee623d8927ef57e84e8adfc9e9b7359696ca5ab465601e7c4c580dcc57d4c189eb4bdd5eed544853f34478b39c1cc18f3c7dab85fe3356716ad391b44f776b740060eeda0f5893ea28d7b5fae6557b8f6f33b773dbdc0080772a9253188602b3becdcae5761bcaa8ea0a117375cb920824aa4805888190449044e3ca87d8166fa382087b5e3df6dc92814a5c5f6929718e08c9935cb5dedad5283b8da3cee8d9273254c723030694bbdbf7fbb492194971dd811b361067c3d0ee27e869b1d26787ed681de99e81a8b7b6faea3729288508529c1e20660cf90e0918ae9be14f8916e596b4a8a8f6446cf3064aec022444881c40f3c78aa6bf50efb214139f1955040131bd8c7d2699fe22fa075eeecc91066ed962a04c855ef0e78e9320568c78f5308b5b81954bc0f4ef8a35eba8b3ddea7ba081a7780c5acc48ef4473e4475527debce3b33b59ecb82bb5993e5867f111fcc1810663af5188e94f8d4b3d8b7bd4da5d905510953e362bfcd3256073fcbc0cd1acdf5b23b94beaa2ddc2256de4b2c032dba48f0f5e94ec3a6cc97af2b0639174a05f107c6fa8babddda66b7680423633481b4f877ed53b72d83d02f31577d9df113be9145ebfbc6d2194841893e16099272799276f022a8bb534c4924b46e4dc7110dde6d044c990be67acf5a4f53ab7baed82d872ca9844dc1b20318489c7b537369f2ce292957c4a6e366ee76a5cb3b974da8bca8581216e344f20f43381ff003567da56efdc4b376e0b85ef5a2433b01369b800cfcade231399e07141d1f655a760a8264df25a0b004d884501c4ba065621b6832ff40cea7e20efc6934972cedb36912d10972198a4ed6562a7664f19c1e685e096da6c1ae6d0df61fc45792d77419cdbc88009d931b76b0c89ce098e62849a95121a4104883bb8e63e931f4aea2ef6676469ed3e9dafe9d776d2c4eb1cdc98055a1508c4f947a542f6b7b10ed07529e150a36ded59c0f322de4e79ac53d24e4edbfab1ab8479aadd8c024ac8207af98f23fbe9535b91cf34be9f52a30f3073206671189e3f5ab3d06852e0df2d127c847b8fb75a9289d18addd0869755901b2388ea27a8f5a26a2e907cc0303c8ffcd33a8ec7b961937c45c4de844c15dcca72473e1e3fc4326905d3b130a02ee24431803dc9111ebc52b6fad46896392c29ae8dfd87747744f1ff001573a4d5660fd3f4a43b03b26e5edcd6c060846e930733c0fa1abdd3f653e40041531078cc1e7af3cd2a7a79cdfaa83c19618d6e9492aeabdffd05d3eb0af0467fcbfd783475ed98118ff6da9fa1e6a43b3eee2607fa6d7f559fbd60ecbb84fce318f96df3ec16b760d3cf1c697d8e5eaf531cd3ba49f9a7d45ee76bbc62ebafbb483e420b7e3495fd7b16cdf27fd440fa00715d1697b06f4c8b841e301463fdb4cbfc3f7badf7ff00f9fd29eb4f26edfe7d4c9dea472f6afd993df5c6cf0c77111198920918fc4d49aee8d620b30c198dbee203cf1c71fd299ed2ec450e59cbb93896ce07d3d290b9d8887f963eb56f1c93e09bd0e5fedcb0c20866e4005ee4718926e713e753eced25bb8a59f6aa885910f93e16223779c89354edd8cbc6da32763247041f431f7145b64df20ee89d1e9f43a2ef15411bb015596d9de644b306580b1d08aced6d7f67dab8cbdcd8304e05a18831cc474fc6a8747d876cb4335cdbd7c4d5ab9d876e4ed6b80796f7e3e8698a2e8bdf11effc6fb3f1ff004f6bff00d4be93d2a76bb4746ea7669acc8cc9b4a447bc73f7aa96ec24fefdcff7bfeb503f0f5a8cef3eeeff00ad1a8488f2c7cbee3c7b6b4998d25af43dc29f3935b1db5a4903f84b5b647fe40ea7c463d801f8cd575bf872d1fef7fb9a8e9f0c599c8247f98d5ac3323cd0f2fb90ed554624db5d3a6e00041693c0264122224831c8e3813495e64b87c40a2cb01b34f6e56d903626e6380b9e075e956e9f0ce9b04dbeb9c9a19f8734d39b4bcfef9a278640c73c52e8bf3e273dacbfa5551b4333ab41f704124f87deae3e0fec5b1aab6ce42865771b6f12a85552d140a41524c9b93c888c54af762595f9500fdf955a7635c6b2a12d92a24e14c7cc4797b516c9b540f791bb0d72f2dbbf7946a2d23179d96b7779b18230b610836d40080cae673d48a858d1f675c17435bb5b8b780dd6b8599b26e4bee5c4f070200adf6976658ba59aeda56272491927cc9aacd3760e8c2b96b08c67133819e05577324b92d664d886ac767a3b27f0d6cc310593bd2089890678eb8a969f5fa2985d25bdd932e1944cc7cc703c258e7ad2daaecbd3c98b4804f11f85565fd2581ff949f606a6d1af271d17d7fd1dbda8ece0581d1831b803fda6d9044190720c1fb8adb6abb3d9485d25bb6ca8a648712d1fda2e5a184e0627354176cdacff00656faff28a0f769d2da7fb455a48172f67dffd18bd634ed82a10920cdbb21c0f0b0689759c953e91d645566bce9d6e05582a1406f0edf1cc9e8646638e839a68aa1fe4419e8aa07d0018a66ce9d0ff0028fb532185cba013caaba163d857fb3916d965d3de6ef14deef46d8b244bada076f8c10626723c8d59ebeff65f76acb6b497189ca5b570c207cc62ef84498e4cd23d9e2da91e158f2201156f71edb281b12074dab1f9537d164296a22baa2bb47da1d9bbd4ff00076961be67dd0048863fdb1c813d0f029db7f117659ffe668493888bc48273932fc4456c59b5ff00db5ff68fd29954b217e449ff002afe957e88fcc9e971fe3f7ff416afb63b21882347676f5544b6afce412ac23f7e53589dbbd89ffe3bf146fc4dc14c277479453fe95fd2b4c2df454ff68fd2abd109e96aba1e7606735d16a3b2755a7b48d737282cc810960c8f01e1d31b490c0fe706b7595c192b8b67a1c0f6e68c178b3d77e24f843f88d1e895585b6b169577906e785ada82bc82c77aa67fcded5e53add43ddb92cc5987854f901f2851c019c08eb5959535914926bc4d3d8d91cdca32e547a7b2dbb3d5bb3753a5b5a45b80adbb6c1dd979f1cff6aaaa724ab7863a401567fc302010304023cf39add656dc391c9edf248e4eb74b1863596ddca525f221fc08f21fd6a69a58eb5bacad072c62d5b02a3a90233fbfc6b7595688739ad51c0127d3ac758a4f60e80fe5f5acaca3da80b0176dcf97ee28440f5fa4565654a45593481e7f87151761595945489644b0a03b0fdfe5ef595944902d9a4b807eff00a513f88159594e4b801b34fa9a53f8a1ce2b2b2a5110bdfd609fd8152d1ea4120798acacaa4827d0b2d4b784c550ea35500e6b2b2a4cbc653ea359553a8d50ad5656466ba11b97eb4b76b2b2aa2466d5e9bb0f59595af08998fd9b94edbd4d65656c4666820d40f4a696f0dbd0fd4631595956c0a334f74753f8e3f2adddbc27cbed5aaca84a3fffd9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

DROP TABLE IF EXISTS `tbpersona`;
CREATE TABLE IF NOT EXISTS `tbpersona` (
  `personaid` int(11) NOT NULL AUTO_INCREMENT,
  `personanombre` varchar(30) NOT NULL,
  `personaapellido1` varchar(30) NOT NULL,
  `personaapellido2` varchar(30) NOT NULL,
  `personaemail` text NOT NULL,
  `personatelefono` int(11) NOT NULL,
  `personapassword` text NOT NULL,
  `personagenero` varchar(30) NOT NULL,
  `personapais` varchar(30) NOT NULL,
  PRIMARY KEY (`personaid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpersona`
--

INSERT INTO `tbpersona` (`personaid`, `personanombre`, `personaapellido1`, `personaapellido2`, `personaemail`, `personatelefono`, `personapassword`, `personagenero`, `personapais`) VALUES
(0, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 22, '123', 'Masculino', 'Costa Rica'),
(1, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 2, 'ss', 'masculino', 'CR'),
(2, 'd', 'd', 'd', 'd', 2, 'd', 'd', 'd'),
(3, 'dsa', 'kk', 'l', 'jj', 2, 'dsa', 'asd', 'ads');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreservas`
--

DROP TABLE IF EXISTS `tbreservas`;
CREATE TABLE IF NOT EXISTS `tbreservas` (
  `reservaid` int(11) NOT NULL AUTO_INCREMENT,
  `clienteid` int(11) NOT NULL,
  `paqueteid` int(11) NOT NULL,
  PRIMARY KEY (`reservaid`),
  KEY `clienteid` (`clienteid`),
  KEY `paqueteid` (`paqueteid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios`
--

DROP TABLE IF EXISTS `tbservicios`;
CREATE TABLE IF NOT EXISTS `tbservicios` (
  `servicioid` int(11) NOT NULL AUTO_INCREMENT,
  `tipoid` int(11) NOT NULL,
  PRIMARY KEY (`servicioid`),
  KEY `tipoid` (`tipoid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbservicios`
--

INSERT INTO `tbservicios` (`servicioid`, `tipoid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipos`
--

DROP TABLE IF EXISTS `tbtipos`;
CREATE TABLE IF NOT EXISTS `tbtipos` (
  `tipoid` int(11) NOT NULL AUTO_INCREMENT,
  `tiponombre` varchar(38) NOT NULL,
  PRIMARY KEY (`tipoid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipos`
--

INSERT INTO `tbtipos` (`tipoid`, `tiponombre`) VALUES
(1, 'Hoteleria');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD CONSTRAINT `tbcliente_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `tbpersona` (`personaid`);

--
-- Filtros para la tabla `tbpaquetes`
--
ALTER TABLE `tbpaquetes`
  ADD CONSTRAINT `tbpaquetes_ibfk_1` FOREIGN KEY (`destinoid`) REFERENCES `tbdestino` (`destinoid`),
  ADD CONSTRAINT `tbpaquetes_ibfk_2` FOREIGN KEY (`servicioid`) REFERENCES `tbservicios` (`servicioid`);

--
-- Filtros para la tabla `tbservicios`
--
ALTER TABLE `tbservicios`
  ADD CONSTRAINT `tbservicios_ibfk_1` FOREIGN KEY (`tipoid`) REFERENCES `tbtipos` (`tipoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
