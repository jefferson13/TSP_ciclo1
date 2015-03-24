-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2015 at 12:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `videojuegos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id_categoria` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'ACCION'),
(2, 'ARMAS'),
(3, 'FUTBOL'),
(4, 'AVENTURA'),
(5, 'CIENCIA FICCION'),
(6, 'PELEA'),
(7, 'FANTASIA'),
(8, 'MAFIA'),
(9, 'CARRERA'),
(10, 'GUERRA');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` bigint(20) NOT NULL,
  `nombre` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `telefono`, `password`, `imagen`, `Correo`) VALUES
(123, 'sebastian mejia', 123, '123', 'galaxy_universe-normal.jpg', 'sebastianmejia'),
(321, 'Coso', 1010, 'yerfer', 'Penguins.jpg', 'yerfer'),
(1212, 'Luz Mery', 22, '2121', 'Chrysanthemum.jpg', 'luz@gm.com'),
(40390667, 'amanda', 385141525, 'yerson', '', ''),
(90909090, 'Andres Felipe', 9090, 'pipe', '', ''),
(1234560987, 'golosa24', 556556, '0000', '', ''),
(987654321987654321, 'Ottorinolaringologo', 12312312345, 'yerferfull', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
`id_prestamo` bigint(20) NOT NULL,
  `id_videojuego` bigint(20) NOT NULL,
  `id_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `id_videojuego`, `id_cliente`) VALUES
(2, 15, 987654321987654321),
(3, 1, 90909090),
(6, 1, 987654321987654321),
(7, 12, 40390667),
(8, 12, 40390667),
(9, 12, 40390667),
(10, 12, 40390667),
(11, 12, 40390667),
(12, 15, 40390667),
(13, 5, 40390667),
(14, 12, 40390667),
(15, 2, 1234560987),
(16, 13, 1234560987),
(21, 3, 123),
(22, 7, 123),
(24, 1, 123),
(27, 2, 123),
(29, 2, 123),
(32, 1, 123),
(33, 1, 123),
(34, 2, 123),
(36, 1, 123),
(39, 1, 123),
(41, 1, 123),
(42, 1, 123),
(43, 1, 123),
(44, 1, 123),
(45, 2, 123),
(46, 3, 123),
(47, 4, 123),
(48, 11, 123),
(50, 2, 123),
(51, 3, 123),
(53, 2, 123),
(54, 5, 123),
(55, 6, 123),
(56, 4, 123),
(57, 5, 123),
(58, 6, 123),
(59, 15, 123),
(61, 1, 123),
(62, 1, 123),
(63, 1, 123),
(64, 1, 123),
(65, 2, 123),
(66, 3, 123),
(67, 4, 123),
(68, 1, 123),
(69, 1, 123),
(70, 1, 123),
(71, 1, 123),
(72, 1, 123),
(73, 1, 123),
(74, 1, 123),
(75, 2, 123),
(76, 3, 123),
(77, 2, 123),
(78, 1, 123),
(79, 1, 123),
(80, 2, 123),
(81, 3, 123),
(82, 4, 123),
(83, 1, 123),
(84, 1, 123),
(85, 1, 123),
(86, 2, 123),
(87, 2, 123),
(88, 3, 123),
(89, 1, 123),
(90, 1, 123),
(91, 1, 123),
(92, 2, 123),
(93, 1, 123),
(94, 2, 123),
(95, 3, 123),
(96, 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `videogame`
--

CREATE TABLE IF NOT EXISTS `videogame` (
`id_vj` bigint(20) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio_dia` float NOT NULL,
  `consola` text NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `video` text NOT NULL,
  `id_categoria` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videogame`
--

INSERT INTO `videogame` (`id_vj`, `nombre`, `descripcion`, `precio_dia`, `consola`, `stock`, `imagen`, `video`, `id_categoria`) VALUES
(1, 'Crysis', 'videojuego de ciencia ficcion', 4000, 'PC', -12, 'Covers/crysis_pc.jpg', 'IFz2evkDvxk', 2),
(2, 'Assassins Creed 2', 'videojuego de ciencia ficcion', 7500, 'X-BOX_360', 5, 'Covers/assassinscreed2_360.jpg', 'LGC88YwrfkM', 1),
(3, 'Call of Duty: Black Ops 2', 'Video juego de guerra', 6500, 'X-Box_360', 12, 'Covers/callofdutybo2_360.jpg', 'kqOjoYRgnHs', 10),
(4, 'DBZ: Kinnect', 'Video juego de pelea', 10000, 'X-Box_360', 16, 'Covers/dbzkinnect_360.jpg', 'b-bmimZ-0ss', 6),
(5, 'Fallout 3', 'Video juego de ciencia ficcion', 8000, 'PC', 17, 'Covers/fallout3_pc.jpg', 'FUhCzMZO1Vk', 2),
(6, 'FIFA 15', 'Video juego de futbol soccer', 10000, 'PS4', 18, 'Covers/fifa15_ps4.jpg', 'atKOMiyUQ4g', 3),
(7, 'Final Fantasy XIII', 'Video Juego de Fantasia y aventura', 12000, 'X-Box_360', 19, 'Covers/finalfantasy13_360.jpg', 'iponuRPeEgs', 4),
(8, 'GTA: 4', 'Video Juego de misiones y mafias', 4000, 'PC', 20, 'Covers/gta4_pc.jpg', '4FzvBhslH7w', 8),
(9, 'Halo 4', 'Video Juego shooter', 8000, 'X-Box_360', 20, 'Covers/halo4_360.jpg', 'Jn_UaWmOoyE', 2),
(10, 'Mario Galaxy II', 'Video Juego de aventura', 7000, 'WII', 20, 'Covers/mariogalaxy2_wii.jpg', '-WY-WzXuylc', 4),
(11, 'Mario Kart', 'Video Juego de misiones y carreras', 8600, 'WII', 19, 'Covers/mariokart_wii.jpg', 'nWybPOrwzdY', 9),
(12, 'NFS: Rivals', 'Video Juego carreras', 12000, 'PS4', 14, 'Covers/needforspeedrivals_ps4.jpg', 'NoTu4Zx3Lhg', 9),
(13, 'Call of Duty: Ghosts', 'Video Juego de guerra', 11000, 'PS4', 19, 'Covers/callofdutyghost_ps4.png', 'FAcvGByZNHs', 10),
(14, 'El Chavo', 'Video Juego de misiones y aventuras', 6000, 'WII', 20, 'Covers/elchavo_wii.png', 'mduzkFawrdI', 4),
(15, 'God of War 2', 'Video Juego misiones y combates', 7000, 'PC', 17, 'Covers/godofwar2_pc.png', 'exzXh-RRheU', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id_categoria`), ADD UNIQUE KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cedula`), ADD FULLTEXT KEY `password` (`password`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
 ADD PRIMARY KEY (`id_prestamo`,`id_videojuego`,`id_cliente`), ADD UNIQUE KEY `id_prestamo` (`id_prestamo`), ADD KEY `id_videojuego` (`id_videojuego`), ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `videogame`
--
ALTER TABLE `videogame`
 ADD PRIMARY KEY (`id_vj`), ADD UNIQUE KEY `id_vj` (`id_vj`), ADD KEY `id_categoria` (`id_categoria`), ADD KEY `id_categoria_2` (`id_categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
MODIFY `id_categoria` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
MODIFY `id_prestamo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `videogame`
--
ALTER TABLE `videogame`
MODIFY `id_vj` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`id_videojuego`) REFERENCES `videogame` (`id_vj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videogame`
--
ALTER TABLE `videogame`
ADD CONSTRAINT `videogame_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
