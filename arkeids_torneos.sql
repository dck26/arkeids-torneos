-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2018 at 07:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkeids_torneos`
--

-- --------------------------------------------------------

--
-- Table structure for table `01_PERSONA`
--

CREATE TABLE `01_PERSONA` (
  `idPersona01` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apodo` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `foto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `01_PERSONA`
--

INSERT INTO `01_PERSONA` (`idPersona01`, `nombre`, `email`, `apodo`, `foto`, `password`, `perfil`) VALUES
(10, 'Daniel', 'daniel.cuadra@gmail.com', 'dck', '', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `02_JUEGO`
--

CREATE TABLE `02_JUEGO` (
  `idJuego02` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `idConsola03` int(11) DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `02_JUEGO`
--

INSERT INTO `02_JUEGO` (`idJuego02`, `nombre`, `idConsola03`, `foto`) VALUES
(1, 'Super Street Figther II Turbo', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `03_CONSOLA`
--

CREATE TABLE `03_CONSOLA` (
  `idConsola03` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `03_CONSOLA`
--

INSERT INTO `03_CONSOLA` (`idConsola03`, `nombre`) VALUES
(1, 'ARCADE');

-- --------------------------------------------------------

--
-- Table structure for table `04_LUGAR`
--

CREATE TABLE `04_LUGAR` (
  `idLugar04` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `04_LUGAR`
--

INSERT INTO `04_LUGAR` (`idLugar04`, `nombre`, `calle`, `CP`) VALUES
(1, 'CHECKPOINT BILLIARDS', 'URANO 738', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `05_TORNEO`
--

CREATE TABLE `05_TORNEO` (
  `idTorneo05` int(11) UNSIGNED NOT NULL,
  `idLugar04` int(200) DEFAULT NULL,
  `idJuego02` int(11) DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `05_TORNEO`
--

INSERT INTO `05_TORNEO` (`idTorneo05`, `idLugar04`, `idJuego02`, `horaInicio`, `horaFin`, `fecha`, `foto`, `descripcion`) VALUES
(1, 1, 1, '19:00:00', '22:00:00', '2018-05-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `06_PARTIDA`
--

CREATE TABLE `06_PARTIDA` (
  `idPartida06` int(11) UNSIGNED NOT NULL,
  `idTorneo05` int(11) DEFAULT NULL,
  `idPersonaUno01` int(11) DEFAULT NULL,
  `idPersonaDos01` int(11) DEFAULT NULL,
  `idGanador01` int(11) DEFAULT NULL,
  `completado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `07_RANKING`
--

CREATE TABLE `07_RANKING` (
  `idPersona01` int(11) UNSIGNED NOT NULL,
  `idJuego02` int(11) NOT NULL,
  `victorias` int(11) DEFAULT NULL,
  `derrotas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `01_PERSONA`
--
ALTER TABLE `01_PERSONA`
  ADD PRIMARY KEY (`idPersona01`);

--
-- Indexes for table `02_JUEGO`
--
ALTER TABLE `02_JUEGO`
  ADD PRIMARY KEY (`idJuego02`);

--
-- Indexes for table `03_CONSOLA`
--
ALTER TABLE `03_CONSOLA`
  ADD PRIMARY KEY (`idConsola03`);

--
-- Indexes for table `04_LUGAR`
--
ALTER TABLE `04_LUGAR`
  ADD PRIMARY KEY (`idLugar04`);

--
-- Indexes for table `05_TORNEO`
--
ALTER TABLE `05_TORNEO`
  ADD PRIMARY KEY (`idTorneo05`);

--
-- Indexes for table `06_PARTIDA`
--
ALTER TABLE `06_PARTIDA`
  ADD PRIMARY KEY (`idPartida06`);

--
-- Indexes for table `07_RANKING`
--
ALTER TABLE `07_RANKING`
  ADD PRIMARY KEY (`idPersona01`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `01_PERSONA`
--
ALTER TABLE `01_PERSONA`
  MODIFY `idPersona01` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `02_JUEGO`
--
ALTER TABLE `02_JUEGO`
  MODIFY `idJuego02` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `03_CONSOLA`
--
ALTER TABLE `03_CONSOLA`
  MODIFY `idConsola03` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `04_LUGAR`
--
ALTER TABLE `04_LUGAR`
  MODIFY `idLugar04` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `05_TORNEO`
--
ALTER TABLE `05_TORNEO`
  MODIFY `idTorneo05` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `06_PARTIDA`
--
ALTER TABLE `06_PARTIDA`
  MODIFY `idPartida06` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
